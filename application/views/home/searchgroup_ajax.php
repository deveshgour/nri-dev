 <?php 
				 
				/* if(!empty($searchData)){
					 foreach($searchData as $group){
						$group_member =  $this->Common_model->getsingle("group_members",array("group_id" => $group->group_id));
				 ?>
                        <li>
                            <a href="javascript:;" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
								<?php if(!empty($group->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $group->image; ?>" alt="img">
								<?php }else{ ?>
								     <img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
								<?php } ?>
                                </div>
                                <span class="font-sm"><?php echo $group->title; ?></span>
                            </a>
                        </li>
				 <?php }} */ ?>
				 <?php if(!empty($searchData)){
					 foreach($searchData as $group){
						$group_member =  $this->Common_model->getAllwhereorder("group_members",array("group_id" => $group->group_id),"group_id","desc");
						//echo $group_member->members;
					//	echo $this->db->last_query();
						if($group->user_id == $this->session->userdata("userId")["user_id"]){ 
						
				 ?> 
				 <li>
                            <a href="<?php echo base_url(); ?>chat/<?php echo base64_encode($group->group_id); ?>" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
								<?php if(!empty($group->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $group->image; ?>" alt="img">
								<?php }else{ ?>
								     <img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
								<?php } ?>
                                </div>
                                <span class="font-sm"><?php echo $group->title; ?></span>
                            </a>
                        </li>
						<?php }else
						if(!empty($group_member)){
							foreach($group_member as $group_m){
								if($group_m->members == $this->session->userdata("userId")["user_id"]){ 
						?>
						<li>
                            <a href="<?php echo base_url(); ?>chat/<?php echo base64_encode($group->group_id); ?>" class="d-flex align-items-center link-dark">
                                <div class="userImg rounded-circle overflow-hidden">
								<?php if(!empty($group->image)){ ?>
                                    <img src="<?php echo base_url(); ?>upload/<?php echo $group->image; ?>" alt="img">
								<?php }else{ ?>
								     <img src="<?php echo base_url(); ?>images/user_image.png" alt="img">
								<?php } ?>
                                </div>
                                <span class="font-sm"><?php echo $group->title; ?></span>
                            </a>
                        </li>
				 <?php }}}}}  ?>