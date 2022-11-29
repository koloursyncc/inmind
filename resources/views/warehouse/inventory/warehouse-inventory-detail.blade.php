<!doctype html>
<html lang="en">

@include('layout.header')

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
					<div class="breadcrumb-title pe-3">Inventory</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Inventory Detail</li>
							</ol>
						</nav>
					</div>		
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="row g-3">
							<div class="col-sm-4">
								<label for="formFile" class="form-label">Warehouse Name </label>
								<input class="form-control mb-3 supplier_name" name="supplier_name" 
								type="text" placeholder="Enter Warehouse name" 
								aria-label="default input example" value="{{ $warehousedetail->wh_name  }}" disabled >
							</div>
							<div class="col-sm-4">
								<label for="formFile" class="form-label">Warehouse Type </label>
								<input class="form-control mb-3 supplier_name" 
								name="supplier_name" type="text" placeholder="Enter Warehouse name" 
								aria-label="default input example" 
								value="@if($warehousedetail->wh_type == '1' ) Own Warehouse @elseif( $warehousedetail->wh_type == '2' ) Own Showroom @elseif( $warehousedetail->wh_type == '3' ) Wholeseller Store/ Warehouse @elseif( $warehousedetail->wh_type == '4' ) Retailer Resident	@endif " disabled>
							</div>
							<div class="col-sm-4">
								<label for="formFile" class="form-label">Customer  Name </label>
								<input class="form-control mb-3 supplier_name" name="supplier_name" type="text"
								 placeholder="Enter Warehouse name" aria-label="default input example"
								  value="{{ App\CustomUdfs\Udfs::SingleColValue(
									'customers',
									'name',
									'id',
									$warehousedetail->customer_id
								) }}" disabled>
							</div>
							<div class="col-sm-12">
								<label for="formFile" class="form-label">Address</label>
								<textarea class="form-control mb-3 supplier_name"
								 name="supplier_name" type="text"
								  placeholder="Enter Warehouse name" 
								  aria-label="default input example" 
								  disabled>{{ $warehousedetail->address .','.$warehousedetail->building.','.$warehousedetail->buildingsub_district.','.$warehousedetail->district.','.$warehousedetail->city.','.( App\CustomUdfs\Udfs::SingleColValue('states','name','id',$warehousedetail->state_id)).','.( App\CustomUdfs\Udfs::SingleColValue('countries','name','id',$warehousedetail->country_id)).','.$warehousedetail->zipcode }}</textarea>
							</div>
						</div>

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30 d-none" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search d-none"></i></span>
							</div>
						 
						</div>
						<div class="table-responsive">
							<table class="table mb-0"  id="dataTable">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Product Name</th>
										<th>Brand</th>
										<th>Product Code</th>
										<th>Total</th>
                                        <th>Ready To Sale</th>
                                        <th>Repair</th>
                                        <th>Wrecked</th>
                                        <th>Lost</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($inventory as $item)								
									
									<tr>
										<td>{{ $loop->iteration  }}</td>
										<td>{{ $item->pdt_name  }}</td>
										<td>{{ $item->pdt_brand }}</td>
										<td>{{ $item->product_code  }}</td>
										<td>{{ $item->total_qty  }}</td>
										<td>{{ $item->ready_to_sale  }}</td>
										<td>{{ $item->repair  }}</td>
										<td>{{ $item->wrecked  }}</td>
										<td>{{ $item->lost  }}</td>
										<td></td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		@include('layout.footer')
	<!-- Bootstrap JS -->
	@include('layout.jsfile')




<script>
$(document).ready(function() {
	
	$('body').on('change', '.checktrigger', function() {
		var id = $(this).attr('data-id');
		var status = $(this).attr('data-status');
		//if (confirm('Are you sure you want remove this image?')) {
			$.ajax({
				url: "{{url('product/updatestatusbyid')}}",
				dataType : "json",
				type: "post",
				data : {'id': id, 'status': status, "_token": "{{ csrf_token() }}"},
				success : function(response) {
					if(response.status == 'success') {
						$('#checktrigger_'+response.id).attr('data-status', response.statusval);
						$('#check_label_'+response.id).html(response.statustext);
					}
				},
			});
		//} 
		//return false;
	});


		</script>
</body>

</html>