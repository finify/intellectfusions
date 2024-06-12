<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Mail\UserMail;
use App\Mail\RegistrationMail;
use App\Models\Expertdetail;
use App\Models\User;

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
        //get all requests
        $data = $request->all();

        //get formated date in carbon
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
            //email registered user
            $mailData = [
                'subject' => 'Welcome To Intellectfusions',
                'username'=> $data['name'],
                'body'=>'
                <p>You recently created an account with Intellectfusions. Please finalize your account by adding a few more details about yourself.</p>
                <p><strong>Follow these simple steps to start earning on Intellectfusions</strong></p>
                <ul>
                    <li>Try out our ai trading robot using the demo account</li>
                    <li>Deposit into your Live account and start trading real assets</li>
                    <li>Withdraw earnings after the end of robot cycle</li>
                </ul>',
            ];
            Mail::to($data['email'])->send(new UserMail($mailData));
        }else{
            //email registered user
            $mailData = [
                'subject' => 'Welcome To Intellectfusions',
                'username'=> $data['name'],
                'body'=>'
                <p>Thank you for registering with Intellectfusions. Please share the details of your project, and we’ll get started right away</p>
                <p><strong>Follow these simple steps on Intellectfusions</strong></p>
                <ul>
                    <li>Login to your users dashboard</li>
                    <li>Submit your project details</li>
                    <li>Sit back and relax while our professional experts work on your project</li>
                </ul>',
            ];
            Mail::to($data['email'])->send(new UserMail($mailData));
        }
       
     

        if($user){
            

            //email Admin
            $mailData = [
                'subject' => 'New User Registration',
                'email' => $data['email'],
                'body' => '<p>'.$data['email'].' just signed up to Intellectfusions</p>
                <p><strong>Login to admin to follow up with user</strong></p>
                ',
                'username'=> 'Admin'
            ];
            Mail::to(env('ADMIN_EMAIL'))->send(new UserMail($mailData));

            //mailing refered user
           
        }
        // auth()->login($user);

        // $user = Auth::User();
        // Session::put('user', $user);

        if(Auth::guard('web')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'user_type'=>'user'])){
            return redirect('user/dashboard')->with('signup_success', "Account successfully registered.");
        }elseif(Auth::guard('expert')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'user_type'=>'expert'])){
            return redirect('expert/settings/details')->with('signup_success', "Account successfully registered.");
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
