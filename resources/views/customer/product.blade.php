<div class="" style="display:none">
	<div class="row">
		<div class="col-md-12">	
			<label for="inputFirstName" class="form-label">Product</label>
			<select class="form-control product_id" {{ $disabledfield }}>
				<?php foreach($products as $product) { ?>
					<option value="{{ $product->id }}">{{ $product->name }}</option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>