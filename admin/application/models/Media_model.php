<?php

class Media_model extends CI_Model {
	
	function getAll($limit, $offsit, $album_uid) {
		$q = $this->db->get_where('media', array('album_uid' => $album_uid), $limit, $offsit);
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
		
		
		$media_type = $this->input->post('media_type');
		$album_uid = $this->input->post('album_uid');
		
		switch($media_type){
			case 1:
				$config['upload_path'] = ALBUMS_IMAGES;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if ( !$this->upload->do_upload())
				{
					$this->messages->add($this->upload->display_errors(), "error");
					redirect('media/media_add/'.$album_uid);
				}
				else
				{
					$fInfo = $this->upload->data();
					$media_path = $fInfo['file_name'];
					$this->_createThumbnail(strtolower($fInfo['file_name']), "m_", 1250);
					$this->_createThumbnail(strtolower($fInfo['file_name']), "s_", 450);
					$media_thumb_path = "s_".$fInfo['file_name'];
				}
				break;	
			
			case 2:
				$media_path = $this->input->post('media_path');
				$media_thumb_path = "https://img.youtube.com/vi/".$media_path."/0.jpg";
				break;	
		}
		
		
		$code = '_vertex_'.time();
		
		$media_title = "media_title".$code;

		
		$data = array(
		   'media_type' => $media_type,
		   'media_path' => $media_path,
		   'media_thumb_path' => $media_thumb_path,
		   'media_code' => $code,
		   'media_title' => $media_title,
		   'album_uid' => $album_uid
		);
		
		$this->db->insert('media', $data);
		if($this->db->affected_rows() > 0){
			
			$languages = $this->getAllLanguages();
			if($languages != false)
			foreach($languages as $language){
				
				if(isset($_POST['media_title_'.$language->lang_name])){
					$data = array(
					   'string_key' => $media_title,
					   'string_code' => $code,
					   'string_lang' => $language->lang_name,
					   'string_content' => $this->input->post('media_title_'.$language->lang_name)
					);
					$this->db->insert('strings', $data);
				}
				
			}
			
			$this->messages->add("تم إضافة الصورة بنجاح", "success");
		}else{
			$this->messages->add("حدث خطأ أثناء الإضافة", "error");
		}


	}

    /**
     * this method to edit a image
     * 
     * @return void
     */
    function _createThumbnail($fileName, $prefix, $width) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = ALBUMS_IMAGES . $fileName;
        $config['create_thumb'] = false;
        $config['new_image'] = $prefix . $fileName;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            $this->messages->add($this->image_lib->display_errors(), "error");
        }
    }

}


?>