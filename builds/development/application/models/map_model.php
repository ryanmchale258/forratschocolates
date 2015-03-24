<?php

class Map_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$mapdata = $this->db->get('tbl_locations');
		return $mapdata->result();
	}

	public function getToEdit($record){
		$page = $this->db->get_where('tbl_locations', array('locations_id' => $record));
		return $page->row();
	}

	public function getEditList($tbl){
		$items = $this->db->get($tbl);
		return $items->result();
	}

}