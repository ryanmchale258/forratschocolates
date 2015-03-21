<?php

class Pages_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getPage($slug){
		$page = $this->db->get_where('tbl_pages', array('pages_slug' => $slug));
		return $page;
	}

	public function getAllPages($level){
		$this->db->where('pages_navlvl', $level);
		$pages = $this->db->get('tbl_pages', 999999, 1);
		return $pages->result();
	}

	public function getToEdit($record){
		$page = $this->db->get_where('tbl_pages', array('pages_id' => $record));
		return $page->row();
	}

	public function getEditList($tbl){
		$this->db->where('pages_hascontroller', 0);
		$this->db->where("pages_navlvl = 2 OR pages_navlvl = 0");
		$items = $this->db->get($tbl);
		return $items->result();
	}

}