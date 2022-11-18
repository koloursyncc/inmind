<!doctype html>
<html lang="en"> @include('layout.header') <style>
        .flexbox {
            display: flex;
            justify-content: center;
            align-items: end;
        }
    </style>
    <body>
        <!--wrapper-->
        <div class="wrapper">
            <!--start header --> @include('layout.menu')
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Inventory In </div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Inventory In </li>
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
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="">Receiving Date:</label>
                                                    <input type="date" class="form-control" id="receiving_date" name="receiving_date" value="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="">Inventory In Ticket ID: </label>
                                                    <input type="text" class="form-control" id="inventory_in_tickect-id" name="inventory_in_tickect" value="{{ $max_ticket_no }}">
                                                </div>
                                            </div>
                                        </div>
                                        <label for="formFile" class="form-label">Order Type </label>
                                        <div style="clear:both"></div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="is_inernal_moving"
                                                     name="is_inernal_moving" type="radio" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Internal Moving </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio1">By </label>
                                                    <select class="form-select mb-3" name="brand_id" aria-label="Default select example">
                                                        <option value="">Select Inventory Out Ticket ID </option>
                                                        <option value="1">Meha </option>
                                                        <option value="2">Inmind</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="type_of_customer" type="radio" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Supplier PO </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio1">Supplier Name: <span class="supplier_name"></span></label>
                                                    <input type="hidden" id="supplier_id" name="supplier_id">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio1">No.</label>
                                                    <select class="form-select mb-3" name="supplier_po_no" id="supplier_po_no" aria-label="Default select example">
                                                        <option value="">Select Supplier PO No. </option>
                                                        @foreach($supplierpo as $row)
                                                        <option value="{{ $row->code }}">{{ $row->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineRadio1">To W/H </label>
                                                    <select class="form-select mb-3" name="to_warehouse" aria-label="Default select example">
                                                        <option value="">Select Warehouse </option>
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
                                                      <button class="btn btn-danger" type="button" id="btnreceived">Received</button>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label label for="inputFirstName" class="form-label">Delivery Basket</label>
                                                <table class="table table-responsive table-bordered tbl_deliverybasket_tbl">
                                                    <thead>
                                                        <th></th>
                                                        <th>Product name</th>
                                                        <th>Product Image</th>
                                                        <th>Product Code</th>
                                                        <th>Total</th>
                                                        <th>From</th>
                                                    </thead>
                                                    <tbody class="deliverybasket_row">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <label label for="inputFirstName" class="form-label">All Product Available in W/H</label>
                                                <table class="table table-responsive table-bordered tbl_all_products_wh">
                                                    <thead>
                                                        <th>Product name</th>
                                                        <th>Product Code</th>
                                                        <th>Product Image</th>
                                                        <th>Total</th>
                                                        <th>Ready to Sale</th>
                                                        <th>Repair</th>
                                                    </thead>
                                                    <tbody class="tbl_body_all_products_wh">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-sm-4">
                                                <label for="inputFirstName" class="form-label">Delivery Ticket No. </label>
                                                <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="inputLastName" class="form-label">Deliver Person </label>
                                                <input type="text" class="form-control" id="delivery_building" name="delivery_building" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="inputEmailAddress" class="form-label">Telephone </label>
                                                <input type="text" class="form-control" id="delivery_sub_district" name="delivery_sub_district" value="">
                                            </div>
                                            <div class="col-4">
                                                <label for="inputEmailAddress" class="form-label"> Delivery Date Expected</label>
                                                <input type="date" class="form-control store_contact_birth_date" id="">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="inputEmailAddress" class="form-label">Reamrk </label>
                                                <textarea type="text" class="form-control"></textarea>
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
                <!--end page wrapper --> @include('layout.footer')
                <!-- Bootstrap JS --> @include('layout.pofile')
                <script>
                    $curr_activerow =null;
                    $(document).on('change','#supplier_po_no',function(){
                        if($('#supplier_po_no').val()=="")
                        {
                            $('.supplier_name').html("");
                            return
                        }
                    
                        var data={
                            '_token' : '{{ csrf_token() }}',
                            'pocode' : $('#supplier_po_no').val(),
                            
                        }
                        $.ajax({

                            type: "get",
                            url: "{{ url('/get-supplier-by-po-code') }}",
                            data: data,
                            dataType: "json",
                            success: function (response) {
                               
                                $('.supplier_name').html(response.Supplier_name);
                                $('#supplier_id').val(response.supplier_id)
                                $('.tbl_deliverybasket_tbl tbody').empty();
                                var tblrow ='';

                                var txtjson = JSON.stringify(response.supplier_po_pdt);
                                var coll = JSON.parse(txtjson);
                                $.each(coll, function (index, itemval) { 

                                    tblrow =`<tr><td>
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form- product_checked" name="product_checked[]">
                                        </div>
                                    </td>
                                    <td>`+itemval.product_name+`</td>
                                    <td>
                                        <img src="">
                                    </td>
                                    <td>`+itemval.product_code+`</td>
                                    <td>`+itemval.qty+`</td>
                                    <td>`+response.Supplier_name+`</td></tr>`;

                                    $('.tbl_deliverybasket_tbl tbody').append(tblrow);
                                     
                                });
                                
                            }

                        });//ajaxend                        

                    })//changeend


                    $(document).on('click','.tbl_deliverybasket_tbl tbody tr',function(){
                        curr_activerow=null;
                        var row = $(this);
                      
                        var is_checked = row.find('input.product_checked').is(":checked");
                        if(is_checked){

                            curr_activerow = row;
                            var code=row.find("td").eq(3).html();
                            //console.log(code);
                            $('#product_code').val(code);
                            //$('#qty).val();
                        }
                    })

                    $(document).on('click','#btnreceived',function(){
                        if($('#qty').val()=="" ||
                            $('#product_code').val()==""){

                             alert('Product Code Or Qty. can not be empty!');
                             return;

                        }
                        
                        if(curr_activerow!==null){
                            var content = `
                                <tr>
                                    <td>`+curr_activerow.find("td").eq(1).html()+`</td>
                                    
                                    <td>`+curr_activerow.find("td").eq(3).html()+`</td>
                                    <td>
                                        <img src="">
                                    </td>
                                    <td>`+curr_activerow.find("td").eq(4).html()+`</td>
                                    <td>`+$('#qty').val()+`</td>
                                    <td>0</td>
                                </tr>
                            `;
                            $('.tbl_all_products_wh tbody').append(content);
                            $('#qty').val("");
                            $('#product_code').val("");
                            curr_activerow=null;
                        }
                       
                    })
                </script>
            <script>

                function store(){

                    var data ={

                        '_token' : '{{ csrf_token() }}',

                    }




                }
            </script>
    </body>
</html>