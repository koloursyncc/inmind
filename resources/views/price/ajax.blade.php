<div class="border border-3 p-4 rounded">
                        <div class="form-check form-switch">
                           <input class="form-check-input checktrigger" id="checktrigger_1" data-id="1" data-status="1" type="checkbox" checked="">
                           <label class="form-check-label" id="check_label_1" <?php if(@$obj->type == 1) { echo 'checked'; } ?>>THB</label>
                           <label class="form-check-label" id="check_label_1" <?php if(@$obj->type == 2) { echo 'checked'; } ?>>Original Currency</label>
			               </div>
                        <div class="row supp_type">
							<div class="col-md-6" style="max-height:250px;overflow-y:scroll;padding:20px 0; border-bottom:1px solid #666;">	
								
									<label class="form-label">Manufacturer</label><br>
									<!--<select class="multiple-select1 multiple_select_1" name="multiple_select_1[]" data-placeholder="Choose anything" multiple="multiple">
										<option>Select</option>
										
									</select>-->
									
									<table class="table table-responsive table-bordered" >
										<thead> 
											<th></th>
											<th>Supplier name</th>
											<th>Price</th>
											<th>Currency</th>
										</thead>
										<tbody>
											<?php foreach($data['supp'] as $item) {
												foreach($item as $v) {
													if($v->supplier_type == 1) {
											?>
												<tr>
													<td>
														<div class="col-md-12">	
															<input data-type="<?php echo $v->supplier_type; ?>" data-price="<?php echo $v->unit_price; ?>" type="checkbox" class="form- multiple_select_1" value="<?php echo $v->id; ?>" name="multiple_select_1[]">
														</div>
													</td>
													<td><?php echo $v->supplier_name; ?></td>
													<td><?php echo $v->unit_price; ?></td>
													<td><?php $curr = DB::table('countries')->where('id', $v->currency_id)->first();
															if($curr) {
																echo $curr->currency;
															}
													?></td>
												</tr>
											<?php } } } ?>
										</tbody>
								   </table>
								
							</div>
							
                          <div class="col-md-6" style="max-height:250px;overflow-y:scroll;padding:20px 0;border-bottom:1px solid #666;">	
                          
								<label class="form-label">Agent</label><br>
								<!--<select class="multiple-select2 multiple_select_2" name="multiple_select_2[]" data-placeholder="Choose anything" multiple="multiple">
									<option>Select</option>
								</select>
								-->
								<table class="table table-responsive table-bordered">
										<thead> 
											<th></th>
											<th>Supplier name</th>
											<th>Price</th>
											<th>Currency</th>
										</thead>
										<tbody>
											<?php foreach($data['supp'] as $item) {
												foreach($item as $v) {
													if($v->supplier_type == 2) {
											?>
												<tr>
													<td>
														<div class="col-md-12">	
															<input data-type="<?php echo $v->supplier_type; ?>" data-price="<?php echo $v->unit_price; ?>" type="checkbox" class="form- multiple_select_2" value="<?php echo $v->id; ?>" name="multiple_select_2[]">
														</div>
													</td>
													<td><?php echo $v->supplier_name; ?></td>
													<td><?php echo $v->unit_price; ?></td>
													<td><?php $curr = DB::table('countries')->where('id', $v->currency_id)->first();
															if($curr) {
																echo $curr->currency;
															}
													?></td>
												</tr>
											<?php } } } ?>
										</tbody>
								   </table>
							
                          </div>
						  
                          <div class="col-md-6" style="max-height:250px;overflow-y:scroll;padding:20px 0;border-bottom:1px solid #666;">	
                          
										<label class="form-label">Shipping</label><br>
										<!--<select class="multiple-select3 multiple_select_3" name="multiple_select_3[]" data-placeholder="Choose anything" multiple="multiple">
											<option>Select</option>
										</select>-->
								<table class="table table-responsive table-bordered">
										<thead> 
											<th></th>
											<th>Supplier name</th>
											<th>Price</th>
											<th>Currency</th>
										</thead>
										<tbody>
											<?php foreach($data['supp'] as $item) {
												foreach($item as $v) {
													if($v->supplier_type == 3) {
											?>
												<tr>
													<td>
														<div class="col-md-12">	
															<input data-type="<?php echo $v->supplier_type; ?>" data-price="<?php echo $v->unit_price; ?>" type="checkbox" class="form- multiple_select_3" value="<?php echo $v->id; ?>" name="multiple_select_3[]">
														</div>
													</td>
													<td><?php echo $v->supplier_name; ?></td>
													<td><?php echo $v->unit_price; ?></td>
													<td><?php $curr = DB::table('countries')->where('id', $v->currency_id)->first();
															if($curr) {
																echo $curr->currency;
															}
													?></td>
												</tr>
											<?php } } } ?>
										</tbody>
								   </table>	
                          </div>
						  
                          <div class="col-md-6" style="max-height:250px;overflow-y:scroll;padding:20px 0;border-bottom:1px solid #666;">	
                          
								<label class="form-label">Transport</label><br>
								<!--
								<select class="multiple-select4 multiple_select_4"  name="multiple_select_4[]" data-placeholder="Choose anything" multiple="multiple">
									<option>Select</option>
								</select>-->
								<table class="table table-responsive table-bordered">
										<thead> 
											<th></th>
											<th>Supplier name</th>
											<th>Price</th>
											<th>Currency</th>
										</thead>
										<tbody>
											<?php foreach($data['supp'] as $item) {
												foreach($item as $v) {
													if($v->supplier_type == 4) {
											?>
												<tr>
													<td>
														<div class="col-md-12">	
															<input data-type="<?php echo $v->supplier_type; ?>" data-price="<?php echo $v->unit_price; ?>" type="checkbox" class="form- multiple_select_4" value="<?php echo $v->id; ?>" name="multiple_select_4[]">
														</div>
													</td>
													<td><?php echo $v->supplier_name; ?></td>
													<td><?php echo $v->unit_price; ?></td>
													<td><?php $curr = DB::table('countries')->where('id', $v->currency_id)->first();
															if($curr) {
																echo $curr->currency;
															}
													?></td>
												</tr>
											<?php } } } ?>
										</tbody>
								   </table>
                          </div>
						  
                          <div class="col-md-6" style="max-height:250px;overflow-y:scroll;padding:20px 0;border-bottom:1px solid #666;">	
                          
								<label class="form-label">W/H Lessor</label><br>
								<!--
								<select class="multiple-select5 multiple_select_5" name="multiple_select_5[]" data-placeholder="Choose anything" multiple="multiple">
									<option>Select</option>
								</select>-->
							<table class="table table-responsive table-bordered">
										<thead> 
											<th></th>
											<th>Supplier name</th>
											<th>Price</th>
											<th>Currency</th>
										</thead>
										<tbody>
											<?php foreach($data['supp'] as $item) {
												foreach($item as $v) {
													if($v->supplier_type == 5) {
											?>
												<tr>
													<td>
														<div class="col-md-12">	
															<input data-type="<?php echo $v->supplier_type; ?>" data-price="<?php echo $v->unit_price; ?>" type="checkbox" class="form- multiple_select_5" value="<?php echo $v->id; ?>" name="multiple_select_5[]">
														</div>
													</td>
													<td><?php echo $v->supplier_name; ?></td>
													<td><?php echo $v->unit_price; ?></td>
													<td><?php $curr = DB::table('countries')->where('id', $v->currency_id)->first();
															if($curr) {
																echo $curr->currency;
															}
													?></td>
												</tr>
											<?php } } } ?>
										</tbody>
								   </table>
                          </div>
						  
                          <div class="col-md-6" style="max-height:250px;overflow-y:scroll;padding:20px 0;border-bottom:1px solid #666;">	
                         
								<label class="form-label">Packaging & Advertise </label><br>
								<!--
								<select class="multiple-select6 multiple_select_6" name="multiple_select_6[]" data-placeholder="Choose anything" multiple="multiple">
									<option>Select</option>
								</select>-->
							<table class="table table-responsive table-bordered">
										<thead> 
											<th></th>
											<th>Supplier name</th>
											<th>Price</th>
											<th>Currency</th>
										</thead>
										<tbody>
											<?php foreach($data['supp'] as $item) {
												foreach($item as $v) {
													if($v->supplier_type == 5) {
											?>
												<tr>
													<td>
														<div class="col-md-12">	
															<input data-type="<?php echo $v->supplier_type; ?>" data-price="<?php echo $v->unit_price; ?>" type="checkbox" class="form- multiple_select_6" value="<?php echo $v->id; ?>" name="multiple_select_6[]">
														</div>
													</td>
													<td><?php echo $v->supplier_name; ?></td>
													<td><?php echo $v->unit_price; ?></td>
													<td><?php $curr = DB::table('countries')->where('id', $v->currency_id)->first();
															if($curr) {
																echo $curr->currency;
															}
													?></td>
												</tr>
											<?php } } } ?>
										</tbody>
								   </table>
                          </div>
						  
                        </div>
                        <div class="row">
                           <h6>Retail Price</h6>
                          <table class="table table-bordered">
                           <tr>
							<?php foreach($productCustomer as $productCustomerObj) { ?>
                              <td>
                                 <p><?php echo $productCustomerObj->name; ?></p>
                                 <p>Price Ex. VAT: <?php echo $productCustomerObj->price_thb_ex_vat; ?></p>
                                 <p>Price inc. VAT: <?php echo $productCustomerObj->price_thb_inc_vat; ?></p>
                              </td>
							<?php } ?>
                           </tr>
                          </table>
                        </div>
                      </div>
                    