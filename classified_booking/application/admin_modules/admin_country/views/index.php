<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper cls_countries_page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Country</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>              
              <li class="breadcrumb-item active">Country</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content cls_countries_list">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title cls_width_100_perc"><span class="cls_width_35_perc cls_float_left">Country List</span>
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
                      <span class="cls_width_56_perc <?php echo $message_class; ?> cls_display_inline_block" id="message_block_country_update"><?php echo $message; ?></span>
                     <?php
                        $this->session->unset_userdata('message');
                    }
                    else
                    {
                ?> 
                      <span class="cls_width_56_perc cls_display_inline_block" id="message_block_country_update"></span>
                <?php } ?>

                <a class="btn btn-success btn-sm cls_add_country" href="<?php echo base_url(); ?>admin/country/addCountryForm">
                  <i class="fas fa-plus">
                  </i>
                  Add
                </a>

              </h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl_countries" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Country Name <span class="bg-orange cls_color_white color-palette cls_click_to_edit"> [Click Name to Edit] </span></th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                      $all_countries = array();
                      $inc = 1;
                      if(isset($data) && !empty($data))
                      {
                         $all_countries = $data['all_countries'];
                      }
                      if(isset($all_countries) && !empty($all_countries))
                      {
                          foreach ($all_countries as $key => $aco) {

                          $country_id = $aco['country_id'];
                          $country_name = $aco['country_name'];
                  ?>
                          <tr id="country-tr-id-<?php echo $country_id; ?>">
                            <td><?php echo $inc; ?></td>
                            <td class="cls_country_name" data-country-id="<?php echo $country_id; ?>" title="Click to Edit" contenteditable><?php echo $country_name; ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm cls_delete_country" data-country-id="<?php echo $country_id; ?>" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                              <div id="confirm-delete-<?php echo $country_id; ?>" class="modal fade cls_country_delete_modal">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete Country</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-left">
                                      Are you sure?
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
                                      <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                    </div>
                                  </div>
                              </div>

                              </div>
                            </td>                                                       
                          </tr>
                  <?php
                          $inc++;
                          }
                      }
                  ?>

                </tbody>
                <?php /* ?>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
                <?php */ ?>
              </table>              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper
