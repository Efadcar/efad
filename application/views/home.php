<header class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pb-2">
                <h1 class="whyefad">ليش أختار إفاد ؟</h1>
            </div>
            <div class="col-sm-11 col-xs-12 ">
                <div class="row whycol">
                    <div class="col-sm-4 ">
                        <div class="why text-center">
                            <div class="textbanner"> توصيل واستلام السيارة مجاناً </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="why text-center">
                            <div class="textbanner  ">الكيلو متر مفتوح </div>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="why  text-center">
                            <div class="textbanner  "> تأمين شامل 100 ٪ </div>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="why text-center">
                            <div class="textbanner  "> سيارة نظيفة وخالية من الروائح الكريهة </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="why  text-center">
                            <div class="textbanner  "> سيارة مزودة بالوقود </div>
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="why text-center">
                            <div class="textbanner  "> غير راضي؟
                                أسترجع كامل المبلغ المدفوع 100 ٪ </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-xs-12 green">
                <div class="why  ">
                    <div class="rotate ">أول يوم مجاناً </div>
                    <i class="far fa-smile"></i> </div>
            </div>
        </div>
    </div>
</header>

<!--do you want try-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-xs-12 text-center ml-auto d-flex align-items-center mt-4 mt-md-0 free">
                <div class="pt-0 pb-0 freeride pr-2 pl-2" >
                    <h3>في سيارة في بالك ؟</h3>
                    <p> أحجز السيارة وراح نوصلها علشان تجربها لمدة 24 ساعة <span>مجــانا</span> </p>
                </div>
            </div>
            <div class="col-sm-7 col-xs-12 mb-4 mt-2 ">
                <h3>ماهى شروط حجز سيارة؟</h3>
                <div class="row ">
                    <div class="col-sm-7 mb-4 mt-2 ">
                        <ul class="must">
                            <li>رخصة سعودية سارية المفعول </li>
                            <li>عمرك أكبر من 20 سنة</li>
                            <li>بطاقة عضوية <span class="text-muted small "> ( إلزامية   للحصول على الخدمة )</span></li>
                        </ul>
                    </div>
                    <div class="col-sm-5 mb-4 mt-2 ">
                        <ul class="not">
                            <li>ما يحتاج مبلغ تأمين للاشتراك </li>
                            <li>ما يحتاج بطاقة ائتمانية للدفع </li>
                            <li> ما يحتاج بطاقة أو تعرف عمل </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--cars search-->

