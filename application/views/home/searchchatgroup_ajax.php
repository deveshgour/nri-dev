 <?php 
				 
				 if(!empty($searchData)){
					 foreach($searchData as $group){
						$group_member =  $this->Common_model->getsingle("group_members",array("group_id" => $group->group_id));
				 ?>
                        <li class="border-0 mw-100 w-100 p-md-0" style="display: none;">
                                        <div class="alert alert-danger text-center">Sorry! We could not find any thread.
                                        </div>
                                    </li>
                                    <!-- if no user list will come -->
									
                                    <li class="list-inline">
                                        <a href="<?php echo base_url(); ?>chat/<?php echo base64_encode($group->group_id); ?>" <?php if($group->group_id == $group_id){ ?> style="background-color: rgba(255,151,51,0.3);" <?php } ?> class="profile d-flex justify-content-between">
                                            <div class="media align-items-center">
                                                <div class="profile__img rounded-circle position-relative">
                                                    <div class="w-100 h-100 rounded-circle overflow-hidden">
                                                       
														<?php if(!empty($group->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $group->image; ?>" class="img-fluid w-100" alt="img">
								<?php }else{ ?>
								      <img src="<?php echo base_url(); ?>images/user_image.png" class="img-fluid w-100" alt="user img">
								<?php } ?>
                                                    </div>

                                                </div>
                                                <div class="media-body">
                                                    <h6 class="text-truncate text-capitalize"><?php echo $group->title; ?></h6>
                                                    <p class="mb-0 text-truncate">Please take your medicines on time</p>
                                                    <div class="time font-sm">Apr 12, 2021 09:32 PM</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
				 <?php }}else{ ?>      
					 <li class="border-0 mw-100 w-100 p-md-0" style="display: none;">
                                        <div class="alert alert-danger text-center">Sorry! No group available
                                        </div>
                                    </li>
					 <?php } ?>
				 