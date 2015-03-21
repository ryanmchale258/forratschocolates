<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->helper('form');
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
	}	

	public function index() {
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['formstart'] = form_open('login/submit', array(
						'method' => 'POST',
						'id' => 'loginform'
		));
		$data['username'] = form_input(array(
			            'name' => 'username',
			            'type' => 'text',
			            'placeholder' => 'username'
        ));
        $data['password'] = form_input(array(
			            'name' => 'password',
			            'type' => 'password',
			            'placeholder' => 'password'
        ));
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');
		$this->load->view('cms/login');

		$this->load->view('template/close');
	}

	public function submit() {
		$this->load->library('encrypt');
		$this->load->model('update_model');
		$username = $_POST['username'];
		$encpass = $this->encrypt->sha1($_POST['password']);

		$query = $this->admin_model->validate($username, $encpass);

		if($query){
			$userResult = $this->admin_model->getAdminbyU($username);
			$session_data = array(
							'username' => $username,
							'name' => $userResult->admin_firstname,
							'sId' => $userResult->admin_id,
							'level' => $userResult->admin_level,
							'is_logged_in' => true
			);
			$this->session->set_userdata($session_data);
			if($userResult->admin_lastsession == null){
				redirect('login/first/' . $userResult->admin_id);
			}else{
				$this->update_model->admin_login($userResult->admin_id);
				redirect('dashboard');
			}
		}else{
			$data['sidenav'] = $this->navigation_model->getNav();

			$data['formstart'] = form_open('login/submit', array(
							'method' => 'POST',
							'id' => 'loginform'
			));
			$data['username'] = form_input(array(
				            'name' => 'username',
				            'type' => 'text',
				            'placeholder' => 'username'
	        ));
	        $data['password'] = form_input(array(
				            'name' => 'password',
				            'type' => 'password',
				            'placeholder' => 'password'
	        ));
			$data['errormsg'] = "Your username and/or password is incorrect.";
			$this->load->view('template/head', $data);
			$this->load->view('template/sidenav');
			$this->load->view('cms/login');

			$this->load->view('template/close');
		}
	}

	public function first($id){
		$data['formstart'] = form_open('login/update_record/first_login', array(
						'method' => 'POST',
						'id' => 'loginform'
		));
        $data['password'] = form_input(array(
			            'name' => 'password',
			            'type' => 'password',
			            'placeholder' => 'password'
        ));
        $data['passconf'] = form_input(array(
			            'name' => 'passconf',
			            'type' => 'password',
			            'placeholder' => 'password'
        ));
        $data['id'] = form_hidden('id', $id);
		$data['bodyclass'] = "home";
		$this->load->view('template/head', $data);
		$this->load->view('cms/header');
		$this->load->view('cms/changepass');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}

	public function update_record($function){
		$this->load->model('update_model');
		$this->load->library('encrypt');
		$id = $_POST['id'];
		if($this->form_validation->run() != FALSE){
			$newpass = $this->encrypt->sha1($_POST['password']);
			$this->update_model->$function($id, $newpass);
		}

		redirect('dashboard');
	}
	
}