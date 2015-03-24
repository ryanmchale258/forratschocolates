<?php

class Products_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getSingle($slug){
		$cat = $this->db->get_where('tbl_categories', array('categories_slug' => $slug));
		return $cat;
	}

	public function getAll(){
		//$this->db->where('pages_navlvl', $level);
		$categories = $this->db->get('tbl_categories');
		return $categories->result();
	}

	public function getOptions($cat){
		//$this->db->where('pages_navlvl', $level);
		$products = $this->db->get_where('tbl_products', array('products_category' => $cat));
		return $products->result();
	}

	public function getToEdit($record){
		$page = $this->db->get_where('tbl_categories', array('categories_id' => $record));
		return $page->row();
	}

	public function getEditList($tbl){
		$items = $this->db->get($tbl);
		return $items->result();
	}

}