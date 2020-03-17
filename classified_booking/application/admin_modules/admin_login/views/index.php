<body class="hold-transition login-page cls_bgcolor_white">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url();?>backend_assets/dist/img/logo.png" alt="images">
  </div>
  <!-- /.login-logo -->
  <div class="card cls_login_card_shadow cls_login_page">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="login_form" class="cls_login_form" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <div class="quick-form">

          <?php 
              $message = $this->session->flashdata('message');
              $success = $this->session->flashdata('success');

              if (isset($success) && $success == true)
              {
                  $message_icon_class = "glyphicon glyphicon-ok cls_padding_right_1_perc cls_font_size_100_perc";
                  $message_class = "cls_message_success_true";
              }
              else
              {
                  $message_icon_class = "glyphicon glyphicon-remove cls_padding_right_1_perc cls_font_size_100_perc";
                  $message_class = "cls_message_success_false";
              }

              if (isset($message))
              {
          ?>
          <div class="row">
              <div class="col-md-12 cls_text_align_center">
                  <span class="<?php echo $message_class; ?>"><i class="<?php echo $message_icon_class; ?>"></i><?php echo $message; ?></span>
              </div>
          </div>
          <?php 
                  $this->session->unset_userdata('message');
              }
          ?>

          <div class="form-group"> <!--  input-group mb-3 -->
            <!-- <input type="email" class="form-control" placeholder="Email*"> -->
            <input class="form-control" tabindex="1" id="login_email" type="email" name="email" value="" placeholder="Email*" required="required">
            <!--<div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>-->
          </div>
          <div class="form-group"> <!--  input-group mb-3 -->
            <!-- <input type="password" class="form-control" placeholder="Password*"> -->
            <input class="form-control" tabindex="2" type="password" name="password" id="login_password" value="" placeholder="Password*" required="required">
            <!--<div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>-->
          </div>
          <div class="row">
            <div class="col-6">
              <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
              <input tabindex="3" type="button" name="submit" id="login_submit" class="submit btn btn-primary btn-block" value="Submit">
            </div>  
            <div class="col-6">
              <input tabindex="4" type="reset" name="reset" id="login_reset" class="submit btn btn-primary btn-block" value="Reset">
            </div>
            <div id="message_block" class="col-12"></div>
            <!-- /.col -->
          </div>
        </div><!-- /.quick-form -->
      </form>

      <p class="mb-1">
        <a href="<?php echo base_url();?>admin/forgot_password"><strong>I forgot my password</strong></a>
      </p>      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->