<div class="row store_wrapper">
<div class=" store_wrapper_target">
	<button type="button" class="btn btn-sm btn-primary px-2 radius-30 remove_store" style="margin-top:25px">Remove</button>
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
			<input type="text" class="form-control store_zip_code store_zip_code_vslidate" maxlength="7" {{ $disabledfield }}>
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
	
	<button type="button" class="btn btn-sm btn-primary px-2 radius-30 col-sm-2 add_store_contact_person" style="margin-top:25px">Add Contact Person</button>
	
	<div class="add_store_contact_person_wrapper" data-counter="0" data-pos="-1">	 
		
		 <div class="row g-3 add_store_pik">
			  <h6 class="c_p">Contact Person</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Name</label>
				<input type="text" class="form-control store_contact_name" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Family name</label>
				<input type="text" class="form-control store_contact_family_name" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Email</label>
				<input type="text" class="form-control store_contact_email" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Position</label>
				<input type="text" class="form-control store_contact_position" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Mobile</label>
				<input type="text" class="form-control store_contact_mobile" maxlength="10" id="" {{ $disabledfield }}>
			 </div>
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">  Line</label>
				<input type="text" class="form-control store_contact_line" id="" {{ $disabledfield }}>
			 </div>
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">  Birth Date</label>
				<input type="date" class="form-control store_contact_birth_date" id="" {{ $disabledfield }}>
			 </div>
		</div>
	</div>
	<hr>
	
</div>
</div>

<div class="cp" style="display:none">
	<div class="add_store_contact_person_wrapper_a" data-counter="0" data-pos="-1">	 
		 <div class="row g-3 add_store_pik">
			
			<button type="button" class="btn btn-sm btn-primary px-2 radius-30 remove_store_contact col-sm-1" style="margin-top:25px">Remove</button>
			  <h6 class="c_p">Contact Person</h6>
			 <div class="col-sm-4">
				<label for="inputFirstName" class="form-label">Name</label>
				<input type="text" class="form-control store_contact_name" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputLastName" class="form-label">Family name</label>
				<input type="text" class="form-control store_contact_family_name" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Email</label>
				<input type="text" class="form-control store_contact_email" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">  Position</label>
				<input type="text" class="form-control store_contact_position" id="" {{ $disabledfield }}>
			 </div>
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label">Mobile</label>
				<input type="text" class="form-control store_contact_mobile"  maxlength="10" {{ $disabledfield }}>
			 </div>
			 
			  
			 
			 <div class="col-4">
				<label for="inputEmailAddress" class="form-label">  Line</label>
				<input type="text" class="form-control store_contact_line" id="" {{ $disabledfield }}>
			 </div>
			 
			 
			 
			 
			 <div class="col-sm-4">
				<label for="inputEmailAddress" class="form-label"> Birth Date</label>
				<input type="date" class="form-control store_contact_birth_date" id="" {{ $disabledfield }}>
			 </div>
			
		</div>
	</div>
</div>