<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_user_profile extends BackendController
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

        $this->load->model('Admin_user_profile_model');
        //$this->load->model('signup/Signup_model');
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
        $user_id = $this->session->userdata('logged_in_user_id_admin');

        //fetch user details
        $user = $this->Admin_user_profile_model->signupGetUser($user_id);
        $email = $user['email'];
        $mobile_no = $user['mobile_no'];
        $first_name = $user['first_name'];
        $last_name = $user['last_name'];        

        $user_data = array(
                       'email' => $email,
                       'mobile_no' => $mobile_no,  
                       'first_name' => $first_name,
                       'last_name' => $last_name,                                              
                     );

        //echo fn_print_array($result);
            
        $view = "index";
        $data = array(
                    "page_title" => "User Profile",                    
                    "user_data" => $user_data,
                );
        $this->render_page($view, $data);
    }    

    public function checkEmailExist()
    {
       $email = $this->input->post('email');
       $sess_user_email = $this->session->userdata('logged_in_user_email_admin');

       if($email == $sess_user_email)
       {
        $email_exist = false;
       }
       else
       {
        $email_exist = $this->Admin_user_profile_model->checkEmailExist($email);
       }       

       echo $email_exist;

    }
    
    /* START: Functions for Updating User's Details
    */
    public function userProfileUpdate()
    {   
        $user_id = $this->session->userdata('logged_in_user_id_admin');        
        $email = $this->input->post('email');
        $mobile_no = $this->input->post('mobile_no');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');        

            if ( isset($user_id) && ($user_id != "")
                 && isset($email) && ($email != "")
                 && isset($mobile_no) && ($mobile_no != "")                 
                 && isset($first_name) && ($first_name != "")
                 && isset($last_name) && ($last_name != "")                 
               )
            {

                $sess_user_email = $this->session->userdata('logged_in_user_email_admin');

                if($email == $sess_user_email)
                {
                    $email_exist = false;
                }
                else
                {                
                    $email_exist = $this->Admin_user_profile_model->checkEmailExist($email);
                }

                if( !($email_exist) )
                {

                    $data = Array(                        
                       'user_id' => $user_id,
                       'email' => $email,
                       'mobile_no' => $mobile_no,                       
                       'first_name' => $first_name,
                       'last_name' => $last_name,                       
                    );
                    $res = $this->Admin_user_profile_model->userProfileUpdate($data);

                    if (isset($res))
                    {
                        $user_first_name = $first_name;
                        $user_last_name  = $last_name;
                        $user_full_name  = $first_name." ".$last_name;
                        $user_email      = $email;
                        $user = $this->Admin_user_profile_model->signupGetUser($user_id);
                        $password_encypted = $user['password'];
                        $original_password = $this->encryption->decrypt($password_encypted);

                        $sess_data = array(
                                        'logged_in_user_name_admin'      => $user_full_name,
                                        'logged_in_user_email_admin'     => $email,
                                        'logged_in_user_password_admin'  => $original_password,
                                     );
                        $this->session->set_userdata($sess_data);

                            $result = 'User Profile Updated Successfully';
                            echo $result;
                    }
                    else
                    {       
                            $result = 'User Profile Update Failed';
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
    /* END: Functions for Updating User's Details
    */

    /* START: Functions for Resetting Password
    */
    public function userPasswordReset()
    {   
        $user_id = $this->session->userdata('logged_in_user_id_admin');
        $user_current_password = $this->session->userdata('logged_in_user_password_admin');
        $current_password = $this->input->post('current_password');
        $password = $this->input->post('password');
        $password_encypted= $this->encryption->encrypt($password);        

            if ( isset($user_id) && ($user_id != "")
                 && isset($user_current_password) && ($user_current_password != "")
                 && isset($current_password) && ($current_password != "")
                 && isset($password) && ($password != "")                 
               )
            {

                if($user_current_password == $current_password)
                {
                    $current_password_matched = true;
                }
                else
                {                
                    $current_password_matched = false;
                }

                if($current_password_matched)
                {

                    $data = Array(                        
                       'user_id' => $user_id,
                       'password' => $password_encypted,                       
                    );
                    $res = $this->Admin_user_profile_model->userPasswordReset($data);

                    if (isset($res))
                    { 
                        $sess_data = array(                                        
                                        'logged_in_user_password_admin'  => $password,
                                     );
                        $this->session->set_userdata($sess_data);

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
                        $result = 'Current Password is wrong';
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