<!doctype html>
<html lang="en">
   @include('layout.header')
   <style>
      .flexbox{
         display:flex;justify-content:center;align-items: end; 
      }
   </style>
   
<?php
$disabled_field = $url = ''; 
 if($type == 'view') {
	$disabled_field = 'disabled'; 
 } else if($type == 'save') {
	$url = url('supplierpo/save');
 } else if($type == 'edit') {
	$url = url('supplierpo/update');
 }
 //echo $type; die;
 $productIds = [];
foreach($supplierProductPo as $supplierProductPoObj) {
	$productIds[$supplierProductPoObj->product_id] = $supplierProductPoObj->product_id;
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
            <div class="breadcrumb-title pe-3">PO</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Create PO</li>
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
					 <form <?php if($type != 'view') { ?>id="seller_po" data-url="{{ $url }}" <?php } ?>>
									@csrf
									<?php  if($type == 'edit') { ?>
										<input type="hidden" class="" name="id" value="{{ @$obj->id }}" />
									<?php } ?>
                              <div class="row g-3">
								<div class="col-sm-4">
									<label for="formFile" class="form-label">P/O For Brand</label>
									<select {{ $disabled_field }} class="form-select mb-3 brand_id" name="brand_id" aria-label="Default select example">
										<option selected>Select Brand </option>
										<?php foreach($brands as $brandObj) { ?>
											<option value="{{ $brandObj->id }}"  <?php if(@$obj->brand_id == 1) { echo 'selected'; } ?>>
												{{ $brandObj->name }}
											</option>
										<?php } ?>
									</select> 
								</div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Supplier Name</label>
                                    <select {{ $disabled_field }} class="form-select mb-3 supplier_id" 
									name="supplier_id" aria-label="Default select example">
										<option value="">Select Supplier </option>
										<?php foreach($suppliers as $supplierObj) { ?>
											<option data-address="{{ $supplierObj->address }} {{ $supplierObj->building }} {{ $supplierObj->sub_district }}  {{ $supplierObj->district }}  {{ $supplierObj->road }} " <?php if(@$obj->supplier_id == $supplierObj->id) { echo 'selected'; } ?> value="{{ $supplierObj->id }}">{{ $supplierObj->supplier_name }}</option>
										<?php } ?>
									</select> 
                                 </div>
								 <?php
									$supplier_code = str_pad(($latest->code+1), 4, '0', STR_PAD_LEFT);
								 ?>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Supplier PO no.</label>
                                    <p class="">{{ $supplier_code }}</p>
									<input type="hidden" name="supplier_code" value="{{ $supplier_code }}" />
                                 </div> 
								 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Address</label>
                                    <p class="supplier_address"></p>
                                 </div>
								 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Date</label>
									<input type="date" value="{{ @$obj->date }}" name="date" {{ $disabled_field }} class="form-control date">
                                 </div>  
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Product Name</label>
                                    <select {{ $disabled_field }} class="form-select mb-3 product_name" aria-label="Default select example" multiple>
										
										<?php /* foreach($products as $productsObj) {
												$selectedrw = '';
												if(isset($productIds[$productsObj->id])){
													$selectedrw= 'selected';
												}
											?>
											<option {{ $selectedrw }} data-code="{{ $productsObj->code }}"  data-code="{{ $productsObj->name }}" value="{{ $productsObj->id }}">{{ $productsObj->name }}</option>
										<?php } */ ?>
									</select> 
                                 </div>
								 <h6 class="order_description none-class d-none">Order Description </h6> 

								<div class="row  none-class d-none">
									<div class="col-sm-4">
										<label for="inputFirstName" class="form-label ">Product Name</label>
									</div>  
									<div class="col-sm-2">
										<label for="" class="form-label ">Product Code</label>
										
									</div> 
									<div class="col-sm-2">
										<label for="" class="form-label ">Unit Price</label>
									</div>  
									<div class="col-sm-2">
										<label for="" class="form-label ">Quantity</label>
									</div>     
									<div class="col-sm-2">
										<label for="" class="form-label ">Price</label>
									</div> 
								</div>								 
								
								
									<div class="product_container">
										<?php foreach($supplierProductPo as $supplierProductPoObj) {
												$productObj = $supplierProductPoObj->getProductDataById($supplierProductPoObj->product_id);
												
											?>
											<div class="row counter_update ">
												<div class="col-sm-4">
													<label for="inputFirstName" class="form-label p_name">{{ $productObj->name }}</label>
													<input type="hidden" class="product_id" name="product_id[{{ $supplierProductPoObj->product_id }}]" value="{{ $productObj->id }}" />
												</div>  
												<div class="col-sm-2">
													<label for="inputFirstName" class="form-label p_code">{{ $productObj->code }}</label>
													
												</div> 
												<div class="col-sm-2">
													<input type="text" class="unit_price" value="{{ $supplierProductPoObj->unit_price }}" name="unit_price[{{ $supplierProductPoObj->product_id }}]" class="form-control" {{ $disabled_field }} />
												</div>  
												<div class="col-sm-2">
													<input type="text" class="quantity" value="{{ $supplierProductPoObj->qty }}" name="quantity[{{ $supplierProductPoObj->product_id }}]" class="form-control" {{ $disabled_field }} />
												</div>     
												<div class="col-sm-2">
													<input type="text" class="price" value="{{ $supplierProductPoObj->price }}" name="price[{{ $supplierProductPoObj->product_id }}]" class="form-control" {{ $disabled_field }} />
												</div> 
											</div>
										<?php } ?>
									</div>
								
								 
								 
								<div class="row product_container_price  none-class d-none">
									<div class="col-sm-8"> </div> 
									
									 <div class="col-sm-4">
										<table class="table table-responsive ">
										   <tr>
											  <td>Total Amount</td>
											  <td class="total_sum"></td>
											  <td>THB</td>
										   </tr>
											
										</table>
									 </div> 
								</div>
                              </div>
							  
							  <input type="submit" class="btn btn-primary submit" value="Save" />
							  
							  </form>
                  </div>
               </div>
            </div>
            <!--end row-->
         </div>
      </div>
	  
	  <div class="content-wrapper" style="display:none" data-counter="-1">
		<div class="row counter ">
			<div class="col-sm-4">
				<label for="inputFirstName" class="form-label p_name">Product Name</label>
				<input type="hidden" class="product_id" />
			</div>  
			<div class="col-sm-2">
				<label for="inputFirstName" class="form-label p_code">Product Code</label>
				
			</div> 
			<div class="col-sm-2">
				<input type="text" class="unit_price" disabled class="form-control  " {{ $disabled_field }} />
			</div>  
			<div class="col-sm-2">
				<input type="text" class="quantity" class="form-control  " {{ $disabled_field }} />
			</div>     
			<div class="col-sm-2">
				<input type="text" class="price" class="form-control  " {{ $disabled_field }} />
			</div> 
		</div>
	  </div>
	  
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.supplierpo')
<script>
function cal(target, unit_price, quantity, total) {
	target.val(total);
	
	
	var price = $('.price');
	var a = 0;
    price.each(function() {
        a += Number($(this).val());
    });
	$('.total_s').remove();
	$('.total_sum').html(a+' <input type="hidden" name="total_sum" class="total_sum" value="'+a+'" />');
	
}

	$(document).ready(function() {
		
		$('body').on('submit', '#seller_po', function() {
		 $('.err_msg').remove();
				$.ajax({
					url: $('#seller_po').attr('data-url'),
					dataType : "json",
					type: "post",
					data : $('#seller_po').serialize(),
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
		
		$('body').on('change', '.supplier_id', function() {
			
			var dataid = $(".supplier_id option:selected").attr('data-address');
			$('.supplier_address').html('');
			$.ajax({
				url: "{{url('getaddress')}}",
				dataType : "json",
				type: "get",
				data : {'id': $(this).val()},
				success : function(response) {
					var address = '';
					if(response.data.address != '') {
						address += response.data.address+' ';
					}
					
					if(response.data.building != '') {
						address += response.data.building+' ';
					}
					
					if(response.data.road != '') {
						address += response.data.road+' ';
					}
					address += '<br>';
					if(response.data.sub_district != '') {
						address += response.data.sub_district+', ';
					}
					
					if(response.data.sub_district != '') {
						address += response.data.sub_district+' ';
					}
					
					address += '<br>';
					address += response.countryname+', '+response.statename+', '+response.data.zipcode;
					
					$('.supplier_address').html(address);
					
					var list = $('.product_name');
					list.empty();
					var html = '';
					$.each(response.products, function(index, item) {
						html += '<option value="'+item.id+'" data-code="'+item.code+'" data-unit="'+item.unit_price+'">'+item.name+'</option>';
					});
					list.html(html);
				},
			});

			
		});
		
		$('body').on('keyup', '.unit_price', function() {
			
			var id = $(this).attr('data-id');
			
			var val = $(this).val();
			var quantity = $('.quantity',$(this).parent().parent()).val();
			var total = val * quantity;
			
			var target = $('.price',$(this).parent().parent());
			
			cal(target, val, quantity, total);
		});
		
		$('body').on('keyup', '.quantity', function() {
			var id = $(this).attr('data-id');
		
			
			var val = $(this).val();
			var unit_price = $('.unit_price',$(this).parent().parent()).val();
			var total = val * unit_price;
			
			var target = $('.price',$(this).parent().parent());
			
			cal(target, unit_price, val, total);
		});
		
		$('body').on('change', '.product_name', function() {
			
			var ids = $(this).val();
			$('.product_container').html('');
			$('.total_sum').html('');
			$('.none-class').addClass('d-none');
			
			$.each(ids, function( index, value ) {
				var target = $('.product_name option[value="'+value+'"]');
				var code = target.attr('data-code');
				var value = target.val();
				var name = target.html();
				
				var clone = $('.counter', $('.content-wrapper')).clone();
				
				var num = $('.content-wrapper').attr('data-counter');
				var cnt = parseInt(num) - 1;
				
				$('.p_name', clone).html(name);
				$('.product_id', clone).attr('name', 'product_id['+cnt+']');
				$('.product_id', clone).val(value);
				
				$('.p_code', clone).html(code);
				$('.unit_price', clone).attr('name', 'unit_price['+cnt+']').attr('id', 'unit_price_'+value).attr('data-id', value);
				$('.unit_price', clone).val(target.attr('data-unit'));
				
				$('.quantity', clone).attr('name', 'quantity['+cnt+']').attr('id', 'quantity_'+value).attr('data-id', value);
				
				$('.price', clone).attr('name', 'price['+cnt+']').attr('id', 'price_'+value).attr('data-id', value);
				
				$('.product_container').append(clone);
				$('.none-class').removeClass('d-none');
				
				$('.content-wrapper').attr('data-counter', cnt)
			});
			
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