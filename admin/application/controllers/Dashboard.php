<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Company ASAIT <admin@asait.co>
 *
 * @author Developer Ebrahim Elsawy <eng.ebrahimelsawy@gmail.com> 
 *
 * @link http://asait.co/
 *
 * @copyright 2016-2018 ASAIT
 *
 * @license EULA
 *
 * @version 1.0.0
 */
 
class Dashboard extends CI_Controller {

    function index() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == null) {
            redirect('login');
        }
        $data['javascripts'] = $this->_javascript('dashboard');
        $data['pageCssFiles'] = $this->_cssFiles('dashboard');
        $data['breadcrumbs'] = array("Dashboard" => site_url('dashboard'));
        $data['main_content'] = 'dashboard/dashboard';
        $data['pageTitle'] = 'Dashboard';

        $this->load->view('includes/template', $data);
    }
	
	function chartData(){
		$today = date('Y-m-d', strtotime('today'));
		$last_x_days = date('Y-m-d', strtotime('today - 30 days'));
		$q = $this->db->query("SELECT 
									`log_date`, 
									COUNT(case when `log_type` = '1' then 1 else null end) as visitors, 
									COUNT(case when `log_type` = '2' then 1 else null end) as store 
								FROM `log`
								WHERE log_date >= '".$last_x_days."' AND log_date <= '".$today."'
								GROUP BY `log_date`");
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = array("date" => $row->log_date, "visitors" => $row->visitors, "store" => $row->store);
			}
			header('Content-Type: application/json');
			echo json_encode($data);
		} 
		
	}

    /**
     * This method create an array of required js plugins.
     *
     * @return $java array
     */
    function _javascript($view) {
        switch ($view) {
            case 'dashboard':
                $java = array(
                    "'" . base_url() . "../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/global/plugins/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/dashboard.min.js'",
                    "'" . base_url() . "../assets/layouts/layout/scripts/layout.min.js'",
					
					
                    "'" . base_url() . "../assets/global/plugins/morris/morris.min.js'",
                    "'" . base_url() . "../assets/global/plugins/morris/raphael-min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.waypoints.min.js'",
                    "'" . base_url() . "../assets/global/plugins/counterup/jquery.counterup.min.js'",
                    "'" . base_url() . "../assets/global/plugins/amcharts/amcharts/amcharts.js'",
                    "'" . base_url() . "../assets/global/plugins/amcharts/amcharts/serial.js'",
                    "'" . base_url() . "../assets/global/plugins/amcharts/amcharts/themes/light.js'",
                    "'" . base_url() . "../assets/global/plugins/amcharts/amcharts/themes/patterns.js'",
                    "'" . base_url() . "../assets/global/plugins/amcharts/amcharts/themes/chalk.js'",
                    "'" . base_url() . "../assets/global/scripts/app.min.js'",
                    "'" . base_url() . "../assets/pages/scripts/dashboard.min.js'",
					
					
                );
                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'dashboard':
                $css = '<link href="' . base_url() . '../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />'
                        . '<link href="' . base_url() . '../assets/pages/css/dashboard.css" rel="stylesheet" type="text/css" />'
                        . '<link href="' . base_url() . '../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />';
                break;
        }
        return $css;
    }

}
