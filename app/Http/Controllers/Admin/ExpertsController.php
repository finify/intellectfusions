<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\projects;
use App\Models\projecttype;
use App\Models\fields;
use App\Models\Notifications;
use App\Models\Attachment;
use App\Models\ExpertDetail;

use App\Mail\UserMail;

class ExpertsController extends Controller
{
    //
    public function index(Request $request){
        
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

    
        $experts = User::where('user_type','expert')->orderBy('id','desc')->get()->toArray();
        
        return view('admin.experts')->with(compact('experts'));
    }

    public function viewexpert(Request $request, $slug){
        $data = $request->all();

        

        $user = User::where('id',$slug)->first()->toArray();
        $expert = Expertdetail::where('user_id',$slug)->first()->toArray();

        $projects = projects::where('expert_id',$slug)->get()->toArray();
      
        $auctions = DB::table('project_expert')
        ->join('projects', 'project_expert.project_id', '=', 'projects.id')
        ->where('project_expert.expert_id', $slug)
        ->select('projects.project_title','project_expert.status', 'projects.*')->orderBy('project_expert.id','desc','expert','user')
        ->get();

        // dd($auctions);

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

        return view('admin.viewexpert')->with(compact('user','projects','expert','auctions'));

    }
}
