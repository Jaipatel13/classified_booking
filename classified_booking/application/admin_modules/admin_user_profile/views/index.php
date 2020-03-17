<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <i class="fa fa-user img-circle cls_user_profile_img"></i>
                  <?php /* ?>
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url();?>backend_assets/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                  <?php */ ?>
                </div>

                <?php
                  $user_full_name = $data['user_data']['first_name']." ".$data['user_data']['last_name'];
                ?>                
                <h3 class="profile-username text-center"><?php echo $user_full_name; ?></h3>

                <?php /* ?>
                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                <?php */ ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <?php /* ?>
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <?php */ ?>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <?php /* ?>
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <?php */ ?>                  
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">User Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Password Reset</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <?php /* ?>
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>backend_assets/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>backend_assets/dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>backend_assets/dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="<?php echo base_url();?>backend_assets/dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="<?php echo base_url();?>backend_assets/dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="<?php echo base_url();?>backend_assets/dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="<?php echo base_url();?>backend_assets/dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="<?php echo base_url();?>backend_assets/dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <?php */ ?>
                  <!-- /.tab-pane -->
                  <?php /* ?>
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <?php */ ?>
                  <!-- /.tab-pane -->

                  <div class="cls_user_profile_page active tab-pane" id="settings">
                    <form id="user_profile_form" class="cls_user_profile_form form-horizontal" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                      <div class="quick-form">

                        <?php
                            $user_email = $data['user_data']['email'];
                            $user_mobile_no = $data['user_data']['mobile_no'];
                            $user_first_name = $data['user_data']['first_name'];
                            $user_last_name = $data['user_data']['last_name'];                            
                        ?>

                      <div class="form-group row">
                        <!-- <label for="inputName" class="col-sm-2 col-form-label">First Name*</label> -->
                        <div class="col-sm-10">
                          <!-- <input type="email" class="form-control" id="inputName" placeholder="Name"> -->
                          <input class="form-control" tabindex="1" type="text" name="first_name" value="<?php echo $user_first_name; ?>" placeholder="First Name*" title="First Name" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <!-- <label for="inputEmail" class="col-sm-2 col-form-label">Last Name*</label> -->
                        <div class="col-sm-10">
                          <!-- <input type="email" class="form-control" id="inputEmail" placeholder="Email"> -->
                          <input class="form-control" tabindex="2" type="text" name="last_name" value="<?php echo $user_last_name; ?>" placeholder="Last Name*" title="Last Name" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <!-- <label for="inputName2" class="col-sm-2 col-form-label">Email*</label> -->
                        <div class="col-sm-10">
                          <!-- <input type="text" class="form-control" id="inputName2" placeholder="Name"> -->
                          <input class="form-control" tabindex="3" id="user_profile_email" type="email" name="email" value="<?php echo $user_email; ?>" placeholder="Email*" title="Email" required="required">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <!-- <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label> -->
                        <div class="col-sm-10">
                          <!-- <input type="text" class="form-control" id="inputSkills" placeholder="Skills"> -->
                          <input class="form-control" tabindex="4" type="text" name="mobile_no" value="<?php echo $user_mobile_no; ?>" placeholder="Phone Number*" title="Phone Number" required="required">
                        </div>
                      </div>
                      <?php /* ?>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <?php */ ?>
                      <div class="form-group row">
                        <div class="col-sm-1">
                          <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                          <input tabindex="5" type="button" name="submit" id="user_profile_submit" class="btn btn-primary submit" value="Submit">
                        </div>  
                        <div class="col-sm-4">
                          <input tabindex="6" type="reset" name="reset" id="user_profile_reset" class="btn btn-danger submit" value="Reset">
                        </div>
                        <div id="message_block" class="col-sm-5"></div>
                      </div>
                      </div><!-- /.quick-form -->
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="cls_password_reset_page tab-pane" id="activity">
                    <form id="password_reset_form" class="cls_password_reset_form" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                      <div class="quick-form">

                      <div class="form-group row">                        
                        <div class="col-sm-10">                          
                          <input class="form-control" tabindex="1" type="password" name="current_password" id="current_password" value="" placeholder="Current Password*" title="Current Password" required="required">
                        </div>
                      </div>
                      <div class="form-group row">                        
                        <div class="col-sm-10">                          
                          <input class="form-control" tabindex="2" type="password" name="password" id="password" value="" placeholder="New Password*" title="New Password" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="3" type="password" name="confirm_password" id="confirm_password" value="" placeholder="Confirm New Password*" title="Confirm New Password" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-1">
                          <input tabindex="4" type="button" name="submit" id="password_reset_submit" class="btn btn-primary submit" value="Submit">
                        </div>  
                        <div class="col-sm-4">
                          <input tabindex="5" type="reset" name="reset" id="password_reset_reset" class="btn btn-danger submit" value="Reset">
                        </div>
                        <div id="message_block_password_reset" class="col-sm-5"></div>
                      </div>
                      </div><!-- /.quick-form -->
                    </form>
                  </div>
                  <!-- /.tab-pane -->                  

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->