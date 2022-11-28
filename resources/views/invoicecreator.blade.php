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
            <div class="breadcrumb-title pe-3">Invoice Creator
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
                  <li class="breadcrumb-item active" aria-current="page">Invoice Creator
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
                        <p>Invoice No: INV 1005/2566
                        </p>
                      </div>
                      <div class="col-sm-4">
                        <p>Issue Date.: 10 Nov 2022
                        </p>
                      </div>
                    </div>
                    <div style="clear:both"> 
                    </div>
                    <div class="row">
                      <div class="col-sm-7">
                        <div class="mb-3">
                          <label class="form-label">Customer P.O No.
                          </label>
                          <select class="single-select brand_id" id="" name="brand_id" >
                            <option value="">Inmind
                            </option>
                            <option value="">Metha
                            </option>
                            <option value="">Other
                            </option>
                          </select>
                        </div>
                      </div>
                      <div style="clear:both">
                      </div>
                      <div style="clear:both">
                      </div>
                      <div class="col-sm-4" style="margin-top:20px">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label" for="inlineRadio1">Customer Name
                          </label>
                          <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                            <option value="">Select Customer Name
                            </option>
                            <option value="1">Dohome
                            </option>
                          </select>
                        </div>
                      </div>
                      <div style="clear:both">
                      </div>
                      <div style="clear:both">
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label" for="inlineRadio1">Between P.O Place Date 
                          </label>
                          <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label" for="inlineRadio1">To Date
                          </label>
                          <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="input-group-append mt-10">
                          <button class="btn btn-danger" type="button" id="btnreceived">Find
                          </button>
                        </div>
                      </div>
                      <div style="clear:both">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="inputFirstName" class="form-label">
                          <b>Result Found 2 transactions
                          </b>
                        </label>
                        <p for="inputFirstName" class="form-label">Customer Name :Dohome PLC
                        </p>
                        <p for="inputFirstName" class="form-label">Customer Address :80 Vibhavadi Rd, Dindaeng District, bangkok 10400 Thailand
                        </p>
                        <p for="inputFirstName" class="form-label">Credit Terms :90 Days
                        </p>
                        <p for="inputFirstName" class="form-label">From: goods Received 
                        </p>
                        <table class="table table-responsive table-bordered">
                          <thead> 
                            <th>Select
                            </th>
                            <th>P.O No.
                            </th>
                            <th>P.O / Ticket
                            </th>
                            <th>Inventory In Ticket No.
                            </th>
                            <th>Delivery Date 
                            </th>
                            <th>P.O Amount
                            </th>
                            <th>Delivered Amount 
                            </th> 
                            <th>Rest Balance
                            </th> 
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="col-md-12">	
                                  <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                </div>
                              </td>
                              <td>28 Oct 2022
                              </td>
                              <td>0001/2565
                              </td>
                              <td>Siri Cabinet
                              </td>
                              <td>C133-546
                              </td>
                              <td>2
                              </td>
                              <td>W/H 34
                              </td>
                              <td>Suchart / Nonthaburi
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="col-md-12">	
                                  <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                </div>
                              </td>
                              <td>28 Oct 2022
                              </td>
                              <td>0001/2565
                              </td>
                              <td>Siri Cabinet
                              </td>
                              <td>C133-546
                              </td>
                              <td>2
                              </td>
                              <td>W/H 34
                              </td>
                              <td>Suchart / Nonthaburi
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="col-md-12">	
                                  <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                </div>
                              </td>
                              <td>28 Oct 2022
                              </td>
                              <td>0001/2565
                              </td>
                              <td>Siri Cabinet
                              </td>
                              <td>C133-546
                              </td>
                              <td>2
                              </td>
                              <td>W/H 34
                              </td>
                              <td>Suchart / Nonthaburi
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="float:right">Total Amount: 160,500 THB
                        </p>
                        <p>Amount in Words: One Hundered Sixty thosand, Five Hundered Thai Bahts Only
                        </p>
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
