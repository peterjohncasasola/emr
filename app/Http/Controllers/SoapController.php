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
            'password' => '123456'
        ];
        // $response = $this->soapWrapper->call('Emr.authenticationTest', $data);
        // return response($response, 200)->header('Content-Type', 'application/xml');

        $data2 = [
            "hfhudcode" => "NEHEHRSV201900093", 
            "servicecapability" => 1, 
            "general" => 1, 
            "specialty" => "", 
            "specialtyspecify" => "", 
            "traumacapability" => 2, 
            "natureofownership" => 2, 
            "government" => 1, 
            "national" => 1, 
            "local" => 1, 
            "private" =>3, 
            "reportingyear" => 2017, 
            "ownershipothers" => "" 
        ];
        // $response2 = $this->soapWrapper->call('Emr.genInfoClassification', $data2);
        // return response($response2, 200)->header('Content-Type', 'application/xml');

        
        //get data
        $data3 = ["hfhudcode" => "NEHEHRSV201900093", "year" => 2017, "table" => "genInfoClassification"];
        $response3 = $this->soapWrapper->call('Emr.getDataTable', $data3);
        return response($response3, 200)->header('Content-Type', 'application/xml');
    
        // var_dump($response);
        exit;
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

        // $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        // $xml = new SimpleXMLElement($response);
        // $body = $xml->xpath('//SBody')[0];
        // $array = json_decode(json_encode((array)$body), TRUE); 
        // print_r($array);

        // $xml = file_get_contents($response);

        // SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
        // $xml = preg_replace(“/(<\/?)(\w+):([^>]*>)/”, “$1$2$3″, $xml);
        // $xml = simplexml_load_string($xml);
        // $json = json_encode($xml);
        // $responseArray = json_decode($json,true);

        // $data4 = ["hfhudcode" => "NEHEHRSV201900093", "numhai" => "", 
        // "numdischarges" => "", "infectionrate" => 0.60, "patientnumvap" => "",
        //  "totalventilatordays" => "", "resultvap" => 13.60, "patientnumbsi" => "", 
        //  "totalnumcentralline" => "", "resultbsi" => 11.10, "patientnumuti" => "", 
        //  "totalcatheterdays" => "", "resultuti" => 0.00, "numssi" => "", 
        //  "totalproceduresdone" => "", "resultssi" => 123.00, "reportingyear" => 2017];

        // $response3 = $this->soapWrapper->call('Emr.hospitalOperationsHAI', $data4);
        // return response($response3, 200)->header('Content-Type', 'application/xml');
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