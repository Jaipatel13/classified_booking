<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard_model extends CI_Model
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

    /* START: Function for Dashboard
    */

        /* START: Functions for Getting All Approved Orders
        */  
        public function get_all_approved_orders_count()
        {        
            $res_type = "ROW_ARRAY";

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_approved_orders FROM $order_details ";            
            $where  = "WHERE $order_details.order_status!='".COS_APPROVAL_PENDING."' AND $order_details.order_status!='".COS_DISAPPROVED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting All Approved Orders
        */

        /* START: Functions for Getting All Completed Orders
        */  
        public function get_all_completed_orders_count()
        {        
            $res_type = "ROW_ARRAY";

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_completed_orders FROM $order_details ";
            $where  = "WHERE $order_details.order_status='".COS_DELIVERED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting All Completed Orders
        */

        /* START: Functions for Getting All Pending Orders
        */  
        public function get_all_pending_orders_count()
        {        
            $res_type = "ROW_ARRAY";

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_pending_orders FROM $order_details ";
            $where  = "WHERE $order_details.order_status!='".COS_APPROVAL_PENDING."' AND $order_details.order_status!='".COS_DISAPPROVED."' AND $order_details.order_status!='".COS_DELIVERED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting All Pending Orders
        */

        /* START: Functions for Getting Today's New Orders
        */  
        public function get_todays_new_orders_count()
        {        
            $res_type = "ROW_ARRAY";

            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT COUNT(*) as total_todays_new_orders FROM $order_details ";
            $where  = "WHERE DATE(NOW())=DATE($order_details.order_date) AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting Today's New Orders
        */        

        /* START: Functions for Getting Total Payments
        */  
        public function get_total_payments()
        {        
            $res_type = "ROW_ARRAY";

            $order_payment_details = DB_ORDER_PAYMENT_DETAILS;

            $select = "SELECT SUM(payment_amount) as total_payments FROM $order_payment_details ";
            $where  = "WHERE $order_payment_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting Total Payments
        */

        /* START: Functions for Getting Total Pending Payments
        */  
        public function get_total_pending_payments()
        {        
            $res_type = "ROW_ARRAY";

            $order_payment_details = DB_ORDER_PAYMENT_DETAILS;
            $order_details = DB_ORDER_DETAILS;

            $select = "SELECT SUM($order_details.order_amount) as total_all_payments FROM $order_details WHERE $order_details.order_status!='".COS_APPROVAL_PENDING."' AND $order_details.order_status!='".COS_DISAPPROVED."' AND $order_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $select1 = "SELECT SUM($order_payment_details.payment_amount) as total_payments FROM $order_payment_details WHERE $order_payment_details.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $select2 = "SELECT ($select)-($select1) as total_pending_payments";
            
            $query = $select2;
            
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting Total Pending Payments
        */

        /* START: Functions for Getting Total Transporters
        */  
        public function get_all_transporters_count()
        {        
            $res_type = "ROW_ARRAY";

            $users = DB_USERS;

            $select = "SELECT COUNT(*) as total_transporters FROM $users ";
            $where  = "WHERE $users.".DB_RECORD_USER_TYPE_FIELD."='".USER_TYPE_TRANSPORTER."' AND $users.".DB_RECORD_ACTIVE_INACTIVE_FIELD."=".DB_RECORD_ACTIVE;
            $query = $select.$where;
            //$result = $query->row_array();
            $res = $this->db->query($query);
            $result = $this->common->queryResultWithType($res, $res_type); //DEFAULT RETURN TYPE = ARRAY

            return $result;
        }
        /* END: Functions for Getting Total Transporters
        */

        /* START: Functions for Getting All Pending Payments By Transporter
        */  
        /*public function get_pending_payments_by_transporter($data)
        {        
            $res_type = "ROW_ARRAY";
            
            $users_id = $data['users_id'];

            $data = array(
                    'users_id' => $users_id
            );

            // Get total earnings
            $res_tebt = $this->get_total_earnings_by_transporter($data);
            $total_earnings = 0;
            if( isset($res_tebt) && ($res_tebt != "") )
            {
                $total_earnings = $res_tebt['total_earnings'];
            }

            // Get total completed payments
            $res_tpbt = $this->get_completed_payments_by_transporter($data);
            $total_payments = 0;
            if( isset($res_tpbt) && ($res_tpbt != "") )
            {
                $total_payments = $res_tpbt['total_payments'];
            }

            // Get total pending payments
                $total_pending_payments = $total_earnings - $total_payments;

                $ret_data = array(
                        'total_pending_payments' => $total_pending_payments
                );

            return $ret_data;
        }*/
        /* END: Functions for Getting All Pending Payments By Transporter
        */

    /* END: Function for Dashboard
    */
}
?>