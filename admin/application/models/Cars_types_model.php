<?php

class Cars_types_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('cars_types', $limit, $offsit);
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
        $config['upload_path'] = CARS_TYPES_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
            $this->messages->add($this->upload->display_errors(), "error");
			redirect('cars_types/cars_types_add');
        }
        else
		{
			$fInfo = $this->upload->data();
			$ct_image = $fInfo['file_name'];
		}
		
		$code = '_vertex_'.time();
		
		$ct_link = url_title($this->input->post('ct_name_english'), '-', TRUE);
		$ct_name = "ct_name".$code;
		$ct_text = "ct_text".$code;
		$ct_meta_desc = "ct_meta_desc".$code;
		$ct_meta_keywords = "ct_meta_keywords".$code;
		
		$data = array(
		   'ct_code' => $code,
		   'ct_link' => $ct_link,
		   'ct_name' => $ct_name,
		   'ct_image' => $ct_image,
		   'ct_meta_desc' => $ct_meta_desc,
		   'ct_meta_keywords' => $ct_meta_keywords
		);
		
		$this->db->insert('cars_types', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['ct_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $ct_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('ct_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
								
				if(isset($_POST['ct_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $ct_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('ct_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['ct_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $ct_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('ct_meta_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("تم إضافة النمط بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('cars_types', array('ct_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
        $config['upload_path'] = CARS_TYPES_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
			$ct_image = $this->input->post('ct_image');
        }
        else
		{
			$fInfo = $this->upload->data();
			$ct_image = $fInfo['file_name'];
		}
		
		$row = $this->getByID($id);
		$ct_link = url_title($this->input->post('ct_name_english'), '-', TRUE);
		$ct_name = "ct_name".$row->ct_code;
		$ct_text = "ct_text".$row->ct_code;
		$ct_meta_desc = "ct_meta_desc".$row->ct_code;
		$ct_meta_keywords = "ct_meta_keywords".$row->ct_code;

		$data = array(
		   'ct_link' => $ct_link,
		   'ct_image' => $ct_image
		);
		$this->db->where('ct_uid', $id);
		$this->db->update('cars_types', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['ct_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('ct_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $ct_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['ct_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('ct_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $ct_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['ct_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('ct_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $ct_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل النمط بنجاح", "success");


	}



}


?>