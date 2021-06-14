<main class="main-content letsGovDetailPage">

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

			<?php if(!empty($this->session->flashdata('message'))){ $message = $this->session->flashdata('message'); ?>

						<div class="alert alert-success message">

					 <button type="button" class="close" data-dismiss="alert">x</button>

        <?php echo $message; ?></div><?php } ?>

                <div class="feeds">
<!-- 
				<form id="newuploadimage" action="" method="post" enctype="multipart/form-data">

                    <div class="feeds-search d-sm-flex align-items-center text-center rounded-10">

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

                        </div>

                        <label class="mb-0 ripple-effect" for="uploadImage">

                            <input type="file" id="uploadImage" name="uploadImage">

                            <i class="icon-image-gallery"></i>

                        </label>

                        <button name="submit" type="submit" id="postdata"  class="btn btn-primary">Post</button>

                    </div>

					</form> -->

                  <div class="newmain-post-sec" id="main-post-sec">

					<?php

					    if(!empty($post_data)){ 

						    $i = 1;

					        foreach($post_data as $row){ 

					?>

                    <div class="feed-box rounded-10" id="postdetail-<?php echo $row->gov_id; ?>">

					

                        <div class="feedTop">

                            <div class="userInfo d-flex align-items-center">

                                <div class="userImg rounded-circle overflow-hidden" id="myData_<?php echo $i;?>">

								<?php if(!empty($row->image)){ ?>

                                    <img src="<?php echo base_url(); ?>upload/<?php echo $row->image; ?>" alt="img">

								<?php }else{ ?>

								<img src="<?php echo base_url(); ?>images/user_image.png" alt="img">

								<?php } ?>

                                </div>

								<div class="userInfo-text">

                                    <h6><?php echo $row->title; ?></h6>

                                    <?php /* ?><span>Yesterday at 4:54 PM</span><?php */ ?>

									<span><?php echo convert_time($row->create_date,'F j, Y, g:i a'); ?></span>

                                </div>

								

							</div>



                            <div class="feedImg mb-3">



                                <div class="feedCaption">

                                    <p><?php echo $row->description; ?>

									

                                    </p>

									<p>URL : <a href="<?php echo $row->url; ?>" target ="_blank"><?php echo $row->url; ?></a></p>

                                </div>

                               

                            </div>

					

							

                          

                        </div>

                        <div class="feedBottom">

                            <div class="likeShare d-flex align-items-center justify-content-between">

                                

                                <div class="right">

                                <div class="dropdown shareDropdown">

                                    <a href="javascript:;" class="link-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span



                                    class="icon-share-2 pr-2"></span>Share</a>



                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a class="dropdown-item" href="#"><em class="icon-facebook"></em> Facebook</a>

                                        <a class="dropdown-item" href="#"><em class="icon-twitter"></em> Twitter</a>

                                        <a class="dropdown-item" href="#"><em class="icon-whatsapp"></em> Whatsapp</a>

                                    </div>

                                </div>

                                </div>

                            </div>

                            

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

    <style type="text/css">
        .feeds .feed-box {
             background-image: none; 
            background: #fef4d9;
        }
    </style>