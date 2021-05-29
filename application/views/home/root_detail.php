 <main class="main-content foodDetailPage">
             <section class="">
				 <div class="container">
                     <div class="col-lg-8 offset-lg-2">
                    
                    <div class="feeds">
                        <div class="feed-box rounded-10">
                            <div class="feedTop">
                            <h1 class="text-center"><?php echo $root_id->connect_root; ?></h1>
                                <div class="userInfo d-flex align-items-center">
                                    <div class="userImg rootImg rounded-circle overflow-hidden">
                                    <?php if(!empty($detail->media_path)){ ?>
                                        <img src="<?php echo base_url(); ?>upload/<?php echo $detail->media_path; ?>" alt="img">
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
                                    <?php } ?>
                                    </div>
                                    <div class="userInfo-text">
                                        <h6><?php echo $detail->title; ?></h6>
                                        
                                    </div>
                                </div>
                                <p><?php echo $detail->root_detail; ?></p>
                                <?php /* ?> <div class="feedImg mb-3">
                                    <img src="<?php echo base_url(); ?>images/feed-1.png" class="img-fluid w-100" alt="feed">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="likes font-sm">Kavi Singh and 200 other liked</div>
                                    <div class="comments">110 Comments</div>
                                </div><?php */ ?>
                            </div>
                            <?php /* ?><div class="feedBottom">
                                <div class="likeShare d-flex align-items-center justify-content-between">
                                    <div class="left">
                                        <a href="javascript:;" class="link-dark"><span
                                                class="icon-like pr-2"></span>Like</a>
                                        <a href="javascript:;" class="link-dark"><span
                                                class="icon-comment pr-2"></span>Comment</a>
                                    </div>
                                    <div class="right">
                                        <a href="javascript:;" class="link-dark"><span
                                                class="icon-share-2 pr-2"></span>Share</a>
                                    </div>
                                </div>
                                <div class="seeComment my-3">
                                    <a href="javascript:;" class="font-sm link-dark">See more comments</a>
                                </div>
                                <ul class="list-unstyled comment-list">
                                    <li class="d-flex">
                                        <div class="imgBox rounded-circle overflow-hidden">
                                            <img src="<?php echo base_url(); ?>images/user-2.png" alt="user">
                                        </div>
                                        <div class="cntText">
                                            <h6 class="font-sm mb-0">Kavi Singh</h6>
                                            <small>2 hours</small>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit..</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="imgBox rounded-circle overflow-hidden">
                                            <img src="<?php echo base_url(); ?>images/user-3.png" alt="user">
                                        </div>
                                        <div class="cntText">
                                            <h6 class="font-sm mb-0">Kavi Singh</h6>
                                            <small>2 hours</small>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit..</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="imgBox rounded-circle overflow-hidden">
                                            <img src="<?php echo base_url(); ?>images/user-1.png" alt="user">
                                        </div>
                                        <div class="cntText">
                                            <h6 class="font-sm mb-0">Kavi Singh</h6>
                                            <small>2 hours</small>
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo a pariatur
                                                debitis assumenda amet, eaque maxime velit magni sunt</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="postComment d-flex align-items-center pt-2">
                                    <div class="userImg rounded-circle overflow-hidden">
                                        <img src="<?php echo base_url(); ?>images/user-2.png" alt="img">
                                    </div>
                                    <div class="inputBox position-relative">
                                        <input type="text" class="form-control" placeholder="Write a public comment">
                                        <button class="border-0 bg-transparent font-sm">Post</button>
                                    </div>
                                </div>
                            </div><?php */ ?>
                        </div>
                    </div>
                    </div>
				</div>
			</section>
					
</main>
					