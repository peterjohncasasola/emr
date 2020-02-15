<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Config;

use DB;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class NdaController extends Controller {
    
	public function index(){
        return view('layout.index');
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



  	
}