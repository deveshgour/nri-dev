
<style>



.modalnew {
  display: none; 
 
  background-color: rgb(0,0,0); 
  
}
/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
 
  max-width: 700px;
 
}



/* The Close Button */
.closenew {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #fff;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
  opacity: 1.5;
}

.closenew:hover,
.closenew:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

.closenew {
    float: right;
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1;
    
    text-shadow: 0 1px 0 #fff;
   
}
.modalnew {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
}
.fade.show {
    visibility: visible;
}
.fade {
    visibility: hidden;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}
</style>
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
                                  <?php
									 $permanent_address = $this->Common_model->getsingle("country",array("id" => $foruserimage->permanent_country));
                                     $local_address = $this->Common_model->getsingle("country",array("id" => $foruserimage->local_country));		
									 ?>
                                    <div class="coverletter">
                                        <div class="desc text-130">
                                            <ul class="list-unstyled">
                                                <li><?php echo $userDetail->email; ?></li>
                                                <?php if($userDetail->dob != "0000-00-00"){ ?><li><?php echo $userDetail->dob; ?></li><?php } ?>
                                                <?php if(!empty($userDetail->gender)){ ?><li><?php if($userDetail->gender == "1"){ echo "male"; }else{ echo "Female"; } ?></li><?php } ?>
                                                <?php if(!empty($userDetail->permanent_country)){ ?><li><?php echo '<b>Permanent Country:</b> '. $permanent_address->name; ?></li><?php } ?>
												<?php if(!empty($userDetail->permanent_country)){ ?><li><?php echo '<b>Permanent Address:</b> '. $foruserimage->permanent_address; ?></li><?php } ?>
												<?php if(!empty($userDetail->local_country)){ ?><li><?php echo '<b>Current Country:</b> '. $local_address->name; ?></li><?php } ?>
												<?php if(!empty($userDetail->local_country)){ ?><li><?php echo '<b>Current Address:</b> '. $foruserimage->local_address; ?></li><?php } ?>
                                               
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
                                                <a class="nav-link" href="<?php echo base_url(); ?>recent_visit" >Recent Visits</a>
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
                                                    <a href="javascript:void(0);" class="pop" data-img-id="<?php echo $pictures->image_id; ?>">
                                                        <img data-target="#modlcls_<?php echo $pictures->image_id; ?>" data-toggle="modal" src="<?php echo base_url(); ?>upload/<?php echo $pictures->photo; ?>" alt="trending"
                                                            class="img-fluid myImg" />
                                                    </a>
                                                </div>
                                            </div>
											<div id="modlcls_<?php echo $pictures->image_id; ?>" data-img-id="<?php echo $pictures->image_id; ?>" class="modalnew">
												  <span class="closenew" data-img-id="<?php echo $pictures->image_id; ?>">&times;</span>
												  <img class="modal-content imagepreview<?php echo $pictures->image_id; ?>" src="" id="img01">
												  
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
                                            <label class="mb-0 ripple-effect" for="uploadImage">
                                             <input type="file" id="uploadImage" name="uploadImage">
                                            <i class="icon-image-gallery"></i>
                                        </label>
                                        </div>
                                       
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

                                        <li><a href="javascript:void(0);" data-target="#editPost_<?php echo $row->post_id ?>" data-toggle="modal"><span class="icon-edit-2"></span>  Edit Post</a></li>

                                        </ul>

                                    </div>

                                </div>

                                <!-------------------------------Edit post------------------------------- -->

<div class="modal fade" id="editPost_<?php echo $row->post_id; ?>" tabindex="-1" role="dialog" 

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

                    Edit Post

                </h4>

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">
                   

                    <div class='form-group'>

                       <textarea rows="3" class="form-control h-150" name="edit_post" id="edit_post_<?php echo $row->post_id; ?>"><?php echo $row->post; ?></textarea>    

					   </div>

               

			

			 <div class="text-center"> 

			<button type="submit" data-post-id = "<?php echo $row->post_id; ?>" name="editpost_submit" id="editpost_submit" class=' btn btn-primary submit-button mr-2'>Submit</button>

			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>
                                </div>
			

			

			</div>

        </div>

    </div>

</div>

