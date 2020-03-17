<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_newspaper_model extends CI_Model
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

    /* START: Functions for deleting newspaper
    */  
    public function deletenewspaper($data)
    {           
        $newspaper_id = $data['newspaper_id'];

        $table_name     = DB_NEWSPAPER;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE newspaper_id=$newspaper_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting newspaper
    */

    /* START: Functions for updating newspaper
    */  
    public function updatenewspaper($data)
    {           
        $newspaper_id = $data['newspaper_id'];
        $newspaper_name = $data['newspaper_name'];        

        $table_name     = DB_NEWSPAPER;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "newspaper_name='$newspaper_name' ";
        $where          = "WHERE newspaper_id=$newspaper_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for updating newspaper
    */

    /* START: Functions for adding newspaper
    */
    public function addnewspaper($data)
    {           
        $newspaper_name = $data['newspaper_name'];

        $table_name     = DB_NEWSPAPER;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(newspaper_name) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$newspaper_name')";

        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_newspaper_id = $this->db->insert_id(); //get last inserted id

        return $new_newspaper_id;
    }
    /* END: Functions for adding newspaper
    */
}
?>