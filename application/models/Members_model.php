<?php

class Members_model extends CI_Model {

    function validate() {
        $username = strtolower($this->input->post('username'));
        $password = md5($this->input->post('password'));
		
		if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
			$this->db->where('member_email', $username);
		}else{
			$username = ltrim($username, '0');
			$this->db->where('member_mobile', $username);
		}
        
        $this->db->where('member_password', $password);
        $query = $this->db->get('members');

        if ($query->result_id->num_rows == 1) {
            $row = $query->row();
			// update ast login ip
			$user_ip = $_SERVER['REMOTE_ADDR'];
			$q = $this->db->query("UPDATE `members` SET  
						`member_last_login` =  CURRENT_TIMESTAMP,
						`member_last_login_ip` =  '$user_ip'
						 WHERE `member_uid` = '$row->member_uid'") ;

			if ($row->member_status == 0) {
                $this->messages->add("لقد تم حظرك", "error");
                return false;
            }

            $data = array(
                'member_full_name' => $row->member_fname." ".$row->member_lname,
                'member_uid' => $row->member_uid,
                'member_mobile' => $row->member_mobile,
                'member_email' => $row->member_email,
                'mc_uid' => $row->mc_uid,
                'member_renewal_date' => $row->member_renewal_date,
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
            $this->messages->add("أسم المستخدم أو كلمة المرور غير صحيحة", "error");
            $this->session->set_userdata($data);
            return false;
        }
    }
	
	function register(){
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
		   'country_uid' => $country_uid ,
		   'city_uid' => $city_uid ,
		   'mc_uid' => $mc_uid ,
		   'member_renewal_date' => $member_renewal_date
		);
		
		$this->db->insert('members', $data); 
		
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم تسجيل حسابك بنجاح برجاء تسجيل الدخول.", "success");
		}else{
			$this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
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