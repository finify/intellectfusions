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
use App\Models\Expertdetail;

class SettingController extends Controller
{
    public function getExpertDetails(){
        $user = User::where('id', Auth::guard('expert')->User()->id)->first()->toArray();
        $notifications = Notifications::where('user_id', Auth::guard('expert')->User()->id)->get()->toArray();
        $expertdetail = Expertdetail::where('user_id', Auth::guard('expert')->User()->id)->first()->toArray();

        $projecttypes = projecttype::orderBy('id','desc')->get()->toArray();
        $fields = fields::orderBy('id','desc')->get()->toArray();

      
        return compact('user','notifications','projecttypes','fields','expertdetail');
    }

    public function storeMedia(Request $request){
        $path = storage_path('app/public/profilepicture');

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
        $filePath = storage_path('app/public/profilepicture/' . $filename);

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

    public function getfieldofstudyOptions()
    {
        // Fetch all options from the database
        $options = fields::all(['id', 'field_name']); // Adjust according to your table columns
        

        return response()->json($options);
    }

    public function getfieldofstudy(Request $request)
    {
        // Fetch the selected options from the database
        // Assuming SelectedOptionsModel is the model where selected options are stored
        $selectedOptions = Expertdetail::where('user_id', Auth::guard('expert')->User()->id)->pluck('field_of_study'); // Adjust column name accordingly

        return response()->json($selectedOptions);
    }


    public function setting(Request $request, $slug){
        

        $data = $request->all();

        if($slug == "details"){
            
            if($request->isMethod('POST')){
                if($data['action'] == "updatedetail"){
                  
                    // dd($data['field_of_study']);
                    $expert_details = [
                        'user_id'=> Auth::guard('expert')->User()->id,
                        'about'=> $data['about'],
                        'phone_number'=> $data['phone_number'],
                        'field_of_study'=> json_encode( $data['field_of_study']),
                        'project_type'=>  json_encode( $data['project_type']),
                        'country'=> $data['country'],
                        'city'=> $data['city'],
                        'degree_obtained'=> $data['degree_obtained'],
                        'degree_obtained_others'=> $data['degree_obtained_others'],
                        'availability'=> $data['availability'],
                        'deliver'=> $data['deliver'],
                        'plagiarism'=> $data['plagiarism'],
                        'plagiarismcheck'=> $data['plagiarismcheck'],
                        
                    ];
        
                    


                    $detailsupdated = Expertdetail::where('user_id',Auth::guard('expert')->User()->id)->update($expert_details);

                    $details = $this->getExpertDetails();
                    return redirect()->back()->with($details)->with('success','Details Updated');
                }elseif($data['action'] == "updateprofilepicture"){
                
                    foreach ($request->input('document', []) as $file) {
                        $expert_details = [
                            'profileimage'=> $file
                        ];
                        $profileimage = Expertdetail::where('user_id',Auth::guard('expert')->User()->id)->first()->toArray()['profileimage'];

                    

                        // Specify the path of the file to be deleted
                        $filePath = storage_path('app/public/profilepicture/' .$profileimage );
                        if (file_exists($filePath)) {
                            // Delete the file
                            unlink($filePath);
                        }

                        $detailsupdated = Expertdetail::where('user_id',Auth::guard('expert')->User()->id)->update($expert_details);     
                        $details = $this->getExpertDetails();
                        return redirect()->back()->with($details)->with('success','Profile Image Updated');       
                    }
                    
                }
            }

        }elseif($slug == "profile"){

        }


        // if($request->isMethod('POST')){
        //     if($data['action'] == "updatedetail"){
        //         $projectupdated = projects::where('id',$data['project_id'])->update(['project_title'=> $data['project_title'],'description'=> $data['description'] ]);
        //         $details = $this->getProjectDetails($slug);
        //         return redirect()->back()->with($details)->with('success','Project Detail Updated');
        //     }elseif($data['action'] == "uploaddoc"){

        //         foreach ($request->input('document', []) as $file) {
        //             $attachment_details = [
        //                 'user_id'=> Auth::guard('expert')->User()->id,
        //                 'project_id'=> $slug,
        //                 'filename'=> $file,
        //                 'original_filename'=> $file,
        //                 'status'=> 0
        //             ];
    
        //             $attachment = ExpertAttachment::create($attachment_details);               
        //         }
        //         $details = $this->getProjectDetails($slug);
        //         return redirect()->back()->with($details)->with('success','File Uploaded');
        //     }elseif($data['action'] == "deletefile"){
            
        //         $filename = $request->input('filename');

        //         $attachmentid = $data['attachmentid'];
              

        //         // Specify the path of the file to be deleted
        //         $filePath = storage_path('expertfiles/' . $filename);

        //         $deleted = ExpertAttachment::where('id',$attachmentid)->delete();
                    
        //         // Check if the file exists
        //         if (file_exists($filePath)) {
        //             // Delete the file
        //             unlink($filePath);
        //             $details = $this->getProjectDetails($slug);
        //             return redirect()->back()->with($details)->with('success','File Deleted');
        //         } 

                
        //     }
        // }
        $details = $this->getExpertDetails();
        

        return view('expert.settings')->with($details);
    }

    
}