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
                        <div class="tools"> </div>                       
                        
                    </div>
					<div id="result"></div>
                    <div class="portlet-body">
                        <div class="table-responsive" style="min-height:400px">
                            <table class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-inline collapsed" width="100%" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 100%;">
                            <thead>
                            <tr>
                                <th class="all">رقم الفاتورة</th>
                                <th>رقم الحجز</th>
                                <th class="none">رقم العضو</th>
                                <th class="none">رقم الجوال</th>
                                <th>اسم العميل</th>
								<th>المدة</th>
                                <th>وقت الحجز</th>
                                <th>وقت الاستلام</th>
                                <th class="none">تاريخ التسليم</th>
                                <th class="none">السعر</th>
                                <th class="none">حالة الدفع</th>
                                <th class="none">طريقة الدفع</th>
                                <th class="none">حالة الحجز</th>
                                <th>خيارات</th>
                            </tr>
                            </thead>
                            <tbody class="sort">
                                <?php
                                if($rows != false)
                                foreach($rows as $row){
                                ?>
                                <tr>
									<?php //print_r($row); ?>
                                    <td><?php echo $row->invoice_uid ?></td>
                                    <td><?php echo $row->booking_obj->book_uid ?></td>
                                    <td><?php echo $row->member_obj->member_uid ?></td>
                                    <td><?php echo $row->member_obj->member_mobile ?></td>
                                    <td><?php echo $row->member_obj->member_fname." ".$row->member_obj->member_lname ?></td>
									<td><?php echo $row->book_total_days ?></td>
                                    <td><?php echo $row->booking_obj->book_added_date ?></td>
                                    <td><?php echo $row->booking_obj->book_start_date ?></td>
                                    <td><?php echo $row->booking_obj->book_end_date ?></td>
                                    <td><?php echo $row->invoice_total_fees_after_tax ?></td>
                                    <td><?php echo $row->invoice_status ?></td>
                                    <td><?php echo $row->invoice_payment_method ?></td>
                                    <td><?php echo $row->booking_obj->book_status ?></td>
                                    <td>
                                        <a data-toggle="modal" href="<?php echo site_url('bookings/bookings_view/'.$row->booking_obj->book_uid) ?>" class="btn btn-xs blue"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-eye"></i>تفاصيل</a>        
                                        <a href="<?php echo site_url('bookings/bookings_edit/'.$row->booking_obj->book_uid) ?>" class="btn btn-xs yellow"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-pencil"></i>تعديل</a> 
                                        
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