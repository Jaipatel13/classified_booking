<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_customers_model extends CI_Model
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

    /* START: Function for getting all customers
    */    
    public function getAllCustomers()
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $tbl_users = DB_USERS;

        $select = "SELECT $tbl_users.*,$tbl_city.city_name,$tbl_state.state_name,$tbl_country.country_name FROM $tbl_users ";
        $join   = "JOIN $tbl_country ON $tbl_users.country_id=$tbl_country.country_id ";
        $join   .= "JOIN $tbl_state ON $tbl_users.state_id=$tbl_state.state_id ";
        $join   .= "JOIN $tbl_city ON $tbl_users.city_id=$tbl_city.city_id ";
        $where  = "WHERE $tbl_users.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE." AND $tbl_users.".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_CUSTOMER."'";
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $tbl_users.users_id ".DB_RECORD_ORDER_BY_DESC;

        $query = $select.$join.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }
    /* END: Function for getting all customers
    */ 

    /* START: Functions for deleting Customers
    */  
    public function deleteCustomers($data)
    {           
        $customer_id = $data['customer_id'];

        $table_name     = DB_USERS;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE users_id=$customer_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting Customers
    */    
}
?>