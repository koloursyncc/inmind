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
					   <form id="prodctsave">
								@csrf
					    <div class="row">
						
						<div class="col-lg-5">
							<div class="border border-3 p-4 rounded">
								
								<div class="mb-3">
									<label for="formFile" class="form-label">Type of Product</label>
									<div style="clear:both"></div>
									<div class="form-check form-check-inline">
										<input class="form-check-input typeval" value="1" type="radio" name="type" id="inlineRadio1" value="option1" checked>
										<label class="form-check-label" for="inlineRadio1">Sole Piece</label>
									</div>
								  
									<div class="form-check form-check-inline">
										<input class="form-check-input typeval" value="2" type="radio" name="type" id="inlineRadio1" value="option1">
										<label class="form-check-label" for="inlineRadio1">Set</label>
									</div>
									<div style="clear:both"></div>
									<span class="type"></span>
								 </div>
								 
								 
								 
								<div class="mb-3 d-none product_in_set_input">
									<label for="inputPrice" class="form-label">Product In Set</label>
									<input type="text" class="form-control product_in_set" name="product_in_set" id="inputPrice" value="1">
								</div>
							
									<div class="mb-3">
										<label class="form-label">Brand Name</label>
										<select class="single-select brand_id" id="" name="brand_id">
											<option value="1">Metha</option>
											<option value="2">Inmind</option>
											<option value="3">Inmind</option>
											<option value="4">Inmind</option>
										</select>
									</div>
                              <div class="row g-3">
								<div class="col-md-12">
									<label for="inputPrice" class="form-label">Product Name</label>
									<input type="text" class="form-control name" name="name" id="inputPrice" placeholder="Enter product name">
								  </div>
								 
								  <div class="col-md-12">
									<label for="inputCostPerPrice" class="form-label">Color</label>
									<input type="text" class="form-control color" name="color" id="inputCostPerPrice" placeholder="">
								  </div>
								  <div class="col-md-12">
									<label for="inputStarPoints" class="form-label">Product Code</label>
									<input type="text" class="form-control code" name="code" id="inputStarPoints" placeholder="">
								  </div>
								  
									<div class="product_in_set_input_group">
										
									</div>
								  
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" class="btn btn-primary generatecode">Generate </button>
									  </div>
								  </div>
								  <div class="col-12">
									  <div class="d-grid generatecodecontainer">
											<?php //$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
													//$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
												/* 
											{!! $generator->getBarcode('0001245259636', $generator::TYPE_CODE_128) !!}
											$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
											<img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('005263635', $generatorPNG::TYPE_CODE_128)) }}">
											*/
											?>
				
									    
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
														<input type="text" class="form-control dimension_width" name="dimension_width" id="inputPrice" placeholder="Enter Width">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Depth(MM)</label>
														<input type="text" class="form-control dimension_depth" name="dimension_depth" id="inputCostPerPrice" placeholder="Enter Depth">
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Height(MM)</label>
														<input type="text" class="form-control dimension_height" name="dimension_height" id="inputStarPoints" placeholder="Enter Height">
													</div>
								                </div>
												<div class="row">
														<h6 class="mt-10 ">Package</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">Width(MM)</label>
														<input type="text" class="form-control package_width" name="package_width" id="inputPrice" placeholder="Enter Width">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Depth(MM)</label>
														<input type="text" class="form-control package_depth" name="package_depth" id="inputCostPerPrice" placeholder="Enter Depth">
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Height(MM)</label>
														<input type="text" class="form-control package_height" name="package_height" id="inputStarPoints" placeholder="Enter Height">
													</div>
								                </div>
								             <div class="row ">
														<h6 class="mt-10 ">Gross Weight</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">kg/set</label>
														<input type="text" class="form-control gross_kg" name="gross_kg" id="inputPrice" placeholder="weight">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">CBM</label>
														<input type="text" class="form-control cbm" name="cbm" id="inputCostPerPrice" placeholder="">
													</div>
												
								            </div> 
																			 <div class="row " >
													<h6 class="mt-10 ">Net Weight</h6>
													<div class="col-md-4">	
													<label for="inputPrice" class="form-label">kg/set</label>
													<input type="text" class="form-control net_height" name="net_height" id="inputPrice" placeholder="Enter weight">
												</div>
												
												
								 </div>

								 <div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*20' contain</label>
														<input type="text" class="form-control 1_20_contain" name="1_20_contain" id="inputPrice" value="" readonly >
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" class="form-control 1_20_contain_net_weight" name="1_20_contain_net_weight" id="inputCostPerPrice"value=""  readonly>
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" class="form-control 1_20_contain_net_gross_weight" name="1_20_contain_net_gross_weight" id="inputStarPoints" value="" readonly >
													</div>
								                </div>

												<div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*40' contain</label>
														<input type="text" class="form-control 1_40_contain" name="1_40_contain" id="inputPrice" value=""  readonly >
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" class="form-control 1_40_contain_net_weight" name="1_40_contain_net_weight" id="inputCostPerPrice"value="" readonly >
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" class="form-control 1_40_contain_net_gross_weight" name="1_40_contain_net_gross_weight" id="inputStarPoints" value="" readonly >
													</div>
								                </div>
												
												<div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*40' HQ contain</label>
														<input type="text" class="form-control 1_40_hq_contain" name="1_40_hq_contain" id="inputPrice" value="" readonly>
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" class="form-control 1_40_hq_net_weight" name="1_40_hq_net_weight" id="inputCostPerPrice"value="" readonly>
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" class="form-control 1_40_hq_net_gross_weight" name="1_40_hq_net_gross_weight" id="inputStarPoints" value="" readonly >
													</div>
								                </div>	
							
							  <div class="mb-3 mt-10 " >
								<label for="inputProductDescription" class="form-label">Product Images</label>
								<input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  </div>
							  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" class="btn btn-primary saveproduct">Create Product </button>
									  </div>
								  </div>
								  
                            </div>
						   </div>
						  
					   </div><!--end row-->
					    </form>
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

