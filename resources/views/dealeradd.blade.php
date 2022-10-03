<!doctype html>
<html lang="en">
   @include('layout.header')
   
<?php

$brands = array(
	1 => 'Meha',
	2 => 'Inmind'
);

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
										<option value="{{ $brandkey }}" <?php if($customer_brand_id == $brandkey) { echo 'selected'; } ?>>{{ $brandval }}</option>
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
									</div>
									
								  <div class="row g-3 headoffice">
									
									 <div class="row g-3">
										  <h6>Head office address by certified document</h6>
										 <div class="col-sm-4">
											<label for="inputFirstName" class="form-label">Address no.</label>
											<input type="text" class="form-control address" name="head_office_address" value="{{ @$obj->head_office_address }}" {{ $disabledfield }}>
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
											<label for="inputEmailAddress" class="form-label">Road</label>
											<input type="text" class="form-control head_office_road"  name="head_office_road" value="{{ @$obj->head_office_road }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  City</label>
											<input type="text" class="form-control city"  name="head_office_city" value="{{ @$obj->head_office_city }}" {{ $disabledfield }}>
										 </div>
										 <?php //$stateslist = $documentObj->getStateByCountryId($documentObj->country_id); ?>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">State</label>
											<select name="head_office_state_id" class="form-select state_id state_id_head" {{ $disabledfield }}>
												<option value="">Select State</option>
												<?php /* foreach($stateslist as $stateObj) { ?>
													<option value="{{ $stateObj->id }}">{{ $stateObj->name }}</option>
												<?php } */ ?>
											</select>
										 </div>
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  Zip Code</label>
											<input name="head_office_zipcode" type="text" class="form-control zipcode" value="{{ @$obj->head_office_zipcode }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-12 mb-3">
											<label for="inputSelectCountry" class="form-label ">Country</label>
											<select  name="head_office_country_id" class="form-select head_office_country_id" {{ $disabledfield }}>
												<option value="">Select Country</option>
												<?php foreach($countries as $country) { ?>
													<option  value="{{ $country->id }}" <?php //if($country->id == $documentObj->country_id) { echo 'selected'; } ?>>{{ $country->name }}</option>
												<?php } ?>
											</select>
										 </div>
										</div>
									
										<div class="row g-3">
										  <h6><input name="delivery_check" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> Delivery address same as home address</h6>
										  
										 <div class="col-sm-4">
											<label for="inputFirstName" class="form-label">Address no.</label>
											<input type="text" class="form-control address" name="delivery_address" value="{{ @$obj->head_office_address }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputLastName" class="form-label">Building / Village</label>
											<input type="text" class="form-control building" name="delivery_building" value="{{ @$obj->head_office_building }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">Sub District</label>
											<input type="text" class="form-control sub_district"  name="delivery_sub_district" value="{{ @$obj->head_office_sub_district }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  District</label>
											<input type="text" class="form-control district_id"  name="delivery_district_id" value="{{ @$obj->head_office_district_id }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">Road</label>
											<input type="text" class="form-control head_office_road"  name="delivery_road" value="{{ @$obj->head_office_road }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  City</label>
											<input type="text" class="form-control city"  name="delivery_city" value="{{ @$obj->head_office_city }}" {{ $disabledfield }}>
										 </div>
										 <?php //$stateslist = $documentObj->getStateByCountryId($documentObj->country_id); ?>
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">State</label>
											<select name="delivery_state_id" class="form-select state_id state_id_delivery" {{ $disabledfield }}>
												<option value="">Select State</option>
												<?php /* foreach($stateslist as $stateObj) { ?>
													<option value="{{ $stateObj->id }}">{{ $stateObj->name }}</option>
												<?php } */ ?>
											</select>
										 </div>
										 
										 <div class="col-sm-4">
											<label for="inputEmailAddress" class="form-label">  Zip Code</label>
											<input name="delivery_zipcode" type="text" class="form-control zipcode" value="{{ @$obj->head_office_zipcode }}" {{ $disabledfield }}>
										 </div>
										 <div class="col-12 mb-3">
											<label for="inputSelectCountry" class="form-label ">Country</label>
											<select  name="delivery_country_id" class="form-select delivery_country_id" {{ $disabledfield }}>
												<option value="">Select Country</option>
												<?php foreach($countries as $country) { ?>
													<option  value="{{ $country->id }}" <?php //if($country->id == @$obj->country_id) { echo 'selected'; } ?>>{{ $country->name }}</option>
												<?php } ?>
											</select>
										 </div>
										</div>
								  </div>
							   </div>
							   <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
									
									<div id="">
										<?php //foreach($persons as $personK => $personObj) { ?>
										<div class="row g-3">
											 <h6>Contact Person 1</h6>
											 <div class="col-sm-4">
												<label for="inputFirstName" class="form-label">Name</label>
												<input type="text" class="form-control contact_name" name="contact_name" value="" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputLastName" class="form-label">Family Name</label>
												<input type="text" class="form-control contact_family_name" name="contact_family_name" value="" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">Position</label>
												<input type="text" class="form-control contact_position" name="contact_position" value="" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">  Mobile</label>
												<input type="text" class="form-control contact_mobile" name="contact_mobile" value="" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="text" class="form-control contact_email" name="contact_email" value="" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<div class="mb-3">
												   <label class="form-label">Date of Birth:</label>
												   <input type="date" class="form-control contact_dob" name="contact_dob" value="" {{ $disabledfield }}>
												</div>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">Line</label>
												<input type="text" class="form-control contact_line" name="contact_line" value="" {{ $disabledfield }}>
											 </div>
											 <div class="col-sm-4">
												<label for="inputEmailAddress" class="form-label">  Remark</label>
												<textarea type="text" class="form-control contact_remark" name="contact_remark" value="" {{ $disabledfield }}></textarea>
											 </div>
										  </div>
										<?php //} ?>
									</div>
								  
							   </div>
							   <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
								  <label for="inputFirstName" class="form-label">Invoice</label><br>
								  <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" <?php if($customer_invoice == 1) { echo 'checked'; } ?> name="invoice" id="" value="1" {{ $disabledfield }}>
									 <label class="form-check-label" for="inlineRadio1">Sale</label>
								  </div>
								  <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="invoice" <?php if($customer_invoice == 2) { echo 'checked'; } ?> value="2" {{ $disabledfield }}>
									 <label class="form-check-label" for="inlineRadio1">Consignment</label>
								  </div>
								  <div class="row g-3">
									 <div class="col-sm-4">
										<label for="inputFirstName" class="form-label">Currency</label>
										<select class="form-select currency" name="currency" aria-label="Default select example" {{ $disabledfield }}>
											<?php foreach($currencydata as $currencykey => $currencyval) { ?>
												<option value="{{ $currencykey }}">{{ $currencyval }}</option>
											<?php } ?>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputLastName" class="form-label">Incoterm</label>
										<select class="form-select incoterm" name="incoterm" aria-label="Default select example" {{ $disabledfield }}>
											<?php foreach($Incotermdata as $Incotermkey => $Incotermval) { ?>
												<option value="{{ $Incotermkey }}">{{ $Incotermval }}</option>
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
												<option value="{{ $fromdatakey }}" <?php if($customer_from == $fromdatakey) { echo 'selected'; } ?>>{{ $fromdataval }}</option>
											<?php } ?>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputLastName" class="form-label">Incoterm</label>
										<select class="form-select incoterm_type" name="incoterm_type" aria-label="Default select example" {{ $disabledfield }}>
										   <option value="">Post </option>
										   <option value="1">Email</option>
										   <option value="2">Post & Email</option>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label"> Contact Person</label>
										<select class="form-select contact_person" name="contact_person" aria-label="Default select example" {{ $disabledfield }}>
										   <option value="">Select option </option>
										   <option value="1">Email</option>
										   <option value="2">Post & Email</option>
										</select>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label">Email</label>
										<input type="text" value="{{ $customer_email }}" class="form-control email" name="email" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label"> Installment 1</label>
										<input type="text" class="form-control" {{ $disabledfield }}>
									 </div>
									 <div class="col-sm-4">
										<label for="inputEmailAddress" class="form-label"> Installment 1</label>
										<select class="form-select" id="" aria-label="Default select example" {{ $disabledfield }}>
										   <option selected="">PO Confirmed by Payment</option>
										   <option value="1">Sample Piece ready</option>
										   <option value="2">Work Progress 50%</option>
										   <option value="2">Work Progress 80%</option>
										   <option value="2">Work Progress 100%</option>
										   <option value="2">Original B/L is shown</option>
										</select>
									 </div>
								  </div>
							   </div>
							   <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
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
										<textarea type="text" value="{{ $customer_beneficiary_address }}" class="form-control beneficiary_address" name="beneficiary_address" {{ $disabledfield }}></textarea>
									 </div>
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
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  City</label>
				<input type="text" class="form-control city" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">State</label>
				<select class="form-select state_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select State</option>
					
				</select>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Zip Code</label>
				<input type="text" class="form-control zipcode" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-12 mb-3">
				<label for="inputSelectCountry" class="form-label ">Country</label>
				<select class="form-select country_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select Country</option>
					<?php foreach($countries as $country) { ?>
						<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
					<?php } ?>
				</select>
			 </div>
		</div>
	</div>
