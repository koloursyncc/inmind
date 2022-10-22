<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\SupplierPo;
use App\Models\SupplierProduct;
use App\Models\Product;
use App\Models\Installment;
use App\Components\SupplierManager;
use App\Components\RegionManager;
use Illuminate\Http\Request;
use Validator, Redirect, Auth;
use App\Models\SupplierContact;
class SupplierController extends Controller
{
	
    public function index()
    {
		
		$data = $this->getSupplier('save', null);
		
		return view('supplierregister', $data);
    }
	
	public function supplierpolist()
	{
		return view('supplier/supplierpolist');
	}
	
	public function supplierpo()
    {
		$data = $this->getSupplierpoData(null, 'save');
		
		return view('supplierpo', $data);
    }
	
	public function supplierpoview($id)
	{
		$data = $this->getSupplierpoData($id, 'view');
		
		return view('supplierpo', $data);
	}
	
	private function getSupplierpoData($id, $type)
	{
		$products = Product::select('id', 'name', 'code')->get();
		$suppliers = Supplier::select('id', 'supplier_name')->get();
		
		$obj = null;
		$supplierProductPo = [];
		if($id != null)
		{
			$supplierObj = SupplierManager::getInstance();
			$obj = $supplierObj->getSupplierPoById($id, 1);
			if($obj == null)
			{
				$type = 'save';
			} else {
				$supplierProductPo = $supplierObj->getSupplierProductPoByAttrId($id);
				
			}
		}
		
		return [
			'products' => $products,
			'suppliers' => $suppliers,
			'type' => $type,
			'obj' => $obj,
			'supplierProductPo' => $supplierProductPo
		];
	}
	
	public function supplierpoedit($id)
	{
		$data = $this->getSupplierpoData($id, 'edit');
		
		return view('supplierpo', $data);
	}
	
	private function getSupplier($type, $obj)
	{
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		$products = Product::select('products.id', 'products.name')->get();
		$installments = $supplierProducts = $supplierProductContact = [];
		if($obj)
		{
			$installments = Installment::where('type_id', $obj->id)->where('type', 1)->get();
			$supplierProducts = SupplierProduct::where('supplier_id', $obj->id)->get();
			$supplierProductContact = SupplierContact::where('supplier_id', $obj->id)->get();
		}
		
		return ['obj' => $obj, 'supplierProductContact' => $supplierProductContact, 'countries' => $countries, 'products' => $products, 'type' => $type, 'installments' => $installments, 'supplierProducts' => $supplierProducts];
	}
	
	public function edit($id)
	{
		$supplierObj = SupplierManager::getInstance();
		$obj = $supplierObj->getSupplierById($id, 1);
		$type = 'edit';
		if($obj == null)
		{
			$type = 'save';
		}
		
		$data = $this->getSupplier($type, $obj);
		
		return view('supplierregister', $data);
	}
	
	public function detail($id)
	{
		$supplierObj = SupplierManager::getInstance();
		$obj = $supplierObj->getSupplierById($id, 1);
		$type = 'view';
		if($obj == null)
		{
			$type = 'save';
		}
		
		$data = $this->getSupplier($type, $obj);
		
		return view('supplierregister', $data);
	}

    public function list()
    {
		return view('supplierlist');
    }
	
	private function validateContactPerson($request,&$msg)
	{
		$flag = false;
		$err = [];
		if(isset($request->name) && isset($request->mobile)) {
			
			foreach($request->name as $key => $name)
			{
				$mobile = '';
				if(isset($request->mobile[$key]))
				{
					$mobile = $request->mobile[$key];
				}
				
				if($name == '')
				{
					$err['name'] = 'Please enter name';
				}
				
				if($mobile == '')
				{
					$err['mobile'] = 'Please enter mobile';
				}
				
				if(isset($request->email[$key]))
				{
					$email = $request->email[$key];
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$err['email'] = 'Email is not a valid email address';
					}
				}
				
			}
		} else {
			$err['name'] = 'Please enter name';
			$err['mobile'] = 'Please enter mobile';
		}
		
		if(count($err) > 0)
		{
			foreach($err as $e)
			{
				$msg .= $e.' ';
			}
			return $flag;
		}
		
