<!doctype html>
<html lang="en">

@include('layout.header')
<style>
.mt-10{
	margin-top: 10px;
}	
</style>
<?php
$brands = array(
	1 => 'Metha',
	2 => 'Inmind',
	3 => 'Inmind',
	4 => 'Inmind',
);

$kindProducts = array(
	1 => 'Basin',
	2 => 'Bed',
	3 => 'Cabinet',
	4 => 'Chair',
	5 => 'Fabric',
	6 => 'Shelf',
	7 => 'Statue',
);
$disabledrow = '';
$type_of_product_sole = 'checked';
$type_of_product_set = '';
$disable = '';
$product_name = '';
$product_code = '';
$product_brand_id = '';
$product_color = '';
$product_barcode = '';
$product_type = '';
$product_product_in_set = '';
$product_dimension_width = '';
$product_dimension_width = '';
$product_dimension_depth = '';
$product_dimension_height = '';
$product_package_width = '';
$product_package_depth = '';
$product_package_height = '';
$product_contain_1_20 = '';
$product_contain_1_20_net_weight = '';
$product_contain_1_20_net_gross_weight = '';
$product_contain_1_40 = '';
$product_contain_1_40_net_weight = '';
$product_contain_1_40_net_gross_weight = '';
$product_hq_1_40_contain = '';
$product_hq_1_40_net_weight = '';
$product_hq_1_40_net_gross_weight = '';
$product_gross_kg = '';
$product_cbm = '';
$product_net_height = '';

$form = 'prodctsave';
if($type != 'save') {
	
	if($type =='edit') {
		$form = 'prodctupdate';
	}
	
	if($product->type == 2) {
		
		
	}
	
	$type_of_product_sole = '';
	$type_of_product_set = 'checked';
	
	$product_name = $product->name;
	$product_code = $product->code;
	$product_brand_id = $product->brand_id;
	$product_color = $product->color;
	$product_barcode = $product->barcode;
	$product_type = $product->type;
	$product_product_in_set = $product->product_in_set;
	$product_dimension_width = $product->dimension_width;
	$product_dimension_width = $product->dimension_width;
	$product_dimension_depth = $product->dimension_depth;
	$product_dimension_height = $product->dimension_height;
	$product_package_width = $product->package_width;
	$product_package_depth = $product->package_depth;
	$product_package_height = $product->package_height;
	$product_contain_1_20 = $product->contain_1_20;
	$product_contain_1_20_net_weight = $product->contain_1_20_net_weight;
	$product_contain_1_20_net_gross_weight = $product->contain_1_20_net_gross_weight;
	$product_contain_1_40 = $product->contain_1_40;
	$product_contain_1_40_net_weight = $product->contain_1_40_net_weight;
	$product_contain_1_40_net_gross_weight = $product->contain_1_40_net_gross_weight;
	$product_hq_1_40_contain = $product->hq_1_40_contain;
	$product_hq_1_40_net_weight = $product->hq_1_40_net_weight;
	$product_hq_1_40_net_gross_weight = $product->hq_1_40_net_gross_weight;
	$product_gross_kg = $product->gross_kg;
	$product_cbm = $product->cbm;
	$product_net_height = $product->net_height;
	
}

