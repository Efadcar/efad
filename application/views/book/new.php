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
            <div class="col-12"> <a href="#" class="btn btn-default cutom-btn active">استكمال بيانات الحجز</a> <!--<a href="#" class="btn btn-default cutom-btn">الحجز المجانى</a> --> </div>
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
							<span class="duration">ريال في اليوم</span> 
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
		<div class="cd-faq-items mb-4">
			<ul class="cd-faq-group">

				<li class="cd-faq-question question1" style="border: 1px solid #d1d1d1;"> 
					<a class="cd-faq-trigger trigger1" href="#0">مميزات السيارة</a>
					<div class="cd-faq-content">
						<div class="row">
							<div class="col-sm-3">
								<h5>نمط السيارة</h5>
								<span><?= $this->global_model->getTypeByID($car->ct_uid) ?></span>
							</div>
							<div class="col-sm-3">
								<h5>سعة المحرك</h5>
								<span><?= $car->car_engine_litre ?> ليتر</span>
							</div>
							<div class="col-sm-3">
								<h5>نظام الدفع</h5>
								<span>
								<?php
								switch($car->car_drivetrain){
									case "front";
										echo "دفع أمامي";
										break;
									case "rear";
										echo "دفع خلفي";
										break;
									case "4x4";
										echo "دفع رباعي";
										break;
								}
								?>
								
								</span>
							</div>
							<div class="col-sm-3">
								<h5>اللون الخارجي</h5>
								<span>
									<?php 
									if($car->car_color_secondary != 0){
										echo $this->global_model->getColorByID($car->car_color_secondary);
									}else{
										echo $this->global_model->getColorByID($car->car_color);
									}
									 
									?>
								</span>
							</div>
						</div>
						<?php if($car->car_features != ""){ ?>
						<div class="row mt-4">
							<div class="col-sm-12">
								<h5>مميزات أخري</h5>
								<p><?= $car->car_features ?></p>
							</div>
						</div>
						<?php } ?>
					</div>
				</li>
			</ul>
		</div>

		
		
        <!-- reservation form

		<div id="accordion" class="mb-3">
			<div class="card">
				<a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				<div class="card-header" id="headingOne">
					<h5 class="mb-0">
					
					مميزات السيارة
					
					</h5>
				</div>
					</a>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>


		</div>
		
		



-->
        <?php if($car->car_status != 0 && $car->car_in_stock != 0){  ?>
        <div class="reservation-form">
            <div class="date-reserve mb-4">
                <h3> أدخل بيانات الحجز </h3>
                <div class="row d-flex align-items-center">
                    <div class="col-sm-8" >
						<form id="book-form">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>أختر تاريخ أستلام السيارة</label>
										<input type="text" id="date-start" class="form-control floating-label" placeholder="أختر تاريخ أستلام السيارة" name="book_start_date" required>
										<!--<small class="form-text" style="color: #A62F31">يمكنك الحصول علي خصم <?= EARLY_BOOKING_DISCOUNT ?>% إضافي علي اول أسبوع في حالة أختيار تاريخ أستلام السيارة بعد <?= EARLY_BOOKING_AFTER ?>  يوم من تاريخ الحجز</small> -->
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>أختر تاريخ تسليم السيارة</label>
										<input type="text" id="date-end" class="form-control floating-label freeend" placeholder="أختر تاريخ تسليم السيارة" name="book_end_date" required>
									</div>
								</div>
							</div>
							<input type="hidden" name="mc_uid" value="<?= $this->session->userdata('mc_uid') ?>" />
							<input type="hidden" name="car_uid" value="<?= $car->car_uid ?>" />
							<input type="hidden" name="member_uid" value="<?= $this->session->userdata('member_uid') ?>" />
						</form>
                    </div>
					
					<div class="col-sm-4 text-center ">
						<h3 class="mb-0 pr-2">عدد أيام الاشترك</h3>
						<span class="value total-days">0</span> 
					</div>
                </div>
            </div>
			<form method="post" action="<?= site_url('book/confirm') ?>" id="confirm-booking">
				<div class="row">
					<div class="col-sm-4 ">
						<div class="form-group">
							<label>أختر مدينة أستلام السيارة</label>
							<div class="select-wrapper">

								<select id="inputStatebook" class="form-control width100p " name="delivery_city_uid" required>
									<option value="0"> أختر المدينة </option>
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
						<h3 class="mb-0 pr-2">المبلغ الإجمالي</h3>
						<span class="value total-price">0</span> <span id="currency">ريال</span> 
					</div>
				</div>




				<div class="row">
					<div class="col-sm-12 text-center ">
						<button class="btn btn-default  mb-2" id="paynow" >استمرار</button>
					</div>
				</div>
			</form>				
        </div>
		
		<?php } ?>
    </div>
</section>

<!-- footer -->
