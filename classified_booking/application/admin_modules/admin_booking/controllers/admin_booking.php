<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_booking extends BackendController
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
        $this->load->model('Admin_booking_model');
        $this->session->keep_flashdata('message');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function index()
    {
        fn_is_logged_in_admin();

        $message = $this->session->flashdata('message');
        if (isset($message))
        {
           $this->session->unset_userdata('message');    
        }

        $result = $this->Admin_booking_model->getAllbooking();

        $view = "index";
        $data = array(
                    "page_title" => "Booking",
                    "page_name"  => "admin_booking_listing",
                    "all_booking"  => $result
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting Booking
    */  
    public function deleteBooking(){

        fn_is_logged_in_admin();
        
        $booking_id = $this->input->post('booking_id');

        if ( isset($booking_id) && ($booking_id != "") )
        {
                 
                $data = array(
                'booking_id' => $booking_id,                
                );
                $res = $this->Admin_booking_model->deleteBooking($data);

                if($res)
                {

                    $ret_arr = array(
                       'booking_id' => $booking_id,
                       'message'  => 'Booking deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'Booking deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No Booking deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No Booking deleted',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                }           
        }
        else
        {
                $ret_arr = array(                   
                   'message'  => 'All fields are required'     
                );
                $sess_data = array(
                            'success' => false,
                            'message' => 'All fields are required',
                         );
                $this->session->set_flashdata($sess_data);                
                echo json_encode($ret_arr);
        }
    }

    /* END: Functions for Deleting Booking
    */

  

}
?>