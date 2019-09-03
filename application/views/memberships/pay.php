<?php //print_r($_SESSION); ?>

<section>
	<div class="container mt-8">
		<div class="row">
			<div class="col-12 ">
				<div class="main-heading ">
					<h1>
						التأكيد و الدفع
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<section rol="form-reservation">
	<div class="container">

        <!-- reservation form -->

			
		<div class="reservation-form bg-secondary" style="border-radius: 5px 5px 5px 5px;">

			<form id="confirm-membership">


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
							<div class="col-sm-12">
								<h4 class="text-center text-muted"> أدخل بيانات البطاقة</h4>
								<div class="checkout">
									<div class="cardvisa d-none d-sm-block">

										<div class="card__wrapper mb-4">

										</div>
										<div class="form-group secure">
													<input type="text" name="number" id="number" class="jp-card-valid card__number form-control" placeholder="رقم بطاقة الإئتمان"/>
													<span> <img src="<?= base_url()."assets/".$direction; ?>/images/secure.png" alt=""> </span> </div>
												<div class="form-group">
													<input type="text" name="name" id="name" class="card__name form-control" placeholder="الاسم كما فى البطاقة"/>
												</div>
												<div class="form-row">

													<div class="col-sm-6">
														<input placeholder="MM/YY" type="text" name="expiry" class="jp-card-valid form-control mb-2 mr-sm-2">
													</div>
													<div class="col-6 cvc">
														<input type="text" name="cvc" id="cvc" class="card__cvc form-control mb-2 mr-sm-2" placeholder="CVC"/>
														<span> <img src="<?= base_url()."assets/".$direction; ?>/images/card.png" alt=""> </span> </div>
												</div>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
					<div class="col-sm-6">
						
							<div class=" col-md-12  col-sm-12 mx-sm-auto ">
								<div class="row">



									<table class="table mb-0">
										<tbody>
											<tr>
												<td class="text-left">سعر أشتراك العضوية <?= $row->mc_name ?> لمدة <?= $period_value ?>
												</td>
												<td class="text-right">
													<span>
														<?= $row->$period ?>
													</span> ر.س.</td>
											</tr>
											<tr>
												<td class="text-left">ضريبة القيمه المضافة 5%
												</td>
												<td class="text-right">
													<span id="tax-total">
														<?php echo ($row->$period / 100) * 5 ?>
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

										<?php
										$total_with_cash = $row->$period + CASH_PAYMENT_FEES + (($row->$period / 100) * 5); 
										$total_without_cash = $row->$period + (($row->$period / 100) * 5); 

										?>
										<input type="hidden" id="total_with_cash" name="total_with_cash" value="<?= $total_with_cash ?>" />
										<input type="hidden" id="total_without_cash" name="total_without_cash" value="<?= $total_without_cash ?>" />
										<tfoot>
											<tr>
												<td class="text-left ">
													<h3><strong>الاجمالى: </strong></h3>
												</td>
												<td class="text-right">
													<h4><strong class="total-price"><?= $total_without_cash ?> </strong> ر.س. سعودى</h4>
													<input type="hidden" name="period" value="<?= $period ?>" />
													<input type="hidden" name="total" value="<?= $row->$period ?>" />
													<input type="hidden" name="mc_uid" value="<?= $row->mc_uid ?>" />
												</td>
											</tr>
										</tfoot>
									</table>						
								</div>
							</div>
							<div class="col-sm-12 text-center mt-4 ">
								<p class="" style="color: #000">بالضغط على " تأكيد الأشتراك " أنت توافق على <a href="<?= site_url('terms_and_conditions') ?>" target="_blank" style="text-decoration: underline; color: #01355d">شروط الاستخدام </a> و <a href="<?= site_url('privcy_policy') ?>" target="_blank" style="text-decoration: underline; color: #01355d">سياسة الخصوصية </a></p>
							</div>
							<div class="col-sm-12 text-center ">
								<button class="btn btn-default  mb-2" id="paynow">تأكيد الأشتراك</button>
							</div>
						
						
						
						
					</div>
					
				
			</div>

			
		</form>
		</div>

	</div>
</section>

<!-- footer -->