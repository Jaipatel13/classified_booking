<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_login extends BackendController
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
        $this->load->model('Admin_login_model');
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
                    "page_title" => "Login"
                );
        $is_logged_in = false;
        $this->render_page($view, $data, $is_logged_in);
    }

    /* START: Functions for login
    */  
    public function loginCheck(){

        fn_logged_in_admin();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $res = $this->Admin_login_model->loginGetUser($email, $password);

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
                                'logged_in_admin'                => true,
                                'logged_in_user_name_admin'      => $user_full_name,
                                'logged_in_user_email_admin'     => $email,
                                'logged_in_user_id_admin'        => $user_id,
                                'logged_in_user_password_admin'  => $original_password,
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

    /* END: Functions for login
    */

    /* START: Functions for logout
    */ 
    public function logout(){

        //$this->session->sess_destroy();        
        $this->session->unset_userdata('logged_in_admin');
        $this->session->unset_userdata('logged_in_user_name_admin');
        $this->session->unset_userdata('logged_in_user_email_admin');
        $this->session->unset_userdata('logged_in_user_id_admin');
        $this->session->unset_userdata('logged_in_user_password_admin');

        redirect(base_url("admin"), 'refresh');
    }
    /* END: Functions for logout
    */
	
}
?>