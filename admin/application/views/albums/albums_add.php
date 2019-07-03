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
                        echo form_open_multipart('albums/albums_add');
						$languages = $this->albums_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">
                            
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
                                            <input type="text" class="form-control" name="album_name_<?= $language->lang_name ?>" value="<?php echo set_value('cat_name'); ?>">
                                            <label for="form_control_1">أسم الألبوم باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">برجاء كتابة أسم الألبوم باللغة <?= $language->lang_title ?></span>
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

