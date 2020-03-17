<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_customers extends BackendController
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
        $this->load->model('Admin_customers_model');
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

        $message = $this->session->flashdata('message');
        if (isset($message))
        {
           $this->session->unset_userdata('message');    
        }

        $result = $this->Admin_customers_model->getAllCustomers();

        $view = "index";
        $data = array(
                    "page_title" => "Customers",
                    "page_name"  => "admin_customers_listing",
                    "all_customers"  => $result
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting Customers
    */  
    public function deleteCustomers(){

        fn_is_logged_in_admin();
        
        $customer_id = $this->input->post('customer_id');

        if ( isset($customer_id) && ($customer_id != "") )
        {
                 
                $data = array(
                'customer_id' => $customer_id,                
                );
                $res = $this->Admin_customers_model->deleteCustomers($data);

                if($res)
                {

                    $ret_arr = array(
                       'customer_id' => $customer_id,
                       'message'  => 'Customer deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'Customer deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No Customer deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No Customer deleted',
                             );
                    $this->session->set_flashdata($sess_data);                
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
                echo json_encode($ret_arr);
        }
    }

    /* END: Functions for Deleting Country
    */


    /* START: Functions for Displaying User Profile
    */
    public function customerProfileLoad()
    {
        /*$state_id = 1464;
        $country_id = 3;
        $city_id = 129772;
        $city_name = 'Ahmedabad 123';*/

        $customer_id = $this->input->post('customer_id');        

        $sess_data = array(
                        'current_customer_id_admin' => $customer_id,                       
                     );

        $this->session->set_userdata($sess_data);
        
    }
    /* END: Functions for Displaying User Profile
    */
    

}
?>