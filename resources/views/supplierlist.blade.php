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
					<div class="breadcrumb-title pe-3">Supplier </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Supplier List</li>
							</ol>
						</nav>
					</div>		
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<select class="status form-control">
									<option value="">Select Status</option>
									<option value="1">Active</option>
									<option value="2">InActive</option>
								</select>
							</div>
						  <div class="ms-auto"><a href="{{asset('supplierregister')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Supplier</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0"  id="dataTable">
								<thead class="table-light">
									<tr>
										<th>Sr. No.</th> 
										<th>Supplier Name</th>
										<th>Detail</th>
										<th>Action</th>
										 
									</tr>
								</thead>
								<tbody>
									
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
				url: "{{url('supplier/updatestatusbyid')}}",
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

	var table = $('#dataTable').DataTable({
		processing: true,
		serverSide: true,
		//ajax: "{{url('supplierlistajax')}}",
		"ajax": {
			"url": "{{url('supplierlistajax')}}",
			"type": "GET",
			"datatype": "json",
			"data": function(d){
				d.status = $('.status').val();
			}
		},
		columns: [
			{ data: 'id'}, 
			{ data: 'supplier'},
			{ data: 'detail', orderable: false},
			{ data: 'action', orderable: false} 
			  
			
		],

	});
	
	$('body').on('change', '.status', function() {
		table.ajax.reload();
	});
});
		</script>
</body>

</html>