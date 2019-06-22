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
                        echo form_open_multipart('admins/admins_add');
                        ?> 
                        
                            <div class="form-body">

                                <div class="row">
									<div class="col-md-6">
										<div class="form-group form-md-line-input form-md-floating-label ">
											<input type="text" class="form-control" name="user_full_name" value="<?php echo set_value('user_full_name'); ?>">
											<label for="user_full_name">أسم الموظف بالكامل</label>
											<span class="help-block">برجاء كتابة أسم الموظف بالكامل </span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-md-line-input form-md-floating-label ">
											<input type="email" class="form-control" name="user_email" value="<?php echo set_value('user_email'); ?>">
											<label for="user_email">البريد الإلكتروني</label>
											<span class="help-block">برجاء كتابة عنوان البريد الإلكتروني </span>
										</div>
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group form-md-line-input form-md-floating-label ">
											<input type="password" class="form-control" name="user_pwd" value="">
											<label for="user_pwd">كلمة المرور</label>
											<span class="help-block">برجاء كتابة كلمة المرور </span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-md-line-input form-md-floating-label ">
											<input type="password" class="form-control" name="user_pwd1">
											<label for="user_pwd1">تأكيد كلمة المرور</label>
											<span class="help-block">برجاء تأكيد كلمة المرور </span>
										</div>
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-6">
										<div class="form-group form-md-line-input form-md-floating-label">
											<select class="form-control" id="form_control_1" name="group_uid">
												<option value=""></option>
                                                <?php if($groups !== false){
														foreach($groups as $r) : ?>
                                                        <option value="<?php echo $r->group_uid; ?>" <?php echo set_select('group_uid', $r->group_uid); ?>><?php echo $r->group_name; ?></option>  
                                                <?php endforeach;} ?>
											</select>
											<label for="form_control_1">المجموعة</label>
										</div>										
									</div>
									<div class="col-md-6">
										<div class="form-group form-md-line-input form-md-floating-label">
											<select class="form-control" id="form_control_1" name="user_banned">
												<option value=""></option>
												<option value="0">مفعل</option>
												<option value="1">محظور</option>
											</select>
											<label for="form_control_1">حالة الموظف</label>
										</div>
									</div>
								</div> 
                            
                            
                            </div>
                            <div class="form-actions noborder">
                                <button type="submit" class="btn btn-block green-jungle">إضافة</button>
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

