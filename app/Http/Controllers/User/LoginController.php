<?php

namespace App\Http\Controllers\User;

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
        if(!Auth::guard('expert')->check()){
            return view('user.login');
        }else{
            return redirect('/expert/dashboard');
        }
        return view('user.login');
    }

    
    public function login(Request $request)
    {
        

        if($request->isMethod('post')){
            $data = $request->all();

           
            //easy validation
            // $validated = $request->validate([
            //     'email' => 'required|email|max:255',
            //     'password' => 'required',
            // ]);

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required' => 'Please this field is needed',
                'password.required' => 'Please you need a password',
                'email.email' => 'Please you must put a valid email',
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('web')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'user_type'=>'user'])){
                return redirect('user/dashboard');
            }elseif(Auth::guard('expert')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'user_type'=>'expert'])){
                return redirect('expert/dashboard');
            }else{
                return redirect()->back()->with('error_message','Invalid Email or Password')->withInput();
            }
        }
      
        // if(!Auth::validate($credentials)){
        //     return redirect()->to('user/login')->withErrors(['msg' => 'Login invalid , try with another credential']);
        // }

        // $user = Auth::getProvider()->retrieveByCredentials($credentials);

      
        // Auth::login($user);
       

        // $user = Auth::User();
        // Session::put('user', $user);

        // dd(Auth::User()->user_type);

        // return $this->authenticated($request, $user);

        //account selector session 
        //demo and live
        // if(Auth::User()->user_type == "user"){
        //     dd("hello");
        //     Session::put('user_type', 'user');
        //     return redirect()->intended('/user/dashboard')->with('login_success','Login was successfull');
       
        // }else{
            
        //     Session::put('user_type', 'expert');
        //     return redirect()->intended('/expert/dashboard')->with('login_success','Login was successfull');
        // }
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
        
        if(Auth::User()->user_type == "user"){
            dd("hello");
            Session::put('user_type', 'user');
            return redirect()->to('user/dashboard')->with('login_success','Login was successfull');
       
        }else{
           
            Session::put('user_type', 'expert');
            return redirect()->intended('/expert/dashboard')->with('login_success','Login was successfull');
        }
        
        // return redirect()->intended('user/dashboard')->with('login_success','Login was successfull');
    }
}
