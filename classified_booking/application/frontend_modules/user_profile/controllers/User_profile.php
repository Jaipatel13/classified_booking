<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_profile extends FrontendController
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

        $this->load->model('User_profile_model');
        $this->load->model('signup/Signup_model');
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
        $user_id = $this->session->userdata('logged_in_user_id');        
        //fetch user details
        $user = $this->User_profile_model->signupGetUser($user_id);
        $email = $user['email'];
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

        $user_data = array(
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
                     );

        $result = $this->Signup_model->getAllCountries();
        $result_states = $this->Signup_model->getStatesByCountry($country_id);
        $result_cities = $this->Signup_model->getCitiesByState($country_id, $state_id);

        //echo fn_print_array($result);
            
        $view = "index";
        $data = array(
                    "page_title" => "User Profile",
                    "all_countries" => $result,
                    "all_states" => $result_states,
                    "all_cities" => $result_cities,
                    "user_data" => $user_data,
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
       $sess_user_email = $this->session->userdata('logged_in_user_email');

       if($email == $sess_user_email)
       {
        $email_exist = false;
       }
       else
       {
        $email_exist = $this->Signup_model->checkEmailExist($email);
       }       

       echo $email_exist;

    }
    
    /* START: Functions for Updating User's Details
    */
    public function userProfileUpdate()
    {   
        $user_id = $this->session->userdata('logged_in_user_id');        
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

                $sess_user_email = $this->session->userdata('logged_in_user_email');

                if($email == $sess_user_email)
                {
                    $email_exist = false;
                }
                else
                {                
                    $email_exist = $this->Signup_model->checkEmailExist($email);                    
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
                    );
                    $res = $this->User_profile_model->userProfileUpdate($data);

                    if (isset($res))
                    {
                        $user_first_name = $first_name;
                        $user_last_name  = $last_name;
                        $user_full_name  = $first_name." ".$last_name;
                        $user_email      = $email;
                        $user = $this->User_profile_model->signupGetUser($user_id);
                        $password_encypted = $user['password'];
                        $original_password = $this->encryption->decrypt($password_encypted);

                        $sess_data = array(
                                        'logged_in_user_name'      => $user_full_name,
                                        'logged_in_user_email'     => $email,
                                        'logged_in_user_password'  => $original_password,
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
    
}
?>