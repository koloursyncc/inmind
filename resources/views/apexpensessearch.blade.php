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
            <div class="breadcrumb-title pe-3">AP Expense Search
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
                  <li class="breadcrumb-item active" aria-current="page">AP Expense Search
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
<!--                       <div class="col-sm-3 offset-md-9">
                        <div class="mb-3">
                          <label class="form-label">Transaction Date
                          </label>
                          <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                        </div>
                      </div> -->
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">Bank payer
                          </label>
                           <select class="single-select brand_id" id="bank_payer" name="bank_payer" onchange="getreports()">
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
                          <!-- <p>A/C No. 058-301795-9/ Beneficiary Name: inmind Co. Ltd</p> -->
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Pay for Brand
                          </label>
                          <select class="single-select brand_id" id="pay_brand" name="pay_brand" onchange="getPayBrandreports()">
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
                         <select class="single-select brand_id" id="expense_category"  name="expense_category" onchange="getExpnseCategoryreports()">
                            <option value="">Select Expense Category</option>
                            @if($expense_data->count() > 0)
                                @foreach($expense_data as $po)
                              <option value="{{ $po->expense_category }}">{{ $po->expense_category }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                        </div>
                        <!-- <div class="mb-3">
                          <label class="form-label">Expenses Detail
                          </label>
                          <input class="form-control mb-3" value="" type="text" placeholder="" name="name" aria-label="default input example">
                        </div> -->
                        <div class="row">
                     
                        <!--   <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Date of Payment
                                </label>
                                <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                            </div>
                          </div> -->
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
                           <select class="single-select brand_id" id="to_payee" name="to_payee" onchange="getToPayeeReports()">
                            
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
                        <select class="single-select brand_id" id="supplier_type" name="supplier_type" onchange="getSuppTypereports()">
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
                                 <select class="single-select brand_id" id="name" name="name" onchange="getNamereports()">
                            
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
                        </div>
                        </div>
                      </div>
                      <!-- <input type="button" value="Save" class="btn btn-primary submit mt-10 col-md-2"> -->
                    </div>
                    <div class="row">
                      <div class="col-sm-12" style="margin-top:30px; padding:30px;">
                        <label for="inputFirstName" class="form-label">
                          <b>Result Found {{$expense->count()}} transactions
                          </b>
                        </label>
                        <p for="inputFirstName" class="form-label">Total Rest balance :{{$bal_amt}}
                        </p>
                        <table class="table table-responsive table-bordered">
                          <thead> 
                            <th>Payment Date</th>
                            <th>Payee name</th>
                            <th>Supplier Type</th>
                            <th>Expense category</th>
                            <th>Paid Amount</th>
                            <th>Expense detail</th> 
                            <!-- <th>Payment slip
                            </th>  -->
                          </thead>
                          <tbody>
                            
                             @if($expense->count() > 0)
                           @foreach ($expense as $expnsdata)
                                <tr>
                                <td>{{ $expnsdata->created_at }}</td>
                                <td>{{ $expnsdata->bank_payer }}</td>
                                <td>{{ $expnsdata->supplier_name }}</td>
                                <td>{{ $expnsdata->expense_category }}</td>
                                <td>{{ $expnsdata->amount }}</td>
                                <td>{{ $expnsdata->expense_description}}</td>
                                </tr>
                             @endForeach
                            @else
                            
                            <td colspan="6" >No Records Found</td>
                            
                              @endif   
                    
                          </tbody>
                        </table>
                      </div>
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
        <script type="text/javascript">
          function getreports()
          {
            var bn_pay = $("#bank_payer").val();
            window.location.href = "/apexpensessearch?bank_payer="+bn_pay;
          }
          function getToPayeeReports()
          {
            var to_payee = $("#to_payee").val();
            window.location.href = "/apexpensessearch?to_payee="+to_payee;
          }
           function getPayBrandreports()
          {
            var p_brand = $("#pay_brand").val();
            window.location.href = "/apexpensessearch?pay_brand="+p_brand;
          }
           function getExpnseCategoryreports()
          {
            var exp_cat = $("#expense_category").val();
            window.location.href = "/apexpensessearch?expense_category="+exp_cat;
          }
          function getSuppTypereports()
          {
            var sp_type = $("#supplier_type").val();
            window.location.href = "/apexpensessearch?supplier_type="+sp_type;
          }
          function getNamereports()
          {
            var name = $("#name").val();
            window.location.href = "/apexpensessearch?name="+name;
          }
        </script>
        </body>
      </html>
