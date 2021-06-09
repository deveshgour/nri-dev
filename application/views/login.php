    
	
	<main class="main-content authPage">
        <div class="container">
        <div class="row">
        <div class="col-lg-6 bg-white p-0 left d-none d-lg-block">
            <img class="img-fluid" src="<?php echo base_url(); ?>images/hands.jpg"/>  
        </div>
        <div class="col-lg-6 bg-white">
            <div class="p-4 d-flex align-items-center h-100">

             <form method="POST" name="login" id="login" class="w-100" action="<?php echo base_url();?>">
                <h1>Sign in</h1>
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
							if($this->uri->segment(1) == 'login'){ ?>
								<div class="text-center" style="color: green; font-size: 18px;">
                                    <?php echo "Account Activate Successfully"; ?>
                                </div>
							<?php }  ?>
                <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                </div>
              
             
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                </div>
              
            
            <div class="keeplogin position-relative d-flex align-items-center justify-content-between">
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck">
                      <label class="form-check-label" for="gridCheck">
                        Remember me
                      </label>
                    </div>
                </div>

                <div class="forgotpassword">
                    <div class="form-group">
                    <a href="<?php echo base_url(); ?>forgotpassword"> Forgot Password?</a>
                </div>
                </div>
              </div>
             
            
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
             
            </form>
           
        </div>
        </div>
        </div>
        </div>
    </main>
	<script>
	$(document).ready(function() {
  $("#login").validate({
    rules: {
            
			email: {
                required: true,
				email: true
            },
			password: {
				required: true,
			},
			
		
    },
    messages: {
             
			email: {
                required: "Email field is required",
				
            },
			password: {
                required: "Password field is required",
            },
			
    },
    errorElement: "span",
        errorPlacement: function(error, element) {
                error.appendTo(element.parent());
        }

  });
});

	</script>