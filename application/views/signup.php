
   <main class="main-content authPage">
        <div class="authPage__wrapper">
 <form method="POST" name="signup" id="signup" class="signup-form" action="<?php echo base_url();?>sign-up">
      <h1>Sign Up</h1>
	 
	  <?php if(!empty($message)){ 
                                ?>
                                <div class="text-center" style="color: green; font-size: 18px;">
                                    <?php echo $message; ?>
                                </div>
                                <?php
                            }elseif(!empty(validation_errors())){
                                ?>
                                <div class="text-center" style="color: red; font-size: 18px;">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php
                            }  
                        ?>
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name">
                        </div>
                     </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                           <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                        </div>
                    </div>
					
					<div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Country</label>
							
                            <select class="form-control" name="country_id" id="country_id">
							<option value="">Select Country</option>
							<?php
							if(!empty($country_value)){ 
							   foreach($country_value as $country_id){
							?>
							    <option value="<?php if($country_id){ echo $country_id->id; } ?>"><?php echo $country_id->name; ?></option>
							<?php }} ?>
							</select>
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
												   if(!empty($country_value)){
                                                       foreach($country_value as $country){
													?>
                                                    <option value="<?php echo $country->phonecode; ?>" >+<?php echo $country->phonecode; ?></option>
												   <?php }} ?>
                                                </select>
                                            </span>
                                        </div>
                                        <input type="text" minlength="10" maxlength="10" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" value="<?php if(!empty($myprofile->contact_number)){ echo $myprofile->contact_number; } ?>" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
            </div>
            
             <div class="keeplogin">
                <div class="forgotpassword">
                    <div class="form-group">
                        If you already have an account, Please 
                    <a href="<?php echo base_url();?>"> Login</a>
                </div>
                </div>
              </div>

<input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" placeholder="Submit" >
             <!--<button type="submit" class="btn btn-primary btn-block">Sign Up</button>-->
             
            </form>
           
        </div>
    </main>
	<script>
	$(document).ready(function() {
  $("#signup").validate({
    rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
			email: {
                required: true,
				email: true
            },
			password: {
				required: true,
			},
			confirmpassword: {
            required: true,
            
            equalTo: "#password"
        },
		country_id: {
			required: true
		},
		contact_number: {
			required: true
		}
    },
    messages: {
             firstname: {
                required: "Firstname field is required",
            },
			lastname: {
                required: "Lastname field is required",
            },
			email: {
                required: "Email field is required",
				
            },
			password: {
                required: "Password field is required",
            },
			confirmpassword: {
                required: "Confirmpassword field is required",
				
            },
			country_id: {
                required: "Country field is required",
				
            },
			contact_number: {
                required: "Contact number field is required",
				
            },
    },
    errorElement: "span",
        errorPlacement: function(error, element) {
                error.appendTo(element.parent());
        }

  });
});

	</script>