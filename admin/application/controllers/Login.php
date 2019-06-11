<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->global_model->config_login();
        $this->load->model('login_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pageCssFiles'] = '';
        //Check if is loged in
        if (null !== $this->session->userdata('is_logged_in') && $this->session->userdata('is_logged_in') == true) {
            redirect('dashboard');
        }

        $data['main_content'] = 'login/login';
        //set page title
        $data['pageTitle'] = 'Login';
        //initialize the validation class
        $this->form_validation->set_rules('adminEmail', 'Email', 'required|strip_tags|valid_email');
        $this->form_validation->set_rules('adminPwd', 'Password', 'required|strip_tags');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template-login', $data);
        } else {
            $check = $this->login_model->validate();
            if ($check == false) {
                $this->load->view('includes/template-login', $data);
            }
			else
			{
				redirect('dashboard');
			}
        }
    }

    function logout() {
        session_destroy();
        redirect('login');
    }

}
