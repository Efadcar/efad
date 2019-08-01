<?php

class Global_model extends CI_Model {

		
    function run_curl($link) {
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $server_output = curl_exec($ch);
        curl_close($ch);
        return json_decode($server_output);

    }
	
	function calculate($book_start_date, $book_end_date, $car_uid, $mc_uid){
		
		// Get booking days
		$days = $this->dateDifference($book_start_date, $book_end_date);
		
		// Get car object
		$car_obj = $this->getCarByID($car_uid);
		// Get Membership object
		//return $mc_uid;exit;
		if($mc_uid != ""){
			$new_member = 0;
			$membership_obj = $this->getMembershipByID($mc_uid);
		}else{
			$new_member = 1;
			$membership_obj = $this->getMembershipByID(3);
		}
		//return $membership_obj;exit;
		// 1- Get car daily rate depend on booking days
		switch($days){
			case ($days < 180):
				$daily_rate = $car_obj->car_daily_price;
				break;
			case ($days >= 180):
				$daily_rate = $car_obj->car_monthly_price;
				break;
		}
		
		//return $membership_obj;exit;
		
		// Get membership discount
		$membership_discount = $membership_obj->mc_dicount;
		

		// 2- Apply membership discount on daily rate
		$daily_rate_after_discount = $daily_rate - ($daily_rate * ($membership_discount / 100));
		
		// Get total fees for booking
		$total_fees = $daily_rate_after_discount * $days;
		
		// Check if there is free days depend on membership and days
		switch($membership_obj->mc_uid){
			case ($membership_obj->mc_uid == 1 && $days >= 21):
				$free_day = floor($days / 21);
				break;
			case ($membership_obj->mc_uid == 2 && $days >= 14):
				$free_day = floor($days / 14);
				break;
			case ($membership_obj->mc_uid == 3 && $days >= 7):
				$free_day = floor($days / 7);
				break;
			default:
				$free_day = 0;
				break;
		}
		
		// calculate total fees after 1 day free if exist
		$total_fees_after_free_day = $total_fees - ($daily_rate_after_discount * $free_day);
		
		// get days to get the cat from today
		$days_to_get_car = $this->dateDifference(date("Y-m-d",time()), $book_start_date);
		
		// calculate early booking
		if($days_to_get_car >= EARLY_BOOKING_AFTER){
			$early_booking = 1;
			$early_booking_discount_total = $total_fees_after_free_day * (EARLY_BOOKING_DISCOUNT / 100);
			$total_fees_after_early_booking = $total_fees_after_free_day - $early_booking_discount_total;
		}else{
			$early_booking = 0;
			$early_booking_discount_total = 0;
			$total_fees_after_early_booking = $total_fees_after_free_day; 
		}
		
		// Calculate added value tax
		$tax_total = ($total_fees_after_early_booking * (5 / 100));
		
		$total_fees_after_tax = $total_fees_after_early_booking + $tax_total;
		
		//return $total_fees_after_tax;exit;
		$dataArray = array(
			"status" => 1, 
			"new_member" => $new_member, 
			"days" => $days, 
			"car_uid" => $car_uid, 
			"mc_uid" => $membership_obj->mc_uid, 
			"book_start_date" => $book_start_date, 
			"book_end_date" => $book_end_date, 
			"days_to_get_car" => $days_to_get_car, 
			"daily_rate" => $daily_rate, 
			"total_fees" => $total_fees, 
			"daily_rate_after_discount" => $daily_rate_after_discount, 
			"free_day" => $free_day,
			"total_fees_after_free_day" => $total_fees_after_free_day, 
			"early_booking" => $early_booking, 
			"early_booking_discount_total" => $early_booking_discount_total, 
			"total_fees_after_early_booking" => $total_fees_after_early_booking,
			"tax_total" => $tax_total,
			"total_fees_after_tax" => $total_fees_after_tax
		);
		$session_data = array("current_booking" => $dataArray);
		$this->session->set_userdata($session_data);
		//return $total_fees_after_tax;exit;
		return $dataArray;
	}
	
