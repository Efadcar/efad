<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This class controll the invoices views.
 */
class Invoices extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('invoices_model');
        $this->load->library('form_validation');
        $this->global_model->config();
    }
	
    function invoices_list() {
        //$this->global_model->have_permission('invoices_list');
        $data['rows'] = $this->invoices_model->getAll();
        $data['main_content'] = 'invoices/invoices_list';
		$data['pageCssFiles'] = $this->_cssFiles('invoices_add');
        $data['javascripts'] = $this->_javascript('invoices_add');
		$data['pageTitle'] = "جميع الفواتير";
		$data['breadcrumbs'] = array("الفواتير" => site_url('invoices/invoices_list'), "عرض جميع الفواتير" => site_url('invoices/invoices_list'));
        $this->load->view('includes/template', $data);
    }

	
    function invoices_edit($id) {
        //$this->global_model->have_permission('invoices_add');
        $data['breadcrumbs'] = array("الفواتير" => site_url('invoices/invoices_all'), "تعديل بيانات حجز رقم : ".$id => site_url('invoices/invoices_edit/'.$id));
        $data['javascripts'] = $this->_javascript('invoices_view');
		$data['pageCssFiles'] = $this->_cssFiles('invoices_view');
        $data['main_content'] = 'invoices/invoices_edit';
        $data['pageTitle'] = "تعديل بيانات حجز رقم :".$id;
        $data['id'] = $id;
        $data['row'] = $this->invoices_model->getByID($id);
        $data['cities'] = $this->invoices_model->getAllCities();
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
            $this->invoices_model->edit($id);
            redirect('invoices/invoices_list');
        }
    }

	function invoices_del($code) {
        $this->global_model->have_permission('invoices_del');
		$result = $this->global_model->delete_selected_items("invoices", "fc_code", $code, "strings", "string_code");
		if ($result == true) 
		{
			$this->messages->add("تم الحذف بنجاح", "success");
        } 
		else 
		{
            $this->messages->add("لقد حدث خطأ", "error");
        }
        redirect("invoices/invoices_list");
    }

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'invoices_add':
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
            case 'invoices_view':
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
            case 'invoices_add':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr-rtl.min.css" rel="stylesheet" type="text/css" />'.
				'<link href="'.base_url().'../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>'.
				'<link href="'.base_url().'../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css"/>'.
				'<link href="' . base_url() . '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />';
                break;

            case 'invoices_view':
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
