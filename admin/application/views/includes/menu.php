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
			
			
            
            
            



            

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
