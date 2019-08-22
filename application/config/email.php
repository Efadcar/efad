<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mailgun Configuration
 */
//$config['smtp_crypto']		= 'tls'; 
$config['protocol']         = 'smtp';
$config['smtp_host']        = 'localhost';
$config['smtp_port'] 		= '587';
$config['smtp_user']        = 'test@efadcar.com';
$config['smtp_pass']        = 'hema==123';
$config['charset']          = 'utf-8';
$config['mailtype']         = 'html';
$config['priority']         = 1;
$config['smtp_timeout']		= 10;
$config['newline']="\r\n"; //"\r\n" or "\n" or "\r". DEFAULT should be "\r\n" 
$config['crlf'] = "\r\n"; //"\r\n" or "\n" or "\r" DEFAULT should be "\r\n" 