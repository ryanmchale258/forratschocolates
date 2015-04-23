<?php

class Delete_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function pages($record) {
		$this->db->delete('tbl_pages', array('pages_id' => $record));
	}

	public function inventory($record) {
		$this->db->delete('tbl_categories', array('categories_id' => $record));
	}

	public function options($record) {
		$this->db->delete('tbl_products', array('products_id' => $record));
	}


	public function addlocations($record) {
		$this->db->delete('tbl_locations', array('locations_id' => $record));
	}

	public function slides($record) {
		$this->db->delete('tbl_slide', array('slide_id' => $record));
	}

}