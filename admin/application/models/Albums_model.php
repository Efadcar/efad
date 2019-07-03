<?php

class Albums_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('albums', $limit, $offsit);
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
		
		$album_link = url_title($this->input->post('album_name_english'), '-', TRUE);
		$album_name = "album_name".$code;

		$data = array(
		   'album_name' => $album_name,
		   'album_link' => $album_link,
		   'album_code' => $code
		);
		
		$this->db->insert('albums', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['album_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $album_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('album_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
			}
			
			
			$this->messages->add("تم إضافة الألبوم بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('albums', array('album_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
		
		$row = $this->getByID($id);
		$album_link = url_title($this->input->post('album_name_english'), '-', TRUE);
		$album_name = "album_name".$row->album_code;
		
		$data = array(
		   'album_link' => $album_link
		);
		$this->db->where('album_uid', $id);
		$this->db->update('albums', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['album_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('album_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $album_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}


		}


		$this->messages->add("تم تعديل الألبوم بنجاح", "success");


	}



}


?>