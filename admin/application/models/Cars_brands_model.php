<?php

class Cars_brands_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('cars_brands', $limit, $offsit);
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
        $config['upload_path'] = CARS_BRANDS_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
            $this->messages->add($this->upload->display_errors(), "error");
			redirect('cars_brands/cars_brands_add');
        }
        else
		{
			$fInfo = $this->upload->data();
			$cb_image = $fInfo['file_name'];
		}
		
		$code = '_vertex_'.time();
		
		$cb_link = url_title($this->input->post('cb_name_english'), '-', TRUE);
		$cb_name = "cb_name".$code;
		$cb_text = "cb_text".$code;
		$cb_meta_desc = "cb_meta_desc".$code;
		$cb_meta_keywords = "cb_meta_keywords".$code;
		
		$data = array(
		   'cb_code' => $code,
		   'cb_link' => $cb_link,
		   'cb_name' => $cb_name,
		   'cb_image' => $cb_image,
		   'cb_meta_desc' => $cb_meta_desc,
		   'cb_meta_keywords' => $cb_meta_keywords
		);
		
		$this->db->insert('cars_brands', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['cb_name_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cb_name,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cb_name_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
								
				if(isset($_POST['cb_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cb_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cb_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['cb_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $cb_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('cb_meta_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("تم إضافة الماركة بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('cars_brands', array('cb_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
        $config['upload_path'] = CARS_BRANDS_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
			$cb_image = $this->input->post('cb_image');
        }
        else
		{
			$fInfo = $this->upload->data();
			$cb_image = $fInfo['file_name'];
		}
		
		$row = $this->getByID($id);
		$cb_link = url_title($this->input->post('cb_name_english'), '-', TRUE);
		$cb_name = "cb_name".$row->cb_code;
		$cb_text = "cb_text".$row->cb_code;
		$cb_meta_desc = "cb_meta_desc".$row->cb_code;
		$cb_meta_keywords = "cb_meta_keywords".$row->cb_code;

		$data = array(
		   'cb_link' => $cb_link,
		   'cb_image' => $cb_image
		);
		$this->db->where('cb_uid', $id);
		$this->db->update('cars_brands', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['cb_name_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cb_name_'.$language->lang_name)
				);
				$this->db->where('string_key', $cb_name);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['cb_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cb_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $cb_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['cb_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('cb_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $cb_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل الماركة بنجاح", "success");


	}



}


?>