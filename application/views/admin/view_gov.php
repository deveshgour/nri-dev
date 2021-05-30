
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gov Detail</h1>
						<button onclick="goBack()" style="float:right"> Back</button>
                            
                                    <div class="card-body">
                                        
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddresstitle" style="font-weight: bold;">Title</label>
                                               <span class="new-control"><?php echo $view_gov->title; ?></span>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                               <span class="new-control"><?php echo $view_gov->url; ?></span>
                                                <label class="small mb-1" for="view_gov" style="font-weight: bold;">URL</label>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                               <span class="new-control"><?php echo $view_gov->description; ?></span>
                                                <label class="small mb-1" for="view_gov" style="font-weight: bold;">Description</label>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="image" style="font-weight: bold;">Image</label>
												<?php if(!empty($view_gov->image)){ ?>
												  <img src="<?php echo base_url(); ?>upload/<?php echo $view_gov->image; ?>" width="50%">
												<?php } ?>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="status" style="font-weight: bold;">Status</label>
                                               <span class="new-control"><?php if($view_gov->status == 1){ echo "Active"; }else{ echo "Deactive"; } ?></span>
                                            </div>
											</div>
                                            
                                           
                                       
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>