</div>

<div class="contactpersoncontent_d_none" style="display:none" data-counter="0">
	<div class="contactpersoncontent">
		<div class="row g-3">
			 <h6>Contact Person 1</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Name</label>
				<input type="text" class="form-control name" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Family Name</label>
				<input type="text" class="form-control family_name" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Position</label>
				<input type="text" class="form-control position" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Mobile</label>
				<input type="text" class="form-control mobile" id="" {{ $disabledfield }}">
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Email</label>
				<input type="text" class="form-control email" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<div class="mb-3">
				   <label class="form-label">Date of Birth:</label>
				   <input type="date" class="form-control dob" {{ $disabledfield }}>
				</div>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Line</label>
				<input type="text" class="form-control line" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Remark</label>
				<textarea type="text" class="form-control remark" {{ $disabledfield }}></textarea>
			 </div>
		  </div>
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
			
			<?php /* if($type != 'save') { ?>
				setTimeout(function() {
					
				//alert(<?php echo $state_id; ?>);
				$('.state_id'+cnt+' option[value="<?php echo $state_id; ?>"]').prop('selected', true);
				}, 500);
			<?php } */ ?>
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

function addContactPerson()
{
	
	var clone = $('.contactpersoncontent', $('.contactpersoncontent_d_none')).clone();
				
	var no = $('.contactpersoncontent_d_none').attr('data-counter');
	
	var total = parseInt(no) - 1;
	
	$('.name', clone).attr('name', 'namearr['+total+']');
	$('.family_name', clone).attr('name', 'family_name['+total+']');
	$('.position', clone).attr('name', 'position['+total+']');
	$('.mobile', clone).attr('name', 'mobile['+total+']');
	$('.email', clone).attr('name', 'email['+total+']');
	$('.dob', clone).attr('name', 'dob['+total+']');
	$('.line', clone).attr('name', 'line['+total+']');
	$('.remark', clone).attr('name', 'remark['+total+']');
	
	$('#contactperson').append(clone);
	
	$('.contactpersoncontent_d_none').attr('data-counter', total);
}
	  
         $(document).ready(function() {
			<?php /* if($type == 'save') { ?>
				var country = $('.country_id').val();
				var target = '.state_id';
				addHeadOffice();
				addContactPerson();
				
				setTimeout(function() {
					//alert($('.country_id').attr('data-pos'));
					dependdropdown(country, target, $('.country_id').attr('data-country-id'), 'State');
				}, 1000);
				
			<?php } */ ?>
			
			$('body').on('change', '.head_office_country_id', function() {
				var country = $(this).val();
				
				var target = '.state_id';
				
				dependdropdown(country, target, '_head', 'State');
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