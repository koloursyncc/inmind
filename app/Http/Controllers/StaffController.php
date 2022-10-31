<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Components\RegionManager;
use App\Components\StaffManager;
use App\Models\Staff;
use App\Models\StaffLabourContractImage;
class StaffController extends Controller
{
	
    public function index()
    {
		$data = $this->getStaff('save', null);

        return view('staffadd', $data);
    }

    public function list()
    {
        return view('stafflist');
    }
    
    private function getStaff($type, $obj)
	{
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		$objaddress = null;
		$staffPhotos = $staffDocumentss = $staffLabourContracts = [];
		$default_country_id = 237;
		$states = [];
		if($type != 'save')
		{
			$default_country_id = null;
			$StaffManager = StaffManager::getInstance();
			//$objaddress = $StaffManager->getStaffContactAddressByStaffId($obj->id);
			$staffPhotos = $StaffManager->getStaffDocByStaffIdTypeId($obj->id, 1);
			$staffDocumentss = $StaffManager->getStaffDocByStaffIdTypeId($obj->id, 2);
			$staffLabourContracts = $StaffManager->getStaffContactAddressByStaffId($obj->id);
			$states = $regionManager->getStateByCountryId($default_country_id);
			
		} else {
			$states = $regionManager->getStateByCountryId($default_country_id);
		}
		//dd($staffPhotos);
		return ['obj' => $obj, 'countries' => $countries, 'type' => $type, 'objaddress' => $objaddress, 'staffPhotos' => $staffPhotos, 'staffDocumentss' => $staffDocumentss, 'staffLabourContracts' => $staffLabourContracts, 'default_country_id' => $default_country_id,
		'states' => $states];
	}
	
	public function edit($id)
	{
		$customerObj = StaffManager::getInstance();
		$obj = $customerObj->getStaffById($id);
		$type = 'edit';
		if($obj == null)
		{
			$type = 'save';
		}
		//dd($obj); die;
		$data = $this->getStaff($type, $obj);
		
		return view('staffadd', $data);
	}
	
