

    <main class="main-content trendingPage">
        <div class="trendingPage__wrapper">
            <div class="row">
               <?php if(!empty($buzz_list)){
                       foreach($buzz_list as $detail){
				   ?>
               <div class="col-md-3">
                    <a class="trendingBox" href="<?php echo base_url(); ?>buzz_detail/<?php echo $detail->buzz_id; ?>">
					<?php if(!empty($detail->image)){ ?>
                        <img src="<?php echo base_url(); ?>upload/<?php echo $detail->image; ?>" class="img-fluid">
					<?php }else{ ?>
				     	<img src="<?php echo base_url(); ?>images/buzz_default.jpg" class="img-fluid">
					<?php } ?>
                        <div class="trendingBox__caption d-flex align-items-center justify-content-center">
                           <?php echo $detail->title; ?>
                        </div>
                    </a>
                </div>
			   <?php }}else{ ?>
					No record found   
			   <?php } ?>
            </div>
        </div>
    </main>


   