<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Classification;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class ClassificationsController extends Controller {

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

        $classification = DB::table('geninfoclassification as classification')
            ->select( 
                'classification.id',
                'classification.hfhudcode',
                'classification.servicecapability',
                'classification.general',
                'classification.specialty',
                'classification.specialtyspecify',
                'classification.traumacapability',
                'classification.natureofownership',
                'classification.government',
                'classification.national',
                'classification.local',
                'classification.private',
                'classification.ownershipothers',
                'classification.reportingyear',
                'classification.submitted_at'
            );

        if ($data['id']){
            $classification = $classification->where('classification.id', $data['id']);
        }

        if ($data['reportingyear']){
            $classification = $classification->where('classification.reportingyear', $data['reportingyear']);
        }

        $classification = $classification->get();

        return response()->json([
            'status'=>200,
            'data'=>$classification,
            'count'=>$classification->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $classification = new Classification;
                $classification->hfhudcode                     = "NEHEHRSV201900093";
                $classification->servicecapability             = $fields['servicecapability'];

                if($fields['servicecapability']==1){
                    $classification->general                   = $fields['general'];
                    $classification->specialty                 = 0; 
                    $classification->specialtyspecify          = 'NA';
                }elseif($fields['servicecapability']==2){
                    $classification->general                   = 0;
                    $classification->specialty                 = $fields['specialty']; 
                    $classification->specialtyspecify          = $fields['specialtyspecify'];
                }else{
                    $classification->general                   = 0;
                    $classification->specialty                 = 0; 
                    $classification->specialtyspecify          = 'NA';
                }
                
                $classification->traumacapability              = $fields['traumacapability'];
                $classification->natureofownership             = $fields['natureofownership'];

                if($fields['natureofownership']==1){
                    $classification->government                = $fields['government'];
                    $classification->private                   = 0;

                    if($fields['government']==1){
                        $classification->national              = $fields['national'];
                        $classification->local                 = 0;
                    }elseif($fields['government']==1){
                        $classification->national              = 0;
                        $classification->local                 = $fields['local'];
                    }else{
                        $classification->national              = 0;
                        $classification->local                 = 0;
                    }
                }else{
                    $classification->government                = 0;
                    $classification->national                  = 0;
                    $classification->local                     = 0;
                    $classification->private                   = $fields['private'];
                }

                $classification->ownershipothers               = (!is_null($fields['ownershipothers']))?$fields['ownershipothers']:'NA';
                $classification->reportingyear                 = $fields['reportingyear'];
                $classification->save();

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
        // try{

            $classification = Classification::where('reportingyear', $fields['reportingyear'])->first();
            $classification->servicecapability             = $fields['servicecapability'];

                if($fields['servicecapability']==1){
                    $classification->general                   = $fields['general'];
                    $classification->specialty                 = 0; 
                    $classification->specialtyspecify          = 'NA';
                    $classification->traumacapability          = $fields['traumacapability'];
                }elseif($fields['servicecapability']==2){
                    $classification->general                   = 0;
                    $classification->specialty                 = $fields['specialty']; 
                    $classification->specialtyspecify          = $fields['specialtyspecify'];
                    $classification->traumacapability          = $fields['traumacapability'];
                }else{
                    $classification->general                   = 0;
                    $classification->specialty                 = 0; 
                    $classification->specialtyspecify          = 'NA';
                    $classification->traumacapability          = 0;
                }
                
                
                $classification->natureofownership             = $fields['natureofownership'];

                if($fields['natureofownership']==1){
                    $classification->government                = $fields['government'];
                    $classification->private                   = 0;

                    if($fields['government']==1){
                        $classification->national              = $fields['national'];
                        $classification->local                 = 0;
                    }elseif($fields['government']==1){
                        $classification->national              = 0;
                        $classification->local                 = $fields['local'];
                    }else{
                        $classification->national              = 0;
                        $classification->local                 = 0;
                    }
                }else{
                    $classification->government                = 0;
                    $classification->national                  = 0;
                    $classification->local                     = 0;
                    $classification->private                   = $fields['private'];
                }

                $classification->ownershipothers               = (!is_null($fields['ownershipothers']))?$fields['ownershipothers']:'NA';
                $classification->reportingyear                 = $fields['reportingyear'];
                $classification->save();
            $classification->save();

            return response()->json([
                'status' => 200,
                'data' => null,
                'message' => 'Successfully updated.'
            ]);

        //   }
        //   catch (\Exception $e) 
        //   {
        //     return response()->json([
        //       'status' => 500,
        //       'data' => null,
        //       'message' => 'Error, please try again!'
        //     ]);
        //   }
        });

        return $transaction;
    }

    public function send_data_doh(){

        $classification = DB::table('geninfoclassification as classification')
            ->select( 
                'classification.id',
                'classification.hfhudcode',
                'classification.servicecapability',
                'classification.general',
                'classification.specialty',
                'classification.specialtyspecify',
                'classification.traumacapability',
                'classification.natureofownership',
                'classification.government',
                'classification.national',
                'classification.local',
                'classification.private',
                'classification.ownershipothers',
                'classification.reportingyear'
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
            "servicecapability" => $classification->servicecapability, 
            "general" => $classification->general, 
            "specialty" => $classification->specialty, 
            "specialtyspecify" => $classification->specialtyspecify, 
            "traumacapability" => $classification->traumacapability, 
            "natureofownership" => $classification->natureofownership, 
            "government" => $classification->government, 
            "national" => $classification->national, 
            "local" => $classification->local, 
            "private" => $classification->private,
            "reportingyear" => 2017,
            "ownershipothers" => $classification->ownershipothers, 
        ];

        $response = $this->soapWrapper->call('Emr.genInfoClassification', $data);

        $classification = Classification::where('reportingyear', 2019)->first();
        $classification->submitted_at    = Carbon::now();
        $classification->save();

        // return response($response, 200)->header('Content-Type', 'application/xml');
        // exit;
    }
  	
}