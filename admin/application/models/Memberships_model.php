<?php

class Memberships_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('memberships',$limit, $offsit);
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
		   'mc_name' => $this->input->post('mc_name'),
		   'mc_6months_price' => $this->input->post('mc_6months_price'),
		   'mc_9months_price' => $this->input->post('mc_9months_price'),
		   'mc_12months_price' => $this->input->post('mc_12months_price'),
		   'mc_dicount' => $this->input->post('mc_dicount'),
		   'mc_allow_hours' => $this->input->post('mc_allow_hours'),
		   'mc_free_days' => $this->input->post('mc_free_days'),
		   'mc_points' => $this->input->post('mc_points'),
		   'mc_airport_parking' => $this->input->post('mc_airport_parking'),
		   'mc_color_code' => $this->input->post('mc_color_code'),
		   'mc_insurance' => $this->_if_null_input($this->input->post('mc_insurance')),
		   'mc_free_delivery' => $this->_if_null_input($this->input->post('mc_free_delivery')),
		   'mc_open_km' => $this->_if_null_input($this->input->post('mc_open_km')),
		   'mc_city_delivery' => $this->_if_null_input($this->input->post('mc_city_delivery')),
		   'mc_maintenance' => $this->_if_null_input($this->input->post('mc_maintenance')),
		   'mc_full_fuel' => $this->_if_null_input($this->input->post('mc_full_fuel')),
		   'mc_road_help' => $this->_if_null_input($this->input->post('mc_road_help')),
		   'mc_early_booking' => $this->_if_null_input($this->input->post('mc_early_booking')),
		   'mc_first_day_free' => $this->_if_null_input($this->input->post('mc_first_day_free')),
		   'mc_car_care' => $this->_if_null_input($this->input->post('mc_car_care')),
		   'mc_can_upgrade' => $this->_if_null_input($this->input->post('mc_can_upgrade')),
		   'mc_pay_later' => $this->_if_null_input($this->input->post('mc_pay_later')),
		   'mc_special_offers' => $this->_if_null_input($this->input->post('mc_special_offers')),
		   'mc_heat_block' => $this->_if_null_input($this->input->post('mc_heat_block')),
		   'mc_gps_system' => $this->_if_null_input($this->input->post('mc_gps_system')),
		   'mc_status' => $this->_if_null_input($this->input->post('mc_status'))
		);
				
		$this->db->insert('memberships', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم أضافة العضوية بنجاح.", "success");
		}else{
			$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
		}
	}
	
	function getByID($id) {
		$q =  $this->db->get_where('memberships', array('mc_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
		
	function edit_action($id){
		
		$data = array(
		   'mc_name' => $this->input->post('mc_name'),
		   'mc_6months_price' => $this->input->post('mc_6months_price'),
		   'mc_9months_price' => $this->input->post('mc_9months_price'),
		   'mc_12months_price' => $this->input->post('mc_12months_price'),
		   'mc_dicount' => $this->input->post('mc_dicount'),
		   'mc_allow_hours' => $this->input->post('mc_allow_hours'),
		   'mc_free_days' => $this->input->post('mc_free_days'),
		   'mc_points' => $this->input->post('mc_points'),
		   'mc_airport_parking' => $this->input->post('mc_airport_parking'),
		   'mc_color_code' => $this->input->post('mc_color_code'),
		   'mc_insurance' => $this->_if_null_input($this->input->post('mc_insurance')),
		   'mc_free_delivery' => $this->_if_null_input($this->input->post('mc_free_delivery')),
		   'mc_open_km' => $this->_if_null_input($this->input->post('mc_open_km')),
		   'mc_city_delivery' => $this->_if_null_input($this->input->post('mc_city_delivery')),
		   'mc_maintenance' => $this->_if_null_input($this->input->post('mc_maintenance')),
		   'mc_full_fuel' => $this->_if_null_input($this->input->post('mc_full_fuel')),
		   'mc_road_help' => $this->_if_null_input($this->input->post('mc_road_help')),
		   'mc_early_booking' => $this->_if_null_input($this->input->post('mc_early_booking')),
		   'mc_first_day_free' => $this->_if_null_input($this->input->post('mc_first_day_free')),
		   'mc_car_care' => $this->_if_null_input($this->input->post('mc_car_care')),
		   'mc_can_upgrade' => $this->_if_null_input($this->input->post('mc_can_upgrade')),
		   'mc_pay_later' => $this->_if_null_input($this->input->post('mc_pay_later')),
		   'mc_special_offers' => $this->_if_null_input($this->input->post('mc_special_offers')),
		   'mc_heat_block' => $this->_if_null_input($this->input->post('mc_heat_block')),
		   'mc_gps_system' => $this->_if_null_input($this->input->post('mc_gps_system')),
		   'mc_status' => $this->_if_null_input($this->input->post('mc_status'))
		);
		
		
		$this->db->where('mc_uid', $id);
		$this->db->update('memberships', $data); 
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث بيانات العضوية بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير بيانات العضوية.", "alert");
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