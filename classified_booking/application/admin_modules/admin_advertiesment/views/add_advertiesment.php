<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Advertiesment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/advertiesment">Advertiesment</a></li>
              <li class="breadcrumb-item active">Add Advertiesment</li>
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
                  <div class="cls_add_advertiesment_page active tab-pane" id="settings">
                    <form id="add_advertiesment_form" class="cls_add_advertiesment_form form-horizontal" action="" method="post" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                      <div class="quick-form">

                        <div class="form-group row">
                        <div class="col-sm-10">
                          <select class="form-control" tabindex="1" name="category_type" required="required">
                            <option value="">Select Category*</option>
                            <option value="text">Text</option>
                            <option value="display">Display</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="1" type="text" name="advertiesment_name" value="" placeholder="Advertiesment Name*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="1" type="text" name="advertiesment_height" value="" placeholder="Advertiesment Height*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="1" type="text" name="advertiesment_width" value="" placeholder="Advertiesment Width*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="form-control" tabindex="1" type="text" name="advertiesment_amount" value="" placeholder="Advertiesment Amount*" required="required">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <textarea class="form-control" tabindex="1" name="description" value="" placeholder="Description*" required="required"></textarea>
                        </div>
                      </div>
                      

                      <div class="form-group row">
                        <div class="col-sm-2">
                          <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                          <input tabindex="5" type="button" name="submit" id="add_advertiesment_submit" class="btn btn-primary submit" value="Submit">
                        </div>

                        <div class="col-sm-1">
                          <input tabindex="6" type="reset" name="reset" id="add_advertiesment_reset" class="btn btn-danger submit" value="Reset">
                        </div>
                        <div id="message_block_advertiesment_add" class="col-sm-5"></div>
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