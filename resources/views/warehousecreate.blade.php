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
					<div class="breadcrumb-title pe-3">Warehouse</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Warehouse Creator</li>
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
												<br>Warehouse Details</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
												<br>Core Products</a>
										</li>
									</ul>
									<div class="tab-content">
										<form id="supplier-form" data-url="">
											@csrf
											
											
											
										<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
												
													  <div class="row g-3">
                                                      <div class="col-sm-4">
                                                        <label for="formFile" class="form-label">Warehouse Name <span>*</span></label>
                                                        <input class="form-control mb-3 supplier_name" name="supplier_name" type="text" placeholder="Enter Warehouse name" aria-label="default input example" value="" >
                                                        </div>
                                                      <div class="col-sm-4">
                                                            <label for="formFile" class="form-label ">Warehouse Type <span>*</span></label>
                                                            <select class="form-select mb-3 supplier_type" name="supplier_type" aria-label="Default select example" >
                                                                <option value="">Select Warehouse Type </option>
                                                                <option value="">Own Warehouse</option>
                                                                <option value="">Own Showroom</option>
                                                                <option value="">Wholeseller Store / Warehouse</option>
                                                                <option value="">Retailer  Resident</option>
                                                            </select>
															</div>
                                                            <div class="col-sm-4">
                                                                <label for="formFile" class="form-label">Wholeseller /Retailer Name <span>*</span></label>
                                                                <input class="form-control mb-3 supplier_name" name="supplier_name" type="text" placeholder="Enter Warehouse name" aria-label="default input example" value="" >
                                                            </div>
                                                            <div class="col-sm-4">
                                                            <label for="formFile" class="form-label ">Store Name <span>*</span></label>
                                                            <select class="form-select mb-3 supplier_type" name="supplier_type" aria-label="Default select example" >
                                                                <option value="">Select Store Name </option>
                                                              
                                                            </select>
															</div>
                                                            <div style="clear:both"></div>
                                                            <h4>Warehouse Address</h4>
															<div class="col-sm-4">
																<label for="inputFirstName" class="form-label">Address no.</label>
																<input type="text"value="" class="form-control address" name="address" id="inputFirstName"  >
															</div>
															<div class="col-sm-4">
																<label for="inputLastName" class="form-label">Building / Village</label>
																<input type="text"value="" class="form-control building" name="building" id="inputLastName"  >
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">Sub District</label>
																<input type="text"value="" class="form-control sub_district" name="sub_district" id="inputEmailAddress"  placeholder="">
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">  District / City</label>
																<input type="text"value="" class="form-control district" name="district" id="inputEmailAddress"  placeholder="">
															</div>
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">Road</label>
																<input type="text"value="" class="form-control road" name="road" id="inputEmailAddress"  placeholder="">
															</div>
															
															<div class="col-sm-4">
																<label for="inputSelectCountry" class="form-label">Country <span>*</span></label>
																<select class="form-select country_id" name="country_id" id="inputSelectCountry"  aria-label="Default select example">
																	<option value="">Select Country</option>
																	
																		<option value="" ></option>
																	
																</select>
															</div> 
															
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">State / Province<span>*</span></label>
																<select class="form-select state_id" name="state_id" id="inputSelectCountry"  aria-label="Default select example">
																	<option value="">Select State</option>
																</select>
															</div>
															
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">City <span>*</span></label>
																<input type="text" value="" class="form-control city_id"  name="city_id" id="inputEmailAddress" placeholder="">
															</div>
															
															<div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">  Zip Code <span>*</span></label>
																<input type="text" value="" class="form-control zipcode"  name="zipcode" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label">  Contact Person <span>*</span></label>
																<input type="text" value="" class="form-control zipcode"  name="zipcode" id="inputEmailAddress" placeholder="">
															</div>
                                                            <div class="col-sm-4">
																<label for="inputEmailAddress" class="form-label"> Tel/ Mobile No. <span>*</span></label>
																<input type="text" value="" class="form-control zipcode"  name="zipcode" id="inputEmailAddress" placeholder="">
															</div>
															
														</div>
										        </div>
                                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                                
                                                <div class="table-responsive">
                                                    <table class="table mb-0"  id="dataTable">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Image</th>
                                                                <th>Product Name</th>
                                                                <th>Product Code</th>
                                                                <th>Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>
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


</body>

</html>