<?php

class Faq_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('faq', $limit, $offsit);
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
	
	function getAllCategories() {
		$q = $this->db->get('faq_categories');
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
		
		$faq_link = url_title($this->input->post('faq_question_english'), '-', TRUE);
		$faq_category_uid = $this->input->post('faq_category_uid');
		$faq_question = "faq_question".$code;
		$faq_answer = "faq_answer".$code;
		$faq_meta_desc = "faq_meta_desc".$code;
		$faq_meta_keywords = "faq_meta_keywords".$code;
		
		$data = array(
		   'faq_code' => $code,
		   'faq_link' => $faq_link,
		   'faq_category_uid' => $faq_category_uid,
		   'faq_question' => $faq_question,
		   'faq_answer' => $faq_answer,
		   'faq_meta_desc' => $faq_meta_desc,
		   'faq_meta_keywords' => $faq_meta_keywords
		);
		
		$this->db->insert('faq', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['faq_question_'.$language->lang_name])){
					$data = array(
					   'string_key' => $faq_question,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('faq_question_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['faq_answer_'.$language->lang_name])){
					$data = array(
					   'string_key' => $faq_answer,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('faq_answer_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['faq_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $faq_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('faq_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['faq_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $faq_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('faq_meta_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("تم إضافة الصفحة بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('faq', array('faq_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){		
		$row = $this->getByID($id);
		$faq_link = url_title($this->input->post('faq_question_english'), '-', TRUE);
		$faq_category_uid = $this->input->post('faq_category_uid');
		$faq_question = "faq_question".$row->faq_code;
		$faq_answer = "faq_answer".$row->faq_code;
		$faq_meta_desc = "faq_meta_desc".$row->faq_code;
		$faq_meta_keywords = "faq_meta_keywords".$row->faq_code;

		$data = array(
		   'faq_link' => $faq_link,
		   'faq_category_uid' => $faq_category_uid
		);
		$this->db->where('faq_uid', $id);
		$this->db->update('faq', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['faq_question_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('faq_question_'.$language->lang_name)
				);
				$this->db->where('string_key', $faq_question);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['faq_answer_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('faq_answer_'.$language->lang_name)
				);
				$this->db->where('string_key', $faq_answer);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['faq_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('faq_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $faq_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['faq_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('faq_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $faq_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل الصفحة بنجاح", "success");


	}



}


?>