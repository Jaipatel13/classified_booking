<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_state_model extends CI_Model
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
        //$tbl_country = DB_COUNTRY;        
        //$result = $this->common->selectAll($tbl_country); //DEFAULT RESULT TYPE = ARRAY

        $res_type = "";
        $table_name = DB_COUNTRY;                
        $select = "SELECT country_id, country_name FROM $table_name ";
        $where  = "WHERE ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $table_name.country_id ".DB_RECORD_ORDER_BY_DESC;
        
        $query = $select.$where.$order_by;
        $res = $this->db->query($query);

        $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all countries
    */

    /* START: Function for getting all states
    */    
    public function getAllStates()
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $select = "SELECT $tbl_state.state_id,$tbl_state.state_name,$tbl_state.country_id,$tbl_country.country_name FROM $tbl_state ";
        $join   = "JOIN $tbl_country ON $tbl_state.country_id=$tbl_country.country_id ";
        $where  = "WHERE $tbl_state.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $tbl_state.state_id ".DB_RECORD_ORDER_BY_DESC;

        $query = $select.$join.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all states
    */

    /* START: Functions for deleting State
    */  
    public function deleteState($data)
    {           
        $state_id = $data['state_id'];

        $table_name     = DB_STATE;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE state_id=$state_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting State
    */

    /* START: Functions for updating State
    */  
    public function updateState($data)
    {   
        $state_id = $data['state_id'];        
        $state_name = $data['state_name'];

        $table_name     = DB_STATE;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "state_name='$state_name' ";
        $where          = "WHERE state_id=$state_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for updating State
    */

    /* START: Functions for adding State
    */
    public function addState($data)
    {           
        $country_id = $data['country_id'];
        $state_name = $data['state_name'];

        $table_name     = DB_STATE;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(state_name, country_id) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$state_name', '$country_id')";

        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_state_id = $this->db->insert_id(); //get last inserted id

        return $new_state_id;
    }
    /* END: Functions for adding State
    */

    /* START: Functions for updating Country
    */  
    public function updateCountry($data)
    {   
        $state_id = $data['state_id'];
        $country_id = $data['country_id'];        

        $table_name     = DB_STATE;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "country_id='$country_id' ";
        $where          = "WHERE state_id=$state_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for updating Country
    */
}
?>