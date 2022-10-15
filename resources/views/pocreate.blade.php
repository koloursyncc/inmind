<!doctype html>
<html lang="en">
   @include('layout.header')
   <style>
      .flexbox{
         display:flex;justify-content:center;align-items: end; 
      }
   </style>
   <body>

<?php

$order_by_channel = [
	1 => 'Head office',
	2 => 'Kalpapruk',
	3 => 'Rangsit',
	4 => 'Paradise Park',
	5 => 'Shopee',
	6 => 'Lazada',
	7 => 'Facebook',
	8 => 'Instagram'
];

$disabledfield = $url = '';

if($type == 'view')
{
	$disabledfield = 'disabled';
}

if($type == 'save')
{
	$url = url('save/po');
}
else if($type == 'edit')
{
	$url = url('update/po');
}


?>

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
							<form id="po-form" data-url="{{ $url }}" enctype="multipart/form-data">
								@csrf
								<?php if($type == 'edit') { ?>
									<input type="hidden" name="id" value="{{ @$obj->id }}" />
								<?php } ?>
                           <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                              <label for="formFile" class="form-label">Brand</label>
                              <select class="form-select mb-3" name="brand_id" aria-label="Default select example" {{ $disabledfield }}>
                                 <option value="">Select Brand </option>
                                 <option value="1" <?php if(@$obj->brand_id == 1) { echo 'selected'; } ?>>Meha</option>
                                 <option value="2" <?php if(@$obj->brand_id == 2) { echo 'selected'; } ?>>Inmind</option>
                              </select>
                              <label for="formFile" class="form-label">Type of Customer</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio"  {{ $disabledfield }} name="type_of_customer" <?php if(@$obj->type_of_customer == 1) { echo 'checked'; } ?> type="radio" value="1">
                                 <label class="form-check-label" for="inlineRadio1">Wholesale</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio"  {{ $disabledfield }} name="type_of_customer" <?php if(@$obj->type_of_customer == 2) { echo 'checked'; } ?> type="radio" value="1">
                                 <label class="form-check-label" for="inlineRadio1">Retail</label>
                              </div>
                              <div style="clear:both"></div>
                              <label for="formFile" class="form-label">Title</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" {{ $disabledfield }} type="radio" name="title_option" value="1" <?php if(@$obj->title_option == 1) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Mr.</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" {{ $disabledfield }} type="radio" name="title_option" value="2" <?php if(@$obj->title_option == 2) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Ms.</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" {{ $disabledfield }} type="radio" name="title_option" value="3" <?php if(@$obj->title_option == 3) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Co. Ltd</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" {{ $disabledfield }} type="radio" name="title_option" value="4" <?php if(@$obj->title_option == 4) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Plc</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" {{ $disabledfield }} type="radio" name="title_option" value="5" <?php if(@$obj->title_option == 5) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Part Ltd.</label>
                              </div>
                              <div style="clear:both"></div>
                              <div class="row g-3">
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Customer Name</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="customer_name" name="customer_name" value="<?php echo @$obj->customer_name; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Family Name</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="family_name" name="family_name" value="<?php echo @$obj->family_name; ?>">
                                 </div>
                                 <h6>Home/Head office address  </h6>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Address no.</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="head_office_address" name="head_office_address" value="<?php echo @$obj->head_office_address; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Building / Village</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="head_office_building" name="head_office_building" value="<?php echo @$obj->head_office_building; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Sub District</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="inputEmailAddress" id="head_office_sub_district" name="head_office_sub_district" value="<?php echo @$obj->head_office_sub_district; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  District</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="head_office_district" name="head_office_district" value="<?php echo @$obj->head_office_district; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Road</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="head_office_road" name="head_office_road" value="<?php echo @$obj->head_office_road; ?>">
                                 </div>
								 
								 <div class="col-sm-4">
                                    <label for="inputSelectCountry" class="form-label">Country</label>
                                    <select {{ $disabledfield }} class="form-select" id="head_office_country" name="head_office_country">
                                       <option value="">Select Country</option>
									   <?php foreach($countries as $country) { ?>
											<option value="{{ $country->id }}">{{ $country->name }}</option>
									   <?php } ?>
                                    </select>
                                 </div>
								 
								 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">State</label>
                                    <select {{ $disabledfield }} class="form-select" id="head_office_state" name="head_office_state" aria-label="Default select example">
                                       <option value="">Select State</option>
                                    </select>
                                 </div>
								 
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  City</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="head_office_city" name="head_office_city" value="<?php echo @$obj->head_office_city; ?>">
                                 </div>
                                 
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="head_office_zip_code" name="head_office_zip_code" value="<?php echo @$obj->head_office_zip_code; ?>">
                                 </div>
                                 
                              </div>
                              <h6>
                                 <div class="form-check">
                                    <label class="form-check-label" for="flexCheckChecked">Delivery address same as home address</label>
                                    <input {{ $disabledfield }} class="form-check-input" type="checkbox" value="1" id="delivery_address_checked" name="delivery_address_checked"  checked> 
                                 </div>
                              </h6>
                              <div class="row g-3">
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Address no.</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="delivery_address" name="delivery_address" value="<?php echo @$obj->delivery_address; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Building / Village</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="delivery_building" name="delivery_building" value="<?php echo @$obj->delivery_building; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Sub District</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="delivery_sub_district" name="delivery_sub_district" value="<?php echo @$obj->delivery_sub_district; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  District</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="delivery_district" name="delivery_district" value="<?php echo @$obj->delivery_district; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Road</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" id="delivery_road" name="delivery_road" value="<?php echo @$obj->delivery_road; ?>">
                                 </div>
								 
								 <div class="col-sm-4">
                                    <label for="inputSelectCountry" class="form-label">Country</label>
                                    <select {{ $disabledfield }} class="form-select" id="delivery_country" name="delivery_country">
                                       <option value="">Select Country</option>
									   <?php foreach($countries as $country) { ?>
											<option value="{{ $country->id }}">{{ $country->name }}</option>
									   <?php } ?>
                                    </select>
                                 </div>
								 
								 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">State</label>
                                    <select {{ $disabledfield }} class="form-select" id="delivery_state" name="delivery_state" aria-label="Default select example">
                                       <option value="">Select State</option>
                                    </select>
                                 </div>
								 
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">  City</label>
                                    <input {{ $disabledfield }} type="text" class="form-control" name="delivery_city" id="delivery_city" value="<?php echo @$obj->delivery_city; ?>">
                                 </div>
                                 
                                 <div class="col-sm-4">
                                    <label {{ $disabledfield }} for="inputEmailAddress" class="form-label">  Zip Code</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" name="delivery_zip_code" id="delivery_zip_code" value="<?php echo @$obj->delivery_zip_code; ?>">
                                 </div>
                                 
                              </div>
                           </div>
                           <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                              
						   <div style="clear:both"></div>
                              <label for="formFile" class="form-label">Title</label>
                              <div style="clear:both"></div>
                              <div class="form-check form-check-inline">
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="title" id="title_1" value="1" <?php if(@$obj->title == 1) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Purchasing order</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="title" id="title_2" value="2" <?php if(@$obj->title == 2) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Deposit Reciept</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="title" id="title_3" value="3" <?php if(@$obj->title == 3) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Delivery Note</label>
                              </div>
                              <div style="clear:both"></div>
                              <div class="row">
                                <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Last Deposit Reciept refered no.</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="last_deposit" name="last_deposit" value="<?php echo @$obj->last_deposit; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <div class="mb-3">
                                       <label class="form-label">Date</label>
                                       <input type="date" {{ $disabledfield }} class="form-control" id="last_deposit" name="last_deposit" value="<?php echo @$obj->last_deposit; ?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Document no.</label>
                                    <input type="text" {{ $disabledfield }} class="form-control" id="document_no" name="document_no" value="<?php echo @$obj->document_no; ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Issue date</label>
                                    <input type="date" {{ $disabledfield }} class="form-control" id="date" name="date" value="<?php echo @$obj->date; ?>">
                                 </div>
                                 <div class="col-4">
                                    <label for="inputSelectCountry" class="form-label">Order by Store</label>
                                    <select {{ $disabledfield }} class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                       <option selected="">Select Customer name</option>
                                       <option value="1">demo1</option>
                                       <option value="2">demo2</option>
                                       <option value="3">demo3</option>
                                    </select>
                                 </div>
                                 <div class="col-4">
                                    <label for="inputSelectCountry" class="form-label">Order by channel</label>
                                    <select {{ $disabledfield }} class="form-select" id="order_by_channel" name="order_by_channel">
										<?php foreach($order_by_channel as $order_by_channel_k => $order_by_channel_v) { ?>
										<option value="{{ $order_by_channel_k }}" <?php if(@$obj->order_by_channel == $order_by_channel_k) { echo 'selected'; } ?>>{{ $order_by_channel_v }}</option>
                                       <?php } ?>
                                    </select> 
                                 </div>
                                 <div class="col-4">
                                    <label for="inputSelectCountry" class="form-label">Sale Person</label>
                                    <select {{ $disabledfield }} class="form-select" id="sale_person" name="sale_person">
                                       <option value="1" <?php if(@$obj->sale_person == 1) { echo 'selected'; } ?>>User1</option>
                                       <option value="2" <?php if(@$obj->sale_person == 2) { echo 'selected'; } ?>>User1</option>
                                       <option value="3" <?php if(@$obj->sale_person == 3) { echo 'selected'; } ?>>User1</option> 
                                    </select> 
                                 </div> 
								 <?php if($type == 'save') { ?>
                                 <h6>Order Description </h6> <a href="#" class="add_pro">Add More</a>
								 <?php } ?>
								 
								<div class="row">
									 <div class="col-sm-1 " style=""> 
									 <label class="form-check-label" for="flexCheckChecked">Select</label>
										
									 </div>  
									 <div class="col-sm-1 ">
										<label for="inputFirstName" class="form-label">Sr no.</label>
									   
									 </div>  
									 <div class="col-sm-4">
										<label for="inputFirstName" class="form-label">Product Name</label>
										
									 </div>  
									 <div class="col-sm-2">
										<label for="inputFirstName" class="form-label">Unit Price</label>
										
									 </div>  
									 <div class="col-sm-2">
										<label for="inputFirstName" class="form-label">Quantity</label>
										
									 </div>     
									 <div class="col-sm-2">
										<label for="inputFirstName" class="form-label">Price</label>
										
									 </div> 
								</div>
								
								<?php 
								$ttamount = 0;
								foreach($items as $itemindex => $itemsObj) {
										$ttamount += $itemsObj->price;
									?>
									<div class="row">
										 <div class="col-sm-1 " style=""> 
										 
											<input disabled class="form-check-input flexbox product_checked" type="checkbox" value="1" id="flexCheckChecked" checked="">
										 </div>  
										 <div class="col-sm-1 ">
											<label for="inputFirstName" class="form-label">{{ ++$itemindex }}</label>
										   
										 </div>  
										 <div class="col-sm-4">
											<select disabled class="form-select" id="inputSelectCountry" aria-label="Default select example">
											   <option value="">Select Product</option>
											   <?php foreach($products as $product) { ?>
													<option value="{{ $product->id }}" <?php if($itemsObj->product_id == $product->id) { echo 'selected'; } ?>>{{ $product->name }}</option>
											   <?php } ?>
											</select> 
											
										 </div> 
										 <div class="col-sm-2">
											<input type="text" class="form-control" disabled value="{{ $itemsObj->unit_price }}">
											
										 </div>  
										 <div class="col-sm-2">
											<input type="text" class="form-control" disabled value="{{ $itemsObj->qty }}">
											
										 </div>     
										 <div class="col-sm-2">
											<input type="text" class="form-control" disabled value="{{ $itemsObj->price }}">
											
										 </div> 
									</div><br><br><br>
								<?php } ?>
	 
								 <div class="row multi_product">
                                 
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
									   <?php 
									   $paytime = 0;
									   foreach($invoice as $invoiceindex => $invoiceObj) {
											 $paytime += $invoiceObj->pay_this_time;
										   ?>
											<tr>
											  <td>Deposit {{ $invoiceObj->created_at }}</td>
											  <td>{{ $invoiceObj->pay_this_time }}</td>
											  <td>THB</td>
										   </tr>
									   <?php } ?>
                                      
                                       <tr>
                                          <td>Pay this time</td>
                                          <td> <input type="text" {{ $disabledfield }} class="form-control" name="pay_this_time" placeholder=" "></td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Rest Balance</td>
                                          <td>{{ $ttamount - $paytime }}</td>
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
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="bank_title" id="bank_title_1" value="1" <?php if(@$obj->bank_title == 1) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Cash </label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="bank_title" id="bank_title_2" value="2" <?php if(@$obj->bank_title == 2) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Online  banking </label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="bank_title" id="bank_title_3" value="3" <?php if(@$obj->bank_title == 3) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Credit Card</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input {{ $disabledfield }} class="form-check-input" type="radio" name="bank_title" id="bank_title_4" value="4" <?php if(@$obj->bank_title == 4) { echo 'checked'; } ?>>
                                 <label class="form-check-label" for="inlineRadio1">Online Shopping</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="bank_title" id="bank_title_5" value="5" <?php if(@$obj->bank_title == 5) { echo 'checked'; } ?>>
                                 <label {{ $disabledfield }} class="form-check-label" for="inlineRadio1">Credit term 40 days</label>
                              </div> 
                              <div class="row g-3"> 
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Bank Name</label>
                                    <select {{ $disabledfield }} class="form-select" id="bank_name" name="bank_name">
                                       <option value="1" <?php if(@$obj->bank_name == 1) { echo 'selected'; } ?>>Bangkok Bank</option>
                                       <option value="2" <?php if(@$obj->bank_name == 2) { echo 'selected'; } ?>>Bangkok Bank</option>
                                       <option value="3" <?php if(@$obj->bank_name == 3) { echo 'selected'; } ?>>Kasikom Bank</option> 
                                       <option value="4" <?php if(@$obj->bank_name == 4) { echo 'selected'; } ?>>Krungsri Bank</option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Bank Branch</label>
                                    <select {{ $disabledfield }} class="form-select" id="bank_branch" name="bank_branch">
                                       <option value="1" <?php if(@$obj->bank_branch == 1) { echo 'selected'; } ?>>Rattanatibet Rd.</option>
                                       <option value="2" <?php if(@$obj->bank_branch == 1) { echo 'selected'; } ?>>Rattanatibet Rd.</option>
                                       <option value="3" <?php if(@$obj->bank_branch == 1) { echo 'selected'; } ?>>Rajpruk</option> 
                                       <option value="4" <?php if(@$obj->bank_branch == 1) { echo 'selected'; } ?>>Phra Nangklao</option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Transaction date</label>
                                    <input {{ $disabledfield }} type="date" class="form-control" id="bank_transaction_date" name="bank_transaction_date" value="<?php echo @$obj->bank_transaction_date ?>">
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Bank A/C no.</label>
                                    <select {{ $disabledfield }} class="form-select" id="bank_account_number" name="bank_account_number">
                                       <option value="1" <?php if(@$obj->bank_account_number == 1) { echo 'selected'; } ?>>058-301795-9</option>
                                       <option value="2" <?php if(@$obj->bank_account_number == 2) { echo 'selected'; } ?>>058-301795-9</option>
                                       <option value="3" <?php if(@$obj->bank_account_number == 3) { echo 'selected'; } ?>>655-2-13419-0</option> 
                                       <option value="4" <?php if(@$obj->bank_account_number == 4) { echo 'selected'; } ?>>315-1-31039-4</option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputLastName" class="form-label">Beneficiary name</label>
                                    <select {{ $disabledfield }} class="form-select" id="bank_beneficiary_name" name="bank_beneficiary_name">
                                       <option value="1" <?php if(@$obj->bank_beneficiary_name == 1) { echo 'selected'; } ?>>Inmind co. ltd</option>
                                       <option value="2" <?php if(@$obj->bank_beneficiary_name == 1) { echo 'selected'; } ?>>Mr. Nattapong anekadhana</option>
                                       <option value="3" <?php if(@$obj->bank_beneficiary_name == 1) { echo 'selected'; } ?>>Inmind co. ltd</option> 
                                       <option value="4" <?php if(@$obj->bank_beneficiary_name == 1) { echo 'selected'; } ?>>Mr. Nattapong anekadhana   </option> 
                                    </select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputEmailAddress" class="form-label">Transaction Time</label>
                                    <input {{ $disabledfield }} type="date" class="form-control" id="bank_transaction_time" name="bank_transaction_time" value="<?php echo @$obj->bank_transaction_time ?>">
                                 </div>
                                 <div class="mb-3 mt-10 " >
                                    <label for="inputProductDescription" class="form-label">Upload Transaction slip</label>
                                    <input {{ $disabledfield }} id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                 </div>
								 
								 <?php foreach($files as $file) { 
									$img = asset('images/po/'.$file->po_id.'/'.$file->image);
								 ?>
									<div class="img_{{$file->id}}">
										<img src="{{ $img }}" height="100" width="100" />
										<a href="#" class="remove" data-id="{{$file->id}}">Remove</a>
									</div>
								 <?php } ?>
								 
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
	  
	  <div class="row multi_product_clone" style="display:none" data-ng="-1" data-counter="0">
		<div class="row bkup_clone">
			 <div class="col-sm-1 " style=""> 
			 
				<div class="form-check"> 
				<input {{ $disabledfield }} class="form-check-input flexbox product_checked"  type="checkbox" value="1" id="flexCheckChecked" checked=""> 
			 </div>
			 </div>  
			 <div class="col-sm-1 ">
				
			   <p class="flexbox product_sno">1</p>
			 </div>  
			 <div class="col-sm-4">
				
				<select {{ $disabledfield }} class="form-select product_name" id="inputSelectCountry" aria-label="Default select example">
				   <option value="">Select Product</option>
				   <?php foreach($products as $product) { ?>
						<option value="{{ $product->id }}" data-price="">{{ $product->name }}</option>
				   <?php } ?>
				</select> 
			 </div>  
			 <div class="col-sm-2">
		
				<input {{ $disabledfield }} type="text" class="form-control product_unit_price" id="inputFirstName" placeholder=" ">
			 </div>  
			 <div class="col-sm-2">
			
				<input {{ $disabledfield }} type="text" class="form-control product_qty" id="inputFirstName" placeholder=" ">
			 </div>     
			 <div class="col-sm-2">
				
				<input {{ $disabledfield }} type="text" class="form-control product_price" id="inputFirstName" placeholder=" ">
			 </div> 
			 <br><br><br>
		</div>
	 </div>
	  
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.pofile')
      <script>
	  function dependdropdown(val, target, cnt, name) {
			var url = $("meta[name=url]").attr("content");
			$.ajax({
				url: "{{url('getregionaldata')}}",
				dataType : "json",
				type: "get",
				data : {'value':val, 'name':name},
				success : function(response) {
					//alert(target+cnt);
					var list = $(target+cnt); 
					list.empty();
					list.append(new Option('Select '+name, ''));
					$.each(response, function(index, item) {
						list.append(new Option(item.name, item.id, true));
					});
					
				},
			});
		}
		
		function sum() {
			var price = 0;
			var product_price = $('.product_price', $('.multi_product'));
			product_price.each(function () {
				price += Number($(this).val());
			});
		}
		
         $(document).ready(function() {
			 
			$('body').on('keyup', '.product_unit_price', function() {
				var product_unit_price = $('.product_unit_price', $('.multi_product'));
				product_unit_price.each(function () {
					
					qty = $('.product_qty', $(this).parent().parent()).val();
					
					unit_price = (this.value*qty);
					
					$('.product_price', $(this).parent().parent()).val(unit_price);
					
					//price += this.value;
				});
				
				setTimeout(function(){ 
					sum();
				}, 2000);
				
			});
			
			$('body').on('keyup', '.product_qty', function() {
				var product_qty = $('.product_qty', $('.multi_product'));
				product_qty.each(function () {
					
					qty = $('.product_unit_price', $(this).parent().parent()).val();
					
					unit_price = (this.value*qty);
					
					$('.product_price', $(this).parent().parent()).val(unit_price);
					
					//price += this.value;
				});
				
				setTimeout(function(){ 
					sum();
				}, 2000);
				
				
			});
			 
			 $('body').on('click', '.add_pro', function() {
				var clone = $('.bkup_clone', $('.multi_product_clone')).clone();
				
				var no = $('.multi_product_clone').attr('data-ng');
				var nocnt = parseInt(no) - 1;
				
				var counter = $('.multi_product_clone').attr('data-counter');
				var countercnt = parseInt(counter) + 1;
				
				$('.product_sno', clone).html(countercnt);
				$('.product_checked', clone).attr('name', 'product_checked['+nocnt+']');
				$('.product_name', clone).attr('name', 'product_name['+nocnt+']');
				$('.product_unit_price', clone).attr('name', 'product_unit_price['+nocnt+']');
				$('.product_qty', clone).attr('name', 'product_qty['+nocnt+']');
				$('.product_price', clone).attr('name', 'product_price['+nocnt+']');
				 
				$('.multi_product').append(clone);
				
				 $('.multi_product_clone').attr('data-ng', nocnt);
				 
				  $('.multi_product_clone').attr('data-counter', countercnt);
				return false;
			 });
			 
			 
			 $('body').on('click', '.remove', function() {
				 var id = $(this).attr('data-id');
				if (confirm('Are you sure you want remove this image?')) {
					$.ajax({
						url: "{{url('po/removeimagebyid')}}",
						dataType : "json",
						type: "post",
						data : {'id': id, "_token": "{{ csrf_token() }}"},
						success : function(response) {
							if(response.status == 'success') {
								$('.img_'+id).remove();
							}
						},
					});
				} 
				
				return false;
			 });
			 
			 <?php if($type == 'save') { ?>
				$('#head_office_country option[value="237"]').prop('selected', true);
				$('#delivery_country option[value="237"]').prop('selected', true);
				dependdropdown(237, '#head_office_state', '', 'State');
				dependdropdown(237, '#delivery_state', '', 'State');
			 <?php } ?>
			$('body').on('change', '#head_office_country', function() {
				var country = $(this).val();
				
				var target = '#head_office_state';
				
				dependdropdown(country, target, '', 'State');
			});
			
			$('body').on('change', '#delivery_country', function() {
				var country = $(this).val();
				
				var target = '#delivery_state';
				
				dependdropdown(country, target, '', 'State');
			});
         /* var table = $('#dataTable').DataTable({
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
         		}); */
         });
      </script>
   </body>
</html>