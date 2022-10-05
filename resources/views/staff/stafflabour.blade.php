 <?php $addrstates = $states; ?>
<div class="row g-3">
   <div class="col-sm-10 flux">
		<h6 class="labour_contract">Labour Contract</h6>
	  </div>
	  
	  <label for="inputFirstName" class="form-label">Working pay as</label>
	  <div class="col-sm-2">
		 <div class="form-check form-check-inline">
			<input class="form-check-input working_pay_1" type="radio" name="working_pay" id="" value="1" {{ $disabledfield }}>
			<label class="form-check-label" for="inlineRadio7">Salary</label>
		 </div>
	  </div>
	  <div class="col-sm-2">
		 <div class="form-check form-check-inline">
			<input class="form-check-input working_pay_2" type="radio" name="working_pay" id="" value="2"  {{ $disabledfield }}>
			<label class="form-check-label" for="inlineRadio7">Wages</label>
		 </div>
	  </div>  
	  
	  <div style="clear:both"></div>
	  <div class="col-sm-12">
		 <label for="inputSelectCountry" class="form-label">Type of labour contract1</label>
		 <select class="form-select type_of_labour" name="" aria-label="Default select example">
			<?php foreach($typeoflabour as $typeoflabourk => $typeoflabourv) { ?>
				<option value="{{ $typeoflabourk }}">{{ $typeoflabourv }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <div class="mb-3">
			<label class="form-label">Effective Period Start date</label>
			<input type="date" class="form-control effective_period_start_date" name="effective_period_start_date" value="{{ @$obj->effective_period_start_date }}" {{ $disabledfield }}>
		 </div>
	   </div>
	   <div class="col-sm-4">
		 <div class="mb-3">
			<label class="form-label">Effective Period End date</label>
			<input type="date" class="form-control effective_period_end_date" name="effective_period_end_date" value="{{ @$obj->effective_period_end_date }}" {{ $disabledfield }}>
		 </div>
	   </div>
	   
	  <div class="col-sm-4">
		 <label for="inputFirstName" class="form-label">Position</label>
		 <select class="form-select position" value="{{ @$obj->position }}" name="position" aria-label="Default select example" {{ $disabledfield }}>
			<?php foreach($positionData as $positionDatak => $positionDatav) { ?>
				<option value="{{ $positionDatak }}">{{ $positionDatav }}</option>
			<?php } ?>
		 </select>
	  </div> 
	  
	  <div class="col-sm-4">
		 <label for="inputSelectCountry" class="form-label">Department </label>
		 <select class="form-select labour_department" value="{{ @$obj->labour_department }}" name="labour_department" {{ $disabledfield }}>
			<?php foreach($departmentData as $departmentDatak => $departmentDatav) { ?>
				<option value="{{ $departmentDatak }}">{{ $departmentDatav }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <label for="inputLastName" class="form-label">Salary Wages in contract (THB)</label>
		 <input type="text" class="form-control salary_wages_in_contract" value="{{ @$obj->salary_wages_in_contract }}" name="salary_wages_in_contract">
	  </div>
	  
	  <div class="col-sm-4">
		 <label for="inputSelectCountry" class="form-label">Increase salary be considered when </label>
		 <select class="form-select increase_salary_be_considered_when" name="increase_salary_be_considered_when" value="{{ @$obj->increase_salary_be_considered_when }}">
			<?php foreach($increaseSalaryBeConsideredWhen as $increaseSalaryBeConsideredWhenk => $increaseSalaryBeConsideredWhenv) { ?>
				<option value="{{ $increaseSalaryBeConsideredWhenk }}">{{ $increaseSalaryBeConsideredWhenv }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <label for="inputLastName" class="form-label">Salary Promised (THB)</label>
		 <input type="text" class="form-control salary_promised" name="salary_promised" value="{{ @$obj->salary_promised }}">
	  </div>
	  <div style="clear:both"></div>
	  <h5>Benefit</h5>
	  <div class="col-sm-4">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> Hotel (THB / Day)</label>
		 <input class="form-check-input hotel_thb_day_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control" name="hotel_thb_day" value="{{ @$obj->hotel_thb_day }}">
	  </div>
	  <div class="col-sm-3">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> Allowance (THB / Day)</label>
		 <input class="form-check-input allowance_thb_day_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control" name="allowance_thb_day" value="{{ @$obj->allowance_thb_day }}">
	  </div>
	  <div class="col-sm-4">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> Travel Expense (THB / Day)</label>
		 <input class="form-check-input travel_expense_thb_day_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control travel_expense_thb_day" name="travel_expense_thb_day" value="{{ @$obj->travel_expense_thb_day }}">
	  </div>
	  <div class="col-sm-4">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> O T (THB / Day)</label>
		 <input class="form-check-input ot_thb_day_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control ot_thb_day" name="ot_thb_day" value="{{ @$obj->ot_thb_day }}">
	  </div>
	  <div class="col-sm-3">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> Food (THB / Day)</label>
		 <input class="form-check-input food_thb_day_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control food_thb_day" name="food_thb_day" value="{{ @$obj->food_thb_day }}">
	  </div>
	  <h6>Leaves</h6>
	  <div class="col-sm-3">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked">Sick Leave (Day)</label>
		 <input class="form-check-input sick_leave_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control sick_leave" name="sick_leave" value="{{ @$obj->sick_leave }}">
	  </div>
	  <div class="col-sm-3">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> Vocation Leave (Day)</label>
		 <input class="form-check-input vocation_leave_chk" name="vocation_leave_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control vocation_leave" name="vocation_leave" value="{{ @$obj->vocation_leave }}">
	  </div>
	  <div class="col-sm-3">
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked"> Maternity Leave (Day)</label>
		 <input class="form-check-input maternity_leave_chk" type="checkbox" value="" id="flexCheckChecked"> 
	  </div>
		 <input type="text" class="form-control maternity_leave"  name="maternity_leave" value="{{ @$obj->maternity_leave }}">
	  </div>
	  <h6>Gaurantor</h6>
	  <div class="col-sm-2">
		 <div class="form-check form-check-inline">
			<input class="form-check-input gaurantor_type_chk_1" type="radio" name="gaurantor_type" id="" value="1" checked>
			<label class="form-check-label" for="inlineRadio7">Yes</label>
		 </div>
	  </div>
	  <div class="col-sm-2">
		 <div class="form-check form-check-inline">
			<input class="form-check-input gaurantor_type_chk_2" type="radio" name="gaurantor_type" id="" value="2" >
			<label class="form-check-label" for="inlineRadio7">No</label>
		 </div>
	  </div> 
	   <label for="formFile" class="form-label">Title</label>  <br>
   <div class="form-check form-check-inline col-sm-2">
	  <input class="form-check-input gaurantor_title_1" type="radio" name="gaurantor_title" id="" value="1">
	  <label class="form-check-label gaurantor_title" for="inlineRadio1">Mr.</label>
   </div>
   <div class="form-check form-check-inline col-sm-2">
	  <input class="form-check-input gaurantor_title_2" type="radio" name="gaurantor_title" id="" value="2">
	  <label class="form-check-label" for="inlineRadio2">Ms.</label>
   </div>
   <div class="form-check form-check-inline col-sm-2">
	  <input class="form-check-input gaurantor_title_3" type="radio" name="gaurantor_title" id="" value="3">
	  <label class="form-check-label" for="inlineRadio2">Other</label>
   </div>
   <div class="row g-3">
	  <div class="col-sm-4">
		 <label for="inputFirstName" class="form-label">Name(Thai)</label>
		 <input type="text" class="form-control gaurantor_name_thi" name="gaurantor_name_thi" value="{{ @$obj->gaurantor_name_thi }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputLastName" class="form-label">Name(English)</label>
		 <input type="text" class="form-control gaurantor_name_eng" name="gaurantor_name_eng" value="{{ @$obj->gaurantor_name_eng }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Family Name(Thai)</label>
		 <input type="text" class="form-control gaurantor_family_name_thai" name="gaurantor_family_name_thai" value="{{ @$obj->gaurantor_family_name_thai }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  Family Name(English)</label>
		 <input type="text" class="form-control gaurantor_family_name_end" name="gaurantor_family_name_end" value="{{ @$obj->gaurantor_family_name_end }}">
	  </div>
	  
	  <h6>Home address as registered document</h6> 
	  <div class="col-sm-4">
		 <label for="inputFirstName" class="form-label">Address no.</label>
		 <input type="text" class="form-control contract_home_address" id="inputFirstName" placeholder=" ">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputLastName" class="form-label">Building / Village</label>
		 <input type="text" class="form-control contract_home_building" id="inputLastName" placeholder=" ">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Sub District</label>
		 <input type="text" class="form-control contract_home_sub_distric" id="inputEmailAddress" placeholder="">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  District</label>
		 <input type="text" class="form-control contract_home_district" id="inputEmailAddress" placeholder="">
	  </div>
	  
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Road</label>
		 <input type="text" class="form-control contract_home_road" id="inputEmailAddress" placeholder="">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputSelectCountry" class="form-label">Country</label>
		 <select class="form-select contract_home_country" id="inputSelectCountry" aria-label="Default select example">
			<?php foreach($countries as $country) { ?>
				<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
			<?php } ?>
		 </select>
	  </div> 
	   <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">State</label>
		 <select class="form-select contract_home_state" id="" aria-label="Default select example">
			<?php foreach($addrstates as $addrstateObj) { ?>
				<option value="{{ $addrstateObj->id }}">{{ $addrstateObj->name }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  City</label>
		 <input type="text" class="form-control contract_home_city" id="inputEmailAddress" placeholder="">
	  </div>
	 
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
		 <input type="text" class="form-control contract_home_zip" id="inputEmailAddress" placeholder="">
	  </div>
	  
   <h6>
	  <div class="form-check">
		 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
		 <input class="form-check-input contract_home_address_check" type="checkbox" value="" id="flexCheckChecked" checked> 
	  </div>
   </h6>
  
	  <div class="col-sm-4">
		 <label for="inputFirstName" class="form-label">Address no.</label>
		 <input type="text" class="form-control contract_address" id="inputFirstName" placeholder=" ">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputLastName" class="form-label">Building / Village</label>
		 <input type="text" class="form-control contract_building" id="inputLastName" placeholder=" ">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Sub District</label>
		 <input type="text" class="form-control contract_sub_district" id="inputEmailAddress" placeholder="">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  District</label>
		 <input type="text" class="form-control contract_district" id="inputEmailAddress" placeholder="">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Road</label>
		 <input type="text" class="form-control contract_road" id="inputEmailAddress" placeholder="">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputSelectCountry" class="form-label">Country</label>
		 <select class="form-select contract_country" id="inputSelectCountry" aria-label="Default select example">
			<?php foreach($countries as $country) { ?>
				<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
			<?php } ?>
		 </select>
	  </div> 
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">State</label>
		 <select class="form-select contract_state" id="" aria-label="Default select example">
			<?php foreach($addrstates as $addrstateObj) { ?>
				<option value="{{ $addrstateObj->id }}">{{ $addrstateObj->name }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  City</label>
		 <input type="text" class="form-control contract_city" id="inputEmailAddress" placeholder="">
	  </div>
	  
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
		 <input type="text" class="form-control contract_zip_code" id="inputEmailAddress" placeholder="">
	  </div>
	   
	 
	 
	  <div class="col-sm-12">
		 <label for="inputFirstName" class="form-label">Guarantor's office name</label>
		 <input type="text" class="form-control guarantor_office_name" name="guarantor_office_name" value="{{ @$obj->guarantor_office_name }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputFirstName" class="form-label">Address no.</label>
		 <input type="text" class="form-control guarantor_address" name="guarantor_address" value="{{ @$obj->guarantor_address }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputLastName" class="form-label">Building / Village</label>
		 <input type="text" class="form-control guarantor_building" name="guarantor_building" value="{{ @$obj->guarantor_building }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Sub District</label>
		 <input type="text" class="form-control guarantor_sub_district" name="guarantor_sub_district" value="{{ @$obj->guarantor_sub_district }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  District</label>
		 <input type="text" class="form-control guarantor_district" name="guarantor_district" value="{{ @$obj->guarantor_district }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Road</label>
		 <input type="text" class="form-control guarantor_road" name="guarantor_road" value="{{ @$obj->guarantor_road }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputSelectCountry" class="form-label">Country</label>
		 <select class="form-select guarantor_country_id" name="guarantor_country_id" aria-label="Default select example">
			<?php foreach($countries as $country) { ?>
				<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">State</label>
		
		 <select class="form-select guarantor_state_id"  name="guarantor_state_id" value="{{ @$obj->guarantor_state_id }}">
		
			<?php foreach($addrstates as $addrstateObj) { ?>
				<option value="{{ $addrstateObj->id }}">{{ $addrstateObj->name }}</option>
			<?php } ?>
		 </select>
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  City</label>
		 <input type="text" class="form-control guarantor_city" name="guarantor_city" value="{{ @$obj->guarantor_city }}">
	  </div>
	  
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
		 <input type="text" class="form-control guarantor_zip" name="guarantor_zip" value="{{ @$obj->guarantor_zip }}">
	  </div>
	  
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">  Guarantor Salary(THB)</label>
		 <input type="text" class="form-control guarantor_salary" name="guarantor_salary" value="{{ @$obj->guarantor_salary }}">
	  </div>
	  <div class="col-sm-4">
		 <label for="inputEmailAddress" class="form-label">Guarantor Amount(THB)</label>
		 <input type="text" class="form-control guarantor_amount" name="guarantor_amount" value="{{ @$obj->guarantor_amount }}">
	  </div>
	  <div class="mb-3 mt-10 col-md-12 " >
		 <label for="inputProductDescription" class="form-label">Upload Contract no.1 signed and Guarantor no.1 signed</label>
		 <input id="image-uploadify3" class="upload_contact_sign_doc" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
	  </div>	 
   </div> 
</div>