<section  class="p-0 border-top">
    <div class="container ">
        <div class="row  py-4 pb-0 pb-1">
            <div class="col-sm-9"> 
                
                <!-- btns -->
                
                <div class="car_btn scroll">
                    <div class="fieldset">
                        <input type="radio" name="cartype" value="الكل" data-filter="all" id="c1" checked  >
                        <label for="c1" class="all" >الكل</label>
                        <input type="radio" name="cartype"  data-filter=".economic" value="الاقتصادية" id="c2" >
                        <label for="c2"  class="economic">الاقتصادية</label>
                        <input type="radio" name="cartype" value="الصغيرة"  data-filter=".small" id="c3">
                        <label for="c3" class="small">المتوسطة</label>
                        <input type="radio" name="cartype" value="الصغيرة" data-filter=".mini" id="c4">
                        <label for="c4" class="mini">الصغيرة</label>
                        <input type="radio" name="cartype" value="الكبيرة"   data-filter=".big" id="c5">
                        <label for="c5" class="big">الكبيرة</label>
                        <input type="radio" name="cartype" value="الفخمة" data-filter=".superior" id="c6">
                        <label for="c6" class="superior">الفخمة</label>
                        <div class="animation start-home"></div>
                    </div>
                </div>
                
                <!-- /btn -->
                
                <input class="form-control mr-sm-2 mt-2" data-ref="input-search" type="search" placeholder="ابحث عن اسم أو مواصفات سيارة هنا مثال : هونداي 2018 بيضاء قير عادي" aria-label="Search">
                <p class="text-muted small pt-2"> * جميع الاسعار تشمل  ضريبة  القيمة المضافة 5% </p>
                <div class="product_list" data-ref="product_list">
                    <div class="row">
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix  redplan big مازدا  red "  data-size="69">
                            <div class="thumbnail-container">
                                <div class="carname d-flex">
                                    <div class="mr-auto">
                                        <h4><span>مازدا</span> <span>2018</span></h4>
                                        <h6>ام 3</h6>
                                    </div>
                                </div>
                                <div class="car-img"> <img src="<?= base_url()."assets/".$direction; ?>/images/cars/sonata.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex ">
                                    <div class="price-car mr-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">69</span> <span class="duration">ريال فى اليوم</span> </div>
                                    <div class="btn-reserve"> <a href="#" class="btn btn-default">احجز الآن</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix superior blueplan كيا green y2018" data-size="250">
                            <div class="thumbnail-container">
                                <div class="carname">
                                    <h4><span>كيا</span> <span>2018</span></h4>
                                    <h6>سوناتا</h6>
                                </div>
                                <div class="car-img"> <img src="<?= base_url()."assets/".$direction; ?>/images/cars/car1.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex ">
                                    <div class="price-car mr-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">250</span> <span class="duration">ريال فى اليوم</span> </div>
                                    <div class="btn-reserve"> <a href="#" class="btn btn-default">احجز الآن</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix small  yellow  redplan  y2018 هيونداى" data-size="350">
                            <div class="thumbnail-container">
                                <div class="carname">
                                    <h4><span>هيونداى</span> <span>2018</span></h4>
                                    <h6>سوناتا</h6>
                                </div>
                                <div class="car-img"> <img src="<?= base_url()."assets/".$direction; ?>/images/cars/car3.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex ">
                                    <div class="price-car mr-auto align-bottom"> <span class="value">350</span> <span class="duration">ريال فى اليوم</span> </div>
                                    <div class="btn-reserve"> <a href="#" class="btn btn-default">احجز الآن</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix superior greenplan هيونداى red y2017" data-size="180">
                            <div class="thumbnail-container">
                                <div class="carname">
                                    <h4><span>هيونداى</span> <span>2018</span></h4>
                                    <h6>سوناتا</h6>
                                </div>
                                <div class="car-img"> <img src="<?= base_url()."assets/".$direction; ?>/images/cars/car4.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex ">
                                    <div class="price-car mr-auto"> <span class="value">180</span> <span class="duration">ريال فى اليوم</span> </div>
                                    <div class="btn-reserve"> <a href="#" class="btn btn-default">احجز الآن</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix mini blueplan  blue  y2019 هيونداى" data-size="80">
                            <div class="thumbnail-container">
                                <div class="carname">
                                    <h4><span>هيونداى</span> <span>2018</span></h4>
                                    <h6>سوناتا</h6>
                                </div>
                                <div class="car-img"> <img src="<?= base_url()."assets/".$direction; ?>/images/cars/car5.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex ">
                                    <div class="price-car mr-auto">
                                        <div class="price-was">80 ريال</div>
                                        <span class="value">80</span> <span class="duration">ريال فى اليوم</span> </div>
                                    <div class="btn-reserve"> <a href="#" class="btn btn-default">احجز الآن</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-6 col-md-6 col-lg-4 col-12 mix economic blueplan هيونداى black y2019" data-size="90">
                            <div class="thumbnail-container">
                                <div class="carname">
                                    <h4><span>هيونداى</span> <span>2018</span></h4>
                                    <h6>سوناتا</h6>
                                </div>
                                <div class="car-img"> <img src="<?= base_url()."assets/".$direction; ?>/images/cars/car6.png" class="img-fluid" /> </div>
                                <div class="car-price d-flex ">
                                    <div class="price-car mr-auto"> <span class="value">90</span> <span class="duration">ريال فى اليوم</span> </div>
                                    <div class="btn-reserve"> <a href="#" class="btn btn-default">احجز الآن</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center"> <a href="#" class="btn btn-default mb-4">المزيد</a> </div>
                    </div>
                </div>
            </div>
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
                        <h4><i class="fa fa-filter"></i> بحث مفصل </h4>
                        <hr class="line-blue-right">
                        <div class="col-md-12 col-sm-12 pt-1"> <span class="labelh pb-2">خطة العضوية</span>
                            <div class="radio-group d-flex planname" role="group">
                                <input type="radio" id="blueplan" data-filter=".blueplan" name="selector">
                                <label for="blueplan">زرقاء</label>
                                <input type="radio" id="greenplan" name="selector" data-filter=".greenplan">
                                <label for="greenplan">خضراء</label>
                                <input type="radio" id="redplan" 
    data-filter=".redplan" name="selector">
                                <label for="redplan">حمراء</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-2">
                            <div class=" justify-content-between"> <span class="labelh ">الحجز المبكر</span>
                                <div class="btn-switch">
                                    <input type="radio" id="yes" name="switch" class="btn-switch__radio btn-switch__radio_yes" />
                                    <input type="radio" checked id="no" name="switch" class="btn-switch__radio btn-switch__radio_no" />
                                    <label for="yes" class="btn-switch__label btn-switch__label_yes"><span class="btn-switch__txt"></span></label>
                                    <label for="no" class="btn-switch__label btn-switch__label_no"><span class="btn-switch__txt"></span></label>
                                </div>
                            </div>
                            <span class="text-muted small pt-1"> أحصل على 10 % خصم إضافية عند الحجز المبكر </span> </div>
                        <div class="col-md-12 col-sm-12 pt-1"> <span class="labelh py-2">مدة الاشتراك</span>
                            <div class="car_btn car-y">
                                <p class="fieldset">
                                    <input type="radio" name="year"  value="day" id="day" checked >
                                    <label for="day"> يومي</label>
                                    <input type="radio" name="year" value="month"  id="month">
                                    <label for="month" >شهري</label>
                                    <input type="radio" name="year" value="year"  id="year">
                                    <label for="year" >سنوي</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-1"> <span class="labelh py-2">سنة الصنع</span>
                            <div class="car_btn car-y">
                                <p class="fieldset">
                                    <input type="radio" name="year"  data-filter=".y2019" value="2019" id="2019" >
                                    <label for="2019">2019</label>
                                    <input type="radio" name="year" value="2018"  data-filter=".y2018" id="2018">
                                    <label for="2018" >2018</label>
                                    <input type="radio" name="year" value="2017" data-filter=".y2017" id="2017">
                                    <label for="2017" >2017</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 pt-1 mb-4" > <span class="labelh py-2">لون السيارة</span>
                            <div class="custom-radios">
                                <div>
                                    <input type="checkbox" id="white" data-filter=".white"   value="white" >
                                    <label for="white"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="gray" data-filter=".gray"   value="gray" >
                                    <label for="gray"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="blue" data-filter=".blue" value="blue">
                                    <label for="blue"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="black"   value="black" data-filter=".black">
                                    <label for="black"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="brown"   value="brown" data-filter=".brown">
                                    <label for="brown"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="yellow"   data-filter=".yellow" value="yellow">
                                    <label for="yellow"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="beige"   data-filter=".beige" value="beige">
                                    <label for="beige"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                                <div>
                                    <input type="checkbox" id="red"   value="red" data-filter=".red">
                                    <label for="red"> <span> <i class="fa fa-check"></i> </span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12  mb-4"> <span class="labelh py-2">قيمة الاشتراك اليومي</span>
                            <input type="text" class="js-range-slider" value="" />
                        </div>
                        <div class="col-md-12 col-sm-12 pt-1">
                            <div class="select-wrapper">
                                <select id="select-country" data-placeholder="أختر مدينه الآستلام" class="form-control width100p">
                                    <option >أختر مدينه الآستلام</option>
                                    <option >الرياض</option>
                                    <option >جدة</option>
                                    <option>المدينة المنورة</option>
                                    <option >الدمام</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 py-2">
                            <div class="select-wrapper">
                                <select id="select-car" data-placeholder="أختر ماركة السيارة" class="form-control width100p">
                                    <option >أختر ماركة السيارة</option>
                                    <option >كيا</option>
                                    <option >هيونداى</option>
                                    <option>تويوتا</option>
                                    <option >فورد</option>
                                    <option >فولكس فاجن</option>
                                    <option>فيات</option>
                                    <option>نيسان</option>
                                    <option >اكورا</option>
                                    <option >شانجان</option>
                                    <option>فولفو</option>
                                    <option>جيلى</option>
                                    <option >رينو</option>
                                    <option >جميس</option>
                                    <option>مازدا</option>
                                    <option >جميس</option>
                                    <option>مازدا</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--plane-->

