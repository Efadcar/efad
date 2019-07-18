<section>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1 >أحجز الآن</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section rol="form-reservation">
    <div class="container  mb-2 pb-4">
        <div class="row">
            <div class="col-12"> <a href="#" class="btn btn-default cutom-btn active">أستكمال بيانات الحجز</a> <!--<a href="#" class="btn btn-default cutom-btn">الحجز المجانى</a> --> </div>
        </div>
        <div class="reservation-form  bg-secondary">
            <div class="row d-flex align-items-center ">
                <div class="col-sm-4 ">
                    <div class="carname d-flex ">
                        <h2><span><?= $this->global_model->getStringByKeyLanguage($car->cb_uid->cb_name,"arabic") ?></span> <span><?= $car->car_model_year ?></span></h2>
                        <h3><?= $car->car_model_name ?></h3>
                    </div>
                    <ul class="cartype">
                        <li>
                            <div class="cartype-logo"> <img alt="gear" src="<?= base_url()."assets/".$direction; ?>/images/gear-icon.png" /> </div>
                            <span ><?php if($car->car_transmission == "manual"){echo "يدوي";}else{echo "أوتوماتيك";} ?></span> </li>
                        <li>
                            <div class="cartype-logo"> <img alt="bag" src="<?= base_url()."assets/".$direction; ?>/images/bag-icon.png" /> </div>
                            <span ><?= $car->car_bags ?> شنطة</span> </li>
                        <li>
                            <div class="cartype-logo"> <img alt="persons" src="<?= base_url()."assets/".$direction; ?>/images/person-icon.png" /> </div>
                            <span ><?= $car->car_persons ?> أفراد</span> </li>
                        <li>
                            <div class="cartype-logo"> <img alt="doors" src="<?= base_url()."assets/".$direction; ?>/images/door-icon.png" /> </div>
                            <span ><?= $car->car_doors ?> أبواب</span>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <div class="price-car text-right"> </div>
                    <div class="car-img"> <img src="<?= base_url().ALBUMS_IMAGES.$car->main_image; ?>" class="img-fluid" /> </div>
                </div>
                <div class="col-sm-4 text-center"> <span id="daily-rate" class="value"><?= $car->car_daily_price ?></span> <span class="duration">ريال فى اليوم</span> </div>
            </div>
        </div>
        <!-- reservation form -->
        
        <div class="reservation-form">
            <div class="date-reserve mb-4">
                <h3> أدخل بيانات الحجز </h3>
                <div class="row d-flex align-items-center">
                    <div class="col-sm-8" >
						<form id="book-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
									<label>اختر تاريخ أستلام السيارة</label>
                                    <input type="text" id="date-start" class="form-control floating-label" placeholder="اختر تاريخ أستلام السيارة" name="book_start_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
									<label>اختر تاريخ تسليم السيارة</label>
                                    <input type="text" id="date-end" class="form-control floating-label freeend" placeholder="اختر تاريخ تسليم السيارة" name="book_end_date">
                                </div>
                            </div>
							<input type="hidden" name="mc_uid" value="<?= $this->session->userdata('mc_uid') ?>" />
							<input type="hidden" name="car_uid" value="<?= $car->car_uid ?>" />
							<input type="hidden" name="member_uid" value="<?= $this->session->userdata('member_uid') ?>" />
                        </div>
						</form>
                    </div>
                    <div class="col-sm-4 text-center ">
                        <h3 class="mb-0 pr-2">السعر الاجمالى</h3>
                        <span class="value total-price">0</span><span id="currency">ريال</span> 
					</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="form-group">
						<label>اختر مدينة أستلام السيارة</label>
                        <div class="select-wrapper">
							
                            <select id="inputStatebook" class="form-control width100p " name="delivery_city_uid">
                                <option > اختر مدينه </option>
								<?php
								$cities = $this->global_model->getCitiesByCountryID();
								if($cities != false)
								foreach($cities as $r){
								?>
								
								
								<option value='<?= $r->city_uid ?>'><?= $r->city_name_ar ?></option>
								
								<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- personal info -->
			<?php $is_logged_in = $this->session->userdata('is_logged_in'); 
			if(!isset($is_logged_in) && $is_logged_in == 0){ ?>
            <div class="row mt-3 bg-secondary pt-3">
                <div class="col-sm-12">
                    <h3>أدخل بياناتك الشخصية</h3>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="الأسم الاول" name="fname">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="الأسم الأخير" name="lname">
                    </div>
                </div>
            </div>
            
            <div class="row bg-secondary">
                <div class="col-sm-4">
                    <div class="form-group">
						<select name="country" id="countries2" style="width:100%;">
							<?php
							$countries = $this->global_model->getAllCountries();
							if($countries != false)
							foreach($countries as $r){
							?>


							<option value='<?= $r->id ?>' data-image="FLAGS_IMAGES" data-imagecss="flag <?= strtolower($r->iso) ?>" data-title="<?= "(+".$r->phonecode.") ".$r->name ?>"><?= $r->name ?></option>

							<?php } ?>


						</select>
					</div>
					
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
						<select id="inputState2" class="form-control inputState" name="city">
							<option value="0">أختار مدينة</option>
							<?php
							$cities = $this->global_model->getCitiesByCountryID();
							if($cities != false)
							foreach($cities as $r){
							?>


							<option value='<?= $r->city_uid ?>'><?= $r->city_name_ar ?></option>

							<?php } ?>
						</select>
					</div>
					
					
					
                </div>
            </div>
            <!-- mobile -->
            <div class="row bg-secondary">
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="email" class="form-control " id="mail" placeholder="البريد الإلكتروني" name="email">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input id="phone2" type="tel" class="form-control tel " name="mobile">
                    </div>
                </div>
            </div>
			
            <!-- password -->
            <div class="row bg-secondary">
                <div class="col-sm-4">
					<div class="input-group">
						<input type="password" class="form-control password-field" name="pwd" placeholder="كلمة المرور">
						<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
						</div>
					</div>

                </div>
                <div class="col-sm-4">
					<div class="input-group">
						<input type="password" class="form-control password-field2" name="pwd1" placeholder="تأكيد كلمة المرور">
						<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field2" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
						</div>
					</div>
                </div>
            </div>
			
			<!-- Memberships -->
			<div class="row bg-secondary mt-3">
                <div class="col-sm-4">
                    <div class="form-group">
						<select class="form-control" name="mc" id="mc_uid">
							<option value="">أختر العضوية</option>
							<option value="2">العضوية الخضراء</option>
							<option value="3">العضوية الحمراء</option>
						</select>
					</div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
						<select class="form-control" name="mc_price">
							<option value="mc_12months_price">أشتراك سنوي</option>
						</select>
					</div>
                </div>
            </div>
			
			<!-- payment -->
            <?php } ?>
            <div class="row pt-5">
                <div class="col-sm-12">
                    <h3>طرق الدفع</h3>
                </div>
                <div class="custom-control custom-radio col-sm-12 ml-4">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="visa">
                    <label class="custom-control-label" for="customRadio1">
                    <ul class="payment-img">
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/mada.png" alt="مدى"/ ></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/visa.png" alt="فيزا" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/master.png" alt="ماستر كارد" /></span> </li>
                    </ul>
                    </label>
                </div>
                <div class="custom-control custom-radio col-sm-12 ml-4">
                    <input type="radio" id="cash" name="customRadio" class="custom-control-input" value="cash">
                    <label class="custom-control-label" for="cash">
                    <ul class="payment-img">
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/cash.png"  alt="نقدى" ></span><span class="text-muted">(<?= CASH_PAYMENT_FEES ?> ريال إضافية)</span> </li>
                    </ul>
                    </label>
                </div>
            </div>
            
            <!-- card -->
            
            <div class="row" id="paymentCard">
                <div class="col-sm-5 mx-auto">
                    <h4  class="text-center text-muted"> أدخل بيانات البطاقة</h4>
                    <div class="checkout">
                        <div class="cardvisa d-none d-sm-block">
                            <div class="card__wrapper" >
                                <form action="javascript:void(0);" class="card__form">
                                    <div class="form-group secure">
                                        <input type="text" name="number" id="number" class="card__number form-control" placeholder="رقم بطاقة الإئتمان" />
                                        <span> <img src="<?= base_url()."assets/".$direction; ?>/images/secure.png" alt=""> </span> </div>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="card__name form-control" placeholder="الاسم كما فى البطاقة" />
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">
                                            <div class="select-wrapper">
                                                <select id="select-car" data-placeholder="شهر" class="form-control">
                                                    <option>شهر</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"><span class="text-muted">/</span></div>
                                        <div class="col-sm-3">
                                            <div class="select-wrapper">
                                                <select id="select1" data-placeholder="سنة" class="form-control ">
                                                    <option>سنة</option>
                                                    <option>2022</option>
                                                    <option>2032</option>
                                                    <option>2019</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5 cvc">
                                            <input type="text" name="cvc" id="cvc" class="card__cvc form-control mb-2 mr-sm-2" placeholder="CVC" />
                                            <span> <img src="<?= base_url()."assets/".$direction; ?>/images/card.png" alt=""> </span> </div>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="  col-sm-6 mx-sm-auto ">
                    <div class="row">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-left"><em>سعر الحجز الاساسى</em></td>
                                    <td class="text-right"><span id="total-fees">0</span> ريال</td>
                                </tr>
                                <tr id="free-day">
                                    <td class="text-left"><em>خصم يوم بسبب مدة الحجز</em></td>
                                    <td class="text-right">- <span id="free-day-fees">0</span> ريال</td>
                                </tr>
                                <tr id="early-booking">
                                    <td class="text-left"><em>خصم الحجز المبكر</em></td>
                                    <td class="text-right">- <span id="early-booking-fees">0</span> ريال</td>
                                </tr>
                                <tr id="green-div">
                                    <td class="text-left"><em>مصاريف أشتراك العضوية الخضراء</em></td>
                                    <td class="text-right">+ <span><?= GREEN_MEMBERSHIP_YEARLY_FEES ?></span> ريال</td>
                                </tr>
                                <tr id="red-div">
                                    <td class="text-left"><em>مصاريف أشتراك العضوية الحمراء</em></td>
                                    <td class="text-right">+ <span><?= RED_MEMBERSHIP_YEARLY_FEES ?></span> ريال</td>
                                </tr>
                                <tr>
                                    <td class="text-left"><em>ضريبة القيمه المضافة 5%</em></td>
                                    <td class="text-right">+ <span id="tax-total">0</span> ريال</td>
                                </tr>
                                <tr id="cash-fees">
                                    <td class="text-left"><em>مصاريف الدفع النقدي</em></td>
                                    <td class="text-right">+ <span id="tax-total"><?= CASH_PAYMENT_FEES ?></span> ريال</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-left "><h3><strong>الاجمالى: </strong></h3></td>
                                    <td class="text-right"><h4><strong class="total-price">0 </strong> ريال سعودى</h4></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12 text-center mt-4 ">
                    <p class="text-muted">بالضغط على تأكيد الدفع أنت توافق على <a href="*">الشروط و الآحكام </a> و <a href="#">سياسة الخصوصية </a></p>
                </div>
                <div class="col-sm-12 text-center ">
                    <button class="btn btn-default  mb-2" id="paynow" >دفع و تأكيد الحجز</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer -->
