<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

									
class Admins extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('admins_model');
        $this->load->library('form_validation');
        $this->global_model->config();
	} 
	
	function admins_list(){
		$this->global_model->have_permission('admins_list');
		if(count($_POST) != 0){
			$this->session->set_userdata('order_by', $this->input->post('order_by'));
			$this->session->set_userdata('order_type', $this->input->post('order_type'));
		}
		
		//start pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('admins/admins_list');
		$config['total_rows'] = $this->db->get('dx_users')->num_rows();
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
		$data['rows'] = $this->admins_model->getAll( $config['per_page'], $this->uri->segment(3));
		if($data['rows'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('admins_add');
        $data['javascripts'] = $this->_javascript('admins_add');

		$data['breadcrumbs'] = array("الموظفين" => site_url('admins/admins_list'));
		$data['main_content'] = 'admins/admins_list';
		$data['pageTitle'] = 'الموظفين';
		$this->load->view('includes/template', $data);
	}
	
	function admins_add(){
		$this->global_model->have_permission('admins_add');
		$data['groups'] = $this->admins_model->getAllGroups();
		$data['pageCssFiles'] = $this->_cssFiles('admins_add');
        $data['javascripts'] = $this->_javascript('admins_add');
		$data['breadcrumbs'] = array("الموظفين" => site_url('admins/admins_list'),"إضافة موظف" => site_url('admins/admins_add'));
		$data['main_content'] = 'admins/admins_add';
		$data['pageTitle'] = "إضافة موظف";
		
        $this->form_validation->set_rules('user_full_name', 'الأسم بالكامل', 'required');
        $this->form_validation->set_rules('user_pwd', 'كلمة المرور', 'required|alpha_numeric');
        $this->form_validation->set_rules('user_pwd1', 'تأكيد كلمة المرور', 'required|matches[user_pwd]');
        $this->form_validation->set_rules('user_email', 'البريد الإلكترونى', 'required|is_unique[dx_users.user_email]|valid_email');
        $this->form_validation->set_rules('user_banned', 'حالة الحظر', 'required|min_length[1]');
        $this->form_validation->set_rules('group_uid', 'المجموعة', 'required|min_length[1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->admins_model->add_action();
			redirect('admins/admins_list');
		}
	}
	
	function admins_edit($id){
		$this->global_model->have_permission('admins_edit');
		$data['groups'] = $this->admins_model->getAllGroups();
		$data['row'] = $this->admins_model->getByID($id);

		$data['pageCssFiles'] = $this->_cssFiles('admins_add');
        $data['javascripts'] = $this->_javascript('admins_add');
		$data['breadcrumbs'] = array("الموظفين" => site_url('admins/admins_list'),"تعديل بيانات الموظف ( ".$data['row']->user_full_name." )" => site_url('admins/admins_view/'.$data['row']->user_uid));
		$data['main_content'] = 'admins/admins_edit';
		$data['pageTitle'] = "تعديل الموظف ( ".$data['row']->user_full_name." )";
		
        $this->form_validation->set_rules('user_full_name', 'الأسم بالكامل', 'required');
        $this->form_validation->set_rules('user_pwd', 'كلمة المرور', 'alpha_numeric');
        $this->form_validation->set_rules('user_pwd1', 'تأكيد كلمة المرور', 'matches[user_pwd]');
        $this->form_validation->set_rules('user_email', 'البريد الإلكترونى', 'required|valid_email');
        $this->form_validation->set_rules('user_banned', 'حالة الحظر', 'required|min_length[1]');
        $this->form_validation->set_rules('group_uid', 'المجموعة', 'required|min_length[1]');

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->admins_model->edit_action($id);
			redirect('admins/admins_list');
		}
	}
	
	function admins_view($id){
		$this->global_model->have_permission('admins_view');
		$data['row'] = $this->admins_model->getByID($id);
		if($data['row'] == true){
			$data['profile'] = $this->admins_model->getProfileByID($data['row']->user_uid);
		}
		$data['pageCssFiles'] = $this->_cssFiles('admins_add');
        $data['javascripts'] = $this->_javascript('admins_add');
		$data['breadcrumbs'] = array("الموظفين" => site_url('admins/admins_list'),"الملف الشخصى للموظف ( ".$data['row']->user_full_name." )" => site_url('admins/admins_view/'.$data['row']->user_uid));
		$data['main_content'] = 'admins/admins_view';
		$data['pageTitle'] = "الملف الشخصى للموظف ( ".$data['row']->user_full_name." )";
		
		
		$this->load->view('includes/template', $data);
	}
	
	function admins_del($code){
		$this->global_model->have_permission('admins_del');
		$check = $this->admins_model->is_last_super_admin();
		if($check){
            $this->messages->add("لا يمكن حذف أخر مدير عام بالنظام", "error");
			redirect("admins/admins_list");
		}
		$result = $this->global_model->delete_selected_items("dx_users", "user_uid", $code, FALSE, FALSE);
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("admins/admins_list");
	}

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'admins_add':
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
            case 'admins_add':
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