<div style="display:none">
	<div class="kind_of_product_clone">
		<div class="row clonedata">
			<div class="md-3">
				<label for="inputPrice" class="form-label kind_of_product_label"></label>
				<select class="form-control kind_of_product">
					<option value="1">Basin</option>
					<option value="2">Bed</option>
					<option value="3">Cabinet</option>
					<option value="4">Chair</option>
					<option value="5">Fabric</option>
					<option value="6">Shelf</option>
					<option value="7">Statue</option>
				</select>
			</div>
			
			<div class="mb-3">
				<label for="inputPrice" class="form-label kind_of_product_qty_label"></label>
				<input type="text" class="form-control kind_of_product_qty" value="1" id="inputStarPoints">
			</div>
		</div>
	</div>
</div>

<script>
function validPrice(evt, element)
{
	var flag = false;
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;            
	var keyCode = key;
	key = String.fromCharCode(key);          
	if (key.length == 0) return;
	var regex = /^[0-9.,\b]+$/;            
	if(keyCode == 188 || keyCode == 190) {
		return;
	} else {
		if (!regex.test(key)) {
			theEvent.returnValue = false;                
			if (theEvent.preventDefault) theEvent.preventDefault();
		} else {
			flag = true;
		}
	} 
	return flag;
}

function kindproduct(num) {
	$('.product_in_set_input_group').html('');
	for (let i = 1; i <= num; i++) {
		
		var clone = $('.clonedata', $('.kind_of_product_clone')).clone();
		$('.kind_of_product_label', clone).html('Kind of Product '+i);
		$('.kind_of_product', clone).attr('name', 'kind_of_product['+i+']');
		$('.kind_of_product_qty_label', clone).html('Product Qty '+i);
		$('.kind_of_product_qty', clone).attr('name', 'kind_of_product_qty['+i+']');
		$('.product_in_set_input_group').append(clone);
	}
}

