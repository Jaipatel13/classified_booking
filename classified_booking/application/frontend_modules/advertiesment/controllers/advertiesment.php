<?php defined('BASEPATH') or exit('No direct script access allowed');

class Advertiesment extends FrontendController
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
        $this->load->model('Advertiesment_model');
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
        //fn_logged_in();

        $request_arr = $this->uri->uri_to_assoc(3);
        
        $newspaper_id = $request_arr['newspaper_id'];

        $np_result = $this->Advertiesment_model->getAllnewspaper($newspaper_id);
        $newspaper_name = $np_result['newspaper_name'];

        $result = $this->Advertiesment_model->getAlladvertiesment($newspaper_id);

        $view = "index";
        $data = array(
                    "page_title" => "Advertiesment", 
                    "page_name"  => "advertiesment_listing",
                    "all_advertiesment"  => $result,
                    'newspaper_name' => $newspaper_name,                 
                );
        $this->render_page($view, $data);
    }

    public function advertiesment_details()
    {
        // fn_logged_in();

        /*$message = $this->session->flashdata('message');
        if (isset($message))
        {
           $this->session->unset_userdata('message');
        }*/

        $request_arr = $this->uri->uri_to_assoc(3);
        
        $advertiesment_details_id = $request_arr['advertiesment_details_id'];

        $current_ad_image_url_key = 'sess_current_ad_image_url_'.$advertiesment_details_id;

        $newspaper_image_url = $this->session->userdata($current_ad_image_url_key);

        $result = $this->Advertiesment_model->getAdvertiesmentDetails($advertiesment_details_id);

        $view = "advertiesment_details";
        $data = array(
                    "page_title" => "Advertiesment Details",
                    "page_name"  => "advertiesment_details",
                    "advertiesment"  => $result,
                    "newspaper_image_url" => $newspaper_image_url,
                );
        $this->render_page($view, $data);
    }

    /* START: Functions for Advertiesment
    */  
    public function advertiesmentCheck(){

        // fn_logged_in();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $res = $this->Advertiesment_model->advertiesmentGetUser($email, $password);

        //$data = array();        
        //echo fn_print_array($res);
        if ( isset($password) && ($password != "")
             && isset($email) && ($email != "")
           )
        {
            if($res == 'no_email_found')
            {
                $result = 'Email does not exist';
                echo $result;
            }
            /*elseif ($res == UPS_INACTIVE)
            {
                $result_arr['data'] = $data;
                $result_arr['message'] = 'Email not verified';
                $result_arr['success'] = false;
                $result = json_encode($result_arr);
                header('Content-Type: application/json');
                echo $result;
            }*/
            elseif($res)
            {
                /*foreach($res as $key => $value)
                {
                    $data[]= $value;
                }*/
                $user_first_name = $res[0]['first_name'];
                $user_last_name  = $res[0]['last_name'];
                $user_full_name  = $res[0]['first_name']." ".$res[0]['last_name'];
                $user_email      = $res[0]['email'];
                $user_id         = $res[0]['users_id'];
                $password_encypted = $res[0]['password'];
            
                $original_password = $this->encryption->decrypt($password_encypted);


                $sess_data = array(
                                'logged_in'                => true,
                                'logged_in_user_name'      => $user_full_name,
                                'logged_in_user_email'     => $email,
                                'logged_in_user_id'        => $user_id,
                                'logged_in_user_password'  => $original_password,
                             );
                $this->session->set_userdata($sess_data);
                $result = 'Logged in Successfully';
                echo $result;
            }
            else
            {
                $result = 'Email and Password do not match';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;                    
        }
    }

    /* END: Functions for advertiesment
    */

     /* START: Functions for Adding advertiesment
    */
    public function addAdvertiesment()
    {
        fn_is_logged_in();

        $user_id = $this->session->userdata('logged_in_user_id');
        $advertiesment_details_id = $this->input->post('advertiesment_details_id');
        $newspaper_id = $this->input->post('newspaper_id');

        $booking_date = Date(DATETIME_FORMAT_1);
        $booking_number = fn_unique_code(3,2);

        $advertiesment_name = $this->input->post('advertiesment_name');
        //$advertiesment_height = $this->input->post('advertiesment_height');
        //$advertiesment_width = $this->input->post('advertiesment_width');
        $advertiesment_amount = $this->input->post('advertiesment_amount');
        //$category_type = $this->input->post('category_type');
        $description = $this->input->post('description');

            if ( (isset($user_id) && ($user_id != ""))
                  && (isset($advertiesment_details_id) && ($advertiesment_details_id != ""))
                  && (isset($newspaper_id) && ($newspaper_id != ""))
                  && (isset($advertiesment_name) && ($advertiesment_name != ""))
                  && (isset($advertiesment_amount) && ($advertiesment_amount != ""))
                  && (isset($description) && ($description != "")) 
                  && (isset($booking_date) && ($booking_date != ""))
                  && (isset($booking_number) && ($booking_number != ""))
                )
            {
                    $data = Array(
                       'users_id' => $user_id,                       
                       'advertiesment_details_id' => $advertiesment_details_id,
                       'newspaper_id' => $newspaper_id,
                       'advertiesment_name' => $advertiesment_name,
                       'advertiesment_amount' => $advertiesment_amount,
                       'description'       => $description,
                       'booking_date'       => $booking_date,
                       'booking_number'       => $booking_number,
                    );
                    $new_advertiesment_id = $this->Advertiesment_model->addAdvertiesment($data);

                    if (isset($new_advertiesment_id))
                    { 
                        $sess_data = array(
                                    'success' => true,
                                    'message' => 'Booking Done Successfully',
                                 );
                        $this->session->set_flashdata($sess_data);

                        redirect(base_url()."advertiesment/advertiesment_details/advertiesment_details_id/".$advertiesment_details_id);
                        // $result = 'Advertiesment added Successfully';
                        // echo $result;                        
                    }
                    else
                    {       
                        $sess_data = array(
                                'success' => false,
                                'message' => 'No Booking Done',
                             );
                        $this->session->set_flashdata($sess_data);

                        redirect(base_url()."advertiesment/advertiesment_details/advertiesment_details_id/".$advertiesment_details_id);
                        
                        /*$result = 'No Advertiesment added';
                        echo $result;*/                            
                    }                
            }
            else
            {
                    $sess_data = array(
                            'success' => false,
                            'message' => 'All fields are required',
                         );
                    $this->session->set_flashdata($sess_data);

                    redirect(base_url()."advertiesment/advertiesment_details/advertiesment_details_id/".$advertiesment_details_id);

                    // $result = 'All fields are required';
                    // echo $result;                    
            }
        
    }
    /* END: Functions for Adding advertiesment
    */

    /* START: Functions for logout
    */ 
    public function logout(){

        //$this->session->sess_destroy();        
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('logged_in_user_name');
        $this->session->unset_userdata('logged_in_user_email');
        $this->session->unset_userdata('logged_in_user_id');
        $this->session->unset_userdata('logged_in_user_password');

        redirect(base_url(), 'refresh');
    }
    /* END: Functions for logout
    */ 

    /* START: Functions for Forgot Password
    */
    public function forgotPassword(){

        fn_logged_in();

        $view = "forgot_password";
        $data = array(
                    "page_title" => "Forgot Password"
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Forgot Password
    */

    /* START: Functions for Forgot Password Send Email
    */  
    public function forgotPasswordSendEmail(){

        fn_logged_in();
        
        $email = $this->input->post('email');        
        
        $res = $this->Advertiesment_model->forgotPasswordGetUser($email);

        //echo fn_print_array($res);
        if ( isset($email) && ($email != "") )
        {
            if($res == 'no_email_found')
            {
                $result = 'Email does not exist';
                echo $result;
            }
            elseif($res)
            {   
                $password = $res[0]['original_password'];
                $message =  "
                    <html>
                    <head>
                        <title>Account Details</title>
                    </head>
                    <body>
                        <h2>Your account details are given below.</h2>
                        <p>Your Account:</p>
                        <p>Email: ".$email."</p>
                        <p>Password: ".$password."</p>                        
                    </body>
                    </html>
                    ";
                $subject = "Forgot Password Email";

                $email_data = array(
                              "message"  => $message,
                              "to_email" => $email,
                              "subject"  => $subject,
                              );

                $result = fn_send_email($email_data);
                echo $result;
            }            
        }
        else
        {
                $result = 'All fields are required';
                echo $result;                    
        }
    }

    /* END: Functions for Forgot Password Send Email
    */

}
?>