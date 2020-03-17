<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_country extends BackendController
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
        $this->load->model('Admin_country_model');
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

        $result = $this->Admin_country_model->getAllCountries();

        $view = "index";
        $data = array(
                    "page_title" => "Country",
                    "page_name"  => "admin_countries_listing",
                    "all_countries"  => $result
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting Country
    */  
    public function deleteCountry(){

        fn_is_logged_in_admin();
        
        $country_id = $this->input->post('country_id');

        if ( isset($country_id) && ($country_id != "") )
        {
                 
                $data = array(
                'country_id' => $country_id,                
                );
                $res = $this->Admin_country_model->deleteCountry($data);

                if($res)
                {

                    $ret_arr = array(
                       'country_id' => $country_id,
                       'message'  => 'Country deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'Country deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No Country deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No Country deleted',
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

    /* END: Functions for Deleting Country
    */

    /* START: Functions for Updating Country
    */  
    public function updateCountry(){

        fn_is_logged_in_admin();
        
        $country_id = $this->input->post('country_id');
        $country_name = $this->input->post('country_name');        

        if ( isset($country_id) && ($country_id != "")
             && isset($country_name) && ($country_name != "")             
           )
        {
            $data = array(
                'country_id' => $country_id,
                'country_name' => $country_name,
            );        
            $res = $this->Admin_country_model->updateCountry($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'Country updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'Country updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No Country updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No Country updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;                    
        }
    }

    /* END: Functions for Updating Country
    */ 

    /* START: Functions for Displaying Add Country Form
    */
    public function addCountryForm()
    {
        fn_is_logged_in_admin();        

        $view = "add_country";
        $data = array(
                    "page_title" => "Add Country",
                    "page_name"  => "admin_add_country",
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Add Country Form
    */

    /* START: Functions for Adding Country
    */
    public function addCountry()
    {
        $country_name = $this->input->post('country_name');
            
            if ( isset($country_name) && ($country_name != "") )
            {
                    $data = Array(                       
                       'country_name' => $country_name,
                    );
                    $new_country_id = $this->Admin_country_model->addCountry($data);

                    if (isset($new_country_id))
                    {   
                        $result = 'Country added Successfully';
                        echo $result;                        
                    }
                    else
                    {       
                        $result = 'No Country added';
                        echo $result;                            
                    }                
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Adding Country
    */


}
?>