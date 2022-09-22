<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Product;
use App\Components\SupplierManager;
use App\Components\RegionManager;
use Illuminate\Http\Request;
use Validator, Redirect, Auth;
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

	public function save(Request $request)
	{
		if($request->isMethod('post'))
		{
			//try
			//{
				$data = $request->all();
				
				$message = array('city_id.required' => 'The city field is required');
				
				$rules = array(
							'supplier_name' => 'required',
							'supplier_type' => 'required',
							'country_id' => 'required',
							'zipcode' => 'required',
							'state_id' => 'required',
							'city_id' => 'required',
							'name' => 'required',
							'mobile' => 'required',
						);
				
				$validator = Validator::make($data, $rules, $message);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				$data = $request->except(['_token']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$status = $supplierManager->save($data);
				
				if($status)
				{
					return response()->json(array('status'=>'success', 'msg' => 'Successfully Save'));
				}
				
				return response()->json(array('status'=>'error', 'error' => 'Something Wrong'));
				
			/* }
			catch (\Throwable $e)
			{
				$error = $e->getMessage().', File Path = '.$e->getFile().', Line Number = '.$e->getLine();
				//$this->exceptionHandling($error);
				return response()->json(array('status'=>'exceptionError'));
			} */
		}
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
		 $totalRecords = Supplier::select('count(*) as allcount')->count();
		 $countData = Supplier::select('count(*) as allcount');
		 
		if($searchValue != null) {
			//$countData->where('product_name', 'like', '%' .$searchValue . '%');
			//$countData->where('supplier', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Supplier::select('*') //orderBy($columnName,$columnSortOrder)
		 //  ->orderBy('id', 'Desc')
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   $records->orderBy($columnName,$columnSortOrder);
			}
			if($searchValue != null) {
				//$records->where('product_name', 'like', '%' .$searchValue . '%');
				//$records->where('supplier', 'like', '%' .$searchValue . '%');
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
			  "supplier" => $record->supplier_name,
			  'action' => $action,
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
