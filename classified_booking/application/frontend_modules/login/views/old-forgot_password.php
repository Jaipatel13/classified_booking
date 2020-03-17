<!-- Page title -->
        <div class="page-title parallax-style parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2>Forgot Password</h2>
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
                                <li>Forgot Password</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom70px">
            <div class="cls_forgot_password_page container">
                <div class="row">
                    <div class="general">
                        <?php /* ?>
                        <h3 class="flat-title-section style mag-top0px">Subscribe for <span><?php echo SITE_TITLE; ?> Services</span></h3>

                        <p>Need dependable, cost effective transportation of your commodities? Fill out our easy Subscription Form below to get a fast services on your job.</p>
                        <?php */ ?>

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

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3 cls_login_h5">Forgot Password</h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="form-control" tabindex="1" id="forgot_password_email" type="email" name="email" value="" placeholder="Email*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <input tabindex="2" type="button" name="submit" id="forgot_password_submit" class="submit" value="submit">
                                        <input tabindex="3" type="reset" name="reset" id="forgot_password_reset" class="submit" value="reset">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><?php /* ?>If you are not registered than Register First by clicking below given link<?php */ ?>
                                        Click below link
                                            <h5 class="cls_login_h5"><a class="cls_register_button_link" tabindex="4" href="<?php echo base_url(); ?>signup">REGISTER</a></h5>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- /.quick-form -->
                        </form>
                    </div><!-- /.general -->
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->