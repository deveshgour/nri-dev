<?php
					    if(!empty($post_data)){ 
					    	$i = ++$offset;
					        foreach($post_data as $rows){
					?>
<div class="feed-box rounded-10 bg-white" id="postdetail-<?php echo $rows->gov_id; ?>">
                        <div class="feedTop">
                            <div class="userInfo d-flex align-items-center">
                                <div class="userImg rounded-circle overflow-hidden" id="myData_<?php echo $i;?>">
                                    <?php if(!empty($rows->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $rows->image; ?>" alt="img">
								<?php }else{ ?>
								<img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
								<?php } ?>
                                </div>
                               <div class="userInfo-text">
                                    <h6><?php echo $rows->title; ?></h6>
                                    <?php /* ?><span>Yesterday at 4:54 PM</span><?php */ ?>
									<span><?php echo convert_time($row->create_date,'F j, Y, g:i a'); ?></span>
                                </div>
								
						   </div>

                            <div class="feedImg mb-3">

                                <div class="feedCaption">
                                    <p ><?php echo $rows->description; ?>
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
                                        <a class="dropdown-item" href="#"><em class="icon-instagram"></em> Instagram</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
						<?php }} ?>