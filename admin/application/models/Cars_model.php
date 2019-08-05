<?php

class Cars_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('cars',$limit, $offsit);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			foreach($data as $r) {
				$car_color = $r->car_color;
				$m = $this->db->query("SELECT cco_name FROM cars_colors WHERE cco_uid = $car_color");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$r->car_color = $mrow->cco_name;
					}
				}
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getAllTypes() {
		//$this->db->order_by("ct_name", "desc"); 
		$q = $this->db->get('cars_types');
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
		//$this->db->order_by("ct_name", "desc"); 
		$q = $this->db->get('cars_categories');
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
	
	function getAllAlbums() {
		//$this->db->order_by("ct_name", "desc"); 
		$q = $this->db->get('albums');
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
		
	function add_action() {
		
		
		$data = array(
		   'car_link' => $this->input->post('car_model_name')."-".rand(1000,20000),
		   'cc_uid' => $this->input->post('cc_uid'),
		   'ct_uid' => $this->input->post('ct_uid'),
		   'cb_uid' => $this->input->post('cb_uid'),
		   'car_model_year' => $this->input->post('car_model_year'),
		   'car_model_name' => $this->input->post('car_model_name'),
		   'car_color' => $this->input->post('car_color'),
		   'album_uid' => $this->input->post('album_uid'),
		   'car_plate_number' => $this->input->post('car_plate_number'),
		   'car_engine_litre' => $this->input->post('car_engine_litre'),
		   'car_drivetrain' => $this->input->post('car_drivetrain'),
		   'car_transmission' => $this->input->post('car_transmission'),
		   'car_doors' => $this->input->post('car_doors'),
		   'car_persons' => $this->input->post('car_persons'),
		   'car_bags' => $this->input->post('car_bags'),
		   'car_features' => $this->input->post('car_features'),
		   'car_daily_price' => $this->input->post('car_daily_price'),
		   'car_monthly_price' => $this->input->post('car_monthly_price'),
		   'next_maintenance_date' => $this->input->post('next_maintenance_date'),
		   'car_status' => $this->_if_null_input($this->input->post('car_status')),
		   'has_offer' => $this->_if_null_input($this->input->post('has_offer')),
		   'new_car' => $this->_if_null_input($this->input->post('new_car'))
		);
		
		$this->db->insert('cars', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم أضافة السيارة بنجاح.", "success");
		}else{
			$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
		}
	}
	
	function getByID($id) {
		$q =  $this->db->get_where('cars', array('car_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
		
	function edit_action($id){
		
		$data = array(
		   'cc_uid' => $this->input->post('cc_uid'),
		   'ct_uid' => $this->input->post('ct_uid'),
		   'cb_uid' => $this->input->post('cb_uid'),
		   'car_model_year' => $this->input->post('car_model_year'),
		   'car_model_name' => $this->input->post('car_model_name'),
		   'car_color' => $this->input->post('car_color'),
		   'album_uid' => $this->input->post('album_uid'),
		   'car_plate_number' => $this->input->post('car_plate_number'),
		   'car_engine_litre' => $this->input->post('car_engine_litre'),
		   'car_drivetrain' => $this->input->post('car_drivetrain'),
		   'car_transmission' => $this->input->post('car_transmission'),
		   'car_doors' => $this->input->post('car_doors'),
		   'car_persons' => $this->input->post('car_persons'),
		   'car_bags' => $this->input->post('car_bags'),
		   'car_features' => $this->input->post('car_features'),
		   'car_daily_price' => $this->input->post('car_daily_price'),
		   'car_monthly_price' => $this->input->post('car_monthly_price'),
		   'next_maintenance_date' => $this->input->post('next_maintenance_date'),
		   'car_status' => $this->_if_null_input($this->input->post('car_status')),
		   'has_offer' => $this->_if_null_input($this->input->post('has_offer')),
		   'new_car' => $this->_if_null_input($this->input->post('new_car'))
		);
		
		$this->db->where('car_uid', $id);
		$this->db->update('cars', $data); 
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث بيانات السيارة بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير بيانات السيارة.", "alert");
		}
		
	}

	function _if_null_input($input){
		if($input == null){
			$input = 0	;
		}
		return $input;
	}
	
	
	function _createThumbnail($fileName) {  
        $config['image_library'] = 'gd2';  
        $config['source_image'] = USERS_FILES . $fileName;  
        $config['create_thumb'] = false;
		$config['new_image'] = 'thumb_'.$fileName; 
        $config['maintain_ratio'] = TRUE;  
        $config['width'] = 100;  
        $config['height'] = 100;  
        $this->load->library('image_lib', $config);  
        if(!$this->image_lib->resize()){
			$this->messages->add($this->image_lib->display_errors(), "error");  
		}
    }  
	

}


?>