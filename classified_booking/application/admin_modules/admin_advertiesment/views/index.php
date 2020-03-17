<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper cls_advertiesment_page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advertiesment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>              
              <li class="breadcrumb-item active">Advertiesment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content cls_advertiesment_list">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title cls_width_100_perc"><span class="cls_width_35_perc cls_float_left">Advertiesment List</span>
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
                      <span class="cls_width_56_perc <?php echo $message_class; ?> cls_display_inline_block" id="message_block_advertiesment_update"><?php echo $message; ?></span>
                     <?php
                        $this->session->unset_userdata('message');
                    }
                    else
                    {
                ?> 
                      <span class="cls_width_56_perc cls_display_inline_block" id="message_block_advertiesment_update"></span>
                <?php } ?>

                <a class="btn btn-success btn-sm cls_add_advertiesment" href="<?php echo base_url(); ?>admin/advertiesment/addAdvertiesmentForm">
                  <i class="fas fa-plus">
                  </i>
                  Add
                </a>

              </h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl_advertiesment" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Advertiesment Name <span class="bg-orange cls_color_white color-palette cls_click_to_edit"> [Click Name to Edit] </span></th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                      $all_advertiesment = array();
                      $inc = 1;
                      if(isset($data) && !empty($data))
                      {
                         $all_advertiesment = $data['all_advertiesment'];
                      }
                      if(isset($all_advertiesment) && !empty($all_advertiesment))
                      {
                          foreach ($all_advertiesment as $key => $aco) {

                          $advertiesment_id = $aco['advertiesment_details_id'];
                          $advertiesment_name = $aco['advertiesment_name'];
                  ?>
                          <tr id="advertiesment-tr-id-<?php echo $advertiesment_id; ?>">
                            <td><?php echo $inc; ?></td>
                            <td class="cls_advertiesment_name" data-advertiesment-id="<?php echo $advertiesment_id; ?>" title="Click to Edit" contenteditable><?php echo $advertiesment_name; ?></td>
                            <td>
                                <a class="btn btn-info btn-sm cls_edit_advertiesment" data-advertiesment-id="<?php echo $advertiesment_id; ?>" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                                </a>
                                <a class="btn btn-danger btn-sm cls_delete_advertiesment" data-advertiesment-id="<?php echo $advertiesment_id; ?>" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                              <div id="confirm-delete-<?php echo $advertiesment_id; ?>" class="modal fade cls_advertiesment_delete_modal">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete Advertiesment</h4>
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