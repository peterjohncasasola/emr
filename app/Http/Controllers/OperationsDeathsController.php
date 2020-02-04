<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\OperationsDeath;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class OperationsDeathsController extends Controller {

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

        $perations_deaths = DB::table('hospitaloperationsdeaths as operationsDeaths')
            ->select( 
                'operationsDeaths.id',
                'operationsDeaths.hfhudcode',
                'operationsDeaths.totaldeaths',
                'operationsDeaths.totaldeaths48down',
                'operationsDeaths.totaldeaths48up',
                'operationsDeaths.totalerdeaths',
                'operationsDeaths.totaldoa',
                'operationsDeaths.totalstillbirths',
                'operationsDeaths.totalneonataldeaths',
                'operationsDeaths.totalmaternaldeaths',
                'operationsDeaths.totaldeathsnewborn',
                'operationsDeaths.totaldischargedeaths',
                'operationsDeaths.grossdeathrate',
                'operationsDeaths.ndrnumerator',
                'operationsDeaths.ndrdenominator',
                'operationsDeaths.netdeathrate',
                'operationsDeaths.reportingyear'
            )->orderBy('operationsDeaths.totaldeaths', 'DESC');

        if ($data['id']){
            $perations_deaths = $perations_deaths->where('operationsDeaths.id', $data['id']);
        }

        if ($data['reportingyear']){
            $classification = $classification->where('classification.reportingyear', $data['reportingyear']);
        }

        $perations_deaths = $perations_deaths->get();

        return response()->json([
            'status'=>200,
            'data'=>$perations_deaths,
            'count'=>$perations_deaths->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{
                $perations_deaths_count = OperationsDeath::count();

                $perations_deaths = new OperationsDeath;
                $perations_deaths->hfhudcode                            = "NEHEHRSV201900093";
                $perations_deaths->totaldeaths                          = $fields['totaldeaths48down']+$fields['totaldeaths48up']+
                                                                        $fields['totalerdeaths']+$fields['totaldoa']+
                                                                        $fields['totalstillbirths']+$fields['totalneonataldeaths']+
                                                                        $fields['totalmaternaldeaths'];

                $perations_deaths->totaldeaths48down                    = $fields['totaldeaths48down'];
                $perations_deaths->totaldeaths48up                      = $fields['totaldeaths48up'];
                $perations_deaths->totalerdeaths                        = $fields['totalerdeaths'];
                $perations_deaths->totaldoa                             = $fields['totaldoa'];
                $perations_deaths->totalstillbirths                     = $fields['totalstillbirths'];
                $perations_deaths->totalneonataldeaths                  = $fields['totalneonataldeaths'];
                $perations_deaths->totalmaternaldeaths                  = $fields['totalmaternaldeaths'];

                $perations_deaths->totaldeathsnewborn                   = $fields['totaldeathsnewborn'];
                $perations_deaths->totaldischargedeaths                 = $fields['totaldischargedeaths'];
                $perations_deaths->grossdeathrate                       = ($fields['totaldeathsnewborn']*100)/$fields['totaldischargedeaths'];

                $perations_deaths->ndrnumerator                         = $fields['ndrnumerator'];
                $perations_deaths->ndrdenominator                       = $fields['ndrdenominator'];
                $perations_deaths->netdeathrate                         = ($fields['ndrnumerator']*100)/$fields['ndrdenominator'];
                $perations_deaths->reportingyear                        = 2019;
                $perations_deaths->save();

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

            $perations_deaths = OperationsDeath::where('reportingyear', $fields['reportingyear'])->first();
            $perations_deaths->hfhudcode                            = "NEHEHRSV201900093";
            $perations_deaths->totaldeaths                          = $fields['totaldeaths48down']+$fields['totaldeaths48up']+
                                                                    $fields['totalerdeaths']+$fields['totaldoa']+
                                                                    $fields['totalstillbirths']+$fields['totalneonataldeaths']+
                                                                    $fields['totalmaternaldeaths'];

            $perations_deaths->totaldeaths48down                    = $fields['totaldeaths48down'];
            $perations_deaths->totaldeaths48up                      = $fields['totaldeaths48up'];
            $perations_deaths->totalerdeaths                        = $fields['totalerdeaths'];
            $perations_deaths->totaldoa                             = $fields['totaldoa'];
            $perations_deaths->totalstillbirths                     = $fields['totalstillbirths'];
            $perations_deaths->totalneonataldeaths                  = $fields['totalneonataldeaths'];
            $perations_deaths->totalmaternaldeaths                  = $fields['totalmaternaldeaths'];

            $perations_deaths->totaldeathsnewborn                   = $fields['totaldeathsnewborn'];
            $perations_deaths->totaldischargedeaths                 = $fields['totaldischargedeaths'];
            $perations_deaths->grossdeathrate                       = ($fields['totaldeathsnewborn']*100)/$fields['totaldischargedeaths'];

            $perations_deaths->ndrnumerator                         = $fields['ndrnumerator'];
            $perations_deaths->ndrdenominator                       = $fields['ndrdenominator'];
            $perations_deaths->netdeathrate                         = ($fields['ndrnumerator']*100)/$fields['ndrdenominator'];
            $perations_deaths->reportingyear                        = 2019;
            $perations_deaths->save();

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

    public function remove(Request $request){

	    $data = Input::post();

	    $transaction = DB::transaction(function($data) use($data){
	    try{

			OperationsDeath::where('id', $data['id'])->firstOrFail()->delete();

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

    public function send_data_doh(){

        $perations_deaths = DB::table('hospitaloperationsdeaths as operationsDeaths')
            ->select( 
                'operationsDeaths.id',
                'operationsDeaths.hfhudcode',
                'operationsDeaths.totaldeaths',
                'operationsDeaths.totaldeaths48down',
                'operationsDeaths.totaldeaths48up',
                'operationsDeaths.totalerdeaths',
                'operationsDeaths.totaldoa',
                'operationsDeaths.totalstillbirths',
                'operationsDeaths.totalneonataldeaths',
                'operationsDeaths.totalmaternaldeaths',
                'operationsDeaths.totaldeathsnewborn',
                'operationsDeaths.totaldischargedeaths',
                'operationsDeaths.grossdeathrate',
                'operationsDeaths.ndrnumerator',
                'operationsDeaths.ndrdenominator',
                'operationsDeaths.netdeathrate',
                'operationsDeaths.reportingyear'
            )->where('reportingyear', 2019)->get();

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

        foreach ($perations_deaths as $perations_death) {
            // code
            $data = [
                "hfhudcode" => "NEHEHRSV201900093", 
                "totaldeaths" => $perations_death->totaldeaths,
                "totaldeaths48down" => $perations_death->totaldeaths48down,
                "totaldeaths48up" => $perations_death->totaldeaths48up,
                "totalerdeaths" => $perations_death->totalerdeaths,
                "totaldoa" => $perations_death->totaldoa,
                "totalstillbirths" => $perations_death->totalstillbirths,
                "totalneonataldeaths" => $perations_death->totalneonataldeaths,
                "totalmaternaldeaths" => $perations_death->totalmaternaldeaths,
                "totaldeathsnewborn" => $perations_death->totaldeathsnewborn,
                "totaldischargedeaths" => $perations_death->totaldischargedeaths,
                "grossdeathrate" => $perations_death->grossdeathrate,
                "ndrnumerator" => $perations_death->ndrnumerator,
                "ndrdenominator" => $perations_death->ndrdenominator,
                "netdeathrate" => $perations_death->netdeathrate,
                "reportingyear" => 2017
            ];
        
            $response = $this->soapWrapper->call('Emr.hospitalOperationsDeaths', $data);
        }
    }
  	
}