<style type="text/css">
	body {
	    overflow-x: hidden;
	}

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
	    border: 1px solid #ddd;
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

<section>
    <div class="row">
        <div class="col-md-12">
            <img src="https://image.shutterstock.com/image-photo/woman-traveler-sitting-on-hatchback-600w-517237099.jpg" class="header-img">
        </div>
    </div>
</section>

<!-- profile start -->

<section >
    <div>
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab1">بياناتي</a>
            </li>
            <li>
                <a href="#tab2">الاشتراكات</a>
            </li>
            <li>
                <a href="#tab3">العضوية</a>
            </li>
        </ul>   
    </div>
    <section id="tab1" class="tab-content active">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Tab 1 - بياناتي
                </div>
            </div>
        </div>
    </section>
    <section id="tab2" class="tab-content hide">
        <div class="container">
        	<?php
				if($bookings != false)
					foreach($bookings as $booking){
			?>
	            <div class="row margin-bottom border border">
	                <div class="col-md-4">
	                	<!-- <img src="<?= base_url().ALBUMS_IMAGES.$booking->car_obj->main_image; ?>" class="img-fluid"> -->
	                    <img src="<?= base_url() ?>assets/files/albums/sm_928f1942e8199062bab73b8947773b3a.png" class="img-fluid">
	                </div>
	                <div class="col-md-4">
	                        <p><span class="desc">نوع السيارة: </span><?= $this->global_model->getStringByKeyLanguage($booking->car_obj->cb_uid->cb_name, "arabic") ?> <?= $this->global_model->getStringByKeyLanguage($booking->car_obj->cm_uid->cm_name, "arabic") ?> <?= $booking->car_obj->car_model_year ?></p>
	                        <p><span class="desc">رقم التذكرة: </span><?= $booking->book_uid ?></p>
	                        <p><span class="desc">تاريخ الحجز: </span><?= date("Y-m-d", strtotime($booking->book_added_date)) ?></p>
	                        <p><span class="desc">تاريخ الاستلام: </span><?= $booking->book_start_date ?></p>
	                        <p><span class="desc">مدينة الاستلام: </span>
	                        <?= $this->global_model->getCityByID($booking->delivery_city_uid) ?></p>
	                </div>
	                <div class="col-md-4">
	                    <div class="amount">
	                        <h5>المبلغ الاجمالي</h5>
	                        <p class="total-amount"><?= $booking->car_obj->car_daily_price ?> ريال</p>
	                    </div>
	                    <button class="btn-primary participation-cancel">الغاء الاشتراك</button><a target="_blank" href=<?= base_url()."book/detail/" . $booking->book_uid ?>><button class="btn-primary participation-desc">تفاصيل الاشتراك</button></a>
	                </div>
	            </div>
        	<?php } ?>
        </div>
    </section>
    <section id="tab3" class="tab-content hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Tab 3 - العضوية
                </div>
            </div>
    </section>
</section>