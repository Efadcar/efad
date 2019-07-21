<section>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1><?= $row->page_title ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-2 text-center">
                <div class="form-group col-sm-5 mx-auto">
                    <input type="hidden" id="countrySelect" value=""/>
                </div>
                <h3>متواجدون فى المدن التالية</h3>
                <div class="row ">
                    <div class="col-sm-3 ">
                        <div class="circle">
                            <h3>جدة</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="circle">
                            <h3>المدينة</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="circle">
                            <h3>الدمام</h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="circle">
                            <h3>الرياض</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section role="map" >
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto "> <img src="<?= base_url()."assets/rtl/" ?>images/ksa-locations.jpg" class="img-fluid " alt="efad Branches"> </div>
        </div>
    </div>
</section>

<!-- contact us -->

<section role="contact">
    <div class="container mt-4">
        <div class="row">
            <div class=" col-sm-5  ">
                <h2 class="pb-2 ">تحتاج مساعدة ؟</h2>
                <h5>فريق العناية بالعملاء متواجدون عبر ٧ قنوات رسمية متوفرة لخدمتكم بشكل مباشر</h5>
                <h6>من الساعة ٦:٢٠ صباحاً إلى الساعة ١١:٢٠ مساءاً</h6>
                <div class=" mail-wahts mt-2">
                    <h3><i class="fab fa-whatsapp"></i> 078  208 555 966 +</h3>
                    <h3 class="mr-auto"> <i class="far fa-envelope-open"></i> <a href="mailto:customercare@efadcar.com"> customercare@efadcar.com </a> </h3>
                </div>
            </div>
            <div class=" col-sm-7  ">
                <div class="social-btns row text-center">
                    <li ><a class="btn whatsapp" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a> <span>واتس أب</span></li>
                    <li> <a class="btn snapchat" href="#"><i class="fab fa-snapchat"></i></a> <span>سناب شات</span> </li>
                    <li> <a class="btn email" href="#"><i class="fas fa-envelope"></i></a> <span>الايميل</span> </li>
                    <li> <a class="btn facebook" href="#"><i class="fab fa-facebook-messenger" aria-hidden="true"></i> </a> <span> ماسنجر</span></li>
                    <li  > <a class="btn instagram" href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a> <span>انستجرام</span> </li>
                    <li > <a class="btn twitter" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a> <span>تويتر</span> </li>
                    <li > <a class="btn sms" href="#"><i class="fas fa-sms"></i></a> <span>رسالة </span> </li>
                </div>
            </div>
        </div>
    </div>
</section>