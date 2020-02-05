<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesSpecialty;
use App\DischargesSpecialtyOthers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesSpecialtiesController extends Controller {

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

        $discharges_specialty = DB::table('hospoptdischargesspecialty as dischargesSpecialty')
            ->select( 
                'dischargesSpecialty.id',
                'dischargesSpecialty.hfhudcode',
                'dischargesSpecialty.typeofservice',
                'dischargesSpecialty.nopatients',
                'dischargesSpecialty.totallengthstay',
                'dischargesSpecialty.nppay',
                'dischargesSpecialty.nphservicecharity',
                'dischargesSpecialty.nphtotal',
                'dischargesSpecialty.phpay',
                'dischargesSpecialty.phservice',
                'dischargesSpecialty.phtotal',
                'dischargesSpecialty.hmo',
                'dischargesSpecialty.owwa',
                'dischargesSpecialty.recoveredimproved',
                'dischargesSpecialty.transferred',
                'dischargesSpecialty.hama',
                'dischargesSpecialty.absconded',
                'dischargesSpecialty.unimproved',
                'dischargesSpecialty.deathsbelow48',
                'dischargesSpecialty.deathsover48',
                'dischargesSpecialty.totaldeaths',
                'dischargesSpecialty.totaldischarges',
                'dischargesSpecialty.remarks',
                'dischargesSpecialty.reportingyear'
            );

        if ($data['id']){
            $discharges_specialty = $discharges_specialty->where('dischargesSpecialty.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_specialty = $discharges_specialty->where('classification.reportingyear', $data['reportingyear']);
        }

        $discharges_specialty = $discharges_specialty->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_specialty,
            'count'=>$discharges_specialty->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }


    public function show_others(Request $request){

        $data = array(
            'id'=>$request->input('id'),
            'reportingyear'=>$request->input('reportingyear'),
        );

        $discharges_specialty_others = DB::table('hospoptdischargesspecialtyothers as dischargesSpecialtyOthers')
            ->select( 
                'dischargesSpecialtyOthers.id',
                'dischargesSpecialtyOthers.hfhudcode',
                'dischargesSpecialtyOthers.othertypeofservicespecify',
                'dischargesSpecialtyOthers.nopatients',
                'dischargesSpecialtyOthers.totallengthstay',
                'dischargesSpecialtyOthers.nppay',
                'dischargesSpecialtyOthers.nphservicecharity',
                'dischargesSpecialtyOthers.nphtotal',
                'dischargesSpecialtyOthers.phpay',
                'dischargesSpecialtyOthers.phservice',
                'dischargesSpecialtyOthers.phtotal',
                'dischargesSpecialtyOthers.hmo',
                'dischargesSpecialtyOthers.owwa',
                'dischargesSpecialtyOthers.recoveredimproved',
                'dischargesSpecialtyOthers.transferred',
                'dischargesSpecialtyOthers.hama',
                'dischargesSpecialtyOthers.absconded',
                'dischargesSpecialtyOthers.unimproved',
                'dischargesSpecialtyOthers.deathsbelow48',
                'dischargesSpecialtyOthers.deathsover48',
                'dischargesSpecialtyOthers.totaldeaths',
                'dischargesSpecialtyOthers.totaldischarges',
                'dischargesSpecialtyOthers.remarks',
                'dischargesSpecialtyOthers.reportingyear'
            );

        if ($data['id']){
            $discharges_specialty_others = $discharges_specialty_others->where('dischargesSpecialtyOthers.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_specialty_others = $discharges_specialty_others->where('dischargesSpecialtyOthers.reportingyear', $data['reportingyear']);
        }

        $discharges_specialty_others = $discharges_specialty_others->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_specialty_others,
            'count'=>$discharges_specialty_others->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            try{
                if($fields['typeofservice']!=7){

                    $check_duplicate = DischargesSpecialty::where('reportingyear', $fields['reportingyear'])
                                                            ->where('typeofservice', $fields['typeofservice'])->count();
                    if($check_duplicate<=0){

                        $discharges_specialty = new DischargesSpecialty;
                        $discharges_specialty->hfhudcode                            = "NEHEHRSV201900093";
                        $discharges_specialty->typeofservice                        = $fields['typeofservice'];
                        $discharges_specialty->nopatients                           = $fields['nopatients'];
                        $discharges_specialty->totallengthstay                      = $fields['totallengthstay'];

                        $discharges_specialty->nppay                                = $fields['nppay'];
                        $discharges_specialty->nphservicecharity                    = $fields['nphservicecharity'];
                        $discharges_specialty->nphtotal                             = $fields['nppay']+$fields['nphservicecharity'];

                        $discharges_specialty->phpay                                = $fields['phpay'];
                        $discharges_specialty->phservice                            = $fields['phservice'];
                        $discharges_specialty->phtotal                              = $fields['phpay']+$fields['phservice'];

                        $discharges_specialty->hmo                                  = $fields['hmo'];
                        $discharges_specialty->owwa                                 = $fields['owwa'];
                        $discharges_specialty->recoveredimproved                    = $fields['recoveredimproved'];
                        $discharges_specialty->transferred                          = $fields['transferred'];
                        $discharges_specialty->hama                                 = $fields['hama'];
                        $discharges_specialty->absconded                            = $fields['absconded'];
                        $discharges_specialty->unimproved                           = $fields['unimproved'];
                        
                        $discharges_specialty->deathsbelow48                        = $fields['deathsbelow48'];
                        $discharges_specialty->deathsover48                         = $fields['deathsover48'];
                        $discharges_specialty->totaldeaths                          = $fields['deathsbelow48']+$fields['deathsover48'];

                        $discharges_specialty->totaldischarges                      = $fields['hmo']+$fields['owwa']+$fields['recoveredimproved']+$fields['transferred']+$fields['hama']+$fields['absconded']+$fields['unimproved'];
                        $discharges_specialty->remarks                              = $fields['remarks'];
                        $discharges_specialty->reportingyear                        = $fields['reportingyear'];
                        $discharges_specialty->save();

                        return response()->json([
                            'status' => 200,
                            'data' => null,
                            'message' => 'Successfully saved.'
                        ]);
                        
                    }else{
                        return response()->json([
                            'status' => 500,
                            'data' => null,
                            'message' => 'This type of service already exist!'
                        ]);
                    }

                }else{

                    $discharges_specialty_others = new DischargesSpecialtyOthers;
                    $discharges_specialty_others->hfhudcode                            = "NEHEHRSV201900093";
                    $discharges_specialty_others->othertypeofservicespecify            = $fields['othertypeofservicespecify'];
                    $discharges_specialty_others->nopatients                           = $fields['nopatients'];
                    $discharges_specialty_others->totallengthstay                      = $fields['totallengthstay'];

                    $discharges_specialty_others->nppay                                = $fields['nppay'];
                    $discharges_specialty_others->nphservicecharity                    = $fields['nphservicecharity'];
                    $discharges_specialty_others->nphtotal                             = $fields['nppay']+$fields['nphservicecharity'];

                    $discharges_specialty_others->phpay                                = $fields['phpay'];
                    $discharges_specialty_others->phservice                            = $fields['phservice'];
                    $discharges_specialty_others->phtotal                              = $fields['phpay']+$fields['phservice'];

                    $discharges_specialty_others->hmo                                  = $fields['hmo'];
                    $discharges_specialty_others->owwa                                 = $fields['owwa'];
                    $discharges_specialty_others->recoveredimproved                    = $fields['recoveredimproved'];
                    $discharges_specialty_others->transferred                          = $fields['transferred'];
                    $discharges_specialty_others->hama                                 = $fields['hama'];
                    $discharges_specialty_others->absconded                            = $fields['absconded'];
                    $discharges_specialty_others->unimproved                           = $fields['unimproved'];
                    
                    $discharges_specialty_others->deathsbelow48                        = $fields['deathsbelow48'];
                    $discharges_specialty_others->deathsover48                         = $fields['deathsover48'];
                    $discharges_specialty_others->totaldeaths                          = $fields['deathsbelow48']+$fields['deathsover48'];

                    $discharges_specialty_others->totaldischarges                      = $fields['hmo']+$fields['owwa']+$fields['recoveredimproved']+$fields['transferred']+$fields['hama']+$fields['absconded']+$fields['unimproved'];
                    $discharges_specialty_others->remarks                              = $fields['remarks'];
                    $discharges_specialty_others->reportingyear                        = $fields['reportingyear'];
                    $discharges_specialty_others->save();

                    return response()->json([
                        'status' => 200,
                        'data' => null,
                        'message' => 'Successfully saved.'
                    ]);
                }

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

    public function update(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        try{

            if($fields['typeofservice']!=7){
            
                $discharges_specialty = DischargesSpecialty::where('id', $fields['id'])
                                        ->where('reportingyear', $fields['reportingyear'])->first();
                $discharges_specialty->typeofservice                        = $fields['typeofservice'];
                $discharges_specialty->nopatients                           = $fields['nopatients'];
                $discharges_specialty->totallengthstay                      = $fields['totallengthstay'];

                $discharges_specialty->nppay                                = $fields['nppay'];
                $discharges_specialty->nphservicecharity                    = $fields['nphservicecharity'];
                $discharges_specialty->nphtotal                             = $fields['nppay']+$fields['nphservicecharity'];

                $discharges_specialty->phpay                                = $fields['phpay'];
                $discharges_specialty->phservice                            = $fields['phservice'];
                $discharges_specialty->phtotal                              = $fields['phpay']+$fields['phservice'];

                $discharges_specialty->hmo                                  = $fields['hmo'];
                $discharges_specialty->owwa                                 = $fields['owwa'];
                $discharges_specialty->recoveredimproved                    = $fields['recoveredimproved'];
                $discharges_specialty->transferred                          = $fields['transferred'];
                $discharges_specialty->hama                                 = $fields['hama'];
                $discharges_specialty->absconded                            = $fields['absconded'];
                $discharges_specialty->unimproved                           = $fields['unimproved'];
                
                $discharges_specialty->deathsbelow48                        = $fields['deathsbelow48'];
                $discharges_specialty->deathsover48                         = $fields['deathsover48'];
                $discharges_specialty->totaldeaths                          = $fields['deathsbelow48']+$fields['deathsover48'];

                $discharges_specialty->totaldischarges                      = $fields['hmo']+$fields['owwa']+$fields['recoveredimproved']+$fields['transferred']+$fields['hama']+$fields['absconded']+$fields['unimproved'];
                $discharges_specialty->remarks                              = $fields['remarks'];
                $discharges_specialty->reportingyear                        = $fields['reportingyear'];
                $discharges_specialty->save();

                return response()->json([
                    'status' => 200,
                    'data' => null,
                    'message' => 'Successfully updated.'
                ]);

            }else{

                $discharges_specialty_others = DischargesSpecialtyOthers::where('id', $fields['id'])
                                                ->where('reportingyear', $fields['reportingyear'])->first();
                $discharges_specialty_others->othertypeofservicespecify            = $fields['othertypeofservicespecify'];
                $discharges_specialty_others->nopatients                           = $fields['nopatients'];
                $discharges_specialty_others->totallengthstay                      = $fields['totallengthstay'];

                $discharges_specialty_others->nppay                                = $fields['nppay'];
                $discharges_specialty_others->nphservicecharity                    = $fields['nphservicecharity'];
                $discharges_specialty_others->nphtotal                             = $fields['nppay']+$fields['nphservicecharity'];

                $discharges_specialty_others->phpay                                = $fields['phpay'];
                $discharges_specialty_others->phservice                            = $fields['phservice'];
                $discharges_specialty_others->phtotal                              = $fields['phpay']+$fields['phservice'];

                $discharges_specialty_others->hmo                                  = $fields['hmo'];
                $discharges_specialty_others->owwa                                 = $fields['owwa'];
                $discharges_specialty_others->recoveredimproved                    = $fields['recoveredimproved'];
                $discharges_specialty_others->transferred                          = $fields['transferred'];
                $discharges_specialty_others->hama                                 = $fields['hama'];
                $discharges_specialty_others->absconded                            = $fields['absconded'];
                $discharges_specialty_others->unimproved                           = $fields['unimproved'];
                
                $discharges_specialty_others->deathsbelow48                        = $fields['deathsbelow48'];
                $discharges_specialty_others->deathsover48                         = $fields['deathsover48'];
                $discharges_specialty_others->totaldeaths                          = $fields['deathsbelow48']+$fields['deathsover48'];

                $discharges_specialty_others->totaldischarges                      = $fields['hmo']+$fields['owwa']+$fields['recoveredimproved']+$fields['transferred']+$fields['hama']+$fields['absconded']+$fields['unimproved'];
                $discharges_specialty_others->remarks                              = $fields['remarks'];
                $discharges_specialty_others->reportingyear                        = $fields['reportingyear'];
                $discharges_specialty_others->save();

                return response()->json([
                    'status' => 200,
                    'data' => null,
                    'message' => 'Successfully updated.'
                ]);

            }

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

                if($data['typeofservice']!=7){
            
                    DischargesSpecialty::where('id', $data['id'])->firstOrFail()->delete();

                    return response()->json([
                        'status' => 200,
                        'data' => 'null',
                        'message' => 'Successfully deleted.'
                    ]);

                }else{
                    DischargesSpecialtyOthers::where('id', $data['id'])->firstOrFail()->delete();

                    return response()->json([
                        'status' => 200,
                        'data' => 'null',
                        'message' => 'Successfully deleted.'
                    ]);
                }
                
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

 
    public function send_data_doh(){

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

        $discharges_specialty = DB::table('hospoptdischargesspecialty as dischargesSpecialty')
            ->select( 
                'dischargesSpecialty.id',
                'dischargesSpecialty.hfhudcode',
                'dischargesSpecialty.typeofservice',
                'dischargesSpecialty.nopatients',
                'dischargesSpecialty.totallengthstay',
                'dischargesSpecialty.nppay',
                'dischargesSpecialty.nphservicecharity',
                'dischargesSpecialty.nphtotal',
                'dischargesSpecialty.phpay',
                'dischargesSpecialty.phservice',
                'dischargesSpecialty.phtotal',
                'dischargesSpecialty.hmo',
                'dischargesSpecialty.owwa',
                'dischargesSpecialty.recoveredimproved',
                'dischargesSpecialty.transferred',
                'dischargesSpecialty.hama',
                'dischargesSpecialty.absconded',
                'dischargesSpecialty.unimproved',
                'dischargesSpecialty.deathsbelow48',
                'dischargesSpecialty.deathsover48',
                'dischargesSpecialty.totaldeaths',
                'dischargesSpecialty.totaldischarges',
                'dischargesSpecialty.remarks',
                'dischargesSpecialty.reportingyear'
            )->where('reportingyear', 2019)->get();

        foreach ($discharges_specialty as $discharges_specialty) {
            // code
            $data = [
                "hfhudcode" => "NEHEHRSV201900093", 
                "typeofservice" => $discharges_specialty->typeofservice, 
                "nopatients" => $discharges_specialty->nopatients,
                "totallengthstay" => $discharges_specialty->totallengthstay,
                "nppay" => $discharges_specialty->nppay,
                "nphservicecharity" => $discharges_specialty->nphservicecharity,
                "nphtotal" => $discharges_specialty->nphtotal,
                "phpay" => $discharges_specialty->phpay,
                "phservice" => $discharges_specialty->phservice,
                "phtotal" => $discharges_specialty->phtotal,
                "hmo" => $discharges_specialty->hmo,
                "owwa" => $discharges_specialty->owwa,
                "recoveredimproved" => $discharges_specialty->recoveredimproved,
                "transferred" => $discharges_specialty->transferred,
                "hama" => $discharges_specialty->hama,
                "absconded" => $discharges_specialty->absconded,
                "unimproved" => $discharges_specialty->unimproved,
                "deathsbelow48" => $discharges_specialty->deathsbelow48,
                "deathsover48" => $discharges_specialty->deathsover48,
                "totaldeaths" => $discharges_specialty->totaldeaths,
                "totaldischarges" => $discharges_specialty->totaldischarges,
                "remarks" => $discharges_specialty->remarks,
                "reportingyear" => 2017
            ];
    
            $response = $this->soapWrapper->call('Emr.hospOptDischargesSpecialty', $data);
        }


        $discharges_specialty_others = DB::table('hospoptdischargesspecialtyothers as dischargesSpecialtyOthers')
            ->select( 
                'dischargesSpecialtyOthers.id',
                'dischargesSpecialtyOthers.hfhudcode',
                'dischargesSpecialtyOthers.othertypeofservicespecify',
                'dischargesSpecialtyOthers.nopatients',
                'dischargesSpecialtyOthers.totallengthstay',
                'dischargesSpecialtyOthers.nppay',
                'dischargesSpecialtyOthers.nphservicecharity',
                'dischargesSpecialtyOthers.nphtotal',
                'dischargesSpecialtyOthers.phpay',
                'dischargesSpecialtyOthers.phservice',
                'dischargesSpecialtyOthers.phtotal',
                'dischargesSpecialtyOthers.hmo',
                'dischargesSpecialtyOthers.owwa',
                'dischargesSpecialtyOthers.recoveredimproved',
                'dischargesSpecialtyOthers.transferred',
                'dischargesSpecialtyOthers.hama',
                'dischargesSpecialtyOthers.absconded',
                'dischargesSpecialtyOthers.unimproved',
                'dischargesSpecialtyOthers.deathsbelow48',
                'dischargesSpecialtyOthers.deathsover48',
                'dischargesSpecialtyOthers.totaldeaths',
                'dischargesSpecialtyOthers.totaldischarges',
                'dischargesSpecialtyOthers.remarks',
                'dischargesSpecialtyOthers.reportingyear'
            )->where('reportingyear', 2019)->get();
        
        foreach ($discharges_specialty_others as $discharges_specialty_other) {
            // code
            $data = [
                "hfhudcode" => "NEHEHRSV201900093", 
                "othertypeofservicespecify" => $discharges_specialty_other->othertypeofservicespecify, 
                "nopatients" => $discharges_specialty_other->nopatients,
                "totallengthstay" => $discharges_specialty_other->totallengthstay,
                "nppay" => $discharges_specialty_other->nppay,
                "nphservicecharity" => $discharges_specialty_other->nphservicecharity,
                "nphtotal" => $discharges_specialty_other->nphtotal,
                "phpay" => $discharges_specialty_other->phpay,
                "phservice" => $discharges_specialty_other->phservice,
                "phtotal" => $discharges_specialty_other->phtotal,
                "hmo" => $discharges_specialty_other->hmo,
                "owwa" => $discharges_specialty_other->owwa,
                "recoveredimproved" => $discharges_specialty_other->recoveredimproved,
                "transferred" => $discharges_specialty_other->transferred,
                "hama" => $discharges_specialty_other->hama,
                "absconded" => $discharges_specialty_other->absconded,
                "unimproved" => $discharges_specialty_other->unimproved,
                "deathsbelow48" => $discharges_specialty_other->deathsbelow48,
                "deathsover48" => $discharges_specialty_other->deathsover48,
                "totaldeaths" => $discharges_specialty_other->totaldeaths,
                "totaldischarges" => $discharges_specialty_other->totaldischarges,
                "remarks" => $discharges_specialty_other->remarks,
                "reportingyear" => 2017
            ];
    
            $response = $this->soapWrapper->call('Emr.hospOptDischargesSpecialtyOthers', $data);
        }
 
    }
  	
}