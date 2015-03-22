<?php

class Locations extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('map_model');
	}

	public function index(){
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$data['maps'] = $this->map_model->getAll();

		$data['pgTitle'] = "Locations";
		$data['bodyclass'] = 'locations-page';
		$data['initialize'] = "locationsScript";
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');

		$this->load->view('locations/content');
		$this->load->view('locations/styletag');
		$this->load->view('template/close');
	}

	public function mapdata(){
		$mapdata = $this->map_model->getAll();
		echo json_encode($mapdata);
	}

}
