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
					<div class="breadcrumb-title pe-3">Dealer </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dealer List</li>
							</ol>
						</nav>
					</div>		
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								
							</div>
						  <div class="ms-auto"><a href="{{asset('dealeradd')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Dealer</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0"  id="dataTable">
								<thead class="table-light">
									<tr>
										<th>Sr. No.</th> 
										<th>Dealer Name</th>
										<th>Conact  Person</th>
										<th>Details</th>
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
				url: "{{url('customer/updatestatusbyid')}}",
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
				ajax: "{{url('dealerlistajax')}}",
				columns: [
					{ data: 'id', orderable: false}, 
					{ data: 'product_name', orderable: true},
					{ data: 'product_code', orderable: false},
					{ data: 'detail', orderable: false},
					{ data: 'action', orderable: false} 
					  
					
				],

			});
		});
		</script>
</body>

</html>