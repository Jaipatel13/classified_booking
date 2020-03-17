<!-- Page title -->
        <div class="page-title parallax-style parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2>Customer Profile</h2>
                        </div><!-- /.page-title-heading -->                        
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /.page-title -->

        <div class="page-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="breadcrumbs">
                            <h2 class="trail-browse">You are here:</h2>
                            <ul class="trail-items">
                                <li class="trail-item"><a href="<?php echo base_url();?>">Home</a></li>
                                <li class="trail-item"><a href="<?php echo base_url();?>signup/signup_select_user">Signup</a></li>
                                <li>Customer Profile</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom70px">
            <div class="cls_signup_page container">
                <div class="row">
                    <div class="general">
                        <h3 class="flat-title-section style mag-top0px">Subscribe for <span><?php echo SITE_TITLE; ?> Services</span></h3>

                        <p>Need dependable, cost effective transportation of your commodities? Fill out our easy Subscription Form below to get a fast services on your job.</p>

                        <form id="signup_form" class="cls_signup_form" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <div class="quick-form">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3">User Profile</h5>
                                    </div>
                                </div>

                                <?php /* ?>
                                <div class="form-group">                                        
                                    <div class="col-md-12">                                        
                                        <select class="" tabindex="1" name="user_type" required="required">
                                            <option value="">Select User Type*</option>
                                            <option value="<?php echo USER_TYPE_CUSTOMER; ?>">Customer</option>
                                            <option value="<?php echo USER_TYPE_TRANSPORTER; ?>">Transporter</option>
                                        </select>
                                        <!-- <input type="text" name="user_type" value="" placeholder="Company*" required="required"> -->
                                    </div>
                                </div><!-- /.row -->
                                <?php */ ?>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" name="user_type" value="<?php echo USER_TYPE_CUSTOMER; ?>">
                                        <input class="form-control" tabindex="2" type="text" name="first_name" value="" placeholder="First Name*" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="3" type="text" name="last_name" value="" placeholder="Last name*" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="4" id="username" type="text" name="username" value="" placeholder="Username*" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="5" id="email" type="email" name="email" value="" placeholder="Email*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="6" type="text" name="mobile_no" value="" placeholder="Phone Number*" required="required">
                                    </div>
                                </div>                                

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="First Name*" required="required">
                                        <input type="text" value="" placeholder="Phone" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="Last name*" required="required">
                                        <input type="text" value="" placeholder="Email*" required="required">
                                    </div>
                                </div> --><!-- /.row -->

                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="username" value="" placeholder="Username*" required="required">
                                    </div>
                                </div> --><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">                                        
                                        <input class="form-control" tabindex="7" type="password" name="password" id="password" value="" placeholder="Password*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">                                        
                                        <input class="form-control" tabindex="8" type="password" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <!-- <h5 class="flat-title-section style3">Product being shipped</h5> -->

                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="Commodity*" required="required">
                                        <input type="text" value="" placeholder="Dimensions" required="required">
                                        <input type="text" value="" placeholder="Weight*" required="required">
                                    </div>
                                </div> --><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3">Address</h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="9" type="text" name="address_line_1" value="" placeholder="Address*" required="required">
                                    </div>
                                </div>
                                <div class="form-group">                      
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="10" type="text" name="address_line_2" value="" placeholder="Street Address*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="" tabindex="11" id="country_id" name="country_id" required="required">
                                            <option value="">Select Country*</option>
                                            <?php
                                                $all_countries = array();
                                                if(isset($data) && !empty($data))
                                                {
                                                   $all_countries = $data['all_countries'];
                                                }
                                                if(isset($all_countries) && !empty($all_countries))
                                                {
                                                    foreach ($all_countries as $key => $country) {
                                                    $country_id = $country['country_id'];    
                                                    $country_name = $country['country_name'];
                                            ?>                                            
                                            <option value="<?php echo $country_id; ?>"><?php echo $country_name; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <div class="col-md-12">
                                        <select class="" tabindex="12" name="state_id" id="state_id" required="required">
                                            <option value="">Select State*</option>                                            
                                        </select>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-md-12">    
                                        <select class="" tabindex="13" name="city_id" id="city_id" required="required">
                                            <option value="">Select City*</option>                                            
                                        </select>                                        
                                        <!-- <input type="text" value="" placeholder="City*" required="required"> -->
                                        <!-- <input type="text" value="" placeholder="Pickup Date*" required="required"> -->
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="14" type="text" name="zip_code" value="" placeholder="Pincode*" required="required">
                                        <!-- <input type="text" value="" placeholder="State / Province / Region*" required="required"> -->
                                    </div>
                                </div><!-- /.row -->

                                <div class="form-group">
                                    <div class="col-md-12 cls_margin_bottom_3_perc">
                                        <div class="cls_signup_tc_div">
                                        <input class="form-control cls_margin_left_0_perc cls_signup_tc_input" tabindex="15" type="checkbox" name="terms_conditions" value="true" required="required" style="width: 5% !important;">
                                        </div>
                                        <div class="cls_signup_tc_label_div">
                                        <label for="terms_conditions">Accept Our Terms and Conditions <a tabindex="16" href="<?php echo base_url(); ?>frontend_assets/docs/terms_conditions.pdf" target="_blank" >[Click Here]</a></label>
                                        <!-- data-toggle="modal" data-target="#modal-lg-signup-tc" -->
                                        </div>
                                        <!-- <input type="text" value="" placeholder="State / Province / Region*" required="required"> -->
                                        <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg-signup-tc">
                                           <i class="fa fa-eye">
                                           </i>
                                           View / Track
                                          </button>    -->
                                          <?php /* ?>
                                        <div class="modal fade cls_signup_tc_modal" id="modal-lg-signup-tc">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Terms and Conditions</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                  
                                                  <p><!--<span class="bg-light color-palette">Terms and Conditions</span>--><strong class="text-center bg-light">
                                                  Terms of Service                                                    
                                                  </strong></p>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                              </div>
                                              <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                          </div>                                          
                                          <!-- /.modal -->
                                          <?php */ ?>
                                    </div>
                                </div><!-- /.row -->

                                <!-- <h5 class="flat-title-section style3">Drop-off address</h5> -->

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="City*" required="required">
                                         <input type="text" value="" placeholder="Delivery Date*" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="State / Province / Region*" required="required">
                                    </div>
                                </div> --><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <input name="submit" type="submit" id="submit" class="submit" value="submit"> -->
                                        <input tabindex="17" type="button" name="submit" id="submit" class="submit" value="submit">
                                        <input tabindex="18" type="reset" name="reset" id="reset" class="submit" value="reset">
                                    </div>
                                </div>
                            </div><!-- /.quick-form -->
                        </form>
                    </div><!-- /.general -->

                    <?php /* ?>
                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <div class="content-text">
                                            <h4 class="title">Why choose us?</h4>
                                            <ul>
                                                <li><i class="fa fa-arrow-circle-right"></i> Over 20 years experience</li>
                                                <li><i class="fa fa-arrow-circle-right"></i>  Well over 100 Trucks</li>
                                                <li><i class="fa fa-arrow-circle-right"></i> Reliable Service</li>
                                                <li><i class="fa fa-arrow-circle-right"></i>  On Time Deliveries</li>
                                                <li><i class="fa fa-arrow-circle-right"></i>  Professional Drivers</li>
                                                <li><i class="fa fa-arrow-circle-right"></i> Excellent Customer Service</li>
                                            </ul>
                                        </div>
                                    </div><!-- /.textwidget -->
                                </div><!-- /.widget_text -->

                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <a class="button lg bg-scheme2 download" href="#">Download Brochure <i class="fa fa-download"></i></a>
                                        <a class="button lg outline download" href="#">Ask Our Experts <i class="fa fa-question-circle"></i></a>
                                    </div><!-- /.textwidget -->
                                </div><!-- /.widget_text -->

                                <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">Recent news</h4>
                                    <ul>
                                        <li>
                                            <a href="blog-single.html">Raising productivity &amp; morale in the warehouse</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                        <li>
                                            <a href="blog-single.html">Seafield logistics goes into administration</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                        <li>
                                            <a href="blog-single.html">Transport managers grow scarce</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                    </ul>
                                </div><!-- /.widget_recent_entries -->
                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                    <?php */ ?>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row