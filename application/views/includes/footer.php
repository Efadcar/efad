<footer class="footer-end pt-4">
    <div class="footerTopWide  pb-2">
        <div class="container-fluid">
            <div class="row align-items-center ">
                <div class="col-lg-5 col-sm-7 col-xs-12 pr-10">
                    <ul class="footermenu pb-8">
                        <li><a href="<?= site_url('about') ?>">عن إفاد</a></li>
                        <li><a href="https://www.linkedin.com/company/efadsa/jobs/" target="_blank">الوظائف</a></li>
                        <li><a href="<?= site_url('branches') ?>">الفروع</a></li>
						<li><a href="<?= site_url('faq') ?>"><?= $this->lang->line('faq'); ?></a> </li>
                    </ul>
                    <div class="clearfix"></div>
<!--
                    <div class="footer-social d-flex  pt-3 pb-3 ">
                        <h6 class="pr-3 pl-0">تواصل</h6>
                        <p> <a href="#"><i class="fab fa-whatsapp"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-snapchat"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-facebook-messenger"></i></a> </p>
                    </div>
-->
                    <div class="clearfix"></div>
                    <ul class="payment-img custom-payment-img">
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/visa.png" class="img-thumbnail" alt="فيزا" style="width: 73px;" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/master.png" class="img-thumbnail" alt="ماستر كارد" style="width: 73px;" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/mada.png" class="img-thumbnail" alt="مدى" style="width: 73px;" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/cash1.png" class="img-thumbnail" alt="كاش" style="width: 73px;" /></span> </li>
                    </ul>
                    <ul class="footerBottomMenu pt-8 policy_web_view">
                        <li><a href="<?= site_url('terms_and_conditions') ?>">الشروط و الأحكام</a></li>
                        <li><a href="<?= site_url('privcy_policy') ?>">سياسة الخصوصية</a></li>
                        <li><p class="pr-1"> إفاد © 2019 </p></li>
                    </ul>
                </div>
                <div class=" col-lg-2 col-sm-5 col-xs-12 ask pr-0  text-center">
                    <h6 class="p-0 m-0" >تواصل معنا الأن عبر الواتس آب</h6>
					<a href="http://wa.me/966555208078" target="_blank">
						<h3 class="mb-1 p-0"> 078  208 555 966 + </h3>
						<img src="<?= base_url()."assets/".$direction; ?>/images/Qrcode.png" alt="QR-Code" class="qr-code" width="120px" height="120px">
					</a>
                </div>
                <div class="col-lg-2 col-sm-7 col-xs-12 text-center">
                    <h3 class="mb-1">قريباً</h3>
                    <a href="<?= site_url() ?>"><img src="<?= base_url()."assets/".$direction; ?>/images/google-play%20(2).png" class="mb-2" style="width: 140px;height: 42px;"></a>
                    <a href="<?= site_url() ?>"><img src="<?= base_url()."assets/".$direction; ?>/images/app-store%20(2).png" class="mb-2" style="width: 140px;height: 42px;"></a>
                </div>
                <div class="col-lg-3 col-sm-5 col-xs-12 text-right custom-align logo-footer"> 
                    <a href="<?= site_url() ?>"><img src="<?= base_url()."assets/".$direction; ?>/images/last-logo.png" alt="Efad" class="footerlogo"/></a>
                    <div class="footer-social d-flex  pt-3 pb-3 ">
                        <p> 
                            <a href="mailto:wecare@efadcar.com"><i class="fas fa-envelope"></i></a>
                            <a href="https://www.linkedin.com/company/efadsa/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/efadcar" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/efadcar" target="_blank"><i class="fab fa-twitter"></i></a>
                            
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-7 col-xs-12 pr-10 policy_mobile_view">
                    <ul class="footerBottomMenu">
                        <li><a href="<?= site_url('terms_and_conditions') ?>">الشروط و الأحكام</a></li>
                        <li><a href="<?= site_url('privcy_policy') ?>">سياسة الخصوصية</a></li>
                        <li><p class="pr-1"> إفاد © 2019 </p></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
</footer>







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?= base_url()."assets/".$direction; ?>/js/popper.min.js"></script> 
<script src="<?= base_url()."assets/".$direction; ?>/js/bootstrap-4.0.0.js"></script> 
<script src="<?= base_url()."assets/".$direction; ?>/js/countries/js/msdropdown/jquery.dd.js"></script> 
<!-- fancybox --> 
<script type="text/javascript" src="<?= base_url()."assets/".$direction; ?>/js/jquery.fancybox.js"></script> 

<script src="<?= base_url()."assets/".$direction; ?>/js/intlTelInput.min.js"></script> 
<script  src="<?= base_url()."assets/".$direction; ?>/js/telinput.js"></script>

<?php
if (isset($javascripts) && $javascripts != null) {
    foreach ($javascripts as $javascript) {
        echo "<script src=" . $javascript . "></script>";
    }
}
?> 
<?= $javascriptCode ?>
<!-- toaster javascript for form validations -->
<script>
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"positionClass": "toast-top-right",
		"onclick": null,
		"showDuration": "1000",
		"hideDuration": "1000",
		"timeOut": "20000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	<?php
	$all = $this->messages->get();
	if ($all != null) {
		foreach ($all as $type => $messages)
			foreach ($messages as $message)
				switch ($type) {
					case "error":
						echo 'toastr.error("' . $message . '", "خطأ");';
						break;
					case "success":
						echo 'toastr.success("' . $message . '", "نجاح");';
						break;
					case "alert":
						echo 'toastr.warning("' . $message . '", "تحذير");';
						break;
				}
	}
	?>

	<?php 
	$valid_error = validation_errors();
	if (!empty($valid_error)) { 
	$pieces = explode(".", strip_tags(validation_errors()));
	$count = count($pieces);
	if(count($pieces) > 0){
		$error = '';
		for($i = 0; $i < $count; $i++){
			$error .= $pieces[$i]."<br>";	
		}
	}
	$error = trim(preg_replace('/\s+/', ' ', $error));
	?>
	toastr.error("<?php echo $error ?>", "خطأ");
	console.log("<?php echo $error ?>");
	<?php } ?>
	
	


