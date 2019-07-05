<!DOCTYPE html>
<html lang="ar" dir="<?= $direction ?>">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.png" sizes="144x144" type="image/png">
	<title><?php echo $this->session->userdata['site_settings']['site_name']; ?><?php if(isset($pageTitle)) echo " | ".$pageTitle; ?></title>
	<meta name="author" content="ASAIT">   
	<meta name="robots" content="index, follow"/>
	<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;}else{echo $this->session->userdata['site_settings']['site_keywords'];} ?>">
	<meta name="description" content="<?php if(isset($description)){echo $description;}else{echo $this->session->userdata['site_settings']['site_description'];} ?>">

	<meta property="og:description" content="<?php if(isset($description)){echo $description;}else{echo $this->session->userdata['site_settings']['site_description'];} ?>" />
	<meta property="og:image" content="<?php if(isset($pic)){echo $pic;}else{echo base_url().'image.png';} ?>" />
	<meta property='og:title' content='<?php echo $this->session->userdata['site_settings']['site_name'] ?><?php if(isset($pageTitle)){echo ' | '.$pageTitle;} ?>' />
	<meta property='og:url' content='<?php echo current_url(); ?>' />
	<meta property='og:description' content='<?php if(isset($description)){echo $description;}else{echo $this->session->userdata['site_settings']['site_description'];} ?>' />
	<meta property='og:site_name' content='<?php echo $this->session->userdata['site_settings']['site_name'] ?>' />
	<link href="<?= base_url()."assets/".$direction; ?>/css/efad.css" rel="stylesheet">
</head>
<body class="top">
	<!--back-to-top start-->
	<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="fa fa-arrow-up"></i></a></div>
	<!--back-to-top end--> 
	<!-- preloader start

	<div id="ht-preloader">
	  <div class="loader clear-loader">
		<div class="loader-text">Loading</div>
		<div class="loader-dots"> <span></span>
		  <span></span>
		  <span></span>
		  <span></span>
		</div>
	  </div>
	</div>

	<!-- preloader end -->
<?php $this->load->view('includes/menu') ?>