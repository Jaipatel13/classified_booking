<?php defined('BASEPATH') or exit('No direct script access allowed');

class BackendController extends MY_Controller
{
    //
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layout, ....
     */
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();

        // CI profiler
        //$this->output->enable_profiler(true);

        // This function returns the main CodeIgniter object.
        // Normally, to call any of the available CodeIgniter object or pre defined library classes then you need to declare.
        $CI =& get_instance();

        //Example data
        // Site name
        //$this->data['sitename'] = 'CIProject';

        //Example data
        // Browser tab
        //$this->data['site_title'] = ucfirst('CIProject');
    }

    /**
     * [render_page description]
     *
     * @method render_page
     *
     * @param  [type]      $view [description]
     * @param  [type]      $data [description]
     *
     * @return [type]            [description]
     */
    protected function render_page($view, $data, $is_logged_in=true)
    {
        $this->data['data'] = $data;

        if($is_logged_in)
        {
        $this->load->view('admin_templates/after_login_header', $this->data);
        $this->load->view('admin_templates/after_login_sidebar', $this->data);        
        $this->load->view($view, $this->data);
        $this->load->view('admin_templates/after_login_footer', $this->data);
        }
        else
        {
        $this->load->view('admin_templates/before_login_header', $this->data);        
        $this->load->view($view, $this->data);
        $this->load->view('admin_templates/before_login_footer', $this->data);
        }
    }
}
