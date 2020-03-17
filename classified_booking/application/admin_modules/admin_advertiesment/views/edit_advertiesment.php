<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Advertiesment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/advertiesment">Advertiesment</a></li>
              <li class="breadcrumb-item active">Edit Advertiesment</li>
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
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Advertiesment</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="cls_edit_advertiesment_page active tab-pane" id="settings">
                    <form id="edit_advertiesment_form" class="cls_edit_advertiesment_form form-horizontal" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                      <div class="quick-form">
                        <?php
                          $sel_advertiesment_details_id = $data['advertiesment_details_id'];
                          $sel_advertiesment_name = $data['advertiesment_name'];
                          $sel_advertiesment_height = $data['advertiesment_height'];
                          $sel_advertiesment_width = $data['advertiesment_width'];
                          $sel_advertiesment_amount = $data['advertiesment_amount'];
                          $sel_description = $data['description'];
                          $sel_category_type = $data['category_type'];
                        ?>

                        <div class="form-group row">
                        <div class="col-sm-10">
                          <select id="advertiesment_id" class="custom-select cls_advertiesment_id" tabindex="1" name="category_type" required="required">
                            <option value="">Select Category*</option>
                            <?php
                                 $sel_text_selected="";
                                 $sel_display_selected="";
                              if($sel_category_type == CATEGORY_TYPE_TEXT)
                                  {
                                    $sel_text_selected = 'selected';
                                  }
                              if($sel_category_type == CATEGORY_TYPE_DISPLAY)
                                  {
                                    $sel_display_selected = 'selected';
                                  } 
                            ?>
                            <option value="text" <?php echo $sel_text_selected; ?>>Text</option>
                            <option value="display" <?php echo $sel_display_selected; ?>>Display</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="2" type="text" name="advertiesment_name" value="<?php echo $sel_advertiesment_name; ?>" placeholder="Advertiesment Name*" required="required">
                          <input class="form-control" type="hidden" name="advertiesment_details_id" value="<?php echo $sel_advertiesment_details_id; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="3" type="text" name="advertiesment_height" value="<?php echo $sel_advertiesment_height; ?>" placeholder="Advertiesment Height*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="4" type="text" name="advertiesment_width" value="<?php echo $sel_advertiesment_width; ?>" placeholder="Advertiesment Width*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="5" type="text" name="advertiesment_amount" value="<?php echo $sel_advertiesment_amount; ?>" placeholder="Advertiesment Amount*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <textarea class="form-control" tabindex="6" name="description" value="<?php echo $sel_description; ?>" placeholder="Description*" required="required"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <div class="col-sm-2">
                          <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                          <input tabindex="5" type="button" name="submit" id="edit_advertiesment_submit" class="btn btn-primary submit" value="Submit">
                        </div>

                        <div class="col-sm-1">
                          <input tabindex="6" type="reset" name="reset" id="edit_advertiesment_reset" class="btn btn-danger submit" value="Reset">
                        </div>
                        <div id="message_block_advertiesment_edit" class="col-sm-5"></div>
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