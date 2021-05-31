
  <style>
.tooltips {
  position: relative;
 
  
}

.tooltips .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltips:hover .tooltiptext {
  visibility: visible;
}
</style>
  
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
                        <li><a href="<?php echo base_url(); ?>major_missing" >Major Mising</a></li>
                        <li><a href="<?php echo base_url(); ?>recent_visit">My Recent Visit</a></li>
                        <li><a href="<?php echo base_url(); ?>fact_list">Interesting Facts</a></li>
                        <li><a href="<?php echo base_url(); ?>event" onclick="">Upload Events</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-9">
			<h2>Events</h2>
			<?php if(!empty($this->session->flashdata('message'))){ $message = $this->session->flashdata('message'); ?>
						<div class="alert alert-success message">
					 <button type="button" class="close" data-dismiss="alert">x</button>
        <?php echo $message; ?></div><?php } ?>
                <div class="feeds">
				<form id="eventuploadimage" action="" method="post" enctype="multipart/form-data">
                    <div class="feeds-search d-sm-flex align-items-center text-center rounded-10 bg-white">
					
                        <div class="d-flex align-items-center flex-1">
                            <div class="userImg rounded-circle overflow-hidden">
                               <?php if(!empty($foruserimage->user_image)){ ?>
											<img src="<?php echo base_url(); ?>upload/<?php echo $foruserimage->user_image; ?>" >
											<?php }else{ ?>
                                                <img src="<?php echo base_url(); ?>images/user_image.png" alt="img" width="100%">
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
                       
						<button name="submit" type="submit" id="eventdata"  class="btn btn-primary">Post</button>
						<a href="javascript:;" onclick="eventModal()">Tag friend</a>
						
                    </div>
					
					<div class="modal" tabindex="-1" role="dialog" id="eventModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tag friends</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
								
                       <?php  
					   $where_q = "(friend.friend_user_id = ".$this->session->userdata('userId')['user_id']." or friend.user_id = ".$this->session->userdata('userId')['user_id'].") and request_status = 1";
                       $query_q = $this->Common_model->jointwotable('friend','friend_user_id','users','user_id',$where_q,'users.firstname,users.lastname,friend.friend_user_id,friend.user_id,friend.friend_id');
                       
									 
									 if(!empty($query_q)){
										foreach($query_q as $qss)
										{ 
											if($qss->friend_user_id == $this->session->userdata('userId')['user_id'])
											  { 
												   $qrp = $this->Common_model->getsingle('users',array('user_id' => $qss->user_id));
												   $country_name = $this->Common_model->getsingle('country',array('id' => $qrp->country_id));	
                                                     if(!empty($qrp->user_image)){
                                                      $img = base_url().'upload/'.$qrp->user_image;
													 }else{
                                                      $img = base_url().'images/user_image.png';
													 }														 
												   ?>
												   <div class="tag-data">
										<input type="checkbox" id="tag_friend" name="tag_friend[]" value="<?php echo $qrp->user_id; ?>" >
										
										<!--<label for="coding">--><a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>" ><img class="rounded-circle tag-img" src="<?php echo $img; ?>" width="50px" height="50px" style="object-fit:cover"><?php echo $qrp->firstname.' '.$qrp->lastname; ?></a><!--</label>-->
									 </div>
											<?php   }elseif($qss->user_id == $this->session->userdata('userId')['user_id']){ 
											$qrp = $this->Common_model->getsingle('users',array('user_id' => $qss->friend_user_id));
					                        $country_name = $this->Common_model->getsingle('country',array('id' => $qrp->country_id));
											if(!empty($qrp->user_image)){
                                                      $img = base_url().'upload/'.$qrp->user_image;
													 }else{
                                                      $img = base_url().'images/user_image.png';
													 }
											?>	
                                     <div class="tag-data">
										<input type="checkbox" id="tag_friend" name="tag_friend[]" value="<?php echo $qrp->user_id; ?>" >
										
										<!--<label for="coding">--><a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>"><img class="rounded-circle tag-img" src="<?php echo $img; ?>" width="50px" height="50px" style="object-fit:cover"><?php echo $qrp->firstname.' '.$qrp->lastname; ?></a><!--</label>-->
									 </div>											
										<?php }
										}
									 }
									   ?>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Post</button>
								
								</div>
							</div>
						</div>
					</div>
					</form>
					<div class="newmain-post-sec" id="main-post-sec">
					<?php 
					    if(!empty($post_data)){ 
						    $i = 1;
					        foreach($post_data as $row){ 
							
							$record_for_tag = explode(",",$row->tag_friends);
							
							$tag_value = '';
							$count_tag_val = '';
							$string_tag = '';
							if(!empty($record_for_tag)){
							foreach($record_for_tag as $tags){
								$tag_data = $this->Common_model->getsingle("users",array("user_id"=>$tags),"user_id","asc");								
								$tag_value .= $tag_data->firstname.' '.$tag_data->lastname.',';
								
							    }
							}
						
							 $tag_frnd_val = rtrim($tag_value,',');
							if(!empty($row->tag_friends)){
							$count_tag_val = count(explode(",",$tag_frnd_val));
							$firstname_tag = explode(",",$tag_frnd_val);
							if($count_tag_val >1){
							  $minus_firstname = $count_tag_val-1;							
							  $string_tag = $row->firstname.' '.$row->lastname.'<span class="tooltips">'.' is with '.$firstname_tag[0].' and '. $minus_firstname.' other'.'<span class="tooltiptext tag_tooltip">'.$tag_frnd_val.'</span> </span>';
							}elseif($count_tag_val == 1){
							  $string_tag = $row->firstname.' '.$row->lastname.' is with '.$firstname_tag[0];
							}
							}else{
							  $string_tag = $row->firstname.' '.$row->lastname;	
							}
							
					?>
                    <div class="feed-box rounded-10" id="postdetail-<?php echo $row->event_id; ?>">
					
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
                                    <h6><?php echo $string_tag; ?> </h6>
									
                                    <?php /* ?><span>Yesterday at 4:54 PM</span><?php */ ?>
									<span><?php echo convert_time($row->date_added,'F j, Y, g:i a'); ?></span>
                                </div>
								<?php if($this->session->userdata('userId')['user_id'] == $row->user_id){ ?>
								<div class="singlepostdel"><a href="javascript:void(0);" id="delete_event" data-postid="<?php echo $row->event_id; ?>" class="eventdel<?php echo $row->event_id; ?>"><span class="icon-trash-2"  data-postid="<?php echo $row->event_id; ?>"></span></a></div>
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
	    $likeType = $this->Common_model->getsingle('like_event', array('event_id' => $row->event_id,'status'=>1,'user_id' => $this->session->userdata('userId')['user_id'])); 
		$count_like_one = $this->Common_model->jointwotable('like_event', 'user_id', 'users', 'user_id',array('event_id' => $row->event_id,'like_event.status'=>1,'users.status'=>2),'users.user_id,users.firstname,users.lastname,like_event.like_event_id'); 
	//echo $this->db->last_query();die;
	$count_like_ss = $this->Common_model->joint_event($row->event_id);
	//echo '<pre>';print_r($count_like_ss); die;
	$totalcommentcount = $this->Common_model->countwhereuser("comment_event",array("event_id" => $row->event_id));
	?>						
							
                            <div class="d-flex justify-content-between">
                                <div id="likecountbox-<?php echo $row->event_id; ?>" class="font-sm" data-likecount="<?php echo COUNT($count_like_one); ?>" >  <span><?php echo COUNT($count_like_one); ?> people like this</span><?php /* ?>Kavi Singh and 200 other liked<?php */ ?></div>
                               <?php if($totalcommentcount != "0"){ ?><div class="comments"><span class="totalcmt<?php echo $row->event_id; ?>"><?php echo $totalcommentcount; ?></span> Comments</div><?php } ?>
                            </div>
                        </div>
                        <div class="feedBottom">
                            <div class="likeShare d-flex align-items-center justify-content-between">
                                <div class="left">
                                    <a href="javascript:void(0)" class="link-dark like_event" <?php if($likeType){ ?>style="color:#009688;"<?php } ?> id="like-<?php echo $row->event_id; ?>" data-status="1" data-type="1" data-author="<?php echo $row->user_id; ?>" data-postid="<?php echo $row->event_id; ?>"><span
                                            class="icon-star pr-2"></span>Like</a>
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
                            <ul class="list-unstyled comment-list commentshow-<?php echo $row->event_id; ?>">
							<div class="sds<?php echo $row->event_id; ?>">
							<?php
$getallcomment = $this->Common_model->commentpaginationevent(array("event_id" => $row->event_id),3,0,"comment_event_id", "desc");
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
                                        <small><?php echo convert_time($allcomment->create_date,'F j, Y, g:i a'); ?></small>
                                        <p><?php echo $allcomment->comment; ?></p>
                                    </div>
									<div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_event_id; ?>"><span class="icon-trash-2 trasheventcomment" data-commentid="<?php echo  $allcomment->comment_event_id; ?>" data-postid="<?php echo $row->event_id; ?>"></span></a></div>
                               
							   </li>
							   </span>
							<?php }
							if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>
							
				<div class="seeComment my-3"><center style="text-align: left;color:black;"><a class="moreeventimage" data-postid="<?php echo $row->event_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></center></div>
							<?php }}else{ ?>
							
							<?php } ?>
							</div>
                             
                            </ul>
							<form id="cmteventform-<?php echo $row->event_id; ?>" data-postid="<?php echo $row->event_id; ?>" data-userid="<?php echo $this->session->userdata("userId")['user_id']; ?>" action="" method="post" >
                            <input type="hidden" name="postId" id="postId" value="<?php echo $row->event_id; ?>" >
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
                                    <input type="text" class="form-control newpostcomment post_comment-<?php echo $row->event_id; ?>" name="post_comment" id="post_comment" data-cmtid="<?php echo $row->event_id; ?>" value="" placeholder="Write a public comment">
                                    <button class="border-0 bg-transparent font-sm postVal_<?php echo $row->event_id; ?>" disabled id="postVal">Post</button>
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
        <?php $this->load->view('home/create_group'); ?>
        </div>
    </main>
	
	
	