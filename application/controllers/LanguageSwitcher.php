<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class LanguageSwitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();     
    }
 
    function switchLang($language = "") {
		

		$refer =  $_SERVER['HTTP_REFERER'];

        
        $language = ($language != "") ? $language : "arabic";
        $this->session->set_userdata('site_lang', $language);
        $this->global_model->config();
        redirect($refer);
        
    }
}