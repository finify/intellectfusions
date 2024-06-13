<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use App\Models\User;
use App\Models\projects;
use App\Models\projecttype;
use App\Models\project_expert;
use App\Models\fields;
use App\Models\Notifications;
use App\Models\Attachment;
use App\Models\ExpertAttachment;
use App\Models\Expertdetail;

use App\Mail\UserMail;

class ProjectsController extends Controller
{
    public function getProjectDetails($slug){
        $project = projects::where('id', $slug)->first()->toArray();
        $experts = User::where('user_type','expert')->get()->toArray();

         //get the user who uploaded the project
         $user = User::where('id',$project['user_id'])->get()->toArray();

        //get user and expert attachement
        $attachments = Attachment::where('project_id',$slug)->get()->toArray();
        $expertattachments = ExpertAttachment::where('project_id',$slug)->get()->toArray();

        //get the expert of the project
        $expert = User::where('id',$project['expert_id'])->get()->toArray();

       


        $auctions = DB::table('project_expert')
        ->join('users', 'project_expert.expert_id', '=', 'users.id')
        ->where('project_expert.project_id', $slug)
        ->select('users.name', 'project_expert.*')->orderBy('project_expert.id','desc','expert','user')
        ->get();

        // dd($auctions);
       
        return compact('attachments','expertattachments','project','auctions','experts');
    }

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

