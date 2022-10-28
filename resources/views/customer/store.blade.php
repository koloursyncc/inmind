<div class="row store_wrapper">
<div class=" store_wrapper_target">
	<div class="row">
		<div class="col-md-12">	
			<label for="inputFirstName" class="form-label">Store</label>
			<input type="checkbox" class="form- store_checked" value="1" checked {{ $disabledfield }}>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">Store Name</label>
			<input type="text" class="form-control store_name" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">Building / Village</label>
			<input type="text" class="form-control store_building_village" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">Sub District</label>
			<input type="text" class="form-control store_sub_district" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">District</label>
			<input type="text" class="form-control store_district" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">Road</label>
			<input type="text" class="form-control store_road" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">City</label>
			<input type="text" class="form-control store_city" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">Zip Code</label>
			<input type="text" class="form-control store_zip_code" {{ $disabledfield }}>
		</div>
		
		<div class="col-md-3">	
			<label for="inputFirstName" class="form-label">Country</label>
			<select class="form-control store_country" {{ $disabledfield }}>
				<option value="">Select</option>
				<?php foreach($countries as $country) { ?>
					<option  value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	<h5 class="add_store_contact_person" style="cursor:pointer">Add Contact Person</h5>
	
	<div class="add_store_contact_person_wrapper" data-counter="0" data-pos="-1">	 
		 <div class="row g-3 add_store_pik">
			  <h6 class="c_p">Contact Person</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Address no.</label>
				<input type="text" class="form-control store_contact_address" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Building / Village</label>
				<input type="text" class="form-control store_contact_building" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Sub District</label>
				<input type="text" class="form-control store_contact_sub_district" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  District</label>
				<input type="text" class="form-control store_contact_district_id" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Road</label>
				<input type="text" class="form-control store_contact_road" id="" {{ $disabledfield }}>
			 </div>
			 
			  <div class="col-4 mb-3">
				<label for="inputSelectCountry" class="form-label ">Country</label>
				<select class="form-select store_contact_country_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select Country</option>
					<?php foreach($countries as $country) { ?>
						<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
					<?php } ?>
				</select>
			 </div>
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">State</label>
				<select class="form-select store_contact_state_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select State</option>
					<?php $statesContact = \App\Models\State::where('country_id', 237)->get();
						foreach($statesContact as $statesContactObj) {
							echo '<option value="'.$statesContactObj->id.'">'.$statesContactObj->name.'</option>';
						}
					?>
				</select>
			 </div>
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">  City</label>
				<input type="text" class="form-control store_contact_city" id="" {{ $disabledfield }}>
			 </div>
			 
			 
			 
			 
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Zip Code</label>
				<input type="text" class="form-control store_contact_zipcode" id="" {{ $disabledfield }}>
			 </div>
			
		</div>
	</div>
	<hr>
</div>
</div>

<div class="cp" style="display:none">
	<div class="add_store_contact_person_wrapper_a" data-counter="0" data-pos="-1">	 
		 <div class="row g-3 add_store_pik">
			  <h6 class="c_p">Contact Person</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Address no.</label>
				<input type="text" class="form-control store_contact_address" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Building / Village</label>
				<input type="text" class="form-control store_contact_building" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Sub District</label>
				<input type="text" class="form-control store_contact_sub_district" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  District</label>
				<input type="text" class="form-control store_contact_district_id" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Road</label>
				<input type="text" class="form-control store_contact_road" id="" {{ $disabledfield }}>
			 </div>
			 
			  <div class="col-4 mb-3">
				<label for="inputSelectCountry" class="form-label ">Country</label>
				<select class="form-select store_contact_country_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select Country</option>
					<?php foreach($countries as $country) { ?>
						<option value="{{ $country->id }}" <?php if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
					<?php } ?>
				</select>
			 </div>
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">State</label>
				<select class="form-select store_contact_state_id" id="" aria-label="Default select example" {{ $disabledfield }}>
					<option value="">Select State</option>
					
				</select>
			 </div>
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">  City</label>
				<input type="text" class="form-control store_contact_city" id="" {{ $disabledfield }}>
			 </div>
			 
			 
			 
			 
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Zip Code</label>
				<input type="text" class="form-control store_contact_zipcode" id="" {{ $disabledfield }}>
			 </div>
			
		</div>
	</div>
</div>