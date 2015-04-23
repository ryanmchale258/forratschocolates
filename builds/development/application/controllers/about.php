<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
	}

	public function index(){
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$data['pgTitle'] = "About";
		$data['initialize'] = 'navScript';
		$data['bodyclass'] = 'about-page';
		
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');

		$this->load->view('about/content');
		$this->load->view('template/close');
	}

}
