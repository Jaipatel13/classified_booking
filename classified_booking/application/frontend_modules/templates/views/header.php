<?php
  /*echo "copyright => ".$copyright."<br/>";
  echo "site_title => ".$site_title."<br/>";
  echo "site_title => ".$site_title."<br/>";*/  
  $page_title = $data['page_title'];
    $page_name = isset($data['page_name']) ? $data['page_name'] : "";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?php echo SITE_TITLE; ?> | <?php echo $page_title; ?></title>

    <!-- <title>Classified Booking &mdash;</title> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/rangeslider.css">

    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/css/style.css">
    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/css/custom.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/css/bootstrapValidator.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar container py-0 bg-white" role="banner">

      <!-- <div class="container"> -->
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="<?php echo base_url();?>" class="text-black mb-0">Clasified<span class="text-primary">BOOKING</span>  </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                <!-- <li><a href="<?php echo base_url();?>advertiesment">Ads</a></li> -->
                <li class=""> <!-- has-children -->
                  <a href="<?php echo base_url();?>about">About</a>
                  <?php /* ?>
                  <ul class="dropdown">
                    <li><a href="#">Newspaper Details</a></li>
                    <li><a href="#">Newspaper Popularity</a></li>
                    <!-- <li><a href="#">Phi</a></li>
                    <li><a href="#">Careers</a></li> -->
                  </ul>
                  <?php */ ?>
                </li>
                <li><a href="<?php echo base_url();?>contact">Contact</a></li>

                <?php                                   
                    if($this->session->has_userdata('logged_in'))
                    {
                ?>
                <li class="ml-xl-3 login">
                <!-- <div class="cls_login_signup_menu flat-top"> -->
                <!-- <span class="custom-info cls_header_login_signup"><i class="fa fa-sign-in"></i> -->
                  <a class="" href="<?php echo base_url();?>login/logout"><span class="border-left pl-xl-4"></span>Logout</a>
                <!-- </span> -->
                <!-- </div> -->
                </li>
                <li>
                <!-- <div class="cls_login_signup_menu flat-top"> -->
                <!-- <span class="custom-info cls_header_login_signup"><i class="fa fa-user"></i> -->
                  <a class="" href="<?php echo base_url();?>user_profile"><?php echo $this->session->userdata('logged_in_user_name'); ?></a>
                <!-- </span> -->
                </li>
                <?php
                    }
                    else
                    {
                ?>
                <li class="ml-xl-3 login"><a href="<?php echo base_url();?>login"><span class="border-left pl-xl-4"></span>Log In</a></li>
                <li><a href="<?php echo base_url();?>signup">Register</a></li>
                <?php   
                    }
                ?>
                <!-- <li><a href="#" class="cta"><span class="bg-primary text-white rounded">+ Post an Ad</span></a></li>
               -->
           </ul>
            </nav>
          </div>



          <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      <!-- </div> -->
      
    </header>