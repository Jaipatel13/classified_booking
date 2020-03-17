<?php  
  $page_title = $data['page_title'];
  $page_name = isset($data['page_name']) ? $data['page_name'] : "";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo SITE_TITLE; ?> | <?php echo $page_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/dist/css/ionicons.min.css">

<?php 
if ( isset($page_name) && ( ($page_name == "admin_customer_orders_listing") || ($page_name == "admin_countries_listing") || ($page_name == "admin_newspaper_listing") || ($page_name == "admin_advertiesment_listing") || ($page_name == "admin_states_listing") || ($page_name == "admin_cities_listing")  || ($page_name == "admin_booking_listing") || ($page_name == "admin_customers_listing") || ($page_name == "admin_transporters_listing") || ($page_name == "admin_order_transporters_listing") || ($page_name == "admin_transporter_orders_listing") || ($page_name == "admin_transporter_payments_listing") || ($page_name == "admin_transporter_payments_requests_listing") ) )
{
?>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.dataTables.min.css"> -->

  <style>
    .color-palette {
      height: 35px !important;
      line-height: 35px;
      text-align: right;
      padding-right: .75rem;
      display: inline-block;
      padding-left: 0.75rem;      
    }

    .color-palette.disabled {
      text-align: center;
      padding-right: 0;
      display: block;
    }
    
    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette.disabled span {
      display: block;
      text-align: left;
      padding-left: .75rem;
    }

    .color-palette-box h4 {
      position: absolute;
      left: 1.25rem;
      margin-top: .75rem;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
<?php
}
?>  

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Bootstrap  -->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>backend_assets/dist/css/bootstrapValidator.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo base_url();?>backend_assets/dist/css/source_sans_pro_google_fonts.css" rel="stylesheet">
  <!-- Custom Style -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>backend_assets/dist/css/after_login_custom.css">

  <script type="text/javascript">
  /* START: Edit City
  */
    function fn_edit_city()
    {
      $(document).ready(function() {
        $('.cls_edit_city').bind('click', function(e) {
          city_id = $(this).attr('data-city-id');
          country_id = $(this).attr('data-country-id');
          state_id = $(this).attr('data-state-id');
          city_name = $(this).attr('data-city-name');
              
            $.ajax({
                url: base_url+"/city/editCityFormLoad/",
                method: "post",
                data: "city_id="+city_id+"&country_id="+country_id+"&state_id="+state_id+"&city_name="+city_name,                
                success: function(result){
                    window.location.href = base_url+"/city/editCityForm";
                }
            });
            
        });
      });
   }     
  /* END: Edit City
  */

  /* START: Delete City
    */
    function fn_delete_city()
    {
      $('.cls_delete_city').bind('click', function(e) {
        city_id = $(this).attr('data-city-id');
        e.preventDefault();
        $('#confirm-delete-'+city_id).modal({
            backdrop: 'static',
            keyboard: false
        })
        .on('click', '#delete', function(e) {
            
          $.ajax({
              url: base_url+"/city/deleteCity/",
              method: "post",
              data: "city_id="+city_id,
              dataType: 'json',
              success: function(result){                    
                  var content = '<small id="city-delete-help-block" style="display: block;" class="help-block" data-bv-result="INVALID">'+result.message+'</small>';
                  
                  if(result.message)
                  {
                  $("#city-delete-help-block").remove();
                  $("#message_block_city_update").html(content);
                      if(result.message == "City deleted Successfully")
                      {
                          location.reload();
                      }
                      else
                      {                            
                          $("#city-delete-help-block").css("color","#a94442");
                      }
                  }                    
              }
          });


          });
      });
    }   
    /* END: Delete City
    */
    </script>            

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin/dashboard" class="nav-link" title="Dashboard">Dashboard</a>
      </li>    
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin/transporters" class="nav-link" title="Transporters">Transporters</a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin/customers" class="nav-link" title="Customers">Customers</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin/customer_orders" class="nav-link" title="Customer Orders">Customer Orders</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin/transporter_orders" class="nav-link" title="Customer Orders">Transporter Orders</a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url();?>admin/logout" class="nav-link" title="Logout">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <?php /* ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url();?>backend_assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url();?>backend_assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url();?>backend_assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    <?php */ ?>
  </nav>
  <!-- /.navbar -->  