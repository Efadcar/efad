<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Members extends CI_Controller {

    public function __construct() {
		
        parent::__construct();
		// Load lang file for this page
		$this->global_model->initializeLang('home');
		// load site settings if not exist in session
		$site_settings = $this->session->userdata('site_settings');
	   if(empty($site_settings)){
			$this->global_model->config();
	   }
        $this->load->model('members_model');

		
		
    }

    public function login() {
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
		// set main content
        $data['main_content'] = 'home';
        //set page title
        $data['pageTitle'] = $this->lang->line('home');		
		
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');
		// set form validations
        $this->form_validation->set_rules('username', 'أسم المستخدم', 'required|min_length[1]');
        $this->form_validation->set_rules('password', 'كلمة المرور', 'required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->members_model->validate();
			redirect('home');
		}
    }
	
    public function register() {
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
		// set main content
        $data['main_content'] = 'home';
        //set page title
        $data['pageTitle'] = $this->lang->line('home');		
		
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');
		// set form validations
        $this->form_validation->set_rules('member_fname', 'الأسم الاول', 'required');
        $this->form_validation->set_rules('member_lname', 'الأسم الاخير', 'required');
        $this->form_validation->set_rules('member_password', 'كلمة المرور', 'required|min_length[8]');
        $this->form_validation->set_rules('member_password1', 'تأكيد كلمة المرور', 'required|matches[member_password]');
        $this->form_validation->set_rules('member_email', 'البريد الإلكترونى', 'required|is_unique[members.member_email]|valid_email');
        $this->form_validation->set_rules('country_uid', 'الدولة', 'required|min_length[1]');
        $this->form_validation->set_rules('member_mobile', 'رقم الجوال', 'required|numeric|min_length[1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->members_model->register();
			redirect('home');
		}
    }
	
	function logout(){
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


