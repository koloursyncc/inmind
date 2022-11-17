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
                  
                <label for="formFile" class="form-label">Order Type
                </label>
                <div style="clear:both"> </div>
                <div class="row">
                    <div class="col-sm-7">
                    <div class="mb-3">
										<label class="form-label">Product Name / Product Code /P.O No. / Ticket No.</label>
										<select class="single-select brand_id" id="" name="brand_id" >
												<option value="">Inmind</option>
                        <option value="">Metha</option>
                        <option value="">Other</option>
										
										</select>
									</div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">From </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Inventory Out  Ticket ID 
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">TO</label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Customer PO No.
                                </option>
                                <option value="1">0001/2565 </option>
                            </select>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Pickup Date </label>
                        <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Received Date</label>
                        <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="col-sm-4" style="margin-top:20px">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Driver </label>
                        <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Customer PO No.
                                </option>
                                <option value="1">0001/2565 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4" style="margin-top:20px">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Customer Name</label>
                        <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Customer PO No.
                                </option>
                                <option value="1">0001/2565 </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                        <label for="inputFirstName" class="form-label">Result Found 2 transactions</label>
                       <table class="table table-responsive table-bordered">
                            <thead> 
                               
                                <th>Pick Up date</th>
                                <th>Delivery Date</th>
                                <th>P.O / Ticket</th>
                                <th>Product Name</th>
                                <th>Product Code </th>
                                <th>Total</th>
                                <th>From W/H</th> 
                                <th>TO</th> 
                            </thead>
                            <tbody>
                                <tr>
                                    <td>28 Oct 2022</td>
                                    <td>28 Oct 2022</td>
                                    <td>0001/2565</td>
                                    <td>Siri Cabinet</td>
                                    <td>C133-546</td>
                                    <td>2</td>
                                    <td>W/H 34</td>
                                    <td>Suchart / Nonthaburi</td>
                                </tr>
                                <tr>
                                    <td>28 Oct 2022</td>
                                    <td>28 Oct 2022</td>
                                    <td>0001/2565</td>
                                    <td>Siri Cabinet</td>
                                    <td>C133-546</td>
                                    <td>2</td>
                                    <td>W/H 34</td>
                                    <td>Suchart / Nonthaburi</td>
                                </tr>
                                <tr>
                                    <td>28 Oct 2022</td>
                                    <td>28 Oct 2022</td>
                                    <td>0001/2565</td>
                                    <td>Siri Cabinet</td>
                                    <td>C133-546</td>
                                    <td>2</td>
                                    <td>W/H 34</td>
                                    <td>Suchart / Nonthaburi</td>
                                </tr>
                            </tbody>
                       </table>
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
