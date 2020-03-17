<!-- Page title -->
        <div class="page-title parallax-style parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2>User Profile</h2>
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
                                <li>User Profile</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom70px">
            <div class="cls_user_profile_page container">
                <div class="row">
                    <div class="general">
                        <?php /* ?>
                        <h3 class="flat-title-section style mag-top0px">Subscribe for <span><?php echo SITE_TITLE; ?> Services</span></h3>

                        <p>Need dependable, cost effective transportation of your commodities? Fill out our easy Subscription Form below to get a fast services on your job.</p>
                        <?php */ ?>

                        <form id="user_profile_form" class="cls_user_profile_form" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <div class="quick-form">

                                <?php
                                    $user_email = $data['user_data']['email'];
                                    $user_mobile_no = $data['user_data']['mobile_no'];
                                    $user_username = $data['user_data']['username'];
                                    $user_first_name = $data['user_data']['first_name'];
                                    $user_last_name = $data['user_data']['last_name'];
                                    $user_address_line_1 = $data['user_data']['address_line_1'];
                                    $user_address_line_2 = $data['user_data']['address_line_2'];
                                    $user_city_id = $data['user_data']['city_id'];
                                    $user_state_id = $data['user_data']['state_id'];
                                    $user_country_id = $data['user_data']['country_id'];
                                    $user_zip_code = $data['user_data']['zip_code'];
                                ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3">User Profile</h5>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="username" value="<?php echo $user_username; ?>" placeholder="Username" readonly title="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="1" type="text" name="first_name" value="<?php echo $user_first_name; ?>" placeholder="First Name*" required="required" title="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="2" type="text" name="last_name" value="<?php echo $user_last_name; ?>" placeholder="Last Name*" required="required" title="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="3" id="user_profile_email" type="email" name="email" value="<?php echo $user_email; ?>" placeholder="Email*" required="required" title="Email">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="4" type="text" name="mobile_no" value="<?php echo $user_mobile_no; ?>" placeholder="Phone Number*" required="required" title="Phone Number">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3">Address</h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="5" type="text" name="address_line_1" value="<?php echo $user_address_line_1; ?>" placeholder="Address*" required="required" title="Address">
                                    </div>
                                </div>
                                <div class="form-group">                      
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="6" type="text" name="address_line_2" value="<?php echo $user_address_line_2; ?>" placeholder="Street Address*" required="required" title="Street Address">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="" tabindex="7" id="user_profile_country_id" name="country_id" required="required" title="Country">
                                            <option value="">Select Country*</option>
                                            <?php
                                                $all_countries = array();
                                                if(isset($data) && !empty($data))
                                                {
                                                   $all_countries = $data['all_countries'];
                                                }
                                                if(isset($all_countries) && !empty($all_countries))
                                                {
                                                    $selected = "";
                                                    foreach ($all_countries as $key => $country) {
                                                    $country_id = $country['country_id'];    
                                                    $country_name = $country['country_name'];
                                                    if($country_id == $user_country_id)
                                                    {
                                                    $selected = "selected";
                                                    }
                                                    else
                                                    {
                                                    $selected = "";
                                                    }
                                            ?>                                            
                                            <option <?php echo $selected; ?> value="<?php echo $country_id; ?>"><?php echo $country_name; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <div class="col-md-12">
                                        <select class="" tabindex="8" name="state_id" id="user_profile_state_id" required="required"  title="State">
                                            <option value="">Select State*</option>                                            
                                            <?php
                                                $all_states = array();
                                                if(isset($data) && !empty($data))
                                                {
                                                   $all_states = $data['all_states'];
                                                }
                                                if(isset($all_states) && !empty($all_states))
                                                {
                                                    $selected = "";
                                                    foreach ($all_states as $key => $state) {
                                                    $state_id = $state['state_id'];    
                                                    $state_name = $state['state_name'];
                                                    if($state_id == $user_state_id)
                                                    {
                                                    $selected = "selected";
                                                    }
                                                    else
                                                    {
                                                    $selected = "";
                                                    }
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $state_id; ?>"><?php echo $state_name; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select class="" tabindex="9" name="city_id" id="user_profile_city_id" required="required" title="City">
                                            <option value="">Select City*</option>
                                            <?php
                                                $all_cities = array();
                                                if(isset($data) && !empty($data))
                                                {
                                                   $all_cities = $data['all_cities'];
                                                }
                                                if(isset($all_cities) && !empty($all_cities))
                                                {
                                                    $selected = "";
                                                    foreach ($all_cities as $key => $city) {
                                                    $city_id = $city['city_id'];
                                                    $city_name = $city['city_name'];
                                                    if($city_id == $user_city_id)
                                                    {
                                                    $selected = "selected";
                                                    }
                                                    else
                                                    {
                                                    $selected = "";
                                                    }
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $city_id; ?>"><?php echo $city_name; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="10" type="text" name="zip_code" value="<?php echo $user_zip_code; ?>" placeholder="Pincode*" required="required" title="Pincode">                                        
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12">                                        
                                        <input tabindex="11" type="button" name="submit" id="user_profile_submit" class="submit" value="submit">
                                        <input tabindex="12" type="reset" name="reset" id="user_profile_reset" class="submit" value="reset">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><?php /* ?>If you want to reset password than Change Password by clicking below given link<?php */ ?>
                                        Click below link
                                            <h5 class="cls_login_h5"><a class="cls_register_button_link" tabindex="5" href="<?php echo base_url(); ?>password_reset">PASSWORD RESET</a></h5>
                                        </p>
                                    </div>
                                </div>    

                            </div><!-- /.quick-form -->
                        </form>
                    </div><!-- /.general -->
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row