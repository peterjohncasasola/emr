<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\SurgicalOperationMinor;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SurgicalOperationsMinorController extends Controller {

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

        $operations_minor = DB::table('hospitaloperationsminoropt as operationsMInorOpt')
            ->select( 
                'operationsMInorOpt.id',
                'operationsMInorOpt.hfhudcode',
                'operationsMInorOpt.operationcode',
                'operationsMInorOpt.surgicaloperation',
                'operationsMInorOpt.number',
                'operationsMInorOpt.reportingyear'
            )->orderBy('operationsMInorOpt.number', 'DESC');

        if ($data['id']){
            $operations_minor = $operations_minor->where('operationsMInorOpt.id', $data['id']);
        }

        if ($data['reportingyear']){
            $operations_minor = $operations_minor->where('operationsMInorOpt.reportingyear', $data['reportingyear']);
        }

        $operations_minor = $operations_minor->get();

        return response()->json([
            'status'=>200,
            'data'=>$operations_minor,
            'count'=>$operations_minor->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $operations_minor_count = SurgicalOperationMinor::where('reportingyear', $fields['reportingyear'])->count();

                if($operations_minor_count<10){

                    $check_duplicate = SurgicalOperationMinor::where('operationcode', $fields['operationcode'])
                                                                ->where('reportingyear', $fields['reportingyear'])->count();
                    if($check_duplicate<=0){

                        $operations_minor = new SurgicalOperationMinor;
                        $operations_minor->hfhudcode                        = "NEHEHRSV201900093";
                        $operations_minor->operationcode                    = $fields['operationcode'];
                        $operations_minor->surgicaloperation                = $fields['surgicaloperation'];
                        $operations_minor->number                           = $fields['number'];
                        $operations_minor->reportingyear                    = $fields['reportingyear'];;
                        $operations_minor->save();

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

            $operations_minor = SurgicalOperationMinor::where('reportingyear', $fields['reportingyear'])->first();
            $operations_minor->hfhudcode                        = "NEHEHRSV201900093";
            $operations_minor->operationcode                    = $fields['operationcode'];
            $operations_minor->surgicaloperation                = $fields['surgicaloperation'];
            $operations_minor->number                           = $fields['number'];
            $operations_minor->save();

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

			SurgicalOperationMinor::where('id', $data['id'])->firstOrFail()->delete();

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
                
            $minor_operations = DB::table('hospitaloperationsminoropt as operationsMInorOpt')
                ->select( 
                    'operationsMInorOpt.id',
                    'operationsMInorOpt.hfhudcode',
                    'operationsMInorOpt.operationcode',
                    'operationsMInorOpt.surgicaloperation',
                    'operationsMInorOpt.number',
                    'operationsMInorOpt.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($minor_operations as $minor_operation) {
                // code
                $data = [
                    "hfhudcode" => $minor_operation->hfhudcode, 
                    "operationcode" => $minor_operation->operationcode, 
                    "surgicaloperation" => $minor_operation->surgicaloperation, 
                    "number" => $minor_operation->number,
                    "reportingyear" => $minor_operation->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospitaloperationsMInorOpt', $data);
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