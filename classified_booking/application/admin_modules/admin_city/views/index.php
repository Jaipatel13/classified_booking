<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper cls_cities_page">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>              
              <li class="breadcrumb-item active">City</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content cls_cities_list">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title cls_width_100_perc"><span class="cls_width_35_perc cls_float_left">City List</span>
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
                      <span class="cls_width_56_perc <?php echo $message_class; ?> cls_display_inline_block" id="message_block_city_update"><?php echo $message; ?></span>
                     <?php
                        $this->session->unset_userdata('message');
                    }
                    else
                    {
                ?> 
                      <span class="cls_width_56_perc cls_display_inline_block" id="message_block_city_update"></span>
                <?php } ?>

                <a class="btn btn-success btn-sm cls_add_city" href="<?php echo base_url(); ?>admin/city/addCityForm">
                  <i class="fas fa-plus">
                  </i>
                  Add
                </a>

              </h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl_cities" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>Sr. No.</th> -->
                  <th>Country</th>
                  <th>State</th>
                  <th>City Name</th>
                  <th class="no-sort">Action <span class="bg-orange cls_color_white color-palette cls_click_to_edit"> [Please Double Click on Button] </span></th>
                </tr>
                </thead>
                <?php /* ?>
                <tbody>

                  <?php
                      $all_cities = array();

                      $inc = 1;
                      if(isset($data) && !empty($data))
                      {
                         $all_cities = $data['all_cities'];
                      }
                      if(isset($all_cities) && !empty($all_cities))
                      {
                          foreach ($all_cities as $key => $aco) {

                          $city_id = $aco['city_id'];
                          $state_id = $aco['state_id'];
                          $country_id = $aco['country_id'];
                          $state_name = $aco['state_name'];
                          $country_name = $aco['country_name'];
                          $city_name = $aco['city_name'];
                  ?>
                          <tr id="city-tr-id-<?php echo $city_id; ?>">
                            <td><?php echo $inc; ?></td>
                            
                            <td>
                              <div id="country-name-city-id-<?php echo $city_id; ?>" class="cls_country_name" data-country-id="<?php echo $country_id; ?>" data-state-id="<?php echo $state_id; ?>" data-city-id="<?php echo $city_id; ?>">
                                  <?php echo $country_name; ?>
                              </div>
                              <!-- <div id="country-dd-wrapper-id-<?php echo $city_id; ?>" class="cls_country_dd_wrapper"></div> -->
                            </td>

                            <td>
                              <div id="state-name-city-id-<?php echo $city_id; ?>" class="cls_state_name" data-country-id="<?php echo $country_id; ?>" data-state-id="<?php echo $state_id; ?>" data-city-id="<?php echo $city_id; ?>">
                                  <?php echo $state_name; ?>
                              </div>                              
                            </td>

                            <td class="cls_city_name" data-city-id="<?php echo $city_id; ?>" title="Click to Edit" contenteditable><?php echo $city_name; ?>
                            </td>

                            <td>
                                <a class="btn btn-info btn-sm" data-city-id="<?php echo $city_id; ?>" data-country-id="<?php echo $country_id; ?>" data-state-id="<?php echo $state_id; ?>" data-city-name="<?php echo $city_name; ?>" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                                </a>
                                <a class="btn btn-danger btn-sm cls_delete_city" data-city-id="<?php echo $city_id; ?>" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                              <div id="confirm-delete-<?php echo $city_id; ?>" class="modal fade cls_city_delete_modal">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">

                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete City</h4>
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
                <?php */ ?>
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
