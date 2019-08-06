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
                        echo form_open_multipart('albums/albums_edit/'.$id);
						$languages = $this->albums_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">
                            
                                <div class="row">
									<div class="col-md-3">
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
									<div class="col-md-3">
										<div class="form-group">
											<label for="cb_uid">موديل السيارة</label>
											<select class="form-control" id="cm_uid" name="cm_uid" required>
												<option value=""></option>
                                                <?php if($models !== false){
														foreach($models as $r) : ?>
                                                        <option value="<?php echo $r->cm_uid; ?>" <?php echo set_select('cm_uid', $r->cm_uid); ?>><?php echo $this->global_model->getStringByKeyLanguage('cm_name'.$r->cm_code, 'arabic') ?></option>  
                                                <?php endforeach;} ?>
											</select>
										</div>											
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="car_model_year">سنة الصنع</label>
											<select class="form-control select2" id="car_model_year" name="model_year" required>
												<option value=""></option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
												<option value="2019">2019</option>
												<option value="2020">2020</option>
											</select>
										</div>										
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="car_color">لون السيارة</label>
											<select class="form-control select2" id="car_color" name="car_color" required>
												<option value=""></option>
                                                <?php if($colors !== false){
														foreach($colors as $r) : ?>
                                                        <option value="<?php echo $r->cco_uid; ?>" <?php echo set_select('car_color', $r->cco_uid); ?>><?php echo $this->global_model->getStringByKeyLanguage('cco_name'.$r->cco_code, 'arabic') ?></option>  
                                                <?php endforeach;} ?>
											</select>
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

