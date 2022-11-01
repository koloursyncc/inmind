<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\PriceMap;
use App\Models\SupplierProduct;
use App\Components\PriceManager;
use App\Components\ProductManager;
use Illuminate\Http\Request;
use Validator;
class PriceController extends Controller
{
	public function pricelist()
    {
        return view('pricelist');
    }
	
    public function index()
    {
		$priceManagerObj = PriceManager::getInstance();
		$data = $priceManagerObj->priceHandleById(null, 'save', '');
		
        return view('pricecreate', $data);
    }
    
	public function edit($id)
	{
		$priceManagerObj = PriceManager::getInstance();
		$data = $priceManagerObj->priceHandleById($id, 'edit', '');
		
		return view('pricecreate', $data);
	}
	
	private function view($id)
	{
		$priceManagerObj = PriceManager::getInstance();
		$data = $priceManagerObj->priceHandleById($id, 'view', '');
		
		return view('pricecreate', $data);
	}
	
	public function getproductdetail(Request $request)
	{
		$productManager = ProductManager::getInstance();
		
		$data = $productManager->getproductdetail($request->id, $request->type);
		return json_encode($data);
	}
	
	public function pricesave(Request $request)
	{
		if($request->isMethod('post'))
		{
			$rules = array(
				'product_id' => 'required',
			);
			$data = $request->all();
			$validator = Validator::make($data, $rules);
			
			if ($validator->fails())
			{
				return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
			}
			
			$params = $this->request_params($request);
			
			$priceManager = PriceManager::getInstance();
			
			$lastInsertId = $priceManager->save($params, true);
			
			if($lastInsertId > 0)
			{
				
				$this->price_map($lastInsertId, $request);
				
				return response()->json(array('status'=>'success', 'msg' => 'Successfully Save'));
			}
		
			return response()->json(array('status'=>'error', 'error' => 'Something Wrong'));
			
		}
	}
	
	public function priceupdate(Request $request)
	{
		if($request->isMethod('post'))
		{
			$rules = array(
				'product_id' => 'required',
			);
			$data = $request->all();
			$validator = Validator::make($data, $rules);
			
			if ($validator->fails())
			{
				return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
			}
			
			$params = $this->request_params($request);
			
			$priceManager = PriceManager::getInstance();
			
			$lastInsertId = $priceManager->update($request->price_id, $params);
			
			if($lastInsertId > 0)
			{
				
				$this->price_map($lastInsertId, $request);
				
				return response()->json(array('status'=>'success', 'msg' => 'Successfully Update'));
			}
		
			return response()->json(array('status'=>'error', 'error' => 'Something Wrong'));
			
		}
	}
	
	private function price_map($lastInsertId, $request)
	{
		PriceMap::where('price_id', $lastInsertId)->delete();
		
		if(isset($request->multiple_select_1))
		{
			foreach($request->multiple_select_1 as $multiple_select_1)
			{
				$obj = SupplierProduct::find($multiple_select_1);
				if($obj)
				{
					PriceMap::create([
						'price_id' => $lastInsertId,
						'supplier_product_id' => $multiple_select_1,
						'unit_price' => $obj->unit_price,
						'type' => $obj->supplier_type
					]);
				}
				
			}
			
		}
		
		if(isset($request->multiple_select_2))
		{
			foreach($request->multiple_select_2 as $multiple_select_2)
			{
				$obj = SupplierProduct::find($multiple_select_2);
				if($obj)
				{
					PriceMap::create([
						'price_id' => $lastInsertId,
						'supplier_product_id' => $multiple_select_2,
						'unit_price' => $obj->unit_price,
						'type' => $obj->supplier_type
					]);
				}
				
			}
			
		}
		
		if(isset($request->multiple_select_3))
		{
			foreach($request->multiple_select_3 as $multiple_select_3)
			{
				$obj = SupplierProduct::find($multiple_select_3);
				if($obj)
				{
					PriceMap::create([
						'price_id' => $lastInsertId,
						'supplier_product_id' => $multiple_select_3,
						'unit_price' => $obj->unit_price,
						'type' => $obj->supplier_type
					]);
				}
				
			}
		}
		
		if(isset($request->multiple_select_4))
		{
			foreach($request->multiple_select_4 as $multiple_select_4)
			{
				$obj = SupplierProduct::find($multiple_select_4);
				if($obj)
				{
					PriceMap::create([
						'price_id' => $lastInsertId,
						'supplier_product_id' => $multiple_select_4,
						'unit_price' => $obj->unit_price,
						'type' => $obj->supplier_type
					]);
				}
				
			}
		}
		
		if(isset($request->multiple_select_5))
		{
			foreach($request->multiple_select_5 as $multiple_select_5)
			{
				$obj = SupplierProduct::find($multiple_select_5);
				if($obj)
				{
					PriceMap::create([
						'price_id' => $lastInsertId,
						'supplier_product_id' => $multiple_select_5,
						'unit_price' => $obj->unit_price,
						'type' => $obj->supplier_type
					]);
				}
				
			}
		}
		
		if(isset($request->multiple_select_6))
		{
			foreach($request->multiple_select_6 as $multiple_select_6)
			{
				$obj = SupplierProduct::find($multiple_select_6);
				if($obj)
				{
					PriceMap::create([
						'price_id' => $lastInsertId,
						'supplier_product_id' => $multiple_select_6,
						'unit_price' => $obj->unit_price,
						'type' => $obj->supplier_type
					]);
				}
				
			}
		}
		
	}
	
