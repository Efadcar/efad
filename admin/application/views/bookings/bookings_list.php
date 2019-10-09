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
						<style>
						tfoot {
							display: table-header-group;
						}
						</style>
                        <div class="table-responsive" style="min-height:400px">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer collapsed" width="100%" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>رقم الحجز</th>
                                <th>رقم العميل</th>
                                <th>رقم الجوال</th>
                                <th>اسم العميل</th>
                                <th>السن</th>
                                <th>مواصفات السيارة</th>
                                <th>مدينة الاستلام</th>
								<th>المدة</th>
                                <th>وقت الحجز</th>
                                <th>وقت الاستلام</th>
                                <th>تاريخ التسليم</th>
                                <th>السعر</th>
                                <th>حالة الدفع</th>
                                <th>طريقة الدفع</th>
                                <th>حالة الحجز</th>
                                <th>خيارات</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr class="searchRow">
                                <th class="inputSearch">رقم الحجز</th>
                                <th class="inputSearch">رقم العميل</th>
                                <th class="inputSearch">رقم الجوال</th>
                                <th class="inputSearch">اسم العميل</th>
                                <th class="inputSearch">السن</th>
                                <th class="inputSearch">مواصفات السيارة</th>
                                <th class="inputSearch">مدينة الاستلام</th>
								<th class="inputSearch">المدة</th>
                                <th class="inputSearch">وقت الحجز</th>
                                <th class="inputSearch">وقت الاستلام</th>
                                <th class="inputSearch">تاريخ التسليم</th>
                                <th class="inputSearch">السعر</th>
                                <th class="inputSearch">حالة الدفع</th>
                                <th class="inputSearch">طريقة الدفع</th>
                                <th class="inputSearch">حالة الحجز</th>
                                <td></td>
                            </tr>
                            </tfoot>
                            <tbody class="sort">
                                <?php
                                if($rows != false)
                                foreach($rows as $row){
                                ?>
                                <tr>
                                    <td><?php echo $row->book_uid ?></td>
                                    <td><?php echo $row->member_obj->member_uid ?></td>
                                    <td><?php echo $row->member_obj->member_mobile ?></td>
                                    <td><?php echo $row->member_obj->member_fname." ".$row->member_obj->member_lname ?></td>
                                    <td><?php echo $this->global_model->calculateAge($row->member_obj->member_dob) ?></td>
                                    <td><?php echo $row->car_obj->car_brand_name." ".$row->car_obj->car_model_name." ".$row->car_obj->car_model_year." ".$row->car_obj->car_color ?></td>
                                    <td><?php echo $row->delivery_city_uid ?></td>
									<td><?php echo $row->invoice_obj->book_total_days ?></td>
                                    <td><?php echo $row->book_added_date ?></td>
                                    <td><?php echo $row->book_start_date ?></td>
                                    <td><?php echo $row->book_end_date ?></td>
                                    <td><?php echo $row->invoice_obj->invoice_total_fees_after_tax ?></td>
                                    <td><?php echo $row->invoice_obj->invoice_status ?></td>
                                    <td><?php echo $row->invoice_obj->invoice_payment_method ?></td>
                                    <td><?php echo $row->book_status ?></td>
                                    <td>
                                        <a data-toggle="modal" href="<?php echo site_url('bookings/bookings_view/'.$row->book_uid) ?>" class="btn btn-xs blue"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-eye"></i>تفاصيل</a>        
                                        <a href="<?php echo site_url('bookings/bookings_edit/'.$row->book_uid) ?>" class="btn btn-xs yellow"><span class="md-click-circle md-click-animate" style="height: 62px; width: 62px; top: -18px; left: -3.09375px;"></span><i class="fa fa-pencil"></i>تعديل</a> 
                                        
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