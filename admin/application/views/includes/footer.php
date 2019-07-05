<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">  © Efad 2019. جميع الحقوق محفوظة.</div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>../assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url(); ?>../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<?php
if (isset($javascripts) && $javascripts != null) {
    foreach ($javascripts as $javascript) {
        echo "<script src=" . $javascript . "></script>";
    }
}
?> 
<!-- END THEME LAYOUT SCRIPTS -->
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
			<?php } ?>

        </script>
<script type="text/javascript">
    $('#media_image').hide();
    $('#media_video').hide();
	
	
    $('#media_type').change(function() {
        var media_type = $('#media_type').val();
        if (media_type == 1) {
			$('#media_image').show();
			$('#media_video').hide();
		}
        else if (media_type == 2) {
			$('#media_image').hide();
			$('#media_video').show();
		} else {
			$('#media_image').hide();
			$('#media_video').hide();
        }//end if
    }); //end change 

jQuery(document).ready(function() {
	
	$("#events_add_show").submit(function(e) {
		var form = $(this);
		var url = form.attr('action');
		//alert(url);

		$.ajax({
			   type: "POST",
			   url: url,
				dataType : "html",
			   data: form.serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   
				   //var obj = jQuery.parseJSON(data);
				   //console.log(obj);
				   window.location.replace('<?= site_url("events/events_edit/"); ?>/'+data);
				    // show response from the php script.
			   }
			 });

		e.preventDefault(); // avoid to execute the actual submit of the form.
	});

	$(".video").click(function() {
		$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'			: 840,
			'height'		: 585,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
			'wmode'				: 'transparent',
			'allowfullscreen'	: 'true'
			}
		});

		return false;
	});
});

</script>

</body>

</html>