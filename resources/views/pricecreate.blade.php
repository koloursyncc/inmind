<!doctype html>
<html lang="en">
  @include('layout.header')
  <style>
    .mt-10{
      margin-top: 10px;
    }
    .btn {
    color: #fff;
    background-color: #17a2b8;
    border: 1px solid #17a2b8;
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;
    font-weight: 400;
}
.btn {
    display: inline-block;
    text-decoration: none;
    text-align: center;
    text-transform: none;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-left: 0.2rem;
    margin-right: 0.2rem;
    cursor: pointer;
  </style>
  
<?php
$form = 'pricesave';
$disabledrow = '';
if($type == 'save')
{
	
} else if($type == 'view') {
	$disabledrow = 'disabled';
} else if($type != 'update') {
	$form = 'priceupdate';
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
            <div class="breadcrumb-title pe-3">Product
            </div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item">
                    <a href="javascript:;">
                      <i class="bx bx-home-alt">
                      </i>
                    </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->
          <div class="card">
            <div class="card-body p-4">
              <h5 class="card-title">
              </h5>
              <hr/>
              <div class="form-body mt-4">
                <form id="priceform" class="fromid " data-url="{{ url($form) }}">
					@csrf
								
					<?php if($type =='edit') { ?>
						<input type="hidden" name="price_id" value="{{ @$obj->id }}">
					<?php } ?>
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="border border-3 p-4 rounded">
                           <div class="col-md-12">
                              <label class="form-label">Product</label>
                                 <select class="single-select product_id" name="product_id" id="select_product_element">
									<option value="">Select Product</option>
									<?php foreach($products as $productObj) { ?>
										<option value="{{ $productObj->id }}" <?php if(@$obj->product_id == $productObj->id) { echo 'selected'; } ?>>{{ $productObj->name }}</option>
									<?php } ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-10">
                              <label class="form-label">Product code</label>
									<select class="single-select product_code" name="product_code" id="select_element">
										<option value="">Select Code</option>
										<?php foreach($products as $productObj) { ?>
											<option value="{{ $productObj->id }}" <?php if(@$obj->product_id == $productObj->id) { echo 'selected'; } ?>>{{ $productObj->code }}</option>
										<?php } ?>
									</select>
                                 <!--
                                    <option value="United States">Select Product code</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                 -->
                              </div>
							  
						<?php
							$product_detail= 'd-none';
							if($type != 'save') {
								$product_detail= '';
							}
						?>
							  
                        <div class="row  product_detail {{ $product_detail }}">
                          <div class="col-md-12 mt-10">
                            <label for="inputCostPerPrice" class="form-label">Color
                            </label>
                           <p class="product_color">
							<?php if(@$obj->product_id > 0) {
								$product = $obj->getProductById($obj->product_id);
								if($product) {
									echo $product->color;
								}
							}
							?>
						   </p>
                          </div>
                          <div class="col-md-12 mt-10">
                            <label for="inputStarPoints" class="form-label">Total Cost
                            </label>
                            <p class="product_cost">{{ @$obj->total_cost }} THB/Peice</p>
                          </div>
                          <div class="col-md-12 mt-10">
                            <label for="inputStarPoints" class="form-label">Product Image
                            </label>
                           <div class="imgs" ></div>
                          </div>
                        </div> 
                      </div>
                    </div>
                    <div class="col-lg-7 ajaxlist"></div>
                  </div>
                  <!--end row-->
                  <button class="btn sw-btn-prev" type="submit">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.price')
      </body>
    </html>
  <div style="display:none">
    <div class="kind_of_product_clone">
      <div class="row clonedata">
        <div class="md-3">
          <label for="inputPrice" class="form-label kind_of_product_label">
          </label>
          <select class="form-control kind_of_product">
            <option value="1">Basin
            </option>
            <option value="2">Bed
            </option>
            <option value="3">Cabinet
            </option>
            <option value="4">Chair
            </option>
            <option value="5">Fabric
            </option>
            <option value="6">Shelf
            </option>
            <option value="7">Statue
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="inputPrice" class="form-label kind_of_product_qty_label">
          </label>
          <input type="text" class="form-control kind_of_product_qty" value="1" id="inputStarPoints">
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
	
	function callback(id, type)
	{
		$.ajax({
			url: "{{url('price/getproductdetail')}}",
			dataType : "json",
			type: "get",
			data : {'id': id, 'type': type, "_token": "{{ csrf_token() }}"},
			success : function(response) {
				if(response.status == 'success') {
					
					$('.ajaxlist').removeClass('d-none');
					$('.ajaxlist').html(response.data);
					var html = '';
					$.each(response.images, function(index, itemimg) {
						html += '<img src="'+itemimg.name+'" height="50"/>';
					});
					$('.imgs').html(html);
					$('.product_detail').removeClass('d-none');
					$('.product_color').html(response.product.color);
					$('.product_color');
					$('.product_cost');
					
					var multiple_select_1 = $('.multiple_select_1'); 
					multiple_select_1.empty();
					
					var multiple_select_2 = $('.multiple_select_2'); 
					multiple_select_2.empty();
					
					var multiple_select_3 = $('.multiple_select_3'); 
					multiple_select_3.empty();
					
					var multiple_select_4 = $('.multiple_select_4'); 
					multiple_select_4.empty();
					
					var multiple_select_5 = $('.multiple_select_5'); 
					multiple_select_5.empty();
					
					var multiple_select_6 = $('.multiple_select_6'); 
					multiple_select_6.empty();
					
					var multiple_select_1_option = '<option value="">Select</option>';
					var multiple_select_2_option = '<option value="">Select</option>';
					var multiple_select_3_option = '<option value="">Select</option>';
					var multiple_select_4_option = '<option value="">Select</option>';
					var multiple_select_5_option = '<option value="">Select</option>';
					var multiple_select_6_option = '<option value="">Select</option>';
					$.each(response.supp, function(index, item) {
						//alert(index);
						$.each(item, function(i, v) {
							//alert(v.supplier_type);
							if(v.supplier_type == 1) {
								multiple_select_1_option += '<option data-type="'+v.supplier_type+'" data-price="'+v.unit_price+'" value="'+v.id+'">'+v.supplier_name+' ('+v.unit_price+') '+'</option>';
							} else if(v.supplier_type == 2) {
								multiple_select_2_option += '<option data-type="'+v.supplier_type+'" data-price="'+v.unit_price+'" value="'+v.id+'">'+v.supplier_name+' ('+v.unit_price+') '+'</option>';
							} else if(v.supplier_type == 3) {
								multiple_select_3_option += '<option data-type="'+v.supplier_type+'" data-price="'+v.unit_price+'" value="'+v.id+'">'+v.supplier_name+' ('+v.unit_price+') '+'</option>';
							} else if(v.supplier_type == 4) {
								multiple_select_4_option += '<option data-type="'+v.supplier_type+'" data-price="'+v.unit_price+'" value="'+v.id+'">'+v.supplier_name+' ('+v.unit_price+') '+'</option>';
							} else if(v.supplier_type == 5) {
								multiple_select_5_option += '<option data-type="'+v.supplier_type+'" data-price="'+v.unit_price+'" value="'+v.id+'">'+v.supplier_name+' ('+v.unit_price+') '+'</option>';
							} else if(v.supplier_type == 6) {
								multiple_select_6_option += '<option data-type="'+v.supplier_type+'" data-price="'+v.unit_price+'" value="'+v.id+'">'+v.supplier_name+' ('+v.unit_price+') '+'</option>';
							}
							
						});
					});
					
					$('.multiple_select_1').append(multiple_select_1_option);
					$('.multiple_select_2').append(multiple_select_2_option);
					$('.multiple_select_3').append(multiple_select_3_option);
					$('.multiple_select_4').append(multiple_select_4_option);
					$('.multiple_select_5').append(multiple_select_5_option);
					$('.multiple_select_6').append(multiple_select_6_option);
					
					
					
					 if(response.type == 'code') {
						$('.product_id').val(response.product.id).select2();
					 } else {
						 $('.product_code').val(response.product.id).select2();
					 }
					
				}
			},
		});
	}
	
	$(document).ready(function() {
		$('body').on('submit', '#priceform', function() {
			var url = $("meta[name=url]").attr("content");
			$('.err_msg').remove();
			$.ajax({
				url: $('#priceform').attr('data-url'),
				dataType : "json",
				type: "post",
				data : $('#priceform').serialize(),
				success : function(response) {
					
					if(response.status == 'success') {
						
						alert(response.msg);
						window.location.href = "{{url('pricelist')}}";
						
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
		
		$('body').on('change', '.product_id', function() {
			var id = $(this).val();
			callback(id, 'product');
			
			
			return false;
		 });
		 
		 $('body').on('change', '.product_code', function() {
			var id = $(this).val();
			callback(id, 'code');
			
			return false;
		 });
		 
		 <?php if(@$obj->product_id > 0)  { ?>
			callback(<?php echo $obj->product_id; ?>, 'product');
		 <?php } ?>
		 
		$('body').on('change', '.multiple_select_1', function() {
			total();
		});
		
		$('body').on('change', '.multiple_select_2', function() {
			total();
		});
		
		$('body').on('change', '.multiple_select_3', function() {
			total();
		});
		
		$('body').on('change', '.multiple_select_4', function() {
			total();
		});
		
		$('body').on('change', '.multiple_select_5', function() {
			total();
		});
		
		$('body').on('change', '.multiple_select_6', function() {
			total();
		});
		 
	});
	
	function total() {
		var sum = 0;
		$('.multiple_select_1').each(function() {
			if (this.checked) {
				sum += parseInt($(this).attr('data-price'));
			}
		});
		
		$('.multiple_select_2').each(function() {
			if (this.checked) {
				sum += parseInt($(this).attr('data-price'));
			}
		});
		
		$('.multiple_select_3').each(function() {
			if (this.checked) {
				sum += parseInt($(this).attr('data-price'));
			}
		});
		
		$('.multiple_select_4').each(function() {
			if (this.checked) {
				sum += parseInt($(this).attr('data-price'));
			}
		});
		
		$('.multiple_select_5').each(function() {
			if (this.checked) {
				sum += parseInt($(this).attr('data-price'));
			}
		});
		
		$('.multiple_select_6').each(function() {
			if (this.checked) {
				sum += parseInt($(this).attr('data-price'));
			}
		});
		
		$('.product_cost').html(sum+' THB/Peice');
	}
</script>