
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add connect to root</h1>
                                  
									<?php if(!empty($message)){ 
                                ?>
                                <div class="text-center" style="color: green; font-size: 18px;">
                                    <?php echo $message; ?>
                                </div>
                                <?php
                            }elseif(!empty(validation_errors())){
                                ?>
                                <div class="text-center" style="color: red; font-size: 18px;">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php
                            }  
                        ?>
                                    <div class="card-body">
                                         <form id="adminlogin" action="" name="adminlogin" method="post" >
										 <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Connect to root</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="connect_root" placeholder="Connect to root" />
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Status</label>
                                               <select name="status" id="status" class="form-control">
											         <option value="" selected>Select</option>
											         <option value="1">Active</option>
													 <option value="2">Deactive</option>
											   </select>
                                            </div>
											</div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                             
                                                
												<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>