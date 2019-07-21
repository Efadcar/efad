<?php defined('BASEPATH') OR exit('No direct script access allowed');

 
class Contact extends CI_Controller {

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
		// get site direction return "rtl" or "ltr"
		$data['direction'] = $this->global_model->getSiteDirection();
		
        $data['row'] = $this->global_model->getPageByLink("contact-us");
		//print_r($data['row']);exit;

        $data['main_content'] = 'contact';
		
        $data['javascripts'] = $this->_javascript('book');
        $data['pageCssFiles'] = $this->_cssFiles('book');
        $data['javascriptCode'] = $this->_javascriptCode('book');

		$data['pageTitle'] = $data['row']->page_title;
        $data['keywords'] = $data['row']->page_meta_keywords;
        $data['description'] = $data['row']->page_meta_desc;
        $data['pic'] = base_url().PAGES_IMAGES.$data['row']->page_image;
		
		$this->load->view('includes/template', $data);
    }

    function _javascript($view) {
        switch ($view) {
            case 'book':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                );
				
				
				

                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'book': 
                $css = '';
                break;

        }
        return $css;
    }
	
    function _javascriptCode($view) {
        switch ($view) {
            case 'book':
                $java = "";
                break;
        
        
		}
        return $java;
    }
	
}


