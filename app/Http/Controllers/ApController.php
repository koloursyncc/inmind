<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class ApController extends Controller
{
   public function index()
   {  

      $data = Supplier::get();
      return view('apexpenses', compact('data'));
      
   }
   public function apexpensessearch()
   {
    return view('apexpensessearch');
   }
}
