<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data['pgTitle'] = "Home";
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');

		$this->load->view('home/content');
		$this->load->view('template/close');
	}

}
