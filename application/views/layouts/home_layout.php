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



    <header>

        <nav class="navbar navbar--homeBg fixed-top">

            <div class="searchForm">

                <form method="post" action="" name="search">

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

                            <span class="icon icon-users-feed"></span>

                            <span class="nav-text">buzz</span>

                        </a>



                    </li>

                    <li class="list-inline-item">

                        <a href="<?php echo base_url(); ?>gov_detail">

                            <span class="icon icon-trending"></span>

                            <span class="nav-text">let's Gov</span>

                        </a>

                    </li>

                    <li class="list-inline-item">
                        <a href="<?php echo base_url(); ?>friendRequest_list">
                            <span class="icon icon-menu"></span>
                            <span class="nav-text">Friend Request</span>
                        </a>
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

                        <a href="javascript:;" class="link-dark"><span class="icon-mood"></span></a>

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

                                <a class="dropdown-item" href="<?php echo base_url(); ?>myprofile">Edit Profile</a>

                                <a class="dropdown-item" href="<?php echo base_url(); ?>userprofile">My Profile</a>

                                <a class="dropdown-item" href="javascript:void(0);">Change Password</a>

                                <a class="dropdown-item" href="<?php echo base_url(); ?>logout">Logout</a>

                            </div>

                        </div>

                    </li>

                </ul>

            </div>



        </nav>

    </header>