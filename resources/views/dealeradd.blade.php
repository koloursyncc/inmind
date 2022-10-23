<!doctype html>
<html lang="en">
   @include('layout.header')
   
<?php
$installment = array(
	1 => 'PO Confirmed by Payment',
	2 => 'Sample Piece ready',
	3 => 'Work Progress 50%',
	4 => 'Work Progress 80%',
	5 => 'Work Progress 100%',
	6 => 'Original B/L is shown',
);
/* $brands = array(
	1 => 'Meha',
	2 => 'Inmind'
); */

$currencydata = array(
	1 => 'USD',
	2 => 'THB',
	3 => 'EUR',
	4 => 'JPY',
	5 => 'INR',
	6 => 'RMB'
);

$Incotermdata = array(
	1 => 'EXW',
	2 => 'CFR',
	3 => 'CIF',
	4 => 'FOB',
	5 => 'DDP'
);

$fromdata = array(
	1 => 'Delivery Day',
	2 => 'Goods received at Customer W/H',
	3 => 'Goods Sold'
);

$installment_store = [
	1 => 'PO Confirmed by Payment',
	2 => 'Sample Piece ready',
	3 => 'Work Progress 50%',
	4 => 'Work Progress 80%',
	5 => 'Work Progress 100%',
	6 => 'Original B/L is shown'
];

$disabledfield = '';
$customer_brand_id = '';
$customer_name = '';
$customer_family = '';
$customer_title = '';
$customer_currency = '';
$customer_incoterm = '';
$customer_place_of_delivery_destination = '';
$customer_credit_term_days = '';
$customer_from = '';
$customer_incoterm_type = '';
$customer_contact_person = '';
$customer_email = '';
$customer_bank_name = '';
$customer_bank_address = '';
$customer_swift = '';
$customer_account_number = '';
$customer_beneficiary_name = '';
$customer_beneficiary_address = '';
$customer_type = '';
$customer_invoice = '';
$id ='';
$url = '';
$payment_account_number = '';
$payment_bank_name = '';
$payment_branch = '';
$payment_beneficiary = '';

if($type == 'save')
{
	$url = url('save/customer');
}
else if($type == 'edit')
{
	$url = url('update/customer');
}

if($type != 'save')
{
	$id = $obj->id;
	if($obj != null) {
		$customer_brand_id = $obj->brand_id;
		$customer_name = $obj->name;
		$customer_family = $obj->family;
		$customer_title = $obj->title;
		$customer_currency = $obj->currency;
		$customer_incoterm = $obj->incoterm;
		$customer_place_of_delivery_destination = $obj->place_of_delivery_destination;
		$customer_credit_term_days = $obj->credit_term_days;
		$customer_from = $obj->from;
		$customer_incoterm_type = $obj->incoterm_type;
		$customer_contact_person = $obj->contact_person;
		$customer_email = $obj->email;
		$customer_bank_name = $obj->bank_name;
		$customer_bank_address = $obj->bank_address;
		$customer_swift = $obj->swift;
		$customer_account_number = $obj->account_number;
		$customer_beneficiary_name = $obj->beneficiary_name;
		$customer_beneficiary_address = $obj->beneficiary_address;
		$customer_type = $obj->type;
		$customer_invoice = $obj->invoice;
		$payment_bank_name = $obj->payment_bank_name;
		$payment_account_number = $obj->payment_account_number;
		$payment_branch = $obj->payment_branch;
		$payment_beneficiary = $obj->payment_beneficiary;
	}
}

