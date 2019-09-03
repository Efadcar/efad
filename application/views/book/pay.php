<?php //print_r($_SESSION); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-12 ">
				<div class="main-heading ">
					<h1>
						<?= $pageTitle ?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<section rol="form-reservation">
	<div class="container  mb-2 pb-4">
        <div class="row">
            <div class="col-12"> <a href="#" class="btn btn-default cutom-btn active"> تفاصيل الاشتراك</a> <!--<a href="#" class="btn btn-default cutom-btn">الحجز المجانى</a> --> </div>
        </div>
        <div class="reservation-form  bg-secondary">
            <div class="row d-flex align-items-center ">
                <div class="col-sm-7">
                    <div class="carnamePay ml-2 text-left">
                        <h3>نوع السيارة : <span><?= $this->global_model->getStringByKeyLanguage($car->cb_uid->cb_name,"arabic") ?></span><span><?= $this->global_model->getStringByKeyLanguage($car->cm_uid->cm_name,"arabic") ?></span><span><?= $car->car_model_year ?></span></h3>
                       
                    </div>
					
					<ul class="cartype">
                        <li style="width: 24%">
                            <div class="cartype-logo"> <img alt="gear" src="<?= base_url()."assets/".$direction; ?>/images/gear-icon.png" /> </div>
                            <span ><?php if($car->car_transmission == "manual"){echo "يدوي";}else{echo "أوتوماتيك";} ?></span> </li>
                        <li style="width: 24%">
                            <div class="cartype-logo"> <img alt="bag" src="<?= base_url()."assets/".$direction; ?>/images/bag-icon.png" /> </div>
                            <span ><?= $car->car_bags ?> شنطة</span> </li>
                        <li style="width: 24%">
                            <div class="cartype-logo"> <img alt="persons" src="<?= base_url()."assets/".$direction; ?>/images/person-icon.png" /> </div>
                            <span ><?= $car->car_persons ?> أفراد</span> </li>
                        <li style="width: 24%">
                            <div class="cartype-logo"> <img alt="doors" src="<?= base_url()."assets/".$direction; ?>/images/door-icon.png" /> </div>
                            <span ><?= $car->car_doors ?> أبواب</span>
                    </ul>
					<br>
					<?php //print_r($current_booking); ?>
                    <ul class="cartype">
							
                        <li style="width: 24%">
                            <div class="cartype-logo"> مدة الاشتراك </div>
                            <span ><?= $current_booking['days'] ?>	<?php if($current_booking['days'] < 11){echo "أيام";}else{echo "يوم";} ?></span> 
						</li>
                        <li style="width: 24%">
                            <div class="cartype-logo"> تاريخ الاستلام  </div>
                            <span ><?= date("Y/m/d", strtotime($current_booking['book_start_date'])) ?></span> </li>
                        <li style="width: 24%">
                            <div class="cartype-logo"> تاريخ التسليم  </div>
                            <span><?= date("Y/m/d", strtotime($current_booking['book_end_date'])) ?></span> </li>
                        <li style="width: 24%">
                            <div class="cartype-logo"> مدينة الاستلام </div>
                            <span ><?= $this->global_model->getCityByID($current_booking['city_uid']) ?></span>
                    </ul>
                </div>
                <div class="col-sm-4 custom-margin-car-slider">
                    
                    <div class="car-img">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
							  <?php
								$albums = $this->global_model->getAlbumByID($car->album_uid);
								$i = 1;
								if($albums != false)
								foreach($albums as $album){
								?>
							<div class="carousel-item <?php if($i == 1){echo "active";} ?>">
							  <img class="d-block w-100" src="<?= base_url().ALBUMS_IMAGES.$album; ?>" alt="First slide">
							</div>
							  <?php $i++; } ?>
							
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" >
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
						
						
						
						<!--<img src="<?= base_url().ALBUMS_IMAGES.$car->main_image; ?>" class="img-fluid" /> --> </div>
                </div>
            </div>
        </div>
        <!-- reservation form -->

			
		<div class="reservation-form bg-secondary mt-2" style="border-radius: 5px 5px 5px 5px;">

			<form id="confirm-book">


			<!-- personal info -->
			<div class="row pt-1">
				<div class="col-sm-6">
					<h3>أختر طريقة الدفع</h3>
					<p style="font-size: 12px; color:#01355d;margin-top: -20px;">*جميع العضويات والاشتراكات لا تعتمد إلا بعد دفع المبالغ</p>
				</div>
				<div class="col-sm-6">
					<h3>تفاصيل الفاتورة</h3>
				</div>
				<div class="col-sm-6">
					<!-- 
					<div class="custom-control custom-radio col-sm-12 ml-4">
						<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="visa" checked>
						<label class="custom-control-label" for="customRadio1">
							<ul class="payment-img">
								<li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/mada.png" alt="مدى"/ ></span> </li>
								<li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/visa.png" alt="فيزا" /></span> </li>
								<li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/master.png" alt="ماستر كارد" /></span> </li>
							</ul>
						</label>
					</div>
					-->
					<div class="custom-control custom-radio col-sm-12 ml-4">
						<input type="radio" id="transfer" name="customRadio" class="custom-control-input" value="transfer" checked>
						<label class="custom-control-label" for="transfer">
							<ul class="payment-img custom-pay-img">
								<li> تحويل بنكي</li>
							</ul>
						</label>
					</div>
					<div class="row" id="transferInfo">
						<div class="col-sm-12 ml-5">
						<h5>حسابات شركة إفاد البنكية</h5>
							<!--
						<p>
							رقم حساب بنك الإنماء :<br>
							68202326900000<br><br>
							رقم حساب البنك الأهلي التجاري :<br>
							26900000231101
						</p>
						-->
						<p>
							رقم حساب  :<br>
							XXXXXXXXXXXXXXXXXXX<br><br>
						</p>
						</div>
					</div>
					<div class="custom-control custom-radio col-sm-12 ml-4">
						<input type="radio" id="cash" name="customRadio" class="custom-control-input" value="cash">
						<label class="custom-control-label" for="cash">
							<ul class="payment-img custom-pay-img">
								<li> نقدي (كاش) <span style="color: red">* <?= CASH_PAYMENT_FEES ?> ر.س. إضافية</span> </li>
							</ul>
						</label>
					</div>
					
					<div class="row" id="paymentCard">
						<div class="col-sm-9 ">
							<h4 class="text-left text-muted"> أدخل بيانات البطاقة</h4>
							<div class="checkout">
								<div class="cardvisa d-none d-sm-block">

									<div class="card__wrapper mb-4">

									</div>
									<div class="form-group secure">
										<input type="text" name="number" id="number" class="jp-card-valid card__number form-control" placeholder="رقم بطاقة الإئتمان"/>
										<span> <img src="<?= base_url()."assets/".$direction; ?>/images/secure.png" alt=""> </span> 
									</div>
									<div class="form-group">
										<input type="text" name="name" id="name" class="card__name form-control" placeholder="الاسم كما فى البطاقة"/>
									</div>
									<div class="form-row">

										<div class="col-sm-6">
											<input placeholder="MM/YY" type="text" name="expiry" class="jp-card-valid form-control mb-2 mr-sm-2">
										</div>
										<div class="col-6 cvc">
											<input type="text" name="cvc" id="cvc" class="card__cvc form-control mb-2 mr-sm-2" placeholder="CVC"/>
											<span> <img src="<?= base_url()."assets/".$direction; ?>/images/card.png" alt=""> </span> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class=" col-md-12  col-sm-12 mx-sm-auto ">
						<div class="row">

							<table class="table mb-5">
								<tbody>
									<!-- 
									<tr>
										<td class="text-left">  سعر الحجز الاساسي  لليوم
										</td>
										<td class="text-right"><span><?= $car->car_yearly_price ?></span> ر.س.</td>
									</tr>
									-->
									<tr>
										<td class="text-left">سعر الاشتراك
										</td>
										<td class="text-right"><span><?= $current_booking['total_fees'] ?></span> ر.س.</td>
									</tr>
									<?php if($current_booking['free_day'] != 0){ ?>
									<tr>
										<td class="text-left">خصم الأيام المجانية بسبب مدة الاشتراك
										</td>
										<td class="text-right">- <span><?= $current_booking['free_day'] * $current_booking['daily_rate_after_discount'] ?></span> ر.س.</td>
									</tr>
									<?php } ?>
									<?php if($this->global_model->isFirstBooking($this->session->userdata('member_uid'))){ 
										$first_booking = 1;
									?>
									<!--<tr>
										<td class="text-left">خصم بسبب الاشتراك لأول مرة مع إفاد
										</td>
										<td class="text-right">- <span><?= $current_booking['daily_rate_after_discount'] ?></span> ر.س.</td>
									</tr> -->
									<?php }else{ $first_booking = 0;} ?>
									<?php if($current_booking['early_booking'] != 0){ ?>
									<tr>
										<td class="text-left">خصم الحجز المبكر
										</td>
										<td class="text-right">- <span><?= $current_booking['early_booking_discount_total'] ?></span> ر.س.</td>
									</tr>
									<?php } ?>
									<tr>
										<td class="text-left">ضريبة القيمه المضافة 5% للخدمة
										</td>
										<td class="text-right"><span id="tax-total"><?= $current_booking['tax_total'] ?></span> ر.س.</td>
									</tr>


									<tr class="cash-fees-tr">
										<td class="text-left"> رسوم الدفع النقدي للخدمة
										</td>
										<td class="text-right">
											<span id="tax-total">
												<?= CASH_PAYMENT_FEES ?>
											</span> ر.س.</td>
									</tr>
								</tbody>

							</table>
							<?php //print_r($_SESSION); ?>
							<table class="table mb-0">
								<?php if($_SESSION['current_booking']['new_member'] != 0){ ?>
								<tbody>
									<tr>
										<td class="text-left">رسوم اشتراك العضوية الحمراء
										</td>
										<td class="text-right">
											<span>
												<?= RED_MEMBERSHIP_YEARLY_FEES ?>
											</span> ر.س.</td>
									</tr>
									<tr>
										<td class="text-left">ضريبة القيمه المضافة 5% للعضوية
										</td>
										<td class="text-right">
											<span id="tax-total">
												<?php echo (RED_MEMBERSHIP_YEARLY_FEES / 100) * 5 ?>
											</span> ر.س.</td>
									</tr>
									<tr class="cash-fees-tr">
										<td class="text-left">
											 رسوم الدفع النقدي للعضوية
										</td>
										<td class="text-right">
											<span id="tax-total">
												<?= CASH_PAYMENT_FEES ?>
											</span> ر.س.</td>
									</tr>
								</tbody>
								<?php } ?>

								<?php
								if($current_booking['new_member'] != 0){
									$total_with_cash = $current_booking['total_fees_after_tax'] + (CASH_PAYMENT_FEES * 2) + RED_MEMBERSHIP_YEARLY_FEES + ((RED_MEMBERSHIP_YEARLY_FEES / 100) * 5 );
									$total_without_cash = $current_booking['total_fees_after_tax'] + RED_MEMBERSHIP_YEARLY_FEES + ((RED_MEMBERSHIP_YEARLY_FEES / 100) * 5 );
								}else{
									$total_with_cash = $current_booking['total_fees_after_tax'] + CASH_PAYMENT_FEES;
									$total_without_cash = $current_booking['total_fees_after_tax'];
								}
								/*
								if($first_booking != 0){
									$total_with_cash = $current_booking['total_fees_after_tax'] + CASH_PAYMENT_FEES  - $current_booking['daily_rate_after_discount'];
									$total_without_cash = $current_booking['total_fees_after_tax'] - $current_booking['daily_rate_after_discount'];
								}
								*/
								?>
								<input type="hidden" id="total_with_cash" name="total_with_cash" value="<?= $total_with_cash ?>" />
								<input type="hidden" id="total_without_cash" name="total_without_cash" value="<?= $total_without_cash ?>" />
								<tfoot>
									<tr>
										<td class="text-left ">
											<h3>المبلغ الإجمالي </h3>
										</td>
										<td class="text-right">
											<h4><span class="total-price"><?= $total_without_cash ?> </span> ر.س.</h4>
										</td>
									</tr>
								</tfoot>
							</table>						
						</div>
					</div>
					<div class="col-sm-12 text-center mt-4 ">
						<p class="" style="color: #000">بالضغط على " تأكيد الحجز " أنت توافق على <a href="<?= site_url('terms_and_conditions') ?>" target="_blank" style="text-decoration: underline; color: #01355d">شروط الاستخدام </a> و <a href="<?= site_url('privcy_policy') ?>" target="_blank" style="text-decoration: underline; color: #01355d">سياسة الخصوصية </a></p>
					</div>
					<div class="col-sm-12 text-center ">
						<button class="btn btn-default pl-4 pr-4 mb-2 mt-4" id="paynow">تأكيد الحجز</button>
					</div>
				</div>
				
			</div>

			<!-- card -->


		</form>
		</div>

	</div>
</section>

<!-- footer -->