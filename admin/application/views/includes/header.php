<body class="page-container-bg-solid page-content-white page-md page-header-fixed page-sidebar-fixed ">
    <!-- BEGIN HEADER page-sidebar-closed -->
    <div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo" style="padding-left: 0 !important">
                <a href="<?php echo site_url('dashboard') ?>" style="margin-bottom: 5px;">
                    <img src="<?php echo base_url() ;?>../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" height="33px" /> 
                </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
               
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <?php $this->load->view('includes/top-menu'); ?>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
	<?php $this->load->view('includes/menu'); ?>
	