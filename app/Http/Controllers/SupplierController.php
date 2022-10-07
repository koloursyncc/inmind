<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Installment;
use App\Components\SupplierManager;
use App\Components\RegionManager;
use Illuminate\Http\Request;
use Validator, Redirect, Auth;
class SupplierController extends Controller
{
    public function index()
    {
		
		$data = $this->getSupplier('save', null);
		
		return view('supplierregister', $data);
    }
	public function supplierpo()
    {
		$products = Product::select('id', 'name', 'code')->get();
		$suppliers = Supplier::select('id', 'supplier_name')->get();
		return view('supplierpo', ['products' => $products, 'suppliers' => $suppliers]);
    }
	
	private function getSupplier($type, $obj)
	{
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		$products = Product::select('products.id', 'products.name')->get();
		$installments = [];
		if($obj)
		{
			$installments = Installment::where('type_id', $obj->id)->where('type', 1)->get();
		}
		
		return ['obj' => $obj, 'countries' => $countries, 'products' => $products, 'type' => $type, 'installments' => $installments];
	}
	
	public function edit($id)
	{
		$supplierObj = SupplierManager::getInstance();
		$obj = $supplierObj->getSupplierById($id, 2);
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
		$obj = $supplierObj->getSupplierById($id, 2);
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
						);
				
				$validator = Validator::make($data, $rules, $message);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				//$data = $request->except(['_token']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$params = $this->request_params($request);
				
				$lastInsertId = $supplierManager->save($params, true);
				
				if($lastInsertId > 0)
				{
					$this->installments($lastInsertId, $request);
					
					foreach($request->product_id as $productid)
					{
						$supplierManager->saveProductSupplier([
							'product_id' => $productid,
							'supplier_id' => $lastInsertId
						]);
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
	
	private function installments($lastInsertId, $request)
	{
		if(isset($request->installment_1))
		{ 
			foreach($request->installment_1 as $installment_clone_key => $installment_clone_val)
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
				);
				
				$validator = Validator::make($data, $rules, $message);
				
				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				$products = $request->product_id;
				//$data = $request->except(['_token', 'product_id']);
				
				$supplierManager = SupplierManager::getInstance();
				
				$params = $this->request_params($request);
				
				$lastInsertId = $supplierManager->update($request->id, $params);
				
				if($lastInsertId > 0)
				{
					
					$this->installments($lastInsertId, $request);
					
					$supplierManager->deleteProductSupplierBySupplierId($lastInsertId);
					foreach($request->product_id as $productid)
					{
						$supplierManager->saveProductSupplier([
							'product_id' => $productid,
							'supplier_id' => $lastInsertId
						]);
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
			'name' => $request->name,
			'family_name' => $request->family_name,
			'position' => $request->position,
			'mobile' => $request->mobile,
			'email' => $request->email,
			'remark' => $request->remark,
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
			
			if($key > 0)
			{
				
			}
			else
			{
				$supplierManager = SupplierManager::getInstance();
				$supplierManager->saveSupplierPoProduct($params);
			}
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
}
