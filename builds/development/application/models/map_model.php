<?php

class Map_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$mapdata = $this->db->get('tbl_locations');
		return $mapdata->result();
	}

}