if($type == 'view')
{
	$disabledfield = 'disabled';
}
?>
   
   <body>
      <!--wrapper-->
      <div class="wrapper">
      <!--start header -->
      @include('layout.menu')
      <!--start page wrapper -->
      <div class="page-wrapper">
      <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Customer</div>
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
            <div class="col-xl-12 ">
               <div class="card">
                  <div class="card-body">
                     <!-- SmartWizard html -->
					 <form id="customerform" data-url="{{ $url }}">
						@csrf
						
						<?php if($type == 'edit') { ?>
							<input type="hidden" name="id" value="{{ $id }}" >
						<?php } ?>
						
						 <div id="smartwizard">
							<ul class="nav">
							   <li class="nav-item">
								  <a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
								  <br>Customer Details</a>
							   </li>
							   <li class="nav-item">
								  <a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
								  <br>Contact Person</a>
							   </li>
							   <li class="nav-item">
								  <a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
								  <br>Payment Term</a>
							   </li>
							   <li class="nav-item">
								  <a class="nav-link" href="#step-4">	<strong>Step 4</strong> 
								  <br>Bank Details</a>
							   </li>
							</ul>
							<div class="tab-content">
							   <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
								  <label for="formFile" class="form-label">Brand</label>
								  <select class="form-select mb-3 brand_id" name="brand_id" aria-label="Default select example" {{ $disabledfield }}>
									 <option value="">Select Brand </option>
									<?php foreach($brands as $brandkey => $brandval) { ?>
										<option value="{{ $brandval->id }}" <?php if($customer_brand_id == $brandval->id) { echo 'selected'; } ?>>{{ $brandval->name }}</option>
									<?php } ?>
								  </select>
								  <label for="formFile" class="form-label">Type of Customer</label>
								  <div style="clear:both"></div>
								  <div class="form-check form-check-inline">
									 <input class="form-check-input wholesale type_val" type="radio" name="type" <?php if($customer_type == 1) { echo 'checked'; } ?> value="1" {{ $disabledfield }}>
									 <label class="form-check-label" for="inlineRadio1">Wholesale</label>
								  </div>
								  <div class="form-check form-check-inline">
									 <input class="form-check-input retail type_val" type="radio" name="type" <?php if($customer_type == 2) { echo 'checked'; } ?> value="2" {{ $disabledfield }}>
									 <label class="form-check-label" for="inlineRadio1">Retail</label>
								  </div>
								  <div class="form-check form-check-inline">
									 <input class="form-check-input type type_val" type="radio" name="type" <?php if($customer_type == 3) { echo 'checked'; } ?> value="3" {{ $disabledfield }}>
									 <label class="form-check-label online_shopping" for="inlineRadio1">Online Shopping</label>
								  </div>
								  <div style="clear:both"></div>
								  <label for="formFile" class="form-label">Title</label>
								  <div style="clear:both"></div>
								  <div class="form-check form-check-inline mr">
									 <input class="form-check-input  title_val" type="radio" name="title" <?php if($customer_title == 1) { echo 'checked'; } ?> value="1" {{ $disabledfield }}>
									 <label class="form-check-label " for="inlineRadio1">Mr.</label>
								  </div>
								  <div class="form-check form-check-inline ms">
									 <input class="form-check-input  title_val" type="radio" name="title" <?php if($customer_title == 2) { echo 'checked'; } ?> value="2" {{ $disabledfield }}>
									 <label class="form-check-label " for="inlineRadio1">Ms.</label>
								  </div>
								  <div class="form-check form-check-inline coltd">
									 <input class="form-check-input  title_val" type="radio" name="title" <?php if($customer_title == 3) { echo 'checked'; } ?> value="3" {{ $disabledfield }}>
									 <label class="form-check-label " for="inlineRadio1">Co. Ltd</label>
								  </div>
								  <div class="form-check form-check-inline plc">
									 <input class="form-check-input  title_val" type="radio" name="title" <?php if($customer_title == 4) { echo 'checked'; } ?> value="4" {{ $disabledfield }}>
									 <label class="form-check-label " for="inlineRadio1">Plc</label>
								  </div>
								  <div class="form-check form-check-inline partltd">
									 <input class="form-check-input  title_val" type="radio" name="title" <?php if($customer_title == 5) { echo 'checked'; } ?> value="5" {{ $disabledfield }}>
									 <label class="form-check-label " for="inlineRadio1">Part Ltd.</label>
								  </div>
								  <div class="form-check form-check-inline www">
									 <input class="form-check-input  title_val" type="radio" name="title" <?php if($customer_title == 6) { echo 'checked'; } ?> value="6" {{ $disabledfield }}>
									 <label class="form-check-label " for="inlineRadio1">www</label>
								  </div>
								  <div style="clear:both"></div>
									<div class="row g-3">
										<div class="col-sm-4">
											<label for="formFile" class="form-label">Customer Name</label>
											<input class="form-control mb-3" value="{{ $customer_name }}" type="text" placeholder="enter dealer name" name="name" aria-label="default input example" {{ $disabledfield }}>
										</div>
										<div class="col-sm-4 fmly">
											<label for="formFile" class="form-label">Family Name</label>
											<input class="form-control mb-3" value="{{ $customer_family }}" type="text" placeholder="enter dealer family" name="family" aria-label="default input example" {{ $disabledfield }}>
										</div>
										
										<div class="col-sm-1">
											<label for="formFile" class="form-label">Tel</label>
											<select  name="country_code" class="form-select country_code" {{ $disabledfield }}>
												<option value="">Select Country</option>
												<?php foreach($countries as $country) { ?>
													<option  value="{{ $country->id }}" <?php if($country->id == @$obj->country_code) { echo 'selected'; } else if($country->id == 237) { echo 'selected'; }  ?>>{{ $country->phone_code }}</option>
												<?php } ?>
											</select>
											
										</div>
										
										<div class="col-sm-3">
											<label for="formFile" class="form-label">Number</label>
											<input class="form-control mb-3" value="{{ @$obj->country_number }}" type="text" name="country_number" aria-label="default input example" {{ $disabledfield }}>
										</div>
									</div>
									
								  <div class="row g-3 headoffice">
									
									 <div class="row g-3">
										  <h6>Head office address by Registration Document</h6>
										 <div class="col-sm-4">
											<label for="inputFirstName" class="form-label">Address no.</label>
											<input type="text" class="form-control address" name="head_office_address" value="{{ @$obj->head_office_address }}" {{ $disabledfield }}>
										 </div>
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">Road</label>
											<input type="text" class="form-control head_office_road"  name="head_office_road" value="{{ @$obj->head_office_road }}" {{ $disabledfield }}>
										 </div>
										 
										 <div class="col-sm-4">
											<label for="inputLastName" class="form-label">Building / Village</label>
											<input type="text" class="form-control building" name="head_office_building" value="{{ @$obj->head_office_building }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">Sub District</label>
											<input type="text" class="form-control sub_district"  name="head_office_sub_district" value="{{ @$obj->head_office_sub_district }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  District</label>
											<input type="text" class="form-control district_id"  name="head_office_district" value="{{ @$obj->head_office_district }}" {{ $disabledfield }}>
										 </div>
										 
										 
										  <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  City</label>
											<input type="text" class="form-control city"  name="head_office_city" value="{{ @$obj->head_office_city }}" {{ $disabledfield }}>
										 </div>
										 
										 <div class="col-4 mb-3">
											<label for="inputSelectCountry" class="form-label ">Country</label>
											<select  name="head_office_country_id" class="form-select head_office_country_id" {{ $disabledfield }}>
												<option value="">Select Country</option>
												<?php foreach($countries as $country) { ?>
													<option  value="{{ $country->id }}" <?php if($country->id == @$obj->head_office_country_id) { echo 'selected'; } ?>>{{ $country->name }}</option>
												<?php } ?>
											</select>
										 </div>
										 
										 
										 <?php 
											$stateslist = [];
											if($type != 'save') {
												$stateslist = $obj->getStateByCountryId($obj->head_office_country_id); 
											}
										 
										 ?>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">State / Province</label>
											<select name="head_office_state_id" class="form-select state_id state_id_head" {{ $disabledfield }}>
												<option value="">Select State</option>
												<?php foreach($stateslist as $stateObj) { ?>
													<option value="{{ $stateObj->id }}" <?php if($stateObj->id == $obj->head_office_state_id) { echo 'selected'; } ?>>{{ $stateObj->name }}</option>
												<?php } ?>
											</select>
										 </div>
										 
										
										 
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  Zip Code</label>
											<input name="head_office_zipcode" type="text" class="form-control zipcode" value="{{ @$obj->head_office_zipcode }}" {{ $disabledfield }}>
										 </div>
										 
										</div>
									
										<div class="row g-3 delivery_check_content">
										  <h6><input name="delivery_check" class="form-check-input delivery_check" type="checkbox" value="1" id="flexCheckChecked" > It such warehouse or depoot address same as home address</h6>
										  
										 <div class="col-sm-4">
											<label for="inputFirstName" class="form-label">Address no.</label>
											<input type="text" class="form-control address delivery_address" name="delivery_address" value="{{ @$obj->delivery_address }}" {{ $disabledfield }}>
										 </div>
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">Road</label>
											<input type="text" class="form-control head_office_road delivery_road"  name="delivery_road" value="{{ @$obj->delivery_road }}" {{ $disabledfield }}>
										 </div>
										 
										 <div class="col-sm-4">
											<label for="inputLastName" class="form-label">Building / Village</label>
											<input type="text" class="form-control building delivery_building" name="delivery_building" value="{{ @$obj->delivery_building }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">Sub District</label>
											<input type="text" class="form-control sub_district delivery_sub_district"  name="delivery_sub_district" value="{{ @$obj->delivery_sub_district }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  District</label>
											<input type="text" class="form-control district_id delivery_district_id"  name="delivery_district_id" value="{{ @$obj->delivery_district_id }}" {{ $disabledfield }}>
										 </div>
										 
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  City</label>
											<input type="text" class="form-control city delivery_city"  name="delivery_city" value="{{ @$obj->delivery_city }}" {{ $disabledfield }}>
										 </div>
										 
										  <div class="col-4 mb-3">
											<label for="inputSelectCountry" class="form-label ">Country</label>
											<select  name="delivery_country_id" class="form-select delivery_country_id" {{ $disabledfield }}>
												<option value="">Select Country</option>
												<?php foreach($countries as $country) { ?>
													<option  value="{{ $country->id }}" <?php if($country->id == @$obj->delivery_country_id) { echo 'selected'; } ?>>{{ $country->name }}</option>
												<?php } ?>
											</select>
										 </div>
										 
										 <?php 
											$stateslist = [];
											
											if($type != 'save') {
												$stateslist = $obj->getStateByCountryId($obj->delivery_country_id); 
											}
										 ?>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">State / Province</label>
											<select name="delivery_state_id" class="form-select state_id state_id_delivery" {{ $disabledfield }}>
												<option value="">Select State</option>
												<?php foreach($stateslist as $stateObj) { ?>
													<option value="{{ $stateObj->id }}" <?php if($stateObj->id == $obj->delivery_state_id) { echo 'selected'; } ?>>{{ $stateObj->name }}</option>
												<?php } ?>
											</select>
										 </div>
										 
										 
										 
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  Zip Code</label>
											<input name="delivery_zipcode" type="text" class="form-control zipcode delivery_zipcode" value="{{ @$obj->delivery_zipcode }}" {{ $disabledfield }}>
										 </div>
										
										</div>
								  </div>
							   </div>
							   <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
									<h4 style="cursor:pointer" class="contact_add"> Add More</h4>
									<div id="contact_detail">
										<?php 
										$personCount = 0;
										foreach($persons as $personK => $personObj) {
											$personCount++;
												$pId = $personObj->id;
											?>
										<div class="row g-3">
											 <h6>Contact Person</h6>
											 <div class="col-sm-4">
												<label for="inputFirstName" class="form-label">Name</label>
												<input type="text" class="form-control contact_name" name="contact_name[{{ $pId }}]" value="{{ @$personObj->name }}" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputLastName" class="form-label">Family Name</label>
												<input type="text" class="form-control contact_family_name" name="contact_family_name[{{ $pId }}]" value="{{ @$personObj->family_name }}" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">Position</label>
												
												<select class="form-control contact_position" name="contact_position[{{ $pId }}]">
													<option value="">Select</option>
													<option value="Owner Manager" <?php if(@$personObj->position == 'Owner Manager') { echo 'selected'; } ?>>Owner Manager</option>
													<option value="Sale Technician" <?php if(@$personObj->position == 'Sale Technician') { echo 'selected'; } ?>>Sale Technician</option>
												</select>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">  Mobile</label>
												<input type="text" class="form-control contact_mobile" name="contact_mobile[{{ $pId }}]" value="{{ @$personObj->mobile }}" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="text" class="form-control contact_email" name="contact_email[{{ $pId }}]" value="{{ @$personObj->email }}" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<div class="mb-3">
												   <label class="form-label">Date of Birth:</label>
												   <input type="date" class="form-control contact_dob" name="contact_dob[{{ $pId }}]" value="{{ @$personObj->dob }}" {{ $disabledfield }}>
												</div>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">Line</label>
												<input type="text" class="form-control contact_line" name="contact_line[{{ $pId }}]" value="{{ @$personObj->line }}" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">  Remark</label>
												<textarea type="text" class="form-control contact_remark" name="contact_remark[{{ $pId }}]" value="{{ @$personObj->remark }}" {{ $disabledfield }}>{{ @$personObj->remark }}</textarea>
											 </div>
										  </div>
										<?php } ?>
									</div>
								  
							   </div>
							   <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
								 
								  <div class="form-check form-check-inline"> <label for="inputFirstName" class="form-label">Invoice</label><br>
									<select class="form-control" name="invoice" {{ $disabledfield }}>
										<option value="">Select Invoice</option>
										<option value="1" <?php if($customer_invoice == 1) { echo 'selected'; } ?>>Sale</option>
										<option value="2" <?php if($customer_invoice == 2) { echo 'selected'; } ?>>Consignment</option>
									</select>
									<?php /*/ ?>
									 <input class="form-check-input" type="radio" <?php if($customer_invoice == 1) { echo 'checked'; } ?> name="invoice" id="" value="1" {{ $disabledfield }}>
									 <label class="form-check-label" for="inlineRadio1">Sale</label>
								  </div>
								  <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="invoice" <?php if($customer_invoice == 2) { echo 'checked'; } ?> value="2" {{ $disabledfield }}>
									 <label class="form-check-label" for="inlineRadio1">Consignment</label>
								  </div>
								  <?php */ ?>
								  <div class="row g-3">
									 <div class="col-sm-4">
										<label for="inputFirstName" class="form-label">Currency</label>
										<select class="form-select currency" name="currency" aria-label="Default select example" {{ $disabledfield }}>
											<?php foreach($countries as $currencykey => $currencyval) { ?>
												<option value="{{ $currencyval->id }}" <?php if(@$obj->currency == $currencyval->id) { echo 'selected'; } ?>>{{ $currencyval->currency }}</option>
											<?php } ?>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputLastName" class="form-label">Incoterm</label>
										<select class="form-select incoterm" name="incoterm" aria-label="Default select example" {{ $disabledfield }}>
											<?php foreach($Incotermdata as $Incotermkey => $Incotermval) { ?>
												<option value="{{ $Incotermkey }}" <?php if(@$obj->currency == $currencykey) { echo 'selected'; } ?>>{{ $Incotermval }}</option>
											<?php } ?>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">Place of Delivery/Destination</label>
										<input type="text" value="{{ $customer_place_of_delivery_destination }}" class="form-control place_of_delivery_destination" name="place_of_delivery_destination"  {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">Credit Terms(days)</label>
										<input type="text" value="{{ $customer_credit_term_days }}" class="form-control credit_term_days" name="credit_term_days" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputFirstName" class="form-label">From</label>
										<select class="form-select from" name="from" aria-label="Default select example" {{ $disabledfield }}>
											<?php foreach($fromdata as $fromdatakey => $fromdataval) { ?>
												<option value="{{ $fromdatakey }}"  <?php if(@$obj->from == $fromdatakey) { echo 'selected'; } ?>>{{ $fromdataval }}</option>
											<?php } ?>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputLastName" class="form-label">Incoterm</label>
										<select class="form-select incoterm_type" name="incoterm_type" aria-label="Default select example" {{ $disabledfield }}>
										   <option value="2" <?php if(@$obj->incoterm_type == 1) { echo 'selected'; } ?>>Post </option>
										   <option value="3" <?php if(@$obj->incoterm_type == 2) { echo 'selected'; } ?>>Email</option>
										   <option value="3" <?php if(@$obj->incoterm_type == 3) { echo 'selected'; } ?>>Post & Email</option>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label"> Contact Person</label>
										<select class="form-select contact_person" name="contact_person" aria-label="Default select example" {{ $disabledfield }}>
										   <option value="">Select option </option>
										   <option value="1" <?php if(@$obj->contact_person == 1) { echo 'selected'; } ?>>Email</option>
										   <option value="2" <?php if(@$obj->contact_person == 2) { echo 'selected'; } ?>>Post & Email</option>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">Email</label>
										<input type="text" value="{{ $customer_email }}" class="form-control email" name="email" {{ $disabledfield }}>
									 </div>
									 
									 <a href="#" id="add_installment_store">Add More</a>
									 <div id="installment_store">
										
										<?php foreach($installments as $installmentk => $installmentObj) {
												$installmentkinc = ++$installmentk;
											?>
											<div class="row">
											 <div class="col-md-4">
												<label for="inputEmailAddress" class="form-label"> Installment {{ $installmentkinc }}</label>
												<input type="text" value="{{ $installmentObj->installment_1 }}" name="installment_clone[{{ $installmentObj->id }}]" class="form-control" {{ $disabledfield }}>
											 </div>
											 <div class="col-md-4">
												<label for="inputEmailAddress" class="form-label"> Installment {{ $installmentkinc }}</label>
												<select class="form-select" name="installment_clone_option[{{ $installmentObj->id }}]" id="" aria-label="Default select example" {{ $disabledfield }}>
												  <?php foreach($installment as $installmentValueKey => $installmentValue) { ?>
													<option value="{{ $installmentValueKey }}"  <?php if($installmentObj->installment_2 == $installmentValueKey) { echo 'selected'; } ?>>{{ $installmentValue }}</option>
													<?php } ?>
												</select>
											 </div>
											</div>
										<?php } ?>
									 </div>
								  </div>
							   </div>
							   <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
									<h3>Customer bank info</h3>
								  <div class="row g-3">
									 <div class="col-sm-4">
										<label for="inputFirstName" class="form-label">Bank Name</label>
										<input type="text" value="{{ $customer_bank_name }}" class="form-control bank_name" name="bank_name" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputLastName" class="form-label">Bank Address</label>
										<input type="text" value="{{ $customer_bank_address }}" class="form-control bank_address" name="bank_address" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">SWIFT</label>
										<input type="text" value="{{ $customer_swift }}" class="form-control swift" name="swift" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label"> A/C No.</label>
										<input type="text" value="{{ $customer_account_number }}" class="form-control account_number" name="account_number" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">Beneficiary Name</label>
										<input type="text" value="{{ $customer_beneficiary_name }}" class="form-control beneficiary_name" name="beneficiary_name" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">  Beneficiary Address</label>
										<textarea type="text" value="{{ $customer_beneficiary_address }}" class="form-control beneficiary_address" name="beneficiary_address" {{ $disabledfield }}>{{ $customer_beneficiary_address }}</textarea>
									 </div>
								  </div>
								  <?php 
										$payment_branch_dnone = $payment_beneficiary  = $payment_account_number = 'd-none';
											if(@$obj->payment_branch != '') {
												$payment_branch_dnone = '';
											}
											
											if(@$obj->payment_beneficiary != '') {
												$payment_beneficiary = '';
											}
											
											if(@$obj->payment_account_number != '')
											{
												$payment_account_number = '';
											}
										?>
								  <h3>Payment bank info</h3>
									<div class="row g-3">
										<div class="col-sm-4">
											<label for="inputFirstName" class="form-label">Payment Bank Name</label>
											<select class="form-control payment_bank_name" name="payment_bank_name" {{ $disabledfield }}>
												<option value="">Select</option>
												<option value="Bangkok Bank" <?php if($payment_bank_name == 'Bangkok Bank') { echo 'selected'; } ?>>Bangkok Bank</option>
												<option value="Kasikom Bank" <?php if($payment_bank_name == 'Kasikom Bank') { echo 'selected'; } ?>>Kasikom Bank</option>
												<option value="Krungsri Bank" <?php if($payment_bank_name == 'Krungsri Bank') { echo 'selected'; } ?>>Krungsri Bank</option>
											</select>
										</div>
										
										<div class="col-sm-4 branch_name_container {{ $payment_branch_dnone }}">
											<label for="inputFirstName" class="form-label">Branch</label>
											<span class="branch_name">{{ @$obj->payment_branch }}</span>
											<input type="hidden" class="payment_branch" name="payment_branch" value="{{ @$obj->payment_branch }}" />
										</div>
									</div>
									
									<div class="row g-3 ">
										<div class="col-sm-4 bankac">	
											<label for="inputFirstName" class="form-label">A/C Number</label>
											<select class="form-control payment_account_number" name="payment_account_number" {{ $disabledfield }}>
												<option value="">Select</option>
											</select>
										</div>
											
										<div class="col-sm-4 beneficiary_name_container {{ $payment_beneficiary }}">
											<label for="inputFirstName" class="form-label">Beneficiary Name</label>
											<input type="hidden" class="payment_beneficiary" name="payment_beneficiary" value="{{ @$obj->payment_beneficiary }}" />
											<span class="beneficiary_name">{{ @$obj->payment_beneficiary }}</span>
										</div>
	
									</div>
									
									
							</div>
						 </div>
					 </form>
                  </div>
               </div>
            </div>
            <!--end row-->
         </div>
      </div>
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
<div class="headofficeclone_d_none" style="display:none" data-counter="0" data-pos="2500000">
	<div class="headofficeclone">	 
		 <div class="row g-3">
			  <h6>Head office address by certified document</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Address no.</label>
				<input type="text" class="form-control address" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Building / Village</label>
				<input type="text" class="form-control building" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Sub District</label>
				<input type="text" class="form-control sub_district" id="" {{ $disabledfield }}">
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  District</label>
				<input type="text" class="form-control district_id" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Road</label>
				<input type="text" class="form-control road" id="" {{ $disabledfield }}>
			 </div>
			 
			  <div class="col-4 mb-3">
				<label for="inputSelectCountry" class="form-label ">Country</label>
				<select class="form-select country_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select Country</option>
					<?php foreach($countries as $country) { ?>
						<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
					<?php } ?>
				</select>
			 </div>
			 
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">State</label>
				<select class="form-select state_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select State</option>
					
				</select>
			 </div>
			 
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  City</label>
				<input type="text" class="form-control city" id="" {{ $disabledfield }}>
			 </div>
			 
			 
			 
			 
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Zip Code</label>
				<input type="text" class="form-control zipcode" id="" {{ $disabledfield }}>
			 </div>
			
		</div>
	</div>
</div>

<div class="contactpersoncontent_d_none" style="display:none" data-counter="0" data-pos="1">
	<div class="contactpersoncontent">
		<div class="row">
			<div class="col-md-4">
				<label for="inputEmailAddress" class="form-label installment_clone_lavel"> Installment 1</label>
				<input type="text" class="form-control installment_clone" {{ $disabledfield }}>
			 </div>
			 <div class="col-md-4">
				<label for="inputEmailAddress" class="form-label installment_clone_lavel"> Installment 1</label>
				<select class="form-select installment_clone_option" id="" aria-label="Default select example" {{ $disabledfield }}>
					<?php foreach($installment_store as $installment_store_key => $installment_store_val) { ?>
						<option value="{{ $installment_store_key }}">{{ $installment_store_val }}</option>
					<?php } ?>
				</select>
			 </div>
			 <div class="col-md-4">
				<h4 class="remove_installment">Remove</h4>
			 </div>
		 </div>
	</div>
</div>


<div class="contact_detail_d_none" style="display:none" data-counter="0" data-pos="1">
	
		
		<div class="row g-3 contact_detail_html">
			 <h6>Contact Person</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Name</label>
				<input type="text" class="form-control contact_name" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Family Name</label>
				<input type="text" class="form-control contact_family_name" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Position</label>
				
				<select class="form-control contact_position" {{ $disabledfield }}>
					<option value="">Select</option>
					<option value="Owner Manager" >Owner Manager</option>
					<option value="Sale Technician" >Sale Technician</option>
				</select>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Mobile</label>
				<input type="text" class="form-control contact_mobile" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Email</label>
				<input type="text" class="form-control contact_email" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<div class="mb-3">
				   <label class="form-label">Date of Birth:</label>
				   <input type="date" class="form-control contact_dob"" {{ $disabledfield }}>
				</div>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Line</label>
				<input type="text" class="form-control contact_line" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Remark</label>
				<textarea type="text" class="form-control contact_remark"  {{ $disabledfield }}></textarea>
			 </div>
			 <div class="col-sm-4">
				<h4 class="removeContactPerson">  Remove</h4>
			 </div>
		  </div>
		
</div>

<div class="payment_bank_none" style="display:none">
	<div class="payment_bank_pc_1">	
		<label for="inputFirstName" class="form-label">A/C Number</label>
		<select class="form-control payment_account_number" name="payment_account_number" {{ $disabledfield }}>
			<option value="">Select</option>
			<option value="058-301795-9" >058-301795-9</option>
			<option value="058-057010-9" >058-057010-9</option>
		</select>
	</div>
	
	<div class=" payment_bank_pc_2">	
		<label for="inputFirstName" class="form-label">A/C Number</label>
		<select class="form-control payment_account_number" name="payment_account_number" {{ $disabledfield }}>
			<option value="">Select</option>
			<option value="655-2-13419-0" >655-2-13419-0</option>
		</select>
	</div>
	
	<div class="payment_bank_pc_3">	
		<label for="inputFirstName" class="form-label">A/C Number</label>
		<select class="form-control payment_account_number" name="payment_account_number" {{ $disabledfield }}>
			<option value="">Select</option>
			<option value="315-1-31039-4" >315-1-31039-4</option>
		</select>
	</div>
</div>
	  
      @include('layout.customer')
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
			
			<?php if($type == 'save') { ?>
				
				/* setTimeout(function() {
					
				
				}, 500); */
			<?php } ?>
		},
	});
}

