<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_customer_orders_model extends CI_Model
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

    /* START: Functions for Getting All Customers Orders
    */  
    public function getAllCustomerOrders()
    {        
        $res_type = "";
        
        $table_booking_details = DB_BOOKING_DETAILS;
        $table_users = DB_USERS;
        $table_advertiesment_details = DB_ADVERTIESMENT_DETAILS;
        $table_newspaper = DB_NEWSPAPER;

        $select = "SELECT $table_booking_details.*, $table_advertiesment_details.*, $table_users.first_name, $table_users.last_name, $table_newspaper.newspaper_name FROM $table_booking_details ";
        $join   = "JOIN $table_users ON $table_booking_details.users_id=$table_users.users_id ";
        $join  .= "JOIN $table_advertiesment_details ON $table_booking_details.advertiesment_details_id=$table_advertiesment_details.advertiesment_details_id ";
        $join  .= "JOIN $table_newspaper ON $table_booking_details.newspaper_id=$table_newspaper.newspaper_id ";
        $where  = "WHERE $table_booking_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_booking_details.booking_details_id ".DB_RECORD_ORDER_BY_DESC;
        $query = $select.$join.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }
    /* END: Functions for Getting All Customers Orders
    */   

    public function GetCustomerDetails($users_id){
        $table_name = DB_USERS;
        $query = $this->db->get_where($table_name,array('users_id'=>$users_id));//,"'".DB_RECORD_ACTIVE_INACTIVE_FIELD."'"=>DB_RECORD_ACTIVE        
        return $query->row_array();
    }

    /* START: Functions for deleting Order
    */  
    public function deleteOrder($data)
    {           
        $booking_details_id = $data['order_id'];

        $table_name     = DB_BOOKING_DETAILS;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE booking_details_id=$booking_details_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting Order
    */    
}
?>