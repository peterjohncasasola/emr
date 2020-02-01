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
        );

        $operations_major = DB::table('hospitalOperationsMajorOpt as operationsMajorOpt')
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

        $operations_major = $operations_major->get();

        return response()->json([
            'status'=>200,
            'data'=>$operations_major,
            'count'=>$operations_major->count(),
            'message'=>''
        ]);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $operations_major_count = SurgicalOperationMajor::count();

                if($operations_major_count<10){

                    $check_duplicate = SurgicalOperationMajor::where('operationcode', $fields['operationcode'])->count();
                    if($check_duplicate<=0){

                        $operations_major = new SurgicalOperationMajor;
                        $operations_major->hfhudcode                        = "NEHEHRSV201900093";
                        $operations_major->operationcode                    = $fields['operationcode'];
                        $operations_major->surgicaloperation                = $fields['surgicaloperation'];
                        $operations_major->number                           = $fields['number'];
                        $operations_major->reportingyear                    = 2019;
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

    public function send_data_doh(){

        $major_operations = DB::table('hospitalOperationsMajorOpt as operationsMajorOpt')
            ->select( 
                'operationsMajorOpt.id',
                'operationsMajorOpt.hfhudcode',
                'operationsMajorOpt.operationcode',
                'operationsMajorOpt.surgicaloperation',
                'operationsMajorOpt.number',
                'operationsMajorOpt.reportingyear'
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

        foreach ($major_operations as $major_operation) {
            // code
            $data = [
                "hfhudcode" => "NEHEHRSV201900093", 
                "operationcode" => $major_operation->operationcode, 
                "surgicaloperation" => $major_operation->surgicaloperation, 
                "number" => $major_operation->number,
                "reportingyear" => 2017
            ];
        
            $response = $this->soapWrapper->call('Emr.hospitalOperationsMajorOpt', $data);
        }
        
    }
  	
}