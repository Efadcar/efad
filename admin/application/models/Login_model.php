<?php

class Login_model extends CI_Model {

    function validate() {
        $adminEmail = strtolower($this->input->post('adminEmail'));
        $adminPwd = md5($this->input->post('adminPwd'));

        $this->db->where('user_email', $adminEmail);
        $this->db->where('user_pwd', $adminPwd);
        $query = $this->db->get('dx_users');
		//var_dump($query->result_id->num_rows);exit;

        if ($query->result_id->num_rows == 1) {
            $row = $query->row();
			//print_r($row);exit;
            if ($row->user_banned == 1) {
                $this->messages->add("You have been banned because of ' " . $row->user_ban_reason . " '", "error");
                return false;
            }

            $data = array(
                'admin_full_name' => $row->user_full_name,
                'admin_uid' => $row->user_uid,
                'admin_group' => $row->group_uid,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            return true;
        } else {
            $session = $this->session->all_userdata();
            if (isset($session['error_login'])) {
                $data = array(
                    'error_login' => $session['error_login'] + 1
                );
            } else {
                $data = array(
                    'error_login' => 1
                );
            }
            $this->messages->add("E-Mail or password not correct.", "error");
            $this->session->set_userdata($data);
            return false;
        }
    }
	
    function have_permission($group_uid, $field) {
        $q = $this->db->query("SELECT * FROM permission WHERE group_uid = $group_uid");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data = $row->$field;
            }
            return $data;
        }
    }

}

?>