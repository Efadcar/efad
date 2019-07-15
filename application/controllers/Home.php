<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {

    public function __construct() {
		
        parent::__construct();
		// Load lang file for this page
		$this->global_model->initializeLang('home');
		// load site settings if not exist in session
		$site_settings = $this->session->userdata('site_settings');
	   if(empty($site_settings)){
			$this->global_model->config();
	   }
    }

    public function index() {
		//print_r($_SESSION);exit;
		//$this->global_model->add_log(1);
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');

        $data['main_content'] = 'home';
        //set page title
        $data['pageTitle'] = $this->lang->line('home');		
		$this->load->view('includes/template', $data);
    }
	
	function destroy(){
		
		$this->session->sess_destroy();
		redirect();
	}
	
    function _javascript($view) {
        switch ($view) {
            case 'home':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.js'",
                    "'" . base_url() . "assets/rtl/js/filter/ion.rangeSlider.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                );
				
                break;
        }
        return $java;
    }
	

    function _cssFiles($view) {
        switch ($view) {
            case 'home': 
                $css = '';
                break;

        }
        return $css;
    }
}


