
  
   
    <?php $admin_id = $this->Common_model->getsingle("admin",array("admin_id" => 1)); ?> 
          
              <div id="layoutSidenav_content">

                <main>

                    <div class="container-fluid">

                        <h1 class="mt-4">Chat</h1>

						<button onclick="goBack()" style="float:right"> Back</button>

                            

                                    <div class="card-body">

                    <div class="messagePage__row d-md-flex" >
                       <?php $chat_box = $this->Common_model->getsingle("ask_me",array("ask_id" => $this->uri->segment("3")));
$userName = $this->Common_model->getsingle("users",array("user_id" => $chat_box->user_id));
						?>
                        <div class="messagePage__right bg-white">
                            <div class="messagePage__head d-sm-flex justify-content-between">
                                <div class="media profile">
                                    <div class="profile__img rounded-circle overflow-hidden">
                                        <?php if(!empty($chat_box->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $chat_box->image; ?>" class="img-fluid" width="50px" alt="user img">
								<?php }else{ ?>
								      <img src="<?php echo base_url(); ?>images/user_image.png" class="img-fluid" width="50px" alt="user img">
								<?php } ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-capitalize"><?php echo $userName->firstname; ?></h6>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                 <div class="msg-wrap test<?php echo $this->uri->segment("3"); ?>">
								<div id="scrolldiv<?php echo $this->uri->segment("3"); ?>">
								<?php
								$supportchatdetail = $this->Common_model->getAllwhereorder("support_chat",array("chat_id" => $this->uri->segment("3")),"chat_id","asc"); 
								echo '<pre>';print_r($supportchatdetail);die;
								if(!empty($supportchatdetail)){
									$j = 1;
								foreach($supportchatdetail as $chatdetail){
									$chatuserImg = $this->Common_model->getsingle("users",array("user_id"=>$chatdetail->user_id));
									if($chatdetail->user_id == 1){
										//$session_chat = $this->session->set_userdata('chatId', $chatdetail->chat_id; );
										
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
				<a href="<?php echo base_url(); ?>Userdashboard/downloadpdf/<?php echo $chatdetail->chat_id; ?>" data-img-id="<?php echo $chatdetail->chat_id; ?>" >
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
                                                    <span class="d-inline-block commonShadow">Hello! Doctor</span>
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
											<input type="hidden" name="user_id" id="user_id" value="1" >
											<input type="hidden" name="friend_user_id" id="friend_user_id" value="<?php echo $chat_box->user_id; ?>" >
											<input type="hidden" name="group_id" id="group_id" value="<?php echo $this->uri->segment('3'); ?>" >
                                            <label class="attachFile mb-0" for="attachedFIle">
                                                <input type="file" id="attachedFIle" name="attachedFIle">
                                                <span class="icon-paperclip position-absolute"></span>
                                            </label>
                                        </div>
                                        <button class="btn btn-send" name="submit" id="submitmsg" data-groupid="<?php echo $this->uri->segment('3'); ?>"><span class="icon-send"></span>Send</button>
										
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
             
       
   </div></div></main></div>

<?php  //echo $this->session->userdata('chatId'); die;?>
<?php /* ?><div class="ajaxcls">
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
 </div><?php */ ?>