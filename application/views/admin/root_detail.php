
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Root Detail</h1>
						<button onclick="goBack()" style="float:right"> Back</button>
                            
                                    <div class="card-body">
                                        
										 <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="root_id" style="font-weight: bold;">Root</label>
                                             <span class="new-control"><?php echo $connect_root->connect_root; ?></span>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddresstitle" style="font-weight: bold;">Title</label>
                                               <span class="new-control"><?php echo $root_detail->title; ?></span>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="root_detail" style="font-weight: bold;">Main text</label>
                                               <span class="new-control"><?php echo $root_detail->root_detail; ?></span>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="image" style="font-weight: bold;">Image</label>
												<?php if(!empty($root_detail->media_path)){ ?>
												  <img src="<?php echo base_url(); ?>upload/<?php echo $root_detail->media_path; ?>" width="50%">
												<?php } ?>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="status" style="font-weight: bold;">Status</label>
                                               <span class="new-control"><?php if($root_detail->status == 1){ echo "Active"; }else{ echo "Deactive"; } ?></span>
                                            </div>
											</div>
                                            
                                           
                                       
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>