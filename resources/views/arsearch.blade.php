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
                          <select class="single-select brand_id" id="invoice_id" name="invoice_id" onchange="getreports()">
                           <option value="">Select Invoice No.</option>
                            @if($items->count() > 0)
                                @foreach($items as $po)
                                    <option value="{{ $po->po_id }}">{{ $po->po_invoice_id }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="mb-3">
                          <label class="form-label">P.O No.
                          </label>
                          <select class="single-select brand_id" id="po_no_id" name="po_no_id" onchange="getporeports()">
                            <option value="">Select P.O. No.</option>
                            @if($items->count() > 0)
                                @foreach($items as $po)
                                    <option value="{{ $po->po_id }}">{{ $po->po_invoice_id }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                        </div>
                      </div>
                     <!--  <div class="col-md-3" style="margin-top:20px;">
                        <div class="input-group-append mt-10" >
                          <button class="btn btn-danger" type="button" id="btnreceived">Find
                          </button>
                        </div>
                      </div> -->
                      <div style="clear:both">
                      </div>
                      <div style="clear:both">
                      </div>
                      <div class="col-sm-4" style="margin-top:20px">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label" for="inlineRadio1">Customer Name
                          </label>
                         <select class="form-select mb-3" name="cust_name" aria-label="Default select example" >
                            <option value="">Select Customer Name</option>
                            @if($cust->count() > 0)
                                @foreach($cust as $c)
                                    <option value="{{ $c->name }}">{{ $c->name }}
                                    </option>    
                            @endForeach
                            @else
                             No Record Found
                              @endif   
                          </select>
                        </div>
                      </div>
                      <div style="clear:both">
                      </div>
                      <div style="clear:both">
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label" for="inlineRadio1">From Date 
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
                          <b>Result Found {{$product->count()}} transactions
                          </b>
                        </label>
                        <p for="inputFirstName" class="form-label">Total Rest balance :{{$bal_amt}}
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
                            
                          @if($product->count() > 0)
                           
                           @foreach ($product as $user)
                                <tr>
                                <td>{{ $user->invoice_id }}</td>
                                <td>{{ $user->po_id }}</td>
                                <td>{{ $user->total_amount }}</td>
                                <td>{{ $user->pay_this_time }}</td>
                                <td>{{ $user->total_amount - $user->pay_this_time  }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->status }}</td>
                                </tr>
                             @endForeach
                             
                            @else
                            
                            <td colspan="8" >No Records Found</td>
                            
                              @endif   
                          </tbody>
                        </table>
                      </div>
                    </div>
                   <!--  <input type="button" value="Save" class="btn btn-primary submit mt-10"> -->
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
      <script>
    $(function () {
      $('#date-time').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm'
      });
      $('#date').bootstrapMaterialDatePicker({
        time: false
      });
      $('#time').bootstrapMaterialDatePicker({
        date: false,
        format: 'HH:mm'
      });
    });
    function getreports(){
      var inv_id = $("#invoice_id").val();
      window.location.href = "/arsearch?po_id="+inv_id;
    }
    function getporeports(){
      var pv_id = $("#po_no_id").val();
      window.location.href = "/arsearch?po_id="+pv_id;
    }
    </script>
    <script>
    
      $(document).ready(function(){
          $(".brand_id").change(function () {
            var inv_id= $("#invoice_id").val();
            var name= $("#cust_name").val();
           
            $.ajax({
                method:"get",
                url: "{{ ('/arsearch') }}",
                 data: {
                            id:inv_id,
                            name:name}, 
                success:function (data) {
                     $('#name').val(data);
                },
                error:function () {

                }
            })

        });
 });
</script>
        </body>
      </html>

