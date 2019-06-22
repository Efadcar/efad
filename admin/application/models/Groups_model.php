<?php

class Groups_model extends CI_Model {
	
	function getAll($limit, $offsit) {
		$this->db->order_by("group_uid", "desc"); 
		$q = $this->db->get('dx_groups',$limit, $offsit);
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
	
		$group_name = $this->input->post('group_name');
		
		$data = array(
		   'group_name' => $group_name
		);
		$this->db->insert('dx_groups', $data); 
		
		if($this->db->affected_rows() > 0){
			$insert_id = $this->db->insert_id();
			$data = array(
			   'group_uid' => $insert_id
			);
			$this->db->insert('permission', $data); 
			if($this->db->affected_rows() > 0){
				$this->messages->add("لقد تم أضافة المجموعة بنجاح.", "success");
			}else{
				$this->global_model->delete_selected_items("dx_groups", "group_uid", $insert_id, FALSE, FALSE);
				$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
			}
		}else{
			$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
		}
	}
	
	
	function getByID($id) {
		$q =  $this->db->get_where('dx_groups', array('group_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
	
	function getPermissionsByID($id) {
		$q =  $this->db->get_where('permission', array('group_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}
	
	function edit_action($id){
		
		$group_name = $this->input->post('group_name');
		
		$data = array(
		   'group_name' => $group_name
		);
		
		$this->db->where('group_uid', $id);
		$this->db->update('dx_groups', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث المجموعة بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير بيانات المجموعة.", "alert");
		}
		
	}

	
	function edit_permissions_action($id){		
		$data = array(
		   'pages_menu' => $this->_if_null_input($this->input->post('pages_menu')),
		   'pages_list' => $this->_if_null_input($this->input->post('pages_list')),
		   'pages_add' => $this->_if_null_input($this->input->post('pages_add')),
		   'pages_edit' => $this->_if_null_input($this->input->post('pages_edit')),
		   'pages_del' => $this->_if_null_input($this->input->post('pages_del')),
		   'faq_categories_menu' => $this->_if_null_input($this->input->post('faq_categories_menu')),
		   'faq_categories_list' => $this->_if_null_input($this->input->post('faq_categories_list')),
		   'faq_categories_add' => $this->_if_null_input($this->input->post('faq_categories_add')),
		   'faq_categories_edit' => $this->_if_null_input($this->input->post('faq_categories_edit')),
		   'faq_categories_del' => $this->_if_null_input($this->input->post('faq_categories_del')),
		   'faq_menu' => $this->_if_null_input($this->input->post('faq_menu')),
		   'faq_list' => $this->_if_null_input($this->input->post('faq_list')),
		   'faq_add' => $this->_if_null_input($this->input->post('faq_add')),
		   'faq_edit' => $this->_if_null_input($this->input->post('faq_edit')),
		   'faq_del' => $this->_if_null_input($this->input->post('faq_del')),
		   'cars_categories_menu' => $this->_if_null_input($this->input->post('cars_categories_menu')),
		   'cars_categories_list' => $this->_if_null_input($this->input->post('cars_categories_list')),
		   'cars_categories_add' => $this->_if_null_input($this->input->post('cars_categories_add')),
		   'cars_categories_edit' => $this->_if_null_input($this->input->post('cars_categories_edit')),
		   'cars_categories_del' => $this->_if_null_input($this->input->post('cars_categories_del')),
		   'cars_types_menu' => $this->_if_null_input($this->input->post('cars_types_menu')),
		   'cars_types_list' => $this->_if_null_input($this->input->post('cars_types_list')),
		   'cars_types_add' => $this->_if_null_input($this->input->post('cars_types_add')),
		   'cars_types_edit' => $this->_if_null_input($this->input->post('cars_types_edit')),
		   'cars_types_del' => $this->_if_null_input($this->input->post('cars_types_del')),
		   'blogs_menu' => $this->_if_null_input($this->input->post('blogs_menu')),
		   'blogs_list' => $this->_if_null_input($this->input->post('blogs_list')),
		   'blogs_add' => $this->_if_null_input($this->input->post('blogs_add')),
		   'blogs_edit' => $this->_if_null_input($this->input->post('blogs_edit')),
		   'blogs_del' => $this->_if_null_input($this->input->post('blogs_del')),
		   'admins_menu' => $this->_if_null_input($this->input->post('admins_menu')),
		   'admins_list' => $this->_if_null_input($this->input->post('admins_list')),
		   'admins_add' => $this->_if_null_input($this->input->post('admins_add')),
		   'admins_edit' => $this->_if_null_input($this->input->post('admins_edit')),
		   'admins_del' => $this->_if_null_input($this->input->post('admins_del')),
		   'groups_menu' => $this->_if_null_input($this->input->post('groups_menu')),
		   'groups_list' => $this->_if_null_input($this->input->post('groups_list')),
		   'groups_add' => $this->_if_null_input($this->input->post('groups_add')),
		   'groups_edit' => $this->_if_null_input($this->input->post('groups_edit')),
		   'groups_del' => $this->_if_null_input($this->input->post('groups_del')),
		   'groups_permissions' => $this->_if_null_input($this->input->post('groups_permissions'))
		);
		
		//print_r($data);exit;
		
		
		$this->db->where('group_uid', $id);
		$this->db->update('permission', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تحديث صلاحيات المجموعة بنجاح.", "success");
		}else{
			$this->messages->add("لم تقوم بتغيير صلاحيات المجموعة.", "alert");
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