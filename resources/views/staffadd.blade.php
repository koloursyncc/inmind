<!doctype html>
<html lang="en">
   @include('layout.header')
   <body>
      <!--wrapper-->
      <div class="wrapper">
      <!--start header -->
      @include('layout.menu')
	  

<?php

$highestEducation = [
	1 => 'P6',
	2 => 'M3',
	3 => 'M6',
	4 => 'Under graduate',
	5 => 'Graduate'
];

$disabledfield = $url = '';
$id = null;

$staff_active_staff = '';
$staff_card_type = '';
$staff_title = '';
$staff_country_id = '';
$staff_higest_education = '';
$staff_social_fund = '';
$staff_social_fund_included_in_salary = '';
$staff_pay_social_fund_by = '';

if($type == 'save')
{
	$url = url('save/staff');
}
else if($type == 'edit')
{
	$url = url('update/staff');
}
if($type != 'save')
{
	$id = $obj->id;
	if($obj != null) {
		$staff_active_staff = $obj->active_staff;
		$staff_card_type = $obj->card_type;
		$staff_title = $obj->title;
		$staff_country_id = $obj->country_id;
		$staff_higest_education = $obj->higest_education;
		$staff_social_fund = $obj->social_fund;
		$staff_social_fund_included_in_salary = $obj->social_fund_included_in_salary;
		$staff_pay_social_fund_by = $obj->pay_social_fund_by;
	}
}

