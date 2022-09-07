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
					<div class="breadcrumb-title pe-3">Dealer</div>
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
												<br>Dealer Details</a>
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
										<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                        <label for="formFile" class="form-label">Brand</label>
													<select class="form-select mb-3" aria-label="Default select example">
														<option selected>Select Brand </option>
														<option value="1">Meha</option>
														<option value="2">Inmind</option> 
													</select>
												<label for="formFile" class="form-label">Dealer Name</label>
												<input class="form-control mb-3" type="text" placeholder="enter dealer name" aria-label="default input example">
												   <h6>Head office address by certified document</h6>
													  <form class="row g-3">
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Address no.</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Building / Village</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Sub District</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  District</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Road</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  City</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">State</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
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
														</form>
                                                        <h6>
                                                            <div class="form-check">
                                                            <label class="form-check-label" for="flexCheckChecked">Conact address same as certified document address</label>
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> 
                                                            </div>
                                                        </h6>
													  <form class="row g-3">
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Address no.</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Building / Village</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Sub District</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  District</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Road</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  City</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">State</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
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
														</form>
										 </div>
										<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
										<form class="row g-3">
                                        <h6>Contact Person 1</h6>
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Name</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Family Name</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Position</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Mobile</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Email</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date of Birth:</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Line</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Remark</label>
																<textarea type="text" class="form-control" id="inputEmailAddress" placeholder=""></textarea>
															</div> 
														</form>

                                                        <form class="row g-3">
                                                        <h6>Contact Person 2</h6>
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Name</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Family Name</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Position</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Mobile</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Email</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date of Birth:</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Line</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Remark</label>
																<textarea type="text" class="form-control" id="inputEmailAddress" placeholder=""></textarea>
															</div> 
														</form>
										</div>
										<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3"> 
										<form class="row g-3">
                                       
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Bank Name</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Bank Address</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">SWIFT</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label"> A/C No.</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Beneficiary Name</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Beneficiary Address</label>
																<textarea type="text" class="form-control" id="inputEmailAddress" placeholder=""></textarea>
															</div> 
														</form>
										</div>
										 
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
$(document).ready(function() {

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