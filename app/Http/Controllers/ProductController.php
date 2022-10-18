<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use App\Models\Color;
use App\Components\ProductManager;
use Illuminate\Http\Request;
use Validator, Redirect, Auth;
class ProductController extends Controller
{
    public function index()
    {
		$productManagerObj = ProductManager::getInstance();
		$data = $productManagerObj->productHandleById(null, 'save', 'Add New Product');
		
        return view('productadd', $data);
    }
	
	public function removeimagebyid(Request $request)
	{
		$id = $request->image_id;
		$obj = Image::find($id);
		if($obj)
		{
			if($obj->delete())
			{
				echo json_encode(['status' => 'success']); die;
			}
		}
		
		echo json_encode(['status' => 'error', 'msg' => 'something wrong']); die;
	}
	
	public function edit($id)
	{
		$productManagerObj = ProductManager::getInstance();
		$data = $productManagerObj->productHandleById($id, 'edit', 'Edit Product');
		//dd($data);
		
		return view('productadd', $data);
	}
	
	public function view($id) 
	{
		
		$productManagerObj = ProductManager::getInstance();
		$data = $productManagerObj->productHandleById($id, 'view', 'Product Detail');
		
		return view('productadd', $data);
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
	
	public function generatecode(Request $request)
	{
		$data = $request->all();
		$rules = array(
			'name' => 'required',
			'code' => 'required',
			'brand_id' => 'required'
		);
		$validator = Validator::make($data, $rules);

		if ($validator->fails())
		{
			return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
		}
		
		//$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
		$barCode = new \Picqer\Barcode\BarcodeGeneratorPNG();
		$barCode = $barCode->getBarcode($request->code, $barCode::TYPE_CODE_128);
		
		//print_r(base64_encode($barCode)); die;
		$generate = ''; //json_encode('<img src="data:image/png;base64,{{ base64_encode('.$barCode.')) }}">');
		$base64 = 'data:image/png;base64,' . base64_encode($barCode);
		
		return response()->json(array('status'=>'success', 'code' => $request->code, 'generate' => $base64, 'data' => base64_encode($barCode)));
	}
	
	private function validFile($request, &$msg)
	{
		$index = 0;
		$largefile =  false;
		if($request->hasFile('images')) 
		{
			$images = $request->file('images');
			foreach($images as $file)
			{
				if($file->getSize() > 2048) {
					$largefile = true;
				}
				$index++;
			}
		}
		
		if($index > 5)
		{
			$msg = 'Upload max 5 photo';
			return false;
		} else if($largefile == true)
		{
			$msg = 'File not exceed 2 MB';
			return false;
		}
		return true;
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
					'code' => 'required|unique:products',
					'brand_id' => 'required',
					'color' => 'required',
					'type'=> 'required',
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				$msg = '';
				$isValidFile = $this->validFile($request, $msg);
				
				if($isValidFile == false)
				{
					return response()->json(array('status'=>'error', 'error' => $msg));
				}
				
				$count = Color::where('name', $request->color)->count();
				if($count == 0)
				{
					Color::create(['name' => $request->color]);
				}
				
				$data = $request->except(['_token']);
				//print_r($data); die;
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
					//die;
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
	
	public function update(Request $request)
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
				
				
				
				$msg = '';
				$isValidFile = $this->validFile($request, $msg);
				
				if($isValidFile == false)
				{
					return response()->json(array('status'=>'error', 'error' => $msg));
				}

				//$data = $request->except(['_token', 'product_id']);
				//print_r($data); die;
				$productManager = ProductManager::getInstance();
				
				$lastInsertId = $request->product_id;
				
				$pObj = Product::where('code', $request->code)->where('id', '!=' , $lastInsertId)->first();
				if($pObj)
				{
					return response()->json(array('status'=>'error', 'error' => 'Code already use'));
				}
				$count = Color::where('name', $request->color)->count();
				if($count == 0)
				{
					Color::create(['name' => $request->color]);
				}
				
				$data = [
					'name' => $request->name,
					'code' => $request->code,
					'brand_id' => $request->brand_id,
					'parent_product_id' => $request->parent_product_id,
					'color' => $request->color,
					'barcode' => $request->barcode,
					'type' => $request->type,
					'product_in_set' => $request->product_in_set,
					'dimension_width' => $request->dimension_width,
					'dimension_depth' => $request->dimension_depth,
					'dimension_depth' => $request->dimension_depth,
					'package_width' => $request->package_width,
					'package_depth' => $request->package_depth,
					'package_height' => $request->package_height,
					'package_height' => $request->package_height,
					'contain_1_20_net_weight' => $request->contain_1_20_net_weight,
					'contain_1_20_net_gross_weight' => $request->contain_1_20_net_gross_weight,
					'contain_1_40' => $request->contain_1_40,
					'contain_1_40_net_weight' => $request->contain_1_40_net_weight,
					'contain_1_40_net_gross_weight' => $request->contain_1_40_net_gross_weight,
					'hq_1_40_contain' => $request->hq_1_40_contain,
					'hq_1_40_net_weight' => $request->hq_1_40_net_weight,
					'hq_1_40_net_gross_weight' => $request->hq_1_40_net_gross_weight,
					'gross_kg' => $request->gross_kg,
					'cbm' => $request->cbm,
					'net_height' => $request->net_height
				];
				
				$status = $productManager->update($lastInsertId, $data);
				
				if($status)
				{
					if($request->type == 2) {
						
						if(isset($request->kind_of_product))
						{
							$productManager->deleteProductSetByProductId($lastInsertId);
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
					//die;
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
	
	public function updatestatusbyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$productObj = ProductManager::getInstance();
			$isStatus = $productObj->update($id, ['status' => $statusval]);
			if($isStatus)
			{
				
				
				$statustext = ($status == 1) ? 'InActive' : 'Active';
				
				return response()->json(array('status'=>'success', 'id' => $id, 'statustext' => $statustext, 'statusval' => $statusval));
			}
			
			return response()->json(array('status'=>'error', 'msg' => 'Something went wrong'));
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
			 $id = $record->id;
			$status = $record->status;
			$statustext = 'Active';
			$statuschecked = 'checked';
			if($status == 2)
			{
				$statustext = 'InActive';
				$statuschecked = '';
			}
			$view = url('productdetail/'.$record->id);
			$edit = url('productedit/'.$record->id);
			$action = '<div class="d-flex order-actions">
				<a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a>
				
			</div>';
			
			
			$action .= '<div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_'.$id.'" data-id="'.$id.'" data-status="'.$status.'" type="checkbox" '.$statuschecked.'>
				<label class="form-check-label" id="check_label_'.$id.'" for="">'.$statustext.'</label>
			</div>
            ';
			
			$detail = '<a href=""><a href="'.$view.'" type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></a>';
			
			$img = Image::where('product_id', $record->id)->first();
			
			$main_img = '<img src="{{asset("assets/images/products/02.png")}}">';
			if($img)
			{
				$ig = asset("images/products/".$record->id."/".$img->name."");
				$main_img = '<img src="'.$ig.'" height="30">';
			}


			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			  "main_img" => $main_img,
			  "product_name" => $record->name,
			  "product_code" => $record->code,
			  'detail' => $detail,
			  'action' => $action
			 
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
	
	public function searchcolor(Request $request)
	{
		$search = $request->searchTerm;
		
		$data = Color::where('name', 'like', '%' .$search . '%')->limit(5)->get();
		
		$response = array();
		$response[] = array(
			"id"=>$search,
			"text"=>$search
		);
		
		foreach($data as $dataobj){
			$response[] = array(
				"id"=>$dataobj->name,
				"text"=>$dataobj->name
			);
		}
		
		return response()->json($response);
	}
}
