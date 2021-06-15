<div class="sti<?php echo $comment_id; ?>">
<?php
     if(!empty($getallcomment)){
	      foreach($getallcomment as $allcomment){
			  $getuser = $this->Common_model->getsingle("users",array("user_id" => $allcomment->user_id)); ?>
			  
	<!---------------------------------------reply comment like----------------------------------- -->
		
		<?php $replycomment_like_count = $this->Common_model->getAllwhereorder("replycomment_buzz_like",array("replycomment_buzz_id" => $allcomment->replybuzz_id),"replycomment_buzz_id","desc");
			 $getmyreplylikecomment = $this->Common_model->getsingle("replycomment_buzz_like",array("replycomment_buzz_id" => $allcomment->replybuzz_id,"user_id" => $this->session->userdata('userId')['user_id']));
			 ?>
		 <!---------------------------------------------------------------------------------------------------------------------------------- -->							  
		  
					 <span class="newflex newreplyspan">  
							  <li class="d-flex new-reply-cmt-li">
								
                                    <div class="imgBox rounded-circle overflow-hidden">
									     <?php if(!empty($getuser->user_image)){ ?>
                                      <img src="<?php echo base_url(); ?>upload/<?php echo $getuser->user_image; ?>" alt="user">
									<?php }else{ ?>
									<img src="<?php echo base_url(); ?>images/user_image.png" alt="user">
									<?php } ?>
									 </div>
									
                                    <div class="cntText">
                                        <h6 class="font-sm mb-0"><?php echo $getuser->firstname.' '.$getuser->lastname; ?></h6>
										<?php 
										$current_time = date('Y-m-d H:i:s');
										$to_time = $allcomment->create_date;
										  
										?>
										<small><?php echo convert_time($allcomment->create_date,'F j, Y, g:i a'); ?></small>
                                        <p class="edit_replycomment_text_<?php echo $allcomment->replybuzz_id; ?>"><?php echo $allcomment->reply_comment; ?></p>
										<b><a href="javascript:void(0)" class="link-dark replybuzzcomment_like_post" <?php if($getmyreplylikecomment){ ?>style="color:#009688;"<?php } ?> id="likereplycomment-<?php echo $allcomment->replybuzz_id; ?>" data-status="1" data-commentid="<?php echo $allcomment->comment_buzz_id; ?>" data-replycommentid="<?php echo $allcomment->replybuzz_id; ?>">
							   <span class="replycmtdivcls" id="likereplycommentcountbox-<?php echo $allcomment->replybuzz_id; ?>"><span class="replycmtspan"><?php echo count($replycomment_like_count); ?></span></span>Like</a></b>
	
                                    </div>
									<!-------------------------------------------------------replycomment edit and delete dropdown--------------------- -->
							   <?php if($allcomment->user_id == $this->session->userdata('userId')['user_id'] || $allcomment->comment_user_id == $this->session->userdata('userId')['user_id']){ ?>
							   <div class="btn-group postActionMenu">
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <em class="icon-more-vertical"></em>
                                    </button>
                                    <div class="dropdown-menu">
                                    <ul class="list-unstyled mb-0">
                                        <li> <a href="javascript:void(0);" id="deletereplyComment" class="trashbuzzreplycmts_<?php echo $allcomment->replybuzz_id; ?>" data-replycommentid="<?php echo  $allcomment->replybuzz_id; ?>" data-commentid="<?php echo  $allcomment->comment_buzz_id; ?>"><span class="del" data-replycommentid="<?php echo  $allcomment->replybuzz_id; ?>" data-commentid="<?php echo  $allcomment->comment_buzz_id; ?>">Delete</span></a></li>
                                        <li><a href="javascript:void(0);" data-target="#editbuzzreplycomment_<?php echo $allcomment->replybuzz_id; ?>" data-toggle="modal">Edit</a></li>
										</ul>
                                    </div>
                                </div>
							   <?php } ?>
							   
							   <!------------------------------------------------------------------------------------------------ -->
							   </li>
							   							    	<!-------------------------------Edit replycomment------------------------------- -->
<div class="modal fade" id="editbuzzreplycomment_<?php echo $allcomment->replybuzz_id; ?>" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="custommodal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabelsss">
                    Edit Reply Comment
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
			
			<div >
                   
                    <div class='col-xs-12 required'>
                       <textarea rows="3" class="form-control" name="edit_replycomment" id="edit_replycomment_<?php echo $allcomment->replybuzz_id; ?>"><?php echo $allcomment->reply_comment; ?></textarea>    
					   </div>
                  </div>
			
			  
			<button type="submit" data-reply-id="<?php echo $allcomment->replybuzz_id; ?>" name="editreplycomment_submit" id="editreplybuzzcomment_submit<?php echo $allcomment->replybuzz_id; ?>" class=' btn btn-primary submit-button' style="margin-left:16px;" >Submit</button>
			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>
			
			
			</div>
        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------- -->  
							   </span>
	 <?php }} ?>
</div>