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
        
        $data3 = ["hfhudcode" => "NEHEHRSV201900093", "year" => 2017, "table" => "hospitalOperationsHAI"];
        $response3 = $this->soapWrapper->call('Emr.getDataTable', $data3);

        return  $response = response($response3, 200)->header('Content-Type', 'application/xml');

         $xmlNode = simplexml_load_string($response);
         return $arrayData = $this->xmlToArray($xmlNode);

    }

    function xmlToArray($xml, $options = array()) {
        $defaults = array(
            'namespaceSeparator' => ':',//you may want this to be something other than a colon
            'attributePrefix' => '@',   //to distinguish between attributes and nodes with the same name
            'alwaysArray' => array(),   //array of xml tag names which should always become arrays
            'autoArray' => true,        //only create arrays for tags which appear more than once
            'textContent' => '$',       //key used for the text content of elements
            'autoText' => true,         //skip textContent key if node has no attributes or child nodes
            'keySearch' => false,       //optional search and replace on tag and attribute names
            'keyReplace' => false       //replace values for above search values (as passed to str_replace())
        );
        $options = array_merge($defaults, $options);
        $namespaces = $xml->getDocNamespaces();
        $namespaces[''] = null; //add base (empty) namespace
     
        //get attributes from all namespaces
        $attributesArray = array();
        foreach ($namespaces as $prefix => $namespace) {
            foreach ($xml->attributes($namespace) as $attributeName => $attribute) {
                //replace characters in attribute name
                if ($options['keySearch']) $attributeName =
                        str_replace($options['keySearch'], $options['keyReplace'], $attributeName);
                $attributeKey = $options['attributePrefix']
                        . ($prefix ? $prefix . $options['namespaceSeparator'] : '')
                        . $attributeName;
                $attributesArray[$attributeKey] = (string)$attribute;
            }
        }
     
        //get child nodes from all namespaces
        $tagsArray = array();
        foreach ($namespaces as $prefix => $namespace) {
            foreach ($xml->children($namespace) as $childXml) {
                //recurse into child nodes
                $childArray = xmlToArray($childXml, $options);
                list($childTagName, $childProperties) = each($childArray);
     
                //replace characters in tag name
                if ($options['keySearch']) $childTagName =
                        str_replace($options['keySearch'], $options['keyReplace'], $childTagName);
                //add namespace prefix, if any
                if ($prefix) $childTagName = $prefix . $options['namespaceSeparator'] . $childTagName;
     
                if (!isset($tagsArray[$childTagName])) {
                    //only entry with this key
                    //test if tags of this type should always be arrays, no matter the element count
                    $tagsArray[$childTagName] =
                            in_array($childTagName, $options['alwaysArray']) || !$options['autoArray']
                            ? array($childProperties) : $childProperties;
                } elseif (
                    is_array($tagsArray[$childTagName]) && array_keys($tagsArray[$childTagName])
                    === range(0, count($tagsArray[$childTagName]) - 1)
                ) {
                    //key already exists and is integer indexed array
                    $tagsArray[$childTagName][] = $childProperties;
                } else {
                    //key exists so convert to integer indexed array with previous value in position 0
                    $tagsArray[$childTagName] = array($tagsArray[$childTagName], $childProperties);
                }
            }
        }
     
        //get text content of node
        $textContentArray = array();
        $plainText = trim((string)$xml);
        if ($plainText !== '') $textContentArray[$options['textContent']] = $plainText;
     
        //stick it all together
        $propertiesArray = !$options['autoText'] || $attributesArray || $tagsArray || ($plainText === '')
                ? array_merge($attributesArray, $tagsArray, $textContentArray) : $plainText;
     
        //return node as array
        return array(
            $xml->getName() => $propertiesArray
        );
    }
  	
}