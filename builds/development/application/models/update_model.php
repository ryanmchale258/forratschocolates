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

	public function inventory() {
		$record = array(
					'categories_name' => $_POST['name'],
					'categories_slug' => $_POST['name'],
					'categories_desc' => $_POST['desc'],
					'categories_longdesc' => $_POST['longdesc']
				);

		$this->db->insert('tbl_categories', $record);
		$this->db->trans_complete();
    	$query = $this->db->query('SELECT LAST_INSERT_ID()');
    	$row = $query->row_array();
    	$prev_id = $row['LAST_INSERT_ID()'];

    	$file_name = rand(1,50000).'_category_image';
        $config['file_name'] = $file_name . '.jpg';
		$config['upload_path'] = base_url() . 'images/uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$imagedata = $this->upload->data();

		$secondary = array(
			'categories_img' => $imagedata['file_name']
		);

		$this->db->where('categories_id', $prev_id);
		$this->db->update('tbl_categories', $secondary);
		$this->db->trans_complete();

		if(!empty($_FILES['userfile']['name'])){
			$file_name = rand(1,50000).'_category_image';
       		$config['file_name'] = $file_name;
			$config['upload_path'] = '../uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['overwrite'] = true;
			//$config['max_size']	= '100';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';

			$this->load->library('upload', $config);
			$this->upload->do_upload();
			$imagedata = $this->upload->data();

			$secondary = array(
					'categories_img' => $imagedata['file_name']
				);

			$this->db->where('categories_id', $_POST['id']);
			$this->db->update('tbl_categories', $secondary);
		}
	}

}