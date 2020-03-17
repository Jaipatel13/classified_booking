<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_city extends BackendController
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
        $this->load->model('Admin_city_model');
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
        
        //$all_cities = $this->Admin_city_model->getAllCities();

        /*START: Code for loading datatable with default data
        */
        $searchQuery = " ";
        $columnName = "country_name";
        $columnSortOrder = "asc";
        $row = 0;
        $rowperpage = 10;
        $empRecords = $this->Admin_city_model->getAllCitiesSearched($searchQuery,$columnName,$columnSortOrder,$row,$rowperpage);            
        $city_ids_arr = array();
        $country_ids_arr = array();
        $state_ids_arr = array();
        $city_names_arr = array();

        if(isset($empRecords) && !empty($empRecords))
        {
            foreach ($empRecords as $key => $aco) {

              $city_ids_arr[] = array(                  
                  "city_id"=>$aco['city_id']
              );
              $country_ids_arr[] = array(                  
                  "country_id"=>$aco['country_id']
              );
              $state_ids_arr[] = array(                  
                  "state_id"=>$aco['state_id']
              );
              $city_names_arr[] = array(                  
                  "city_name"=>$aco['city_name']
              );              
            }
        }
        $this->session->set_userdata('city_id_arr', $city_ids_arr);
        $this->session->set_userdata('country_id_arr', $country_ids_arr);
        $this->session->set_userdata('state_id_arr', $state_ids_arr);
        $this->session->set_userdata('city_name_arr', $city_names_arr);
        /*END: Code for loading datatable with default data
        */

        $view = "index";
        $data = array(
                    "page_title" => "City",
                    "page_name"  => "admin_cities_listing",                    
                    //"all_cities"  => $all_cities,
                );
        $this->render_page($view, $data);
    }


    /* START: Functions for Deleting City
    */  
    public function deleteCity(){

        fn_is_logged_in_admin();
        
        $city_id = $this->input->post('city_id');

        if ( isset($city_id) && ($city_id != "") )
        {                 
                $data = array(
                'city_id' => $city_id,                
                );
                $res = $this->Admin_city_model->deleteCity($data);

                if($res)
                {
                    $ret_arr = array(
                       'city_id' => $city_id,
                       'message'  => 'City deleted Successfully'
                    );
                    $sess_data = array(
                                'success' => true,
                                'message' => 'City deleted Successfully',
                             );
                    $this->session->set_flashdata($sess_data);                
                    echo json_encode($ret_arr);
                } 
                else
                {
                    $ret_arr = array(                   
                        'message'  => 'No City deleted'
                    );
                    $sess_data = array(
                                'success' => false,
                                'message' => 'No City deleted',
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

    /* END: Functions for Deleting City
    */

    /* START: Functions for Updating City
    */  
    public function updateCity(){

        fn_is_logged_in_admin();
        
        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $city_id = $this->input->post('city_id');
        $city_name = $this->input->post('city_name');

        if ( isset($state_id) && ($state_id != "")
             && isset($country_id) && ($country_id != "")
             && isset($city_id) && ($city_id != "")
             && isset($city_name) && ($city_name != "")
           )
        {
            $data = array(
                'state_id'   => $state_id,
                'country_id' => $country_id,
                'city_id' => $city_id,
                'city_name' => $city_name,
            );
            $res = $this->Admin_city_model->updateCity($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'City updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'City updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No City updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No City updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;
        }
    }
    /* END: Functions for Updating City
    */

    /* START: Functions for Updating City Name Only
    */  
    public function updateCityNameOnly(){

        fn_is_logged_in_admin();

        $city_id = $this->input->post('city_id');
        $city_name = $this->input->post('city_name');

        if ( isset($city_id) && ($city_id != "")
             && isset($city_name) && ($city_name != "")
           )
        {
            $data = array(                
                'city_id' => $city_id,
                'city_name' => $city_name,
            );
            $res = $this->Admin_city_model->updateCityNameOnly($data);

            if($res)
            {   
                $sess_data = array(
                            'success' => true,
                            'message' => 'City updated Successfully',
                         );
                $this->session->set_flashdata($sess_data);
                $result = 'City updated Successfully';
                echo $result;
            }
            else
            {
                $sess_data = array(
                            'success' => false,
                            'message' => 'No City updated',
                         );
                $this->session->set_flashdata($sess_data);                
                $result = 'No City updated';
                echo $result;
            }
        }
        else
        {
                $result = 'All fields are required';
                echo $result;
        }
    }
    /* END: Functions for Updating City Name Only
    */  

    /* START: Functions for Displaying Add City Form
    */
    public function addCityForm()
    {
        fn_is_logged_in_admin();  

        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $city_id = $this->input->post('city_id');
        $city_name = $this->input->post('city_name');

        $all_countries = $this->Admin_city_model->getAllCountries();        

        $view = "add_city";
        $data = array(
                    "page_title" => "Add City",
                    "page_name"  => "admin_add_city",
                    "all_countries"  => $all_countries,                    
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Add City Form
    */

    /* START: Functions for Displaying Update City Form
    */
    public function editCityFormLoad()
    {
        fn_is_logged_in_admin();

        /*$state_id = 1464;
        $country_id = 3;
        $city_id = 129772;
        $city_name = 'Ahmedabad 123';*/

        $state_id = $this->input->post('state_id');
        $country_id = $this->input->post('country_id');
        $city_id = $this->input->post('city_id');
        $city_name = $this->input->post('city_name');

        $sess_data = array(
                        'current_city_id_admin' => $city_id,
                        'current_city_name_admin' => $city_name,
                        'current_country_id_admin' => $country_id,
                        'current_state_id_admin' => $state_id,
                     );

        $this->session->set_userdata($sess_data);        
    }
    /* END: Functions for Displaying Update City Form
    */

    /* START: Functions for Displaying Update City Form
    */
    public function editCityForm()
    {
        fn_is_logged_in_admin();
        
        $city_id = $this->session->userdata('current_city_id_admin');

        $city_det = $this->Admin_city_model->getCityByID($city_id);
        $sel_state_id = $city_det['state_id'];
        $sel_country_id = $city_det['country_id'];
        $sel_city_id = $city_det['city_id'];
        $sel_city_name = $city_det['city_name'];

        $all_countries = $this->Admin_city_model->getAllCountries();
        $all_states = $this->Admin_city_model->getStatesByCountry($sel_country_id);

        $view = "edit_city";
        $data = array(
                    "page_title" => "Edit City",
                    "page_name"  => "admin_edit_city",
                    "all_countries"  => $all_countries,
                    "all_states"  => $all_states,
                    "state_id"  => $sel_state_id,
                    "country_id"  => $sel_country_id,
                    "city_id"  => $city_id,
                    "city_name"  => $sel_city_name,
                );
        $this->render_page($view, $data);
    }
    /* END: Functions for Displaying Update City Form
    */

    /* START: Functions for getting States By Country
    */
    public function getStatesByCountry()
    {
        fn_is_logged_in_admin();

        $country_id = $this->input->post('country_id');
        $result = $this->Admin_city_model->getStatesByCountry($country_id);
        //echo fn_print_array($result);

        $html = '<option value="">Select State*</option>';
        if($result){
                foreach($result as $key => $value)
                {
        $html .= '<option value="'.$value['state_id'].'">'.$value['state_name'].'</option>';
                }
        }        
        echo $html;
    }
    /* END: Functions for getting States By Country
    */

    /* START: Functions for Adding City
    */
    public function addCity()
    {
        fn_is_logged_in_admin();

        $country_id = $this->input->post('country_id');
        $state_id = $this->input->post('state_id');
        $city_name = $this->input->post('city_name');
            
            if ( isset($country_id) && ($country_id != "")
                 && isset($state_id) && ($state_id != "")   
                 && isset($city_name) && ($city_name != "")
            )
            {
                    $data = Array(                       
                       'country_id' => $country_id, 
                       'state_id' => $state_id, 
                       'city_name' => $city_name,
                    );
                    $new_city_id = $this->Admin_city_model->addCity($data);

                    if (isset($new_city_id))
                    {   
                        $result = 'City added Successfully';
                        echo $result;                        
                    }
                    else
                    {       
                        $result = 'No City added';
                        echo $result;                            
                    }                
            }
            else
            {
                    $result = 'All fields are required';
                    echo $result;                    
            }
        
    }
    /* END: Functions for Adding City
    */

    /* START: Functions for Getting and Displaying Cities in datatable
    */
    public function datatableCities()
    {
        fn_is_logged_in_admin();

        ## Read value
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value

        ## Search 
        $tbl_country = DB_COUNTRY;
        $tbl_state = DB_STATE;
        $tbl_city = DB_CITY;
        $searchQuery = " ";
        if($searchValue != ''){
           $searchQuery = " and ($tbl_city.city_name like '%".$searchValue."%' or 
                $tbl_country.country_name like '%".$searchValue."%' or 
                $tbl_state.state_name like'%".$searchValue."%' ) ";
        }

        ## Total number of records without filtering
        /*$sel = mysqli_query($con,"select count(*) as allcount from city");
        $records = mysqli_fetch_assoc($sel);*/
        $records = $this->Admin_city_model->getAllCitiesCount();
        $totalRecords = $records['allcount'];

        ## Total number of record with filtering
        /*$sel = mysqli_query($con,"select count(*) as allcount from city WHERE 1 ".$searchQuery);
        $records = mysqli_fetch_assoc($sel);*/
        $records = $this->Admin_city_model->getAllCitiesCountSearched($searchQuery);
        $totalRecordwithFilter = $records['allcount'];

        ## Fetch records
        /*$empQuery = "select * from city WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage; die;
        $empRecords = mysqli_query($con, $empQuery);*/
        $empRecords = $this->Admin_city_model->getAllCitiesSearched($searchQuery,$columnName,$columnSortOrder,$row,$rowperpage);
        $data = array();        
        $city_ids_arr = array();
        $country_ids_arr = array();
        $state_ids_arr = array();
        $city_names_arr = array();

        if(isset($empRecords) && !empty($empRecords))
        {
            foreach ($empRecords as $key => $aco) {

              $city_ids_arr[] = array(                  
                  "city_id"=>$aco['city_id']
              );
              $country_ids_arr[] = array(                  
                  "country_id"=>$aco['country_id']
              );
              $state_ids_arr[] = array(                  
                  "state_id"=>$aco['state_id']
              );
              $city_names_arr[] = array(                  
                  "city_name"=>$aco['city_name']
              );

              $data[] = array(
                  "country_name"=>$aco['country_name'],
                  "state_name"=>$aco['state_name'],
                  "city_name"=>$aco['city_name'],                  
              );
            }
        }
        
        $this->session->set_userdata('city_id_arr', $city_ids_arr);
        $this->session->set_userdata('country_id_arr', $country_ids_arr);
        $this->session->set_userdata('state_id_arr', $state_ids_arr);
        $this->session->set_userdata('city_name_arr', $city_names_arr);

        /*while ($row = mysqli_fetch_assoc($empRecords)) {
           $data[] = array( 
              "city_name"=>$row['city_name'],
              "city_code"=>$row['city_code'],
              "state_code"=>$row['state_code'],
              "country_code"=>$row['country_code'],
              "sort_order"=>$row['sort_order'],
              //"action"=>'Hi'
           );
        }*/

        ## Response
        $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecordwithFilter,
          "iTotalDisplayRecords" => $totalRecords,
          "aaData" => $data
        );

        echo json_encode($response);
    }
    /* END: Functions for Getting and Displaying Cities in datatable
    */
}
?>