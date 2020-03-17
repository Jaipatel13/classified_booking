<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_forgot_password_model extends CI_Model
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

    /* START: Functions for Forgot Password
    */  
    public function forgotPasswordGetUser($username)
    {        
        $res_type = "";
        
        $table_name = DB_USERS;                
        $select = "SELECT * FROM $table_name ";
        /*$where  = "WHERE (username='$username' OR email='$username' OR mobile_no='$username') AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".UPS_ACTIVE_INACTIVE_FIELD."='".UPS_ACTIVE."'";*/
        $where  = "WHERE email='$username' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_ADMIN."'";
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