<!doctype html>
<html lang="en">
  @include('layout.header')
  <style>
    .flexbox{
      display:flex;
      justify-content:center;
      align-items: end;
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
            <div class="breadcrumb-title pe-3">Delivery Search
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
                  <li class="breadcrumb-item active" aria-current="page">Delivery Search
                  </li>
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
                  <form id="po-form" data-url="" enctype="multipart/form-data">
                  <div class="row g-3">
                  <div class="col-sm-4">
                   <p>Inventory Out  Date: 04/11/2022</p>
                  </div>
                  <div class="col-sm-4">
                   <p>Inventory out Ticket ID: MVI 200/2565</p>
                  </div>
                </div>
                <label for="formFile" class="form-label">Order Type
                </label>
                <div style="clear:both"> </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Internal Moving
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">By </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Inventory Out  Ticket ID 
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Customer PO
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="form-check-label" for="inlineRadio1">Customer Name: Dohome</label>
                             
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">No.</label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Customer PO No.
                                </option>
                                <option value="1">0001/2565 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">To W/H </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Warehouse
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Product Name / Code</label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">C133-546 </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="inputFirstName" class="form-label">Quantity</label>
                        <input  type="text" class="form-control" id="delivery_address" name="delivery_address" value="">
                    </div>

                    <div class="col-sm-4">
                        <label class="form-check-label" for="inlineRadio1">Product Status Choose :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Ready to Sale
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Repair
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">All Products Available In : W/H 34   /  ABC 123/2022</label>
                       <table class="table table-responsive table-bordered">
                            <thead> 
                                <th></th>
                                <th>Product name</th>
                                <th>Product Code</th>
                                <th>Product Image</th>
                                <th>Total</th>
                                <th>Ready to Sale</th>
                                <th>Repair</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="col-md-12">	
                                            <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                        </div>
                                    </td>
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>2</td>
                                    <td>0</td>
                                </tr>
                                <tr>

                                    <td>
                                        <div class="col-md-12">	
                                            <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                        </div>
                                    </td>
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>2</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-md-12">	
                                            <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                        </div>
                                    </td>
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>2</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                       </table>
                    </div>
                    <div class="col-sm-6">
                         <label for="inputFirstName" class="form-label">Delivery Basket</label>
                       <table class="table table-responsive table-bordered">
                            <thead> 
                                
                                <th>Product name</th>
                                <th>Product Image</th>
                                <th>Product Code</th>
                                <th>Total</th>
                                <th>From</th>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>Fong</td>
                                </tr>
                                <tr>
                                   
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>Fong</td>
                                </tr>
                                <tr>
                                   
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>Fong</td>
                                </tr>
                            </tbody>
                       </table>
                    </div>

                    
                </div>
                <div class="row g-3">
                  <div class="col-sm-4">
                    <label for="inputLastName" class="form-label">Deliver Person
                    </label>
                    <input  type="text" class="form-control" id="delivery_building" name="delivery_building" value="<?php echo @$obj->delivery_building; ?>">
                  </div>
                  <div class="col-sm-4">
                    <label for="inputEmailAddress" class="form-label">Telephone
                    </label>
                    <input  type="text" class="form-control" id="delivery_sub_district" name="delivery_sub_district" value="<?php echo @$obj->delivery_sub_district; ?>">
                  </div>
                    <div class="col-4">
                        <label for="inputEmailAddress" class="form-label"> Delivery Date Expected</label>
                        <input type="date" class="form-control store_contact_birth_date" id="">
                    </div>
                  <div class="col-sm-4">
                    <label for="inputEmailAddress" class="form-label">Reamrk </label>
                    <textarea  type="text" class="form-control" id="delivery_road" name="delivery_road" value="<?php echo @$obj->delivery_road; ?>"></textarea>
                  </div>
                </div>
                <input type="button" value="Save" class="btn btn-primary submit mt-10">
                </form>
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </div>
    <!--end page wrapper -->
    @include('layout.footer')
    <!-- Bootstrap JS -->
    @include('layout.pofile')
  </body>
</html>