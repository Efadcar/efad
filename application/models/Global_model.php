<?php

class Global_model extends CI_Model {

		
    function run_curl($link) {
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $server_output = curl_exec($ch);
        curl_close($ch);
        return json_decode($server_output);

    }
	
	function initializeLang($lang_file) {
        $this->load->helper('language');
        $siteLang = $this->session->userdata('site_lang');
        if ($siteLang) {
            $this->lang->load($lang_file, $siteLang);
        } else {
			$this->session->set_userdata('site_lang' ,'arabic');
            $this->lang->load($lang_file, 'arabic');
        }
    }
	
	function getSiteDirection(){
		if($this->session->userdata('site_lang') == 'arabic'){
			 return "rtl";
		}else{ 
			 return "ltr";
		}
	}

	function config(){
		$siteLang = $this->session->userdata('site_lang');

		$q = $this->db->get('settings');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$string_key = $row->site_code;
				$m = $this->db->query("SELECT * FROM strings WHERE string_code LIKE '".$string_key."' AND string_lang LIKE '".$siteLang."'");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$string_data[$mrow->string_key] = $mrow;
					}
					$row->site_name = $string_data[$row->site_name]->string_content;
					$row->site_slogan = $string_data[$row->site_slogan]->string_content;
					$row->site_description = $string_data[$row->site_description]->string_content;
					$row->site_keywords = $string_data[$row->site_keywords]->string_content;
					$row->site_address = $string_data[$row->site_address]->string_content;
				}
				
				
				$site_settings = array(
					'site_name' => $row->site_name,
					'site_slogan' => $row->site_slogan,
					'site_logo' => $row->site_logo,
					'site_description' => $row->site_description,
					'site_keywords' => $row->site_keywords,
					'site_address' => $row->site_address,
					'site_email' => $row->site_email,
					'site_facebook' => $row->site_facebook,
					'site_twitter' => $row->site_twitter,
					'site_google' => $row->site_google,
					'site_instagram' => $row->site_instagram,
					'site_phone' => $row->site_phone,
					'site_branches' => $row->site_branches,
					'site_address' => $row->site_address
				);
				$this->session->set_userdata('site_settings', $site_settings); 
				

			}
		}else{
			return false;	
		}
	}
	
	function getAllCountries() {
		$this->db->order_by("status", "desc"); 
		$this->db->order_by("name", "asc"); 
		$q = $this->db->get('countries');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
}

?>