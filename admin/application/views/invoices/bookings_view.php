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
                        
				<div class="invoice-content-2 bordered">
					<div class="row invoice-head">
						<div class="col-md-7 col-xs-6">
							<div class="invoice-logo">
								<img src="<?= base_url() ?>../assets/rtl/images/latest-logo.png" class="img-responsive" alt="" />
							</div>
						</div>
						<div class="col-md-5 col-xs-6">
							<div class="company-address">
								<span class="bold uppercase">Efad Car</span>
								<br/> P.O. Box 3735 Riyadh 42313, Saudi Arabia
								<br/>
								<span class="bold">T</span> +966 555 2080 78
								<br/>
								<span class="bold">E</span> care@efadcar.com
								<br/>
								<span class="bold">W</span> www.efadcar.com </div>
						</div>
					</div>
					<div class="row invoice-cust-add">
						<div class="col-xs-8">
							<h2 class="invoice-title uppercase">بيانات العميل</h2>
							<p class="invoice-desc">
								رقم العميل: <?= $row->member_obj->member_uid ?><br>
								الأسم: <?= $row->member_obj->member_fname." ".$row->member_obj->member_lname ?><br>
								رقم الجوال: <?= $row->member_obj->member_mobile ?><br>
							</p>
						</div>
						<div class="col-xs-4 text-right">
							<h2 class="invoice-title uppercase">بيانات الفاتورة</h2>
							<p class="invoice-desc">
								رقم الحجز: <?php echo $row->book_uid ?><br>
								رقم الفاتورة: <?php echo $row->invoice_obj->invoice_uid ?><br>
								تاريخ الحجز: <?php echo $row->book_added_date ?><br>
							</p>
						</div>
						
					</div>
					<?php
					if($row->invoice_obj != false){
						foreach($row->invoice_obj as $invoice){
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption">
										<span class="caption-subject bold font-red uppercase"> فاتورة رقم :  <?php echo $invoice->invoice_uid ?></span>

									</div>
								</div>


									<div class="row invoice-cust-add">
										<div class="col-xs-8">
											<h2 class="invoice-title uppercase">بيانات العميل</h2>
											<p class="invoice-desc">
												رقم العميل: <?= $row->member_obj->member_uid ?><br>
												الأسم: <?= $row->member_obj->member_fname." ".$row->member_obj->member_lname ?><br>
												رقم الجوال: <?= $row->member_obj->member_mobile ?><br>
											</p>
										</div>
										<div class="col-xs-4 text-right">
											<h2 class="invoice-title uppercase">بيانات الفاتورة</h2>
											<p class="invoice-desc">
												رقم الحجز: <?php echo $row->book_uid ?><br>
												رقم الفاتورة: <?php echo $invoice->invoice_uid ?><br>
												تاريخ الفاتورة: <?php echo $invoice->invoice_add_date ?><br>


											</p>
										</div>

									</div>
									<div class="row invoice-body">
										<div class="col-xs-12 table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th class="invoice-title uppercase">بيانات الخدمة:</th>
														<th class="invoice-title uppercase text-center">العدد</th>
														<th class="invoice-title uppercase text-center">السعر</th>
														<th class="invoice-title uppercase text-center">الإجمالي</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<h3>ايجار سيارة : <?php echo $row->car_obj->car_brand_name." ".$row->car_obj->car_model_name." موديل ".$row->car_obj->car_model_year." اللون ".$row->car_obj->car_color ?></h3>
															<p>
																تاريخ بداية الاشتراك: <?php echo $invoice->invoice_start_date ?><br>
																تاريخ نهاية الاشتراك: <?php echo $invoice->invoice_end_date ?><br>
																مدينة استلام السيارة: <?php echo $row->delivery_city_uid ?><br>
																طريقة الدفع: <?php echo $invoice->invoice_payment_method ?><br>
																حالة الدفع: <?php echo $invoice->invoice_status ?>

															</p>
														</td>
														<td class="text-center sbold"><?php echo $invoice->book_total_days ?> يوم</td>
														<td class="text-center sbold"><?php echo $invoice->daily_rate ?> ر.س. ( لليوم الواحد )</td>
														<td class="text-center sbold"><?php echo $invoice->invoice_total_fees ?> ر.س.</td>
													</tr>

													<?php 
													if($invoice->invoice_payment_method == '<span class="label label-primary"> كاش </span>'){ 
													$invoice->invoice_total_fees = $invoice->invoice_total_fees + 150;
													$invoice->invoice_total_fees_after_tax = $invoice->invoice_total_fees_after_tax + 150;
													?>
													<tr>
														<td>
															<h3>دفع نقدي</h3>
															<p>
																تكلفة إضافية للدفع النقدي

															</p>
														</td>
														<td class="text-center sbold">1</td>
														<td class="text-center sbold">150 ر.س.</td>
														<td class="text-center sbold">150 ر.س.</td>
													</tr>


													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row invoice-subtotal">
										<div class="col-xs-3">
											<h2 class="invoice-title uppercase">الإجمالي الفرعي</h2>
											<p class="invoice-desc"><?php echo $invoice->invoice_total_fees ?> ر.س.</p>
										</div>
										<div class="col-xs-3">
											<h2 class="invoice-title uppercase">ضريبة (5%)</h2>
											<p class="invoice-desc"><?php echo $invoice->invoice_tax_total ?> ر.س.</p>
										</div>
										<div class="col-xs-6">
											<h2 class="invoice-title uppercase">الإجمالي الكلي</h2>
											<p class="invoice-desc grand-total"><?php echo $invoice->invoice_total_fees_after_tax ?> ر.س.</p>
										</div>
									</div>


							</div>
						</div>
					
					</div>
					<?php }} ?>
					
					
					<div class="row">
						<div class="col-xs-12">
							<a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">طباعة</a>
							<a class="btn btn-lg yellow hidden-print" href="<?php echo site_url('bookings/bookings_edit/'.$row->book_uid) ?>">تعديل</a>
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