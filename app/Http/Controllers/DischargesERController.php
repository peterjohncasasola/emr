<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesER;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesERController extends Controller {

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

        $discharges_ER = DB::table('hospoptdischargeser as dischargesER')
            ->select( 
                'dischargesER.id',
                'dischargesER.hfhudcode',
                'dischargesER.erconsultations',
                'dischargesER.number',
                'dischargesER.icd10code',
                'dischargesER.icd10category',
                'dischargesER.reportingyear'
            )->orderBy('dischargesER.number', 'DESC');

        if ($data['id']){
            $discharges_ER = $discharges_ER->where('dischargesER.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_ER = $discharges_ER->where('dischargesER.reportingyear', $data['reportingyear']);
        }

        $discharges_ER = $discharges_ER->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_ER,
            'count'=>$discharges_ER->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $discharges_ER_count = DischargesER::where('reportingyear', $fields['reportingyear'])->count();

                if($discharges_ER_count<10){

                    $check_duplicate = DischargesER::where('icd10code', $fields['icd10code'])
                                                    ->where('reportingyear', $fields['reportingyear'])->count();
                    if($check_duplicate<=0){

                        $discharges_ER = new DischargesER;
                        $discharges_ER->hfhudcode                       = "NEHEHRSV201900093";
                        $discharges_ER->erconsultations                 = $fields['icd10desc'];
                        $discharges_ER->number                          = $fields['number'];
                        $discharges_ER->icd10code                       = $fields['icd10code'];
                        $discharges_ER->icd10category                   = $fields['icd10cat'];
                        $discharges_ER->reportingyear                   = $fields['reportingyear'];
                        $discharges_ER->save();

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

    //         $discharges_ER = DischargesER::where('reportingyear', $fields['reportingyear'])->first();
    //         $discharges_ER->hfhudcode                       = "NEHEHRSV201900093";
    //         $discharges_ER->erconsultations                 = $fields['erconsultations'];
    //         $discharges_ER->number                          = $fields['number'];
    //         $discharges_ER->icd10code                       = $fields['icd10code'];
    //         $discharges_ER->icd10category                   = $fields['icd10category'];
    //         $discharges_ER->reportingyear                    = 2019;
    //         $discharges_ER->save();

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

			DischargesER::where('id', $data['id'])->firstOrFail()->delete();

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

            $discharges_ER = DB::table('hospoptdischargeser as dischargesER')
                ->select( 
                    'dischargesER.id',
                    'dischargesER.hfhudcode',
                    'dischargesER.erconsultations',
                    'dischargesER.number',
                    'dischargesER.icd10code',
                    'dischargesER.icd10category',
                    'dischargesER.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($discharges_ER as $discharge_ER) {
                // code
                $data = [
                    "hfhudcode" => $discharge_ER->hfhudcode, 
                    "erconsultations" => $discharge_ER->erconsultations, 
                    "number" => $discharge_ER->number, 
                    "icd10code" => $discharge_ER->icd10code,
                    "icd10category" => $discharge_ER->icd10category,
                    "reportingyear" => $discharge_ER->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospOptDischargesER', $data);
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