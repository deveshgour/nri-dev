		
		
		<main class="main-content friendRequestpage">

					<div class="container">
					<div class="row">
					<div class="col-lg-6 offset-lg-3">
					<div class="friendRequestpage__wrapper">
				
					<h3 class="text-center mb-3">Friend Request</h3>
						<div class="row">
						   <?php if(!empty($friendrequest_list)){foreach($friendrequest_list as $frnd_sug){
							  
							?>
								<div class="col-md-12">
								<div class="userInfo d-flex align-items-center">
								<?php if(!empty($frnd_sug->user_image)){ ?>
								<div class="userImg rounded-circle overflow-hidden"><img src="<?php echo base_url(); ?>upload/<?php echo $frnd_sug->user_image; ?>" /></div>
								<?php }else{ ?>
								<div class="userImg rounded-circle overflow-hidden"><img src="<?php echo base_url(); ?>images/user_image.png" /></div>
								<?php } ?>
								   <div class="userInfo-text" id="frnd-<?php echo $frnd_sug->user_id; ?>"> <h6><?php echo ucwords($frnd_sug->firstname.' '.$frnd_sug->lastname.''); ?></h6>
								   <span><button class="requestfriend_delete del_cat btn btn-primary" data-userid="<?php echo $frnd_sug->user_id; ?>">Remove</button> 
								   <button class="del_cat accept_request btn btn-primary" data-listid="<?php echo $frnd_sug->friend_id; ?>" data-frndid="<?php echo $frnd_sug->user_id; ?>" >Accept Request</button></span><br/>
								   </div>
								   </div>
							</div>
						   <?php  }
							
								}else{?><div class="col-sm-12"><div class="alert alert-warning text-center">No Friends Available</div></div><?php } ?>
                            <!-- <div class="view-more-reqvst">
                           		<a href="#">See all </a>
                           </div>-->
							  
        </div>
				</div>
				</div>
				</div>
				</div>
    		</main>

		
	
	
			
           
			
			


