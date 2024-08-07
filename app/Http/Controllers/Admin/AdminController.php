<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\NotificationMail;
use App\Mail\EmailMail;
use App\Mail\UserMail;



use App\Models\admin;
use App\Models\projects;
use App\Models\withdraws;
use App\Models\User;
use App\Models\tradingbot;

class AdminController extends Controller
{
        public function getUserDetails(){
            $expertuser = User::where('user_type', 'expert')->get()->toArray();
            $user = User::where('user_type', 'user')->get()->toArray();
    
            $allusers = count($expertuser) + count($user);
            $user_details = [
                'expert'=>count($expertuser),
                'user'=>count($user),
                'all'=>$allusers,
            ];

        
            $auctions = projects::where('progress','1')->get()->toArray();
            $inprogress = projects::where('progress','2')->get()->toArray();
            $completed = projects::where('progress','3')->get()->toArray();


            $allprojects = count($completed) + count($inprogress)+ count($auctions);
            $project_details = [
                'auctions'=>count($auctions),
                'inprogress'=>count($inprogress),
                'completed'=>count($completed),
                'all'=>$allprojects,
            ];

            return compact('user_details','project_details');
        }
        //
        public function dashboard(Request $request){
          
            $details = $this->getUserDetails();

            if($request->isMethod('post')){
                $data = $request->all();
                if($data['action'] == "stoprobot"){
                    $currentbot = tradingbot::where('id',$data['tradingbotid'])->first()->toArray();
                    $currentuser = User::where('id',$currentbot['user_id'])->first()->toArray();

                    if($currentbot['account_type']== "live" & $currentbot['status'] == 1){

                        $newuserbalance = $currentuser['balance'] + $currentbot['amount_earned'] + $currentbot['amount'];
                        $demobalance_updated = User::where('id',$currentuser['id'])->update(['balance'=> $newuserbalance]);
            
                        $currentbot_updated = tradingbot::where('id',$data['tradingbotid'])->update(['status'=> 0]);
                    }elseif($currentbot['account_type']== "demo" & $currentbot['status'] == 1){

                        $newuserdemo_balance = $currentuser['demo_balance'] + $currentbot['amount_earned'] + $currentbot['amount'];
                        $demobalance_updated = User::where('id',$currentuser['id'])->update(['demo_balance'=> $newuserdemo_balance]);
            
                        $currentbot_updated = tradingbot::where('id',$data['tradingbotid'])->update(['status'=> 0]);
                    }
                }
            }

            $projects = DB::table('projects')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->select('users.name', 'projects.*')->orderBy('projects.id','desc')
            ->get();
            // dd(compact('projects'));
    
            return view('admin.dashboard')->with(compact('projects'))->with($details);
        }
    
        public function login(Request $request){
            
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
    
                if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password'],'status'=>1])){
                    return redirect('admin/dashboard');
                }else{
                    return redirect()->back()->with('error_message','Invalid Email or Password')->withInput();
                }
            }
            if(!Auth::guard('admin')->check()){
                return view('admin.login');
            }else{
                return redirect('/admin/dashboard');
            }
           
        }
    
        public function users(Request $request){
            $data = $request->all();
            if($request->isMethod('POST')){
                //arranging data
    
                //if delete clicked
                if($data['action'] == "delete"){
                    $deleted = User::where('id',$data['userid'])->delete();
                    if($deleted){
                        return redirect()->back()->with('users_message', 'User has been deleted');
                    }
                }elseif($data['action'] == "activate"){
                    $activated = User::where('id',$data['userid'])->update(['status'=> 1]);
                    if($activated){
                        return redirect()->back()->with('users_message', 'User has been activated');
                    }
                }elseif($data['action'] == "deactivate"){
                    $deactivated = User::where('id',$data['userid'])->update(['status'=> 0]);
                    if($deactivated){
                        return redirect()->back()->with('users_message', 'User has been deactivated');
                    }
                }
            }

          

            $users = User::where('user_type', 'user')->orderBy('id','desc')->get()->toArray();
    
         
            
            return view('admin.users')->with(compact('users'));
    
        }

        public function email(Request $request){
            $data = $request->all();
            if($request->isMethod('POST')){
                $users = User::all();
               
               

                foreach ($users as $key => $user) {
                    $mailData = [
                        'subject' => $data['subject'],
                        'body' => '<p>'.$data['message'].'</p>',
                        'username'=> $user['username']
                    ];
                    // dd($user['email']);
                    Mail::to($user['email'])->send(new UserMail($mailData));
                }
    
                

            }

            return view('admin.email')->with('success', 'Your have successfully sent all emails');
        }

        public function viewusers(Request $request, $slug){
            $data = $request->all();
    
            
    
            $user = User::where('id',$slug)->first()->toArray();

            $projects = projects::where('user_id',$slug)->get()->toArray();
          
    
            if($request->isMethod('POST')){
                //arranging data
                //if approved is clicked
                if($data['action'] == "bonus"){
                    $user = User::where('id',$slug)->first()->toArray();
                    $newuserbalance = $user['balance'] + $data['amount'];
                    $balanceUpdated = User::where('id',$slug)->update(['balance'=> $newuserbalance]);
    
                    return redirect()->back()->with('success_message', 'Your have successfully added bonus to user');
    
                }elseif($data['action'] == "email"){
                    $user = User::where('id',$slug)->first()->toArray();
                    //email Referee
                    $mailData = [
                        'subject' => $data['subject'],
                        'body' => '<p>'.$data['message'].'</p>',
                        'username'=> $user['name']
                    ];
                    Mail::to($user['email'])->send(new UserMail($mailData));
                    return redirect()->back()->with('success', 'You have successfully sent a mail to user');
                }
            }
    
            $user = User::where('id',$slug)->first()->toArray();
            return view('admin.viewuser')->with(compact('user','projects'));
    
        }

        public function logout(){
            Auth::guard('admin')->logout();
            return redirect('admin/login');
        }
}
