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
		
        //set page title
        $data['pageTitle'] = "أحجز الآن";		
		$this->load->view('includes/template', $data);
    }
	
    public function confirm() {
        header('Content-Type: application/json; charset=utf-8');
		echo(json_encode($this->global_model->confirmBooking()));
	}
	
	function calculate(){
        header('Content-Type: application/json; charset=utf-8');
        $this->form_validation->set_rules('book_start_date', 'book_start_date', 'required');
        $this->form_validation->set_rules('book_end_date', 'book_end_date', 'required');
        $this->form_validation->set_rules('car_uid', 'car_uid', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo(json_encode(array("status" => 0)));
		}else{
			echo(json_encode($this->global_model->calculate()));
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
                    "'" . base_url() . "assets/rtl/js/card.min.js'",
                    "'" . base_url() . "assets/rtl/js/efad-scripts.js'",
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

					$(document).ready(function () {
					
						$('#confirm-book').submit(function(e){
							e.preventDefault();
						});
					
						$('#paynow').click( function() {
							var dateStart = $('#date-start').val();
							var dateEnd = $('#date-end').val();
							var inputStatebook = $('#inputStatebook').val();
						
							if (dateStart.length < 1 || dateEnd.length < 1 || inputStatebook.length < 1 || dateStart.val == 0) {
								toastr.error('يجب أختيار تاريخ أستلام و تسليم السيارة و مدينة أستلام السيارة', 'خطأ');
							}else{
								confirmBooking();
							}						
						});
					
						function confirmBooking()
						{
							form = $('#confirm-book');
							$.ajax({
								url: '".site_url('book/confirm')."',
								type: 'POST',
								data: form.serialize(), // serializes the form's elements.
								success: function(data) {
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
					
						var dataSet;
						$('#red-tax-div').hide();
						$('#red-div').hide();
						$('#cash-fees').hide();
						$('#paymentCard').hide();
						$('#free-day').hide();
						$('#early-booking').hide();

						$('.toggle').click(function () {
							$('#target').toggle('slow');


						});
						$('.cutom-btn').on('click', function () {
							$(this).addClass('active').siblings().removeClass('active');
							$('.freeride').addClass('visiable').siblings().removeClass('visiable');
							$('.freeend').addClass('hidefree').siblings().removeClass('hidefree');
						});


						var date_start = new Date();
						date_start.setDate(date_start.getDate()+".BOOKED_DELIVERY_AFTER.");
						var date_end = new Date();
						date_end.setDate(date_end.getDate()+".(BOOKED_DELIVERY_AFTER+1).");
						
						$('#date-end').bootstrapMaterialDatePicker
						({
							weekStart: 6, 
							format: 'dddd, DD-MMMM-YYYY',
							disabledDays: [5],
							minDate : date_end,
							time: false,
							switchOnClick: true,
							lang: 'en'

						});
						
						
						$('#date-start').bootstrapMaterialDatePicker
						({
							weekStart: 6, 
							format: 'dddd, DD-MMMM-YYYY',
							disabledDays: [5],
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
							var datee = $('#date-start').bootstrapMaterialDatePicker().val();
							var newDate = new Date(datee);
							newDate.setDate(newDate.getDate() + 1);
							//console.log(newDate);
							$('#date-end').bootstrapMaterialDatePicker('setMinDate', newDate);
						
						
							clearTimeout(timeoutId);
							timeoutId = setTimeout(function() {
								// Runs 1 second (1000 ms) after the last change    
								saveToDB();
							}, 500);
						});

						function saveToDB()
						{
							console.log('Saving to the db');
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
									//var d = new Date();
									if(data.status == 1){
									
										// set hidden values for invoice
										$('#con_book_start_date').val(data.book_start_date);
										$('#con_book_end_date').val(data.book_end_date);
										$('#con_days').val(data.days);
										$('#con_days_to_get_car').val(data.days_to_get_car);
										$('#con_daily_rate').val(data.daily_rate);
										$('#con_total_fees').val(data.total_fees);
										$('#con_daily_rate_after_discount').val(data.daily_rate_after_discount);
										$('#con_free_day').val(data.free_day);
										$('#con_total_fees_after_free_day').val(data.total_fees_after_free_day);
										$('#con_early_booking').val(data.early_booking);
										$('#con_early_booking_discount_total').val(data.early_booking_discount_total);
										$('#con_total_fees_after_early_booking').val(data.total_fees_after_early_booking);
										$('#con_tax_total').val(data.tax_total);
										$('#con_total_fees_after_tax').val(data.total_fees_after_tax);
									
										
										// set UI values
										$('.total-price').html(data.total_fees_after_tax);
										$('.total-days').html(data.days);
										$('#daily-rate').html(data.daily_rate_after_discount);
										$('#tax-total').html(data.tax_total);
										$('#total-fees').html(data.total_fees);
										if(data.free_day == 1){
											$('#free-day-fees').html(data.daily_rate_after_discount);
											$('#free-day').show();
										}else{
											$('#free-day-fees').html(0);
											$('#free-day').hide();
										}
										if(data.early_booking == 1){
											$('#early-booking-fees').html(data.early_booking_discount_total);
											$('#early-booking').show();
										}else{
											$('#early-booking-fees').html(0);
											$('#early-booking').hide();
										}
										if(data.new_member == 1){
											$('#red-tax-div').show();
											$('#red-div').show();
										}else{
											$('#red-tax-div').hide();
											$('#red-div').hide();
										}
										
									}
									
								},
							});
						}

						$('input[type=radio][name=\"customRadio\"]').change(function() {							
							if (this.value == 'visa') {
								$('#paymentCard').show();
								$('#cash-fees').hide();
								$('.total-price').html(dataSet.total_fees_after_tax);
								
							}
							else if (this.value == 'cash') {
								$('#paymentCard').hide();
								$('#cash-fees').show();
								tal_feee = Number(dataSet.total_fees_after_tax) + ".CASH_PAYMENT_FEES.";
								$('.total-price').html(tal_feee);
							}
						});

					</script> 

				<script>
					var card = new Card({
						form: 'form.card__form',
						container: 'div.card__wrapper',
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


