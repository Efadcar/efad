<?php

class Cars_models_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('cars_models', $limit, $offsit);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$row->brand = $this->getBrandByID($row->cb_uid);
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
	
	function getAllBrands() {
		$q = $this->db->get('cars_brands');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getBrandByID($id) {
		$q =  $this->db->get_where('cars_brands', array('cb_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function add(){
		
		$code = '_vertex_'.time();
		
		$cm_link = url_title($this->input->post('cm_name_english'), '-', TRUE);
		$cm_name = "cm_name".$code;
		$cm_meta_desc = "cm_meta_desc".$code;
		$cb_uid = $this->input->post('cb_uid');
		$cm_meta_keywords = "cm_meta_keywords".$code;
		
		$data = array(
		   'cm_code' => $code,
		   'cm_link' => $cm_link,
		   'cm_name' => $cm_name,
		   'cb_uid' => $cb_uid,
		   'cm_meta_desc' => $cm_meta_desc,
		   'cm_meta_keywords' => $cm_meta_keywords
		);
		
		$this->db->insert('cars_models', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['cm_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cm_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cm_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
								
				if(isset($_POST['cm_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cm_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cm_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['cm_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cm_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cm_meta_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("تم إضافة الموديل بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('cars_models', array('cm_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
		$row = $this->getByID($id);
		$cm_link = url_title($this->input->post('cm_name_english'), '-', TRUE);
		$cm_name = "cm_name".$row->cm_code;
		$cb_uid = $this->input->post('cb_uid');
		$cm_meta_desc = "cm_meta_desc".$row->cm_code;
		$cm_meta_keywords = "cm_meta_keywords".$row->cm_code;

		$data = array(
		   'cm_link' => $cm_link,
		   'cb_uid' => $cb_uid
		);
		$this->db->where('cm_uid', $id);
		$this->db->update('cars_models', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['cm_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cm_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $cm_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['cm_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cm_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $cm_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['cm_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cm_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $cm_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل الموديل بنجاح", "success");


	}



}


?>