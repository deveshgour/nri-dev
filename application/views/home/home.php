  <main class="main-content">
        <a href="javascript:;" class="d-xl-none chatIcon">
            <span class="icon-comment"></span>
        </a>
        <div class="row">
            <div class="col-lg-3">
                <div class="leftContent rounded-10 bg-white">
                    <ul class="list-unstyled leftContent__list mb-0">
                        <li class="collpaseContent">
                            <a class="collpase-toggle" data-toggle="collapse" href="#collapseList" aria-expanded="true">
                                Connect To Roots
                            </a>
                            <div class="collapse collapse-body show" id="collapseList">
                                <ul class="list-unstyled mb-0">
                                   <!-- <li><a href="javascript:;" onclick="feedsModal()">Feeds</a></li>-->
								   <?php
                                    if(!empty($connect_to_root)){
								   foreach($connect_to_root as $connect){ ?>
                                  <li><a href="<?php echo base_url(); ?>root_detail_list/<?php echo $connect->root_id; ?>"><?php echo $connect->connect_root; ?></a></li>
									<?php }} ?>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:;" onclick="mejorMisingModal()">Major Mising</a></li>
                        <li><a href="javascript:;" onclick="myRecentVisitModal()">My Recent Visit</a></li>
                        <li><a href="javascript:;" onclick="interestingFactsModal()">Interesting Facts</a></li>
                        <li><a href="javascript:;" onclick="">Upload Events</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-9">
                <div class="feeds">
				<form id="newuploadimage" action="" method="post" enctype="multipart/form-data">
                    <div class="feeds-search d-sm-flex align-items-center text-center rounded-10 bg-white">
					
                        <div class="d-flex align-items-center flex-1">
                            <div class="userImg rounded-circle overflow-hidden">
                               <?php if(!empty($foruserimage->user_image)){ ?>
											<img src="<?php echo base_url(); ?>upload/<?php echo $foruserimage->user_image; ?>" >
											<?php }else{ ?>
                                                <img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
                                            <?php } ?>
                            </div>
                            <div class="search">
                                <input type="text" class="form-control" name="post_value" id="post_value" placeholder="Write something here....">
                            </div>
                        </div>
						
                        <label class="mb-0 ripple-effect" for="uploadImage">
                            <input type="file" id="uploadImage" name="uploadImage">
                            <i class="icon-image-gallery"></i>
                        </label>
                       
						<button name="submit" type="submit" id="postdata"  class="btn btn-primary">Post</button>
						
                    </div>
					</form>
					<div class="newmain-post-sec" id="main-post-sec">
					<?php
					    if(!empty($post_data)){ 
						    $i = 1;
					        foreach($post_data as $row){ 
					?>
                    <div class="feed-box rounded-10" id="postdetail-<?php echo $row->post_id; ?>">
					
                        <div class="feedTop">
                            <div class="userInfo d-flex align-items-center">
                                <div class="userImg rounded-circle overflow-hidden" id="myData_<?php echo $i;?>">
								<?php if(!empty($row->user_image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $row->user_image; ?>" alt="img">
								<?php }else{ ?>
								<img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
								<?php } ?>
                                </div>
								
                                <div class="userInfo-text">
                                    <h6><?php echo $row->firstname.' '.$row->lastname; ?></h6>
                                    <?php /* ?><span>Yesterday at 4:54 PM</span><?php */ ?>
									<span><?php echo convert_time($row->date_added,'F j, Y, g:i a'); ?></span>
                                </div>
								<?php if($this->session->userdata('userId')['user_id'] == $row->user_id){ ?>
						
                                <div class="btn-group postActionMenu">
                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <em class="icon-more-vertical"></em>
                                    </button>
                                    <div class="dropdown-menu">
                                    <ul class="list-unstyled mb-0">
                                        <li> <a href="javascript:void(0);" id="delete_post" data-postid="<?php echo $row->post_id; ?>" class="postdel<?php echo $row->post_id; ?>"><span class="icon-trash-2"  data-postid="<?php echo $row->post_id; ?>"></span> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                               <?php } ?>
							</div>

                            <div class="feedImg mb-3">

                                <div class="feedCaption">
                                    <p><?php echo $row->post; ?>
                                    </p>
                                </div>
								<?php if($row->media_type == 'image'){ ?>
                                <img src="<?php echo base_url(); ?>upload/<?php echo $row->media_path; ?>" class="img-fluid w-100" alt="feed">
								<?php }elseif($row->media_type == 'video'){ ?>
								<video controls width="100%" height="100%">
				  <source src="<?php echo base_url(); ?>upload/<?php echo $row->media_path; ?>" type="video/mp4">
				</video>
								<?php } ?>
                            </div>
	<?php  
	    $likeType = $this->Common_model->getsingle('like', array('post_id' => $row->post_id,'status'=>1,'user_id' => $this->session->userdata('userId')['user_id'])); 
		$count_like_one = $this->Common_model->jointwotable('like', 'user_id', 'users', 'user_id',array('post_id' => $row->post_id,'like.status'=>1,'users.status'=>2),'users.user_id,users.firstname,users.lastname,like.like_id'); 
	//echo $this->db->last_query();die;
	$count_like_ss = $this->Common_model->joint($row->post_id);
	//echo '<pre>';print_r($count_like_ss); die;
	$totalcommentcount = $this->Common_model->countwhereuser("comment",array("post_id" => $row->post_id));
	?>						
							
                            <div class="d-flex justify-content-between">
                                <div id="likecountbox-<?php echo $row->post_id; ?>" class="font-sm" data-likecount="<?php echo COUNT($count_like_one); ?>" >  <span><?php echo COUNT($count_like_one); ?> people like this</span><?php /* ?>Kavi Singh and 200 other liked<?php */ ?></div>
                               <?php if($totalcommentcount != "0"){ ?><div class="comments"><span class="totalcmt<?php echo $row->post_id; ?>"><?php echo $totalcommentcount; ?></span> Comments</div><?php } ?>
                            </div>
                        </div>
                        <div class="feedBottom">
                            <div class="likeShare d-flex align-items-center justify-content-between">
                                <div class="left">
                                    <a href="javascript:void(0)" class="link-dark like_post" <?php if($likeType){ ?>style="color:#009688;"<?php } ?> id="like-<?php echo $row->post_id; ?>" data-status="1" data-type="1" data-author="<?php echo $row->user_id; ?>" data-postid="<?php echo $row->post_id; ?>"><span
                                            class="icon-like pr-2"></span>Like</a>
			<?php /*if($likeType){ ?><a class="like_post" id="like-<?php echo $row->post_id; ?>" style="color:#009688;" href="javascript:void(0)" data-status="1" data-type="1" data-author="<?php echo $row->user_id; ?>" data-postid="<?php echo $row->post_id; ?>" ><i class="fa fa-thumbs-up"></i>Like</a> <?php }else{ ?> <a class="like_post" id="like-<?php echo $row->post_id; ?>" href="javascript:void(0)" data-type="1" data-postid="<?php echo $row->post_id; ?>" data-author="<?php echo $row->user_id; ?>" data-status="1"><i class="fa fa-thumbs-up"></i>Like</a> <?php } */?>
          
		  
		  

											
                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-comment pr-2"></span>Comment</a>
                                </div>
                                <div class="right">
                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-share-2 pr-2"></span>Share</a>
                                </div>
                            </div>
                            <!--<div class="seeComment my-3">
                                <a href="javascript:;" class="font-sm link-dark sds<?php //echo $row->post_id; ?>">See more comments</a>
                            </div>-->
                            <ul class="list-unstyled comment-list commentshow-<?php echo $row->post_id; ?>">
							<div class="sds<?php echo $row->post_id; ?>">
							<?php
$getallcomment = $this->Common_model->commentpagination(array("post_id" => $row->post_id),3,0,"comment_id", "desc");
							if(!empty($getallcomment)){
	      foreach($getallcomment['rows'] as $allcomment){
			  $getuser = $this->Common_model->getsingle("users",array("user_id" => $allcomment->user_id)); ?>
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
                                        <small>2 hours</small>
                                        <p><?php echo $allcomment->comment; ?></p>
                                    </div>
									<div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="icon-trash-2 trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $row->post_id; ?>"></span></a></div>
                               
							   </li>
							   </span>
							<?php }
							if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>
							
				<div class="seeComment my-3"><center style="text-align: left;color:black;"><a class="moreimage" data-postid="<?php echo $row->post_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></center></div>
							<?php }}else{ ?>
							
							<?php } ?>
							</div>
                             
                            </ul>
							<form id="cmtform-<?php echo $row->post_id; ?>" data-postid="<?php echo $row->post_id; ?>" data-userid="<?php echo $this->session->userdata("userId")['user_id']; ?>" action="" method="post" >
                            <input type="hidden" name="postId" id="postId" value="<?php echo $row->post_id; ?>" >
							<input type="hidden" name="userIds" id="userIds" value="<?php echo $this->session->userdata("userId")['user_id']; ?>" >
							<div class="postComment d-flex align-items-center pt-2">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <?php if(!empty($row->user_image)){ ?>
                                        <img src="<?php echo base_url(); ?>upload/<?php echo $row->user_image; ?>" alt="user">
									<?php }else{ ?>
									    <img src="<?php echo base_url(); ?>images/user_image.png" alt="user">
									<?php } ?>
                                </div>
                                <div class="inputBox position-relative">
                                    <input type="text" class="form-control post_comment-<?php echo $row->post_id; ?>" name="post_comment" id="post_comment" value="" placeholder="Write a public comment">
                                    <button class="border-0 bg-transparent font-sm" disabled id="postVal">Post</button>
                                </div>
                            </div>
							</form>
                        </div>
						
                    </div>
						<?php }
						}else{ ?>
						No Record Found
						<?php } ?>
                    
					</div>
                </div>
            </div>
            <div class="col-md-3 rightContent">
                <div class="conversationBox rounded-10 bg-white">
                    <div class="text-right d-xl-none">
                        <a href="javscript:;" class="closeChat link-dark"><span class="icon-plus1"></span></a>
                    </div>
                    <h4 class="font-sm mb-3">Conversations</h4>
                    <a href="javascript:;" class="d-flex align-items-center font-sm createGroup">
                        <span class="icon-plus1"></span>
                        <div class="flex-1">Create New Group</div>
                    </a>
                    <div class="searchBox position-relative">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="icon-search1"></span>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-1.png" alt="img">
                                </div>
                                <span class="font-sm">Pratima Singh</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-2.png" alt="img">
                                </div>
                                <span class="font-sm">Rashmi Singh Thakur</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-3.png" alt="img">
                                </div>
                                <span class="font-sm">Jaydeep Kunwar Thakur</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-1.png" alt="img">
                                </div>
                                <span class="font-sm">Pratima Singh</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-2.png" alt="img">
                                </div>
                                <span class="font-sm">Rashmi Singh Thakur</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-3.png" alt="img">
                                </div>
                                <span class="font-sm">Jaydeep Kunwar Thakur</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-1.png" alt="img">
                                </div>
                                <span class="font-sm">Pratima Singh</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-2.png" alt="img">
                                </div>
                                <span class="font-sm">Rashmi Singh Thakur</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <img src="<?php echo base_url(); ?>images/user-3.png" alt="img">
                                </div>
                                <span class="font-sm">Jaydeep Kunwar Thakur</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
	