<!----------------------------------------------------------------------------------------------------------------------------- -->
								<?php } ?>
                                            </div>

                                            <div class="feedImg mb-3">
                                                <div class="feedCaption">
                                                    <p id="edit_post_text_<?php echo $row->post_id; ?>"><?php echo $row->post; ?>
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
                                            class="icon-star pr-2"></span>Like</a>
                                                    <a href="javascript:;" class="link-dark"><span
                                            class="icon-comment pr-2"></span>Comment</a>
                                                </div>
                                                <div class="right">

                                <div class="dropdown shareDropdown">
								
                                <a href="javascript:;" class="link-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span

                                    class="icon-share-2 pr-2"></span>Share</a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       <!-- <a class="dropdown-item" href="#"><em class="icon-facebook"></em> Facebook</a>-->
									 <?php  $url = urlencode(base_url().'userprofile'); ?>
									 <a class="dropdown-item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?s=100&p[title]=&p[url]=http://www.nriarena.com/userprofile/&p[images][0]=<?php echo base_url().'upload/'.$row->media_path; ?>"><em class="icon-facebook"></em>Facebook </a>
										<!--<a class="dropdown-item" href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=Title&p%5Burl%5D=http://www.ideocentro.com">Share on Facebook</a>
                                        <a class="dropdown-item" href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=Title&p%5Bsummary%5D=Test%20Summary.&p%5Burl%5D=http://www.ideocentro.com/&p%5Bimages%5D%5B0%5D=https://static.e-junkie.com/sslpic/64332.ed95f53b41bc4885dd86e2b485f08a3b.jpg" >Share on Facebook</a>-->
										<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php echo $row->post; ?>&url=<?php echo base_url().'userprofile'; ?>"><em class="icon-twitter"></em> Twitter</a>
                                        <!--<a class="dropdown-item" href="#"><em class="icon-instagram"></em> Instagram</a>-->
                                        <a class="dropdown-item" href="#"><em class="icon-whatsapp"></em> Whatsapp</a>
										
                                    </div> 
                                    </div>

                                   

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

                                        <small><?php echo convert_time($allcomment->create_date,'F j, Y, g:i a'); ?></small>

                                        <p class="edit_comment_text_<?php echo $allcomment->comment_id; ?>"><?php echo $allcomment->comment; ?></p>
							 <b><a href="javascript:;" class="link-dark replyshow" data-commentid="<?php echo  $allcomment->comment_id; ?>">Reply</a></b>

										<b><a href="javascript:void(0)" class="link-dark comment_like_post" <?php if($getmylikecomment){ ?><?php } ?> id="likecomment-<?php echo $allcomment->comment_id; ?>" data-status="1" data-type="1" data-author="<?php echo $allcomment->user_id; ?>" data-postid="<?php echo $allcomment->post_id; ?>" data-commentid="<?php echo $allcomment->comment_id; ?>">

							   <span class="cmtdivcls" id="likecommentcountbox-<?php echo $allcomment->comment_id; ?>"><span class="cmtspan"><?php echo count($comment_like_count); ?></span></span> Like</a></b>



										<!----------------------------show reply comment---------------------------- -->

										<?php $reply_comment = $this->Common_model->getAllwhereorder("reply_comment",array("comment_id" => $allcomment->comment_id),"reply_id","asc"); 

										      

											  											      // echo "<pre>";print_r($reply_comment);die;

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

										<b><a href="javascript:void(0)" class="link-dark comment_like_post" <?php if($getmyreplylikecomment){ ?>style="color:#009688;"<?php } ?> id="likereplycomment-<?php echo $reply_val->reply_id; ?>" data-status="1" data-postid="<?php echo $reply_val->post_id; ?>" data-commentid="<?php echo $reply_val->comment_id; ?>" data-replycommentid="<?php echo $reply_val->reply_id; ?>">

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

                                        <li> <a href="javascript:void(0);" id="deletereplyComment" data-replycommentid="<?php echo  $reply_val->reply_id; ?>" data-commentid="<?php echo  $reply_val->comment_id; ?>"><span class="del trashreplycomment" data-replycommentid="<?php echo  $reply_val->reply_id; ?>" data-commentid="<?php echo  $reply_val->comment_id; ?>" data-postid="<?php echo $row->post_id; ?>">Delete</span></a></li>

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

                                    <input type="text" class="form-control replycmtval_<?php echo $allcomment->comment_id; ?>" name="reply_comment" id="reply_comment" data-post_id="<?php echo $row->post_id; ?>" data-comment_id="<?php echo $allcomment->comment_id; ?>" data-comment_user_id="<?php echo $allcomment->user_id; ?>" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>" value="" placeholder="Write a public comment">

                                   <button class="border-0 bg-transparent replyCmt font-sm replyCombtn_<?php echo $allcomment->comment_id; ?>" id="postVal" data-post_id="<?php echo $row->post_id; ?>" data-comment_id="<?php echo $allcomment->comment_id; ?>" data-comment_user_id="<?php echo $allcomment->user_id; ?>" data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>">Post</button>

                                </div>

									<!------------------------------post button reply button-------------------------- -->	

                                    </div>

									<?php /* ?><div><a href="javascript:void(0);" id="deleteComment" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="icon-trash-2 trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $row->post_id; ?>"></span></a></div><?php */ ?>

                                <!-------------------------------------------------------comment edit and delete dropdown--------------------- -->

							   <?php if($allcomment->user_id == $this->session->userdata('userId')['user_id']){ ?>

							   <div class="btn-group postActionMenu">

                                    <button type="button" class="btn btn-secondary dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <em class="icon-more-vertical"></em>

                                    </button>

                                    <div class="dropdown-menu">

                                    <ul class="list-unstyled mb-0">

                                                                                <li> <a class="trashcomments<?php echo  $allcomment->comment_id; ?>" href="javascript:void(0);" id="deleteComment" data-postid="<?php echo $row->post_id; ?>" data-commentid="<?php echo  $allcomment->comment_id; ?>"><span class="del trashcomment" data-commentid="<?php echo  $allcomment->comment_id; ?>" data-postid="<?php echo $row->post_id; ?>">Delete</span></a></li>



                                        

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

                    Edit Post

                </h4>

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

			

		

                   

                    <div class='form-group'>

                       <textarea rows="3" class="form-control" name="edit_comment" id="edit_comment_<?php echo $allcomment->comment_id; ?>"><?php echo $allcomment->comment; ?></textarea>    

					   </div>

                  

			

			  <div class="text-center">

			<button type="submit" data-comment-id = "<?php echo $allcomment->comment_id; ?>" name="editcomment_submit" id="editcomment_submit" class=' btn btn-primary submit-button mr-2' >Submit</button>

			 <button type="button" class='btn btn-primary submit-button' data-dismiss="modal">Close</button>

                               </div>

			

			</div>

        </div>

    </div>

</div>

<!----------------------------------------------------------------------------------------------------------------------------- -->

							  

							   </span>
							<?php }
							if($getallcomment['num_rows'] > count($getallcomment['rows'])){ ?>
							
				<div class="seeComment my-3 text-center"><a class="moreimage" data-postid="<?php echo $row->post_id; ?>" data-page="1" href="javascript:void(0);">See more comments</a></div>
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
                                    <input type="text" class="form-control newpostcomment post_comment-<?php echo $row->post_id; ?>" name="post_comment" id="post_comment" data-cmtid="<?php echo $row->post_id; ?>" value="" placeholder="Write a public comment">
                                    <button class="border-0 bg-transparent font-sm postVal_<?php echo $row->post_id; ?>" disabled id="postVal">Post</button>

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
                        
                        <?php       
 $where_q = "(friend.friend_user_id = ".$this->session->userdata('userId')['user_id']." or friend.user_id = ".$this->session->userdata('userId')['user_id'].") and request_status = 1";
 $query_q = $this->Common_model->jointwotablenum('friend','friend_user_id','users','user_id',$where_q,'users.firstname,users.lastname,friend.friend_user_id,friend.user_id,friend.friend_id','3');

 ?>

                        <div class="col-lg-3 Re-userProfile--right">
                            <div class="conversationBox conversationBox--freind rounded-10 bg-white">
                                
                                <h4 class="font-sm mb-3">Friends</h4>
                              
                               <ul class="list-inline mb-0">
                                   
									 <?php 
									 
									 if(!empty($query_q)){
				foreach($query_q as $qss)
				{ ?>
            <?php if($qss->user_id == $this->session->userdata('userId')['user_id'])
					{ 
					   $qrp = $this->Common_model->getsingle('users',array('user_id' => $qss->friend_user_id));
					   $country_name = $this->Common_model->getsingle('country',array('id' => $qrp->country_id));
					   
					   ?>
            <?php if(!empty($qrp->user_image)){ ?>
            
			<li class="list-inline-item">
                                        <a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $qrp->user_image; ?>" alt="img" title="<?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?>">
                                            </div>
                                            <span class="font-sm name"><?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?></span>
                                            <span class="address"><?php echo $country_name->name; ?></span>
                                        </a>
                                    </li>
			<?php }else{ ?>
           
                              <li class="list-inline-item">
                                        <a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="<?php echo base_url(); ?>images/user_image.png" alt="img" title="<?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?>">
                                            </div>
                                            <span class="font-sm name"><?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?></span>
                                            <span class="address"><?php echo $country_name->name; ?></span>
                                        </a>
                                    </li>
		   <?php } ?>
            <?php } 
                    elseif($qss->friend_user_id == $this->session->userdata('userId')['user_id'])
					{ 
						$qrp = $this->Common_model->getsingle('users',array('user_id' => $qss->user_id));
						$country_name = $this->Common_model->getsingle('country',array('id' => $qrp->country_id));
						if(!empty($qrp->user_image)){ ?>
            
			
									
				  <li class="list-inline-item">
                                        <a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="<?php echo base_url(); ?>upload/<?php echo $qrp->user_image; ?>" alt="img" title="<?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?>">
                                            </div>
                                            <span class="font-sm name"><?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?></span>
                                            <span class="address"><?php echo $country_name->name; ?></span>
                                        </a>
                                    </li>					
			
			<?php }else{ ?>
          <li class="list-inline-item">
                                        <a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>" class="link-dark">
                                            <div class="userImg rounded-circle overflow-hidden">
                                                <img src="<?php echo base_url(); ?>images/user_image.png" alt="img" title="<?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?>">
                                            </div>
                                            <span class="font-sm name"><?php echo ucwords($qrp->firstname.' '. $qrp->lastname); ?></span>
                                            <span class="address"><?php echo $country_name->name; ?></span>
                                        </a>
                                    </li>

		   <?php } ?>
            <?php }					
				} ?>
            <?php }else{ echo "No friends available";} ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>