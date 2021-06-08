
    <main class="main-content">
   
        <div class="messagePage">
            <section>
                <div class="container">
                    <div class="messagePage__row d-md-flex">
                       
						<?php 
						$group_box = $this->Common_model->getsingle("support_chat",array("user_id" => $this->session->userdata('userId')['user_id']));
                        $userName = $this->Common_model->getsingle("users",array("user_id" => $this->session->userdata('userId')['user_id']));
                        $admin_detail = $this->Common_model->getsingle("admin",array("admin_id" => 1));
						?>
                        <div class="messagePage__right bg-white">
                            <div class="messagePage__head d-sm-flex justify-content-between">
                                <div class="media profile">
                                    <div class="profile__img rounded-circle overflow-hidden">
                                        
										<?php if(!empty($admin_detail->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $admin_detail->image; ?>" class="img-fluid w-100" alt="user img">
								<?php }else{ ?>
								      <img src="<?php echo base_url(); ?>images/user_image.png" class="img-fluid w-100" alt="user img">
								<?php } ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-capitalize"><?php echo $admin_detail->admin_name; ?></h6>
										
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="chatbox">
                                <div class="msg-wrap test<?php echo $this->session->userdata('userId')['user_id']; ?>">
								<div id="scrolldiv<?php echo $this->session->userdata('userId')['user_id']; ?>">
								<?php
								$groupchatdetail = $this->Common_model->getAllwhereorder("support_chat",array("user_id" => $this->session->userdata('userId')['user_id']),"chat_id","asc"); 
								if(!empty($groupchatdetail)){
									
								foreach($groupchatdetail as $chatdetail){
									$chatuserImg = $this->Common_model->getsingle("users",array("user_id"=>$this->session->userdata('userId')['user_id']));
									if($chatdetail->user_id == $chatdetail->user_id && $chatdetail->admin_id == '0'){
										//$session_chat = $this->session->set_userdata('chatId', $chatdetail->chat_id; );
										
								?>
								
                                    <div class="send-msg">
									
                                        <div class="msg-body position-relative">
                                            <div class="chat_box">
                                                <div class="msg">
                                                   <?php if(!empty($chatdetail->msg)){ ?> <span class="d-inline-block bgGray"><?php echo $chatdetail->msg; ?></span><?php } ?>
													<?php if(!empty($chatdetail->media_path)){ 
													      if($chatdetail->media_type == "image"){
													?>
													<span class="d-inline-block bgGray">
													 <a href="javascript:void(0);" class="supportchatIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                                                        <img  width="100px;" class="chat_width_img chatIds<?php  echo $chatdetail->chat_id; ?>" data-chatIds="<?php  echo $chatdetail->chat_id; ?>" src="<?php echo base_url(); ?>chat_images/<?php echo $chatdetail->media_path; ?>" alt="trending"
                                                             />
                                                    </a>
														  <?php }elseif($chatdetail->media_type == "video"){ ?>
													<?php /* ?><video controls width="30%" height="50%" class="chatvideoIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">

				  <source src="<?php echo base_url(); ?>chat_images/<?php echo $chatdetail->media_path; ?>" type="video/mp4">

				</video><?php */ ?>
				<a href="javascript:void(0);" class="supportchatvideoIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                              <img  width="100px;" src="<?php echo base_url(); ?>images/default_video_img.png" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>
 
														 <?php }elseif(empty($chatdetail->media_type)){ ?>
				<a href="<?php echo base_url(); ?>Support/downloadpdf/<?php echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>" >
                              <img  width="100px;" src="<?php echo base_url(); ?>images/pdf_icon.png" class="pdficon downloadpdf1"  data-img-id="<?php echo $chatdetail->chat_id; ?>" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>	
														 <?php } ?>
													<?php } ?>
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
								
									<?php }elseif($chatdetail->user_id == $chatdetail->user_id && $chatdetail->admin_id == '1'){ ?>
                                    <div class="rcv-msg">
									
                                        <div class="msg-body position-relative">
                                            <div class="img_wrap position-absolute overflow-hidden rounded-circle">
                                                <?php if(!empty($admin_detail->image)){ ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $admin_detail->image; ?>" class="rounded-circle" alt="user img">
											<?php }else{ ?>
											    <img src="<?php echo base_url(); ?>images/user_image.png" class="rounded-circle" alt="user img">
											<?php } ?>
                                            </div>
                                            <div class="chat_box">
                                                <div class="msg">
                                                    <?php if(!empty($chatdetail->msg)){ ?> <span class="d-inline-block commonShadow"><?php echo $chatdetail->msg; ?></span><?php } ?>
													<?php if(!empty($chatdetail->media_path)){ 
													      if($chatdetail->media_type == "image"){
													?>
													<span class="d-inline-block">
													 <a href="javascript:void(0);" class="supportchatIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                                                        <img  width="100px;" class="chat_width_img chatIds<?php  echo $chatdetail->chat_id; ?>" data-chatIds="<?php  echo $chatdetail->chat_id; ?>" src="<?php echo base_url(); ?>chat_images/<?php echo $chatdetail->media_path; ?>" alt="trending"
                                                             />
                                                    </a>
														  <?php }elseif($chatdetail->media_type == "video"){ ?>
													<?php /* ?><video controls width="30%" height="50%" class="chatvideoIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">

				  <source src="<?php echo base_url(); ?>chat_images/<?php echo $chatdetail->media_path; ?>" type="video/mp4">

				</video><?php */ ?>
				<a href="javascript:void(0);" class="supportchatvideoIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                              <img  width="100px;" src="<?php echo base_url(); ?>images/default_video_img.png" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>
 
														  <?php }elseif(empty($chatdetail->media_type)){ ?>
				<a href="<?php echo base_url(); ?>Support/downloadpdf/<?php echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                              <img  width="100px;" src="<?php echo base_url(); ?>images/pdf_icon.png" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>										  
														<?php } ?>  
													<?php } ?>
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
                               <form id="createsupportchat" action="" method="post" enctype="multipart/form-data">
                                    <div class="d-flex align-items-center">
                                        <div class="formGroup position-relative">
                                            <input type="text" class="form-control" name="msg" id="msg"  placeholder="Type a message">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('userId')['user_id']; ?>" >
											<input type="hidden" name="friend_user_id" id="friend_user_id" value="<?php echo $group_box->group_members; ?>" >
											<input type="hidden" name="group_id" id="group_id" value="<?php echo $group_id; ?>" >
                                            <label class="attachFile mb-0" for="attachedFIle">
                                                <input type="file" id="attachedFIle" name="attachedFIle">
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
<?php  //echo $this->session->userdata('chatId'); die;?>
<div class="ajaxcls">
 <div  id="" data-img-id="<?php echo $chatdetail->chat_id; ?>" class="modal newimagemodal fade">
												  <span class="closenew" data-img-id="<?php echo $chatdetail->chat_id; ?>">&times;</span>
												  <h2>Chat</h2>
												 <div class="modal-body"> <img class="modal-content imagepreview<?php echo $chatdetail->chat_id; ?>" src="" id="img01"> </div>
												  
												</div>
 </div>
 
 
 <div class="ajaxvideo">
 <div class="modal fade videoModal" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <video controls width="100%">
            <source src="" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
  </div>
 </div>