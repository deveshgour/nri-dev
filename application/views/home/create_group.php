  <div class="col-md-3 rightContent">
      <div class="conversationBox rounded-10 bg-white">
          <div class="text-right d-xl-none">
              <a href="javscript:;" class="closeChat link-dark"><span class="icon-plus1"></span></a>
          </div>
          <h4 class="font-sm mb-3">Conversations</h4>
          <a href="javascript:;" onclick="creategroupModal()" class="d-flex align-items-center font-sm createGroup">
              <span class="icon-plus1"></span>
              <div class="flex-1">Create New Group</div>

          </a>
          <div class="searchBox position-relative">
              <input type="text" class="form-control search_group"
                  data-user_id="<?php echo $this->session->userdata("userId")["user_id"]; ?>" name="search_group"
                  id="search_group" placeholder="Search">
              <span class="icon-search1"></span>
          </div>
          <ul class="list-unstyled mb-0 groupsearchval">
              <?php 
<<<<<<< HEAD
						$groupShow = $this->Common_model->getAll("create_group","update_chat_date","desc");
=======
						$groupShow = $this->Common_model->getAll("create_group","group_id","desc");
>>>>>>> 32aa0e726a0bc79735f4440ec28d0486012aa4c9
				
				//echo $this->db->last_query();die;
				 if(!empty($groupShow)){
					 foreach($groupShow as $group){
						$group_member =  $this->Common_model->getAllwhereorder("group_members",array("group_id" => $group->group_id),"group_id","desc");
						//echo $group_member->members;
					//	echo $this->db->last_query();
						if($group->user_id == $this->session->userdata("userId")["user_id"]){ 
						
				 ?>
              <li>
                  <a href="<?php echo base_url(); ?>chat/<?php echo base64_encode($group->group_id); ?>"
                      class="d-flex align-items-center link-dark">
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
                  <a href="<?php echo base_url(); ?>chat/<?php echo base64_encode($group->group_id); ?>"
                      class="d-flex align-items-center link-dark">
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
              <?php }} ?>
              <?php }} }?>
<<<<<<< HEAD

          </ul>
      </div>
  </div>

  
      <!-------------------------------------------create group modal-------------------------------- -->

=======

          </ul>
      </div>
  </div>

  
      <!-------------------------------------------create group modal-------------------------------- -->

>>>>>>> 32aa0e726a0bc79735f4440ec28d0486012aa4c9

      <div class="modal" tabindex="-1" role="dialog" id="creategroupModal">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Create New Group</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
				  <div class="modal-body">
                  <form id="creategroupimage" action="<?php echo base_url(); ?>Userdashboard/create_group" method="post"
                      enctype="multipart/form-data">
                     

                          <div class="form-group">
                              <input type="text" name="group_title" id="group_title" value="" class="form-control"
                                  placeholder="Group Title">
                          </div>

                          <h5 class="mb-4">Group Members</h5>

                          <div class="form-group">
                              <div class="scrollerBox">

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
                                  <div class="d-flex align-items-center groupMember">
<<<<<<< HEAD
								  <!-- 
                                    <input type="checkbox" id="groupmem" name="groupmem[]"
                                          value="<?php echo $qrp->user_id; ?>" class="mr-2"> -->

                                          <label class="checkbox-wrap">
                                            <input type="checkbox" id="groupmem" name="groupmem[]"
                                          value="<?php echo $qrp->user_id; ?>" class="mr-2">
                                            <span class="checkmark"></span>
                                          </label>

=======
								  
                                      <input type="checkbox" id="groupmem" name="groupmem[]"
                                          value="<?php echo $qrp->user_id; ?>" class="mr-2">
>>>>>>> 32aa0e726a0bc79735f4440ec28d0486012aa4c9

                                      <!--<label for="coding">--><a
                                          href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>"><img
                                              class="rounded-circle tag-img" src="<?php echo $img; ?>" width="50px"
                                              height="50px"> <span
                                              class="groupMember__name"><?php echo $qrp->firstname.' '.$qrp->lastname; ?>
                                          </span></a>
                                      <!--</label>-->

									  </div>
									<div class="d-flex align-items-center groupMember">
                                      <?php   }elseif($qss->user_id == $this->session->userdata('userId')['user_id']){ 
											$qrp = $this->Common_model->getsingle('users',array('user_id' => $qss->friend_user_id));
					                        $country_name = $this->Common_model->getsingle('country',array('id' => $qrp->country_id));
											if(!empty($qrp->user_image)){
                                                      $img = base_url().'upload/'.$qrp->user_image;
													 }else{
                                                      $img = base_url().'images/user_image.png';
													 }
											?>

                                      <input type="checkbox" id="groupmem" name="groupmem[]"
                                          value="<?php echo $qrp->user_id; ?>" class="mr-2">

                                      <a
                                          href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($qrp->user_id); ?>"><img
                                              class="rounded-circle tag-img" src="<?php echo $img; ?>" width="50px"
                                              height="50px" style="object-fit:cover">
                                          <span class="groupMember__name"><?php echo $qrp->firstname.' '.$qrp->lastname; ?>
                                          </span>

										  </a>

                                  </div>

                                
                                  <?php }
										}
									 }
									   ?>

                              </div>
                          </div>

                          <span for="groupmem[]" generated="true" class="error"></span>

                     
                      <div class="form-group">
                          <div class="file-upload-wrapper form-control" data-text="Select your file!">
                              <input name="image" type="file" class="file-upload-field" value="">
                          </div>
                      </div>
                      <div class="text-center">
                          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                      </div>

					
                  </form>
				  </div>

              </div>
          </div>
      </div>

<<<<<<< HEAD

<style type="text/css">
  /*checkbox css*/

.checkbox-wrap{
  padding-right: 50px;
}

/* Hide the browser's default checkbox */
.checkbox-wrap input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkbox-wrap .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.checkbox-wrap:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.checkbox-wrap input:checked ~ .checkmark {
  background-color: #010080;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.checkbox-wrap input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.checkbox-wrap .checkmark:after {
  left: 9px;
  top: 3px;
  width: 6px;
  height: 15px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.groupMember {
    position: relative;
}
</style>
=======
>>>>>>> 32aa0e726a0bc79735f4440ec28d0486012aa4c9
      <!-------------------------------------------------------------------------------------------- -->