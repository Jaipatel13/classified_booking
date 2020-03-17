<!-- Page title -->
        <div class="page-title parallax-style parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2>Password Reset</h2>
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
                                <li>Password Reset</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom70px">
            <div class="cls_password_reset_page container">
                <div class="row">
                    <div class="general">
                        <?php /* ?>
                        <h3 class="flat-title-section style mag-top0px">Subscribe for <span><?php echo SITE_TITLE; ?> Services</span></h3>

                        <p>Need dependable, cost effective transportation of your commodities? Fill out our easy Subscription Form below to get a fast services on your job.</p>
                        <?php */ ?>

                        <form id="password_reset_form" class="cls_password_reset_form" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <div class="quick-form">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="flat-title-section style3">Password Reset</h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">                                        
                                        <input class="form-control" tabindex="1" type="password" name="current_password" id="current_password" value="" placeholder="Current Password*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">                                        
                                        <input class="form-control" tabindex="2" type="password" name="password" id="password" value="" placeholder="New Password*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                <div class="form-group">
                                    <div class="col-md-12">                                        
                                        <input class="form-control" tabindex="3" type="password" name="confirm_password" id="confirm_password" value="" placeholder="Confirm New Password*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12">                                        
                                        <input tabindex="4" type="button" name="submit" id="password_reset_submit" class="submit" value="submit">
                                        <input tabindex="5" type="reset" name="reset" id="password_reset_reset" class="submit" value="reset">
                                    </div>
                                </div>
                            </div><!-- /.quick-form -->
                        </form>
                    </div><!-- /.general -->
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row