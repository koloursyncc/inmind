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
            <div class="breadcrumb-title pe-3">AP Received Search
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
                      <div class="col-sm-3 offset-md-9">
                        <div class="mb-3">
                          <label class="form-label">Transaction Date
                          </label>
                          <input type="date" class="form-control contact_dob" id="trans_date" name="trans_date" required>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">Bank payer
                          </label>
                          <select class="single-select brand_id" id="bank_payer" name="bank_payer" required>
                             <option value="">Select Bank Payer</option>
                            @if($data->count() > 0)
                                @foreach($data as $po)
                              <option value="{{ $po->bank_name }}">{{ $po->bank_name }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                         </select>
                        </div>



                        <div class="mb-3">
                          <label class="form-label">Pay for Brand
                          </label>
                          <select class="single-select brand_id" id="pay_brand" name="pay_brand" onchange="getbrandreports()" required>
                             <option value="">Select Pay for Brand</option>
                            @if($data->count() > 0)
                                @foreach($data as $po)
                              <option value="{{ $po->supplier_name }}">{{ $po->supplier_name }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Expense Category
                          </label>
                          <select class="single-select brand_id" id="" name="brand_id">
                            <option value="">Supplier Inter</option>
                            <option>Supplier TH</option>
                            <option>Office Expense</option>
                            <option>Rental</option>
                            <option>Loan</option>
                            <option>Credit Card</option>
                            <option>Transportation/ Fuel/ Courier</option>
                            <option>Travelling </option>
                            <option>Shipping</option>
                            <option>Tax / VAT Social Fund</option>
                            <option>R&D</option>
                            <option>Advertisemnet</option>
                            <option>Salary</option>
                            <option>Commision</option>
                            <option>Mobile/Internet</option>
                            <option>Electricity</option>
                            <option>Water</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Expenses Description
                          </label>
                          <select class="single-select brand_id" id="" name="brand_id" >
                            <option value="">Bankok Bank - Inmind
                            </option>
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Pay Amount (THB)
                                </label>
                                <input class="form-control mb-3" value="" type="number" placeholder="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="amount" maxlength="8" id="amount" aria-label="default input example" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Equal in foreign currency
                                </label>
                                <input class="form-control mb-3" value="" type="text" placeholder="" name="name" aria-label="default input example" required>
                            </div>
                          </div>
                          <div class="col-md-4" style="margin-top:50px;">
                              <div class="mb-3">
                              <select class="single-select brand_id" id="currency" name="currency" required>
                                <option value="">Select Currency</option>
                                @if($data->count() > 0)
                                    @foreach($data as $po)
                                  <option value="{{ $po->currency }}">{{ $po->currency }}
                                        </option>    
                                @endForeach
                                @else
                                 No Record Found
                                  @endif 
                                </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Transaction Slip
                                </label>
                                <input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="">
                            </div>
                        </div>
                            <div style="clear:both"></div>
                          <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Date of Payment
                                </label>
                                <input type="date" class="form-control contact_dob" id="payment_date" name="payment_date" required>
                            </div>
                          </div>
                          <!-- <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Time
                                </label>
                                <input class="form-control mb-3" value="" type="text" placeholder="" name="name" aria-label="default input example">
                            </div>
                          </div> -->
                        </div>

                      </div>
                      <div class="col-sm-5 offset-md-2">
                        <div class="mb-3">
                          <label class="form-label">To Payee
                          </label>
                          <select class="single-select brand_id" id="to_payee" name="to_payee" required>
                            
                            <option value="">Select To Payee</option>
                            @if($data->count() > 0)
                                @foreach($data as $po)
                              <option value="{{ $po->beneficiary_name }}">{{ $po->beneficiary_name }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif 
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Supplier Type
                          </label>
                          <select class="single-select brand_id" id="supplier_type" name="supplier_type" required>
                            <option value="">Select Supplier Type</option>
                            @if($supplier_type_data->count() > 0)
                                @foreach($supplier_type_data as $po)
                              <option value="{{ $po->supplier_type }}">{{ $po->supplier_type }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Contact person name
                                </label>
                                <select class="single-select brand_id" id="name" name="name" required>
                            
                            <option value="">Select Name</option>
                            @if($data->count() > 0)
                                @foreach($data as $po)
                              <option value="{{ $po->name }}">{{ $po->name }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif 
                          </select>

                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Family Name
                                </label>
                                <select class="single-select brand_id" id="family_name" name="family_name" required>
                            
                                <option value="">Select Family Name</option>
                                @if($data->count() > 0)
                                    @foreach($data as $po)
                                  <option value="{{ $po->family_name }}">{{ $po->family_name }}
                                        </option>    
                                @endForeach
                                @else
                                 No Record Found
                                  @endif 
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Mobile
                                </label>
                                 <select class="single-select brand_id" id="mobile" name="mobile" required>
                            
                                <option value="">Select Mobile</option>
                                @if($data->count() > 0)
                                    @foreach($data as $po)
                                  <option value="{{ $po->mobile }}">{{ $po->mobile }}
                                        </option>    
                                @endForeach
                                @else
                                 No Record Found
                                  @endif 
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Payee Invoice 
                                </label>
                                <input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="">
                            </div>
                        </div>
                        <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Payee Receipt
                                </label>
                                <input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="">
                            </div>
                        </div>
                        </div>
                        </div>
                      </div>
                      <input type="button" value="Save" class="btn btn-primary submit mt-10 col-md-2">
                    </div>
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
