<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as Session;

class LogoutController extends Controller
{
    //
    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('expert/login');
    }
}
