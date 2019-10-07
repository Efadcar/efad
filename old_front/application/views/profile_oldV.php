<section>
	<div class="container">
		<div class="row">
			<div class="col-12 ">
				<div class="main-heading  text-center ">
					<h1 class="no-border">المعلومات الشخصية</h1>

				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="reservation-form  mb-4 ">
					<div class="p-3 text-center">
						<div class="relative mx-auto col-sm-2 mb-2">
							<img class=" rounded-circle" src="<?= base_url() ?>assets/rtl/images/profile-pic.png" width="128" height="128">
						</div>
						<h4><?= $this->session->userdata('member_full_name') ?></h4>
					</div>
					<ul id="user-meta" class="c-list c-list--meta">
						<li class="c-list__item">
							<i class="fas fa-map-marker-alt"></i>
							<span>المدينة</span>

							<span class="u-block"><?= $this->global_model->getCityByUserID($this->session->userdata('member_uid')) ?></span>
						</li>
						<li class="c-list__item">
							<i class="fa fa-certificate"></i>
							<span>العضوية</span>

							<span class="u-block"><?= $this->global_model->getMembershipNameByID($this->session->userdata('mc_uid')) ?></span>
						</li>
						<li class="c-list__item">
							<i class="fas fa-coins"></i>
							<span>عدد النقاط</span>

							<span class="u-block">0</span>
						</li>
						<li class="c-list__item">
							<i class="fas fa-calculator"></i>
							<span>عدد الحجوزات</span>

							<span class="u-block"><?= count($bookings) ?></span>
						</li>

						<li class="c-list__item" title="متصل الآن">
							<i class="far fa-calendar-minus"></i>
							<span>آخر حجز</span>

							<span class="u-block">10/04/2019</span>
						</li>
					</ul>
				</div>

				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link " id="notification-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="true">تنبيهات</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" id="reservation-tab" data-toggle="tab" href="#reservation" role="tab" aria-controls="reservation" aria-selected="true">الحجوزات</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">البيانات الشخصية</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="member-tab" data-toggle="tab" href="#member" role="tab" aria-controls="member" aria-selected="false">تغير العضوية</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<div class="row">
							<div class="col-sm-12" style="color: white !important">
								<div class="toast__container">
									<div class="toast__cell">
										<div class="toast toast-info add-margin">
											<div class="toast__icon">
												<i class="fas fa-info-circle"></i>
											</div>
											<div class="toast__content">
												<p class="">معلومات بخصوص العضوية</p>
												<p class="toast__message">لقد قاربت عضويتك على الانتهاء يرجى تجديد العضوية</p>
											</div>
											<div class="toast__close">
												<i class="far fa-times-circle"></i>
											</div>
										</div>
										<div class="toast toast-warning add-margin">
											<div class="toast__icon">
												<i class="fas fa-exclamation-triangle"></i>
											</div>
											<div class="toast__content">
												<p class="">يرجى سداد حجز السيارة فى حساب البنك</p>
												<p class="toast__message">يرجى سداد حجز السيارة قبل موعد أستلامها بمده أقصاها 3 ايام عمل </p>
											</div>
											<div class="toast__close">
												<i class="far fa-times-circle"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade show active" id="reservation" role="tabpanel" aria-labelledby="reservation-tab">
						<div class="row">
							<div class="col-sm-12" style="color: white !important">
								<div class="toast__container">
									<?php
									if($bookings != false)
									foreach($bookings as $booking){
									?>
									<div class="toast__cell">
										<div class="toast toast-success">
											<div class="toast__icon">
												<i class="fas fa-check-circle"></i>
											</div>
											<div class="toast__content">
												<p class="toast__type">تم حجز سيارتك الان</p>
												<p class="toast__message">
													لقد قمت بحجز سياره <?= $this->global_model->getStringByKeyLanguage($booking->car_obj->cb_uid->cb_name, "arabic") ?> <?= $booking->car_obj->car_model_name ?> لمده <?= $booking->book_total_days ?> أيام ابتداء من<?= $booking->book_start_date ?> الى <?= $booking->book_end_date ?> 
												</p>
											</div>
											<div class="toast__close">
												<i class="far fa-times-circle"></i>
											</div>
										</div>
									</div>
									<?php } ?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="col-sm-6 mx-auto">
							<div class="row mt-3   pt-3">
								<div class="col-sm-12">
									<h4><i class="fas fa-edit"></i> البياناتك الشخصية</h4>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="avatar-wrapper">
									<i class="fas fa-camera"></i>
									<img class="profile-pic" src="images/profile-pic.png"/>
									<div class="upload-button">

									</div>
									<input class="file-upload" type="file" accept="image/*"/>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">

									<input type="text" class="form-control" placeholder="Mohamed">
								</div>
								<div class="form-group col-md-6">

									<input type="text" class="form-control" placeholder="Mosaad">
								</div>
								<div class="form-group col-md-6">

									<input type="email" class="form-control" placeholder="mohamed.mosaad@mail.com">
								</div>
								<div class="form-group col-md-6">

									<input type="tel" class="form-control" placeholder="010052242050">
								</div>

							</div>
							<button type="submit" class="btn btn-default">حفظ التعديلات</button>
						</div>
						<!-- personal info -->
						<!-- password -->
						<div class="col-sm-12 col-md-6 mx-auto">
							<div class="row mt-3   pt-3 mt-10">
								<div class="col-sm-12">
									<h4><i class="fas fa-edit"></i> كلمة المرور </h4>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="inputpass">كلمة المرور الحالية</label>
									<div class="input-group">
										<input type="password" id="inputpass" class="form-control password-field" name="password" value="كلمة المرور" placeholder="كلمة المرور">
										<div class="input-group-prepend">
											<span class=" input-group-text">
               									<span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="inputpass">كلمة المرور الجديد</label>
									<div class="input-group">
										<input type="password" id="Password1" class="form-control password-field" name="password" value="كلمة المرور" placeholder="كلمة المرور">
										<div class="input-group-prepend">
											<span class=" input-group-text">
               <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="inputpass"> تأكيد كلمة المرور الجديدة</label>
									<div class="input-group">
										<input type="password" id="Password2" class="form-control password-field" name="password" value="كلمة المرور" placeholder="كلمة المرور">
										<div class="input-group-prepend">
											<span class=" input-group-text">
               <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-default">تعديل كلمة المرور  </button>
						</div>
					</div>
					<div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member-tab">
						<div class="row mt-3   pt-3">
							<div class="col-sm-12">
								<h3>العضوية</h3>
							</div>
							<div class="col-sm-6">
								<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<strong class="d-inline-block mb-2 text-muted">لون العضوية</strong>
										<h3 class="mb-4"><?= $this->global_model->getMembershipNameByID($this->session->userdata('mc_uid')) ?></h3>
										<div>
											<h5 class="float-sm-right">
												<span class="text-muted mr-2">تاريخ انتهاء</span>
												<span><?= $this->session->userdata('member_renewal_date') ?></span>
											</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<strong class="d-inline-block mb-2 text-muted">تغير نوع العضوية</strong>
										<p>
											أنت الان مشترك فى العضويه الخضراء أذا كنت ترغب فى تغير أ, ترقيه العضويه يرجى الذهاب الى صفحة الاشتراكات
										</p>
										<p>
											<a href="" class="btn btn-default">مقارنة مميزات العضوية</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</section>