<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add State</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/state">State</a></li>
              <li class="breadcrumb-item active">Add State</li>
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
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">State</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="cls_add_state_page active tab-pane" id="settings">
                    <form id="add_state_form" class="cls_add_state_form form-horizontal" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                      <div class="quick-form">
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <select id="country_id" class="custom-select cls_country_id" name="country_id" required="required">
                          <?php
                           if(isset($data) && !empty($data))
                            {
                               $all_countries = $data['all_countries'];

                               if(isset($all_countries) && !empty($all_countries))
                              {
                                  foreach ($all_countries as $key => $aco) {
                                  $country_id = $aco['country_id'];                                  
                                  $country_name = $aco['country_name'];                              
                           ?>
                              <option value="<?php echo $country_id; ?>"><?php echo $country_name; ?></option>
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
                          <input class="form-control" tabindex="1" type="text" name="state_name" value="" placeholder="State Name*" required="required">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-2">
                          <input tabindex="5" type="button" name="submit" id="add_state_submit" class="btn btn-primary submit" value="Submit">
                        </div>  
                        <div class="col-sm-1">
                          <input tabindex="6" type="reset" name="reset" id="add_state_reset" class="btn btn-danger submit" value="Reset">
                        </div>
                        <div id="message_block_state_add" class="col-sm-5"></div>
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