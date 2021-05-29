    
	
	<main class="main-content authPage">
        <div class="authPage__wrapper">

             <form method="POST" name="forgotpassword" id="forgotpassword" class="w-100" action="<?php echo base_url();?>forgotpassword">
                <h1>Forgot Password</h1>
				 <?php if(!empty($message)){ echo $message; } ?>
                <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                </div>
              
             
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
             
            </form>
           
        </div>
    </main>
	<script>
	$(document).ready(function() {
  $("#forgotpassword").validate({
    rules: {
            
			email: {
                required: true,
				email: true
            },
			
    },
    messages: {
             
			email: {
                required: "Email field is required",
				
            },
    },
    errorElement: "span",
        errorPlacement: function(error, element) {
                error.appendTo(element.parent());
        }

  });
});

	</script>