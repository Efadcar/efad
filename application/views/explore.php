<style type="text/css">
	.btn-default:hover {
		background: #003a5c !important;
	}
</style>

<section  class="p-0 border-top pt-10">
	<div class="container-fluid ">
		<div class="row ">
			<div class="col-sm-3">
				<div class="row no-gutters">
					<div class="col-6 col-xs-6 ">
						<div class="cars-many"> <span>3000</span> <span>سيارة</span> </div>
					</div>
					
					<div class="col-6 col-xs-6 ">
						<a href="<?= site_url('branches') ?>">
							<div class="cars-branch"> <span>4</span> <span>مدن</span> </div>
						</a>
					</div>
					
				</div>
				<div class="row">
					<div class="button-mobile-container button-mobile-fixed">
						<div class="button-mobile">بحث تفصيلى</div>
					</div>
					<div class="col-12 search-option mt-2 scrollbar" id="style-1">
						<div class="button-mobile-container button-mobile-close">
							<div class="button-mobile">مشاهدة</div>
						</div>
						<h4><i class="fa fa-filter"></i> بحث متقدم </h4>
						<!--
						<div class="col-md-12 col-sm-12 pt-2">
							<span class="labelh pb-2">خطة العضوية</span>
							<div class="radio-group d-flex planname" role="group">
								<input type="radio" class="updateSearchContent membershipPlan" id="blueplan" data-filter=".blueplan" name="selector" value="5" checked>
								<label for="blueplan" class="blueplan">زرقاء</label>
								<input type="radio" class="updateSearchContent membershipPlan" id="greenplan" name="selector" data-filter=".greenplan" value="10">
								<label for="greenplan" class="greenplan">خضراء</label>
								<input type="radio" class="updateSearchContent membershipPlan" id="redplan" data-filter=".redplan" name="selector" value="15">
								<label for="redplan" class="redplan">حمراء</label>
							</div>
						</div>
						-->

						<!-- <div class="col-md-12 col-sm-12 pt-2">
							<div class=" justify-content-between">
								<span class="labelh ">الحجز المبكر</span>
								<div class="btn-switch">
									<input type="radio" id="yes" name="switch" class="btn-switch__radio btn-switch__radio_yes updateSearchContent" value="0" />
									<input type="radio" checked id="no" name="switch" class="btn-switch__radio btn-switch__radio_no updateSearchContent" value="1" />
									<label for="yes" class="btn-switch__label btn-switch__label_yes"><span class="btn-switch__txt"></span></label>
									<label for="no" class="btn-switch__label btn-switch__label_no"><span class="btn-switch__txt"></span></label>
								</div>
							</div>
							<span class="text-mutedd small pt-2"> أحصل على 5 % كخصم إضافية عند إجراء الحجز المبكر </span> 
						</div> -->
						<div class="col-md-12 col-sm-12 pt-2">
							<span class="labelh py-2">مدة الاشتراك</span>
							<!--  Custom Radio Buttons  -->
							<div class="row">
								<div class="col-lg-12">
									<label class="customButton">أقل من 6 شهور
									<input type="radio" id="durationOfSubscription" checked="checked" name="month" class="updateSearchContent durationOfSubscription" value="0">
									<span class="checkmark"></span>
									</label>
								</div>
								<div class="col-lg-12">
									<label class="customButton">أكثر من 6 شهور
									<input type="radio" name="month" class="updateSearchContent durationOfSubscription" value="1">
									<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<!--
								<div class="car_btn car-y">
									<p class="fieldset">
										<input type="radio" name="year"  value="day" id="day">
										<label for="day" class="less-month"> أقل من 6 شهور</label>
										<input type="radio" name="year" value="month"  id="month">
										<label for="month" class="more-month">أكثر من 6 شهور</label>
										<input type="radio" name="year" value="year"  id="year">
										<label for="year" >سنوي</label>
									</p>
								</div>
								-->
						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<span class="labelh py-2">عرض قيمة الإشتراك لمدة</span>
							<div class="car_btn car-y">
								<p class="fieldset">
									<!--
										<input type="radio" name="day1"  value="day1" id="day1"  >
										<label for="day1" class="day"> يومى</label>
										-->
									<input type="radio" name="year1" data-value="7" value="week1"  id="week1" class=" subscriptionValueDuration" checked>
									<label for="week1" class="week">أسبوع</label>
									<input type="radio" name="year1" data-value="30" value="month1" id="month1" class=" subscriptionValueDuration" >
									<label for="month1" class="month"> شهر</label>
									<input type="radio" name="year1" data-value="365" value="year1"  id="year1" class=" subscriptionValueDuration" >
									<label for="year1" class="year">سنة</label>
								</p>
							</div>

						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<span class="labelh py-2">عرض السعر</span>

							<div col-lg-12>
								من
									&nbsp;<input type="text" name="week1" value="" id="priceTo" class="item8000 updateSearchContent financialValueWeekly" disabled>&nbsp;&nbsp;&nbsp;&nbsp;
								إلى
									&nbsp;<input type="text" name="day1"  value="" id="priceFrom" class="item2000 updateSearchContent financialValueDaily" disabled >

							</div>
							<div id="nouislider-slider-cash-range" class="mt-2"></div>
						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<span class="labelh py-2">ترتيب</span>
							<!--  Custom Radio Buttons  -->
							<div class="row">
								<div class="col-lg-12">
									<label class="customButton">من الأقل قيمة إلى الأعلى
									<input type="radio" checked="checked" name="highvalue" class="updateSearchContent displayOrdering" id="displayOrdering" value="ASC">
									<span class="checkmark"></span>
									</label>
								</div>
								<div class="col-lg-12">
									<label class="customButton">من الأعلى قيمة إلى الأقل
									<input type="radio" name="highvalue" class="updateSearchContent displayOrdering" value="DESC">
									<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<div class="select-wrapper">
								<select id="brands" data-placeholder="ماركة السيارة" class="form-control width100p updateSearchContent carBrand select-car">
									<option value="0">ماركة السيارة</option>
									<?php
									if($brands != false)
									foreach($brands as $brand){
									?>
									<option value="<?= $brand->cb_uid ?>"><?= $brand->cb_name ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<div class="select-wrapper">
								<select id="models" data-placeholder="أختر شكل السيارة" class="form-control width100p updateSearchContent carType select-car">
									<option value="0">موديل السيارة</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<div class="select-wrapper">
								<select data-placeholder="أختر شكل السيارة" class="form-control width100p updateSearchContent carCategory select-car">
									<option value="0">نوع السيارة</option>
									<?php
									if($types != false)
									foreach($types as $type){
									?>
									<option value="<?= $type->ct_uid ?>"><?= $type->ct_name ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 pt-2 mb-5">
							<span class="labelh py-2">سنة الصنع</span>
							<!-- <input type="text" class="js-range-slider updateSearchContent" value="" /> -->
							<div id="nouislider-slider"></div>
							<input id="yearFrom" type="hidden" class="updateSearchContent">
							<input id="yearTo" type="hidden" class="updateSearchContent">
						</div>
						<div class="col-md-12 col-sm-12 pt-2" >
							<span class="labelh py-2">لون السيارة</span>
							<div class="custom-radios">
								
								<?php
								if($colors != false)
								foreach($colors as $color){
								if($color->cco_uid == 15){
								?>
								<div>
									<input type="checkbox" id="color_<?= $color->cco_uid ?>" class="updateSearchContent carColor" value="<?= $color->cco_uid ?>" >
									<label for="color_<?= $color->cco_uid ?>"> <span style="background-image: url('assets/rtl/images/cw.jpg')"> <i class="fa fa-check <?php if($color->cco_meta_desc == "#ffffff"){echo "blackCheck";} ?>"></i> </span> </label>
								</div>
								<?php }else{ ?>
								<div>
									<input type="checkbox" id="color_<?= $color->cco_uid ?>" class="updateSearchContent carColor" value="<?= $color->cco_uid ?>" >
									<label for="color_<?= $color->cco_uid ?>"> <span style="background-color: <?= $color->cco_meta_desc ?>"> <i class="fa fa-check <?php if($color->cco_meta_desc == "#ffffff"){echo "blackCheck";} ?>"></i> </span> </label>
								</div>
								<?php }} ?>
								
								
							</div>
						</div>
						<div class="col-md-12 col-sm-12 pt-2">
							<span class="labelh py-2">ناقل الحركة</span>
							<!--  Custom Radio Buttons  -->
							<div class="row">
								<div class="col-lg-12">
									<label class="customButton">أتوماتيك
									<input type="radio" id="gearBox" class="updateSearchContent gearBox" name="automanual" value="auto">
									<span class="checkmark"></span>
									</label>
								</div>
								<div class="col-lg-12">
									<label class="customButton">عادي
									<input type="radio" class="updateSearchContent gearBox" name="automanual" value="manual">
									<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
						<!--
							<div class="col-lg-12" style="font-size: 18px;color: #2c343e">ناقل الحركة</div>
							<div class="col-lg-12">
								<label class="customButton" style="margin:0 45px 0 10px">أتوماتيك
								  <input type="radio" checked="checked" name="highvalue">
								  <span class="checkmark"></span>
								</label>

								<label class="customButton" style="margin:0 10px">عادى
								  <input type="radio" name="highvalue">
								  <span class="checkmark"></span>
								</label>
							</div>
							-->
						<!--
							<div class="col-md-12 col-sm-12 pt-1">
								<div class="select-wrapper">
									<select id="select-country" data-placeholder="اتوماتيك" class="form-control width100p">
										<option >اتوماتيك</option>
										<option >مانويل</option>
									</select>
								</div>
							</div>
							-->
						<div class="col-lg-12 clearFilters">
							<div style="float: right;margin: 35px 0;">
								<i class="fas fa-sync" style="color: #003a5d;padding: 0 15px;cursor: pointer;"></i>
								<div class="" style="font-size: 18px;color: #2c343e;display: inline;">مسح الكل</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<!-- btns -->
				<div class="car_btn scroll">
					<div class="fieldset">
						<input type="radio" name="cartype" class="updateSearchContent carClassification" value="0" data-filter="all" id="c1" checked  >
						<label for="c1" class="all" >الكل</label>
						<input type="radio" name="cartype" class="updateSearchContent carClassification"  data-filter=".economic" value="economic" id="c2" >
						<label for="c2"  class="economic">الاقتصادية</label>
						<input type="radio" name="cartype" class="updateSearchContent carClassification" value="mini" data-filter=".mini" id="c4">
						<label for="c4" class="mini">الصغيرة</label>
						<input type="radio" class="updateSearchContent carClassification" name="cartype" value="medium"  data-filter=".small" id="c3">
						<label for="c3" class="small">المتوسطة</label>
						<input type="radio" class="updateSearchContent carClassification" name="cartype" value="big"   data-filter=".big" id="c5">
						<label for="c5" class="big">الكبيرة</label>
						<input type="radio" class="updateSearchContent carClassification" name="cartype" value="superior" data-filter=".superior" id="c6">
						<label for="c6" class="superior">الفخمة</label>
						<div class="animation start-home"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<input class="form-control mt-2 inp-inp updateSearchContent generalSearch" data-ref="input-search" type="search" placeholder="ابحث عن مواصفات سيارتك هنا:الماركة ,الموديل ,اللون,ناقل الحركة أو سمة الصنع .." aria-label="Search">
						<i class="fas fa-search sear-inp"></i>
						<!--
						<div class="select-wrapper select-wrapperNew" style="display: inline;">
							<select class="custom-select1 updateSearchContent carSearchCity" 
								data-placeholder="كل المدن">
								<option selected>كل المدن</option>
								<option value="1">الرياض</option>
								<option value="2">الرياض</option>
								<option value="3">الرياض</option>
							</select>
						</div>
						-->
					</div>
				</div>
				<div class="row ch-row-ch">
					<div class="col-lg-6">
						<p class="text-muted small pt-2"> * جميع الاسعار لا تشمل  ضريبة  القيمة المضافة 5% </p>
					</div>
					<div class="col-lg-6">
						<div class="color-dots pt-2">
							<span class="dot1"></span>
							<span class="dot100 dot101">متاح</span>
							<span class="dot3"></span>
							<span class="dot100 dot103">قريباً</span>
							<span class="dot4"></span>
							<span class="dot100 dot104">غير متاح</span>
						</div>
					</div>
				</div>
				<div class="product_list" data-ref="product_list" style="margin: 0 7px 0 26px;">
						<div class="row carListBE"></div>
						<div class="col-lg-12">
							<ul class="pagin">
								<li><i class="fas fa-chevron-right float-left"><a href="#"></a></i></li>
								<div class="text-center paginationDrawResponse">
									
								</div>
								<input type="hidden" class="paginationValue" value="0">
								<li><i class="fas fa-chevron-left float-right"><a href="#"></a></i></li>
							</ul>
						</div>
						
						
				</div>
			</div>
		</div>
	</div>
</section>
<!--
<section style="padding: 30px 40px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1>الآسئلة المكررة</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-sm-12 padl-25">
				<h3>ما هي أفضل فئة من فئات العضوية بالنسبة لي؟</h3>
				<p class="ques-text">تقدم " إفاد" فئات مختلفة من العضوية لتلبية احتياجات العملاء المختلفين. لذلك ألقي نظرة على مميزات وأسعار كل فئة من فئات العضوية وأختر ما يناسبك.</p>
			</div>
			<div class="col-lg-6 col-sm-12 padr-25">
				<h3>ما هي الطرق المتوفرة لدفع قيمة اشتراك العضوية؟</h3>
				<p class="ques-text">هناك 4 طرق لدفع قيمة اشتراك العضوية وهي:
					<br>الدفع الإلكتروني من خلال الموقع.
					<br> إجراء عملية تحويل إلى الحساب البنكي الخاص بالشركة.<br>
					التواصل مع فريق العناية بالعملاء ودفع المبلغ نقداً (كاش)، ولكن هناك رسوم إضافية على خدمة الدفع النقدي وقدرها 100 ريال.
				</p>
			</div>
			<div class="col-lg-6 col-sm-12 padl-25">
				<h3>هل أستطيع ترقية فئة العضوية؟</h3>
				<p class="ques-text">نعم تستطيع/ي ترقية فئة العضوية في أي وقت ويستغرق تفعيل العضوية الجديدة ثلاثة أيام عمل.</p>
			</div>
			<div class="col-lg-6 col-sm-12 padr-25">
				<h3>هل سيتم إعادة قيمة اشتراك العضوية في حال عدم أستخدمها؟</h3>
				<p class="ques-text">سيتم إعادة قيمة اشتراك العضوية كاملة ١٠٠٪ عند طلبك لها وفي حال عدم استخدامها مميزاتها</p>
			</div>
			<div class="col-lg-6 col-sm-12 padl-25">
				<h3>كيف أستطيع إلغاء اشتراك العضوية؟ وهل توجد رسوم في حال إلغاء الاشتراك؟</h3>
				<p class="ques-text">يمكنك القيام بذلك من خلال الدخول إلى حسابك وإلغاء اشتراك العضوية في أي وقت ولا يوجد رسوم على إلغاء الاشتراك.</p>
			</div>
			<div class="col-lg-6 col-sm-12 padr-25">
				<h3>هل يمكنني نقل عضويتي إلى شخص آخر؟</h3>
				<p class="ques-text">لا. إذا رغبت في عدم تجديد عضويتك الموظف، فلا تستطيع/ي نقل عضويتك لشخص آخر، ويحتاج هذا الشخص إلى بدء عضوية جديدة.</p>
			</div>
		</div>
	</div>
</section>

-->