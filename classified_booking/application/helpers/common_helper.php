<?php defined('BASEPATH') or exit('No direct script access allowed');

/*  START: Function for array printing
*/
if ( !(function_exists('fn_print_array')) )
{
    function fn_print_array($arr)
    {
    	$str = "<pre>";
    	$str .= print_r($arr,true);
    	$str .= "</pre>";

        return $str;
    }
}
/*  END: Function for array printing
*/

/*  START: Function for displaying date with selected format
*/
if ( !(function_exists('fn_date_format')) )
{
    function fn_date_format($format, $datetime)
    {    	
    	$date = date($format,strtotime($datetime));

        return $date;
    }
}
/*  END: Function for displaying date with selected format
*/

/*  START: Function for Email Verification Code Generate
*/
if ( !(function_exists('fn_generate_verification_code')) )
{
    function fn_generate_verification_code($format, $datetime)
    {       
        $date = date($format,strtotime($datetime));

        return $date;
    }
}
/*  END: Function for Email Verification Code Generate
*/

/*  START: Function for Sending Email
*/
if ( !(function_exists('fn_send_email')) )
{
    function fn_send_email($email_data)
    {        
        $CI =& get_instance();

        $message = $email_data["message"];
        $email   = $email_data["to_email"];
        $subject   = $email_data["subject"];
        $cc_email = "";
        if(isset($email_data["to_cc_email"]) && $email_data["to_cc_email"]!="")
        {
          $cc_email = $email_data["to_cc_email"];
        }

        $config = array();                        
        
        $config['protocol']            = SITE_EMAIL_PROTOCOL;
        $config['smtp_host']           = SITE_EMAIL_SMTP_HOST;
        $config['smtp_port']           = SITE_EMAIL_SMTP_PORT;
        $config['smtp_user']           = SITE_EMAIL;
        $config['smtp_pass']           = SITE_EMAIL_PASSWORD;
        $config['mailtype']            = SITE_EMAIL_MAILTYPE;
        $config['charset']             = SITE_EMAIL_CHARSET;
        $config['newline']             = SITE_EMAIL_NEWLINE;
        $config['wordwrap']            = SITE_EMAIL_WORDWRAP;

        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");
        $CI->email->from(SITE_EMAIL);
        $CI->email->to($email);
        if(isset($cc_email) && $cc_email!="")
        {
        $CI->email->cc($cc_email);
        }
        //$CI->email->bcc('them@their-example.com');
        $CI->email->subject($subject);
        $CI->email->message($message);

        //sending email
        if($CI->email->send()){
            return "Email sent Successfully";
        }
        else{            
            return 'Email not sent';
        }
    }
}
/*  END: Function for Sending Email
*/

/*  START: Function for Checking whether user is logged in or not
*/
if ( !(function_exists('fn_is_logged_in')) )
{
    function fn_is_logged_in()
    {

       $CI =& get_instance(); 

       $sess_logged_in = $CI->session->userdata('logged_in');
       $sess_logged_in_user_email = $CI->session->userdata('logged_in_user_email');
       $sess_logged_in_user_id = $CI->session->userdata('logged_in_user_id');

       if(isset($sess_logged_in) && $sess_logged_in != ""
          && isset($sess_logged_in_user_email) && $sess_logged_in_user_email != ""
          && isset($sess_logged_in_user_id) && $sess_logged_in_user_id != ""
         )     
       {}
       else
       {
            $sess_data = array(
                            'success' => false,
                            //'message' => 'Please login first !!!',
                            'message' => 'Please Login',
                         );
            $CI->session->set_flashdata($sess_data);
            redirect(base_url()."login", 'refresh');        
       }
    }
}
/*  END: Function for Checking whether user is logged in or not
*/

/*  START: Function for Checking whether user is logged in or not
*/
if ( !(function_exists('fn_logged_in')) )
{
    function fn_logged_in()
    {

       $CI =& get_instance(); 

       $sess_logged_in = $CI->session->userdata('logged_in');
       $sess_logged_in_user_email = $CI->session->userdata('logged_in_user_email');
       $sess_logged_in_user_id = $CI->session->userdata('logged_in_user_id');

       if(isset($sess_logged_in) && $sess_logged_in != ""
          && isset($sess_logged_in_user_email) && $sess_logged_in_user_email != ""
          && isset($sess_logged_in_user_id) && $sess_logged_in_user_id != ""
         )     
       {
            redirect(base_url()."user_profile", 'refresh');
       }
    }
}
/*  END: Function for Checking whether user is logged in or not
*/

