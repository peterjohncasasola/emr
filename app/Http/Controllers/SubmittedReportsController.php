<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Config;

use DB;
use Auth;
use App\SubmittedReport;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class SubmittedReportsController extends Controller {

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
        
        $submittedreport = DB::table('submittedreports as submittedreport')
            ->select( 
                'submittedreport.id',
                'submittedreport.hfhudcode',
                'submittedreport.reportingyear',
                'submittedreport.reportingstatus',
                'submittedreport.reportedby',
                'submittedreport.designation',
                'submittedreport.section',
                'submittedreport.department',
                'submittedreport.datereported',
                'submittedreport.validatedby',
                'submittedreport.datevalidated',
                'submittedreport.submissionmode'
            );

        if ($data['id']){
            $submittedreport = $submittedreport->where('submittedreport.id', $data['id']);
        }

        if ($data['reportingyear']){
            $submittedreport = $submittedreport->where('submittedreport.reportingyear', $data['reportingyear']);
        }

        $submittedreport = $submittedreport->get();

        return response()->json([
            'status'=>200,
            'data'=>$submittedreport,
            'count'=>$submittedreport->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $submittedreport = new SubmittedReport;
                $submittedreport->hfhudcode                     = "NEHEHRSV201900093";
                $submittedreport->reportingyear                 = $fields['reportingyear'];
                $submittedreport->reportingstatus               = $fields['reportingstatus'];
                $submittedreport->reportedby                    = $fields['reportedby'];
                $submittedreport->designation                   = $fields['designation'];
                $submittedreport->section                       = $fields['section'];
                $submittedreport->department                    = $fields['department'];
                $submittedreport->datereported                  = $fields['datereported'];
                $submittedreport->validatedby                   = $fields['validatedby'];
                $submittedreport->datevalidated                 = $fields['datevalidated'];
                $submittedreport->submissionmode                = $fields['submissionmode'];
                $submittedreport->save();

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

            $submittedreport = SubmittedReport::where('reportingyear', $fields['reportingyear'])->first();
            $submittedreport->hfhudcode                     = "NEHEHRSV201900093";
            $submittedreport->reportingyear                 = $fields['reportingyear'];
            $submittedreport->reportingstatus               = $fields['reportingstatus'];
            $submittedreport->reportedby                    = $fields['reportedby'];
            $submittedreport->designation                   = $fields['designation'];
            $submittedreport->section                       = $fields['section'];
            $submittedreport->department                    = $fields['department'];
            $submittedreport->datereported                  = $fields['datereported'];
            $submittedreport->validatedby                   = $fields['validatedby'];
            $submittedreport->datevalidated                 = $fields['datevalidated'];
            $submittedreport->submissionmode                = $fields['submissionmode'];
            $submittedreport->save();

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

            $submittedreport = DB::table('submittedreports as submittedreport')
                ->select( 
                    'submittedreport.id',
                    'submittedreport.hfhudcode',
                    'submittedreport.reportingyear',
                    'submittedreport.reportingstatus',
                    'submittedreport.reportedby',
                    'submittedreport.designation',
                    'submittedreport.section',
                    'submittedreport.department',
                    'submittedreport.datereported',
                    'submittedreport.validatedby',
                    'submittedreport.datevalidated',
                    'submittedreport.submissionmode'
                )->where('reportingyear', $fields['reportingyear'])->first();

            $data = [
                "hfhudcode" => $submittedreport->hfhudcode, 
                "reportingyear" => $submittedreport->reportingyear, 
                "reportingstatus" => $submittedreport->reportingstatus, 
                "reportedby" => $submittedreport->reportedby, 
                "designation" => $submittedreport->designation, 
                "section" => $submittedreport->section, 
                "department" => $submittedreport->department, 
                "datereported" => $submittedreport->datereported, 
                "validatedby" => $submittedreport->validatedby, 
                "datevalidated" => $submittedreport->datevalidated
            ];

            $response = $this->soapWrapper->call('Emr.submittedReports', $data);

            $submittedreport = SubmittedReport::where('reportingyear', $fields['reportingyear'])->first();
            $submittedreport->submitted_at    = Carbon::now();
            $submittedreport->save();

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