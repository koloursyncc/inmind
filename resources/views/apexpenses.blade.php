<!doctype html>
<html lang="en">
  @include('layout.header')
  <style>
    .flexbox{
      display:flex;
      justify-content:center;
      align-items: end;
    }
    .is-invalid {
        border-color: red;
      }
  </style>

  <body>
    <?php
    $form = 'expensesave';
    $url = url('save/expense');

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
                 <!--  <form action="/create" method="POST" id="po-form" data-url="" enctype="multipart/form-data"> -->
                   <form id="{{ $form }}" class="fromid {{ $form }}">
                    @csrf
                    <input type = "hidden" id="csrf_token" name = "_token" value = "<?php echo csrf_token(); ?>">
                      <div class="col-sm-3 offset-md-9">
                        <div class="mb-3">
                          <label class="form-label">Transaction Date
                          </label>
                          <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
                        </div>
                        <span class="text-danger hide" id="transaction_date_err"></span>
                      </div>
                    
                      
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">Bank payer
                          </label>
                          <select class="single-select" name="bank_payer" required>
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
                         <span class="text-danger hide" id="bank_payer_err"></span>
                        </div>
                       


                        <div class="mb-3">
                          <label class="form-label">Pay for Brand
                          </label>
                          <select class="single-select" id="pay_brand" name="pay_brand" required>
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
                          <span class="text-danger hide" id="pay_brand_err"></span>
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label">Expense Category
                          </label>
                          <select class="single-select" id="expense_category" onchange="getCategoryData()" name="expense_category_id">
                            <option value="">Select Expense Category</option>
                            @if($expense_data->count() > 0)
                                @foreach($expense_data as $po)
                              <option value="{{ $po->id }}">{{ $po->expense_category }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                           <span class="text-danger hide" id="expense_category_id_err"></span>
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label">Expenses Description
                          </label>
                          <textarea type="text" class="form-control" name="expense_description" id="expense_desc" value="{{ $expense_desc}}" disabled>{{ $expense_desc}}</textarea>
                          <!-- <select class="single-select brand_id" id="" name="brand_id" >
                            <option value="">Bankok Bank - Inmind
                            </option>
                          </select> -->
                           <span class="text-danger hide" id="expense_description_err"></span>
                        </div>
                       
                        <div class="row">
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Pay Amount (THB)
                                </label>
                                <input class="form-control mb-3" value="" type="number" placeholder="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="amount" maxlength="8" id="amount" aria-label="default input example" required>
                            </div>
                            <span class="text-danger hide" id="amount_err"></span>
                          </div>
                          
                          <!-- <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Equal in foreign currency
                                </label>
                                <input class="form-control mb-3" value="" type="text" placeholder="" name="name" aria-label="default input example" required>
                            </div>
                          </div> -->
                          <div class="col-md-4" style="margin-top:50px;">
                              <div class="mb-3">
                              <select class="single-select" id="currency" name="currency" required>
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
                            <span class="text-danger hide" id="currency_err"></span>
                          </div>
                          
                        </div>

                        <div class="row">
                        <!-- <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Transaction Slip
                                </label>
                                <input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="">
                            </div>
                        </div> -->
                            <div style="clear:both"></div>
                         <!--  <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Date of Payment
                                </label>
                                <input type="date" class="form-control contact_dob" id="payment_date" name="payment_date" required>
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
                          <select class="single-select" id="to_payee" name="to_payee" required>
                            
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
                        <span class="text-danger hide" id="to_payee_err"></span>
                         
                        <div class="mb-3">
                          <label class="form-label">Supplier Type
                          </label>
                          <select class="single-select" id="supplier_type" name="supplier_type" required>
                            <option value="">Select Supplier Type</option>
                            @if($supplier_type_data->count() > 0)
                                @foreach($supplier_type_data as $po)
                              <option value="{{ $po->id }}">{{ $po->supplier_type }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                          <span class="text-danger hide" id="supplier_type_err"></span>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Contact person name
                                </label>
                                <select class="single-select" id="name" name="name" required>
                            
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
                           <span class="text-danger hide" id="name_err"></span>
                          </div>
                         
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Family Name
                                </label>
                                <select class="single-select" id="family_name" name="family_name" required>
                            
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
                           <span class="text-danger hide" id="family_name_err"></span>
                          </div>
                          
                          <div class="col-md-4">
                              <div class="mb-3">
                                <label class="form-label">Mobile
                                </label>
                                 <select class="single-select {{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile" name="mobile" required>
                            
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
                          <span class="text-danger hide" id="mobile_err"></span>
                          </div>
                          

                          <!-- <div class="col-md-6">
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
                        </div> -->
                        </div>
                        </div>
                      </div>

                      <!-- <input type="button" value="Save" class="btn btn-primary submit mt-10 col-md-2"> -->
                      <button type="button" class="btn btn-primary submit mt-10 col-md-2 saveexpense">
                      Save
                     </button>
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
          function getCategoryData()
          {
            var category = $("#expense_category").val();
            var obj = {"category_id":category};
            /*console.log(obj);*/
            $.ajax({
              url: "{{url('get/categoryData')}}",
              dataType : "json",              
              type: "post",
              data: JSON.stringify(obj),
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),"Content-Type":"application/json"},
              success : function(response) {
               /* console.log(response);*/
                var code = response.code;
                if (code == 200) {
                  $("#expense_desc").val(response.data.expense_description);
                } else {
                  $("#expense_desc").val("");
                }

                /*expense_desc*/
              },
            });
          }
          
        $('body').on('click', '.saveexpense', function() {
        $(this).attr('disabled', 'disabled');
        $(this).html('Loading...');
        
        $('.err_msg').remove();
        var params = new FormData($("#expensesave")[0]);
        var supplier = $("#supplier_type option:selected").text();
        var expense_cat = $("#expense_category option:selected").text();

        params.append('expense_description', $("#expense_desc").val());
        params.append('supplier_name', supplier);
        params.append('expense_category', expense_cat);
        $.ajax({
          url: "{{url('save/expense')}}",
          dataType : "json",
          type: "post",
          data : params,
          processData: false,
          contentType: false,
          cache: false,
          success : function(response) {
            if (response.code == 404) {
              if (typeof response.message == "object") {
                var obj = response.message;
                Object.keys(obj).forEach(key => {
                    $("#"+key+"_err").html(obj[key]);
                    $("#"+key+"_err").removeClass("hide");
                });
              }
            }
           // console.log(response);
            $('.saveexpense').removeAttr('disabled');
          /*  $('.saveexpense').html('Create Expense');*/
        
            if(response.status == 'success') {
              
              alert(response.msg);
              window.location.href = "{{url('apexpensessearch')}}";
              
            } else if(response.status == 'errors') {
              $.each(response.errors, function(key, msg) {
                $('.'+key).after('<span class="err_msg" style="color:red">'+msg+'</span>');
              });
            } else if(response.status == 'error') {
              
              alert(response.error);
              
            } else if(response.status == 'single_error') {
              $('.err_msg').remove();
              $(response.target).after('<span class="err_msg" style="color:red">'+response.msg+'</span>');
              
            } else if(response.status == 'exceptionError') {
              
            }
          },
        });
      });
        </script>
        </body>
      </html>
