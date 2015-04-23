<?php

class Slider_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getToEdit($record){
		$slide = $this->db->get_where('tbl_slide', array('slide_id' => $record));
		return $slide->row();
	}

	public function getAll(){
		//$this->db->where('pages_navlvl', $level);
		$slides = $this->db->get('tbl_slide');
		return $slides->result();
	}

}