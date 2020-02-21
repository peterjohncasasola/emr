<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\QualityManagement;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Artisaninweb\SoapWrapper\SoapWrapper;

class QualityManagementController extends Controller {

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

        $qualityManagement = DB::table('geninfoqualitymanagement as qualityManagement')
            ->select( 
                'qualityManagement.id',
                'qualityManagement.hfhudcode',
                'qualityManagement.qualitymgmttype',
                'qualityManagement.description',
                'qualityManagement.certifyingbody',
                'qualityManagement.philhealthaccreditation',
                'qualityManagement.validityfrom',
                'qualityManagement.validityto',
                'qualityManagement.reportingyear'
            );

        if ($data['id']){
            $qualityManagement = $qualityManagement->where('qualityManagement.id', $data['id']);
        }

        if ($data['reportingyear']){
            $qualityManagement = $qualityManagement->where('qualityManagement.reportingyear', $data['reportingyear']);
        }

        $qualityManagement = $qualityManagement->get();

        return response()->json([
            'status'=>200,
            'data'=>$qualityManagement,
            'count'=>$qualityManagement->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $qualityManagement = new QualityManagement;
                $qualityManagement->hfhudcode                       = "NEHEHRSV201900093";
                $qualityManagement->qualitymgmttype                 = $fields['qualitymgmttype'];
                $qualityManagement->description                     = $fields['description'];

                if($fields['qualitymgmttype']==1){
                    $qualityManagement->certifyingbody               = (!empty($fields['certifyingbody']))?$fields['certifyingbody']:"";
                    $qualityManagement->philhealthaccreditation      = 0;
                }elseif($fields['qualitymgmttype']==3){
                    $qualityManagement->certifyingbody               = "";
                    $qualityManagement->philhealthaccreditation      = (!empty($fields['philhealthaccreditation']))?$fields['philhealthaccreditation']:0;
                }else{
                    $qualityManagement->certifyingbody               = "";
                    $qualityManagement->philhealthaccreditation      = 0;
                }

                $qualityManagement->validityfrom                 = date('Y-m-d', strtotime($fields['validityfrom']));
                $qualityManagement->validityto                   = date('Y-m-d', strtotime($fields['validityto']));
                $qualityManagement->reportingyear                = $fields['reportingyear'];
                $qualityManagement->save();

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

            $qualityManagement = QualityManagement::where('reportingyear', $fields['reportingyear'])->first();
            $qualityManagement->hfhudcode                    = "NEHEHRSV201900093";
            $qualityManagement->qualitymgmttype              = $fields['qualitymgmttype'];
            $qualityManagement->description                  = $fields['description'];
            $qualityManagement->certifyingbody               = $fields['certifyingbody'];
            $qualityManagement->philhealthaccreditation      = $fields['philhealthaccreditation'];
            $qualityManagement->validityfrom                 = $fields['validityfrom'];
            $qualityManagement->validityto                   = $fields['validityto'];
            $qualityManagement->reportingyear                = $fields['reportingyear'];
            $qualityManagement->save();

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

			QualityManagement::where('id', $data['id'])->firstOrFail()->delete();

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

            $qualityManagements = DB::table('geninfoqualitymanagement as qualityManagement')
                ->select( 
                    'qualityManagement.id',
                    'qualityManagement.hfhudcode',
                    'qualityManagement.qualitymgmttype',
                    'qualityManagement.description',
                    'qualityManagement.certifyingbody',
                    'qualityManagement.philhealthaccreditation',
                    'qualityManagement.validityfrom',
                    'qualityManagement.validityto',
                    'qualityManagement.reportingyear'
                )->where('reportingyear', $fields['reportingyear'])->get();

            foreach ($qualityManagements as $qualityManagement) {
                // code
                $data = [
                    "hfhudcode" => $qualityManagement->hfhudcode, 
                    "qualitymgmttype" => $qualityManagement->qualitymgmttype, 
                    "description" => $qualityManagement->description, 
                    "certifyingbody" => $qualityManagement->certifyingbody, 
                    "philhealthaccreditation" => $qualityManagement->philhealthaccreditation, 
                    "validityfrom" => $qualityManagement->validityfrom, 
                    "validityto" => $qualityManagement->validityto,
                    "reportingyear" => $qualityManagement->reportingyear
                ];
            
                $response = $this->soapWrapper->call('Emr.genInfoqualityManagement', $data);
            }

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