<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mailgun Configuration
 */
$config['smtp_crypto'] = 'tls'; 
$config['protocol']         = 'smtp';
$config['smtp_host']        = 'smtp.office365.com';
$config['smtp_port'] 		= '587';
$config['smtp_user']        = 'wecare@efadcar.com';
$config['smtp_pass']        = 'Wecare123456%';
$config['charset']          = 'utf-8';
$config['mailtype']         = 'html';
$config['priority']         = 3;
$config['smtp_timeout']		= 1;
$config['newline']="\r\n"; //"\r\n" or "\n" or "\r". DEFAULT should be "\r\n" 
$config['crlf'] = "\r\n"; //"\r\n" or "\n" or "\r" DEFAULT should be "\r\n" 