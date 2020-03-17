<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends FrontendController
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
        $this->load->model('Home_model');
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
        // fn_logged_in();

        $result = $this->Home_model->getAllnewspaper();
        $view = "index";
        $data = array(
                    "page_title" => "Home",
                    "page_name"  => "home_listing",
                    "all_newspaper"  => $result                    
                );
        $this->render_page($view, $data);
    }

    /* START: Functions for Home
    */  
    public function homeCheck(){

        // fn_logged_in();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $res = $this->Home_model->homeGetUser($email, $password);

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

    /* END: Functions for home
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

        // fn_logged_in();

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

        // fn_logged_in();
        
        $email = $this->input->post('email');        
        
        $res = $this->Home_model->forgotPasswordGetUser($email);

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