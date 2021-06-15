<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="title" content="First Title">

    <meta name="description" content="First Description">

    <meta property="og:url" content="<?php echo base_url(); ?>home">


    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>css/icomoon.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>css/main.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">



    <title>NRI Arena</title>

</head>



<body>
<style>
  .notification .badge {
    position: absolute;
    top: -7px;
    right: -9px;
    padding: 6px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
}
.custom-menus {
    position: absolute;
    top: 100%;
    left: -86px;
    z-index: 1000;
    display: none;
    /* float: left; */
    min-width: 17rem;
    padding: 0.5rem 7px;
    margin: 0.125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
}


</style>


    <header>

        <nav class="navbar navbar--homeBg fixed-top">

            <div class="searchForm">

                <form method="post" action="" name="search">

                <a class="link-dark toggleMenu d-lg-none">

                    <span class="icon icon-menu"></span>

                    </a>

                    <a class="link-dark toggleSearch d-lg-none" data-toggle="collapse" href="#collapseSearch">

                        <span class="icon-search1"></span>

                    </a>

                    <div class="collapse form-search position-relative d-lg-block" id="collapseSearch">

                        <div class="position-relative">

                            <input type="text" class="form-control" placeholder="Search" name="friend_search"
                                id="friend_search">

                            <span class="icon-search1"></span>

                        </div>

                        <div id="display" class="autosuggestDrop"></div>



                    </div>

                </form>

            </div>



            <a class="navbar-brand" href="<?php echo base_url() ?>">

                <img src="<?php echo base_url() ?>images/logo.png" alt="logo">

            </a>



            <div class="d-flex align-items-center">

                <ul class="list-inline centerNav mb-0 mr-4">
                    <li class="list-inline-item">
                        <a href="<?php echo base_url(); ?>home" class="active">
                            <span class="icon icon-home"></span>
                            <span class="nav-text">Home</span>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="<?php echo base_url(); ?>buzz_list">
                            <span class="icon icon-flame"></span>
                            <span class="nav-text">buzz</span>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="<?php echo base_url(); ?>gov_detail">
                            <span class="icon icon-menu"></span>
                            <span class="nav-text">let's Gov</span>
                        </a>
                    </li>

                    <?php /* ?><li class="list-inline-item">
                        <a href="<?php echo base_url(); ?>friendRequest_list">
                            <span class="icon icon-two-users"></span>
                            <span class="nav-text">Friend Request</span>
                        </a>
                    </li><?php */ ?>
                    <?php $where_q = "(notification.friend_user_id = ".$this->session->userdata('userId')['user_id']." or notification.user_id = ".$this->session->userdata('userId')['user_id'].")";

		$notification_list = $this->Common_model->jointwotableorderby('notification', 'user_id', 'users', 'user_id',$where_q,'notification.user_id,notification.friend_user_id,users.firstname,users.lastname,notification.status','notification.create_date','desc');
		$where_p = "(notification.friend_user_id = ".$this->session->userdata('userId')['user_id']." or notification.user_id = ".$this->session->userdata('userId')['user_id'].") and friend_read = 0";

		$notification_count = $this->Common_model->jointwotableorderby('notification', 'user_id', 'users', 'user_id',$where_p,'notification.user_id,notification.friend_user_id,users.firstname,users.lastname,notification.status','notification.create_date','desc');			

		//echo '<pre>';print_r($notification_list);die;
		?>
					
					<li class="list-inline-item">
					<div class="dropdown moodDropdoown notification">
                        <a href="<?php echo base_url(); ?>friendRequest_list" class="notification dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-bell"></span>
                            <span class="nav-text">Notification</span>
							<?php if(!empty($notification_count)){ 
							foreach($notification_count as $noti){
							if($noti->friend_user_id == $this->session->userdata('userId')['user_id']){
								if($noti->status == 0){
							?>
							<div class="dis"><span class="badge"><?php echo count($notification_count); ?></span></div>
							<?php }elseif($noti->status == 1){ ?>
							<div class="dis"><span class="badge"><?php echo count($notification_count); ?></span></div>
							<?php } ?>
							<?php }elseif($noti->status == 1 && $noti->user_id == $this->session->userdata('userId')['user_id']){
                              
								?>
                                 <div class="dis"><span class="badge"><?php echo count($notification_count); ?></span></div>					
								 <?php }}} ?>
                        </a>
						<div class="dropdown-menu custom-menus" aria-labelledby="moodDropdoown">
						    <?php if(!empty($notification_list)){ 
							foreach($notification_list as $noti){
							if($noti->friend_user_id == $this->session->userdata('userId')['user_id']){
								if($noti->status == 0){
							?>
                               <span class="notification__wrap"> <span class="notification__msg"><a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($noti->user_id); ?>"><b><?php echo ucwords($noti->firstname.' '.$noti->lastname); ?></b> sent you a friend request</a></span>
								<span class="notification__time"><?php echo convert_time($noti->create_date,'F j, Y, g:i a'); ?></span>
                                </span>

								<?php }elseif($noti->status == 1){ ?>
                                    <span class="notification__wrap"><span class="notification__msg"><a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($noti->user_id); ?>"><b><?php echo ucwords($noti->firstname.' '.$noti->lastname); ?></b> and me are friends now</a></span>
								<span class="notification__time"><?php echo convert_time($noti->create_date,'F j, Y, g:i a'); ?></span></span>
								<?php }else{ ?>
								No record found
								<?php } ?>
							<?php }elseif($noti->status == 1 && $noti->user_id == $this->session->userdata('userId')['user_id']){
                              $username = $this->Common_model->getsingle("users",array("user_id" => $noti->friend_user_id));
								?>
                               <span><a href="<?php echo base_url(); ?>friend-user/<?php echo base64_encode($noti->friend_user_id); ?>"><b><?php echo ucwords($username->firstname.' '.$username->lastname); ?></b> Accept your friend request</a></span>
							   <span><?php echo convert_time($noti->create_date,'F j, Y, g:i a'); ?></span>
							<?php }else{ ?>
							No record found
							<?php }}}else{ ?>
							No record found
							<?php } ?>
                        </div>
						</div>
                    </li>
                    
                    <li class="list-inline-item">
                        <a href="javascript:;" class="d-lg-none">
                            <span class="icon icon-comment"></span>
                        </a>
                    </li>

                </ul>



                <?php $getemoji = $this->Common_model->getsingle("smiley_table",array("user_id" => $this->session->userdata("userId")['user_id'])); 

		//echo '<pre>';print_r($getemoji);die;

		?>



                <ul class="list-inline rightNav mb-0">



                    <li class="list-inline-item">

                        <?php if(!empty($getemoji)){ ?>
                        <div class="dropdown moodDropdoown">
                            <a href="javascript:;" class="link-dark dropdown-toggle" id="moodDropdoown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="<?php echo $getemoji->image; ?>"></a>
                            <div class="dropdown-menu" aria-labelledby="moodDropdoown">
                                <?php echo $smiley_table; ?>
                            </div>
                        </div>
                        <?php }else{ ?>

                     <div class="dropdown moodDropdoown">
						
						<a href="javascript:;" class="link-dark dropdown-toggle" id="moodDropdoown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-mood"></span></a>
                            <div class="dropdown-menu" aria-labelledby="moodDropdoown"><?php echo $smiley_table; ?></div>
                     </div>
                        <?php } ?>

                    </li>

                    <!--<li class="list-inline-item">

                        <a href="javascript:;" class="link-dark"><span class="icon-settings1"></span></a>

                    </li>-->

                    <li class="list-inline-item">

                        <div class="dropdown">

                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <div class="userImg rounded-circle overflow-hidden">

                                    <?php

								$session_id = $this->session->userdata('userId')['user_id']; 

								$check_image = $this->Common_model->getsingle("users",array("user_id" => $session_id));

								if(!empty($check_image->user_image)){ ?>

                                    <img src="<?php echo base_url(); ?>upload/<?php echo $check_image->user_image; ?>"
                                        alt="img">

                                    <?php }else{ ?>

                                    <img src="<?php echo base_url(); ?>images/user_image.png" alt="img">

                                    <?php }

								?>

                                </div>

                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item" href="<?php echo base_url(); ?>myprofile"><em class="icon icon-edit-2"></em> Edit Profile</a>

                                <a class="dropdown-item" href="<?php echo base_url(); ?>userprofile"><em class="icon icon-user"></em> My Profile</a>
                                
                                <a class="dropdown-item" href="<?php echo base_url(); ?>friendRequest_list"><em class="icon icon-users"></em> Friend Request</a>
                                
                                <a class="dropdown-item" href="<?php echo base_url(); ?>support"><em class="icon icon-headphones"></em> Support System</a>

                                <a class="dropdown-item" href="<?php echo base_url(); ?>changepass"><em class="icon icon-lock"></em> Change Password</a>

                                <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><em class="icon icon-log-out"></em> Logout</a>

                            </div>

                        </div>

                    </li>

                </ul>

            </div>



        </nav>

    </header>

