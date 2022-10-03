<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Components\RegionManager;
use App\Components\CustomerManager;
use Validator;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
		$data = $this->getCustomer('save', null);
		
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
		$documents = $persons = [];
		if($type != 'save')
		{
			$customerManager = CustomerManager::getInstance();
			$documents = $customerManager->getCustomerAddressDocumentByCustId($obj->id);
			$persons = $customerManager->getCustomerContactPersonByCustId($obj->id);
		}
		
		return ['obj' => $obj, 'countries' => $countries, 'type' => $type, 'documents' => $documents, 'persons' => $persons];
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
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}

				$customerManager = CustomerManager::getInstance();
				
				
				$params = $this->request_params();
				
				$lastInsertId = $customerManager->save($params, true);
				
				if($lastInsertId)
				{
					
					//$this->headDocumant($lastInsertId, $request);
					$this->contactperson($lastInsertId, $request);
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
	
	private function request_params($request)
	{
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
			'invoice' => $request->invoice
		];
		
		return $params;
	}
	
	private function contactperson($lastinsertid, $request)
	{
		
		foreach($request->namearr as $k => $namearr) {
			
			$params = array();
			$params['customer_id'] = $lastinsertid;
			$params['name'] = $namearr;
			if(isset($request->family_name[$k]))
			{
				$params['family_name'] = $request->family_name[$k];
			}
			if(isset($request->position[$k]))
			{
				$params['position'] = $request->position[$k];
			}
			if(isset($request->mobile[$k]))
			{
				$params['mobile'] = $request->mobile[$k];
			}
			if(isset($request->email[$k]))
			{
				$params['email'] = $request->email[$k];
			}
			if(isset($request->dob[$k]))
			{
				$params['dob'] = $request->dob[$k];
			}
			if(isset($request->line[$k]))
			{
				$params['line'] = $request->line[$k];
			}
			if(isset($request->remark[$k]))
			{
				$params['remark'] = $request->remark[$k];
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
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}

				$customerManager = CustomerManager::getInstance();
				
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
					'invoice' => $request->invoice
				];
				//echo '<pre>'; print_r($request->all()); die;
				$lastInsertId =  $request->id;
				$status = $customerManager->update($lastInsertId, $params);
				
				if($status)
				{
					
					//$this->headDocumant($lastInsertId, $request);
					$this->contactperson($lastInsertId, $request);
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
