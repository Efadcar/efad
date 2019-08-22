
<style type="text/css">


    .desc {
        font-size: small;
        font-style: normal;
        margin-bottom: 10px;
        font-weight: 800;
        color: #333;
        margin-left: 5px;
    }

    .img-fluid {
        margin-top: -23px;
    }

    .total-amount {
        font-size: xx-large;
        color: #3baeff;
    }

    .amount {
        margin-right: 66px;
    }

    .margin-bottom {
        margin-bottom: 30px;
    }

    .custom-img {
        width: 50%;
        float: left;
    }

    .border {
        border: 1px solid gainsboro;
        padding: 22px;
    }

    .border-invoice {
        border-color: #103453;
        border-radius: 6px;
        border: 1px solid gainsboro;
        padding: 22px;
    }

    .total-all {
        color: #1b9fec;
        background-color: #e6e6e6;
        padding: 10px;
        font-size: large;
    }

    .margin-top {
        margin-top: 49px;
    }

    .margin-top-extra {
        margin-top: 124px;
    }

    .logo-invoice {
        float: left;
        width: 36%;
        margin-left: 50px;
        margin-top: 42px;
    }

    .margin-right-extra {
        margin-right: 50px;
    }

    .margin-right {
        margin-right: 30px;
    }

    .participation-desc {
        color: #fff;
        background-color: #103453;
        border-color: #103453;
        padding: 6px;
        font-size: medium;
        height: auto;
        border-radius: 6px;
    }

    .participation-desc:hover,
    .participation-cancel:hover {
        color: #fff;
        background-color: #103453;
        border-color: #103453;
    }

    .participation-cancel {
        color: #fff;
        background-color: #c5c5c5;
        border-color: #c5c5c5;
        padding: 6px;
        font-size: medium;
        height: auto;
        border-radius: 6px;
        margin-left: 11px;
    }

    p {
        font-size: small;
        color: #333;
        font-weight: 400;
        margin-bottom: 8px !important;
    }

    .header-img {
        width: 100%;
        height: 370px;
    }

    .nav {
        margin-bottom: 18px;
        margin-left: 0;
        list-style: none;
        margin-right: 40%;
    }

    .nav>li>a {
        display: block;
    }

    .nav-tabs {
        *zoom: 1;
        border-bottom: none !important;
    }

    .nav-tabs:before,
    .nav-tabs:after {
        display: table;
        content: "";
    }

    .nav-tabs:after {
        clear: both;
    }

    .nav-tabs>li {
        float: left;
    }

    .nav-tabs>li>a {
        padding-right: 12px;
        padding-left: 12px;
        margin-right: 2px;
        line-height: 14px;
    }

    .nav-tabs>li>a {
        padding-top: 8px;
        padding-bottom: 8px;
        line-height: 18px;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .nav-tabs>li>a:hover {
        border-color: #eeeeee #eeeeee #dddddd;
    }

    .nav-tabs>.active>a,
    .nav-tabs>.active>a:hover {
        color: #555555;
        cursor: default;
        background-color: #ffffff;
        border: 1px solid #147cb126;
    }

    li {
        line-height: 18px;
    }

    .tab-content.active {
        display: block;
    }

    .tab-content.hide {
        display: none;
    }
</style>
<?php if (isset($booking[0]) && !empty($booking[0])){ ?>
    <section class="demo" style="margin-top: 9%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>تفاصيل الفاتورة: </h5>
                </div>
                <div class="col-md-6">
                    <button type="button" class="print" style="float: left;color: white;background-color: #01355d;width: 30%;margin-bottom: 10px;border-radius: 10px;font-size: 20px;">print</button>
                </div>
            </div>
            <div class="border-invoice">
                <div class="row margin-right">
                    <div class="col-md-6">
                        <h5>بيانات الفاتورة: </h5>
                        <div class=" margin-right-extra">
                            <p><span class="desc">تاريخ الحجز: </span><?= $booking[0]->book_start_date ?></p>
                            <p><span class="desc">رقم الفاتورة: </span><?=$booking[0]->invoice_uid ?></p>
                            <p><span class="desc">المبلغ الاجمالي: </span><?=$booking[0]->invoice_total_fees_after_tax ?> ريال</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="logo-invoice" src="<?= base_url() ?>assets/rtl/images/last-logo.png" alt="Efad" />
                    </div>
                </div>
                <hr>
                <div class="row margin-right">
                    <div class="col-md-6">
                        <h5>بيانات المشترك: </h5>
                        <div class=" margin-right-extra">
                            <p><span class="desc">الاسم: </span><?=$booking[0]->member_fname ?> <?=$booking[0]->member_lname ?></p>
                            <p><span class="desc">رقم الاشتراك: </span><?=$booking[0]->mc_uid ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" margin-right-extra margin-top">
                            <p><span class="desc">فئة العضوية: </span><span style="<?=$booking[0]->mc_color_code ?>"> <?=$booking[0]->mc_name ?></span></p>
                            <p><span class="desc">خطة العضوية: </span>6 اشهر</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row margin-right">
                    <div class="col-md-4">
                        <h5>بيانات الخدمة: </h5>
                        <div class=" margin-right-extra">
                            <p><span class="desc">نوع السيارة: </span><?=$this->global_model->getStringByKeyLanguage($booking[0]->car_obj->cb_uid->cb_name, "arabic") ?> <?=$this->global_model->getStringByKeyLanguage($booking[0]->car_obj->cm_uid->cm_name, "arabic") ?> <?=$booking[0]->car_obj->car_model_year ?></p>
                            <p><span class="desc">وصف السيارة: </span><?=$this->global_model->getStringByKeyLanguage($booking[0]->car_obj->cb_uid->cb_meta_desc, "arabic") ?></p>
                            <p><span class="desc">تاريخ الاستلام: </span><?= $booking[0]->book_added_date ?></p>
                            <p><span class="desc">تاريخ بداية الاشتراك: </span><?= $booking[0]->book_start_date ?></p>
                            <p><span class="desc">مدينة استلام السيارة: </span><?=$this->global_model->getCityByID($booking[0]->delivery_city_uid) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- <img src="http://localhost/efad/assets/files/albums/sm_928f1942e8199062bab73b8947773b3a.png" class="img-fluid custom-img"> -->
                        <div class="margin-top-extra">
                            <p><span class="desc">تاريخ نهاية الاشتراك: </span><?= $booking[0]->book_end_date ?></p>
                            <p><span class="desc">مدينة تسليم السيارة: </span><?=$this->global_model->getCityByID($booking[0]->delivery_city_uid) ?></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row margin-right">
                    <div class="col-md-4">
                        <h5>بيانات الدفع: </h5>
                        <div class=" margin-right-extra">
                            <p><span class="desc">طريقة الدفع: </span><?= $booking[0]->invoice_payment_method ?></p>
                            <p><span class="desc">قيمة الاشتراك في الخدمة: </span><?= $booking[0]->invoice_total_fees ?> ريال</p>
                            <p><span class="desc">رسوم قيمة الدفع النقدي: </span><?= CASH_PAYMENT_FEES ?> ريال</p>
                            <p><span class="desc">رسوم قيمة القيمة المضافة (5%): </span><?= $booking[0]->invoice_tax_total ?> ريال</p>
                            <?php 
                                if ($booking[0]->invoice_payment_method == 'cash'){
                                    $total = $booking[0]->invoice_total_fees_after_tax + CASH_PAYMENT_FEES;
                                }
                                else{
                                    $total = $booking[0]->invoice_total_fees_after_tax;   
                                }
                            ?>
                            <p class="total-all">المبلغ الاجمالي: <?= $total ?> ريال</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else{ ?>
    <h5 style="margin-top: 9%;" align="center">لا توجد تفاصيل سابقة</h5>
<?php } ?>
