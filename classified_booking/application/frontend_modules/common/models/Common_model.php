<?php defined('BASEPATH') or exit('No direct script access allowed');

class Common_model extends CI_Model
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


    /*  START: Function for getting All Records with selected
               result type e.g. ARRAY, OBJECT, ROW etc.
    */    
    public function queryResultWithType($result, $res_type="")
    {
        if(isset($res_type) && ($res_type=='OBJECT'))
        {
            $res = $result->result();
        }
        if(isset($res_type) && ($res_type=='ARRAY'))
        {
            $res = $result->result_array();
        }
        else if(isset($res_type) && ($res_type=='ROW_OBJECT'))
        {
            $res = $result->row();
        }
        else if(isset($res_type) && ($res_type=='FIRST_ROW_OBJECT'))
        {
            $res = $result->first_row();
        }
        else if(isset($res_type) && ($res_type=='SECOND_ROW_OBJECT'))
        {
            $res = $result->second_row();
        }
        else if(isset($res_type) && ($res_type=='NEXT_ROW_OBJECT'))
        {
            $res = $result->next_row();
        }
        else if(isset($res_type) && ($res_type=='PREVIOUS_ROW_OBJECT'))
        {
            $res = $result->previous_row();
        }
        else if(isset($res_type) && ($res_type=='ROW_ARRAY'))
        {
            $res = $result->row_array();
        }
        else if(isset($res_type) && ($res_type=='FIRST_ROW_ARRAY'))
        {
            $res = $result->first_row('array');
        }
        else if(isset($res_type) && ($res_type=='SECOND_ROW_ARRAY'))
        {
            $res = $result->second_row('array');
        }
        else if(isset($res_type) && ($res_type=='NEXT_ROW_ARRAY'))
        {
            $res = $result->next_row('array');
        }
        else if(isset($res_type) && ($res_type=='PREVIOUS_ROW_ARRAY'))
        {
            $res = $result->previous_row('array');
        }
        else if(isset($res_type) && ($res_type=='UNBUFFERED_ROW_OBJECT'))
        {
            $res = $result->unbuffered_row(); // FOR LARGE DATASETS
            //$res = $query->unbuffered_row('object');
        }
        else if(isset($res_type) && ($res_type=='UNBUFFERED_ROW_ARRAY'))
        {
            $res = $result->unbuffered_row('array'); // FOR LARGE DATASETS                
        }
        else
        {
            $res = $result->result_array(); //Default Result Type ARRAY
        }

        return $res;
    }    
    /*  END: Function for getting All Records with selected
               result type e.g. ARRAY, OBJECT, ROW etc.
    */

    /*  START: Function for getting All Records with selected
               result type e.g. ARRAY, OBJECT, ROW etc.
    */    
    public function selectAll($table, $res_type="")
    {   
        $select = "SELECT * FROM $table "; 
        $where  = "WHERE ".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
        
        $query = $select.$where;
        $res = $this->db->query($query);
        $result = $this->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

        return $result;
    }    
    /*  END: Function for getting All Records with selected
               result type e.g. ARRAY, OBJECT, ROW etc.
    */
}
?>