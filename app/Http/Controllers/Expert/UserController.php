<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function dashboard(Request $request){
   
        // dd("dd");
        return view('user.dashboard');
    }

    public function project(Request $request){
        return view('user.project');
    }

    public function notification(Request $request){
        return view('user.notification');
    }

    public function settings(Request $request){
        return view('user.settings');
    }

    public function resetpassword(Request $request, $resettype = null){
        $data = $request->all();
        if($resettype == "resetform"){
            if($request->isMethod('POST')){
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $remember_token = substr(str_shuffle($permitted_chars), 0,10);
                $userExists = User::where('email',$data['email'])->exists();

                if($userExists){
                    $user = User::where('email',$data['email'])->first()->toArray();
                    //email admin
                    $mailData = [
                        'title' => 'Password Reset',
                        'body' => '<p>We have received a request to reset the password for your account on Ranefy. To proceed with resetting your password, please follow the instructions below:</p>
                            </br>
                            <p>Click on the following link to reset your password:</p>
                         
                            <a href="https://ranefy.com/resetpassword/reset?q='.$remember_token.'" style="background-color: teal; color: white;padding-top: 5px ;
                        padding-bottom: 5px ;
                        padding-left: 10px ;
                        padding-right: 10px ; text-decoration: none; margin: auto;"> Reset Password </a>
                            </br>
                           <p> If clicking the link doesnt work, you can copy and paste the URL below into your web browsers address bar:</p>
                            <a href="https://ranefy.com/resetpassword/reset?q='.$remember_token.'">https://ranefy.com/resetpassword/reset?q='.$remember_token.'</a> ',
                        'username'=> $user['username']
                    ];
                    
                    Mail::to($data['email'])->send(new Resetpassword($mailData));

                    $userUpdated = User::where('email',$data['email'])->update(['remember_token'=>$remember_token]);
                    return redirect()->back()->with('reset_success', 'Password Reset Link Sent to mail provided')->with('page','resetform');
                    
                }else{
                   return  redirect()->back()->with('reset_error', 'No Email like that in our system')->with('page','resetform');
                }
                
            }
            return view('user.forgotpassword')->with('page','resetform');

        }elseif($resettype == "reset"){
          
            if(isset($data['q'])){
                $tokenExists = User::where('remember_token',$data['q'])->exists();
            }else{
                return view('home.resetpassword')->with('page','Expired');
            }
           
         
            if($tokenExists){
                if($request->isMethod('POST')){
                    if($data['password'] == $data['confirm_password']){
                        #Update the new Password
                        User::where('remember_token',$data['q'])->update(['password' => Hash::make($data['password']), 'remember_token'=>"Null"]);
                        return view('home.resetpassword')->with('page','completed');
                    }else{

                        return redirect()->back()->with('password_error', 'password does not match')->with('page','reset')->with('q', $data['q']);
                    }
    
                }
                
                 return view('home.resetpassword')->with('page','reset')->with('q', $data['q']);
            }else{
                return view('home.resetpassword')->with('page','Expired');
            }
            
        }
    }
    
}
