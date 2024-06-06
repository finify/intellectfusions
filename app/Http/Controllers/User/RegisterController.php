<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Mail\DemoMail;
use App\Mail\RegistrationMail;
use App\Models\Expertdetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class RegisterController extends Controller
{
    //

    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$ref = null)
    {
        return view('user.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $data = $request->all();

        // if()
        // $data['referer'] = "";
        

        $datecreated =  Carbon::now();

        if($request->validated()){
            $validated = $request->validated();
            $validated['status'] = 1;
            $validated['user_type'] = $data['user_type'];
        }

        


        $user = User::create($validated);
        $lastid = User::all()->last()->id;

        $Expertdetails = [
            'user_id'=> $lastid,
            'about'=> "",
            'phone_number'=> "",
            'field_of_study'=> "",
            'project_type'=> "",
            'balance'=> "0",
        ];
        if($data['user_type'] == "expert"){
               //insert into profile table with just user id and created
            $expertdetails = Expertdetail::create($Expertdetails);
        }
       
     

        // dd($invested);
        if($user){
            //email registered user
            // $mailData = [
            //     'title' => 'Welcome To Ranefy',
            //     'username'=> $data['username'],
            //     'body'=>'
            //     <p>Your registration was successful and you can now login and  start trading to earn profits</p>
            //     <p><strong>Follow these simple steps to start earning on Ranefy</strong></p>
            //     <ul>
            //         <li>Try out our ai trading robot using the demo account</li>
            //         <li>Deposit into your Live account and start trading real assets</li>
            //         <li>Withdraw earnings after the end of robot cycle</li>
            //     </ul>',
            // ];
            // Mail::to($data['email'])->send(new RegistrationMail($mailData));

            //email Admin
            // mailData = [
            //     'title' => 'New User Registration',
            //     'email' => $data['email'],
            //     'body' => '<p>'.$data['email'].' just signed up to Ranefy</p>
            //     <p><strong>Login to admin to follow up with user</strong></p>
            //     ',
            //     'username'=> 'Admin'
            // ];
            // Mail::to(env('ADMIN_EMAIL'))->send(new RegistrationMail($mailData));$

            //mailing refered user
           
        }
        // auth()->login($user);

        // $user = Auth::User();
        // Session::put('user', $user);

        if(Auth::guard('web')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'user_type'=>'user'])){
            return redirect('user/dashboard')->with('signup_success', "Account successfully registered.");
        }elseif(Auth::guard('expert')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'user_type'=>'expert'])){
            return redirect('expert/dashboard')->with('signup_success', "Account successfully registered.");
        }else{
           
        }

        //account selector session 
        //demo and live
        // Session::put('user_type', 'expert');

        // if($data['user_type'] == "expert"){
        //     return redirect('/user/expert/dashboard')->with('signup_success', "Account successfully registered.");
        // }else{
        //     return redirect('/user/dashboard')->with('signup_success', "Account successfully registered.");
        // }
    }
}
