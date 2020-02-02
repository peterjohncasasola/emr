<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Config;

use DB;
use App\Expense;
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
                'expense.reportingyear'
            );

        if ($data['id']){
            $expenses = $expenses->where('expense.id', $data['id']);
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

    public function send_data_doh(){

        $revenue = DB::table('expenses as expense')
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
            "salarieswages" => $revenue->salarieswages, 
            "employeebenefits" => $revenue->employeebenefits, 
            "allowances" => $revenue->allowances, 
            "totalps" => $revenue->totalps, 
            "totalamountmedicine" => $revenue->totalamountmedicine, 
            "totalamountmedicalsupplies" => $revenue->totalamountmedicalsupplies, 
            "totalamountutilities" => $revenue->totalamountutilities, 
            "totalamountnonmedicalservice" => $revenue->totalamountnonmedicalservice, 
            "totalmooe" => $revenue->totalmooe, 
            "amountinfrastructure" => $revenue->amountinfrastructure, 
            "amountequipment" => $revenue->amountequipment, 
            "totalco" => $revenue->totalco, 
            "grandtotal" => $revenue->grandtotal, 
            "reportingyear" => 2017
        ];

        $response = $this->soapWrapper->call('Emr.expenses', $data);
        return response($response, 200)->header('Content-Type', 'application/xml');
        exit;
    }


    public function sample(){
        echo Config::get('defaults.default.is_local');
    }
  	
}