<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chocolate extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('products_model');
	}

	public function index(){
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$data['categories'] = $this->products_model->getAll();
		$data['pgTitle'] = "Home";
		$data['bodyclass'] = 'chocolate-page';
		$data['initialize'] = "homeScript();";
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');

		$this->load->view('chocolate/content');
		$this->load->view('template/close');
	}

}
