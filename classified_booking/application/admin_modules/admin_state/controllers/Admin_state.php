<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_state extends BackendController
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
        $this->load->model('Admin_state_model');
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

        $all_countries = $this->Admin_state_model->getAllCountries();
        $all_states = $this->Admin_state_model->getAllStates();

        $view = "index";
        $data = array(
                    "page_title" => "State",
                    "page_name"  => "admin_states_listing",
                    "all_countries"  => $all_countries,
                    "all_states"  => $all_states,
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting State
    */  
    public function deleteState(){

        fn_is_logged_in_admin();
        
        $state_id = $this->input->post('state_id');

        if ( isset($state_id) && ($state_id != "") )
        {                 
                $data = array(
                'state_id' => $state_id,                
                );
                $res = $this->Admin_state_model->deleteState($data);

                if($res)
                {
                    $ret_arr = array(
                       'state_id' => $state_id,
                       'message'  => 'State deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'State deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No State deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No State deleted',
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

    /* END: Functions for Deleting State
    */

    /* START: Functions for Updating State
    */  
    public function updateState(){

        fn_is_logged_in_admin();
        
        $state_id = $this->input->post('state_id');        
        $state_name = $this->input->post('state_name');

        if ( isset($state_id) && ($state_id != "")             
             && isset($state_name) && ($state_name != "")             
           )
        {
            $data = array(
                'state_id'   => $state_id,
                'state_name' => $state_name,
            );        
            $res = $this->Admin_state_model->updateState($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'State updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'State updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No State updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No State updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;                    
        }
    }

    /* END: Functions for Updating State
    */ 

    /* START: Functions for Displaying Add State Form
    */
    public function addStateForm()
    {
        fn_is_logged_in_admin();        

        $all_countries = $this->Admin_state_model->getAllCountries();

        $view = "add_state";
        $data = array(
                    "page_title" => "Add State",
                    "page_name"  => "admin_add_state",
                    "all_countries"  => $all_countries,
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Add State Form
    */

    /* START: Functions for Adding State
    */
    public function addState()
    {
        $country_id = $this->input->post('country_id');
        $state_name = $this->input->post('state_name');
            
            if ( isset($country_id) && ($country_id != "")
                 && isset($state_name) && ($state_name != "")
            )
            {
                    $data = Array(                       
                       'country_id' => $country_id, 
                       'state_name' => $state_name,
                    );
                    $new_state_id = $this->Admin_state_model->addState($data);

                    if (isset($new_state_id))
                    {   
                        $result = 'State added Successfully';
                        echo $result;                        
                    }
                    else
                    {       
                        $result = 'No State added';
                        echo $result;                            
                    }                
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Adding State
    */

    /* START: Functions for Selecting Country from Listing
    */
    public function selectCountry()
    {
        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $country_name = $this->input->post('country_name');
            
            if ( isset($country_id) && ($country_id != "") )
            {
                    $all_countries = $this->Admin_state_model->getAllCountries();                    

                    if(isset($all_countries) && !empty($all_countries))
                    {                        
                        $ret_content_str ="";
                    
                        $ret_content_str .='<select id="select-country-dd-'.$country_id.'" data-state-id="'.$state_id.'" class="custom-select cls_select_country_dd">';                                          
                        foreach ($all_countries as $key => $aco) {
                            $country_id_sel = $aco['country_id'];                            
                            $country_name_sel = $aco['country_name'];

                            $select_str = "";
                            if($country_id_sel == $country_id)
                            {
                                $select_str = "selected";
                            }
                            else
                            {
                                $select_str = "";
                            }
                       
                        $ret_content_str .='<option data-state-id="'.$state_id.'" data-country-name="'.$country_name_sel.'" value="'.$country_id_sel.'" '.$select_str.'>'.$country_name_sel.'</option>';
                        }
                    
                        $ret_content_str .='</select>';

                        $ret_arr = array(
                        'message'  => 'Please update Country',
                        'ret_content' => $ret_content_str,
                        );
                        echo json_encode($ret_arr);
                    }
                    else
                    {
                        $ret_arr = array(                   
                        'message'  => 'No Country found'
                        );                                   
                        echo json_encode($ret_arr);
                    }                
            }
            else
            {
                    $ret_arr = array(
                    'message'  => 'All fields are required'
                    );                                   
                    echo json_encode($ret_arr);
            }
        
    }
    /* END: Functions for Selecting Country from Listing
    */

    /* START: Functions for Updating Country
    */  
    public function updateCountry(){

        fn_is_logged_in_admin();
        
        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $country_name = $this->input->post('country_name');        

        if ( isset($state_id) && ($state_id != "")
             && isset($country_id) && ($country_id != "")                         
           )
        {
            $data = array(
                'state_id'   => $state_id,
                'country_id' => $country_id,                
            );        
            $res = $this->Admin_state_model->updateCountry($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'Country updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);                

                $ret_arr = array(
                'message'  => 'Country updated Successfully',
                'country_name' => $country_name,
                );
                echo json_encode($ret_arr);
                
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No Country updated',
                         );
                $this->session->set_flashdata($sess_data);                
                
                $ret_arr = array(
                    'message'  => 'No Country updated',                
                );
                echo json_encode($ret_arr);
            }
        }
        else
        {
                $ret_arr = array(
                    'message'  => 'All fields are required',                
                );
                echo json_encode($ret_arr);                                  
        }
    }

    /* END: Functions for Updating Country
    */


}
?>