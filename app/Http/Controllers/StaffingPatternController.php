<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\StaffingPattern;
use App\StaffingPatternOthers;

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

        $data = array(
            'id'=>$request->input('id'),
            'reportingyear'=>$request->input('reportingyear'),
        );

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
            );

            if ($data['reportingyear']){
                $staffing_patterns = $staffing_patterns->where('staffingPattern.reportingyear', $data['reportingyear']);
            }
            
            $staffing_patterns = $staffing_patterns->get(); 

        foreach($rpositions as $key=>$rposition){

            $rposition->values = array('id'=>null, 'hfhudcode'=>'', 'professiondesignation'=>0, 'specialtyboardcertified'=>0, 
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

    public function show_others(Request $request){

        $data = array(
                    'id'=>$request->input('id'),
                    'reportingyear'=>$request->input('reportingyear'),
                );
        $rpositions = DB::table('rparentposition_lib as rposition')
            ->select( 
                'rposition.poscode',
                'rposition.posdesc',
                'rposition.postype',
                'rposition.poscode_parent',
                'rposition.indent'
            )->get();

        $staffing_patterns = DB::table('staffingpatternothers as staffingPattern')
            ->select( 
                'staffingPattern.id',
                'staffingPattern.hfhudcode',
                'staffingPattern.parent',
                'staffingPattern.professiondesignation',
                'staffingPattern.specialtyboardcertified',
                'staffingPattern.fulltime40permanent',
                'staffingPattern.fulltime40contractual',
                'staffingPattern.parttimepermanent',
                'staffingPattern.parttimecontractual',
                'staffingPattern.activerotatingaffiliate',
                'staffingPattern.outsourced',
                'staffingPattern.reportingyear'
            );

            if ($data['reportingyear']){
                $staffing_patterns = $staffing_patterns->where('staffingPattern.reportingyear', $data['reportingyear']);
            }
            
            $staffing_patterns = $staffing_patterns->get(); 

        foreach($rpositions as $key=>$rposition){
            $rposition->values = array();
            foreach($staffing_patterns as $staffing_pattern){

                if($staffing_pattern->parent==$rposition->poscode){
                    $rposition->values[] = $staffing_pattern;
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

    public function store_others(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                    $total_count = count($fields);

                    for($counter=0; $counter<$total_count; $counter++) {

                        if($fields[$counter]['professiondesignation']){

                        $staffing_pattern = new StaffingPatternOthers;
                        $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                        $staffing_pattern->parent                       = $fields[$counter]['parent'];
                        $staffing_pattern->professiondesignation        = $fields[$counter]['professiondesignation'];
                        $staffing_pattern->specialtyboardcertified      = $fields[$counter]['specialtyboardcertified'];
                        $staffing_pattern->fulltime40permanent          = $fields[$counter]['fulltime40permanent'];
                        $staffing_pattern->fulltime40contractual        = $fields[$counter]['fulltime40contractual'];
                        $staffing_pattern->parttimepermanent            = $fields[$counter]['parttimepermanent'];
                        $staffing_pattern->parttimecontractual          = $fields[$counter]['parttimecontractual'];
                        $staffing_pattern->activerotatingaffiliate      = $fields[$counter]['activerotatingaffiliate'];
                        $staffing_pattern->outsourced                   = $fields[$counter]['outsourced'];
                        $staffing_pattern->reportingyear                = 2019;
                        $staffing_pattern->save();

                        }

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

                $staffing_pattern_count = StaffingPattern::where('reportingyear', $fields[$counter]['reportingyear'])
                                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                                ->where('professiondesignation', $fields[$counter]['poscode'])
                                                ->count();

                if($staffing_pattern_count>0){

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

                }else{
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

    public function update_others(Request $request){

        // $data = array(
        //     'id'=>$request->input('id'),
        //     'reportingyear'=>$request->input('reportingyear'),
        //     'reportingyear'=>$request->input('reportingyear'),
        // );

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
        // try{

            // original fields
            foreach($fields['orginal'] as $key=>$field){

                foreach($field as $field2){

                    if(!empty($field2['values'])){

                        $staffing_pattern_count = StaffingPattern::where('reportingyear', $field2['values']['reportingyear'])
                                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                                ->where('id', $field2['values']['id'])
                                                ->count();

                        if($staffing_pattern_count>0){

                            $staffing_pattern = StaffingPattern::where('reportingyear', $field2['values']['reportingyear'])
                            ->where('hfhudcode', 'NEHEHRSV201900093')
                            ->where('id', $field2['values']['id'])
                            ->first();

                            $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                            $staffing_pattern->professiondesignation        = $field2['values']['professiondesignation'];
                            $staffing_pattern->specialtyboardcertified      = $field2['values']['specialtyboardcertified'];
                            $staffing_pattern->fulltime40permanent          = $field2['values']['fulltime40permanent'];
                            $staffing_pattern->fulltime40contractual        = $field2['values']['fulltime40contractual'];
                            $staffing_pattern->parttimepermanent            = $field2['values']['parttimepermanent'];
                            $staffing_pattern->parttimecontractual          = $field2['values']['parttimecontractual'];
                            $staffing_pattern->activerotatingaffiliate      = $field2['values']['activerotatingaffiliate'];
                            $staffing_pattern->outsourced                   = $field2['values']['outsourced'];
                            $staffing_pattern->reportingyear                = $field2['values']['reportingyear'];
                            $staffing_pattern->save();

                        }else{

                            $staffing_pattern = new StaffingPattern;
                            $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                            $staffing_pattern->professiondesignation        = $field2['values']['professiondesignation'];
                            $staffing_pattern->specialtyboardcertified      = $field2['values']['specialtyboardcertified'];
                            $staffing_pattern->fulltime40permanent          = $field2['values']['fulltime40permanent'];
                            $staffing_pattern->fulltime40contractual        = $field2['values']['fulltime40contractual'];
                            $staffing_pattern->parttimepermanent            = $field2['values']['parttimepermanent'];
                            $staffing_pattern->parttimecontractual          = $field2['values']['parttimecontractual'];
                            $staffing_pattern->activerotatingaffiliate      = $field2['values']['activerotatingaffiliate'];
                            $staffing_pattern->outsourced                   = $field2['values']['outsourced'];
                            $staffing_pattern->reportingyear                = $field2['values']['reportingyear'];
                            $staffing_pattern->save();
                            
                        }
                    }
                }

            }

            //others
            foreach($fields['others'] as $key=>$field){

                foreach($field as $field2){

                    if(!empty($field2['values'])){

                        foreach($field2['values'] as $field3){

                            $staffing_pattern_count = StaffingPatternOthers::where('reportingyear', $field3['reportingyear'])
                                                    ->where('hfhudcode', 'NEHEHRSV201900093')
                                                    ->where('id', $field3['id'])
                                                    ->count();

                            if($staffing_pattern_count>0){

                                $staffing_pattern = StaffingPatternOthers::where('reportingyear', $field3['reportingyear'])
                                ->where('hfhudcode', 'NEHEHRSV201900093')
                                ->where('id', $field3['id'])
                                ->first();

                                $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                                $staffing_pattern->parent                       = $field3['parent'];
                                $staffing_pattern->professiondesignation        = $field3['professiondesignation'];
                                $staffing_pattern->specialtyboardcertified      = $field3['specialtyboardcertified'];
                                $staffing_pattern->fulltime40permanent          = $field3['fulltime40permanent'];
                                $staffing_pattern->fulltime40contractual        = $field3['fulltime40contractual'];
                                $staffing_pattern->parttimepermanent            = $field3['parttimepermanent'];
                                $staffing_pattern->parttimecontractual          = $field3['parttimecontractual'];
                                $staffing_pattern->activerotatingaffiliate      = $field3['activerotatingaffiliate'];
                                $staffing_pattern->outsourced                   = $field3['outsourced'];
                                $staffing_pattern->reportingyear                = $field3['reportingyear'];
                                $staffing_pattern->save();

                            }else{
                                $staffing_pattern = new StaffingPatternOthers;
                                $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                                $staffing_pattern->parent                       = $field3['parent'];
                                $staffing_pattern->professiondesignation        = $field3['professiondesignation'];
                                $staffing_pattern->specialtyboardcertified      = $field3['specialtyboardcertified'];
                                $staffing_pattern->fulltime40permanent          = $field3['fulltime40permanent'];
                                $staffing_pattern->fulltime40contractual        = $field3['fulltime40contractual'];
                                $staffing_pattern->parttimepermanent            = $field3['parttimepermanent'];
                                $staffing_pattern->parttimecontractual          = $field3['parttimecontractual'];
                                $staffing_pattern->activerotatingaffiliate      = $field3['activerotatingaffiliate'];
                                $staffing_pattern->outsourced                   = $field3['outsourced'];
                                $staffing_pattern->reportingyear                = $field3['reportingyear'];
                                $staffing_pattern->save();
                                
                            }
                        }
                    }
                }


            }

            // new others
            foreach($fields['newothers'] as $key=>$field){
 
                foreach($field as $field2){
                
                    if(!empty($field2['professiondesignation'])){
                            
                        $staffing_pattern = new StaffingPatternOthers;
                        $staffing_pattern->hfhudcode                    = 'NEHEHRSV201900093';
                        $staffing_pattern->parent                       = $field2['parent'];
                        $staffing_pattern->professiondesignation        = $field2['professiondesignation'];
                        $staffing_pattern->specialtyboardcertified      = $field2['specialtyboardcertified'];
                        $staffing_pattern->fulltime40permanent          = $field2['fulltime40permanent'];
                        $staffing_pattern->fulltime40contractual        = $field2['fulltime40contractual'];
                        $staffing_pattern->parttimepermanent            = $field2['parttimepermanent'];
                        $staffing_pattern->parttimecontractual          = $field2['parttimecontractual'];
                        $staffing_pattern->activerotatingaffiliate      = $field2['activerotatingaffiliate'];
                        $staffing_pattern->outsourced                   = $field2['outsourced'];
                        $staffing_pattern->reportingyear                = $field2['reportingyear'];;
                        $staffing_pattern->save();      

                    }
                }
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
                )->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($staffing_patterns as $staffing_pattern) {
                // code
                $data = [
                    "hfhudcode" => $staffing_pattern->hfhudcode, 
                    "professiondesignation" => $staffing_pattern->professiondesignation, 
                    "specialtyboardcertified" => $staffing_pattern->specialtyboardcertified, 
                    "fulltime40permanent" => $staffing_pattern->fulltime40permanent,
                    "fulltime40contractual" => $staffing_pattern->fulltime40contractual,
                    "parttimepermanent" => $staffing_pattern->parttimepermanent,
                    "parttimecontractual" => $staffing_pattern->parttimecontractual,
                    "activerotatingaffiliate" => $staffing_pattern->activerotatingaffiliate,
                    "outsourced" => $staffing_pattern->outsourced,
                    "reportingyear" => $staffing_pattern->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.staffingPattern', $data);
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