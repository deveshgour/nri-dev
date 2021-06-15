    
	
	<main class="main-content authPage">
        <div class="container">
        <div class="row">
        <div class="col-lg-6 bg-white p-0 left d-none d-lg-block">
            <img class="img-fluid h-100" src="<?php echo base_url(); ?>upload/<?php echo $aboutus->image; ?>"/>  
        </div>
        <div class="col-lg-6 bg-white">
            <div class="p-4">

             <form method="POST" name="login" id="login" class="w-100" action="<?php echo base_url();?>">
                <h1>About Us</h1>
				 
                <div class="form-group">
               <?php echo $aboutus->title; ?>
                </div>
              
             
                <div class="form-group">
                    <?php echo $aboutus->description; ?>
                </div>
              
         
             
            </form>
           
        </div>
        </div>
        </div>
        </div>
    </main>
	