/*  START: Function for Checking whether admin user is logged in or not
*/
if ( !(function_exists('fn_is_logged_in_admin')) )
{
    function fn_is_logged_in_admin()
    {

       $CI =& get_instance(); 

       $sess_logged_in_admin = $CI->session->userdata('logged_in_admin');
       $sess_logged_in_user_email_admin = $CI->session->userdata('logged_in_user_email_admin');
       $sess_logged_in_user_id_admin = $CI->session->userdata('logged_in_user_id_admin');

       if(isset($sess_logged_in_admin) && $sess_logged_in_admin != ""
          && isset($sess_logged_in_user_email_admin) && $sess_logged_in_user_email_admin != ""
          && isset($sess_logged_in_user_id_admin) && $sess_logged_in_user_id_admin != ""
         )     
       {}
       else
       {
            $sess_data = array(
                            'success' => false,
                            'message' => 'Please login first !!!',
                         );
            $CI->session->set_flashdata($sess_data);
            redirect(base_url()."admin", 'refresh');
       }
    }
}
/*  END: Function for Checking whether admin user is logged in or not
*/

/*  START: Function for Checking whether admin user is logged in or not
*/
if ( !(function_exists('fn_logged_in_admin')) )
{
    function fn_logged_in_admin()
    {

       $CI =& get_instance(); 

       $sess_logged_in_admin = $CI->session->userdata('logged_in_admin');
       $sess_logged_in_user_email_admin = $CI->session->userdata('logged_in_user_email_admin');
       $sess_logged_in_user_id_admin = $CI->session->userdata('logged_in_user_id_admin');

       if(isset($sess_logged_in_admin) && $sess_logged_in_admin != ""
          && isset($sess_logged_in_user_email_admin) && $sess_logged_in_user_email_admin != ""
          && isset($sess_logged_in_user_id_admin) && $sess_logged_in_user_id_admin != ""
         )     
       {
            //redirect(base_url()."admin/dashboard", 'refresh');
            redirect(base_url()."admin/user_profile", 'refresh');
       }
    }
}
/*  END: Function for Checking whether admin user is logged in or not
*/

/*  START: Function for generating Unique Code
*/
if ( !(function_exists('fn_unique_code')) )
{
    function fn_unique_code($limit1,$limit2)
    {  
        $ci_uniq_str = random_string('alnum',$limit1);
        $fn_uniq_str = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit2);        
        $ct_str = ORDER_UNIQUE_CODE_PREFIX;

        $uniq_str = $ct_str.$ci_uniq_str.$fn_uniq_str;

        return $uniq_str;
    }
}
/*  END: Function for generating Unique Code
*/

/*  START: Function for getting distance, duration between source and destination addresses using Distance Marix API
*/
if ( !(function_exists('fn_distance_matrix_api')) )
{
    function fn_distance_matrix_api($pickup_location,$delivered_to_location)
    {  
        // url encode the address
        $origin_add = urlencode($pickup_location);
        $destination_add = urlencode($delivered_to_location);

        //$str_api = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial";
        $str_api  = GM_DISTANCE_MATRIX_API_URL;
        $str_api .= "&origins=$origin_add&destinations=$destination_add";
        $str_api .= "&key=".GM_DISTANCE_MATRIX_API_KEY;

        $url = sprintf("%s", $str_api);

        $curl = curl_init();

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(          
          'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){
          $result = "Connection Failure";
          return $result;
        }
        curl_close($curl);

        return $result;  
    }
}
/*  END: Function for getting distance, duration between source and destination addresses using Distance Marix API
*/

/*  START: Function for sending notifications using FCM
*/
if ( !(function_exists('fn_send_notification')) )
{
    function fn_send_notification($data)
    {         
        $CI =& get_instance(); 

        $users_id= $data["users_id"];
        $device_token= $data["device_token"];
        $device_type= $data["device_type"];
        $title= $data["title"];
        $message= $data["message"];
        $notifications_datetime= date(DATETIME_FORMAT_1);
        
        $notification = array(
          "title" => "$title",
          "body" => "$message",
          //"icon" => "https://example.com/icon.png", // Replace https://example.com/icon.png with your PUSH ICON URL
          //"click_action" => "$postlink"
        );

        // Push Data's
        $send_data = array(
        //"to" => "$token",
        "registration_ids" => $device_token,        
        'data' => array('message' => $message),
        "notification" => $notification
        );

        // Print Output in JSON Format
        $data_string = json_encode($send_data);
        
        // FCM API Token URL
        $url = FCM_API_TOKEN_URL;

        //Curl Headers
        $headers = array
        (
             'Authorization: key=' . FCM_API_KEY,
             'Content-Type: application/json'
        );        

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);                                                                 
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);

        // EXECUTE:
        $result = curl_exec($ch);

        curl_close($ch);

        //Add data into database
        $new_notification_id = 0;
        if(!empty($device_token))
        {
        foreach ($device_token as $key => $value) {
        $table_name = DB_NOTIFICATIONS;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(users_id, device_token, device_type, notifications_datetime, title, message) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$users_id', '$value', '$device_type', '$notifications_datetime', '$title', '$message')";

        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $CI->db->query($query_str);
        }
        $new_notification_id = $CI->db->insert_id(); //get last inserted id
        }

        return $new_notification_id;        
    }
}
/*  END: Function for sending notifications using FCM
*/

?>