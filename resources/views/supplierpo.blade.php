<!doctype html>
<html lang="en">
   @include('layout.header')
   <style>
      .flexbox{
         display:flex;justify-content:center;align-items: end; 
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
            <div class="breadcrumb-title pe-3">PO</div>
            <div class="ps-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                     <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                     </li>
                     <li class="breadcrumb-item active" aria-current="page">Create PO</li>
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
                     <div id="smartwizard">
                        <ul class="nav">
                           <li class="nav-item">
                              <a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
                              <br>PO Details</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
                              <br>Contact Person</a>
                           </li>
                           <li class="nav-item"> 
                              <a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
                              <br>Bank Details </a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1"> 
                              <form class="row g-3">
								<div class="col-sm-4">
									<label for="formFile" class="form-label">P/O For Brand</label>
									<select class="form-select mb-3" aria-label="Default select example">
										<option selected>Select Brand </option>
										<option value="1">Meha</option>
										<option value="2">Inmind</option>
									</select> 
								</div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Supplier Name</label>
                                    <select class="form-select mb-3" aria-label="Default select example">
										<option selected>Select Brand </option>
										<option value="1">Meha</option>
										<option value="2">Inmind</option>
									</select> 
                                 </div>
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Supplier PO no.</label>
                                    <p>0001/2565</p>
                                 </div> 
								 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Address</label>
                                    <p>0001/2565</p>
                                 </div>
								 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Date</label>
									<input type="date" class="form-control" id="inputEmailAddress" placeholder="">
                                 </div>  
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Product Name</label>
                                    <select class="form-select mb-3" aria-label="Default select example" multiple>
										<option selected>Select Product </option>
										<option value="1">Meha</option>
										<option value="2">Inmind</option>
									</select> 
                                 </div>
								 <h6>Order Description </h6>  
                                 <div class="col-sm-4">
                                    <label for="inputFirstName" class="form-label">Product Name</label>
                                    <p>produc1</p>
                                 </div>  
								 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Product Code</label>
                                    <p>produc1</p>
                                 </div> 
                                 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Unit Price</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div>  
                                 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div>     
                                 <div class="col-sm-2">
                                    <label for="inputFirstName" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                                 </div> 
                                 
                                 <div class="col-sm-8"> </div> 
                                 <div class="col-sm-4">
                                    <table class="table table-responsive ">
                                       <tr>
                                          <td>Total Amount</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                       <tr>
                                          <td>Discount</td>
                                          <td>24000</td>
                                          <td>THB</td>
                                       </tr>
                                        
                                    </table>
                                 </div> 
                              </form>
                           </div>
						   
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end row-->
         </div>
      </div>
      <!--end page wrapper -->
      @include('layout.footer')
      <!-- Bootstrap JS -->
      @include('layout.jsfile')
      <script>
         $(document).ready(function() {
         
         var table = $('#dataTable').DataTable({
         				processing: true,
         				serverSide: true,
         				ajax: "{{url('productlistajax')}}",
         				columns: [
         					{ data: 'id', orderable: false},
         					{ data: 'main_img', orderable: false},
         					{ data: 'product_name', orderable: false},
         					{ data: 'product_code', orderable: false},
         					{ data: 'detail', orderable: false},
         					{ data: 'action', orderable: false},
         					{ data: 'supplier', orderable: false}
         					
         				],
         
         			});
         		});
         		
      </script>
   </body>
</html>