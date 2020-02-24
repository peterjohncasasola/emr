<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;

class SoapController extends Controller {

    protected $soapWrapper;
 
    public function __construct(SoapWrapper $soapWrapper)
    {
      $this->soapWrapper = $soapWrapper;
    }

    public function show() 
    {
        
        $request = $this->soapWrapper->add('Emr', function ($service) {
            $service
            ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
            ->trace(false);
        });

        $data = [
            'login' => 'NEHEHRSV201900093',
            'password' => '1234567'
        ];
        $response = $this->soapWrapper->call('Emr.authenticationTest', $data);
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        return $array = json_decode($json, true);
        
    }
    
    public function gettable(){

        $request = $this->soapWrapper->add('Emr', function ($service) {
            $service
            ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
            ->trace(false);
        });
        
        $data3 = ["hfhudcode" => "NEHEHRSV201900093", "year" => 2017, "table" => "hospitalOperationsHAI"];
        $response3 = $this->soapWrapper->call('Emr.getDataTable', $data3);

        $response = response($response3, 200)->header('Content-Type', 'application/json');


        $xmlNode = simplexml_load_string($response);
        $arrayData = $this->xmlToArray($xmlNode);
        return json_encode($arrayData);

    }

    public function gettable2(){

        $request = $this->soapWrapper->add('Emr', function ($service) {
            $service
            ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
            ->trace(false);
        });
        
        $data3 = ["hfhudcode" => "NEHEHRSV201900093", "year" => 2019, "table" => "genInfoQualityManagement"];
        $response3 = $this->soapWrapper->call('Emr.getDataTable', $data3);

        $response = response($response3, 200)->header('Content-Type', 'application/xml');

        $xml = simplexml_load_string($response3);
        $json = json_encode($xml);
        return $array = json_decode($json, true);
        // return $array['response_code'];
    }

    public function gettable3(){

        $request = $this->soapWrapper->add('Emr', function ($service) {
            $service
            ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
            ->trace(false);
        });
        
        $data3 = ["hfhudcode" => "NEHEHRSV201900093", "year" => 2019, "table" => "genInfoQualityManagement"];
        $response3 = $this->soapWrapper->call('Emr.getDataTable', $data3);

        $response = response($response3, 200)->header('Content-Type', 'application/xml');

        $xml = simplexml_load_string($response3);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        return $array['response_code'];
    }



    public function checksubmittedreports(){
        $param = array( "hfhudcode" => "NEHEHRSV201900093", "year" => 2019, "table" => "submittedReports", );
        $soap = new SoapClient("http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl");
        $xml = $soap->__soapCall("getDataTable", $param);
        header("Content-Type: text/xml");
        echo $xml;
    }
  	
}