<!doctype html>
<html lang="en">   
     @include('layout.header')
      <body>
          <!--wrapper-->
          <div class="wrapper">
               <!--start header --> @include('layout.menu')
               <!--start page wrapper -->
               <div class="page-wrapper">
                    <div class="page-content">
                         <!--breadcrumb-->
                         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                              <div class="breadcrumb-title pe-3">Warehouse</div>
                              <div class="ps-3">
                                   <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0 p-0">
                                             <li class="breadcrumb-item">
                                                  <a href="javascript:;">
                                                       <i class="bx bx-home-alt"></i>
                                                  </a>
                                             </li>
                                             <li class="breadcrumb-item active" aria-current="page">Warehouse Creator</li>
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
                                             <div id="smartwizard">
                                                  <ul class="nav">
                                                       <li class="nav-item">
                                                            <a class="nav-link" href="#step-1">
                                                                 <strong>Step 1</strong>
                                                                 <br>Warehouse Details </a>
                                                       </li>
                                                       <li class="nav-item">
                                                            <a class="nav-link" href="#step-2">
                                                                 <strong>Step 2</strong>
                                                                 <br>Core Products </a>
                                                       </li>
                                                  </ul>
                                                  <div class="tab-content">
                                                       @if (count($errors) > 0)
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <i class="uil uil-exclamation-octagon me-2"></i>
                                                            <b>Error!</b>
                                                                 <ul>
                                                                      @foreach ($errors->all() as $error)
                                                                           <li>{{ $error }}</li>
                                                                      @endforeach
                                                                 </ul>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">                                                
                                                            </button>
                                                            </div>
                                                       @endif
                                                       @if (session('success'))  
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <i class="uil uil-check me-2"></i>
                                                            <b>Success!</b> {{ session('success') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">                                                
                                                            </button>
                                                            </div>
                                                       @endif
                                                       @if (session('danger'))  
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <i class="uil uil-exclamation-octagon me-2"></i>
                                                            <b>Error!</b> {{ session('danger') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">                                                
                                                            </button>
                                                            </div>
                                                       @endif
                                                       <form id="warehouseform" method="POST" action="{{ route('storeWarehouse') }}">
                                                            @csrf 
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                                                 <div class="row g-3">
                                                                      <div class="col-sm-4">
                                                                           <label for="formFile" class="form-label">Warehouse Name <span>*</span>
                                                                           </label>
                                                                           <input class="form-control mb-3 " name="Warehouse_name" type="text" 
                                                                           placeholder="Enter Warehouse name" aria-label="default input example" value="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="formFile" class="form-label ">Warehouse Type <span>*</span>
                                                                           </label>
                                                                           <select class="form-select mb-3 supplier_type" name="supplier_warehouse_type" id="supplier_warehouse_type" aria-label="Default select example">
                                                                                <option value="">Select Warehouse Type </option>
                                                                                <option value="1">Own Warehouse</option>
                                                                                <option value="2">Own Showroom</option>
                                                                                <option value="3">Wholeseller Store / Warehouse</option>
                                                                                <option value="4">Retailer Resident</option>
                                                                           </select>
                                                                      </div>
                                                                 </div>
                                                                 <div id="sec_name_store">  
                                                                      <div class="row g-3">
                                                                           <div class="col-sm-4">
                                                                                <label for="formFile" class="form-label">Wholeseller /Retailer Name <span>*</span>
                                                                                </label>
                                                                                <input class="form-control mb-3 supplier_name" name="customer_name" id="customer_name"
                                                                                     type="text" placeholder="Enter Warehouse name" aria-label="default input example" value="">
                                                                                     <input type="hidden" name="customer_id" id="customer_id">
                                                                           </div>
                                                                           <div class="col-sm-4">
                                                                                <label for="formFile" class="form-label ">Store Name <span>*</span>
                                                                                </label>
                                                                                <select class="form-select mb-3 supplier_type" name="storename" id="storename" aria-label="Default select example">
                                                                                          <option value="">Select Store Name </option>
                                                                                </select>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div style="clear:both"></div>
                                                                 <div class="row g-3">
                                                                      <h4>Warehouse Address</h4>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputFirstName" class="form-label">Address no.</label>
                                                                           <input type="text" value="" class="form-control address" name="address" id="address">
                                                                      </div> 
                                                                      <div class="col-sm-4">
                                                                           <label for="inputLastName" class="form-label">Building / Village</label>
                                                                           <input type="text" value="" class="form-control building" name="building" id="building">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label">Sub District</label>
                                                                           <input type="text" value="" class="form-control sub_district" name="sub_district" 
																		   id="sub_district" placeholder="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label"> District </label>
                                                                           <input type="text" value="" class="form-control district" name="district" 
																		   id="district" placeholder="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label">Road</label>
                                                                           <input type="text" value="" class="form-control road" name="road" id="road" placeholder="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputSelectCountry" class="form-label">Country <span>*</span>
                                                                           </label>
                                                                           <select class="form-select country_id" name="country_id" id="country_id" aria-label="Default select example">
                                                                                <option value="">Select Country</option>
                                                                                <?php foreach($countries as $countryObj) { 
                                                                                          $selected = '';
                                                                                          if($countryObj->id == 237) {
                                                                                               $selected = 'selected';
                                                                                          }
                                                                                     ?>
                                                                                     <option value="{{ $countryObj->id }}" <?php echo $selected; ?>>{{ $countryObj->name }}</option>
                                                                                <?php } ?>
                                                                           </select>
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label">State / Province <span>*</span>
                                                                           </label>
                                                                           <select class="form-select state_id" name="state_id" id="state_id" aria-label="Default select example">
                                                                                <option value="">Select State</option>
                                                                           </select>
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label">City <span>*</span>
                                                                           </label>
                                                                           <input type="text" value="" class="form-control city_id" name="city_id"
																		    id="city_id" placeholder="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label"> Zip Code <span>*</span>
                                                                           </label>
                                                                           <input type="text" value="" class="form-control zipcode" name="zipcode" 
																		   id="zipcode" placeholder="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label"> Contact Person <span>*</span>
                                                                           </label>
                                                                           <input type="text" value="" class="form-control zipcode" name="contact_prson" 
																		   id="contact_prson" placeholder="">
                                                                      </div>
                                                                      <div class="col-sm-4">
                                                                           <label for="inputEmailAddress" class="form-label"> Tel/ Mobile No. <span>*</span>
                                                                           </label>
                                                                           <input type="text" value="" class="form-control" name="contact_prson_contactno" 
																		   id="contact_prson_contactno" placeholder="">
                                                                      </div>
                                                                 </div>
                                                                 <div class="row g-3">
                                                                      <h4>Current Status</h4>
                                                                      <div class="col-sm-4">
                                                                           <select class="form-select" name="wh_status" id="wh_status">
                                                                                <option value="1">Active</option>
                                                                                <option value="0">Inactive</option>
                                                                           </select>
                                                                      </div>
                                                                 </div>
                                                                 <div class="row g-3">
                                                                      <div class="col-sm-4 mt-4 float-end">
                                                                           <button class="btn btn-info" type="submit" name="submit" >Create Warehouse</button>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                                                 <div class="table-responsive">
                                                                      <table class="table mb-0" id="dataTable" style="width:100%">
                                                                           <thead class="table-light">
                                                                                <tr>
                                                                                     <th>No.</th>
                                                                                     <th>Image</th>
                                                                                     <th>Product Name</th>
                                                                                     <th>Product Code</th>
                                                                                     <th>Details</th>
                                                                                </tr>
                                                                           </thead>
                                                                           <tbody>
														     </tbody>
                                                                      </table>
                                                                 </div>
                                                            </div>
                                                       </form>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <!--end row-->
                         </div>
                    </div>
                    <!--end page wrapper --> @include('layout.footer')
                    <!-- Bootstrap JS --> @include('layout.jsfile')
     </body>
     <script>
          $(document).ready(function() {
			
              
			$('#sec_name_store').addClass('d-none');
               $('#supplier_warehouse_type').change(function(e) {
                    e.preventDefault();
                    //var opt = $('#supplier_warehouse_type option:selected').text();
                    var opt = $('#supplier_warehouse_type').val();
                    if (opt == 3 || opt == 4) {
                         $('#sec_name_store').removeClass('d-none');
						 getStore();
                    }else {
                         $('#sec_name_store').addClass('d-none');
                         $('#customer_name').val("");
						$('#customer_name').prop( "disabled", false );
						$('#address').val("");
						$('#address').prop( "disabled", false );
						$('#building').val("");
						$('#building').prop( "disabled", false );
						$('#sub_district').val("");
						$('#sub_district').prop( "disabled", false );
						$('#district').val("");
						$('#district').prop( "disabled", false );
						$('#road').val("");
						$('#road').prop( "disabled", false );
						$('#city_id').val("");
						$('#city_id').prop( "disabled", false );
						
						$('#country_id').prop( "disabled", false );
						//$('#state_id').val(row.head_office_state_id);
						$('#state_id').prop( "disabled", false );
						$('#zipcode').val("");
						$('#zipcode').prop( "disabled", false );
						$('#contact_prson').val("");
						$('#contact_prson').prop( "disabled", false );
						$('#contact_prson_contactno').val("");
						$('#contact_prson_contactno').prop( "disabled", false );
                    }
               });
			   //bind store 
			   $('#storename').change(function(e){
					e.preventDefault();					
					var store_id= $('#storename').val();					
					if(store_id != ""){
						getCustomerDeatil(store_id);						
					}
			   })
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
					
				], 
			});
			   
          });
		function getStore(){
			$('#storename').html("");
			var optColl ='<option value="">Select Store</option>';			
			var data = {
				'_token' : '{{ csrf_token() }}',
			};
			$.ajax({

				type: "get",
				url: "{{ route('ajaxGetCustomersStore') }}",
				data: "data",
				dataType: "json",
				success: function (response) {
					
					var coll_json_text = JSON.stringify(response.customers_store);
					var storeColl = JSON.parse(coll_json_text);
					$.each(storeColl, function (i, row) { 

						optColl +=`<option value ="`+ row.id +`">`+ row.store_name +`</option>`;
					});
					$('#storename').append(optColl);
				}
			});
		}
		function getCustomerDeatil(store_id){
			var data = {
				'_token' : '{{ csrf_token() }}',
				'store_id' : store_id
			};
			$.ajax({
				type: "get",
				url: "{{ route('ajaxGetCustomersDetailByStoreId') }}",
				data: data,
				dataType: "json",
				success: function (response) {
					var coll_json_text = JSON.stringify(response.customers);
					var custColl = JSON.parse(coll_json_text);		
					$.each(custColl, function (i, row) { 
						/*address building sub_district district road 
						country_id state_id city_id zipcode
						contact_prson contact_prson_contactno
						*/
						$('#customer_name').val(row.name);
						$('#customer_name').prop( "readonly", true );
						$('#address').val(row.head_office_address);
						$('#address').prop( "readonly", true );
						$('#building').val(row.head_office_building);
						$('#building').prop( "readonly", true );
						$('#sub_district').val(row.head_office_sub_district);
						$('#sub_district').prop( "readonly", true );
						$('#district').val(row.head_office_district);
						$('#district').prop( "readonly", true );
						$('#road').val(row.head_office_road);
						$('#road').prop( "readonly", true );
						$('#city_id').val(row.head_office_city);
						$('#city_id').prop( "readonly", true );
						$('#country_id').val(row.head_office_country_id);
						$('#country_id').prop( "readonly", true );
						$('#state_id').val(row.head_office_state_id);
						$('#state_id').prop( "readonly", true );
						$('#zipcode').val(row.head_office_zipcode);
						$('#zipcode').prop( "readonly", true );
						$('#contact_prson').val(row.contact_person);
						$('#contact_prson').prop( "readonly", true );
						$('#contact_prson_contactno').val(row.contact_mobile);
						$('#contact_prson_contactno').prop( "readonly", true );
					});		
				}
			});
		}

		function dependdropdown(val, target, name) {
			var url = $("meta[name=url]").attr("content");
			$.ajax({
				url: "{{url('getregionaldata')}}",
				dataType : "json",
				type: "get",
				data : {'value':val, 'name':name},
				success : function(response) {
					
					var list = $(target); 
					list.empty();
					list.append(new Option('Select '+name, ''));
					$.each(response, function(index, item) {
						list.append(new Option(item.name, item.id, true));
					});
                         setTimeout(function() {
                              
                    
                         }, 500);
					
				},
			});
		}

	var country = $('.country_id').val();
	dependdropdown(country, '.state_id', 'State');
	
	$('body').on('change', '.country_id', function() {

          var val = $(this).val();
		dependdropdown(val, '.state_id', 'State');

	});
     </script>
     <script>
          $('.btn-info').click(function (e) { 
               e.preventDefault();
               $.ajaxSetup({
    
          
             
          });
     </script>


</html>