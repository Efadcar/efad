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
                        echo form_open_multipart('pages/pages_edit/'.$id);
						$languages = $this->pages_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">

                                
                                <div class="fileinput fileinput-new col-md-12 text-right" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?= base_url().PAGES_IMAGES.$row->page_image ?>" alt="" style="height:100px"/>
                                    </div>
									<input type="hidden" name="page_image" value="<?= $row->page_image ?>" />
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height:100px">
                                    </div>
                                    <div>
                                        <span class="btn btn-primary btn-file" id="pulsate-once">
                                        <span class="fileinput-new"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span>اختيار صورة </span>
                                        <span class="fileinput-exists">تغيير</span>
                                        <input type="file" name="userfile">
                                        </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">حذف</a>
                                    </div>
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
                                            <input type="text" class="form-control" name="page_title_<?= $language->lang_name ?>" value="<?= $this->global_model->getStringByKeyLanguage($row->page_title, $language->lang_name) ?>">
                                            <label for="form_control_1">عنوان الصفحة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">برجاء كتابة عنوان الصفحة باللغة <?= $language->lang_title ?></span>
                                        </div>

                                        <div class="form-group form-md-line-input form-md-floating-label ">
									<textarea class="form-control" rows="3" name="page_text_<?= $language->lang_name ?>"><?= $this->global_model->getStringByKeyLanguage($row->page_text, $language->lang_name) ?></textarea>
                                            <label for="form_control_1">محتوي الصفحة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">برجاء كتابة محتوي الصفحة باللغة <?= $language->lang_title ?>.</span>
                                        </div>
                                        

                                        <div class="form-group form-md-line-input form-md-floating-label ">
							<textarea class="form-control" name="page_meta_desc_<?= $language->lang_name ?>"><?= $this->global_model->getStringByKeyLanguage($row->page_meta_desc, $language->lang_name) ?></textarea>
                                            <label for="form_control_1">وصف الصفحة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">يرجى كتابة وصف تعريف الصفحة لعرضه على رأس الصفحة لتحسين محرك البحث باللغة <?= $language->lang_title ?>.</span>
                                        </div>
                                        
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <input type="text" class="form-control" name="page_meta_keywords_<?= $language->lang_name ?>" value="<?= $this->global_model->getStringByKeyLanguage($row->page_meta_keywords, $language->lang_name) ?>">
                                            <label for="form_control_1">الكلمات الدلالية للصفحة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">يرجى كتابة الكلمات الرئيسية في الصفحة للمساعدة في تحسين محرك البحث مفصولة بفاصلة باللغة <?= $language->lang_title ?></span>
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

