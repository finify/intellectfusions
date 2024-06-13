<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserMail;

use App\Models\Expertdetail;
use App\Models\User;
use App\Models\withdraw;

class WithdrawController extends Controller
{
    //
    public function notify($user_id,$text,$notify_id,$type){
        $notification_details = [
            'user_id'=> $user_id,
            'text'=> $text,
            'notify_id'=> $notify_id,
            'type'=> $type,
            'seen'=> 0
        ];

        $notify = Notifications::create($notification_details); 
        if($notify){
            return true;
        }    
    }


    public function withdraw(Request $request){
        
        $data = $request->all();


        if($request->isMethod('POST')){
            $currentwithdraw = withdraw::where('id',$data['withdrawid'])->first()->toArray();
            $currentuser = User::where('id',$currentwithdraw['user_id'])->first()->toArray();

            //if approved is clicked
            if($data['action'] == "approve"){
                //step 1 update withdraw status to 1
                $withdrawUpdated = withdraw::where('id',$data['withdrawid'])->update(['withdraw_status'=> 1]);
              

               

                //email withdraw user approval
                $mailData = [
                    'subject' => 'Withdrawal Approved',
                    'body' => '<p>Your Withdrawal of $'.$currentwithdraw['amount'].' to the details provided below has been approved and payment sent to wallet specified</p>
                    <p>'.$currentwithdraw['payment_details'].'</p>
                    ',
                    'username'=> $currentuser['name']
                ];
                Mail::to($currentuser['email'])->send(new UserMail($mailData));

                //send expert notification
                $notify = [
                    'user_id'=> $currentwithdraw['user_id'],
                    'text'=> "Your Withdrawal have been approved",
                    'notify_id'=> 'expert/payout',
                    'type'=> "withdraw",
                    'seen'=> 0
                ];
                $this->notify($notify['user_id'],$notify['text'],$notify['notify_id'],$notify['type']);

                return redirect()->back()->with('withdraw_message', 'Your have successfully approved the withdrawal ');

            }elseif($data['action'] == "decline"){
                //step 1 update withdraw status to 3
                $withdrawUpdated = withdraw::where('id',$data['withdrawid'])->update(['withdraw_status'=> 3]);
                $Expertdetail = Expertdetail::where('user_id', $currentwithdraw['user_id'])->first()?->toArray() ?? array_fill_keys(Schema::getColumnListing('expertdetails'),null);
              

                $newbalance = $Expertdetail['balance'] + $currentwithdraw['amount'];
    
                $updated = Expertdetail::where('id',$currentwithdraw['user_id'])->update(['balance'=> $newbalance]);

                return redirect()->back()->with('deposit_message', 'Your have successfully declined the withdraw');
            }
        }
          
        $withdraws = DB::table('withdraws')
            ->join('users', 'withdraws.user_id', '=', 'users.id')
            ->select('users.*', 'withdraws.*')->orderBy('withdraws.id','desc')
            ->get();
        return view('admin.withdraw')->with(compact('withdraws'));
    }
}
