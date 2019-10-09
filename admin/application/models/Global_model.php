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

	function getCityByID($id) {
		$q =  $this->db->get_where('cities', array('city_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function getModelByID($id) {
		$q =  $this->db->get_where('cars_models', array('cm_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $this->global_model->getStringByKeyLanguage($row->cm_name, 'arabic');
		}else{
			return false;	
		}
	}

	function getBrandByID($id) {
		$q =  $this->db->get_where('cars_brands', array('cb_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $this->global_model->getStringByKeyLanguage($row->cb_name, 'arabic'); 
		}else{
			return false;	
		}
	}

	function getColorByID($id) {
		$q =  $this->db->get_where('cars_colors', array('cco_uid' => $id));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $this->global_model->getStringByKeyLanguage($row->cco_name, 'arabic'); 
		}else{
			return false;	
		}
	}



    /**
     *  Select parent (basic) colors
     *
     *  return array of basic colors
     *
     *  @param empty
     *
     *  @return array of parent colors
     */
    function getParentColors() {
        $q = $this->db->get_where('cars_colors', array('parent_uid' => 0));
        if($q->num_rows() > 0) {
            foreach($q->result() as $row) {
                $data[] = $row;
            }
            return $data; 
        }
        else
		{
            return false;   
        }
    }
    
    /**
     *  Select secondary colors based on parent color
     *
     *  return array of basic colors
     *  @param $parentID - basic color
     *
     *  @return array of secondary colors
     */
    function getSecondaryColors($parentID) {
        $q = $this->db->get_where('cars_colors', array('parent_uid' => $parentID));
        if($q->num_rows() > 0) {
            foreach($q->result() as $row) {
				$row->cco_name = $this->global_model->getStringByKeyLanguage($row->cco_name, 'arabic');
                $data[] = $row;
            }
            return $data; 
        }
        else{
            return false;   
        }
    }
	
	function calculateAge($dateOfBirth ){
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		return $diff->format('%y');
	}
}

?>