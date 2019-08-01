<nav class="navbar navbar-expand-lg navbar-light fixed-top sb-navbar nav-new" dir="ltr">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= site_url() ?>">
			<img class="logo" src="<?= base_url()."assets/".$direction; ?>/images/last-logo.png" alt="Efad Logo" />
		</a>
	
		<div class="collapse navbar-collapse" id="mainMenu">
			<ul class="navbar-nav ml-auto" dir="rtl">
				<li class="nav-item"><a class="nav-link" href="#"><?= $this->lang->line('discover'); ?></a></li>
				<li class="nav-item"><a class="nav-link" href="<?= site_url() ?>"><?= $this->lang->line('home'); ?></a></li>
				<li class="nav-item"><a class="nav-link" href="#">&nbsp;&nbsp;&nbsp;<?= $this->lang->line('how_to_get_car'); ?>&nbsp;&nbsp;&nbsp;</a></li>
				<li class="nav-item"><a class="nav-link" href="#"><?= $this->lang->line('quick_payment'); ?></a></li>
				<li class="nav-item"><a class="nav-link" href="<?= site_url('faq') ?>">&nbsp;<?= $this->lang->line('faq'); ?>&nbsp;</a> </li>
				<!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">للمزيد </a>
                        <div class="dropdown-menu border-0 shadow animate slideIn " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">إتصل بنا</a> <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">الشروط و الأحكام</a>
                        </div>
                    </li>-->

			</ul>
			<?php $is_logged_in = $this->session->userdata('is_logged_in'); 
			if(isset($is_logged_in) && $is_logged_in == 1){ ?>
			<div class="navbar-buttons  mbr-section-btn "> 

				<a class="btn btn-default dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					مرحباُ: <?= $this->session->userdata('member_full_name') ?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="top: 75% !important; font-size: 13px">
					<a class="dropdown-item" href="#">حجوزاتي</a>
					<a class="dropdown-item" href="<?= site_url('members/profile') ?>">الملف الشخصي</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= site_url('members/logout') ?>">تسجيل خروج</a>
				</div>
				
				
				
			
			</div>
			<?php }else{ ?>
			<div class="navbar-buttons  mbr-section-btn "> 
				<a id="top-login-button" href="#login_form_ajax" class="mr-2 login-link">
					<?= $this->lang->line('login'); ?> 
				</a>
				<a href="<?= site_url('memberships/subscribe') ?>" class="btn btn--accent">
					<span><span><?= $this->lang->line('membership_adv'); ?></span></span>
				</a> 
			</div>			
			<?php } ?>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<div class="hamburger"> <span></span> <span></span> <span></span> <span></span> </div>
		</button>
	</div>
</nav>
<div style="display:none">
	<div id="login_form_ajax" class="login-wrap">
		<div id="login_inputs">
			<?php echo form_open('members/login'); ?>
			<div class="panel" id="login">
				<h3>تسجيل الدخول</h3>
					<div class="form-group">
						<input type='text' name='username' id='mobile' class="form-control" placeholder="البريد الإلكتروني أو رقم الجوال بدون كود الدولة"/>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control password-field" name="password" placeholder="كلمة المرور">
							<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
							</div>
						</div>
					</div>
					<div class="form-group text-right"> 
						<a class="right_a switchPanelButton  " panelclass="panel" panelid="forgotpassword" href="#">نسيب كلمة المرور؟</a> 
					</div>
					<input type='submit' name='Submit' class="btn btn-default  btn-block" value='تسجيل الدخول'/>
				
				<div class="bottom">
					<a class="switchPanelButton" panelclass="panel" panelid="register" href="#">ليس لديك حساب؟ إنشاء حساب جديد.</a>
				</div>
			</div>
			</form>
			<?php echo form_open('members/register'); ?>
			<div class="panel" id='register'>
				<h3>تسجيل حساب جديد</h3>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="الأسم الاول" name="member_fname">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="الأسم الأخير" name="member_lname">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<select name="country_uid" id="countries" data-placeholder="أختر الدولة" class=" " style="width:100%;">
								<?php
								$countries = $this->global_model->getAllCountries();
								if($countries != false)
								foreach($countries as $r){
								?>
								
								
								<option value='<?= $r->id ?>' data-image="FLAGS_IMAGES" data-imagecss="flag <?= strtolower($r->iso) ?>" data-title="<?= "(+".$r->phonecode.") ".$r->name ?>"><?= $r->name ?></option>
								
								<?php } ?>
							
							
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<select id="inputState" data-placeholder="أختر مدينه" class="form-control " name="city_uid">
								<option value="0">أختار مدينة</option>
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
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="البريد الإلكتروني" name="member_email">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input id="phone" type="tel" class="form-control tel " name="member_mobile">
						</div>
					</div>
				</div>
				<div class="row  my-2">
					<div class="col-sm-12">
						<label for="user_password"> كلمة المرور</label>
						<div class="input-group">
							<input type="password" class="form-control password-field" name="member_password">
							<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-sm-12">
						<label for="user_password">اعادة كتابة كلمة المرور</label>
						<div class="input-group">
							<input type="password" class="form-control password-field2" name="member_password1">
							<div class="input-group-prepend"> <span class=" input-group-text"> <span toggle=".password-field2" class=" fa fa-fw fa-eye field-icon toggle-password"></span></span>
							</div>
						</div>
					</div>
				</div>
				<input type='submit' name='Submit' class="btn btn-default  btn-block my-4" value='إرسال'/>
				<div class="bottom"> <a class="switchPanelButton" panelclass="panel" panelid="login" href="#">لديك حساب. سجل دخول الان</a> </div>
			</div>
			</form>
			<div class="panel" id='forgotpassword'>
				<h3>إعاده تعين كلمة مرور جديدة</h3>
				<input type='tel' name='mobile' id='Tel1' value='أدخل رقم الجوال' class="form-control" placeholder="mobile ID"/>
				<input type='submit' name='Submit' class="btn btn-default  btn-block my-4" value='أستعادة كلمة المرور'/>
				<div class="bottom"> يرجى مراجعه الهاتف و كتابة كود التفعيل </div>
			</div>
		</div>
	</div>
</div>