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
            'reportingyear'=>$request->input('reportingyear'),
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

        if ($data['reportingyear']){
            $discharges_OPD = $discharges_OPD->where('dischargesOPD.reportingyear', $data['reportingyear']);
        }

        $discharges_OPD = $discharges_OPD->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_OPD,
            'count'=>$discharges_OPD->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $discharges_OPD_count = DischargesOPD::where('reportingyear', $fields['reportingyear'])->count();

                if($discharges_OPD_count<10){

                    $check_duplicate = DischargesOPD::where('icd10code', $fields['icd10code'])->where('reportingyear', $fields['reportingyear'])->count();
                    if($check_duplicate<=0){

                        $discharges_OPD = new DischargesOPD;
                        $discharges_OPD->hfhudcode                       = "NEHEHRSV201900093";
                        $discharges_OPD->erconsultations                 = $fields['icd10desc'];
                        $discharges_OPD->number                          = $fields['number'];
                        $discharges_OPD->icd10code                       = $fields['icd10code'];
                        $discharges_OPD->icd10category                   = $fields['icd10cat'];
                        $discharges_OPD->reportingyear                   = $fields['reportingyear'];;
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

    public function send_data_doh(Request $request){
        
        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        try{

            $request = $this->soapWrapper->add('Emr', function ($service) {
                $service
                ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
                ->trace(false);
            });

            $discharges_OPD = DB::table('hospoptdischargesopd as dischargesOPD')
                ->select( 
                    'dischargesOPD.id',
                    'dischargesOPD.hfhudcode',
                    'dischargesOPD.erconsultations',
                    'dischargesOPD.number',
                    'dischargesOPD.icd10code',
                    'dischargesOPD.icd10category',
                    'dischargesOPD.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($discharges_OPD as $discharges_OPD) {
                // code
                $data = [
                    "hfhudcode" => $discharges_OPD->hfhudcode, 
                    "erconsultations" => $discharges_OPD->erconsultations, 
                    "number" => $discharges_OPD->number, 
                    "icd10code" => $discharges_OPD->icd10code,
                    "icd10category" => $discharges_OPD->icd10category,
                    "reportingyear" => $discharges_OPD->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospOptdischargesOPD', $data);
            }
            $xml = simplexml_load_string($response);
            $json = json_encode($xml);
            $array = json_decode($json, true);

            return response()->json([
                'status' => 200,
                'data' => null,
                'message' => $array['response_code']." ".$array['response_desc']
            ]);

        }
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => 500,
                'data' => null,
                'message' => 'Error, please try again!'
            ]);
        }
        
        });

        return $transaction;
    }
  	
}