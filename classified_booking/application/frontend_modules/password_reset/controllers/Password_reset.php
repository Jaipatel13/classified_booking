<?php defined('BASEPATH') or exit('No direct script access allowed');

class Password_reset extends FrontendController
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

        fn_is_logged_in();

        $this->load->model('Password_reset_model');        
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
        $view = "index";
        $data = array(
                    "page_title" => "Password Reset",
                );
        $this->render_page($view, $data);
    }    
    
    /* START: Functions for Resetting Password
    */
    public function userPasswordReset()
    {   
        $user_id = $this->session->userdata('logged_in_user_id');
        $user_current_password = $this->session->userdata('logged_in_user_password');
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
                    $res = $this->Password_reset_model->userPasswordReset($data);

                    if (isset($res))
                    { 
                        $sess_data = array(                                        
                                        'logged_in_user_password'  => $password,
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