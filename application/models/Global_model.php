<?php

class Global_model extends CI_Model {

		
    function run_curl($link) {
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $server_output = curl_exec($ch);
        curl_close($ch);
        return json_decode($server_output);

    }
	
	function calculate(){
		
		$book_end_date = $this->input->post('book_end_date');
		$book_start_date = $this->input->post('book_start_date');
		$car_uid = $this->input->post('car_uid');
		$mc_uid = $this->input->post('mc_uid');
		
		// Get booking days
		$days = $this->dateDifference($book_start_date, $book_end_date);
		
		// Get car object
		$car_obj = $this->getCarByID($car_uid);
		// Get Membership object
		if($mc_uid != ""){
			$membership_obj = $this->getMembershipByID($mc_uid);
		}else{
			$membership_obj = $this->getMembershipByID(1);
		}
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
		
		// Check if there is 1 day free depend on membership and days
		switch($membership_obj->mc_uid){
			case ($membership_obj->mc_uid == 1 && $days >= 21):
				$free_day = 1;
				break;
			case ($membership_obj->mc_uid == 2 && $days >= 14):
				$free_day = 1;
				break;
			case ($membership_obj->mc_uid == 3 && $days >= 7):
				$free_day = 1;
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
		return array(
			"status" => 1, 
			"days" => $days, 
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

	function getCarBrandByID($cb_uid){
		$q =  $this->db->get_where('cars_brands', array('cb_uid' => $cb_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			return $row; 
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
	
	
}

?>