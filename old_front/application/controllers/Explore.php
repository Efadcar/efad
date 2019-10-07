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
        $data['colors'] = $this->global_model->getAllColors();
		
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
		//echo(json_encode($_POST));
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
	
	function getModels($id){
        header('Content-Type: application/json; charset=utf-8');
        echo(json_encode($this->global_model->getModelsByBrandID($id)));
	}
	
	
    function _javascript($view) {
        switch ($view) {
            case 'home':
                $java = array(
                    "'" . base_url() . "assets/rtl/js/bootstrap-toastr/toastr.min.js'",
                    "'" . base_url() . "assets/rtl/js/filter/ion.rangeSlider.min.js'",
                    "'" . base_url() . "assets/global/plugins/waitme/waitMe.js'",
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
                $css = '<link href="' . base_url() . 'assets/rtl/css/nouislider.min.css" rel="stylesheet" type="text/css" /><link type="text/css" rel="stylesheet" href="' . base_url() . 'assets/global/plugins/waitme/waitMe.css">';
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

							$('.custom-show-filters').click(function(){
								$('.search-option').toggleClass('show');
							});



							function run_waitMe(el, num, effect){
								text = 'الرجاء الانتظار...';
								fontSize = '';
								switch (num) {
									case 1:
									maxSize = '';
									textPos = 'vertical';
									break;
									case 2:
									text = '';
									maxSize = 30;
									textPos = 'vertical';
									break;
									case 3:
									maxSize = 30;
									textPos = 'horizontal';
									fontSize = '18px';
									break;
								}
								el.waitMe({
									effect: effect,
									text: text,
									bg: 'rgba(255,255,255,0.7)',
									color: '#000',
									maxSize: maxSize,
									waitTime: -1,
									source: 'img.svg',
									textPos: textPos,
									fontSize: fontSize,
									onClose: function(el) {}
								});
							}
							
							function run_waitMe_body(effect){
								$('body').addClass('waitMe_body');
								var img = '';
								var text = '';
								if(effect == 'img'){
									img = 'background:url(\"" . base_url() . "assets/global/plugins/waitme/img.svg\")';
								} else if(effect == 'text'){
									text = 'Loading...'; 
								}
								var elem = $('<div class=\"waitMe_container ' + effect + '\"><div style=\"' + img + '\">' + text + '</div></div>');
								$('body').prepend(elem);
								
								setTimeout(function(){
									$('body.waitMe_body').addClass('hideMe');
									setTimeout(function(){
										$('body.waitMe_body').find('.waitMe_container:not([data-waitme_id])').remove();
										$('body.waitMe_body').removeClass('waitMe_body hideMe');
									},200);
								},4000);
							}
							
							
							// implementation of nouislider
							var yearSlider = document.getElementById('nouislider-slider');

							noUiSlider.create(yearSlider, {
								start: [2016, 2020],
								connect: true,
								range: {
									'min': 2016,
									'max': 2020
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
								// collectSearchParams();
								$('#yearFrom').trigger('change');
								
								
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
								// $('#yearFrom').trigger('change');
							});

							//event listner for generic search filter while typing
							$('.generalSearch').keypress(function(e){
								if(e.which == 13){
									collectSearchParams();
								}
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
									subscriptionValueDuration = 365;
								}
								return subscriptionValueDuration;
							}

							collectSearchParams();

							/*
							 * Collect search params filter
							 *
							 * @params
							 */
							function collectSearchParams(){
								run_waitMe($('body'), 1, 'ios');
								let carClassification = $('.carClassification:checked').val();
								let generalSearch = $('.generalSearch').val();
								let carSearchCity = $('.carSearchCity').children(\"option:selected\").val();
								let membershipPlan = $('.membershipPlan:checked').val();
								let earlyBooking = earlyBookingValue();
								let durationOfSubscription = $('.durationOfSubscription:checked').val();
								let subscriptionValueDuration = subscriptionValueDurationValue();
								let subscriptionValueDurationInArabic = 'أسبوعياً';
								if (subscriptionValueDuration == 30){
									subscriptionValueDurationInArabic = 'شهرياً';
								}
								else if (subscriptionValueDuration == 365){
									subscriptionValueDurationInArabic = 'سنوياً';
								}


								let financialValueDaily = $('.financialValueDaily').val();
								let financialValueWeekly = $('.financialValueWeekly').val();
								let displayOrdering = $('.displayOrdering:checked').val();
								let carBrand = $('.carBrand').children('option:selected').val();
								let carModel = $('.carType').children('option:selected').val();
								let carType = $('.carCategory').children('option:selected').val();
								let yearFrom = $('#yearFrom').val();
								let yearTo = $('#yearTo').val();
								let offset = $('.paginationValue').val();
								let price_period = $('.subscriptionValueDuration:checked').attr('data-period');
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
									//this.subscriptionValueDuration = subscriptionValueDuration;
									this.price_period = price_period;
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
								$.ajax({

									type:'POST',

									url: '".site_url('explore/search')."',

									data:{
										search_text:generalSearch,
										car_category:carClassification,
										book_period:durationOfSubscription,
										price_period:price_period,
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
										//console.log(data['status']);
										let availability = '';
										let reserveNow = '';
										$('.carListItemResponse').remove();

										if (data['data']['status'] == 1){
											$.each(data['data']['result'], function(i, item) {
												if (item['car_in_stock'] == 0){
													availability = 'style=\"background-color: rgb(132,132,132)\"';
													reserveNow = '<a href=\"#\"  class=\"btn btn-default\">احجز الآن</a>';
												}
												else if (item['car_in_stock'] == 1){
													if (item['car_status'] == 0){
														availability = 'style=\"background-color: rgb(230,1,1)\"';
														reserveNow = '<a href=\"#\"  class=\"btn btn-default\">احجز الآن</a>';
													}
													else if (item['car_status'] == 1){
														availability = 'style=\"background-color: rgb(61,145,16)\"';
														reserveNow = \"<a href='".site_url('book/addnew/')."\"+item['car_uid']+\"' class='btn btn-default'>احجز الآن</a>\";
													}
												}

												let carPriceRes = item['car_daily_price'];

												if (item['car_monthly_price']){
													carPriceRes = item['car_monthly_price'];
												}

												// if (subscriptionValueDuration == 7){
												// 	let carPriceFirstReq = carPriceRes * 7;
												// }
												calcaulateCarPriceBasedOnDuration();

												//carPriceRes = carPriceRes * subscriptionValueDuration;
											    $('.carListBE')
											        .append(\"<div class='carListItemResponse col-sm-12 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018' data-size='69'>\"+
														\"<div class='thumbnail-container'>\"+
															\"<div class='car-img'>\"+
																\"<img src='\"+item['image']+\"' class='img-fluid' />\"+
															\"</div>\"+
															\"<div class='car-price d-flex'>\"+
																\"<div class='price-car mr-auto' style='margin-top: 10px;'>\"+
																	
																	\"<span id='\"+item['cb_uid']+\"' class='value calculateCarPriceBasedOnDuration'>\"+carPriceRes+\"</span>\"+
																		\"<input type='hidden' class='car_daily_price' value='\"+carPriceRes+\"'>\"+
																		\"<span class='duration'>ريال \"+subscriptionValueDurationInArabic+\"</span>\"+
																\"</div>\"+
																
																\"<div class='carname d-flex'>\"+
																	\"<div class='ml-auto'>\"+
																		\"<h5><span style='font-weight: 500;'>\"+item['cb_uid']+\"</span>\"+ 
																		\"<span>\"+item['car_model_year']+\"</span></h5>\"+
																		\"<h6 style='float: left;'>\"+item['cm_uid']+\"</h6>\"+
																	\"</div>\"+
																\"</div>\"+
															\"</div>\"+
															\"<div class='car-price d-flex row'>\"+
																\"<div class='col-lg-12'>\"+
																	\"<span class='dot11' \"+availability+\"></span>\"+
																	
																	\"<div class='btn-reserve btn-reserve1'> \"+reserveNow+\"</div>\"+
																\"</div>\"+
															\"</div>\"+
														\"</div>\"+
													\"</div>\");
											});

											$('.pagin').show();
											if (data['data']['num_rows'] != 'null' && data['data']['num_rows'] > 0){
												let paginationCounter = data['data']['num_rows'] / 15;
												$('#pag_end').val(paginationCounter);
												// paginationCounter = 5;
												$('.paginationDrawResponse').empty();
												// console.log(paginationCounter);
												let i = 0;
												let count = 1;
												for (i; i < paginationCounter; i++) { 
													if (i == offset){
														$('.paginationDrawResponse').append('<li class=\"items updateSearchContent active\" value='+i+'><a href=\"#\">'+count+'</a></li>');
													}
													else{
													  	$('.paginationDrawResponse').append('<li class=\"items updateSearchContent \" value='+i+'><a href=\"#\">'+count+'</a></li>');
													}
													count++;
												}
												$('.items').click(function(){
													$('.paginationValue').val(this.value);
													$('li.items').removeClass('active');
													$(this).addClass('active');
													collectSearchParams();
													$([document.documentElement, document.body]).animate({
        scrollTop: $('.generalSearch').offset().top
    }, 2000);
												});
											}

											let lastValue = $('.calculateCarPriceBasedOnDuration').last().next().val();
											let durValue = $('.subscriptionValueDuration:checked').attr('data-value');
											$('.calculateCarPriceBasedOnDuration').last().html(lastValue * durValue);
										}
										else if (data['data']['status'] == 0){
											$('.carListBE')
											        .append('<div class=\"carListItemResponse row\" style=\"width:100%;\"><div class=\"col-lg-4 col-md-4\"></div><div class=\"col-lg-4 col-md-4\"><h5>'+ data[\"data\"][\"message\"]+'</h5></div></div>');
											$('.pagin').hide();
										}
										$('body').waitMe('hide');
									},

									error: function(data){

									}

								});
							}

							$('.fa-chevron-right').click(function(){
								let offsetValue = $('.paginationValue').val();
								let nextValue = parseInt(offsetValue) + 1;
								let pag_end = $('#pag_end').val();
								pag_end = Math.floor( pag_end );
								if (nextValue <= pag_end){
									offsetValue++;
									$('.paginationValue').val(offsetValue);
									$('li.items').removeClass('active');
									$( '.items' ).each(function( index ) {
										let itemValue = $( this ).val();
										if (itemValue == offsetValue){
											$(this).addClass('active');
										}
									});
									collectSearchParams();
									$([document.documentElement, document.body]).animate({
        scrollTop: $('.generalSearch').offset().top
    }, 2000);
								}
							});

							$('.fa-chevron-left').click(function(){
								let offsetValue = $('.paginationValue').val();
								if (offsetValue > 0){
									offsetValue--;
									$('.paginationValue').val(offsetValue);
									$('li.items').removeClass('active');
									$( '.items' ).each(function( index ) {
										let itemValue = $( this ).val();
										if (itemValue == offsetValue){
											$(this).addClass('active');
										}
									});
									collectSearchParams();
									$([document.documentElement, document.body]).animate({
        scrollTop: $('.generalSearch').offset().top
    }, 2000);
								}
							});

							function calcaulateCarPriceBasedOnDuration(){
								let valueDataNum = subscriptionValueDurationValue();
							    let valueData = 'أسبوعياً';
							    let car_daily_price = '';

							    if (valueDataNum == 7){
							    	valueData = 'أسبوعياً';
							    	car_daily_price = car_daily_price * 7;
							    }
							    else if (valueDataNum == 30){
							    	valueData = 'شهرياً';
							    	car_daily_price = car_daily_price * 30;
							    }
							    else if (valueDataNum == 365){
							    	valueData = 'سنوياً';
							    	car_daily_price = car_daily_price * 365;
							    }

							    $( '.calculateCarPriceBasedOnDuration' ).each(function() {
							    	car_daily_price = $(this).next().val();
							    	if (valueDataNum == 7){
								    	car_daily_price = car_daily_price * 7;
								    }
								    else if (valueDataNum == 30){
								    	car_daily_price = car_daily_price * 30;
								    }
								    else if (valueDataNum == 365){
								    	car_daily_price = car_daily_price * 365;
								    }

							    	// alert(car_daily_price);
								  	$(this).html(car_daily_price);
								});
							    $('.duration').html(' ريال ' + valueData);
							}

							// $( '.calculateCarPriceBasedOnDuration' ).each(function() {
							//   	$(this).html(car_daily_price * 7);
							// });

							// $('.subscriptionValueDuration').trigger('change');

							$('.subscriptionValueDuration').change(function(){
							    calcaulateCarPriceBasedOnDuration();
							});

							$( '.updateSearchContent' ).change(function() {
								$('.paginationValue').val(0);
								collectSearchParams();
								$('.carPriceAfterCal').html(Math.floor(Math.random()*(999-100+1)+100));
								let x = $('.subscriptionValueDuration:checked').next().html();
								$('.carDurationAfterCal').html('ريال ' + x);
								// console.log(result);
							});


							$('.clearFilters').click(function(){
								$('.generalSearch').val('');
								$('.carClassification').val(0);
								// $('.durationOfSubscription).val(0);
								$('.durationOfSubscription').prop('checked', false);
								$('#durationOfSubscription').prop('checked', true);
								$('.financialValueDaily').val(1000);
								$('.financialValueWeekly').val(0);
								$('.displayOrdering').prop('checked', false);
								$('#displayOrdering').prop('checked', true);
								$('.subscriptionValueDuration').prop('checked', false);
								$('#week1').prop('checked', true);
								$('.carBrand').val(0);
								$('.carType').val(0);
								$('.carCategory').val(0);
								$('#yearFrom').val(2019);
								$('#yearTo').val(2015);
								$('.paginationValue').val(0);
								// let carColor = [];
								$('.carColor').prop('checked', false);
								$('.gearBox').prop('checked', false);
								// $('#gearBox').prop('checked', true);
								yearSlider.noUiSlider.set([2016, 2020]);
								// priceSlider.noUiSlider.set([0, 1000]);
								// collectSearchParams();
								$([document.documentElement, document.body]).animate({
							        scrollTop: $('.generalSearch').offset().top
							    }, 2000);
							});

							/* navbar */

							$('#sidebarCollapse').on('click', function () {
								$('#sidebar').toggleClass('active');
							});

						});
						// $(window).bind('load', function() {
					 	//      $('.items').click(function(){
						// 		$('.paginationValue').val(this.value);
						// 		$('li.items').removeClass('active');
						// 		$(this).addClass('active');
						// 		$('#yearFrom').trigger('change');
						// 	});
						// });
						
						
					$('#brands').change(function() {
						var brands = $('#brands').val();
						if (brands != '') {
							var post_url = '".site_url('explore/getModels/')."' + brands;
							console.log(post_url);
							$.ajax({
								type: 'POST',
								url: post_url,
								success: function(categories) 
								{
									$('#models').empty();
									$('#models').append('<option value=\"0\">موديل السيارة</option>');
									if(categories != false){
										$.each(categories, function(key, value)
										{
											$('#models').append(value);
										});
									}else{
										$('#models').append('<option value=\"0\">موديل السيارة</option>');
									}


								}, 
								error: function(xhr, ajaxOptions, thrownError) {
									alert(xhr.status);
									alert(thrownError);
									alert('error');
								}
							}); 
						} else {
							$('#models').empty();
							
						}
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

