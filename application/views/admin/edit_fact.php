
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Fact</h1>
                                  
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
                                                <label class="small mb-1" for="inputEmailAddresstitle">Title</label>
                                                <input class="form-control py-4" id="inputEmailAddresstitle" type="text" name="title" value="<?php echo $fact_data->title; ?>" placeholder="Title" />
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="description">Description</label>
                                                <textarea name="description" id="description" class="form-control"><?php echo $fact_data->description; ?></textarea>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="image">Image</label>
												<input id="image" type="file" name="image"  />
												<?php if(!empty($fact_data->image)){ ?>
												    <img src="<?php echo base_url(); ?>upload/<?php echo $fact_data->image; ?>" width="100%">
												<?php }else{ ?>
												    <img src="<?php echo base_url(); ?>upload/<?php echo $fact_data->buzz_default; ?>">
												<?php } ?>
                                            </div>
											</div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="status">Status</label>
                                               <select name="status" id="status" class="form-control">
											         <option value="" selected>Select</option>
											         <option value="1" <?php if($fact_data->status == 1){ echo "selected"; } ?>>Active</option>
													 <option value="2" <?php if($fact_data->status == 2){ echo "selected"; } ?>>Deactive</option>
											   </select>
                                            </div>
											</div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                             
                                                
												<input type="submit" name="submit" id="submit" value="Update" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>