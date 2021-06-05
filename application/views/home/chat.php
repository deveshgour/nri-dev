
    <main class="main-content">
   
        <div class="messagePage">
            <section>
                <div class="container">
                    <div class="messagePage__row d-md-flex">
                        <div class="messagePage__left bg-white">
                            <div class="messagePage__leftHead">
                                <div class="messagePage__search position-relative">
                                    <form>
                                        <input type="text" class="form-control border-0" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>" name="search_group" id="searchchat_group" placeholder="Search by name">
                                        <button class="btn position-absolute bg-transparent">

                                            <i class="icon-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
							
                            <div class="messagePage__leftBody">

                                <ul class="userList list-inline mb-0">
                                    <!-- if no user list will come -->
                                    <li class="border-0 mw-100 w-100 p-md-0" style="display: none;">
                                        <div class="alert alert-danger text-center">Sorry! We could not find any thread.
                                        </div>
                                    </li>
                                    <!-- if no user list will come -->
									<?php 
									$group_id = base64_decode($this->uri->segment('2'));
				$groupShow = $this->Common_model->getAll("create_group","group_id","desc");
				
				//echo $this->db->last_query();die;
				 if(!empty($groupShow)){
					 foreach($groupShow as $group){
						$group_member =  $this->Common_model->getAllwhereorder("group_members",array("group_id" => $group->group_id),"group_id","desc");						
						if($group->user_id == $this->session->userdata("userId")["user_id"]){ 
						$lastgroupchat = $this->Common_model->getAllwhereorder("group_chat",array("group_id" => $group->group_id),'chat_id','desc');
						$grouptime = $this->Common_model->getsingle("create_group",array("group_id"=>$group->group_id));
				 ?>
				 
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
                                                    <p class="mb-0 text-truncate"><?php echo $lastgroupchat[0]->msg; ?></p>
                                                    <div class="time font-sm"><?php if(!empty($lastgroupchat)){ echo convert_time($lastgroupchat[0]->create_date,'F j, Y, g:i a'); }else{ echo convert_time($grouptime->create_date,'F j, Y, g:i a'); } ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
				<?php }else
						if(!empty($group_member)){
							foreach($group_member as $group_m){
								if($group_m->members == $this->session->userdata("userId")["user_id"]){ 
								$lastgroupchat = $this->Common_model->getAllwhereorder("group_chat",array("group_id" => $group->group_id),'chat_id','desc');
						?>   
					<!-- <li class="border-0 mw-100 w-100 p-md-0" style="display: none;">
                                        <div class="alert alert-danger text-center">Sorry! No group available
                                        </div>
                                    </li> -->
									
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
                                                    <p class="mb-0 text-truncate"><?php echo $lastgroupchat[0]->msg; ?></p>
                                                    <div class="time font-sm"><?php if(!empty($lastgroupchat)){ echo convert_time($lastgroupchat[0]->create_date,'F j, Y, g:i a'); }else{ echo convert_time($grouptime->create_date,'F j, Y, g:i a'); } ?></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
					<?php }} ?>
				 <?php }} }?>
									
                                </ul>
                            </div>
                        </div>
						<?php $group_box = $this->Common_model->getsingle("create_group",array("group_id" => $group_id));
$userName = $this->Common_model->getsingle("users",array("user_id" => $group_box->user_id));
						?>
                        <div class="messagePage__right bg-white">
                            <div class="messagePage__head d-sm-flex justify-content-between">
                                <div class="media profile">
                                    <div class="profile__img rounded-circle overflow-hidden">
                                        
										<?php if(!empty($group_box->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $group_box->image; ?>" class="img-fluid w-100" alt="user img">
								<?php }else{ ?>
								      <img src="<?php echo base_url(); ?>images/user_image.png" class="img-fluid w-100" alt="user img">
								<?php } ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-capitalize"><?php echo $group_box->title; ?></h6>
										<?php $group_members = $this->Common_model->getAllwhereorder("group_members",array("group_id" => $group_box->group_id),'member_id','asc'); 
										$memcount = '';
										if(!empty($group_members)){
										foreach($group_members as $mem){
											$memname = $this->Common_model->getsingle("users",array("user_id" => $mem->members));
											$memcount .= $memname->firstname.',';
										}
										?>
                                        <p class="mb-0 font-sm"><?php echo rtrim($memcount,','); ?></p>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="chatbox">
                                <div class="msg-wrap test<?php echo $group_id ?>">
								<div id="scrolldiv<?php echo $group_id ?>">
								<?php
								$groupchatdetail = $this->Common_model->getAllwhereorder("group_chat",array("group_id" => $group_id),"chat_id","asc"); 
								if(!empty($groupchatdetail)){
									$j = 1;
								foreach($groupchatdetail as $chatdetail){
									$chatuserImg = $this->Common_model->getsingle("users",array("user_id"=>$chatdetail->user_id));
									if($chatdetail->user_id == $this->session->userdata("userId")['user_id']){
								?>
								
                                    <div class="send-msg">
									
                                        <div class="msg-body position-relative">
                                            <div class="chat_box">
                                                <div class="msg">
                                                    <span class="d-inline-block bgGray"><?php echo $chatdetail->msg; ?></span>
                                                </div>
                                            </div>
                                            <div class="img_wrap position-absolute overflow-hidden rounded-circle">
											<?php if(!empty($chatuserImg->user_image)){ ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $chatuserImg->user_image; ?>" class="rounded-circle" alt="user img">
											<?php }else{ ?>
											    <img src="<?php echo base_url(); ?>images/user_image.png" class="rounded-circle" alt="user img">
											<?php } ?>
                                            </div>
                                        </div>
                                    </div>
								
									<?php }else{ ?>
                                    <div class="rcv-msg">
									
                                        <div class="msg-body position-relative">
                                            <div class="img_wrap position-absolute overflow-hidden rounded-circle">
                                                <?php if(!empty($chatuserImg->user_image)){ ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $chatuserImg->user_image; ?>" class="rounded-circle" alt="user img">
											<?php }else{ ?>
											    <img src="<?php echo base_url(); ?>images/user_image.png" class="rounded-circle" alt="user img">
											<?php } ?>
                                            </div>
                                            <div class="chat_box">
                                                <div class="msg">
                                                    <span class="d-inline-block commonShadow"><?php echo $chatdetail->msg; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									<?php } ?>
									
								<?php }} ?>
                                 </div>
                                </div>
                            </div>
							
                            <div class="card-footer bg-white border-0">
                               <form id="creategroupchat" action="" method="post" enctype="multipart/form-data">
                                    <div class="d-flex align-items-center">
                                        <div class="formGroup position-relative">
                                            <input type="text" class="form-control" name="msg" id="msg"  placeholder="Type a message">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('userId')['user_id']; ?>" >
											<input type="hidden" name="friend_user_id" id="friend_user_id" value="<?php echo $group_box->group_members; ?>" >
											<input type="hidden" name="group_id" id="group_id" value="<?php echo $group_id; ?>" >
                                            <label class="attachFile mb-0" for="attachedFIle">
                                                <input type="file" id="attachedFIle">
                                                <span class="icon-paperclip position-absolute"></span>
                                            </label>
                                        </div>
                                        <button class="btn btn-send" name="submit" id="submitmsg" data-groupid="<?php echo $group_id; ?>"><span class="icon-send"></span></button>
										
                                    </div>
                                </form>
                            </div>
                        </div>
					<!----------------------------box end---------------------------- -->	
						
						
                    </div>
                </div>
            </section>
        </div>
   
</main>

 
 
