<!DOCTYPE html>
<!-- 
Version: 1.0.0
Author: Eng. Ebrahim Elsawy 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->session->userdata('siteName'); ?><?php if (isset($pageTitle)) echo " | " . $pageTitle; ?> </title>
        <meta name="keywords" content="<?php
        if (isset($keywords)) {
            echo $keywords;
        } else {
            echo $this->session->userdata('siteMetaKW');
        }
        ?>">
        <meta name="description" content="<?php
        if (isset($description)) {
            echo $description;
        } else {
            echo $this->session->userdata('siteMetaDesc');
        }
        ?>">
        <meta name="author" content="Ebrahim Elsawy">   
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="<?php echo base_url(); ?>../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>../assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>../assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>../assets/pages/css/login-5-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <!-- Google Analytics-->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '<?php echo $this->session->userdata('siteAnalytics') ?>']);
            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>

        <!-- Alexa Analytics-->
        <meta name="alexaVerifyID" content="<?php echo $this->session->userdata('siteAlexa') ?>" />

    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">

                <div class="col-md-6 login-container bs-reset">


                    
                    <div class="login-content">
                    	<img class="login-logo login-6" src="<?php echo base_url(); ?>../assets/pages/img/login/login-invert.png" />
                        <h1>مرحباً بك مرة أخري</h1>
                        <p>يرجى تسجيل الدخول أدناه لرؤية لوحة التحكم.</p>

                        <!-- BEGIN FORGOT PASSWORD FORM -->
						<?php
                        $attributes = array('class' => 'login-form');
                        echo form_open('login', $attributes);
                        ?> 
                            <h3 class="font-green"> تسجيل الدخول</h3>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="adminEmail" class="form-control" id="form_control_1" value="<?php echo set_value('adminEmail'); ?>">
                                        <label for="form_control_1">البريد الإلكتروني</label>
                                        <!-- <span class="help-block">First name is required.</span> -->
                                    </div>                                
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <input type="password" name="adminPwd" class="form-control" id="form_control_2" value="<?php echo set_value('adminPwd'); ?>">
                                        <label for="form_control_2">كلمة المرور</label>
                                        <!-- <span class="help-block">Last name is required.</span> -->
                                    </div>                                
                                </div>
                            </div>
                            <div class="form-actions">
                                <!-- <a href="<?php echo site_url('create/account'); ?>" class="btn grey btn-default">Register new account</a> -->
                                <button type="submit" class="btn blue btn-success uppercase pull-right">دخول</button>
                            </div>
                            <div class="text-danger" id="status"></div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>© Efad 2019. جميع الحقوق محفوظة. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>

                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
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
        <script src="<?php echo base_url(); ?>../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/autosize/autosize.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>../assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>../assets/pages/scripts/components-form-tools.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
<?php
$all = $this->messages->get();
if ($all != null) {
    foreach ($all as $type => $messages)
        foreach ($messages as $message)
            switch ($type) {
                case "error":
                    echo 'toastr.error("' . $message . '", "Error");';
                    break;
                case "success":
                    echo 'toastr.success("' . $message . '", "Success");';
                    break;
                case "alert":
                    echo 'toastr.alert("' . $message . '", "Alert");';
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
			toastr.error("<?php echo $error ?>", "Error");
			<?php } ?>
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

        </script>
    </body>

</html>