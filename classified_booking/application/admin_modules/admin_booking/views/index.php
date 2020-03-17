<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper cls_booking_page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Booking</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>              
              <li class="breadcrumb-item active">Booking</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content cls_booking_list">
      <div class="row">
        <div class="col-12">
          <div class="card">
              
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
                      <span class="cls_width_56_perc <?php echo $message_class; ?> cls_display_inline_block" id="message_block_Booking_update"><?php echo $message; ?></span>
                     <?php
                        $this->session->unset_userdata('message');
                    }
                    else
                    {
                ?> 
                      <span class="cls_width_56_perc cls_display_inline_block" id="message_block_booking_update"></span>
                <?php } ?>

                

              </h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl_booking" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Booking Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                      $all_booking = array();
                      $inc = 1;
                      if(isset($data) && !empty($data))
                      {
                         $all_booking = $data['all_booking'];
                      }
                      if(isset($all_booking) && !empty($all_booking))
                      {
                          foreach ($all_booking as $key => $aco) {

                          $booking_id = $aco['booking_details_id'];
                          $booking_name = $aco['booking_name'];
                  ?>
                          <tr id="booking-tr-id-<?php echo $booking_id; ?>">
                            <td><?php echo $inc; ?></td>
                            <td class="cls_booking_name" data-booking-id="<?php echo $booking_id; ?>" title="Click to Edit"><?php echo $booking_name; ?></td>
                            <td>
                              <a class="btn btn-primary btn-sm cls_view_booking" data-booking-id="<?php echo $booking_id; ?>" href="#">
                                  <i class="fas fa-eye">
                                  </i>
                                  View
                              </a>
                              <div id="confirm-view-<?php echo $booking_id; ?>" class="modal fade cls_booking_view_modal">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <h4 class="modal-title">Booking Details</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-left">
                                        Booking Details
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                       <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <a class="btn btn-danger btn-sm cls_delete_booking" data-booking-id="<?php echo $booking_id; ?>" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                              <div id="confirm-delete-<?php echo $booking_id; ?>" class="modal fade cls_booking_delete_modal">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete booking</h4>
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
