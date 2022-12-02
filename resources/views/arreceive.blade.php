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
            <div class="breadcrumb-title pe-3">Ar Receiver
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
                  <li class="breadcrumb-item active" aria-current="page">Ar Receiver
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
                      <div class="col-sm-7">
                        <div class="mb-3">
                          <label class="form-label">Invoice No.
                          </label>
                          <select class="single-select brand_id" id="" name="brand_id" >
                            <option value="">001/2565
                            </option>
                            <option value="">001/2566
                            </option>
                            <option value="">001/2567
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <p for="inputFirstName" class="form-label">Invoice Issue date : 29/12/2022
                        </p>
                        <p for="inputFirstName" class="form-label">Customer name : Inmind</p>
                        <table class="table table-responsive table-bordered">
                          <thead> 
                            
                            <th>P.O No.
                            </th>
                            <th>Inventory In Ticket No.
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
