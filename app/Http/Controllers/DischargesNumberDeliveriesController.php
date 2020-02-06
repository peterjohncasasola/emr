<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesNumberDelivery;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesNumberDeliveriesController extends Controller {

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

        $discharges_number_delivery = DB::table('hospoptdischargesnumberdeliveries as dischargesNumberDeliveries')
            ->select( 
                'dischargesNumberDeliveries.id',
                'dischargesNumberDeliveries.hfhudcode',
                'dischargesNumberDeliveries.totalifdelivery',
                'dischargesNumberDeliveries.totallbvdelivery',
                'dischargesNumberDeliveries.totallbcdelivery',
                'dischargesNumberDeliveries.totalotherdelivery',
                'dischargesNumberDeliveries.reportingyear'
            );

        if ($data['id']){
            $discharges_number_delivery = $discharges_number_delivery->where('dischargesNumberDeliveries.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_number_delivery = $discharges_number_delivery->where('dischargesNumberDeliveries.reportingyear', $data['reportingyear']);
        }

        $discharges_number_delivery = $discharges_number_delivery->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_number_delivery,
            'count'=>$discharges_number_delivery->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $discharges_number_delivery = new DischargesNumberDelivery;
                $discharges_number_delivery->hfhudcode                     = "NEHEHRSV201900093";
                $discharges_number_delivery->totalifdelivery               = $fields['totalifdelivery'];
                $discharges_number_delivery->totallbvdelivery              = $fields['totallbvdelivery'];
                $discharges_number_delivery->totallbcdelivery              = $fields['totallbcdelivery'];
                $discharges_number_delivery->totalotherdelivery            = $fields['totalotherdelivery'];
                $discharges_number_delivery->reportingyear                 = 2019;
                $discharges_number_delivery->save();

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

            $discharges_number_delivery = DischargesNumberDelivery::where('reportingyear', $fields['reportingyear'])->first();
            $discharges_number_delivery->hfhudcode                     = "NEHEHRSV201900093";
            $discharges_number_delivery->totalifdelivery               = $fields['totalifdelivery'];
            $discharges_number_delivery->totallbvdelivery              = $fields['totallbvdelivery'];
            $discharges_number_delivery->totallbcdelivery              = $fields['totallbcdelivery'];
            $discharges_number_delivery->totalotherdelivery            = $fields['totalotherdelivery'];
            $discharges_number_delivery->save();

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

        $discharges_number_delivery = DB::table('hospoptdischargesnumberdeliveries as dischargesNumberDeliveries')
            ->select( 
                'dischargesNumberDeliveries.id',
                'dischargesNumberDeliveries.hfhudcode',
                'dischargesNumberDeliveries.totalifdelivery',
                'dischargesNumberDeliveries.totallbvdelivery',
                'dischargesNumberDeliveries.totallbcdelivery',
                'dischargesNumberDeliveries.totalotherdelivery',
                'dischargesNumberDeliveries.reportingyear'
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
            "totalifdelivery" => $discharges_number_delivery->totalifdelivery, 
            "totallbvdelivery" => $discharges_number_delivery->totallbvdelivery, 
            "totallbcdelivery" => $discharges_number_delivery->totallbcdelivery,
            "totalotherdelivery" => $discharges_number_delivery->totalotherdelivery,
            "reportingyear" => 2017
        ];

        $response = $this->soapWrapper->call('Emr.hospOptDischargesNumberDeliveries', $data);
        return response($response, 200)->header('Content-Type', 'application/xml');
        exit;
    }
  	
}