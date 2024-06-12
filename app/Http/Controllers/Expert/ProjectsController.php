<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\projects;
use App\Models\projecttype;
use App\Models\fields;
use App\Models\Notifications;
use App\Models\Attachment;
use App\Models\Expertdetail;
use App\Models\ExpertAttachment;

class ProjectsController extends Controller
{
    public function getProjectDetails($slug){
        $user = User::where('id', Auth::guard('expert')->User()->id)->first()->toArray();
        $notifications = Notifications::where('user_id', Auth::guard('expert')->User()->id)->get()->toArray();


        $project = projects::where('expert_id', Auth::guard('expert')->User()->id)->where('id',$slug)->first()->toArray();
        $attachments = Attachment::where('project_id',$slug)->get()->toArray();
        $expertattachments = ExpertAttachment::where('project_id',$slug)->get()->toArray();
        $expertdetail = Expertdetail::where('user_id', Auth::guard('expert')->User()->id)->first()?->toArray() ?? array_fill_keys(Schema::getColumnListing('expertdetails'),null);
        return compact('user','notifications','project','attachments','expertattachments','expertdetail');
    }

    public function storeMedia(Request $request){
        $path = storage_path('app/public/expertfiles');

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
        $filePath = storage_path('app/public/expertfiles/' . $filename);

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
        $filePath = storage_path('expertfiles/' . $filename);

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
                        'user_id'=> Auth::guard('expert')->User()->id,
                        'project_id'=> $slug,
                        'filename'=> $file,
                        'original_filename'=> $file,
                        'status'=> 0
                    ];
    
                    $attachment = ExpertAttachment::create($attachment_details);               
                }
                $details = $this->getProjectDetails($slug);
                return redirect()->back()->with($details)->with('success','File Uploaded');
            }elseif($data['action'] == "deletefile"){
            
                $filename = $request->input('filename');

                $attachmentid = $data['attachmentid'];
              

                // Specify the path of the file to be deleted
                $filePath = storage_path('expertfiles/' . $filename);

                $deleted = ExpertAttachment::where('id',$attachmentid)->delete();
                    
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

        return view('expert.projects')->with($details);
    }

    
}