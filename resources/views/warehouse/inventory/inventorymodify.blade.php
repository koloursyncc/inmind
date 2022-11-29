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
                   <p>Warehouse Name: {{ $warehousedetail->wh_name  }}</p>
                   <input type="hidden" name="wh_id" id="wh_id" value="{{ $warehousedetail->id }}">
                  </div>
                  <div class="col-sm-4">
                   <p>Warehouse Type:
                      @if($warehousedetail->wh_type == '1' ) 
                      Own Warehouse 
                      @elseif( $warehousedetail->wh_type == '2' ) 
                      Own Showroom 
                      @elseif( $warehousedetail->wh_type == '3' ) 
                      Wholeseller Store/ Warehouse 
                      @elseif( $warehousedetail->wh_type == '4' ) 
                      Retailer Resident	
                      @endif
                   </p>
                  </div>
                  <div class="col-sm-4">
                   <p>Customer Name: {{ App\CustomUdfs\Udfs::SingleColValue(
                    'customers',
                    'name',
                    'id',
                    $warehousedetail->customer_id
                  ) }}</p>
                  </div>
                  <div class="col-sm-12">
                   <p>Address: {{ $warehousedetail->address .', '.$warehousedetail->building.','.$warehousedetail->buildingsub_district.','.$warehousedetail->district.','.$warehousedetail->city.','.( App\CustomUdfs\Udfs::SingleColValue('states','name','id',$warehousedetail->state_id)).','.( App\CustomUdfs\Udfs::SingleColValue('countries','name','id',$warehousedetail->country_id)).','.$warehousedetail->zipcode }}

                   </p>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                       <table class="table table-responsive table-bordered">
                       <div class="col-sm-12">
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Product Name / Code</label>
                                <select class="form-select mb-3" name="product_code" id="product_code" >
                                    <option value="" selected>Choose Product</option>
                                    @foreach ($inventory as $item)
                                      <option value="{{ $item->product_code }}" >{{ $item->pdt_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">Change Status From</label>
                                <select class="form-select mb-3" name="from_status" id="from_status" >
                                    <option value="" selected>Choose Status</option>
                                    <option value="1">Ready to Sale</option>
                                    <option value="2">Repair </option>
                                    <option value="3">Wrecked</option>
                                    <option value="4">Lost</option>
                                </select>
                                <input type="text" id="selected_status_qty" name="selected_status_qty">
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">To Status</label>
                                <select class="form-select mb-3" name="to_status" id="to_status">
                                  <option value="" selected>Choose Status</option>
                                    <option value="1">Ready to Sale</option>
                                    <option value="2">Repair </option>
                                    <option value="3">Wrecked</option>
                                    <option value="4">Lost</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    <label for="inputFirstName" class="form-label">Quantity
                    </label>
                    <div class="input-group ">
                      <input type="text" class="form-control" placeholder="Quantity" 
                      aria-label="Quantity" aria-describedby="basic-addon2" id="qty" name="qty">
                      <div class="input-group-append">
                        <button class="btn btn-warning" type="button" id="btnChangeStatus">Change</button>
                      </div>
                    </div>
                  </div>
                       </table>
                    </div>

                    <div class="col-sm-8">
                         <label   label for="inputFirstName" class="form-label">Status</label>
                       <table class="table table-responsive table-bordered productindetail">
                            <thead>
                                <tr>
                                  <th>Product Code</th>
                                  <th>Total</th>
                                  <th>Ready to Sale</th>
                                  <th>Repair</th>
                                  <th>Wrecked</th>
                                  <th>Lost</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($inventory as $item)
                                <tr>
                                  <td>{{ $item->product_code }}</td>
                                  <td>{{ $item->total_qty }}</td>
                                  <td>{{ $item->ready_to_sale }}</td>
                                  <td>{{ $item->repair  }}</td>
                                  <td>{{ $item->wrecked  }}</td>
                                  <td>{{ $item->lost  }}</td>                                    
                                </tr>
                              @endforeach
                            </tbody>
                       </table>
                    </div>
                </div>
                <button type="button" id="btnsaveChanges" class="btn btn-primary mt-10">Save Changes</button>
                
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
      $(document).on('change','#from_status',function(){

        var product_code = $('#product_code').val();
        if(product_code ==''){
          alert('Please choose product');
          return;
        }
        var fromstatus = $('#from_status').val();
        if(fromstatus == ''){
          alert('Please choose From Status');
          return;
        }
        getQtyByStatus(fromstatus, product_code, $('#wh_id').val());
        
      });
      $(document).on('click', '#btnChangeStatus', function(e){

        var product_code = $('#product_code').val();
        if(product_code ==''){

          alert('Please choose product');
          return;
        }
        var fromstatus = $('#from_status').val();
        if(fromstatus == ''){

          alert('Please choose From Status');
          return;
        }
        var tostatus = $('#to_status').val();
        if(tostatus ==''){ 
          alert('Please choose To Status');
          return;
        }
        var qty_to_repalce = $('#qty').val();
        var from_qty = $('#selected_status_qty').val();
        if(from_qty >= qty_to_repalce){
         
          $(".productindetail tbody tr").each(function () {

              var row = $(this);              
              if( row.find('td').eq(0).html() == product_code )
              {
                
                 switch(fromstatus){
                  case '1' :
                    row.find('td').eq(2).html( from_qty - qty_to_repalce );
                    switch(tostatus){
                      case '1' :
                        row.find('td').eq(2).html( (parseInt(row.find('td').eq(2).html()) + parseInt(qty_to_repalce) ));
                        break;

                      case '2' :
                        row.find('td').eq(3).html( (parseInt(row.find('td').eq(3).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '3' :
                        row.find('td').eq(4).html( (parseInt(row.find('td').eq(4).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '4' :
                        row.find('td').eq(5).html( (parseInt(row.find('td').eq(5).html()) + parseInt(qty_to_repalce)) );
                        break;
                    }
                  break;
                  case '2' :
                  row.find('td').eq(3).html( from_qty - qty_to_repalce );
                    switch(tostatus){
                      case '1' :
                        row.find('td').eq(2).html( (parseInt(row.find('td').eq(2).html()) + parseInt(qty_to_repalce) ));
                        break;

                      case '2' :
                        row.find('td').eq(3).html( (parseInt(row.find('td').eq(3).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '3' :
                        row.find('td').eq(4).html( (parseInt(row.find('td').eq(4).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '4' :
                        row.find('td').eq(5).html( (parseInt(row.find('td').eq(5).html()) + parseInt(qty_to_repalce)) );
                        break;
                    }
                  break;
                  case '3' :
                  row.find('td').eq(4).html( from_qty - qty_to_repalce );
                    switch(tostatus){
                      case '1' :
                        row.find('td').eq(2).html( (parseInt(row.find('td').eq(2).html()) + parseInt(qty_to_repalce) ));
                        break;

                      case '2' :
                        row.find('td').eq(3).html( (parseInt(row.find('td').eq(3).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '3' :
                        row.find('td').eq(4).html( (parseInt(row.find('td').eq(4).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '4' :
                        row.find('td').eq(5).html( (parseInt(row.find('td').eq(5).html()) + parseInt(qty_to_repalce)) );
                        break;
                    }
                  break;
                  case '4' :
                  row.find('td').eq(5).html( from_qty - qty_to_repalce );
                    switch(tostatus){
                      case '1' :
                        row.find('td').eq(2).html( (parseInt(row.find('td').eq(2).html()) + parseInt(qty_to_repalce) ));
                        break;

                      case '2' :
                        row.find('td').eq(3).html( (parseInt(row.find('td').eq(3).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '3' :
                        row.find('td').eq(4).html( (parseInt(row.find('td').eq(4).html()) + parseInt(qty_to_repalce)) );
                        break;

                      case '4' :
                        row.find('td').eq(5).html( (parseInt(row.find('td').eq(5).html()) + parseInt(qty_to_repalce)) );
                        break;
                    }
                  break;
                 }
              }

          })        

        }else{
          
          alert('Quantities aren\'t enough to be change');

        }
        

      });
      function getQtyByStatus(status_code, product_code, wh_code){       
       
        $('#selected_status_qty').val(0);
        var data={
          '_token' : '{{ csrf_token() }}',
          'status_code' : status_code,
          'product_code' : product_code,
          'wh_code' : wh_code


        };
        $.ajax({
          type: "get",
          url: "{{ route('getStatusWisePdtQty') }}",
          data: data,
          dataType: "json",
          success: function (response) {


            if(status_code == '1')
            $('#selected_status_qty').val( response.ready_to_sale );
            if(status_code == '2')
            $('#selected_status_qty').val( response.repair );
            if(status_code == '3')
            $('#selected_status_qty').val( response.wrecked );
            if(status_code == '4')
            $('#selected_status_qty').val( response.lost );

            

          }
        });

      }
    </script>
    <script>
      $('#btnsaveChanges').click(function (e) { 
        e.preventDefault();
        var products = new Array();
        $(".productindetail tbody tr").each(function () {
            var item = {};
            var row = $(this);
            item.product_code = row.find("td").eq(0).html();
            item.ready_to_sale = row.find("td").eq(2).html();
            item.repair=row.find("td").eq(3).html();
            item.wrecked=row.find("td").eq(4).html();
            item.lost=row.find("td").eq(5).html();
            products.push( item );
        })
        var data = {

          '_token' : '{{ csrf_token() }}',
          'products' : products,
          'wh_id' : $('#wh_id').val(),
        }

        console.log(data);

        
      });
    </script>
  </body>
</html>
