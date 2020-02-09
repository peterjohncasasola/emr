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
            'reportingyear'=>$request->input('reportingyear'),
        );

        $bed_capacity = DB::table('geninfobedcapacity as bedCapacity')
            ->select( 
                'bedCapacity.id',
                'bedCapacity.hfhudcode',
                'bedCapacity.abc',
                'bedCapacity.implementingbeds',
                'bedCapacity.bor',
                'bedCapacity.reportingyear',
                'bedCapacity.submitted_at'
            );

        if ($data['id']){
            $bed_capacity = $bed_capacity->where('bedCapacity.id', $data['id']);
        }

        if ($data['reportingyear']){
            $bed_capacity = $bed_capacity->where('bedCapacity.reportingyear', $data['reportingyear']);
        }

        $bed_capacity = $bed_capacity->get();

        return response()->json([
            'status'=>200,
            'data'=>$bed_capacity,
            'count'=>$bed_capacity->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
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
                $bed_capacity->reportingyear                 = $fields['reportingyear'];;
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

            $bed_capacity = DB::table('geninfobedcapacity as bedCapacity')
                ->select( 
                    'bedCapacity.id',
                    'bedCapacity.hfhudcode',
                    'bedCapacity.abc',
                    'bedCapacity.implementingbeds',
                    'bedCapacity.bor',
                    'bedCapacity.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->first();

            $data = [
                "hfhudcode" => $bed_capacity->hfhudcode, 
                "abc" => $bed_capacity->abc, 
                "implementingbeds" => $bed_capacity->implementingbeds, 
                "bor" => $bed_capacity->bor,
                "reportingyear" => $bed_capacity->reportingyear,
            ];

            $response = $this->soapWrapper->call('Emr.genInfoBedCapacity', $data);

            $bed_capacity = BedCapacity::where('reportingyear', $fields['reportingyear'])->first();
            $bed_capacity->submitted_at    = Carbon::now();
            $bed_capacity->save();

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