		return true;
	}
	
	private function handleContactPerson($insertid, $request)
	{
		foreach($request->name as $key => $name)
		{
			$params = [];
			$params['supplier_id'] = $insertid;
			$params['name'] = $name;
			$mobile = '';
			if(isset($request->mobile[$key]))
			{
				$mobile = $request->mobile[$key];
			}
			$params['mobile'] = $mobile;
			
			if(isset($request->family_name[$key]))
			{
				$params['family_name'] = $request->family_name[$key];
			}
			
			if(isset($request->position[$key]))
			{
				$params['position'] = $request->position[$key];
			}
			
			if(isset($request->email[$key]))
			{
				$params['email'] = $request->email[$key];
			}
			
			if(isset($request->remark[$key]))
			{
				$params['remark'] = $request->remark[$key];
			}
			
			if($key > 0)
			{
				SupplierProduct::where('id', $key)->update($params);
			} else {
				SupplierContact::create($params);
			}
			//
		}
	}

	public function save(Request $request)
	{
		if($request->isMethod('post'))
		{
			//try
			//{
				$data = $request->all();
				
				/* foreach($request->product_id as $product_id)
					{
						echo $product_id;
					}
				print_R($data); die; */
				$message = array('city_id.required' => 'The city field is required');
				
				$rules = array(
							'delivery_destination' => 'required',
							'supplier_name' => 'required',
							'supplier_type' => 'required',
							'country_id' => 'required',
							'zipcode' => 'required',
							'state_id' => 'required',
							'city_id' => 'required',
							'name' => 'required',
							'mobile' => 'required',
							'currency' => 'required',
							'incoterm' => 'required',
							'delivery_destination' => 'required'
						);
				
				$validator = Validator::make($data, $rules, $message);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				$msg = '';
				$status = $this->validateContactPerson($request, $msg);
				if($status === false)
				{
					return response()->json(['status' => 'error', 'error' => $msg]);
				}
				
				//$data = $request->except(['_token']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$params = $this->request_params($request);
				
				$lastInsertId = $supplierManager->save($params, true);
				
				if($lastInsertId > 0)
				{
					$this->installments($lastInsertId, $request);
					
					$this->handleProductSupplier($lastInsertId, $request);
					
					$this->handleContactPerson($lastInsertId, $request);
					
					/* foreach($request->product_id as $productid)
					{
						$supplierManager->saveProductSupplier([
							'product_id' => $productid,
							'supplier_id' => $lastInsertId
						]);
					} */
					
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
	
	private function handleProductSupplier($lastInsertId, $request)
	{
		$supplierManager = SupplierManager::getInstance();
		
		//$supplierManager->deleteProductSupplierBySupplierId($lastInsertId);
		
		foreach($request->product_id as $key => $productid)
		{
			$unit_price = 0;
			if(isset($request->unit_price[$key]))
			{
				$unit_price = $request->unit_price[$key];
			}
			
			$supplierManager->saveProductSupplier([
				'product_id' => $productid,
				'unit_price' => $unit_price,
				'supplier_id' => $lastInsertId,
				'supplier_type' => $request->supplier_type,
			]);
			
			/* if($key > 0)
			{
				SupplierProduct::where('id', $key)->update([
					'product_id' => $productid,
					'unit_price' => $unit_price,
					'supplier_id' => $lastInsertId,
					'supplier_type' => $request->supplier_type,
				]);
			} else {
				$supplierManager->saveProductSupplier([
					'product_id' => $productid,
					'unit_price' => $unit_price,
					'supplier_id' => $lastInsertId,
					'supplier_type' => $request->supplier_type,
				]);
			} */
			
		}
	}
	
	private function installments($lastInsertId, $request)
	{
		if(isset($request->installment_1))
		{ 
			foreach($request->installment_1 as $installment_clone_key => $installment_clone_val)
			{
				
				if($installment_clone_val > 0)
				{
					$params['installment_1'] = $installment_clone_val;
					$params['type'] = 1;
					$params['type_id'] = $lastInsertId;
					if(isset($request->installment_2[$installment_clone_key]))
					{
						$params['installment_2'] = $request->installment_2[$installment_clone_key];
						
						if($installment_clone_key > 0)
						{ 
							Installment::where('type_id', $installment_clone_key)->where('type', 1)->update($params);
							
						}
						else
						{
							Installment::create($params);
						}
					}
				}
			}
		}
	}
	
	public function update(Request $request)
	{
		if($request->isMethod('post'))
		{
			//try
			//{
				$data = $request->all();
				
				/* foreach($request->product_id as $product_id)
					{
						echo $product_id;
					}
				print_R($data); die; */
				$message = array('city_id.required' => 'The city field is required');
				
				$rules = array(
					'id' => 'required',
					'delivery_destination' => 'required',
					'supplier_name' => 'required',
					'supplier_type' => 'required',
					'country_id' => 'required',
					'zipcode' => 'required',
					'state_id' => 'required',
					'city_id' => 'required',
					'name' => 'required',
					'mobile' => 'required',
					'currency' => 'required',
					'incoterm' => 'required',
					'delivery_destination' => 'required'
				);
				
				$validator = Validator::make($data, $rules, $message);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				
				$msg = '';
				$status = $this->validateContactPerson($request, $msg);
				if($status === false)
				{
					return response()->json(['status' => 'error', 'error' => $msg]);
				}
				
				$products = $request->product_id;
				//$data = $request->except(['_token', 'product_id']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$params = $this->request_params($request);
				
				$lastInsertId = $supplierManager->update($request->id, $params);
				
				if($lastInsertId > 0)
				{
					
					$this->installments($lastInsertId, $request);
					
					$this->handleProductSupplier($lastInsertId, $request);
					
					$this->handleContactPerson($lastInsertId, $request);
					
					/* $supplierManager->deleteProductSupplierBySupplierId($lastInsertId);
					foreach($request->product_id as $productid)
					{
						$supplierManager->saveProductSupplier([
							'product_id' => $productid,
							'supplier_id' => $lastInsertId
						]);
					} */
					
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
	
	private function request_params($request)
	{
		return [
			'supplier_name' => $request->supplier_name,
			'supplier_type' => $request->supplier_type,
			'address' => $request->address,
			'building' => $request->building,
			'sub_district' => $request->sub_district,
			'district' => $request->district,
			'road' => $request->road,
			'city_id' => $request->city_id,
			'state_id' => $request->state_id,
			'country_id' => $request->country_id,
			'zipcode' => $request->zipcode,
			/* 'name' => $request->name,
			'family_name' => $request->family_name,
			'position' => $request->position,
			'mobile' => $request->mobile,
			'email' => $request->email,
			'remark' => $request->remark, */
			'bank_name' => $request->bank_name,
			'bank_address' => $request->bank_address,
			'swift' => $request->swift,
			'ac_no' => $request->ac_no,
			'beneficiary_name' => $request->beneficiary_name,
			'beneficiary_address' => $request->beneficiary_address,
			'currency' => $request->currency,
			'incoterm' => $request->incoterm,
			'delivery_destination' => $request->delivery_destination
		];
	}
	
	public function updatestatusbyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$supplierObj = SupplierManager::getInstance();
			$isStatus = $supplierObj->update($id, ['status' => $statusval]);
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
		 $totalRecords = Supplier::select('count(*) as allcount')->count();
		 $countData = Supplier::select('count(*) as allcount');
		 
		if($searchValue != null) {
			//$countData->where('product_name', 'like', '%' .$searchValue . '%');
			//$countData->where('supplier', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Supplier::select('*') //orderBy($columnName,$columnSortOrder)
		 // 
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   $records->orderBy('id', 'Desc');//$records->orderBy($columnName,$columnSortOrder);
			} else {
				$records->orderBy('id', 'Desc');
			}
			if($searchValue != null) {
				//$records->where('product_name', 'like', '%' .$searchValue . '%');
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
			$edit = url('supplieredit/'.$id);
			$view = url('supplierdetail/'.$id);
            $action = '<div class="d-flex order-actions"><a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a></div>
			
            <div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_'.$id.'" data-id="'.$id.'" data-status="'.$status.'" type="checkbox" '.$statuschecked.'>
				<label class="form-check-label" id="check_label_'.$id.'" for="">'.$statustext.'</label>
			</div>
            ';
			
			
			$action .= '';
			
            $detail = '<a href="'.$view.'"><button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button></a>';
            $main_img = '<img src="{{asset("assets/images/products/02.png")}}">';


			
			
			$data_arr[] = array(
			  "id" => $id,
			  "supplier" => $record->supplier_name,
			  "detail" => $detail,
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
	
	
	public function supplierposave(Request $request)
	{
		if($request->isMethod('post'))
		{
			//try
			//{
				$data = $request->all();
				//
				/* foreach($request->product_id as $product_id)
					{
						echo $product_id;
					}
				 */
				$message = array('city_id.required' => 'The city field is required');
				
				$rules = array(
							'brand_id' => 'required',
							'supplier_id' => 'required',
							'date' => 'required'
						);
				
				$validator = Validator::make($data, $rules);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				//$data = $request->except(['_token']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$params = $this->supplierpo_param($request);
				
				
				$check = $request->has('product_id');
				if($check == false)
				{
					return response()->json(array('status'=>'error', 'error' => 'Please select product'));
				}
				
				
				$lastInsertId = $supplierManager->saveSupplierPo($params, true);
				
				if($lastInsertId > 0)
				{
					$this->handleSupplierPoProduct($lastInsertId, $request);
					
					
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
	
	private function handleSupplierPoProduct($lastInsertId, $request)
	{
		$product_ids = $request->product_id;
		$supplierManager = SupplierManager::getInstance();
		$supplierManager->deleteSupplierPoProductByAttr($lastInsertId);
		
		foreach($product_ids as $key => $product_id)
		{
			$params = [];
			$params['supplier_po_id'] = $lastInsertId;
			$params['product_id'] = $product_id;
			$params['unit_price'] = 0;
			$params['qty'] = 0;
			$params['price'] = 0;
			
			if(isset($request->unit_price[$key]))
			{
				$params['unit_price'] = $request->unit_price[$key];
			}
			
			if(isset($request->quantity[$key]))
			{
				$params['qty'] = $request->quantity[$key];
			}
			
			if(isset($request->price[$key]))
			{
				$params['price'] = $request->price[$key];
			}
			
			
			$supplierManager->saveSupplierPoProduct($params);
			/* if($key > 0)
			{
				
			}
			else
			{
				
			} */
		}
	}
	
	private function supplierpo_param($request)
	{
		return [
			'brand_id' => $request->brand_id,
			'supplier_id' => $request->supplier_id,
			'date' => $request->date
		];
	}
	
	public function supplierpoupdate(Request $request)
	{
		if($request->isMethod('post'))
		{
			//try
			//{
				$data = $request->all();
				//
				/* foreach($request->product_id as $product_id)
					{
						echo $product_id;
					}
				 */
				$message = array('city_id.required' => 'The city field is required');
				
				$rules = array(
							'brand_id' => 'required',
							'supplier_id' => 'required',
							'date' => 'required'
						);
				
				$validator = Validator::make($data, $rules);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				//$data = $request->except(['_token']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$params = $this->supplierpo_param($request);
				
				
				$check = $request->has('product_id');
				if($check == false)
				{
					return response()->json(array('status'=>'error', 'error' => 'Please select product'));
				}
				
				$lastInsertId =$request->id;
				$status = $supplierManager->updateSupplierPo($lastInsertId, $params);
				
				if($status > 0)
				{
					$this->handleSupplierPoProduct($lastInsertId, $request);
					
					
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
	
	 public function ajaxcallPoList(Request $request)
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
		 $totalRecords = SupplierPo::select('count(*) as allcount')
		 ->join('suppliers', function($join) {
			$join->on('suppliers.id', '=', 'supplier_po.supplier_id');
		})
		 ->count();
		 
		 $countData = SupplierPo::select('count(*) as allcount');
		 
		if($searchValue != null) {
			//$countData->where('product_name', 'like', '%' .$searchValue . '%');
			//$countData->where('supplier', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = SupplierPo::select('supplier_po.id', 'supplier_po.status', 'suppliers.name')
			 ->join('suppliers', function($join) {
				$join->on('suppliers.id', '=', 'supplier_po.supplier_id');
			})
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
			$id = $record->id;
			$status = $record->status;
			$statustext = 'Active';
			$statuschecked = 'checked';
			if($status == 2)
			{
				$statustext = 'InActive';
				$statuschecked = '';
			}
			$edit = url('supplierpoedit/'.$id);
			$view = url('supplierpoview/'.$id);
            $action = '<div class="d-flex order-actions"><a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a></div>
			
            <div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_'.$id.'" data-id="'.$id.'" data-status="'.$status.'" type="checkbox" '.$statuschecked.'>
				<label class="form-check-label" id="check_label_'.$id.'" for="">'.$statustext.'</label>
			</div>
            ';
			
			
			$action .= '';
			
            $detail = '<a href="'.$view.'"><button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button></a>';
            $main_img = '<img src="{{asset("assets/images/products/02.png")}}">';


			
			
			$data_arr[] = array(
			  "id" => $id,
			  "supplier" => $record->name,
			  "detail" => $detail,
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
	
	public function updatestatuspobyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$supplierObj = SupplierManager::getInstance();
			$isStatus = $supplierObj->updateSupplierPo($id, ['status' => $statusval]);
			if($isStatus)
			{
				
				
				$statustext = ($status == 1) ? 'InActive' : 'Active';
				
				return response()->json(array('status'=>'success', 'id' => $id, 'statustext' => $statustext, 'statusval' => $statusval));
			}
			
			return response()->json(array('status'=>'error', 'msg' => 'Something went wrong'));
		}
	}
}
