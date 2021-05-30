

<div class="sds<?php echo $post_id; ?>">
<?php
     if(!empty($getallcomment)){
	      foreach($getallcomment['rows'] as $allcomment){
			  $getuser = $this->Common_model->getsingle("users",array("user_id" => $allcomment->user_id)); ?>
			  <span class="newflex<?php echo $allcomment->comment_event_id; ?>">  
			  <li class="d-flex">
                                    <div class="imgBox rounded-circle overflow-hidden">
                                        <?php if(!empty($getuser->user_image)){ ?>
                                        <img src="<?php echo base_url(); ?>upload/<?php echo $getuser->user_image; ?>" alt="user">
									<?php }else{ ?>
									    <img src="<?php echo base_url(); ?>images/user_image.png" alt="user">
									<?php } ?>
                                    </div>
                                    <div class="cntText">
                                        <h6 class="font-sm mb-0"><?php echo $getuser->firstname.' '.$getuser->lastname; ?></h6>
                                        <small>2 hours</small>
                                        <p><?php echo $allcomment->comment; ?></p>
                                    </div>
									<div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_event_id; ?>"><span class="icon-trash-2 trasheventcomment" data-commentid="<?php echo  $allcomment->comment_event_id; ?>" data-postid="<?php echo $post_id; ?>"></span></a></div>
                                </li>
								</span>
         <?php }if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>
				<div class="seeComment my-3"><center style="text-align: left;color:black;"><a class="moreeventimage" data-postid="<?php echo $allcomment->event_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></center></div>
							<?php }}else{
	 }
?>
</div>
					    	
			