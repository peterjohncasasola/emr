<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Config;

use DB;
use Auth;
use App\Expense;
use App\Revenue;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DashboardController extends Controller {

    protected $soapWrapper;

 
    public function __construct(SoapWrapper $soapWrapper)
    {
      $this->soapWrapper = $soapWrapper;
    }
    
	public function index(){
        return view('layout.index');
    }
    
    public function expenses_vs_revenues(Request $request){

        $years = array();
        $expenses = array();
        $revenues = array();
        $data = array();

        for($year=2010;$year<=2019;$year++){
            //get years
            array_push($years, $year);

            //get expenses
            $expense = Expense::select('grandtotal')->where('reportingyear', $year)->first();
            if(!empty($expense)){
                array_push($expenses, $expense->grandtotal);
            }else{
                array_push($expenses, 0);
            }

            //get revenues
            $revenue = Revenue::select('grandtotal')->where('reportingyear', $year)->first();
            if(!empty($revenue)){
                array_push($revenues, $revenue->grandtotal);
            }else{
                array_push($revenues, 0);
            }
            
        }

        array_push($data, $expenses);
        array_push($data, $revenues);

        $series = array('Expenses', 'Revenues');

        return response()->json([
            'status'=>200,
            'labels'=>$years,
            'series'=>$series,
            'data'=>$data,
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function progress(Request $request){
        $data = array(
            'reportingyear'=>$request->input('reportingyear'),
        );

        $modules = array(
            array('table'=>'geninfobedcapacity', 'desc'=>'Bed Capacity', 'value'=>0),
            array('table'=>'geninfoqualitymanagement', 'desc'=>'Quality Management', 'value'=>0),
            array('table'=>'geninfoclassification', 'desc'=>'Classification', 'value'=>0),
            array('table'=>'hospitaloperationsdeaths', 'desc'=>'Operations Death', 'value'=>0),
            array('table'=>'hospitaloperationshai', 'desc'=>'Operations HAI', 'value'=>0),
            array('table'=>'hospitaloperationsmajoropt', 'desc'=>'Operations Major', 'value'=>0),
            array('table'=>'hospitaloperationsminoropt', 'desc'=>'Operations Minor', 'value'=>0),
            array('table'=>'hospitaloperationsmortalitydeaths', 'desc'=>'Operations Mortality Death', 'value'=>0),
            array('table'=>'hospoptdischargeser', 'desc'=>'Discharges ER', 'value'=>0),
            array('table'=>'hospoptdischargesev', 'desc'=>'Discharges EV', 'value'=>0),
            array('table'=>'hospoptdischargesmorbidity', 'desc'=>'Discharges Morbidity', 'value'=>0),
            array('table'=>'hospoptdischargesnumberdeliveries', 'desc'=>'Discharges Number Deliveries', 'value'=>0),
            array('table'=>'hospoptdischargesopd', 'desc'=>'Discharges OPD', 'value'=>0),
            array('table'=>'hospoptdischargesopv', 'desc'=>'Discharges OPV', 'value'=>0),
            array('table'=>'hospoptdischargesspecialty', 'desc'=>'Discharges Specialty', 'value'=>0),
            array('table'=>'hospoptdischargestesting', 'desc'=>'Discharges Testing', 'value'=>0),
            array('table'=>'hospoptsummaryofpatients', 'desc'=>'Discharges Summary Of Patients', 'value'=>0),
            array('table'=>'staffingpattern', 'desc'=>'Staffing Pattern', 'value'=>0),
            array('table'=>'expenses', 'desc'=>'Expenses', 'value'=>0),
            array('table'=>'revenues', 'desc'=>'Revenues', 'value'=>0)
        );

        $total = 0;
        foreach($modules as $key=>$module){
           
            $table = DB::table($module['table'])->where('reportingyear', $data['reportingyear'])->first();

            // return $table;
            if(!empty($table)){
                $modules[$key]['value'] = 5;
                $modules[$key]['percentage'] = 100;
                $total = $total + 5;
            }else{
                $modules[$key]['value'] = 0;
                $modules[$key]['percentage'] = 0;
            }

        }

        return response()->json([
            'status'=>200,
            'data'=>$modules,
            'total'=>$total,
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
        
    }

  	
}