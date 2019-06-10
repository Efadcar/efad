<div class="top-menu">

    <ul class="nav navbar-nav pull-right">
    
        <li class="dropdown dropdown-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" class="img-circle" src="<?php echo base_url(); ?>../assets/layouts/layout/img/avatar.jpg" />
                <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('admin_full_name'); ?> </span>
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a href="<?php echo site_url('login/logout') ?>"><i class="icon-key"></i> خروج</a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>