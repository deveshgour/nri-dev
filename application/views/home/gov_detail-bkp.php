<main class="main-content">
        <a href="javascript:;" class="d-none d-xl-none d-lg-block chatIcon">
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
                        <li><a href="<?php echo base_url(); ?>event">Upload Events</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-9">
			<h2>Lets Gov</h2>
                <div class="feeds">
				<form id="newuploadimage" action="" method="post" enctype="multipart/form-data">
                    <div class="feeds-search d-sm-flex align-items-center text-center rounded-10 bg-white">
                        <div class="d-flex align-items-center flex-1">
                            <div class="userImg rounded-circle overflow-hidden">
                                <?php if(!empty($userDetail->user_image)){ ?>
											<img src="<?php echo base_url(); ?>upload/<?php echo $userDetail->user_image; ?>" >
											<?php }else{ ?>
                                                <img src="<?php echo base_url(); ?>images/user_image.png" alt="img" width="100%">
                                            <?php } ?>
                            </div>
                            <div class="search">
                                <input type="text" class="form-control" name="post_value" id="post_value" placeholder="Write something here....">
                            </div>
                            <label class="mb-0 ripple-effect" for="uploadImage">
                            <input type="file" id="uploadImage" name="uploadImage">
                            <i class="icon-image-gallery"></i>
                        </label>
                        </div>
                       
                        <button name="submit" type="submit" id="postdata"  class="btn btn-primary">Post</button>
                    </div>
					</form>
                    <div class="feed-box rounded-10 bg-white">
                        <div class="feedTop">
                            <div class="userInfo d-flex align-items-center">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <?php if(!empty($detail->image)){ ?>
									    <img src="<?php echo base_url(); ?>upload/<?php echo $detail->image; ?>" alt="img">
									<?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>images/buzz_default.jpg" alt="img">
									<?php } ?>
                                </div>
                               <div class="userInfo-text">
                                    <h6><?php echo $detail->title; ?></h6>
                                    <?php /* ?><span>Yesterday at 4:54 PM</span><?php */ ?>
									<span><?php echo convert_time($detail->create_date,'F j, Y, g:i a'); ?></span>
                                </div>
                            </div>

                            <div class="feedImg mb-3">

                                <div class="feedCaption">
                                    <p><?php echo $detail->description; ?>
									
                                    </p>
									<p>URL : <a href="<?php echo $detail->url; ?>" target ="_blank"><?php echo $detail->url; ?></a></p>
                                </div>
                               
                            </div>
                           <?php  
	    $likeType = $this->Common_model->getsingle('like_gov', array('gov_id' => $detail->gov_id,'status'=>1,'user_id' => $this->session->userdata('userId')['user_id'])); 
		$count_like_one = $this->Common_model->jointwotable('like_gov', 'user_id', 'users', 'user_id',array('gov_id' => $detail->gov_id,'like_gov.status'=>1,'users.status'=>2),'users.user_id,users.firstname,users.lastname,like_gov.like_gov_id'); 
	//echo $this->db->last_query();die;
	$count_like_ss = $this->Common_model->joint_gov($detail->gov_id);
	
	$totalcommentcount = $this->Common_model->countwhereuser("comment_gov",array("gov_id" => $detail->gov_id));
	?>						
							
                            <div class="d-flex justify-content-between">
                                <div id="likecountbox-<?php echo $detail->gov_id; ?>" class="font-sm" data-likecount="<?php echo COUNT($count_like_one); ?>" >  <span><?php echo COUNT($count_like_one); ?> people like this</span><?php /* ?>Kavi Singh and 200 other like_govd<?php */ ?></div>
                               <?php if($totalcommentcount != "0"){ ?><div class="comments"><span class="totalcmt<?php echo $detail->gov_id; ?>"><?php echo $totalcommentcount; ?></span> Comments</div><?php } ?>
                            </div>
                        </div>
                       <div class="feedBottom">
                            <div class="likeShare d-flex align-items-center justify-content-between">
                                <div class="left">
                               <a href="javascript:void(0)" class="link-dark like_gov" <?php if($likeType){ ?>style="color:#009688;"<?php } ?> id="like-<?php echo $detail->gov_id; ?>" data-status="1" data-type="1" data-author="<?php echo $detail->user_id; ?>" data-postid="<?php echo $detail->gov_id; ?>">
							   <span class="icon-star pr-2"></span>Like</a>
			<?php /*if($like_govType){ ?><a class="like_gov_post" id="like_gov-<?php echo $detail->gov_id; ?>" style="color:#009688;" href="javascript:void(0)" data-status="1" data-type="1" data-author="<?php echo $detail->user_id; ?>" data-postid="<?php echo $detail->gov_id; ?>" ><i class="fa fa-thumbs-up"></i>like_gov</a> <?php }else{ ?> <a class="like_gov_post" id="like_gov-<?php echo $detail->gov_id; ?>" href="javascript:void(0)" data-type="1" data-postid="<?php echo $detail->gov_id; ?>" data-author="<?php echo $detail->user_id; ?>" data-status="1"><i class="fa fa-thumbs-up"></i>like_gov</a> <?php } */?>
          
		  
		  

											
                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-comment pr-2"></span>Comment</a>
                                </div>
                                <div class="right">
                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-share-2 pr-2"></span>Share</a>
                                </div>
                            </div>
                            <!--<div class="seeComment my-3">
                                <a href="javascript:;" class="font-sm link-dark sds<?php //echo $detail->gov_id; ?>">See more comments</a>
                            </div>-->
                            <ul class="list-unstyled comment-list commentshow-<?php echo $detail->gov_id; ?>">
							<div class="sds<?php echo $detail->gov_id; ?>">
							<?php
