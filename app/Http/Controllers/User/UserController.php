<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function dashboard(Request $request){
   
        return view('user.dashboard');
    }

    public function project(Request $request){
        return view('user.project');
    }

    public function notification(Request $request){
        return view('user.notification');
    }

    public function settings(Request $request){
        return view('user.settings');
    }
    
}
