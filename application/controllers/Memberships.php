<?php defined('BASEPATH') OR exit('No direct script access allowed');

 
class Memberships extends CI_Controller {

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

    public function subscribe() {
		// get site direction return "rtl" or "ltr"
		$data['direction'] = $this->global_model->getSiteDirection();
		
        $data['main_content'] = 'memberships/subscribe';
		$data['memberships'] = $this->global_model->getAllMemberships();
        $data['javascripts'] = $this->_javascript('memberships');
        $data['pageCssFiles'] = $this->_cssFiles('memberships');
        $data['javascriptCode'] = $this->_javascriptCode('memberships', $data['memberships']);
		$this->load->view('includes/template', $data);
    }
	
	function confirm(){
		if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('member_uid') != null && isset($_POST['mc_uid']) && isset($_POST['period'])) {
			if($_SESSION['mc_uid'] < $_POST['mc_uid'] & $_POST['mc_uid'] != 4 || $_SESSION['mc_uid'] == 4 & $_POST['mc_uid'] != 4){
				$data['direction'] = $this->global_model->getSiteDirection();
				$data['row'] = $this->global_model->getMembershipByID($_POST['mc_uid']);
				$data['period'] = $_POST['period'];
				$data['main_content'] = 'memberships/pay';
				$data['javascripts'] = $this->_javascript('pay');
				$data['pageCssFiles'] = $this->_cssFiles('memberships');
				$data['javascriptCode'] = $this->_javascriptCode('pay', "");
				$this->load->view('includes/template', $data);
			}else{
				$this->messages->add("عفواً، لا يمكنك تقليل فئة العضوية.", "error");
				redirect('memberships/subscribe');
			}
		}elseif(isset($_POST['mc_uid']) && isset($_POST['period'])){
			$this->messages->add("يجب عليك تسجيل الدخول حتي تتمكن من الأشتراك بعضوية.", "error");
			redirect('memberships/subscribe');
		}
		//print_r($_POST);exit;
		
	}
	
	function pay(){
        header('Content-Type: application/json; charset=utf-8');
		//echo(json_encode($_POST));exit;
        $this->form_validation->set_rules('customRadio', 'customRadio', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			echo(json_encode(array("status" => 0)));
		}
		else
		{
			$payment_method = $this->input->post('customRadio');
			echo(json_encode($this->global_model->confirmMembership($payment_method)));
		}
	}
	

    function _javascript($view) {
        switch ($view) {
            case 'memberships':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                    "'" . base_url() . "assets/rtl/js/jquery.stickytableheaders.js'",
                );
				
				
                break;
            case 'pay':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                    "'" . base_url() . "assets/rtl/js/jquery.card.js'",
                );
				
				
                break;
        }
        return $java;
    }

    function _cssFiles($view) {
        switch ($view) {
            case 'memberships': 
                $css = '';
                break;

        }
        return $css;
    }
	
    function _javascriptCode($view, $memberships) {
        switch ($view) {
            case 'pay':
                $java = "
				<script type='text/javascript'>

					$(document).ready(function () {
						$('#confirm-book').submit(function(e){
							e.preventDefault();
						});
					
						//$('#paymentCard').hide();
						$('.cash-fees-tr').hide();
					
						$('#paynow').click( function() {
							console.log('hi');
							confirmBooking();
						});
					
						function confirmBooking()
						{
							form = $('#confirm-membership');
							$.ajax({
								url: '".site_url('memberships/pay')."',
								type: 'POST',
								data: form.serialize(), // serializes the form's elements.
								success: function(data) {
								console.log(data);
									if(data.status == 1)
									{
										window.location.replace('".site_url('members/profile')."');
									}
									else
									{
										console.log(data);
										toastr.error(data.message, 'خطأ');
									}
									
								},
							});
						}		
					
					});
					</script> 
					<script type='text/javascript'>
						
						$(function () {
							$('[data-toggle=\"tooltip\"]').tooltip()
						});
						
						$('input[type=radio][name=\"customRadio\"]').change(function() {							
							if (this.value == 'visa') {
								$('#paymentCard').show();
								$('.cash-fees-tr').hide();
								$('.total-price').html($('#total_without_cash').val());
								$('#paynow').html('دفع');
								
							}
							else if (this.value == 'cash') {
								$('#paymentCard').hide();
								$('.cash-fees-tr').show();
								$('.total-price').html($('#total_with_cash').val());
								$('#paynow').html('تأكيد الأشتراك');
							}
						});

					</script> 

				<script>
					$('#confirm-book').card({
						container: '.card__wrapper',
						formSelectors: {
							numberInput: 'input[name=\"number\"]',
							expiryInput: 'input[name=\"expiry\"]',
							cvcInput: 'input[name=\"cvc\"]',
							nameInput: 'input[name=\"name\"]',
						},
						debug: true

					});
				
				
				</script>
				
				
				";
				break;
				
            case 'memberships':
                $java = "
				
				<script type='text/javascript'>
				
						function goDoSubscribe(identifier){ 
							$('#mc_uid').val($(identifier).data('id'));
							document.getElementById('subscribe').submit();
						}
					

					$(document).ready(function () {
						
					
						$('.show-prices').hide();
						$('#mem-f').show();
						$( 'ul' ).on( 'click', 'li', function() {
							var pos = $(this).index()+2;
							if (pos == 2){
								pos = 3;
							}
							let indexVal = $(this).index();
							$('.show-prices').hide();
							if (indexVal == 0){
								$('#mem-f').show();
							}
							else if (indexVal == 1){
								$('#mem-s').show();	
							}
							else if (indexVal == 2){
								$('#mem-t').show();	
							}
							else if (indexVal == 3){
								$('#mem-fo').show();	
							}
							$('tr').find('td:not(:eq(0))').hide();
							$('td:nth-child('+pos+')').css('display','table-cell');
							$('tr').find('th:not(:eq(0))').hide();
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
						// On load
						doSomething(mediaQuery);

						$('.membership-f').css({
							backgroundColor: '". $memberships[0]->mc_color_code ."', 
							color: 'white'
						});

						$('.membership-f').click(function(){ 
							$('.membership-setdef').css({
							    background: '#FFF',
							    color: '#999',
							});
							$('.membership-f').css({
								backgroundColor: '". $memberships[0]->mc_color_code ."', 
								color: 'white'
							});
						});

						$('.membership-s').click(function(){ 
							$('.membership-setdef').css({
							    background: '#FFF',
							    color: '#999',
							});
							$('.membership-s').css({
								backgroundColor: '". $memberships[1]->mc_color_code ."', 
								color: 'white'
							});
						});

						$('.membership-t').click(function(){ 
							$('.membership-setdef').css({
							    background: '#FFF',
							    color: '#999',
							});
							$('.membership-t').css({
								backgroundColor: '". $memberships[2]->mc_color_code ."', 
								color: 'white'
							});
						});

						$('.membership-fo').click(function(){ 
							$('.membership-setdef').css({
							    background: '#FFF',
							    color: '#999',
							});
							$('.membership-fo').css({
								backgroundColor: '". $memberships[3]->mc_color_code ."', 
								color: 'white'
							});
						});
					});
					
					$(function() {
					  $('table').stickyTableHeaders({fixedOffset: $('nav')});
					});
					
					$('#monthly-1').on('click',function(){
						$('.value1').text('".$memberships[0]->mc_6months_price."') , 
						$('.value2').text('".$memberships[1]->mc_6months_price."') , 
						$('.value3').text('".$memberships[2]->mc_6months_price."') , 
						$('.value4').text('".$memberships[3]->mc_6months_price."') , 
						$('#period').val('mc_6months_price')  
					});

					$('#9month').on('click',function(){
						$('.value1').text('".$memberships[0]->mc_9months_price."') , 
						$('.value2').text('".$memberships[1]->mc_9months_price."') , 
						$('.value3').text('".$memberships[2]->mc_9months_price."') , 
						$('.value4').text('".$memberships[3]->mc_9months_price."') ,
						$('#period').val('mc_9months_price')  
					});

					$('#12monthly').on('click',function(){
						$('.value1').text('".$memberships[0]->mc_12months_price."') , 
						$('.value2').text('".$memberships[1]->mc_12months_price."') , 
						$('.value3').text('".$memberships[2]->mc_12months_price."') , 
						$('.value4').text('".$memberships[3]->mc_12months_price."') ,
						$('#period').val('mc_12months_price')  
					});

				</script> 
				
				
				
				";
                break;
        
        
		}
        return $java;
    }
	
}


