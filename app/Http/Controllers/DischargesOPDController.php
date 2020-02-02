<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesOPD;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesOPDController extends Controller {

    protected $soapWrapper;
 
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }
    
	public function index(){
        return view('layout.index');
    }
    
    public function show(Request $request){

        $data = array(
            'id'=>$request->input('id'),
        );

        $discharges_OPD = DB::table('hospoptdischargesopd as dischargesOPD')
            ->select( 
                'dischargesOPD.id',
                'dischargesOPD.hfhudcode',
                'dischargesOPD.erconsultations',
                'dischargesOPD.number',
                'dischargesOPD.icd10code',
                'dischargesOPD.icd10category',
                'dischargesOPD.reportingyear'
            )->orderBy('dischargesOPD.number', 'DESC');

        if ($data['id']){
            $discharges_OPD = $discharges_OPD->where('dischargesOPD.id', $data['id']);
        }

        $discharges_OPD = $discharges_OPD->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_OPD,
            'count'=>$discharges_OPD->count(),
            'message'=>''
        ]);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $discharges_OPD_count = DischargesOPD::count();

                if($discharges_OPD_count<10){

                    $check_duplicate = DischargesOPD::where('icd10code', $fields['icd10code'])->count();
                    if($check_duplicate<=0){

                        $discharges_OPD = new DischargesOPD;
                        $discharges_OPD->hfhudcode                       = "NEHEHRSV201900093";
                        $discharges_OPD->erconsultations                 = $fields['icd10desc'];
                        $discharges_OPD->number                          = $fields['number'];
                        $discharges_OPD->icd10code                       = $fields['icd10code'];
                        $discharges_OPD->icd10category                   = $fields['icd10cat'];
                        $discharges_OPD->reportingyear                    = 2019;
                        $discharges_OPD->save();

                        return response()->json([
                            'status' => 200,
                            'data' => null,
                            'message' => 'Successfully saved.'
                        ]);

                    }else{
                        return response()->json([
                            'status' => 500,
                            'data' => null,
                            'message' => 'This record already exist!'
                        ]);
                    }

                }else{
                    return response()->json([
                        'status' => 500,
                        'data' => null,
                        'message' => 'Maximum of ten (10) records only!'
                    ]);
                }

            
            // }
            // catch (\Exception $e) 
            // {
            //     return response()->json([
            //         'status' => 500,
            //         'data' => null,
            //         'message' => 'Error, please try again!'
            //     ]);
            // }

        });

        return $transaction;
    }

    // public function update(Request $request){

    //     $fields = Input::post();

    //     $transaction = DB::transaction(function($field) use($fields){
    //     try{

    //         $discharges_OPD = DischargesOPD::where('reportingyear', $fields['reportingyear'])->first();
    //         $discharges_OPD->hfhudcode                       = "NEHEHRSV201900093";
    //         $discharges_OPD->erconsultations                 = $fields['erconsultations'];
    //         $discharges_OPD->number                          = $fields['number'];
    //         $discharges_OPD->icd10code                       = $fields['icd10code'];
    //         $discharges_OPD->icd10category                   = $fields['icd10category'];
    //         $discharges_OPD->reportingyear                    = 2019;
    //         $discharges_OPD->save();

    //         return response()->json([
    //             'status' => 200,
    //             'data' => null,
    //             'message' => 'Successfully updated.'
    //         ]);

    //       }
    //       catch (\Exception $e) 
    //       {
    //         return response()->json([
    //           'status' => 500,
    //           'data' => null,
    //           'message' => 'Error, please try again!'
    //         ]);
    //       }
    //     });

    //     return $transaction;
    // }

    public function remove(Request $request){

	    $data = Input::post();

	    $transaction = DB::transaction(function($data) use($data){
	    try{

			DischargesOPD::where('id', $data['id'])->firstOrFail()->delete();

	        return response()->json([
	            'status' => 200,
	            'data' => 'null',
	            'message' => 'Successfully deleted.'
	        ]);

	      }
	      catch (\Exception $e) 
	      {
	          return response()->json([
	            'status' => 500,
	            'data' => 'null',
	            'message' => 'Error, please try again!'
	        ]);
	      }
	    });

   	 	return $transaction;
  	}

    public function send_data_doh(){

        $discharges_OPD = DB::table('hospoptdischargesopd as dischargesOPD')
            ->select( 
                'dischargesOPD.id',
                'dischargesOPD.hfhudcode',
                'dischargesOPD.erconsultations',
                'dischargesOPD.number',
                'dischargesOPD.icd10code',
                'dischargesOPD.icd10category',
                'dischargesOPD.reportingyear'
            )->where('reportingyear', 2019)->get();

        $request = $this->soapWrapper->add('Emr', function ($service) {
            $service
            ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
            ->trace(false);
        });

        $data = [
            'login' => 'NEHEHRSV201900093',
            'password' => '123456'
        ];
        $response = $this->soapWrapper->call('Emr.authenticationTest', $data);
        // return response($response, 200)->header('Content-Type', 'application/xml');

        foreach ($discharges_OPD as $discharge_ER) {
            // code
            $data = [
                "hfhudcode" => "NEHEHRSV201900093", 
                "erconsultations" => $discharge_ER->erconsultations, 
                "number" => $discharge_ER->number, 
                "icd10code" => $discharge_ER->icd10code,
                "icd10category" => $discharge_ER->icd10category,
                "reportingyear" => 2017
            ];
        
            $response = $this->soapWrapper->call('Emr.hospOptdischargesOPD', $data);
        }
    }
  	
}