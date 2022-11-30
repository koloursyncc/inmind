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
            <div class="breadcrumb-title pe-3">Inventory Out
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
                  <li class="breadcrumb-item active" aria-current="page">Inventory Out
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
                  
                   <label class="form-check-label" for="">Inventory Out  Date:</label>
                   <input type="date" class="form-control" 
                   id="out_date" name="out_date" value="{{ date('Y-m-d') }}">
                  </div>
                  <div class="col-sm-4">
                   {{-- <p>Inventory out Ticket ID: MVI 200/2565</p> --}}
                    <div class="form-check form-check-inline">
                      <label class="form-check-label" for="">Inventory out Ticket ID:# </label>
                      <input type="text" class="form-control" id="inventory_out_tickect_id" name="inventory_out_tickect_id" value="">
                  </div>
                  </div>
                </div>
                <label for="formFile" class="form-label">Order Type
                </label>
                <div style="clear:both"> </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Internal Moving
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">By </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Inventory Out  Ticket ID 
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Customer PO
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="form-check-label" for="inlineRadio1">Customer Name: Dohome</label>
                             
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">No.</label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Customer PO No.
                                </option>
                                <option value="1">0001/2565 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">To W/H </label>
                            <select class="form-select mb-3" name="wharehouse_select" id="wharehouse_select" >
                                <option value="">Select Warehouse
                                </option>                                
                                @foreach ($warehouse as $item)
                                <option value="{{ $item->id }}">{{ $item->wh_name }}</option>                                                            
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Product Name / Code</label>
                        <input type="text" class="form-control" name="product_code"
                         id="product_code">
                    </div>
                    </div>
                    <div class="col-sm-3">
                      <label for="inputFirstName" class="form-label">Quantity</label>
                      <div class="input-group ">
                          <input type="text" class="form-control" placeholder="Quantity" 
                          aria-label="Quantity" aria-describedby="basic-addon2" id="qty" name="qty">
                          <div class="input-group-append">
                            <button class="btn btn-danger" type="button" id="btnadd">Add</button>
                          </div>
                        </div>
                    </div>

                    {{-- <div class="col-sm-4">
                        <label class="form-check-label" for="inlineRadio1">Product Status Choose :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Ready to Sale
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Repair
                            </label>
                        </div>
                    </div> --}}
                </div>
                <div class="row mt-5">
                <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">All Products Available In : <span class="wh_deatil"></span></label>
                       <table class="table table-responsive table-bordered allwarehouseProduct" id="allwarehouseProduct">
                            <thead> 
                                <th></th>
                                <th>Product name</th>                                
                                <th>Product Image</th>
                                <th>Product Code</th>
                                <th>Total</th>
                                <th>Ready to Sale</th>
                                <th>Repair</th>
                            </thead>
                            <tbody>
                               
                            </tbody>
                       </table>
                    </div>
                    <div class="col-sm-6">
                         <label for="inputFirstName" class="form-label">Delivery Basket</label>
                       <table class="table table-responsive table-bordered tbl_deliverybasket" id="tbl_deliverybasket">
                            <thead> 
                                
                                <th>Product name</th>
                                <th>Product Image</th>
                                <th>Product Code</th>
                                <th>Total</th>
                                <th>From</th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                       </table>
                    </div>                    
                </div>
                <div class="row g-3 mt-5">
                  <div class="col-sm-4">
                    <label for="inputLastName" class="form-label">Deliver Person
                    </label>
                    <select name="delivery_preson" id="delivery_preson" class="form-select">
                      <option value="" selected>Choose Deliver Person </option>
                      @foreach ($suppliers as $item)
                          <option value="{{ $item->id  }}">{{ $item->supplier_name  }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label for="inputEmailAddress" class="form-label">Telephone
                    </label>
                    <input  type="text" class="form-control" id="delivery_preson_contactno"
                     name="delivery_preson_contactno" >
                  </div>
                    <div class="col-4">
                        <label for="delivery_date" class="form-label"> Delivery Date Expected</label>
                        <input type="date" class="form-control " id="delivery_date" name="delivery_date">
                    </div>
                  <div class="col-sm-12">
                    <label for="remarks" class="form-label">Reamrk </label>
                    <textarea  type="text" class="form-control" id="remarks" name="remarks" ></textarea>
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
    <script>
    
      $('#wharehouse_select').change(function (e) { 
        $('#allwarehouseProduct tbody').empty();
        $('#tbl_deliverybasket tbody').empty();
        e.preventDefault();
        if($('#wharehouse_select').val() == ""){
          $('.wh_deatil').html("");
          return;
        }
        
        var wh_id = $('#wharehouse_select').val();
        var wh_name = $('#wharehouse_select option:selected').text();
        $('.wh_deatil').html("#"+wh_id+' / '+ wh_name);
        var data = {

          '_token' : '{{ csrf_token() }}',
          'wh_id' : wh_id

        }
        //console.log(data);
        $.ajax({
          type: "get",
          url: "{{ route('GetAllWarehouseProducts') }}",
          data: data,
          dataType: "json",
          success: function (response) {

            var txtjson = JSON.stringify( response.wh_products);
            var coll = JSON.parse(txtjson);
            //console.log(coll);
            var content = '';
            $.each(coll, function (index, item) { 
              content = `
                <tr>
                  <td>
                      <div class="col-md-12">	
                          <input type="checkbox" class="product_checked"  name="product_checked[]">
                      </div>
                  </td>
                  <td>`+item.pdt_name+`</td>
                  <td></td>
                  <td>`+item.product_code+`</td>
                  <td>`+item.total_qty+`</td>
                  <td>`+item.ready_to_sale+`</td>
                  <td>`+item.repair+`</td>
              </tr>
              `;
              $('#allwarehouseProduct tbody').append(content);
            });
            
            
          }
        });

        
      });
    </script>
    <script>
        var curr_activerow = null;
       $(document).on('click','#allwarehouseProduct tbody tr', function(){
       
            curr_activerow=null;
            var row = $(this);
            
            var is_checked = row.find('input.product_checked').is(":checked");
            if(is_checked){
             
                curr_activerow = row;
                var code = row.find("td").eq(3).html();               
                $('#product_code').val(code);                
            }
        })

        $('#btnadd').click(function (e) { 
          e.preventDefault();
          if($('#qty').val()=="" ||
                $('#product_code').val()==""){

                    alert('Product Code Or Qty. can not be empty!');
                    return;

            }
            if(curr_activerow!==null){
                var content = `
                    <tr>
                        <td>`+curr_activerow.find("td").eq(1).html()+`</td>                       
                        
                        <td>
                            <img src="">
                        </td>
                        <td>`+curr_activerow.find("td").eq(3).html()+`</td>                        
                        <td>`+$('#qty').val()+`</td>
                        <td>`+($('#wharehouse_select option:selected').text())+`</td>                        
                    </tr>
                `;
                $('.tbl_deliverybasket tbody').append(content);
                $('#qty').val("");
                $('#product_code').val("");
                curr_activerow=null;
            }
          
        });
    </script>
    <script>
      $('#delivery_preson').change(function (e) { 
        e.preventDefault();
        $('#delivery_preson_contactno').val("");
        if( $('#delivery_preson').val()=="" ){
        return;
        }

        var data={

          '_token' : '{{ csrf_token() }}',
          'transporter_id' : $('#delivery_preson').val()

        };
        $.ajax({
          type: "get",
          url: "{{ route('AjaxGetTransporterById') }}",
          data: data,
          dataType: "json",
          success: function (response) {
            $('#delivery_preson_contactno').val(response.tran_mobile);            
          }
        });


        
      });
    </script>
  </body>
</html>
