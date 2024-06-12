<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\projects;
use App\Models\projecttype;
use App\Models\fields;
use App\Models\Notifications;
use App\Models\Attachment;

use Illuminate\Support\Facades\Hash;

use App\Mail\UserMail;

class UserController extends Controller
{
    public function getUserDetails(){
        $user = User::where('id', Auth::User()->id)->first()->toArray();
        $projects = projects::where('user_id', Auth::User()->id)->orderBy('id', 'desc')->get()->toArray();
        $notifications = Notifications::where('user_id', Auth::User()->id)->get()->toArray();

        $auctions = projects::where('user_id', Auth::User()->id)->where('progress','1')->get()->toArray();
        $inprogress = projects::where('user_id', Auth::User()->id)->where('progress','2')->get()->toArray();
        $completed = projects::where('user_id', Auth::User()->id)->where('progress','3')->get()->toArray();


        $all = count($completed) + count($inprogress)+ count($auctions);
        $project_details = [
            'auctions'=>count($auctions),
            'inprogress'=>count($inprogress),
            'completed'=>count($completed),
            'all'=>$all,
        ];

        return compact('user','notifications','projects','project_details');
    }

    //dashboard view and project submission
    public function dashboard(Request $request){
        $details = $this->getUserDetails();


        //geting project type and subject areas/fields
        $projecttypes = projecttype::get()->toArray();
        $fields = fields::get()->toArray();

        if($request->isMethod('POST')){

            //validate
            $request->validate([
                'project_title' => 'required',
                'description' => 'required',
                'project_type' => 'required',
                'subject_area' => 'required',
                'deadline' => 'required',
            ]);
            $data = $request->all();

           
            $project_details = [
                'user_id'=> Auth::User()->id,
                'project_title'=> $data['project_title'],
                'description'=> $data['description'],
                'project_type'=> $data['project_type'],
                'subject_area'=> $data['subject_area'],
                'project_attachment_id'=> 0,
                'progress'=> 1,
                'deadline'=> $data['deadline'],
                'expert_id'=> 0,
                'price'=> 0
            ];

            $projects = projects::create($project_details);
            $lastid = projects::all()->last()->id;

            foreach ($request->input('document', []) as $file) {
                $attachment_details = [
                    'user_id'=> Auth::User()->id,
                    'project_id'=> $lastid,
                    'filename'=> $file,
                    'original_filename'=> $file,
                    'status'=> 0
                ];

                $attachment = Attachment::create($attachment_details);               
            }

            //email admin on new project submited
            $mailData = [
                'subject' => 'New Project',
                'username'=> "Admin",
                'body'=>'
                <p>We have received a new project submission from '.Auth::User()->name.'. Please log in to the admin panel on the website to review the project details and proceed with the necessary steps.</p>
               ',
            ];
            Mail::to(env('ADMIN_EMAIL'))->send(new UserMail($mailData));

            $request->session()->flash('upload_success', " Your Project Upload was successful ");
            return redirect()->back();
            // return redirect()->to('user/dashboard')->with('upload_success', 'Your Project Upload was successful')->with($details);


        }
       
        return view('user.dashboard')->with($details)->with(compact('projecttypes'))->with(compact('fields'));
    }

    public function storeMedia(Request $request){
        $path = storage_path('app/public/tmp/uploads');

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



    public function project(Request $request){
        $details = $this->getUserDetails();
        return view('user.project')->with($details);
    }

    public function notification(Request $request){
        $details = $this->getUserDetails();
        return view('user.notification')->with($details);
    }

    public function settings(Request $request){
        $data = $request->all();
        if($request->isMethod('POST')){
            if($data['password']){
                #Update the new Password
                User::where('id',$Auth::User()->id)->update(['password' => Hash::make($data['password'])]);
                return redirect()->back()->with('success','Password Updated Successfully');
            }else{

                return redirect()->back()->with('reset_error', 'password does not match')->with('page','reset')->with('q', $data['q']);
            }

        }
        $details = $this->getUserDetails();
        return view('user.settings')->with($details);
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
                        'subject' => 'Password Reset',
                        'body' => '<p>We have received a request to reset the password for your account on Intellectfusions. To proceed with resetting your password, please follow the instructions below:</p>
                            </br>
                            <p>Click on the following link to reset your password:</p>
                         
                            <a href="https://Intellectfusions.com/user/resettpassword/reset?q='.$remember_token.'" style="background-color: teal; color: white;padding-top: 5px ;
                        padding-bottom: 5px ;
                        padding-left: 10px ;
                        padding-right: 10px ; text-decoration: none; margin: auto;"> Reset Password </a>
                            </br>
                           <p> If clicking the link doesnt work, you can copy and paste the URL below into your web browsers address bar:</p>
                            <a href="https://Intellectfusions.com/user/resettpassword/reset?q='.$remember_token.'">https://Intellectfusions.com/user/resettpassword/reset?q='.$remember_token.'</a> ',
                        'username'=> $user['name']
                    ];
                    
                    Mail::to($data['email'])->send(new UserMail($mailData));

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
                return view('user.forgotpassword')->with('page','Expired');
            }
           
         
            if($tokenExists){
                if($request->isMethod('POST')){
                    if($data['password'] == $data['confirm_password']){
                        #Update the new Password
                        User::where('remember_token',$data['q'])->update(['password' => Hash::make($data['password']), 'remember_token'=>"Null"]);
                        return view('user.forgotpassword')->with('page','completed');
                    }else{

                        return redirect()->back()->with('reset_error', 'password does not match')->with('page','reset')->with('q', $data['q']);
                    }
    
                }
                
                 return view('user.forgotpassword')->with('page','reset')->with('q', $data['q']);
            }else{
                return view('user.forgotpassword')->with('page','Expired');
            }
            
        }
    }
    
}
