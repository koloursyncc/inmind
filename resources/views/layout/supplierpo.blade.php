    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/input-tags/js/tagsinput.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
	<script src="{{asset('assets/js/index.js')}}"></script>
	<!-- <script src="{{asset('assets/plugins/drag-and-drop/dist/imageuploadify.min.js')}}"></script> -->
	<script>
		/* $(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
		$(document).ready(function () {
			$('#image-uploadify1').imageuploadify();
		})
		$(document).ready(function () {
			$('#image-uploadify2').imageuploadify();
		})
		$(document).ready(function () {
			$('#image-uploadify3').imageuploadify();
		}) */
	</script>
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
	<script src="{{asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js')}}"></script>
	<script>
		$(document).ready(function () {
			// Toolbar extra buttons
			var btnFinish = $('<button></button>').text('Finish').addClass('btn btn-info').on('click', function () {
				//alert('Finish Clicked');
				var url = $("meta[name=url]").attr("content");
				$('.err_msg').remove();
				$.ajax({
					url: $('#seller_po').attr('data-url'),
					dataType : "json",
					type: "post",
					data : $('#seller_po').serialize(),
					success : function(response) {
						
						if(response.status == 'success') {
							
							alert(response.msg);
							window.location.href = "{{url('supplierlist')}}";
							
						} else if(response.status == 'errors') {
							$.each(response.errors, function(key, msg) {
								$('.'+key).after('<span class="err_msg" style="color:red">'+msg+'</span>');
							});
						} else if(response.status == 'error') {
							
							alert(response.error);
							
						} else if(response.status == 'exceptionError') {
							
						}
					},
				});
			});
			var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click', function () {
				$('#smartwizard').smartWizard("reset");
			});
			// Step show event
			$("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
				$("#prev-btn").removeClass('disabled');
				$("#next-btn").removeClass('disabled');
				if (stepPosition === 'first') {
					$("#prev-btn").addClass('disabled');
				} else if (stepPosition === 'last') {
					$("#next-btn").addClass('disabled');
				} else {
					$("#prev-btn").removeClass('disabled');
					$("#next-btn").removeClass('disabled');
				}
			});
			// Smart Wizard
			$('#smartwizard').smartWizard({
				selected: 0,
				theme: 'dots',
				transition: {
					animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
				},
				toolbarSettings: {
					toolbarPosition: 'bottom', // both bottom
					toolbarExtraButtons: [btnFinish, btnCancel]
				}
			});
			// External Button Events
			$("#reset-btn").on("click", function () {
				// Reset wizard
				$('#smartwizard').smartWizard("reset");
				return true;
			});
			$("#prev-btn").on("click", function () {
				// Navigate previous
				$('#smartwizard').smartWizard("prev");
				return true;
			});
			$("#next-btn").on("click", function () {
				// Navigate next
				$('#smartwizard').smartWizard("next");
				return true;
			});
			// Demo Button Events
			$("#got_to_step").on("change", function () {
				// Go to step
				var step_index = $(this).val() - 1;
				$('#smartwizard').smartWizard("goToStep", step_index);
				return true;
			});
			$("#is_justified").on("click", function () {
				// Change Justify
				var options = {
					justified: $(this).prop("checked")
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#animation").on("change", function () {
				// Change theme
				var options = {
					transition: {
						animation: $(this).val()
					},
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#theme_selector").on("change", function () {
				// Change theme
				var options = {
					theme: $(this).val()
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
		});
	</script>																																																																																															
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>

	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>	