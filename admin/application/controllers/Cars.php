<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

									
class Cars extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('cars_model');
        $this->load->library('form_validation');
        $this->global_model->config();
	} 
	
	function cars_list(){
		$this->global_model->have_permission('cars_list');
		if(count($_POST) != 0){
			$this->session->set_userdata('order_by', $this->input->post('order_by'));
			$this->session->set_userdata('order_type', $this->input->post('order_type'));
		}
		
		//start pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('cars/cars_list');
		$config['total_rows'] = $this->db->get('cars')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = false;
		$config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['first_link'] = '<div class="btn">الأول</div>';
		$config['last_link'] = '<div class="btn">الأخير</div>';
		$this->pagination->initialize($config);
		//end pagination
		$data['rows'] = $this->cars_model->getAll( $config['per_page'], $this->uri->segment(3));
		if($data['rows'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('cars_add');
        $data['javascripts'] = $this->_javascript('cars_add');

		$data['breadcrumbs'] = array("السيارات" => site_url('cars/cars_list'));
		$data['main_content'] = 'cars/cars_list';
		$data['pageTitle'] = 'السيارات';
		$this->load->view('includes/template', $data);
	}
	
	function cars_add(){
		$this->global_model->have_permission('cars_add');
		$data['types'] = $this->cars_model->getAllTypes();
		$data['categories'] = $this->cars_model->getAllCategories();
		$data['brands'] = $this->cars_model->getAllBrands();
		$data['albums'] = $this->cars_model->getAllAlbums();
		$data['colors'] = $this->cars_model->getAllColors();
		
		$data['pageCssFiles'] = $this->_cssFiles('cars_add');
        $data['javascripts'] = $this->_javascript('cars_add');
		$data['breadcrumbs'] = array("السيارات" => site_url('cars/cars_list'),"إضافة سيارة" => site_url('cars/cars_add'));
		$data['main_content'] = 'cars/cars_add';
		$data['pageTitle'] = "إضافة سيارة";
		
        $this->form_validation->set_rules('car_model_name', 'موديل السيارة', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->cars_model->add_action();
			redirect('cars/cars_list');
		}
	}
	
	function cars_edit($id){
		$this->global_model->have_permission('cars_edit');
		$data['types'] = $this->cars_model->getAllTypes();
		$data['categories'] = $this->cars_model->getAllCategories();
		$data['brands'] = $this->cars_model->getAllBrands();
		$data['albums'] = $this->cars_model->getAllAlbums();
		$data['colors'] = $this->cars_model->getAllColors();
		$data['row'] = $this->cars_model->getByID($id);

		$data['pageCssFiles'] = $this->_cssFiles('cars_add');
        $data['javascripts'] = $this->_javascript('cars_add');
		$data['breadcrumbs'] = array("السيارات" => site_url('cars/cars_list'),"تعديل بيانات السيارة" => site_url('cars/cars_view/'.$data['row']->car_uid));
		$data['main_content'] = 'cars/cars_edit';
		$data['pageTitle'] = "تعديل السيارة ";
		
        $this->form_validation->set_rules('car_model_name', 'موديل السيارة', 'required');

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->cars_model->edit_action($id);
			redirect('cars/cars_list');
		}
	}
	
	function cars_view($id){
		$this->global_model->have_permission('cars_view');
		$data['row'] = $this->cars_model->getByID($id);
		if($data['row'] == true){
			$data['profile'] = $this->cars_model->getProfileByID($data['row']->car_uid);
		}
		$data['pageCssFiles'] = $this->_cssFiles('cars_add');
        $data['javascripts'] = $this->_javascript('cars_add');
		$data['breadcrumbs'] = array("السيارات" => site_url('cars/cars_list'),"ملف السيارة ( ".$data['row']->user_full_name." )" => site_url('cars/cars_view/'.$data['row']->car_uid));
		$data['main_content'] = 'cars/cars_view';
		$data['pageTitle'] = "ملف السيارة ( ".$data['row']->user_full_name." )";
		
		
		$this->load->view('includes/template', $data);
	}
	
	function cars_del($code){
		$this->global_model->have_permission('cars_del');
		$result = $this->global_model->delete_selected_items("cars", "car_uid", $code, FALSE, FALSE);
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("cars/cars_list");
	}

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'cars_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/plugins/select2/js/select2.full.min.js'",
                    "'" . base_url() . "../assets/global/plugins/moment.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-select2.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-date-time-pickers.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-bootstrap-switch.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-editors.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
                break;
        }
        return $java;
    }
	

    function _cssFiles($view) {
        switch ($view) {
            case 'cars_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}

