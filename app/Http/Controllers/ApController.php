<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Expenses;
use App\Models\ExpenseCategoryDetails;
use App\Models\Supplier;
use App\Models\SupplierType;
use App\Components\ExpenseManager;
use Validator, Redirect, Auth;
use DB;

class ApController extends Controller
{
   public function index()
   {  
      $id = (isset($_GET['id']))?$_GET["id"]:'';
     
      $data = Supplier::get();
      $supplier_type_data = SupplierType::get();
      $expense_data = ExpenseCategoryDetails::get();
      $expense_desc_data = ExpenseCategoryDetails::select('id','expense_category','expense_description')->where('id',$id)->get();
     
      $expense_desc = isset($_GET['id'])?$expense_desc_data->toArray()[0]['expense_description']:'';

      $response['expense_data'] = $expense_desc_data;

      return view('apexpenses', compact('data','supplier_type_data','expense_data','expense_desc'));
      
   }
   public function apexpensessearch()
   {  

      $id = (isset($_GET['id']))?$_GET["id"]:'';
      $bank_payer = (isset($_GET['bank_payer']))?$_GET["bank_payer"]:'';
      $to_payee = (isset($_GET['to_payee']))?$_GET["to_payee"]:'';
      $pay_brand = (isset($_GET['pay_brand']))?$_GET["pay_brand"]:'';
      $supplier_type = (isset($_GET['supplier_type']))?$_GET["supplier_type"]:'';
      $expense_category = (isset($_GET['expense_category']))?$_GET["expense_category"]:'';
      $name = (isset($_GET['name']))?$_GET["name"]:'';
     
      $data = Supplier::get();

      $expense = Expenses::select('expenses.bank_payer','expenses.supplier_name','expenses.created_at','expenses.amount','expenses.expense_category','expenses.expense_description','expenses.name')->join('suppliers as sp','sp.supplier_type','=','expenses.supplier_type');

         if(isset($_GET['bank_payer']))
        {
            $expense = $expense->where('expenses.bank_payer',$bank_payer);
        }
        if(isset($_GET['to_payee']))
        {
            $expense = $expense->where('expenses.to_payee',$to_payee);
        }
        if(isset($_GET['pay_brand']))
        {
            $expense = $expense->where('expenses.pay_brand',$pay_brand);
        }
        if(isset($_GET['supplier_type']))
        {
            $expense = $expense->where('expenses.supplier_name',$supplier_type);
        }
        if(isset($_GET['expense_category']))
        {
            $expense = $expense->where('expenses.expense_category',$expense_category);
        }
        if(isset($_GET['name']))
        {
            $expense = $expense->where('expenses.name',$name);
        }

         if($bank_payer!="" || $to_payee!="" || $pay_brand!=""|| $supplier_type!=""|| $expense_category!="" || $name!="" )
        {
            $expense =  $expense->get();
        }



      $supplier_type_data = SupplierType::get();
      $expense_data = ExpenseCategoryDetails::get();
      $bal_amt1 = isset($_GET['id'])?$expense->toArray()[0]['amount']:'';
      $bal_amt = (round((int)$bal_amt1));

      return view('apexpensessearch', compact('data','supplier_type_data','expense_data','expense','bal_amt'));
   
   }

   public function getCategoryData(Request $request)
   {  

      $category_id = $request->category_id;

      $getData = ExpenseCategoryDetails::select('*')->where('id',$category_id)->first();

      if(!empty($getData))
      {
         $intCode    = Response::HTTP_OK;
         $strStatus  = Response::$statusTexts[$intCode];
         $strMessage = 'Data Found';
         return sendResponse($intCode, $strStatus, $strMessage, $getData);
      }else
      {
         $intCode    = Response::HTTP_NOT_FOUND;
         $strStatus  = Response::$statusTexts[$intCode];
         $strMessage = 'Data Not Found';
         return sendResponse($intCode, $strStatus, $strMessage, array());
      }

      
   }

   public function save(Request $request)
   {
      if($request->isMethod('post'))
      {
         //try
         //{
            $data = $request->all(); 


            $rules = array(
               'transaction_date' => 'required',
               'bank_payer' => 'required',
               'pay_brand' => 'required',
               /*'expense_category' => 'required',*/
               'expense_category_id' => 'required',
               /*'expense_description' => 'required',*/
               'amount' => 'required',
               'currency' => 'required',
               'to_payee' => 'required',
               'supplier_type' => 'required',
               /*'supplier_name' => 'required',*/
               'name' => 'required',
               'family_name' => 'required',
               'mobile' => 'required',
            );


            $messages = [
               'transaction_date.required' => "Transaction Date is required",
               'bank_payer.required' => "Bank Payer  is required",
               'pay_brand.required' => " Pay Brand is required",
               'expense_category_id.required' => "Expense Category is required",
               'amount.required' => "Amount is required",
               'currency.required' => "Currency is required",
               'to_payee.required' => "To Payee is required",
               'supplier_type.required' => "Supplier Type is required",
               'name.required' => "Name is required",
               'family_name.required' => "Family Name is required",
               'mobile.required' => "Mobile is required"
            ];

            /*$validator = Validator::make($data, $rules, []);
           
            if ($validator->fails())
            {dd($validator->getMessageBag()->toArray());
               return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
              // return redirect()->back()->withErrors($validate->messages())->withInput();
            }*/
            
            $validator = checkvalidation($data ,$rules, $messages);
            if (!empty($validator)) {
               $arrStatus = Response::HTTP_NOT_FOUND;
               $arrCode = Response::$statusTexts[$arrStatus];
               $arrMessage = $validator;
               return sendResponse($arrStatus, $arrCode, $arrMessage, '');
            }           

            $data = $request->except(['_token']);
            //print_r($data); die;
            $arrdata = [
                     
                     'created_at' => $request->transaction_date,
                     'bank_payer' => $request->bank_payer,
                     'pay_brand' => $request->pay_brand,
                     'expense_category' => $request->expense_category,
                     'expense_category_id' => $request->expense_category_id,
                     'expense_description' => $request->expense_description,
                     'amount' => $request->amount,
                     'currency' =>$request->currency,
                     'to_payee' => $request->to_payee,
                     'supplier_type' => $request->supplier_type,
                     'supplier_name' =>  $request->supplier_name,
                     'name' => $request->name,
                     'family_name' =>  $request->family_name,
                     'mobile' =>  $request->mobile,
                  ];
 
            //dd($arrdata);
            $lastInsertId = Expenses::insertGetId($arrdata);
            
            /*if($lastInsertId)
            {
               $this->updatePo($lastInsertId, $request);
               
               if($request->hasFile('images')) 
               {
                  $images = $request->file('images');
            
                  $path = public_path('images/po/'.$lastInsertId);
                  foreach($images as $fileindex => $file)
                  {
                     $filename = $file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                     
                     if($file->move($path,$filename))
                     {
                        DB::table('po_images')->insert(['po_id' => $lastInsertId, 'image' => $filename]);
                     }
                  }
               }
               
               
            }*/
            return response()->json(array('status'=>'success', 'msg' => 'Successfully Save'));
           /* return response()->json(array('status'=>'error', 'error' => 'Something Wrong'));*/
            
         /* }
         catch (\Throwable $e)
         {
            $error = $e->getMessage().', File Path = '.$e->getFile().', Line Number = '.$e->getLine();
            //$this->exceptionHandling($error);
            return response()->json(array('status'=>'exceptionError'));
         } */
      }
   }
   
}
