<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <?php $this->load->view('includes/breadcrumb'); ?>
            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row" style="margin-top: 20px">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold font-red uppercase"> <?= $pageTitle ?> </span>
                            
                        </div>
                    </div>
                    <div class="portlet-body form">
						<?php
                        echo form_open_multipart('members/members_edit/'.$row->member_uid);
                        ?> 
                        
                            <div class="form-body">

                                <div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label for="member_fname">أسم العضو الاول</label>
											<input type="text" class="form-control" name="member_fname" value="<?= $row->member_fname ?>" placeholder="برجاء كتابة أسم العضو الاول">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label for="member_lname">أسم العضو الاخير</label>
											<input type="text" class="form-control" name="member_lname" value="<?= $row->member_lname ?>" placeholder="برجاء كتابة أسم العضو الاخير">
											
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="country_uid">الدولة</label>
											<select class="form-control select2" id="country_uid" name="country_uid">
												<option value=""></option>
                                                <?php if($countries !== false){
														foreach($countries as $r) : ?>
                                                        <option value="<?php echo $r->id; ?>" <?php if($row->country_uid == $r->id){echo "selected";} ?>><?php echo $r->name; ?></option>  
                                                <?php endforeach;} ?>
											</select>
											
										</div>										
									</div>
									<input type="hidden" name="city_uid_jq" id="city_uid_jq" value="<?= $row->city_uid ?>" />
									<div class="col-md-6">
										<div class="form-group">
											<label for="city_uid">المدينة</label>
											<select class="form-control" id="city_uid" name="city_uid">
                                                
											</select>
											
										</div>
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="member_email">البريد الإلكتروني</label>
											<input type="email" class="form-control" name="member_email" value="<?= $row->member_email ?>" placeholder="برجاء كتابة عنوان البريد الإلكتروني">
											
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="member_mobile">رقم الجوال</label>
											<input type="number" class="form-control" name="member_mobile" value="<?= $row->member_mobile ?>" placeholder="برجاء كتابة رقم الجوال ">											
										</div>
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label for="member_password">كلمة المرور</label>
											<input type="password" class="form-control" name="member_password" value="" placeholder="برجاء كتابة كلمة المرور">
											
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label for="member_password1">تأكيد كلمة المرور</label>
											<input type="password" class="form-control" name="member_password1" placeholder="برجاء تأكيد كلمة المرور">
										</div>
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="mc_uid">العضوية</label>
											<select class="form-control" id="mc_uid" name="mc_uid">
												<option value="">أختار عضوية</option>
                                                <?php if($memberships !== false){
														foreach($memberships as $r) : ?>
                                                        <option value="<?php echo $r->mc_uid; ?>" <?php if($row->mc_uid == $r->mc_uid){echo "selected";} ?>><?php echo $r->mc_name; ?></option>  
                                                <?php endforeach;} ?>
											</select>
											
										</div>										
									</div>
									<div class="col-md-6">
										<label>ميعاد تجديد العضوية</label>
										<input class="form-control form-control-inline date-picker" size="30" type="text" value="<?= $row->member_renewal_date ?>" data-date-format="yyyy-mm-dd" data-date-start-date="+0d" name="member_renewal_date" placeholder="أضغط هنا لإختيار التاريخ" />
									</div>
								</div> 
                            
                            
                            </div>
                            <div class="form-actions noborder">
                                <button type="submit" class="btn btn-block green-jungle">تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
</div>
<!-- END CONTAINER -->

