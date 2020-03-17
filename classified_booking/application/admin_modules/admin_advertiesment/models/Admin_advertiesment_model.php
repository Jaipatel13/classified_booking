<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_advertiesment_model extends CI_Model
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

    /* START: Function for getting all Advertiesment
    */    
    public function getAlladvertiesment()
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
        $select = "SELECT advertiesment_details_id, advertiesment_name FROM $table_name ";
        $where  = "WHERE ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.advertiesment_details_id ".DB_RECORD_ORDER_BY_DESC;
        
        $query = $select.$where.$order_by;
        $res = $this->db->query($query);

        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all Advertiesment
    */ 

    /* START: Function for getting Advertiesment by id
    */    
    public function getAdvertiesmentByID($advertiesment_details_id)
    {   
        $table_name = DB_ADVERTIESMENT_DETAILS;
        $select = "SELECT $table_name.* FROM $table_name ";
        $where  = "WHERE $table_name.advertiesment_details_id=$advertiesment_details_id AND $table_name.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;

        $query = $select.$where;
        $query = $this->db->query($query);
        /*$result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY*/
        $result = $query->row_array();

        return $result;
    }    
    /* END: Function for getting Advertiesment by id
    */

    /* START: Functions for deleting Advertiesment
    */  
    public function deleteAdvertiesment($data)
    {           
        $advertiesment_details_id = $data['advertiesment_id'];

        $table_name     = DB_ADVERTIESMENT_DETAILS;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE advertiesment_details_id=$advertiesment_details_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting Advertiesment
    */

    /* START: Functions for updating Advertiesment
    */  
    public function updateAdvertiesment($data)
    {           
        $advertiesment_details_id = $data['advertiesment_details_id'];
        $advertiesment_name = $data['advertiesment_name'];
        $advertiesment_height = $data['advertiesment_height'];
        $advertiesment_width = $data['advertiesment_width'];
        $advertiesment_amount = $data['advertiesment_amount'];
        $category_type        = $data['category_type'];        

        $table_name     = DB_ADVERTIESMENT_DETAILS;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "advertiesment_name='$advertiesment_name',advertiesment_height='$advertiesment_height',advertiesment_width='$advertiesment_width',advertiesment_amount='$advertiesment_amount',category_type='$category_type' ";
        $where          = "WHERE advertiesment_details_id=$advertiesment_details_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for updating Advertiesment
    */

    /* START: Functions for adding Advertiesment
    */
    public function addAdvertiesment($data)
    {   
        $users_id = $data['users_id'];        
        $advertiesment_name = $data['advertiesment_name'];
        $advertiesment_height = $data['advertiesment_height'];
        $advertiesment_width = $data['advertiesment_width'];
        $advertiesment_amount = $data['advertiesment_amount'];
        $category_type        = $data['category_type'];


        $table_name     = DB_ADVERTIESMENT_DETAILS;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(users_id,advertiesment_name,advertiesment_height,advertiesment_width,advertiesment_amount,category_type) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$users_id','$advertiesment_name','$advertiesment_height','$advertiesment_width','$advertiesment_amount','$category_type')";
        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_advertiesment_details_id = $this->db->insert_id(); //get last inserted id

        return $new_advertiesment_details_id;
    }
    /* END: Functions for adding Advertiesment
    */
}
?>