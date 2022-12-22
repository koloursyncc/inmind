<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
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

   public function create(Request $request)
   {dd("hii");
        $rules = [
         'bank_payer' => 'required|string|min:5|max:255',
         'pay_brand' => 'required|string|min:5|max:255',
   
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
         return redirect('apexpenses')
         ->withInput()
         ->withErrors($validator);
      }
      else{
            $data = $request->input();
         try
         {
            $student = new Expenses;
            $student->bank_payer = $data['bank_payer'];
            $student->pay_brand = $data['pay_brand'];
            $student->amount = $data['amount'];
            $student->currency = $data['currency'];
            $student->payment_date = $data['payment_date'];
            $student->to_payee = $data['to_payee'];
            $student->supplier_type = $data['supplier_type'];
            $student->name = $data['name'];
            $student->family_name = $data['family_name'];
            $student->mobile = $data['mobile'];
            $student->save();
            return redirect('apexpenses')->with('status',"Insert successfully");
         }
         catch(Exception $e){
            return redirect('apexpenses')->with('failed',"operation failed");
         }
      }
   }
}
