<section  class="p-0 mt-10 ml-1 mr-3">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-3">
                <div class="row no-gutters">
                    <div class="col-6 col-xs-6 ">
                        <div class="cars-many"> <span>3000</span> <span>سيارة</span> </div>
                    </div>
                    <div class="col-6 col-xs-6 ">
                        <div class="cars-branch"> <span>4</span> <span>مدن</span> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="button-mobile-container button-mobile-fixed">
                        <div class="button-mobile">بحث تفصيلى</div>
                    </div>
                    <div class="col-12 search-option mt-2">
                        <div class="button-mobile-container button-mobile-close">
                            <div class="button-mobile">مشاهدة</div>
                        </div>
                        <h4><i class="fa fa-filter"></i> بحث متقدم </h4>
                        <div class="col-md-12 col-sm-12 pt-2"> <span class="labelh pb-2">خطة العضوية</span>
                            <div class="radio-group d-flex planname" role="group">
                                <input type="radio" class="updateSearchContent membershipPlan" id="blueplan" data-filter=".blueplan" name="selector" value="5" checked>
                                <label for="blueplan" class="blueplan">زرقاء</label>
                                <input type="radio" class="updateSearchContent membershipPlan" id="greenplan" name="selector" data-filter=".greenplan" value="10">
                                <label for="greenplan" class="greenplan">خضراء</label>
                                <input type="radio" class="updateSearchContent membershipPlan" id="redplan" data-filter=".redplan" name="selector" value="15">
                                <label for="redplan" class="redplan">حمراء</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2">
                            <div class=" justify-content-between"> <span class="labelh ">الحجز المبكر</span>
                                <div class="btn-switch">
                                    <input type="radio" id="yes" name="switch" class="btn-switch__radio btn-switch__radio_yes updateSearchContent" value="0" />
                                    <input type="radio" checked id="no" name="switch" class="btn-switch__radio btn-switch__radio_no updateSearchContent" value="1" />
                                    <label for="yes" class="btn-switch__label btn-switch__label_yes"><span class="btn-switch__txt"></span></label>
                                    <label for="no" class="btn-switch__label btn-switch__label_no"><span class="btn-switch__txt"></span></label>
                                </div>
                            </div>
                            <span class="text-mutedd small pt-2"> أحصل على 5 % كخصم إضافية عند إجراء الحجز المبكر </span> </div>
                        <div class="col-md-12 col-sm-12 pt-2"> <span class="labelh py-2">مدة الاشتراك</span> 
                            <!--  Custom Radio Buttons  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="customButton">أقل من 6 شهور
                                        <input type="radio" checked="checked" name="month" class="updateSearchContent durationOfSubscription" value="0">
                                        <span class="checkmark"></span> </label>
                                </div>
                                <div class="col-lg-12">
                                    <label class="customButton">أكثر من 6 شهور
                                        <input type="radio" name="month" class="updateSearchContent durationOfSubscription" value="1">
                                        <span class="checkmark"></span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2"> <span class="labelh py-2">عرض قيمة الإشتراك لمدة</span>
                            <div class="car_btn car-y">
                                <p class="fieldset"> 
                                    <input type="radio" name="year1" value="week1"  id="week1" class="updateSearchContent subscriptionValueDuration" checked>
                                    <label for="week1" class="week">اسبوعى</label>
                                    <input type="radio" name="year1"  value="month1" id="month1" class="updateSearchContent subscriptionValueDuration" >
                                    <label for="month1" class="month"> شهرى</label>
                                    <input type="radio" name="year1" value="year1"  id="year1" class="updateSearchContent subscriptionValueDuration" >
                                    <label for="year1" class="year">سنوى</label>
                                </p>
                            </div>
                            <div col-lg-12>
                                <input type="text" name="day1"  value="2000" class="item2000 updateSearchContent financialValueDaily" disabled >
                                س.ر.
                                <input type="text" name="week1" value="8000" class="item8000 updateSearchContent financialValueWeekly" disabled>
                                س.ر. </div>
                           		<div id="nouislider-slider-price"></div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2"> <span class="labelh py-2">ترتيب</span> 
                            <!--  Custom Radio Buttons  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="customButton">من الأقل قيمة إلى الأعلى
                                        <input type="radio" checked="checked" name="highvalue" class="updateSearchContent displayOrdering" value="asc">
                                        <span class="checkmark"></span> </label>
                                </div>
                                <div class="col-lg-12">
                                    <label class="customButton">من الأعلى قيمة إلى الأقل
                                        <input type="radio" name="highvalue" class="updateSearchContent displayOrdering" value="desc">
                                        <span class="checkmark"></span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2">
                            <div class="select-wrapper">
                                <select id="select-car" data-placeholder="ماركة السيارة" class="form-control width100p updateSearchContent carBrand">
                                    <option value="all">ماركة السيارة</option>
                                    <?php
									if($brands != false)
									foreach($brands as $brand){
									?>
									
									<option value="<?= $brand->cb_uid ?>"><?= $brand->cb_name ?></option>
									
									<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-1">
                            <div class="select-wrapper">
                                <select id="select-car" data-placeholder="أختر شكل السيارة" class="form-control width100p updateSearchContent carType">
                                    <option value="all">موديل السيارة</option>
                                    <option value="1">الرياض</option>
                                    <option value="2">جدة</option>
                                    <option value="3">المدينة المنورة</option>
                                    <option value="4">الدمام</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-1">
                            <div class="select-wrapper">
                                <select id="select-car" data-placeholder="أختر شكل السيارة" class="form-control width100p updateSearchContent carCategory">
                                    <option value="all">نوع السيارة</option>
                                    <option value="1">الرياض</option>
                                    <option value="2">جدة</option>
                                    <option value="3">المدينة المنورة</option>
                                    <option value="4">الدمام</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2"> <span class="labelh py-2">سنة الصنع</span> 
                            <!-- <input type="text" class="js-range-slider updateSearchContent" value="" /> -->
                            <div id="nouislider-slider"></div>
                            <input id="cadc" type="hidden">
                            <input id="btcc" type="hidden">
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2" > <span class="labelh py-2">لون السيارة</span>
                            <div class="custom-radios">
                                <div>
                                    <input type="checkbox" id="white" data-filter=".white" class="updateSearchContent carColor"  value="white" >
                                    <label for="white"> <span> <i class="fa fa-check blackCheck"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="gray" data-filter=".gray" class="updateSearchContent carColor"  value="gray" >
                                    <label for="gray"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="yellow" class="updateSearchContent carColor"  data-filter=".yellow" value="yellow">
                                    <label for="yellow"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="brown"  class="updateSearchContent carColor" value="brown" data-filter=".brown">
                                    <label for="brown"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="red" class="updateSearchContent carColor"  value="red" data-filter=".red">
                                    <label for="red"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="Aetna"  class="updateSearchContent carColor" value="Aetna" data-filter=".Aetna">
                                    <label for="Aetna"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="Algolia"  class="updateSearchContent carColor" value="Algolia" data-filter=".Algolia">
                                    <label for="Algolia"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="blue" class="updateSearchContent carColor" data-filter=".blue" value="blue">
                                    <label for="blue"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="Lingus"  class="updateSearchContent carColor" data-filter=".Lingus" value="Lingus">
                                    <label for="Lingus"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="Adobe"  class="updateSearchContent carColor" value="Adobe" data-filter=".Adobe">
                                    <label for="Adobe"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="black" class="updateSearchContent carColor"  value="black" data-filter=".black">
                                    <label for="black"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="Arriva" class="updateSearchContent carColor"  value="Arriva" data-filter=".Arriva">
                                    <label for="Arriva"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2"> <span class="labelh py-2">ناقل الحركة</span> 
                            <!--  Custom Radio Buttons  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="customButton">أتوماتيك
                                        <input type="radio" class="updateSearchContent gearBox" checked="checked" name="automanual" value="auto">
                                        <span class="checkmark"></span> </label>
                                </div>
                                <div class="col-lg-12">
                                    <label class="customButton">عادى
                                        <input type="radio" class="updateSearchContent gearBox" name="automanual" value="manual">
                                        <span class="checkmark"></span> </label>
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
                        <div class="col-lg-12">
                            <div style="float: right;margin: 35px 0;"> <i class="fas fa-sync" style="color: #003a5d;padding: 0 15px;cursor: pointer;"></i>
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
                        <input type="radio" name="cartype" class="updateSearchContent carClassification" value="all" data-filter="all" id="c1" checked  >
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
                        <div class="select-wrapper select-wrapperNew" style="display: inline;">
                            <select class="custom-select1 updateSearchContent carSearchCity" 
								data-placeholder="كل المدن">
                                <option selected>كل المدن</option>
                                <option value="1">الرياض</option>
                                <option value="2">الرياض</option>
                                <option value="3">الرياض</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row ch-row-ch">
                    <div class="col-lg-6">
                        <p class="text-muted small pt-2"> * جميع الاسعار تشمل  ضريبة  القيمة المضافة 5% </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="color-dots pt-2" style="float: left;"> <span class="dot1"></span> <span class="dot100 dot101">متاح</span> <span class="dot3"></span> <span class="dot100 dot103">قريبا</span> <span class="dot4"></span> <span class="dot100 dot104">غير متاح</span> </div>
                    </div>
                </div>
                <div class="product_list" data-ref="product_list" style="margin: 0 5px 0 25px;">
                    <div class="row">
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value carPriceAfterCal">69</span> <span class="duration carDurationAfterCal">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  superior blueplan كيا green y2018 "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="car-img"> <img src="<?= base_url() ?>assets/rtl/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex">
                                    <div class="price-car ml-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال شهريا</span> </div>
                                    <div class="carname d-flex">
                                        <div class="ml-auto">
                                            <h5><span>كيا</span> <span>2018</span></h5>
                                            <h3>سوناتا</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-price d-flex row">
                                    <div class="col-lg-12"> <span class="dot11"></span> <i class="far fa-heart heart"></i> <span class="mr-3 position-absolute" style="font-size: 25px;font-weight: 600;">8</span>
                                        <div class="btn-reserve btn-reserve1"> <a href="reservation.html" class="btn btn-default">احجز الآن</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <ul class="pagin">
                                <li><i class="fas fa-chevron-left float-left"><a href="#"></a></i></li>
                                <div class="text-center">
                                    <li class="items active"><a href="#">1</a></li>
                                    <li class="items"><a href="#">2</a></li>
                                    <li class="items"><a href="#">3</a></li>
                                    <li class="items"><a href="#">...</a></li>
                                </div>
                                <li><i class="fas fa-chevron-right float-right"><a href="#"></a></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  faq -->

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