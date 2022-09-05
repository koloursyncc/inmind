<!doctype html>
<html lang="en">

@include('layout.header')
<style>
.mt-10{
	margin-top: 10px;
}	
</style>
<body>
	<!--wrapper-->
	<div class="wrapper">
		@include('layout.menu')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Product</h5>
					  <hr/>
                       <div class="form-body mt-4">
					    <div class="row">
						<div class="col-lg-5">
							<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label class="form-label">Brand Name</label>
										<select class="single-select">
											<option value="United States">Metha</option>
											<option value="United Kingdom">Inmind</option>`7
											<option value="Afghanistan">Inmind</option>
											<option value="Aland Islands">Inmind</option>
										</select>
									</div>
                              <div class="row g-3">
								<div class="col-md-12">
									<label for="inputPrice" class="form-label">Product Name</label>
									<input type="text" class="form-control" id="inputPrice" placeholder="Enter product name">
								  </div>
								 
								  <div class="col-md-12">
									<label for="inputCostPerPrice" class="form-label">Color</label>
									<input type="text" class="form-control" id="inputCostPerPrice" placeholder="">
								  </div>
								  <div class="col-md-12">
									<label for="inputStarPoints" class="form-label">Product Code</label>
									<input type="text" class="form-control" id="inputStarPoints" placeholder="">
								  </div>
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" class="btn btn-primary">Generate </button>
									  </div>
								  </div>
								  <div class="col-12">
									  <div class="d-grid">
                                        <img class="img-thumbnail" src="{{asset('assets/images/barcode-png.webp')}}">
									  </div>
								  </div> 
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" class="btn btn-primary">Download </button>
									  </div>
								  </div>
							  </div> 
		                    </div>
						  </div><div class="col-lg-7">
                           <div class="border border-3 p-4 rounded">
												 <div class="row">
														<h6>Dimension</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">Width(MM)</label>
														<input type="text" class="form-control" id="inputPrice" placeholder="Enter Width">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Depth(MM)</label>
														<input type="text" class="form-control" id="inputCostPerPrice" placeholder="Enter Depth">
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Height(MM)</label>
														<input type="text" class="form-control" id="inputStarPoints" placeholder="Enter Height">
													</div>
								                </div>
												<div class="row">
														<h6 class="mt-10 ">Package</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">Width(MM)</label>
														<input type="text" class="form-control" id="inputPrice" placeholder="Enter Width">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Depth(MM)</label>
														<input type="text" class="form-control" id="inputCostPerPrice" placeholder="Enter Depth">
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Height(MM)</label>
														<input type="text" class="form-control" id="inputStarPoints" placeholder="Enter Height">
													</div>
								                </div>
								             <div class="row ">
														<h6 class="mt-10 ">Gross Weight</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">kg/set</label>
														<input type="text" class="form-control" id="inputPrice" placeholder="weight">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">CBM</label>
														<input type="text" class="form-control" id="inputCostPerPrice" placeholder="">
													</div>
												
								            </div> 
																			 <div class="row " >
													<h6 class="mt-10 ">Net Weight</h6>
													<div class="col-md-4">	
													<label for="inputPrice" class="form-label">kg/set</label>
													<input type="text" class="form-control" id="inputPrice" placeholder="Enter weight">
												</div>
												
												
								 </div>

								 <div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*20' contain</label>
														<input type="text" class="form-control" id="inputPrice" value="300" disabled >
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" class="form-control" id="inputCostPerPrice"value="300"  disabled>
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" class="form-control" id="inputStarPoints" value="300" disabled >
													</div>
								                </div>

												<div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*40' contain</label>
														<input type="text" class="form-control" id="inputPrice" value="300"  disabled >
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" class="form-control" id="inputCostPerPrice"value="300" disabled >
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" class="form-control" id="inputStarPoints" value="300" disabled >
													</div>
								                </div>
												
												<div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*40' HQ contain</label>
														<input type="text" class="form-control" id="inputPrice" value="300" disabled>
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" class="form-control" id="inputCostPerPrice"value="300" disabled>
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" class="form-control" id="inputStarPoints" value="300" disabled >
													</div>
								                </div>	
							
							  <div class="mb-3 mt-10 " >
								<label for="inputProductDescription" class="form-label">Product Images</label>
								<input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  </div>
							  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" class="btn btn-primary">Creae Product </button>
									  </div>
								  </div>
                            </div>
						   </div>
						   
					   </div><!--end row-->
					</div>
				  </div>
			  </div>

			</div>
		</div>
		<!--end page wrapper -->
		@include('layout.footer')
	<!-- Bootstrap JS -->
   @include('layout.jsfile')
	
</body>

</html>