    public function storeMedia(Request $request){
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteMedia(Request $request){
        $filename = $request->input('filename');

        // Specify the path of the file to be deleted
        $filePath = storage_path('tmp/uploads/' . $filename);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
            return response()->json(['message' => 'File deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function deleteUploadMedia(Request $request){
        $filename = $request->input('filename');

        // Specify the path of the file to be deleted
        $filePath = storage_path('tmp/uploads/' . $filename);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            unlink($filePath);
            return response()->json(['message' => 'File deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }



    public function project(Request $request, $slug){
        

        $data = $request->all();


        if($request->isMethod('POST')){
            if($data['action'] == "assign"){

                //update in auctions ie project expert table 0 for others 1 for the assigned user
                project_expert::where('project_id',$slug)->update(['status'=> 0]);
                project_expert::where('project_id',$slug)->where('expert_id',$data['expertid'])->update(['status'=> 1]);


                //edit expert_id in projects to reflect it
                projects::where('id',$slug)->update(['expert_id'=> $data['expertid'],'progress'=>2]);

                //get project
                $project = projects::where('id', $slug)->first()->toArray();

                 //get the user who uploaded the project
                $expertuser = User::where('id',$data['expertid'])->first()->toArray();
                //email expert
                $mailData = [
                    'subject' => 'Project Assigned to you',
                    'username'=> $expertuser['name'],
                    'body'=>'
                    <p>Congratulations! You’ve been selected to take on a new project. Please log in to your account on our website to view the project details and get started.</p>
                    <p> If you have any questions or need additional information, feel free to contact us</p>
                    ',
                ];
                Mail::to($expertuser['email'])->send(new UserMail($mailData));

                //send user notification
                $notify = [
                    'user_id'=> $project['user_id'],
                    'text'=> "An Expert have been assigned your project",
                    'notify_id'=> $slug,
                    'type'=> "assign",
                    'seen'=> 0
                ];
                $this->notify($notify['user_id'],$notify['text'],$notify['notify_id'],$notify['type']);

                //send expert notification
                $notify = [
                    'user_id'=> $expertuser['id'],
                    'text'=> "You have been assigned a new porject",
                    'notify_id'=> $slug,
                    'type'=> "assign",
                    'seen'=> 0
                ];
                $this->notify($notify['user_id'],$notify['text'],$notify['notify_id'],$notify['type']);


                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','Expert Assigned');
            }elseif($data['action'] == "auction"){
                //handles auction to expert or experts
                $project_experts = [
                    'project_id'=> $slug,
                    'expert_id'=> $data['expert'],
                    'status' => 0
                ];

                 


                $auctionexists = project_expert::where('project_id',$slug)->where('expert_id',$data['expert'])->exists();

                if($auctionexists == false){
                    $expertadded = project_expert::create($project_experts);   

                    //get the user who uploaded the project
                 $expertuser = User::where('id',$data['expert'])->first()->toArray();
                 //email expert
                 $mailData = [
                     'subject' => 'Project Auctioned to you',
                     'username'=> $expertuser['name'],
                     'body'=>'
                     <p>Congratulations! You’ve been auctioned to take on a new project. Please log in to your account on our website to view the project details and use the chat sytem on the page to bid for the project.</p>
                     <p> If you have any questions or need additional information, feel free to contact us</p>
                     ',
                 ];
                 Mail::to($expertuser['email'])->send(new UserMail($mailData));

                    $details = $this->getProjectDetails($slug);
                    return redirect()->back()->with($details)->with('success','Expert Added Successfully');
                }else{
                    $details = $this->getProjectDetails($slug);
                    return redirect()->back()->with($details)->with('Error','Expert Auctioned for this project already');
                }


                
            }elseif($data['action'] == "updateprice"){

                //price update
                $project_detail = [
                    'price'=> $data['price'],
                    'expert_price'=> $data['expert_price']
                ];
                $projectupdated = projects::where('id',$slug)->update($project_detail);
                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','Price Updated Successfully');




            }elseif($data['action'] == "updatestatus"){

               
                //status update
                $project_detail = [
                    'progress'=> $data['projectstatus']
                ];
                dd($expertid);
                
                $projectupdated = projects::where('id',$slug)->update($project_detail);

                if($data['projectstatus'] == 3){
                    $newbalance = Expertdetail::where('user_id', $data['expertid'])->pluck('field_of_study'); + $data['expert_price'];

                    $expert_detail = [
                        'balance'=>  $newbalance 
                    ];
                    $expertupdated = Expertdetail::where('user_id',$data['expertid'])->update($expert_detail);

                    //send mail to user telling them that there project is in progress
                    //usermail
                    //get the user who uploaded the project
                    $user = User::where('id',$data['userid'])->first()->toArray();
                    //email registered user
                    $mailData = [
                        'subject' => 'Project Completion',
                        'username'=> $user['name'],
                        'body'=>'
                        <p>We are pleased to inform you that your project is now complete. </p>
                        ',
                    ];
                    Mail::to($user['email'])->send(new UserMail($mailData));


                }elseif($data['projectstatus'] == 2){

                }
                
             


                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','Status Updated Successfully');




            }elseif($data['action'] == "completenotify"){

                  //get the user who uploaded the project
                  $user = User::where('id',$data['userid'])->first()->toArray();
                 //email expert
                 $mailData = [
                    'subject' => 'Project Completion',
                    'username'=> $user['name'],
                    'body'=>'
                    <p>We are pleased to inform you that your project is now complete. You can check the details and download your files from your account on our website.Thank you for choosing Intellectfusions</p>
                    ',
                ];
                Mail::to($user['email'])->send(new UserMail($mailData));

                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','Completion mail sent Successfully');




            }elseif($data['action'] == "uploaddoc"){

                foreach ($request->input('document', []) as $file) {
                    $attachment_details = [
                        'user_id'=> Auth::User()->id,
                        'project_id'=> $slug,
                        'filename'=> $file,
                        'original_filename'=> $file,
                        'status'=> 0
                    ];
    
                    $attachment = Attachment::create($attachment_details);               
                }
                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','File Uploaded');
            }elseif($data['action'] == "deleteexpertfile"){
              
                // Specify the path of the file to be deleted
                $filePath = storage_path('app/public/expertfiles/' . $data['filename']);

                $deleted = ExpertAttachment::where('id',$data['attachmentid'])->delete();
                    
                // Check if the file exists
                if (file_exists($filePath)) {
                    // Delete the file
                    unlink($filePath);
                    $details = $this->getProjectDetails($slug);
                    return redirect()->back()->with($details)->with('success','File Deleted');
                } 

                
            }elseif($data['action'] == "statusexpertfile"){
                
                //price file status
                $project_detail = [
                    'status'=> $data['status']
                ];
                $fileupdated = ExpertAttachment::where('id',$data['attachmentid'])->update($project_detail);
                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','File Status Updated Successfully');

                
            }
        }
        $details = $this->getProjectDetails($slug);

        return view('admin.viewproject')->with($details);
    }

    
}