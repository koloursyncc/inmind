<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Components\ProductManager;
use Illuminate\Http\Request;
use Validator, Redirect, Auth;
class ProductController extends Controller
{
    public function index()
    {
        return view('productadd');
    }
	public function child()
    {
        return view('childproductadd');
    }
    public function list()
    {
        return view('productlist');
    }
    public function detail()
    {
        return view('productdetail');
    }
	
	public function save(Request $request)
	{
		if($request->isMethod('post'))
		{
			//try
			//{
				$data = $request->all();
				
				$message = []; //array('city_id.required' => 'The city field is required');

				$rules = array(
					'name' => 'required',
					'code' => 'required',
					'brand_id' => 'required',
					'color' => 'required',
					'type'=> 'required',
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}

				$data = $request->except(['_token']);
				
				$productManager = ProductManager::getInstance();
				
				$lastInsertId = $productManager->save($data, true);
				
				if($lastInsertId)
				{
					if($request->type == 2) {
						
						if(isset($request->kind_of_product))
						{
							$this->handleProductSet($lastInsertId, $request->kind_of_product, $request->kind_of_product_qty);
						}
					}
					
					if($request->hasFile('images')) 
					{
						$images = $request->file('images');
						
						$imageManagerObj = \App\Components\ImageManager::getInstance();
						$path = public_path('images/products/'.$lastInsertId);
						foreach($images as $fileindex => $file)
						{
							$filename = $file->getClientOriginalName();
							$extension = $file->getClientOriginalExtension();
							
							if($file->move($path,$filename))
							{
								$mainimage = 0;
								if($fileindex == 0) {
									$mainimage = 1;
								}
								
								$imageManagerObj->save(
									[
										'product_id' => $lastInsertId,
										'main_image' => $mainimage,
										'name' => $filename,
									]
								);
							}
						}
					}
					
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
	
	private function productSet($productId, $kind_of_product, $kind_of_product_qty)
	{
		$productManager = ProductManager::getInstance();
		
		$dataset = ['product_id' => $productId, 'kind_of_product' => $kind_of_product, 'qty' => $kind_of_product_qty];
		
		$productManager->saveProductSet($dataset);
	}
	
	private function handleProductSet($productId, $kind_of_product, $kind_of_product_qty)
	{
		foreach($kind_of_product as $k => $kind_of_product_val)
		{
			if(isset($kind_of_product_qty[$k]))
			{
				$this->productSet($productId, $kind_of_product_val, $kind_of_product_qty[$k]);
			}
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
		 $totalRecords = Product::select('count(*) as allcount')->count();
		 $countData = Product::select('count(*) as allcount');
		 
		if($searchValue != null) {
			$countData->where('name', 'like', '%' .$searchValue . '%');
			//$countData->where('supplier', 'like', '%' .$searchValue . '%');
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
				$records->where('name', 'like', '%' .$searchValue . '%');
				//$records->where('supplier', 'like', '%' .$searchValue . '%');
			}
		
		$list = $records->get();

		 $data_arr = array();
		 
		 foreach($list as $sno => $record){


$action = '<div class="d-flex order-actions">
<a href="javascript:;" class=""><i class="bx bxs-edit"></i></a>
<a href="javascript:;" class="ms-3"><i class="bx bxs-trash"></i></a>
</div>';
$detail = '<a href=""><button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button></a>';
$main_img = '<img src="{{asset("assets/images/products/02.png")}}">';


			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			  "main_img" => $main_img,
			  "product_name" => $record->name,
			  "product_code" => $record->code,
			  'detail' => $detail,
			  'action' => $action,
			  "supplier" => $record->supplier,
			 
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
