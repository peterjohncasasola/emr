<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\DischargesTesting;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class DischargesTestingController extends Controller {

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
            'reportingyear'=>$request->input('reportingyear')
        );

        $discharges_testing = DB::table('hospoptdischargestesting as dischargesTesting')
            ->select( 
                'dischargesTesting.id',
                'dischargesTesting.hfhudcode',
                'dischargesTesting.testinggroup',
                'dischargesTesting.testing',
                'dischargesTesting.number',
                'dischargesTesting.reportingyear'
            )->orderBy('dischargesTesting.testing', 'ASC');

        if ($data['id']){
            $discharges_testing = $discharges_testing->where('dischargesTesting.id', $data['id']);
        }

        if ($data['reportingyear']){
            $discharges_testing = $discharges_testing->where('dischargesTesting.reportingyear', $data['reportingyear']);
        }

        $discharges_testing = $discharges_testing->get();

        // return response()->json([
        //     'status'=>200,
        //     'data'=>$discharges_testing,
        //     'count'=>$discharges_testing->count(),
        //     'message'=>''
        // ],200,[], JSON_NUMERIC_CHECK);

        // return $discharges_testing = DischargesTesting::where('reportingyear', 2019)
        //                                         ->where('hfhudcode', 'NEHEHRSV201900093')
        //                                         // ->where('testing', '1')
        //                                         ->first();


        $default_data = array(
            array('code'=>'xray', 'id'=>1, 'name'=>'X-Ray', 'testinggroup'=>1),
            array('code'=>'ultrasound', 'id'=>2, 'name'=>'Ultrasound', 'testinggroup'=>1), 
            array('code'=>'ctscan', 'id'=>3, 'name'=>'CT-Scan', 'testinggroup'=>1), 
            array('code'=>'mri', 'id'=>4, 'name'=>'MRI', 'testinggroup'=>1), 
            array('code'=>'mammography', 'id'=>5, 'name'=>'Mammography', 'testinggroup'=>1), 
            array('code'=>'angiography', 'id'=>6, 'name'=>'Angiography', 'testinggroup'=>1), 
            array('code'=>'linearaccelerator', 'id'=>7, 'name'=>'Linear Accelerato', 'testinggroup'=>1), 
            array('code'=>'dentalxray', 'id'=>8, 'name'=>'Dental X-Ray', 'testinggroup'=>1), 
            array('code'=>'others', 'id'=>9, 'name'=>'Others', 'testinggroup'=>1),
            array('code'=>'urinalysis', 'id'=>10, 'name'=>'Urinalysis', 'testinggroup'=>2),
            array('code'=>'fecalysis', 'id'=>11, 'name'=>'Fecalysis', 'testinggroup'=>2),
            array('code'=>'hematology', 'id'=>12, 'name'=>'Hematology', 'testinggroup'=>2),
            array('code'=>'clinicalchemistry', 'id'=>13, 'name'=>'Clinical chemistry', 'testinggroup'=>2),
            array('code'=>'immunology', 'id'=>14, 'name'=>'Immunology/Serology/HIV', 'testinggroup'=>2),
            array('code'=>'microbiology', 'id'=>15, 'name'=>'Microbiology (Smears/Culture & Sensitivity)', 'testinggroup'=>2),
            array('code'=>'surgicalpathology', 'id'=>16, 'name'=>'Surgical Pathology', 'testinggroup'=>2),
            array('code'=>'autopsy', 'id'=>17, 'name'=>'Autopsy', 'testinggroup'=>2),
            array('code'=>'cytology', 'id'=>18, 'name'=>'Cytology', 'testinggroup'=>2),
            array('code'=>'numberofbloodunitstransfused', 'id'=>19, 'name'=>'Others', 'testinggroup'=>3)
        );

        $final_data = array();
    
        foreach($discharges_testing as $discharge_testing){
            foreach($default_data as $default_datum){
                if($discharge_testing->testing==$default_datum['id']){
                    array_push($final_data, array("testing"=>$default_datum['code'], "number"=>$discharge_testing->number));
                }
            }
        }

        $final_data2 = array_column($final_data, 'number', 'testing'); //set array data in 1 row data only

        return response()->json([
            'status'=>200,
            'data'=>$final_data2,
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
       
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $default_data = array(
                    array('code'=>'xray', 'id'=>1, 'name'=>'X-Ray', 'testinggroup'=>1),
                    array('code'=>'ultrasound', 'id'=>2, 'name'=>'Ultrasound', 'testinggroup'=>1), 
                    array('code'=>'ctscan', 'id'=>3, 'name'=>'CT-Scan', 'testinggroup'=>1), 
                    array('code'=>'mri', 'id'=>4, 'name'=>'MRI', 'testinggroup'=>1), 
                    array('code'=>'mammography', 'id'=>5, 'name'=>'Mammography', 'testinggroup'=>1), 
                    array('code'=>'angiography', 'id'=>6, 'name'=>'Angiography', 'testinggroup'=>1), 
                    array('code'=>'linearaccelerator', 'id'=>7, 'name'=>'Linear Accelerato', 'testinggroup'=>1), 
                    array('code'=>'dentalxray', 'id'=>8, 'name'=>'Dental X-Ray', 'testinggroup'=>1), 
                    array('code'=>'others', 'id'=>9, 'name'=>'Others', 'testinggroup'=>1),
                    array('code'=>'urinalysis', 'id'=>10, 'name'=>'Urinalysis', 'testinggroup'=>2),
                    array('code'=>'fecalysis', 'id'=>11, 'name'=>'Fecalysis', 'testinggroup'=>2),
                    array('code'=>'hematology', 'id'=>12, 'name'=>'Hematology', 'testinggroup'=>2),
                    array('code'=>'clinicalchemistry', 'id'=>13, 'name'=>'Clinical chemistry', 'testinggroup'=>2),
                    array('code'=>'immunology', 'id'=>14, 'name'=>'Immunology/Serology/HIV', 'testinggroup'=>2),
                    array('code'=>'microbiology', 'id'=>15, 'name'=>'Microbiology (Smears/Culture & Sensitivity)', 'testinggroup'=>2),
                    array('code'=>'surgicalpathology', 'id'=>16, 'name'=>'Surgical Pathology', 'testinggroup'=>2),
                    array('code'=>'autopsy', 'id'=>17, 'name'=>'Autopsy', 'testinggroup'=>2),
                    array('code'=>'cytology', 'id'=>18, 'name'=>'Cytology', 'testinggroup'=>2),
                    array('code'=>'numberofbloodunitstransfused', 'id'=>19, 'name'=>'Others', 'testinggroup'=>3)
                );
            
                foreach($default_data as $default_datum){

                    $discharges_testing = new DischargesTesting;
                    $discharges_testing->hfhudcode                              = "NEHEHRSV201900093";
                    $discharges_testing->testinggroup                           = $default_datum['testinggroup'];
                    $discharges_testing->testing                                = $default_datum['id'];
                    $discharges_testing->number                                 = $fields[$default_datum['code']];
                    $discharges_testing->reportingyear                          = $fields['reportingyear'];
                    $discharges_testing->save();

                }

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
        try{

            $default_data = array(
                array('code'=>'xray', 'id'=>1, 'name'=>'X-Ray', 'testinggroup'=>1),
                array('code'=>'ultrasound', 'id'=>2, 'name'=>'Ultrasound', 'testinggroup'=>1), 
                array('code'=>'ctscan', 'id'=>3, 'name'=>'CT-Scan', 'testinggroup'=>1), 
                array('code'=>'mri', 'id'=>4, 'name'=>'MRI', 'testinggroup'=>1), 
                array('code'=>'mammography', 'id'=>5, 'name'=>'Mammography', 'testinggroup'=>1), 
                array('code'=>'angiography', 'id'=>6, 'name'=>'Angiography', 'testinggroup'=>1), 
                array('code'=>'linearaccelerator', 'id'=>7, 'name'=>'Linear Accelerato', 'testinggroup'=>1), 
                array('code'=>'dentalxray', 'id'=>8, 'name'=>'Dental X-Ray', 'testinggroup'=>1), 
                array('code'=>'others', 'id'=>9, 'name'=>'Others', 'testinggroup'=>1),
                array('code'=>'urinalysis', 'id'=>10, 'name'=>'Urinalysis', 'testinggroup'=>2),
                array('code'=>'fecalysis', 'id'=>11, 'name'=>'Fecalysis', 'testinggroup'=>2),
                array('code'=>'hematology', 'id'=>12, 'name'=>'Hematology', 'testinggroup'=>2),
                array('code'=>'clinicalchemistry', 'id'=>13, 'name'=>'Clinical chemistry', 'testinggroup'=>2),
                array('code'=>'immunology', 'id'=>14, 'name'=>'Immunology/Serology/HIV', 'testinggroup'=>2),
                array('code'=>'microbiology', 'id'=>15, 'name'=>'Microbiology (Smears/Culture & Sensitivity)', 'testinggroup'=>2),
                array('code'=>'surgicalpathology', 'id'=>16, 'name'=>'Surgical Pathology', 'testinggroup'=>2),
                array('code'=>'autopsy', 'id'=>17, 'name'=>'Autopsy', 'testinggroup'=>2),
                array('code'=>'cytology', 'id'=>18, 'name'=>'Cytology', 'testinggroup'=>2),
                array('code'=>'numberofbloodunitstransfused', 'id'=>19, 'name'=>'Others', 'testinggroup'=>3)
            );
        
            foreach($default_data as $default_datum){

                $discharges_testing = DischargesTesting::where('reportingyear', $fields['reportingyear'])
                                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                                ->where('testing', $default_datum['id'])
                                                ->first();
 
                // $discharges_testing->hfhudcode                              = "NEHEHRSV201900093";
                // $discharges_testing->testinggroup                           = $default_datum['testinggroup'];
                $discharges_testing->testing                                   = $default_datum['id'];
                $discharges_testing->number                                    = $fields[$default_datum['code']];
                // $discharges_testing->reportingyear                          = $fields['reportingyear'];
                $discharges_testing->save();

            }

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

			DischargesTesting::where('id', $data['id'])->firstOrFail()->delete();

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

            $discharges_testing = DB::table('hospoptdischargestesting as dischargesTesting')
                ->select( 
                    'dischargesTesting.id',
                    'dischargesTesting.hfhudcode',
                    'dischargesTesting.testinggroup',
                    'dischargesTesting.testing',
                    'dischargesTesting.number',
                    'dischargesTesting.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($discharges_testing as $discharges_testing) {
                // code
                $data = [
                    "hfhudcode" => $discharges_testing->hfhudcode, 
                    "testinggroup" => $discharges_testing->testinggroup, 
                    "testing" => $discharges_testing->testing, 
                    "number" => $discharges_testing->number,
                    "reportingyear" => $discharges_testing->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.hospOptDischargesTesting', $data);
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