 <?php
	$updatedisablecheck = '';
	if($type != 'save')
	{
		$updatedisablecheck = 'disabled';
	}
	
 ?>
<?php foreach($staffLabourContracts as $staffLabourContractIndex => $staffLabourContractObj) {
	$sno = ++$staffLabourContractIndex;
	?>
	<div class="row g-3 updatelabour ">
	   <div class="col-sm-10 flux">
			<h6 class="labour_contract">Labour Contract</h6>
		  </div>
		  
		  <label for="inputFirstName" class="form-label">Working pay as</label>
		  <div class="col-sm-2">
			 <div class="form-check form-check-inline">
				<input class="form-check-input working_pay_1" type="radio" name="working_pay[{{ $sno }}]" <?php if($staffLabourContractObj->working_pay == 1) { echo 'checked'; } ?> value="1" {{ $disabledfield }}>
				<label class="form-check-label" for="inlineRadio7">Salary</label>
			 </div>
		  </div>
		  <div class="col-sm-2">
			 <div class="form-check form-check-inline">
				<input class="form-check-input working_pay_2" <?php if($staffLabourContractObj->working_pay == 2) { echo 'checked'; } ?> type="radio" name="working_pay[{{ $sno }}]" id="" value="2"  {{ $disabledfield }}>
				<label class="form-check-label" for="inlineRadio7">Wages</label>
			 </div>
		  </div>  
		  
		  <div style="clear:both"></div>
		  <div class="col-sm-12">
			 <label for="inputSelectCountry" class="form-label">Type of labour contract1</label>
			 <select class="form-select type_of_labour" name="type_of_labour[{{ $sno }}]" aria-label="Default select example">
				<?php foreach($typeoflabour as $typeoflabourk => $typeoflabourv) { ?>
					<option value="{{ $typeoflabourk }}" <?php if($staffLabourContractObj->type_of_labour == $typeoflabourk) { echo 'selected'; } ?>>{{ $typeoflabourv }}</option>
				<?php } ?>
			 </select>
		  </div>
		  <div class="col-sm-4">
			 <div class="mb-3">
				<label class="form-label">Effective Period Start date</label>
				<input type="date" class="form-control effective_period_start_date" name="effective_period_start_date[{{ $sno }}]" value="{{ @$staffLabourContractObj->effective_period_start_date }}" {{ $disabledfield }}>
			 </div>
		   </div>
		   <div class="col-sm-4">
			 <div class="mb-3">
				<label class="form-label">Effective Period End date</label>
				<input type="date" class="form-control effective_period_end_date" name="effective_period_end_date[{{ $sno }}]" value="{{ @$staffLabourContractObj->effective_period_end_date }}" {{ $disabledfield }}>
			 </div>
		   </div>
		   
		  <div class="col-sm-4">
			 <label for="inputFirstName" class="form-label">Position</label>
			 <select class="form-select position" value="{{ @$staffLabourContractObj->position }}" name="position[{{ $sno }}]" aria-label="Default select example" {{ $disabledfield }}>
				<?php foreach($positionData as $positionDatak => $positionDatav) { ?>
					<option  <?php if($staffLabourContractObj->position == $positionDatak) { echo 'selected'; } ?> value="{{ $positionDatak }}">{{ $positionDatav }}</option>
				<?php } ?>
			 </select>
		  </div> 
		  
		  <div class="col-sm-4">
			 <label for="inputSelectCountry" class="form-label">Department </label>
			 <select class="form-select labour_department"  value="{{ @$staffLabourContractObj->labour_department }}" name="labour_department[{{ $sno }}]" {{ $disabledfield }}>
				<?php foreach($departmentData as $departmentDatak => $departmentDatav) { ?>
					<option  <?php if($staffLabourContractObj->labour_department == $departmentDatak) { echo 'selected'; } ?> value="{{ $departmentDatak }}" >{{ $departmentDatav }}</option>
				<?php } ?>
			 </select>
		  </div>
		  <div class="col-sm-4">
			 <label for="inputLastName" class="form-label">Salary Wages in contract (THB)</label>
			 <input type="text" name="salary_wages_in_contract[{{ $sno }}]" class="form-control salary_wages_in_contract" value="{{ @$staffLabourContractObj->salary_wages_in_contract }}" name="salary_wages_in_contract">
		  </div>
		  
		  <div class="col-sm-4">
			 <label for="inputSelectCountry" class="form-label">Increase salary be considered when </label>
			 <select class="form-select increase_salary_be_considered_when" name="increase_salary_be_considered_when[{{ $sno }}]" value="{{ @$staffLabourContractObj->increase_salary_be_considered_when }}">
				<?php foreach($increaseSalaryBeConsideredWhen as $increaseSalaryBeConsideredWhenk => $increaseSalaryBeConsideredWhenv) { ?>
					<option <?php if($staffLabourContractObj->increase_salary_be_considered_when == $increaseSalaryBeConsideredWhenk) { echo 'selected'; } ?> value="{{ $increaseSalaryBeConsideredWhenk }}">{{ $increaseSalaryBeConsideredWhenv }}</option>
				<?php } ?>
			 </select>
		  </div>
		  <div class="col-sm-4">
			 <label for="inputLastName" class="form-label">Salary Promised (THB)</label>
			 <input type="text" class="form-control salary_promised" name="salary_promised[{{ $sno }}]" value="{{ @$staffLabourContractObj->salary_promised }}">
		  </div>
		  <div style="clear:both"></div>
		  <h5>Benefit</h5>
		  <div class="col-sm-4">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> Hotel (THB / Day)</label>
			 <input class="form-check-input hotel_thb_day_chk" type="checkbox" value="{{ @$staffLabourContractObj->hotel_thb_day_chk }}" name="hotel_thb_day_chk[{{ $sno }}]"  value="1"> 
		  </div>
			 <input type="text" class="form-control hotel_thb_day" {{ $updatedisablecheck }} name="hotel_thb_day[{{ $sno }}]" value="{{ @$staffLabourContractObj->hotel_thb_day }}">
		  </div>
		  <div class="col-sm-3">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> Allowance (THB / Day)</label>
			 <input class="form-check-input allowance_thb_day_chk" type="checkbox"  value="1" name="allowance_thb_day_chk[{{ $sno }}]" > 
		  </div>
			 <input type="text" class="form-control allowance_thb_day" {{ $updatedisablecheck }} name="allowance_thb_day[{{ $sno }}]" value="{{ @$staffLabourContractObj->allowance_thb_day }}">
		  </div>
		  <div class="col-sm-4">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> Travel Expense (THB / Day)</label>
			 <input class="form-check-input travel_expense_thb_day_chk" type="checkbox"  value="1" name="travel_expense_thb_day_chk[{{ $sno }}]" > 
		  </div>
			 <input type="text" class="form-control travel_expense_thb_day" {{ $updatedisablecheck }} name="travel_expense_thb_day[{{ $sno }}]" value="{{ @$staffLabourContractObj->travel_expense_thb_day }}">
		  </div>
		  <div class="col-sm-4">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> O T (THB / Day)</label>
			 <input class="form-check-input ot_thb_day_chk" type="checkbox"  value="1" name="ot_thb_day_chk[{{ $sno }}]" > 
		  </div>
			 <input type="text" class="form-control ot_thb_day" {{ $updatedisablecheck }} name="ot_thb_day[{{ $sno }}]" value="{{ @$staffLabourContractObj->ot_thb_day }}">
		  </div>
		  <div class="col-sm-3">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> Food (THB / Day)</label>
			 <input class="form-check-input food_thb_day_chk" type="checkbox"  value="1" name="food_thb_day_chk[{{ $sno }}]" > 
		  </div>
			 <input type="text" class="form-control food_thb_day" {{ $updatedisablecheck }} name="food_thb_day[{{ $sno }}]" value="{{ @$staffLabourContractObj->food_thb_day }}">
		  </div>
		  <h6>Leaves</h6>
		  <div class="col-sm-3">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked">Sick Leave (Day)</label>
			 <input class="form-check-input sick_leave_chk" type="checkbox" value="1" name="sick_leave_chk[{{ $sno }}]" > 
		  </div>
			 <input type="text" class="form-control sick_leave" {{ $updatedisablecheck }} name="sick_leave[{{ $sno }}]" value="{{ @$staffLabourContractObj->sick_leave }}">
		  </div>
		  <div class="col-sm-3">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> Vocation Leave (Day)</label>
			 <input class="form-check-input vocation_leave_chk" name="vocation_leave_chk[{{ $sno }}]" type="checkbox" value="" id="flexCheckChecked" > 
		  </div>
			 <input type="text" class="form-control vocation_leave" {{ $updatedisablecheck }} name="vocation_leave[{{ $sno }}]" value="{{ @$staffLabourContractObj->vocation_leave }}">
		  </div>
		  <div class="col-sm-3">
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked"> Maternity Leave (Day)</label>
			 <input class="form-check-input maternity_leave_chk" type="checkbox"  value="1" name="maternity_leave_chk[{{ $sno }}]" > 
		  </div>
			 <input type="text" class="form-control maternity_leave"  {{ $updatedisablecheck }} name="maternity_leave[{{ $sno }}]" value="{{ @$staffLabourContractObj->maternity_leave }}">
		  </div>
		  <h6>Gaurantor</h6>
		  <div class="col-sm-2">
			 <div class="form-check form-check-inline">
				<input class="form-check-input gaurantor_type_chk_1" type="radio" name="gaurantor_type[{{ $sno }}]" id="" value="1" checked>
				<label class="form-check-label" for="inlineRadio7">Yes</label>
			 </div>
		  </div>
		  <div class="col-sm-2">
			 <div class="form-check form-check-inline">
				<input class="form-check-input gaurantor_type_chk_2" type="radio" name="gaurantor_type[{{ $sno }}]" id="" value="2" >
				<label class="form-check-label" for="inlineRadio7">No</label>
			 </div>
		  </div> 
		   <label for="formFile" class="form-label">Title</label>  <br>
	   <div class="form-check form-check-inline col-sm-2">
		  <input class="form-check-input gaurantor_title_1" type="radio" name="gaurantor_title[{{ $sno }}]" <?php if($staffLabourContractObj->gaurantor_title == 1) { echo 'checked'; } ?> value="1">
		  <label class="form-check-label gaurantor_title" for="inlineRadio1">Mr.</label>
	   </div>
	   <div class="form-check form-check-inline col-sm-2">
		  <input class="form-check-input gaurantor_title_2" type="radio" name="gaurantor_title[{{ $sno }}]" <?php if($staffLabourContractObj->gaurantor_title == 2) { echo 'checked'; } ?> value="2">
		  <label class="form-check-label" for="inlineRadio2">Ms.</label>
	   </div>
	   <div class="form-check form-check-inline col-sm-2">
		  <input class="form-check-input gaurantor_title_3" type="radio" name="gaurantor_title[{{ $sno }}]" <?php if($staffLabourContractObj->gaurantor_title == 3) { echo 'checked'; } ?> value="3">
		  <label class="form-check-label" for="inlineRadio2">Other</label>
	   </div>
	   <div class="row g-3">
		  <div class="col-sm-4">
			 <label for="inputFirstName" class="form-label">Name(Thai)</label>
			 <input type="text" class="form-control gaurantor_name_thi" name="gaurantor_name_thi[{{ $sno }}]" value="{{ @$staffLabourContractObj->gaurantor_name_thi }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputLastName" class="form-label">Name(English)</label>
			 <input type="text" class="form-control gaurantor_name_eng" name="gaurantor_name_eng[{{ $sno }}]" value="{{ @$staffLabourContractObj->gaurantor_name_eng }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Family Name(Thai)</label>
			 <input type="text" class="form-control gaurantor_family_name_thai" name="gaurantor_family_name_thai[{{ $sno }}]" value="{{ @$staffLabourContractObj->gaurantor_family_name_thai }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  Family Name(English)</label>
			 <input type="text" class="form-control gaurantor_family_name_end" name="gaurantor_family_name_end[{{ $sno }}]" value="{{ @$staffLabourContractObj->gaurantor_family_name_end }}">
		  </div>
		  
		  <h6>Home address as registered document</h6> 
		  <div class="col-sm-4">
			 <label for="inputFirstName" class="form-label">Address no.</label>
			 <input type="text" class="form-control contract_home_address" name="contract_home_address[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_address }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputLastName" class="form-label">Building / Village</label>
			 <input type="text" class="form-control contract_home_building" name="contract_home_building[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_building }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Sub District</label>
			 <input type="text" class="form-control contract_home_sub_distric" name="contract_home_sub_distric[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_sub_distric }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  District</label>
			 <input type="text" class="form-control contract_home_district" name="contract_home_district[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_district }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Road</label>
			 <input type="text" class="form-control contract_home_road" name="contract_home_road[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_road }}">
		  </div>
		   <div class="col-sm-4">
			 <label for="inputSelectCountry" class="form-label">Country</label>
			 <select class="form-select contract_home_country" name="contract_home_country[{{ $sno }}]" aria-label="Default select example">
				<?php foreach($countries as $country) { ?>
					<option value="{{ $country->id }}" <?php if($country->id == $staffLabourContractObj->contract_home_country) { echo 'selected'; } ?>>{{ $country->name }}</option>
				<?php } ?>
			 </select>
		  </div> 
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">State</label>
			
			 <?php $states = $staffLabourContractObj->getStateByCountryId($staffLabourContractObj->contract_home_country); ?>
			 <select class="form-select contract_home_state" name="contract_home_state[{{ $sno }}]" aria-label="Default select example">
				<?php foreach($states as $statesObj) { ?>
					<option value="{{ $statesObj->id }}">{{ $statesObj->name }}</option>
				<?php } ?>
			 </select>
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  City</label>
			 <input type="text" class="form-control contract_home_city" name="contract_home_city[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_city }}">
		  </div>
		  
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
			 <input type="text" class="form-control contract_home_zip" name="contract_home_zip[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_home_zip }}">
		  </div>
		 
	   <h6>
		  <div class="form-check">
			 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
			 <input class="form-check-input contract_home_address_check" type="checkbox" value="{{ @$staffLabourContractObj->contract_home_address_check }}" name="contract_home_address_check[{{ $sno }}]" checked> 
		  </div>
	   </h6>
	  
		  <div class="col-sm-4">
			 <label for="inputFirstName" class="form-label">Address no.</label>
			 <input type="text" class="form-control contract_address" name="contract_address[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_address }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputLastName" class="form-label">Building / Village</label>
			 <input type="text" class="form-control contract_building" name="contract_building[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_building }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Sub District</label>
			 <input type="text" class="form-control contract_sub_district" name="contract_sub_district[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_sub_district }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  District</label>
			 <input type="text" class="form-control contract_district" name="contract_district[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_district }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Road</label>
			 <input type="text" class="form-control contract_road" name="contract_road[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_road }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputSelectCountry" class="form-label">Country</label>
			 <select class="form-select contract_country" id="inputSelectCountry" name="contract_country[{{ $sno }}]" aria-label="Default select example">
				<?php foreach($countries as $country) { ?>
					<option value="{{ $country->id }}" <?php if($country->id == $staffLabourContractObj->contract_country) { echo 'selected'; } ?>>{{ $country->name }}</option>
				<?php } ?>
			 </select>
		  </div>  
		  <?php $stateu = $staffLabourContractObj->getStateByCountryId($staffLabourContractObj->contract_country); ?>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">State</label>
				<select class="form-control contract_state" name="contract_state[{{ $sno }}]">
					<?php foreach($stateu as $stateoj) { ?>
						<option value="{{ $stateoj->id }}" <?php if($stateoj->id == $staffLabourContractObj->contract_state) { echo 'selected'; } ?>>{{ $stateoj->name }}</option>
					<?php } ?>
				</select>
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  City</label>
			 <input type="text" class="form-control contract_city" name="contract_city[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_city }}">
		  </div>
		  
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
			 <input type="text" class="form-control contract_zip_code" name="contract_zip_code[{{ $sno }}]" value="{{ @$staffLabourContractObj->contract_zip_code }}">
		  </div>
		  
		 
		 
		  <div class="col-sm-12">
			 <label for="inputFirstName" class="form-label">Guarantor's office name</label>
			 <input type="text" class="form-control guarantor_office_name" name="guarantor_office_name[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_office_name }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputFirstName" class="form-label">Address no.</label>
			 <input type="text" class="form-control guarantor_address" name="guarantor_address[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_address }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputLastName" class="form-label">Building / Village</label>
			 <input type="text" class="form-control guarantor_building" name="guarantor_building[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_building }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Sub District</label>
			 <input type="text" class="form-control guarantor_sub_district" name="guarantor_sub_district[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_sub_district }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  District</label>
			 <input type="text" class="form-control guarantor_district" name="guarantor_district[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_district }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Road</label>
			 <input type="text" class="form-control guarantor_road" name="guarantor_road[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_road }}">
		  </div>
		   <div class="col-sm-4">
			 <label for="inputSelectCountry" class="form-label">Country</label>
			 <select class="form-select guarantor_country_id" name="guarantor_country_id[{{ $sno }}]" aria-label="Default select example">
				<?php foreach($countries as $country) { ?>
					<option value="{{ $country->id }}" <?php if($country->id == $staffLabourContractObj->guarantor_country_id) { echo 'selected'; } ?>>{{ $country->name }}</option>
				<?php } ?>
			 </select>
		  </div>
		  
		   <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">State</label>
			 <?php $states = $staffLabourContractObj->getStateByCountryId($staffLabourContractObj->guarantor_country_id); ?>
			 <select class="form-select guarantor_state_id"  name="guarantor_state_id[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_state_id }}">
				<?php foreach($states as $state) { ?>
					<option value="{{ $state->id }}" <?php if($state->id == $staffLabourContractObj->guarantor_state_id) { echo 'selected'; } ?>>{{ $state->name }}</option>
				<?php } ?>
			 </select>
		  </div>
		  
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  City</label>
			 <input type="text" class="form-control guarantor_city" name="guarantor_city[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_city }}">
		  </div>
		 
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
			 <input type="text" class="form-control guarantor_zip" name="guarantor_zip[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_zip }}">
		  </div>
		 
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">  Guarantor Salary(THB)</label>
			 <input type="text" class="form-control guarantor_salary" name="guarantor_salary[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_salary }}">
		  </div>
		  <div class="col-sm-4">
			 <label for="inputEmailAddress" class="form-label">Guarantor Amount(THB)</label>
			 <input type="text" class="form-control guarantor_amount" name="guarantor_amount[{{ $sno }}]" value="{{ @$staffLabourContractObj->guarantor_amount }}">
		  </div>
		  <div class="mb-3 mt-10 col-md-12 " >
			 <label for="inputProductDescription" class="form-label">Upload Contract no.1 signed and Guarantor no.1 signed</label>
			 <input id="image-uploadify3" class="upload_contact_sign_doc" name="upload_contact_sign_doc[{{ $sno }}][]" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
		  </div>

			<?php $staffLabourContractData = $staffLabourContractObj->getStaffLabourContactImage($staffLabourContractObj->id);
					foreach($staffLabourContractData as $staffLabourContractValue) {
						$imgpath = asset("images/stafflabour/".$staffLabourContractValue->staff_labour_contract_id."/".$staffLabourContractValue->image);
						?>
					
						<div class="labour_image_{{ $staffLabourContractValue->id }}">
							<img src="{{ $imgpath }}" height="60" width="60" />
							<a href="#" class="removelabourimg" data-id="{{ $staffLabourContractValue->id }}">Remove</a>
						</div>
					
			<?php } ?>
		  
	   </div> 
	</div>
<?php } ?>