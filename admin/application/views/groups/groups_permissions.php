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
				<?php
				echo form_open('groups/groups_permissions/'.$row->group_uid);
				?>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold font-red uppercase"> <?= $pageTitle ?> </span>
                        </div>
						<div class="actions">
							<div class="btn-group btn-group-devided">
								<input class="btn btn-block green-jungle" type="submit" name="submitBtn" value="تعديل" />							
							</div>
						</div>
                        
                    </div>
					
                    <div class="portlet-body">
                        <div class="table-responsive" style="min-height:400px">
                            <table class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>أسم القسم</th>
									<th>عرض</th>
									<th>إضافة</th>
									<th>تعديل</th>
									<th>حذف</th>
									<th>عرض بالقائمة</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td> الصفحات الثابتة</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="pages_list" class="md-check" name="pages_list" value="1" <?php if($row->pages_list){echo "checked";} ?>>
												<label for="pages_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="pages_add" class="md-check" name="pages_add" value="1" <?php if($row->pages_add){echo "checked";} ?>>
												<label for="pages_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="pages_edit" class="md-check" name="pages_edit" value="1" <?php if($row->pages_edit){echo "checked";} ?>>
												<label for="pages_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="pages_del" class="md-check" name="pages_del" value="1" <?php if($row->pages_del){echo "checked";} ?>>
												<label for="pages_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="pages_menu" class="md-check" name="pages_menu" value="1" <?php if($row->pages_menu){echo "checked";} ?>>
												<label for="pages_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									
									<tr>
										<td>  أقسام الأسئلة المتكررة</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_categories_list" class="md-check" name="faq_categories_list" value="1" <?php if($row->faq_categories_list){echo "checked";} ?>>
												<label for="faq_categories_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_categories_add" class="md-check" name="faq_categories_add" value="1" <?php if($row->faq_categories_add){echo "checked";} ?>>
												<label for="faq_categories_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_categories_edit" class="md-check" name="faq_categories_edit" value="1" <?php if($row->faq_categories_edit){echo "checked";} ?>>
												<label for="faq_categories_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_categories_del" class="md-check" name="faq_categories_del" value="1" <?php if($row->faq_categories_del){echo "checked";} ?>>
												<label for="faq_categories_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_categories_menu" class="md-check" name="faq_categories_menu" value="1" <?php if($row->faq_categories_menu){echo "checked";} ?>>
												<label for="faq_categories_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td> الأسئلة المتكررة</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_list" class="md-check" name="faq_list" value="1" <?php if($row->faq_list){echo "checked";} ?>>
												<label for="faq_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_add" class="md-check" name="faq_add" value="1" <?php if($row->faq_add){echo "checked";} ?>>
												<label for="faq_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_edit" class="md-check" name="faq_edit" value="1" <?php if($row->faq_edit){echo "checked";} ?>>
												<label for="faq_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_del" class="md-check" name="faq_del" value="1" <?php if($row->faq_del){echo "checked";} ?>>
												<label for="faq_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="faq_menu" class="md-check" name="faq_menu" value="1" <?php if($row->faq_menu){echo "checked";} ?>>
												<label for="faq_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td> أقسام السيارات</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_categories_list" class="md-check" name="cars_categories_list" value="1" <?php if($row->cars_categories_list){echo "checked";} ?>>
												<label for="cars_categories_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_categories_add" class="md-check" name="cars_categories_add" value="1" <?php if($row->cars_categories_add){echo "checked";} ?>>
												<label for="cars_categories_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_categories_edit" class="md-check" name="cars_categories_edit" value="1" <?php if($row->cars_categories_edit){echo "checked";} ?>>
												<label for="cars_categories_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_categories_del" class="md-check" name="cars_categories_del" value="1" <?php if($row->cars_categories_del){echo "checked";} ?>>
												<label for="cars_categories_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_categories_menu" class="md-check" name="cars_categories_menu" value="1" <?php if($row->cars_categories_menu){echo "checked";} ?>>
												<label for="cars_categories_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td> أنمطات السيارات</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_types_list" class="md-check" name="cars_types_list" value="1" <?php if($row->cars_types_list){echo "checked";} ?>>
												<label for="cars_types_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_types_add" class="md-check" name="cars_types_add" value="1" <?php if($row->cars_types_add){echo "checked";} ?>>
												<label for="cars_types_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_types_edit" class="md-check" name="cars_types_edit" value="1" <?php if($row->cars_types_edit){echo "checked";} ?>>
												<label for="cars_types_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_types_del" class="md-check" name="cars_types_del" value="1" <?php if($row->cars_types_del){echo "checked";} ?>>
												<label for="cars_types_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="cars_types_menu" class="md-check" name="cars_types_menu" value="1" <?php if($row->cars_types_menu){echo "checked";} ?>>
												<label for="cars_types_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td> المقالات</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="blogs_list" class="md-check" name="blogs_list" value="1" <?php if($row->blogs_list){echo "checked";} ?>>
												<label for="blogs_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="blogs_add" class="md-check" name="blogs_add" value="1" <?php if($row->blogs_add){echo "checked";} ?>>
												<label for="blogs_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="blogs_edit" class="md-check" name="blogs_edit" value="1" <?php if($row->blogs_edit){echo "checked";} ?>>
												<label for="blogs_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="blogs_del" class="md-check" name="blogs_del" value="1" <?php if($row->blogs_del){echo "checked";} ?>>
												<label for="blogs_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="blogs_menu" class="md-check" name="blogs_menu" value="1" <?php if($row->blogs_menu){echo "checked";} ?>>
												<label for="blogs_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>  الموظفين</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="admins_list" class="md-check" name="admins_list" value="1" <?php if($row->admins_list){echo "checked";} ?>>
												<label for="admins_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="admins_add" class="md-check" name="admins_add" value="1" <?php if($row->admins_add){echo "checked";} ?>>
												<label for="admins_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="admins_edit" class="md-check" name="admins_edit" value="1" <?php if($row->admins_edit){echo "checked";} ?>>
												<label for="admins_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="admins_del" class="md-check" name="admins_del" value="1" <?php if($row->admins_del){echo "checked";} ?>>
												<label for="admins_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="admins_menu" class="md-check" name="admins_menu" value="1" <?php if($row->admins_menu){echo "checked";} ?>>
												<label for="admins_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>   المجموعات و الصلاحيات</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="groups_list" class="md-check" name="groups_list" value="1" <?php if($row->groups_list){echo "checked";} ?>>
												<label for="groups_list">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="groups_add" class="md-check" name="groups_add" value="1" <?php if($row->groups_add){echo "checked";} ?>>
												<label for="groups_add">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="groups_edit" class="md-check" name="groups_edit" value="1" <?php if($row->groups_edit){echo "checked";} ?>>
												<label for="groups_edit">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="groups_del" class="md-check" name="groups_del" value="1" <?php if($row->groups_del){echo "checked";} ?>>
												<label for="groups_del">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
										<td>
											<div class="md-checkbox">
												<input type="checkbox" id="groups_menu" class="md-check" name="groups_menu" value="1" <?php if($row->groups_menu){echo "checked";} ?>>
												<label for="groups_menu">
													<span class="inc"></span>
													<span class="check"></span>
													<span class="box"></span> 
												</label>
											</div>
										</td>
									</tr>



								</tbody>
                            </table>
                        </div>                            
                    </div>
                </div>
				</form>
            </div>
            
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
</div>
<!-- END CONTAINER -->