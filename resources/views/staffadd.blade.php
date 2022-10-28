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

$typeoflabour =[
	1 => 'Contract Limited time pay by wage',
	2 => 'Contract Limited time 120 days',
	3 => 'Contract Limited time not over 2 years',
	4 => 'Permanant'
];
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
	
$increaseSalaryBeConsideredWhen =[
	1 => 'Probation passed',
	2 => 'Company evaluate annually',
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
                           <input class="form-control mb-3" type="text" value="{{ @$obj->staff_rand_id }}" disabled aria-label="default input example">
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
                                 <label for="inputEmailAddress" class="form-label">Family Name(Thai) <span style="color:red">*</span></label>
                                 <input type="text" class="form-control famly_name_thai" name="famly_name_thai"  value="{{ @$obj->famly_name_thai }}" {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputLastName" class="form-label">Name(English) <span style="color:red">*</span></label>
                                 <input type="text" class="form-control name_eng" name="name_eng"  value="{{ @$obj->name_eng }}" {{ $disabledfield }}>
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
                                    <input class="form-check-input card_type" type="radio" name="card_type" value="1" <?php if($staff_card_type == 1) { echo 'checked'; } ?> {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio1">ID Card</label>
                                 </div>
                                 <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input card_type" type="radio" name="card_type" value="2" <?php if($staff_card_type == 2) { echo 'checked'; } ?> {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio1">Passport</label>
                                 </div>
                              </div>
							  
							  <?php  
								$id_card_radio = 'd-none';
								$id_passport_radio = 'd-none';
								if($type != 'save')
								{
									if($staff_card_type == 1) {
										$id_passport_radio = 'd-none';
										$id_card_radio = '';
									} else if($staff_card_type == 2) {
										$id_passport_radio = '';
										$id_card_radio = 'd-none';
									}
								}
								
							  ?>
							  
							  <div class="row card_type_div {{ $id_card_radio }}">
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
							  </div>
							  
							  <div class="row passport_type {{ $id_passport_radio }}">
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label"> Passport No. </label>
                                 <input type="text" class="form-control" name="passport_no" value="{{ @$obj->passport_no }}"  {{ $disabledfield }}>
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Expire Date</label>
                                    <input type="date" class="form-control" name="exp_date" value="{{ @$obj->exp_date }}" {{ $disabledfield }}>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select country_id" id="country_id" aria-label="Default select example "  {{ $disabledfield }}>
									<option value="">Select Country</option>
									<?php foreach($countries as $countryObj) { ?>
										<option value="{{ $countryObj->id }}" <?php if($default_country_id == $countryObj->id || @$obj->default_country_id == $countryObj->id) { echo 'selected'; } ?>>{{ $countryObj->name }}</option>
									<?php } ?>
                                 </select>
                              </div>
							  </div>
                              <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Staff Photo & ID Card  </label>
                                 <input id="image-uploadify" type="file" name="upload_staff_photo[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple {{ $disabledfield }}>
                              </div>
							  
							  <div class="mb-3 mt-10 col-md-12" >
								<?php foreach($staffPhotos as $staffPhoto) {
									$imgpath = "images/staff/".$staffPhoto->staff_id."/".$staffPhoto->document;
										$img = asset($imgpath);
									?>
									<div id="document_{{ $staffPhoto->id }}">
										<img src="{{ $img }}" height="100" width="50">
										<a href="#" class="remove_document" data-id="{{ $staffPhoto->id }}">Remove</a>
									</div>
								<?php } ?>
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
							
							<div id="home_address_as_registered_document">
									<div class="">
									   <h6>
										  <div class="form-check">
											 <label class="form-check-label" for="flexCheckChecked">Home address as register</label>
											 
										  </div>
									   </h6>
									   <div class="row g-3">
										  <div class="col-sm-4">
											 <label for="inputFirstName" class="form-label">Address no.</label>
											 <input type="text" value="{{ @$obj->home_address }}" class="form-control home_address" name="home_address"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputLastName" class="form-label">Building / Village</label>
											 <input type="text" value="{{ @$obj->home_building }}" class="form-control contact_address_building" name="home_building"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">Sub District</label>
											 <input type="text" value="{{ @$obj->home_sub_district }}" class="form-control home_sub_district" name="home_sub_district"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">  District</label>
											 <input type="text" value="{{ @$obj->home_district }}" class="form-control home_district" name="home_district"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">Road</label>
											 <input type="text" value="{{ @$obj->home_road }}" class="form-control home_road" name="home_road"  {{ $disabledfield }}>
										  </div>
										   <div class="col-12">
											 <label for="inputSelectCountry" class="form-label">Country</label>
											 <select data-country-id="" class="form-select home_country_id" name="home_country_id" aria-label="Default select example" {{ $disabledfield }}>
												<?php foreach($countries as $countryObj) { ?>
													<option value="{{ $countryObj->id }}" <?php if($countryObj->id == @$obj->country_id || $default_country_id == $countryObj->id) { echo 'selected'; } ?>>{{ $countryObj->name }}</option>
												<?php } ?>
											 </select>
										  </div>
										  
										  <?php 

												if($type != 'save') {
													$addrstates = $obj->getStateByCountryId($obj->country_id);
												} else {
													$addrstates = $states;
												}
										  ?>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">State</label>
											 <select class="form-select home_state_id " name="home_state_id" {{ $disabledfield }}>
												<option value="">Select State</option>
												<?php foreach($addrstates as $addrstateobj) { ?>
													<option value="{{ $addrstateobj->id }}" <?php if($addrstateobj->id == @$obj->state_id) { echo 'selected'; } ?>>{{ $addrstateobj->name }}</option>
												<?php } ?>
											 </select>
										  </div>
										  
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">  City</label>
											 <input type="text" value="{{ @$obj->home_city }}" class="form-control home_city" name="home_city"  {{ $disabledfield }}>
										  </div>
										  
										  <?php ?>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
											 <input type="text" value="{{ @$obj->home_zip }}" class="form-control home_zip" name="home_zip" {{ $disabledfield }}>
										  </div>
										 
										  <div class="mb-3 mt-10 col-md-12 " >
											 <label for="inputProductDescription" class="form-label">Upload Home Registration </label>
											 <input class="image_upload_doc" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple {{ $disabledfield }}>
										  </div>
									</div>
								</div>
								
								
									<div class="">
									   <h6>
										  <div class="form-check">
											 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
											 <input class="form-check-input conact_address_check" <?php //if($addressdocument->address == ) { echo 'checked'; } ?> type="checkbox"  {{ $disabledfield }}> 
										  </div>
									   </h6>
									   <div class="row g-3">
										  <div class="col-sm-4">
											 <label for="inputFirstName" class="form-label">Address no.</label>
											 <input type="text" value="{{ @$obj->conact_address }}" class="form-control conact_address" name="conact_address"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputLastName" class="form-label">Building / Village</label>
											 <input type="text" value="{{ @$obj->conact_building }}" class="form-control conact_building" name="conact_building"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">Sub District</label>
											 <input type="text" value="{{ @$obj->conact_sub_district }}" class="form-control conact_sub_district" name="conact_sub_district"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">  District</label>
											 <input type="text" value="{{ @$obj->conact_district }}" class="form-control conact_district" name="conact_district"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">Road</label>
											 <input type="text" value="{{ @$obj->conact_road }}" class="form-control conact_road" name="conact_road"  {{ $disabledfield }}>
										  </div>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">  City</label>
											 <input type="text" value="{{ @$obj->conact_city }}" class="form-control conact_city" name="conact_city"  {{ $disabledfield }}>
										  </div>
										  <?php $addrstates = []; 
												if($type != 'save') {
													$addrstates = $obj->getStateByCountryId($obj->conact_country_id);
												} else {
													$addrstates = $states;
												}
										  ?>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">State</label>
											 <select class="form-select conact_state_id" name="conact_state_id" {{ $disabledfield }}>
												<option value="">Select State</option>
												<?php foreach($addrstates as $addrstateobj) { ?>
													<option value="{{ $addrstateobj->id }}" 
													<?php if($addrstateobj->id == @$obj->state_id || $default_country_id == $addrstateobj->id) { echo 'selected'; } ?>>{{ $addrstateobj->name }}</option>
												<?php } ?>
											 </select>
										  </div>
										  <?php ?>
										  <div class="col-sm-4">
											 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
											 <input type="text" value="{{ @$obj->conact_zip }}" class="form-control conact_zip" name="conact_zip" {{ $disabledfield }}>
										  </div>
										  <div class="col-12">
											 <label for="inputSelectCountry" class="form-label">Country</label>
											 <select name="conact_country_id" class="form-select conact_country_id" name="" aria-label="Default select example" {{ $disabledfield }}>
												<?php foreach($countries as $countryObj) { ?>
													<option value="{{ $countryObj->id }}" <?php if($countryObj->id == @$obj->conact_country_id || $default_country_id == $countryObj->id) { echo 'selected'; } ?>>{{ $countryObj->name }}</option>
												<?php } ?>
											 </select>
										  </div>
										  <div class="mb-3 mt-10 col-md-12 " >
											 <label for="inputProductDescription" class="form-label">Upload Home Registration </label>
											 <input class="image_upload_doc" type="file" name="conact_document" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple {{ $disabledfield }}>
										  </div>
									</div>
								</div>
									
							</div>
                           
                        </div>
						
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                           <div class="row g-3">
                              <label for="inputFirstName" class="form-label">Social Fund</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_fund" <?php if(@$obj->social_fund == 1) { echo 'checked'; } ?> value="1" {{ $disabledfield }} >
                                    <label class="form-check-label" for="inlineRadio7">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="social_fund" <?php if(@$obj->social_fund == 2) { echo 'checked'; } ?> value="2"  {{ $disabledfield }}>
                                    <label class="form-check-label" for="inlineRadio7">No</label>
                                 </div>
                              </div>
                              <label for="inputFirstName" class="form-label">Social Fund included in salary</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" <?php if(@$obj->social_fund_included_in_salary == 1) { echo 'checked'; } ?> name="social_fund_included_in_salary" value="1" {{ $disabledfield }} checked>
                                    <label class="form-check-label" for="inlineRadio9">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" <?php if(@$obj->social_fund_included_in_salary == 2) { echo 'checked'; } ?> type="radio" name="social_fund_included_in_salary" {{ $disabledfield }} value="2">
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

								<div class="mb-3 mt-10 col-md-12 " >
								<?php foreach($staffDocumentss as $staffDocumentObj) {
									
									$imgpath = "images/staff/".$staffDocumentObj->staff_id."/".$staffDocumentObj->document;
										$img = asset($imgpath);
									?>
									<div id="document_{{ $staffDocumentObj->id }}">
										<img src="{{ $img }}" height="90" width="50">
										<a href="#" class="remove_document" data-id="{{ $staffDocumentObj->id }}">Remove</a>
									</div>
								<?php } ?>
							  </div>
							  
                           </div> 
                        </div>
						<div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
							<div class=" col-sm-2 flux-right">
							    <button type="button" class="btn btn-sm btn-primary px-2 radius-30 add_more_labour">Add more</button>
                              </div>
							<div id="labour_contract_container">
								<?php //foreach($staffLabourContracts as $staffLabourContractObj) { ?>
									@include('staff.staffupdatelabour')
								<?php //} ?>
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
	  
	   <div class="labour_contract_group_clone" style="display:none" data-pos="125000" data-counter="0">
			<div class="labour_contract_group_cl updatelabour ">
				@include('staff.stafflabour')
			</div>
		</div>
	  
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.staff')
      <script>
	  
		function labour_contract_group() {
			
			var clone = $('.labour_contract_group_cl', $('.labour_contract_group_clone')).clone();
			
			var no = $('.labour_contract_group_clone').attr('data-counter');
			var cnt = parseInt(no) - 1;
			
			var posno = parseInt($('.labour_contract_group_cl', $('#labour_contract_container')).length)+1;
			$('.labour_contract', clone).html('Labour Contract '+posno);
			
			
			$('.working_pay_1', clone).attr('name', 'working_pay['+cnt+']');
			$('.working_pay_2', clone).attr('name', 'working_pay['+cnt+']');
			$('.type_of_labour', clone).attr('name', 'type_of_labour['+cnt+']');
			$('.effective_period_start_date', clone).attr('name', 'effective_period_start_date['+cnt+']');
			$('.effective_period_end_date', clone).attr('name', 'effective_period_end_date['+cnt+']');
			$('.position', clone).attr('name', 'position['+cnt+']');
			$('.labour_department', clone).attr('name', 'labour_department['+cnt+']');
			$('.salary_wages_in_contract', clone).attr('name', 'salary_wages_in_contract['+cnt+']');
			$('.increase_salary_be_considered_when', clone).attr('name', 'increase_salary_be_considered_when['+cnt+']');
			$('.salary_promised', clone).attr('name', 'salary_promised['+cnt+']');
			$('.hotel_thb_day_chk', clone).attr('name', 'hotel_thb_day_chk['+cnt+']');
			$('.allowance_thb_day_chk', clone).attr('name', 'allowance_thb_day_chk['+cnt+']');
			$('.allowance_thb_day', clone).attr('name', 'allowance_thb_day['+cnt+']');
			$('.travel_expense_thb_day_chk', clone).attr('name', 'travel_expense_thb_day_chk['+cnt+']');
			$('.travel_expense_thb_day', clone).attr('name', 'travel_expense_thb_day['+cnt+']');
			$('.ot_thb_day_chk', clone).attr('name', 'ot_thb_day_chk['+cnt+']');
			$('.ot_thb_day', clone).attr('name', 'ot_thb_day['+cnt+']');
			$('.food_thb_day', clone).attr('name', 'food_thb_day['+cnt+']');
			$('.sick_leave_chk', clone).attr('name', 'sick_leave_chk['+cnt+']');
			$('.sick_leave', clone).attr('name', 'sick_leave['+cnt+']');
			$('.vocation_leave_chk', clone).attr('name', 'vocation_leave_chk['+cnt+']');
			$('.vocation_leave', clone).attr('name', 'vocation_leave['+cnt+']');
			
			$('.maternity_leave_chk', clone).attr('name', 'maternity_leave_chk['+cnt+']');
			$('.maternity_leave', clone).attr('name', 'maternity_leave['+cnt+']');
			$('.gaurantor_type_chk_1', clone).attr('name', 'gaurantor_type['+cnt+']');
			$('.gaurantor_type_chk_2', clone).attr('name', 'gaurantor_type['+cnt+']');
			$('.gaurantor_title_1', clone).attr('name', 'gaurantor_title['+cnt+']');
			$('.gaurantor_title_2', clone).attr('name', 'gaurantor_title['+cnt+']');
			$('.gaurantor_title_3', clone).attr('name', 'gaurantor_title['+cnt+']');
			$('.gaurantor_name_thi', clone).attr('name', 'gaurantor_name_thi['+cnt+']');
			$('.gaurantor_name_eng', clone).attr('name', 'gaurantor_name_eng['+cnt+']');
			$('.gaurantor_family_name_thai', clone).attr('name', 'gaurantor_family_name_thai['+cnt+']');
			$('.gaurantor_family_name_end', clone).attr('name', 'gaurantor_family_name_end['+cnt+']');
			
			$('.contract_home_address', clone).attr('name', 'contract_home_address['+cnt+']');
			$('.contract_home_building', clone).attr('name', 'contract_home_building['+cnt+']');
			$('.contract_home_sub_distric', clone).attr('name', 'contract_home_sub_distric['+cnt+']');
			$('.contract_home_district', clone).attr('name', 'contract_home_district['+cnt+']');
			$('.contract_home_road', clone).attr('name', 'contract_home_road['+cnt+']');
			$('.contract_home_city', clone).attr('name', 'contract_home_city['+cnt+']');
			$('.contract_home_state', clone).attr('name', 'contract_home_state['+cnt+']');
			$('.contract_home_zip', clone).attr('name', 'contract_home_zip['+cnt+']');
			$('.contract_home_country', clone).attr('name', 'contract_home_country['+cnt+']');
			$('.contract_home_address_check', clone).attr('name', 'contract_home_address_check['+cnt+']');
			$('.contract_address', clone).attr('name', 'contract_address['+cnt+']');
			$('.contract_building', clone).attr('name', 'contract_building['+cnt+']');
			$('.contract_sub_district', clone).attr('name', 'contract_sub_district['+cnt+']');
			$('.contract_district', clone).attr('name', 'contract_district['+cnt+']');
			$('.contract_road', clone).attr('name', 'contract_road['+cnt+']');
			$('.contract_city', clone).attr('name', 'contract_city['+cnt+']');
			$('.contract_state', clone).attr('name', 'contract_state['+cnt+']');
			$('.contract_zip_code', clone).attr('name', 'contract_zip_code['+cnt+']');
			$('.contract_country', clone).attr('name', 'contract_country['+cnt+']');
			
			$('.guarantor_office_name', clone).attr('name', 'guarantor_office_name['+cnt+']');
			$('.guarantor_address', clone).attr('name', 'guarantor_address['+cnt+']');
			$('.guarantor_building', clone).attr('name', 'guarantor_building['+cnt+']');
			$('.guarantor_sub_district', clone).attr('name', 'guarantor_sub_district['+cnt+']');
			$('.guarantor_district', clone).attr('name', 'guarantor_district['+cnt+']');
			$('.guarantor_road', clone).attr('name', 'guarantor_road['+cnt+']');
			$('.guarantor_city', clone).attr('name', 'guarantor_city['+cnt+']');
			$('.guarantor_state_id', clone).attr('name', 'guarantor_state_id['+cnt+']');
			$('.guarantor_zip', clone).attr('name', 'guarantor_zip['+cnt+']');
			$('.guarantor_country_id', clone).attr('name', 'guarantor_country_id['+cnt+']');
			$('.guarantor_salary', clone).attr('name', 'guarantor_salary['+cnt+']');
			$('.guarantor_amount', clone).attr('name', 'guarantor_amount['+cnt+']');
			$('.upload_contact_sign_doc', clone).attr('name', 'upload_contact_sign_doc['+cnt+'][]');

			$('#labour_contract_container').append(clone);
			
			$('.labour_contract_group_clone').attr('data-counter', cnt);
			
		}
	  
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
					
				},
			});
		}
		
		function dependdropdownclone(val, target, name) {
			var url = $("meta[name=url]").attr("content");
			$.ajax({
				url: "{{url('getregionaldata')}}",
				dataType : "json",
				type: "get",
				data : {'value':val, 'name':name},
				success : function(response) {
					//alert(target+cnt);
					var list = target; 
					list.empty();
					list.append(new Option('Select '+name, ''));
					$.each(response, function(index, item) {
						list.append(new Option(item.name, item.id, true));
					});
					
				},
			});
		}
		

         $(document).ready(function() {
			 
				
				$('body').on('change', '.hotel_thb_day_chk', function() {
					var target = $('.hotel_thb_day',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.allowance_thb_day_chk', function() {
					var target = $('.allowance_thb_day',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.travel_expense_thb_day_chk', function() {
					var target = $('.travel_expense_thb_day',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.ot_thb_day_chk', function() {
					var target = $('.ot_thb_day',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.food_thb_day_chk', function() {
					var target = $('.food_thb_day',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.sick_leave_chk', function() {
					var target = $('.sick_leave',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.vocation_leave_chk', function() {
					var target = $('.vocation_leave',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
				
				$('body').on('change', '.maternity_leave_chk', function() {
					var target = $('.maternity_leave',$(this).parent().parent());
					target.attr('disabled', 'disabled');
					if($(this).prop('checked')) {
						target.removeAttr('disabled');
					}
				});
			 
				$('body').on('click', '.add_more_labour', function() {
					
					labour_contract_group();
					return false;
				});
			 
				<?php if($type == 'save') { ?>
				
					labour_contract_group();
				<?php } else { ?>
					var clonecon = $('.updatelabour').length;
					if(clonecon == 0) {
						labour_contract_group();
					}
				<?php } ?>
			
			$('body').on('click', '.removelabourimg', function() {
				 var id = $(this).attr('data-id');
				if (confirm('Are you sure you want remove this image?')) {
					$.ajax({
						url: "{{url('staff/removelabourimagebyid')}}",
						dataType : "json",
						type: "post",
						data : {'id': id, "_token": "{{ csrf_token() }}"},
						success : function(response) {
							if(response.status == 'success') {
								$('.labour_image_'+id).remove();
							}
						},
					});
				} 
				
				return false;
			 });
			
			 $('body').on('click', '.remove_document', function() {
				 var id = $(this).attr('data-id');
				if (confirm('Are you sure you want remove this image?')) {
					$.ajax({
						url: "{{url('staff/removeimagebyid')}}",
						dataType : "json",
						type: "post",
						data : {'id': id, "_token": "{{ csrf_token() }}"},
						success : function(response) {
							if(response.status == 'success') {
								$('#document_'+id).remove();
							}
						},
					});
				} 
				
				return false;
			 });
			 
			$('body').on('change', '.card_type', function() {
				var val = $(this).val();
				$('.card_type_div').addClass('d-none');
				$('.passport_type').addClass('d-none');
				if(val == 1)
				{
					$('.card_type_div').removeClass('d-none');
				} else if(val == 2)
				{
					$('.passport_type').removeClass('d-none');
				}
			});
			 
			 $('body').on('change', '.conact_address_check', function() {
				 
				 $("input[name=head_office_country_id]").val();
				 $("input[name=head_office_state_id]").val();
				 
				 
				 $('.conact_address').val('');
				$('.conact_building').val('');
				$('.conact_sub_district').val('');
				$('.conact_district').val('');
				$('.conact_road').val('');
				$('.conact_city').val('');
				$('.conact_state_id').val('');
				$('.conact_zip').val('');
				$('.conact_country_id').val('');
				 if($(this).prop('checked')) {
					/*  var head_office_country_id = $('.head_office_country_id').val();
					 
					 $('.delivery_country_id option[value="'+head_office_country_id+'"]').prop('selected', true);
					 
					 //alert($("input[name=head_office_country_id]").val());
					 $('.delivery_address').val($("input[name=head_office_address]").val());
					 $('.delivery_building').val($("input[name=head_office_building]").val());
					  */
					
					$('.conact_address').val($('.home_address').val());
					$('.conact_building').val($('.contact_address_building').val());
					$('.conact_sub_district').val($('.home_sub_district').val());
					$('.conact_district').val($('.home_district').val());
					$('.conact_road').val($('.home_road').val());
					$('.conact_city').val($('.home_city').val());
					$('.conact_state_id').val($('.home_state_id').val());
					$('.conact_zip').val($('.home_zip').val());
					$('.conact_country_id').val($('.home_country_id').val());
					
				 } else {
					 
				 }
			});
			 
			<?php if($type == 'save') { ?>
				var country = 237;
				/* $('.contact_country option[value="'+country+'"]').prop('selected', true);
				$('.contact_country option[value="'+country+'"]').prop('selected', true);
				$('.conact_country_id option[value="'+country+'"]').prop('selected', true);
				$('.country_id option[value="'+country+'"]').prop('selected', true); */
				
				setTimeout(function() {
					//dependdropdown(country, '.home_state_id ', '', 'State');
					//dependdropdown(country, '.conact_state_id ', '', 'State');
					
				}, 1000);
				
			<?php } ?>
			
			 
			 
			 $('body').on('change', '.home_country_id', function() {
				var country = $(this).val();
				
				var target = '.home_state_id';
				
				dependdropdown(country, target, '', 'State');
			});
			 
			 $('body').on('change', '.contract_country', function() {
				var country = $(this).val();
				
				var target = $('.contract_state',$(this).parent().parent());
				
				dependdropdownclone(country, target, 'State');
			});
			
			 $('body').on('change', '.conact_country_id', function() {
				var country = $(this).val();
				
				var target = '.conact_state_id';
				
				dependdropdown(country, target, '', 'State');
			});
			
			$('body').on('change', '.guarantor_country_id', function() {
				var country = $(this).val();
				
				var target = $('.guarantor_state_id',$(this).parent().parent());
				
				dependdropdownclone(country, target, 'State');
			});
			 
         //contract_home_country
			$('body').on('change', '.contract_home_country', function() {
				var country = $(this).val();
				
				var target = $('.contract_home_state',$(this).parent().parent());
				
				dependdropdownclone(country, target, 'State');
			});
			
			/* $('body').on('change', '.contract_home_country', function() {
				var country = $(this).val();
				
				var target = $('.contract_home_state',$(this).parent().parent());
				
				dependdropdownclone(country, target, 'State');
			}); */
			
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