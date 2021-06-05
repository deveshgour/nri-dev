<?php
								$groupchatdetail = $this->Common_model->getAllwhereorder("group_chat",array("group_id" => $group_id),"chat_id","asc"); 
								if(!empty($groupchatdetail)){
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
											    <img src="<?php echo base_url(); ?>images/user_image;" class="rounded-circle" alt="user img">
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
											    <img src="<?php echo base_url(); ?>images/user_image;" class="rounded-circle" alt="user img">
											<?php } ?>
                                            </div>
                                            <div class="chat_box">
                                                <div class="msg">
                                                    <span class="d-inline-block commonShadow"><?php echo $chatdetail->msg; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								<?php }}} ?>