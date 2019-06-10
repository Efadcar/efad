<?php

class Pages_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('pages', $limit, $offsit);
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
        $config['upload_path'] = PAGES_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
            $this->messages->add($this->upload->display_errors(), "error");
			redirect('pages/pages_add');
        }
        else
		{
			$fInfo = $this->upload->data();
			$page_image = $fInfo['file_name'];
		}
		
		$code = '_vertex_'.time();
		
		$page_link = url_title($this->input->post('page_title_english'), '-', TRUE);
		$page_title = "page_title".$code;
		$page_text = "page_text".$code;
		$page_meta_desc = "page_meta_desc".$code;
		$page_meta_keywords = "page_meta_keywords".$code;
		
		$data = array(
		   'page_code' => $code,
		   'page_link' => $page_link,
		   'page_title' => $page_title,
		   'page_text' => $page_text,
		   'page_image' => $page_image,
		   'page_meta_desc' => $page_meta_desc,
		   'page_meta_keywords' => $page_meta_keywords
		);
		
		$this->db->insert('pages', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['page_title_'.$language->lang_name])){
					$data = array(
					   'string_key' => $page_title,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('page_title_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['page_text_'.$language->lang_name])){
					$data = array(
					   'string_key' => $page_text,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('page_text_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['page_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $page_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('page_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['page_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $page_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('page_meta_keywords_'.$language->lang_name)
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
		$q =  $this->db->get_where('pages', array('page_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
        $config['upload_path'] = PAGES_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
			$page_image = $this->input->post('page_image');
        }
        else
		{
			$fInfo = $this->upload->data();
			$page_image = $fInfo['file_name'];
		}
		
		$row = $this->getByID($id);
		$page_link = url_title($this->input->post('page_title_english'), '-', TRUE);
		$page_title = "page_title".$row->page_code;
		$page_text = "page_text".$row->page_code;
		$page_meta_desc = "page_meta_desc".$row->page_code;
		$page_meta_keywords = "page_meta_keywords".$row->page_code;

		$data = array(
		   'page_link' => $page_link,
		   'page_image' => $page_image
		);
		$this->db->where('page_uid', $id);
		$this->db->update('pages', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['page_title_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('page_title_'.$language->lang_name)
				);
				$this->db->where('string_key', $page_title);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['page_text_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('page_text_'.$language->lang_name)
				);
				$this->db->where('string_key', $page_text);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['page_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('page_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $page_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['page_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('page_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $page_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل الصفحة بنجاح", "success");


	}



}


?>