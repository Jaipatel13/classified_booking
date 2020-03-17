<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_newspaper extends BackendController
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
        $this->load->model('Admin_newspaper_model');
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

        $result = $this->Admin_newspaper_model->getAllnewspaper();

        $view = "index";
        $data = array(
                    "page_title" => "Newspaper",
                    "page_name"  => "admin_newspaper_listing",
                    "all_newspaper"  => $result
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting newspaper
    */  
    public function deletenewspaper(){

        fn_is_logged_in_admin();
        
        $newspaper_id = $this->input->post('newspaper_id');

        if ( isset($newspaper_id) && ($newspaper_id != "") )
        {
                 
                $data = array(
                'newspaper_id' => $newspaper_id,                
                );
                $res = $this->Admin_newspaper_model->deletenewspaper($data);

                if($res)
                {

                    $ret_arr = array(
                       'newspaper_id' => $newspaper_id,
                       'message'  => 'Newspaper deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'Newspaper deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No Newspaper deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No Newspaper deleted',
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

    /* END: Functions for Deleting newspaper
    */

    /* START: Functions for Updating newspaper
    */  
    public function updatenewspaper(){

        fn_is_logged_in_admin();
        
        $newspaper_id = $this->input->post('newspaper_id');
        $newspaper_name = $this->input->post('newspaper_name');        

        if ( isset($newspaper_id) && ($newspaper_id != "")
             && isset($newspaper_name) && ($newspaper_name != "")             
           )
        {
            $data = array(
                'newspaper_id' => $newspaper_id,
                'newspaper_name' => $newspaper_name,
            );        
            $res = $this->Admin_newspaper_model->updatenewspaper($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'Newspaper updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'Newspaper updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No Newspaper updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No Newspaper updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;                    
        }
    }

    /* END: Functions for Updating newspaper
    */ 

    /* START: Functions for Displaying Add newspaper Form
    */
    public function addnewspaperForm()
    {
        fn_is_logged_in_admin();        

        $view = "add_newspaper";
        $data = array(
                    "page_title" => "Add newspaper",
                    "page_name"  => "admin_add_newspaper",
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Add newspaper Form
    */

    /* START: Functions for Adding newspaper
    */
    public function addnewspaper()
    {
        $newspaper_name = $this->input->post('newspaper_name');
            
            if ( isset($newspaper_name) && ($newspaper_name != "") )
            {
                    $data = Array(                       
                       'newspaper_name' => $newspaper_name,
                    );
                    $new_newspaper_id = $this->Admin_newspaper_model->addnewspaper($data);

                    if (isset($new_newspaper_id))
                    {   
                        $result = 'Newspaper added Successfully';
                        echo $result;                        
                    }
                    else
                    {       
                        $result = 'No Newspaper added';
                        echo $result;                            
                    }                
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Adding newspaper
    */


}
?>