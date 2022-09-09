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
         <div class="breadcrumb-title pe-3">Staff</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Registration</li>
               </ol>
            </nav>
         </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
         <div class="col-xl-8 mx-auto">
            <div class="card">
               <div class="card-body">
                  <!-- SmartWizard html --> 
                  <div id="smartwizard">
                     <ul class="nav">
                        <li class="nav-item">
                           <a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
                           <br>Staff Personal Detail</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
                           <br>Address Detail</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
                           <br>Social ID</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#step-4">	<strong>Step 4</strong> 
                           <br>Contract Details</a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                           <h6>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Activated Staff</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"  > 
                              </div>
                           </h6>
                           <label for="formFile" class="form-label">Staff ID</label>
                           <input class="form-control mb-3" type="text" value="1234" disabled aria-label="default input example">
                           <label for="formFile" class="form-label">Title</label>  <br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Mr.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">Ms.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                              <label class="form-check-label" for="inlineRadio2">Other</label>
                           </div>
                           <form class="row g-3">
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Name(Thai)</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Name(English)</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Family Name(Thai)</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Family Name(English)</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Nick Name</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Current Job Position</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Mobile no.</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Current Salary/ Wages</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <div class="mb-3">
                                    <label class="form-label">Date of Birth:</label>
                                    <input type="date" class="form-control">
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">ID Card</label>
                                 </div>
                                 <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Passport</label>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label">  ID Card no.</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Issue   Date</label>
                                    <input type="date" class="form-control">
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label"> Issue by</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputEmailAddress" class="form-label"> Passport No. </label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-4">
                                 <div class="mb-3">
                                    <label class="form-label">Expire   Date</label>
                                    <input type="date" class="form-control">
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>
                              <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Staff Photo & ID Card  </label>
                                 <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                              </div>
                              <label for="formFile" class="form-label">Highest Education</label>
                              <select class="form-select mb-3" aria-label="Default select example">
                                 <option selected>Select Option</option>
                                 <option value="1">P6</option>
                                 <option value="2">M3</option>
                                 <option value="3">M6</option>
                                 <option value="3">Under graduate</option>
                                 <option value="3">Graduate</option>
                              </select>
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">School / Univercity Name</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <div class="mb-3">
                                    <label class="form-label">Educational Year</label>
                                    <input type="date" class="form-control">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Faculty / School of</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Department</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                           </form>
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                           <h6>Home address as registered document</h6>
                           <form class="row g-3">
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12 mb-3">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>
                           </form>
                           <h6>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> 
                              </div>
                           </h6>
                           <form class="row g-3">
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>
                              <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Home Registration </label>
                                 <input id="image-uploadify1" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                              </div>
                           </form>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                           <form class="row g-3">
                              <label for="inputFirstName" class="form-label">Social Fund</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio7" value="option1" checked>
                                    <label class="form-check-label" for="inlineRadio7">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio7" value="option1" >
                                    <label class="form-check-label" for="inlineRadio7">No</label>
                                 </div>
                              </div>
                              <label for="inputFirstName" class="form-label">Social Fund included in salary</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="inlineRadio9" value="option1" checked>
                                    <label class="form-check-label" for="inlineRadio9">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="inlineRadio9" value="option1">
                                    <label class="form-check-label" for="inlineRadio9">No</label>
                                 </div>
                              </div>
                              <div style="clear:both"></div>
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Social Fund ID</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Hospital in charges</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputSelectCountry" class="form-label">Pay Social fund by </label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">na</option>
                                    <option value="1">na</option>
                                    <option value="2">na</option>
                                    <option value="3">na</option>
                                 </select>
                              </div>
                              <div class="col-sm-6">
                                 <div class="mb-3">
                                    <label class="form-label">Will apply in </label>
                                    <input type="date" class="form-control">
                                 </div>
                               </div>
							  <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Social fund ID Card  </label>
                                 <input id="image-uploadify2" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                              </div>	 
                           </form> 
                        </div>
						<div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                           <form class="row g-3">
						   <div class="col-sm-10 flux">
                                <h6> Labour Contract</h6>
                              </div>
                              <div class=" col-sm-2 flux-right">
							    <button type="button" class="btn btn-sm btn-primary px-2 radius-30">Add more</button>
                              </div>
                              <label for="inputFirstName" class="form-label">Working pay as</label>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio7" value="option1" checked>
                                    <label class="form-check-label" for="inlineRadio7">Salary</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio7" value="option1" >
                                    <label class="form-check-label" for="inlineRadio7">Wages</label>
                                 </div>
                              </div>  
                              <div style="clear:both"></div>
							  <div class="col-sm-12">
                                 <label for="inputSelectCountry" class="form-label">Type of labour contract1</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">Contract Limited time pay by wage</option>
                                    <option value="1">Contract Limited time 120 days</option>
                                    <option value="2">Contract Limited time not over 2 years</option>
                                    <option value="3">Permanant</option>
                                 </select>
                              </div>
							  <div class="col-sm-6">
                                 <div class="mb-3">
                                    <label class="form-label">Effective Period Start date</label>
                                    <input type="date" class="form-control">
                                 </div>
                               </div>
							   <div class="col-sm-6">
                                 <div class="mb-3">
                                    <label class="form-label">Effective Period End date</label>
                                    <input type="date" class="form-control">
                                 </div>
                               </div>
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Position</label>
								 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">Manager</option>
                                    <option value="1">Supervisor</option>
                                    <option value="2">Officer</option>
                                    <option value="3">Manufacturing Staff</option>
									<option value="3">Warehouse </option>
									<option value="3">Driver</option>
									<option value="3">Foreign Labour </option>
									<option value="3">Sale Manager</option>
									<option value="3">Sale Staff</option>
									<option value="3">Sale Supervisor </option>
                                 </select>
                              </div> 
                              <div class="col-sm-6">
                                 <label for="inputSelectCountry" class="form-label">Department </label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">Manager</option>
                                    <option value="1">Supervisor</option>
                                    <option value="2">Officer</option>
                                    <option value="3">Manufacturing Staff</option>
									<option value="3">Warehouse </option>
									<option value="3">Driver</option>
									<option value="3">Foreign Labour </option>
									<option value="3">Sale Manager</option>
									<option value="3">Sale Staff</option>
									<option value="3">Sale Supervisor </option>
                                 </select>
                              </div>
							  <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Salary Wages in contract (THB)</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-6">
                                 <label for="inputSelectCountry" class="form-label">Increase salary be considered when </label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">no declar</option>
                                    <option value="1">Probation passed</option>
                                    <option value="2">Company evaluate annually</option> 
                                 </select>
                              </div>
							  <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Salary Promised (THB)</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div style="clear:both"></div>
							  <h5>Benefit</h5>
							  <div class="col-sm-4">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Hotel (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Allowance (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-4">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Travel Expense (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-4">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> O T (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Food (THB / Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <h6>Leaves</h6>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Sick Leave (Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Vocation Leave (Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <div class="col-sm-3">
							  <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked"> Maternity Leave (Day)</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked=""> 
                              </div>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
							  <h6>Gaurantor</h6>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio7" value="option1" checked>
                                    <label class="form-check-label" for="inlineRadio7">Yes</label>
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio7" value="option1" >
                                    <label class="form-check-label" for="inlineRadio7">No</label>
                                 </div>
                              </div> 
							   <label for="formFile" class="form-label">Title</label>  <br>
                           <div class="form-check form-check-inline col-sm-2">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Mr.</label>
                           </div>
                           <div class="form-check form-check-inline col-sm-2">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">Ms.</label>
                           </div>
                           <div class="form-check form-check-inline col-sm-2">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                              <label class="form-check-label" for="inlineRadio2">Other</label>
                           </div>
                           <form class="row g-3">
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Name(Thai)</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Name(English)</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Family Name(Thai)</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Family Name(English)</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
							  <h6>Home address as registered document</h6> 
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12 mb-3">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div> 
                           <h6>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexCheckChecked">Conact address same as Home address</label>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> 
                              </div>
                           </h6>
                          
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>  
							  <div class="col-sm-12">
                                 <label for="inputFirstName" class="form-label">Guarantor's office name</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputFirstName" class="form-label">Address no.</label>
                                 <input type="text" class="form-control" id="inputFirstName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputLastName" class="form-label">Building / Village</label>
                                 <input type="text" class="form-control" id="inputLastName" placeholder=" ">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Sub District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  District</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Road</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  City</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">State</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Zip Code</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-12 mb-3">
                                 <label for="inputSelectCountry" class="form-label">Country</label>
                                 <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                    <option selected="">India</option>
                                    <option value="1">United Kingdom</option>
                                    <option value="2">America</option>
                                    <option value="3">Dubai</option>
                                 </select>
                              </div>
							  <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">  Guarantor Salary(THB)</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
                              <div class="col-sm-6">
                                 <label for="inputEmailAddress" class="form-label">Guarantor Amount(THB)</label>
                                 <input type="text" class="form-control" id="inputEmailAddress" placeholder="">
                              </div>
							  <div class="mb-3 mt-10 col-md-12 " >
                                 <label for="inputProductDescription" class="form-label">Upload Contract no.1 signed and Guarantor no.1 signed</label>
                                 <input id="image-uploadify3" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                              </div>	 
                           </form> 
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