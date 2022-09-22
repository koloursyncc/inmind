<!doctype html>
<html lang="en">

@include('layout.header')

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
								<li class="breadcrumb-item active" aria-current="page">Registration</li>
							</ol>
						</nav>
					</div>		
				</div>
				<!--end breadcrumb-->
			  
                <div class="row">
					<div class="col-xl-8 mx-auto">
						
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
										<form id="supplier-form">
											@csrf
										<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
												<label for="formFile" class="form-label">Supplier Name <span>*</span></label>
												<input class="form-control mb-3 supplier_name" name="supplier_name" type="text" placeholder="enter supplier name" aria-label="default input example">
												<label for="formFile" class="form-label ">Supplier Type <span>*</span></label>
													<select class="form-select mb-3 supplier_type" name="supplier_type" aria-label="Default select example">
														<option value="">Select Supplier Type </option>
														<option value="1">Manufacturer</option>
														<option value="2">Agent</option>
														<option value="3">Shipping</option>
														<option value="3">Transport</option>
														<option value="3">W/H and Lessor</option>
														<option value="3">Packaging</option>
													</select>
													  <div class="row g-3">
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Address no.</label>
																<input type="text" class="form-control address" name="address" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Building / Village</label>
																<input type="text" class="form-control building" name="building" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Sub District</label>
																<input type="text" class="form-control sub_district" name="sub_district" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  District</label>
																<input type="text" class="form-control district" name="district" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Road</label>
																<input type="text" class="form-control road" name="road" id="inputEmailAddress" placeholder="">
															</div>
															
															<div class="col-sm-6">
																<label for="inputSelectCountry" class="form-label">Country <span>*</span></label>
																<select class="form-select country_id" name="country_id" id="inputSelectCountry" aria-label="Default select example">
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
															
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">State <span>*</span></label>
																<select class="form-select state_id" name="state_id" id="inputSelectCountry" aria-label="Default select example">
																	<option value="">Select State</option>
																</select>
															</div>
															
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">City <span>*</span></label>
																<input type="text" class="form-control city_id" name="city_id" id="inputEmailAddress" placeholder="">
															</div>
															
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Zip Code <span>*</span></label>
																<input type="text" class="form-control zipcode" name="zipcode" id="inputEmailAddress" placeholder="">
															</div>
															
															
														</div>
										 </div>
										<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
										<div class="row g-3">
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Name <span>*</span></label>
																<input type="text" class="form-control name" name="name" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Family Name</label>
																<input type="text" class="form-control family_name" name="family_name" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Position</label>
																<input type="text" class="form-control position" name="position" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Mobile <span>*</span></label>
																<input type="text" class="form-control mobile" name="mobile" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Email</label>
																<input type="text" class="form-control email" name="email" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Remark</label>
																<textarea type="text" class="form-control remark" name="remark" id="inputEmailAddress" placeholder=""></textarea>
															</div> 
														</div>
										</div>
										<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3"> 
										<div class="row g-3">
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Bank Name</label>
																<input type="text" class="form-control bank_name" name="bank_name" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Bank Address</label>
																<input type="text" class="form-control bank_address" name="bank_address" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">SWIFT</label>
																<input type="text" class="form-control swift" name="swift" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label"> A/C No.</label>
																<input type="text" class="form-control ac_no" name="ac_no" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Beneficiary Name</label>
																<input type="text" class="form-control beneficiary_name" name="beneficiary_name" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Beneficiary Address</label>
																<textarea type="text" class="form-control beneficiary_address" name="beneficiary_address" id="inputEmailAddress" placeholder=""></textarea>
															</div> 
															<div class="col-sm-4">
																<label for="inputFirstName" class="form-label">Currency</label>
																<select class="form-select currency" name="currency" id="inputSelectCountry" aria-label="Default select example">
																	<?php foreach($countries as $countryObj) { ?>
																		 <option value="{{ $countryObj->currency }}">{{ $countryObj->currency }}</option>
																	<?php } ?>
																</select>
															 </div>
															 <div class="col-sm-4">
																<label for="inputLastName" class="form-label">Incoterm</label>
																<select class="form-select incoterm" name="incoterm" id="inputSelectCountry" aria-label="Default select example">
																   <option value="1">EXW</option>
																   <option value="2">CFR</option>
																   <option value="3">CIF</option>
																   <option value="4">FOB</option>
																   <option value="5">DDP</option>
																</select>
															 </div>
															 <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">Place of Delivery/Destination</label>
																<input type="text" class="form-control delivery_destination" name="delivery_destination" id="inputEmailAddress" placeholder="">
															 </div>
															 <div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label"> Installment 1</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															 </div>
															 <div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label"> Installment 1</label>
																<select class="form-select" id="inputSelectCountry" aria-label="Default select example">
																   <option value="1">PO Confirmed by Payment</option>
																   <option value="2">Sample Piece ready</option>
																   <option value="3">Work Progress 50%</option>
																   <option value="4">Work Progress 80%</option>
																   <option value="5">Work Progress 100%</option>
																   <option value="6">Original B/L is shown</option>
																</select>
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
				list.append(new Option(item.name, item.id));
			});
				
		},
	});
}

$(document).ready(function() {
	
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