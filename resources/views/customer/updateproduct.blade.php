<?php foreach($customer_products as $custProObj) {
$iid = $custProObj->id;
	?>
	<div class="row ">
		<div class="col-md-1">
			<label for="inputFirstName" class="form-label p_name">Product Name</label>
			<input type="hidden" class="product_id" name="product_id[{{ $iid }}]" value="{{ $custProObj->product_id }}" />
		</div>  
		<div class="col-md-1">
			<label for="inputFirstName" class="form-label p_code"></label>
			
		</div> 
		<div class="col-md-2">
			<input type="text" name="price_thb_ex_vat[{{ $iid }}]" value="{{ $custProObj->price_thb_ex_vat }}" class="price_thb_ex_vat" class="form-control  " {{ $disabledfield }} />
		</div>  
		<div class="col-md-2">
			<input type="text" name="price_thb_inc_vat[{{ $iid }}]" value="{{ $custProObj->price_thb_inc_vat }}" class="price_thb_inc_vat" class="form-control  " {{ $disabledfield }} />
		</div>     
		<div class="col-md-2">
			<input type="text" name="mkt_price_thb_ex_vat[{{ $iid }}]" value="{{ $custProObj->mkt_price_thb_ex_vat }}" class="mkt_price_thb_ex_vat" class="form-control  " {{ $disabledfield }} />
		</div>
		
		<div class="col-md-2">
			<input type="text" name="mkt_price_thb_inc_vat[{{ $iid }}]" value="{{ $custProObj->mkt_price_thb_inc_vat }}" class="mkt_price_thb_inc_vat" class="form-control  " {{ $disabledfield }} />
		</div>
		<div class="col-md-2">
			<input type="date" name="mkt_valid_date[{{ $iid }}]" value="{{ $custProObj->mkt_valid_date }}" class="mkt_valid_date" class="form-control  " {{ $disabledfield }} />
		</div>			
	</div>
<?php } ?>