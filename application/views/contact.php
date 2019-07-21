<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-heading">
                    <h1 ><?= $row->page_title ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section role="contact">
<div class="container">
<div class="row">
    <div class=" col-sm-5  ">
        <h2 class="pb-2 "><?= stripslashes( $row->page_meta_desc) ?></h2>
        <h5 ><?= stripslashes( $row->page_text) ?></h5>
        <div class=" mail-wahts mt-2">
            <h3 class="mr-auto"> <i class="far fa-envelope-open"></i> <a href = "mailto:info@efad.com">info@efad.com</a> </h3>
            <h3><i class="fab fa-whatsapp"></i> +9665061157412</h3>
        </div>
    </div>
    <div class=" col-sm-7  ">
        <p >
        <h3 class="text-center">قنوات التواصل</h3>
        </p>
        <div class="social-btns row text-center">
            <li> <a class="btn facebook" href="#"><i class="fab fa-facebook-messenger" aria-hidden="true"></i> </a> <span> ماسنجر</span></li>
            <li ><a class="btn whatsapp" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a> <span>واتس أب</span></li>
            <li > <a class="btn twitter" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a> <span>تويتر</span> </li>
            <li  > <a class="btn instagram" href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a> <span>انستجرام</span> </li>
            <li > <a class="btn sms" href="#"><i class="fas fa-sms"></i></a> <span>رسالة </span> </li>
            <li> <a class="btn snapchat" href="#"><i class="fab fa-snapchat"></i></a> <span>سناب شات</span> </li>
        </div>
    </div>
</div>
</section>