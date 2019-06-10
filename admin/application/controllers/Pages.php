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
 * This class controll the Pages views.
 */
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function pages_list() {
        //$this->global_model->have_permission('pages_list');
        if (count($_POST) != 0) {
            $this->session->set_userdata('order_by', $this->input->post('order_by'));
            $this->session->set_userdata('order_type', $this->input->post('order_type'));
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('pages/pages_list');
        $config['total_rows'] = $this->db->get('pages')->num_rows();
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
        $data['rows'] = $this->pages_model->getAll($config['per_page'], $this->uri->segment(3));
        $data['total_rows'] = $config['total_rows'];
        $data['main_content'] = 'pages/pages_list';
		$data['pageCssFiles'] = $this->_cssFiles('pages_add');
        $data['javascripts'] = $this->_javascript('pages_add');
		$data['pageTitle'] = "الصفحات الثابتة";
		$data['breadcrumbs'] = array("الصفحات الثابتة" => site_url('pages/pages_list'), "عرض كل الصفحات" => site_url('pages/pages_list'));
        $this->load->view('includes/template', $data);
    }

    /**
     * This load add new category view if form_validation->run() == false 
	 * else it will insert the submitted data to pages table and redirect to pages list.
     *
     * @return void
     */
    function pages_add() {
        //$this->global_model->have_permission('pages_add');

        $data['breadcrumbs'] = array("الصفحات الثابتة" => site_url('pages/pages_list'), "إضافة صفحة جديدة" => site_url('pages/pages_add'));
        $data['javascripts'] = $this->_javascript('pages_add');
		$data['pageCssFiles'] = $this->_cssFiles('pages_add');
        $data['main_content'] = 'pages/pages_add';
        $data['pageTitle'] = "إضافة صفحة جديدة";

        $this->form_validation->set_rules('page_title_english', "عنوان الصفحة باللغة الأنجليزية", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->pages_model->add();
            redirect('pages/pages_list');
        }
    }
	
    /**
     * This load edit order view if form_validation->run() == false 
	 * else it will edit the submitted data to order row and redirect to pages list.
     *
     * @return void
     */
    function pages_edit($id) {
        //$this->global_model->have_permission('pages_add');

        $data['breadcrumbs'] = array("الصفحات الثابتة" => site_url('pages/pages_list'), "تعديل صفحة" => site_url('pages/pages_edit/'.$id));
        $data['javascripts'] = $this->_javascript('pages_add');
		$data['pageCssFiles'] = $this->_cssFiles('pages_add');
        $data['main_content'] = 'pages/pages_edit';
        $data['pageTitle'] = "تعديل صفحة";
        $data['id'] = $id;
        $data['row'] = $this->pages_model->getByID($id);
		
        $this->form_validation->set_rules('page_title_english', "عنوان الصفحة باللغة الأنجليزية", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->pages_model->edit($id);
            redirect('pages/pages_list');
        }
    }

    /**
     * This method delete pages.
     *
     * @return void
     */
    function pages_del($code) {
        //$this->global_model->have_permission('pages_del');
		$result = $this->global_model->delete_selected_items("pages", "page_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("pages/pages_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'pages_add':
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
            case 'pages_add':
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
