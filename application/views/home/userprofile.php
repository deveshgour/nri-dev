 <main class="main-content" id="mainContent">
        <div class="Re-userProfile text-50">
            <div class="commonSection">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="Re-userProfile__info bg-white">
                                <div class="Re-userProfile__info--card position-relative">
                                    <div class="c-pic">
                                        <?php if(!empty($foruserimage->user_image)){ ?>
											<img class="img-fluid h-100" src="<?php echo base_url(); ?>upload/<?php echo $foruserimage->user_image; ?>" >
											<?php }else{ ?>
                                                <img class="img-fluid h-100" src="<?php echo base_url(); ?>images/user_image.png" alt="img" width="100%">
                                            <?php } ?>
                                    </div>
                                    
                                    <div class="c-info">
                                        <h2 class="h2"><?php echo $userDetail->firstname.' '.$userDetail->lastname; ?></h2>
                                        <!--<p class="text-130">Frontend Developer</p>-->
                                    </div>
                                    <div class="coverletter">
                                        <div class="desc text-130">
                                            <ul class="list-unstyled">
                                                <li><?php echo $userDetail->email; ?></li>
                                                <?php if($userDetail->dob != "0000-00-00"){ ?><li><?php echo $userDetail->dob; ?></li><?php } ?>
                                                <?php if(!empty($userDetail->gender)){ ?><li><?php if($userDetail->gender == "1"){ echo "male"; }else{ echo "Female"; } ?></li><?php } ?>
                                                <?php if(!empty($userDetail->country_id)){ ?><li><?php echo $country_name->name; ?></li><?php } ?>
                                               
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="profile-tabs">
                                        <ul class="nav nav-tabs border-0" id="profile-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#photos" role="tab"
                                                    aria-controls="photos" aria-selected="false">Photos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#recentVisit" role="tab"
                                                    aria-controls="recentVisit" aria-selected="true">Recent Visits</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#post" role="tab"
                                                    aria-controls="post" aria-selected="true">Post</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#video" role="tab"
                                                    aria-controls="video" aria-selected="true">Video</a>
                                            </li>
                                        </ul>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 Re-userProfile--left">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="photos" role="tabpanel"
                                    aria-labelledby="profile-tabs">

                                    <h2>Photos</h2>
									<form id="userphotoform" name="userphotoform" action="<?php echo base_url(); ?>userphotoupload" method="post" enctype="multipart/form-data">
									<div>
									<input type="file" name="userphoto" id="userphoto" >
									<input type="submit" name="submit" id="submit" value="Upload" class="btn-primary" >
									</div><br/><br/>
									</form>
                                    <div class="tab-content-inner">
									
                                        <div class="row">
										<?php
										if(!empty($allphoto)){
                                               foreach($allphoto as $pictures){
											?>
                                            <div class="col-sm-3">
                                                <div class="photoBox mb-3">
                                                    <a href="javascript:void(0);">
                                                        <img src="<?php echo base_url(); ?>upload/<?php echo $pictures->photo; ?>" alt="trending"
                                                            class="img-fluid" />
                                                    </a>
                                                </div>
                                            </div>
										<?php }} ?>
                                            
                                        </div>
                                    </div>
                                </div>
								
								<div class="tab-pane fade" id="recentVisit" role="tabpanel"
                                    aria-labelledby="profile-tabs">	
									<h2>Recent Visit</h2>
								</div>
                                <div class="tab-pane fade feeds active show" id="post" role="tabpanel"
                                    aria-labelledby="profile-tabs">
                                    <h2>My Posts</h2>
                 <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success message">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <?php echo $this->session->flashdata('success'); ?></div>
                <?php }else{
				    if ( $this->session->flashdata( 'error_msg' ) ) { ?>
					<div class="alert alert-danger message">
					 <button type="button" class="close" data-dismiss="alert">x</button>
        <?php echo $this->session->flashdata('error_msg'); ?></div>
                <?php } } ?>
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
								<div class="singlepostdel"><a href="javascript:void(0);" id="delete_post" data-postid="<?php echo $row->post_id; ?>" class="postdel<?php echo $row->post_id; ?>"><span class="icon-trash-2"  data-postid="<?php echo $row->post_id; ?>"></span></a></div>
								<?php } ?>
                                            </div>

                                            <div class="feedImg mb-3">
                                                <div class="feedCaption">
                                                    <p><?php echo $row->post; ?> </p>
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
                                        <small><?php echo convert_time($allcomment->create_date,'F j, Y, g:i a'); ?></small>
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
							<div class="tab-pane fade" id="video" role="tabpanel"
                                    aria-labelledby="profile-tabs">
							   <h2>Videos</h2>
									<form id="uservideoform" name="uservideoform" action="<?php echo base_url(); ?>uservideoupload" method="post" enctype="multipart/form-data">
									<div>
									<input type="file" name="uservideo" id="uservideo" >
									<input type="submit" name="submit" id="submit" value="Upload" class="btn-primary" >
									</div><br/><br/>
									</form>
                                    <div class="tab-content-inner">
									
                                        <div class="row">
										<?php
										if(!empty($allvideo)){
                                               foreach($allvideo as $vedos){
											?>
                                            <div class="col-sm-3">
                                                <div class="photoBox mb-3">
                                                    <a href="javascript:void(0);">
                                                        <video controls width="100%" height="100%">
				  <source src="<?php echo base_url(); ?>upload/<?php echo $vedos->photo; ?>" type="video/mp4">
				</video>
                                                    </a>
                                                </div>
                                            </div>
										<?php }} ?>
                                            
                                        </div>
                                    </div>		
							</div>

                        </div></div>

                        <div class="col-lg-3 Re-userProfile--right">
                            <div class="conversationBox conversationBox--freind rounded-10 bg-white">
                                
                                <h4 class="font-sm mb-3">Friends</h4>
                              
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-1.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Pratima Singh</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-2.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Rashmi Singh Thakur</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-3.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Jaydeep Kunwar Thakur</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-1.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Pratima Singh</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-2.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Rashmi Singh Thakur</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-3.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Jaydeep Kunwar Thakur</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-1.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Pratima Singh</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-2.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Rashmi Singh Thakur</span>
                                            <span class="address">Vijay Nagar, Indore</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:;" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="images/user-3.png" alt="img">
                                            </div>
                                            <span class="font-sm name">Jaydeep Kunwar Thakur</span>
                                            <span class="address">Vijay Nagar, Indore</span>    
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>