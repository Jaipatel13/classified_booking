<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_advertiesment extends BackendController
{
    /**
     * [__construct description]d
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $this->load->model('Admin_advertiesment_model');
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

        $result = $this->Admin_advertiesment_model->getAlladvertiesment();

        $view = "index";
        $data = array(
                    "page_title" => "advertiesment",
                    "page_name"  => "admin_advertiesment_listing",
                    "all_advertiesment"  => $result
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting advertiesment
    */  
    public function deleteAdvertiesment(){

        fn_is_logged_in_admin();
        
        $advertiesment_id = $this->input->post('advertiesment_id');

        if ( isset($advertiesment_id) && ($advertiesment_id != "") )
        {
                 
                $data = array(
                'advertiesment_id' => $advertiesment_id,                
                );
                $res = $this->Admin_advertiesment_model->deleteAdvertiesment($data);

                if($res)
                {

                    $ret_arr = array(
                       'advertiesment_id' => $advertiesment_id,
                       'message'  => 'Advertiesment deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'Advertiesment deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No Advertiesment deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No Advertiesment deleted',
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

    /* END: Functions for Deleting Advertiesment
    */

    /* START: Functions for Updating Advertiesment
    */  
    public function updateAdvertiesment(){

        fn_is_logged_in_admin();
        
        $advertiesment_details_id = $this->input->post('advertiesment_details_id');
        $advertiesment_name = $this->input->post('advertiesment_name');        
        $advertiesment_height = $this->input->post('advertiesment_height');
        $advertiesment_width = $this->input->post('advertiesment_width');
        $advertiesment_amount = $this->input->post('advertiesment_amount');
        $category_type = $this->input->post('category_type');
        $description = $this->input->post('description');
        
        if ( isset($advertiesment_details_id) && ($advertiesment_details_id != "")
             && isset($advertiesment_name) && ($advertiesment_name != "")             
             && (isset($advertiesment_height) && ($advertiesment_height != ""))
             && (isset($advertiesment_width) && ($advertiesment_width != ""))
             && (isset($advertiesment_amount) && ($advertiesment_amount != ""))
             && (isset($category_type) && ($category_type != ""))
             && (isset($description) && ($description != ""))             
           )
        {
            $data = array(
                'advertiesment_details_id' => $advertiesment_details_id,
                'advertiesment_name' => $advertiesment_name,
                'advertiesment_height' => $advertiesment_height,
                'advertiesment_width' => $advertiesment_width,
                'advertiesment_amount' => $advertiesment_amount,
                'category_type'       => $category_type,
                'description'       => $description,
            );

                
            $res = $this->Admin_advertiesment_model->updateAdvertiesment($data);

           if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'Advertiesment updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'Advertiesment updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No Advertiesment updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No advertiesment updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;                    
        }
    }

    /* END: Functions for Updating Advertiesment
    */ 

     /* START: Functions for Updating Advertiesment Name Only
    */  
    public function updateAdvertiesmentNameOnly(){

        fn_is_logged_in_admin();

        $advertiesment_details_id = $this->input->post('advertiesment_details_id');
        $Advertiesment_name = $this->input->post('Advertiesment_name');

        if ( isset($advertiesment_details_id) && ($advertiesment_details_id != "")
             && isset($Advertiesment_name) && ($Advertiesment_name != "")
           )
        {
            $data = array(                
                'advertiesment_details_id' => $advertiesment_details_id,
                'Advertiesment_name' => $Advertiesment_name,
            );
            $res = $this->Admin_Advertiesment_model->updateAdvertiesmentNameOnly($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'Advertiesment updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'Advertiesment updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No Advertiesment updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No Advertiesment updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;
        }
    }
    /* END: Functions for Updating Advertiesment Name Only
    */  


    /* START: Functions for Displaying Add Advertiesment Form
    */
    public function addAdvertiesmentForm()
    {
        fn_is_logged_in_admin();        

        $view = "add_advertiesment";
        $data = array(
                    "page_title" => "add Advertiesment",
                    "page_name"  => "admin_add_advertiesment",
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Add advertiesment Form
    */

      /* START: Functions for Displaying Update Advertiesment Form
    */
    public function editAdvertiesmentFormLoad()
    {
        fn_is_logged_in_admin();

        $advertiesment_details_id = $this->input->post('advertiesment_details_id');
        
        $sess_data = array(
                        'current_advertiesment_id_admin' => $advertiesment_details_id,
                     );

        $this->session->set_userdata($sess_data);        
    }
    /* END: Functions for Displaying Update Advertiesment Form
    */


    /* START: Functions for Adding advertiesment
    */
    public function addAdvertiesment()
    {
        $user_id = $this->session->userdata('logged_in_user_id_admin');

        $advertiesment_name = $this->input->post('advertiesment_name');
        $advertiesment_height = $this->input->post('advertiesment_height');
        $advertiesment_width = $this->input->post('advertiesment_width');
        $advertiesment_amount = $this->input->post('advertiesment_amount');
        $category_type = $this->input->post('category_type');
        $description = $this->input->post('description');

            
            if ( (isset($user_id) && ($user_id != ""))
                  && (isset($advertiesment_name) && ($advertiesment_name != ""))
                  && (isset($advertiesment_height) && ($advertiesment_height != ""))
                  && (isset($advertiesment_width) && ($advertiesment_width != ""))
                  && (isset($advertiesment_amount) && ($advertiesment_amount != ""))
                  && (isset($category_type) && ($category_type != ""))
                  && (isset($description) && ($description != ""))                
                )
            {
                    $data = Array(
                       'users_id' => $user_id,                       
                       'advertiesment_name' => $advertiesment_name,
                       'advertiesment_height' => $advertiesment_height,
                       'advertiesment_width' => $advertiesment_width,
                       'advertiesment_amount' => $advertiesment_amount,
                       'category_type'       => $category_type,
                       'description'       => $description,
                    );
                    $new_advertiesment_id = $this->Admin_advertiesment_model->addAdvertiesment($data);

                    if (isset($new_advertiesment_id))
                    {   
                        $result = 'Advertiesment added Successfully';
                        echo $result;                        
                    }
                    else
                    {       
                        $result = 'No Advertiesment added';
                        echo $result;                            
                    }                
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Adding advertiesment
    */
    
  
    /* START: Functions for Displaying Update Advertiesment Form
    */
    public function editAdvertiesmentForm()
    {
        fn_is_logged_in_admin();
        
        $advertiesment_details_id = $this->session->userdata('current_advertiesment_id_admin');

        $advertiesment_det = $this->Admin_advertiesment_model->getAdvertiesmentByID($advertiesment_details_id);

        $sel_advertiesment_details_id = $advertiesment_det['advertiesment_details_id'];
        $sel_advertiesment_name = $advertiesment_det['advertiesment_name'];
        $sel_advertiesment_height = $advertiesment_det['advertiesment_height'];
        $sel_advertiesment_width = $advertiesment_det['advertiesment_width'];
        $sel_advertiesment_amount = $advertiesment_det['advertiesment_amount'];
        $sel_description = $advertiesment_det['description'];
        $sel_category_type = $advertiesment_det['category_type'];

        $view = "edit_advertiesment";
        $data = array(
                    "page_title" => "Edit Advertiesment",
                    "page_name"  => "admin_edit_advertiesment",
                    "advertiesment_details_id"  => $sel_advertiesment_details_id,
                    "advertiesment_name"  => $sel_advertiesment_name,
                    "advertiesment_height"  => $sel_advertiesment_height,
                    "advertiesment_width"  => $sel_advertiesment_width,
                    "advertiesment_amount"  => $sel_advertiesment_amount,
                    "description"  => $sel_description,
                    "category_type"  => $sel_category_type,
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Update Advertiesment Form
    */

}
?>