<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Brand;
use App\Models\Installment;
use App\Components\RegionManager;
use App\Components\CustomerManager;
use Validator;
use Illuminate\Http\Request;
use DB;
class DealerController extends Controller
{
    public function index()
    {
		$data = $this->getCustomer('save', null) ;
		
		return view('dealeradd', $data);
    }

    public function list()
    {
		return view('dealerlist');
    }
	
	private function getCustomer($type, $obj)
	{
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		$documents = $persons = $stores = $customer_products = [];
		$installments = [];
		$brands = Brand::get();
		$products = Product::get();
		
		if($type != 'save')
		{
			$installments = Installment::where('type_id', $obj->id)->where('type', 2)->get();
			/* 
			$documents = $customerManager->getCustomerAddressDocumentByCustId($obj->id);
			; */
			$customerManager = CustomerManager::getInstance();
			$persons = $customerManager->getCustomerContactPersonByCustId($obj->id);
			$stores = DB::table('customer_stores')->where('customer_id', $obj->id)->get();
			$customer_products = DB::table('customer_products')->where('customer_id', $obj->id)->get();
		}
		/* dd($customer_products) */
		return ['obj' => $obj, 'countries' => $countries, 'type' => $type, 'installments' => $installments, 'documents' => $documents, 'persons' => $persons, 'brands' => $brands, 'products' => $products, 'stores' => $stores, 'customer_products' => $customer_products];
	}
	
	public function edit($id)
	{
		$customerObj = CustomerManager::getInstance();
		$obj = $customerObj->getCustomerById($id);
		$type = 'edit';
		if($obj == null)
		{
			$type = 'save';
		}
		
		$data = $this->getCustomer($type, $obj);
		
		return view('dealeradd', $data);
	}
	
	public function detail($id)
	{
		$customerObj = CustomerManager::getInstance();
		$obj = $customerObj->getCustomerById($id);
		$type = 'view';
		if($obj == null)
		{
			$type = 'save';
		}
		
		$data = $this->getCustomer($type, $obj);
		
		return view('dealeradd', $data);
	}
	
	private function handleInstall($request, &$msg)
	{
		$status = false;
		$total = 0;
		if(isset($request->installment_clone))
		{
			
			//echo '<pre>'; print_r($request->installment_clone); die;
			foreach($request->installment_clone as $installment_clone_key => $installment_clone_val)
			{
				$total  += $installment_clone_val;
			}
		}
		if($total < 100) {
			$msg = 'installment should 100%';
			return false;
		}
		
		
		return true;
	}
	
