<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoInvoice;
use App\Models\PoItems;
use App\Models\Customer;
use Validator;
use DB;
use \NumberFormatter;

class ArController extends Controller
{
    public function index()
    {   
        $po_id = (isset($_GET['po_id']))?$_GET["po_id"]:'';
        $po_invoice_id = (isset($_GET['po_invoice_id']))?$_GET["po_invoice_id"]:'';
        
        $data = PoItems::get();
        $users = PoItems::select('c.name as name','po_items.po_invoice_id as invoice_id','pv.po_id','pv.total_amount','pv.pay_this_time','pv.created_at',
        DB::raw('(CASE WHEN pv.status = 1 THEN "Overdue" ELSE "Normal" END) AS status'))
        ->join('po_invoice as pv','pv.po_id','=','po_items.po_id')
        ->join('customers as c','c.id','=','pv.cust_id')
        ->where('po_items.po_invoice_id',$po_invoice_id)->get();


        $name = isset($_GET['po_invoice_id'])?$users->toArray()[0]['name']:'';
        $date = isset($_GET['po_invoice_id'])?$users->toArray()[0]['created_at']:'';
        $date = date("Y-m-d", strtotime($date));
        $total_amt = isset($_GET['po_invoice_id'])?$users->toArray()[0]['total_amount']:'';
        $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $total_amount =  $digit->format(round((int)$total_amt));
         $total_amount = ucwords($total_amount);
        // Fetch all records
         $response['data'] = $users;

        /* return response()->json($response);*/
        //return view('arreceive')->with('users',$users);
       return view('arreceive', compact('data','users','po_id','name','date','total_amt','total_amount'));
    }

    public function view($id)
    {
        $priceManagerObj = PoInvoice::getInstance();
        $data = $priceManagerObj->poHandleById($id, 'view', '');
        
        return view('arreceive', $data);
    }

    public function arbalancechecker()
    {   
        $po_id = (isset($_GET['po_id']))?$_GET["po_id"]:'';
        $po_invoice_id = (isset($_GET['po_invoice_id']))?$_GET["po_invoice_id"]:'';
        $name = (isset($_GET['name']))?$_GET["name"]:'';
       
        //dd($po_id);
        $data = PoInvoice::get();
        $items = PoItems::get();
        $cust = Customer::get();
        /*$users = PoInvoice::select('c.name as name','po_invoice.po_id','po_invoice.total_amount','po_invoice.pay_this_time','po_invoice.created_at')->join('customers as c','c.brand_id','=','po_invoice.id')->where('po_id',$po_id)->get();*/

        $product = PoItems::select('c.name as name','po_items.po_invoice_id as invoice_id','pv.po_id','pv.total_amount','pv.pay_this_time','pv.created_at',
        DB::raw('(CASE WHEN pv.status = 1 THEN "Overdue" ELSE "Normal" END) AS status'))
        ->join('po_invoice as pv','pv.po_id','=','po_items.po_id')
        ->join('customers as c','c.id','=','pv.cust_id');
        //->where('po_items.po_id',$po_id)->get();

        if(isset($_GET['po_id']))
        {
            $product = $product->where('po_items.po_id',$po_id);
        }
        if(isset($_GET['po_invoice_id']))
        {
            $product = $product->where('po_items.po_invoice_id',$po_invoice_id);
        }
        if(isset($_GET['name']))
        {
            $product = $product->where('c.name',$name);
        }

        //$product =  $product->get();

         /*$product = array();*/
        if($po_id!="" || $po_invoice_id!="" || $name!="" )
        {
            $product =  $product->get();
        }

       
        $name = isset($_GET['po_id'])?$product->toArray()[0]['name']:'';
        $date = isset($_GET['po_id'])?$product->toArray()[0]['created_at']:'';
        $date = date("Y-m-d", strtotime($date));
        $total_amt = isset($_GET['po_id'])?$product->toArray()[0]['total_amount']:'';
        $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $total_amount =  $digit->format(round((int)$total_amt));
         $total_amount = ucwords($total_amount);

         $bal_amt1 = isset($_GET['po_id'])?$product->toArray()[0]['total_amount']:'';
          $bal_amt2 = isset($_GET['po_id'])?$product->toArray()[0]['pay_this_time']:'';
          $bal_amt = (round((int)$bal_amt1))-(round((int)$bal_amt2));
        // Fetch all records
         $response['data'] = $product;

       return view('arbalance', compact('name','data','cust','product','po_id','date','total_amt','total_amount','items','bal_amt'));
       
    }
    public function arsearch()
    {   
        $po_id = (isset($_GET['po_id']))?$_GET["po_id"]:'';
        $po_invoice_id = (isset($_GET['po_invoice_id']))?$_GET["po_invoice_id"]:'';
        $name = (isset($_GET['name']))?$_GET["name"]:'';
        //dd($po_id);
        $data = PoInvoice::get();
        $items = PoItems::get();
        $cust = Customer::get();
        /*$users = PoInvoice::select('c.name as name','po_invoice.po_id','po_invoice.total_amount','po_invoice.pay_this_time','po_invoice.created_at')->join('customers as c','c.brand_id','=','po_invoice.id')->where('po_id',$po_id)->get();*/

        $product = PoItems::select('c.name as name','po_items.po_invoice_id as invoice_id','pv.po_id','pv.total_amount','pv.pay_this_time','pv.created_at',
        DB::raw('(CASE WHEN pv.status = 1 THEN "Overdue" ELSE "Normal" END) AS status'))
        ->join('po_invoice as pv','pv.po_id','=','po_items.po_id')
        ->join('customers as c','c.id','=','pv.cust_id');
        //->where('po_items.po_id',$po_id)->get();
        
       if(isset($_GET['po_id']))
        {
            $product = $product->where('po_items.po_id',$po_id);
        }
        if(isset($_GET['po_invoice_id']))
        {
            $product = $product->where('po_items.po_invoice_id',$po_invoice_id);
        }
        if(isset($_GET['name']))
        {
            $product = $product->where('c.name',$name);
        }

       /* $product = array();*/
        if($po_id!="" || $po_invoice_id!="" || $name!="" )
        {
            $product =  $product->get();
        }
        
       
        $name = isset($_GET['po_id'])?$product->toArray()[0]['name']:'';

        $date = isset($_GET['po_id'])?$product->toArray()[0]['created_at']:'';
        $date = date("Y-m-d", strtotime($date));
        $total_amt = isset($_GET['po_id'])?$product->toArray()[0]['total_amount']:'';
        $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $total_amount =  $digit->format(round((int)$total_amt));
         $total_amount = ucwords($total_amount);

          $bal_amt1 = isset($_GET['po_id'])?$product->toArray()[0]['total_amount']:'';
          $bal_amt2 = isset($_GET['po_id'])?$product->toArray()[0]['pay_this_time']:'';
          $bal_amt = (round((int)$bal_amt1))-(round((int)$bal_amt2));

        // Fetch all records
         $response['data'] = $product;

       return view('arsearch', compact('name','data','cust','product','po_id','date','total_amt','total_amount','items','bal_amt'));
    
    }
}
