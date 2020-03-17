<?php
	/*echo "copyright => ".$copyright."<br/>";
	echo "site_title => ".$site_title."<br/>";
	echo "site_title => ".$site_title."<br/>";*/	
	$page_title = $data['page_title'];
    $page_name = isset($data['page_name']) ? $data['page_name'] : "";
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?php echo SITE_TITLE; ?> | <?php echo $page_title; ?></title>

    <meta name="author" content="Udropp">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/bootstrapValidator.css" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/responsive.css">

    <!-- Colors -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/colors/color2.css" id="colors"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/colors/color7.css" id="colors">
	
	<!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/animate.css">

    <!-- Favicon and touch icons  -->
    <link href="<?php echo base_url();?>frontend_assets/icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?php echo base_url();?>frontend_assets/icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="<?php echo base_url();?>frontend_assets/icon/favicon.png" rel="shortcut icon">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Video JS Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/video-js.css">

    <?php 
    if ( isset($page_name) && ( ($page_name == "order_list") || ($page_name == "signup") ) )
    {
    ?>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>frontend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <?php
    }
    ?>
    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>frontend_assets/stylesheets/custom.css">

</head>                                 
<body class="header-sticky page-loading">   
    <div class="loading-overlay">
    </div>
    
    <!-- Boxed -->
    <div class="boxed">
        <div class="site-header header-v2">
            <?php /* ?>
            <div class="flat-top">
                <div class="container">
                    <div class="row">
                        <div class="flat-wrapper">
                            <div class="custom-info cls_float_right">
                                <?php /* ?><span>Have any questions?</span><?php */ ?>
                                <?php /* ?>
                                <!-- <span><i class="fa fa-reply"></i>themesflat@gmail.com</span>  -->
                                <span><i class="fa fa-reply"></i>info@udropp.com</span>
                                <span><i class="fa fa-map-marker"></i>66 Nicholson St Buffalo New York US</span> 
                                <span><i class="fa fa-phone"></i>+ 012 222 989899</span>
                                <?php */ ?>
                                <?php /*                                   
                                    if($this->session->has_userdata('logged_in'))
                                    {
                                ?>
                                <span class="cls_header_login_signup"><i class="fa fa-sign-in"></i><a class="" href="<?php echo base_url();?>login/logout">Logout</a></span>
                                <span class="cls_header_login_signup"><i class="fa fa-user"></i><a class="" href="<?php echo base_url();?>user_profile"><?php echo $this->session->userdata('logged_in_user_name'); ?></a></span>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <span class="cls_header_login_signup"><i class="fa fa-sign-in"></i><a class="" href="<?php echo base_url();?>login">Login</a></span>
                                <span class="cls_header_login_signup"><i class="fa fa-user"></i><a class="" href="<?php echo base_url();?>signup">Signup</a></span>
                                <?php   
                                    }*/
                                ?>
        <?php /* ?>          
                            </div>
                            <?php /* ?>    
                            <div class="social-links">
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook-official"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </div>
                            <?php */ ?>
        <?php /* ?>                    
                        </div><!-- /.flat-wrapper -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.flat-top -->
        <?php */ ?>
          
            <header id="header" class="header cls_main_header"> 
                <div class="header-wrap">
                    <div id="logo" class="logo">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>frontend_assets/images/logo.png" alt="images">
                        </a>
                    </div><!-- /.logo -->
                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
               
                    <div class="nav-wrap">                                
                        <nav id="mainnav" class="mainnav">
                            <?php /* ?>
                            <div class="menu-extra">
                                <ul>
                                    <li id ="s" class="search-box">
                                        <a href="#search" class="flat-search"><i class="fa fa-search"></i></a>
                                        <div class="submenu top-search">
                                            <div class="widget widget_search">
                                                <form class="search-form">
                                                    <input type="search" class="search-field" placeholder="Search …">
                                                    <input type="submit" class="search-submit">
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="shopping-cart">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="shopping-cart-items-count">2</span>
                                        </a>
                                        <div class="subcart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="cart_list product_list_widget">      
                                                    <li class="mini_cart_item">
                                                        <a href="#" class="remove" >x</a>
                                                        <a href="#"><img src="<?php echo base_url();?>frontend_assets/images/products/1.jpg" alt="images">Boskke Cube</a>
                                                        <p><span class="quantity">1 × <span class="amount">$39.00</span></span></p>
                                                    </li> 
                                                    <li class="mini_cart_item">
                                                        <a href="#" class="remove" >x</a>
                                                        <a href="#"><img src="<?php echo base_url();?>frontend_assets/images/products/2.jpg" alt="images">Cast Iron Casserole</a>
                                                        <p><span class="quantity">1 × <span class="amount">$230.00</span></span></p>
                                                    </li>    
                                                </ul>
                                                <p class="total">
                                                    <strong>Subtotal:</strong> <span class="amount">$269.00</span>
                                                </p>
                                                <div class="group-btn">
                                                    <a class="button" href="#">view cart</a>                                                
                                                    <a class="button bg-scheme3 style1" href="#">checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div><!-- /.menu-extra -->
                            <?php */ ?>
                            <ul class="menu cls_header_main_menu"> 
                                <li class="home">
                                    <a href="<?php echo base_url();?>">Home</a>
                                    <?php /* ?>
                                    <ul class="submenu"> 
                                        <li><a href="index.html">Home – Header Modern</a></li>
                                        <li><a href="home-header-classic.html">Home – Header Classic</a></li>                                        
                                        <li><a href="home-header-transparent.html">Home – Header Transparent</a></li>
                                        <li><a href="home-header-widget.html">Home – Header Widgetized</a></li>
                                        <li><a href="mega-menu.html">Home – Mega Menu</a></li>
                                        <li><a href="one-page.html">Home – One Page</a></li>
                                    </ul><!-- /.submenu -->
                                    <?php */ ?>
                                </li>
                                <li><a href="<?php echo base_url();?>company">Company</a>
                                    <?php /* ?>
                                    <ul class="submenu">

                                        <li><a href="<?php echo base_url();?>about_us">About Us</a></li>
                                                                                
                                        <li><a href="<?php echo base_url();?>our_team">Our Team</a></li>                                        
                                        
                                    </ul><!-- /.submenu -->
                                    <?php */ ?>
                                </li>
                                <li><a href="<?php echo base_url();?>service">Services</a>
                                </li>
                                <li><a href="#">Orders</a>
                                    <ul class="submenu">                                        
                                        <li><a href="<?php echo base_url();?>generate_order">New Order</a></li>
                                        <li><a href="<?php echo base_url();?>order_list">Track Order</a></li>
                                    </ul><!-- /.submenu -->
                                </li>
                                <li><a href="<?php echo base_url();?>contact_us">Contact</a></li>

                                <?php                                   
                                    if($this->session->has_userdata('logged_in'))
                                    {
                                ?>
                                <li>
                                <div class="cls_login_signup_menu flat-top">
                                <span class="custom-info cls_header_login_signup"><i class="fa fa-sign-in"></i><a class="" href="<?php echo base_url();?>login/logout">Logout</a></span>
                                </div>
                                </li>
                                <li>
                                <div class="cls_login_signup_menu flat-top">
                                <span class="custom-info cls_header_login_signup"><i class="fa fa-user"></i><a class="" href="<?php echo base_url();?>user_profile"><?php echo $this->session->userdata('logged_in_user_name'); ?></a></span>
                                </li>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <li>
                                <div class="cls_login_signup_menu flat-top">
                                <span class="custom-info cls_header_login_signup"><i class="fa fa-sign-in"></i><a class="" href="<?php echo base_url();?>login">Login</a></span>
                                </div>
                                </li>
                                <li>
                                <div class="cls_login_signup_menu flat-top">
                                <?php /* ?>
                                <span class="custom-info cls_header_login_signup"><i class="fa fa-user"></i><a class="" href="<?php echo base_url();?>signup">Signup</a></span>
                                <?php */ ?>
                                <span class="custom-info cls_header_login_signup"><i class="fa fa-user"></i><a class="" href="<?php echo base_url();?>signup/signup_select_user">Signup</a></span>
                                </div>
                                </li>
                                <?php   
                                    }
                                ?>

                            </ul><!-- /.menu -->                                        
                        </nav><!-- /.mainnav -->  
                    </div><!-- /.nav-wrap -->
                </div><!-- /.header-wrap --> 
            </header><!-- /.header -->
        </div><!-- /.site-header -->