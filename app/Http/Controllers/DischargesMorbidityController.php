<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesMorbidity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesMorbidityController extends Controller {

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

        $discharges_morbidity = DB::table('hospoptdischargesmorbidity as dischargesMorbidity')
            ->select( 
                'dischargesMorbidity.id',
                'dischargesMorbidity.hfhudcode',
                'dischargesMorbidity.icd10desc',
                'dischargesMorbidity.munder1',
                'dischargesMorbidity.funder1',
                'dischargesMorbidity.m1to4',
                'dischargesMorbidity.f1to4',
                'dischargesMorbidity.m5to9',
                'dischargesMorbidity.f5to9',
                'dischargesMorbidity.m10to14',
                'dischargesMorbidity.f10to14',
                'dischargesMorbidity.m15to19',
                'dischargesMorbidity.f15to19',
                'dischargesMorbidity.m20to24',
                'dischargesMorbidity.f20to24',
                'dischargesMorbidity.m25to29',
                'dischargesMorbidity.f25to29',
                'dischargesMorbidity.m30to34',
                'dischargesMorbidity.f30to34',
                'dischargesMorbidity.m35to39',
                'dischargesMorbidity.f35to39',
                'dischargesMorbidity.m40to44',
                'dischargesMorbidity.f40to44',
                'dischargesMorbidity.m45to49',
                'dischargesMorbidity.f45to49',
                'dischargesMorbidity.m50to54',
                'dischargesMorbidity.f50to54',
                'dischargesMorbidity.m55to59',
                'dischargesMorbidity.f55to59',
                'dischargesMorbidity.m60to64',
                'dischargesMorbidity.f60to64',
                'dischargesMorbidity.m65to69',
                'dischargesMorbidity.f65to69',
                'dischargesMorbidity.m70over',
                'dischargesMorbidity.f70over',
                'dischargesMorbidity.msubtotal',
                'dischargesMorbidity.fsubtotal',
                'dischargesMorbidity.grandtotal',
                'dischargesMorbidity.icd10code',
                'dischargesMorbidity.icd10category',
                'dischargesMorbidity.reportingyear'
            )->orderBy('dischargesMorbidity.grandtotal', 'DESC');

        if ($data['id']){
            $discharges_morbidity = $discharges_morbidity->where('dischargesMorbidity.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_morbidity = $discharges_morbidity->where('dischargesMorbidity.reportingyear', $data['reportingyear']);
        }

        if ($data['icd10code']){
            $discharges_morbidity = $discharges_morbidity->where('dischargesMorbidity.icd10code', $data['icd10code']);
        }

        $discharges_morbidity = $discharges_morbidity->get();

        return response()->json([
            'status'=>200,
            'data'=>$discharges_morbidity,
            'count'=>$discharges_morbidity->count(),
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

                if(DischargesMorbidity::count()<10){

                    $check_duplicate = DischargesMorbidity::where('icd10code', $fields['icd10code'])
                                                            ->where('reportingyear', $fields['reportingyear'])->count();
                    if($check_duplicate<=0){

                        $discharges_morbidity = new DischargesMorbidity;
                        $discharges_morbidity->hfhudcode                        = "NEHEHRSV201900093";
                        $discharges_morbidity->icd10desc                        = $fields['icd10desc'];
                        $discharges_morbidity->munder1                          = $fields['munder1'];
                        $discharges_morbidity->funder1                          = $fields['funder1'];
                        $discharges_morbidity->m1to4                            = $fields['m1to4'];
                        $discharges_morbidity->f1to4                            = $fields['f1to4'];
                        $discharges_morbidity->m5to9                            = $fields['m5to9'];
                        $discharges_morbidity->f5to9                            = $fields['f5to9'];
                        $discharges_morbidity->m10to14                          = $fields['m10to14'];
                        $discharges_morbidity->f10to14                          = $fields['f10to14'];
                        $discharges_morbidity->m15to19                          = $fields['m15to19'];
                        $discharges_morbidity->f15to19                          = $fields['f15to19'];
                        $discharges_morbidity->m20to24                          = $fields['m20to24'];
                        $discharges_morbidity->f20to24                          = $fields['f20to24'];
                        $discharges_morbidity->m25to29                          = $fields['m25to29'];
                        $discharges_morbidity->f25to29                          = $fields['f25to29'];
                        $discharges_morbidity->m30to34                          = $fields['m30to34'];
                        $discharges_morbidity->f30to34                          = $fields['f30to34'];
                        $discharges_morbidity->m35to39                          = $fields['m35to39'];
                        $discharges_morbidity->f35to39                          = $fields['f35to39'];
                        $discharges_morbidity->m40to44                          = $fields['m40to44'];
                        $discharges_morbidity->f40to44                          = $fields['f40to44'];
                        $discharges_morbidity->m45to49                          = $fields['m45to49'];
                        $discharges_morbidity->f45to49                          = $fields['f45to49'];
                        $discharges_morbidity->m50to54                          = $fields['m50to54'];
                        $discharges_morbidity->f50to54                          = $fields['f50to54'];
                        $discharges_morbidity->m55to59                          = $fields['m55to59'];
                        $discharges_morbidity->f55to59                          = $fields['f55to59'];
                        $discharges_morbidity->m60to64                          = $fields['m60to64'];
                        $discharges_morbidity->f60to64                          = $fields['f60to64'];
                        $discharges_morbidity->m65to69                          = $fields['m65to69'];
                        $discharges_morbidity->f65to69                          = $fields['f65to69'];
                        $discharges_morbidity->m70over                          = $fields['m70over'];
                        $discharges_morbidity->f70over                          = $fields['f70over'];

                        $discharges_morbidity->msubtotal                        = $fields['munder1']+$fields['m1to4']+$fields['m5to9']+$fields['m10to14']+
                                                                              $fields['m15to19']+$fields['m20to24']+$fields['m25to29']+$fields['m30to34']+
                                                                              $fields['m35to39']+$fields['m40to44']+$fields['m45to49']+$fields['m50to54']+
                                                                              $fields['m55to59']+$fields['m60to64']+$fields['m65to69']+$fields['m70over'];

                        $discharges_morbidity->fsubtotal                        = $fields['funder1']+$fields['f1to4']+$fields['f5to9']+$fields['f10to14']+
                                                                              $fields['f15to19']+$fields['f20to24']+$fields['f25to29']+$fields['f30to34']+
                                                                              $fields['f35to39']+$fields['f40to44']+$fields['f45to49']+$fields['f50to54']+
                                                                              $fields['f55to59']+$fields['f60to64']+$fields['f65to69']+$fields['f70over'];

                        $discharges_morbidity->grandtotal                       = $discharges_morbidity->msubtotal + $discharges_morbidity->fsubtotal;
                        $discharges_morbidity->icd10code                        = $fields['icd10code'];
                        $discharges_morbidity->icd10category                    = $fields['icd10cat'];
                        $discharges_morbidity->reportingyear                    = $fields['reportingyear'];;
                        $discharges_morbidity->save();

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

            $discharges_morbidity = DischargesMorbidity::where('reportingyear', $fields['reportingyear'])
                                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                                ->where('icd10code', $fields['icd10code'])->first();

            $discharges_morbidity->hfhudcode                        = "NEHEHRSV201900093";
            $discharges_morbidity->icd10desc                        = $fields['icd10desc'];
            $discharges_morbidity->munder1                          = $fields['munder1'];
            $discharges_morbidity->funder1                          = $fields['funder1'];
            $discharges_morbidity->m1to4                            = $fields['m1to4'];
            $discharges_morbidity->f1to4                            = $fields['f1to4'];
            $discharges_morbidity->m5to9                            = $fields['m5to9'];
            $discharges_morbidity->f5to9                            = $fields['f5to9'];
            $discharges_morbidity->m10to14                          = $fields['m10to14'];
            $discharges_morbidity->f10to14                          = $fields['f10to14'];
            $discharges_morbidity->m15to19                          = $fields['m15to19'];
            $discharges_morbidity->f15to19                          = $fields['f15to19'];
            $discharges_morbidity->m20to24                          = $fields['m20to24'];
            $discharges_morbidity->f20to24                          = $fields['f20to24'];
            $discharges_morbidity->m25to29                          = $fields['m25to29'];
            $discharges_morbidity->f25to29                          = $fields['f25to29'];
            $discharges_morbidity->m30to34                          = $fields['m30to34'];
            $discharges_morbidity->f30to34                          = $fields['f30to34'];
            $discharges_morbidity->m35to39                          = $fields['m35to39'];
            $discharges_morbidity->f35to39                          = $fields['f35to39'];
            $discharges_morbidity->m40to44                          = $fields['m40to44'];
            $discharges_morbidity->f40to44                          = $fields['f40to44'];
            $discharges_morbidity->m45to49                          = $fields['m45to49'];
            $discharges_morbidity->f45to49                          = $fields['f45to49'];
            $discharges_morbidity->m50to54                          = $fields['m50to54'];
            $discharges_morbidity->f50to54                          = $fields['f50to54'];
            $discharges_morbidity->m55to59                          = $fields['m55to59'];
            $discharges_morbidity->f55to59                          = $fields['f55to59'];
            $discharges_morbidity->m60to64                          = $fields['m60to64'];
            $discharges_morbidity->f60to64                          = $fields['f60to64'];
            $discharges_morbidity->m65to69                          = $fields['m65to69'];
            $discharges_morbidity->f65to69                          = $fields['f65to69'];
            $discharges_morbidity->m70over                          = $fields['m70over'];
            $discharges_morbidity->f70over                          = $fields['f70over'];

            $discharges_morbidity->msubtotal                        = $fields['munder1']+$fields['m1to4']+$fields['m5to9']+$fields['m10to14']+
                                                                    $fields['m15to19']+$fields['m20to24']+$fields['m25to29']+$fields['m30to34']+
                                                                    $fields['m35to39']+$fields['m40to44']+$fields['m45to49']+$fields['m50to54']+
                                                                    $fields['m55to59']+$fields['m60to64']+$fields['m65to69']+$fields['m70over'];

            $discharges_morbidity->fsubtotal                        = $fields['funder1']+$fields['f1to4']+$fields['f5to9']+$fields['f10to14']+
                                                                    $fields['f15to19']+$fields['f20to24']+$fields['f25to29']+$fields['f30to34']+
                                                                    $fields['f35to39']+$fields['f40to44']+$fields['f45to49']+$fields['f50to54']+
                                                                    $fields['f55to59']+$fields['f60to64']+$fields['f65to69']+$fields['f70over'];

            $discharges_morbidity->grandtotal                       = $discharges_morbidity->msubtotal + $discharges_morbidity->fsubtotal;
            $discharges_morbidity->icd10code                        = $fields['icd10code'];
            $discharges_morbidity->icd10category                    = $fields['icd10category'];
            $discharges_morbidity->reportingyear                    = $fields['reportingyear'];
            $discharges_morbidity->save();

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

			DischargesMorbidity::where('id', $data['id'])->firstOrFail()->delete();

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

            $discharges_morbidity = DB::table('hospoptdischargesmorbidity as dischargesMorbidity')
                ->select(
                    'dischargesMorbidity.id',
                    'dischargesMorbidity.hfhudcode',
                    'dischargesMorbidity.icd10desc',
                    'dischargesMorbidity.munder1',
                    'dischargesMorbidity.funder1',
                    'dischargesMorbidity.m1to4',
                    'dischargesMorbidity.f1to4',
                    'dischargesMorbidity.m5to9',
                    'dischargesMorbidity.f5to9',
                    'dischargesMorbidity.m10to14',
                    'dischargesMorbidity.f10to14',
                    'dischargesMorbidity.m15to19',
                    'dischargesMorbidity.f15to19',
                    'dischargesMorbidity.m20to24',
                    'dischargesMorbidity.f20to24',
                    'dischargesMorbidity.m25to29',
                    'dischargesMorbidity.f25to29',
                    'dischargesMorbidity.m30to34',
                    'dischargesMorbidity.f30to34',
                    'dischargesMorbidity.m35to39',
                    'dischargesMorbidity.f35to39',
                    'dischargesMorbidity.m40to44',
                    'dischargesMorbidity.f40to44',
                    'dischargesMorbidity.m45to49',
                    'dischargesMorbidity.f45to49',
                    'dischargesMorbidity.m50to54',
                    'dischargesMorbidity.f50to54',
                    'dischargesMorbidity.m55to59',
                    'dischargesMorbidity.f55to59',
                    'dischargesMorbidity.m60to64',
                    'dischargesMorbidity.f60to64',
                    'dischargesMorbidity.m65to69',
                    'dischargesMorbidity.f65to69',
                    'dischargesMorbidity.m70over',
                    'dischargesMorbidity.f70over',
                    'dischargesMorbidity.msubtotal',
                    'dischargesMorbidity.fsubtotal',
                    'dischargesMorbidity.grandtotal',
                    'dischargesMorbidity.icd10code',
                    'dischargesMorbidity.icd10category',
                    'dischargesMorbidity.reportingyear')->where('reportingyear', $fields['reportingyear'])->get();

            

            foreach ($discharges_morbidity as $discharges_morbidity) {
                // code
                $data = [
                    "hfhudcode" => $discharges_morbidity->hfhudcode, 
                    "icd10desc" => $discharges_morbidity->icd10desc, 
                    "munder1" => $discharges_morbidity->munder1, 
                    "funder1" => $discharges_morbidity->funder1,
                    "m1to4" => $discharges_morbidity->m1to4,
                    "f1to4" => $discharges_morbidity->f1to4,
                    "m5to9" => $discharges_morbidity->m5to9,
                    "f5to9" => $discharges_morbidity->f5to9,
                    "m10to14" => $discharges_morbidity->m10to14,
                    "f10to14" => $discharges_morbidity->f10to14,
                    "m15to19" => $discharges_morbidity->m15to19,
                    "f15to19" => $discharges_morbidity->f15to19,
                    "m20to24" => $discharges_morbidity->m20to24,
                    "f20to24" => $discharges_morbidity->f20to24,
                    "m25to29" => $discharges_morbidity->m25to29,
                    "f25to29" => $discharges_morbidity->f25to29,
                    "m30to34" => $discharges_morbidity->m30to34,
                    "f30to34" => $discharges_morbidity->f30to34,
                    "m35to39" => $discharges_morbidity->m35to39,
                    "f35to39" => $discharges_morbidity->f35to39,
                    "m40to44" => $discharges_morbidity->m40to44,
                    "f40to44" => $discharges_morbidity->f40to44,
                    "m45to49" => $discharges_morbidity->m45to49,
                    "f45to49" => $discharges_morbidity->f45to49,
                    "m50to54" => $discharges_morbidity->m50to54,
                    "f50to54" => $discharges_morbidity->f50to54,
                    "m55to59" => $discharges_morbidity->m55to59,
                    "f55to59" => $discharges_morbidity->f55to59,
                    "m60to64" => $discharges_morbidity->m60to64,
                    "f60to64" => $discharges_morbidity->f60to64,
                    "m65to69" => $discharges_morbidity->m65to69,
                    "f65to69" => $discharges_morbidity->f65to69,
                    "m70over" => $discharges_morbidity->m70over,
                    "f70over" => $discharges_morbidity->f70over,
                    "msubtotal" => $discharges_morbidity->msubtotal,
                    "fsubtotal" => $discharges_morbidity->fsubtotal,
                    "grandtotal" => $discharges_morbidity->grandtotal,
                    "icd10code" => $discharges_morbidity->icd10code,
                    "icd10category" => $discharges_morbidity->icd10category,
                    "reportingyear" => $discharges_morbidity->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospOptDischargesMorbidity', $data);
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