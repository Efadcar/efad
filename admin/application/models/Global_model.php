<?php

class Global_model extends CI_Model {

    function config() {
		
		$is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == null) {
            redirect('login');
        }

		
        $config = $this->db->get('config');
        $query = $config->row();
        $data = array(
            'siteName' => $query->siteName,
            'siteMetaDesc' => $query->siteMetaDesc,
            'siteMetaKW' => $query->siteMetaKW,
            'sitePerPagePagination' => $query->sitePerPagePagination
        );
        $this->session->set_userdata($data);
    }

    function config_login() {
		
        $config = $this->db->get('config');
        $query = $config->row();
        $data = array(
            'siteName' => $query->siteName,
            'siteMetaDesc' => $query->siteMetaDesc,
            'siteMetaKW' => $query->siteMetaKW,
            'sitePerPagePagination' => $query->sitePerPagePagination
        );
        $this->session->set_userdata($data);
    }

    function get_total_feedback() {
		$num = $this->db->count_all_results('contact');
		return $num;
    }

    function get_total_visits() {
		$this->db->where(array("log_type" => 1 ));
		$num = $this->db->count_all_results('log');
		return $num;
    }

    function get_total_store() {
		$this->db->where(array("log_type" => 2 ));
		$num = $this->db->count_all_results('log');
		return $num;
    }

    function get_total_newsletter() {
		$num = $this->db->count_all_results('newsletter');
		return $num;
    }

    function have_permission($field) {
        $group_uid = $this->session->userdata('admin_group');
        if ($group_uid == null) {
            redirect('login');
        }

        $q = $this->db->query("SELECT * FROM permission WHERE group_uid = $group_uid");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $user_group = $row->$field;
            }
        }

        if (!isset($user_group) || $user_group != true) {
			$this->messages->add("عفواً، انت لا تمتلك صلاحية لهذة العملية.", "error");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function have_permission_menu($field) {
        $group_uid = $this->session->userdata('admin_group');
        if ($group_uid != null || $group_uid != '') {
            $q = $this->db->query("SELECT * FROM permission WHERE group_uid = $group_uid");
            if ($q->num_rows() > 0) {
                foreach ($q->result() as $row) {
                    $user_group = $row->$field;
                }
            }

            if (!isset($user_group) || $user_group != true) {
                return false;
            } else {
                return true;
            }
        } else {
            redirect('login/logout');
        }
    }

    function delete_selected_items($table, $id_field, $id, $table2, $id_field2) {
        $this->db->where($id_field, $id);
        $del = $this->db->delete($table);
        if ($table2 !== false && $id_field2 !== false) {
            $this->db->where($id_field2, $id);
            $del2 = $this->db->delete($table2);
        }
        if ($del) {
            return TRUE;
        } else {

            return FALSE;
        }
    }

    function getStringByKeyLanguage($key, $lang) {
        $q = $this->db->get_where('strings', array('string_key' => $key, 'string_lang' => $lang));
        if ($q->num_rows() > 0) {
            $row = $q->row();
            return $row->string_content;
        } else {
            return false;
        }
    }

	function getCountryByID($id) {
		$q =  $this->db->get_where('countries', array('id' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}


}

?>