<section class="border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 py-3 text-center ">
                <h2>أختر خطة و فئة العضوية</h2>
            </div>
            <div class="pricing-container">
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
                <ul class="pricing-list ">
                    <li class="blue ">
                        <ul class="pricing-wrapper ">
                            <li>
                                <header class="pricing-header">
                                    <h2>الزرقاء</h2>
                                    <div class="price"> <span class="value">59</span> <span class="duration">ريال</span> </div>
                                </header>
                                <footer class="pricing-footer"> <a class="select" href="#">أشترك الان</a> </footer>
                                <div class="pricing-body">
                                    <ul class="pricing-features">
                                        <li>خصم 6% على إجمالي اشتراك الخدمة</li>
                                        <li>ساعتين إضافية مجاناً</li>
                                        <li>الكيلو متر مفتوح</li>
                                        <li>يوم إضافي مجاناً كل أسبوع</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="exclusive ">
                        <ul class="pricing-wrapper">
                            <li>
                                <div class="more-used">الأكثر أستخداماً</div>
                                <header class="pricing-header">
                                    <h2>الخضراء</h2>
                                    <div class="price"> <span class="value ">69</span> <span class="duration">ريال</span> </div>
                                </header>
                                <footer class="pricing-footer"> <a class="select" href="#">أشترك الان</a> </footer>
                                <div class="pricing-body">
                                    <ul class="pricing-features">
                                        <li>خصم 11% على إجمالي اشتراك الخدمة</li>
                                        <li>٤ ساعات إضافية مجاناً</li>
                                        <li>الكيلو متر مفتوح</li>
                                        <li>يومين إضافية مجاناً كل أسبوع</li>
                                        <li>خدمة غسيل وتنظيف السيارة </li>
                                        <li>١٠٠ نقطة مجانية سنوياً</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="pricing-wrapper">
                            <li class=" red">
                                <header class="pricing-header">
                                    <h2>الحمراء</h2>
                                    <div class="price"> <span class="value">79</span> <span class="duration">ريال</span> </div>
                                </header>
                                <footer class="pricing-footer"> <a class="select" href="#">أشترك الان</a> </footer>
                                <div class="pricing-body">
                                    <ul class="pricing-features">
                                        <li>خصم 6% على إجمالي اشتراك الخدمة</li>
                                        <li>٦ ساعات إضافية مجاناً</li>
                                        <li>الكيلو متر مفتوح</li>
                                        <li>يومين إضافية مجاناً كل أسبوع</li>
                                        <li>خدمة غسيل وتنظيف السيارة</li>
                                        <li>٢٠٠ نقطة مجانية سنوياً </li>
                                        <li> ترقية فئة السيارة إلى فئة أعلى </li>
                                        <li>حجز لمدة يومين ودفع قيمة الاشتراك لاحقاً</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="col-12 text-center">
                    <p class="text-muted small  mt-2 mb-2">سيتم استرجاع قيمة اشتراك العضوية كاملة 100% خلال 3 - 7  أيام عمل عند طلبك لها وفي حال عدم استخدامها </p>
                    <a href="member.html" class="btn btn-default">تفاصيل مميزات العضوية</a> </div>
            </div>
        </div>
    </div>
