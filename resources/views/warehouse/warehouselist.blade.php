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
					<div class="breadcrumb-title pe-3">Warehouse</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Warehouse  Search</li>
							</ol>
						</nav>
					</div>		
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30 d-none" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search d-none"></i></span>
							</div>
						  <div class="ms-auto"><a href="{{asset('warehousecreate')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Warehouse</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0"  id="dataTable">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Warehouse Name</th>
										<th>Type Of W/H</th>
										<th>Contact Person</th>
										<th>Phone No.</th>
                                        <th>Ladda Cabinet</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($warehouse as $item)
										
									
									<td>{{ $item->id }}</td>
									<td>{{ $item->wh_name }}</td>
									<td>
										@if($item->wh_type==1) Own Warehouse  @endif
										@if($item->wh_type==2) Own Showroom @endif
										@if($item->wh_type==3) Wholeseller Store/ Warehouse @endif
										@if($item->wh_type==4) Retailer Resident @endif

									</td>
									<td>{{ $item->contact_person }}</td>
									<td>{{ $item->tel_number }}</td>
									<td>

									</td>
									<td>
										<a href="{{ route('InventoryDetail',['wh_id' => $item->id ]) }}" class="btn btn-sm btn-success radius-30 mt-2 mt-lg-0"><i class="bx bxs-cylinder"></i> Inventory Detail</a>
									</td>
									<td>
										<a href="{{ route('modifyInventory',['wh_id' => $item->id ]) }}" class="btn btn-sm btn-warning radius-30 mt-2 mt-lg-0"><i class="bx bxs-pencil"></i> Modify Inventory</a>
									</td>
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
	$('#dataTable').DataTable();
	
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

	// var table = $('#dataTable').DataTable({
	// 	processing: true,
	// 	serverSide: true,
	// 	ajax: "{{url('warehouselistajax')}}",
	// 	columns: [
	// 		{ data: 'id', orderable: false},
	// 		{ data: 'main_img', orderable: false},
	// 		{ data: 'product_name', orderable: true},
	// 		{ data: 'product_name', orderable: true},
	// 		{ data: 'product_code', orderable: true},
	// 		{ data: 'detail', orderable: false},
	// 		{ data: 'action', orderable: false}
			
	// 	],

	// });
});
</script>
</body>

</html>