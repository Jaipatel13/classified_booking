<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_user_profile_model extends CI_Model
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
        $where  = "WHERE email='$email' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_ADMIN."'";
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

        /*$select = "SELECT * FROM $table_name ";
        $where  = "WHERE (username='$username' OR email='$username' OR mobile_no='$username') AND password='$password' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".UPS_ACTIVE_INACTIVE_FIELD."='".UPS_ACTIVE."'";               
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;*/
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

        $table_name     = DB_USERS;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "email='$email', mobile_no='$mobile_no', first_name='$first_name', last_name='$last_name' ";        
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

    /* START: Functions for Updating User's Password
    */
    public function userPasswordReset($data)
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
    /* END: Functions for Updating User's Password
    */

}
?>