if($type == 'view') {
	$disabledrow = 'disabled';
}
?>

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
								<li class="breadcrumb-item active" aria-current="page">{{ $heading }}</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">{{ $heading }}</h5>
					  <hr/>
                       <div class="form-body mt-4">
					   <form id="{{ $form }}" class="fromid {{ $form }}">
								@csrf
								
							<?php if($type =='edit') { ?>
								<input type="hidden" name="product_id" value="{{ $product->id }}">
							<?php } ?>
								
					    <div class="row">
						
						<div class="col-lg-5">
							<div class="border border-3 p-4 rounded">
								
								<div class="mb-3">
									<label for="formFile" class="form-label">Type of Product</label>
									<div style="clear:both"></div>
									<div class="form-check form-check-inline">
										<input class="form-check-input typeval" value="1" type="radio" name="type" id="inlineRadio1" value="option1" {{ $type_of_product_sole }}  {{ $disabledrow }}>
										<label class="form-check-label" for="inlineRadio1">Sole Piece</label>
									</div>
								  
									<div class="form-check form-check-inline">
										<input class="form-check-input typeval" value="2" type="radio" name="type" id="inlineRadio1" value="option1" {{ $type_of_product_set }} {{ $disabledrow }}>
										<label class="form-check-label" for="inlineRadio1">Set</label>
									</div>
									<div style="clear:both"></div>
									<span class="type"></span>
								 </div>
								 
								 
								 
								<div class="mb-3 <?php if($type == 'save') { ?>d-none<?php } ?> product_in_set_input">
									<label for="inputPrice" class="form-label">Product In Set</label>
									<input type="text" class="form-control product_in_set" name="product_in_set" id="inputPrice" value="<?php if($type == 'save') { ?>1<?php } else { echo $product_product_in_set; } ?>" {{ $disabledrow }}>
								</div>
							
									<div class="mb-3">
										<label class="form-label">Brand Name</label>
										<select class="single-select brand_id" id="" name="brand_id" {{ $disabledrow }}>
											<?php foreach($brands as $brandKey => $brandObj) { ?>
												<option value="{{ $brandKey }}" <?php if($product_brand_id == $brandKey) { echo 'selected'; } ?>>{{ $brandObj }}</option>
											<?php } ?>
										</select>
									</div>
                              <div class="row g-3">
								<div class="col-md-12">
									<label for="inputPrice" class="form-label">Product Name</label>
									<input type="text" class="form-control name" name="name" id="inputPrice" placeholder="Enter product name" {{ $disabledrow }} value="{{ $product_name }}">
								  </div>
								 
								  <div class="col-md-12">
									<label for="inputCostPerPrice" class="form-label">Color</label>
									<input type="text" class="form-control color" name="color" id="inputCostPerPrice"  {{ $disabledrow }} value="{{ $product_color }}">
								  </div>
								  <div class="col-md-12">
									<label for="inputStarPoints" class="form-label">Product Code</label>
									<input type="text" class="form-control code" name="code" id="inputStarPoints"  {{ $disabledrow }} value="{{ $product_code }}">
								  </div>
								  
									<div class="product_in_set_input_group">
										<?php foreach($product_set as $product_setkey => $product_setObj) {
												$number = ++$product_setkey;
											?>
											<div class="mb-3">
											<label for="inputPrice" class="form-label kind_of_product_label">Kind of Product {{ $number }}</label>
												<select name="kind_of_product[{{ $number }}]" class="form-control kind_of_product"  {{ $disabledrow }}>
													<?php foreach($kindProducts as $kindProductKey => $kindProduct) { ?>
														<option value="{{ $kindProductKey }}" <?php if($kindProductKey == $product_setObj->kind_of_product) { echo 'selected'; } ?>>{{ $kindProduct }}</option>
													<?php } ?>
												</select>
											</div>
											
											<div class="mb-3">
												<label for="inputPrice" class="form-label kind_of_product_qty_label">Product Qty {{ $number }}</label>
												<input type="text" name="kind_of_product_qty[{{ $number }}]" class="form-control kind_of_product_qty" value="{{ $product_setObj->qty }}" id="inputStarPoints" {{ $disabledrow }}>
											</div>
										<?php } ?>
									</div>
								  <?php if($type != 'view') { ?>
								  <div class="col-12">
									  <div class="d-grid">
                                         <button type="button" class="btn btn-primary generatecode">Generate </button>
									  </div>
								  </div>
								  <?php } ?>
								  <div class="col-12">
									  <div class="d-grid generatecodecontainer">
											<?php if($product_barcode) {
												echo '<a id="download_barcode" download="barcode.png" href="'.$product_barcode.'" target="_blank"><img style="width:407px;" src="'.$product_barcode.'"></a>';
												echo '<input type="hidden" name="barcode" value="'.$product_barcode.'" />';
											} ?>
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
                                         <button type="button" class="btn btn-primary download_barcode_trigger" onclick="document.getElementById('download_barcode').click()">Download </button>
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
														<input type="text" {{ $disabledrow }} class="form-control dimension_width" name="dimension_width" id="inputPrice" placeholder="Enter Width" value="{{ $product_dimension_width }}">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Depth(MM)</label>
														<input type="text" {{ $disabledrow }} class="form-control dimension_depth" name="dimension_depth" id="inputCostPerPrice" placeholder="Enter Depth" value="{{ $product_dimension_depth }}">
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Height(MM)</label>
														<input type="text" {{ $disabledrow }} class="form-control dimension_height" name="dimension_height" id="inputStarPoints" placeholder="Enter Height" value="{{ $product_dimension_height }}">
													</div>
								                </div>
												<div class="row">
														<h6 class="mt-10 ">Package</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">Width(MM)</label>
														<input type="text" {{ $disabledrow }} class="form-control package_width" name="package_width" id="inputPrice" placeholder="Enter Width" value="{{ $product_package_width }}">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Depth(MM)</label>
														<input type="text" {{ $disabledrow }} class="form-control package_depth" name="package_depth" id="inputCostPerPrice" placeholder="Enter Depth" value="{{ $product_package_depth }}">
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Height(MM)</label>
														<input type="text" {{ $disabledrow }} class="form-control package_height" name="package_height" id="inputStarPoints" placeholder="Enter Height" value="{{ $product_package_height }}">
													</div>
								                </div>
								             <div class="row ">
														<h6 class="mt-10 ">Gross Weight</h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">kg/set</label>
														<input type="text" {{ $disabledrow }} class="form-control gross_kg" value="{{ $product_gross_kg }}" name="gross_kg" id="inputPrice" placeholder="weight">
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">CBM</label>
														<input type="text" {{ $disabledrow }} class="form-control cbm" value="{{ $product_cbm }}" name="cbm" id="inputCostPerPrice" placeholder="">
													</div>
												
								            </div> 
																			 <div class="row " >
													<h6 class="mt-10 ">Net Weight</h6>
													<div class="col-md-4">	
													<label for="inputPrice" class="form-label">kg/set</label>
													<input type="text" {{ $disabledrow }} class="form-control net_height" value="{{ $product_net_height }}" name="net_height" id="inputPrice" placeholder="Enter weight">
												</div>
												
												
								 </div>

								 <div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*20' contain</label>
														<input type="text" {{ $disabledrow }} class="form-control contain_1_20" name="contain_1_20" id="inputPrice" value="{{ $product_contain_1_20 }}" readonly >
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" {{ $disabledrow }} class="form-control contain_1_20_net_weight" name="contain_1_20_net_weight" id="inputCostPerPrice" value="{{ $product_contain_1_20_net_weight }}"  readonly>
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" {{ $disabledrow }} class="form-control contain_1_20_net_gross_weight" name="contain_1_20_net_gross_weight" id="inputStarPoints" value="{{ $product_contain_1_20_net_gross_weight }}" readonly >
													</div>
								                </div>

												<div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*40' contain</label>
														<input type="text" {{ $disabledrow }} class="form-control contain_1_40" name="contain_1_40" id="inputPrice" value="{{ $product_contain_1_40 }}"  readonly >
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" {{ $disabledrow }} class="form-control contain_1_40_net_weight" name="contain_1_40_net_weight" id="inputCostPerPrice" value="{{ $product_contain_1_40_net_weight }}" readonly >
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" {{ $disabledrow }} class="form-control contain_1_40_net_gross_weight" name="contain_1_40_net_gross_weight" id="inputStarPoints" value="{{ $product_contain_1_40_net_gross_weight }}" readonly >
													</div>
								                </div>
												
												<div class="row">
														<h6></h6>
														<div class="col-md-4">	
														<label for="inputPrice" class="form-label">1*40' HQ contain</label>
														<input type="text" {{ $disabledrow }} class="form-control hq_1_40_contain" name="hq_1_40_contain" id="inputPrice" value="{{ $product_hq_1_40_contain }}" readonly>
													</div>
													<div class="col-md-4">
														<label for="inputCostPerPrice" class="form-label">Net Weight</label>
														<input type="text" {{ $disabledrow }} class="form-control hq_1_40_net_weight" name="hq_1_40_net_weight" id="inputCostPerPrice" value="{{ $product_hq_1_40_net_weight }}" readonly>
													</div>
													<div class="col-md-4">
														<label for="inputStarPoints" class="form-label">Gross Weight</label>
														<input type="text" {{ $disabledrow }} class="form-control hq_1_40_net_gross_weight" name="hq_1_40_net_gross_weight" id="inputStarPoints" value="{{ $product_hq_1_40_net_gross_weight }}" readonly >
													</div>
								                </div>	
							
								<?php foreach($images as $imageObj) { ?>
									<div id="image_row_{{ $imageObj->id }}">
									<img  src="{{ asset('images/products/'.$imageObj->product_id.'/'.$imageObj->name) }}" width="140" />
									<a href="#" class="removeimg" data-id="{{ $imageObj->id }}">Remove</a>
									</div>
								<?php } ?>
							<?php if($type != 'view')  { ?>
							  <div class="mb-3 mt-10 " >
								<label for="inputProductDescription" class="form-label">Product Images</label>
								<input {{ $disabledrow }} id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  </div>
							<?php } ?>
							  <?php if($type !='view') { ?>
								<div class="col-12">
									<div class="d-grid">
										<button type="button" class="btn btn-primary <?php if($type =='edit') { echo 'updateproduct'; } else { echo 'saveproduct'; } ?>">Create Product </button>
									</div>
								</div>
							  <?php } ?>
								  
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
	var contain20 = $('.contain_1_20');
	var contain40 = $('.contain_1_40');
	var contain40hq = $('.hq_1_40_contain');
	
	contain20.val(Math.ceil(cbm20*cbmval));
	contain40.val(Math.ceil(cbm54*cbmval));
	contain40hq.val(Math.ceil(cbm72*cbmval));
	
	if($('.contain_1_20').val() != '') {
		
		if(netweight > 0) {
			
			$('.contain_1_20_net_weight').val(Math.ceil(netweight*$('.contain_1_20').val()));
			
		} else {
			
			$('.contain_1_20_net_weight').val(0);
			
		}
		
		if(grossweight > 0) {
			
			$('.contain_1_20_net_gross_weight').val(Math.ceil(grossweight*$('.contain_1_20').val()));
			
		} else {
			
			$('.contain_1_20_net_gross_weight').val(0);
			
		}
		
		
	} else {
		
		$('.contain_1_20_net_weight').val(0);
		$('.contain_1_20_net_gross_weight').val(0);
		
	}
	
	if($('.contain_1_40').val() != '') {
		
		if(netweight > 0) {
			
			$('.contain_1_40_net_weight').val(Math.ceil(netweight*$('.contain_1_40').val()));
			
		} else {
			
			$('.contain_1_40_net_weight').val(0);
			
		}
		
		if(grossweight > 0) {
			
			$('.contain_1_40_net_gross_weight').val(Math.ceil(grossweight*$('.contain_1_40').val()));
			
		} else {
			
			$('.contain_1_40_net_gross_weight').val(0);
			
		}
		
	} else {
		
		$('.contain_1_40_net_weight').val(0);
		$('.contain_1_40_net_gross_weight').val(0);
		
	}
	
	if($('.hq_1_40_contain').val() != '') {
		
		if(netweight > 0) {
			
			$('.hq_1_40_net_weight').val(Math.ceil(netweight*$('.hq_1_40_contain').val()));
			
		} else {
			
			$('.hq_1_40_net_weight').val(0);
			
		}
		
		if(grossweight > 0) {
			
			$('.hq_1_40_net_gross_weight').val(Math.ceil(grossweight*$('.hq_1_40_contain').val()));
			
		} else {
			
			$('.hq_1_40_net_gross_weight').val(0);
			
		}
		
	} else {
		
		$('.hq_1_40_net_weight').val(0);
		$('.hq_1_40_net_gross_weight').val(0);
		
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
		
		$('body').on('click', '.removeimg', function(event) {
			var id = $(this).attr('data-id');
			if (confirm('Are you sure you want remove this image?')) {
				$.ajax({
					url: "{{url('product/removeimagebyid')}}",
					dataType : "json",
					type: "post",
					data : {'image_id': id, "_token": "{{ csrf_token() }}"},
					success : function(response) {
						if(response.status == 'success') {
							$('#image_row_'+id).remove();
						}
					},
				});
			} 
			
			return false;
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
			if($('.fromid').hasClass('prodctupdate')) {
				var data = $('#prodctupdate').serialize();
			} else {
				var data = $('#prodctsave').serialize();
			}
			$.ajax({
				url: "{{url('product/generatecode')}}",
				dataType : "json",
				type: "get",
				data : data,
				processData: false,
				contentType: false,
				cache: false,
				success : function(response) {
					if(response.status == 'success') {
						$('.generatecodecontainer').html('<a id="download_barcode" download="barcode.png" href="'+response.generate+'" target="_blank"><img style="width:407px" src="'+response.generate+'" download="output.png" /></a><input type="hidden" name="barcode" value="'+response.generate+'" />');
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
		
		<?php if($type =='edit') { ?>
			$('body').on('click', '.updateproduct', function() {
				
				//$(this).attr('disabled', 'disabled');
				$(this).html('Loading...');
				
				$('.err_msg').remove();
				var params = new FormData($("#prodctupdate")[0]);
				$.ajax({
					url: "{{url('update/product')}}",
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
		<?php } else if($type =='save') { ?>
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

		<?php }?>
	});
</script>