<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller {

    public function logout(Request $request){
        return redirect('login')->with(Auth::logout());
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = User::where('email', Auth::user()->email)->first();
            $user->is_nda_accepted               = 0;
            $user->nda_accepted_at               = null;
            $user->save();
            return redirect()->intended('nda');
        }
        else
        {
            return redirect('login')->with('status', 'Login failed; Invalid email or password.');
        }


    }
}
