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
                        echo form_open_multipart('media/media_add/'.$album_uid);
						$languages = $this->media_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">

                                <div class="form-group form-md-line-input form-md-floating-label " style="display: none">
                                    <select class="form-control" name="media_type" id="media_type">
                                        <option value="0"></option>
                                        <option value="1" selected>Image</option>
                                        <option value="2">Youtube video</option>
                                    </select>
                                    <label for="form_control_1">Please select media type</label>
                                </div>
                                
                                
                                
                                
                                <div class="fileinput fileinput-new" data-provides="fileinput" id="">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?php echo base_url() ;?>../assets/pages/media/gallery/preview_09.png" alt="" style="height:100px"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail">
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
                                
                                
                                <div class="form-group form-md-line-input form-md-floating-label " id="media_video">
                                    <input type="text" class="form-control" name="media_path" value="" >
                                    <label for="form_control_1" class="static-value">youtube video code</label>
                                    <span class="help-block">Please write video code XXXXXX in this example https://www.youtube.com/watch?v=XXXXXX</span>
                                </div>
                            	
                                <input type="hidden" name="album_uid" value="<?= $album_uid ?>" />
                            
                            
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
                                            <input type="text" class="form-control" name="media_title_<?= $language->lang_name ?>" value="">
                                            <label for="form_control_1">أسم الصورة باللغة <?= $language->lang_title ?></label>
                                            <span class="help-block">برجاء كتابة أسم الصورة باللغة <?= $language->lang_title ?></span>
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

