<?php defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends FrontendController
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
        $this->load->model('Signup_model');
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
        $result = $this->Signup_model->getAllCountries();

        //echo fn_print_array($result);
        /*foreach ($result as $row) {
            echo "country_id=>".$row['country_id']."<br/>";
            echo "country_name=>".$row['country_name']."<br/>";
            echo "entry_date=>".fn_date_format(DATE_FORMAT_1,$row['entry_date'])."<br/>";

        } */
            
        $view = "index";
        $data = array(
                    "page_title" => "Signup | Customer",
                    "page_name"  => "signup",
                    "all_countries"  => $result
                );
        $this->render_page($view, $data);
        //$this->load->view('index');
    }

    public function signup_select_user()
    {       
        $view = "select_user";
        $data = array(
                    "page_title" => "Signup",
                    "page_name"  => "signup_select_user",                    
                );
        $this->render_page($view, $data);
        //$this->load->view('index');
    }

    public function signup_transporter()
    {       
        $view = "transporter_profile";
        $data = array(
                    "page_title" => "Signup | Transporter",
                    "page_name"  => "signup_transporter",                    
                );
        $this->render_page($view, $data);
        //$this->load->view('index');
    }

    public function getStatesByCountry()
    {
        $country_id = $this->input->post('country_id');
        $result = $this->Signup_model->getStatesByCountry($country_id);
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
        $result = $this->Signup_model->getCitiesByState($country_id, $state_id);
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

       $email_exist = $this->Signup_model->checkEmailExist($email);

       echo $email_exist;

    }

    public function checkUsernameExist()
    {
       $username = $this->input->post('username');

       $username_exist = $this->Signup_model->checkUsernameExist($username);

       echo $username_exist;

    }
    
    /* START: Functions for Adding Users
    */
    public function signupAdd()
    {   
        //$username="";
        /*$username = 'customer12';
        $password = 'customer1';
        $password_encypted= $this->encryption->encrypt($password);
        $email = SITE_EMAIL;
        $email_verification_code = SITE_EMAIL_CODE;
        $profile_status = UPS_INACTIVE;
        $mobile_no = '1234567890';
        $user_type = USER_TYPE_CUSTOMER;
        $first_name = 'fn';
        $last_name = 'ln';
        $address_line_1 = 'address 1';
        $address_line_2 = 'address 2';
        $city_id = '2';
        $state_id = '1';
        $country_id = '1';
        $zip_code = '12321';
        $terms_conditions = "true";*/

        //$username="";
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$password_encypted= $this->encrypt->sha1($password);
        $password_encypted= $this->encryption->encrypt($password);
        //$password_encypted= $password;
        $email = $this->input->post('email');
        $email_verification_code = SITE_EMAIL_CODE;
        $profile_status = UPS_INACTIVE;
        $mobile_no = $this->input->post('mobile_no');
        $user_type = $this->input->post('user_type');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $address_line_1 = $this->input->post('address_line_1');
        $address_line_2 = $this->input->post('address_line_2');
        $city_id = $this->input->post('city_id');
        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $zip_code = $this->input->post('zip_code');
        $terms_conditions = $this->input->post('terms_conditions');

        
            /*isset($username) && ($username != "")
                 && 
            */
            if ( isset($username) && ($username != "")
                 && isset($password) && ($password != "")
                 && isset($email) && ($email != "")
                 && isset($email_verification_code) && ($email_verification_code != "")
                 && isset($profile_status) && ($profile_status != "")
                 && isset($mobile_no) && ($mobile_no != "")
                 && isset($user_type) && ($user_type != "")
                 && isset($first_name) && ($first_name != "")
                 && isset($last_name) && ($last_name != "")
                 && isset($address_line_1) && ($address_line_1 != "")
                 && isset($address_line_2) && ($address_line_2 != "")                 
                 && isset($city_id) && ($city_id != "")
                 && isset($state_id) && ($state_id != "")
                 && isset($country_id) && ($country_id != "")
                 && isset($zip_code) && ($zip_code != "")
                 && isset($terms_conditions) && ($terms_conditions != "")
               )
            {

                $email_exist = $this->Signup_model->checkEmailExist($email);
                $username_exist = $this->Signup_model->checkUsernameExist($username);

                if( !($email_exist) && !($username_exist) )
                {

                    $data = Array(
                       'username' => $username,
                       'password' => $password_encypted,                   
                       'email' => $email,
                       'email_verification_code' => $email_verification_code,
                       'profile_status' => $profile_status,
                       'mobile_no' => $mobile_no,
                       'user_type' => $user_type,
                       'first_name' => $first_name,
                       'last_name' => $last_name,
                       'address_line_1' => $address_line_1,
                       'address_line_2' => $address_line_2,
                       'city_id' => $city_id,
                       'state_id' => $state_id,
                       'country_id' => $country_id,
                       'zip_code' => $zip_code,
                    );
                    $user_id = $this->Signup_model->signupAdd($data);

                    if (isset($user_id))
                    {
                        /*$config = array();
                        $config['protocol']            = SITE_EMAIL_PROTOCOL;
                        $config['smtp_host']           = SITE_EMAIL_SMTP_HOST;
                        $config['smtp_port']           = SITE_EMAIL_SMTP_PORT;
                        $config['smtp_user']           = SITE_EMAIL;
                        $config['smtp_pass']           = SITE_EMAIL_PASSWORD;
                        $config['mailtype']            = SITE_EMAIL_MAILTYPE;
                        $config['charset']             = SITE_EMAIL_CHARSET;
                        $config['newline']             = SITE_EMAIL_NEWLINE;
                        $config['wordwrap']            = SITE_EMAIL_WORDWRAP;*/


                        $message =  "
                                    <html>
                                    <head>
                                        <title>Verification Code</title>
                                    </head>
                                    <body>
                                        <h2>Thank you for Registering.</h2>
                                        <p>Your Account:</p>
                                        <p>Username: ".$username."</p>
                                        <p>Email: ".$email."</p>
                                        <p>Password: ".$password."</p>
                                        <p>Please click the link below to activate your account.</p>
                                        <h4><a href='".base_url()."signup/signUpActivate/".$user_id."/".$email_verification_code."'>Activate My Account</a></h4>
                                    </body>
                                    </html>
                                    ";

                        /*$this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from(SITE_EMAIL);
                        $this->email->to($email);
                        $this->email->subject('Signup Verification Email');
                        $this->email->message($message);*/

                        $subject = "Signup Verification Email";

                        $email_data = array(
                                      "message"  => $message,
                                      "to_email" => $email,
                                      "subject"  => $subject,
                                      );

                        $email_result = fn_send_email($email_data);                        

                        //sending email
                        if($email_result == "Email sent Successfully")
                        {
                            $result = 'Signup Completed Successfully';
                            echo $result;
                        }
                        else{
                            $result = 'Signup Verification Email not sent';
                            echo $result;
                        }
                    }
                    else
                    {       
                            $result = 'Signup Failed';
                            echo $result;                            
                    }
                }    
                else
                {
                        $result = 'Email/Username already exists';
                        echo $result;
                }
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Adding Users
    */

    /* START: Functions for Validating Users Email
    */
    public function signUpActivate(){
        $user_id =  $this->uri->segment(3);
        $email_verification_code = $this->uri->segment(4);

        //fetch user details
        $user = $this->Signup_model->signupGetUser($user_id);

        //if code matches
        if($user['email_verification_code'] == $email_verification_code){
            //update user active status
            $data['profile_status'] = UPS_ACTIVE;
            $res = $this->Signup_model->signupUserActivate($data, $user_id);
            $data = array();
            $result_arr['data'] = "";            
            $result_arr['message'] = "";
            $result_arr['success'] = "";
            if($res){
                $sess_data = array(
                                'success' => true,
                                'message' => 'User activated successfully',
                             );                
                $this->session->set_flashdata($sess_data);
                redirect(base_url()."login", 'refresh');
                //echo $result;
            }
            else{
                $sess_data = array(
                                'success' => false,
                                'message' => 'User not activated',
                             );
                $this->session->set_flashdata($sess_data);
                redirect(base_url()."login", 'refresh');
                //echo $result;
            }
        }
        else{
            $sess_data = array(
                                'success' => false,
                                'message' => 'Email not verified',
                             );
            $this->session->set_flashdata($sess_data);
            redirect(base_url()."login", 'refresh');
            //echo $result;
        }

    }
    /* END: Functions for Validating Users Email
    */
}
?>