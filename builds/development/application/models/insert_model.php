<?php

class Insert_model extends CI_Model {

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
		$date = date('j-m-y');
		$record = array(
					'pages_slug' => $pageslug,
					'pages_icon' => '&#x' . str_replace('%u', '', $_POST['icontext']) . ';',
					'pages_title' => $_POST['pagename'],
					'pages_meta' => $_POST['metadesc'],
					'pages_content' => $_POST['content'],
					'pages_navlvl' => $level,
					'pages_navprnt' => $_POST['parent'],
					'pages_weight' => $_POST['weight'],
					'pages_createdby' => $this->session->userdata('name'),
					'pages_createddate' => $date
				);

		$this->db->insert('tbl_pages', $record);
	}

	public function admin($encpass) {
		$record = array(
					'admin_firstname' => $_POST['fname'],
					'admin_lastname' => $_POST['lname'],
					'admin_username' => $_POST['username'],
					'admin_password' => $encpass,
					'admin_email' => $_POST['email'],
					'admin_level' => $_POST['level']
				);

		$this->db->insert('tbl_admin', $record);
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

		$this->db->insert('tbl_locations', $record);
	}

	public function slides($data) {
		$this->db->insert('tbl_slide', $data);
	}

	public function inventory($data) {
		$this->db->insert('tbl_categories', $data);
	}

	public function options($data) {
		$this->db->insert('tbl_products', $data);
	}

}