<?php defined('BASEPATH') OR exit('No direct script access allowed');

 
class Faq extends CI_Controller {

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
		
        $data['rows'] = $this->global_model->getFaq();
		//print_r($data['row']);exit;

        $data['main_content'] = 'faq';
		
        $data['javascripts'] = $this->_javascript('faq');
        $data['pageCssFiles'] = $this->_cssFiles('faq');
        $data['javascriptCode'] = $this->_javascriptCode('faq');

		$data['pageTitle'] = "الأسئلة المتكررة";
		
		$this->load->view('includes/template', $data);
    }

    function _javascript($view) {
        switch ($view) {
            case 'faq':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                    "'" . base_url() . "assets/rtl/js/faq.js'",
                );
				
				
				

                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'faq': 
                $css = 				
					'';
                break;

        }
        return $css;
    }
	
    function _javascriptCode($view) {
        switch ($view) {
            case 'faq':
                $java = "
				<script>
					$(document).ready(function () {
						$(function () {
							$('.switchPanelButton').click(function (event) {
								event.preventDefault();
								var panel = $(this).attr('panelclass');
								$('.' + panel).hide();
								var panelid = $(this).attr('panelid');
								$('#' + panelid).show();
							});
						});
					});
				</script> 
				";
                break;
        
		}
        return $java;
    }
	
}


