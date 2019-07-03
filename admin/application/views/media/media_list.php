<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <?php $this->load->view('includes/breadcrumb'); ?>
            <div class="page-toolbar">
				<a href="<?php echo site_url('media/media_add/'.$this->uri->segment(3)) ?>" class="btn btn-xs blue" style="margin-top: 5px"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-plus"></i>أضافة صورة</a>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row" style="margin-top: 20px">
			
            <div class="col-md-12">
                <div class="portfolio-content portfolio-4">
                    <div id="js-grid-full-width" class="cbp">
                        
                        <?php
						if($rows != false)
						foreach($rows as $row){
							switch($row->media_type){
								
								case 1:
									$media_type_name = "image";
									$media_link = base_url().ALBUMS_IMAGES.$row->media_path;
									$media_thumb = base_url().ALBUMS_IMAGES."thumb_".$row->media_path;
									break;
								case 2:
									$media_type_name = "video";
									$media_link = "https://www.youtube.com/watch?v=".$row->media_path;
									$media_thumb = $row->media_thumb_path;
									break;
									
							}
							$media_title = $this->global_model->getStringByKeyLanguage('media_title'.$row->media_code, 'english');
							
						?>
                        
                        <div class="cbp-item identity <?= $media_type_name ?>">
							<a href="<?= site_url("media/media_del/".$row->media_uid."/".$row->album_uid); ?>" class="btn red btn-block" style=" margin-top:30px">حذف الصورة</a>
                            <a href="<?= $media_link ?>" class="cbp-caption cbp-lightbox <?php if($row->media_type == 2){ echo "video";} ?>" data-title="<?= $media_title ?>">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="<?= $media_thumb ?>" alt="<?= $media_title ?>"> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title"><?= $media_title ?></div>
                                            
                                            <div class="cbp-l-caption-desc">
                                            	 
                                            </div>
                                            
                                        </div>
										
                                    </div>
									
                                </div>
                            </a>
							 
                        </div>
						
                        <?php } ?>
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