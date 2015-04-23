<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index() {
		$data['pgTitle'] = 'Dashboard';
		$data['bodyclass'] = 'dashboard-page';
		$data['initialize'] = array('cmsScript', 'analyticsScript');
		$this->load->view('template/head', $data);
		$this->load->view('cms/analytics');
		$this->load->view('cms/logoandmenu');
		$this->load->view('cms/dashboard');
		$this->load->view('cms/analyticscall');
		$this->load->view('template/close');
	}
	
}