<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoController extends Controller
{
    public function index()
    {
        return view('pocreate');
    }
}
