<?php

class Update_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function pages() {
		if($_POST['parent'] != NULL){
			if($_POST['parent'] == 'toplevel'){
				$level = 1;
			}else{
				$level = 2;
			}
		}else{
			$level = 0;
		}
		if(!empty($_POST['slug'])){
			$pageslug = $_POST['slug'];
		}else{
			$pageslug = strtolower(preg_replace("/[^a-zA-Z]+/", "", $_POST['pagename']));
		}
		$record = array(
					'pages_slug' => $_POST['slug'],
					'pages_icon' => '&#x' . str_replace('%u', '', $_POST['icontext']) . ';',
					'pages_title' => $_POST['pagename'],
					'pages_meta' => $_POST['metadesc'],
					'pages_content' => $_POST['content'],
					'pages_navlvl' => $level,
					'pages_navprnt' => $_POST['parent'],
					'pages_weight' => $_POST['weight']
				);

		$this->db->where('pages_id', $_POST['id']);
		$this->db->update('tbl_pages', $record);
	}

	public function admin_login($userId){
		$this->db->where('admin_id', $userId);
		$this->db->update('tbl_admin', array('admin_lastsession' => $this->session->userdata('session_id'))); 
	}

	public function first_login($userId, $newpass){
		$this->db->where('admin_id', $userId);
		$this->db->update('tbl_admin', array('admin_password' => $newpass, 'admin_lastsession' => $this->session->userdata('session_id')));
	}

	public function addlocations() {
		$record = array(
					'locations_title' => $_POST['locationname'],
					'locations_telephone' => $_POST['telephone'],
					'locations_streetaddress' => $_POST['streetaddress'],
					'locations_city' => $_POST['city'],
					'locations_prov' => $_POST['prov'],
					'locations_postal' => $_POST['postal'],
					'locations_lat' => $_POST['lat'],
					'locations_long' => $_POST['long']
				);
		$this->db->where('locations_id', $_POST['id']);
		$this->db->update('tbl_locations', $record);
	}

	public function slides($record, $data) {
		$this->db->where('slide_id', $record);
		$this->db->update('tbl_slide', $data);
	}

	public function inventory($record, $data) {
		$this->db->where('categories_id', $record);
		$this->db->update('tbl_categories', $data);
	}

	public function options($record, $data) {
		$this->db->where('products_id', $record);
		$this->db->update('tbl_products', $data);
	}

}