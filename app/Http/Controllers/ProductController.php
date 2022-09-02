<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('productadd');
    }
    public function list()
    {
        return view('productlist');
    }
    public function deatil()
    {
        return view('productdetail');
    }
    
    public function ajaxcall(Request $request)
	{
		 ## Read value
		 $draw = $request->get('draw');
		 $start = $request->get("start");
		 $rowperpage = $request->get("length"); // Rows display per page

		 $columnIndex_arr = $request->get('order');
		 $columnName_arr = $request->get('columns');
		 $order_arr = $request->get('order');
		 $search_arr = $request->get('search');

		 $columnIndex = $columnIndex_arr[0]['column']; // Column index
		 $columnName = $columnName_arr[$columnIndex]['data']; // Column name
		 $columnSortOrder = $order_arr[0]['dir']; // asc or desc
		 $searchValue = $search_arr['value']; // Search value

		 // Total records
		 $totalRecords = Product::select('count(*) as allcount')->count();
		 $countData = Product::select('count(*) as allcount');
		 
		if($searchValue != null) {
			$countData->where('Description', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Product::select('*') //orderBy($columnName,$columnSortOrder)
		 //  ->orderBy('id', 'Desc')
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   $records->orderBy($columnName,$columnSortOrder);
			}
			if($searchValue != null) {
				$records->where('Description', 'like', '%' .$searchValue . '%');
			}
		
		$list = $records->get();

		 $data_arr = array();
		 
		 foreach($list as $sno => $record){
			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			);
		 }

		 $response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordswithFilter,
			"aaData" => $data_arr
		 );

		 echo json_encode($response);
		 exit;
	}
}
