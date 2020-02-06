<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\OperationsHAI;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class OperationsHAIController extends Controller {

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

        $operations_HAI = DB::table('hospitaloperationshai as operationsHAI')
            ->select( 
                'operationsHAI.id',
                'operationsHAI.hfhudcode',
                'operationsHAI.numhai',
                'operationsHAI.numdischarges',
                'operationsHAI.infectionrate',
                'operationsHAI.patientnumvap',
                'operationsHAI.totalventilatordays',
                'operationsHAI.resultvap',
                'operationsHAI.patientnumbsi',
                'operationsHAI.totalnumcentralline',
                'operationsHAI.resultbsi',
                'operationsHAI.patientnumuti',
                'operationsHAI.totalcatheterdays',
                'operationsHAI.resultuti',
                'operationsHAI.numssi',
                'operationsHAI.totalproceduresdone',
                'operationsHAI.resultssi',
                'operationsHAI.reportingyear'
            );

        if ($data['id']){
            $operations_HAI = $operations_HAI->where('operationsHAI.id', $data['id']);
        }

        if ($data['reportingyear']){
            $operations_HAI = $operations_HAI->where('operationsHAI.reportingyear', $data['reportingyear']);
        }

        $operations_HAI = $operations_HAI->get();

        return response()->json([
            'status'=>200,
            'data'=>$operations_HAI,
            'count'=>$operations_HAI->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $operations_HAI = new OperationsHAI;
                $operations_HAI->hfhudcode                          = "NEHEHRSV201900093";
                // $operations_HAI->numhai                             = $fields['numhai'];
                // $operations_HAI->infectionrate                      = $fields['infectionrate'];

                $operations_HAI->patientnumvap                      = $fields['patientnumvap'];
                $operations_HAI->totalventilatordays                = $fields['totalventilatordays'];
                $operations_HAI->resultvap                          = ($fields['patientnumvap']*1000)/$fields['totalventilatordays'];

                $operations_HAI->patientnumbsi                      = $fields['patientnumbsi'];
                $operations_HAI->totalnumcentralline                = $fields['totalnumcentralline'];
                $operations_HAI->resultbsi                          = ($fields['patientnumbsi']*1000)/$fields['totalnumcentralline'];

                $operations_HAI->patientnumuti                      = $fields['patientnumuti'];
                $operations_HAI->totalcatheterdays                  = $fields['totalcatheterdays'];
                $operations_HAI->resultuti                          = ($fields['patientnumuti']*1000)/$fields['totalcatheterdays'];

                $operations_HAI->numssi                             = $fields['numssi'];
                $operations_HAI->totalproceduresdone                = $fields['totalproceduresdone'];
                $operations_HAI->resultssi                          = ($fields['numssi']*100)/$fields['totalproceduresdone'];

                $operations_HAI->reportingyear                      = 2019;
                $operations_HAI->save();

                return response()->json([
                    'status' => 200,
                    'data' => null,
                    'message' => 'Successfully saved.'
                ]);

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

            $operations_HAI = OperationsHAI::where('reportingyear', $fields['reportingyear'])->first();
            // $operations_HAI->numhai                             = $fields['numhai'];
            // $operations_HAI->infectionrate                      = $fields['infectionrate'];
            $operations_HAI->patientnumvap                      = $fields['patientnumvap'];
            $operations_HAI->totalventilatordays                = $fields['totalventilatordays'];
            $operations_HAI->resultvap                          = $fields['resultvap'];
            $operations_HAI->patientnumbsi                      = $fields['patientnumbsi'];
            $operations_HAI->totalnumcentralline                = $fields['totalnumcentralline'];
            $operations_HAI->resultbsi                          = $fields['resultbsi'];
            $operations_HAI->patientnumuti                      = $fields['patientnumuti'];
            $operations_HAI->totalcatheterdays                  = $fields['totalcatheterdays'];
            $operations_HAI->resultuti                          = $fields['resultuti'];
            $operations_HAI->numssi                             = $fields['numssi'];
            $operations_HAI->totalproceduresdone                = $fields['totalproceduresdone'];
            $operations_HAI->resultssi                          = $fields['resultssi'];
            $operations_HAI->save();

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

        $operations_HAI = DB::table('hospitaloperationshai as operationsHAI')
            ->select( 
                'operationsHAI.id',
                'operationsHAI.hfhudcode',
                'operationsHAI.numhai',
                'operationsHAI.numdischarges',
                'operationsHAI.infectionrate',
                'operationsHAI.patientnumvap',
                'operationsHAI.totalventilatordays',
                'operationsHAI.resultvap',
                'operationsHAI.patientnumbsi',
                'operationsHAI.totalnumcentralline',
                'operationsHAI.resultbsi',
                'operationsHAI.patientnumuti',
                'operationsHAI.totalcatheterdays',
                'operationsHAI.resultuti',
                'operationsHAI.numssi',
                'operationsHAI.totalproceduresdone',
                'operationsHAI.resultssi',
                'operationsHAI.reportingyear'
            )->where('reportingyear', 2019)->first();

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

        $data = [
            "hfhudcode" => "NEHEHRSV201900093", 
            "numhai" => $operations_HAI->numhai, 
            "numdischarges" => $operations_HAI->numdischarges,
            "infectionrate" => $operations_HAI->infectionrate,
            "patientnumvap" => $operations_HAI->patientnumvap,
            "totalventilatordays" => $operations_HAI->totalventilatordays,
            "resultvap" => $operations_HAI->resultvap,
            "patientnumbsi" => $operations_HAI->patientnumbsi,
            "totalnumcentralline" => $operations_HAI->totalnumcentralline,
            "resultbsi" => $operations_HAI->resultbsi,
            "patientnumuti" => $operations_HAI->patientnumuti,
            "totalcatheterdays" => $operations_HAI->totalcatheterdays,
            "resultuti" => $operations_HAI->resultuti,
            "numssi" => $operations_HAI->numssi,
            "totalproceduresdone" => $operations_HAI->totalproceduresdone,
            "resultssi" => $operations_HAI->resultssi,
            "reportingyear" => 2017
        ];

        $response = $this->soapWrapper->call('Emr.hospitalOperationsHAI', $data);
        return response($response, 200)->header('Content-Type', 'application/xml');
        exit;
 
    }
  	
}