	private function handleProduct($lastInsertId, $request)
	{
		
		if(isset($request->product_id))
		{
			foreach($request->product_id as $k => $productId)
			{
				$product = [];
				$product['customer_id'] = $lastInsertId;
				$product['product_id'] = $productId;
				$flag = false;
				if(isset($request->price_thb_ex_vat[$k]))
				{
					$flag = true;
					$product['price_thb_ex_vat'] = $request->price_thb_ex_vat[$k];
				}
				
				if(isset($request->price_thb_inc_vat[$k]))
				{
					$flag = true;
					$product['price_thb_inc_vat'] = $request->price_thb_inc_vat[$k];
				}
				
				if(isset($request->mkt_price_thb_ex_vat[$k]))
				{
					$flag = true;
					$product['mkt_price_thb_ex_vat'] = $request->mkt_price_thb_ex_vat[$k];
				}
				
				if(isset($request->mkt_price_thb_inc_vat[$k]))
				{
					$flag = true;
					$product['mkt_price_thb_inc_vat'] = $request->mkt_price_thb_inc_vat[$k];
				}
				
				if(isset($request->mkt_valid_date[$k]))
				{
					$flag = true;
					$product['mkt_valid_date'] = $request->mkt_valid_date[$k];
				}
				
				if($flag == true)
				{
					
					if($k > 0)
					{
						DB::table('customer_products')
						->where('id', $k)
						->update($product);
					} else {
						DB::table('customer_products')->insert($product);
						
					}
				}
				
			}
		}
		
		if(isset($request->store_checked))
		{
			foreach($request->store_checked as $sk => $store_checked)
			{
				$store = [];
				$store['customer_id'] = $lastInsertId;
				$store['store_checked'] = $store_checked;
				$flag = false;
				if(isset($request->store_name[$sk]))
				{
					$flag = true;
					$store['store_name'] = $request->store_name[$sk];
				}
				
				/* if(isset($request->store_contact_address[$sk]))
				{
					$flag = true;
					$store['store_contact_address'] = $request->store_contact_address[$sk];
				}
				 */
				if(isset($request->store_building_village[$sk]))
				{
					$flag = true;
					$store['store_building_village'] = $request->store_building_village[$sk];
				}
				
				if(isset($request->store_sub_district[$sk]))
				{
					$flag = true;
					$store['store_sub_district'] = $request->store_sub_district[$sk];
				}
				
				if(isset($request->store_district[$sk]))
				{
					$flag = true;
					$store['store_district'] = $request->store_district[$sk];
				}
				
				if(isset($request->store_road[$sk]))
				{
					$flag = true;
					$store['store_road'] = $request->store_road[$sk];
				}
				
				if(isset($request->store_city[$sk]))
				{
					$flag = true;
					$store['store_city'] = $request->store_city[$sk];
				}
				
				if(isset($request->store_zip_code[$sk]))
				{
					$flag = true;
					$store['store_zip_code'] = $request->store_zip_code[$sk];
				}
				
				if(isset($request->store_country[$sk]))
				{
					$flag = true;
					$store['store_country'] = $request->store_country[$sk];
				}
				
				if($flag == true)
				{ // echo '<pre>'; print_R($store); die;
					$id = $sk;
					if($sk > 0)
					{
						DB::table('customer_stores')->where('id', $id)->update($store);
					} else {
						
						$id = DB::table('customer_stores')->insertGetId($store);
					}
					
					if($id)
					{
						if(isset($request->store_contact_address[$sk]))
						{
							$contact_person = [];
							foreach($request->store_contact_address[$sk] as $skcontact => $store_contact_address)
							{
								$flag = false;
								$contact_person['customer_id'] = $lastInsertId;
								$contact_person['store_id'] = $id;
								if(isset($request->store_contact_building[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_building'] = $request->store_contact_building[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_sub_district[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_sub_district'] = $request->store_contact_sub_district[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_sub_district[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_sub_district'] = $request->store_contact_sub_district[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_district_id[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_district_id'] = $request->store_contact_district_id[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_road[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_road'] = $request->store_contact_road[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_country_id[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_country_id'] = $request->store_contact_country_id[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_state_id[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_state_id'] = $request->store_contact_state_id[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_city[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_city'] = $request->store_contact_city[$sk][$skcontact];
								}
								
								if(isset($request->store_contact_zipcode[$sk][$skcontact]))
								{
									$flag = true;
									$contact_person['store_contact_zipcode'] = $request->store_contact_zipcode[$sk][$skcontact];
								}
								//echo '<pre>'; print_r($contact_person);die;
								if($flag == true)
								{
									if($skcontact > 0)
									{
										
										DB::table('customer_store_contact_persons')->where('id', $skcontact)->update($contact_person);
									} else {
										DB::table('customer_store_contact_persons')->insertGetId($contact_person);
									}
								}
							}
						}
					}
				}
				
			}
		}
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
					'brand_id' => 'required',
					'name' => 'required',
					'title' => 'required',
					'type' => 'required',
					'invoice'=> 'required',
					'beneficiary_name' => 'nullable|alpha',
					'account_number' => 'nullable|numeric',
					'country_code' => 'required',
					'country_number' => 'required|numeric'
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				
				
				$msg = '';
				$status = $this->handleInstall($request, $msg);
				if($status == false)
				{
					return response()->json(array('status'=>'error', 'error' => $msg));
				}

				$customerManager = CustomerManager::getInstance();
				
				
				$params = $this->request_params($request);
				
				$lastInsertId = $customerManager->save($params, true);
				
				if($lastInsertId)
				{
					$this->installments($lastInsertId, $request);
					
					$this->contactperson($lastInsertId, $request);
					
					$this->handleProduct($lastInsertId, $request);
					
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
		if(isset($request->installment_clone))
		{
			//echo '<pre>'; print_r($request->installment_clone); die;
			foreach($request->installment_clone as $installment_clone_key => $installment_clone_val)
			{
				if(!empty($installment_clone_val)) {
				$params['installment_1'] = $installment_clone_val;
				$params['type'] = 2;
				$params['type_id'] = $lastInsertId;
				if(isset($request->installment_clone_option[$installment_clone_key]))
				{
					$params['installment_2'] = $request->installment_clone_option[$installment_clone_key];
					
					if($installment_clone_key > 0)
					{
						Installment::where('type_id', $installment_clone_key)->where('type', 2)->update($params);
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
	
	private function request_params($request)
	{
		//echo '<pre>'; print_r($request->all()); die;
		$params = 
		[
			'brand_id' => $request->brand_id,
			'name' => $request->name,
			'family' => $request->family,
			'title' => $request->title,
			'currency' => $request->currency,
			'incoterm' => $request->incoterm,
			'place_of_delivery_destination' => $request->place_of_delivery_destination,
			'credit_term_days' => $request->credit_term_days,
			'from' => $request->from,
			'incoterm_type' => $request->incoterm_type,
			'contact_person' => $request->contact_person,
			'email' => $request->email,
			'bank_name' => $request->bank_name,
			'bank_address' => $request->bank_address,
			'swift' => $request->swift,
			'account_number' => $request->account_number,
			'beneficiary_name' => $request->beneficiary_name,
			'beneficiary_address' => $request->beneficiary_address,
			'type' => $request->type,
			'invoice' => $request->invoice,
			'head_office_address' => $request->head_office_address,
			'head_office_building' => $request->head_office_building,
			'head_office_sub_district' => $request->head_office_sub_district,
			'head_office_district' => $request->head_office_district,
			'head_office_road' => $request->head_office_road,
			'head_office_city' => $request->head_office_city,
			'head_office_zipcode' => $request->head_office_zipcode,
			'head_office_state_id' => $request->head_office_state_id,
			'head_office_country_id' => $request->head_office_country_id,
			'delivery_check' => ($request->delivery_check > 0) ? 1 : 0,
			'delivery_address' => $request->delivery_address,
			'delivery_building' => $request->delivery_building,
			'delivery_sub_district' => $request->delivery_sub_district,
			'delivery_district_id' => $request->delivery_district_id,
			'delivery_road' => $request->delivery_road,
			'delivery_city' => $request->delivery_city,
			'delivery_zipcode' => $request->delivery_zipcode,
			'delivery_state_id' => $request->delivery_state_id,
			'delivery_country_id' => $request->delivery_country_id,
			
			'payment_bank_name' => $request->payment_bank_name,
			'payment_account_number' => $request->payment_account_number,
			'payment_branch' => $request->payment_branch,
			'payment_beneficiary' => $request->payment_beneficiary,
			
			'country_code' => $request->country_code,
			'country_number' => $request->country_number,
			
			/* 'contact_name' => $request->contact_name,
			'contact_family_name' => $request->contact_family_name,
			'contact_position' => $request->contact_position,
			'contact_mobile' => $request->contact_mobile,
			'contact_email' => $request->contact_email,
			'contact_dob' => $request->contact_dob,
			'contact_line' => $request->contact_line,
			'contact_remark' => $request->contact_remark, */
		];
		
		return $params;
	}
	
	private function contactperson($lastinsertid, $request)
	{
		
		foreach($request->contact_name as $k => $namearr) {
			
			$params = array();
			$params['customer_id'] = $lastinsertid;
			$params['name'] = $namearr;
			if(isset($request->contact_family_name[$k]))
			{
				$params['family_name'] = $request->contact_family_name[$k];
			}
			if(isset($request->contact_position[$k]))
			{
				$params['position'] = $request->contact_position[$k];
			}
			if(isset($request->contact_mobile[$k]))
			{
				$params['mobile'] = $request->contact_mobile[$k];
			}
			if(isset($request->contact_email[$k]))
			{
				$params['email'] = $request->contact_email[$k];
			}
			if(isset($request->contact_dob[$k]))
			{
				$params['dob'] = $request->contact_dob[$k];
			}
			if(isset($request->contact_line[$k]))
			{
				$params['line'] = $request->contact_line[$k];
			}
			if(isset($request->contact_remark[$k]))
			{
				$params['remark'] = $request->contact_remark[$k];
			}
			
			if($k > 0)
			{
				$customerManager = CustomerManager::getInstance();
				$customerManager->updateCustomerContactPerson($k, $params);
				
				
			} else {
				$customerManager = CustomerManager::getInstance();
				$customerManager->saveCustomerContactPerson($params);
			}
		} 
		
	}
	
	private function headDocumant($lastinsertid, $request)
	{
		
		foreach($request->address as $k => $headoffice) {
			
			$params = array();
			$params['customer_id'] = $lastinsertid;
			$params['address'] = $headoffice;
			if(isset($request->country_id[$k]))
			{
				$params['country_id'] = $request->country_id[$k];
			}
			if(isset($request->building[$k]))
			{
				$params['building'] = $request->building[$k];
			}
			if(isset($request->sub_district[$k]))
			{
				$params['sub_district'] = $request->sub_district[$k];
			}
			if(isset($request->district_id[$k]))
			{
				$params['district_id'] = $request->district_id[$k];
			}
			if(isset($request->road[$k]))
			{
				$params['road'] = $request->road[$k];
			}
			if(isset($request->city[$k]))
			{
				$params['city'] = $request->city[$k];
			}
			if(isset($request->state_id[$k]))
			{
				$params['state_id'] = $request->state_id[$k];
			}
			if(isset($request->zipcode[$k]))
			{
				$params['zipcode'] = $request->zipcode[$k];
			}
			if(isset($request->country_id[$k]))
			{
				$params['country_id'] = $request->country_id[$k];
			}
			
			if($k > 0)
			{
				$customerManager = CustomerManager::getInstance();
				$customerManager->updateCustomerAddressDocument($k, $params);
				
				
			} else {
				$customerManager = CustomerManager::getInstance();
				$customerManager->saveCustomerAddressDocument($params);
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
				
				$message = []; //array('city_id.required' => 'The city field is required');

				$rules = array(
					'brand_id' => 'required',
					'name' => 'required',
					'title' => 'required',
					'type' => 'required',
					'invoice'=> 'required',
					'beneficiary_name' => 'nullable|alpha',
					'account_number' => 'nullable|numeric',
					'country_code' => 'required',
					'country_number' => 'required|numeric'
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				//$this->handleProduct(1, $request);
				$msg = '';
				$status = $this->handleInstall($request, $msg);
				if($status == false)
				{
					return response()->json(array('status'=>'error', 'error' => $msg));
				}

				$customerManager = CustomerManager::getInstance();
				
				/* $params = 
				[
					'brand_id' => $request->brand_id,
					'name' => $request->name,
					'family' => $request->family,
					'title' => $request->title,
					'currency' => $request->currency,
					'incoterm' => $request->incoterm,
					'place_of_delivery_destination' => $request->place_of_delivery_destination,
					'credit_term_days' => $request->credit_term_days,
					'from' => $request->from,
					'incoterm_type' => $request->incoterm_type,
					'contact_person' => $request->contact_person,
					'email' => $request->email,
					'bank_name' => $request->bank_name,
					'bank_address' => $request->bank_address,
					'swift' => $request->swift,
					'account_number' => $request->account_number,
					'beneficiary_name' => $request->beneficiary_name,
					'beneficiary_address' => $request->beneficiary_address,
					'type' => $request->type,
					'invoice' => $request->invoice
				]; */
				
				$params = $this->request_params($request);
				
				//echo '<pre>'; print_r($params); die;
				$lastInsertId =  $request->id;
				$status = $customerManager->update($lastInsertId, $params);
				
				if($status)
				{
					$this->installments($lastInsertId, $request);
					
					$this->contactperson($lastInsertId, $request);
					//$this->headDocumant($lastInsertId, $request);
					$this->handleProduct($lastInsertId, $request);
					//
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
	
	public function updatestatusbyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$customerObj = CustomerManager::getInstance();
			$isStatus = $customerObj->update($id, ['status' => $statusval]);
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
		 $totalRecords = Customer::select('count(*) as allcount')->count();
		 $countData = Customer::select('count(*) as allcount');
		 
		if($searchValue != null) {
			$countData->where('name', 'like', '%' .$searchValue . '%');
			$countData->where('contact_name', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Customer::select('*') //orderBy($columnName,$columnSortOrder)
		 //  
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   //$records->orderBy($columnName,$columnSortOrder);
			   $records->orderBy('id', 'Desc');
			} else {
				$records->orderBy('id', 'Desc');
			}
			if($searchValue != null) {
				$records->where('name', 'like', '%' .$searchValue . '%');
				$records->where('contact_name', 'like', '%' .$searchValue . '%');
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
			
			$edit = url('dealeredit/'.$id);
			$view = url('dealerdetail/'.$id);
            $action = '<div class="d-flex order-actions">
            <a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a> 
            </div>
            ';
			
			
			$action .= '<div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_'.$id.'" data-id="'.$id.'" data-status="'.$status.'" type="checkbox" '.$statuschecked.'>
				<label class="form-check-label" id="check_label_'.$id.'" for="">'.$statustext.'</label>
			</div>';
			
            $detail = '<a href="'.$view.'"><button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button></a>';
            $main_img = '<img src="{{asset("assets/images/products/02.png")}}">';


			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			  //"main_img" => $main_img,
			  "product_name" => $record->name,
			  "product_code" => $record->contact_name,
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
