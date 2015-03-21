<?php

class Admin_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function validate($username, $encpass){
		$this->db->where('admin_username', $username);
		$this->db->where('admin_password', $encpass);
		$query = $this->db->get('tbl_admin');

		// if($query->num_rows() == 1){
		// 	return true;
		// }
		return $query->row();
	}

	public function getAdminbyU($username){
		$user = $this->db->get_where('tbl_admin', array('admin_username' => $username));
		return $user->row();
	}

	public function getAdmin($record){
		$user = $this->db->get_where('tbl_admin', array('admin_id' => $record));
		return $user->row();
	}

	public function getAdmins(){
		$users = $this->db->get('tbl_admin');
		return $users->result();
	}

	public function check_if_username_exists($username){
		$this->db->where('admin_username', $username);
		$result = $this->db->get('tbl_admin');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function check_if_email_exists($email){
		$this->db->where('admin_email', $email);
		$result = $this->db->get('tbl_admin');

		if($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

}