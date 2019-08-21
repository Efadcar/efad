<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mailgun Configuration
 */
$config['protocol']         = 'smtp';
$config['smtp_host']        = 'smtp.mailgun.org';
$config['smtp_port'] 		= 587;
$config['smtp_user']        = 'postmaster@sandbox8977d49af7c7492098782838d4cf3b1f.mailgun.org';
$config['smtp_pass']        = 'e20066b3498afa923a963b8c4fb46ffc-2ae2c6f3-01451294';
$config['charset']          = 'utf-8';
$config['mailtype']         = 'html';
$config['smtp_timeout']		= 30000;
$config['email']['newline'] = "rn";