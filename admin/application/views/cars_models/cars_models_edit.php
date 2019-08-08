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
                        echo form_open_multipart('cars_models/cars_models_edit/'.$id);
						$languages = $this->cars_models_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">
                                
								<div class="form-group form-md-line-input form-md-floating-label ">
                                    <select class="form-control" name="cb_uid" id="form_control_1">
                                        <option value=""></option>
                                        <?php 
                                        if($brands != false){
                                        foreach ($brands as $brand){	
                                        ?>
                                        <option value="<?= $brand->cb_uid ?>" <?php if($row->cb_uid == $brand->cb_uid){echo "selected";} ?>>
											<?= $this->global_model->getStringByKeyLanguage('cb_name'.$brand->cb_code, 'arabic'); ?>
                                        </option>
                                        <?php } } ?>	
                                    </select>
                                    <label for="form_control_1">برجاء أختيار الماركة</label>
                                </div>
                                                            
                            	<h4>محتوى متعدد اللغات</h4>
                                <br>
                            
                                <ul class="nav nav-tabs">
                                <?php
								$i = 0;
								foreach($languages as $language){
								?>

                                    <li class="<?php if($i == 0){ echo "active";} ?>">
                                        <a href="#tab_<?= $language->lang_name ?>" data-toggle="tab"> 
										<img src="<?= base_url().FLAGS_IMAGES.$language->lang_flag ?>" />
										<?= $language->lang_title ?> </a>
                                    </li>
                                <?php $i++; } ?>
                                </ul>
                                <div class="tab-content">
                                
                                
									<?php
                                    $i = 0;
                                    foreach($languages as $language){
                                    ?>
                                
                                    <div class="tab-pane fade <?php if($i == 0){ echo "active in";} ?>" id="tab_<?= $language->lang_name ?>">

                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <input type="text" class="form-control" name="cm_name_<?= $language->lang_name ?>" value="<?= $this->global_model->getStringByKeyLanguage($row->cm_name, $language->lang_name) ?>">
                                            <label for="form_control_1">أسم الماركة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">برجاء كتابة أسم الماركة باللغة <?= $language->lang_title ?></span>
                                        </div>
                                        

                                        <div class="form-group form-md-line-input form-md-floating-label ">
							<textarea class="form-control" name="cm_meta_desc_<?= $language->lang_name ?>"><?= $this->global_model->getStringByKeyLanguage($row->cm_meta_desc, $language->lang_name) ?></textarea>
                                            <label for="form_control_1">وصف الماركة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">يرجى كتابة وصف تعريف الماركة لعرضه على رأس الصفحة لتحسين محرك البحث باللغة <?= $language->lang_title ?>.</span>
                                        </div>
                                        
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <input type="text" class="form-control" name="cm_meta_keywords_<?= $language->lang_name ?>" value="<?= $this->global_model->getStringByKeyLanguage($row->cm_meta_keywords, $language->lang_name) ?>">
                                            <label for="form_control_1">الكلمات الدلالية للماركة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">يرجى كتابة الكلمات الرئيسية في الماركة للمساعدة في تحسين محرك البحث مفصولة بفاصلة باللغة <?= $language->lang_title ?></span>
                                        </div>


                                    </div>
                                    
									<?php $i++; } ?>


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

