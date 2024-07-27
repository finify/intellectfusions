<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\projecttype;

class HomeController extends Controller
{
    public function getDetails(){

        $projecttypes = projecttype::orderBy('id','desc')->get()->toArray();
        $fewprojecttypes = projecttype::orderBy('id','desc')->paginate(5);
        // dd(compact('projecttypes'));

        return compact('projecttypes','fewprojecttypes');
    }
    //
    public function index(Request $request){
        $details = $this->getDetails();
        $data = $request->all();

        if($request->isMethod('POST')){
            Session::put('description', $data['description']);
            return view('user.login');
        }

        return view('home.index')->with($details);
        
    }

    public function about(){
        $details = $this->getDetails();
        return view('home.about')->with($details);
    }

    public function contact(){
        $details = $this->getDetails();
        return view('home.contact')->with($details);
    }

    public function terms(){
        $details = $this->getDetails();
        return view('home.terms')->with($details);
    }
    public function refund(){
        $details = $this->getDetails();
        return view('home.refund')->with($details);
    }

    public function faq(){
        return view('home.faq');
    }

    public function plagiarism(){
        $details = $this->getDetails();
        return view('home.plagiarism')->with($details);
    }

    public function data(){
        $details = $this->getDetails();
        return view('home.data')->with($details);
    }
}
