<?php

class Cars_colors_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('cars_colors', $limit, $offsit);
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
		
		$cco_parent = $this->input->post('cco_parent_uid');
		$cco_link = url_title($this->input->post('cco_name_english'), '-', TRUE);
		$cco_name = "cco_name".$code;
		$cco_meta_desc = $this->input->post('cco_meta_desc');
		
		$data = array(
		   'cco_code' 	=> $code,
		   'parent_uid' => $cco_parent,
		   'cco_link' 	=> $cco_link,
		   'cco_name' 	=> $cco_name,
		   'cco_meta_desc' => $cco_meta_desc
		);
		
		$this->db->insert('cars_colors', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['cco_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cco_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cco_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
								
			}
			
			
			$this->messages->add("تم إضافة اللون بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('cars_colors', array('cco_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
		$row = $this->getByID($id);
		$cco_parent = $this->input->post('cco_parent_uid');
		$cco_link = url_title($this->input->post('cco_name_english'), '-', TRUE);
		$cco_name = "cco_name".$row->cco_code;
		$cco_meta_desc = $this->input->post('cco_meta_desc');

		$data = array(
			'parent_uid' => $cco_parent,
		   	'cco_link' => $cco_link,
		   	'cco_meta_desc' => $cco_meta_desc
		);
		$this->db->where('cco_uid', $id);
		$this->db->update('cars_colors', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['cco_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cco_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $cco_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل اللون بنجاح", "success");


	}



}


?>