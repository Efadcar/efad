<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Explore extends CI_Controller {

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
        $data['brands'] = $this->global_model->getAllBrands();
        $data['types'] = $this->global_model->getAllTypes();
        $data['direction'] = $this->global_model->getSiteDirection();
		$data['main_content'] = 'explore';
        $data['pageTitle'] = "اكتشف";		
		
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');
        $data['javascriptCode'] = $this->_javascriptCode('home');
		$this->load->view('includes/template', $data);
	}

    public function search() {
		header('Content-Type: application/json; charset=utf-8');
		$post_data = $this->input->post();
		// set form validations
		if(isset($post_data['search_text']) && $post_data['search_text'] != ""){
			$this->form_validation->set_rules('search_text', 'search_text', 'required');
		}else{
			$this->form_validation->set_rules('price_from', 'price_from', 'required|numeric');
			$this->form_validation->set_rules('price_to', 'price_to', 'required|numeric');
			$this->form_validation->set_rules('order_by', 'order_by', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			echo(json_encode(["status" => 0]));
		}else{
			$data = $this->global_model->search();
			echo(json_encode(["status" => 1, "data" =>$data]));
		}
    }
	
	
    function _javascript($view) {
        switch ($view) {
            case 'home':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.js'",
                    "'" . base_url() . "assets/rtl/js/filter/ion.rangeSlider.min.js'",
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
				
					<script type='text/javascript'>
						/* navbar */
						$(document).ready(function () {
							$('#countries').msDropdown();
							/* navbar */
							$('#sidebarCollapse').on('click', function () {
								$('#sidebar').toggleClass('active');
							});

							/* fancy */
							$('#top-login-button').fancybox();
							/* login */
							$('.toggle-password, .toggle-password2').click(function () {
								$(this).toggleClass('fa-eye fa-eye-slash');
								var input = $($(this).attr('toggle'));
								if (input.attr('type') == 'password') {
									input.attr('type', 'text');
								} 
								else 
								{
									input.attr('type', 'password');
								}
							});

							$(function () {
								$('.switchPanelButton').click(function (event) {
									event.preventDefault();
									var panel = $(this).attr('panelclass');
									$('.' + panel).hide();
									var panelid = $(this).attr('panelid');
									$('#' + panelid).show();
								});
							});

							$('.button-mobile-container').click(function () {
								$('.search-option').toggleClass('show');
							});

						});
					</script> 

					<!-- filter car search --> 
					<script>
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
        
            case 'profile':
                $java = "
				
					<script type=\"text/javascript\">
					$(document).ready(function () {
						$( \"ul\" ).on( \"click\", \"li\", function() {
							var pos = $(this).index()+2;
							$(\"tr\").find('td:not(:eq(0))').hide();
							$('td:nth-child('+pos+')').css('display','table-cell');
							$(\"tr\").find('th:not(:eq(0))').hide();
							$('li').removeClass('active');
							$(this).addClass('active');
						});

						// Initialize the media query
						var mediaQuery = window.matchMedia('(min-width: 640px)');

						// Add a listen event
						mediaQuery.addListener(doSomething);

						// Function to do something with the media query
						function doSomething(mediaQuery) {    
							if (mediaQuery.matches) {
								$('.sep').attr('colspan',5);
							} else {
								$('.sep').attr('colspan',2);
							}
						}

						doSomething(mediaQuery);

					});



					</script> 
					<script type=\"text/javascript\">
						$(function () {

							/* login */
							$(\".toggle-password\").click(function () {

								$(this).toggleClass(\"fa-eye fa-eye-slash\");
								var input = $($(this).attr(\"toggle\"));
								if (input.attr(\"type\") == \"password\") {
									input.attr(\"type\", \"text\");
								} else {
									input.attr(\"type\", \"password\");
								}
							});
							$('[data-toggle=\"tooltip\"]').tooltip();
						})
					</script> 
					<script>
						$(document).ready(function () {
							var readURL = function (input) {
								if (input.files && input.files[0]) {
									var reader = new FileReader();

									reader.onload = function (e) {
										$('.profile-pic').attr('src', e.target.result);
									}

									reader.readAsDataURL(input.files[0]);
								}
							}
							$(\".file-upload\").on('change', function () {
								readURL(this);
							});

							$(\".upload-button\").on('click', function () {
								$(\".file-upload\").click();
							});
						});
					</script> 
					<script>
					jQuery(document).ready(function(){
					  jQuery('.toast__close').click(function(e){
						e.preventDefault();
						var parent = $(this).parent('.toast');
						parent.fadeOut(\"slow\", function() { $(this).remove(); } );
					  });
					});
					</script>			
				
				
				
				
				
				
				";
                break;
        
        
		}
        return $java;
    }
	
	
}


