<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_customer_profile extends BackendController
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

        $this->load->model('Admin_customer_profile_model');        
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
        $customer_id = $this->session->userdata('current_customer_id_admin');
        //fetch user details
        $user = $this->Admin_customer_profile_model->signupGetUser($customer_id);
        $email = $user['email'];

        $sess_data = array(
                        'current_customer_email_admin' => $email,
                     );

        $this->session->set_userdata($sess_data);


        $order_data = Array(
                   'users_id' => $customer_id,
                );

        //Get Total Orders
        /*$res_gaaoc = $this->Admin_customer_profile_model->get_all_approved_orders_count($order_data);
        $total_orders = 0;
        if(isset($res_gaaoc))
        {        
        $total_orders = $res_gaaoc['total_approved_orders'];
        }

        //Get Total Completed Orders
        $res_gacoc = $this->Admin_customer_profile_model->get_all_completed_orders_count($order_data);
        $total_completed_orders = 0;
        if(isset($res_gacoc))
        {        
        $total_completed_orders = $res_gacoc['total_completed_orders'];
        }

        //Get Total Pending Orders
        $res_gapoc = $this->Admin_customer_profile_model->get_all_pending_orders_count($order_data);
        $total_pending_orders = 0;
        if(isset($res_gapoc))
        {        
        $total_pending_orders = $res_gapoc['total_pending_orders'];
        }

        //Get Total Payments
        $res_gtp = $this->Admin_customer_profile_model->get_total_payments($order_data);
        $total_payments = 0;
        if(isset($res_gtp))
        {        
        $total_payments = $res_gtp['total_payments'];
        $total_payments = round($total_payments,2);
        }        

        //Get Total Pending Amount
        $res_gtpp = $this->Admin_customer_profile_model->get_total_pending_payments($order_data);
        $total_pending_payments = 0;
        if(isset($res_gtpp))
        {        
        $total_pending_payments = $res_gtpp['total_pending_payments'];
        $total_pending_payments = round($total_pending_payments,2);
        }*/


        $mobile_no = $user['mobile_no'];
        $username = $user['username'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $address_line_1 = $user['address_line_1'];
        $address_line_2 = $user['address_line_2'];
        $city_id = $user['city_id'];
        $state_id = $user['state_id'];
        $country_id = $user['country_id'];
        $zip_code = $user['zip_code'];
        $paypal_email_id = $user['paypal_email_id'];        

        $user_data = array(
                       'customer_id' => $customer_id,
                       'email' => $email,
                       'mobile_no' => $mobile_no,
                       'username' => $username,
                       'first_name' => $first_name,
                       'last_name' => $last_name,
                       'address_line_1' => $address_line_1,
                       'address_line_2' => $address_line_2,
                       'city_id' => $city_id,
                       'state_id' => $state_id,
                       'country_id' => $country_id,
                       'zip_code' => $zip_code,
                       'paypal_email_id' => $paypal_email_id,
                       'total_orders' => $total_orders,
                       'total_completed_orders' => $total_completed_orders,
                       'total_pending_orders' => $total_pending_orders,                       
                       'total_payments' => $total_payments,                       
                       'total_pending_payments' => $total_pending_payments,                                              
                     );

        //echo fn_print_array($result);

        $all_countries = $this->Admin_customer_profile_model->getAllCountries();
        $all_states = $this->Admin_customer_profile_model->getStatesByCountry($country_id);
        $all_cities = $this->Admin_customer_profile_model->getCitiesByState($country_id, $state_id);
            
        $view = "index";
        $data = array(
                    "page_title" => "Customer Profile",
                    "user_data" => $user_data,
                    "all_countries" => $all_countries,
                    "all_states" => $all_states,
                    "all_cities" => $all_cities,
                );
        $this->render_page($view, $data);
    }

    public function getStatesByCountry()
    {
        $country_id = $this->input->post('country_id');
        $result = $this->Admin_customer_profile_model->getStatesByCountry($country_id);
        //echo fn_print_array($result);

        $html = '<option value="">Select State*</option>';
        if($result){
                foreach($result as $key => $value)
                {
        $html .= '<option value="'.$value['state_id'].'">'.$value['state_name'].'</option>';
                }
        }        
        echo $html;
    }

    public function getCitiesByState()
    {
        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        $result = $this->Admin_customer_profile_model->getCitiesByState($country_id, $state_id);
        //echo fn_print_array($result);

        $html = '<option value="">Select City*</option>';
        if($result){
                foreach($result as $key => $value)
                {
        $html .= '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>';
                }
        }        
        echo $html;
    }

    public function checkEmailExist()
    {
       $email = $this->input->post('email');
       $sess_user_email = $this->session->userdata('current_customer_email_admin');

       if($email == $sess_user_email)
       {
        $email_exist = false;
       }
       else
       {
        $email_exist = $this->Admin_customer_profile_model->checkEmailExist($email);
       }       

       echo $email_exist;

    }
    
    /* START: Functions for Updating Customer's Details
    */
    public function customerProfileUpdate()
    {   
        $user_id = $this->input->post('customer_id');
        $email = $this->input->post('email');
        $mobile_no = $this->input->post('mobile_no');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $address_line_1 = $this->input->post('address_line_1');
        $address_line_2 = $this->input->post('address_line_2');
        $city_id = $this->input->post('city_id');
        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $zip_code = $this->input->post('zip_code');
        $paypal_email_id = $this->input->post('paypal_email_id');

            if ( isset($user_id) && ($user_id != "")
                 && isset($email) && ($email != "")
                 && isset($mobile_no) && ($mobile_no != "")                 
                 && isset($first_name) && ($first_name != "")
                 && isset($last_name) && ($last_name != "")
                 && isset($address_line_1) && ($address_line_1 != "")
                 && isset($address_line_2) && ($address_line_2 != "")                 
                 && isset($city_id) && ($city_id != "")
                 && isset($state_id) && ($state_id != "")
                 && isset($country_id) && ($country_id != "")
                 && isset($zip_code) && ($zip_code != "")
               )
            {

                $sess_user_email = $this->session->userdata('current_customer_email_admin');

                if($email == $sess_user_email)
                {
                    $email_exist = false;
                }
                else
                {
                    $email_exist = $this->Admin_customer_profile_model->checkEmailExist($email);
                }

                if( !($email_exist) )
                {

                    $data = Array(
                       'user_id' => $user_id,
                       'email' => $email,
                       'mobile_no' => $mobile_no,                       
                       'first_name' => $first_name,
                       'last_name' => $last_name,
                       'address_line_1' => $address_line_1,
                       'address_line_2' => $address_line_2,
                       'city_id' => $city_id,
                       'state_id' => $state_id,
                       'country_id' => $country_id,
                       'zip_code' => $zip_code,
                       'paypal_email_id' => $paypal_email_id,
                    );
                    $res = $this->Admin_customer_profile_model->userProfileUpdate($data);

                    if (isset($res))
                    {
                        /*$user_first_name = $first_name;
                        $user_last_name  = $last_name;
                        $user_full_name  = $first_name." ".$last_name;
                        $user_email      = $email;
                        $user = $this->Admin_customer_profile_model->signupGetUser($user_id);
                        $password_encypted = $user['password'];
                        $original_password = $this->encryption->decrypt($password_encypted);

                        $sess_data = array(
                                        'logged_in_user_name_admin'      => $user_full_name,
                                        'logged_in_user_email_admin'     => $email,
                                        'logged_in_user_password_admin'  => $original_password,
                                     );
                        $this->session->set_userdata($sess_data);*/

                            $result = 'Customer Profile Updated Successfully';
                            echo $result;
                    }
                    else
                    {       
                            $result = 'Customer Profile Update Failed';
                            echo $result;                            
                    }
                }    
                else
                {
                        $result = 'Email already exists';
                        echo $result;
                }
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Updating Customer's Details
    */

    /* START: Functions for Resetting Password
    */
    public function customerPasswordReset()
    {
        $user_id = $this->input->post('customer_id');
        $password = $this->input->post('password');
        $password_encypted= $this->encryption->encrypt($password);

            if ( isset($user_id) && ($user_id != "")
                 && isset($password) && ($password != "")
               )
            {
                $data = Array(
                   'user_id' => $user_id,
                   'password' => $password_encypted,                       
                );
                $res = $this->Admin_customer_profile_model->customerPasswordReset($data);

                if (isset($res))
                { 
                        $result = 'Password Changed Successfully';
                        echo $result;
                }
                else
                {       
                        $result = 'Password does not Changed';
                        echo $result;                            
                }                
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Resetting Password
    */    
}
?>