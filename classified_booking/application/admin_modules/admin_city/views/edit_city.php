<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/city">City</a></li>
              <li class="breadcrumb-item active">Edit City</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">                  
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">City</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="cls_edit_city_page active tab-pane" id="settings">
                    <form id="edit_city_form" class="cls_edit_city_form form-horizontal" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                      <div class="quick-form">

                        <?php
                          $sel_state_id = $data['state_id'];
                          $sel_country_id = $data['country_id'];
                          $sel_city_id = $data['city_id'];
                          $sel_city_name = $data['city_name'];
                        ?>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <select id="country_id" class="custom-select cls_country_id" name="country_id" required="required">
                          <?php
                           if(isset($data) && !empty($data))
                            {
                               $all_countries = $data['all_countries'];

                               if(isset($all_countries) && !empty($all_countries))
                              {
                                  $selected = "";
                                  foreach ($all_countries as $key => $aco) {
                                  $country_id = $aco['country_id'];                                  
                                  $country_name = $aco['country_name'];

                                  if($country_id == $sel_country_id)
                                  {
                                    $selected = 'selected';
                                  }
                                  else
                                  {
                                    $selected = '';
                                  }
                           ?>
                              <option value="<?php echo $country_id; ?>" <?php echo $selected; ?>><?php echo $country_name; ?></option>
                           <?php
                                  }
                              }
                            }
                           ?>
                         </select>
                        </div>
                      </div>  

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <select id="state_id" class="custom-select cls_state_id" name="state_id" required="required">
                            <?php
                           if(isset($data) && !empty($data))
                            {
                               $all_states = $data['all_states'];

                               if(isset($all_states) && !empty($all_states))
                              {
                                  $selected = "";
                                  foreach ($all_states as $key => $aco) {
                                  $state_id = $aco['state_id'];                                  
                                  $state_name = $aco['state_name'];

                                  if($state_id == $sel_state_id)
                                  {
                                    $selected = 'selected';
                                  }
                                  else
                                  {
                                    $selected = '';
                                  }
                           ?>
                            <option value="<?php echo $state_id; ?>" <?php echo $selected; ?>><?php echo $state_name; ?></option>
                            <?php
                                  }
                              }
                            }
                           ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="1" type="text" name="city_name" value="<?php echo $sel_city_name; ?>" placeholder="City Name*" required="required">
                          <input class="form-control" type="hidden" name="city_id" value="<?php echo $sel_city_id; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                          <input tabindex="5" type="button" name="submit" id="edit_city_submit" class="btn btn-primary submit" value="Submit">
                        </div>  
                        <div class="col-sm-1">
                          <input tabindex="6" type="reset" name="reset" id="edit_city_reset" class="btn btn-danger submit" value="Reset">
                        </div>
                        <div id="message_block_city_edit" class="col-sm-5"></div>
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