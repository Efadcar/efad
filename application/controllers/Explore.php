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
						$(document).ready(function () {
							// implementation of nouislider
							var yearSlider = document.getElementById('nouislider-slider');

							noUiSlider.create(yearSlider, {
								start: [2015, 2019],
								connect: true,
								range: {
									'min': 2015,
									'max': 2019
								},
								direction: 'rtl',
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

							yearSlider.noUiSlider.on('update', function( values, handle ) {
								let silderValue = yearSlider.noUiSlider.get();
								let value = silderValue.toString().split(\",\");
								$('#yearFrom').val(Math.trunc( value[1] ));
								$('#yearTo').val(Math.trunc( value[0] ));
								let result = collectSearchParams();
								console.log(result);
							});

							/////////////////////////////////////////////////////////////////////
							///////////////////////// PRICE FROM - TO////////////////////////////
							/////////////////////////////////////////////////////////////////////
							var priceSlider = document.getElementById('nouislider-slider-cash-range');

							noUiSlider.create(priceSlider, {
								start: [0, 1000],
								connect: true,
								range: {
									'min': 0,
									'max': 1000
								},
								direction: 'rtl',
								step: 5,
								connect: true,
								behaviour: 'tap-drag',
								tooltips: false,

								// Show a scale with the slider

							});

							priceSlider.noUiSlider.on('update', function( values, handle ) {
								let priceSilderValue = priceSlider.noUiSlider.get();
								let value = priceSilderValue.toString().split(\",\");
								$('#priceFrom').val(Math.trunc( value[1] ));
								$('#priceTo').val(Math.trunc( value[0] ));
								let result = collectSearchParams();
								console.log(result);
							});

							//event listner for generic search filter while typing
							$('.generalSearch').on('keyup', function() {
								if (this.value.length > 1) {
									let generalSearch = $('.generalSearch').val();
									console.log(generalSearch);
								}
								let result = collectSearchParams();
								console.log(result);
							});

							$('.items').click(function(){
								$('.paginationValue').val(this.value);
								$('li.items').removeClass('active');
								$(this).addClass('active');
								let result = collectSearchParams();
								console.log(result);
							});

							// prepare early booking value
							function earlyBookingValue(){
								let earlyBooking = $('.btn-switch__radio:checked').val();
								if(earlyBooking){
									if (earlyBooking == 0){
										earlyBooking = 1;
									}
									else if (earlyBooking == 1){
										earlyBooking = 0;
									}
								}
								return earlyBooking;
							}

							// prepare subscription Value Duration
							function subscriptionValueDurationValue(){
								let subscriptionValueDuration = $('.subscriptionValueDuration:checked').val();            
								if (subscriptionValueDuration == 'week1'){
									subscriptionValueDuration = 7;
								}
								else if (subscriptionValueDuration == 'month1'){
									subscriptionValueDuration = 30;
								}
								else if (subscriptionValueDuration == 'year1'){
									subscriptionValueDuration = 30 * 12;
								}
								return subscriptionValueDuration;
							}

							/*
							 * Collect search params filter
							 *
							 * @params
							 */
							function collectSearchParams(){
								let carClassification = $('.carClassification:checked').val();
								let generalSearch = $('.generalSearch').val();
								let carSearchCity = $('.carSearchCity').children(\"option:selected\").val();
								let membershipPlan = $('.membershipPlan:checked').val();
								let earlyBooking = earlyBookingValue();
								let durationOfSubscription = $('.durationOfSubscription:checked').val();
								let subscriptionValueDuration = subscriptionValueDurationValue();
								let financialValueDaily = $('.financialValueDaily').val();
								let financialValueWeekly = $('.financialValueWeekly').val();
								let displayOrdering = $('.displayOrdering:checked').val();
								let carBrand = $('.carBrand').children('option:selected').val();
								let carModel = $('.carType').children('option:selected').val();
								let carType = $('.carCategory').children('option:selected').val();
								let yearFrom = $('#yearFrom').val();
								let yearTo = $('#yearTo').val();
								let offset = $('.paginationValue').val();
								let carColor = [];
								$.each($('.carColor:checked'), function(){            
									carColor.push($(this).val());
								});
								let gearBox = $('.gearBox:checked').val();
								var result = new function(){
									this.search_text = generalSearch;
									// this.carSearchCity = carSearchCity;
									this.carClassification = carClassification;
									// this.membershipPlan = membershipPlan;
									// this.earlyBooking = earlyBooking;
									this.book_period = durationOfSubscription;
									// this.subscriptionValueDuration = subscriptionValueDuration;
									this.price_from = financialValueWeekly;
									this.price_to = financialValueDaily;
									this.order_by = displayOrdering;
									this.cb_uid = carBrand;
									this.cm_uid = carModel;
									this.ct_uid = carType;
									this.year_from = yearTo;
									this.year_to = yearFrom;
									this.color = carColor;
									this.transmission = gearBox;
									this.offset = offset;
								}

								//////////////// TODO ///////////////////////////////////
								// let x = 5; // car fixed price
								// let fixedrateaftermembership = membershipPlan * x / 100;
								// let xx = fixedrateaftermembership * earlyBookingValue / 100;
								// let xxx = xx * durationOfSubscription;
								$.ajax({

									type:'POST',

									url:'http://localhost/efad/explore/search',

									data:{
										search_text:generalSearch,
										// car_category:carClassification,
										book_period:durationOfSubscription,
										price_from:financialValueWeekly,
										price_to:financialValueDaily,
										order_by:displayOrdering,
										cb_uid:carBrand,
										cm_uid:carModel,
										ct_uid:carType,
										year_from:yearTo,
										year_to:yearFrom,
										color:carColor,
										transmission:gearBox,
										offset:offset,
									},

									success:function(data){
										console.log(data);
									},

									error: function(data){
										// var errors = data.responseJSON;
										// var errorObj = errors.errors;
										// if ((errorObj)){
										//     // TODO
										// }
										// $('html, body').animate({ scrollTop: 0 }, 'fast');
									}

								});

								//return result;
							}

							$( '.updateSearchContent' ).change(function() {
								let result = collectSearchParams();
								$('.carPriceAfterCal').html(Math.floor(Math.random()*(999-100+1)+100));
								let x = $('.subscriptionValueDuration:checked').next().html();
								$('.carDurationAfterCal').html('ريال ' + x);
								console.log(result);
							});


							$('.clearFilters').click(function(){
								//$(\"#myCheck\").prop(\"checked\", false);
								// $('.carClassification:checked').val();
								// $('.generalSearch').val('');
								// $('.carSearchCity').children(\"option:selected\").val();
								// let membershipPlan = $('.membershipPlan:checked').val();
								// let earlyBooking = earlyBookingValue();
								// let durationOfSubscription = $('.durationOfSubscription:checked').val();
								// let subscriptionValueDuration = subscriptionValueDurationValue();
								// let financialValueDaily = $('.financialValueDaily').val();
								// let financialValueWeekly = $('.financialValueWeekly').val();
								// let displayOrdering = $('.displayOrdering:checked').val();
								// let carBrand = $('.carBrand').children('option:selected').val();
								// let carModel = $('.carType').children('option:selected').val();
								// let carType = $('.carCategory').children('option:selected').val();
								// let yearFrom = $('#yearFrom').val();
								// let yearTo = $('#yearTo').val();
								// let offset = $('.paginationValue').val();
								// let carColor = [];
								// $.each($('.carColor:checked'), function(){            
								//     carColor.push($(this).val());
								// });
								// let gearBox = $('.gearBox:checked').val();
								alert('TODO - backend json response');
							});

							/* navbar */

							$('#sidebarCollapse').on('click', function () {
								$('#sidebar').toggleClass('active');
							});
						});
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


