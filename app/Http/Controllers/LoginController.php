<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Artisaninweb\SoapWrapper\SoapWrapper;

class LoginController extends Controller {

    protected $soapWrapper;
 
    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function login(Request $request){
        
        try{

            // $param = array( "login" => $request->email, "password" => $request->password);
            // $soap = new SoapClient("http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl");
            // $response = $soap->__soapCall("authenticationTest", $param);

            // header("Content-Type: text/xml");
            // echo $xml;

            $this->soapWrapper->add('Emr', function ($service) {
                $service
                ->wsdl('http://uhmistrn.doh.gov.ph/ahsr/webservice/index.php?wsdl')
                ->trace(false);
            });
    
    
            $data = [
                'login' => $request->email,
                'password' => $request->password
            ];
            
            $response = $this->soapWrapper->call('Emr.authenticationTest', $data);
            $xml = simplexml_load_string($response);
            $json = json_encode($xml);
            $array = json_decode($json, true);

            if($array['response_code']==104){

                // return $array;

                $user = User::where('email', $request->email)->first();
                if(count($user)>0){

                    Auth::login($user);
                    $user->is_nda_accepted        = 0;
                    $user->nda_accepted_at        = null;
                    $user->save();
                    return redirect('nda/2019');
                }
            }else{
                return redirect('login')->with('status', $array['response_code']." ".$array['response_desc']);
            }
                  
        }catch(\Exception  $e){
            return redirect('login')->with('status', "There was a problem with in getting the data, try to contact the administrator");
        }


    }

    public function logout(Request $request){
        return redirect('login')->with(Auth::logout());
    }
}