</section>

<!--how to rent a car?-->

<section>
    <div class="container-fluid ">
        <div class="row">
            <div class="container">
                <div class="col-12 py-4  text-center border-top">
                    <h2>كيف أحصل على سيارة ؟</h2>
                </div>
            </div>
            <div class="video-container">
                <div class="youtube" id="youtube-video" data-embed="e64_g0G8r7E">
                    <div class="play-button"></div>
                    <img src="https://img.youtube.com/vi/e64_g0G8r7E/maxresdefault.jpg" alt="كيف أستاجر سيارة؟" /> </div>
            </div>
        </div>
    </div>
</section>

<!-- car brand -->

<section >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo-grid ">
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src="<?= base_url()."assets/".$direction; ?>/images/car-logo/kia.gif" alt="kia" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src="<?= base_url()."assets/".$direction; ?>/images/car-logo/Toyota.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Hyundai.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/ford.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Honda.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Volkswagen.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/fiat.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Nissan.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Acura.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Changan.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/renault.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/Geely.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/volvo.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/mazda.gif" class="logo-grid__img"> </div>
                    </div>
                    <div class="logo-grid__item-wrap">
                        <div class="logo-grid__item"> <img src=" <?= base_url()."assets/".$direction; ?>/images/car-logo/gmc.gif" class="logo-grid__img"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>