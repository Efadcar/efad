<nav class="navbar navbar-expand-lg navbar-light  sb-navbar" dir="ltr">
    <div class="container"> 
		<a class="navbar-brand" href="<?= site_url() ?>">
			<img class="logo" src="<?= base_url()."assets/".$direction; ?>/images/EfadLogo.svg" alt="Efad Logo" />
		</a>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ml-auto" dir="rtl">
                <li class="nav-item"><a class="nav-link" href="#"><?= $this->lang->line('discover'); ?></a> </li>
                <li class="nav-item active"><a class="nav-link" href="<?= site_url() ?>"><?= $this->lang->line('home'); ?> <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"><a class="nav-link" href="#"><?= $this->lang->line('how_to_get_car'); ?> </a> </li>
                <li class="nav-item"><a class="nav-link" href="#"><?= $this->lang->line('quick_payment'); ?></a> </li>
                <li class="nav-item"><a class="nav-link" href="#"><?= $this->lang->line('faq'); ?></a> </li>
                <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">للمزيد </a>
                        <div class="dropdown-menu border-0 shadow animate slideIn " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">إتصل بنا</a> <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">الشروط و الأحكام</a>
                        </div>
                    </li>-->
                
            </ul>
            <div class="navbar-buttons  mbr-section-btn "> <a id="top-login-button" href="#login_form_ajax" class="mr-2 login-link"><?= $this->lang->line('login'); ?> </a> <a href="member.html" class="btn    btn--accent" ><span><span><?= $this->lang->line('membership_adv'); ?></span></span></a> </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <div class="hamburger"> <span></span> <span></span> <span></span> <span></span> </div>
        </button>
    </div>
</nav>
