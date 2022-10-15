<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Po;
use App\Models\PoInvoice;
use App\Models\PoItems;
use App\Components\POManager;
use Illuminate\Http\Request;
use Validator;
use DB;
class PoController extends Controller
{
	public function polist()
    {
        return view('polist');
    }
	
    public function index()
    {
		$priceManagerObj = POManager::getInstance();
		$data = $priceManagerObj->poHandleById(null, 'save', '');
		
		return view('pocreate', $data);
    }
   
	public function edit($id)
	{
		$priceManagerObj = POManager::getInstance();
		$data = $priceManagerObj->poHandleById($id, 'edit', '');
		
		return view('pocreate', $data);
	}
	
	public function view($id)
	{
		$priceManagerObj = POManager::getInstance();
		$data = $priceManagerObj->poHandleById($id, 'view', '');
		
		return view('pocreate', $data);
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
					'customer_name' => 'required',
					'family_name' => 'required'
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}

				$data = $request->except(['_token']);
				//print_r($data); die;
				$data = $this->request_params($request);
				
				$POManager = POManager::getInstance();
				
				$lastInsertId = $POManager->save($data, true);
				
				if($lastInsertId)
				{
					$this->updatePo($lastInsertId, $request);
					
					if($request->hasFile('images')) 
					{
						$images = $request->file('images');
				
						$path = public_path('images/po/'.$lastInsertId);
						foreach($images as $fileindex => $file)
						{
							$filename = $file->getClientOriginalName();
							$extension = $file->getClientOriginalExtension();
							
							if($file->move($path,$filename))
							{
								DB::table('po_images')->insert(['po_id' => $lastInsertId, 'image' => $filename]);
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
	
	public function updatepobyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$productObj = PoManager::getInstance();
			$isStatus = $productObj->update($id, ['status' => $statusval]);
			if($isStatus)
			{
				
				
				$statustext = ($status == 1) ? 'InActive' : 'Active';
				
				return response()->json(array('status'=>'success', 'id' => $id, 'statustext' => $statustext, 'statusval' => $statusval));
			}
			
			return response()->json(array('status'=>'error', 'msg' => 'Something went wrong'));
		}
	}
	
	private function request_params($request)
	{
		$params = 
			[
				'brand_id' => $request->brand_id,
				'type_of_customer' => $request->type_of_customer,
				'title_option' => $request->title_option,
				'customer_name' => $request->customer_name,
				'family_name' => $request->family_name,
				'head_office_address' => $request->head_office_address,
				'head_office_building' => $request->head_office_building,
				'head_office_sub_district' => $request->head_office_sub_district,
				'head_office_district' => $request->head_office_district,
				'head_office_road' => $request->head_office_road,
				'head_office_country' => $request->head_office_country,
				'head_office_state' => $request->head_office_state,
				'head_office_city' => $request->head_office_city,
				'head_office_zip_code' => $request->head_office_zip_code,
				'delivery_address_checked' => $request->delivery_address_checked,
				'delivery_address' => $request->delivery_address,
				'delivery_building' => $request->delivery_building,
				'delivery_sub_district' => $request->delivery_sub_district,
				'delivery_district' => $request->delivery_district,
				'delivery_road' => $request->delivery_road,
				'delivery_country' => $request->delivery_country,
				'delivery_state' => $request->delivery_state,
				'delivery_city' => $request->delivery_city,
				'delivery_zip_code' => $request->delivery_zip_code,
				'title' => $request->title,
				'last_deposit' => $request->last_deposit,
				'document_no' => $request->document_no,
				'date' => $request->date,
				'issue_date' => $request->issue_date,
				
				'order_by_store' => $request->order_by_store,
				'order_by_channel' => $request->order_by_channel,
				'sale_person' => $request->sale_person,
				'bank_title' => $request->bank_title,
				'bank_name' => $request->bank_name,
				'bank_branch' => $request->bank_branch,
				'bank_transaction_date' => $request->bank_transaction_date,
				'bank_account_number' => $request->bank_account_number,
				'bank_beneficiary_name' => $request->bank_beneficiary_name,
				'bank_transaction_time' => $request->bank_transaction_time
			];
			
		return $params;
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
					'customer_name' => 'required',
					'family_name' => 'required'
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}

				$data = $request->except(['_token']);
				//print_r($data); die;
				$POManager = POManager::getInstance();
				$lastInsertId = $request->id;
				$data = $this->request_params($request);
				$data['updated_at'] = date('Y-m-d H:i:s');
				$status = $POManager->update($lastInsertId, $data);
				
				if($status)
				{
					
					$this->updatePo($lastInsertId, $request, true);
					
					if($request->hasFile('images')) 
					{
						$images = $request->file('images');
				
						$path = public_path('images/po/'.$lastInsertId);
						foreach($images as $fileindex => $file)
						{
							$filename = $file->getClientOriginalName();
							$extension = $file->getClientOriginalExtension();
							
							if($file->move($path,$filename))
							{
								DB::table('po_images')->insert(['po_id' => $lastInsertId, 'image' => $filename]);
							}
						}
					}
					
					return response()->json(array('status'=>'false', 'msg' => 'Successfully Save'));
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
	
	private function updatePo($lastInsertId, $request, $isupdate = false)
	{
		if($isupdate == true)
		{
			$obj = PoInvoice::create([
				'total_amount' => 0,
				'po_id' => $lastInsertId,
				'pay_this_time'=>$request->pay_this_time
			]);
		}
		
		if(isset($request->product_name))
		{
			$price = 0;
			foreach($request->product_name as $k => $productid) {
				
				if(isset($request->product_price[$k]))
				{
					$price += $request->product_price[$k];
				}
				
			}
			
			
			
			if($price > 0)
			{
				$obj = PoInvoice::create([
					'total_amount' => $price,
					'po_id' => $lastInsertId,
					'pay_this_time'=>$request->pay_this_time
				]);
				if($obj)
				{
					foreach($request->product_name as $k => $productid) {
						
						$params = [];
						$params['po_id'] = $lastInsertId;
						$params['po_invoice_id'] = $obj->id;
						$params['product_id'] = $productid;
						$params['checked'] = 0;
						if(isset($request->product_unit_price[$k]))
						{
							$params['unit_price'] = $request->product_unit_price[$k];
						}
						
						if(isset($request->product_qty[$k]))
						{
							$params['qty'] = $request->product_qty[$k];
						}
						if(isset($request->product_price[$k]))
						{
							$params['price'] = $request->product_price[$k];
						}
						if(isset($request->product_checked[$k]))
						{
							$params['checked'] = $request->product_checked[$k];
						}
						PoItems::create($params);
					}
				}
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
		 $totalRecords = Po::select('count(*) as allcount')->count();
		 $countData = Po::select('count(*) as allcount');
		 
		if($searchValue != null) {
			//$countData->where('name', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Po::select('*')
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   $records->orderBy($columnName,$columnSortOrder);
			}
			if($searchValue != null) {
				//$records->where('name', 'like', '%' .$searchValue . '%');
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
			$view = url('podetail/'.$record->id);
			$edit = url('poedit/'.$record->id);
			$action = '<div class="d-flex order-actions">
				<a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a>
				
			</div>';
			
			
			$action .= '<div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_'.$id.'" data-id="'.$id.'" data-status="'.$status.'" type="checkbox" '.$statuschecked.'>
				<label class="form-check-label" id="check_label_'.$id.'" for="">'.$statustext.'</label>
			</div>
            ';
			
			$detail = '<a href=""><a href="'.$view.'" type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></a>';
			
			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			  "customer_name" => $record->customer_name,
			  "family_name" => $record->family_name,
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
	
	public function removeimagebyid(Request $request)
	{
		$id = $request->id;
		$obj = DB::table('po_images')->where('id', $id)->delete();

		if($obj)
		{
			echo json_encode(['status' => 'success']); die;
		}
		
		echo json_encode(['status' => 'error', 'msg' => 'something wrong']); die;
	}
	
	public function updatestatusbyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$PoManager = PoManager::getInstance();
			$isStatus = $PoManager->update($id, ['status' => $statusval]);
			if($isStatus)
			{
				
				
				$statustext = ($status == 1) ? 'InActive' : 'Active';
				
				return response()->json(array('status'=>'success', 'id' => $id, 'statustext' => $statustext, 'statusval' => $statusval));
			}
			
			return response()->json(array('status'=>'error', 'msg' => 'Something went wrong'));
		}
	}
}
