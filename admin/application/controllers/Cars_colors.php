<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class controll the cars_colors views.
 */
class Cars_colors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cars_colors_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function cars_colors_list() {
        $this->global_model->have_permission('cars_categories_list');
        if (count($_POST) != 0) {
            $this->session->set_userdata('order_by', $this->input->post('order_by'));
            $this->session->set_userdata('order_type', $this->input->post('order_type'));
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('cars_colors/cars_colors_list');
        $config['total_rows'] = $this->db->get('cars_colors')->num_rows();
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
        $data['rows'] = $this->cars_colors_model->getAll($config['per_page'], $this->uri->segment(3));
        $data['total_rows'] = $config['total_rows'];
        $data['main_content'] = 'cars_colors/cars_colors_list';
		$data['pageCssFiles'] = $this->_cssFiles('cars_colors_add');
        $data['javascripts'] = $this->_javascript('cars_colors_add');
		$data['pageTitle'] = "الوان السيارات";
		$data['breadcrumbs'] = array("الوان السيارات" => site_url('cars_colors/cars_colors_list'), "عرض كل الصفحات" => site_url('cars_colors/cars_colors_list'));
        $this->load->view('includes/template', $data);
    }

    /**
     * This load add new category view if form_validation->run() == false 
	 * else it will insert the submitted data to cars_colors table and redirect to cars_colors list.
     *
     * @return void
     */
    function cars_colors_add() {
        $this->global_model->have_permission('cars_categories_add');
        $data['breadcrumbs'] = array("الوان السيارات" => site_url('cars_colors/cars_colors_list'), "إضافة قسم جديد" => site_url('cars_colors/cars_colors_add'));
        $data['javascripts'] = $this->_javascript('cars_colors_add');
		$data['pageCssFiles'] = $this->_cssFiles('cars_colors_add');
        $data['main_content'] = 'cars_colors/cars_colors_add';
        $data['pageTitle'] = "إضافة قسم جديد";

        $this->form_validation->set_rules('cco_name_english', "أسم اللون باللغة الأنجليزية", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->cars_colors_model->add();
            redirect('cars_colors/cars_colors_list');
        }
    }
	
    /**
     * This load edit order view if form_validation->run() == false 
	 * else it will edit the submitted data to order row and redirect to cars_colors list.
     *
     * @return void
     */
    function cars_colors_edit($id) {
        $this->global_model->have_permission('cars_categories_add');
        $data['breadcrumbs'] = array("الوان السيارات" => site_url('cars_colors/cars_colors_list'), "تعديل قسم" => site_url('cars_colors/cars_colors_edit/'.$id));
        $data['javascripts'] = $this->_javascript('cars_colors_add');
		$data['pageCssFiles'] = $this->_cssFiles('cars_colors_add');
        $data['main_content'] = 'cars_colors/cars_colors_edit';
        $data['pageTitle'] = "تعديل قسم";
        $data['id'] = $id;
        $data['row'] = $this->cars_colors_model->getByID($id);
		
        $this->form_validation->set_rules('cco_name_english', "أسم اللون باللغة الأنجليزية", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->cars_colors_model->edit($id);
            redirect('cars_colors/cars_colors_list');
        }
    }

    /**
     * This method delete cars_colors.
     *
     * @return void
     */
    function cars_colors_del($code) {
        $this->global_model->have_permission('cars_categories_del');
		$result = $this->global_model->delete_selected_items("cars_colors", "cco_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("cars_colors/cars_colors_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'cars_colors_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'",
                    "'" . base_url() . "../assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-color-pickers.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'cars_colors_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}
