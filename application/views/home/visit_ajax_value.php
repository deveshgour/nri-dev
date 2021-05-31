<?php
					    if(!empty($post_data)){ 
					    	$i = ++$offset;
					        foreach($post_data as $rows){
					?>
<div class="feed-box rounded-10" id="postdetail-<?php echo $rows->visit_id; ?>">
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
								<div class="singlepostdel"><a href="javascript:void(0);" id="delete_post" data-postid="<?php echo $row->visit_id; ?>" class="postdel<?php echo $row->visit_id; ?>"><span class="icon-trash-2"  data-postid="<?php echo $row->visit_id; ?>"></span></a></div>
								<?php } ?>
						   </div>

                            <div class="feedImg mb-3">

                                <div class="feedCaption">
                                    <p><?php echo $rows->post; ?>
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
	    $likeType = $this->Common_model->getsingle('like_visit', array('visit_id' => $rows->visit_id,'status'=>1,'user_id' => $this->session->userdata('userId')['user_id'])); 
		$count_like_one = $this->Common_model->jointwotable('like_visit', 'user_id', 'users', 'user_id',array('visit_id' => $rows->visit_id,'like_visit.status'=>1,'users.status'=>2),'users.user_id,users.firstname,users.lastname,like_visit.like_visit_id'); 
	//echo $this->db->last_query();die;
	$count_like_ss = $this->Common_model->joint($rows->visit_id);
	//echo '<pre>';print_r($count_like_ss); die;
	
$getallcomment = $this->Common_model->commentpaginationvisit(array("visit_id" => $rows->visit_id),3,0,"comment_visit_id", "desc");
$totalcommentcount = $this->Common_model->countwhereuser("comment_visit",array("visit_id" => $rows->visit_id));
							 ?>
							
                            <div class="d-flex justify-content-between">
                                <div id="likecountbox-<?php echo $rows->visit_id; ?>" class="font-sm" data-likecount="<?php echo COUNT($count_like_one); ?>" >  <span><?php echo COUNT($count_like_one); ?> people like this</span><?php /* ?>Kavi Singh and 200 other liked<?php */ ?></div>
                                <?php if($totalcommentcount != "0"){ ?><div class="comments"><span class="totalcmt<?php echo $rows->visit_id; ?>"><?php echo $totalcommentcount; ?></span> Comments</div><?php } ?>
                            </div>
                        </div>
                        <div class="feedBottom">
                            <div class="likeShare d-flex align-items-center justify-content-between">
                                <div class="left">
                                   <a href="javascript:void(0)" class="link-dark like_post" <?php if($likeType){ ?>style="color:#009688;"<?php } ?> id="like-<?php echo $rows->visit_id; ?>" data-status="1" data-type="1" data-author="<?php echo $rows->user_id; ?>" data-postid="<?php echo $rows->visit_id; ?>"><span
                                            class="icon-star pr-2"></span>Like</a>
                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-comment pr-2"></span>Comment</a>
                                </div>
                                <div class="right">
                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-share-2 pr-2"></span>Share</a>
                                </div>
                            </div>
                            <!--<div class="seeComment my-3">
                                <a href="javascript:;" class="font-sm link-dark">See more comments</a>
                            </div>-->
                            <ul class="list-unstyled comment-list commentshow-<?php echo $rows->visit_id; ?>">
							<div class="sds<?php echo $rows->visit_id; ?>">
						<?php if(!empty($getallcomment)){
	      foreach($getallcomment['rows'] as $allcomment){
			  $getuser = $this->Common_model->getsingle("users",array("user_id" => $allcomment->user_id)); 
			  ?>
			   <span class="newflex<?php echo $allcomment->comment_visit_id; ?>"> 
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
									<div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_visit_id; ?>"><span class="icon-trash-2 trashcomment" data-commentid="<?php echo  $allcomment->comment_visit_id; ?>" data-postid="<?php echo $rows->visit_id; ?>"></span></a></div>
                                </li>
								</span>
								<?php }
							if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>
							
				<div class="seeComment my-3"><center style="text-align: left;color:black;"><a class="morevisitimage" data-postid="<?php echo $rows->visit_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></center></div>
							<?php }}else{ ?>
							
							<?php } ?>
                                </div>
                            </ul>
                           <form id="cmtform-<?php echo $rows->visit_id; ?>" data-postid="<?php echo $rows->visit_id; ?>" data-userid="<?php echo $this->session->userdata("userId")['user_id']; ?>" action="" method="post" >
                            <input type="hidden" name="postId" id="postId" value="<?php echo $rows->visit_id; ?>" >
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
                                    <input type="text" class="form-control newpostcomment post_comment-<?php echo $rows->visit_id; ?>" name="post_comment" id="post_comment" data-cmtid="<?php echo $rows->visit_id; ?>" value="" placeholder="Write a public comment">
                                    <button class="border-0 bg-transparent font-sm postVal_<?php echo $rows->visit_id; ?>" disabled id="postVal">Post</button>
                                </div>
                            </div>
							</form>
                        </div>
                    </div>
						<?php }} ?>