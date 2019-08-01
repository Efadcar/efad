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
					<h3>أختار طريقة الدفع</h3>
				</div>
				<div class="col-sm-6">
					<h3>تفاصيل الفاتورة</h3>
				</div>
					<div class="col-sm-6">
						
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
						<div class="custom-control custom-radio col-sm-12 ml-4">
							<input type="radio" id="cash" name="customRadio" class="custom-control-input" value="cash">
							<label class="custom-control-label" for="cash">
								<ul class="payment-img">
									<li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/cash.png"  alt="نقدى" ></span><span class="text-muted">(<?= CASH_PAYMENT_FEES ?> ريال إضافية)</span> </li>
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
												<td class="text-left">مصاريف أشتراك العضوية <?= $row->mc_name ?>
												</td>
												<td class="text-right">+
													<span>
														<?= $row->$period ?>
													</span> ريال</td>
											</tr>
											<tr>
												<td class="text-left">ضريبة القيمه المضافة 5% للعضوية
												</td>
												<td class="text-right">+
													<span id="tax-total">
														<?php echo ($row->$period / 100) * 5 ?>
													</span> ريال</td>
											</tr>
											<tr class="cash-fees-tr">
												<td class="text-left">
													 مصاريف الدفع النقدي للعضوية
												</td>
												<td class="text-right">+
													<span id="tax-total">
														<?= CASH_PAYMENT_FEES ?>
													</span> ريال</td>
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
													<h4><strong class="total-price"><?= $total_without_cash ?> </strong> ريال سعودى</h4>
													<input type="hidden" name="period" value="<?= $period ?>" />
													<input type="hidden" name="total" value="<?= $row->$period ?>" />
													<input type="hidden" name="mc_uid" value="<?= $row->mc_uid ?>" />
												</td>
											</tr>
										</tfoot>
									</table>						
								</div>
							</div>
							<div class="col-sm-12 text-center ">
								<button class="btn btn-default  mb-2" id="paynow">تأكيد الحجز</button>
							</div>
						
						
						
						
					</div>
					
				
			</div>

			
		</form>
		</div>

	</div>
</section>

<!-- footer -->