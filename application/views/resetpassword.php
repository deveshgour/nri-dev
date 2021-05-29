    
	
	<main class="main-content authPage">
        <div class="authPage__wrapper">

             <form method="POST" name="resetpassword" id="resetpassword" class="w-100" action="<?php echo base_url();?>resetpass/<?php echo base64_encode($email); ?>">
                <h1>Reset Password</h1>
				 <?php if(!empty($message)){ 
                                ?>
                                <div class="text-center" style="color: green; font-size: 18px;">
                                    <?php  echo $message; ?>
                                </div>
                                <?php
                            }elseif(!empty($messages)){ ?>
                            <div class="text-center" style="color: red; font-size: 18px;">
                                    <?php  echo $messages; ?>
                                </div>
                            
                            <?php }
                            if(!empty(validation_errors())){
                                ?>
                                <div class="text-center" style="color: red; font-size: 18px;">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php
                            }  
							 ?>
							 
							
                <div class="form-group">
                <label for="password" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Old Password">
                </div>
                <input type="hidden" id="hidden_email" name="hidden_email" value="<?php echo $email; ?>">
              
             
                <div class="form-group">
                    <label for="newpassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter New password">
                </div>
              
            
            
             
            
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
             
            </form>
           
        </div>
    </main>
	<script>
	$(document).ready(function() {
  $("#resetpassword").validate({
    rules: {
            
			password: {
                required: true,				
            },
			newpassword: {
				required: true,
			},
			
		
    },
    messages: {
             
			password: {
                required: "Old Password field is required",
				
            },
			newpassword: {
                required: "New Password field is required",
            },
			
    },
    errorElement: "span",
        errorPlacement: function(error, element) {
                error.appendTo(element.parent());
        }

  });
});

	</script>