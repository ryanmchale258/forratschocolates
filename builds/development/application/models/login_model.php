<?php

class Login_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function verify($u,$p){
		//just filler login verification ------------------
		if($u != null && $p != null){
			$loginstate = $this->getAdminData($u, $p);
			return $loginstate;
		}else{
			return "missingvalues";
		}
		//-------------------------------------------------
	}

	public function getAdminData($u, $p){
		$this->db->where('admin_username', $u);
		$this->db->where('admin_password', $p);
		$userQuery = $this->db->get('tbl_admin');
		$userrow = $userQuery->row();

		if(!empty($userrow)){
			$userResult = $userQuery->row();
			$userArray = array(
						'username' => $u,
						'name' => $userResult->admin_firstname,
						'sId' => $userResult->admin_id,
						'logged_in' => TRUE
					);

			$this->session->set_userdata($userArray);
			return 1;
		}else{
			return 0;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
	}
}