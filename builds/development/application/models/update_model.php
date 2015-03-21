<?php

class Update_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function pages() {
		if($_POST['parent'] != NULL){
			$level = 2;
		}else{
			$level = 0;
		}
		$record = array(
					'pages_slug' => $_POST['slug'],
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

}