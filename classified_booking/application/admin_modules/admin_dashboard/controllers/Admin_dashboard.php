<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends BackendController
{
    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        
        fn_is_logged_in_admin();
        $this->load->model('Admin_dashboard_model');
        $this->session->keep_flashdata('message');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function index()
    {
        //Get Total Orders
        $res_gaaoc = $this->Admin_dashboard_model->get_all_approved_orders_count();
        $total_orders = 0;
        if(isset($res_gaaoc))
        {        
        $total_orders = $res_gaaoc['total_approved_orders'];
        }

        //Get Total Completed Orders
        $res_gacoc = $this->Admin_dashboard_model->get_all_completed_orders_count();
        $total_completed_orders = 0;
        if(isset($res_gacoc))
        {        
        $total_completed_orders = $res_gacoc['total_completed_orders'];
        }

        //Get Total Pending Orders
        $res_gapoc = $this->Admin_dashboard_model->get_all_pending_orders_count();
        $total_pending_orders = 0;
        if(isset($res_gapoc))
        {        
        $total_pending_orders = $res_gapoc['total_pending_orders'];
        }

        //Get Today's New Orders
        $res_gtnoc = $this->Admin_dashboard_model->get_todays_new_orders_count();
        $total_todays_new_orders = 0;
        if(isset($res_gtnoc))
        {        
        $total_todays_new_orders = $res_gtnoc['total_todays_new_orders'];
        }

        //Get Total Payments
        $res_gtp = $this->Admin_dashboard_model->get_total_payments();
        $total_payments = 0;
        if(isset($res_gtp))
        {        
        $total_payments = $res_gtp['total_payments'];
        $total_payments = round($total_payments,2);
        }

        //Get Total Transporters
        $res_gatc = $this->Admin_dashboard_model->get_all_transporters_count();
        $total_transporters = 0;
        if(isset($res_gatc))
        {        
        $total_transporters = $res_gatc['total_transporters'];
        }

        //Get Total Pending Amount
        $res_gtpp = $this->Admin_dashboard_model->get_total_pending_payments();
        $total_pending_payments = 0;
        if(isset($res_gtpp))
        {        
        $total_pending_payments = $res_gtpp['total_pending_payments'];
        $total_pending_payments = round($total_pending_payments,2);
        }

        $page_data = array(
               'total_orders' => $total_orders,
               'total_completed_orders' => $total_completed_orders,
               'total_pending_orders' => $total_pending_orders,
               'total_todays_new_orders' => $total_todays_new_orders,
               'total_payments' => $total_payments,
               'total_transporters' => $total_transporters,
               'total_pending_payments' => $total_pending_payments,
        );        

        $view = "index";
        $data = array(
                    "page_title" => "Dashboard",
                    "page_data"  => $page_data,
                );
        $this->render_page($view, $data);
    }
	
}
?>