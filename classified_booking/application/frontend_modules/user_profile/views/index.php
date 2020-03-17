<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url();?>frontend_assets/images/hero_1.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>User Profile</h1>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  
<!--  -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5"  data-aos="fade">
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Customer Details</h1>
              </div>
            </div>

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
                                        <h5 class="flat-title-section style3"><!-- User Profile --></h5>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="fname">User Name</label>
                                        <input class="form-control" type="text" name="username" value="<?php echo $user_username; ?>" placeholder="Username" readonly title="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="fname">First Name</label>
                                        <input class="form-control" tabindex="1" type="text" name="first_name" value="<?php echo $user_first_name; ?>" placeholder="First Name*" required="required" title="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="fname">Last Name</label>
                                        <input class="form-control" tabindex="2" type="text" name="last_name" value="<?php echo $user_last_name; ?>" placeholder="Last Name*" required="required" title="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="fname">Email</label>
                                        <input class="form-control" tabindex="3" id="user_profile_email" type="email" name="email" value="<?php echo $user_email; ?>" placeholder="Email*" required="required" title="Email">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="fname">Mobile Number</label>
                                        <input class="form-control" tabindex="4" type="text" name="mobile_no" value="<?php echo $user_mobile_no; ?>" placeholder="Phone Number*" required="required" title="Phone Number">
                                    </div>
                                </div>
                               <!--  
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3">Address</h5>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="fname">Address</label>
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
                                        <select id="user_profile_country_id" class="custom-select cls_country_id" name="country_id" required="required">
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
                                        <select id="user_profile_state_id" class="custom-select cls_state_id" name="state_id" required="required">
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
                                            <select id="user_profile_city_id" class="custom-select cls_country_id" name="city_id" required="required">
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
                                        <label class="text-black" for="fname">Pincode</label>
                                        <input class="form-control" tabindex="10" type="text" name="zip_code" value="<?php echo $user_zip_code; ?>" placeholder="Pincode*" required="required" title="Pincode">                                        
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <input tabindex="11" type="button" name="submit" id="user_profile_submit" class="submit btn btn-primary py-2 px-4 text-white" value="Submit">
                                        <input tabindex="12" type="reset" name="reset" id="user_profile_reset" class="submit btn btn-primary py-2 px-4 text-white" value="Reset">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <!-- <p><?php /* ?>If you want to reset password than Change Password by clicking below given link<?php */ ?>
                                        Click below link -->
                                            <h5 class="cls_login_h5"><a class="cls_register_button_link" tabindex="5" href="<?php echo base_url(); ?>password_reset">PASSWORD RESET</a></h5>
                                        </p>
                                    </div>
                                </div>    

                            </div><!-- /.quick-form -->
                        </form>

          </div>
          
        </div>
      </div>
    </div>
