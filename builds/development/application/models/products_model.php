<?php

class Products_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		//$this->db->where('pages_navlvl', $level);
		$categories = $this->db->get('tbl_categories');
		return $categories->result();
	}

}