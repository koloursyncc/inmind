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
            <div class="breadcrumb-title pe-3">Inventory Modify
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
                  <li class="breadcrumb-item active" aria-current="page">Inventory Modify
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
                   <p>Warehouse Name: 04/11/2022</p>
                  </div>
                  <div class="col-sm-4">
                   <p>Warehouse Type: MVI 200/2565</p>
                  </div>
                  <div class="col-sm-4">
                   <p>Customer Name: MVI 200/2565</p>
                  </div>
                  <div class="col-sm-4">
                   <p>Address: MVI 200/2565</p>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                       <table class="table table-responsive table-bordered">
                       <div class="col-sm-12">
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Product Name / Code</label>
                                <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                    <option value="">C133-546 </option>
                                    <option value="1">Meha </option>
                                    <option value="2" >Inmind</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Change Status From</label>
                                <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                    <option value="">Ready to Sale</option>
                                    <option value="1">Repair </option>
                                    <option value="2" >Wrecked</option>
                                    <option value="2" >Lost</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">To Status</label>
                                <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                    <option value="">Ready to Sale</option>
                                    <option value="1">Repair </option>
                                    <option value="2" >Wrecked</option>
                                    <option value="2" >Lost</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    <label for="inputFirstName" class="form-label">Quantity
                    </label>
                    <input  type="text" class="form-control" id="delivery_address" name="delivery_address" value="<?php echo @$obj->delivery_address; ?>">
                  </div>
                       </table>
                    </div>

                    <div class="col-sm-8">
                         <label   label for="inputFirstName" class="form-label">Status</label>
                       <table class="table table-responsive table-bordered">
                            <tbody>
                                <tr>
                                    <td>Ready to Sale (20 pcs.)</td>
                                    <td>Repair (5 pcs.)</td>
                                    <td>Wrecked (10 pcs.)</td>
                                    <td>Lost (5 pcs.)</td>
                                    
                                </tr>
                                <tr>
                                    <td>Ready to Sale (20 pcs.)</td>
                                    <td>Repair (5 pcs.)</td>
                                    <td>Wrecked (10 pcs.)</td>
                                    <td>Lost (5 pcs.)</td>
                                    
                                </tr>
                                <tr>
                                    <td>Ready to Sale (20 pcs.)</td>
                                    <td>Repair (5 pcs.)</td>
                                    <td>Wrecked (10 pcs.)</td>
                                    <td>Lost (5 pcs.)</td>
                                    
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
