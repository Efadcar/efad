<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class controll the Albums views.
 */
class Albums extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('albums_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function albums_list() {
        $this->global_model->have_permission('albums_list');
        if (count($_POST) != 0) {
            $this->session->set_userdata('order_by', $this->input->post('order_by'));
            $this->session->set_userdata('order_type', $this->input->post('order_type'));
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('albums/albums_list');
        $config['total_rows'] = $this->db->get('albums')->num_rows();
        $config['per_page'] = $this->session->userdata('sitePerPagePagination');
        $config['num_links'] = 5;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = false;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: red">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
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
        $data['rows'] = $this->albums_model->getAll($config['per_page'], $this->uri->segment(3));
        $data['total_rows'] = $config['total_rows'];
        $data['main_content'] = 'albums/albums_list';
		$data['pageCssFiles'] = $this->_cssFiles('albums_add');
        $data['javascripts'] = $this->_javascript('albums_add');
		$data['pageTitle'] = "الألبومات";
		$data['breadcrumbs'] = array("الألبومات" => site_url('albums/albums_list'), "عرض جميع الألبومات" => site_url('albums/albums_list'));
        $this->load->view('includes/template', $data);
    }

    /**
     * This load add new category view if form_validation->run() == false 
	 * else it will insert the submitted data to albums table and redirect to albums list.
     *
     * @return void
     */
    function albums_add() {
        $this->global_model->have_permission('albums_add');

        $data['breadcrumbs'] = array("الألبومات" => site_url('albums/albums_list'), "إضافة ألبوم جديد" => site_url('albums/albums_add'));
        $data['javascripts'] = $this->_javascript('albums_add');
		$data['pageCssFiles'] = $this->_cssFiles('albums_add');
        $data['main_content'] = 'albums/albums_add';
        $data['pageTitle'] = "إضافة ألبوم جديد";

        $this->form_validation->set_rules('album_name_english', "أسم الألبوم", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->albums_model->add();
            redirect('albums/albums_list');
        }
    }
	
    /**
     * This load edit order view if form_validation->run() == false 
	 * else it will edit the submitted data to order row and redirect to albums list.
     *
     * @return void
     */
    function albums_edit($id) {
        $this->global_model->have_permission('albums_edit');

        $data['breadcrumbs'] = array("الألبومات" => site_url('albums/albums_list'), "تعديل ألبوم" => site_url('albums/albums_edit/'.$id));
        $data['javascripts'] = $this->_javascript('albums_add');
		$data['pageCssFiles'] = $this->_cssFiles('albums_add');
        $data['main_content'] = 'albums/albums_edit';
        $data['pageTitle'] = "تعديل ألبوم";
        $data['id'] = $id;
        $data['row'] = $this->albums_model->getByID($id);

        $this->form_validation->set_rules('album_name_english', "أسم الألبوم", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->albums_model->edit($id);
            redirect('albums/albums_list');
        }
    }

    /**
     * This method delete albums.
     *
     * @return void
     */
    function albums_del($code) {
        $this->global_model->have_permission('albums_del');
		$result = $this->global_model->delete_selected_items("albums", "album_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("Deleted succesfully", "success");
        } 
		else 
		{
            $this->messages->add("There was an error.", "error");
        }
        redirect("albums/albums_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'albums_add':
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
            case 'albums_add':
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
