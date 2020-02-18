<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Config;

use DB;
use Auth;
use App\Expense;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class ExpensesController extends Controller {

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
        
        $expenses = DB::table('expenses as expense')
            ->select( 
                'expense.id',
                'expense.hfhudcode',
                'expense.salarieswages',
                'expense.employeebenefits',
                'expense.allowances',
                'expense.totalps',
                'expense.totalamountmedicine',
                'expense.totalamountmedicalsupplies',
                'expense.totalamountutilities',
                'expense.totalamountnonmedicalservice',
                'expense.totalmooe',
                'expense.amountinfrastructure',
                'expense.amountequipment',
                'expense.totalco',
                'expense.grandtotal',
                'expense.reportingyear',
                'expense.submitted_at'
            );

        if ($data['id']){
            $expenses = $expenses->where('expense.id', $data['id']);
        }

        if ($data['reportingyear']){
            $expenses = $expenses->where('expense.reportingyear', $data['reportingyear']);
        }

        $expenses = $expenses->get();

        return response()->json([
            'status'=>200,
            'data'=>$expenses,
            'count'=>$expenses->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function show2(Request $request){

        $data = array(
            'id'=>$request->input('id'),
        );

        $expenses = Expense::select( 
                'expenses.id',
                'expenses.hfhudcode',
                'expenses.salarieswages',
                'expenses.employeebenefits',
                'expenses.allowances',
                'expenses.totalps',
                'expenses.totalamountmedicine',
                'expenses.totalamountmedicalsupplies',
                'expenses.totalamountutilities',
                'expenses.totalamountnonmedicalservice',
                'expenses.totalmooe',
                'expenses.amountinfrastructure',
                'expenses.amountequipment',
                'expenses.totalco',
                'expenses.grandtotal',
                'expenses.reportingyear'
            );

        if ($data['id']){
            $expenses = $expenses->where('expenses.id', $data['id']);
        }

        $expenses = $expenses->get();

        return response()->json([
            'status'=>200,
            'data'=>$expenses,
            'count'=>$expenses->count(),
            'message'=>''
        ]);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            try{

                $expense = new Expense;
                $expense->hfhudcode                     = "NEHEHRSV201900093";
                $expense->salarieswages                 = $fields['salarieswages'];
                $expense->employeebenefits              = $fields['employeebenefits'];
                $expense->allowances                    = $fields['allowances'];
                // $expense->totalps                       = $fields['totalps'];
                $expense->totalps                       = $fields['salarieswages']+$fields['employeebenefits']+$fields['allowances'];
                $expense->totalamountmedicine           = $fields['totalamountmedicine'];
                $expense->totalamountmedicalsupplies    = $fields['totalamountmedicalsupplies'];
                $expense->totalamountutilities          = $fields['totalamountutilities'];
                $expense->totalamountnonmedicalservice  = $fields['totalamountnonmedicalservice'];
                // $expense->totalmooe                     = $fields['totalmooe'];
                $expense->totalmooe                     = $fields['totalamountmedicine']+$fields['totalamountmedicalsupplies']+$fields['totalamountutilities']+$fields['totalamountnonmedicalservice'];
                $expense->amountinfrastructure          = $fields['amountinfrastructure'];
                $expense->amountequipment               = $fields['amountequipment'];
                // $expense->totalco                       = $fields['totalco'];
                $expense->totalco                       = $fields['amountinfrastructure']+$fields['amountequipment'];
                $expense->grandtotal                    = $expense->totalps+$expense->totalmooe+$expense->totalco;
                $expense->reportingyear                 = $fields['reportingyear'];
                $expense->save();

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

            $expense = Expense::where('reportingyear', $fields['reportingyear'])->first();
            $expense->hfhudcode                     = "NEHEHRSV201900093";
            $expense->salarieswages                 = $fields['salarieswages'];
            $expense->employeebenefits              = $fields['employeebenefits'];
            $expense->allowances                    = $fields['allowances'];
            $expense->totalps                       = $fields['salarieswages']+$fields['employeebenefits']+$fields['allowances'];
            $expense->totalamountmedicine           = $fields['totalamountmedicine'];
            $expense->totalamountmedicalsupplies    = $fields['totalamountmedicalsupplies'];
            $expense->totalamountutilities          = $fields['totalamountutilities'];
            $expense->totalamountnonmedicalservice  = $fields['totalamountnonmedicalservice'];
            $expense->totalmooe                     = $fields['totalamountmedicine']+$fields['totalamountmedicalsupplies']+$fields['totalamountutilities']+$fields['totalamountnonmedicalservice'];
            $expense->amountinfrastructure          = $fields['amountinfrastructure'];
            $expense->amountequipment               = $fields['amountequipment'];
            $expense->totalco                       = $fields['amountinfrastructure']+$fields['amountequipment'];
            $expense->grandtotal                    = $expense->totalps+$expense->totalmooe+$expense->totalco;
            $expense->save();

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

            $expense = DB::table('expenses as expense')
                ->select(
                    'expense.id',
                    'expense.hfhudcode',
                    'expense.salarieswages',
                    'expense.employeebenefits',
                    'expense.allowances',
                    'expense.totalps',
                    'expense.totalamountmedicine',
                    'expense.totalamountmedicalsupplies',
                    'expense.totalamountutilities',
                    'expense.totalamountnonmedicalservice',
                    'expense.totalmooe',
                    'expense.amountinfrastructure',
                    'expense.amountequipment',
                    'expense.totalco',
                    'expense.grandtotal',
                    'expense.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->first();

            $data = [
                "hfhudcode" => $expense->hfhudcode, 
                "salarieswages" => $expense->salarieswages, 
                "employeebenefits" => $expense->employeebenefits, 
                "allowances" => $expense->allowances, 
                "totalps" => $expense->totalps, 
                "totalamountmedicine" => $expense->totalamountmedicine, 
                "totalamountmedicalsupplies" => $expense->totalamountmedicalsupplies, 
                "totalamountutilities" => $expense->totalamountutilities, 
                "totalamountnonmedicalservice" => $expense->totalamountnonmedicalservice, 
                "totalmooe" => $expense->totalmooe, 
                "amountinfrastructure" => $expense->amountinfrastructure, 
                "amountequipment" => $expense->amountequipment, 
                "totalco" => $expense->totalco, 
                "grandtotal" => $expense->grandtotal, 
                "reportingyear" => $expense->reportingyear, 
            ];

            $response = $this->soapWrapper->call('Emr.expenses', $data);

            $expense = Expense::where('reportingyear', $fields['reportingyear'])->first();
            $expense->submitted_at    = Carbon::now();
            $expense->save();

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