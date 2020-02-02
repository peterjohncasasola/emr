<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\SummaryOfPatient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SummaryOfPatientsController extends Controller {

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

        $summary_of_patients = DB::table('hospoptsummaryofpatients as summaryOfPatients')
            ->select( 
                'summaryOfPatients.id',
                'summaryOfPatients.hfhudcode',
                'summaryOfPatients.totalinpatients',
                'summaryOfPatients.totalnewborn',
                'summaryOfPatients.totaldischarges',
                'summaryOfPatients.totalpad',
                'summaryOfPatients.totalibd',
                'summaryOfPatients.totalinpatienttransto',
                'summaryOfPatients.totalinpatienttransfrom',
                'summaryOfPatients.totalpatientsremaining',
                'summaryOfPatients.reportingyear'
            );

        if ($data['id']){
            $summary_of_patients = $summary_of_patients->where('dischargesNumberDeliveries.id', $data['id']);
        }

        $summary_of_patients = $summary_of_patients->get();

        return response()->json([
            'status'=>200,
            'data'=>$summary_of_patients,
            'count'=>$summary_of_patients->count(),
            'message'=>''
        ]);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $summary_of_patients = new SummaryOfPatient;
                $summary_of_patients->hfhudcode                     = "NEHEHRSV201900093";
                $summary_of_patients->totalinpatients               = $fields['totalinpatients'];
                $summary_of_patients->totalnewborn                  = $fields['totalnewborn'];
                $summary_of_patients->totaldischarges               = $fields['totaldischarges'];
                $summary_of_patients->totalpad                      = $fields['totalpad'];
                $summary_of_patients->totalibd                      = $fields['totalibd'];
                $summary_of_patients->totalinpatienttransto         = $fields['totalinpatienttransto'];
                $summary_of_patients->totalinpatienttransfrom       = $fields['totalinpatienttransfrom'];
                $summary_of_patients->totalpatientsremaining        = $fields['totalpatientsremaining'];
                $summary_of_patients->reportingyear                 = 2019;
                $summary_of_patients->save();

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

            $summary_of_patients = SummaryOfPatient::where('reportingyear', $fields['reportingyear'])->first();
            $summary_of_patients->hfhudcode                     = "NEHEHRSV201900093";
            $summary_of_patients->totalinpatients               = $fields['totalinpatients'];
            $summary_of_patients->totalnewborn                  = $fields['totalnewborn'];
            $summary_of_patients->totaldischarges               = $fields['totaldischarges'];
            $summary_of_patients->totalpad                      = $fields['totalpad'];
            $summary_of_patients->totalibd                      = $fields['totalibd'];
            $summary_of_patients->totalinpatienttransto         = $fields['totalinpatienttransto'];
            $summary_of_patients->totalinpatienttransfrom       = $fields['totalinpatienttransfrom'];
            $summary_of_patients->totalpatientsremaining        = $fields['totalpatientsremaining'];
            $summary_of_patients->save();

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

        $summary_of_patients = DB::table('hospoptsummaryofpatients as summaryOfPatients')
            ->select( 
                'summaryOfPatients.id',
                'summaryOfPatients.hfhudcode',
                'summaryOfPatients.totalinpatients',
                'summaryOfPatients.totalnewborn',
                'summaryOfPatients.totaldischarges',
                'summaryOfPatients.totalpad',
                'summaryOfPatients.totalibd',
                'summaryOfPatients.totalinpatienttransto',
                'summaryOfPatients.totalinpatienttransfrom',
                'summaryOfPatients.totalpatientsremaining',
                'summaryOfPatients.reportingyear'
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
            "totalinpatients" => $summary_of_patients->totalinpatients, 
            "totalnewborn" => $summary_of_patients->totalnewborn, 
            "totaldischarges" => $summary_of_patients->totaldischarges,
            "totalpad" => $summary_of_patients->totalpad,
            "totalibd" => $summary_of_patients->totalibd,
            "totalinpatienttransto" => $summary_of_patients->totalinpatienttransto,
            "totalinpatienttransfrom" => $summary_of_patients->totalinpatienttransfrom,
            "totalpatientsremaining" => $summary_of_patients->totalpatientsremaining,
            "reportingyear" => 2017
        ];

        $response = $this->soapWrapper->call('Emr.hospOptSummaryOfPatients', $data);
        return response($response, 200)->header('Content-Type', 'application/xml');
        exit;
    }
  	
}