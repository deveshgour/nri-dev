
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Post Detail</h1>
                       
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php if(!empty($post_detail->post)){
								echo $post_detail->post ; }?> <br/>
                                           <?php  if(!empty($post_detail->media_path) && $post_detail->media_type == 'image'){ ?>
											   	<img src="<?php echo base_url(); ?>upload/<?php echo $post_detail->media_path; ?>" width="50%" height="50%">
											<?php }
									?>
									 <?php  if(!empty($post_detail->media_path) && $post_detail->media_type == 'video'){ ?>
											    <video width="50%" controls>
                            <source src="<?php echo base_url(); ?>upload/<?php echo $post_detail->media_path; ?>" type="video/mp4">
                          </video>
											<?php }
									?>
									
								
                            </div>
                        </div>
                    </div>
                </main>
                