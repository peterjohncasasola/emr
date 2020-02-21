<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesEV;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesEVController extends Controller {

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

        $discharges_EV = DB::table('hospoptdischargesev as dischargesEV')
            ->select( 
                'dischargesEV.id',
                'dischargesEV.hfhudcode',
                'dischargesEV.emergencyvisits',
                'dischargesEV.emergencyvisitsadult',
                'dischargesEV.emergencyvisitspediatric',
                'dischargesEV.evfromfacilitytoanother',
                'dischargesEV.reportingyear'
            );

        if ($data['id']){
            $discharges_EV = $discharges_EV->where('dischargesEV.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_EV = $discharges_EV->where('dischargesEV.reportingyear', $data['reportingyear']);
        }

        $discharges_EV = $discharges_EV->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_EV,
            'count'=>$discharges_EV->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $discharges_EV = new DischargesEV;
                $discharges_EV->hfhudcode                           = "NEHEHRSV201900093";
                $discharges_EV->emergencyvisits                     = $fields['emergencyvisits'];
                $discharges_EV->emergencyvisitsadult                = $fields['emergencyvisitsadult'];
                $discharges_EV->emergencyvisitspediatric            = $fields['emergencyvisitspediatric'];
                $discharges_EV->evfromfacilitytoanother             = $fields['evfromfacilitytoanother'];
                $discharges_EV->reportingyear                       = $fields['reportingyear'];
                $discharges_EV->save();

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

            $discharges_EV = DischargesEV::where('reportingyear', $fields['reportingyear'])->first();
            $discharges_EV->emergencyvisits                     = $fields['emergencyvisits'];
            $discharges_EV->emergencyvisitsadult                = $fields['emergencyvisitsadult'];
            $discharges_EV->emergencyvisitspediatric            = $fields['emergencyvisitspediatric'];
            $discharges_EV->evfromfacilitytoanother             = $fields['evfromfacilitytoanother'];
            $discharges_EV->save();

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

            $discharges_EV = DB::table('hospoptdischargesev as dischargesEV')
                ->select( 
                    'dischargesEV.id',
                    'dischargesEV.hfhudcode',
                    'dischargesEV.emergencyvisits',
                    'dischargesEV.emergencyvisitsadult',
                    'dischargesEV.emergencyvisitspediatric',
                    'dischargesEV.evfromfacilitytoanother',
                    'dischargesEV.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->first();

            $data = [
                "hfhudcode" => $discharges_EV->hfhudcode, 
                "emergencyvisits" => $discharges_EV->emergencyvisits, 
                "emergencyvisitsadult" => $discharges_EV->emergencyvisitsadult,
                "emergencyvisitspediatric" => $discharges_EV->emergencyvisitspediatric,
                "evfromfacilitytoanother" => $discharges_EV->evfromfacilitytoanother,
                "reportingyear" => $discharges_EV->reportingyear
            ];

            $response = $this->soapWrapper->call('Emr.hospOptDischargesEV', $data);

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