<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_country_model extends CI_Model
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
        //$ins = "INSERT INTO country (country_name,country_code) VALUES ('India','IN')";
        //$query = "SELECT * FROM country";
        //$query = $this->db->query($ins);
        //$res = $this->db->query($query);
        //echo $this->db->insert_id(); //get last inserted id
         //$result = $this->common->selectAll($tbl_country); //DEFAULT RESULT TYPE = ARRAY
        //$result = $this->common->queryResultWithType($res); //DEFAULT RESULT TYPE = ARRAY

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

    /* START: Functions for deleting Country
    */  
    public function deleteCountry($data)
    {           
        $country_id = $data['country_id'];

        $table_name     = DB_COUNTRY;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE country_id=$country_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting Country
    */

    /* START: Functions for updating Country
    */  
    public function updateCountry($data)
    {           
        $country_id = $data['country_id'];
        $country_name = $data['country_name'];        

        $table_name     = DB_COUNTRY;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "country_name='$country_name' ";
        $where          = "WHERE country_id=$country_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for updating Country
    */

    /* START: Functions for adding Country
    */
    public function addCountry($data)
    {           
        $country_name = $data['country_name'];

        $table_name     = DB_COUNTRY;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(country_name) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$country_name')";

        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_country_id = $this->db->insert_id(); //get last inserted id

        return $new_country_id;
    }
    /* END: Functions for adding Country
    */
}
?>