if($type == 'view')
{
	$disabledfield = 'disabled';
}
?>
	  
      <!--start page wrapper -->
      <div class="page-wrapper">
      <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Staff</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Registration</li>
               </ol>
            </nav>
         </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <!-- SmartWizard html --> 
                  <div id="smartwizard">
                     <ul class="nav">
                        <li class="nav-item">
                           <a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
                           <br>Staff Personal Detail</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
                           <br>Address Detail</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
                           <br>Social ID</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#step-4">	<strong>Step 4</strong> 
                           <br>Contract Details</a>
                        </li>
                     </ul>
					 <form id="staffform" data-url="{{ $url }}">
						@csrf
						<?php if($type =='edit') { ?>
							<input type="hidden" name="staff_id" value="{{ $id }}">
						<?php } ?>
                     <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                           <h6>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Activated Staff</label>
                                 <input class="form-check-input active_staff" type="checkbox" value="1" <?php if($staff_active_staff == 1) { echo 'checked'; } ?> name="active_staff" {{ $disabledfield }} > 
                              </div>
                           </h6>
                           <label for="formFile" class="form-label">Staff ID</label>
                           <input class="form-control mb-3" type="text" value="1234" disabled aria-label="default input example">
                           <label for="formFile" class="form-label">Title</label>  <br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="title" value="1" <?php if($staff_title == 1) { echo 'checked'; } ?> {{ $disabledfield }}>
                              <label class="form-check-label" for="inlineRadio1">Mr.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="title" value="2" <?php if($staff_title == 2) { echo 'checked'; } ?>  {{ $disabledfield }}>
                              <label class="form-check-label" for="inlineRadio2">Ms.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="title" value="3" <?php if($staff_title == 3) { echo 'checked'; } ?>  {{ $disabledfield }}>
                              <label class="form-check-label" for="inlineRadio2">Other</label>
                           </div>
                           <div class="row g-3">
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Name(Thai) <span style="color:red">*</span></label>
                                 <input type="text" class="form-control name_thai" name="name_thai"  value="{{ @$obj->name_thai }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Name(English) <span style="color:red">*</span></label>
                                 <input type="text" class="form-control name_eng" name="name_eng"  value="{{ @$obj->name_eng }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Family Name(Thai) <span style="color:red">*</span></label>
                                 <input type="text" class="form-control famly_name_thai" name="famly_name_thai"  value="{{ @$obj->famly_name_thai }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Family Name(English) <span style="color:red">*</span></label>
                                 <input type="text" class="form-control famly_name_eng" name="famly_name_eng"  value="{{ @$obj->famly_name_eng }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Nick Name</label>
                                 <input type="text" class="form-control" name="nick" value="{{ @$obj->nick }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Current Job Position</label>
                                 <input type="text" class="form-control" name="current_job" value="{{ @$obj->current_job }}"  {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Mobile no.</label>
                                 <input type="text" class="form-control" name="mobile_no" value="{{ @$obj->mobile_no }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Current Salary/ Wages</label>
                                 <input type="text" class="form-control" name="current_salary" value="{{ @$obj->current_salary }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Date of Birth:</label>
                                    <input type="date" class="form-control" name="dob" value="{{ @$obj->dob }}" {{ $disabledfield }}>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="card_type" value="1" <?php if($staff_card_type == 1) { echo 'checked'; } ?> {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio1">ID Card</label>
                                 </div>
                                 <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="card_type" value="2" <?php if($staff_card_type == 2) { echo 'checked'; } ?> {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio1">Passport</label>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  ID Card no.</label>
                                 <input type="text" class="form-control" name="card_no" value="{{ @$obj->card_no }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Issue   Date</label>
                                    <input type="date" class="form-control" name="issue_date" value="{{ @$obj->issue_date }}" {{ $disabledfield }}>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label"> Issue by</label>
                                 <input type="text" class="form-control" name="issue_by"  value="{{ @$obj->issue_by }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label"> Passport No. </label>
                                 <input type="text" class="form-control" name="passport_no" value="{{ @$obj->passport_no }}"  {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Expire   Date</label>
                                    <input type="date" class="form-control" name="exp_date" value="{{ @$obj->exp_date }}" {{ $disabledfield }}>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="country_id" aria-label="Default select example"  {{ $disabledfield }}>
									<option value="">Select Country</option>
									<?php foreach($countries as $countryObj) { ?>
										<option value="{{ $countryObj->id }}" <?php if($staff_country_id == $countryObj->id) { echo 'selected'; } ?>>{{ $countryObj->name }}</option>
									<?php } ?>
                                 </select>
                              </div>
                              <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Staff Photo & ID Card  </label>
                                 <input id="image-uploadify" type="file" name="upload_staff_photo[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple {{ $disabledfield }}>
                              </div>
                              <label for="formFile" class="form-label">Highest Education</label>
                              <select class="form-select mb-3" aria-label="Default select example" name="higest_education" {{ $disabledfield }}>
									<option value="">Select Option</option>
									<?php foreach($highestEducation as $highestEducationk => $highestEducationv) { ?>
										<option value="{{ $highestEducationk }}" <?php if($staff_higest_education == $highestEducationk) { echo 'selected'; } ?>>{{ $highestEducationv }}</option>
									<?php } ?>
                              </select>
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">School / Univercity Name</label>
                                 <input type="text" class="form-control" name="school_univercity_name"  value="{{ @$obj->school_univercity_name }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Educational Year</label>
                                    <input type="date" class="form-control" name="education_year" value="{{ @$obj->education_year }}" {{ $disabledfield }}>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Faculty / School of</label>
                                 <input type="text" class="form-control" name="school_faculty" value="{{ @$obj->school_faculty }}"  {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Department</label>
                                 <input type="text" class="form-control" name="department" value="{{ @$obj->department }}"  {{ $disabledfield }}>
                              </div>
                           </div>
                        </div>
						
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
							<a href="#" id="add_address">Add Address</a>
							<div id="home_address_as_registered_document">
								<?php if($type != 'save') { ?>
									<?php foreach($addressdocuments as $addressdocument) {
											$addressdocumentid = $addressdocument->id;
										?>
									<div class="">
										   <h6>
											  <div class="form-check">
												 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
												 <input class="form-check-input contact_address_check" <?php //if($addressdocument->address == ) { echo 'checked'; } ?> type="checkbox"  {{ $disabledfield }}> 
											  </div>
										   </h6>
										   <div class="row g-3">
											  <div class="col-sm-4">
												 <label for="inputFirstName" class="form-label">Address no.</label>
												 <input type="text" value="{{ $addressdocument->address }}" class="form-control contact_address" name="contact_address[{{ $addressdocumentid }}]"  {{ $disabledfield }}>
											  </div>
											  <div class="col-sm-4">
												 <label for="inputLastName" class="form-label">Building / Village</label>
												 <input type="text" value="{{ $addressdocument->building }}" class="form-control contact_address_building" name="contact_address_building[{{ $addressdocumentid }}]"  {{ $disabledfield }}>
											  </div>
											  <div class="col-sm-4">
												 <label for="inputEmailAddress" class="form-label">Sub District</label>
												 <input type="text" value="{{ $addressdocument->sub_district }}" class="form-control contact_sub_district" name="contact_sub_district[{{ $addressdocumentid }}]"  {{ $disabledfield }}>
											  </div>
											  <div class="col-sm-4">
												 <label for="inputEmailAddress" class="form-label">  District</label>
												 <input type="text" value="{{ $addressdocument->district }}" class="form-control contact_district" name="contact_district[{{ $addressdocumentid }}]"  {{ $disabledfield }}>
											  </div>
											  <div class="col-sm-4">
												 <label for="inputEmailAddress" class="form-label">Road</label>
												 <input type="text" value="{{ $addressdocument->road }}" class="form-control contact_road" name="contact_road[{{ $addressdocumentid }}]"  {{ $disabledfield }}>
											  </div>
											  <div class="col-sm-4">
												 <label for="inputEmailAddress" class="form-label">  City</label>
												 <input type="text" value="{{ $addressdocument->city }}" class="form-control contact_city" name="contact_city[{{ $addressdocumentid }}]"  {{ $disabledfield }}>
											  </div>
											  <?php $addrstates = $addressdocument->getStateByCountryId($addressdocument->country_id); ?>
											  <div class="col-sm-4">
												 <label for="inputEmailAddress" class="form-label">State</label>
												 <select class="form-select contact_state contact_state_id{{ $addressdocumentid }}" name="contact_state[{{ $addressdocument->id }}]" {{ $disabledfield }}>
													<option value="">Select State</option>
													<?php foreach($addrstates as $addrstateobj) { ?>
														<option value="{{ $addrstateobj->id }}" <?php if($addrstateobj->id == $addressdocument->state_id) { echo 'selected'; } ?>>{{ $addrstateobj->name }}</option>
													<?php } ?>
												 </select>
											  </div>
											  <div class="col-sm-4">
												 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
												 <input type="text" value="{{ $addressdocument->zip }}" class="form-control contact_zip_code" name="contact_zip_code[{{ $addressdocumentid }}]" {{ $disabledfield }}>
											  </div>
											  <div class="col-12">
												 <label for="inputSelectCountry" class="form-label">Country</label>
												 <select data-country-id="{{ $addressdocument->id }}" class="form-select contact_country" name="contact_country[{{ $addressdocumentid }}]" aria-label="Default select example" {{ $disabledfield }}>
													<?php foreach($countries as $countryObj) { ?>
														<option value="{{ $countryObj->id }}" <?php if($countryObj->id == $addressdocument->country_id) { echo 'selected'; } ?>>{{ $countryObj->name }}</option>
													<?php } ?>
												 </select>
											  </div>
											  <div class="mb-3 mt-10 col-md-12 " >
												 <label for="inputProductDescription" class="form-label">Upload Home Registration </label>
												 <input class="image_upload_doc" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple {{ $disabledfield }}>
											  </div>
										</div>
									</div>
								<?php } ?>
								<?php } ?>
							</div>
                           
                        </div>
						
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                           <div class="row g-3">
                              <label for="inputFirstName" class="form-label">Social Fund</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_fund" value="1" {{ $disabledfield }} >
                                    <label class="form-check-label" for="inlineRadio7">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_fund" value="2"  {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio7">No</label>
                                 </div>
                              </div>
                              <label for="inputFirstName" class="form-label">Social Fund included in salary</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_fund_included_in_salary" value="1" {{ $disabledfield }} checked>
                                    <label class="form-check-label" for="inlineRadio9">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_fund_included_in_salary" {{ $disabledfield }} value="2">
                                    <label class="form-check-label" for="inlineRadio9">No</label>
                                 </div>
                              </div>
                              <div style="clear:both"></div>
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Social Fund ID</label>
                                 <input type="text" class="form-control" name="social_fund_id" value="{{ @$obj->social_fund_id }}" placeholder=" " {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Hospital in charges</label>
                                 <input type="text" class="form-control" name="hospital_in_charges"  value="{{ @$obj->hospital_in_charges }}" placeholder=" " {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputSelectCountry" class="form-label">Pay Social fund by </label>
                                 <select class="form-select" id="" aria-label="Default select example"  name="pay_social_fund_by" {{ $disabledfield }}>
                                    <option value="1">na</option>
                                    <option value="2">na</option>
                                    <option value="3">na</option>
                                    <option value="4">na</option>
                                 </select>
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Will apply in </label>
                                    <input type="date" class="form-control" name="will_apply_in"  value="{{ @$obj->will_apply_in }}" {{ $disabledfield }}>
                                 </div>
                               </div>
							  <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Social fund ID Card  </label>
                                 <input id="image-uploadify2" name="upload_social_fund_id_card[]" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                              </div>	 
                           </div> 
                        </div>
						<div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                           <div class="row g-3">
						   <div class="col-sm-10 flux">
                                <h6> Labour Contract</h6>
                              </div>
                              <div class=" col-sm-2 flux-right">
							    <button type="button" class="btn btn-sm btn-primary px-2 radius-30">Add more</button>
                              </div>
                              <label for="inputFirstName" class="form-label">Working pay as</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="working_pay" id="" value="1" {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio7">Salary</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="working_pay" id="" value="2"  {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio7">Wages</label>
                                 </div>
                              </div>  
							  <?php
								$typeoflabour =[
									1 => 'Contract Limited time pay by wage',
									2 => 'Contract Limited time 120 days',
									3 => 'Contract Limited time not over 2 years',
									4 => 'Permanant'
								];
							  ?>
                              <div style="clear:both"></div>
							  <div class="col-sm-12">
                                 <label for="inputSelectCountry" class="form-label">Type of labour contract1</label>
                                 <select class="form-select" name="type_of_labour" aria-label="Default select example">
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
                                    <input type="date" class="form-control" name="effective_period_end_date" value="{{ @$obj->effective_period_end_date }}" {{ $disabledfield }}>
                                 </div>
                               </div>
							   
							   <?php
								$positionData =[
									1 => 'Manager',
									2 => 'Supervisor',
									3 => 'Officer',
									4 => 'Manufacturing Staff',
									5 => 'Warehouse',
									6 => 'Driver',
									7 => 'Foreign Labour',
									8 => 'Sale Manager',
									9 => 'Sale Staff',
									10 => 'Sale Supervisorr',
								];
							  ?>
							   
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Position</label>
								 <select class="form-select" value="{{ @$obj->position }}" name="position" aria-label="Default select example" {{ $disabledfield }}>
									<?php foreach($positionData as $positionDatak => $positionDatav) { ?>
										<option value="{{ $positionDatak }}">{{ $positionDatav }}</option>
									<?php } ?>
                                 </select>
                              </div> 
							  
							  <?php
								$departmentData =[
									1 => 'Manager',
									2 => 'Supervisor',
									3 => 'Officer',
									4 => 'Manufacturing Staff',
									5 => 'Warehouse',
									6 => 'Driver',
									7 => 'Foreign Labour',
									8 => 'Sale Manager',
									9 => 'Sale Staff',
									10 => 'Sale Supervisorr',
								];
							  ?>
							  
                              <div class="col-sm-4">
                                 <label for="inputSelectCountry" class="form-label">Department </label>
                                 <select class="form-select" value="{{ @$obj->labour_department }}" name="labour_department" {{ $disabledfield }}>
                                    <?php foreach($departmentData as $departmentDatak => $departmentDatav) { ?>
										<option value="{{ $departmentDatak }}">{{ $departmentDatav }}</option>
									<?php } ?>
                                 </select>
                              </div>
							  <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Salary Wages in contract (THB)</label>
                                 <input type="text" class="form-control" value="{{ @$obj->salary_wages_in_contract }}" name="salary_wages_in_contract">
                              </div>
							  
							  <?php
								$increaseSalaryBeConsideredWhen =[
									1 => 'Probation passed',
									2 => 'Company evaluate annually',
								];
							  ?>
							  
							  <div class="col-sm-4">
                                 <label for="inputSelectCountry" class="form-label">Increase salary be considered when </label>
                                 <select class="form-select" name="increase_salary_be_considered_when" value="{{ @$obj->increase_salary_be_considered_when }}">
                                    <?php foreach($increaseSalaryBeConsideredWhen as $increaseSalaryBeConsideredWhenk => $increaseSalaryBeConsideredWhenv) { ?>
										<option value="{{ $increaseSalaryBeConsideredWhenk }}">{{ $increaseSalaryBeConsideredWhenv }}</option>
									<?php } ?>
                                 </select>
                              </div>
							  <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Salary Promised (THB)</label>
                                 <input type="text" class="form-control" name="salary_promised" value="{{ @$obj->salary_promised }}">
                              </div>
							  <div style="clear:both"></div>
							  <h5>Benefit</h5>
							  <div class="col-sm-4">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Hotel (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="hotel_thb_day" value="{{ @$obj->hotel_thb_day }}">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Allowance (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="allowance_thb_day" value="{{ @$obj->allowance_thb_day }}">
                              </div>
							  <div class="col-sm-4">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Travel Expense (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="travel_expense_thb_day" value="{{ @$obj->travel_expense_thb_day }}">
                              </div>
							  <div class="col-sm-4">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> O T (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="ot_thb_day" value="{{ @$obj->ot_thb_day }}">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Food (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="food_thb_day" value="{{ @$obj->food_thb_day }}">
                              </div>
							  <h6>Leaves</h6>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Sick Leave (Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="sick_leave" value="{{ @$obj->sick_leave }}">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Vocation Leave (Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" name="vocation_leave" value="{{ @$obj->vocation_leave }}">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Maternity Leave (Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control"  name="maternity_leave" value="{{ @$obj->maternity_leave }}">
                              </div>
							  <h6>Gaurantor</h6>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gaurantor_type" id="" value="1" checked>
                                    <label class="form-check-label" for="inlineRadio7">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gaurantor_type" id="" value="2" >
                                    <label class="form-check-label" for="inlineRadio7">No</label>
                                 </div>
                              </div> 
							   <label for="formFile" class="form-label">Title</label>  <br>
                           <div class="form-check form-check-inline col-sm-2">
                              <input class="form-check-input" type="radio" name="gaurantor_title" id="" value="1">
                              <label class="form-check-label" for="inlineRadio1">Mr.</label>
                           </div>
                           <div class="form-check form-check-inline col-sm-2">
                              <input class="form-check-input" type="radio" name="gaurantor_title" id="" value="2">
                              <label class="form-check-label" for="inlineRadio2">Ms.</label>
                           </div>
                           <div class="form-check form-check-inline col-sm-2">
                              <input class="form-check-input" type="radio" name="gaurantor_title" id="" value="3">
                              <label class="form-check-label" for="inlineRadio2">Other</label>
                           </div>
                           <div class="row g-3">
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Name(Thai)</label>
                                 <input type="text" class="form-control" name="gaurantor_name_thi" value="{{ @$obj->gaurantor_name_thi }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Name(English)</label>
                                 <input type="text" class="form-control" name="gaurantor_name_eng" value="{{ @$obj->gaurantor_name_eng }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Family Name(Thai)</label>
                                 <input type="text" class="form-control" name="gaurantor_family_name_thai" value="{{ @$obj->gaurantor_family_name_thai }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Family Name(English)</label>
                                 <input type="text" class="form-control" name="gaurantor_family_name_end" value="{{ @$obj->gaurantor_family_name_end }}">
                              </div>
							  <?php /* ?>
							  <h6>Home address as registered document</h6> 
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12 mb-3">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div> 
                           <h6>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> 
                              </div>
                           </h6>
                          
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>  
							  <?php */ ?>
							  <div class="col-sm-12">
                                 <label for="inputFirstName" class="form-label">Guarantor's office name</label>
                                 <input type="text" class="form-control" name="guarantor_office_name" value="{{ @$obj->guarantor_office_name }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" name="guarantor_address" value="{{ @$obj->guarantor_address }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" name="guarantor_building" value="{{ @$obj->guarantor_building }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" name="guarantor_sub_district" value="{{ @$obj->guarantor_sub_district }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" name="guarantor_district" value="{{ @$obj->guarantor_district }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" name="guarantor_road" value="{{ @$obj->guarantor_road }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" name="guarantor_city" value="{{ @$obj->guarantor_city }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 
								 <select class="form-select"  name="guarantor_state_id" value="{{ @$obj->guarantor_state_id }}">
                                    <option value="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" name="guarantor_zip" value="{{ @$obj->guarantor_zip }}">
                              </div>
                              <div class="col-12 mb-3">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" name="guarantor_country_id" aria-label="Default select example">
                                    <option value="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>
							  <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  Guarantor Salary(THB)</label>
                                 <input type="text" class="form-control" name="guarantor_salary" value="{{ @$obj->guarantor_salary }}">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">Guarantor Amount(THB)</label>
                                 <input type="text" class="form-control" name="guarantor_amount" value="{{ @$obj->guarantor_amount }}">
                              </div>
							  <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Contract no.1 signed and Guarantor no.1 signed</label>
                                 <input id="image-uploadify3" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                              </div>	 
                           </div> 
                        </div>
                     </div>
                  </div>
				  </form>
               </div>
            </div>
            <!--end row-->
         </div>
      </div>
	  
	  
	  
	  <div class="address_group" style="display:none" data-pos="125000" data-counter="0">
			<div class="address_group_clone">
			   <h6>
				  <div class="form-check">
					 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
					 <input class="form-check-input contact_address_check" type="checkbox"  {{ $disabledfield }} checked> 
				  </div>
			   </h6>
			   <div class="row g-3">
				  <div class="col-sm-4">
					 <label for="inputFirstName" class="form-label">Address no.</label>
					 <input type="text" class="form-control contact_address" name=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputLastName" class="form-label">Building / Village</label>
					 <input type="text" class="form-control contact_address_building" id=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputEmailAddress" class="form-label">Sub District</label>
					 <input type="text" class="form-control contact_sub_district" id=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputEmailAddress" class="form-label">  District</label>
					 <input type="text" class="form-control contact_district" id=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputEmailAddress" class="form-label">Road</label>
					 <input type="text" class="form-control contact_road" id=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputEmailAddress" class="form-label">  City</label>
					 <input type="text" class="form-control contact_city" id=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputEmailAddress" class="form-label">State</label>
					 <select class="form-select contact_state" aria-label="Default select example" {{ $disabledfield }}>
						<option value="">Select State</option>
					 </select>
				  </div>
				  <div class="col-sm-4">
					 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
					 <input type="text" class="form-control contact_zip_code" id=""  {{ $disabledfield }}>
				  </div>
				  <div class="col-12">
					 <label for="inputSelectCountry" class="form-label">Country</label>
					 <select class="form-select contact_country" name="" aria-label="Default select example" {{ $disabledfield }}>
						<?php foreach($countries as $countryObj) { ?>
							<option value="{{ $countryObj->id }}">{{ $countryObj->name }}</option>
						<?php } ?>
					 </select>
				  </div>
				  <div class="mb-3 mt-10 col-md-12 " >
					 <label for="inputProductDescription" class="form-label">Upload Home Registration </label>
					 <input class="image_upload_doc" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple {{ $disabledfield }}>
				  </div>
			</div>
		</div>
	  </div>
	  
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.staff')
      <script>
	  function dependdropdown(val, target, cnt, name) {
			var url = $("meta[name=url]").attr("content");
			$.ajax({
				url: "{{url('getregionaldata')}}",
				dataType : "json",
				type: "get",
				data : {'value':val, 'name':name},
				success : function(response) {
					//alert(target+cnt);
					var list = $(target+cnt); 
					list.empty();
					list.append(new Option('Select '+name, ''));
					$.each(response, function(index, item) {
						list.append(new Option(item.name, item.id, true));
					});
					
					<?php /* if($type != 'save') { ?>
						setTimeout(function() {
							
						//alert(<?php echo $state_id; ?>);
						$('.state_id'+cnt+' option[value="<?php echo $state_id; ?>"]').prop('selected', true);
						}, 500);
					<?php } */ ?>
				},
			});
		}
		
		function addaddress()
		{
			var clone = $('.address_group_clone', $('.address_group')).clone();
						
			var no = $('.address_group').attr('data-counter');
			var posno = $('.address_group').attr('data-pos');
			
			var total = parseInt(no) - 1;
			var postotal = parseInt(posno) + 1;
			
			$('.contact_address_check', clone).attr('name', 'contact_address_check['+total+']');
			$('.contact_address', clone).attr('name', 'contact_address['+total+']');
			$('.contact_address_building', clone).attr('name', 'contact_address_building['+total+']');
			$('.contact_sub_district', clone).attr('name', 'contact_sub_district['+total+']');
			$('.contact_district', clone).attr('name', 'contact_district['+total+']');
			$('.contact_road', clone).attr('name', 'contact_road['+total+']');
			$('.contact_city', clone).attr('name', 'contact_city['+total+']');
			$('.contact_state', clone).attr('name', 'contact_state['+total+']');
			$('.contact_zip_code', clone).attr('name', 'contact_zip_code['+total+']');
			$('.contact_country', clone).attr('name', 'contact_country['+total+']');
			$('.image_upload_doc', clone).attr('name', 'image_upload_doc['+total+'][]');
			$
			('.contact_country', clone).attr('data-country-id', postotal);
			$('.contact_state', clone).addClass('contact_state_id'+postotal);
			
			$('#home_address_as_registered_document').append(clone);
			
			$('.address_group').attr('data-counter', total);
			$('.address_group').attr('data-pos', postotal);
		}

         $(document).ready(function() {
			 
			<?php if($type == 'save') { ?>
				var country = $('.contact_country').val();
				var target = '.contact_state_id';
				addaddress();
				
				setTimeout(function() {
					
					dependdropdown(country, target, $('.contact_country').attr('data-country-id'), 'State');
				}, 1000);
				
			<?php } ?>
			
			$('body').on('click', '#add_address', function() {
				addaddress();
			});
			 
			 $('body').on('change', '.contact_country', function() {
				var country = $(this).val();
				
				var target = '.contact_state_id';
				
				dependdropdown(country, target, $(this).attr('data-country-id'), 'State');
			});
			 
         
         var table = $('#dataTable').DataTable({
         				processing: true,
         				serverSide: true,
         				ajax: "{{url('productlistajax')}}",
         				columns: [
         					{ data: 'id', orderable: false},
         					{ data: 'main_img', orderable: false},
         					{ data: 'product_name', orderable: false},
         					{ data: 'product_code', orderable: false},
         					{ data: 'detail', orderable: false},
         					{ data: 'action', orderable: false},
         					{ data: 'supplier', orderable: false}
         					
         				],
         
         			});
         		});
         		
      </script>
   </body>
</html>