<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Config;

use DB;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class UsersController extends Controller {

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

    // public function store(Request $request){

    //     $fields = Input::post();

    //     $transaction = DB::transaction(function($field) use($fields){
    //         try{

    //             $expense = new Expense;
    //             $expense->hfhudcode                     = "NEHEHRSV201900093";
    //             $expense->salarieswages                 = $fields['salarieswages'];
    //             $expense->employeebenefits              = $fields['employeebenefits'];
    //             $expense->allowances                    = $fields['allowances'];
    //             // $expense->totalps                       = $fields['totalps'];
    //             $expense->totalps                       = $fields['salarieswages']+$fields['employeebenefits']+$fields['allowances'];
    //             $expense->totalamountmedicine           = $fields['totalamountmedicine'];
    //             $expense->totalamountmedicalsupplies    = $fields['totalamountmedicalsupplies'];
    //             $expense->totalamountutilities          = $fields['totalamountutilities'];
    //             $expense->totalamountnonmedicalservice  = $fields['totalamountnonmedicalservice'];
    //             // $expense->totalmooe                     = $fields['totalmooe'];
    //             $expense->totalmooe                     = $fields['totalamountmedicine']+$fields['totalamountmedicalsupplies']+$fields['totalamountutilities']+$fields['totalamountnonmedicalservice'];
    //             $expense->amountinfrastructure          = $fields['amountinfrastructure'];
    //             $expense->amountequipment               = $fields['amountequipment'];
    //             // $expense->totalco                       = $fields['totalco'];
    //             $expense->totalco                       = $fields['amountinfrastructure']+$fields['amountequipment'];
    //             $expense->grandtotal                    = $expense->totalps+$expense->totalmooe+$expense->totalco;
    //             $expense->reportingyear                 = $fields['reportingyear'];
    //             $expense->save();

    //             return response()->json([
    //                 'status' => 200,
    //                 'data' => null,
    //                 'message' => 'Successfully saved.'
    //             ]);

    //         }
    //         catch (\Exception $e) 
    //         {
    //             return response()->json([
    //                 'status' => 500,
    //                 'data' => null,
    //                 'message' => 'Error, please try again!'
    //             ]);
    //         }
    //     });

    //     return $transaction;
    // }

    public function update(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        try{

            $user = User::where('id', $fields['id'])->first();
            $user->hfhudcode                     = "NEHEHRSV201900093";
            $user->is_nda_accepted               = 1;
            $user->nda_accepted_at               = Carbon::now();
            $user->save();

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

    public function accept_nda(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        // try{

            $user = User::where('email', Auth::user()->email)->first();
            $user->is_nda_accepted               = 1;
            $user->nda_accepted_at               = Carbon::now();
            $user->save();

            return response()->json([
                'status' => 200,
                'data' => null,
                'message' => 'Successfully accepted.'
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

}