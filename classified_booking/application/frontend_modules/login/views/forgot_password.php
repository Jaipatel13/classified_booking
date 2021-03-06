<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url();?>frontend_assets/images/hero_1.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Forgot Password</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5"  data-aos="fade">
            <form id="forgot_password_form" class="cls_forgot_password_form" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <div class="quick-form">
                                
                                <?php 
                                    $message = $this->session->flashdata('message');
                                    $success = $this->session->flashdata('success');

                                    if (isset($success) && $success == true)
                                    {
                                        $message_icon_class = "glyphicon glyphicon-ok cls_padding_right_1_perc";
                                        $message_class = "cls_message_success_true";
                                    }
                                    else
                                    {
                                        $message_icon_class = "glyphicon glyphicon-remove cls_padding_right_1_perc";
                                        $message_class = "cls_message_success_false";
                                    }

                                    if (isset($message))
                                    {
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="<?php echo $message_class; ?>"><i class="<?php echo $message_icon_class; ?>"></i><?php echo $message; ?></span>
                                    </div>
                                </div>
                                <?php 
                                        $this->session->unset_userdata('message');
                                    }
                                ?>

                                <div class="row form-group">
                                
                                    <div class="col-md-12">
                                      <label class="text-black" for="email">Email</label> 
                                        <input class="form-control" tabindex="1" id="forgot_password_email" type="email" name="email" value="" placeholder="Email*" required="required">
                                    </div>
                                  </div>
                                                              
                                  <div class="row form-group">
                                    <div class="col-md-12">
                                      <input tabindex="2" type="button" name="submit"  id="forgot_password_submit" class="btn btn-primary py-2 px-4 text-white" value="Submit">
                                       <input tabindex="3" type="reset" name="reset" id="forgot_password_reset" class="btn btn-primary py-2 px-4 text-white" value="Reset">
                                    </div>
                                  </div>
                            </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
