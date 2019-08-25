<section>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="main-heading ">
                    <h1 ><?= $pageTitle ?></h1>
                </div>
				<?php //print_r($_SESSION); ?>
            </div>
        </div>
    </div>
</section>
<?php //print_r($_SESSION) ?>
<section rol="form-reservation">
    <div class="container mb-2 pb-4">
        
        <div class="reservation-form">
			<nav class="mt-2">
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">تسجيل حساب جديد</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">تسجيل دخول</a>
					
				</div>
			</nav>
			
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<form method="post" action="<?= site_url('members/register') ?>">
						<div class="row mt-3 pt-3">
							<div class="col-md-12">
								<h3>أدخل بياناتك الشخصية</h3>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="الاسم الأول" name="member_fname" value="<?php echo set_value('member_fname'); ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="الاسم الأخير" name="member_lname" value="<?php echo set_value('member_lname'); ?>">
								</div>
							</div>
						</div>

						<div class="row ">
							<div class="col-md-6">
								<div class="form-group">
									<select name="country_uid" id="countries2" style="width:100%;">
										<?php
										$countries = $this->global_model->getAllCountries();
										if($countries != false)
										foreach($countries as $r){
										?>


										<option value='<?= $r->id ?>' data-image="FLAGS_IMAGES" data-imagecss="flag <?= strtolower($r->iso) ?>" data-title="<?= "(+".$r->phonecode.") ".$r->name ?>" <?php echo set_select('country_uid', $r->id); ?>><?= $r->name ?></option>

										<?php } ?>


									</select>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select id="inputState2" class="form-control inputState" name="city_uid">
										<option value="0">أختار مدينة</option>
										<?php
										$cities = $this->global_model->getCitiesByCountryID();
										if($cities != false)
										foreach($cities as $r){
										?>
										<option value='<?= $r->city_uid ?>' <?php echo set_select('city_uid', $r->city_uid); ?>><?= $r->city_name_ar ?></option>
										<?php } ?>
									</select>
								</div>



							</div>
						</div>
						<!-- mobile -->
						<div class="row ">
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" class="form-control " id="mail" placeholder="البريد الإلكتروني" name="member_email" value="<?php echo set_value('member_email'); ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input id="phone2" type="tel" class="form-control tel " name="member_mobile" value="<?php echo set_value('member_mobile'); ?>">
								</div>
							</div>
						</div>

						<!-- password -->
						<div class="row ">
							<div class="col-md-6">
								<div class="form-group input-group">
									<input type="password" class="form-control password-field" name="member_password" placeholder="كلمة المرور">
									<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group input-group">
									<input type="password" class="form-control password-field2" name="member_password1" placeholder="تأكيد كلمة المرور">
									<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field2" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row ">
							<div class="col-md-12 mt-2 ">
								<button class="btn btn-default " type="submit">تسجيل حساب</button>
							</div>
						</div>
					</form>
				</div>
				
				
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<form method="post" action="<?= site_url('members/login') ?>">
						<div class="row mt-3  pt-3">
							<div class="col-md-12">
								<h3>أدخل بيانات حسابك</h3>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="البريد الإلكتروني أو رقم الجوال بدون كود الدولة" name="username">
								</div>
							</div>

						</div>
						<div class="row ">

							<div class="col-md-6">
								<div class="form-group input-group">
									<input type="password" class="form-control password-field" name="password" placeholder="كلمة المرور">
									<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
									</div>
								</div>

							</div>

						</div>
						<div class="row ">
							<div class="col-md-12 mt-2">
								<button class="btn btn-default" type="submit">تسجيل دخول</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
        </div>
    </div>
</section>

<!-- footer -->