	function confirmBooking($payment_method){		
		$data['member_uid'] = $this->session->userdata('member_uid');
		$data['car_uid'] = $this->session->userdata('current_booking')['car_uid'];
		$data['book_start_date'] = date("Y-m-d", strtotime($this->session->userdata('current_booking')['book_start_date']));
		$data['book_end_date'] = date("Y-m-d", strtotime($this->session->userdata('current_booking')['book_end_date']));
		$data['delivery_city_uid'] = $this->session->userdata('current_booking')['city_uid'];
		$data['book_total_days'] = $this->session->userdata('current_booking')['days'];
		//return $data;exit;
		// add to booking table
		$this->db->insert('bookings', $data); 
		
		if($this->db->affected_rows() > 0){
			$book_uid = $this->db->insert_id();
			$invoice['related_uid'] = $book_uid;
			$invoice['member_uid'] = $this->session->userdata('member_uid');
			$invoice['invoice_start_date'] = date("Y-m-d", strtotime($this->session->userdata('current_booking')['book_start_date']));
			$invoice['invoice_end_date'] = date("Y-m-d", strtotime($this->session->userdata('current_booking')['book_end_date']));
			$invoice['book_total_days'] = $this->session->userdata('current_booking')['days'];
			$invoice['daily_rate'] = $this->session->userdata('current_booking')['daily_rate'];
			$invoice['daily_rate_after_discount'] = $this->session->userdata('current_booking')['daily_rate_after_discount'];
			$invoice['free_days'] = $this->session->userdata('current_booking')['free_day'];
			$invoice['is_early_booking'] = $this->session->userdata('current_booking')['early_booking'];
			$invoice['invoice_total_fees'] = $this->session->userdata('current_booking')['total_fees_after_early_booking'];
			$invoice['invoice_tax_total'] = $this->session->userdata('current_booking')['tax_total'];
			$invoice['invoice_total_fees_after_tax'] = $this->session->userdata('current_booking')['total_fees_after_early_booking'] + $this->session->userdata('current_booking')['tax_total'];
			$invoice['invoice_payment_method'] = $payment_method;
			if($payment_method == "visa"){
				$invoice['invoice_status'] = 1;
			}else{
				$invoice['invoice_status'] = 0;
			}
			$this->db->insert('invoices', $invoice); 
			if($this->db->affected_rows() > 0){
				$new_member = $this->session->userdata('current_booking')['new_member'];
				if($new_member == 1){
					
					$invoice2['related_uid'] = 3;
					$invoice2['member_uid'] = $this->session->userdata('member_uid');
					$invoice2['invoice_start_date'] = date("Y-m-d", time());
					$invoice2['invoice_end_date'] = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));
					$invoice2['invoice_total_fees'] = RED_MEMBERSHIP_YEARLY_FEES;
					$invoice2['invoice_tax_total'] = ((RED_MEMBERSHIP_YEARLY_FEES / 100) * 5 );
					$invoice2['invoice_total_fees_after_tax'] = RED_MEMBERSHIP_YEARLY_FEES + ((RED_MEMBERSHIP_YEARLY_FEES / 100) * 5 );
					$invoice2['invoice_payment_method'] = $payment_method;
					if($payment_method == "visa"){
						$invoice2['invoice_status'] = 1;
					}else{
						$invoice2['invoice_status'] = 0;
					}
					$this->db->insert('invoices', $invoice2); 
					if($this->db->affected_rows() > 0){
						$this->messages->add("لقد تم حجز السيارة بنجاح.", "success");
						
						// update user mc_uid
						$data = array(
							'mc_uid' => 3,
							'member_renewal_date' => $invoice2['invoice_end_date']
						);

						$this->db->where('member_uid', $invoice2['member_uid']);
						$this->db->update('members', $data);
						$_SESSION['mc_uid'] = 3;
						unset($_SESSION['current_booking']);
						return ["status" => 1];
					}else{
						return ["status" => 0, "message" => "لقد حدث خطأ أثناء الحجز"];
					}
				}else{
					$this->messages->add("لقد تم حجز السيارة بنجاح.", "success");
					unset($_SESSION['current_booking']);
					return ["status" => 1];
				}
			}else{
				return ["status" => 0, "message" => "لقد حدث خطأ أثناء الحجز"];
			}
		}else{
			return ["status" => 0, "message" => "لقد حدث خطأ أثناء الحجز"];
		}
		// add to invoice table
		
		// return true and set message to session msgs
	}
	
	function confirmMembership($payment_method){		
		$member_uid = $this->session->userdata('member_uid');
		$data['mc_uid'] = $this->input->post('mc_uid');
		$total = $this->input->post('total');
		$period = $this->input->post('period');
		switch($period){
			case "mc_6months_price";
				$data['member_renewal_date'] = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 180 day"));
				break;
			case "mc_9months_price";
				$data['member_renewal_date'] = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 270 day"));
				break;
			case "mc_12months_price";
				$data['member_renewal_date'] = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 360 day"));
				break;
		}
		$invoice2['related_uid'] = $data['mc_uid'];
		$invoice2['member_uid'] = $member_uid;
		$invoice2['invoice_start_date'] = date("Y-m-d", time());
		$invoice2['invoice_end_date'] = $data['member_renewal_date'];
		$invoice2['invoice_total_fees'] = $total;
		$invoice2['invoice_tax_total'] = (($total / 100) * 5 );
		$invoice2['invoice_total_fees_after_tax'] = $total + (($total / 100) * 5 );
		$invoice2['invoice_payment_method'] = $payment_method;
		if($payment_method == "visa"){
			$invoice2['invoice_status'] = 1;
		}else{
			$invoice2['invoice_status'] = 0;
		}
		$this->db->insert('invoices', $invoice2); 
		if($this->db->affected_rows() > 0){
			$this->messages->add("لقد تم الأشتراك بالعضوية بنجاح.", "success");
			$this->db->where('member_uid', $member_uid);
			$this->db->update('members', $data);
			$_SESSION['mc_uid'] = $data['mc_uid'];
			return ["status" => 1];
		}else{
			return ["status" => 0, "message" => "لقد حدث خطأ أثناء الأشتراك"];
		}
		// add to invoice table
		
		// return true and set message to session msgs
	}
	
	function getMembershipByID($mc_uid){
		$q =  $this->db->get_where('memberships', array('mc_uid' => $mc_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	
	function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
	{
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);

		$interval = date_diff($datetime1, $datetime2);

		return $interval->format($differenceFormat);

	}
	
	function initializeLang($lang_file) {
        $this->load->helper('language');
        $siteLang = $this->session->userdata('site_lang');
        if ($siteLang) {
            $this->lang->load($lang_file, $siteLang);
        } else {
			$this->session->set_userdata('site_lang' ,'arabic');
            $this->lang->load($lang_file, 'arabic');
        }
    }
	
	function getSiteDirection(){
		if($this->session->userdata('site_lang') == 'arabic'){
			 return "rtl";
		}else{ 
			 return "ltr";
		}
	}

	function config(){
		$siteLang = $this->session->userdata('site_lang');

		$q = $this->db->get('settings');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$string_key = $row->site_code;
				$m = $this->db->query("SELECT * FROM strings WHERE string_code LIKE '".$string_key."' AND string_lang LIKE '".$siteLang."'");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$string_data[$mrow->string_key] = $mrow;
					}
					$row->site_name = $string_data[$row->site_name]->string_content;
					$row->site_slogan = $string_data[$row->site_slogan]->string_content;
					$row->site_description = $string_data[$row->site_description]->string_content;
					$row->site_keywords = $string_data[$row->site_keywords]->string_content;
					$row->site_address = $string_data[$row->site_address]->string_content;
				}
				
				
				$site_settings = array(
					'site_name' => $row->site_name,
					'site_slogan' => $row->site_slogan,
					'site_logo' => $row->site_logo,
					'site_description' => $row->site_description,
					'site_keywords' => $row->site_keywords,
					'site_address' => $row->site_address,
					'site_email' => $row->site_email,
					'site_facebook' => $row->site_facebook,
					'site_twitter' => $row->site_twitter,
					'site_google' => $row->site_google,
					'site_instagram' => $row->site_instagram,
					'site_phone' => $row->site_phone,
					'site_branches' => $row->site_branches,
					'site_address' => $row->site_address
				);
				$this->session->set_userdata('site_settings', $site_settings); 
				

			}
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
	
	function getAllMemberships() {
		$this->db->order_by("mc_name", "desc"); 
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
	
	
	function getAllCountriesAjax() {
		$this->db->order_by("status", "desc"); 
		$this->db->order_by("name", "asc"); 
		$q = $this->db->get('countries');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = [$row->name ,strtolower($row->iso) ,$row->phonecode ];
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getUserBookings($member_uid) {
		$this->db->order_by("book_uid", "desc"); 
		$q = $this->db->get_where('bookings', array("member_uid" => $member_uid));
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$row->car_obj = $this->getCarByID($row->car_uid);
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function get_cities_by_state ($state, $tree = null){
		$query = $this->db->query("SELECT city_uid,city_name_ar FROM cities WHERE country_uid = ".$state);
		$cities = [];

		if($query->result()){
			$cities[] = '<option value="0">أختار مدينة</option>';
			foreach ($query->result() as $city) {
				$cities[] = '<option value="'.$city->city_uid.'">'.$city->city_name_ar.'</option>';

			}
			return $cities;
		} else {
			return false;
		}
	} 
	
	function getCitiesByCountryID($country_uid = 187) {
		$this->db->order_by("city_name_ar", "asc"); 
		$q = $this->db->get_where('cities', array("country_uid" => $country_uid));
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getCityByID($city_uid) {
		$q = $this->db->get_where('cities', array("city_uid" => $city_uid));
		if($q->num_rows() > 0) {
            $row = $q->row();
            return $row->city_name_ar;
		}else{
			return false;	
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

	
	function getShowMainImageByID($album_uid){
		$this->db->order_by("album_uid","asc");
		$q =  $this->db->get_where('media', array('album_uid' => $album_uid),1);
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row->media_path; 
		}else{
			return false;	
		}
	}

	function getAlbumByID($album_uid){
		$q =  $this->db->get_where('media', array('album_uid' => $album_uid));
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row->media_path; 
			}
			return $data; 
		}else{
			return false;	
		}
	}

	function getCarBrandByID($cb_uid){
		$q =  $this->db->get_where('cars_brands', array('cb_uid' => $cb_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
		}else{
			return false;	
		}
	}

	function getMembershipNameByID($mc_uid){
		$q =  $this->db->get_where('memberships', array('mc_uid' => $mc_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row->mc_name; 
		}else{
			return false;	
		}
	}

	function getCityByUserID($member_uid){
		$q =  $this->db->get_where('members', array('member_uid' => $member_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			$city_uid = $row->city_uid; 
			$s =  $this->db->get_where('cities', array('city_uid' => $city_uid));
			if($s->num_rows() > 0) {
				$srow = $s->row();
				return $srow->city_name_ar;
			}else{
				return false;	
			}
		}else{
			return false;	
		}
	}

	function getCarByID($car_uid){
		//"12 june 2019 12:00:00";
		$this->db->where('car_uid', $car_uid);
		$q = $this->db->get('cars');
		if($q->num_rows() > 0) {
			$row = $q->row();
			$row->main_image = $this->getShowMainImageByID($row->album_uid);
			$row->cb_uid = $this->getCarBrandByID($row->cb_uid);
			
			return $row; 
		}else{
			return false;	
		}
	}
	
	function getPageByLink($page_link){
		$q =  $this->db->get_where('pages', array('page_link' => $page_link));
		if($q->num_rows() > 0) {
			$row = $q->row();
			$string_key = $row->page_code;
			$siteLang = $this->session->userdata('site_lang');
			$m = $this->db->query("SELECT * FROM strings WHERE string_code LIKE '".$string_key."' AND string_lang LIKE '".$siteLang."'");
			if($m->num_rows() > 0) {
				foreach($m->result() as $mrow) {
					$string_data[$mrow->string_key] = $mrow;
				}
				$row->page_title = $string_data[$row->page_title]->string_content;
				$row->page_text = $string_data[$row->page_text]->string_content;
				$row->page_meta_desc = $string_data[$row->page_meta_desc]->string_content;
				$row->page_meta_keywords = $string_data[$row->page_meta_keywords]->string_content;
			}
			return $row; 
		}else{
			return false;	
		}
	}
	
	function getFaq(){
		$siteLang = $this->session->userdata('site_lang');
		//echo $siteLang;exit;
		$q =  $this->db->get('faq_categories');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$row->faqs = $this->getFaqsByCatID($row->fc_uid);
				$string_key = $row->fc_code;
				$m = $this->db->query("SELECT * FROM strings WHERE string_code LIKE '".$string_key."' AND string_lang LIKE '".$siteLang."'");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$string_data[$mrow->string_key] = $mrow;
					}
					$row->fc_name = $string_data[$row->fc_name]->string_content;
					$row->fc_meta_desc = $string_data[$row->fc_meta_desc]->string_content;
					$row->fc_meta_keywords = $string_data[$row->fc_meta_keywords]->string_content;
				}
				$data[] = $row;
			}
			return $data;
		}else{
			return false;	
		}
	}
	
	function getFaqsByCatID($faq_category_uid){
		$siteLang = $this->session->userdata('site_lang');
		//echo $siteLang;exit;
		$q = $this->db->get_where('faq', array("faq_category_uid" => $faq_category_uid));
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$string_key = $row->faq_code;
				$m = $this->db->query("SELECT * FROM strings WHERE string_code LIKE '".$string_key."' AND string_lang LIKE '".$siteLang."'");
				if($m->num_rows() > 0) {
					foreach($m->result() as $mrow) {
						$string_data[$mrow->string_key] = $mrow;
					}
					$row->faq_question = $string_data[$row->faq_question]->string_content;
					$row->faq_answer = $string_data[$row->faq_answer]->string_content;
					$row->faq_meta_desc = $string_data[$row->faq_meta_desc]->string_content;
					$row->faq_meta_keywords = $string_data[$row->faq_meta_keywords]->string_content;
				}
				$data[] = $row;
			}
			return $data;
		}else{
			return false;	
		}
	}
	
    function loginOnBooking($username, $password) {		
		if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
			$this->db->where('member_email', $username);
		}else{
			$username = ltrim($username, '0');
			$this->db->where('member_mobile', $username);
		}
		$password = md5($password);
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
            return $row->member_uid;
        } else {
            return false;
        }
    }
	
	function registerOnLogin($member_fname, $member_lname, $member_email, $country_uid, $city_uid, $member_mobile, $member_password ){
		$country_code = $this->global_model->getCountryCodeByID($country_uid);
		$member_mobile = preg_replace("/^\+?{$country_code}/", "",$member_mobile);
		$member_mobile = ltrim($member_mobile, '0');
		$member_password = md5($member_password);
		$mc_uid = 3;
		$member_renewal_date = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));
			

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
			return $this->db->insert_id();
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
		

}

?>