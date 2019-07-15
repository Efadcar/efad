<footer class="footer-end py-4">
    <div class="footerTopWide  pb-2">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-sm-5 col-xs-12">
                    <ul class="footermenu">
                        <li><a href="contactus.html">تواصل معنا </a></li>
                        <li><a href="branches.html">الفروع </a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="footer-social d-flex  pt-3 pb-3 ">
                        <h6 class="pr-3 pl-0">تواصل</h6>
                        <p> <a href="#"><i class="fab fa-whatsapp"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-snapchat"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-facebook-messenger"></i></a> </p>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="payment-img">
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/mada.png" class="img-thumbnail" alt="مدى" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/visa.png" class="img-thumbnail" alt="فيزا" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/master.png" class="img-thumbnail" alt="ماستر كارد" /></span> </li>
                        <li> <span> <img src="<?= base_url()."assets/".$direction; ?>/images/payment/cash.png" class="img-thumbnail" alt="نقدى" /></span> </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-xs-12 ask">
                    <h2 class="mt-0 pt-0"> عندك سؤال؟ </h2>
                    <h6 >تواصل معنا يومياً على الواتس أب
                        أو الايميل </h6>
                    <h3 class="mb-1"> <i class="fab fa-whatsapp"></i> 078  208 555 966 + </h3>
                    <h5 class="pt-0"> <i class="far fa-envelope-open"></i> <a href="mailto:customercare@efadcar.com"> customercare@efadcar.com </a> </h5>
                </div>
                <div class="col-sm-3 col-xs-12 text-center logo-footer"> <img src="<?= base_url()."assets/".$direction; ?>/images/footer-logo.svg" alt="Efad" class="footerlogo" /> </div>
            </div>
        </div>
    </div>
    <div class="footerMidWide  mt-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <ul class="footerBottomMenu">
                        <li><a href="#">الشروط و الأحكام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                        <li><a href="#">خريطة الموقع</a></li>
                    </ul>
                    <p class="pt-1"> جميع الحقوق محفوظة © 2019 </p>
                </div>
                <div class="col-sm-3 col-xs-12 text-center "> <a href="#" class="btn btn-default lang ">English <img src="<?= base_url()."assets/".$direction; ?>/images/en-lang.svg" alt="English" /> </a> </div>
            </div>
        </div>
    </div>
</footer>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?= base_url()."assets/".$direction; ?>/js/jquery-3.2.1.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?= base_url()."assets/".$direction; ?>/js/popper.min.js"></script> 
<script src="<?= base_url()."assets/".$direction; ?>/js/bootstrap-4.0.0.js"></script> 
<script src="<?= base_url()."assets/".$direction; ?>/js/countries/js/msdropdown/jquery.dd.js"></script> 
<!-- fancybox --> 
<script type="text/javascript" src="<?= base_url()."assets/".$direction; ?>/js/jquery.fancybox.js"></script> 


<?php
if (isset($javascripts) && $javascripts != null) {
    foreach ($javascripts as $javascript) {
        echo "<script src=" . $javascript . "></script>";
    }
}
?> 
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

<script type="text/javascript">
	/* navbar */
	$(document).ready(function () {
		$("#countries").msDropdown();
		/* navbar */
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
      
		/* fancy */
		$("#top-login-button").fancybox();
		/* login */
		$(".toggle-password, .toggle-password2").click(function () {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} 
			else 
			{
				input.attr("type", "password");
			}
		});

		$(function () {
			$(".switchPanelButton").click(function (event) {
				event.preventDefault();
				var panel = $(this).attr('panelclass');
				$("." + panel).hide();
				var panelid = $(this).attr('panelid');
				$("#" + panelid).show();
			});
		});

		$(".button-mobile-container").click(function () {
			$('.search-option').toggleClass("show");
		});

	});
</script> 

<!-- filter car search --> 
<script>
	var $range = $(".js-range-slider"),
	instance;

	$range.ionRangeSlider({
		skin: "round",
		type: "double",
		min: 0,
		max: 500,
		from: 0,
		to: 500,
		onChange: handleRangeInputChange
	});

	instance = $range.data("ionRangeSlider");


	var container = document.querySelector('[data-ref="product_list"]');
	var mixer = mixitup(container, {
		animation: {
			duration: 500,
			queueLimit: 1000
		}
	});

	function getRange() {
		var min = Number(instance.result.from);
		var max = Number(instance.result.to);
		return {
			min: min,
			max: max
		};
	}

	function handleRangeInputChange() {
		mixer.filter(mixer.getState().activeFilter);
	}

	function filterTestResult(testResult, target) {
		var size = Number(target.dom.el.getAttribute('data-size'));
		var range = getRange();
		if (size < range.min || size > range.max) {
			testResult = false;
		}
		return testResult;
	}
	mixitup.Mixer.registerFilter('testResultEvaluateHideShow', 'range', filterTestResult);
</script> 
<!-- end car search --> 
<?php print_r(validation_errors()); ?>
</body>
</html>
