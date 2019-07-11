<?php

class Members_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('members',$limit, $offsit);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			foreach($data as $r) {
				$mc_uid = $r->mc_uid;
				$m = $this->db->query("SELECT mc_name FROM memberships WHERE mc_uid = $mc_uid");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$r->mc_name = $mrow->mc_name;
					}
				}
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	
	function getAllMemberships() {
		$this->db->order_by("mc_name", "asc"); 
		$q = $this->db->get('memberships');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
		
	function getAllCountries() {
		$this->db->order_by("status", "desc"); 
		$this->db->order_by("name", "asc"); 
		$q = $this->db->get('countries');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
		
	function get_cities_by_state ($state, $tree = null){
			$query = $this->db->query("SELECT city_uid,city_name_ar FROM cities WHERE country_uid = '$state'");
			$cities = array();
	
			if($query->result()){
				$cities[] = '<option value="0">أختار مدينة</option>';
				foreach ($query->result() as $city) {
					$cities[] = '<option value="'.$city->city_uid.'">'.$city->city_name_ar.'</option>';
					
				}
				return $cities;
			} else {
				return FALSE;
			}
		} 

	
	
	function add_action() {
	
		$member_fname = $this->input->post('member_fname');
		$member_lname = $this->input->post('member_lname');
		$member_email = $this->input->post('member_email');
		$country_uid = $this->input->post('country_uid');
		$country_code = $this->getCountryCodeByID($country_uid);
		$member_mobile = $this->input->post('member_mobile');
		$member_mobile = preg_replace("/^\+?{$country_code}/", "",$member_mobile);
		$member_mobile = ltrim($member_mobile, '0');
		$member_password = $this->input->post('member_password');
		$member_password = md5($member_password);
		
		$city_uid = $this->input->post('city_uid');
		$mc_uid = $this->input->post('mc_uid');
		$member_renewal_date = $this->input->post('member_renewal_date');
		//$user_actived = $this->_if_null_input($this->input->post('user_actived'));
			

		$data = array(
		   'member_fname' => $member_fname ,
		   'member_lname' => $member_lname ,
		   'member_email' => $member_email ,
		   'member_mobile' => $member_mobile ,
		   'member_password' => $member_password ,
		   'country_code' => $country_code ,
		   'city_uid' => $city_uid ,
		   'mc_uid' => $mc_uid ,
		   'member_renewal_date' => $member_renewal_date
		);
		
		$this->db->insert('members', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم أضافة العضو بنجاح.", "success");
		}else{
			$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
		}
	}
	
	function getByID($id) {
		$q =  $this->db->get_where('members', array('member_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
		
	function getCountryCodeByID($id) {
		$q =  $this->db->get_where('countries', array('id' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row->phonecode; 
		}else{
			return false;	
		}
	}
		
	function edit_action($id){
		
		$member_fname = $this->input->post('member_fname');
		$member_lname = $this->input->post('member_lname');
		$member_email = $this->input->post('member_email');
		$country_uid = $this->input->post('country_uid');
		$country_code = $this->getCountryCodeByID($country_uid);
		$member_mobile = $this->input->post('member_mobile');
		$member_mobile = preg_replace("/^\+?{$country_code}/", "",$member_mobile);
		$member_mobile = ltrim($member_mobile, '0');
		$member_password = $this->input->post('member_password');
		
		$city_uid = $this->input->post('city_uid');
		$mc_uid = $this->input->post('mc_uid');
		$member_renewal_date = $this->input->post('member_renewal_date');
		
		if($member_password != null){
			$member_password = md5($member_password);
			$data = array(
			   'member_fname' => $member_fname ,
			   'member_lname' => $member_lname ,
			   'member_email' => $member_email ,
			   'member_mobile' => $member_mobile ,
			   'member_password' => $member_password ,
			   'country_uid' => $country_uid ,
			   'city_uid' => $city_uid ,
			   'mc_uid' => $mc_uid ,
			   'member_renewal_date' => $member_renewal_date
			);
		}else{
			$data = array(
			   'member_fname' => $member_fname ,
			   'member_lname' => $member_lname ,
			   'member_email' => $member_email ,
			   'member_mobile' => $member_mobile ,
			   'country_uid' => $country_uid ,
			   'city_uid' => $city_uid ,
			   'mc_uid' => $mc_uid ,
			   'member_renewal_date' => $member_renewal_date
			);
		}
		
		$this->db->where('member_uid', $id);
		$this->db->update('members', $data); 
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث بيانات العضو بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير بيانات العضو.", "alert");
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