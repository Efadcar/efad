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
                        echo form_open_multipart('cars/cars_add');
                        ?> 
                        
                            <div class="form-body">

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="cc_uid">قسم السيارة</label>
											<select class="form-control" id="cc_uid" name="cc_uid" required>
												<option value=""></option>
                                                <?php if($categories !== false){
														foreach($categories as $r) : ?>
                                                        <option value="<?php echo $r->cc_uid; ?>" <?php echo set_select('cc_uid', $r->cc_uid); ?>><?php echo $this->global_model->getStringByKeyLanguage('cc_name'.$r->cc_code, 'arabic') ?></option>  
                                                <?php endforeach;} ?>
											</select>
											
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="ct_uid">نمط السيارة</label>
											<select class="form-control" id="ct_uid" name="ct_uid" required>
												<option value=""></option>
                                                <?php if($types !== false){
														foreach($types as $r) : ?>
                                                        <option value="<?php echo $r->ct_uid; ?>" <?php echo set_select('ct_uid', $r->ct_uid); ?>><?php echo $this->global_model->getStringByKeyLanguage('ct_name'.$r->ct_code, 'arabic') ?></option>  
                                                <?php endforeach;} ?>
											</select>
											
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="cb_uid">ماركة السيارة</label>
											<select class="form-control" id="cb_uid" name="cb_uid" required>
												<option value=""></option>
                                                <?php if($brands !== false){
														foreach($brands as $r) : ?>
                                                        <option value="<?php echo $r->cb_uid; ?>" <?php echo set_select('cb_uid', $r->cb_uid); ?>><?php echo $this->global_model->getStringByKeyLanguage('cb_name'.$r->cb_code, 'arabic') ?></option>  
                                                <?php endforeach;} ?>
											</select>
											
										</div>										
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="album_uid">ألبوم الصور</label>
											<select class="form-control select2" id="album_uid" name="album_uid" required>
												<option value=""></option>
                                                <?php if($albums !== false){
														foreach($albums as $r) : ?>
                                                        <option value="<?php echo $r->album_uid; ?>" <?php echo set_select('album_uid', $r->album_uid); ?>><?php echo $this->global_model->getStringByKeyLanguage('album_name'.$r->album_code, 'arabic') ?></option>  
                                                <?php endforeach;} ?>
											</select>
											
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="car_color">لون السيارة</label>
											<select class="form-control select2" id="car_color" name="car_color" required>
												<option value=""></option>
                                                <?php if($colors !== false){
														foreach($colors as $r) : ?>
                                                        <option value="<?php echo $r->cco_uid; ?>" <?php echo set_select('car_color', $r->cco_uid); ?>><?php echo $r->cco_name ?></option>  
                                                <?php endforeach;} ?>
											</select>
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="car_model_year">سنة الصنع</label>
											<select class="form-control select2" id="car_model_year" name="car_model_year" required>
												<option value=""></option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
												<option value="2019">2019</option>
											</select>
										</div>										
									</div>
								</div>
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>موديل السيارة</label>
											<input type="text" class="form-control" placeholder="برجاء كتابة موديل السيارة" name="car_model_name" required> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>رقم اللوحة</label>
											<input type="text" class="form-control" placeholder="برجاء كتابة رقم اللوحة للسيارة" name="car_plate_number" required> 
										</div>
									</div>
									<div class="col-md-4">
										<label>ميعاد الصيانة الدورية</label>
										<input class="form-control form-control-inline date-picker" size="30" type="text" value="" data-date-format="yyyy-mm-dd" data-date-start-date="+0d" name="next_maintenance_date" placeholder="أضغط هنا لإختيار التاريخ" />
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>سعة المحرك</label>
											<select class="form-control" required name="car_engine_litre">
												<option value="" disabled selected>برجاء اختيار سعة المحرك</option>
												<option value="1.0">1.0</option>
												<option value="1.5">1.5</option>
												<option value="1.6">1.6</option>
												<option value="1.7">1.7</option>
												<option value="1.8">1.8</option>
												<option value="2.0">2.0</option>
												<option value="2.2">2.2</option>
												<option value="2.3">2.3</option>
												<option value="2.5">2.5</option>
												<option value="2.6">2.6</option>
												<option value="2.8">2.8</option>
												<option value="3.0">3.0</option>
												<option value="3.2">3.2</option>
												<option value="3.3">3.3</option>
												<option value="3.5">3.5</option>
												<option value="3.7">3.7</option>
												<option value="3.8">3.8</option>
												<option value="3.9">3.9</option>
												<option value="4.1">4.1</option>
												<option value="4.2">4.2</option>
												<option value="4.3">4.3</option>
												<option value="4.4">4.4</option>
												<option value="4.8">4.8</option>
												<option value="4.9">4.9</option>
												<option value="5.0">5.0</option>
												<option value="5.2">5.2</option>
												<option value="5.7">5.7</option>
												<option value="5.8">5.8</option>
												<option value="5.9">5.9</option>
												<option value="6.0">6.0</option>
												<option value="6.2">6.2</option>
												<option value="6.6">6.6</option>
												<option value="6.9">6.9</option>
												<option value="7.0">7.0</option>
												<option value="7.4">7.4</option>
												<option value="7.5">7.5</option>
												<option value="7.6">7.6</option>
												<option value="7.8">7.8</option>
												<option value="8.1">8.1</option>
												<option value="8.2">8.2</option>
												<option value="8.3">8.3</option>
												<option value="8.6">8.6</option>
												<option value="9.0">9.0</option>
												<option value="9.1">9.1</option>
												<option value="9.3">9.3</option>
												<option value="10.0">10.0</option>
												<option value="10.4">10.4</option>
												<option value="10.5">10.5</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>نظام الدفع</label>
											<select class="form-control" required name="car_drivetrain">
												<option value="" disabled selected>برجاء اختيار نظام الدفع</option>
												<option value="front">دفع أمامي</option>
												<option value="rear">دفع خلفي</option>
												<option value="4x4">دفع رباعي</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>ناقل الحركة</label>
											<select class="form-control" required name="car_transmission">
												<option value="" disabled selected>برجاء اختيار نوع ناقل الحركة</option>
												<option value="manual">يدوي</option>
												<option value="auto">تلقائي</option>
											</select>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد الأفراد</label>
											<select class="form-control" required name="car_persons">
												<option value="" disabled selected>برجاء اختيار عدد الأفراد</option>
												<option value="2">فردين</option>
												<option value="5">5 أفراد</option>
												<option value="7">7 أفراد</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد الأبواب</label>
											<select class="form-control" required name="car_doors">
												<option value="" disabled selected>برجاء اختيار عدد الأبواب</option>
												<option value="2">بابين</option>
												<option value="4">4 أبواب</option>
												<option value="6">6 أبواب</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد الشنط</label>
											<select class="form-control" required name="car_bags">
												<option value="" disabled selected>برجاء اختيار عدد الشنط</option>
												<option value="1">واحدة</option>
												<option value="2">اثنين</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>المميزات الأخري</label><br>
											<textarea class="wysihtml5 form-control" rows="6" name="car_features"></textarea>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>السعر أقل من 6 شهور</label>
											<input type="number" class="form-control" placeholder="برجاء كتابةالسعر لأقل من 6 شهور" name="car_daily_price" required> 
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>السعر أكثر من 6 شهور</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة السعر لأكثر من 6 شهور" name="car_monthly_price" required> 
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">السيارة مفعلة</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="نعم" data-off-text="لا" data-off-color="danger" checked data-on-color="success" value="1" name="car_status">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">السيارة لديها عرض</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="نعم" data-off-text="لا" data-off-color="danger" data-on-color="success" value="1" name="has_offer">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">السيارة مضافة حديثا</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="نعم" data-off-text="لا" data-off-color="danger" data-on-color="success" value="1" name="new_car">
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

