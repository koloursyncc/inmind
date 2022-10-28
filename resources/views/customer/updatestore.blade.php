<?php foreach($stores as $storeObj) {
$storeId = $storeObj->id;
	?>
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
				<input type="text" class="form-control " name="store_name[{{ $storeId }}]" value="{{ $storeObj->store_name }}" {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">Building / Village</label>
				<input type="text" class="form-control " name="store_building_village[{{ $storeId }}]" value="{{ $storeObj->store_building_village }}"  {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">Sub District</label>
				<input type="text" class="form-control " name="store_sub_district[{{ $storeId }}]" value="{{ $storeObj->store_sub_district }}"  {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">District</label>
				<input type="text" class="form-control " name="store_district[{{ $storeId }}]" value="{{ $storeObj->store_district }}"  {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">Road</label>
				<input type="text" class="form-control " name="store_road[{{ $storeId }}]" value="{{ $storeObj->store_road }}"  {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">City</label>
				<input type="text" class="form-control " name="store_city[{{ $storeId }}]" value="{{ $storeObj->store_city }}"  {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">Zip Code</label>
				<input type="text" class="form-control " name="store_zip_code[{{ $storeId }}]" value="{{ $storeObj->store_zip_code }}"  {{ $disabledfield }}>
			</div>
			
			<div class="col-md-3">	
				<label for="inputFirstName" class="form-label">Country</label>
				<select class="form-control " name="store_country[{{ $storeId }}]" {{ $disabledfield }}>
					<option value="">Select</option>
					<?php foreach($countries as $country) { ?>
						<option  value="{{ $country->id }}" <?php if($storeObj->store_country == $country->id) { echo 'selected'; } else if($country->id == 237) { echo 'selected'; } ?>>{{ $country->name }}</option>
					<?php } ?>
				</select>
			</div>
		</div>
		
		<!--<h5 class="add_store_contact_person" style="cursor:pointer">Add Contact Person</h5>-->
			<?php $contacts = DB::table('customer_store_contact_persons')->where('store_id', $storeId)->get(); 
						foreach($contacts as $contact) {
							$contactId = $contact->id;
					?>
				<div class="add_store_contact_person_wrapper_xxx" data-counter="0" data-pos="-1">	 
					
						
						<div class="row g-3 add_store_pik_xxx">
							  <h6 class="c_p">Contact Person</h6>
							 <div class="col-sm-4">
								<label for="inputFirstName" class="form-label">Address no.</label>
								<input type="text" class="form-control" value="{{ @$contact->store_contact_address }}" name="store_contact_address[{{ $storeId }}][{{ $contactId }}]" id="" {{ $disabledfield }}>
							 </div>
							 <div class="col-sm-4">
								<label for="inputLastName" class="form-label">Building / Village</label>
								<input type="text" class="form-control " value="{{ $contact->store_contact_building }}" name="store_contact_building[{{ $storeId }}][{{ $contactId }}]" id="" {{ $disabledfield }}>
							 </div>
							 <div class="col-sm-4">
								<label for="inputEmailAddress" class="form-label">Sub District</label>
								<input type="text" value="{{ $contact->store_contact_sub_district }}" name="store_contact_sub_district[{{ $storeId }}][{{ $contactId }}]" class="form-control " id="" {{ $disabledfield }}>
							 </div>
							 <div class="col-sm-4">
								<label for="inputEmailAddress" class="form-label">  District</label>
								<input value="{{ $contact->store_contact_district_id }}" name="store_contact_district_id[{{ $storeId }}][{{ $contactId }}]" type="text" class="form-control " id="" {{ $disabledfield }}>
							 </div>
							 <div class="col-sm-4">
								<label for="inputEmailAddress" class="form-label">Road</label>
								<input value="{{ $contact->store_contact_road }}" name="store_contact_road[{{ $storeId }}][{{ $contactId }}]" type="text" class="form-control " id="" {{ $disabledfield }}>
							 </div>
							 
							  <div class="col-4 mb-3">
								<label for="inputSelectCountry" class="form-label ">Country</label>
								<select name="store_contact_country_id[{{ $storeId }}][{{ $contactId }}]" class="form-select " id="" aria-label="Default select example" {{ $disabledfield }}>
									<option value="">Select Country</option>
									<?php foreach($countries as $country) { ?>
										<option value="{{ $country->id }}" <?php if($contact->store_contact_country_id == $country->id) { echo 'selected'; } ?>>{{ $country->name }}</option>
									<?php } ?>
								</select>
							 </div>
							 
							 <div class="col-4">
								<label for="inputEmailAddress" class="form-label">State</label>
								<select name="store_contact_state_id[{{ $storeId }}][{{ $contactId }}]" class="form-select " id="" aria-label="Default select example" {{ $disabledfield }}>
									<option value="">Select State</option>
									<?php $statesContact = \App\Models\State::where('country_id', $contact->store_contact_country_id)->get();
										foreach($statesContact as $statesContactObj) {
											$selected = '';
											if($statesContactObj->id == $contact->store_contact_state_id)
											{
												$selected = 'selected';
											}
											echo '<option value="'.$statesContactObj->id.'" '.$selected.'>'.$statesContactObj->name.'</option>';
										}
									?>
								</select>
							 </div>
							 
							 <div class="col-4">
								<label for="inputEmailAddress" class="form-label">  City</label>
								<input value="{{ $contact->store_contact_city }}" name="store_contact_city[{{ $storeId }}][{{ $contactId }}]" type="text" class="form-control " id="" {{ $disabledfield }}>
							 </div>
							 
							 
							 
							 
							 <div class="col-sm-4">
								<label for="inputEmailAddress" class="form-label">  Zip Code</label>
								<input value="{{ $contact->store_contact_zipcode }}" name="store_contact_zipcode[{{ $storeId }}][{{ $contactId }}]" type="text" class="form-control " id="" {{ $disabledfield }}>
							 </div>
							
						</div>
						
				</div>
		<hr><?php } ?>
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
<?php } ?>