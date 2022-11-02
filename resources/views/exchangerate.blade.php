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
}
  </style>
  <body>
    <!----wrapper----->
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
          <!-----end breadcrumb-->
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
						   <div class="mb-3">
										<label class="form-label">Dealer Selection</label>
										<select class="multiple-select customer_id" data-placeholder="Choose anything" name="customer_id[]" multiple="multiple">
											<?php foreach($customer as $customerObj) { ?>
												<option value="{{ $customerObj->id }}">{{ $customerObj->name }}</option>
											<?php } ?>
										</select>
									</div>
                              </div>
                              <div class="col-md-12 mt-10">
                              <div class="mb-3">
										<label class="form-label">Product Selection</label>
										<select class="multiple-select product_id_option" data-placeholder="Choose anything" multiple="multiple">
											
										</select>
									</div>
                              </div>
                      </div>
                    </div>
                    <div class="col-lg-7">
                      <div class="border border-3 p-4 rounded">
						<div class="row">
							<div class="col-md-6">
								<div class="form-check form-switch">
									<input class="form-check-input checktrigger" id="checktrigger_1" data-id="1" data-status="1" type="checkbox" checked="">
									<label class="form-check-label" id="check_label_1" for="">THB</label>
									<label class="form-check-label" id="check_label_1" for="">Original Currency</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-check form-switch">
									<input class="form-check-input checktrigger" id="checktrigger_1" data-id="1" data-status="1" type="checkbox" checked="">
									<label class="form-check-label" id="check_label_1" for="">Price Shown are Incl VAT  </label>
									<label class="form-check-label" id="check_label_1" for="">Ex. VAT</label>
								</div>
							</div>
						</div>
                        <div class="row">
                          <div class="col-md-6 exchangerate d-none">
								
                          </div>
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

<script type="">
$(document).ready(function() {
	$('body').on('change', '.customer_id', function() {
		var val = new Array();
		$('.customer_id :selected').each(function(i, sel){ 
			val.push($(sel).val());
		});
		
		$.ajax({
			url: "{{url('getcustomerproduct')}}",
			dataType : "json",
			type: "get",
			data : {'value':val},
			success : function(response) {
				var list = $('.product_id_option');
				list.empty();
				$.each(response, function(index, item) {
					list.append(new Option(item.name, item.id, true));
				});
				
			},
		});
	});
	
	$('body').on('change', '.product_id_option', function() {
		var val = new Array();
		$('.product_id_option :selected').each(function(i, sel){ 
			val.push($(sel).val());
		});
		
		$.ajax({
			url: "{{url('getbyproductid')}}",
			dataType : "html",
			type: "get",
			data : {'value':val},
			success : function(html) {
				$('.exchangerate').removeClass('d-none');
				$('.exchangerate').html(html);
			},
		});
	});
});
</script>