<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addlocations extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('map_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('locationname', 'Locations Name', 'trim|required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
		$this->form_validation->set_rules('streetaddress', 'Street Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('prov', 'Province', 'trim|required');
		$this->form_validation->set_rules('postal', 'Postal Code', 'trim|required');
	}

	public function index(){
		$this->edit();
	}

	public function add() {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['pgTitle'] = 'Add Location';
			$data['bodyclass'] = 'addlocation-page';
			$data['initialize'] = 'cmsScript';
			$data['formstart'] = form_open('addlocations/insert_record/addlocations');
			$data['locationname'] = form_input(array(
					            'name' => 'locationname',
					            'type' => 'text',
					            'placeholder' => 'Location Name',
					            'value' => set_value('locationname')
		        ));
		        $data['telephone'] = form_input(array(
					            'name' => 'telephone',
					            'type' => 'text',
					            'placeholder' => '000-000-0000',
					            'value' => set_value('telephone')
		        ));
		        $data['streetaddress'] = form_input(array(
					            'name' => 'streetaddress',
					            'type' => 'text',
					            'placeholder' => '555 Road Avenue',
					            'value' => set_value('streetaddress')
		        ));
		        $data['city'] = form_input(array(
					            'name' => 'city',
					            'type' => 'text',
					            'placeholder' => 'City',
					            'value' => set_value('city')
		        ));
		        $data['prov'] = form_input(array(
					            'name' => 'prov',
					            'type' => 'text',
					            'placeholder' => 'ON',
					            'value' => set_value('prov')
		        ));
		        $data['postal'] = form_input(array(
					            'name' => 'postal',
					            'type' => 'text',
					            'placeholder' => 'A1A 1A1',
					            'value' => set_value('postal')
		        ));
		        $data['lat'] = form_input(array(
					            'name' => 'lat',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => set_value('lat')
		        ));
		        $data['long'] = form_input(array(
					            'name' => 'long',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => set_value('long')
		        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/locationsform');

			$this->load->view('template/close');
		}else{
			$data['pgTitle'] = 'Add Location';
			$data['bodyclass'] = 'addlocation-page';
			$data['initialize'] = 'cmsScript';
			$data['success'] = true;
			$data['items'] = $this->map_model->getEditList('tbl_locations');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/locations/editlist');

			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
	}

	public function edit($record = null) {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}
		
		if($record != null){
			if($this->form_validation->run() == FALSE){
				$locationdata = $this->map_model->getToEdit($record);
					$id = $locationdata->locations_id;
					$title = $locationdata->locations_title;
					$telephone = $locationdata->locations_telephone;
					$streetaddress = $locationdata->locations_streetaddress;
					$city = $locationdata->locations_city;
					$prov = $locationdata->locations_prov;
					$postal = $locationdata->locations_postal;
					$lat = $locationdata->locations_lat;
					$long = $locationdata->locations_long;
				$data['pgTitle'] = 'Edit Location';
				$data['bodyclass'] = 'editlocation-page';
				$data['initialize'] = 'cmsScript';
				$data['formstart'] = form_open('addlocations/update_record/addlocations/' . $id);
				$data['locationname'] = form_input(array(
					            'name' => 'locationname',
					            'type' => 'text',
					            'placeholder' => 'Location Name',
					            'value' => $title
		        ));
		        $data['telephone'] = form_input(array(
					            'name' => 'telephone',
					            'type' => 'text',
					            'placeholder' => '000-000-0000',
					            'value' => $telephone
		        ));
		        $data['streetaddress'] = form_input(array(
					            'name' => 'streetaddress',
					            'type' => 'text',
					            'placeholder' => '555 Road Avenue',
					            'value' => $streetaddress
		        ));
		        $data['city'] = form_input(array(
					            'name' => 'city',
					            'type' => 'text',
					            'placeholder' => 'City',
					            'value' => $city
		        ));
		        $data['prov'] = form_input(array(
					            'name' => 'prov',
					            'type' => 'text',
					            'placeholder' => 'ON',
					            'value' => $prov
		        ));
		        $data['postal'] = form_input(array(
					            'name' => 'postal',
					            'type' => 'text',
					            'placeholder' => 'A1A 1A1',
					            'value' => $postal
		        ));
		        $data['lat'] = form_input(array(
					            'name' => 'lat',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => $lat
		        ));
		        $data['long'] = form_input(array(
					            'name' => 'long',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => $long
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/locationsform');

				$this->load->view('template/close');
			}else{
				$data['pgTitle'] = 'Edit Location';
				$data['bodyclass'] = 'editlocation-page';
				$data['initialize'] = 'cmsScript';
				$data['formstart'] = form_open('addlocations/update_record/addlocations' . $id);
				$data['locationname'] = form_input(array(
					            'name' => 'locationname',
					            'type' => 'text',
					            'placeholder' => 'Location Name',
					            'value' => set_value('locationname')
		        ));
		        $data['telephone'] = form_input(array(
					            'name' => 'telephone',
					            'type' => 'text',
					            'placeholder' => '000-000-0000',
					            'value' => set_value('telephone')
		        ));
		        $data['streetaddress'] = form_input(array(
					            'name' => 'streetaddress',
					            'type' => 'text',
					            'placeholder' => '555 Road Avenue',
					            'value' => set_value('streetaddress')
		        ));
		        $data['city'] = form_input(array(
					            'name' => 'city',
					            'type' => 'text',
					            'placeholder' => 'City',
					            'value' => set_value('city')
		        ));
		        $data['prov'] = form_input(array(
					            'name' => 'prov',
					            'type' => 'text',
					            'placeholder' => 'ON',
					            'value' => set_value('prov')
		        ));
		        $data['postal'] = form_input(array(
					            'name' => 'postal',
					            'type' => 'text',
					            'placeholder' => 'A1A 1A1',
					            'value' => set_value('postal')
		        ));
		        $data['lat'] = form_input(array(
					            'name' => 'lat',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => set_value('lat')
		        ));
		        $data['long'] = form_input(array(
					            'name' => 'long',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => set_value('long')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/locationsform');

				$this->load->view('template/close');
			}
		}else{
			$data['pgTitle'] = 'Edit Location';
			$data['bodyclass'] = 'editlocation-page';
			$data['items'] = $this->map_model->getEditList('tbl_locations');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/locations/editlist');

			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
		
	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		if($this->form_validation->run() != FALSE){
			$this->insert_model->$function();
		}
		
		//$this->add();
		redirect(base_url() . index_page() . 'addlocations/add');
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect(base_url() . index_page() . 'addlocations');
		}else{
			//$this->edit($record);
			redirect(base_url() . index_page() . 'addlocations/' . $record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect(base_url() . index_page() . 'addlocations');
	}

}