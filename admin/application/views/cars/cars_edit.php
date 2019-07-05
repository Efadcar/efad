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
                        echo form_open_multipart('cars/cars_edit/'.$row->car_uid);
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
                                                        <option value="<?php echo $r->cc_uid; ?>" <?php echo set_select('cc_uid', $r->cc_uid); ?> <?php if($row->cc_uid == $r->cc_uid){echo "selected";} ?>><?php echo $this->global_model->getStringByKeyLanguage('cc_name'.$r->cc_code, 'arabic') ?></option>  
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
                                                        <option value="<?php echo $r->ct_uid; ?>" <?php echo set_select('ct_uid', $r->ct_uid); ?> <?php if($row->ct_uid == $r->ct_uid){echo "selected";} ?>><?php echo $this->global_model->getStringByKeyLanguage('ct_name'.$r->ct_code, 'arabic') ?></option>  
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
                                                        <option value="<?php echo $r->cb_uid; ?>" <?php echo set_select('cb_uid', $r->cb_uid); ?> <?php if($row->cb_uid == $r->cb_uid){echo "selected";} ?>><?php echo $this->global_model->getStringByKeyLanguage('cb_name'.$r->cb_code, 'arabic') ?></option>  
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
                                                        <option value="<?php echo $r->album_uid; ?>" <?php echo set_select('album_uid', $r->album_uid); ?> <?php if($row->album_uid == $r->album_uid){echo "selected";} ?>><?php echo $this->global_model->getStringByKeyLanguage('album_name'.$r->album_code, 'arabic') ?></option>  
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
                                                        <option value="<?php echo $r->cco_uid; ?>" <?php echo set_select('car_color', $r->cco_uid); ?> <?php if($row->car_color == $r->cco_uid){echo "selected";} ?>><?php echo $r->cco_name ?></option>  
                                                <?php endforeach;} ?>
											</select>
										</div>										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="car_model_year">سنة الصنع</label>
											<select class="form-control select2" id="car_model_year" name="car_model_year" required>
												<option value=""></option>
												<option value="2016" <?php if($row->car_model_year == 2016){echo "selected";} ?>>2016</option>
												<option value="2017" <?php if($row->car_model_year == 2017){echo "selected";} ?>>2017</option>
												<option value="2018" <?php if($row->car_model_year == 2018){echo "selected";} ?>>2018</option>
												<option value="2019" <?php if($row->car_model_year == 2019){echo "selected";} ?>>2019</option>
											</select>
										</div>										
									</div>
								</div>
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>موديل السيارة</label>
											<input type="text" class="form-control" placeholder="برجاء كتابة موديل السيارة" name="car_model_name" required value="<?= $row->car_model_name ?>"> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>رقم اللوحة</label>
											<input type="text" class="form-control" placeholder="برجاء كتابة رقم اللوحة للسيارة" name="car_plate_number" required value="<?= $row->car_plate_number ?>"> 
										</div>
									</div>
									<div class="col-md-4">
										<label>ميعاد الصيانة الدورية</label>
										<input class="form-control form-control-inline date-picker" size="30" type="text" value="<?= $row->next_maintenance_date ?>" data-date-format="yyyy-mm-dd" data-date-start-date="+0d" name="next_maintenance_date" placeholder="أضغط هنا لإختيار التاريخ" />
									</div>
								</div> 
                                <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>سعة المحرك</label>
											<select class="form-control" required name="car_engine_litre">
												<option value="" disabled selected>برجاء اختيار سعة المحرك</option>
												<option value="1.0"  <?php if($row->car_engine_litre =="1.0"){echo "selected";} ?>>1.0</option>
												<option value="1.5"  <?php if($row->car_engine_litre =="1.5"){echo "selected";} ?>>1.5</option>
												<option value="1.6"  <?php if($row->car_engine_litre =="1.6"){echo "selected";} ?>>1.6</option>
												<option value="1.7"  <?php if($row->car_engine_litre =="1.7"){echo "selected";} ?>>1.7</option>
												<option value="1.8"  <?php if($row->car_engine_litre =="1.8"){echo "selected";} ?>>1.8</option>
												<option value="2.0"  <?php if($row->car_engine_litre =="2.0"){echo "selected";} ?>>2.0</option>
												<option value="2.2"  <?php if($row->car_engine_litre =="2.2"){echo "selected";} ?>>2.2</option>
												<option value="2.3"  <?php if($row->car_engine_litre =="2.3"){echo "selected";} ?>>2.3</option>
												<option value="2.5"  <?php if($row->car_engine_litre =="2.5"){echo "selected";} ?>>2.5</option>
												<option value="2.6"  <?php if($row->car_engine_litre =="2.6"){echo "selected";} ?>>2.6</option>
												<option value="2.8"  <?php if($row->car_engine_litre =="2.8"){echo "selected";} ?>>2.8</option>
												<option value="3.0"  <?php if($row->car_engine_litre =="3.0"){echo "selected";} ?>>3.0</option>
												<option value="3.2"  <?php if($row->car_engine_litre =="3.2"){echo "selected";} ?>>3.2</option>
												<option value="3.3"  <?php if($row->car_engine_litre =="3.3"){echo "selected";} ?>>3.3</option>
												<option value="3.5"  <?php if($row->car_engine_litre =="3.5"){echo "selected";} ?>>3.5</option>
												<option value="3.7"  <?php if($row->car_engine_litre =="3.7"){echo "selected";} ?>>3.7</option>
												<option value="3.8"  <?php if($row->car_engine_litre =="3.8"){echo "selected";} ?>>3.8</option>
												<option value="3.9"  <?php if($row->car_engine_litre =="3.9"){echo "selected";} ?>>3.9</option>
												<option value="4.1"  <?php if($row->car_engine_litre =="4.1"){echo "selected";} ?>>4.1</option>
												<option value="4.2"  <?php if($row->car_engine_litre =="4.2"){echo "selected";} ?>>4.2</option>
												<option value="4.3"  <?php if($row->car_engine_litre =="4.3"){echo "selected";} ?>>4.3</option>
												<option value="4.4"  <?php if($row->car_engine_litre =="4.4"){echo "selected";} ?>>4.4</option>
												<option value="4.8"  <?php if($row->car_engine_litre =="4.8"){echo "selected";} ?>>4.8</option>
												<option value="4.9"  <?php if($row->car_engine_litre =="4.9"){echo "selected";} ?>>4.9</option>
												<option value="5.0"  <?php if($row->car_engine_litre =="5.0"){echo "selected";} ?>>5.0</option>
												<option value="5.2"  <?php if($row->car_engine_litre =="5.2"){echo "selected";} ?>>5.2</option>
												<option value="5.7"  <?php if($row->car_engine_litre =="5.7"){echo "selected";} ?>>5.7</option>
												<option value="5.8"  <?php if($row->car_engine_litre =="5.8"){echo "selected";} ?>>5.8</option>
												<option value="5.9"  <?php if($row->car_engine_litre =="5.9"){echo "selected";} ?>>5.9</option>
												<option value="6.0"  <?php if($row->car_engine_litre =="6.0"){echo "selected";} ?>>6.0</option>
												<option value="6.2"  <?php if($row->car_engine_litre =="6.2"){echo "selected";} ?>>6.2</option>
												<option value="6.6"  <?php if($row->car_engine_litre =="6.6"){echo "selected";} ?>>6.6</option>
												<option value="6.9"  <?php if($row->car_engine_litre =="6.9"){echo "selected";} ?>>6.9</option>
												<option value="7.0"  <?php if($row->car_engine_litre =="7.0"){echo "selected";} ?>>7.0</option>
												<option value="7.4"  <?php if($row->car_engine_litre =="7.4"){echo "selected";} ?>>7.4</option>
												<option value="7.5"  <?php if($row->car_engine_litre =="7.5"){echo "selected";} ?>>7.5</option>
												<option value="7.6"  <?php if($row->car_engine_litre =="7.6"){echo "selected";} ?>>7.6</option>
												<option value="7.8"  <?php if($row->car_engine_litre =="7.8"){echo "selected";} ?>>7.8</option>
												<option value="8.1"  <?php if($row->car_engine_litre =="8.1"){echo "selected";} ?>>8.1</option>
												<option value="8.2"  <?php if($row->car_engine_litre =="8.2"){echo "selected";} ?>>8.2</option>
												<option value="8.3"  <?php if($row->car_engine_litre =="8.3"){echo "selected";} ?>>8.3</option>
												<option value="8.6"  <?php if($row->car_engine_litre =="8.6"){echo "selected";} ?>>8.6</option>
												<option value="9.0"  <?php if($row->car_engine_litre =="9.0"){echo "selected";} ?>>9.0</option>
												<option value="9.1"  <?php if($row->car_engine_litre =="9.1"){echo "selected";} ?>>9.1</option>
												<option value="9.3"  <?php if($row->car_engine_litre =="9.3"){echo "selected";} ?>>9.3</option>
												<option value="10.0"  <?php if($row->car_engine_litre =="10.0"){echo "selected";} ?>>10.0</option>
												<option value="10.4"  <?php if($row->car_engine_litre =="10.4"){echo "selected";} ?>>10.4</option>
												<option value="10.5"  <?php if($row->car_engine_litre =="10.5"){echo "selected";} ?>>10.5</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>نظام الدفع</label>
											<select class="form-control" required name="car_drivetrain">
												<option value="" disabled selected>برجاء اختيار نظام الدفع</option>
												<option value="front" <?php if($row->car_drivetrain =="front"){echo "selected";} ?>>دفع أمامي</option>
												<option value="rear" <?php if($row->car_drivetrain =="rear"){echo "selected";} ?>>دفع خلفي</option>
												<option value="4x4" <?php if($row->car_drivetrain =="4x4"){echo "selected";} ?>>دفع رباعي</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>ناقل الحركة</label>
											<select class="form-control" required name="car_transmission">
												<option value="" disabled selected>برجاء اختيار نوع ناقل الحركة</option>
												<option value="manual" <?php if($row->car_transmission =="manual"){echo "selected";} ?>>يدوي</option>
												<option value="auto" <?php if($row->car_transmission =="auto"){echo "selected";} ?>>تلقائي</option>
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
												<option value="2" <?php if($row->car_persons =="2"){echo "selected";} ?>>فردين</option>
												<option value="5" <?php if($row->car_persons =="5"){echo "selected";} ?>>5 أفراد</option>
												<option value="7" <?php if($row->car_persons =="7"){echo "selected";} ?>>7 أفراد</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد الأبواب</label>
											<select class="form-control" required name="car_doors">
												<option value="" disabled selected>برجاء اختيار عدد الأبواب</option>
												<option value="2" <?php if($row->car_doors =="2"){echo "selected";} ?>>بابين</option>
												<option value="4" <?php if($row->car_doors =="4"){echo "selected";} ?>>4 أبواب</option>
												<option value="6" <?php if($row->car_doors =="6"){echo "selected";} ?>>6 أبواب</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>عدد الشنط</label>
											<select class="form-control" required name="car_bags">
												<option value="" disabled selected>برجاء اختيار عدد الشنط</option>
												<option value="1" <?php if($row->car_bags =="1"){echo "selected";} ?>>واحدة</option>
												<option value="2" <?php if($row->car_bags =="2"){echo "selected";} ?>>اثنين</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>المميزات الأخري</label><br>
											<textarea class="wysihtml5 form-control" rows="6" name="car_features"><?= $row->car_features ?></textarea>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>السعر اليومي</label>
											<input type="number" class="form-control" placeholder="برجاء كتابةالسعر اليومي" name="car_daily_price" required value="<?= $row->car_daily_price ?>"> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>السعر الشهري</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة السعر الشهري" name="car_monthly_price" required value="<?= $row->car_monthly_price ?>"> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>السعر السنوي</label>
											<input type="number" class="form-control" placeholder="برجاء كتابة السعر السنوي" name="car_yearly_price" required value="<?= $row->car_yearly_price ?>"> 
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">السيارة مفعلة</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="نعم" data-off-text="لا" data-off-color="danger" data-on-color="success" value="1" name="car_status" <?php if($row->car_status){echo "checked";} ?>>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">السيارة لديها عرض</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="نعم" data-off-text="لا" data-off-color="danger" data-on-color="success" value="1" name="has_offer" <?php if($row->has_offer){echo "checked";} ?>>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">السيارة مضافة حديثا</label>
											<div>
												<input type="checkbox" class="make-switch" data-on-text="نعم" data-off-text="لا" data-off-color="danger" data-on-color="success" value="1" name="new_car" <?php if($row->new_car){echo "checked";} ?>>
											</div>
										</div>
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

