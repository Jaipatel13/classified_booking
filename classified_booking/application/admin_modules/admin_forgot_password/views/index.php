<body class="hold-transition login-page cls_bgcolor_white">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url();?>backend_assets/dist/img/logo.png" alt="images">
  </div>
  <!-- /.login-logo -->
  <div class="card cls_login_card_shadow cls_forgot_password_page">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve your password.</p>

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

          <div class="form-group">
          <!-- <div class="input-group mb-3"> -->
            <!-- <input type="email" class="form-control" placeholder="Email"> -->
            <input class="form-control" tabindex="1" id="forgot_password_email" type="email" name="email" value="" placeholder="Email*" required="required">
            <!-- <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div> -->
          <!-- </div> -->
          </div>

          <div class="row">
            <div class="col-6">
              <!-- <button type="submit" class="btn btn-primary btn-block">Submit</button> -->            
              <input tabindex="2" type="button" name="submit" id="forgot_password_submit" class="submit btn btn-primary btn-block" value="Submit">
            </div>
            <div class="col-6">
              <input tabindex="3" type="reset" name="reset" id="forgot_password_reset" class="submit btn btn-primary btn-block" value="Reset">
            </div>
            <div id="message_block" class="col-12"></div>
            <!-- /.col -->
          </div>
      </div><!-- /.quick-form -->
    </form>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url();?>admin/login"><strong>Login</strong></a>
      </p>      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->