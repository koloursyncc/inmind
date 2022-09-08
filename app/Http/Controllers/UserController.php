<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('sign');
    }


    public function perform()
    {
        //Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
 
}
