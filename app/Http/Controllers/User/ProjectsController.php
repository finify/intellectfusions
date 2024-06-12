<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\projects;
use App\Models\projecttype;
use App\Models\fields;
use App\Models\Notifications;
use App\Models\Attachment;
use App\Models\ExpertAttachment;

class ProjectsController extends Controller
{
    public function getProjectDetails($slug){
        $user = User::where('id', Auth::User()->id)->first()->toArray();
        $notifications = Notifications::where('user_id', Auth::User()->id)->get()->toArray();


        $project = projects::where('user_id', Auth::User()->id)->where('id',$slug)->first()->toArray();
        $attachments = Attachment::where('user_id', Auth::User()->id)->where('project_id',$slug)->get()->toArray();
        $expertattachments = ExpertAttachment::where('project_id',$slug)->get()->toArray();

        return compact('user','notifications','project','attachments','expertattachments');
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

        $name = uniqid() . '_' . str_replace(' ', '-', trim($file->getClientOriginalName())) ;

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



    public function projects(Request $request, $slug){
        

        $data = $request->all();


        if($request->isMethod('POST')){
            if($data['action'] == "updatedetail"){
                $projectupdated = projects::where('id',$data['project_id'])->update(['project_title'=> $data['project_title'],'description'=> $data['description'] ]);
                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','Project Detail Updated');
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
            }elseif($data['action'] == "deletefile"){
                $filename = $request->input('filename');

                $attachmentid = $data['attachmentid'];
                // Specify the path of the file to be deleted
                $filePath = storage_path('tmp/uploads/' . $filename);

                $deleted = Attachment::where('id',$attachmentid)->delete();
                    
                // Check if the file exists
                if (file_exists($filePath)) {
                    // Delete the file
                    unlink($filePath);
                    $details = $this->getProjectDetails($slug);
                    return redirect()->back()->with($details)->with('success','File Deleted');
                } 

                
            }
        }
        $details = $this->getProjectDetails($slug);

        return view('user.projects')->with($details);
    }

    
}