<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesOPV;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesOPVController extends Controller {

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

        $discharges_OPV = DB::table('hospoptdischargesopv as dischargesOPV')
            ->select( 
                'dischargesOPV.id',
                'dischargesOPV.hfhudcode',
                'dischargesOPV.newpatient',
                'dischargesOPV.revisit',
                'dischargesOPV.adult',
                'dischargesOPV.pediatric',
                'dischargesOPV.adultgeneralmedicine',
                'dischargesOPV.specialtynonsurgical',
                'dischargesOPV.surgical',
                'dischargesOPV.antenatal',
                'dischargesOPV.postnatal',
                'dischargesOPV.reportingyear'
            );

        if ($data['id']){
            $discharges_OPV = $discharges_OPV->where('dischargesOPV.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_OPV = $discharges_OPV->where('dischargesOPV.reportingyear', $data['reportingyear']);
        }

        $discharges_OPV = $discharges_OPV->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_OPV,
            'count'=>$discharges_OPV->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $discharges_OPV = new DischargesOPV;
                $discharges_OPV->hfhudcode                          = "NEHEHRSV201900093";
                $discharges_OPV->newpatient                         = $fields['newpatient'];
                $discharges_OPV->revisit                            = $fields['revisit'];
                $discharges_OPV->adult                              = $fields['adult'];
                $discharges_OPV->pediatric                          = $fields['pediatric'];
                $discharges_OPV->adultgeneralmedicine               = $fields['adultgeneralmedicine'];
                $discharges_OPV->specialtynonsurgical               = $fields['specialtynonsurgical'];
                $discharges_OPV->surgical                           = $fields['surgical'];
                $discharges_OPV->antenatal                          = $fields['antenatal'];
                $discharges_OPV->postnatal                          = $fields['postnatal'];
                $discharges_OPV->reportingyear                      = $fields['reportingyear'];;
                $discharges_OPV->save();

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

            $discharges_OPV = DischargesOPV::where('reportingyear', $fields['reportingyear'])->first();
            $discharges_OPV->newpatient                         = $fields['newpatient'];
            $discharges_OPV->revisit                            = $fields['revisit'];
            $discharges_OPV->adult                              = $fields['adult'];
            $discharges_OPV->pediatric                          = $fields['pediatric'];
            $discharges_OPV->adultgeneralmedicine               = $fields['adultgeneralmedicine'];
            $discharges_OPV->specialtynonsurgical               = $fields['specialtynonsurgical'];
            $discharges_OPV->surgical                           = $fields['surgical'];
            $discharges_OPV->antenatal                          = $fields['antenatal'];
            $discharges_OPV->postnatal                          = $fields['postnatal'];
            $discharges_OPV->save();

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

            $discharges_OPV = DB::table('hospoptdischargesopv as dischargesOPV')
                ->select( 
                    'dischargesOPV.id',
                    'dischargesOPV.hfhudcode',
                    'dischargesOPV.newpatient',
                    'dischargesOPV.revisit',
                    'dischargesOPV.adult',
                    'dischargesOPV.pediatric',
                    'dischargesOPV.adultgeneralmedicine',
                    'dischargesOPV.specialtynonsurgical',
                    'dischargesOPV.surgical',
                    'dischargesOPV.antenatal',
                    'dischargesOPV.postnatal',
                    'dischargesOPV.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->first();

            $data = [ 
                "hfhudcode" => $discharges_OPV->hfhudcode, 
                "newpatient" => $discharges_OPV->newpatient, 
                "revisit" => $discharges_OPV->revisit,
                "adult" => $discharges_OPV->adult,
                "pediatric" => $discharges_OPV->pediatric,
                "adultgeneralmedicine" => $discharges_OPV->adultgeneralmedicine,
                "specialtynonsurgical" => $discharges_OPV->specialtynonsurgical,
                "surgical" => $discharges_OPV->surgical,
                "antenatal" => $discharges_OPV->antenatal,
                "postnatal" => $discharges_OPV->postnatal,
                "reportingyear" => $discharges_OPV->reportingyear
            ];

            $response = $this->soapWrapper->call('Emr.hospOptdischargesOPV', $data);
            
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