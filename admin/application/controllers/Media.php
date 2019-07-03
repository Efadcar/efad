<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class controll the Media views.
 */
class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('media_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function media_list() {
        $this->global_model->have_permission('albums_list');
        if (count($_POST) != 0) {
            $this->session->set_userdata('order_by', $this->input->post('order_by'));
            $this->session->set_userdata('order_type', $this->input->post('order_type'));
        }
        $this->load->library('pagination');
        $config['base_url'] = site_url('media/media_list');
        $config['total_rows'] = $this->db->get_where('media', array('album_uid' => $this->uri->segment(3)))->num_rows();
        $config['per_page'] = $this->session->userdata('sitePerPagePagination');
        $config['num_links'] = 5;
        $config['uri_segment'] = 4;
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
        $data['rows'] = $this->media_model->getAll($config['per_page'], $this->uri->segment(4), $this->uri->segment(3));
		//print_r($data['rows']);exit;
        $data['total_rows'] = $config['total_rows'];
        $data['main_content'] = 'media/media_list';
		$data['pageCssFiles'] = $this->_cssFiles('media_add');
        $data['javascripts'] = $this->_javascript('media_add');
		$data['pageTitle'] = "صور الألبوم";
		$data['breadcrumbs'] = array("الألبومات" => site_url('albums/albums_list'), "صور الألبوم" => site_url('media/media_list/'.$this->uri->segment(3)));
        $this->load->view('includes/template', $data);
    }

    /**
     * This load add new category view if form_validation->run() == false 
	 * else it will insert the submitted data to media table and redirect to media list.
     *
     * @return void
     */
    function media_add() {
        $this->global_model->have_permission('albums_list');

        $data['breadcrumbs'] = array("صور الألبوم" => site_url('media/media_list/'.$this->uri->segment(3)), "إضافة صورة جديدة" => site_url('media/media_add/'.$this->uri->segment(3)));
        $data['javascripts'] = $this->_javascript('media_add');
		$data['pageCssFiles'] = $this->_cssFiles('media_add');
        $data['main_content'] = 'media/media_add';
        $data['pageTitle'] = "إضافة صورة جديدة";
        $data['album_uid'] = $this->uri->segment(3);

        $this->form_validation->set_rules('media_type', "Media type", 'required|strip_tags|is_natural_no_zero');
		
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->media_model->add();
            redirect('media/media_list/'.$this->uri->segment(3));
        }
    }
	
    /**
     * This load edit order view if form_validation->run() == false 
	 * else it will edit the submitted data to order row and redirect to media list.
     *
     * @return void
     */
    function media_edit($id) {
        //$this->global_model->have_permission('pages_edit');
        $data['row'] = $this->media_model->getByID($id);
		$data['breadcrumbs'] = array("Categories" => site_url('media/media_list'), "Edit category" => site_url('media/media_edit/'.$id));
        $data['javascripts'] = $this->_javascript('media_add');
		$data['pageCssFiles'] = $this->_cssFiles('media_add');

        $data['main_content'] = 'media/media_edit';
        $data['pageTitle'] = "Edit category";

        $this->form_validation->set_rules('cat_name', "Category name", 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template', $data);
        } else {
            $this->media_model->edit_action($id);
            redirect('media/media_list');
        }
    }

    /**
     * This method delete media.
     *
     * @return void
     */
    function media_del($code,$id) {
        //$this->global_model->have_permission('media_del');
		$result = $this->global_model->delete_selected_items("media", "media_uid", $code, false, false);
		if ($result == true) 
		{
			$this->messages->add("Deleted succesfully", "success");
        } 
		else 
		{
            $this->messages->add("There was an error.", "error");
        }
        redirect("media/media_list/".$id);
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'media_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/portfolio-4.min.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
				
                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'media_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/pages/css/portfolio.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}
