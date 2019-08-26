<section class="mt-8">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <h1 >مميزات العضوية</h1>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <p>استمتع بمكتبة ضخمة من أفلام هوليوود وبوليوود ومسلسلات STARZ الأساسية، مجانًا بالكامل خلال الست أشهر الأولى*. لتفعيل العرض، أرسل. تكلفة الاشتراك في خدمة STARZPLAY بعد انتهاء الفترة المجانية درهمًا/شهريًا، للإلغاء في أي وقت 
                        استمتع‭ ‬باستخدام‭ ‬دقائق‭ ‬مكالماتك‭ ‬وبياناتك‭ ‬المحلية‭ ‬خارج‭ ‬الدولة‭ ‬ابتداءً‭ ‬من‭ ‬100‭ ‬درهم‭ ‬أسبوعياً‭. .‬اختيارك‭..‬بكيفك‭.‬</p>
                </div>
            </div>
        </div> -->
    </div>
</section>
<section role="member">
    <div class="container-fluid">
        <div class="row">
			
            <div class="col-12">
                <div class="col-lg-12 text-center pb-2">
                    <h2>اختر خطة وفئة العضوية</h2>
                </div>
                <div class="pricing-switcher mb-4">
                    <div class="car_btn">
                        <div class="fieldset">
                            <input type="radio" name="price" value="monthly" id="monthly-1" checked >
                            <label for="monthly-1" class="active-price all">6 أشهر</label>
                            <input type="radio" name="price" value="9month" id="9month" >
                            <label for="9month" class="economic">9 أشهر</label>
                            <input type="radio" name="price" value="12monthly" id="12monthly">
                            <label for="12monthly" class="small" >12 شهر</label>
                            <div class="animation start-home"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- price -->
    
	<style>
	.gray .select {color: #333333;border: 2px solid <?= $memberships[0]->mc_color_code ?>;}
	.gray .select:hover {background-color: <?= $memberships[0]->mc_color_code ?>;color: #fff;}
	.blue .select{ border: 2px solid <?= $memberships[1]->mc_color_code ?>; color:<?= $memberships[1]->mc_color_code ?>}
	.blue .select:hover{  background-color: <?= $memberships[1]->mc_color_code ?>; color:#fff}
	.exclusive .select {border: 2px solid <?= $memberships[2]->mc_color_code ?>;color: <?= $memberships[2]->mc_color_code ?>;}
	.exclusive .select:hover {background-color: <?= $memberships[2]->mc_color_code ?>; color:#fff;}
	.red .select {border: 2px solid <?= $memberships[3]->mc_color_code ?>;color: <?= $memberships[3]->mc_color_code ?>;}
	.red .select:hover {background-color: <?= $memberships[3]->mc_color_code ?>; color:#fff;}

		
	</style>
	
    <!-- <section class="custom-pricing-section-mobile">
        <div class="row custom-show-prices">
            <div class="col-sm-12 col-md-12">
                <div class="custom-prices-mobile_view" style="border: 1px solid <?= $memberships[0]->mc_color_code ?>;">
                    <header class="pricing-header">
                        <h2 class="d-sm-block" style="color: <?= $memberships[0]->mc_color_code ?>;">الطالبات والطلاب</h2>
                        <div class="price"> 
                            <span class="value1" style="color: <?= $memberships[0]->mc_color_code ?>;"><?= $memberships[0]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[0]->mc_color_code ?>;">ريال</span> 
                        </div>
                    </header>
                    <footer class="pricing-footer"> 
                        <a class="select custom-button-prices" data-id="<?= $memberships[0]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
                            اشترك الآن
                        </a> 
                    </footer>
                </div>
                <div class="custom-prices-mobile_view" style="border: 1px solid <?= $memberships[1]->mc_color_code ?>;">
                    <header class="pricing-header">
                        <h2 class="d-sm-block" style="color: <?= $memberships[1]->mc_color_code ?>;">العضوية الزرقاء</h2>
                        <div class="price"> 
                            <span class="value2" style="color: <?= $memberships[1]->mc_color_code ?>;"><?= $memberships[1]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[1]->mc_color_code ?>;">ريال</span> 
                        </div>
                    </header>
                    <footer class="pricing-footer"> 
                        <a class="select custom-button-prices" data-id="<?= $memberships[1]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
                            اشترك الآن
                        </a> 
                    </footer>
                </div>

                <div class="custom-prices-mobile_view" style="border: 1px solid <?= $memberships[2]->mc_color_code ?>;">
                    <header class="pricing-header">
                        <h2 class="d-sm-block" style="color: <?= $memberships[2]->mc_color_code ?>;">العضوية الخضراء </h2>
                        <div class="price"> 
                            <span class="value3 " style="color: <?= $memberships[2]->mc_color_code ?>;"><?= $memberships[2]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[2]->mc_color_code ?>;">ريال</span> 
                        </div>
                    </header>
                    <footer class="pricing-footer"> 
                        <a class="select custom-button-prices" data-id="<?= $memberships[2]->mc_uid ?>" href="#" style="color: #fff; background-color: <?= $memberships[2]->mc_color_code ?>" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.backgroundcolor='<?= $memberships[2]->mc_color_code ?>'" onclick="goDoSubscribe(this);">
                            اشترك الآن
                        </a> 
                    </footer>
                </div>

                <div class="custom-prices-mobile_view" style="border: 1px solid <?= $memberships[3]->mc_color_code ?>;">
                    <header class="pricing-header">
                        <h2 class="d-sm-block" style="color: <?= $memberships[3]->mc_color_code ?>;">العضوية الحمراء</h2>
                        <div class="price"> 
                            <span class="value4" style="color: <?= $memberships[3]->mc_color_code ?>;"><?= $memberships[3]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[3]->mc_color_code ?>;">ريال</span> 
                    </div>
                    </header>
                    <footer class="pricing-footer"> 
                        <a class="select custom-button-prices" data-id="<?= $memberships[3]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
                            اشترك الآن
                        </a> 
                    </footer>
                </div>
            </div>
        </div>
    </section> -->
	
    <ul class="pricetable">
        <li class="bg-gray active">
            <button class="membership-setdef membership-f" style="font-size: 11px;">الطالبات والطلاب</button>
        </li>
        <li class="bg-blue">
            <button class="membership-setdef membership-s">الزرقاء</button>
        </li>
        <li class="bg-green">
            <button class="membership-setdef membership-t">الخضراء</button>
        </li>
        <li class="bg-red ">
            <button class="membership-setdef membership-fo">الحمراء</button>
        </li>
    </ul>
    
    <div class="align-table-custom-mob">
        <table class="table-price">
            <thead>
    			<form id="subscribe" method="post" action="<?= site_url('memberships/confirm') ?>">
    				<input id="period" type="hidden" name="period" value="mc_6months_price" />
    				<input id="mc_uid" type="hidden" name="mc_uid" value="" />
    			</form>
    			<tr class="price-table" id="priceTable">
    				<th class="fet"><h3>مميزات العضوية</h3></th>
    				<th class="gray">
    					<header class="pricing-header">
    						<h2 class="d-none d-sm-block" style="color: <?= $memberships[0]->mc_color_code ?>;">الطالبات والطلاب</h2>
    						<div class="price"> 
    							<span class="value1" style="color: <?= $memberships[0]->mc_color_code ?>;"><?= $memberships[0]->mc_6months_price ?></span> 
    							<span class="duration" style="color: <?= $memberships[0]->mc_color_code ?>;">ريال</span> 
    						</div>
    					</header>
    					<footer class="pricing-footer"> 
    						<a class="select" data-id="<?= $memberships[0]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
    							اشترك الآن
    						</a> 
    					</footer>
    				</th>
    				<th class="blue"> 
    					<header class="pricing-header">
    						<h2 class="d-none d-sm-block" style="color: <?= $memberships[1]->mc_color_code ?>;">العضوية الزرقاء</h2>
    						<div class="price"> 
    							<span class="value2" style="color: <?= $memberships[1]->mc_color_code ?>;"><?= $memberships[1]->mc_6months_price ?></span> 
    							<span class="duration" style="color: <?= $memberships[1]->mc_color_code ?>;">ريال</span> 
    						</div>
    					</header>
    					<footer class="pricing-footer"> 
    						<a class="select" data-id="<?= $memberships[1]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
    							اشترك الآن
    						</a> 
    					</footer>
    				</th>
    				<th class="exclusive" style="position: relative;"> 
    					<div class="most-used"></div>
    					<header class="pricing-header">
    						<h2 class="d-none d-sm-block" style="color: <?= $memberships[2]->mc_color_code ?>;">العضوية الخضراء </h2>
    						<div class="price"> 
    							<span class="value3 " style="color: <?= $memberships[2]->mc_color_code ?>;"><?= $memberships[2]->mc_6months_price ?></span> 
    							<span class="duration" style="color: <?= $memberships[2]->mc_color_code ?>;">ريال</span> 
    						</div>
    					</header>
    					<footer class="pricing-footer"> 
    						<a class="select" data-id="<?= $memberships[2]->mc_uid ?>" href="#" style="color: #fff; background-color: <?= $memberships[2]->mc_color_code ?>" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.backgroundcolor='<?= $memberships[2]->mc_color_code ?>'" onclick="goDoSubscribe(this);">
    							اشترك الآن
    						</a> 
    					</footer>
    				</th>
    				<th class=" red"><header class="pricing-header">
    						<h2 class="d-none d-sm-block" style="color: <?= $memberships[3]->mc_color_code ?>;">العضوية الحمراء</h2>
    						<div class="price"> 
    							<span class="value4" style="color: <?= $memberships[3]->mc_color_code ?>;"><?= $memberships[3]->mc_6months_price ?></span> 
    							<span class="duration" style="color: <?= $memberships[3]->mc_color_code ?>;">ريال</span> 
    					</div>
    					</header>
    					<footer class="pricing-footer"> 
    						<a class="select" data-id="<?= $memberships[3]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
    							اشترك الآن
    						</a> 
    					</footer>
    				</th>
    			</tr>
            </thead>
            <tbody>
                <tr class="br-bt">
                    <td style="border-style: hidden;">
                        <div class="price show-prices" id="mem-f"> 
                            <span class="value1" style="color: <?= $memberships[0]->mc_color_code ?>;"><?= $memberships[0]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[0]->mc_color_code ?>;">ريال</span> 
                            <a class="select custom-button-prices" data-id="<?= $memberships[0]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
                            اشترك الآن
                            </a> 
                        </div>
                        <div class="price show-prices" id="mem-s"> 
                            <span class="value2" style="color: <?= $memberships[1]->mc_color_code ?>;"><?= $memberships[1]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[1]->mc_color_code ?>;">ريال</span> 
                            <a class="select custom-button-prices" data-id="<?= $memberships[1]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">اشترك الآن
                            </a>
                        </div>
                        <div class="price show-prices" id="mem-t"> 
                            <span class="value3 " style="color: <?= $memberships[2]->mc_color_code ?>;"><?= $memberships[2]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[2]->mc_color_code ?>;">ريال</span> 
                            <a class="select custom-button-prices" data-id="<?= $memberships[2]->mc_uid ?>" href="#" style="color: #fff; background-color: <?= $memberships[2]->mc_color_code ?>" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.backgroundcolor='<?= $memberships[2]->mc_color_code ?>'" onclick="goDoSubscribe(this);">
                                اشترك الآن
                            </a> 
                        </div>
                        <div class="price show-prices" id="mem-fo"> 
                            <span class="value4" style="color: <?= $memberships[3]->mc_color_code ?>;"><?= $memberships[3]->mc_6months_price ?></span> 
                            <span class="duration" style="color: <?= $memberships[3]->mc_color_code ?>;">ريال</span> 
                            <a class="select custom-button-prices" data-id="<?= $memberships[3]->mc_uid ?>" href="#" style="color: #000;" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#000'" onclick="goDoSubscribe(this);">
                            اشترك الآن
                            </a>
                        </div>
                    </td>

                </tr>   
                <tr class="br-bt">
                    <td>تأمين شامل 100 ٪ </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td>توصيل و استلام السيارة مجانا </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td>الكيلو متر مفتوح </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> تسليم السيارة في مدينة أخرى مجانا </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> خدمة الصيانة الدورية للسيارة </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> خدمة الاطارات </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> خدمة المساعدة على الطريق </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> سيارة مزودة بالوقود عند الإستلام</td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
    			<!--
                <tr class="br-bt">
                    <td> خدمة الحجز المبكر مجاناً </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
    			-->
    			<!--
                <tr class="br-bt">
                    <td> خدمة اليوم الأول المجاني </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
    			-->
                <tr class="br-bt">
                    <td> خدمة فتح الأقفال </td>
                    <td class="default"><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> الساعات الإضافية المسموحة </td>
                    <td class="default">ساعتين</td>
                    <td>ساعتين</td>
                    <td >4 ساعات</td>
                    <td >6 ساعات</td>
                </tr>
    			<!--
                <tr class="br-bt">
                    <td> عدد الأيام الإضافية المجانية </td>
                    <td class="default">يوم كل ثلاث أسابيع</td>
                    <td>يوم كل ثلاث أسابيع</td>
                    <td >يوم كل أسبوعين</td>
                    <td >يوم كل أسبوع</td>
                </tr>
    			
                <tr class="br-bt">
                    <td> عدد النقاط الإضافية السنوية </td>
                    <td class="default"></td>
                    <td></td>
                    <td >100 نقطة</td>
                    <td >200 نقطة</td>
                </tr>
    			
                <tr class="br-bt">
                    <td> خدمة غسيل وتنظيف السيارة </td>
                    <td class="default"></td>
                    <td></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
    			-->
                <tr class="br-bt">
                    <td> رسوم إيقاف السيارة فى المطار </td>
                    <td class="default">30</td>
                    <td>30</td>
                    <td >لا يوجد</td>
                    <td >لا يوجد</td>
                </tr>
                <tr class="br-bt">
                    <td> ترقية فئة السيارة إلى فئة أعلى </td>
                    <td class="default"></td>
                    <td></td>
                    <td ></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> حجز ودفع قيمة الإشتراك لاحقا </td>
                    <td class="default"></td>
                    <td></td>
                    <td ></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> عروض خاصة </td>
                    <td class="default"></td>
                    <td></td>
                    <td ></td>
                    <td ><span class="tick"><i class="fa fa-check-circle"></i></span></td>
                </tr>
                <tr class="br-bt">
                    <td> عوازل حرارية </td>
                    <td class="default"><span class="tick" style="padding-right: 45px;"><i class="fa fa-check-circle"></i></span><span style="margin-right: 15px">قريباً</span></td>
                    <td><span class="tick" style="padding-right: 45px;"><i class="fa fa-check-circle"></i></span><span style="margin-right: 15px">قريباً</span></td>
                    <td ><span class="tick" style="padding-right: 45px;"><i class="fa fa-check-circle"></i></span><span style="margin-right: 15px">قريباً</span></td>
                    <td ><span class="tick" style="padding-right: 45px;"><i class="fa fa-check-circle"></i></span><span style="margin-right: 15px">قريباً</span></td>
                </tr>
                <tr class="br-bt">
                    <td> نظام الملاحة </td>
                    <td class="default"></td>
                    <td></td>
                    <td ></td>
                    <td ><span class="tick" style="padding-right: 45px;"><i class="fa fa-check-circle"></i></span><span style="margin-right: 15px">قريباً</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4" ><p class="text-muted d-none d-sm-block  mt-2 mb-2">سيتم استرجاع قيمة اشتراك العضوية كاملة 100% عند طلبك لها وفي حال عدم استخدام مميزاتها </p></td>
                </tr>
            </tbody>
        </table>
        <p class="text-muted d-block d-sm-none  mb-2">سيتم استرجاع قيمة اشتراك العضوية كاملة 100% عند طلبك لها وفي حال عدم استخدام مميزاتها</p>
    </div>
</section>

<!-- member pic -->

<section class="mem-pic pb-8"> <img src="<?= base_url()."assets/".$direction; ?>/images/member-pic.png" alt="cars" width="100%"> </section>

<!-- duplicated questions -->

<section class="rebeated-q">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1> الأسئلة المتكررة </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 padl-25">
                <h3>ما هي أفضل فئة من فئات العضوية بالنسبة لي؟</h3>
                <p class="ques-text">تقدم " إفاد" فئات مختلفة من العضوية لتلبية احتياجات العملاء المختلفين. لذلك ألقي نظرة على مميزات وأسعار كل فئة من فئات العضوية وأختر ما يناسبك.</p>
                <h3>هل أستطيع ترقية فئة العضوية؟</h3>
                <p class="ques-text">نعم تستطيع/ي ترقية فئة العضوية في أي وقت ويستغرق تفعيل العضوية الجديدة ثلاثة أيام عمل.</p>
                <h3>كيف أستطيع إلغاء اشتراك العضوية؟ وهل توجد رسوم في حال إلغاء الاشتراك؟</h3>
                <p class="ques-text">يمكنك القيام بذلك من خلال الدخول إلى حسابك وإلغاء اشتراك العضوية في أي وقت ولا يوجد رسوم على إلغاء الاشتراك.</p>
            </div>

			
            <div class="col-lg-6 col-sm-12 padr-25">
                <h3>ما هي الطرق المتوفرة لدفع قيمة اشتراك العضوية؟</h3>
                <p class="ques-text">هناك 4 طرق لدفع قيمة اشتراك العضوية وهي: <br>
                    الدفع الإلكتروني من خلال الموقع. <br>
                    إجراء عملية تحويل إلى الحساب البنكي الخاص بالشركة.<br>
                    التواصل مع فريق العناية بالعملاء ودفع المبلغ نقداً (كاش)، ولكن هناك رسوم إضافية على خدمة الدفع النقدي وقدرها 100 ريال.</p>
                <h3>هل سيتم إعادة قيمة اشتراك العضوية في حال عدم أستخدمها؟</h3>
                <p class="ques-text">سيتم إعادة قيمة اشتراك العضوية كاملة ١٠٠٪ عند طلبك لها وفي حال عدم استخدامها مميزاتها</p>
                <h3>هل يمكنني نقل عضويتي إلى شخص آخر؟</h3>
                <p class="ques-text">لا. إذا رغبت في عدم تجديد عضويتك الموظف، فلا تستطيع/ي نقل عضويتك لشخص آخر، ويحتاج هذا الشخص إلى بدء عضوية جديدة.</p>
            </div>
        </div>
    </div>
</section>