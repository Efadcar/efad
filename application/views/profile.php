<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/global/plugins/animated-input/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">


	.desc{
		font-size: small;
	    font-style: normal;
	    margin-bottom: 10px;
	    font-weight: 800;
	    color: #333;
	    margin-left: 5px;
	}

	.img-fluid{
		margin-top: -23px;
	}

	.total-amount{
		font-size: xx-large;
	    color: #3baeff;
	}

	.amount{
		margin-right: 66px;
	}

	.margin-bottom{
		margin-bottom: 30px;
	}

	.custom-img{
		width: 50%;
	    float: left;
	}

	.border{
		border: 1px solid gainsboro;
	    padding: 22px;
	}

	.border-invoice{
		border-color: #103453;
		border-radius: 6px;
		border: 1px solid gainsboro;
	    padding: 22px;
	}

	.total-all{
		color: #1b9fec;
	    background-color: #e6e6e6;
	    padding: 10px;
	    font-size: large;
	}

	.margin-top{
	    margin-top: 49px;
	}

	.margin-top-extra{
	    margin-top: 124px;
	}

	.logo-invoice{
		float: left;
	    width: 36%;
	    margin-left: 50px;
	    margin-top: 42px;
	}

	.margin-right-extra{
		margin-right: 50px;
	}

	.margin-right{
		margin-right: 30px;
	}

	.participation-desc{
		color: #fff;
	    background-color: #103453;
	    border-color: #103453;
	    padding: 6px;
	    font-size: medium;
	    height: auto;
	    border-radius: 6px;
	}

	.participation-desc:hover, .participation-cancel:hover{
		color: #fff;
	    background-color: #103453;
	    border-color: #103453;
	}

	.participation-cancel{
		color: #fff;
	    background-color: #c5c5c5;
	    border-color: #c5c5c5;
	    padding: 6px;
	    font-size: medium;
	    height: auto;
	    border-radius: 6px;
	    margin-left: 11px;
	}

	p{
		font-size: small;
		color: #333;
		font-weight: 400;
		margin-bottom: 8px !important;
	}

	.navbar{
	  width: 101%;
	}

	.header-img{
		width: 102%;
		height: 270px;
	}

	.nav {
	  	margin-bottom: 18px;
	  	margin-left: 0;
	  	list-style: none;
	  	margin-right: 40%;
	}

	.nav > li > a {
	  	display: block;
	}

	.nav-tabs{
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

	.nav-tabs > li {
	  	float: left;
	}

	.nav-tabs > li > a {
	  	padding-right: 12px;
	  	padding-left: 12px;
	  	margin-right: 2px;
	  	line-height: 14px;
	}



	.nav-tabs > li > a {
	  	padding-top: 8px;
	  	padding-bottom: 8px;
	  	line-height: 18px;
	  	-webkit-border-radius: 4px 4px 0 0;
		-moz-border-radius: 4px 4px 0 0;
		border-radius: 4px 4px 0 0;
	}

	.nav-tabs > li > a:hover {
	  	border-color: #eeeeee #eeeeee #dddddd;
	}

	.nav-tabs > .active > a,
	.nav-tabs > .active > a:hover {
	  	color: #555555;
	  	cursor: default;
	  	background-color: #ffffff;
	  	border: 1px solid #ddd;
	}

	li {
	  	line-height: 18px;
	}

	.tab-content.active{
		display: block;
	}

	.tab-content.hide{
		display: none;
	}


	.section-modify{
    	padding-top: 10%;
    }

    .form-control {
	    background: #fff;
	}

	.custom-btn{
		color: #fff;
	    background-color: #01355d;
	    border-color: #01355d;
	    border-radius: 21px;
	    width: 100%;
	    margin-top: 20px;
	}
	.arrow-down {
	  	width: 0; 
	  	height: 0; 
	  	border-left: 20px solid transparent;
	  	border-right: 20px solid transparent;
	 	border-top: 20px solid #01355d;
	 	margin-right: 30%;
	}
	select{
		-webkit-appearance: menulist !important;
	}
	.tab2, .tab3, .submitCustom{
		display: none;
	}
</style>

<section class="section-modify">
    <div>
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab1" align="center" class="profileTabs p-4"><i class="fa fa-user-o" style="font-size:36px;color:#01355d;padding-bottom: 5px;"></i><br>بياناتي</a>
            	<div class="arrow-down justify-content-between tab1"></div>
            </li>
            <li>
                <a href="#tab2" align="center" class="profileTabs p-4"><i class="fas fa-car" style="font-size:36px;color:#01355d;padding-bottom: 5px;"></i><br>الاشتراكات</a>
                <div class="arrow-down justify-content-between tab2"></div>
            </li>
            <li>
                <a href="#tab3" align="center" class="profileTabs p-4"><i class="fas fa-clock" style="font-size:36px;color:#01355d;padding-bottom: 5px;"></i><br>العضوية</a>
                <div class="arrow-down justify-content-between tab3"></div>
            </li>
        </ul>   
    </div>
    <section id="tab1" class="tab-content active" style="margin: 0px 20%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="wrapper">
					    <fieldset class="formRow">
					        <div class="formRow--item">
					            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
					                <input type="text" class="formRow--input js-input" id="firstname" placeholder="First name">
					            </label>
					        </div>
					    </fieldset>
					    <fieldset class="formRow">
					        <div class="formRow--item">
					            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
					                <input type="text" class="formRow--input js-input" id="lastname" placeholder="Last name">
					            </label>
					        </div>
					    </fieldset>
					    <fieldset class="formRow">
					        <div class="formRow--item">
					            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
					                <input type="text" class="formRow--input js-input" id="email" placeholder="Email Address">
					            </label>
					        </div>
					    </fieldset>
					</div> -->
						<?php
							echo form_open_multipart('members/user_update/'.$user->member_uid);
						?>
					  	<div class="form-group">
						    <label for="firstname" class="font-weight-bold">الاسم الأول</label>
						    <input type="text" class="form-control customEnable" id="firstname" name="member_fname" placeholder="ادخل الاسم الأول" value="<?=$user->member_fname ?>">
						</div>
						<div class="form-group">
						    <label for="lastname" class="font-weight-bold">الاسم الأخير</label>
						    <input type="text" class="form-control customEnable" id="lastname" name="member_lname" placeholder="ادخل الاسم الأخير" value="<?=$user->member_lname ?>">
						</div>

						<div class="form-group">
					    	<label for="country" class="font-weight-bold">الدولة</label>
					    	<select class="form-control customEnable" id="country" name="country_uid">
					    		<option value="187">السعودية</option>
					    		<!-- <?php if($countries !=false) foreach($countries as $country) {
                				?>
						      		<option value="<?=$country->id ?>"><?=$country->name ?></option>
						      	<?php }
						      	?> -->
					    	</select>
					  	</div>

					  	<div class="form-group">
					    	<label for="city" class="font-weight-bold">المدينة</label>
					    	<select class="form-control customEnable" id="city" name="city_uid">
								<?php
								$cities = $this->global_model->getCitiesByCountryID();
								if($cities != false)
								foreach($cities as $r){
								?>
								<option value='<?= $r->city_uid ?>' <?php if($r->city_uid == $user->city_uid){echo "selected";} ?>><?= $r->city_name_ar ?></option>
								<?php } ?>
							</select>
					  	</div>

						<div class="form-group">
						    <label for="mobile" class="font-weight-bold">رقم الجوال</label>
						    <input type="text" class="form-control customEnable" id="mobile" name="member_mobile" placeholder="ادخل رقم الجوال" value="<?=$user->member_mobile ?>">
						</div>
						<div class="form-group">
						    <label for="email" class="font-weight-bold">البريد الإلكتروني</label>
						    <input type="text" class="form-control customEnable" id="email" name="member_email" placeholder="ادخل البريد الإلكتروني" value="<?=$user->member_email ?>">
						</div>
						<div class="form-group">
						    <label for="password" class="font-weight-bold">الرقم السري</label>
						    <input type="password" class="form-control customEnable" name="member_password" id="password" placeholder="********">
					  	</div>
					  	<div class="form-group">
						    <label for="password_confirmation" class="font-weight-bold">إعادة إدخال الرقم السري</label>
						    <input type="password" class="form-control customEnable" name="password_confirmation" id="password_confirmation" placeholder="********">
					  	</div>
					  	<div class="form-group">
					  		<button type="submit" class="custom-btn btn submitCustom">حفظ التعديلات</button>
					  		<button type="button" class="custom-btn btn buttonCustom">تعديل</button>
					  	</div>
					</form>
                </div>
            </div>
        </div>
    </section>
    <section id="tab2" class="tab-content hide">
        <div class="container">
        	<?php if($bookings !=false){ foreach($bookings as $booking) {
                ?>
	            <div class="row margin-bottom border border custom-row-margin">
	                <div class="col-md-4">
	                    <img src="<?= base_url().ALBUMS_IMAGES.$booking->car_obj->main_image; ?>" class="img-fluid">
	                </div>
	                <div class="col-md-4">
	                    <p><span class="desc">نوع السيارة: </span><?=$this->global_model->getStringByKeyLanguage($booking->car_obj->cb_uid->cb_name, "arabic") ?> <?=$this->global_model->getStringByKeyLanguage($booking->car_obj->cm_uid->cm_name, "arabic") ?> <?=$booking->car_obj->car_model_year ?></p>
	                    <p><span class="desc">تاريخ الحجز: </span><?=date("d-m-Y", strtotime($booking->book_added_date)) ?></p>
	                    <p><span class="desc">تاريخ الاستلام: </span><?=date("d-m-Y", strtotime($booking->book_start_date)) ?></p>
	                    <p><span class="desc">مدينة الاستلام: </span> <?=$this->global_model->getCityByID($booking->delivery_city_uid) ?></p>
	                    <p class="color-dots"><span class="desc">حالة الاشتراك: </span> 
	                    	<?php if ($booking->book_status == 1){ ?>
	                    		<span style="margin-top: 6px;margin-right: 4px;" class="dot1"></span>
	                    		<span style="margin-right: 19px;">نشط</span>
	                    	<?php } ?> 
	                    	<?php if ($booking->book_status == 2){ ?>
	                    		<span style="margin-top: 6px;margin-right: 4px;" class="dot4"></span>
	                    		<span style="margin-right: 19px;">ملغي</span>
	                    	<?php } ?> 
	                    	<?php if ($booking->book_status == 3){ ?>
	                    		<span style="margin-top: 6px;margin-right: 4px;" class="dot3"></span>
	                    		<span style="margin-right: 19px;">منتهي</span>
	                    	<?php } ?>
	                    </p>
	                </div>
	                <div class="col-md-4">
	                    <div class="amount">
	                        <h5>المبلغ الإجمالي</h5>
	                        <p class="total-amount" style="color: #01355d;"><?=$booking->invoice_total_fees_after_tax ?> ر.س.</p>
	                    </div>
	                    <button class="btn-primary participation-cancel">إلغاء الاشتراك</button><a target="_blank" href=<?=base_url()."book/detail/" . $booking->book_uid ?>><button class="btn-primary participation-desc">تفاصيل الاشتراك</button></a> 
	                </div>
	            </div>
            <?php
            }}else{
            ?>
			<div class="row">
                <div class="col-md-8 mx-auto" style="background-color: #F2F4F5;">
                	<div class=" margin-right-extra" style="margin: 20px;">
                        <p><span class="desc">لا توجد لديك أشتراكات حالية، يمكنك الحجز <a href="<?= site_url('explore') ?>" style="text-decoration: underline;color: #01355d">من هنا</a></span></p>
                    </div>
                </div>
			</div>
			<?php } ?>
    </section>
    <section id="tab3" class="tab-content hide">
        <div class="container">
            <div class="row">
				<?php
				if($membership[0] != false){
				?>
                <div class="col-md-4"  align="center">
				<!-- <img class="logo" src="<?= base_url()."assets/".$direction; ?>/images/latest-logo.png" alt="Efad Logo" style="height: 50px;" />
                    <br> -->
                    <div style="background-color: <?= $membership[0]->mc_color_code ?>;border-radius: 20px;margin: 0px 10px;">
                    	<p style="padding: 46px;font-size: x-large;color: white;"><?= $membership[0]->mc_name ?></p>
                    </div>
                    <br>
                    <div>
                    	<div class="color-dots">
                    		<h6><b>حالة العضوية:</b>
                    			<?php if ($membership[0]->mc_status == 1){ ?>
		                    		<span style="margin-top: 9px;margin-right: 3px;" class="dot1"></span>
		                    		<span style="margin-right: 19px;">نشط</span>
		                    	<?php } ?> 
		                    	<?php if ($membership[0]->mc_status == 2){ ?>
		                    		<span style="margin-top: 9px;margin-right: 3px;" class="dot4"></span>
		                    		<span style="margin-right: 19px;">ملغي</span>
		                    	<?php } ?> 
		                    	<?php if ($membership[0]->mc_status == 3){ ?>
		                    		<span style="margin-top: 9px;margin-right: 3px;" class="dot3"></span>
		                    		<span style="margin-right: 19px;">منتهي</span>
		                    	<?php } ?>
                    		</h6>
                    	</div>
                    </div>
                    
                </div>
                <div class="col-md-8" style="background-color: #F2F4F5;">
                	<div class=" margin-right-extra" style="margin: 20px;">
                		<h5 style="margin-top: 10px;font-size: 20px;"><b>العضوية <?= $membership[0]->mc_name ?></b></h5>
                        <p><span class="desc">مدة العضوية: </span>6 اشهر</p>
                        <div class="row">
                        	<div class="col-md-6"><p><span class="desc">بداية الاشتراك: </span><?= $booking->book_start_date ?></p></div>
                        	<div class="col-md-6"><p><span class="desc">نهاية الاشتراك: </span> <?= $booking->book_end_date ?></p></div>
                        </div>

                    </div>
                </div>
				<?php }else{ ?>
                <div class="col-md-8 mx-auto" style="background-color: #F2F4F5;">
                	<div class=" margin-right-extra" style="margin: 20px;">
                        <p><span class="desc">انت غير مشترك بعضوية، يمكنك الأشتراك <a href="<?= site_url('memberships/subscribe') ?>" style="text-decoration: underline;color: #01355d">من هنا</a> </span></p>
                    </div>
                </div>
				<?php } ?>
            </div>
    </section>
</section>
