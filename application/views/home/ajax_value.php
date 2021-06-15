<?php

					    if(!empty($post_data)){ 

					    	$i = ++$offset;

					        foreach($post_data as $rows){

					?>

<div class="feed-box rounded-10" id="postdetail-<?php echo $rows->post_id; ?>">

                        <div class="feedTop">

                            <div class="userInfo d-flex align-items-center">

                                <div class="userImg rounded-circle overflow-hidden" id="myData_<?php echo $i;?>">

                                    <?php if(!empty($rows->user_image)){ ?>

                                        <img src="<?php echo base_url(); ?>upload/<?php echo $rows->user_image; ?>" alt="user">

									<?php }else{ ?>

									    <img src="<?php echo base_url(); ?>images/user_image.png" alt="user">

									<?php } ?>

                                </div>

                                <div class="userInfo-text">

                                    <h6><?php echo $rows->firstname.' '.$rows->lastname; ?></h6>

                                    <?php /* ?><span>Yesterday at 4:54 PM</span><?php */ ?>

									<span><?php echo convert_time($rows->date_added,'F j, Y, g:i a'); ?></span>

                                </div>

								<?php if($this->session->userdata('userId')['user_id'] == $rows->user_id){ ?>

								<div class="btn-group postActionMenu">

                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <em class="icon-more-vertical"></em>

                                    </button>

                                    <div class="dropdown-menu">

                                    <ul class="list-unstyled mb-0">

                                        <li> <a href="javascript:void(0);" id="delete_post" data-postid="<?php echo $rows->post_id; ?>" class="postdel<?php echo $rows->post_id; ?>"><span class="icon-trash-2"  data-postid="<?php echo $rows->post_id; ?>"></span> Delete</a></li>

                                        <li><a href="javascript:void(0);" data-target="#editPost_<?php echo $rows->post_id ?>" data-toggle="modal"><span class="icon-edit-2"></span> Edit Post</a></li>

										</ul>

                                    </div>

                                </div>

                                

                                <!-------------------------------Edit post------------------------------- -->

<div class="modal fade" id="editPost_<?php echo $rows->post_id; ?>" tabindex="-1" role="dialog" 

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
                   

                    <div class='form-group'>

                       <textarea rows="3" class="form-control" name="edit_post" id="edit_post_<?php echo $rows->post_id; ?>"><?php echo $rows->post; ?></textarea>    

					   </div>

			  

			<button type="submit" data-post-id = "<?php echo $rows->post_id; ?>" name="editpost_submit" id="editpost_submit" class=' btn btn-primary submit-button' >Submit</button>

			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>

			

			

			</div>

        </div>

    </div>

</div>

<!----------------------------------------------------------------------------------------------------------------------------- -->

								<?php } ?>

						   </div>



                            <div class="feedImg mb-3">



                                <div class="feedCaption">

                                <p id="edit_post_text_<?php echo $rows->post_id; ?>"><?php echo $rows->post; ?>

                                    </p>

                                </div>

								<?php if($rows->media_type == 'image'){ ?>

                                <img src="<?php echo base_url(); ?>upload/<?php echo $rows->media_path; ?>" class="img-fluid w-100" alt="feed">

								<?php }elseif($rows->media_type == 'video'){ ?>

								<video controls width="100%" height="100%">

				  <source src="<?php echo base_url(); ?>upload/<?php echo $rows->media_path; ?>" type="video/mp4">

				</video>

								<?php } ?>

                            </div>

							

							<?php  

	    $likeType = $this->Common_model->getsingle('like', array('post_id' => $rows->post_id,'status'=>1,'user_id' => $this->session->userdata('userId')['user_id'])); 

		$count_like_one = $this->Common_model->jointwotable('like', 'user_id', 'users', 'user_id',array('post_id' => $rows->post_id,'like.status'=>1,'users.status'=>2),'users.user_id,users.firstname,users.lastname,like.like_id'); 

	//echo $this->db->last_query();die;

	$count_like_ss = $this->Common_model->joint($rows->post_id);

	//echo '<pre>';print_r($count_like_ss); die;

	

$getallcomment = $this->Common_model->commentpagination(array("post_id" => $rows->post_id),3,0,"comment_id", "desc");

$totalcommentcount = $this->Common_model->countwhereuser("comment",array("post_id" => $rows->post_id));

							 ?>

							

                            <div class="d-flex justify-content-between">

                                <div id="likecountbox-<?php echo $rows->post_id; ?>" class="font-sm" data-likecount="<?php echo COUNT($count_like_one); ?>" >  <span><?php echo COUNT($count_like_one); ?> people like this</span><?php /* ?>Kavi Singh and 200 other liked<?php */ ?></div>

                                <?php if($totalcommentcount != "0"){ ?><div class="comments"><span class="totalcmt<?php echo $rows->post_id; ?>"><?php echo $totalcommentcount; ?></span> Comments</div><?php } ?>

                            </div>

                        </div>

                        <div class="feedBottom">

                            <div class="likeShare d-flex align-items-center justify-content-between">

                                <div class="left">

                                   <a href="javascript:void(0)" class="link-dark like_post" <?php if($likeType){ ?>style="color:#009688;"<?php } ?> id="like-<?php echo $rows->post_id; ?>" data-status="1" data-type="1" data-author="<?php echo $rows->user_id; ?>" data-postid="<?php echo $rows->post_id; ?>"><span

                                            class="icon-star pr-2"></span>Like</a>

                                    <a href="javascript:;" class="link-dark"><span

                                            class="icon-comment pr-2"></span>Comment</a>

                                </div>

                               <div class="right">

                                <div class="dropdown shareDropdown">
                                <a href="javascript:;" class="link-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span

                                    class="icon-share-2 pr-2"></span>Share</a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><em class="icon-facebook"></em> Facebook</a>
                                        <a class="dropdown-item" href="#"><em class="icon-twitter"></em> Twitter</a>
                                        <!--<a class="dropdown-item" href="#"><em class="icon-instagram"></em> Instagram</a>-->
                                        <a class="dropdown-item" href="#"><em class="icon-whatsapp"></em> Whatsapp</a>
                                    </div>
                                    </div>

                                   

                                </div>

                            </div>

                            <!--<div class="seeComment my-3">

                                <a href="javascript:;" class="font-sm link-dark">See more comments</a>

                            </div>-->

                            <ul class="list-unstyled comment-list commentshow-<?php echo $rows->post_id; ?>">

							<div class="sds<?php echo $rows->post_id; ?>">

						<?php if(!empty($getallcomment)){

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

                                        

                                        <b><a href="javascript:;" class="link-dark replyshow" data-commentid="<?php echo  $allcomment->comment_id; ?>">Reply</a></b>

										<b><a href="javascript:void(0)" class="link-dark comment_like_post" <?php if($getmylikecomment){ ?>style="color:#009688;"<?php } ?> id="likecomment-<?php echo $allcomment->comment_id; ?>" data-status="1" data-type="1" data-author="<?php echo $allcomment->user_id; ?>" data-postid="<?php echo $allcomment->post_id; ?>" data-commentid="<?php echo $allcomment->comment_id; ?>">

							   <span class="cmtdivcls" id="likecommentcountbox-<?php echo $allcomment->comment_id; ?>"><span class="cmtspan"><?php echo count($comment_like_count); ?></span></span> Like</a></b>



										<!----------------------------show reply comment---------------------------- -->

										<?php $reply_comment = $this->Common_model->getAllwhereorder("reply_comment",array("comment_id" => $allcomment->comment_id),"reply_id","asc"); 

										      

											  											       //echo "<pre>";print_r($replyuserid);die;

													   ?>

													   <ul class="list-unstyled comment-list replycomment-list replycommentshow-<?php echo $allcomment->comment_id; ?> mb-2">

							<div class="sti<?php echo $allcomment->comment_id; ?>">

							 <?php if(!empty($reply_comment)){

									   foreach($reply_comment as $reply_val){

                                          $replyuserid = $this->Common_model->getsingle("users",array("user_id" => $reply_val->user_id)); ?>

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

                                        <p class="edit_replycomment_text_<?php echo $reply_val->reply_id; ?>"><?php echo $reply_val->reply_comment; ?></p>

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

                                        <li> <a href="javascript:void(0);" id="deletereplyComment" data-replycommentid="<?php echo  $reply_val->reply_id; ?>" data-commentid="<?php echo  $reply_val->comment_id; ?>"><span class="del trashreplycomment" data-replycommentid="<?php echo  $reply_val->reply_id; ?>" data-commentid="<?php echo  $reply_val->comment_id; ?>" data-postid="<?php echo $rows->post_id; ?>">Delete</span></a></li>

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
			<button type="submit" data-reply-id="<?php echo $reply_val->reply_id; ?>" name="editreplycomment_submit" id="editreplycomment_submit" class=' btn btn-primary submit-button mr-2'>Submit</button>

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

                                    <input type="text" class="form-control replycmtval_<?php echo $allcomment->comment_id; ?>" name="reply_comment" id="reply_comment" data-post_id="<?php echo $rows->post_id; ?>" data-comment_id="<?php echo $allcomment->comment_id; ?>" data-comment_user_id="<?php echo $allcomment->user_id; ?>" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>" value="" placeholder="Write a public comment">

                                   <button class="border-0 bg-transparent replyCmt font-sm replyCombtn_<?php echo $allcomment->comment_id; ?>" id="postVal" data-post_id="<?php echo $rows->post_id; ?>" data-comment_id="<?php echo $allcomment->comment_id; ?>" data-comment_user_id="<?php echo $allcomment->user_id; ?>" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>">Post</button>

                                </div>

									<!------------------------------post button reply button-------------------------- -->	

                                        

                                        

                                    </div>

									<?php /* ?><div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="icon-trash-2 trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $rows->post_id; ?>"></span></a></div><?php */ ?>

									 <!-------------------------------------------------------comment edit and delete dropdown--------------------- -->

							   <?php if($allcomment->user_id == $this->session->userdata('userId')['user_id']){ ?>

							   <div class="btn-group postActionMenu">

                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <em class="icon-more-vertical"></em>

                                    </button>

                                    <div class="dropdown-menu">

                                    <ul class="list-unstyled mb-0">

                                                                                <li> <a class="trashcomments<?php echo  $allcomment->comment_id; ?>" href="javascript:void(0);" id="deleteComment" data-postid="<?php echo $rows->post_id; ?>" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="del trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $rows->post_id; ?>">Delete</span></a></li>



                                        

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

								<?php }

							if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>

							

				<div class="seeComment my-3 text-center"><center><a class="moreimage" data-postid="<?php echo $rows->post_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></center></div>

							<?php }}else{ ?>

							

							<?php } ?>

                                </div>

                            </ul>

                           <form id="cmtform-<?php echo $rows->post_id; ?>" data-postid="<?php echo $rows->post_id; ?>" data-userid="<?php echo $this->session->userdata("userId")['user_id']; ?>" action="" method="post" >

                            <input type="hidden" name="postId" id="postId" value="<?php echo $rows->post_id; ?>" >

							<input type="hidden" name="userIds" id="userIds" value="<?php echo $this->session->userdata("userId")['user_id']; ?>" >

							<div class="postComment d-flex align-items-center pt-2">

                                <div class="userImg rounded-circle overflow-hidden">

                                    <?php if(!empty($rows->user_image)){ ?>

                                        <img src="<?php echo base_url(); ?>upload/<?php echo $rows->user_image; ?>" alt="user">

									<?php }else{ ?>

									    <img src="<?php echo base_url(); ?>images/user_image.png" alt="user">

									<?php } ?>

                                </div>

                                <div class="inputBox position-relative">

                                    <input type="text" class="form-control newpostcomment post_comment-<?php echo $rows->post_id; ?>" name="post_comment" id="post_comment" data-cmtid="<?php echo $rows->post_id; ?>" value="" placeholder="Write a public comment">

                                    <button class="border-0 bg-transparent font-sm postVal_<?php echo $rows->post_id; ?>" disabled id="postVal">Post</button>



                                </div>

                            </div>

							</form>

                        </div>

                    </div>

						<?php }} ?>