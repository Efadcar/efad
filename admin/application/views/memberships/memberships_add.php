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
                        echo form_open_multipart('memberships/memberships_add');
                        ?> 
                        
                            <div class="form-body">

								
								
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>أسم العضوية</label>
											<input type="text" class="form-control" placeholder="برجاء كتابة أسم العضوية" name="mc_name" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>قيمة الخصم</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة قيمة الخصم" name="mc_dicount" required> 
										</div>
									</div>
									<div class="col-md-4">
										<label>لون العضوية</label>
										<input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161" name="mc_color_code">
									</div>
								</div> 								
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>السعر ٦ اشهر</label>
											<input type="number" class="form-control" placeholder="برجاء كتابةالسعر" name="mc_6months_price" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>السعر ٩ اشهر</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة السعر" name="mc_9months_price" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>السعر ١٢ شهر</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة السعر" name="mc_12months_price" required> 
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>الساعات الإضافية المسموحة</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة عدد الساعات" name="mc_allow_hours" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد الأيام الإضافية المجانية</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة عدد الأيام" name="mc_free_days" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد النقاط الإضافية السنوية</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة عدد النقاط" name="mc_points" required> 
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>رسوم ايقاف السياره فى المطار</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة قيمة الرسوم" name="mc_airport_parking" value="0" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">حالة العضوية</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="مفعلة" data-off-text="غير&nbsp;مفعلة" data-off-color="danger" checked data-on-color="success" value="1" name="mc_status">
											</div>
										</div>
									</div>
									
									
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">تأمين شامل 100 ٪</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_insurance">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">توصيل و استلام السيارة مجاناً</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_free_delivery">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">الكيلو متر مفتوح</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_open_km">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">تسليم السيارة في مدينة أخرى مجاناً</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_city_delivery">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">خدمة الصيانة الدورية للسيارة</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_maintenance">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">سيارة مزودة بالوقود</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_full_fuel">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">خدمة المساعدة على الطريق</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_road_help">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">خدمة الحجز المبكر مجاناً</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_early_booking">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">خدمة اليوم الأول المجاني</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_first_day_free">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">خدمة غسيل وتنظيف السيارة</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_car_care">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">ترقية فئة السيارة إلى فئة أعلى</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_can_upgrade">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">حجز ودفع قيمة الاشتراك لاحقاً</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_pay_later">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">عروض خاصة</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_special_offers">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">عوازل حرارية</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_heat_block">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">نظام الملاحة</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" data-off-color="danger" checked data-on-color="success" value="1" name="mc_gps_system">
											</div>
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

