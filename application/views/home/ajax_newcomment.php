



<?php  

     if(!empty($getallcomment)){

	      foreach($getallcomment['rows'] as $allcomment){

			  $getuser = $this->Common_model->getsingle("users",array("user_id" => $allcomment->user_id));

               $current_time = date('Y-m-d H:i:s');

			   $to_cmttime = $allcomment->create_date;

			  ?>

			  

			  <!--------------------------------comment like--------------------------- -->	 

			<?php $comment_like_count = $this->Common_model->getAllwhereorder("comment_like",array("comment_id" => $allcomment->comment_id),"comment_id","desc");

			 $getmylikecomment = $this->Common_model->getsingle("comment_like",array("comment_id" => $allcomment->comment_id,"user_id" => $this->session->userdata('userId')['user_id']));

			 ?>

	   

		 <!----------------------------------------------------------------------------- -->

 

			  <span class="newflex<?php echo $allcomment->comment_id; ?>"> 

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

                                        <small><?php echo time_diff_string($to_cmttime,$current_time); ?></small>

                                        <p class="edit_comment_text_<?php echo $allcomment->comment_id; ?>"><?php echo $allcomment->comment; ?></p>

										<b><a href="javascript:;" class="link-dark replyshow" data-commentid="<?php echo $allcomment->comment_id; ?>">Reply</a></b>

										<b><a href="javascript:void(0)" class="link-dark comment_like_post" <?php if($getmylikecomment){ ?>style="color:#009688;"<?php } ?> id="likecomment-<?php echo $allcomment->comment_id; ?>" data-status="1" data-type="1" data-author="<?php echo $allcomment->user_id; ?>" data-postid="<?php echo $allcomment->post_id; ?>" data-commentid="<?php echo $allcomment->comment_id; ?>">

							   <span class="cmtdivcls" id="likecommentcountbox-<?php echo $allcomment->comment_id; ?>"><span class="cmtspan"><?php echo count($comment_like_count); ?></span></span> Like</a></b>



										<!----------------------------show reply comment---------------------------- -->

										

													   <ul class="list-unstyled comment-list replycomment-list replycommentshow-<?php echo $allcomment->comment_id; ?> mb-2">

							<div class="sti<?php echo $allcomment->comment_id; ?>">

							<?php $reply_comment = $this->Common_model->getAllwhereorder("reply_comment",array("comment_id" => $allcomment->comment_id),"reply_id","asc"); 

										      

											   if(!empty($reply_comment)){

												   foreach($reply_comment as $reply_val){

                                                   $replyuserid = $this->Common_model->getsingle("users",array("user_id" => $reply_val->user_id));

											       //echo "<pre>";print_r($replyuserid);die;

													   ?>

													   

					<!---------------------------------------reply comment like----------------------------------- -->

		

		<?php $replycomment_like_count = $this->Common_model->getAllwhereorder("replycomment_like",array("replycomment_id" => $reply_val->reply_id),"replycomment_id","desc");

			 $getmyreplylikecomment = $this->Common_model->getsingle("replycomment_like",array("replycomment_id" => $reply_val->reply_id,"user_id" => $this->session->userdata('userId')['user_id']));

			 ?>

		 <!---------------------------------------------------------------------------------------------------------------------------------- -->							  

								   

													   

							                            <span class="newflex newreplyspan">  

							  <li class="d-flex new-reply-cmt-li">

								

                                    <div class="imgBox rounded-circle overflow-hidden">

									<?php if(!empty($replyuserid->user_image)){ ?>

                                      <img src="<?php echo base_url(); ?>upload/<?php echo $replyuserid->user_image; ?>" alt="user">

									<?php }else{ ?>

									<img src="<?php echo base_url(); ?>images/user_image.png" alt="user">

									<?php } ?>

									                                    </div>

									

                                    <div class="cntText">

                                        <h6 class="font-sm mb-0"><?php echo $replyuserid->firstname.' '.$replyuserid->lastname; ?></h6>

										<?php 

										$current_time = date('Y-m-d H:i:s');

										$to_time = $reply_val->create_date;

										  

										?>

                                        <small><?php echo time_diff_string($to_time,$current_time); ?></small>

                                        <p><?php echo $reply_val->reply_comment; ?></p>

										<b><a href="javascript:void(0)" class="link-dark replycomment_like_post" <?php if($getmyreplylikecomment){ ?>style="color:#009688;"<?php } ?> id="likereplycomment-<?php echo $reply_val->reply_id; ?>" data-status="1" data-postid="<?php echo $reply_val->post_id; ?>" data-commentid="<?php echo $reply_val->comment_id; ?>" data-replycommentid="<?php echo $reply_val->reply_id; ?>">

							   <span class="replycmtdivcls" id="likereplycommentcountbox-<?php echo $reply_val->reply_id; ?>"><span class="replycmtspan"><?php echo count($replycomment_like_count); ?></span></span> Like</a></b>

		

                                    </div>

                               <!-------------------------------------------------------replycomment edit and delete dropdown--------------------- -->

							   <?php if($reply_val->user_id == $this->session->userdata('userId')['user_id'] || $reply_val->comment_user_id == $this->session->userdata('userId')['user_id']){ ?>

							   <div class="btn-group postActionMenu">

                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <em class="icon-more-vertical"></em>

                                    </button>

                                    <div class="dropdown-menu">

                                    <ul class="list-unstyled mb-0">

                                        <li> <a href="javascript:void(0);" id="deletereplyComment" data-replycommentid="<?php echo  $reply_val->reply_id; ?>" data-commentid="<?php echo  $reply_val->comment_id; ?>"><span class="del trashreplycomment" data-replycommentid="<?php echo  $reply_val->reply_id; ?>" data-commentid="<?php echo  $reply_val->comment_id; ?>" data-postid="<?php echo $allcomment->post_id; ?>">Delete</span></a></li>

                                        <li><a href="javascript:void(0);" data-target="#editreplycomment_<?php echo $reply_val->reply_id; ?>" data-toggle="modal">Edit</a></li>

										</ul>

                                    </div>

                                </div>

							   <?php } ?>

							   

							   <!------------------------------------------------------------------------------------------------ -->

							   </li>

							   <!-------------------------------Edit replycomment------------------------------- -->

<div class="modal fade" id="editreplycomment_<?php echo $reply_val->reply_id; ?>" tabindex="-1" role="dialog" 

     aria-labelledby="myModalLabel" aria-hidden="true">

   <div class="modal-dialog modal-dialog-centered">

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

                   

                    <div class='form-group'>

                       <textarea rows="3" class="form-control" name="edit_replycomment" id="edit_replycomment_<?php echo $reply_val->reply_id; ?>"><?php echo $reply_val->reply_comment; ?></textarea>    

					   </div>

                  </div>

			

			  
<div class="text-center">
			<button type="submit" data-reply-id="<?php echo $reply_val->reply_id; ?>" name="editreplycomment_submit" id="editreplycomment_submit" class=' btn btn-primary submit-button mr-2' >Submit</button>

			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>

                               </div>	

			

			</div>

        </div>

    </div>

</div>

<!----------------------------------------------------------------------------------------------------------------------------- --> 

							   </span>

							    <?php }

											   }

										?>

														</div>

                             

                            </ul>

												 

																			

										

										<!------------------------------post button reply button-------------------------- -->

											<div class="inputBox position-relative hidediv replyShownew_<?php echo $allcomment->comment_id; ?>" style="display:none;">

                                    <input type="text" class="form-control replycmtval_<?php echo $allcomment->comment_id; ?>" name="reply_comment" id="reply_comment" data-post_id="<?php echo $row->post_id; ?>" data-comment_id="<?php echo $allcomment->comment_id; ?>" data-comment_user_id="<?php echo $allcomment->user_id; ?>" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>" value="" placeholder="Write a public comment">

                                   <button class="border-0 bg-transparent replyCmt font-sm replyCombtn_<?php echo $allcomment->comment_id; ?>" id="postVal" data-post_id="<?php echo $row->post_id; ?>" data-comment_id="<?php echo $allcomment->comment_id; ?>" data-comment_user_id="<?php echo $allcomment->user_id; ?>" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>">Post</button>

                                </div>

									<!------------------------------post button reply button-------------------------- -->

                                    </div>

								<?php /* ?>	<div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="icon-trash-2 trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $post_id; ?>"></span></a></div><?php */ ?>

								<!-------------------------------------------------------comment edit and delete dropdown--------------------- -->

							   <?php if($allcomment->user_id == $this->session->userdata('userId')['user_id']){ ?>

							   <div class="btn-group postActionMenu">

                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <em class="icon-more-vertical"></em>

                                    </button>

                                    <div class="dropdown-menu">

                                    <ul class="list-unstyled mb-0">

                                                                                <li> <a class="trashcomments<?php echo  $allcomment->comment_id; ?>" href="javascript:void(0);" id="deleteComment" data-postid="<?php echo $allcomment->post_id; ?>" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="del trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $allcomment->post_id; ?>">Delete</span></a></li>



                                        

                                        <li><a href="javascript:void(0);" data-target="#editcomment_<?php echo $allcomment->comment_id; ?>" data-toggle="modal">Edit</a></li>

										</ul>

                                    </div>

                                </div>

							   <?php } ?>

							   <!------------------------------------------------------------------------------------------------ -->

                                </li>

                                <!-------------------------------Edit comment------------------------------- -->

<div class="modal fade" id="editcomment_<?php echo $allcomment->comment_id; ?>" tabindex="-1" role="dialog" 

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

                    Edit Post

                </h4>

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

			

			<div >

                   

                    <div class='col-xs-12 required'>

                       <textarea rows="3" class="form-control" name="edit_comment" id="edit_comment_<?php echo $allcomment->comment_id; ?>"><?php echo $allcomment->comment; ?></textarea>    

					   </div>

                  </div>

			

			  

			<button type="submit" data-comment-id = "<?php echo $allcomment->comment_id; ?>" name="editcomment_submit" id="editcomment_submit" class=' btn btn-primary submit-button' style="margin-left:16px;" >Submit</button>

			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>

			

			

			</div>

        </div>

    </div>

</div>

<!----------------------------------------------------------------------------------------------------------------------------- -->

								</span>

         <?php }if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>

				<div class="seeComment my-3 text-center"><a class="moreimage" data-postid="<?php echo $allcomment->post_id; ?>" data-page="<?php echo $offset; ?>" href="javascript:void(0);">See more comments</a></div>		

				<?php }

	 }else{ ?>

				

				<?php } ?>





					    	

					       