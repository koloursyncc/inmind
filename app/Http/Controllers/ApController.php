<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierType;

class ApController extends Controller
{
   public function index()
   {  

      $data = Supplier::get();
      $supplier_type_data = SupplierType::get();
      return view('apexpenses', compact('data','supplier_type_data'));
      
   }
   public function apexpensessearch()
   {  
      $data = Supplier::get();
      $supplier_type_data = SupplierType::get();
      return view('apexpensessearch', compact('data','supplier_type_data'));
   
   }
}
