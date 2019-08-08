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
                        echo form_open_multipart('cars_colors/cars_colors_add');
						$languages = $this->cars_colors_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input form-md-floating-label ">
                                                <select class="form-control" name="cco_parent_uid" id="form_control_1" required>
                                                <option value="0">لون اساسي</option>
                                                    <?php 
                                                        if(count($colors) > 0){
                                                            foreach($colors as $index) : ?>
                                                                <option value="<?php echo $index->cco_uid; ?>"><?php echo $this->global_model->getStringByKeyLanguage($index->cco_name, 'arabic'); ?></option>  
                                                            <?php 
                                                            endforeach;
                                                        } 
                                                    ?>   
                                                </select>
                                                <label for="form_control_1">اللون الاساسي</label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
									
									<div class="col-md-4">
										<label>كود اللون</label>
										<input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161" name="cco_meta_desc">
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
                                            <input type="text" class="form-control" name="cco_name_<?= $language->lang_name ?>" value="<?php echo set_value('cco_name_'.$language->lang_name); ?>">
                                            <label for="form_control_1">أسم اللون باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">برجاء كتابة أسم اللون باللغة <?= $language->lang_title ?></span>
                                        </div>
                                        

                                    </div>
                                    
									<?php $i++; } ?>


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