function calulation(cbmval, grossweight, netweight) {
	var cbm20 = 27;
	var cbm54 = 54;
	var cbm72 = 72;	
	var contain20 = $('.1_20_contain');
	var contain40 = $('.1_40_contain');
	var contain40hq = $('.1_40_hq_contain');
	
	contain20.val(Math.ceil(cbm20*cbmval));
	contain40.val(Math.ceil(cbm54*cbmval));
	contain40hq.val(Math.ceil(cbm72*cbmval));
	
	if($('.1_20_contain').val() != '') {
		
		if(netweight > 0) {
			
			$('.1_20_contain_net_weight').val(Math.ceil(netweight*$('.1_20_contain').val()));
			
		} else {
			
			$('.1_20_contain_net_weight').val(0);
			
		}
		
		if(grossweight > 0) {
			
			$('.1_20_contain_net_gross_weight').val(Math.ceil(grossweight*$('.1_20_contain').val()));
			
		} else {
			
			$('.1_20_contain_net_gross_weight').val(0);
			
		}
		
		
	} else {
		
		$('.1_20_contain_net_weight').val(0);
		$('.1_20_contain_net_gross_weight').val(0);
		
	}
	
	if($('.1_40_contain').val() != '') {
		
		if(netweight > 0) {
			
			$('.1_40_contain_net_weight').val(Math.ceil(netweight*$('.1_40_contain').val()));
			
		} else {
			
			$('.1_40_contain_net_weight').val(0);
			
		}
		
		if(grossweight > 0) {
			
			$('.1_40_contain_net_gross_weight').val(Math.ceil(grossweight*$('.1_40_contain').val()));
			
		} else {
			
			$('.1_40_contain_net_gross_weight').val(0);
			
		}
		
	} else {
		
		$('.1_40_contain_net_weight').val(0);
		$('.1_40_contain_net_gross_weight').val(0);
		
	}
	
	if($('.1_40_hq_contain').val() != '') {
		
		if(netweight > 0) {
			
			$('.1_40_hq_net_weight').val(Math.ceil(netweight*$('.1_40_hq_contain').val()));
			
		} else {
			
			$('.1_40_hq_net_weight').val(0);
			
		}
		
		if(grossweight > 0) {
			
			$('.1_40_hq_net_gross_weight').val(Math.ceil(grossweight*$('.1_40_hq_contain').val()));
			
		} else {
			
			$('.1_40_hq_net_gross_weight').val(0);
			
		}
		
	} else {
		
		$('.1_40_hq_net_weight').val(0);
		$('.1_40_hq_net_gross_weight').val(0);
		
	}
	
}

	$(document).ready(function() {
		$('body').on('keypress', '.cbm', function(event) {
			
			if(validPrice(event, this) == true) {
				setTimeout(function() {
					
					calulation($('.cbm').val(), $('.gross_kg').val(), $('.net_height').val());
				}, 10);
				
			}
		});
		
		$('body').on('keypress', '.gross_kg', function(event) {
			
			if(validPrice(event, this) == true) {
				setTimeout(function() {
					
					calulation($('.cbm').val(), $('.gross_kg').val(), $('.net_height').val());
				}, 10);
				
			}
		});
		
		$('body').on('keypress', '.net_height', function(event) {
			
			if(validPrice(event, this) == true) {
				setTimeout(function() {
					
					calulation($('.cbm').val(), $('.gross_kg').val(), $('.net_height').val());
				}, 10);
				
			}
		});
		
		$('body').on('change', '.typeval', function() {
			var value = $(this).val();
			$('.product_in_set_input').addClass('d-none');
			$('.product_in_set').val(1);
			$('.product_in_set_input_group').html('');
			if(value == 2)
			{
				kindproduct(1);
				$('.product_in_set_input').removeClass('d-none');
			}
		});
		
		$('body').on('keypress', '.product_in_set', function(event) {
			
			if(validPrice(event, this) == true) {
				setTimeout(function() {
					var num = $('.product_in_set').val();
					kindproduct(num);
				}, 1500);
			}
		});
		
		$('body').on('keypress', '.dimension_width', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('keypress', '.dimension_depth', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('keypress', '.dimension_height', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('keypress', '.package_width', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('keypress', '.package_depth', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('keypress', '.package_height', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('keypress', '.kind_of_product_qty', function(event) {
			validPrice(event, this);
		});
		
		$('body').on('click', '.generatecode', function() {
			$.ajax({
				url: "{{url('product/generatecode')}}",
				dataType : "json",
				type: "get",
				data : $('#prodctsave').serialize(),
				processData: false,
				contentType: false,
				cache: false,
				success : function(response) {
					if(response.status == 'success') {
						$('.generatecodecontainer').html('<a href="'+response.generate+'" target="_blank"><img src="'+response.generate+'" download="output.png" /></a><input type="hidden" name="barcode" value="'+response.generate+'" />');
					}
					/* $('.saveproduct').removeAttr('disabled');
					$('.saveproduct').html('Create Product');
			
					if(response.status == 'success') {
						
						alert(response.msg);
						window.location.href = "{{url('productlist')}}";
						
					} else if(response.status == 'errors') {
						$.each(response.errors, function(key, msg) {
							$('.'+key).after('<span class="err_msg" style="color:red">'+msg+'</span>');
						});
					} else if(response.status == 'error') {
						
						alert(response.error);
						
					} else if(response.status == 'exceptionError') {
						
					} */
				},
			});
		});
		
		$('body').on('click', '.saveproduct', function() {
			$(this).attr('disabled', 'disabled');
			$(this).html('Loading...');
			
			$('.err_msg').remove();
			var params = new FormData($("#prodctsave")[0]);
			$.ajax({
				url: "{{url('save/product')}}",
				dataType : "json",
				type: "post",
				data : params,
				processData: false,
				contentType: false,
				cache: false,
				success : function(response) {
					$('.saveproduct').removeAttr('disabled');
					$('.saveproduct').html('Create Product');
			
					if(response.status == 'success') {
						
						alert(response.msg);
						window.location.href = "{{url('productlist')}}";
						
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
		});
	});
</script>