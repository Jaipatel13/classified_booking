<?php defined('BASEPATH') or exit('No direct script access allowed');

class Signup_model extends CI_Model
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
    /* START: Function for getting all countries
    */    
    public function getAllCountries()
    {   
        $tbl_country = DB_COUNTRY;
        //$ins = "INSERT INTO country (country_name,country_code) VALUES ('India','IN')";
        //$query = "SELECT * FROM country";
        //$query = $this->db->query($ins);
        //$res = $this->db->query($query);
        //echo $this->db->insert_id(); //get last inserted id
        $result = $this->common->selectAll($tbl_country); //DEFAULT RESULT TYPE = ARRAY
        //$result = $this->common->queryResultWithType($res); //DEFAULT RESULT TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all countries
    */

    /* START: Function for getting all countries
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
    /* END: Function for getting all countries
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

        /*$select = "SELECT * FROM $table_name ";
        $where  = "WHERE (username='$username' OR email='$username' OR mobile_no='$username') AND password='$password' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".UPS_ACTIVE_INACTIVE_FIELD."='".UPS_ACTIVE."'";               
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;*/
    }
    /* END: Functions for checking email already exist or not
    */

    /* START: Functions for checking username already exist or not
    */  
    public function checkUsernameExist($username)
    {            
        $res_type = "";
        
        $table_name = DB_USERS;
        $select = "SELECT * FROM $table_name ";
        $where  = "WHERE username='$username' AND ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND ".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_CUSTOMER."'";
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
    /* END: Functions for checking username already exist or not
    */

    /* START: Functions for Adding Users
    */
    public function signupAdd($data)
    {   
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $email_verification_code = $data['email_verification_code'];
        $profile_status = $data['profile_status'];
        $mobile_no = $data['mobile_no'];
        $user_type = $data['user_type'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $address_line_1 = $data['address_line_1'];
        $address_line_2 = $data['address_line_2'];
        $city_id = $data['city_id'];
        $state_id = $data['state_id'];
        $country_id = $data['country_id'];
        $zip_code = $data['zip_code'];

        $table_name = DB_USERS;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(username, password, email, email_verification_code, profile_status, mobile_no, user_type, first_name,
                            last_name, address_line_1, address_line_2, city_id, state_id, country_id, zip_code) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$username', '$password', '$email', '$email_verification_code', '$profile_status', '$mobile_no',
                            '$user_type', '$first_name', '$last_name', '$address_line_1', '$address_line_2', '$city_id',
                            '$state_id', '$country_id', '$zip_code')";

        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_user_id = $this->db->insert_id(); //get last inserted id
        

        return $new_user_id;
        //echo "This is a Home Model";
    }
    /* END: Functions for Adding Users
    */  

    public function signupGetUser($users_id){
        $table_name = DB_USERS;
        $query = $this->db->get_where($table_name,array('users_id'=>$users_id));//,"'".DB_RECORD_ACTIVE_INACTIVE_FIELD."'"=>DB_RECORD_ACTIVE        
        return $query->row_array();
    }

    public function signupUserActivate($data, $users_id){
        $table_name = DB_USERS;
        $this->db->where($table_name.'.users_id', $users_id);
        return $this->db->update($table_name, $data);
    }
}
?>