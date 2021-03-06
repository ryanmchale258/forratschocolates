<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('pages_model');
		$this->load->model('slider_model');
	}

	public function index(){
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$data['pages'] = $this->pages_model->getAllPages();
		$data['slides'] = $this->slider_model->getAll();
		$data['pgTitle'] = "Home";
		$data['bodyclass'] = 'home-page';
		$data['initialize'] = array('homeScript', 'navScript');
		
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');

		$this->load->view('home/content');
		$this->load->view('template/close');
	}

}
