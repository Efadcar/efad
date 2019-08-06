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
                        <div class="actions">
                            <a href="<?php echo site_url('cars/cars_add') ?>" class="btn blue btn-sm">
                            <i class="fa fa-plus"></i>إضافة سيارة جديدة</a>
                            <a class="btn btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="">
                            </a>
                        </div>                        
                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive" style="min-height:400px">
                            <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ماركة السيارة</th>
                                <th>موديل السيارة</th>
                                <th>سنة الصنع</th>
                                <th>لون السيارة</th>
                                <th>خيارات</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($rows != false)
                                foreach($rows as $row){
                                ?>
                                <tr>
                                    <td><?= $row->cb_uid ?></td>
                                    <td><?= $row->cm_uid ?></td>
                                    <td><?= $row->car_model_year ?></td>
                                    <td><?= $row->car_color ?></td>
                                    <td>
                                        <!--<a href="<?php echo site_url('cars/cars_view/'.$row->car_uid) ?>" class="btn btn-xs blue"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-eye"></i>عرض</a> --> 
                                        <a href="<?php echo site_url('cars/cars_edit/'.$row->car_uid) ?>" class="btn btn-xs yellow"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-pencil"></i>تعديل</a> 
                                        <a data-toggle="modal" href="#static_<?= $row->car_uid ?>" class="btn btn-xs red"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-trash-o"></i>حذف</a>        
                                        <div id="static_<?= $row->car_uid ?>" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">التأكيد</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> هل أنت متأكد أنك تريد حذف هذة السيارة ؟ </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">إلغاء</button>
                                                        <a href="<?php echo site_url('cars/cars_del/'.$row->car_uid) ?>" class="btn red">نعم، حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>                            
                                                        
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