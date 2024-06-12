<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\projects;
use App\Models\project_expert;
use App\Models\projecttype;
use App\Models\fields;
use App\Models\Notifications;
use App\Models\Attachment;
use App\Models\Expertdetail;
use App\Models\withdraw;


class ExpertController extends Controller
{
    
    public function getUserDetails(){
        $user = User::where('id', Auth::guard('expert')->User()->id)->first()->toArray();
        $projects = projects::where('expert_id', Auth::guard('expert')->User()->id)->get()->toArray();
        $notifications = Notifications::where('user_id', Auth::guard('expert')->User()->id)->get()->toArray();

        $auctions = project_expert::where('expert_id', Auth::guard('expert')->User()->id)->get()->toArray();
        $inprogress = projects::where('expert_id', Auth::guard('expert')->User()->id)->where('progress','2')->get()->toArray();
        $completeds = projects::where('expert_id', Auth::guard('expert')->User()->id)->where('progress','3')->get()->toArray();


        //withdrawl details
        $withdraws = withdraw::where('user_id',Auth::guard('expert')->User()->id)->orderBy('id','desc')->get()->toArray();

        $expertdetail = Expertdetail::where('user_id', Auth::guard('expert')->User()->id)->first()?->toArray() ?? array_fill_keys(Schema::getColumnListing('expertdetails'),null);
        

        //withdrawal details

        $all = count($completeds) + count($inprogress)+ count($auctions);
        $project_details = [
            'auctions'=>count($auctions),
            'inprogress'=>count($inprogress),
            'completed'=>count($completeds),
            'all'=>$all,
        ];

        return compact('user','notifications','auctions','inprogress','completeds','projects','project_details','withdraws','expertdetail');
    }

    public function dashboard(Request $request){
        $details = $this->getUserDetails();
       
        return view('expert.dashboard')->with($details);
    }

    public function project(Request $request){
        $details = $this->getUserDetails();
        return view('expert.project')->with($details);
    }

    public function notification(Request $request){
        $details = $this->getUserDetails();
        return view('expert.notification')->with($details);
    }

    public function payout(Request $request){
        $details = $this->getUserDetails();
        $data = $request->all();
        

        $Expertdetail = Expertdetail::where('user_id', Auth::guard('expert')->User()->id)->first()?->toArray() ?? array_fill_keys(Schema::getColumnListing('expertdetails'),null);

        if($request->isMethod('POST')){
            $withdrawdetails = [
                'user_id'=> Auth::guard('expert')->User()->id,
                'payment_method'=> $data['payment_method'],
                'amount'=> $data['amount'],
                'payment_details'=> $data['payment_details'],
                'withdraw_status'=>0
            ];

            if($Expertdetail['balance'] >= $data['amount']){
                $withdrawn = withdraw::create($withdrawdetails);

                $newbalance = $Expertdetail['balance'] - $data['amount'];

                $updated = Expertdetail::where('id',Auth::guard('expert')->User()->id)->update(['balance'=> $newbalance]);

                if($updated){

                    //email withdraw user
                    $mailData = [
                        'title' => 'Withdrawal Request',
                        'body' => '<p>Your Withdrawal of $'.$data['amount'].' has been recieved and will be processed shortly</p>
                        <p>Payment Details:</p>
                        <p>'.$data['payment_details'].'</p>
                        ',
                        'username'=> Auth::guard('expert')->User()->name
                    ];
                    // Mail::to($user['email'])->send(new WithdrawMail($mailData));

                    //email withdraw admin
                    $mailData = [
                        'title' => 'New Withdrawal Request',
                        'body' => '<p>'.Auth::guard('expert')->User()->name.'Just made a Withdrawal of $'.$data['amount'].' and needs approval</p>
                        <p>Payment Details:</p>
                        <p>'.$data['payment_details'].'</p>
                        ',
                        'username'=> "Admin"
                    ];
                    // Mail::to(env('ADMIN_EMAIL'))->send(new WithdrawMail($mailData));
                    $allwithdraws = withdraw::where('user_id', Auth::guard('expert')->User()->id)->sum('amount');
                    return redirect()->to('expert/payout')->with('withdraw_success', 'Your withdrawal was successful')->with($this->getUserDetails())->with('totalwithraws',$allwithdraws);
                }else{
                    $allwithdraws = withdraw::where('user_id', Auth::guard('expert')->User()->id)->sum('amount');
                    return redirect()->to('expert/payout')->with('error_message', 'error occured')->with($this->getUserDetails())->with('totalwithraws',$allwithdraws);
                }
            }else{
                $allwithdraws = withdraw::where('user_id', Auth::guard('expert')->User()->id)->sum('amount');
                return redirect()->to('expert/payout')->with('error_message', 'Your do not have enough funds in wallet!')->with($this->getUserDetails())->with('totalwithraws',$allwithdraws);
            }




        };

        
        $allwithdraws = withdraw::where('user_id', Auth::guard('expert')->User()->id)->sum('amount');
        // dd($allwithdraws);
        $details = $this->getUserDetails();
        return view('expert.payout')->with($details)->with('totalwithraws',$allwithdraws);
    }

    public function settings(Request $request){
        $details = $this->getUserDetails();
        

        return view('expert.settings')->with($details);
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
