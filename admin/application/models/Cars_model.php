<?php

class Cars_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$this->db->group_by("car_link");
		$q = $this->db->get('cars',$limit, $offsit);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			foreach($data as $r) {
				$m = $this->db->query("SELECT cb_name FROM cars_brands WHERE cb_uid = $r->cb_uid");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$r->cb_uid = $this->global_model->getStringByKeyLanguage($mrow->cb_name, 'arabic');
					}
				}
				$m = $this->db->query("SELECT cm_name FROM cars_models WHERE cm_uid = $r->cm_uid");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$r->cm_uid = $this->global_model->getStringByKeyLanguage($mrow->cm_name, 'arabic');
					}
				}
				$m = $this->db->query("SELECT cco_name FROM cars_colors WHERE cco_uid = $r->car_color");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$r->car_color = $this->global_model->getStringByKeyLanguage($mrow->cco_name, 'arabic');
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
		$car_brand = $this->global_model->getBrandByID($this->input->post('cb_uid'));
		$car_model = $this->global_model->getModelByID($this->input->post('cm_uid'));
		$car_color = $this->global_model->getColorByID($this->input->post('car_color'));
		$car_search_text = $car_brand.", ".$car_model.", ".$this->input->post('car_model_year').", ".$car_color;
		$car_link = $car_brand."-".$car_model."-".$this->input->post('car_model_year')."-".$car_color."-".$this->input->post('car_daily_price')."-".$this->input->post('car_monthly_price')."-".$this->input->post('car_yearly_price');
		$car_link = md5($car_link);
		
		$car_quantity = $this->input->post('car_quantity');
		
		$data = array(
		   'car_link' => $car_link,
		   'cc_uid' => $this->input->post('cc_uid'),
		   'ct_uid' => $this->input->post('ct_uid'),
		   'cb_uid' => $this->input->post('cb_uid'),
		   'car_model_year' => $this->input->post('car_model_year'),
		   'cm_uid' => $this->input->post('cm_uid'),
		   'car_color' => $this->input->post('car_color'),
		   'car_color_secondary' => $this->input->post('car_color_secondary'),
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
		   'car_yearly_price' => $this->input->post('car_yearly_price'),
		   'next_maintenance_date' => $this->input->post('next_maintenance_date'),
		   'car_status' => $this->_if_null_input($this->input->post('car_status')),
		   'has_offer' => $this->_if_null_input($this->input->post('has_offer')),
		   'car_in_stock' => $this->_if_null_input($this->input->post('car_in_stock')),
		   'car_search_text' => $car_search_text,
		   'new_car' => $this->_if_null_input($this->input->post('new_car'))
		);
		
		for($i = 1; $i <= $car_quantity; $i++){
			$this->db->insert('cars', $data);
		}
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم أضافة ".$car_quantity." سيارة بنجاح.", "success");
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
		$old_car_link = $this->getByID($id)->car_link;
		
		$car_brand = $this->global_model->getBrandByID($this->input->post('cb_uid'));
		$car_model = $this->global_model->getModelByID($this->input->post('cm_uid'));
		$car_color = $this->global_model->getColorByID($this->input->post('car_color'));
		$car_search_text = $car_brand.", ".$car_model.", ".$this->input->post('car_model_year').", ".$car_color;
		$car_link = $car_brand."-".$car_model."-".$this->input->post('car_model_year')."-".$car_color."-".$this->input->post('car_daily_price')."-".$this->input->post('car_monthly_price')."-".$this->input->post('car_yearly_price');
		$car_link = md5($car_link);

		$data = array(
		   'car_link' => $car_link,
		   'cc_uid' => $this->input->post('cc_uid'),
		   'ct_uid' => $this->input->post('ct_uid'),
		   'cb_uid' => $this->input->post('cb_uid'),
		   'car_model_year' => $this->input->post('car_model_year'),
		   'cm_uid' => $this->input->post('cm_uid'),
		   'car_color' => $this->input->post('car_color'),
		   'car_color_secondary' => $this->input->post('car_color_secondary'),
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
		   'car_yearly_price' => $this->input->post('car_yearly_price'),
		   'next_maintenance_date' => $this->input->post('next_maintenance_date'),
		   'car_status' => $this->_if_null_input($this->input->post('car_status')),
		   'has_offer' => $this->_if_null_input($this->input->post('has_offer')),
		   'car_in_stock' => $this->_if_null_input($this->input->post('car_in_stock')),
		   'car_search_text' => $car_search_text,
		   'new_car' => $this->_if_null_input($this->input->post('new_car'))
		);
		
		$this->db->where('car_link', $old_car_link);
		$this->db->update('cars', $data); 
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث عدد ".$this->db->affected_rows()." سيارة بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير بيانات السيارة.", "alert");
		}
		
	}
	
	function delete($car_link){
        $this->db->where("car_link", $car_link);
        $del = $this->db->delete("cars");
		if($del){
			return $this->db->affected_rows();
		}else{
			return false;
		}
	}

	function _if_null_input($input){
		if($input == null){
			$input = 0	;
		}
		return $input;
	}
		

}


?>