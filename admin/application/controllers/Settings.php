<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Company ASAIT <admin@asait.co>
 *
 * @author Developer Ebrahim Elsawy <eng.ebrahimelsawy@gmail.com> 
 *
 * @link http://asait.co/
 *
 * @copyright 2016-2018 ASAIT
 *
 * @license EULA
 *
 * @version 1.0.0
 */
 
/**
 * This class controll the Settings views.
 */
class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function settings_list() {
        //$this->global_model->have_permission('pages_list');
        if (count($_POST) != 0) {
            $this->session->set_userdata('order_by', $this->input->post('order_by'));
            $this->session->set_userdata('order_type', $this->input->post('order_type'));
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('settings/settings_list');
        $config['total_rows'] = $this->db->get('settings')->num_rows();
        $config['per_page'] = $this->session->userdata('sitePerPagePagination');
        $config['num_links'] = 5;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = false;
        $config['full_tag_open'] = '<ul class="pagination margin-none">';
        $config['full_tag_close'] = '</div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $this->pagination->initialize($config);
        //end pagination
        $data['rows'] = $this->settings_model->getAll($config['per_page'], $this->uri->segment(3));
        $data['total_rows'] = $config['total_rows'];
        $data['main_content'] = 'settings/settings_list';
		$data['pageCssFiles'] = $this->_cssFiles('settings_add');
        $data['javascripts'] = $this->_javascript('settings_add');
		$data['pageTitle'] = "Settings";
		$data['breadcrumbs'] = array("Settings" => site_url('settings/settings_list'), "List all settings" => site_url('settings/settings_list'));
        $this->load->view('includes/template', $data);
    }

    /**
     * This load add new category view if form_validation->run() == false 
	 * else it will insert the submitted data to settings table and redirect to settings list.
     *
     * @return void
     */
    function settings_add() {
        //$this->global_model->have_permission('pages_add');

        $data['breadcrumbs'] = array("Settings" => site_url('settings/settings_list'), "Add new setting" => site_url('settings/settings_add'));
        $data['javascripts'] = $this->_javascript('settings_add');
		$data['pageCssFiles'] = $this->_cssFiles('settings_add');
        $data['main_content'] = 'settings/settings_add';
        $data['pageTitle'] = "Add new setting";

        $this->form_validation->set_rules('site_name_english', "Service title", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->settings_model->add();
            redirect('settings/settings_list');
        }
    }
	
    /**
     * This load edit order view if form_validation->run() == false 
	 * else it will edit the submitted data to order row and redirect to settings list.
     *
     * @return void
     */
    function settings_edit($id) {
        //$this->global_model->have_permission('pages_edit');
        $data['row'] = $this->settings_model->getByID($id);
		$data['breadcrumbs'] = array("Categories" => site_url('settings/settings_list'), "Edit category" => site_url('settings/settings_edit/'.$id));
        $data['javascripts'] = $this->_javascript('settings_add');
		$data['pageCssFiles'] = $this->_cssFiles('settings_add');

        $data['main_content'] = 'settings/settings_edit';
        $data['pageTitle'] = "Edit category";

        $this->form_validation->set_rules('cat_name', "Category name", 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template', $data);
        } else {
            $this->settings_model->edit_action($id);
            redirect('settings/settings_list');
        }
    }

    /**
     * This method delete settings.
     *
     * @return void
     */
    function settings_del($code) {
        //$this->global_model->have_permission('settings_del');
		$result = $this->global_model->delete_selected_items("settings", "setting_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("Deleted succesfully", "success");
        } 
		else 
		{
            $this->messages->add("There was an error.", "error");
        }
        redirect("settings/settings_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'settings_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'settings_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}
