<?php

class Settings_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('settings', $limit, $offsit);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getAllLanguages() {
		$q = $this->db->get('languages');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	

	function add(){
	
        $config['upload_path'] = SITE_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
            $this->messages->add($this->upload->display_errors(), "error");
			redirect('settings/settings_add');
        }
        else
		{
			$fInfo = $this->upload->data();
			$site_logo = $fInfo['file_name'];
		}
		
		$code = '_vertex_'.time();
		
		$site_name = "site_name".$code;
		$site_slogan = "site_slogan".$code;
		$site_description = "site_description".$code;
		$site_keywords = "site_keywords".$code;
		$site_address = "site_address".$code;
		
		$site_email = $this->input->post('site_email');
		$site_facebook = $this->input->post('site_facebook');
		$site_twitter = $this->input->post('site_twitter');
		$site_google = $this->input->post('site_google');
		$site_phone = $this->input->post('site_phone');
		$site_branches = $this->input->post('site_branches');
		$site_location = $this->input->post('site_location');
		
		
		$data = array(
		   'site_name' => $site_name,
		   'site_slogan' => $site_slogan,
		   'site_logo' => $site_logo,
		   'site_description' => $site_description,
		   'site_keywords' => $site_keywords,
		   'site_email' => $site_email,
		   'site_facebook' => $site_facebook,
		   'site_twitter' => $site_twitter,
		   'site_google' => $site_google,
		   'site_phone' => $site_phone,
		   'site_branches' => $site_branches,
		   'site_address' => $site_address,
		   'site_location' => $site_location,
		   'site_code' => $code
		);
		
		$this->db->insert('settings', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['site_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $site_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('site_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['site_slogan_'.$language->lang_name])){
					$data = array(
					   'string_key' => $site_slogan,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('site_slogan_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['site_description_'.$language->lang_name])){
					$data = array(
					   'string_key' => $site_description,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('site_description_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['site_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $site_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('site_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['site_address_'.$language->lang_name])){
					$data = array(
					   'string_key' => $site_address,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('site_address_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("Service added successfully.", "success");
		}else{
			$this->messages->add("There was an error while adding.", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('settings', array('cat_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit_action($id){
		
		$cat_name = $this->input->post('cat_name');

		$data = array(
		   'cat_name' => $cat_name
		);
		$this->db->where('cat_uid', $id);
		$this->db->update('settings', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("The settings updated successfully.", "success");
		}else{
			$this->messages->add("You didn't make any updated.", "alert");
		}
		
	}



}


?>