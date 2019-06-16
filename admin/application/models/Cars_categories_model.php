<?php

class Cars_categories_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('cars_categories', $limit, $offsit);
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
		$code = '_vertex_'.time();
		
		$cc_link = url_title($this->input->post('cc_name_english'), '-', TRUE);
		$cc_name = "cc_name".$code;
		$cc_meta_desc = "cc_meta_desc".$code;
		$cc_meta_keywords = "cc_meta_keywords".$code;
		
		$data = array(
		   'cc_code' => $code,
		   'cc_link' => $cc_link,
		   'cc_name' => $cc_name,
		   'cc_meta_desc' => $cc_meta_desc,
		   'cc_meta_keywords' => $cc_meta_keywords
		);
		
		$this->db->insert('cars_categories', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['cc_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cc_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cc_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
								
				if(isset($_POST['cc_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cc_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cc_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['cc_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cc_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cc_meta_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("تم إضافة القسم بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('cars_categories', array('cc_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
		$row = $this->getByID($id);
		$cc_link = url_title($this->input->post('cc_name_english'), '-', TRUE);
		$cc_name = "cc_name".$row->cc_code;
		$cc_meta_desc = "cc_meta_desc".$row->cc_code;
		$cc_meta_keywords = "cc_meta_keywords".$row->cc_code;

		$data = array(
		   'cc_link' => $cc_link
		);
		$this->db->where('cc_uid', $id);
		$this->db->update('cars_categories', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['cc_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cc_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $cc_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['cc_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cc_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $cc_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['cc_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cc_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $cc_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل القسم بنجاح", "success");


	}



}


?>