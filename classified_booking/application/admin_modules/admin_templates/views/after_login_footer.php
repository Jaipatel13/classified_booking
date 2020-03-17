<?php  
  $page_name = isset($data['page_name']) ? $data['page_name'] : "";
?>
 <footer class="main-footer">
    <!--<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>-->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>backend_assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>backend_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php 
if ( isset($page_name) && ( ($page_name == "admin_customer_orders_listing") || ($page_name == "admin_countries_listing") || ($page_name == "admin_newspaper_listing") || ($page_name == "admin_advertiesment_listing") || ($page_name == "admin_booking_listing") || ($page_name == "admin_states_listing") || ($page_name == "admin_cities_listing") || ($page_name == "admin_customers_listing") || ($page_name == "admin_transporters_listing") || ($page_name == "admin_order_transporters_listing") || ($page_name == "admin_transporter_orders_listing") || ($page_name == "admin_transporter_payments_listing") || ($page_name == "admin_transporter_payments_requests_listing") ) )
{
?>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>backend_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>backend_assets/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>backend_assets/plugins/datatables/jquery.dataTables.js"></script>
<!-- <script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js"></script> -->
<script src="<?php echo base_url();?>backend_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<?php
}
?>

<!-- ChartJS -->
<script src="<?php echo base_url();?>backend_assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>backend_assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>backend_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>backend_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>backend_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>backend_assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>backend_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>backend_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/bootstrapValidator.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>backend_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>backend_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>backend_assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>backend_assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>backend_assets/dist/js/demo.js"></script>
<!-- Modules Scripts -->
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_user_profile.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_password_reset.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_customer_orders.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_country.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_state.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_city.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_customers.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_customer_profile.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_customer_password_reset.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_transporters.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_transporter_profile.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_transporter_password_reset.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_transporter_orders.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_transporter_payments.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_transporter_payments_requests.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_newspaper.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_advertiesment.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend_assets/dist/js/mod_admin_booking.js"></script>


<?php 
if ( isset($page_name) && ($page_name == "admin_customer_orders_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_customer_orders").DataTable();
    /*$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });*/
  });
</script>
<?php
}
?>

<?php 
if ( isset($page_name) && ($page_name == "admin_countries_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_countries").DataTable();    
  });
</script>
<?php
}
?>

<?php 
if ( isset($page_name) && ($page_name == "admin_newspaper_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_newspaper").DataTable();    
  });
</script>
<?php
}
?>

<?php 
if ( isset($page_name) && ($page_name == "admin_booking_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_booking").DataTable();    
  });
</script>
<?php
}
?>

<?php 
if ( isset($page_name) && ($page_name == "admin_advertiesment_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_advertiesment").DataTable();    
  });
</script>
<?php
}
?>


<?php
if ( isset($page_name) && ($page_name == "admin_states_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_states").DataTable();
  });
</script>
<?php
}
?>

