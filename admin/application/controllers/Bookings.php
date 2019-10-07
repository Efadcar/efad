<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class controll the bookings views.
 */
class Bookings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bookings_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function bookings_all() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("all");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_active() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("active");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات النشطة";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_canceled() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("canceled");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات الملغاة";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_waiting_confirm() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("waiting_confirm");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات بأنتظار التأكيد";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_finished() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("finished");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات المنتهية";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_finish_soon() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("finish_soon");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات التي تنتهي قريباً";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_today() {
        //$this->global_model->have_permission('bookings_list');
        $data['rows'] = $this->bookings_model->getAll("today");
        $data['main_content'] = 'bookings/bookings_list';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_add');
        $data['javascripts'] = $this->_javascript('bookings_add');
		$data['pageTitle'] = "جميع الحجوزات اليوم";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض جميع الحجوزات" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

    function bookings_view($id) {
        //$this->global_model->have_permission('bookings_list');
        $data['row'] = $this->bookings_model->getByID($id);
        $data['main_content'] = 'bookings/bookings_view';
		$data['pageCssFiles'] = $this->_cssFiles('bookings_view');
        $data['javascripts'] = $this->_javascript('bookings_view');
		$data['pageTitle'] = "بيانات حجز";
		$data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_list'), "عرض بيانات حجز" => site_url('bookings/bookings_list'));
        $this->load->view('includes/template', $data);
    }

	
    function bookings_edit($id) {
        //$this->global_model->have_permission('bookings_add');
        $data['breadcrumbs'] = array("الحجوزات" => site_url('bookings/bookings_all'), "تعديل بيانات حجز رقم : ".$id => site_url('bookings/bookings_edit/'.$id));
        $data['javascripts'] = $this->_javascript('bookings_view');
		$data['pageCssFiles'] = $this->_cssFiles('bookings_view');
        $data['main_content'] = 'bookings/bookings_edit';
        $data['pageTitle'] = "تعديل بيانات حجز رقم :".$id;
        $data['id'] = $id;
        $data['row'] = $this->bookings_model->getByID($id);
        $data['cities'] = $this->bookings_model->getAllCities();
		//print_r($data['cities']);exit;
		
        $this->form_validation->set_rules('delivery_city_uid', "مدينة أستلام السيارة", 'required|strip_tags');
        $this->form_validation->set_rules('book_status', "حالة الحجز", 'required|strip_tags');
        $this->form_validation->set_rules('invoice_status', "حالة الدفع", 'required|strip_tags');
        if($this->form_validation->run() == FALSE) 
		{
            $this->load->view('includes/template', $data);
        } 
		else 
		{
            $this->bookings_model->edit($id);
            redirect('bookings/bookings_list');
        }
    }

	function bookings_del($code) {
        $this->global_model->have_permission('bookings_del');
		$result = $this->global_model->delete_selected_items("bookings", "fc_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("bookings/bookings_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'bookings_add':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'",
                    "'" . base_url() . "../assets/global/scripts/datatable.js'",
                    "'" . base_url() . "../assets/global/plugins/datatables/datatables.min.js'",
                    "'" . base_url() . "../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/table-datatables-responsive.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
                );
				
                break;
            case 'bookings_view':
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
            case 'bookings_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'bookings_view':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/pages/css/invoice-2-rtl.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'candidate_list':
                break;
        }
        return $css;
    }

}
