
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <main class="main-content authPage">
        <div class="authPage__wrapper">

            <h1>Profile</h1>

 <?php 
	    
		 if(null !==($this->session->flashdata('profile_update')))
		  {
			$message = $this->session->flashdata('profile_update'); ?>
	         <div style="color:green; text-align:center;"><?php echo $this->session->flashdata('profile_update'); ?></div>
	<?php  } ?>
            <section class="editProfile">
                <div class="container">
                    <div class="editProfile__form customForm">
                        <form id="myprofile" name="myprofile" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="upload_photo mx-auto">
                                            <div class="img-box overflow-hidden">
											<?php if(!empty($myprofile->user_image)){ ?>
											<img src="<?php echo base_url(); ?>upload/<?php echo $myprofile->user_image; ?>" id="blah" alt="user-img" class="img-fluid">
											<?php }else{ ?>
                                                <img src="<?php echo base_url(); ?>images/user_image.png" id="blah" alt="user-img" class="img-fluid">
											<?php } ?>
                                            </div>
                                            <label class="mb-0 ripple-effect" for="uploadImage">
                                                
												<input type="file" name="uploadImage" id="uploadImage" onchange="readURL(this);" />
                                                <i class="icon-camera" id="file_uplaod"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php if(!empty($myprofile->firstname)){ echo $myprofile->firstname; } ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php if(!empty($myprofile->lastname)){ echo $myprofile->lastname; } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" name="gender" id="gender" title="Gender">
										<option value="">Select</option>
                                            <option value="1" <?php if($myprofile->gender == 1){ echo "selected"; } ?>>Male</option>
                                            <option value="2" <?php if($myprofile->gender == 2){ echo "selected"; } ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker-input"
                                            placeholder="Date of Birth" id="datepicker1" name="dob" data-target="#datepicker1"
                                            data-toggle="datetimepicker" value="<?php if($myprofile->dob == '0000-00-00'){ echo ''; }else{ echo $myprofile->dob; } ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group phone-number">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text p-0">
                                                <select class="form-control selectpicker" name="country_code" id="country_code">
												<?php 
												   if(!empty($country_code)){
                                                       foreach($country_code as $country){
													?>
                                                    <option value="<?php echo $country->phonecode; ?>" <?php if($country->phonecode == $myprofile->dial_code){ echo "selected"; } ?>>+<?php echo $country->phonecode; ?></option>
												   <?php }} ?>
                                                </select>
                                            </span>
                                        </div>
                                        <input type="text" minlength="10" maxlength="10" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" value="<?php if(!empty($myprofile->contact_number)){ echo $myprofile->contact_number; } ?>" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email address" name="email" id="email" value="<?php if(!empty($myprofile->email)){ echo $myprofile->email; } ?>">
                                    </div>
                                </div>
                            </div>
                            
                          <?php $country = $this->Common_model->getAll("country","id","asc"); ?>
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" name="permanent_country" id="permanent_country" title="Country">
										<option value="">Select Permanent Country</option>
                                            <?php if(!empty($country)){
                                                   foreach($country as $permanent_country){
												?>
												<option value="<?php echo $permanent_country->id; ?>" <?php if($myprofile->permanent_country == $permanent_country->id){echo "selected";} ?>><?php echo $permanent_country->name; ?></option>
											<?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <textarea name="permanent_address" class="form-control" id="permanent_address" placeholder="Permanent Address"><?php if(!empty($myprofile->permanent_address)){ echo $myprofile->permanent_address; } ?></textarea>
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" name="local_country" id="local_country" title="Country">
										<option value="">Select Local Country</option>
                                            <?php if(!empty($country)){
                                                   foreach($country as $local_country){
												?>
												<option value="<?php echo $local_country->id; ?>" <?php if($myprofile->local_country == $local_country->id){echo "selected";} ?>><?php echo $local_country->name; ?></option>
											<?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <textarea name="local_address" class="form-control" id="local_address" placeholder="Local Address"><?php if(!empty($myprofile->local_address)){ echo $myprofile->local_address; } ?></textarea>
                                    </div>
                                </div>
                            </div>  
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-6 mx-auto">
                                    
									<input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary text-uppercase btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>


        </div>
    </main>
	
	