$getallcomment = $this->Common_model->commentpaginationgov(array("gov_id" => $detail->gov_id),3,0,"comment_gov_id", "desc");
							if(!empty($getallcomment['rows'])){
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
									<?php if($allcomment->user_id == $this->session->userdata('userId')['user_id']){ ?><div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_gov_id; ?>"><span class="icon-trash-2 trashgovcomment" data-commentid="<?php echo  $allcomment->comment_gov_id; ?>" data-postid="<?php echo $detail->gov_id; ?>"></span></a></div><?php } ?>
                               
							   </li>
							   </span>
							<?php }
							if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>
							
				<div class="seeComment my-3"><center style="text-align: left;color:black;"><a class="moregovimage" data-postid="<?php echo $detail->gov_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></center></div>
							<?php }}else{ ?>
							
							<?php } ?>
							</div>
                             
                            </ul>
							<form id="cmtgovform-<?php echo $detail->gov_id; ?>" data-postid="<?php echo $detail->gov_id; ?>" data-userid="<?php echo $this->session->userdata("userId")['user_id']; ?>" action="" method="post" >
                            <input type="hidden" name="postId" id="postId" value="<?php echo $detail->gov_id; ?>" >
							<input type="hidden" name="userIds" id="userIds" value="<?php echo $this->session->userdata("userId")['user_id']; ?>" >
							<div class="postComment d-flex align-items-center pt-2">
                                <div class="userImg rounded-circle overflow-hidden">
                                    <?php if(!empty($detail->user_image)){ ?>
                                        <img src="<?php echo base_url(); ?>upload/<?php echo $detail->user_image; ?>" alt="user">
									<?php }else{ ?>
									    <img src="<?php echo base_url(); ?>images/user_image.png" alt="user">
									<?php } ?>
                                </div>
                                <div class="inputBox position-relative">
                                    <input type="text" class="form-control newpostcomment post_comment-<?php echo $detail->gov_id; ?>" name="post_comment" id="post_comment" data-cmtid="<?php echo $detail->gov_id; ?>" value="" placeholder="Write a public comment">
                                    <button class="border-0 bg-transparent font-sm postVal_<?php echo $detail->gov_id; ?>" disabled id="postVal">Post</button>
                                </div>
                            </div>
							</form>
                        </div>
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
                                    <img src="images/user-1.png" alt="img">
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