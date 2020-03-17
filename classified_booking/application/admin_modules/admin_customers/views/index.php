<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper cls_customers_page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>              
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content cls_customers_list">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title cls_width_100_perc"><span class="cls_width_35_perc cls_float_left">Customers List</span>
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
                      <span class="cls_width_56_perc <?php echo $message_class; ?> cls_display_inline_block" id="message_block_customers_update"><?php echo $message; ?></span>
                     <?php
                        $this->session->unset_userdata('message');
                    }
                    else
                    {
                ?> 
                      <span class="cls_width_56_perc cls_display_inline_block" id="message_block_customers_update"></span>
                <?php } ?>

              </h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl_customers" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <!-- <th>Customer Username</th> -->
                  <th>Customer Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                      $all_customers = array();
                      $inc = 1;
                      if(isset($data) && !empty($data))
                      {
                         $all_customers = $data['all_customers'];
                      }
                      if(isset($all_customers) && !empty($all_customers))
                      {
                          foreach ($all_customers as $key => $aco) {

                          $customer_id = $aco['users_id'];
                          $email = $aco['email'];
                          $mobile_no = $aco['mobile_no'];
                          $user_type = $aco['user_type'];
                          $username = $aco['username'];
                          $first_name = $aco['first_name'];
                          $last_name = $aco['last_name'];
                          $customer_full_name = $first_name." ".$last_name;
                          $address_line_1 = $aco['address_line_1'];
                          $address_line_2 = $aco['address_line_2'];
                          $city_id = $aco['city_id'];
                          $city_name = $aco['city_name'];
                          $state_id = $aco['state_id'];
                          $state_name = $aco['state_name'];
                          $country_id = $aco['country_id'];
                          $country_name = $aco['country_name'];
                          $zip_code = $aco['zip_code'];
                  ?>
                          <tr id="customer-tr-id-<?php echo $customer_id; ?>">
                            <td><?php echo $inc; ?></td>
                            <!-- <td class="cls_customer_username" data-customer-id="<?php echo $customer_id; ?>"><?php echo $username; ?>
                            </td> -->
                            <td class="cls_customer_name" data-customer-id="<?php echo $customer_id; ?>"><?php echo $customer_full_name; ?>                              
                            </td>
                            <td class="cls_email" data-customer-id="<?php echo $customer_id; ?>"><?php echo $email; ?>
                            </td>
                            <td class="cls_mobile_no" data-customer-id="<?php echo $customer_id; ?>"><?php echo $mobile_no; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm cls_update_profile" data-customer-id="<?php echo $customer_id; ?>" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Profile
                                </a>
                                <a class="btn btn-danger btn-sm cls_delete_customer" data-customer-id="<?php echo $customer_id; ?>" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                              <div id="confirm-delete-<?php echo $customer_id; ?>" class="modal fade cls_customer_delete_modal">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete Customer</h4>
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
