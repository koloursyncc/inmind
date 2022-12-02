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
            <div class="breadcrumb-title pe-3">Ar Receiver
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
                  <li class="breadcrumb-item active" aria-current="page">Ar Receiver
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
                    <div class="row">
                      <div class="col-sm-7">
                        <div class="mb-3">
                          <label class="form-label">Invoice No.
                          </label>
                          <select class="single-select brand_id" id="" name="brand_id" >
                            <option value="">001/2565
                            </option>
                            <option value="">001/2566
                            </option>
                            <option value="">001/2567
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <p for="inputFirstName" class="form-label">Invoice Issue date : 29/12/2022
                        </p>
                        <p for="inputFirstName" class="form-label">Customer name : Inmind</p>
                        <table class="table table-responsive table-bordered">
                          <thead> 
                            
                            <th>P.O No.
                            </th>
                            <th>Inventory In Ticket No.
                            </th>
                            <th>Delivery Date 
                            </th>
                            <th>P.O Amount
                            </th>
                            <th>Delivered Amount 
                            </th> 
                            <th>Rest Balance
                            </th> 
                          </thead>
                          <tbody>
                            <tr>
                             
                              <td>001/2565
                              </td>
                              <td>DL 105/2565
                              </td>
                              <td>29 Oct 2022
                              </td>
                              <td>90,500
                              </td>
                              <td>90,500
                              </td>
                              <td>0
                              </td>
                            </tr>
                            <tr>
                             
                             <td>001/2565
                             </td>
                             <td>DL 105/2565
                             </td>
                             <td>29 Oct 2022
                             </td>
                             <td>90,500
                             </td>
                             <td>90,500
                             </td>
                             <td>0
                             </td>
                           </tr>
                           <tr>
                             
                             <td>001/2565
                             </td>
                             <td>DL 105/2565
                             </td>
                             <td>29 Oct 2022
                             </td>
                             <td>90,500
                             </td>
                             <td>90,500
                             </td>
                             <td>0
                             </td>
                           </tr>
                          </tbody>
                        </table>
                        <p style="float:right">Total Amount: 160,500 THB
                        </p>
                        <p>Amount in Words: One Hundered Sixty thosand, Five Hundered Thai Bahts Only
                        </p>
                      </div>
                      <div class="col-sm-4">
                        <div class="mb-3 mt-10 ">
                          <label for="inputProductDescription" class="form-label">Transaction Slip</label>
                          <input id="image-uploadify" type="file" name="images[]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="">
                        </div>
                      </div>
                      <div class="row g-3">
                      <div class="col-sm-4">
                        <label for="inputFirstName" class="form-label">Payment Bank Name
                        </label>
                        <select class="form-control payment_bank_name" name="payment_bank_name">
                          <option value="">Select
                          </option>
                          <option value="Bangkok Bank">Bangkok Bank </option>
                          <option value="Kasikom Bank">Kasikom Bank</option>
                          <option value="Krungsri Bank">Krungsri Bank </option>
                        </select>
                      </div>
                      <div class="col-sm-4">
                       <p>Branch : Rattanatibet Rd.</p>
                      </div>
                      <div class="col-sm-4">
                        <label for="inputFirstName" class="form-label">Transaction Date </label>
                        <input type="date" class="form-control contact_dob" name="contact_dob[-1]">
                      </div>
                      <div style="clear:both"></div>
                      <div class="col-sm-4">
                        <div class="payment_bank_none">
                          <div class="payment_bank_pc_1">	
                            <label for="inputFirstName" class="form-label">A/C Number
                            </label>
                            <select class="form-control payment_account_number" name="payment_account_number">
                              <option value="">Select
                              </option>
                              <option value="058-301795-9" >058-301795-9
                              </option>
                              <option value="058-057010-9" >058-057010-9
                              </option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                       <p>Beneficiary Name : inmind co. ltd</p>
                      </div>
                      <div class="col-sm-4">
                        <label for="inputFirstName" class="form-label">Transaction time </label>
                        <input class="result form-control" type="text" id="time" placeholder="Date Picker...">
                      </div>
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
		$(function () {
			$('#date-time').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD HH:mm'
			});
			$('#date').bootstrapMaterialDatePicker({
				time: false
			});
			$('#time').bootstrapMaterialDatePicker({
				date: false,
				format: 'HH:mm'
			});
		});
	</script>
        </body>
      </html>