<?php
if ( isset($page_name) && ($page_name == "admin_cities_listing") )
{   
  $city_id_arr = $this->session->userdata('city_id_arr');
  $country_id_arr = $this->session->userdata('country_id_arr');
  $state_id_arr = $this->session->userdata('state_id_arr');
  $city_name_arr = $this->session->userdata('city_name_arr');
?>
<script type="text/javascript">
  $(function () {

    var base_url = window.location.origin;
    base_url += "/classified_booking/admin";

    var cityidsArray = <?php echo json_encode($city_id_arr); ?>;
    var countryidsArray = <?php echo json_encode($country_id_arr); ?>;
    var stateidsArray = <?php echo json_encode($state_id_arr); ?>;
    var citynamesArray = <?php echo json_encode($city_name_arr); ?>;

    $("#tbl_cities").DataTable(
      {
        'lengthChange': false,  
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            //'url':'ajaxfile.php'
            'url':base_url+'/city/datatableCities'
        },
        'columns': [

           /*{ data: 'emp_name' },
           { data: 'email' },
           { data: 'gender' },
           { data: 'salary' },
           { data: 'city' },  */

           { data: 'country_name' },           
           { data: 'state_name' },
           { data: 'city_name',
             className: 'cls_city_name'
           },
           { data: null,
             defaultContent: '<div class="cls_action_wrapper"></div>'
           },
        ],
        'createdRow': function( row, data, dataIndex ) {

                //for(var i = 0; i < passedArray.length; i++){ 
                    //document.write(passedArray[dataIndex].city_id);
                //}

                current_city_id = cityidsArray[dataIndex].city_id;
                current_country_id = countryidsArray[dataIndex].country_id;
                current_state_id = stateidsArray[dataIndex].state_id;
                current_city_name = citynamesArray[dataIndex].city_name;

                edit_content = '<button class="btn btn-info btn-sm cls_edit_city" data-city-id="'+current_city_id+'" data-country-id="'+current_country_id+'" data-state-id="'+current_state_id+'" data-city-name="'+current_city_name+'" onclick="javascript:fn_edit_city();" title="Please double click">'; //href="#"
                edit_content +='<i class="fas fa-pencil-alt"></i> Edit</button> ';
                edit_content +='<button class="btn btn-danger btn-sm cls_delete_city" data-city-id="'+current_city_id+'" onclick="javascript:fn_delete_city();" title="Please double click">';
                edit_content +='<i class="fas fa-trash"></i> Delete</button>';
                edit_content +='<div id="confirm-delete-'+current_city_id+'" class="modal fade cls_city_delete_modal">';
                                edit_content +='<div class="modal-dialog modal-lg">';
                                  edit_content +='<div class="modal-content">';
                                  edit_content +='<div class="modal-header">';
                                      edit_content +='<h4 class="modal-title">Delete City</h4>';
                                      edit_content +='<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                                        edit_content +='<span aria-hidden="true">&times;</span>';
                                      edit_content +='</button>';
                                    edit_content +='</div>';
                                    edit_content +='<div class="modal-body text-left">';
                                      edit_content +='Are you sure?';
                                    edit_content +='</div>';
                                    edit_content +='<div class="modal-footer justify-content-between">';
                                      edit_content +='<button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>';
                                      edit_content +='<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>';
                                    edit_content +='</div>';
                                  edit_content +='</div>';
                              edit_content +='</div>';
                              edit_content +='</div>';

                $( row ).find('td:eq(3) .cls_action_wrapper').html(edit_content);

                //$( row ).find('td:eq(2)').attr('contenteditable', 'true');
                $( row ).find('td:eq(2)').attr('data-city-id', current_city_id);

        },
        'columnDefs': [ 
          {
          "targets": 'no-sort',
          "orderable": false,
          }
        ]
        /*scrollY:        200,
        scrollCollapse: true,
        scroller:       true*/
      });
  });
</script>
<?php
}
?>

<?php
if ( isset($page_name) && ($page_name == "admin_customers_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_customers").DataTable();    
  });
</script>
<?php
}
?>

<?php
if ( isset($page_name) && ($page_name == "admin_transporters_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_transporters").DataTable();    
  });
</script>
<?php
}
?>

<?php
if ( isset($page_name) && ($page_name == "admin_order_transporters_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_select_transporters").DataTable();    
  });
</script>
<?php
}
?>

<?php 
if ( isset($page_name) && ($page_name == "admin_transporter_orders_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_transporter_orders").DataTable();
  });
</script>
<?php
}
?>

<?php 
if ( isset($page_name) && ($page_name == "admin_transporter_payments_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_transporter_payments").DataTable();
  });
</script>
<?php
}
?>
 
<?php 
if ( isset($page_name) && ($page_name == "admin_transporter_payments_requests_listing") )
{
?>
<script type="text/javascript">
  $(function () {
    $("#tbl_transporter_payments_requests").DataTable();
  });
</script>
<?php
}
?>

</body>
</html>