<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\StaffingPattern;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class StaffingPatternController extends Controller {

    protected $soapWrapper;
 
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }
    
	public function index(){
        return view('layout.index');
    }
    
    public function show(Request $request){

        $rpositions = DB::table('rposition_lib as rposition')
            ->select( 
                'rposition.poscode',
                'rposition.posdesc',
                'rposition.postype',
                'rposition.poscode_parent',
                'rposition.indent'
            )->get();

        $staffing_patterns = DB::table('staffingpattern as staffingPattern')
            ->select( 
                'staffingPattern.id',
                'staffingPattern.hfhudcode',
                'staffingPattern.professiondesignation',
                'staffingPattern.specialtyboardcertified',
                'staffingPattern.fulltime40permanent',
                'staffingPattern.fulltime40contractual',
                'staffingPattern.parttimepermanent',
                'staffingPattern.parttimecontractual',
                'staffingPattern.activerotatingaffiliate',
                'staffingPattern.outsourced',
                'staffingPattern.reportingyear'
            )->get();

        foreach($rpositions as $key=>$rposition){

            $rposition->values = array('id'=>null, 'hfhudcode'=>null, 'professiondesignation'=>null, 'specialtyboardcertified'=>0, 
                        'fulltime40permanent'=>0, 'fulltime40contractual'=>0, 'parttimepermanent'=>0, 'parttimecontractual'=>0,
                        'activerotatingaffiliate'=>0, 'outsourced'=>0, 'reportingyear'=>0
                    );

            foreach($staffing_patterns as $staffing_pattern){

                if($staffing_pattern->professiondesignation==$rposition->poscode){
                    $rposition->values = $staffing_pattern;
                }

            }
        }

        return response()->json([
            'status'=>200,
            'data'=>$rpositions,
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
       
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                    $total_count = count($fields);

                    for($counter=0; $counter<$total_count; $counter++) {

                        $staffing_pattern = new StaffingPattern;
                        $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                        $staffing_pattern->professiondesignation        = $fields[$counter]['poscode'];
                        $staffing_pattern->specialtyboardcertified      = $fields[$counter]['values']['specialtyboardcertified'];
                        $staffing_pattern->fulltime40permanent          = $fields[$counter]['values']['fulltime40permanent'];
                        $staffing_pattern->fulltime40contractual        = $fields[$counter]['values']['fulltime40contractual'];
                        $staffing_pattern->parttimepermanent            = $fields[$counter]['values']['parttimepermanent'];
                        $staffing_pattern->parttimecontractual          = $fields[$counter]['values']['parttimecontractual'];
                        $staffing_pattern->activerotatingaffiliate      = $fields[$counter]['values']['activerotatingaffiliate'];
                        $staffing_pattern->outsourced                   = $fields[$counter]['values']['outsourced'];
                        $staffing_pattern->reportingyear                = $fields[$counter]['reportingyear'];
                        $staffing_pattern->save();

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
        // try{

            $total_count = count($fields);

            for($counter=0; $counter<$total_count; $counter++) {

                $staffing_pattern = StaffingPattern::where('reportingyear', $fields[$counter]['reportingyear'])
                                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                                ->where('professiondesignation', $fields[$counter]['poscode'])
                                                ->first();

                $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                $staffing_pattern->professiondesignation        = $fields[$counter]['poscode'];
                $staffing_pattern->specialtyboardcertified      = $fields[$counter]['values']['specialtyboardcertified'];
                $staffing_pattern->fulltime40permanent          = $fields[$counter]['values']['fulltime40permanent'];
                $staffing_pattern->fulltime40contractual        = $fields[$counter]['values']['fulltime40contractual'];
                $staffing_pattern->parttimepermanent            = $fields[$counter]['values']['parttimepermanent'];
                $staffing_pattern->parttimecontractual          = $fields[$counter]['values']['parttimecontractual'];
                $staffing_pattern->activerotatingaffiliate      = $fields[$counter]['values']['activerotatingaffiliate'];
                $staffing_pattern->outsourced                   = $fields[$counter]['values']['outsourced'];
                $staffing_pattern->reportingyear                = $fields[$counter]['reportingyear'];
                $staffing_pattern->save();

            }

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

			DischargesStaffingPattern::where('id', $data['id'])->firstOrFail()->delete();

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

        $staffing_patterns = DB::table('staffingpattern as staffingPattern')
            ->select( 
                'staffingPattern.id',
                'staffingPattern.hfhudcode',
                'staffingPattern.professiondesignation',
                'staffingPattern.specialtyboardcertified',
                'staffingPattern.fulltime40permanent',
                'staffingPattern.fulltime40contractual',
                'staffingPattern.parttimepermanent',
                'staffingPattern.parttimecontractual',
                'staffingPattern.activerotatingaffiliate',
                'staffingPattern.outsourced',
                'staffingPattern.reportingyear'
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

        foreach ($staffing_patterns as $staffing_pattern) {
            // code
            $data = [
                "hfhudcode" => "NEHEHRSV201900093", 
                "professiondesignation" => $staffing_pattern->professiondesignation, 
                "specialtyboardcertified" => $staffing_pattern->specialtyboardcertified, 
                "fulltime40permanent" => $staffing_pattern->fulltime40permanent,
                "fulltime40contractual" => $staffing_pattern->fulltime40contractual,
                "parttimepermanent" => $staffing_pattern->parttimepermanent,
                "parttimecontractual" => $staffing_pattern->parttimecontractual,
                "activerotatingaffiliate" => $staffing_pattern->activerotatingaffiliate,
                "outsourced" => $staffing_pattern->outsourced,
                "reportingyear" => 2017
            ];
        
            $response = $this->soapWrapper->call('Emr.staffingPattern', $data);
        }
    }
  	
}