function addHeadOffice()
{
	var clone = $('.headofficeclone', $('.headofficeclone_d_none')).clone();
				
	var no = $('.headofficeclone_d_none').attr('data-counter');
	var posno = $('.headofficeclone_d_none').attr('data-pos');
	
	var total = parseInt(no) - 1;
	var postotal = parseInt(posno) + 1;
	
	$('.address', clone).attr('name', 'address['+total+']');
	$('.building', clone).attr('name', 'building['+total+']');
	$('.sub_district', clone).attr('name', 'sub_district['+total+']');
	$('.district_id', clone).attr('name', 'district_id['+total+']');
	$('.road', clone).attr('name', 'road['+total+']');
	$('.city', clone).attr('name', 'city['+total+']');
	$('.state_id', clone).attr('name', 'state_id['+total+']');
	$('.zipcode', clone).attr('name', 'zipcode['+total+']');
	$('.country_id', clone).attr('name', 'country_id['+total+']');
	$('.country_id', clone).attr('data-country-id', postotal);
	$('.state_id', clone).addClass('state_id'+postotal);
	$('.headoffice').append(clone);
	
	$('.headofficeclone_d_none').attr('data-counter', total);
	$('.headofficeclone_d_none').attr('data-pos', postotal);
}

function installment(pos)
{
	
	var clone = $('.contactpersoncontent', $('.contactpersoncontent_d_none')).clone();
				
	var no = $('.contactpersoncontent_d_none').attr('data-counter');
	var numbering = $('.contactpersoncontent_d_none').attr('data-pos');
	
	var total = parseInt(no) - 1;
	var totalnum = parseInt(numbering) + 1;
	
	$('.installment_clone', clone).attr('name', 'installment_clone['+total+']');
	$('.installment_clone_option', clone).attr('name', 'installment_clone_option['+total+']');
	
	$('.installment_clone_lavel', clone).html('Installment '+numbering);
	$('.installment_clone_option_lavel', clone).html('Installment '+totalnum);
	
	if(pos == 0)
	{
		$('.remove_installment', clone).addClass('d-none');
	}
	
	$('#installment_store').append(clone);
	
	$('.contactpersoncontent_d_none').attr('data-counter', total);
	$('.contactpersoncontent_d_none').attr('data-pos', totalnum);
}

