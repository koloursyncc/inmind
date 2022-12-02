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
            <div class="breadcrumb-title pe-3">AR Received Search
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
                  <li class="breadcrumb-item active" aria-current="page">AR Received Search
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
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">Invoice No.
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
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">P.O No.
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
                      <div class="col-md-3" style="margin-top:20px;">
                        <div class="input-group-append mt-10" >
                          <button class="btn btn-danger" type="button" id="btnreceived">Find
                          </button>
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
                          <label class="form-check-label" for="inlineRadio1">Between Date 
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
                      <div style="clear:both">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12" style="margin-top:30px;">
                        <label for="inputFirstName" class="form-label">
                          <b>Result Found 2 transactions
                          </b>
                        </label>
                        <p for="inputFirstName" class="form-label">Total Rest balance :110,000 THB
                        </p>
                        <table class="table table-responsive table-bordered">
                          <thead> 
                            <th>Invoice No.
                            </th>
                            <th>P.O  No.
                            </th>
                            <th>P.O Amount
                            </th>
                            <th>Delivered amount
                            </th>
                            <th>Received
                            </th>
                            <th>Received date
                            </th> 
                            <th>Status
                            </th> 
                          </thead>
                          <tbody>
                            <tr>
                              <td>INV 1005/2565
                              </td>
                              <td>0003/2565
                              </td>
                              <td>12,500
                              </td>
                              <td>5,000
                              </td>
                              <td>7,500
                              </td>
                              <td>15 Nov 2022
                              </td>
                              <td><span style="color:green">Received</span>
                              </td>
                            </tr>
                            <tr>
                              <td>INV 1005/2565
                              </td>
                              <td>0003/2565
                              </td>
                              <td>12,500
                              </td>
                              <td>5,000
                              </td>
                              <td>7,500
                              </td>
                              <td>15 Nov 2022
                              </td>
                              <td><span style="color:green">Commission Paid</span>
                              </td>
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
