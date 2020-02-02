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
        );

        $qualityManagement = DB::table('genInfoQualityManagement as qualityManagement')
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

        $qualityManagement = $qualityManagement->get();

        return response()->json([
            'status'=>200,
            'data'=>$qualityManagement,
            'count'=>$qualityManagement->count(),
            'message'=>''
        ]);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $qualityManagement = new QualityManagement;
                $qualityManagement->hfhudcode                    = "NEHEHRSV201900093";
                $qualityManagement->qualitymgmttype              = $fields['qualitymgmttype'];
                $qualityManagement->description                  = $fields['description'];
                $qualityManagement->certifyingbody               = (!empty($fields['certifyingbody']))?$fields['certifyingbody']:null;
                $qualityManagement->philhealthaccreditation      = (!empty($fields['philhealthaccreditation']))?$fields['philhealthaccreditation']:null;
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

    public function send_data_doh(){

        $qualityManagement = DB::table('genInfoQualityManagement as qualityManagement')
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
            "qualitymgmttype" => $qualityManagement->qualitymgmttype, 
            "description" => $qualityManagement->description, 
            "certifyingbody" => $qualityManagement->certifyingbody, 
            "philhealthaccreditation" => $qualityManagement->philhealthaccreditation, 
            "validityfrom" => $qualityManagement->validityfrom, 
            "validityto" => $qualityManagement->validityto,
            "reportingyear" => 2017
        ];

        $response = $this->soapWrapper->call('Emr.genInfoqualityManagement', $data);
        return response($response, 200)->header('Content-Type', 'application/xml');
        exit;
    }
  	
}