function contact_peraon(pos) {
	var clone = $('.contact_detail_html', $('.contact_detail_d_none')).clone();
	
	var no = $('.contact_detail_d_none').attr('data-counter');
	var numbering = $('.contactpersoncontent_d_none').attr('data-pos');
	var total = parseInt(no) - 1;
	var totalnum = parseInt(numbering) + 1;
	
	$('.contact_name', clone).attr('name', 'contact_name['+total+']');
	$('.contact_family_name', clone).attr('name', 'contact_family_name['+total+']');
	$('.contact_position', clone).attr('name', 'contact_position['+total+']');
	$('.contact_mobile', clone).attr('name', 'contact_mobile['+total+']');
	$('.contact_email', clone).attr('name', 'contact_email['+total+']');
	$('.contact_dob', clone).attr('name', 'contact_dob['+total+']');
	$('.contact_line', clone).attr('name', 'contact_line['+total+']');
	$('.contact_remark', clone).attr('name', 'contact_remark['+total+']');
	
	if(pos == 0) {
		$('.removeContactPerson', clone).remove();
	}
	
	$('#contact_detail').append(clone);
	
	$('.contact_detail_d_none').attr('data-counter', total);
	$('.contact_detail_d_none').attr('data-pos', totalnum);
	
}
	  
         $(document).ready(function() {
			 $('body').on('change', '.payment_account_number', function() {
				var id = $(this).val();
				$('.beneficiary_name').html('');
				$('.payment_beneficiary').val('');
				$('.beneficiary_name_container').addClass('d-none');
				if(id == '058-301795-9') {
					$('.beneficiary_name_container').removeClass('d-none');
					$('.payment_beneficiary').val('inmind CO.,Ltd');
					$('.beneficiary_name').html('inmind CO.,Ltd');
				} if(id == '058-057010-9') {
					$('.beneficiary_name_container').removeClass('d-none');
					$('.payment_beneficiary').val('Mr.Nattapong Anekadhana');
					$('.beneficiary_name').html('Mr.Nattapong Anekadhana');
				} else if(id == '655-2-13419-0') {
					$('.beneficiary_name_container').removeClass('d-none');
					$('.payment_beneficiary').val('inmind CO.,Ltd');
					$('.beneficiary_name').html('inmind CO.,Ltd');
				} else if(id == '315-1-31039-4') {
					$('.beneficiary_name_container').removeClass('d-none');
					$('.payment_beneficiary').val('Mr.Nattapong Anekadhana');
					$('.beneficiary_name').html('Mr.Nattapong Anekadhana');
				}
					
			 });
			
			
			$('body').on('change', '.payment_bank_name', function() {
				var id = $(this).val();
				$('.branch_name_container').addClass('d-none');
				$('.payment_branch').val('');
				$('.branch_name').html('');
				if(id == 'Bangkok Bank')
				{
					$('.branch_name_container').removeClass('d-none');
					$('.branch_name').html('Rattanatibet');	
					$('.payment_branch').val('Rattanatibet');
					
					var clone = $('.payment_bank_pc_1', $('.payment_bank_none')).clone();
					$('.bankac').html('');
					$('.bankac').append(clone);
				} else if(id == 'Kasikom Bank')
				{
					$('.branch_name_container').removeClass('d-none');
					$('.payment_branch').val('Rajpruk');
					$('.branch_name').html('Rajpruk');	
					
					var clone = $('.payment_bank_pc_2', $('.payment_bank_none')).clone();
					$('.bankac').html('');
					$('.bankac').append(clone);
				} else if(id == 'Krungsri Bank')
				{
					$('.branch_name_container').removeClass('d-none');
					$('.branch_name').html('Phra Nangklao');
					$('.payment_branch').val('Phra Nangklao');
					
					var clone = $('.payment_bank_pc_3', $('.payment_bank_none')).clone();
					$('.bankac').html('');
					$('.bankac').append(clone);
				}
				
			});
			 
			 var payment_bank_name = $('.payment_bank_name').val();
			
			if(payment_bank_name == 'Bangkok Ban'){
				var clone = $('.payment_bank_pc_1', $('.payment_bank_none')).clone();
					$('.bankac').html('');
					$('.bankac').append(clone);
					
					
					$('.payment_account_number option[value="<?php echo @$obj->payment_account_number; ?>"]', $('.bankac')).prop('selected', true);
					
			} else if(payment_bank_name == 'Kasikom Bank'){
				var clone = $('.payment_bank_pc_2', $('.payment_bank_none')).clone();
					$('.bankac').html('');
					$('.bankac').append(clone);
					
					$('.payment_account_number option[value="<?php echo @$obj->payment_account_number; ?>"]', $('.bankac')).prop('selected', true);
			} else if(payment_bank_name == 'Krungsri Bank'){
				var clone = $('.payment_bank_pc_3', $('.payment_bank_none')).clone();
					$('.bankac').html('');
					$('.bankac').append(clone);
					
					$('.payment_account_number option[value="<?php echo @$obj->payment_account_number; ?>"]', $('.bankac')).prop('selected', true);
			}
			 
			 <?php if($personCount == 0) { ?>
				contact_peraon(0); 
			 <?php } ?>
			  $('body').on('click', '.contact_add', function() {
				 contact_peraon(1); 
				 return false;
			  });
			  
			   $('body').on('click', '.removeContactPerson', function() {
				 $(this).closest(".contact_detail_html").remove();
				 return false;
			  });
			 
			 $('body').on('change', '.delivery_check', function() {
				 
				 $("input[name=head_office_country_id]").val();
				 $("input[name=head_office_state_id]").val();
				 
				 
				 $('.delivery_address').val('');
				$('.delivery_building').val('');
				$('.delivery_sub_district').val('');
				$('.delivery_district_id').val('');
				$('.delivery_road').val('');
				$('.delivery_country_id').val('');
				$('.state_id_delivery').val('');
				$('.delivery_city').val('');
				$('.delivery_zipcode').val('');
				 if($(this).prop('checked')) {
					 var head_office_country_id = $('.head_office_country_id').val();
					 
					 $('.delivery_country_id option[value="'+head_office_country_id+'"]').prop('selected', true);
					 
					 //alert($("input[name=head_office_country_id]").val());
					 $('.delivery_address').val($("input[name=head_office_address]").val());
					 $('.delivery_building').val($("input[name=head_office_building]").val());
					 
					 $('.delivery_sub_district').val($("input[name=head_office_sub_district]").val());
				
					$('.delivery_district_id').val($("input[name=head_office_district]").val());
					$('.delivery_road').val($("input[name=head_office_road]").val());
					//$('.delivery_country_id').val('');
					$('.state_id_delivery').val('');
					$('.delivery_city').val($("input[name=head_office_city]").val());
					$('.delivery_zipcode').val($("input[name=head_office_zipcode]").val());
					dependdropdown(head_office_country_id, '.state_id_delivery', '', 'State');
					
					setTimeout(function() {
						$('.state_id_delivery option[value="'+$('.state_id_head').val()+'"]').prop('selected', true);
					}, 1500);
					
				 } else {
					 
				 }
			 });
			 
			 
				$('body').on('click', '.remove_installment', function() {
					$(this).closest(".contactpersoncontent").remove();
					return false;
				});
			 
			<?php if($type == 'save') { ?>
				$('.head_office_country_id option[value="237"]').prop('selected', true);
				$('.delivery_country_id option[value="237"]').prop('selected', true);
				setTimeout(function() {
					var country = 237;
					
					dependdropdown(country, '.state_id_head', '', 'State');
					
					dependdropdown(country, '.state_id_delivery', '', 'State');
					
					installment(0);
				}, 1000);
				
			<?php } ?>
			
			$('body').on('change', '.head_office_country_id', function() {
				var country = $(this).val();
				
				var target = '.state_id';
				
				dependdropdown(country, target, '_head', 'State');
			});
			
			
			$('body').on('click', '#add_installment_store', function() {
				installment(1);
				return false;
			});
			
			$('body').on('change', '.delivery_country_id', function() {
				var country = $(this).val();
				
				var target = '.state_id';
				
				dependdropdown(country, target, '_delivery', 'State');
			});
			
			$('body').on('change', '.country_id', function() {
				var country = $(this).val();
				
				var target = '.state_id';
				
				dependdropdown(country, target, $(this).attr('data-country-id'), 'State');
			});
			
			$('body').on('change', '.title_val', function() {
				var val = $(this).val();
				$('.fmly').addClass('d-none');
				if(val == 1 || val == 2) {
					$('.fmly').removeClass('d-none');
				}
			});
			
			$('body').on('change', '.type_val', function() {
				var val = $(this).val();
				$('.mr').removeClass('d-none');
				$('.ms').removeClass('d-none');
				$("input:radio[name='title']").each(function(i) {
					   this.checked = false;
				});
				if(val == 3) {
					$('.mr').addClass('d-none');
					$('.ms').addClass('d-none');
				}
			});
			
			$('body').on('click', '#add_head_office', function() {
				//addHeadOffice();
				return false;
			});
			
			$('body').on('click', '#add_contactperson', function() {
				//addContactPerson();
				return false;
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