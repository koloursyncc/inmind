<!doctype html>
<html lang="en">
  @include('layout.header')
  <style>
    .flexbox{
      display:flex;
      justify-content:center;
      align-items: end;
    }
    #sig-canvas {
      border: 2px dotted #CCCCCC;
      border-radius: 15px;
      cursor: crosshair;
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
            <div class="breadcrumb-title pe-3">Delivery Receiving
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
                  <li class="breadcrumb-item active" aria-current="page">Delivery Receiving
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
                   <p>Recieved Date: 04/11/2022</p>
                  </div>
                  <div class="col-sm-4">
                   <p>Inventory IN Ticket No.: DL 105/2565</p>
                  </div>
                </div>
                <label for="formFile" class="form-label">Order Type
                </label>
                <div style="clear:both"> </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Internal Goods Delivery
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">By </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Inventory Out  Ticket ID 
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"   name="type_of_customer"  type="radio" value="1">
                            <label class="form-check-label" for="inlineRadio1">Customer PO
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                           <label class="form-check-label" for="inlineRadio1">Customer Name: Dohome</label>
                             
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">No.</label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Customer PO No.
                                </option>
                                <option value="1">0001/2565 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">From W/H </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Warehouse
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">To W/H </label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">Select Warehouse
                                </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Product Name / Code</label>
                            <select class="form-select mb-3" name="brand_id" aria-label="Default select example" >
                                <option value="">C133-546 </option>
                                <option value="1">Meha </option>
                                <option value="2" >Inmind</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-bottom:20px">
                        <label for="inputFirstName" class="form-label">Quantity</label>
                        <input  type="text" class="form-control" id="delivery_address" name="delivery_address" value="">
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                        <label for="inputFirstName" class="form-label">Big Basket for Delivery on : 28 Oct 2022</label>
                       <table class="table table-responsive table-bordered">
                            <thead> 
                                <th></th>
                                <th>P.O / Ticket</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Total</th>
                                <th>From W/H</th>
                                <th>To</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="col-md-12">	
                                            <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                        </div>
                                    </td>
                                    <td>0001/2565</td>
                                    <td>Siri cabinet</td>
                                    
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>2</td>
                                    <td>0</td>
                                </tr>
                                <tr>

                                    <td>
                                        <div class="col-md-12">	
                                            <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                        </div>
                                    </td>
                                    <td>0001/2565</td>
                                    <td>Siri cabinet</td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>2</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-md-12">	
                                            <input type="checkbox" class="form- store_checked" value="1" checked="" name="store_checked[-2]">
                                        </div>
                                    </td>
                                    <td>0001/2565</td>
                                    <td>Siri cabinet</td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    <td>2</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                       </table>
                    </div>
                    <div class="col-sm-6">
                         <label for="inputFirstName" class="form-label">Delivery to: W/H 34</label>
                       <table class="table table-responsive table-bordered">
                            <thead> 
                                
                                <th>Product name</th>
                                <th>Product Image</th>
                                <th>Product Code</th>
                                <th>Total</th>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                   
                                </tr>
                                <tr>
                                   
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                   
                                </tr>
                                <tr>
                                   
                                    <td>Siri cabinet</td>
                                    <td><img src=""></td>
                                    <td>C133-546</td>
                                    <td>50</td>
                                    
                                </tr>
                            </tbody>
                       </table>
                    </div>

                    
                </div>
                <div class="row g-3">
                  <div class="col-sm-4">
                    <label for="inputLastName" class="form-label">Deliver Person
                    </label>
                    <input  type="text" class="form-control" id="delivery_building" name="delivery_building" value="<?php echo @$obj->delivery_building; ?>">
                  </div>
                  <div class="col-sm-4">
                    <label for="inputEmailAddress" class="form-label">Telephone
                    </label>
                    <input  type="text" class="form-control" id="delivery_sub_district" name="delivery_sub_district" value="<?php echo @$obj->delivery_sub_district; ?>">
                  </div>
                    <div class="col-4">
                        <label for="inputEmailAddress" class="form-label"> Delivery Date Expected</label>
                        <input type="date" class="form-control store_contact_birth_date" id="">
                    </div>
                  <div class="col-sm-4">
                    <label for="inputEmailAddress" class="form-label">Reamark by Order </label>
                    <textarea  type="text" class="form-control" id="delivery_road" name="delivery_road" value="<?php echo @$obj->delivery_road; ?>"></textarea>
                  </div>
                  
                </div>


                <div class="container">
                <div class="row">
                  <div class="col-md-12" style="margin-top:20px;">
                    <h4>Receiver Signature</h4>
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <canvas id="sig-canvas" width="620" height="160">
                      Get a better browser, bro.
                    </canvas>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <!---<button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>--->
                    <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                  </div>
                </div>
                <br>
                <!---<div class="row">
                  <div class="col-md-12">
                    <textarea id="sig-dataUrl" class="form-control" rows="5" style="width: 1222px; height: 15px;">Data URL for your signature will go here!</textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <img id="sig-image" src="" alt="Your signature will go here!">
                  </div>
                </div>---->
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
    <script id="rendered-js">
    (function () {
    window.requestAnimFrame = function (callback) {
    return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    window.msRequestAnimaitonFrame ||
    function (callback) {
      window.setTimeout(callback, 1000 / 60);
    };
  }();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0 };

  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function (e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function (e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function (e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function (e) {

  }, false);

  canvas.addEventListener("touchmove", function (e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY });

    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY });

    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function (e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top };

  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top };

  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sig-dataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function (e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function (e) {
    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    sigImage.setAttribute("src", dataUrl);
  }, false);

})();
//# sourceURL=pen.js
    </script>
  </body>
</html>
