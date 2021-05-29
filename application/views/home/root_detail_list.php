

    <main class="main-content trendingPage">
        <div class="trendingPage__wrapper">
            <div class="row">
               <?php if(!empty($root_detail_list)){
                       foreach($root_detail_list as $detail){
				   ?>
               <div class="col-md-3">
                    <a class="trendingBox" href="<?php echo base_url(); ?>root_detail/<?php echo $detail->root_id; ?>/<?php echo $detail->detail_id; ?>">
					<?php if(!empty($detail->media_path)){ ?>
                        <img src="<?php echo base_url(); ?>upload/<?php echo $detail->media_path; ?>" class="img-fluid">
					<?php }else{ ?>
				     	<img src="<?php echo base_url(); ?>images/trending02.jpg" class="img-fluid">
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


   