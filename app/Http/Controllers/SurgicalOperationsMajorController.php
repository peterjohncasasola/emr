<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\SurgicalOperationMajor;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SurgicalOperationsMajorController extends Controller {

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

        $operations_major = DB::table('hospitaloperationsmajoropt as operationsMajorOpt')
            ->select( 
                'operationsMajorOpt.id',
                'operationsMajorOpt.hfhudcode',
                'operationsMajorOpt.operationcode',
                'operationsMajorOpt.surgicaloperation',
                'operationsMajorOpt.number',
                'operationsMajorOpt.reportingyear'
            )->orderBy('operationsMajorOpt.number', 'DESC');

        if ($data['id']){
            $operations_major = $operations_major->where('operationsMajorOpt.id', $data['id']);
        }

        if ($data['reportingyear']){
            $operations_major = $operations_major->where('operationsMajorOpt.reportingyear', $data['reportingyear']);
        }

        $operations_major = $operations_major->get();

        return response()->json([
            'status'=>200,
            'data'=>$operations_major,
            'count'=>$operations_major->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $operations_major_count = SurgicalOperationMajor::where('reportingyear', $fields['reportingyear'])->count();

                if($operations_major_count<10){

                    $check_duplicate = SurgicalOperationMajor::where('operationcode', $fields['operationcode'])
                                                                ->where('reportingyear', $fields['reportingyear'])->count();
                    if($check_duplicate<=0){

                        $operations_major = new SurgicalOperationMajor;
                        $operations_major->hfhudcode                        = "NEHEHRSV201900093";
                        $operations_major->operationcode                    = $fields['operationcode'];
                        $operations_major->surgicaloperation                = $fields['surgicaloperation'];
                        $operations_major->number                           = $fields['number'];
                        $operations_major->reportingyear                    = $fields['reportingyear'];;
                        $operations_major->save();

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

    public function update(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        try{

            $operations_major = SurgicalOperationMajor::where('reportingyear', $fields['reportingyear'])->first();
            $operations_major->hfhudcode                        = "NEHEHRSV201900093";
            $operations_major->operationcode                    = $fields['operationcode'];
            $operations_major->surgicaloperation                = $fields['surgicaloperation'];
            $operations_major->number                           = $fields['number'];
            $operations_major->save();

            return response()->json([
                'status' => 200,
                'data' => null,
                'message' => 'Successfully updated.'
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

    public function remove(Request $request){

	    $data = Input::post();

	    $transaction = DB::transaction(function($data) use($data){
	    try{

			SurgicalOperationMajor::where('id', $data['id'])->firstOrFail()->delete();

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

            $data = [
                'login' => 'NEHEHRSV201900093',
                'password' => '123456'
            ];
            $response = $this->soapWrapper->call('Emr.authenticationTest', $data);
            // return response($response, 200)->header('Content-Type', 'application/xml');

                
            $major_operations = DB::table('hospitaloperationsmajoropt as operationsMajorOpt')
                ->select( 
                    'operationsMajorOpt.id',
                    'operationsMajorOpt.hfhudcode',
                    'operationsMajorOpt.operationcode',
                    'operationsMajorOpt.surgicaloperation',
                    'operationsMajorOpt.number',
                    'operationsMajorOpt.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->get();

            

            foreach ($major_operations as $major_operation) {
                // code
                $data = [
                    "hfhudcode" => $major_operation->hfhudcode, 
                    "operationcode" => $major_operation->operationcode, 
                    "surgicaloperation" => $major_operation->surgicaloperation, 
                    "number" => $major_operation->number,
                    "reportingyear" => $major_operation->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospitalOperationsMajorOpt', $data);
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