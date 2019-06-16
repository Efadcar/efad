<?php

class Blogs_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('blogs', $limit, $offsit);
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
        $config['upload_path'] = BLOGS_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
            $this->messages->add($this->upload->display_errors(), "error");
			redirect('blogs/blogs_add');
        }
        else
		{
			$fInfo = $this->upload->data();
			$blog_image = $fInfo['file_name'];
		}
		
		$code = '_vertex_'.time();
		
		$blog_link = url_title($this->input->post('blog_title_english'), '-', TRUE);
		$blog_title = "blog_title".$code;
		$blog_text = "blog_text".$code;
		$blog_meta_desc = "blog_meta_desc".$code;
		$blog_meta_keywords = "blog_meta_keywords".$code;
		
		$data = array(
		   'blog_code' => $code,
		   'blog_link' => $blog_link,
		   'blog_title' => $blog_title,
		   'blog_text' => $blog_text,
		   'blog_image' => $blog_image,
		   'blog_meta_desc' => $blog_meta_desc,
		   'blog_meta_keywords' => $blog_meta_keywords
		);
		
		$this->db->insert('blogs', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['blog_title_'.$language->lang_name])){
					$data = array(
					   'string_key' => $blog_title,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('blog_title_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['blog_text_'.$language->lang_name])){
					$data = array(
					   'string_key' => $blog_text,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('blog_text_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['blog_meta_desc_'.$language->lang_name])){
					$data = array(
					   'string_key' => $blog_meta_desc,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('blog_meta_desc_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
				if(isset($_POST['blog_meta_keywords_'.$language->lang_name])){
					$data = array(
					   'string_key' => $blog_meta_keywords,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('blog_meta_keywords_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			
			$this->messages->add("تم إضافة المقال بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}
	
	function getByID($id) {
		$q =  $this->db->get_where('blogs', array('blog_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
        $config['upload_path'] = BLOGS_IMAGES;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
			$blog_image = $this->input->post('blog_image');
        }
        else
		{
			$fInfo = $this->upload->data();
			$blog_image = $fInfo['file_name'];
		}
		
		$row = $this->getByID($id);
		$blog_link = url_title($this->input->post('blog_title_english'), '-', TRUE);
		$blog_title = "blog_title".$row->blog_code;
		$blog_text = "blog_text".$row->blog_code;
		$blog_meta_desc = "blog_meta_desc".$row->blog_code;
		$blog_meta_keywords = "blog_meta_keywords".$row->blog_code;

		$data = array(
		   'blog_link' => $blog_link,
		   'blog_image' => $blog_image
		);
		$this->db->where('blog_uid', $id);
		$this->db->update('blogs', $data);
			
		$languages = $this->getAllLanguages();
		if($languages != false)
		foreach($languages as $language){

			if(isset($_POST['blog_title_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('blog_title_'.$language->lang_name)
				);
				$this->db->where('string_key', $blog_title);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['blog_text_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('blog_text_'.$language->lang_name)
				);
				$this->db->where('string_key', $blog_text);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['blog_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('blog_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $blog_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['blog_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('blog_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $blog_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل المقال بنجاح", "success");


	}



}


?>