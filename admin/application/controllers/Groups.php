<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
									
class Groups extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->global_model->config();
		$this->load->model('groups_model');
		$this->load->library('form_validation');
	}
	
	function groups_list(){
		$this->global_model->have_permission('groups_list');
		//start pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('groups/groups_list');
		$config['total_rows'] = $this->db->get('dx_groups')->num_rows();
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = false;
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<div class="btn">';
		$config['num_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="btn active">';
		$config['cur_tag_close'] = '</div>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<div class="btn">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<div class="btn">';
		$config['prev_tag_close'] = '</div>';
		$config['first_link'] = '<div class="btn">الأول</div>';
		$config['last_link'] = '<div class="btn">الأخير</div>';
		$this->pagination->initialize($config);
		//end pagination
		
		$data['rows'] = $this->groups_model->getAll( $config['per_page'], $this->uri->segment(3));
		if($data['rows'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('groups_add');
        $data['javascripts'] = $this->_javascript('groups_add');
		$data['breadcrumbs'] = array("المجموعات و الصلاحيات" => site_url('groups/groups_list'));
		$data['main_content'] = 'groups/groups_list';
		$data['pageTitle'] = 'المجموعات و الصلاحيات';
		$this->load->view('includes/template', $data);
	}
	
	function groups_add(){
		$this->global_model->have_permission('groups_add');
		$data['pageCssFiles'] = $this->_cssFiles('groups_add');
        $data['javascripts'] = $this->_javascript('groups_add');
		$data['breadcrumbs'] = array("المجموعات و الصلاحيات" => site_url('groups/groups_list'),"أضافة مجموعة" => site_url('groups/groups_add'));
		$data['main_content'] = 'groups/groups_add';
		$data['pageTitle'] = "أضافة مجموعة";
		
        $this->form_validation->set_rules('group_name', 'أسم المجموعة', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->groups_model->add_action();
			redirect('groups/groups_list');
		}
	}
	
	function groups_edit($id){
		$this->global_model->have_permission('groups_edit');
		$data['row'] = $this->groups_model->getByID($id);
		$this->row = $data['row'];
		if($data['row'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('groups_add');
        $data['javascripts'] = $this->_javascript('groups_add');
		$data['breadcrumbs'] = array("المجموعات و الصلاحيات" => site_url('groups/groups_list'),"تعديل مجموعة ( ".$data['row']->group_name." )" => site_url('groups/groups_edit/'.$data['row']->group_uid));
		$data['main_content'] = 'groups/groups_edit';
		$data['pageTitle'] = "تعديل مجموعة ( ".$data['row']->group_name." )";
		
        $this->form_validation->set_rules('group_name', 'أسم المجموعة', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->groups_model->edit_action($id);
			redirect('groups/groups_list');
		}
	}
	
	function groups_permissions($id){
		$this->global_model->have_permission('groups_edit');
		$data['row'] = $this->groups_model->getPermissionsByID($id);
		$this->row = $data['row'];
		if($data['row'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('groups_add');
        $data['javascripts'] = $this->_javascript('groups_add');
		$data['breadcrumbs'] = array("المجموعات و الصلاحيات" => site_url('groups/groups_list'),"تعديل صلاحيات مجموعة" => site_url('groups/groups_permissions/'.$data['row']->group_uid));
		$data['main_content'] = 'groups/groups_permissions';
		$data['pageTitle'] = "تعديل صلاحيات مجموعة";
		
        $this->form_validation->set_rules('submitBtn', 'أسم المجموعة', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->groups_model->edit_permissions_action($id);
			redirect('groups/groups_list');
		}
	}
	
	function groups_del($code){
		$this->global_model->have_permission('groups_del');
		$result = $this->global_model->delete_selected_items("dx_groups", "group_uid", $code, "permission", "group_uid");
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("groups/groups_list");
		
	}


    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'groups_add':
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
            case 'groups_add':
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

