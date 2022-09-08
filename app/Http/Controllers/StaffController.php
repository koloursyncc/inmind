<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staffadd');
    }

    public function list()
    {
        return view('stafflist');
    }
    
    
}
