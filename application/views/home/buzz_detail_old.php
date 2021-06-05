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
                                    
                                </div>
                            </div>

                            <div class="feedImg mb-3">

                                <div class="feedCaption">
                                    <p><?php echo $detail->description; ?>
                                    </p>
                                </div>
                               
                            </div>
                           
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