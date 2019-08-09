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
	$('#city_uid').prop('disabled', 'disabled');
	$('#country_uid').change(function() {
		var country_uid = $('#country_uid').val();
		if (country_uid != "") {
			var post_url = "<?php echo base_url() . 'members/get_cities/' ?>" + country_uid;
			$.ajax({
				type: "POST",
				url: post_url,
				success: function(cities) //we're calling the response json array 'cities'
				{
					$('#city_uid').empty();
					$('#city_uid').prop('disabled', false);

					if(cities != false){
						$.each(cities, function(key, value)
						{
							$('#city_uid').
									append(value);
						});
					}else{
						$('#city_uid').
									append('<option value="0">لا توجد مدن</option>');
					}


				}, //end success
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
					alert('error');
				}
			}); //end AJAX
		} else {
			$('#city_uid').empty();
		}//end if
	}); //end change 
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
		var country_uid = $('#country_uid').val();
		var city_uid_jq = $('#city_uid_jq').val();
		if (country_uid != "" || country_uid != 0) {
			var post_url = "<?php echo base_url() . 'members/get_cities/' ?>" + country_uid;
			$.ajax({
				type: "POST",
				url: post_url,
				success: function(cities) //we're calling the response json array 'cities'
				{
					//console.log(cities);
					$('#city_uid').empty();
					$('#city_uid').prop('disabled', false);

					if(cities != false){
						$.each(cities, function(key, value)
						{
							$('#city_uid').append(value);
							$("#city_uid").val(city_uid_jq);
						});
					}else{
						$('#city_uid').
									append('<option value="0">لا توجد مدن</option>');
					}


				}, //end success
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
					alert('error');
				}
			}); //end AJAX
		} else {
			$('#city_uid').prop('disabled', 'disabled');
		}//end if
	});

	///////// ALBUMS PAGE - CHECK BASIC & SECONDARY COLORS //////////
	$(document).ready(function(){
		if($("#car_color").length > 0) {
			$('#car_color').change(function(){
				$('.CarSecondaryColor').css('display', 'none');
				$(".CarSecondaryColor option").remove();
				let parentID = $('#car_color').children('option:selected').val();
				$.ajax({
		           	url: '<?= site_url("cars_colors/getCarSecondaryColors/'+parentID+'") ?>',
		           	type: 'GET',
		           	error: function() {
		              	alert('Something went wrong');
		           	},
		           	success: function(data) {
		           		var obj = JSON.parse(data);
		           		$('#car_color_secondary')
						        .append($("<option></option>")
					            .attr("value", '')
			                    .text('-- select option --')); 
		           		$.each(obj, function(i, item) {
						    $('#car_color_secondary')
						        .append($("<option></option>")
					            .attr("value", item.cco_uid)
			                    .text(item.cco_link));
							$('.CarSecondaryColor').css('display', 'block');
						});
		           	}
		        });
			});
		}
	});

</script>

</body>

</html>