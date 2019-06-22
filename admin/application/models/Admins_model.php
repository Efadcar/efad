<?php

class Admins_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$q = $this->db->get('dx_users',$limit, $offsit);
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			foreach($data as $r) {
				$group_uid = $r->group_uid;
				$m = $this->db->query("SELECT group_name FROM dx_groups WHERE group_uid = $group_uid");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$r->group_uid = $mrow->group_name;
					}
				}
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	
	function getAllGroups() {
		$this->db->order_by("group_uid", "desc"); 
		$q = $this->db->get('dx_groups');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function is_last_super_admin() {
		$q = $this->db->get_where('dx_users', array("group_uid" => 1));
		if($q->num_rows() > 1) {
			return false; 
		}else{
			return true;	
		}
	}
	
	function add_action() {
	
		$user_full_name = $this->input->post('user_full_name');
		$user_pwd = $this->input->post('user_pwd');

		$user_pwd = md5($user_pwd);
		$user_email = $this->input->post('user_email');
		//$user_actived = $this->_if_null_input($this->input->post('user_actived'));
		$user_banned = $this->_if_null_input($this->input->post('user_banned'));
		//$user_ban_reason = $this->input->post('user_ban_reason');
		$group_uid = $this->input->post('group_uid');
			

		$data = array(
		   'user_full_name' => $user_full_name ,
		   'user_pwd' => $user_pwd ,
		   'user_email' => $user_email ,
		   'user_banned' => $user_banned ,
		   'group_uid' => $group_uid
		);
		$this->db->insert('dx_users', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم أضافة الموظف بنجاح.", "success");
		}else{
			$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
		}
	}
	
	function getByID($id) {
		$q =  $this->db->get_where('dx_users', array('user_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
	
	function getProfileByID($id) {
		$q =  $this->db->get_where('dx_profiles', array('user_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
	
	function edit_action($id){
		
		$user_full_name = $this->input->post('user_full_name');
		$user_pwd = $this->input->post('user_pwd');
		$user_email = $this->input->post('user_email');
		$user_banned = $this->_if_null_input($this->input->post('user_banned'));
		$group_uid = $this->input->post('group_uid');
		
		if($user_pwd != null){
			$user_pwd = md5($user_pwd);
			$data = array(
			   'user_full_name' => $user_full_name,
			   'user_pwd' => $user_pwd,
			   'user_email' => $user_email,
			   'user_banned' => $user_banned,
			   'group_uid' => $group_uid
			);
		}else{
			$data = array(
			   'user_full_name' => $user_full_name,
			   'user_email' => $user_email,
			   'user_banned' => $user_banned,
			   'group_uid' => $group_uid
			);
		}
		
		$this->db->where('user_uid', $id);
		$this->db->update('dx_users', $data); 
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث بيانات الموظف بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير بيانات الموظف.", "alert");
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