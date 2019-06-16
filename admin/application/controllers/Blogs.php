<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class controll the blogs views.
 */
class Blogs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('blogs_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function blogs_list() {
        //$this->global_model->have_permission('blogs_list');
        if (count($_POST) != 0) {
            $this->session->set_userdata('order_by', $this->input->post('order_by'));
            $this->session->set_userdata('order_type', $this->input->post('order_type'));
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('blogs/blogs_list');
        $config['total_rows'] = $this->db->get('blogs')->num_rows();
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
        $data['rows'] = $this->blogs_model->getAll($config['per_page'], $this->uri->segment(3));
        $data['total_rows'] = $config['total_rows'];
        $data['main_content'] = 'blogs/blogs_list';
		$data['pageCssFiles'] = $this->_cssFiles('blogs_add');
        $data['javascripts'] = $this->_javascript('blogs_add');
		$data['pageTitle'] = "المقالات";
		$data['breadcrumbs'] = array("المقالات" => site_url('blogs/blogs_list'), "عرض كل المقالات" => site_url('blogs/blogs_list'));
        $this->load->view('includes/template', $data);
    }

    /**
     * This load add new category view if form_validation->run() == false 
	 * else it will insert the submitted data to blogs table and redirect to blogs list.
     *
     * @return void
     */
    function blogs_add() {
        //$this->global_model->have_permission('blogs_add');

        $data['breadcrumbs'] = array("المقالات" => site_url('blogs/blogs_list'), "إضافة مقال جديد" => site_url('blogs/blogs_add'));
        $data['javascripts'] = $this->_javascript('blogs_add');
		$data['pageCssFiles'] = $this->_cssFiles('blogs_add');
        $data['main_content'] = 'blogs/blogs_add';
        $data['pageTitle'] = "إضافة مقال جديد";

        $this->form_validation->set_rules('blog_title_english', "عنوان المقال باللغة الأنجليزية", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->blogs_model->add();
            redirect('blogs/blogs_list');
        }
    }
	
    /**
     * This load edit order view if form_validation->run() == false 
	 * else it will edit the submitted data to order row and redirect to blogs list.
     *
     * @return void
     */
    function blogs_edit($id) {
        //$this->global_model->have_permission('blogs_add');

        $data['breadcrumbs'] = array("المقالات" => site_url('blogs/blogs_list'), "تعديل مقال" => site_url('blogs/blogs_edit/'.$id));
        $data['javascripts'] = $this->_javascript('blogs_add');
		$data['pageCssFiles'] = $this->_cssFiles('blogs_add');
        $data['main_content'] = 'blogs/blogs_edit';
        $data['pageTitle'] = "تعديل مقال";
        $data['id'] = $id;
        $data['row'] = $this->blogs_model->getByID($id);
		
        $this->form_validation->set_rules('blog_title_english', "عنوان المقال باللغة الأنجليزية", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->blogs_model->edit($id);
            redirect('blogs/blogs_list');
        }
    }

    /**
     * This method delete blogs.
     *
     * @return void
     */
    function blogs_del($code) {
        //$this->global_model->have_permission('blogs_del');
		$result = $this->global_model->delete_selected_items("blogs", "blog_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("blogs/blogs_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'blogs_add':
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
            case 'blogs_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}
