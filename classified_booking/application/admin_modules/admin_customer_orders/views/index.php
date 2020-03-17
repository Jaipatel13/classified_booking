<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper cls_customer_orders_page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Customer Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content cls_customer_orders_list">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title cls_width_100_perc"><span class="cls_width_35_perc cls_float_left">Customer Order Details</span>
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
                      <div class="cls_width_56_perc <?php echo $message_class; ?>" id="message_block_order_status_update"><?php echo $message; ?></div>
                     <?php
                        $this->session->unset_userdata('message');
                    }
                    else
                    {
                ?> 
                      <div class="cls_width_56_perc" id="message_block_order_status_update"></div>
                <?php } ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl_customer_orders" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Booking Number</th>
                  <th>Booking Date</th>
                  <th>Booking Name</th>
                  <th>Booking Amount</th>                  
                  <th>Customer</th>
                  <th>Action</th>
                  <!-- <th>Model</th> -->
                </tr>
                </thead>
                <tbody>

                  <?php
                      $all_customers_orders = array();
                      $inc = 1;
                      if(isset($data) && !empty($data))
                      {
                         $all_customers_orders = $data['all_customers_orders'];
                      }
                      if(isset($all_customers_orders) && !empty($all_customers_orders))
                      {
                          foreach ($all_customers_orders as $key => $aco) {

                          $customer_id = $aco['users_id'];                          
                          $order_id = $aco['booking_details_id'];
                          
                          $order_date_db = $aco['booking_date'];
                          $order_date = date(DATE_FORMAT_1, strtotime($order_date_db));
                          $job_number = $aco['booking_number'];

                          $advertiesment_name = $aco['advertiesment_name'];
                          $advertiesment_height = $aco['advertiesment_height'];
                          $advertiesment_width = $aco['advertiesment_width'];
                          $advertiesment_amount = $aco['advertiesment_amount'];
                          $description = $aco['description'];
                          $category_type = $aco['category_type'];                          

                          // $payment_status = $aco['payment_status'];
                          // if($payment_status == CPS_PAID)
                          // {
                          // $payment_status_text = CPS_PAID_TEXT;
                          // $payment_status_text_cls = "text-center bg-success color-palette";
                          // }
                          // elseif($payment_status == CPS_UNPAID)
                          // {
                          // $payment_status_text = CPS_UNPAID_TEXT;
                          // $payment_status_text_cls = "text-center bg-danger color-palette";
                          // }                                                    

                          $booking_name  = $aco['booking_name'];
                          $customer_name  = $aco['first_name']." ".$aco['last_name'];

                          $order_amount = $aco['booking_amount'];
                          $order_amount = sprintf('%0.2f', $order_amount);
                          $order_amount = $order_amount." ".ORDER_AMOUNT_CURRENCY_SYMBOL;
                          
                  ?>
                          <tr id="order-tr-id-<?php echo $order_id; ?>">
                            <td><?php echo $inc; ?></td>
                            <td><?php echo $job_number; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $booking_name; ?></td>
                            <td><?php echo $order_amount; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <!-- <td><strong class="<?php echo $payment_status_text_cls; ?>"><?php echo $payment_status_text; ?></strong></td> -->                            
                            <td class="project-actions text-right">
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg-view-<?php echo $inc;  ?>">
                               <i class="fas fa-folder">
                               </i>
                               View
                              </button>
                              <div class="modal fade cls_customer_details_view_modal" id="modal-lg-view-<?php echo $inc;  ?>">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Booking Details</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-left">
                                                                            
                                      <p><span class="bg-light color-palette">Booking Date:</span><strong class="text-center bg-light color-palette"><?php echo $order_date;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Booking Number:</span><strong class="text-center bg-success color-palette"><?php echo $job_number;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Customer Name:</span><strong class="bg-info color-palette"><?php echo $customer_name;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Advertiesment Name:</span><strong class="bg-info color-palette"><?php echo $advertiesment_name;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Advertiesment Height: </span><strong class="bg-info color-palette"><?php echo $advertiesment_height;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Advertiesment Width: </span><strong class="bg-info color-palette"><?php echo $advertiesment_width;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Description: </span><strong class="bg-info color-palette"><?php echo $description;  ?></strong></p>

                                      <p><span class="bg-light color-palette">Category Type: </span><strong class="bg-info color-palette"><?php echo $category_type;  ?></strong></p>                          

                                      <!-- <p class="color-palette-set"><span class="bg-light color-palette">Payment Status:</span><strong class="<?php echo $payment_status_text_cls; ?>"><?php echo $payment_status_text;  ?></strong></p> -->                                      

                                      <p class="color-palette-set"><span class="bg-light color-palette">Booking Amount:</span><strong class="text-center bg-light color-palette"><?php echo $order_amount;  ?></strong></p>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <?php /* ?>
                              <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fas fa-folder">
                                  </i>
                                  View
                              </a>
                              <?php */ ?>
                              <?php /* ?>
                              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg-edit-<?php echo $inc;  ?>">
                               <i class="fas fa-pencil-alt">
                               </i>
                               Edit
                              </button>
                              <div class="modal fade" id="modal-lg-edit-<?php echo $inc;  ?>">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Large Modal-<?php echo $inc;  ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>One fine body&hellip;-<?php echo $inc;  ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                              <?php */ ?>
                              <?php /* ?>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <?php */ ?>
                              <a class="btn btn-danger btn-sm cls_delete_order" data-order-id="<?php echo $order_id; ?>" href="#">
                                  <i class="fas fa-trash" title="Delete">
                                  </i>
                                  <?php /* ?> Delete <?php */ ?>
                              </a>
                              <div id="confirm-delete-<?php echo $order_id; ?>" class="modal fade cls_customer_order_delete_modal">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete Order</h4>
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
                            <?php /* ?>
                            <td>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg-<?php echo $inc;  ?>">
                               Launch Large Modal
                              </button>
                              <div class="modal fade" id="modal-lg-<?php echo $inc;  ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Large Modal-<?php echo $inc;  ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>One fine body&hellip;-<?php echo $inc;  ?></p>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            </td> 
                            <?php */ ?> 
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