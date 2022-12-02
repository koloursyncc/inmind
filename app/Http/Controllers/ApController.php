<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApController extends Controller
{
   public function index()
   {
    return view('apexpenses');
   }
   public function apexpensessearch()
   {
    return view('apexpensessearch');
   }
}
