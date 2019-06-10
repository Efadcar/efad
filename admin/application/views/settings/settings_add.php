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
                            <span class="caption-helper">
                                <a href="javascript:;" class="popovers" data-container="body" data-trigger="hover" data-content="Add new service."> 
                                    <i class="icon-info font-blue-casablanca"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="portlet-body form">
						<?php
                        echo form_open_multipart('settings/settings_add');
						$languages = $this->settings_model->getAllLanguages();
                        ?> 
                        
                            <div class="form-body">

                                <div class="row">
                                	<div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="site_email" value="<?php echo set_value('site_email'); ?>">
                                            <label for="form_control_1">Site E-mails</label>
                                            <span class="help-block">Please write the site email, note if more than mail please seprate with comma ','</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="site_phone" value="<?php echo set_value('site_phone'); ?>">
                                            <label for="form_control_1">Site phone numbers</label>
                                            <span class="help-block">Please write the site email, note if more than number please seprate with comma ','</span>
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="site_facebook" value="<?php echo set_value('site_facebook'); ?>">
                                            <label for="form_control_1">Facebook account link</label>
                                            <span class="help-block">Please write the full url for facebook page</span>
                                        </div>
                                    </div>
                                	<div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:20px">
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width:200px">
                                            </div>
                                            <div>
                                                <span class="btn btn-primary btn-file" id="pulsate-once">
                                                <span class="fileinput-new"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span>Choose site logo </span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile">
                                                </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">Delete</a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>                
                                <div class="row" style="margin-top:20px">
                                	<div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="site_twitter" value="<?php echo set_value('site_twitter'); ?>">
                                            <label for="form_control_1">Twitter account link</label>
                                            <span class="help-block">Please write the full url for twitter account</span>
                                        </div>
                                                    
                                    </div>
                                	<div class="col-md-6">
                                    </div>
                                </div>                
                                <div class="row" style="margin-top:20px">
                                	<div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <input type="text" class="form-control" name="site_google" value="<?php echo set_value('site_google'); ?>">
                                            <label for="form_control_1">Google+ account link</label>
                                            <span class="help-block">Please write the full url for Google+ account</span>
                                        </div>
                                                    
                                    </div>
                                	<div class="col-md-6">
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <select class="form-control" name="site_branches" id="form_control_1">
                                                <option value=""></option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <label for="form_control_1">The company has more than branch?</label>
                                        </div>
                                    </div>
                                </div>                
                            	<hr>
                            
                            	<h4>Multi language content</h4>
                                <br>
                            
                                <ul class="nav nav-tabs">
                                <?php
								$i = 0;
								foreach($languages as $language){
								?>

                                    <li class="<?php if($i == 0){ echo "active";} ?>">
                                        <a href="#tab_<?= $language->lang_name ?>" data-toggle="tab"> 
										<img src="<?= base_url().FLAGS_IMAGES.$language->lang_flag ?>" />
										<?= $language->lang_name ?> </a>
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
                                            <input type="text" class="form-control" name="site_name_<?= $language->lang_name ?>" value="<?php echo set_value('site_name'); ?>">
                                            <label for="form_control_1">Site name in <?= $language->lang_name ?></label>
                                            <span class="help-block">Please write the site name in <?= $language->lang_name ?></span>
                                        </div>

                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <textarea class="form-control" rows="3" name="site_slogan_<?= $language->lang_name ?>"><?php echo set_value('site_slogan'); ?></textarea>
                                            <label for="form_control_1">Site slogan in <?= $language->lang_name ?></label>
                                            <span class="help-block">Please write the site slogan  in <?= $language->lang_name ?>.</span>
                                        </div>

                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <textarea class="form-control" rows="3" name="site_description_<?= $language->lang_name ?>"><?php echo set_value('site_description'); ?></textarea>
                                            <label for="form_control_1">Site meta description in <?= $language->lang_name ?></label>
                                            <span class="help-block">Please write the service meta description max 160, for SEO in <?= $language->lang_name ?>.</span>
                                        </div>
                                        
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <input type="text" class="form-control" name="site_keywords_<?= $language->lang_name ?>" value="<?php echo set_value('site_keywords'); ?>">
                                            <label for="form_control_1">Site keywords in <?= $language->lang_name ?></label>
                                            <span class="help-block">Please write the service keywords to help SEO seperated by comma in <?= $language->lang_name ?></span>
                                        </div>
                                        
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <textarea class="form-control" rows="3" name="site_address_<?= $language->lang_name ?>"><?php echo set_value('site_address'); ?></textarea>
                                            <label for="form_control_1">Site address in <?= $language->lang_name ?></label>
                                            <span class="help-block">Please write the site address in <?= $language->lang_name ?>.</span>
                                        </div>
                                        
                                    </div>
                                    
									<?php $i++; } ?>


                                </div>
                            
                            
                            </div>
                            <div class="form-actions noborder">
                                <button type="submit" class="btn btn-block green-jungle">Add</button>
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

