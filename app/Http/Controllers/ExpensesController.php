<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Expense;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ExpensesController extends Controller {
    
	public function index(){
        return view('layout.index');
        
        
	}
  	
}