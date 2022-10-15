<!doctype html>
<html lang="en">
  @include('layout.header')
  <style>
    .mt-10{
      margin-top: 10px;
    }
    .btn {
    color: #fff;
    background-color: #17a2b8;
    border: 1px solid #17a2b8;
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;
    font-weight: 400;
}
.btn {
    display: inline-block;
    text-decoration: none;
    text-align: center;
    text-transform: none;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-left: 0.2rem;
    margin-right: 0.2rem;
    cursor: pointer;
  </style>
  <body>
    <!--wrapper-->
    <div class="wrapper">
      @include('layout.menu')
      <!--start page wrapper -->
      <div class="page-wrapper">
        <div class="page-content">
          <!--breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product
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
                  <li class="breadcrumb-item active" aria-current="page">
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->
          <div class="card">
            <div class="card-body p-4">
              <h5 class="card-title">
              </h5>
              <hr/>
              <div class="form-body mt-4">
                <form id="" class="fromid ">
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="border border-3 p-4 rounded">
                           <div class="col-md-12">
                              <label class="form-label">Product</label>
                                 <select class="single-select">
                                    <option value="United States">Select Product</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-10">
                              <label class="form-label">Product code</label>
                                 <select class="single-select">
                                    <option value="United States">Select Product code</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Aland Islands">Aland Islands</option>
                                    <option value="Albania">Albania</option>
                                 </select>
                              </div>
                        <div class="row">
                          <div class="col-md-12 mt-10">
                            <label for="inputCostPerPrice" class="form-label">Color
                            </label>
                           <p>Red</p>
                          </div>
                          <div class="col-md-12 mt-10">
                            <label for="inputStarPoints" class="form-label">Total Cost
                            </label>
                            <p>20 THB/Peice</p>
                          </div>
                          <div class="col-md-12 mt-10">
                            <label for="inputStarPoints" class="form-label">Product Image
                            </label>
                           <p><img src="{{asset('img/')}}"></p>
                          </div>
                        </div> 
                      </div>
                    </div>
                    <div class="col-lg-7">
                      <div class="border border-3 p-4 rounded">
                        <div class="form-check form-switch">
                           <input class="form-check-input checktrigger" id="checktrigger_1" data-id="1" data-status="1" type="checkbox" checked="">
                           <label class="form-check-label" id="check_label_1" for="">THB</label>
                           <label class="form-check-label" id="check_label_1" for="">Original Currency</label>
			               </div>
                        <div class="row">
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">Manufacturer</label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">Agent</label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">Shipping</label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">Transport</label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">W/H Lessor</label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">Packaging & Advertise </label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                          <div class="col-md-6">	
                          <div class="mb-3">
										<label class="form-label">Labour</label>
										<select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
											<option value="United States" selected>United States</option>
											<option value="United Kingdom" selected>United Kingdom</option>
											<option value="Afghanistan" selected>Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
										</select>
									</div>
                          </div>
                        </div>
                        <div class="row">
                           <h6>Retail Price</h6>
                          <table class="table table-bordered">
                           <tr>
                              <td>
                                 <p>Dohome</p>
                                 <p>Price Ex. VAT: 1211</p>
                                 <p>Price inc. VAT: 121332</p>
                              </td>
                              <td>
                                 <p>Dohome</p>
                                 <p>Price Ex. VAT: 1211</p>
                                 <p>Price inc. VAT: 121332</p>
                              </td>
                              <td>
                                 <p>Dohome</p>
                                 <p>Price Ex. VAT: 1211</p>
                                 <p>Price inc. VAT: 121332</p>
                              </td>
                              <td>
                                 <p>Dohome</p>
                                 <p>Price Ex. VAT: 1211</p>
                                 <p>Price inc. VAT: 121332</p>
                              </td>
                           </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end row-->
                  <button class="btn sw-btn-prev" type="button">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.jsfile')
      </body>
    </html>
  <div style="display:none">
    <div class="kind_of_product_clone">
      <div class="row clonedata">
        <div class="md-3">
          <label for="inputPrice" class="form-label kind_of_product_label">
          </label>
          <select class="form-control kind_of_product">
            <option value="1">Basin
            </option>
            <option value="2">Bed
            </option>
            <option value="3">Cabinet
            </option>
            <option value="4">Chair
            </option>
            <option value="5">Fabric
            </option>
            <option value="6">Shelf
            </option>
            <option value="7">Statue
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="inputPrice" class="form-label kind_of_product_qty_label">
          </label>
          <input type="text" class="form-control kind_of_product_qty" value="1" id="inputStarPoints">
        </div>
      </div>
    </div>
  </div>
