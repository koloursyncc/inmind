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
					<div class="col-xl-8 mx-auto">
						
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
											<a class="nav-link" href="#step-3">	<strong>Step 2</strong> 
												<br>Contact Person</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
												<br>Bank Details</a>
										</li>
										 
									</ul>
									<div class="tab-content">
										<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                                       <h6>
                                                            <div class="form-check">
                                                            <label class="form-check-label" for="flexCheckChecked">Activated Staff</label>
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"  > 
                                                            </div>
                                                        </h6>
												<label for="formFile" class="form-label">Staff ID</label>
												<input class="form-control mb-3" type="text" value="1234" disabled aria-label="default input example">
                                                <label for="formFile" class="form-label">Title</label>  <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Mr.</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Ms.</label>
								                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Other</label>
								                </div>
                                                <form class="row g-3">
															<div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Name(Thai)</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Name(English)</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Family Name(Thai)</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Family Name(English)</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div> 
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Nick Name</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Current Job Position</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">  Mobile no.</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
															<div class="col-sm-6">
																<label for="inputEmailAddress" class="form-label">Current Salary/ Wages</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date of Birth:</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                             </div>
                                                             <div class="row">
                                                             <div class="form-check form-check-inline col-sm-3">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1">ID Card</label>
                                                            </div>
                                                            <div class="form-check form-check-inline col-sm-3">
                                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option1">
                                                                    <label class="form-check-label" for="inlineRadio1">Passport</label>
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">  ID Card no.</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Issue   Date</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                             </div>
                                                             <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label"> Issue by</label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label"> Passport No. </label>
																<input type="text" class="form-control" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Expire   Date</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                             </div>
                                                             <div class="col-sm-4">
                                                             <label for="inputSelectCountry" class="form-label">Country</label>
																<select class="form-select" id="inputSelectCountry" aria-label="Default select example">
																	<option selected="">India</option>
																	<option value="1">United Kingdom</option>
																	<option value="2">America</option>
																	<option value="3">Dubai</option>
																</select>
															</div>
                                                            <div class="mb-3 mt-10 col-md-12 " >
                                                            <label for="inputProductDescription" class="form-label">Upload Staff Photo & ID Card  </label>
                                                            <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                           </div>
                                                           <label for="formFile" class="form-label">Highest Education</label>
                                                            <select class="form-select mb-3" aria-label="Default select example">
                                                                <option selected>Select Option</option>
                                                                <option value="1">P6</option>
                                                                <option value="2">M3</option>
                                                                <option value="3">M6</option>
                                                                <option value="3">Under graduate</option>
                                                                <option value="3">Graduate</option> 
                                                            </select>
                                                            <div class="col-sm-6">
																<label for="inputFirstName" class="form-label">School / Univercity Name</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6"> 
																<div class="mb-3">
                                                                <label class="form-label">Educational Year</label>
                                                                <input type="date" class="form-control">
                                                            </div>
															</div>
                                                            <div class="col-sm-6">
																<label for="inputFirstName" class="form-label">Faculty / School of</label>
																<input type="text" class="form-control" id="inputFirstName" placeholder=" ">
															</div>
															<div class="col-sm-6">
																<label for="inputLastName" class="form-label">Department</label>
																<input type="text" class="form-control" id="inputLastName" placeholder=" ">
															</div>
														</form>
                                                
										 </div>
										<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                        <h6>Home address as registered document</h6>
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
                                                            <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
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
                                                            <div class="mb-3 mt-10 col-md-12 " >
                                                            <label for="inputProductDescription" class="form-label">Upload Home Registration </label>
                                                            <input id="image-uploadify1" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                           </div>
														</form>
										
										</div>
										<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3"> 
										<form class="row g-3">

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