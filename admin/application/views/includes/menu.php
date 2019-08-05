<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
    
        <ul class="page-sidebar-menu page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">    
            
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search  sidebar-search-bordered sidebar-search-solid">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="البحث">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li> 
            
			<?php
            $key = 'dashboard';
            if (strpos($this->uri->uri_string(), $key) !== false || $this->uri->uri_string() == "") {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('dashboard') ?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسية</span>
                </a>
            </li>
            <?php if ($this->global_model->have_permission_menu('pages_menu')) { ?>    
			<?php
            $key = 'pages';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('pages/pages_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-feed"></i>
                    <span class="title">الصفحات الثابتة</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('faq_categories_menu')) { ?>    
			<?php
            $key = 'faq_categories';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('faq_categories/faq_categories_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">أقسام الأسئلة المتكررة</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('faq_menu')) { ?>    
			<?php
            $key = 'faq';
            if (strpos($this->uri->uri_string(), $key) !== false && $this->uri->uri_string() == "faq/faq_list") {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('faq/faq_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-question"></i>
                    <span class="title">الأسئلة المتكررة</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('cars_categories_menu')) { ?>    
			<?php
            $key = 'cars_categories';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('cars_categories/cars_categories_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">أقسام السيارات</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('cars_types_menu')) { ?>    
			<?php
            $key = 'cars_types';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('cars_types/cars_types_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">أنمطات السيارات</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('cars_brands_menu')) { ?>    
			<?php
            $key = 'cars_brands';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('cars_brands/cars_brands_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">ماركات السيارات</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('cars_models_menu')) { ?>    
			<?php
            $key = 'cars_models';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('cars_models/cars_models_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">موديلات السيارات</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('albums_menu')) { ?>    
			<?php
            $key = 'albums';
            $key2 = 'media';
            if (strpos($this->uri->uri_string(), $key) !== false || strpos($this->uri->uri_string(), $key2) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('albums/albums_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">صور السيارات</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('cars_menu')) { ?>    
			<?php
            $key = 'cars';
            if (strpos($this->uri->uri_string(), $key) !== false && $this->uri->uri_string() == "cars/cars_list") {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('cars/cars_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-car"></i>
                    <span class="title">السيارات</span>
                </a>
            </li>
			<?php } ?>

            <?php if ($this->global_model->have_permission_menu('memberships_menu')) { ?>    
			<?php
            $key = 'memberships';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('memberships/memberships_list') ?>" class="nav-link nav-toggle">
                    <i class="fa fa-certificate"></i>
                    <span class="title">العضويات</span>
                </a>
            </li>
			<?php } ?>

            <?php if ($this->global_model->have_permission_menu('memberships_menu')) { ?>    
			<?php
            $key = 'members';
            if (strpos($this->uri->uri_string(), $key) !== false && $this->uri->uri_string() == "members/members_list") {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('members/members_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">الأعضاء</span>
                </a>
            </li>
			<?php } ?>

			
            <?php if ($this->global_model->have_permission_menu('blogs_menu')) { ?>    
			<?php
            $key = 'blogs';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('blogs/blogs_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-speech"></i>
                    <span class="title">المقالات</span>
                </a>
            </li>
			<?php } ?>
			
            <?php if ($this->global_model->have_permission_menu('admins_menu')) { ?>    
			
            <li class="heading">
				<h3 class="uppercase">خاص بالأدارة</h3>
			</li> 
            
			<?php
            $key = 'admins';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('admins/admins_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">الموظفين</span>
                </a>
            </li>

			<?php
            $key = 'groups';
            if (strpos($this->uri->uri_string(), $key) !== false) {
                $active = 'start active open';
            } else {
                $active = '';
            }
            ?>
            <li class="nav-item start <?= $active ?>">
                <a href="<?php echo site_url('groups/groups_list') ?>" class="nav-link nav-toggle">
                    <i class="icon-lock"></i>
                    <span class="title">المجموعات و الصلاحيات</span>
                </a>
            </li>
			<?php } ?>


            

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