</script>

<script type='text/javascript'>
	/* navbar */
	$(document).ready(function () {
		$('.box1').on('click', function(){
            $('.pro .main-head .main-head-box .arrow1').addClass('arrow-down')
            $('.pro .main-head .main-head-box .arrow2').removeClass('arrow-down')
            $('.pro .main-head .main-head-box .arrow3').removeClass('arrow-down')
            $('.pro .main-head .box1 a').addClass('efad-color')
            $('.pro .main-head .box2 a').removeClass('efad-color')
            $('.pro .main-head .box3 a').removeClass('efad-color ')
            $('.pro .main-head .box1 ').addClass(' efad-border-color')
            $('.pro .main-head .box2 ').removeClass(' efad-border-color')
            $('.pro .main-head .box3 ').removeClass(' efad-border-color')
	    });
    	$('.box2').on('click', function(){
            $('.pro .main-head .main-head-box .arrow2').addClass('arrow-down')
            $('.pro .main-head .main-head-box .arrow3').removeClass('arrow-down')
            $('.pro .main-head .main-head-box .arrow1').removeClass('arrow-down')
            $('.pro .main-head .box2 a').addClass('efad-color')
            $('.pro .main-head .box1 a').removeClass('efad-color')
            $('.pro .main-head .box3 a').removeClass('efad-color')
            $('.pro .main-head .box2 ').addClass(' efad-border-color')
            $('.pro .main-head .box1 ').removeClass(' efad-border-color')
            $('.pro .main-head .box3 ').removeClass(' efad-border-color')
	    });
	    $('.box3').on('click', function(){
            $('.pro .main-head .main-head-box .arrow3').addClass('arrow-down')
            $('.pro .main-head .main-head-box .arrow2').removeClass('arrow-down')
            $('.pro .main-head .main-head-box .arrow1').removeClass('arrow-down')
            $('.pro .main-head .box3 a').addClass('efad-color ')
            $('.pro .main-head .box2 a').removeClass('efad-color ')
            $('.pro .main-head .box1 a').removeClass('efad-color ')
            $('.pro .main-head .box3 ').addClass(' efad-border-color')
            $('.pro .main-head .box2 ').removeClass(' efad-border-color')
            $('.pro .main-head .box1 ').removeClass(' efad-border-color')
	    });


		/* navbar */
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});

		/* fancy */

		$('#top-login-button').fancybox();
		$('#countries').msDropdown();
		$('#countries2').msDropdown();
		/* login */
		$('.toggle-password, .toggle-password2').click(function () {
			$(this).toggleClass('fa-eye fa-eye-slash');
			var input = $($(this).attr('toggle'));
			if (input.attr('type') == 'password') {
				input.attr('type', 'text');
			} 
			else 
			{
				input.attr('type', 'password');
			}
		});
		
		$(function () {
			$('.switchPanelButton').click(function (event) {
				event.preventDefault();
				var panel = $(this).attr('panelclass');
				$('.' + panel).hide();
				var panelid = $(this).attr('panelid');
				$('#' + panelid).show();
			});
		});

		$('.button-mobile-container').click(function () {
			$('.search-option').toggleClass('show');
		});
		
		
		$('#countries').change(function() {
		var country_uid = $('#countries').val();
		if (country_uid != "") {
			var post_url = "<?php echo base_url() . 'home/get_cities/' ?>" + country_uid;
			$.ajax({
				type: "POST",
				url: post_url,
				success: function(cities) //we're calling the response json array 'cities'
				{
					$('#inputState').empty();
					$('#inputState').prop('disabled', false);

					if(cities != false){
						$.each(cities, function(key, value)
						{
							$('#inputState').append(value);
						});
					}else{
						$('#inputState').html('<option value="0">لا توجد مدن</option>');
					}


				}, //end success
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
					alert('error');
				}
			}); //end AJAX
		} else {
			$('#inputState').empty();
		}//end if
	}); //end change
		$('#countries2').change(function() {
		var country_uid = $('#countries2').val();
		if (country_uid != "") {
			var post_url = "<?php echo base_url() . 'home/get_cities/' ?>" + country_uid;
			$.ajax({
				type: "POST",
				url: post_url,
				success: function(cities) //we're calling the response json array 'cities'
				{
					$('#inputState2').empty();
					$('#inputState2').prop('disabled', false);

					if(cities != false){
						$.each(cities, function(key, value)
						{
							$('#inputState2').append(value);
						});
					}else{
						$('#inputState2').html('<option value="0">لا توجد مدن</option>');
					}


				}, //end success
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
					alert('error');
				}
			}); //end AJAX
		} else {
			$('#inputState2').empty();
		}//end if
	}); //end change

	});

	$(document).ready(function() {
		$('.nav-tabs > li > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor
					
		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');					
					
		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > li.active');
		actived_nav.removeClass('active');
					
		//add 'active' css into clicked navigation
		$(this).parents('li').addClass('active');
					
		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');
					
		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
	     });
	});

</script> 




</body>
</html>
