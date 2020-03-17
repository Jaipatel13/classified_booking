<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_customer_orders extends BackendController
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
        $this->load->model('Admin_customer_orders_model');
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
        fn_is_logged_in_admin();

        $result = $this->Admin_customer_orders_model->getAllCustomerOrders();

        $view = "index";
        $data = array(
                    "page_title" => "Customer Orders",
                    "page_name"  => "admin_customer_orders_listing",
                    "all_customers_orders"  => $result
                );
        $this->render_page($view, $data);
    }

    /* START: Functions for Deleting Order
    */  
    public function deleteOrder(){

        fn_is_logged_in_admin();
        
        $order_id = $this->input->post('order_id');
        
        $data = array(
                'order_id' => $order_id,                
        );
        $res = $this->Admin_customer_orders_model->deleteOrder($data);

        if ( isset($order_id) && ($order_id != "") )
        {
            if($res)
            {     
                $ret_arr = array(
                   'order_id' => $order_id,
                   'message'  => 'Order deleted Successfully'     
                );
                $sess_data = array(
                            'success' => true,
                            'message' => 'Order deleted Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                //$result = 'Order deleted Successfully';
                echo json_encode($ret_arr);
            }            
        }
        else
        {
                $ret_arr = array(                   
                   'message'  => 'All fields are required'     
                );
                $sess_data = array(
                            'success' => false,
                            'message' => 'All fields are required',
                         );
                $this->session->set_flashdata($sess_data);
                //$result = 'All fields are required';
                echo json_encode($ret_arr);
        }
    }

    /* END: Functions for Deleting Order
    */
}
?>