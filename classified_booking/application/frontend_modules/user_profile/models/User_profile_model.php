<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_profile_model extends CI_Model
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

        $table_name     = DB_USERS;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "email='$email', mobile_no='$mobile_no', first_name='$first_name', last_name='$last_name', address_line_1='$address_line_1', address_line_2='$address_line_2', city_id='$city_id', state_id='$state_id', country_id='$country_id', zip_code='$zip_code' ";        
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
}
?>