<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Components\RegionManager;
use App\Components\StaffManager;
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
		$addressdocuments = [];
		if($type != 'save')
		{
			$StaffManager = StaffManager::getInstance();
			$addressdocuments = $StaffManager->getAddressDocumentByStaffId($obj->id);
			
		}
		
		return ['obj' => $obj, 'countries' => $countries, 'type' => $type, 'addressdocuments' => $addressdocuments];
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
					
					return response()->json(array('status'=>'success', 'msg' => 'Successfully Update'));
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
		
		$this->handleAddress($lastInsertId, $request);
		
	}
	
	private function handleAddress($lastInsertId, $request)
	{
		foreach($request->contact_address as $k => $contact_address) {
			$params = array();
			$params['staff_id'] = $lastInsertId;
			$params['address'] = $contact_address;
			if(isset($request->contact_address_building[$k]))
			{
				$params['building'] = $request->contact_address_building[$k];
			}
			if(isset($request->contact_sub_district[$k]))
			{
				$params['sub_district'] = $request->contact_sub_district[$k];
			}
			if(isset($request->contact_district[$k]))
			{
				$params['district'] = $request->contact_district[$k];
			}
			if(isset($request->contact_road[$k]))
			{
				$params['road'] = $request->contact_road[$k];
			}
			if(isset($request->contact_city[$k]))
			{
				$params['city'] = $request->contact_city[$k];
			}
			if(isset($request->contact_state[$k]))
			{
				$params['state_id'] = $request->contact_state[$k];
			}
			if(isset($request->contact_zip_code[$k]))
			{
				$params['zip'] = $request->contact_zip_code[$k];
			}
			
			if(isset($request->contact_country[$k]))
			{
				$params['country_id'] = $request->contact_country[$k];
			}
			
			if(isset($request->image_upload_doc[$k]))
			{
				//$params['image_upload_doc'] = $request->image_upload_doc[$k];
			}
			
			if($k > 0)
			{
				$StaffManager = StaffManager::getInstance();
				$StaffManager->updateStaffContactAddress($k, $params);
				
				
			} else {
				$StaffManager = StaffManager::getInstance();
				$StaffManager->saveStaffContactAddress($params);
			}
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
				'issue_by' => $request->issue_by,
				'passport_no' => $request->passport_no,
				'exp_date' => $request->exp_date,
				'country_id' => $request->country_id,
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
				'working_pay' => $request->working_pay,
				'type_of_labour' => $request->type_of_labour,
				'effective_period_start_date' => $request->effective_period_start_date,
				'effective_period_end_date' => $request->effective_period_end_date,
				'position' => $request->position,
				'labour_department' => $request->labour_department,
				'salary_wages_in_contract' => $request->salary_wages_in_contract,
				'increase_salary_be_considered_when' => $request->increase_salary_be_considered_when,
				'salary_promised' => $request->salary_promised,
				'hotel_thb_day_chk' => $request->hotel_thb_day_chk,
				'hotel_thb_day' => $request->hotel_thb_day,
				'allowance_thb_day_chk' => $request->allowance_thb_day_chk,
				'allowance_thb_day' => $request->allowance_thb_day,
				'travel_expense_thb_day_chk' => $request->travel_expense_thb_day_chk,
				'travel_expense_thb_day' => $request->travel_expense_thb_day,
				'ot_thb_chk' => $request->ot_thb_chk,
				'ot_thb_day' => $request->ot_thb_day,
				'food_thb_day_chk' => $request->food_thb_day_chk,
				'food_thb_day' => $request->food_thb_day,
				'sick_leave_chk' => $request->sick_leave_chk,
				'sick_leave' => $request->sick_leave,
				'vocation_leave_chk' => $request->vocation_leave_chk,
				'vocation_leave' => $request->vocation_leave,
				'maternity_leave_chk' => $request->maternity_leave_chk,
				'maternity_leave' => $request->maternity_leave,
				'gaurantor_type' => $request->gaurantor_type,
				'gaurantor_title' => $request->gaurantor_title,
				'gaurantor_name_thi' => $request->gaurantor_name_thi,
				'gaurantor_name_eng' => $request->gaurantor_name_eng,
				'gaurantor_family_name_thai' => $request->gaurantor_family_name_thai,
				'gaurantor_family_name_end' => $request->gaurantor_family_name_end,
				'guarantor_office_name' => $request->guarantor_office_name,
				'guarantor_address' => $request->guarantor_address,
				'guarantor_building' => $request->guarantor_building,
				'guarantor_sub_district' => $request->guarantor_sub_district,
				'guarantor_district' => $request->guarantor_district,
				'guarantor_road' => $request->guarantor_road,
				'guarantor_city' => $request->guarantor_city,
				'guarantor_zip' => $request->guarantor_zip,
				'guarantor_salary' => $request->guarantor_salary,
				'guarantor_amount' => $request->guarantor_amount,
				'guarantor_state_id' => $request->guarantor_state_id,
				'guarantor_country_id' => $request->guarantor_country_id,
				'guarantor_document' => $request->guarantor_document
			];
			
		return $params;
	}
}
