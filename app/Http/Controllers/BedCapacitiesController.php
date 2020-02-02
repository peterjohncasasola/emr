<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\BedCapacity;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class BedCapacitiesController extends Controller {

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

        $bed_capacity = DB::table('geninfobedcapacity as bedCapacity')
            ->select( 
                'bedCapacity.id',
                'bedCapacity.hfhudcode',
                'bedCapacity.abc',
                'bedCapacity.implementingbeds',
                'bedCapacity.bor',
                'bedCapacity.reportingyear'
            );

        if ($data['id']){
            $bed_capacity = $bed_capacity->where('expense.id', $data['id']);
        }

        $bed_capacity = $bed_capacity->get();

        return response()->json([
            'status'=>200,
            'data'=>$bed_capacity,
            'count'=>$bed_capacity->count(),
            'message'=>''
        ]);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            try{
                
                $bed_capacity = new BedCapacity;
                $bed_capacity->hfhudcode                     = "NEHEHRSV201900093";
                $bed_capacity->abc                           = $fields['abc'];
                $bed_capacity->implementingbeds              = $fields['implementingbeds'];
                $bed_capacity->bor                           = $fields['bor'];
                $bed_capacity->reportingyear                 = 2019;
                $bed_capacity->save();

                return response()->json([
                    'status' => 200,
                    'data' => null,
                    'message' => 'Successfully saved.'
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

    public function update(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        try{

            $bed_capacity = BedCapacity::where('reportingyear', $fields['reportingyear'])->first();
            $bed_capacity->hfhudcode                     = "NEHEHRSV201900093";
            $bed_capacity->abc                           = $fields['abc'];
            $bed_capacity->implementingbeds              = $fields['implementingbeds'];
            $bed_capacity->bor                           = $fields['bor'];
            $bed_capacity->reportingyear                 = $fields['reportingyear'];
            $bed_capacity->save();

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

        $bed_capacity = DB::table('genInfoBedCapacity as bedCapacity')
            ->select( 
                'bedCapacity.id',
                'bedCapacity.hfhudcode',
                'bedCapacity.abc',
                'bedCapacity.implementingbeds',
                'bedCapacity.bor',
                'bedCapacity.reportingyear'
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
            "abc" => $bed_capacity->abc, 
            "implementingbeds" => $bed_capacity->implementingbeds, 
            "bor" => $bed_capacity->bor,
            "reportingyear" => 2017
        ];

        $response = $this->soapWrapper->call('Emr.genInfoBedCapacity', $data);
        return response($response, 200)->header('Content-Type', 'application/xml');
        exit;
    }
  	
}