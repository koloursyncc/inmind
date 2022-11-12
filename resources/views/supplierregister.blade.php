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

$suppliertype = array(
	1 => 'Manufacturer',
	2 => 'Agent',
	3 => 'Shipping',
	4 => 'Transport',
	5 => 'W/H and Lessor',
	6 => 'Packaging',
);
$disabledfield = '';
$supplier_name = '';
$supplier_type = '';
$address = '';
$building = '';
$sub_district = '';
$district = '';
$road = '';
$city_id = '';
$state_id = '';
$country_id = '';
$zipcode = '';
$name = '';
$family_name = '';
$position = '';
$mobile = '';
$email = '';
$remark = '';
$bank_name = '';
$bank_address = '';
$swift = '';
$ac_no = '';
$beneficiary_name = '';
$beneficiary_address = '';
$currency = '';
$incoterm = '';
$delivery_destination = '';
$id ='';
$url = '';
if($type == 'save')
{
	$url = url('savesupplier');
} else if($type == 'edit')
{
	$url = url('update/supplier');
}
if($type != 'save')
{
	if($obj != null) {
		$id = $obj->id;
		$supplier_name = $obj->supplier_name;
		$supplier_type = $obj->supplier_type;
		$address = $obj->address;
		$building = $obj->building;
		$sub_district = $obj->sub_district;
		$district = $obj->district;
		$road = $obj->road;
		$city_id = $obj->city_id;
		$state_id = $obj->state_id;
		$country_id = $obj->country_id;
		$zipcode = $obj->zipcode;
		$name = $obj->name;
		$family_name = $obj->family_name;
		$position = $obj->position;
		$mobile = $obj->mobile;
		$email = $obj->email;
		$remark = $obj->remark;
		$bank_name = $obj->bank_name;
		$bank_address = $obj->bank_address;
		$swift = $obj->swift;
		$ac_no = $obj->ac_no;
		$beneficiary_name = $obj->beneficiary_name;
		$beneficiary_address = $obj->beneficiary_address;
		$currency = $obj->currency;
		$incoterm = $obj->incoterm;
		$delivery_destination = $obj->delivery_destination;
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
					<div class="breadcrumb-title pe-3">Supplier</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Supplier Creator</li>
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
								<div id="smartwizard">
									
									<div class="tab-content">
										<form id="supplier-form" data-url="{{ $url }}">
											@csrf
											
											<?php if($type == 'edit') { ?>
												<input type="hidden" name="id" value="{{$id}}" />
											<?php } ?>
											
										<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
												<label for="formFile" class="form-label">Supplier Name <span>*</span></label>
												<input class="form-control mb-3 supplier_name" name="supplier_name" type="text" placeholder="enter supplier name" aria-label="default input example" value="{{ $supplier_name }}" {{ $disabledfield }}>
												<label for="formFile" class="form-label ">Supplier Type <span>*</span></label>
													<select class="form-select mb-3 supplier_type" name="supplier_type" aria-label="Default select example" {{ $disabledfield }}>
														<option value="">Select Supplier Type </option>
														<?php foreach($suppliertype as $suppliertypekey => $suppliertypeval) { ?>
														<option value="{{ $suppliertypekey }}" <?php if($suppliertypekey == $supplier_type) { echo 'selected'; } ?>>{{ $suppliertypeval }}</option>
														<?php } ?>
													</select>
													  <div class="row g-3">
															<div class="col-sm-4">
																<label for="inputFirstName" class="form-label">Address no.</label>
																<input type="text"value="{{ $supplier_name }}" class="form-control address" name="address" id="inputFirstName"  {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputLastName" class="form-label">Building / Village</label>
																<input type="text"value="{{ $building }}" class="form-control building" name="building" id="inputLastName"  {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">Sub District</label>
																<input type="text"value="{{ $sub_district }}" class="form-control sub_district" name="sub_district" id="inputEmailAddress" {{ $disabledfield }} placeholder="">
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">  District / City</label>
																<input type="text"value="{{ $district }}" class="form-control district" name="district" id="inputEmailAddress" {{ $disabledfield }} placeholder="">
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">Road</label>
																<input type="text"value="{{ $road }}" class="form-control road" name="road" id="inputEmailAddress" {{ $disabledfield }} placeholder="">
															</div>
															
															<div class="col-sm-4">
																<label for="inputSelectCountry" class="form-label">Country <span>*</span></label>
																<select class="form-select country_id" name="country_id" id="inputSelectCountry" {{ $disabledfield }} aria-label="Default select example">
																	<option value="">Select Country</option>
																	<?php foreach($countries as $countryObj) { 
																			$selected = '';
																			if($countryObj->id == 237) {
																				$selected = 'selected';
																			}
																	?>
																		<option value="{{ $countryObj->id }}" <?php echo $selected; ?>>{{ $countryObj->name }}</option>
																	<?php } ?>
																</select>
															</div> 
															
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">State / Province<span>*</span></label>
																<select class="form-select state_id" name="state_id" id="inputSelectCountry" {{ $disabledfield }} aria-label="Default select example">
																	<option value="">Select State</option>
																</select>
															</div>
															
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">City <span>*</span></label>
																<input type="text" value="{{ $city_id }}" class="form-control city_id" {{ $disabledfield }} name="city_id" id="inputEmailAddress" placeholder="">
															</div>
															
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">  Zip Code <span>*</span></label>
																<input type="text" value="{{ $zipcode }}" maxlength="7" class="form-control zipcode" {{ $disabledfield }} name="zipcode" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-4">
															<label for="inputEmailAddress" class="form-label" >  Select Product <span>*</span></label>
																<select {{ $disabledfield }} class="form-control product_id " multiple style="min-height:150px;">
																	<?php foreach($products as $productObj) {
																			$proched = '';
																			if($type != 'save') {
																				$isProductSupplier = $productObj->getProductSupplierBySupplierId($productObj->id, $id);
																				if($isProductSupplier)
																				{
																					$proched = 'selected';
																				}
																			}
																		?>
																		<option value="{{ $productObj->id }}" {{ $proched }}>{{ $productObj->name }} </option>
																	<?php } ?>
																</select>
															</div>
															
															<div class="col-sm-12 pro_clone">
																<?php foreach($supplierProducts as $supplierProductObj) {
																		$proObj = \App\Models\Product::find($supplierProductObj->product_id);
																	?>
																	<div class="row product_unit_container_clone">
																		<div class="col-sm-3">
																			<label for="inputEmailAddress" class="form-label product_unit_lavel">
																				<?php if($proObj) {
																					echo $proObj->name;
																				} ?>
																			</label>
																			<input type="hidden" {{ $disabledfield }} class="form-control " value="<?php echo $supplierProductObj->product_id; ?>" name="product_id[<?php echo $supplierProductObj->id; ?>]">
																		</div>
																		
																		 <div class="col-sm-3">
																			<label for="inputEmailAddress" class="form-label "></label>
																			<input type="text" {{ $disabledfield }} class="form-control " value="<?php echo $supplierProductObj->unit_price; ?>" name="unit_price[<?php echo $supplierProductObj->id; ?>]" placeholder="unit price">
																		</div>
																		
																		<div class="col-sm-3">
																		<label for="inputFirstName" class="form-label">Currency</label>
																		<select class="form-select currency_id" name="currency_id[<?php echo $supplierProductObj->id; ?>]" {{ $disabledfield }}>
																			<?php foreach($countries as $countryObj) { ?>
																				 <option value="{{ $countryObj->id }}" <?php if($supplierProductObj->currency_id == $countryObj->id) { echo 'selected'; } ?>>{{ $countryObj->currency }}</option>
																			<?php } ?>
																		</select>
																	</div>
																	</div>
																<?php } ?>
															</div>
															
														</div>
										 </div>
										<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
										<!---<h3 class="" style="cursor:pointer"></h3>----->
										<button type="button" class="btn btn-sm btn-primary px-2 radius-30 add_more_content">Add contact Person</button>
										<div class="step_2_contact">
										<?php 
											$supplierProductContactCount = 0;
											foreach($supplierProductContact as $supplierProductContactObj) {
												$supplierProductContactCount++;
													$supprProConId = $supplierProductContactObj->id;
											?>
											<div class="row g-3">
												<div class="col-sm-4">
													<label for="inputFirstName" {{ $disabledfield }} class="form-label person_name">Name <span>*</span></label>
													<input type="text" value="{{ $supplierProductContactObj->name }}" class="form-control name" name="name[{{ $supprProConId }}]" id="inputFirstName" {{ $disabledfield }}>
												</div>
												<div class="col-sm-4">
													<label for="inputLastName" {{ $disabledfield }} class="form-label">Family Name</label>
													<input type="text" value="{{ $supplierProductContactObj->family_name }}" class="form-control family_name" name="family_name[{{ $supprProConId }}]" id="inputLastName" {{ $disabledfield }}>
												</div>
												<div class="col-sm-4">
													<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Position</label>
													<input type="text" value="{{ $supplierProductContactObj->position }}" class="form-control position" name="position[{{ $supprProConId }}]" id="inputEmailAddress" {{ $disabledfield }}>
													<select class="form-control position" name="position[{{ $supprProConId }}]">
														<option value="">Select
														</option>
														<option value="Owner" <?php if($supplierProductContactObj->position == 'Owner') { echo 'selected'; } ?> >Owner </option>
														<option value="Sale Manager" <?php if($supplierProductContactObj->position == 'Sale Manager') { echo 'selected'; } ?>>Sale Manager</option>
														<option value="Sale" <?php if($supplierProductContactObj->position == 'Sale') { echo 'selected'; } ?>>Sale </option>
														<option value="Accountant" <?php if($supplierProductContactObj->position == 'Accountant') { echo 'selected'; } ?>>Accountant</option>
													</select>
												</div>
												<div class="col-sm-4">
													<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">  Mobile <span>*</span></label>
													<input type="phone" value="{{ $supplierProductContactObj->mobile }}" class="form-control mobile" name="mobile[{{ $supprProConId }}]" id="inputEmailAddress" {{ $disabledfield }}>
												</div>
												<div class="col-sm-4">
													<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Email</label>
													<input type="email" value="{{ $supplierProductContactObj->email }}" class="form-control email" name="email[{{ $supprProConId }}]" id="inputEmailAddress" {{ $disabledfield }}>
												</div>
												<div class="col-sm-4">
													<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">  Remark</label>
													<textarea type="text" value="{{ $supplierProductContactObj->remark }}" class="form-control remark" name="remark[{{ $supprProConId }}]" id="inputEmailAddress" {{ $disabledfield }}>{{ $remark }}</textarea>
												</div> 
											</div>
											
										<?php } ?>
										
										</div>
										</div>
										<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3"> 
										<h3>Bank Detail</h3>
										<div class="row g-3">
															<div class="col-sm-4">
																<label for="inputFirstName" {{ $disabledfield }} class="form-label">Bank Name</label>
																<input type="text" value="{{ $bank_name }}" class="form-control bank_name" name="bank_name" id="inputFirstName" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputLastName" {{ $disabledfield }} class="form-label">Bank Address</label>
																<input type="text" value="{{ $bank_address }}" class="form-control bank_address" name="bank_address" id="inputLastName" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">SWIFT</label>
																<input type="text" value="{{ $swift }}" {{ $disabledfield }} class="form-control swift" name="swift" id="inputEmailAddress" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label"> A/C No.</label>
																<input type="text" value="{{ $ac_no }}" class="form-control ac_no" name="ac_no" id="inputEmailAddress" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Beneficiary Name</label>
																<input type="text" value="{{ $beneficiary_name }}" class="form-control beneficiary_name" name="beneficiary_name" id="inputEmailAddress" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress"  {{ $disabledfield }} class="form-label">  Beneficiary Address</label>
																<textarea type="text" value="{{ $beneficiary_address }}" class="form-control beneficiary_address" name="beneficiary_address" id="inputEmailAddress" {{ $disabledfield }}>{{ $beneficiary_address }}</textarea>
															</div> 
															
															<h3>Trade Condition</h3>
															
															<div class="col-sm-4">
																<label for="inputFirstName" class="form-label">Currency</label>
																<select class="form-select currency" {{ $disabledfield }} name="currency" id="inputSelectCountry" aria-label="Default select example">
																	<?php foreach($countries as $countryObj) { ?>
																		 <option value="{{ $countryObj->currency }}" <?php if($countryObj->currency == $currency) { echo 'selected'; } ?>>{{ $countryObj->currency }}</option>
																	<?php } ?>
																</select>
															 </div>
															 <?php $Incotermarr = array(1 => 'EXW',2 => 'CFR',3 => 'CIF',4 => 'FOB',5 => 'DDP'); ?>
															 <div class="col-sm-4">
																<label for="inputLastName" {{ $disabledfield }} class="form-label">Incoterm</label>
																<select class="form-select incoterm" name="incoterm" id="inputSelectCountry" aria-label="Default select example" {{ $disabledfield }}>
																	<?php foreach($Incotermarr as $Incotermk => $Incotermv) { ?>
																		<option value="{{ $Incotermk }}" <?php if($Incotermk == $incoterm) { echo 'selected'; } ?>>{{ $Incotermv }}</option>
																	<?php } ?>
																</select>
															 </div>
															 <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">Place of Delivery/Destination</label>
																<input {{ $disabledfield }} type="text" value="{{ $delivery_destination }}" {{ $disabledfield }} class="form-control delivery_destination" name="delivery_destination" id="inputEmailAddress" placeholder="">
															 </div>
															<?php if($type != 'view') { ?>
																
																<button type="button" id="addoninstall" class="btn btn-sm btn-primary px-2 radius-30 col-md-1">Add More</button>
															 <?php } ?>
															 <div class="row installment_container"> 
															 <?php foreach($installments as $installmentK => $installmentObj) { ?>
																<div class="row installment_container_clone">
																	<div class="col-sm-4">
																		<label for="inputEmailAddress" class="form-label installment_lavel_1"> 
																			installment {{ ++$installmentK }}
																		</label>
																		<input type="text" {{ $disabledfield }} class="form-control installment_1" name="installment_1[{{ $installmentObj->id }}]" value="{{ $installmentObj->installment_1 }}">
																	</div>
																	
																	<div class="col-sm-4">
																		<label for="inputEmailAddress" class="form-label installment_lavel_2"></label>
																		<select class="installment_2 form-select" {{ $disabledfield }} name="installment_2[{{ $installmentObj->id }}]" aria-label="Default select example">
																			<?php foreach($installment as $installmentValueKey => $installmentValue) { ?>
																			<option value="{{ $installmentValueKey }}"  <?php if($installmentObj->installment_2 == $installmentValueKey) { echo 'selected'; } ?>>{{ $installmentValue }}</option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															<?php } ?>
															 </div>
															 <span class="installment_cal"></span>
														</div>
										</div>
										<br>
										<input type="button" value="Save" class="btn btn-primary submit" />
										
									</form>	 
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->


				
			</div>
		</div>
		<!--end page wrapper -->
		@include('layout.footer')
	<!-- Bootstrap JS -->
	@include('layout.jsfile')

<div class="installment_container_d_none" style="display:none" data-counter="0"> 
	<div class="row installment_container_clone">
		<div class="col-sm-4">
			<label for="inputEmailAddress" class="form-label installment_lavel_1"></label>
			<input type="text" {{ $disabledfield }} class="form-control installment_1" id="inputEmailAddress" placeholder="">
		</div>
		
		<div class="col-sm-4">
			<label for="inputEmailAddress" class="form-label installment_lavel_2"></label>
			<select class="installment_2 form-select" {{ $disabledfield }} id="inputSelectCountry" aria-label="Default select example">
				<?php foreach($installment as $installmentValueKey => $installmentValue) { ?>
				<option value="{{ $installmentValueKey }}">{{ $installmentValue }}</option>
				<?php } ?>
			</select> 
		</div>
		
		<div class="col-sm-4 rmv" style="display:flex;align-items:flex-end">
		<button type="button" class="btn btn-sm btn-primary px-2 radius-30 installment_container_clone_remove">Remove</button>
		</div>
		
	</div>
</div>

<div class="suppiler_pro" style="display:none" data-counter="0"> 
	<div class="row product_unit_container_clone">
		<div class="col-sm-3">
			<label for="inputEmailAddress" class="form-label product_unit_lavel"></label>
			<input type="hidden" {{ $disabledfield }} class="form-control product_n">
		</div>
		
		<div class="col-sm-3">
			<label for="inputEmailAddress" class="form-label "></label>
			<input type="text" {{ $disabledfield }} class="form-control product_unit_price" placeholder="unit price">
		</div>
		
		<div class="col-sm-3">
			<label for="inputFirstName" class="form-label">Currency</label>
			<select class="form-select currency_id" {{ $disabledfield }}>
				<?php foreach($countries as $countryObj) { ?>
					 <option value="{{ $countryObj->id }}">{{ $countryObj->currency }}</option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>


<div class="step_2_contact_wrapper" style="display:none" data-counter="0" data-ps="0"> 
	<div class="row g-3 step_2_contact_wrapper_clone">
		<hr style="margin:30px;">
	<div class="col-sm-12 remove_content_wrapper">
		<!---<h4 class="remove_content" style="cursor:pointer">teststst</h4>---->
		<button type="button" class="btn btn-sm btn-primary px-2 radius-30 remove_content">Remove contact Person</button>
		</div>	
		<div class="col-sm-4">
			<label for="inputFirstName" {{ $disabledfield }} class="form-label person_name">Person Name  <span>*</span></label>
			<input type="text" class="form-control name" name="name" id="inputFirstName" {{ $disabledfield }}>
		</div>
		<div class="col-sm-4">
			<label for="inputLastName" {{ $disabledfield }} class="form-label">Family Name</label>
			<input type="text" class="form-control family_name" name="family_name" id="inputLastName" {{ $disabledfield }}>
		</div>
		<div class="col-sm-4">
			<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Position</label>
			<!---<input type="text" class="form-control position" name="position" id="inputEmailAddress" {{ $disabledfield }}>---->
			<select class="form-control position" name="position">
                      <option value="">Select
                      </option>
                      <option value="Owner" >Owner </option>
                    <option value="Sale Manager">Sale Manager</option>
					<option value="Sale">Sale </option>
					<option value="Accountant">Accountant</option>
                  </select>
		</div>
		<div class="col-sm-1">
                            <label for="formFile" class="form-label">Code
                            </label>
                            <select  name="country_code" class="form-select country_code" {{ $disabledfield }}>
                              <option value="">Select Country
                              </option>
                              <?php foreach($countries as $country) { ?>
                              <option  value="{{ $country->id }}" 
                                      <?php if($country->id == @$obj->country_code) { echo 'selected'; } else if($country->id == 237) { echo 'selected'; }  ?>>{{ $country->phone_code }}
                              </option>
                            <?php } ?>
                            </select>
                        </div>
		<div class="col-sm-3">
			<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">  Mobile <span>*</span></label>
			<input type="text" class="form-control mobile" name="mobile" id="inputEmailAddress" {{ $disabledfield }}>
		</div>
		<div class="col-sm-4">
			<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Email</label>
			<input type="text" class="form-control email" name="email" id="inputEmailAddress" {{ $disabledfield }}>
		</div>
		<div class="col-sm-4">
			<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">  Remark</label>
			<textarea type="text" class="form-control remark" name="remark" id="inputEmailAddress" {{ $disabledfield }}>{{ $remark }}</textarea> 
			
		</div> 
		
	</div>
</div>

<script>



function dependdropdown(val, target, name) {
	var url = $("meta[name=url]").attr("content");
	$.ajax({
		url: "{{url('getregionaldata')}}",
		dataType : "json",
		type: "get",
		data : {'value':val, 'name':name},
		success : function(response) {
			
			var list = $(target); 
			list.empty();
			list.append(new Option('Select '+name, ''));
			$.each(response, function(index, item) {
				list.append(new Option(item.name, item.id, true));
			});
			
			<?php if($type != 'save') { ?>
				setTimeout(function() {
					
				//alert(<?php echo $state_id; ?>);
				$('.state_id option[value="<?php echo $state_id; ?>"]').prop('selected', true);
				}, 500);
			<?php } ?>
		},
	});
}

function addinstall(pos)
{
	var clone = $('.installment_container_clone', $('.installment_container_d_none')).clone();
			
	var no = $('.installment_container_d_none').attr('data-counter');
	var total = parseInt(no) - 1;
	
	var length = $('.installment_container_clone', $('.installment_container')).length;
	var html = parseInt(length) + 1;
	
	$(".installment_2", $('.installment_container')).each(function() {
		var x = $(this).val();
		$(".installment_2 option[value='"+x+"']", clone).remove();
	});
	
	var length = $('.installment_2 > option', clone).length;
	if(length == 0) {
		return false;
	}
	
	$('.installment_1', clone).attr('name', 'installment_1['+total+']');
	$('.installment_lavel_1', clone).html('Installment '+html);
	
	$('.installment_2', clone).attr('name', 'installment_2['+total+']');
	$('.installment_2', clone).addClass('installment_1_'+html).attr('data-id', html);
	$('.installment_lavel_2', clone).html('Installment '+html);
	
	if(pos == 0) {
		$('.rmv', clone).addClass('d-none');
	}
	
	$('.installment_container').append(clone);
	
	$('.installment_container_d_none').attr('data-counter', total);
}

function contactperson(pos)
{
	var clone = $('.step_2_contact_wrapper_clone', $('.step_2_contact_wrapper')).clone();
			
	var no = $('.step_2_contact_wrapper').attr('data-counter');
	var total = parseInt(no) - 1;
	var ps = $('.step_2_contact_wrapper').attr('data-ps');
	var pstotal = parseInt(ps) + 1;
	//alert(pstotal);
	if(pos == 0) {
		$('.remove_content_wrapper', clone).addClass('d-none');
	}
	
	$('.name', clone).attr('name', 'name['+total+']');
	$('.person_name', clone).html(' Person Name ' + pstotal);
	$('.family_name', clone).attr('name', 'family_name['+total+']');
	$('.position', clone).attr('name', 'position['+total+']');
	$('.mobile', clone).attr('name', 'mobile['+total+']');
	$('.email', clone).attr('name', 'email['+total+']');
	$('.remark', clone).attr('name', 'remark['+total+']');
	
	$('.step_2_contact').append(clone);
	$('.step_2_contact_wrapper').attr('data-counter', total);
	$('.step_2_contact_wrapper').attr('data-ps', pstotal);
}

$(document).ready(function() {
	$(document).on("input", ".mobile", function() {
		this.value = this.value.replace(/\D/g,'');
	});
	
	$('body').on('keyup', '.email ', function() {
		var val = $(this).val();
		var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		$(".err").remove(); 
		if (!expr.test(val)) {
			$(this).after('<span class="err" style="color:red">Please enter valid email.</span>');
		}
	});
	
	$('body').on('keyup', '.installment_1 ', function() {
		$('.submit').removeAttr('disabled');
		let sum = 0;
		$('.installment_cal').html('');
		$(".installment_1").each(function() {
			sum += Number($(this).val());
		});
		let msg = 'Your Total percent is '+sum+'%';
		if(sum > 100) {
			$(this).val(0);
			$('.submit').attr('disabled', 'disabled');
			msg = '<span style="color:red">Your have crossed the 100%</span>';
		}
		$('.installment_cal').html(msg);
	});

	$('.zipcode').keypress(function (e) {
		$('.err').remove();
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (!regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        $('.zipcode').after('<span style="color:red" class="err">Please Enter numberic value</span>');
        return false;
        }
    });
	
	
	$('body').on('click', '.submit ', function() {
		var url = $("meta[name=url]").attr("content");
		$('.err_msg').remove();
		$.ajax({
			url: $('#supplier-form').attr('data-url'),
			dataType : "json",
			type: "post",
			data : $('#supplier-form').serialize(),
			success : function(response) {
				
				if(response.status == 'success') {
					
					alert(response.msg);
					window.location.href = "{{url('supplierlist')}}";
					
				} else if(response.status == 'errors') {
					$.each(response.errors, function(key, msg) {
						$('.'+key).after('<span class="err_msg" style="color:red">'+msg+'</span>');
					});
				} else if(response.status == 'error') {
					
					alert(response.error);
					
				} else if(response.status == 'exceptionError') {
					
				}
			},
		});
		return false;
	});
	
	$('body').on('click', '.installment_container_clone_remove ', function() {
		$(this).closest(".installment_container_clone").remove();
		return false;
	});
	
	$('body').on('change', '.product_id ', function() {
		var val = $(this).val();
		$('.pro_clone').html('');
		 $.each(val, function (key, v) {
			 
			var clone = $('.product_unit_container_clone', $('.suppiler_pro')).clone();
			var no = $('.suppiler_pro').attr('data-counter');
			var srno = parseInt(no) - 1;
			
			$('.product_unit_lavel', clone).html($(".product_id option[value=" + v +"]").text());
			$('.product_n', clone).attr('name', 'product_id['+srno+']')
			$('.product_unit_price', clone).attr('name', 'unit_price['+srno+']')
			$('.currency_id', clone).attr('name', 'currency_id['+srno+']')
			
			$('.product_n', clone).val(v);
			
			$('.pro_clone').append(clone);
			
			$('.suppiler_pro').attr('data-counter', srno);
		});
		
		
	});
	
	$('body').on('change', '.installment_2', function() {
		var value = $(this).val();
		var change = $(this).attr('data-id');
		$(".installment_2", $('.installment_container_clone')).each(function() {
			if(change != $(this).attr('data-id')) {
				$(".installment_2 option[value='"+value+"']", $('.installment_container_clone')).remove();
			}
			
		});
		
		
	});
	
	<?php if($type != 'view') { ?>
		addinstall(0);
		
		<?php if($supplierProductContactCount == 0) { ?>
			contactperson(0);
		<?php } ?>
		<?php } ?>
		$('body').on('click', '#addoninstall', function() {
			addinstall(1);
			return false;
		});
		
		$('body').on('click', '.add_more_content', function() {
			contactperson(1);
			return false;
		});
		
		
		$('body').on('click', '.remove_content', function() {
			$(this).closest(".step_2_contact_wrapper_clone").remove();
			return false;
		});
	
	var country = $('.country_id').val();
	dependdropdown(country, '.state_id', 'State');
	
	$('body').on('change', '.country_id', function() {
		var val = $(this).val();
		dependdropdown(val, '.state_id', 'State');
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