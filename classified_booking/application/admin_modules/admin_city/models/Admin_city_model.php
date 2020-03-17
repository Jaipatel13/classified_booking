<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_city_model extends CI_Model
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

    /* START: Function for getting all cities
    */    
    public function getAllCities()
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $select = "SELECT $tbl_city.city_id,$tbl_city.city_name,$tbl_city.state_id,$tbl_state.state_name,$tbl_city.country_id,$tbl_country.country_name FROM $tbl_city ";
        $join   = "JOIN $tbl_country ON $tbl_city.country_id=$tbl_country.country_id ";
        $join1  = "JOIN $tbl_state ON $tbl_city.state_id=$tbl_state.state_id ";
        $where  = "WHERE $tbl_city.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $tbl_city.city_id ".DB_RECORD_ORDER_BY_DESC;

        $query = $select.$join.$join1.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all cities
    */

    /* START: Function for getting all cities count
    */    
    public function getAllCitiesCount()
    {   
        $tbl_city = DB_CITY;
        $select = "SELECT count(*) as allcount FROM $tbl_city ";
        $where  = "WHERE ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res,QRT_ROW_ARRAY); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all cities count
    */

    /* START: Function for getting all cities with search filters
    */    
    public function getAllCitiesCountSearched($searchQuery)
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $select = "SELECT count(*) as allcount FROM $tbl_city ";
        $join   = "JOIN $tbl_country ON $tbl_city.country_id=$tbl_country.country_id ";
        $join1  = "JOIN $tbl_state ON $tbl_city.state_id=$tbl_state.state_id ";
        $where  = "WHERE 1 $searchQuery AND $tbl_city.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;

        $query = $select.$join.$join1.$where;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res,QRT_ROW_ARRAY); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all cities with search filters
    */
    /* START: Function for getting all cities with pagination
    */    
    public function getAllCitiesSearched($searchQuery,$columnName,$columnSortOrder,$row,$rowperpage)
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $select = "SELECT $tbl_city.city_id,$tbl_city.city_name,$tbl_city.state_id,$tbl_state.state_name,$tbl_city.country_id,$tbl_country.country_name FROM $tbl_city ";
        $join   = "JOIN $tbl_country ON $tbl_city.country_id=$tbl_country.country_id ";
        $join1  = "JOIN $tbl_state ON $tbl_city.state_id=$tbl_state.state_id ";
        $where  = "WHERE 1 $searchQuery AND $tbl_city.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " order by $columnName $columnSortOrder ";
        $limit = "limit $row,$rowperpage";

        $query = $select.$join.$join1.$where.$order_by.$limit;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all cities with pagination
    */

    /* START: Function for getting all states
    */    
    public function getStatesByCountry($country_id)
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $select = "SELECT $tbl_state.state_id,$tbl_state.state_name FROM $tbl_state ";
        $join   = "JOIN $tbl_country ON $tbl_state.country_id=$tbl_country.country_id ";
        $where  = "WHERE $tbl_state.country_id=$country_id AND $tbl_state.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $tbl_state.state_id ".DB_RECORD_ORDER_BY_DESC;

        $query = $select.$join.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all states
    */

    /* START: Function for getting all cities
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
        $order_by = " ".DB_RECORD_ORDER_BY_TEXT." $tbl_city.city_id ".DB_RECORD_ORDER_BY_DESC;

        $query = $select.$join.$join1.$where.$order_by;
        $res = $this->db->query($query);
        $result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /* END: Function for getting all cities
    */

    /* START: Function for getting city by id
    */    
    public function getCityByID($city_id)
    {   
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $select = "SELECT $tbl_city.city_id,$tbl_city.city_name,$tbl_city.country_id,$tbl_city.state_id FROM $tbl_city ";
        $join   = "JOIN $tbl_country ON $tbl_city.country_id=$tbl_country.country_id ";
        $join1  = "JOIN $tbl_state ON $tbl_city.state_id=$tbl_state.state_id ";
        $where  = "WHERE $tbl_city.city_id=$city_id AND $tbl_city.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;

        $query = $select.$join.$join1.$where;
        $query = $this->db->query($query);
        /*$result = $this->common->queryResultWithType($res); //DEFAULT RETURN TYPE = ARRAY*/
        $result = $query->row_array();

        return $result;
    }    
    /* END: Function for getting all cities
    */

    /* START: Functions for deleting City
    */  
    public function deleteCity($data)
    {           
        $city_id = $data['city_id'];

        $table_name     = DB_CITY;
        $del            = "DELETE FROM $table_name ";        
        $where          = "WHERE city_id=$city_id";

        $query_str = $del.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for deleting City
    */

    /* START: Functions for updating City
    */  
    public function updateCity($data)
    {   
        $state_id = $data['state_id'];
        $country_id = $data['country_id'];
        $city_id = $data['city_id'];
        $city_name = $data['city_name'];

        $table_name     = DB_CITY;
        $upd            = "UPDATE $table_name SET ";
        $upd_fields     = "city_name='$city_name', country_id='$country_id', state_id='$state_id' ";
        $where          = "WHERE city_id=$city_id";

        $query_str = $upd.$upd_fields.$where;
                            
        $query = $this->db->query($query_str);

        return $query;
    }
    /* END: Functions for updating City
    */

    /* START: Functions for adding City
    */
    public function addCity($data)
    {           
        $state_id = $data['state_id'];    
        $country_id = $data['country_id'];
        $city_name = $data['city_name'];

        $table_name     = DB_CITY;
        $ins            = "INSERT INTO $table_name ";
        $ins_fields     = "(city_name, country_id, state_id) ";
        $ins_values_str = "VALUES ";
        $ins_values     = "('$city_name', '$country_id', '$state_id')";

        $query_str = $ins.$ins_fields.$ins_values_str.$ins_values;
                            
        $query = $this->db->query($query_str);
        $new_city_id = $this->db->insert_id(); //get last inserted id

        return $new_city_id;
    }
    /* END: Functions for adding City
    */
}
?>