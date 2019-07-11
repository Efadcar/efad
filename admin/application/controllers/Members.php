<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

									
class Members extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('members_model');
        $this->load->library('form_validation');
        $this->global_model->config();
	} 
	
	function members_list(){
		$this->global_model->have_permission('members_list');
		if(count($_POST) != 0){
			$this->session->set_userdata('order_by', $this->input->post('order_by'));
			$this->session->set_userdata('order_type', $this->input->post('order_type'));
		}
		
		//start pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('members/members_list');
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
		$data['rows'] = $this->members_model->getAll( $config['per_page'], $this->uri->segment(3));
		if($data['rows'] == false){
			//redirect('error/no_data');
		}
		$data['pageCssFiles'] = $this->_cssFiles('members_add');
        $data['javascripts'] = $this->_javascript('members_add');

		$data['breadcrumbs'] = array("الأعضاء" => site_url('members/members_list'));
		$data['main_content'] = 'members/members_list';
		$data['pageTitle'] = 'الأعضاء';
		$this->load->view('includes/template', $data);
	}
	
	function members_add(){
		$this->global_model->have_permission('members_add');
		$data['memberships'] = $this->members_model->getAllMemberships();
		$data['countries'] = $this->members_model->getAllCountries();
		$data['pageCssFiles'] = $this->_cssFiles('members_add');
        $data['javascripts'] = $this->_javascript('members_add');
		$data['breadcrumbs'] = array("الأعضاء" => site_url('members/members_list'),"إضافة عضو" => site_url('members/members_add'));
		$data['main_content'] = 'members/members_add';
		$data['pageTitle'] = "إضافة عضو";
		
        $this->form_validation->set_rules('member_fname', 'الأسم الاول', 'required');
        $this->form_validation->set_rules('member_lname', 'الأسم الاول', 'required');
        $this->form_validation->set_rules('member_password', 'كلمة المرور', 'required|alpha_numeric|min_length[8]');
        $this->form_validation->set_rules('member_password1', 'تأكيد كلمة المرور', 'required|matches[member_password]');
        $this->form_validation->set_rules('member_email', 'البريد الإلكترونى', 'required|is_unique[members.member_email]|valid_email');
        $this->form_validation->set_rules('country_uid', 'الدولة', 'required|min_length[1]');
        $this->form_validation->set_rules('member_mobile', 'رقم الجوال', 'required|numeric|min_length[1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->members_model->add_action();
			redirect('members/members_list');
		}
	}
	
	function members_edit($id){
		$this->global_model->have_permission('members_edit');
		$data['memberships'] = $this->members_model->getAllMemberships();
		$data['countries'] = $this->members_model->getAllCountries();

		$data['row'] = $this->members_model->getByID($id);

		$data['pageCssFiles'] = $this->_cssFiles('members_add');
        $data['javascripts'] = $this->_javascript('members_add');
		$data['breadcrumbs'] = array("الأعضاء" => site_url('members/members_list'),"تعديل بيانات العضو ( ".$data['row']->member_fname." ".$data['row']->member_lname.")" => site_url('members/members_view/'.$data['row']->member_uid));
		$data['main_content'] = 'members/members_edit';
		$data['pageTitle'] = "تعديل العضو ( ".$data['row']->member_fname." ".$data['row']->member_lname." )";
		
        $this->form_validation->set_rules('member_fname', 'الأسم الاول', 'required');
        $this->form_validation->set_rules('member_lname', 'الأسم الاول', 'required');
        $this->form_validation->set_rules('member_password1', 'تأكيد كلمة المرور', 'matches[member_password]');
        $this->form_validation->set_rules('member_email', 'البريد الإلكترونى', 'required|valid_email');
        $this->form_validation->set_rules('country_uid', 'الدولة', 'required|min_length[1]');
        $this->form_validation->set_rules('member_mobile', 'رقم الجوال', 'required|numeric|min_length[1]');

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->members_model->edit_action($id);
			redirect('members/members_list');
		}
	}
	
	function members_view($id){
		$this->global_model->have_permission('members_view');
		$data['row'] = $this->members_model->getByID($id);
		if($data['row'] == true){
			$data['profile'] = $this->members_model->getProfileByID($data['row']->user_uid);
		}
		$data['pageCssFiles'] = $this->_cssFiles('members_add');
        $data['javascripts'] = $this->_javascript('members_add');
		$data['breadcrumbs'] = array("الأعضاء" => site_url('members/members_list'),"الملف الشخصى للعضو ( ".$data['row']->user_full_name." )" => site_url('members/members_view/'.$data['row']->user_uid));
		$data['main_content'] = 'members/members_view';
		$data['pageTitle'] = "الملف الشخصى للعضو ( ".$data['row']->user_full_name." )";
		
		
		$this->load->view('includes/template', $data);
	}
	
	function get_cities($id){
        header('Content-Type: application/json; charset=utf-8');
        echo(json_encode($this->members_model->get_cities_by_state($id)));
    } 
	
	function members_del($code){
		$this->global_model->have_permission('members_del');
		$check = $this->members_model->is_last_super_admin();
		if($check){
            $this->messages->add("لا يمكن حذف أخر مدير عام بالنظام", "error");
			redirect("members/members_list");
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
        redirect("members/members_list");
	}

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'members_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/plugins/select2/js/select2.full.min.js'",
                    "'" . base_url() . "../assets/global/plugins/moment.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-select2.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/components-date-time-pickers.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'members_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
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

