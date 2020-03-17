<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_booking_model extends CI_Model
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

    /* START: Function for getting all booking
    */    
    public function getAllBooking()
    {   
         
        // $res_type = "";
        // $table_name = DB_BOOKING_DETAILS;                
        // $select = "SELECT booking_id, booking_name FROM $table_name ";
        // $where  = "WHERE ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        // $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.booking_id ".DB_RECORD_ORDER_BY_DESC;
        
        // $query = $select.$where.$order_by;
        // $res = $this->db->query($query);

        // $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        // return $result;
        $tbl_booking_details = DB_BOOKING_DETAILS;
        $tbl_newspaper = DB_NEWSPAPER;
        $tbl_advertiesment_details = DB_ADVERTIESMENT_DETAILS;
        $select = "SELECT $tbl_booking_details.*,$tbl_advertiesment_details.advertiesment_details_id,$tbl_advertiesment_details.advertiesment_name,$tbl_newspaper.newspaper_id,$tbl_newspaper.newspaper_name FROM $tbl_booking_details ";

        $join   = "JOIN $tbl_advertiesment_details ON $tbl_booking_details.advertiesment_details_id=$tbl_advertiesment_details.advertiesment_details_id ";
        $join1  = "JOIN $tbl_newspaper ON $tbl_booking_details.newspaper_id=$tbl_newspaper.newspaper_id ";
        $where  = "WHERE $tbl_booking_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $tbl_booking_details.booking_details_id ".DB_RECORD_ORDER_BY_DESC;

        $query = $select.$join.$join1.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all booking
    */ 

    /* START: Functions for deleting Booking
    */  
    public function deleteBooking($data)
    {           
        $booking_id = $data['booking_id'];

        $table_name     = DB_BOOKING_DETAILS;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE booking_id=$booking_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting Booking
    */


}
?>