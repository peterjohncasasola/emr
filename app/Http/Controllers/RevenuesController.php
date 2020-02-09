<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Revenue;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class RevenuesController extends Controller {
    
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

        $revenues = DB::table('revenues as revenue')
            ->select( 
                'revenue.id',
                'revenue.hfhudcode',
                'revenue.amountfromdoh',
                'revenue.amountfromlgu',
                'revenue.amountfromdonor',
                'revenue.amountfromprivateorg',
                'revenue.amountfromphilhealth',
                'revenue.amountfrompatient',
                'revenue.amountfromreimbursement',
                'revenue.amountfromothersources',
                'revenue.grandtotal',
                'revenue.submitted_at'
            );

        if ($data['id']){
            $revenues = $revenues->where('revenue.id', $data['id']);
        }

        if ($data['reportingyear']){
            $revenues = $revenues->where('revenue.reportingyear', $data['reportingyear']);
        }

        $revenues = $revenues->get();

        return response()->json([
            'status'=>200,
            'data'=>$revenues,
            'count'=>$revenues->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $revenue = new Revenue;
                $revenue->hfhudcode                     = "NEHEHRSV201900093";
                $revenue->amountfromdoh                 = $fields['amountfromdoh'];
                $revenue->amountfromlgu                 = $fields['amountfromlgu'];
                $revenue->amountfromdonor               = $fields['amountfromdonor'];
                $revenue->amountfromprivateorg          = $fields['amountfromprivateorg'];
                $revenue->amountfromphilhealth          = $fields['amountfromphilhealth'];
                $revenue->amountfrompatient             = $fields['amountfrompatient'];
                $revenue->amountfromreimbursement       = $fields['amountfromreimbursement'];
                $revenue->amountfromothersources        = $fields['amountfromothersources'];
                $revenue->grandtotal                    = $revenue->amountfromdoh+$revenue->amountfromlgu+$revenue->amountfromdonor+
                                                           $revenue->amountfromprivateorg+$revenue->amountfromphilhealth+$revenue->amountfrompatient+
                                                           $revenue->amountfromreimbursement+$revenue->amountfromothersources;
                $revenue->reportingyear                 = $fields['reportingyear'];
                $revenue->save();

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

            $revenue = Revenue::where('reportingyear', $fields['reportingyear'])->first();
            $revenue->hfhudcode                     = "SAMPLECODE01";
            $revenue->amountfromdoh                 = $fields['amountfromdoh'];
            $revenue->amountfromlgu                 = $fields['amountfromlgu'];
            $revenue->amountfromdonor               = $fields['amountfromdonor'];
            $revenue->amountfromprivateorg          = $fields['amountfromprivateorg'];
            $revenue->amountfromphilhealth          = $fields['amountfromphilhealth'];
            $revenue->amountfrompatient             = $fields['amountfrompatient'];
            $revenue->amountfromreimbursement       = $fields['amountfromreimbursement'];
            $revenue->amountfromothersources        = $fields['amountfromothersources'];
            $revenue->grandtotal                    = $revenue->amountfromdoh+$revenue->amountfromlgu+$revenue->amountfromdonor+
                                                        $revenue->amountfromprivateorg+$revenue->amountfromphilhealth+$revenue->amountfrompatient+
                                                        $revenue->amountfromreimbursement+$revenue->amountfromothersources;
            $revenue->reportingyear                 = $fields['reportingyear'];
            $revenue->save();

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

            $revenue = DB::table('revenues as revenue')
                ->select(
                    'revenue.id',
                    'revenue.hfhudcode',
                    'revenue.amountfromdoh',
                    'revenue.amountfromlgu',
                    'revenue.amountfromdonor',
                    'revenue.amountfromprivateorg',
                    'revenue.amountfromphilhealth',
                    'revenue.amountfrompatient',
                    'revenue.amountfromreimbursement',
                    'revenue.amountfromothersources',
                    'revenue.grandtotal',
                    'revenue.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->first();

            $data = [  
                "hfhudcode" => $revenue->hfhudcode, 
                "amountfromdoh" => $revenue->amountfromdoh, 
                "amountfromlgu" => $revenue->amountfromlgu, 
                "amountfromdonor" => $revenue->amountfromdonor, 
                "amountfromprivateorg" => $revenue->amountfromprivateorg, 
                "amountfromphilhealth" => $revenue->amountfromphilhealth, 
                "amountfrompatient" => $revenue->amountfrompatient, 
                "amountfromreimbursement" => $revenue->amountfromreimbursement, 
                "amountfromothersources" => $revenue->amountfromothersources, 
                "grandtotal" => $revenue->grandtotal, 
                "reportingyear" => $revenue->reportingyear, 
            ];

            $response = $this->soapWrapper->call('Emr.revenues', $data);

            $revenue = Revenue::where('reportingyear', $fields['reportingyear'])->first(); 
            $revenue->submitted_at    = Carbon::now();
            $revenue->save();

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
    }
  	
}