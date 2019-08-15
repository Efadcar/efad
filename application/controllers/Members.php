<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Members extends CI_Controller {

    public function __construct() {
		
        parent::__construct();
		// Load lang file for this page
		$this->global_model->initializeLang('home');
		// load site settings if not exist in session
		$site_settings = $this->session->userdata('site_settings');
	   if(empty($site_settings)){
			$this->global_model->config();
	   }
        $this->load->model('members_model');

		
		
    }

    public function login() {
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
		// set main content
		if (strpos($_SERVER['HTTP_REFERER'], 'book/confirm') !== false) {
			$data['main_content'] = 'members/login';
		}else{
			$data['main_content'] = 'home';
		}
        
        //set page title
        $data['pageTitle'] = $this->lang->line('home');		
		
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');
        $data['javascriptCode'] = $this->_javascriptCode('home');
		// set form validations
        $this->form_validation->set_rules('username', 'أسم المستخدم', 'required|min_length[1]');
        $this->form_validation->set_rules('password', 'كلمة المرور', 'required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$this->members_model->validate();
			$refer =  $_SERVER['HTTP_REFERER'];
			redirect($refer);
		}
    }
	
    public function register() {
		
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
		// set main content
		if (strpos($_SERVER['HTTP_REFERER'], 'book/confirm') !== false) {
			$data['main_content'] = 'members/login';
		}else{
			$data['main_content'] = 'home';
		}
        //set page title
        $data['pageTitle'] = $this->lang->line('home');		
		
        $data['javascripts'] = $this->_javascript('home');
        $data['pageCssFiles'] = $this->_cssFiles('home');
        $data['javascriptCode'] = $this->_javascriptCode('home');

		// set form validations
        $this->form_validation->set_rules('member_fname', 'الأسم الاول', 'required');
        $this->form_validation->set_rules('member_lname', 'الأسم الاخير', 'required');
        $this->form_validation->set_rules('member_password', 'كلمة المرور', 'required|min_length[8]');
        $this->form_validation->set_rules('member_password1', 'تأكيد كلمة المرور', 'required|matches[member_password]');
        $this->form_validation->set_rules('member_email', 'البريد الإلكترونى', 'required|is_unique[members.member_email]|valid_email');
        $this->form_validation->set_rules('country_uid', 'الدولة', 'required|min_length[1]');
        $this->form_validation->set_rules('member_mobile', 'رقم الجوال', 'required|numeric|min_length[1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/template', $data);
		}else{
			$status = $this->members_model->register();
			if($status == true){
				$this->global_model->loginOnBooking($_POST['member_mobile'], $_POST['member_password']);
			}
			$refer =  $_SERVER['HTTP_REFERER'];
			redirect($refer);
		}
    }
	
    public function profile() {
        if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('member_uid') != null) {
			// get site direction return "rtl" or "ltr"
			$data['direction'] = $this->global_model->getSiteDirection();
			$data['bookings'] = $this->global_model->getUserBookings( $this->session->userdata('member_uid'));

			// set main content
			$data['main_content'] = 'profile';
			//set page title
			$data['pageTitle'] = "الملف الشخصي";		

			$data['javascripts'] = $this->_javascript('home');
			$data['pageCssFiles'] = $this->_cssFiles('profile');
			$data['javascriptCode'] = $this->_javascriptCode('profile');
			$this->load->view('includes/template', $data);
		}else{
			redirect('home');
		}
    }
	
	
	function logout(){
		$this->session->sess_destroy();
		$refer =  $_SERVER['HTTP_REFERER'];
		redirect($refer);
	}
		
    function _javascript($view) {
        switch ($view) {
            case 'home':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/mixitup.js'",
                    "'" . base_url() . "assets/rtl/js/filter/ion.rangeSlider.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                );
				
                break;
        }
        return $java;
    }
	

    function _cssFiles($view) {
        switch ($view) {
            case 'home': 
                $css = '';
                break;

            case 'profile':
            	$css = "'" . base_url() . "assets/rtl/css/profile.css'";
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
				
				
					// Profile page
					$(document).ready(function() {
						$('.nav-tabs > li > a').click(function(event){
							event.preventDefault();//stop browser to take action for clicked anchor
										
							//get displaying tab content jQuery selector
							var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');					
										
							//find actived navigation and remove 'active' css
							var actived_nav = $('.nav-tabs > li.active');
							actived_nav.removeClass('active');
										
							//add 'active' css into clicked navigation
							$(this).parents('li').addClass('active');
										
							//hide displaying tab content
							$(active_tab_selector).removeClass('active');
							$(active_tab_selector).addClass('hide');
										
							//show target tab content
							var target_tab_selector = $(this).attr('href');
							$(target_tab_selector).removeClass('hide');
							$(target_tab_selector).addClass('active');
					    });
					});
				
				
					</script>			
				
				";
                break;
        
        
		}
        return $java;
    }
	
	
}


