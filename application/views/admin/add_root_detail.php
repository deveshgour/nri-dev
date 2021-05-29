
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add Root Detail</h1>
                                  
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
                                         <form id="rootdetail" action="" name="rootdetail" method="post" enctype="multipart/form-data">
										 <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="root_id">Root</label>
                                                <select name="root_id" id="root_id" class="form-control">
											         <option value="" selected>Select</option>
													 <?php 
													 if(!empty($root_detail)){
                                                            foreach($root_detail as $detail){
														 ?>
											         <option value="<?php echo $detail->root_id; ?>"><?php echo $detail->connect_root; ?></option>
													 <?php }} ?>
											   </select>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddresstitle">Title</label>
                                                <input class="form-control py-4" id="inputEmailAddresstitle" type="text" name="title" placeholder="Title" />
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="root_detail">Main text</label>
                                                <textarea name="root_detail" id="root_detail" class="form-control"></textarea>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="image">Image</label>
												<input id="media_path" type="file" name="media_path"  />
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="status">Status</label>
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