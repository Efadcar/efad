<?php

class Faq_categories_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('faq_categories', $limit, $offsit);
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
		
		$fc_link = url_title($this->input->post('fc_name_english'), '-', TRUE);
		$fc_name = "fc_name".$code;
		$fc_meta_desc = "fc_meta_desc".$code;
		$fc_meta_keywords = "fc_meta_keywords".$code;
		
		$data = array(
		   'fc_code' => $code,
		   'fc_link' => $fc_link,
		   'fc_name' => $fc_name,
		   'fc_meta_desc' => $fc_meta_desc,
		   'fc_meta_keywords' => $fc_meta_keywords
		);
		
		$this->db->insert('faq_categories', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['fc_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $fc_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('fc_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				
				if(isset($_POST['fc_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $fc_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('fc_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['fc_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $fc_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('fc_meta_keywords_'.$language->lang_name)
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
		$q =  $this->db->get_where('faq_categories', array('fc_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
		$row = $this->getByID($id);
		$fc_link = url_title($this->input->post('fc_name_english'), '-', TRUE);
		$fc_name = "fc_name".$row->fc_code;
		$fc_meta_desc = "fc_meta_desc".$row->fc_code;
		$fc_meta_keywords = "fc_meta_keywords".$row->fc_code;

		$data = array(
		   'fc_link' => $fc_link
		);
		$this->db->where('fc_uid', $id);
		$this->db->update('faq_categories', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['fc_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('fc_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $fc_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['fc_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('fc_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $fc_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['fc_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('fc_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $fc_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل القسم بنجاح", "success");


	}



}


?>