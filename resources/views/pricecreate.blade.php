<!doctype html>
<html lang="en">
   @include('layout.header')
   <style>
      .flexbox{
         display:flex;justify-content:center;align-items: end; 
      }
   </style>
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
                     <div id="smartwizard">
                        <ul class="nav">
                           <li class="nav-item">
                              <a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
                              <br>PO Details</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
                              <br>Contact Person</a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
                              <br>Bank Details </a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                              <label for="formFile" class="form-label">Brand</label>
                              <select class="form-select mb-3" name="brand_id" aria-label="Default select example">
                                 <option value="">Select Brand </option>
                                 <option value="1" <?php if(@$obj->brand_id == 1) { echo 'selected'; } ?>>Meha</option>
                                 <option value="2" <?php if(@$obj->brand_id == 2) { echo 'selected'; } ?>>Inmind</option>
                              </select>
                              <label for="formFile" class="form-label">Type of Customer</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="type_of_customer" <?php if(@$obj->type_of_customer == 1) { echo 'selected'; } ?> type="radio" value="1">
                                 <label class="form-check-label" for="inlineRadio1">Wholesale</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="type_of_customer" <?php if(@$obj->type_of_customer == 2) { echo 'selected'; } ?> type="radio" value="2">
                                 <label class="form-check-label" for="inlineRadio1">Retail</label>
                              </div>
                              <div style="clear:both"></div>
                              <label for="formFile" class="form-label">Title</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="title_option" value="1" <?php if(@$obj->title_option == 1) { echo 'selected'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Mr.</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="title_option" value="2" <?php if(@$obj->title_option == 2) { echo 'selected'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Ms.</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="title_option" value="3" <?php if(@$obj->title_option == 3) { echo 'selected'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Co. Ltd</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="title_option" value="4" <?php if(@$obj->title_option == 4) { echo 'selected'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Plc</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="title_option" value="5" <?php if(@$obj->title_option == 5) { echo 'selected'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Part Ltd.</label>
                              </div>
                              <div style="clear:both"></div>
                              <form class="row g-3">
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo @$obj->customer_name; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Family Name</label>
                                    <input type="text" class="form-control" id="family_name" name="family_name" value="<?php echo @$obj->family_name; ?>">
                                 </div>
                                 <h6>Home/Head office address  </h6>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Address no.</label>
                                    <input type="text" class="form-control" id="head_office_address" name="head_office_address" value="<?php echo @$obj->head_office_address; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Building / Village</label>
                                    <input type="text" class="form-control" id="head_office_building" name="head_office_building" value="<?php echo @$obj->head_office_building; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Sub District</label>
                                    <input type="text" class="form-control" id="head_office_sub_district" name="head_office_sub_district" value="<?php echo @$obj->head_office_sub_district; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  District</label>
                                    <input type="text" class="form-control" id="head_office_district" name="head_office_district" value="<?php echo @$obj->head_office_district; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Road</label>
                                    <input type="text" class="form-control" id="head_office_road" name="head_office_road" value="<?php echo @$obj->head_office_road; ?>">
                                 </div>
								 
								 <div class="col-sm-4">
                                    <label for="inputSelectCountry" class="form-label">Country</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option value="">Select Country</option>
									   <?php foreach($countries as $country) { ?>
											<option value="{{ $country->id }}">{{ $country->name }}</option>
									   <?php } ?>
                                    </select>
                                 </div>
								 
								  <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">State</label>
									<select class="form-select" id="head_office_state" name="head_office_state" aria-label="Default select example">
                                       <option value="">Select State</option>
                                    </select>
                                 </div>
								 
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  City</label>
                                    <input type="text" class="form-control" id="head_office_country" name="head_office_country">
                                 </div>
                                
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 
                              </form>
                              <h6>
                                 <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked">Delivery address same as home address</label>
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> 
                                 </div>
                              </h6>
                              <form class="row g-3">
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Address no.</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Building / Village</label>
                                    <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Sub District</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  District</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Road</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  City</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">State</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-12">
                                    <label for="inputSelectCountry" class="form-label">Country</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">India</option>
                                       <option value="1">United Kingdom</option>
                                       <option value="2">America</option>
                                       <option value="3">Dubai</option>
                                    </select>
                                 </div>
                              </form>
                           </div>
                           <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                              
						   <div style="clear:both"></div>
                              <label for="formFile" class="form-label">Title</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Purchasing order</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Deposit Reciept</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Delivery Note</label>
                              </div>
                              <div style="clear:both"></div>
                              <div class="row">
                                <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Last Deposit Reciept refered no.</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="mb-3">
                                       <label class="form-label">Date</label>
                                       <input type="date" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Document no.</label>
                                    <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Issue date</label>
                                    <input type="date" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-4">
                                    <label for="inputSelectCountry" class="form-label">Order by Store</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Select Customer name</option>
                                       <option value="1">demo1</option>
                                       <option value="2">demo2</option>
                                       <option value="3">demo3</option>
                                    </select>
                                 </div>
                                 <div class="col-4">
                                    <label for="inputSelectCountry" class="form-label">Order by channel</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Head office</option>
                                       <option value="1">Kalpapruk</option>
                                       <option value="2">Rangsit</option>
                                       <option value="3">Paradise Park</option>
                                       <option selected="">Shopee</option>
                                       <option value="1">Lazada</option>
                                       <option value="2">Facebook</option>
                                       <option value="3">Line</option>
                                       <option value="3">Instagram</option>
                                    </select> 
                                 </div>
                                 <div class="col-4">
                                    <label for="inputSelectCountry" class="form-label">Sale Person</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">User1</option>
                                       <option value="1">User1</option>
                                       <option value="2">User1</option> 
                                    </select> 
                                 </div> 
                                 <h6>Order Description </h6> 
                                 <div class="col-sm-1 " style=""> 
                                 <label class="form-check-label" for="flexCheckChecked">Select</label>
                                    <div class="form-check"> 
                                    <input class="form-check-input flexbox" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                                 </div>
                                 </div>  
                                 <div class="col-sm-1 ">
                                    <label for="inputFirstName" class="form-label">Sr no.</label>
                                   <p class="flexbox">1</p>
                                 </div>  
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Product Name</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Product1</option>
                                       <option value="1">Product1</option>
                                       <option value="2">Product1</option> 
                                    </select> 
                                 </div>  
                                 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Unit Price</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div>  
                                 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div>     
                                 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div> 
                                 
                                 <div class="col-sm-8"> </div> 
                                 <div class="col-sm-4">
                                    <table class="table table-responsive ">
                                       <tr>
                                          <td>Total Amount</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Discount</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>VAT</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Deposit 01/11/2022</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Deposit 01/11/2022</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Pay this time</td>
                                          <td> <input type="text" class="form-control" id="inputFirstName" placeholder=" "></td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Rest Balance</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                    </table>
                                 </div> 
                                 
                              </div>
                           </div>
                           <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                           <label for="formFile" class="form-label">Title</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Cash </label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Online  banking </label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Credit Card</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Online Shopping</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Credit term 40 days</label>
                              </div> 
                              <form class="row g-3"> 
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Bank Name</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Bangkok Bank</option>
                                       <option value="1">Bangkok Bank</option>
                                       <option value="2">Kasikom Bank</option> 
                                       <option value="2">Krungsri Bank</option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Bank Branch</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Rattanatibet Rd.</option>
                                       <option value="1">Rattanatibet Rd.</option>
                                       <option value="2">Rajpruk</option> 
                                       <option value="2">Phra Nangklao</option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Transaction date</label>
                                    <input type="date" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Bank A/C no.</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">058-301795-9</option>
                                       <option value="1">058-301795-9</option>
                                       <option value="2">655-2-13419-0</option> 
                                       <option value="2">315-1-31039-4</option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Beneficiary name</label>
                                    <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Inmind co. ltd</option>
                                       <option value="1">Mr. Nattapong anekadhana</option>
                                       <option value="2">Inmind co. ltd</option> 
                                       <option value="2">Mr. Nattapong anekadhana   </option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Transaction Time</label>
                                    <input type="date" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>
                                 <div class="mb-3 mt-10 " >
                                    <label for="inputProductDescription" class="form-label">Upload Transaction slip</label>
                                    <input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end row-->
         </div>
      </div>
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.jsfile')
      <script>
         $(document).ready(function() {
         
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