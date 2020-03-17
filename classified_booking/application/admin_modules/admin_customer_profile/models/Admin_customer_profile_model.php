<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_customer_profile_model extends CI_Model
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
    }    

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */

    /* START: Functions for checking email already exist or not
    */  
    public function checkEmailExist($email)
    {            
        $res_type = "";
        
        $table_name = DB_USERS;
        $select = "SELECT * FROM $table_name ";
        $where  = "WHERE email='$email' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_CUSTOMER."'";
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }        
    }
    /* END: Functions for checking email already exist or not
    */

    /* START: Functions for Updating User's Profile
    */
    public function userProfileUpdate($data)
    {   
        $user_id = $data['user_id'];
        $email = $data['email'];
        $mobile_no = $data['mobile_no'];        
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $address_line_1 = $data['address_line_1'];
        $address_line_2 = $data['address_line_2'];
        $city_id = $data['city_id'];
        $state_id = $data['state_id'];
        $country_id = $data['country_id'];
        $zip_code = $data['zip_code'];
        $paypal_email_id = $data['paypal_email_id'];

        $table_name     = DB_USERS;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "email='$email', mobile_no='$mobile_no', first_name='$first_name', last_name='$last_name', address_line_1='$address_line_1', address_line_2='$address_line_2', city_id='$city_id', state_id='$state_id', country_id='$country_id', zip_code='$zip_code', paypal_email_id='$paypal_email_id' ";
        $where          = "WHERE users_id=$user_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;        
    }
    /* END: Functions for Updating User's Profile
    */  

    public function signupGetUser($users_id){
        $table_name = DB_USERS;
        $query = $this->db->get_where($table_name,array('users_id'=>$users_id));//,"'".DB_RECORD_ACTIVE_INACTIVE_FIELD."'"=>DB_RECORD_ACTIVE        
        return $query->row_array();
    }

    /* START: Functions for Updating Customer's Password
    */
    public function customerPasswordReset($data)
    {
        $user_id = $data['user_id'];
        $password = $data['password'];        

        $table_name     = DB_USERS;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "password='$password' ";
        $where          = "WHERE users_id=$user_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for Updating Customer's Password
    */

    /* START: Function for getting all countries
    */    
    public function getAllCountries()
    {   
        $tbl_country = DB_COUNTRY;        
        $result = $this->common->selectAll($tbl_country); //DEFAULT RESULT TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all countries
    */

    /* START: Function for getting all states
    */    
    public function getStatesByCountry($country_id)
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $select = "SELECT $tbl_state.state_id,$tbl_state.state_name FROM $tbl_state ";
        $join   = "JOIN $tbl_country ON $tbl_state.country_id=$tbl_country.country_id ";
        $where  = "WHERE $tbl_state.country_id=$country_id AND $tbl_state.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;

        $query = $select.$join.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all states
    */

    /* START: Function for getting all countries
    */    
    public function getCitiesByState($country_id, $state_id)
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $select = "SELECT $tbl_city.city_id,$tbl_city.city_name FROM $tbl_city ";
        $join   = "JOIN $tbl_country ON $tbl_city.country_id=$tbl_country.country_id ";
        $join1  = "JOIN $tbl_state ON $tbl_city.state_id=$tbl_state.state_id ";
        $where  = "WHERE $tbl_city.country_id=$country_id AND $tbl_city.state_id=$state_id AND $tbl_city.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;

        $query = $select.$join.$join1.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all countries
    */

    /*START: Functions for History Tab
    */

        /* START: Functions for Getting All Approved Orders
        */
        /*public function get_all_approved_orders_count($data)
        {        
            $res_type = "ROW_ARRAY";

            $users_id = $data['users_id'];

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_approved_orders FROM $order_details ";            
            $where  = "WHERE $order_details.users_id=$users_id AND $order_details.order_status!='".COS_APPROVAL_PENDING."' AND $order_details.order_status!='".COS_DISAPPROVED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }*/
        /* END: Functions for Getting All Approved Orders
        */

        /* START: Functions for Getting All Completed Orders
        */  
        /*public function get_all_completed_orders_count($data)
        {        
            $res_type = "ROW_ARRAY";

            $users_id = $data['users_id'];

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_completed_orders FROM $order_details ";
            $where  = "WHERE $order_details.users_id=$users_id AND $order_details.order_status='".COS_DELIVERED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }*/
        /* END: Functions for Getting All Completed Orders
        */

        /* START: Functions for Getting All Pending Orders
        */  
        /*public function get_all_pending_orders_count($data)
        {        
            $res_type = "ROW_ARRAY";

            $users_id = $data['users_id'];

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_pending_orders FROM $order_details ";
            $where  = "WHERE $order_details.users_id=$users_id AND $order_details.order_status!='".COS_APPROVAL_PENDING."' AND $order_details.order_status!='".COS_DISAPPROVED."' AND $order_details.order_status!='".COS_DELIVERED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }*/
        /* END: Functions for Getting All Pending Orders
        */               

        /* START: Functions for Getting Total Payments
        */  
        /*public function get_total_payments($data)
        {        
            $res_type = "ROW_ARRAY";

            $users_id = $data['users_id'];

            $order_payment_details = DB_ORDER_PAYMENT_DETAILS;

            $select = "SELECT SUM(payment_amount) as total_payments FROM $order_payment_details ";
            $where  = "WHERE $order_payment_details.users_id=$users_id AND $order_payment_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }*/
        /* END: Functions for Getting Total Payments
        */

        /* START: Functions for Getting Total Pending Payments
        */  
        /*public function get_total_pending_payments($data)
        {        
            $res_type = "ROW_ARRAY";

            $users_id = $data['users_id'];

            $order_payment_details = DB_ORDER_PAYMENT_DETAILS;
            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT SUM($order_details.order_amount) as total_all_payments FROM $order_details WHERE $order_details.users_id=$users_id AND $order_details.order_status!='".COS_APPROVAL_PENDING."' AND $order_details.order_status!='".COS_DISAPPROVED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $select1 = "SELECT SUM($order_payment_details.payment_amount) as total_payments FROM $order_payment_details WHERE $order_payment_details.users_id=$users_id AND $order_payment_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $select2 = "SELECT ($select)-($select1) as total_pending_payments";
            
            $query = $select2;
            
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }*/
        /* END: Functions for Getting Total Pending Payments
        */

    /*END: Functions for History Tab
    */
}
?>