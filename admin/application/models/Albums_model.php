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
	
	function getAllBrands() {
		//$this->db->order_by("ct_name", "desc"); 
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
	
	function getAllModels() {
		//$this->db->order_by("ct_name", "desc"); 
		$q = $this->db->get('cars_models');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
		
	function getAllColors() {
		$this->db->order_by("cco_name", "asc"); 
		$q = $this->db->get('cars_colors');
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
		
		$car_brand = $this->global_model->getBrandByID($this->input->post('cb_uid'));
		$car_model = $this->global_model->getModelByID($this->input->post('cm_uid'));
		$car_color = $this->global_model->getColorByID($this->input->post('car_color'));
		
		$album_name = $car_brand." - ".$car_model." - ".$this->input->post('model_year')." - ".$car_color;
		$album_link = url_title($album_name , '-', TRUE);

		$data = array(
		   'album_name' => $album_name,
		   'album_link' => $album_link
		);
		
		$this->db->insert('albums', $data);
		if($this->db->affected_rows() > 0){
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
		$car_brand = $this->global_model->getBrandByID($this->input->post('cb_uid'));
		$car_model = $this->global_model->getModelByID($this->input->post('cm_uid'));
		$car_color = $this->global_model->getColorByID($this->input->post('car_color'));
		
		$album_name = $car_brand." - ".$car_model." - ".$this->input->post('model_year')." - ".$car_color;
		$album_link = url_title($album_name , '-', TRUE);

		$data = array(
		   'album_name' => $album_name,
		   'album_link' => $album_link
		);
		$this->db->where('album_uid', $id);
		$this->db->update('albums', $data);
		$this->messages->add("تم تعديل الألبوم بنجاح", "success");


	}



}


?>