	public function view($id) 
	{
		
		$customerObj = StaffManager::getInstance();
		$obj = $customerObj->getStaffById($id);
		$type = 'view';
		if($obj == null)
		{
			$type = 'save';
		}
		
		$data = $this->getStaff($type, $obj);
		
		return view('staffadd', $data);
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
					'title' => 'required',
					'name_thai' => 'required',
					'name_eng' => 'required',
					'famly_name_thai' => 'required',
					'famly_name_eng' => 'required'
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				$staffManager = StaffManager::getInstance();
				
				$params = $this->request_param($request);
				$params['staff_rand_id'] = rand(0, 9000);
				$lastInsertId = $staffManager->save($params, true);
				
				if($lastInsertId)
				{
					
					$this->updateStaffData($lastInsertId, $request);
					
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
					'title' => 'required',
					'name_thai' => 'required',
					'name_eng' => 'required',
					'famly_name_thai' => 'required',
					'famly_name_eng' => 'required'
				);

				$validator = Validator::make($data, $rules);

				if ($validator->fails())
				{
					return response()->json(['status' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
				}
				$staffManager = StaffManager::getInstance();
				
				$params = $this->request_param($request);
				
				//echo '<pre>'; print_r($params); die;
				
				$lastInsertId = $request->staff_id;
				
				$status = $staffManager->update($lastInsertId, $params);
				
				if($status)
				{
					
					$this->updateStaffData($lastInsertId, $request);
					
					return response()->json(array('status'=>'false', 'msg' => 'Successfully Update'));
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
	
	private function updateStaffData($lastInsertId, $request)
	{
		
		$staffManager = StaffManager::getInstance();
		
		if($request->hasFile('upload_staff_photo')) 
		{
			
			$images = $request->file('upload_staff_photo');
			
			$path = public_path('images/staff/'.$lastInsertId);
			foreach($images as $fileindex => $file)
			{
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				
				if($file->move($path,$filename))
				{
					$staffManager->saveStaffFile(
						[
							'staff_id' => $lastInsertId,
							'document' => $filename,
							'type' => 1,
						]
					);
				}
			}
		}
		
		if($request->hasFile('upload_social_fund_id_card')) 
		{
			$images = $request->file('upload_social_fund_id_card');
			
			$path = public_path('images/staff/'.$lastInsertId);
			foreach($images as $fileindex => $file)
			{
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				
				if($file->move($path,$filename))
				{
					$staffManager->saveStaffFile(
						[
							'staff_id' => $lastInsertId,
							'document' => $filename,
							'type' => 2,
						]
					);
				}
			}
		}
		
		$this->handleLabourContact($lastInsertId, $request);
		//$this->handleAddress($lastInsertId, $request);
		
	}
	
	private function handleLabourContact($lastInsertId, $request)
	{
		
		if(isset($request->working_pay)) {
			foreach($request->working_pay as $key => $working_pay)
			{
				
				$params = array();
				$params['staff_id'] = $lastInsertId;
				$params['working_pay'] = $working_pay;
				
				if(isset($request->type_of_labour[$key]))
				{
					$params['type_of_labour'] = $request->type_of_labour[$key];
				}
				if(isset($request->effective_period_start_date[$key]))
				{
					$params['effective_period_start_date'] = $request->effective_period_start_date[$key];
				}
				if(isset($request->effective_period_end_date[$key]))
				{
					$params['effective_period_end_date'] = $request->effective_period_end_date[$key];
				}
				if(isset($request->position[$key]))
				{
					$params['position'] = $request->position[$key];
				}
				if(isset($request->labour_department[$key]))
				{
					$params['labour_department'] = $request->labour_department[$key];
				}
				if(isset($request->salary_wages_in_contract[$key]))
				{
					$params['salary_wages_in_contract'] = $request->salary_wages_in_contract[$key];
				}
				if(isset($request->increase_salary_be_considered_when[$key]))
				{
					$params['increase_salary_be_considered_when'] = $request->increase_salary_be_considered_when[$key];
				}
				if(isset($request->salary_promised[$key]))
				{
					$params['salary_promised'] = $request->salary_promised[$key];
				}
				if(isset($request->hotel_thb_day_chk[$key]))
				{
					$params['hotel_thb_day_chk'] = $request->hotel_thb_day_chk[$key];
				}
				
				
				if(isset($request->hotel_thb_day[$key]))
				{
					$params['hotel_thb_day'] = $request->hotel_thb_day[$key];
				}
				if(isset($request->allowance_thb_day_chk[$key]))
				{
					$params['allowance_thb_day_chk'] = $request->allowance_thb_day_chk[$key];
				}
				if(isset($request->allowance_thb_day[$key]))
				{
					$params['allowance_thb_day'] = $request->allowance_thb_day[$key];
				}
				if(isset($request->travel_expense_thb_day_chk[$key]))
				{
					$params['travel_expense_thb_day_chk'] = $request->travel_expense_thb_day_chk[$key];
				}
				if(isset($request->travel_expense_thb_day[$key]))
				{
					$params['travel_expense_thb_day'] = $request->travel_expense_thb_day[$key];
				}
				if(isset($request->ot_thb_chk[$key]))
				{
					$params['ot_thb_chk'] = $request->ot_thb_chk[$key];
				}
				if(isset($request->ot_thb_day[$key]))
				{
					$params['ot_thb_day'] = $request->ot_thb_day[$key];
				}
				if(isset($request->food_thb_day_chk[$key]))
				{
					$params['food_thb_day_chk'] = $request->food_thb_day_chk[$key];
				}
				if(isset($request->food_thb_day[$key]))
				{
					$params['food_thb_day'] = $request->food_thb_day[$key];
				}
				
				if(isset($request->sick_leave_chk[$key]))
				{
					$params['sick_leave_chk'] = $request->sick_leave_chk[$key];
				}
				if(isset($request->sick_leave[$key]))
				{
					$params['sick_leave'] = $request->sick_leave[$key];
				}
				if(isset($request->vocation_leave_chk[$key]))
				{
					$params['vocation_leave_chk'] = $request->vocation_leave_chk[$key];
				}
				if(isset($request->vocation_leave[$key]))
				{
					$params['vocation_leave'] = $request->vocation_leave[$key];
				}
				if(isset($request->maternity_leave_chk[$key]))
				{
					$params['maternity_leave_chk'] = $request->maternity_leave_chk[$key];
				}
				if(isset($request->maternity_leave[$key]))
				{
					$params['maternity_leave'] = $request->maternity_leave[$key];
				}
				if(isset($request->gaurantor_type[$key]))
				{
					$params['gaurantor_type'] = $request->gaurantor_type[$key];
				}
				if(isset($request->gaurantor_title[$key]))
				{
					$params['gaurantor_title'] = $request->gaurantor_title[$key];
				}
				if(isset($request->gaurantor_name_thi[$key]))
				{
					$params['gaurantor_name_thi'] = $request->gaurantor_name_thi[$key];
				}
				
				
				if(isset($request->gaurantor_name_eng[$key]))
				{
					$params['gaurantor_name_eng'] = $request->gaurantor_name_eng[$key];
				}
				if(isset($request->gaurantor_family_name_thai[$key]))
				{
					$params['gaurantor_family_name_thai'] = $request->gaurantor_family_name_thai[$key];
				}
				if(isset($request->gaurantor_family_name_end[$key]))
				{
					$params['gaurantor_family_name_end'] = $request->gaurantor_family_name_end[$key];
				}
				if(isset($request->guarantor_office_name[$key]))
				{
					$params['guarantor_office_name'] = $request->guarantor_office_name[$key];
				}
				if(isset($request->guarantor_address[$key]))
				{
					$params['guarantor_address'] = $request->guarantor_address[$key];
				}
				if(isset($request->guarantor_building[$key]))
				{
					$params['guarantor_building'] = $request->guarantor_building[$key];
				}
				if(isset($request->guarantor_sub_district[$key]))
				{
					$params['guarantor_sub_district'] = $request->guarantor_sub_district[$key];
				}
				if(isset($request->guarantor_district[$key]))
				{
					$params['guarantor_district'] = $request->guarantor_district[$key];
				}
				if(isset($request->guarantor_road[$key]))
				{
					$params['guarantor_road'] = $request->guarantor_road[$key];
				}
				///////
				if(isset($request->guarantor_city[$key]))
				{
					$params['guarantor_city'] = $request->guarantor_city[$key];
				}
				if(isset($request->guarantor_zip[$key]))
				{
					$params['guarantor_zip'] = $request->guarantor_zip[$key];
				}
				if(isset($request->guarantor_salary[$key]))
				{
					$params['guarantor_salary'] = $request->guarantor_salary[$key];
				}
				if(isset($request->guarantor_amount[$key]))
				{
					$params['guarantor_amount'] = $request->guarantor_amount[$key];
				}
				if(isset($request->guarantor_state_id[$key]))
				{
					$params['guarantor_state_id'] = $request->guarantor_state_id[$key];
				}
				if(isset($request->guarantor_country_id[$key]))
				{
					$params['guarantor_country_id'] = $request->guarantor_country_id[$key];
				}
				if(isset($request->guarantor_document[$key]))
				{
					$params['guarantor_document'] = $request->guarantor_document[$key];
				}
				
				/////////////
				if(isset($request->contract_home_address[$key]))
				{
					$params['contract_home_address'] = $request->contract_home_address[$key];
				}
				if(isset($request->contract_home_building[$key]))
				{
					$params['contract_home_building'] = $request->contract_home_building[$key];
				}
				if(isset($request->contract_home_sub_distric[$key]))
				{
					$params['contract_home_sub_distric'] = $request->contract_home_sub_distric[$key];
				}
				if(isset($request->contract_home_district[$key]))
				{
					$params['contract_home_district'] = $request->contract_home_district[$key];
				}
				if(isset($request->contract_home_road[$key]))
				{
					$params['contract_home_road'] = $request->contract_home_road[$key];
				}
				if(isset($request->contract_home_city[$key]))
				{
					$params['contract_home_city'] = $request->contract_home_city[$key];
				}
				if(isset($request->contract_home_state[$key]))
				{
					$params['contract_home_state'] = $request->contract_home_state[$key];
				}
				if(isset($request->contract_home_zip[$key]))
				{
					$params['contract_home_zip'] = $request->contract_home_zip[$key];
				}
				if(isset($request->contract_home_country[$key]))
				{
					$params['contract_home_country'] = $request->contract_home_country[$key];
				}
				
				
				if(isset($request->contract_home_address_check[$key]))
				{
					$params['contract_home_address_check'] = $request->contract_home_address_check[$key];
				}
				if(isset($request->contract_address[$key]))
				{
					$params['contract_address'] = $request->contract_address[$key];
				}
				if(isset($request->contract_building[$key]))
				{
					$params['contract_building'] = $request->contract_building[$key];
				}
				if(isset($request->contract_sub_district[$key]))
				{
					$params['contract_sub_district'] = $request->contract_sub_district[$key];
				}
				if(isset($request->contract_district[$key]))
				{
					$params['contract_district'] = $request->contract_district[$key];
				}
				if(isset($request->contract_road[$key]))
				{
					$params['contract_road'] = $request->contract_road[$key];
				}
				if(isset($request->contract_city[$key]))
				{
					$params['contract_city'] = $request->contract_city[$key];
				}
				if(isset($request->contract_state[$key]))
				{
					$params['contract_state'] = $request->contract_state[$key];
				}
				if(isset($request->contract_zip_code[$key]))
				{
					$params['contract_zip_code'] = $request->contract_zip_code[$key];
				}
				
				if(isset($request->contract_country[$key]))
				{
					$params['contract_country'] = $request->contract_country[$key];
				}
				/////////////////
				
				//echo '<pre>'; print_r($params); die;
				$staffManager = StaffManager::getInstance();
				
				if($key > 0)
				{
					//echo 'Update '.$key;
					$staffManager->updateStaffContactAddressById($key, $params);
					$this->uploadStaffLabourImage($key, $request, $key, false);
					
				} else {
					$lastid = $staffManager->saveStaffContactAddress($params, true);
					if($lastid > 0)
					{
						//echo ' Insert '.$key;
						$this->uploadStaffLabourImage($lastid, $request, $key, true);
					}
				}
			}
		}
	}
	
	private function uploadStaffLabourImage($id, $request, $key, $flag)
	{
		//if($request->hasFile('upload_contact_sign_doc'))  {
			$staffManager = StaffManager::getInstance();
			$images = $request->file('upload_contact_sign_doc');
			$index = $id;
			if($flag == true)
			{
				$index = $key;
			}
			//echo $index.' ';
			if(isset($images[$index]))
			{
				//print_r($images[$id]);
				foreach($images[$index] as $k => $fileobj) {
					//print_r($file); die;
					//foreach($file as $k => $fileobj) {
						
						$path = public_path('images/stafflabour/'.$id);
						
						$filename = $fileobj->getClientOriginalName();
						$extension = $fileobj->getClientOriginalExtension();
						if($fileobj->move($path,$filename))
						{
							$staffManager->saveStaffLabourImage(
								[
									'staff_labour_contract_id' => $id,
									'image' => $filename
								]
							);
						}
					//}
				}
			}
		//}
	}
	
	private function handleAddress($lastInsertId, $request)
	{
		if(isset($request->home_address)) {
			$params = array();
			$params['staff_id'] = $lastInsertId;
			$params['home_address'] = $request->home_address;
			if(isset($request->home_address))
			{
				$params['home_address'] = $request->home_address;
			}
			if(isset($request->home_building))
			{
				$params['home_building'] = $request->home_building;
			}
			if(isset($request->home_sub_district))
			{
				$params['home_sub_district'] = $request->home_sub_district;
			}
			if(isset($request->home_district))
			{
				$params['home_district'] = $request->home_district;
			}
			if(isset($request->home_country_id))
			{
				$params['home_country_id'] = $request->home_country_id;
			}
			if(isset($request->home_document))
			{
				$params['home_document'] = $request->home_document;
			}
			
			/* if(isset($request->contact_road))
			{
				$params['contact_road'] = $request->contact_road;
			} */
			if(isset($request->home_city))
			{
				$params['home_city'] = $request->home_city;
			}
			if(isset($request->home_state_id))
			{
				$params['home_state_id'] = $request->home_state_id;
			}
			
			if(isset($request->home_road))
			{
				$params['home_road'] = $request->home_road;
			}
			
			if(isset($request->home_zip))
			{
				$params['home_zip'] = $request->home_zip;
			}
			
			if(isset($request->conact_address_check))
			{
				$params['conact_address_check'] = $request->conact_address_check;
			}
			
			if(isset($request->contact_country))
			{
				$params['contact_country'] = $request->contact_country;
			}
			
			if(isset($request->conact_address_check))
			{
				$params['conact_address_check'] = $request->conact_address_check;
			}
			
			if(isset($request->conact_address))
			{
				$params['conact_address'] = $request->conact_address;
			}
			
			if(isset($request->conact_building))
			{
				$params['conact_building'] = $request->conact_building;
			}
			
			if(isset($request->conact_sub_district))
			{
				$params['conact_sub_district'] = $request->conact_sub_district;
			}
			
			if(isset($request->conact_district))
			{
				$params['conact_district'] = $request->conact_district;
			}
			
			if(isset($request->conact_road))
			{
				$params['conact_road'] = $request->conact_road;
			}
			
			if(isset($request->conact_city))
			{
				$params['conact_city'] = $request->conact_city;
			}
			
			if(isset($request->conact_state_id))
			{
				$params['conact_state_id'] = $request->conact_state_id;
			}
			
			if(isset($request->conact_zip))
			{
				$params['conact_zip'] = $request->conact_zip;
			}
			
			if(isset($request->conact_country_id))
			{
				$params['conact_country_id'] = $request->conact_country_id;
			}
			
			
			/* if(isset($request->image_upload_doc[$k]))
			{
				//$params['image_upload_doc'] = $request->image_upload_doc[$k];
			} */
			
			$StaffManager = StaffManager::getInstance();
			$StaffManager->handleStaffAddress($lastInsertId, $params);
			
		}
	}
	
	private function request_param($request)
	{
		$params = 
			[
				'active_staff' => $request->active_staff,
				'title' => $request->title,
				'name_thai' => $request->name_thai,
				'name_eng' => $request->name_eng,
				'famly_name_thai' => $request->famly_name_thai,
				'famly_name_eng' => $request->famly_name_eng,
				'nick' => $request->nick,
				'current_job' => $request->current_job,
				'mobile_no' => $request->mobile_no,
				'current_salary' => $request->current_salary,
				'dob' => $request->dob,
				'card_type' => $request->card_type,
				'card_no' => $request->card_no,
				'issue_date' => $request->issue_date,
				'title_other_text' => $request->title_other_text,
				'phone_code' => $request->phone_code,
				'issue_by' => $request->issue_by,
				'passport_no' => $request->passport_no,
				//'exp_date' => $request->exp_date,
				//'country_id' => $request->country_id,
				'higest_education' => $request->higest_education,
				'school_univercity_name' => $request->school_univercity_name,
				'education_year' => $request->education_year,
				'school_faculty' => $request->school_faculty,
				'department' => $request->department,
				'social_fund' => $request->social_fund,
				'social_fund_included_in_salary' => $request->social_fund_included_in_salary,
				'social_fund_id' => $request->social_fund_id,
				'hospital_in_charges' => $request->hospital_in_charges,
				'pay_social_fund_by' => $request->pay_social_fund_by,
				'will_apply_in' => $request->will_apply_in,
				
				
				'home_address' => $request->home_address,
				'home_building' => $request->home_building,
				'home_sub_district' => $request->home_sub_district,
				'home_district' => $request->home_district,
				'home_road' => $request->home_road,
				'home_city' => $request->home_city,
				'home_state_id' => $request->home_state_id,
				'home_zip' => $request->home_zip,
				'home_country_id' => $request->home_country_id,
				'home_document' => $request->home_document,
				//
				'conact_address_check' => $request->conact_address_check,
				'conact_address' => $request->conact_address,
				'conact_building' => $request->conact_building,
				'conact_sub_district' => $request->conact_sub_district,
				'conact_district' => $request->conact_district,
				'conact_road' => $request->conact_road,
				'conact_city' => $request->conact_city,
				'conact_state_id' => $request->conact_state_id,
				'conact_zip' => $request->conact_zip,
				'conact_country_id' => $request->conact_country_id,
				'conact_document' => $request->conact_document
				
			];
			
			if($request->card_type == 1)
			{
				$params['expired_date'] = $request->exp_date_pass;
				$params['country_id'] = $request->country_id_pass;
			} 
			else if($request->card_type == 2)
			{
				$params['expired_date'] = $request->exp_date;
				$params['country_id'] = $request->country_id;
			}
			
		return $params;
	}
	
	public function updatestatusbyid(Request $request)
	{
		
		if($request->isMethod('post'))
		{
			
			$id = $request->id;
			$status = $request->status;
			$statusval = ($status == 1) ? 2 : 1;
			
			$staffObj = StaffManager::getInstance();
			$isStatus = $staffObj->update($id, ['status' => $statusval]);
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
		 $totalRecords = Staff::select('count(*) as allcount')->count();
		 $countData = Staff::select('count(*) as allcount');
		 
		if($searchValue != null) {
			$countData->where('name', 'like', '%' .$searchValue . '%');
			//$countData->where('supplier', 'like', '%' .$searchValue . '%');
		}
		$totalRecordswithFilter = $countData->count();
		 // Fetch records
		 $records = Staff::select('*') //orderBy($columnName,$columnSortOrder)
		 //  
		   ->skip($start)
		   ->take($rowperpage);
			if($columnName == 'id') {
			   $records->orderBy($columnName,$columnSortOrder);
			} else {
				$records->orderBy('id', 'Desc');
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

			$view = url('staffview/'.$record->id);
			$edit = url('staffedit/'.$record->id);
			$action = '<div class="d-flex order-actions">
				<a href="'.$edit.'" class=""><i class="bx bxs-edit"></i></a>
				
			</div>';
			$detail = '<a href=""><a href="'.$view.'" type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></a>';
			
			$action .= '<div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_'.$id.'" data-id="'.$id.'" data-status="'.$status.'" type="checkbox" '.$statuschecked.'>
				<label class="form-check-label" id="check_label_'.$id.'" for="">'.$statustext.'</label>
			</div>';

			$id = $record->id;
			
			$data_arr[] = array(
			  "id" => $id,
			  "name_thai" => $record->name_thai,
			  "famly_name_thai" => $record->famly_name_thai,
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
		$staffManagerObj = StaffManager::getInstance();
		$status = $staffManagerObj->deleteImageById($id);
		
		if($status)
		{
			echo json_encode(['status' => 'success']); die;
		}
		
		echo json_encode(['status' => 'error', 'msg' => 'something wrong']); die;
	}
	
	public function removelabourimagebyid(Request $request)
	{
		$id = $request->id;
		$obj = StaffLabourContractImage::find($id);
		
		if($obj->delete())
		{
			echo json_encode(['status' => 'success']); die;
		}
		
		echo json_encode(['status' => 'error', 'msg' => 'something wrong']); die;
	}
}
