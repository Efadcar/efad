<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Book extends CI_Controller {

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

    public function addNew($car_uid) {
		//$this->global_model->add_log(1);
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
        $data['javascripts'] = $this->_javascript('book');
        $data['pageCssFiles'] = $this->_cssFiles('book');
        $data['javascriptCode'] = $this->_javascriptCode('book');
        $data['main_content'] = 'book/new';
        $data['car'] = $this->global_model->getCarByID($car_uid);
		if($data['car'] == false){
			redirect('explore');
		}
		//print_r($data['car']);exit;
        //set page title
        $data['pageTitle'] = "أحجز الآن";		
		$this->load->view('includes/template', $data);
    }

    public function detail($book_uid) {
		//$this->global_model->add_log(1);
		// get site direction return "rtl" or "ltr"
        $data['direction'] = $this->global_model->getSiteDirection();
        $data['javascripts'] = $this->_javascript('book');
        $data['pageCssFiles'] = $this->_cssFiles('book');
        $data['javascriptCode'] = $this->_javascriptCode('book');
        $data['main_content'] = 'book/detail';
        $data['booking'] = $this->global_model->bookingAndInvoiceDetails($book_uid);
		//print_r($data['car']);exit;
        //set page title
        $data['pageTitle'] = "تفاصيل الحجز";		
		$this->load->view('includes/template', $data);
    }
	
    public function confirm() {
		//print_r($_SESSION);exit;
		if(isset($_POST['delivery_city_uid'])){
			$_SESSION['current_booking']['city_uid'] = $_POST['delivery_city_uid'];
		}
		
		if($this->session->userdata('current_booking') == null){
			redirect('explore');
		}
		
		$data['direction'] = $this->global_model->getSiteDirection();
		$data['javascripts'] = $this->_javascript('book');
		$data['pageCssFiles'] = $this->_cssFiles('book');
		$data['javascriptCode'] = $this->_javascriptCode('pay');
		
		if ($this->session->userdata('is_logged_in') == true && $this->session->userdata('member_uid') != null) {
			$current_booking = $this->session->userdata('current_booking');
			$city_uid = $current_booking['city_uid'];
			
			if($this->session->userdata('mc_uid') == null){
				$_SESSION['current_booking']['new_member'] = 1;
			}else{
				$result = $this->global_model->calculate($current_booking['book_start_date'], $current_booking['book_end_date'], $current_booking['car_uid'], $this->session->userdata('mc_uid'));
			}		
			$_SESSION['current_booking']['city_uid'] = $city_uid;
			$data['car'] = $this->global_model->getCarByID($current_booking['car_uid']);
			//print_r($data['car']);exit;
			$data['current_booking'] = $current_booking;
			$data['pageTitle'] = "دفع و تأكيد الحجز";
			$data['main_content'] = 'book/pay';
			$this->load->view('includes/template', $data);
		}else{
			$data['pageTitle'] = "إستكمال الحجز";
			$data['main_content'] = 'members/login';
			$this->load->view('includes/template', $data);
		}
	}
	
	function calculate(){
        header('Content-Type: application/json; charset=utf-8');
        $this->form_validation->set_rules('book_start_date', 'book_start_date', 'required');
        $this->form_validation->set_rules('book_end_date', 'book_end_date', 'required');
        $this->form_validation->set_rules('car_uid', 'car_uid', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			echo(json_encode(array("status" => 0)));
		}
		else
		{
			$book_end_date = $this->input->post('book_end_date');
			$book_start_date = $this->input->post('book_start_date');
			$car_uid = $this->input->post('car_uid');
			$mc_uid = $this->input->post('mc_uid');
			echo(json_encode($this->global_model->calculate($book_start_date, $book_end_date, $car_uid, $mc_uid)));
		}
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
			echo(json_encode($this->global_model->confirmBooking($payment_method)));
		}
	}
	
    function _javascript($view) {
        switch ($view) {
            case 'book':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/jquery.validate.js'",
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/moment-with-locales.js'",
                    "'" . base_url() . "assets/rtl/js/bootstrap-material-datetimepicker.js'",
                    "'" . base_url() . "assets/rtl/js/jquery.card.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
                    "'" . base_url() . "assets/rtl/js/faq.js'",
  					"'" . base_url() . "assets/global/plugins/printPlugin/js/printThis.js'",
                );
				
				
				

                break;
        }
        return $java;
    }
	

    function _cssFiles($view) {
        switch ($view) {
            case 'book': 
                $css = '';
                break;

        }
        return $css;
    }
	
    function _javascriptCode($view) {
        switch ($view) {
            case 'book':
                $java = "

				<script type='text/javascript'>

					$('#confirm-booking').submit(function(e){
						e.preventDefault();
					});

					$('#paynow').click( function() {
						var dateStart = $('#date-start').val();
						var dateEnd = $('#date-end').val();

						let inputStatebookWeb = $('.inputStatebookWeb').children('option:selected').val();
						let inputStatebookMob = $('.inputStatebookMob').children('option:selected').val();

						if (inputStatebookWeb > 0){
							$('.inputStatebookMob').val(inputStatebookWeb);
						}

						if (inputStatebookMob > 0){
							$('.inputStatebookWeb').val(inputStatebookMob);
						}

						var inputStatebook = $('#inputStatebook').children('option:selected').val();

						if (dateStart.length < 1 || dateEnd.length < 1 || inputStatebook == 0) {
							toastr.error('لإكمال الحجز يجب إختيار تاريخ استلام وتسليم السيارة ومدينة استلام السيارة', 'خطأ');
						}else{
							document.getElementById('confirm-booking').submit()
						}						
					});

					$(document).ready(function () {
					
						$(function () {
							$('.switchPanelButton').click(function (event) {
								event.preventDefault();
								var panel = $(this).attr('panelclass');
								$('.' + panel).hide();
								var panelid = $(this).attr('panelid');
								$('#' + panelid).show();
							});
						});
        
						$('.print').click(function(){
							$('.demo').printThis({
								importCSS: true,  
								header: null,               // prefix to html
    							footer: null,
    							footer: $('.hidden-print-header-content'),
    							removeInline: false, 
								});
						});
					
					
						var dataSet;
						$('.toggle').click(function () {
							$('#target').toggle('slow');
						});

						var date_start = new Date();
						date_start.setDate(date_start.getDate()+".(BOOKED_DELIVERY_AFTER+$this->global_model->countWeekends(date('m'),date('Y'))).");
						var date_end = new Date();
						date_end.setDate(date_end.getDate()+".(BOOKED_DELIVERY_AFTER+$this->global_model->countWeekends(date('m'),date('Y'))+6).");
						
						$('#date-end').bootstrapMaterialDatePicker
						({
							weekStart: 6,
							format: 'DD-M-YYYY',
							disabledDays: [5],
							minDate : date_end,
							time: false,
							switchOnClick: true,
							lang: 'en'
						});
						
						$('#date-end').prop( 'disabled', true );
						
						$('#date-start').bootstrapMaterialDatePicker
						({
							weekStart: 6, 
							format: 'DD-M-YYYY',
							disabledDays: [5,6],
							minDate : date_start,
							time: false,
							switchOnClick: true,
							lang: 'en'
						});

					});
					</script> 
					<script type='text/javascript'>
						
						$(function () {
							$('[data-toggle=\"tooltip\"]').tooltip()
						});
						
						var timeoutId;
						$('#date-start, #date-end').on('input propertychange change', function() {

							$('#date-end').prop( 'disabled', false );
							var datee = $('#date-start').bootstrapMaterialDatePicker().val();

							datee = datee.replace('الأحد', 'Sunday');
							datee = datee.replace('الإثنين', 'Monday');
							datee = datee.replace('الثلاثاء', 'Tuesday');
							datee = datee.replace('الأربعاء', 'Wednesday');
							datee = datee.replace('الخميس', 'Thursday');
							datee = datee.replace('الجمعة', 'Friday');
							datee = datee.replace('السبت', 'Saturday');

							datee = datee.replace('يناير', 'January');
							datee = datee.replace('فبراير', 'February');
							datee = datee.replace('مارس', 'March');
							datee = datee.replace('أبريل', 'April');
							datee = datee.replace('ماي', 'May');
							datee = datee.replace('يونيو', 'June');
							datee = datee.replace('يوليوز', 'July');
							datee = datee.replace('غشت', 'August');
							datee = datee.replace('شتنبر', 'September');
							datee = datee.replace('أكتوبر', 'October');
							datee = datee.replace('نونبر', 'November');
							datee = datee.replace('دجنبر', 'December');

							var newDate = new Date(datee);
							newDate.setDate(newDate.getDate() + 6);
							// console.log(datee);
							$('#date-end').bootstrapMaterialDatePicker('setMinDate', newDate);
							clearTimeout(timeoutId);
							timeoutId = setTimeout(function() {
								saveToDB();
							}, 500);
						});

						function saveToDB()
						{
							form = $('#book-form');
							$.ajax({
								url: '".site_url('book/calculate')."',
								type: 'POST',
								data: form.serialize(), // serializes the form's elements.
								success: function(data) {
									var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html();
									dataSet = data;
									console.log(data);
									// Now show them we saved and when we did
									if(data.status == 1){										
										// set UI values
										$('.total-price').html(data.total_fees_after_tax);
										$('.total-days').html(data.days);
										$('#daily-rate').html(data.daily_rate_after_discount);
									}
									
								},
							});
						}

					</script> 


				";
                break;
            case 'pay':
                $java = "

				<script type='text/javascript'>

					$(document).ready(function () {
						$('#confirm-book').submit(function(e){
							e.preventDefault();
						});
					
						$('#paymentCard').hide();
						$('.cash-fees-tr').hide();
						
						$('#paynow').click( function() {
							//console.log('hi');
							$('#paynow').prop('disabled', true);
							confirmBooking();
						});
					
						function confirmBooking()
						{
							form = $('#confirm-book');
							$.ajax({
								url: '".site_url('book/pay')."',
								type: 'POST',
								data: form.serialize(), // serializes the form's elements.
								success: function(data) {
								console.log(data);
									if(data.status == 1)
									{
										window.location.replace('".site_url('members/profile#tab2')."');
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
								$('#transferInfo').hide();
								$('.cash-fees-tr').hide();
								$('.total-price').html($('#total_without_cash').val());
								$('#paynow').html('دفع');
								
							}
							else if (this.value == 'cash') {
								$('#paymentCard').hide();
								$('#transferInfo').hide();
								$('.cash-fees-tr').show();
								$('.total-price').html($('#total_with_cash').val());
								$('#paynow').html('تأكيد الحجز');
							}
							else if (this.value == 'transfer') {
								$('#transferInfo').show();
								$('#paymentCard').hide();
								$('.cash-fees-tr').hide();
								$('.total-price').html($('#total_without_cash').val());
								$('#paynow').html('تأكيد الحجز');
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
        
        
		}
        return $java;
    }
	
}


