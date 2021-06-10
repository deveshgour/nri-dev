  <?php $admin_id = $this->Common_model->getsingle("admin",array("admin_id" => 1)); ?> 
<?php
								$groupchatdetail = $this->Common_model->getAllwhereorder("support_chat",array("user_id" => $group_id),"chat_id","asc"); 
								if(!empty($groupchatdetail)){
								foreach($groupchatdetail as $chatdetail){
									$chatuserImg = $this->Common_model->getsingle("users",array("user_id"=>$chatdetail->user_id));
									if($chatdetail->user_id == $chatdetail->user_id && $chatdetail->admin_id == '1'){
								?>
                                    <div class="send-msg">
                                        <div class="msg-body position-relative">
                                            <div class="chat_box">
                                                <div class="msg">
                                                  <?php if(!empty($chatdetail->msg)){ ?>  <span class="d-inline-block bgGray"><?php echo $chatdetail->msg; ?></span><?php } ?>
                                                <?php if(!empty($chatdetail->media_path)){ 
													      if($chatdetail->media_type == "image"){
													?>
													<span class="d-inline-block bgGray">
													 <a href="javascript:void(0);" class="chatIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                                                        <img  width="100px;" class="chat_width_img chatIds<?php  echo $chatdetail->chat_id; ?>" data-chatIds="<?php  echo $chatdetail->chat_id; ?>" src="<?php echo base_url(); ?>chat_images/<?php echo $chatdetail->media_path; ?>" alt="trending"
                                                             />
                                                    </a>
														  <?php }elseif($chatdetail->media_type == "video"){ ?>
													
				<a href="javascript:void(0);" class="chatvideoIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                              <img  width="100px;" src="<?php echo base_url(); ?>images/default_video_img.png" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>
 
														 <?php }elseif(empty($chatdetail->media_type)){ ?>
				<a href="<?php echo base_url(); ?>Admin_support/downloadpdf/<?php echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>" >
                              <img  width="100px;" src="<?php echo base_url(); ?>images/pdf_icon.png" class="pdficon downloadpdf1"  data-img-id="<?php echo $chatdetail->chat_id; ?>" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>	
														 <?php } ?>
													<?php } ?>
												
												</div>
                                            </div>
                                            <div class="img_wrap position-absolute overflow-hidden rounded-circle">
											 <?php if(!empty($admin_id->image)){ ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $admin_id->image; ?>" width="50px" class="rounded-circle" alt="user img">
											<?php }else{ ?>
											    <img src="<?php echo base_url(); ?>images/user_image.png" class="rounded-circle" alt="user img">
											<?php } ?>
                                            </div>
                                        </div>
                                    </div>
									<?php }elseif($chatdetail->user_id == $chatdetail->user_id && $chatdetail->admin_id == '0'){ ?>
                                    <div class="rcv-msg">
                                        <div class="msg-body position-relative">
                                            <div class="img_wrap position-absolute overflow-hidden rounded-circle">
                                                 <?php if(!empty($chatuserImg->user_image)){ ?>
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $chatuserImg->user_image; ?>" width="50px" class="rounded-circle" alt="user img">
											<?php }else{ ?>
											    <img src="<?php echo base_url(); ?>images/user_image.png" class="rounded-circle" width="50px" alt="user img">
											<?php } ?>
                                            </div>
                                            <div class="chat_box">
                                                <div class="msg">
                                                  <?php if(!empty($chatdetail->msg)){ ?>  <span class="d-inline-block bgGray"><?php echo $chatdetail->msg; ?></span><?php } ?>
                                                <?php if(!empty($chatdetail->media_path)){ 
													      if($chatdetail->media_type == "image"){
													?>
													<span class="d-inline-block bgGray">
													 <a href="javascript:void(0);" class="chatIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                                                        <img  width="100px;" class="chat_width_img chatIds<?php  echo $chatdetail->chat_id; ?>" data-chatIds="<?php  echo $chatdetail->chat_id; ?>" src="<?php echo base_url(); ?>chat_images/<?php echo $chatdetail->media_path; ?>" alt="trending"
                                                             />
                                                    </a>
														  <?php }elseif($chatdetail->media_type == "video"){ ?>
													
				<a href="javascript:void(0);" class="chatvideoIds<?php  echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>">
                              <img  width="100px;" src="<?php echo base_url(); ?>images/default_video_img.png" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>
 
														 <?php }elseif(empty($chatdetail->media_type)){ ?>
				<a href="<?php echo base_url(); ?>Admin_support/downloadpdf/<?php echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>" >
                              <img  width="100px;" src="<?php echo base_url(); ?>images/pdf_icon.png" class="pdficon downloadpdf1"  data-img-id="<?php echo $chatdetail->chat_id; ?>" alt="trending" ><?php if(!empty($chatdetail->real_video_name)){ echo $chatdetail->real_video_name; } ?>
            
                                                    </a>	
														 <?php } ?>
													<?php } ?>
												
												</div>
                                            </div>
                                        </div>
                                    </div>
								<?php }}} ?>