<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('desc', 'Short Description', 'trim|required');
		$this->form_validation->set_rules('longdesc', 'Long Description', 'trim|required');
	}

	public function index(){
		$this->edit();
	}

	public function add() {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['pgTitle'] = 'Add Inventory Category';
			$data['bodyclass'] = 'addcategory-page';
			$data['initialize'] = 'cmsScript';
			$data['formstart'] = form_open_multipart('inventory/insert_record/inventory');
			$data['name'] = form_input(array(
				            'name' => 'name',
				            'type' => 'text',
				            'placeholder' => 'Category Name',
				            'value' => set_value('name')
	        ));
			$data['imagesource'] = base_url() . 'images/uploads/default.png';
	        $data['img'] = form_input(array(
									'name' => 'userfile',
									'type' => 'file',
									'id' => 'imgInputOv',
									'onchange' => 'readURL(this)'
			));
	        $data['desc'] = form_input(array(
				            'name' => 'desc',
				            'type' => 'text',
				            'placeholder' => 'Short Description',
				            'value' => set_value('desc')
	        ));
	        $data['longdesc'] = form_textarea(array(
				            'name' => 'longdesc',
				            'type' => 'text',
				            'placeholder' => 'Longer description',
				            'value' => set_value('longdesc')
	        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/categoriesform');
			$this->load->view('cms/categoriesscript');
			$this->load->view('template/close');
		}else{
			$data['pgTitle'] = 'Add Inventory Category';
			$data['bodyclass'] = 'addcategory-page';
			$data['initialize'] = 'cmsScript';
			$data['success'] = true;
			$data['items'] = $this->products_model->getEditList('tbl_categories');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/products/editlist');

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
				$categorydata = $this->products_model->getToEdit($record);
					$id = $categorydata->categories_id;
					$title = $categorydata->categories_name;
					$imgpath = $categorydata->categories_img;
					$desc = $categorydata->categories_desc;
					$longdesc = $categorydata->categories_longdesc;
				$data['pgTitle'] = 'Edit Inventory Category';
				$data['bodyclass'] = 'editcategory-page';
				$data['initialize'] = 'cmsScript';
				
				$data['formstart'] = form_open_multipart('inventory/update_record/inventory/' . $id);
				$data['name'] = form_input(array(
					            'name' => 'name',
					            'type' => 'text',
					            'placeholder' => 'Category Name',
					            'value' => $title
		        ));
		        if((empty($imgpath) === FALSE) && (stristr($imgpath, 'default') === FALSE)){
					$data['imagesource'] = base_url() . 'images/uploads/' . $imgpath;
				}else{
					$data['imagesource'] = base_url() . 'images/uploads/default.png';
				}
				$data['img'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
				));
		        $data['desc'] = form_input(array(
					            'name' => 'desc',
					            'type' => 'text',
					            'placeholder' => 'Short Description',
					            'value' => $desc
		        ));
		        $data['longdesc'] = form_textarea(array(
					            'name' => 'longdesc',
					            'type' => 'text',
					            'placeholder' => 'Longer description',
					            'value' => $longdesc
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/categoriesform');
				$this->load->view('cms/categoriesscript');
				$this->load->view('template/close');
			}else{
				$data['pgTitle'] = 'Edit Page';
				$data['bodyclass'] = 'editpage-page';
				$data['initialize'] = 'cmsScript';

				$data['formstart'] = form_open('inventory/update_record/inventory' . $id);
				$data['name'] = form_input(array(
					            'name' => 'name',
					            'type' => 'text',
					            'placeholder' => 'Category Name',
					            'value' => set_value('name')
		        ));
		        $data['imagesource'] = base_url() . 'images/uploads/default.png';
				$data['image'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
				));
		        $data['desc'] = form_input(array(
					            'name' => 'desc',
					            'type' => 'text',
					            'placeholder' => 'Short Description',
					            'value' => set_value('desc')
		        ));
		        $data['longdesc'] = form_textarea(array(
					            'name' => 'longdesc',
					            'type' => 'text',
					            'placeholder' => 'Longer description',
					            'value' => set_value('longdesc')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/categoriesform');
				$this->load->view('cms/categoriesscript');
				$this->load->view('template/close');
			}
		}else{
			$data['pgTitle'] = 'Edit Inventory Category';
			$data['bodyclass'] = 'editcategory-page';
			$data['items'] = $this->products_model->getEditList('tbl_categories');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/products/editlist');

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
		redirect(base_url() . index_page() . 'inventory/add');
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect(base_url() . index_page() . 'inventory');
		}else{
			//$this->edit($record);
			redirect(base_url() . index_page() . 'inventory/' . $record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect(base_url() . index_page() . 'inventory');
	}

}