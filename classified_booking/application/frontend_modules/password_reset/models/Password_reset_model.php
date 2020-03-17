<?php defined('BASEPATH') or exit('No direct script access allowed');

class Password_reset_model extends CI_Model
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