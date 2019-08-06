<?php //print_r($_SESSION); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1 ><?= $pageTitle ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section rol="form-reservation">
    <div class="container  mb-2 pb-4">
        <div class="row">
            <div class="col-12"> <a href="#" class="btn btn-default cutom-btn active">أستكمال بيانات الحجز</a> <!--<a href="#" class="btn btn-default cutom-btn">الحجز المجانى</a> --> </div>
        </div>
        <div class="reservation-form  bg-secondary">
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="carname d-flex ">
                        <h2>
							<span><?= $this->global_model->getStringByKeyLanguage($car->cb_uid->cb_name,"arabic") ?></span> 
							<span><?= $this->global_model->getStringByKeyLanguage($car->cm_uid->cm_name,"arabic") ?></span>
							<span><?= $car->car_model_year ?></span>
						</h2>
                    </div>
					<div class=" align-items-center mt-10">
						<div class="text-left "> 
							<span id="daily-rate" class="value"><?= $car->car_daily_price ?></span> 
							<span class="duration">ريال فى اليوم</span> 
						</div>
						<br><br>
						<ul class="cartype">
							<li>
								<div class="cartype-logo"> <img alt="gear" src="<?= base_url()."assets/".$direction; ?>/images/gear-icon.png" /> </div>
								<span ><?php if($car->car_transmission == "manual"){echo "يدوي";}else{echo "أوتوماتيك";} ?></span> </li>
							<li>
								<div class="cartype-logo"> <img alt="bag" src="<?= base_url()."assets/".$direction; ?>/images/bag-icon.png" /> </div>
								<span ><?= $car->car_bags ?> شنطة</span> </li>
							<li>
								<div class="cartype-logo"> <img alt="persons" src="<?= base_url()."assets/".$direction; ?>/images/person-icon.png" /> </div>
								<span ><?= $car->car_persons ?> أفراد</span> </li>
							<li>
								<div class="cartype-logo"> <img alt="doors" src="<?= base_url()."assets/".$direction; ?>/images/door-icon.png" /> </div>
								<span ><?= $car->car_doors ?> أبواب</span>
						</ul>
					</div>
					
                </div>
                <div class="col-sm-7 ml-5">
                    <div class="price-car text-right"> </div>
                    <div class="car-img">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
							  <?php
								$albums = $this->global_model->getAlbumByID($car->album_uid);
								$i = 1;
								if($albums != false)
								foreach($albums as $album){
								?>
							<div class="carousel-item <?php if($i == 1){echo "active";} ?>">
							  <img class="d-block w-100" src="<?= base_url().ALBUMS_IMAGES.$album; ?>" alt="First slide">
							</div>
							  <?php $i++; } ?>
							
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" >
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
						
						
						
						<!--<img src="<?= base_url().ALBUMS_IMAGES.$car->main_image; ?>" class="img-fluid" /> --> </div>
                </div>
                
            </div>
        </div>
        <!-- reservation form -->
        
        <div class="reservation-form">
            <div class="date-reserve mb-4">
                <h3> أدخل بيانات الحجز </h3>
                <div class="row d-flex align-items-center">
                    <div class="col-sm-8" >
						<form id="book-form">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>اختر تاريخ أستلام السيارة</label>
										<input type="text" id="date-start" class="form-control floating-label" placeholder="اختر تاريخ أستلام السيارة" name="book_start_date" required>
										<small class="form-text" style="color: #A62F31">يمكنك الحصول علي خصم 10% إضافي في حالة أختيار تاريخ أستلام السيارة بعد <?= EARLY_BOOKING_AFTER ?>  يوم من تاريخ الحجز</small>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>اختر تاريخ تسليم السيارة</label>
										<input type="text" id="date-end" class="form-control floating-label freeend" placeholder="اختر تاريخ تسليم السيارة" name="book_end_date" required>
									</div>
								</div>
							</div>
							<input type="hidden" name="mc_uid" value="<?= $this->session->userdata('mc_uid') ?>" />
							<input type="hidden" name="car_uid" value="<?= $car->car_uid ?>" />
							<input type="hidden" name="member_uid" value="<?= $this->session->userdata('member_uid') ?>" />
						</form>
                    </div>
					
					<div class="col-sm-4 text-center ">
						<h3 class="mb-0 pr-2">عدد الأيام</h3>
						<span class="value total-days">0</span> 
					</div>
                </div>
            </div>
			<form method="post" action="<?= site_url('book/confirm') ?>" id="confirm-booking">
				<div class="row">
					<div class="col-sm-4 ">
						<div class="form-group">
							<label>اختر مدينة أستلام السيارة</label>
							<div class="select-wrapper">

								<select id="inputStatebook" class="form-control width100p " name="delivery_city_uid" required>
									<option value="0"> اختر مدينه </option>
									<?php
									$cities = $this->global_model->getCitiesByCountryID();
									if($cities != false)
									foreach($cities as $r){
									?>


									<option value='<?= $r->city_uid ?>'><?= $r->city_name_ar ?></option>

									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-4 ">
					</div>
					<div class="col-sm-4 text-center ">
						<h3 class="mb-0 pr-2">السعر الاجمالى</h3>
						<span class="value total-price">0</span> <span id="currency">ريال</span> 
					</div>
				</div>




				<div class="row">

					<div class="col-sm-12 text-center mt-4 ">
						<p class="text-muted ">بالضغط على تأكيد الدفع أنت توافق على <a href="<?= site_url('terms_and_conditions') ?>" target="_blank">الشروط و الآحكام </a> و <a href="<?= site_url('privcy_policy') ?>" target="_blank">سياسة الخصوصية </a></p>
					</div>
					<div class="col-sm-12 text-center ">
						<button class="btn btn-default  mb-2" id="paynow" >دفع و تأكيد الحجز</button>
					</div>
				</div>
			</form>				
        </div>
    </div>
</section>

<!-- footer -->
