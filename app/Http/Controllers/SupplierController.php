<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Product;
use App\Components\SupplierManager;
use App\Components\RegionManager;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
		
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		
		return view('supplierregister', ['countries' => $countries]);
    }

    public function list()
    {
     return view('supplierlist');
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
			$countData->where('product_name', 'like', '%' .$searchValue . '%');
			$countData->where('supplier', 'like', '%' .$searchValue . '%');
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
				$records->where('product_name', 'like', '%' .$searchValue . '%');
				$records->where('supplier', 'like', '%' .$searchValue . '%');
			}
		
		$list = $records->get();

		 $data_arr = array();
		 
		 foreach($list as $sno => $record){


            $action = '<div class="d-flex order-actions">
            <a href="javascript:;" class=""><i class="bx bxs-edit"></i></a> 
            </div>
            <div class="form-check form-switch">
									<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
									<label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
								</div>
            ';
            $detail = '<a href=""><button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button></a>';
            $main_img = '<img src="{{asset("assets/images/products/02.png")}}">';


			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			  //"main_img" => $main_img,
			  "product_name" => $record->product_name,
			  "product_code" => $record->product_code,
			  'detail' => $detail,
			  'action' => $action,
			  //"supplier" => $record->supplier,
			 
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
