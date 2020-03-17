<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
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
    /* START: Function for getting all newspaper
    */    
    public function getAllnewspaper()
    {   
         //$tbl_newspaper = DB_newspaper;
        //$ins = "INSERT INTO newspaper (newspaper_name,newspaper_code) VALUES ('India','IN')";
        //$query = "SELECT * FROM newspaper";
        //$query = $this->db->query($ins);
        //$res = $this->db->query($query);
        //echo $this->db->insert_id(); //get last inserted id
         //$result = $this->common->selectAll($tbl_newspaper); //DEFAULT RESULT TYPE = ARRAY
        //$result = $this->common->queryResultWithType($res); //DEFAULT RESULT TYPE = ARRAY

        $res_type = "";
        $table_name = DB_NEWSPAPER;                
        $select = "SELECT newspaper_id, newspaper_name FROM $table_name ";
        $where  = "WHERE ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.newspaper_id ".DB_RECORD_ORDER_BY_DESC;
        
        $query = $select.$where.$order_by;
        $res = $this->db->query($query);

        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all newspaper
    */ 

    
    /* START: Functions for Home
    */  
    public function homeGetUser($username, $password)
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
    /* END: Functions for Home
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