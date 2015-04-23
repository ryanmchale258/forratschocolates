<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('navigation_model');
		$this->load->helper('form');
//		$this->load->library('form_validation');
//		$this->form_validation->set_rules('pagename', 'Page Title', 'trim|required');
//		$this->form_validation->set_rules('slug', 'Slug', 'trim');
//		$this->form_validation->set_rules('metadesc', 'Meta Description', 'trim|required');
//		$this->form_validation->set_rules('content', 'Page Content', 'trim|required');
	}

	public function index(){
		redirect(base_url() . index_page() . 'chocolate');
	}

	public function display_product($slug) {	
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$data['pgdata'] = $this->products_model->getSingle($slug)->row();
		$data['options'] = $this->products_model->getOptions($data['pgdata']->categories_id);
		$data['pgTitle'] = $data['pgdata']->categories_name;
		$data['initialize'] = array('navScript', 'productsScript');
		$data['bodyclass'] = 'product-page';
		
		$data['bodyclass'] = 'storepage';
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');
		$this->load->view('chocolate/details');

		$this->load->view('template/close');
	}

}