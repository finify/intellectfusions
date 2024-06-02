<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //
    public function show()
    {
        return view('user.login');
    }

    
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        // dd($credentials);
        // dd($credentials);

        if(!Auth::validate($credentials)){
            return redirect()->to('expert/login')->withErrors(['msg' => 'Login invalid , try with another credential']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        $user = Auth::User();
        Session::put('user', $user);

       

        //account selector session 
        //demo and live
        if(Auth::User()->user_type == "user"){
            Session::put('user_type', 'user');
            return redirect()->intended('user/dashboard')->with('login_success','Login was successfull');
        }else{
            Session::put('user_type', 'expert');
            return redirect()->intended('expert/dashboard')->with('login_success','Login was successfull');
        }
    }


    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        
        return redirect()->intended('user/dashboard')->with('login_success','Login was successfull');
    }
}