	private function request_params($request)
	{
		$total = 0;
		if(isset($request->multiple_select_1))
		{
			foreach($request->multiple_select_1 as $multiple_select_1)
			{
				$obj = SupplierProduct::find($multiple_select_1);
				if($obj)
				{
					$total += $obj->unit_price;
				}
			}
			
		}
		
		if(isset($request->multiple_select_2))
		{
			foreach($request->multiple_select_2 as $multiple_select_2)
			{
				$obj = SupplierProduct::find($multiple_select_2);
				if($obj)
				{
					$total += $obj->unit_price;
				}
			}
		}
		
		if(isset($request->multiple_select_3))
		{
			foreach($request->multiple_select_3 as $multiple_select_3)
			{
				$obj = SupplierProduct::find($multiple_select_3);
				if($obj)
				{
					$total += $obj->unit_price;
				}
			}
		}
		
		if(isset($request->multiple_select_4))
		{
			foreach($request->multiple_select_4 as $multiple_select_4)
			{
				$obj = SupplierProduct::find($multiple_select_4);
				if($obj)
				{
					$total += $obj->unit_price;
				}
			}
		}
		
		if(isset($request->multiple_select_5))
		{
			foreach($request->multiple_select_5 as $multiple_select_5)
			{
				$obj = SupplierProduct::find($multiple_select_5);
				if($obj)
				{
					$total += $obj->unit_price;
				}
			}
		}
		
		if(isset($request->multiple_select_6))
		{
			foreach($request->multiple_select_6 as $multiple_select_6)
			{
				$obj = SupplierProduct::find($multiple_select_6);
				if($obj)
				{
					$total += $obj->unit_price;
				}
			}
		}
		
		return [
			'product_id' => $request->product_id,
			'total_cost' => $total,
		];
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
		$totalRecords = Price::select('count(*) as allcount')
		->join('products', function($join) {
			$join->on('products.id', '=', 'price.product_id');
		})
		->count();
		
		$countData = Price::select('count(*) as allcount');
		 
		if($searchValue != null) {
			//$countData->where('product_name', 'like', '%' .$searchValue . '%');
			//$countData->where('supplier', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Price::select('price.id', 'products.name', 'products.code') 
			->join('products', function($join) {
				$join->on('products.id', '=', 'price.product_id');
			})
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   $records->orderBy('price.id', 'Desc');//$records->orderBy($columnName,$columnSortOrder);
			} else {
				$records->orderBy('price.id', 'Desc');
			}
			if($searchValue != null) {
				//$records->where('product_name', 'like', '%' .$searchValue . '%');
				//$records->where('supplier', 'like', '%' .$searchValue . '%');
			}
		
		$list = $records->get();

		 $data_arr = array();
		 
		 foreach($list as $sno => $record){
			
			$edit = url('priceedit/'.$record->id);
			$action = '<div class="d-flex order-actions">
				<a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a>
				
			</div>';
			
			$data_arr[] = array(
			  "product" => $record->name,
			  "code" => $record->code,
			  "action" => $action
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
