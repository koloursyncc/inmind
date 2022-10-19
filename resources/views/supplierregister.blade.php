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
									<ul class="nav">
										<li class="nav-item">
											<a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
												<br>Supplier Details</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
												<br>Contact Person</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
												<br>Bank Details</a>
										</li>
										 
									</ul>
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
																<input type="text" value="{{ $zipcode }}" class="form-control zipcode" {{ $disabledfield }} name="zipcode" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-4">
															<label for="inputEmailAddress" class="form-label">  Select Product <span>*</span></label>
																<select {{ $disabledfield }} class="form-control product_id " multiple>
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
																	</div>
																<?php } ?>
															</div>
															
														</div>
										 </div>
										<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
										<div class="row g-3">
															<div class="col-sm-4">
																<label for="inputFirstName" {{ $disabledfield }} class="form-label">Name <span>*</span></label>
																<input type="text" value="{{ $name }}" class="form-control name" name="name" id="inputFirstName" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputLastName" {{ $disabledfield }} class="form-label">Family Name</label>
																<input type="text" value="{{ $family_name }}" class="form-control family_name" name="family_name" id="inputLastName" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Position</label>
																<input type="text" value="{{ $position }}" class="form-control position" name="position" id="inputEmailAddress" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">  Mobile <span>*</span></label>
																<input type="text" value="{{ $mobile }}" class="form-control mobile" name="mobile" id="inputEmailAddress" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">Email</label>
																<input type="text" value="{{ $email }}" class="form-control email" name="email" id="inputEmailAddress" {{ $disabledfield }}>
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" {{ $disabledfield }} class="form-label">  Remark</label>
																<textarea type="text" value="{{ $remark }}" class="form-control remark" name="remark" id="inputEmailAddress" {{ $disabledfield }}>{{ $remark }}</textarea>
															</div> 
														</div>
										</div>
										<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3"> 
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
																<a href="#" id="addoninstall">Add More</a>
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
														</div>
										</div>
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

function addinstall()
{
	var clone = $('.installment_container_clone', $('.installment_container_d_none')).clone();
			
	var no = $('.installment_container_d_none').attr('data-counter');
	var total = parseInt(no) - 1;
	
	var length = $('.installment_container_clone', $('.installment_container')).length;
	var html = parseInt(length) + 1;
	
	$('.installment_1', clone).attr('name', 'installment_1['+total+']');
	$('.installment_lavel_1', clone).html('Installment '+html);
	
	$('.installment_2', clone).attr('name', 'installment_2['+total+']');
	$('.installment_lavel_2', clone).html('Installment '+html);
	
	$('.installment_container').append(clone);
	$('.installment_container_d_none').attr('data-counter', total);
}

$(document).ready(function() {
	
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
			
			$('.product_n', clone).val(v);
			
			$('.pro_clone').append(clone);
			
			$('.suppiler_pro').attr('data-counter', srno);
		});
		
		
	});
	
	<?php if($type != 'view') { ?>
		addinstall();
		<?php } ?>
		$('body').on('click', '#addoninstall', function() {
			addinstall();
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