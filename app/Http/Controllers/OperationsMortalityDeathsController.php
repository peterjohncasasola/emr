<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\MortalityDeath;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class OperationsMortalityDeathsController extends Controller {

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
            'icd10code'=>$request->input('icd10code'),
        );

        $mortality_deaths = DB::table('hospitaloperationsmortalitydeaths as mortalityDeaths')
            ->select( 
                'mortalityDeaths.id',
                'mortalityDeaths.hfhudcode',
                'mortalityDeaths.icd10desc',
                'mortalityDeaths.munder1',
                'mortalityDeaths.funder1',
                'mortalityDeaths.m1to4',
                'mortalityDeaths.f1to4',
                'mortalityDeaths.m5to9',
                'mortalityDeaths.f5to9',
                'mortalityDeaths.m10to14',
                'mortalityDeaths.f10to14',
                'mortalityDeaths.m15to19',
                'mortalityDeaths.f15to19',
                'mortalityDeaths.m20to24',
                'mortalityDeaths.f20to24',
                'mortalityDeaths.m25to29',
                'mortalityDeaths.f25to29',
                'mortalityDeaths.m30to34',
                'mortalityDeaths.f30to34',
                'mortalityDeaths.m35to39',
                'mortalityDeaths.f35to39',
                'mortalityDeaths.m40to44',
                'mortalityDeaths.f40to44',
                'mortalityDeaths.m45to49',
                'mortalityDeaths.f45to49',
                'mortalityDeaths.m50to54',
                'mortalityDeaths.f50to54',
                'mortalityDeaths.m55to59',
                'mortalityDeaths.f55to59',
                'mortalityDeaths.m60to64',
                'mortalityDeaths.f60to64',
                'mortalityDeaths.m65to69',
                'mortalityDeaths.f65to69',
                'mortalityDeaths.m70over',
                'mortalityDeaths.f70over',
                'mortalityDeaths.msubtotal',
                'mortalityDeaths.fsubtotal',
                'mortalityDeaths.grandtotal',
                'mortalityDeaths.icd10code',
                'mortalityDeaths.icd10category',
                'mortalityDeaths.reportingyear'
            )->orderBy('mortalityDeaths.grandtotal', 'DESC');

        if ($data['id']){
            $mortality_deaths = $mortality_deaths->where('mortalityDeaths.id', $data['id']);
        }

        if ($data['reportingyear']){
            $mortality_deaths = $mortality_deaths->where('mortalityDeaths.reportingyear', $data['reportingyear']);
        }

        if ($data['icd10code']){
            $mortality_deaths = $mortality_deaths->where('mortalityDeaths.icd10code', $data['icd10code']);
        }

        $mortality_deaths = $mortality_deaths->get();

        return response()->json([
            'status'=>200,
            'data'=>$mortality_deaths,
            'count'=>$mortality_deaths->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $fields['msubtotal'] = 50;
                $fields['fsubtotal'] = 50;
                $fields['grandtotal'] = 100;

                if(MortalityDeath::count()<10){

                    $check_duplicate = MortalityDeath::where('icd10code', $fields['icd10code'])->where('reportingyear', $fields['reportingyear'])->count();
                    if($check_duplicate<=0){

                        $mortality_deaths = new MortalityDeath;
                        $mortality_deaths->hfhudcode                        = "NEHEHRSV201900093";
                        $mortality_deaths->icd10desc                        = $fields['icd10desc'];
                        $mortality_deaths->munder1                          = $fields['munder1'];
                        $mortality_deaths->funder1                          = $fields['funder1'];
                        $mortality_deaths->m1to4                            = $fields['m1to4'];
                        $mortality_deaths->f1to4                            = $fields['f1to4'];
                        $mortality_deaths->m5to9                            = $fields['m5to9'];
                        $mortality_deaths->f5to9                            = $fields['f5to9'];
                        $mortality_deaths->m10to14                          = $fields['m10to14'];
                        $mortality_deaths->f10to14                          = $fields['f10to14'];
                        $mortality_deaths->m15to19                          = $fields['m15to19'];
                        $mortality_deaths->f15to19                          = $fields['f15to19'];
                        $mortality_deaths->m20to24                          = $fields['m20to24'];
                        $mortality_deaths->f20to24                          = $fields['f20to24'];
                        $mortality_deaths->m25to29                          = $fields['m25to29'];
                        $mortality_deaths->f25to29                          = $fields['f25to29'];
                        $mortality_deaths->m30to34                          = $fields['m30to34'];
                        $mortality_deaths->f30to34                          = $fields['f30to34'];
                        $mortality_deaths->m35to39                          = $fields['m35to39'];
                        $mortality_deaths->f35to39                          = $fields['f35to39'];
                        $mortality_deaths->m40to44                          = $fields['m40to44'];
                        $mortality_deaths->f40to44                          = $fields['f40to44'];
                        $mortality_deaths->m45to49                          = $fields['m45to49'];
                        $mortality_deaths->f45to49                          = $fields['f45to49'];
                        $mortality_deaths->m50to54                          = $fields['m50to54'];
                        $mortality_deaths->f50to54                          = $fields['f50to54'];
                        $mortality_deaths->m55to59                          = $fields['m55to59'];
                        $mortality_deaths->f55to59                          = $fields['f55to59'];
                        $mortality_deaths->m60to64                          = $fields['m60to64'];
                        $mortality_deaths->f60to64                          = $fields['f60to64'];
                        $mortality_deaths->m65to69                          = $fields['m65to69'];
                        $mortality_deaths->f65to69                          = $fields['f65to69'];
                        $mortality_deaths->m70over                          = $fields['m70over'];
                        $mortality_deaths->f70over                          = $fields['f70over'];

                        $mortality_deaths->msubtotal                        = $fields['munder1']+$fields['m1to4']+$fields['m5to9']+$fields['m10to14']+
                                                                              $fields['m15to19']+$fields['m20to24']+$fields['m25to29']+$fields['m30to34']+
                                                                              $fields['m35to39']+$fields['m40to44']+$fields['m45to49']+$fields['m50to54']+
                                                                              $fields['m55to59']+$fields['m60to64']+$fields['m65to69']+$fields['m70over'];

                        $mortality_deaths->fsubtotal                        = $fields['funder1']+$fields['f1to4']+$fields['f5to9']+$fields['f10to14']+
                                                                              $fields['f15to19']+$fields['f20to24']+$fields['f25to29']+$fields['f30to34']+
                                                                              $fields['f35to39']+$fields['f40to44']+$fields['f45to49']+$fields['f50to54']+
                                                                              $fields['f55to59']+$fields['f60to64']+$fields['f65to69']+$fields['f70over'];

                        $mortality_deaths->grandtotal                       = $mortality_deaths->msubtotal + $mortality_deaths->fsubtotal;
                        $mortality_deaths->icd10code                        = $fields['icd10code'];
                        $mortality_deaths->icd10category                    = $fields['icd10cat'];
                        $mortality_deaths->reportingyear                    = $fields['reportingyear'];
                        $mortality_deaths->save();

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

            $mortality_deaths = MortalityDeath::where('reportingyear', $fields['reportingyear'])
                                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                                ->where('icd10code', $fields['icd10code'])->first();

            $mortality_deaths->hfhudcode                        = "NEHEHRSV201900093";
            $mortality_deaths->icd10desc                        = $fields['icd10desc'];
            $mortality_deaths->munder1                          = $fields['munder1'];
            $mortality_deaths->funder1                          = $fields['funder1'];
            $mortality_deaths->m1to4                            = $fields['m1to4'];
            $mortality_deaths->f1to4                            = $fields['f1to4'];
            $mortality_deaths->m5to9                            = $fields['m5to9'];
            $mortality_deaths->f5to9                            = $fields['f5to9'];
            $mortality_deaths->m10to14                          = $fields['m10to14'];
            $mortality_deaths->f10to14                          = $fields['f10to14'];
            $mortality_deaths->m15to19                          = $fields['m15to19'];
            $mortality_deaths->f15to19                          = $fields['f15to19'];
            $mortality_deaths->m20to24                          = $fields['m20to24'];
            $mortality_deaths->f20to24                          = $fields['f20to24'];
            $mortality_deaths->m25to29                          = $fields['m25to29'];
            $mortality_deaths->f25to29                          = $fields['f25to29'];
            $mortality_deaths->m30to34                          = $fields['m30to34'];
            $mortality_deaths->f30to34                          = $fields['f30to34'];
            $mortality_deaths->m35to39                          = $fields['m35to39'];
            $mortality_deaths->f35to39                          = $fields['f35to39'];
            $mortality_deaths->m40to44                          = $fields['m40to44'];
            $mortality_deaths->f40to44                          = $fields['f40to44'];
            $mortality_deaths->m45to49                          = $fields['m45to49'];
            $mortality_deaths->f45to49                          = $fields['f45to49'];
            $mortality_deaths->m50to54                          = $fields['m50to54'];
            $mortality_deaths->f50to54                          = $fields['f50to54'];
            $mortality_deaths->m55to59                          = $fields['m55to59'];
            $mortality_deaths->f55to59                          = $fields['f55to59'];
            $mortality_deaths->m60to64                          = $fields['m60to64'];
            $mortality_deaths->f60to64                          = $fields['f60to64'];
            $mortality_deaths->m65to69                          = $fields['m65to69'];
            $mortality_deaths->f65to69                          = $fields['f65to69'];
            $mortality_deaths->m70over                          = $fields['m70over'];
            $mortality_deaths->f70over                          = $fields['f70over'];

            $mortality_deaths->msubtotal                        = $fields['munder1']+$fields['m1to4']+$fields['m5to9']+$fields['m10to14']+
                                                                    $fields['m15to19']+$fields['m20to24']+$fields['m25to29']+$fields['m30to34']+
                                                                    $fields['m35to39']+$fields['m40to44']+$fields['m45to49']+$fields['m50to54']+
                                                                    $fields['m55to59']+$fields['m60to64']+$fields['m65to69']+$fields['m70over'];

            $mortality_deaths->fsubtotal                        = $fields['funder1']+$fields['f1to4']+$fields['f5to9']+$fields['f10to14']+
                                                                    $fields['f15to19']+$fields['f20to24']+$fields['f25to29']+$fields['f30to34']+
                                                                    $fields['f35to39']+$fields['f40to44']+$fields['f45to49']+$fields['f50to54']+
                                                                    $fields['f55to59']+$fields['f60to64']+$fields['f65to69']+$fields['f70over'];

            $mortality_deaths->grandtotal                       = $mortality_deaths->msubtotal + $mortality_deaths->fsubtotal;
            $mortality_deaths->icd10code                        = $fields['icd10code'];
            $mortality_deaths->icd10category                    = $fields['icd10category'];
            $mortality_deaths->reportingyear                    = $fields['reportingyear'];
            $mortality_deaths->save();

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

    public function remove(Request $request){

	    $data = Input::post();

	    $transaction = DB::transaction(function($data) use($data){
	    try{

			MortalityDeath::where('id', $data['id'])->firstOrFail()->delete();

	        return response()->json([
	            'status' => 200,
	            'data' => 'null',
	            'message' => 'Successfully deleted.'
	        ]);

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

            $mortality_deaths = DB::table('hospitaloperationsmortalitydeaths as mortalityDeaths')
                ->select(
                    'mortalityDeaths.id',
                    'mortalityDeaths.hfhudcode',
                    'mortalityDeaths.icd10desc',
                    'mortalityDeaths.munder1',
                    'mortalityDeaths.funder1',
                    'mortalityDeaths.m1to4',
                    'mortalityDeaths.f1to4',
                    'mortalityDeaths.m5to9',
                    'mortalityDeaths.f5to9',
                    'mortalityDeaths.m10to14',
                    'mortalityDeaths.f10to14',
                    'mortalityDeaths.m15to19',
                    'mortalityDeaths.f15to19',
                    'mortalityDeaths.m20to24',
                    'mortalityDeaths.f20to24',
                    'mortalityDeaths.m25to29',
                    'mortalityDeaths.f25to29',
                    'mortalityDeaths.m30to34',
                    'mortalityDeaths.f30to34',
                    'mortalityDeaths.m35to39',
                    'mortalityDeaths.f35to39',
                    'mortalityDeaths.m40to44',
                    'mortalityDeaths.f40to44',
                    'mortalityDeaths.m45to49',
                    'mortalityDeaths.f45to49',
                    'mortalityDeaths.m50to54',
                    'mortalityDeaths.f50to54',
                    'mortalityDeaths.m55to59',
                    'mortalityDeaths.f55to59',
                    'mortalityDeaths.m60to64',
                    'mortalityDeaths.f60to64',
                    'mortalityDeaths.m65to69',
                    'mortalityDeaths.f65to69',
                    'mortalityDeaths.m70over',
                    'mortalityDeaths.f70over',
                    'mortalityDeaths.msubtotal',
                    'mortalityDeaths.fsubtotal',
                    'mortalityDeaths.grandtotal',
                    'mortalityDeaths.icd10code',
                    'mortalityDeaths.icd10category',
                    'mortalityDeaths.reportingyear')->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($mortality_deaths as $mortality_death) {
                // code
                $data = [
                    "hfhudcode" => $mortality_death->hfhudcode, 
                    "icd10desc" => $mortality_death->icd10desc, 
                    "munder1" => $mortality_death->munder1, 
                    "funder1" => $mortality_death->funder1,
                    "m1to4" => $mortality_death->m1to4,
                    "f1to4" => $mortality_death->f1to4,
                    "m5to9" => $mortality_death->m5to9,
                    "f5to9" => $mortality_death->f5to9,
                    "m10to14" => $mortality_death->m10to14,
                    "f10to14" => $mortality_death->f10to14,
                    "m15to19" => $mortality_death->m15to19,
                    "f15to19" => $mortality_death->f15to19,
                    "m20to24" => $mortality_death->m20to24,
                    "f20to24" => $mortality_death->f20to24,
                    "m25to29" => $mortality_death->m25to29,
                    "f25to29" => $mortality_death->f25to29,
                    "m30to34" => $mortality_death->m30to34,
                    "f30to34" => $mortality_death->f30to34,
                    "m35to39" => $mortality_death->m35to39,
                    "f35to39" => $mortality_death->f35to39,
                    "m40to44" => $mortality_death->m40to44,
                    "f40to44" => $mortality_death->f40to44,
                    "m45to49" => $mortality_death->m45to49,
                    "f45to49" => $mortality_death->f45to49,
                    "m50to54" => $mortality_death->m50to54,
                    "f50to54" => $mortality_death->f50to54,
                    "m55to59" => $mortality_death->m55to59,
                    "f55to59" => $mortality_death->f55to59,
                    "m60to64" => $mortality_death->m60to64,
                    "f60to64" => $mortality_death->f60to64,
                    "m65to69" => $mortality_death->m65to69,
                    "f65to69" => $mortality_death->f65to69,
                    "m70over" => $mortality_death->m70over,
                    "f70over" => $mortality_death->f70over,
                    "msubtotal" => $mortality_death->msubtotal,
                    "fsubtotal" => $mortality_death->fsubtotal,
                    "grandtotal" => $mortality_death->grandtotal,
                    "icd10code" => $mortality_death->icd10code,
                    "icd10category" => $mortality_death->icd10category,
                    "reportingyear" => $mortality_death->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospitalOperationsMortalityDeaths', $data);
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
    }
  	
}