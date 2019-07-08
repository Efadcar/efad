<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

									
class Memberships extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('memberships_model');
        $this->load->library('form_validation');
        $this->global_model->config();
	} 
	
	function memberships_list(){
		$this->global_model->have_permission('memberships_list');
		if(count($_POST) != 0){
			$this->session->set_userdata('order_by', $this->input->post('order_by'));
			$this->session->set_userdata('order_type', $this->input->post('order_type'));
		}
		
		//start pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('memberships/memberships_list');
		$config['total_rows'] = $this->db->get('memberships')->num_rows();
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
		$data['rows'] = $this->memberships_model->getAll( $config['per_page'], $this->uri->segment(3));
		if($data['rows'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('memberships_add');
        $data['javascripts'] = $this->_javascript('memberships_add');

		$data['breadcrumbs'] = array("العضويات" => site_url('memberships/memberships_list'));
		$data['main_content'] = 'memberships/memberships_list';
		$data['pageTitle'] = 'العضويات';
		$this->load->view('includes/template', $data);
	}
	
	function memberships_add(){
		$this->global_model->have_permission('memberships_add');		
		$data['pageCssFiles'] = $this->_cssFiles('memberships_add');
        $data['javascripts'] = $this->_javascript('memberships_add');
		$data['breadcrumbs'] = array("العضويات" => site_url('memberships/memberships_list'),"إضافة عضوية" => site_url('memberships/memberships_add'));
		$data['main_content'] = 'memberships/memberships_add';
		$data['pageTitle'] = "إضافة عضوية";
		
        $this->form_validation->set_rules('mc_name', 'أسم العضوية', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->memberships_model->add_action();
			redirect('memberships/memberships_list');
		}
	}
	
	function memberships_edit($id){
		$this->global_model->have_permission('memberships_edit');
		$data['row'] = $this->memberships_model->getByID($id);

		$data['pageCssFiles'] = $this->_cssFiles('memberships_add');
        $data['javascripts'] = $this->_javascript('memberships_add');
		$data['breadcrumbs'] = array("العضويات" => site_url('memberships/memberships_list'),"تعديل بيانات العضوية" => site_url('memberships/memberships_view/'.$data['row']->mc_uid));
		$data['main_content'] = 'memberships/memberships_edit';
		$data['pageTitle'] = "تعديل العضوية ";
		
        $this->form_validation->set_rules('mc_name', 'أسم العضوية', 'required');

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->memberships_model->edit_action($id);
			redirect('memberships/memberships_list');
		}
	}
	
	function memberships_del($code){
		$this->global_model->have_permission('memberships_del');
		$result = $this->global_model->delete_selected_items("memberships", "mc_uid", $code, FALSE, FALSE);
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("memberships/memberships_list");
	}

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'memberships_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'",
                    "'" . base_url() . "../assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-bootstrap-switch.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-color-pickers.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
                break;
        }
        return $java;
    }
	

    function _cssFiles($view) {
        switch ($view) {
            case 'memberships_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}

