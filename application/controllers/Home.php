<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {

    public function __construct() {
		
        parent::__construct();
		// Load lang file for this page
		$this->global_model->initializeLang('home');
		// load site settings if not exist in session
		$site_settings = $this->session->userdata('site_settings');
	   if(empty($site_settings)){
			$this->global_model->config();
	   }
    }

    public function index() {
		//print_r($_SESSION);exit;
		//$this->global_model->add_log(1);
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');
        $data['javascriptCode'] = $this->_javascriptCode('home');

		$data['main_content'] = 'home';
        //set page title
        $data['pageTitle'] = $this->lang->line('home');		
		$this->load->view('includes/template', $data);
    }
	
	function get_cities($id){
        header('Content-Type: application/json; charset=utf-8');
        echo(json_encode($this->global_model->get_cities_by_state($id)));
    } 
	
	function getCountriesAjax(){
        header('Content-Type: application/json; charset=utf-8');
        echo(json_encode($this->global_model->getAllCountriesAjax()));
    } 
	
	
	function destroy(){
		
		$this->session->sess_destroy();
		redirect();
	}
	
    function _javascript($view) {
        switch ($view) {
            case 'home':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.js'",
                    "'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.2.1/nouislider.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                );
				
                break;
        }
        return $java;
    }
	

    function _cssFiles($view) {
        switch ($view) {
            case 'home': 
                $css = '<link href="' . base_url() . 'assets/rtl/css/nouislider.min.css" rel="stylesheet" type="text/css" />';
                break;

        }
        return $css;
    }
	
    function _javascriptCode($view) {
        switch ($view) {
            case 'home':
                $java = "
				
					<!-- filter car search --> 
					<script>
					// implementation of nouislider
					var slider = document.getElementById('nouislider-slider');

					noUiSlider.create(slider, {
						start: [2015, 2019],
						connect: true,
						range: {
							'min': 2015,
							'max': 2019
						},

						step: 1,
						connect: true,
						 behaviour: 'tap-drag',
						tooltips: false,

						// Show a scale with the slider
						pips: {
							mode: 'steps',
							stepped: true,
							density: 4
						}
					});


						
						
						var \$range = $('.js-range-slider'),
						instance;

						\$range.ionRangeSlider({
							skin: 'round',
							type: 'double',
							min: 0,
							max: 500,
							from: 0,
							to: 500,
							onChange: handleRangeInputChange
						});

						instance = \$range.data('ionRangeSlider');


						var container = document.querySelector(\"[data-ref='product_list']\");
						var mixer = mixitup(container, {
							animation: {
								duration: 500,
								queueLimit: 1000
							}
						});

						function getRange() {
							var min = Number(instance.result.from);
							var max = Number(instance.result.to);
							return {
								min: min,
								max: max
							};
						}

						function handleRangeInputChange() {
							mixer.filter(mixer.getState().activeFilter);
						}

						function filterTestResult(testResult, target) {
							var size = Number(target.dom.el.getAttribute('data-size'));
							var range = getRange();
							if (size < range.min || size > range.max) {
								testResult = false;
							}
							return testResult;
						}
						mixitup.Mixer.registerFilter('testResultEvaluateHideShow', 'range', filterTestResult);
					</script> 				
				
				
				
				
				
				
				";
                break;
        
        
		}
        return $java;
    }
	
}


