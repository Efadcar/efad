<?php

class Invoices_model extends CI_Model {
	
	function getAll() {
		$this->db->order_by("invoice_uid", "desc"); 
		$q = $this->db->get_where('invoices',array("invoice_status" => 1));
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				switch($row->invoice_status){
					case 0:
						$row->invoice_status = '<span class="label label-warning"> غير مدفوع </span>';
						break;
					case 1:
						$row->invoice_status = '<span class="label label-success"> تم الدفع </span>';
						break;
					case 2:
						$row->invoice_status = '<span class="label label-primary"> بانتظار التأكيد </span>';
						break;
					case 3:
						$row->invoice_status = '<span class="label label-danger"> أسترجاع </span>';
						break;
				}

				switch($row->invoice_payment_method){
					case "visa":
						$row->invoice_payment_method = '<span class=\'label label-primary\'>أونلاين</span>';
						break;
					case "transfer":
						$row->invoice_payment_method = '<span class=\'label label-primary\'>تحويل بنكي</span>';
						break;
					case "cash":
						$row->invoice_payment_method = '<span class=\'label label-primary\'>كاش</span>';
						break;
				}
				
				$m = $this->db->get_where('members',array("member_uid" => $row->member_uid));
				$member_obj = $m->row();
				$i = $this->db->get_where('bookings',array("book_uid" => $row->related_uid));
				foreach($i->result() as $irow) {
					$booking_obj = $irow;
					$row->booking_obj = $booking_obj;

				}
				$row->member_obj = $member_obj;
				$row->booking_obj->car_obj = json_decode($row->car_obj);
				$row->booking_obj->delivery_city_uid = $this->getCityByID($row->booking_obj->delivery_city_uid);
				switch($row->booking_obj->book_status){
					case 0:
						$row->booking_obj->book_status = '<span class="label label-warning"> غير نشط </span>';
						break;
					case 1:
						$row->booking_obj->book_status = '<span class="label label-success"> نشط </span>';
						break;
					case 2:
						$row->booking_obj->book_status = '<span class="label label-primary"> بانتظار التأكيد </span>';
						break;
					case 3:
						$row->booking_obj->book_status = '<span class="label label-danger">  تم إلغاء الحجز  </span>';
						break;
				}
				
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getAllLanguages() {
		$q = $this->db->get('languages');
		if($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}
			return $data; 
		}else{
			return false;	
		}
	}
	
	function getAllCities() {
		$q = $this->db->get_where('cities', array("country_uid" => 187));
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
	
	function getByID($book_uid) {
		$q =  $this->db->get_where('bookings', array('book_uid' => $book_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			$m = $this->db->get_where('members',array("member_uid" => $row->member_uid));
			$member_obj = $m->row();
			$row->member_obj = $member_obj;
			$i = $this->db->get_where('invoices',array("related_uid" => $row->book_uid));
			foreach($i->result() as $irow) {
				switch($irow->invoice_status){
					case 0:
						$irow->invoice_status = '<span class="label label-warning"> غير مدفوع </span>';
						break;
					case 1:
						$irow->invoice_status = '<span class="label label-success"> تم الدفع </span>';
						break;
					case 2:
						$irow->invoice_status = '<span class="label label-primary"> بانتظار التأكيد </span>';
						break;
					case 3:
						$irow->invoice_status = '<span class="label label-danger"> أسترجاع </span>';
						break;
				}

				switch($irow->invoice_payment_method){
					case "visa":
						$irow->invoice_payment_method = '<span class="label label-primary"> أونلاين </span>';
						break;
					case "transfer":
						$irow->invoice_payment_method = '<span class="label label-primary"> تحويل بنكي </span>';
						break;
					case "cash":
						$irow->invoice_payment_method = '<span class="label label-primary"> كاش </span>';
						break;
				}
				$invoice_obj = $irow;
				$row->invoice_obj[] = $invoice_obj;

			}

			$row->car_obj = json_decode($row->car_obj);
			$row->delivery_city_uid = $this->getCityByID($row->delivery_city_uid);
			switch($row->book_status){
				case 0:
					$row->book_status = '<span class="label label-warning"> غير نشط </span>';
					break;
				case 1:
					$row->book_status = '<span class="label label-success"> نشط </span>';
					break;
				case 2:
					$row->book_status = '<span class="label label-primary"> بانتظار التأكيد </span>';
					break;
				case 3:
					$row->book_status = '<span class="label label-danger"> ملغي </span>';
					break;
			}
			
			return $row; 
		}else{
			return false;	
		}
	}

	function getByIDForEdit($book_uid) {
		$q =  $this->db->get_where('bookings', array('book_uid' => $book_uid));
		if($q->num_rows() > 0) {
			$row = $q->row();
			$i = $this->db->get_where('invoices',array("related_uid" => $row->book_uid));
			foreach($i->result() as $irow) {
				$invoice_obj = $irow;
				$row->invoice_obj[] = $invoice_obj;

			}
			$row->car_obj = json_decode($row->car_obj);
			$row->delivery_city_uid = $this->getCityByID($row->delivery_city_uid);
			//var_dump($row);exit;
			return $row; 
		}else{
			return false;	
		}
	}

	function edit($id){
		$row = $this->getByID($id);
		$delivery_city_uid = $this->input->post('delivery_city_uid');
		$book_status = $this->input->post('book_status');
		$invoice_status = $this->input->post('invoice_status');
		$invoice_uid = $this->input->post('invoice_uid');
		
		$data = array(
		   'delivery_city_uid' => $delivery_city_uid,
		   'book_status' => $book_status
		);
		
		$this->db->where('book_uid', $row->book_uid);
		$this->db->update('bookings', $data);
			
		$invoices = $this->getAllInvoices();
		if($invoices != false)
		foreach($invoices as $invoice){

			if(isset($_POST['fc_name_'.$invoice->invoice_uid])){
				$data = array(
				   'invoice_status' => $invoice_status
				);
				$this->db->where('invoice_uid', $invoice_uid);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['fc_meta_desc_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('fc_meta_desc_'.$language->lang_name)
				);
				$this->db->where('string_key', $fc_meta_desc);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

			if(isset($_POST['fc_meta_keywords_'.$language->lang_name])){
				$data = array(
				   'string_content' => $this->input->post('fc_meta_keywords_'.$language->lang_name)
				);
				$this->db->where('string_key', $fc_meta_keywords);
				$this->db->where('string_lang', $language->lang_name);
				$this->db->update('strings', $data);
			}

		}


		$this->messages->add("تم تعديل القسم بنجاح", "success");


	}



}


?>