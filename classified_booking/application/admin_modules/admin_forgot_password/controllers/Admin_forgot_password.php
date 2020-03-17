<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_forgot_password extends BackendController
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
        $this->load->model('Admin_forgot_password_model');
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
        fn_logged_in_admin();

        $view = "index";
        $data = array(
                    "page_title" => "Forgot Password"
                );
        $is_logged_in = false;
        $this->render_page($view, $data, $is_logged_in);
    }


    /* START: Functions for Forgot Password Send Email
    */  
    public function forgotPasswordSendEmail(){

        fn_logged_in_admin();
        
        $email = $this->input->post('email');        
        
        $res = $this->Admin_forgot_password_model->forgotPasswordGetUser($email);

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