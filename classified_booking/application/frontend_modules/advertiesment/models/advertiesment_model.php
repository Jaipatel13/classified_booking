<?php defined('BASEPATH') or exit('No direct script access allowed');

class Advertiesment_model extends CI_Model
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
    
    /* START: Functions for Advertiesment
    */  
    public function advertiesmentGetUser($username, $password)
    {        
        $res_type = "";
        
        $table_name = DB_USERS;                
        $select = "SELECT * FROM $table_name ";
        /*$where  = "WHERE (username='$username' OR email='$username' OR mobile_no='$username') AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".UPS_ACTIVE_INACTIVE_FIELD."='".UPS_ACTIVE."'";*/
        $where  = "WHERE email='$username' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_CUSTOMER."'";
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        if($result)
        {
            $password_encypted = $result[0]['password'];
            
            $original_password = $this->encryption->decrypt($password_encypted);

            if($password == $original_password)
            {                                
                if($result[0][UPS_ACTIVE_INACTIVE_FIELD] == UPS_INACTIVE)
                {
                    $result[0]['profile_status_message'] = "Email not verified";
                    return $result;
                    //return UPS_INACTIVE;
                }
                else
                {
                    $result[0]['profile_status_message'] = "Email verified";
                    return $result;
                }
            }
            else
            {                                
                return false;
            }
        }
        else
        {
            return 'no_email_found';
        }

        /*$select = "SELECT * FROM $table_name ";
        $where  = "WHERE (username='$username' OR email='$username' OR mobile_no='$username') AND password='$password' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".UPS_ACTIVE_INACTIVE_FIELD."='".UPS_ACTIVE."'";               
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;*/
    }
    /* END: Functions for Advertiesment
    */    

    /* START: Function for getting all newspaper
    */    
    public function getAllnewspaper($newspaper_id)
    {   
        $res_type = "ROW_ARRAY";
        $table_name = DB_NEWSPAPER;                
        $select = "SELECT newspaper_id, newspaper_name FROM $table_name ";
        $where  = "WHERE newspaper_id='$newspaper_id' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.newspaper_id ".DB_RECORD_ORDER_BY_DESC;
        
        $query = $select.$where.$order_by;
        $res = $this->db->query($query);

        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all newspaper
    */

    /* START: Function for getting all Advertiesment
    */    
    public function getAlladvertiesment($newspaper_id)
    {   
         //$tbl_advertiesment = DB_advertiesment;
        //$ins = "INSERT INTO advertiesment (advertiesment_title,advertiesment_code) VALUES ('India','IN')";
        //$query = "SELECT * FROM advertiesment";
        //$query = $this->db->query($ins);
        //$res = $this->db->query($query);
        //echo $this->db->insert_id(); //get last inserted id
         //$result = $this->common->selectAll($tbl_advertiesment); //DEFAULT RESULT TYPE = ARRAY
        //$result = $this->common->queryResultWithType($res); //DEFAULT RESULT TYPE = ARRAY

        $res_type = "";
        $table_name = DB_ADVERTIESMENT_DETAILS;                
        $select = "SELECT * FROM $table_name ";
        $where  = "WHERE newspaper_id='$newspaper_id' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.advertiesment_details_id ".DB_RECORD_ORDER_BY_DESC;
        
        $query = $select.$where.$order_by;
        $res = $this->db->query($query);

        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all Advertiesment
    */ 

    /* START: Functions for adding Advertiesment
    */
    public function addAdvertiesment($data)
    {   
        $users_id = $data['users_id'];       
        $advertiesment_details_id = $data['advertiesment_details_id'];
        $newspaper_id = $data['newspaper_id'];
        $booking_name = $data['advertiesment_name'];
        $booking_amount = $data['advertiesment_amount'];
        $description = $data['description'];
        $booking_date        = $data['booking_date'];
        $booking_number        = $data['booking_number'];


        $table_name     = DB_BOOKING_DETAILS;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(users_id,advertiesment_details_id,newspaper_id,booking_name,booking_amount,description,booking_date,booking_number) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$users_id','$advertiesment_details_id','$newspaper_id','$booking_name','$booking_amount','$description','$booking_date','$booking_number')";
        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_advertiesment_details_id = $this->db->insert_id(); //get last inserted id

        return $new_advertiesment_details_id;
    }
    /* END: Functions for adding Advertiesment
    */
    
    /* START: Function for getting all Advertiesment
    */    
    public function getAdvertiesmentDetails($advertiesment_details_id)
    {   
        $res_type = "ROW_ARRAY";
        $table_name = DB_ADVERTIESMENT_DETAILS;                
        $select = "SELECT * FROM $table_name ";
        $where  = "WHERE advertiesment_details_id='$advertiesment_details_id' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.advertiesment_details_id ".DB_RECORD_ORDER_BY_DESC;
        
        $query = $select.$where.$order_by;
        $res = $this->db->query($query);

        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all Advertiesment
    */

    /* START: Functions for Forgot Password
    */  
    public function forgotPasswordGetUser($username)
    {        
        $res_type = "";
        
        $table_name = DB_USERS;                
        $select = "SELECT * FROM $table_name ";
        /*$where  = "WHERE (username='$username' OR email='$username' OR mobile_no='$username') AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".UPS_ACTIVE_INACTIVE_FIELD."='".UPS_ACTIVE."'";*/
        $where  = "WHERE email='$username' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_CUSTOMER."'";
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        if($result)
        {
            $password_encypted = $result[0]['password'];
            
            $original_password = $this->encryption->decrypt($password_encypted);
            
            $result[0]['original_password'] = $original_password;
            return $result;
            
        }
        else
        {
            return 'no_email_found';
        }        
    }
    /* END: Functions for Forgot Password
    */
}
?>