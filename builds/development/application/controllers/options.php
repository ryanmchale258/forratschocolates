<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Options extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->helper('form');
		$this->load->helper('fileupload_helper');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Options Name', 'trim|required');
		$this->form_validation->set_rules('desc', 'Description', 'trim|required');
	}

	public function index(){
		$this->edit();
	}

	public function add($error = null) {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			if($error){
				$data['imgerror'] = $error;
			}else{
				$data['imgerror'] = '';
			}
			$data['pgTitle'] = 'Add Options';
			$data['bodyclass'] = 'addOptions-page';
			$data['initialize'] = 'cmsScript';
			$optionslist = $this->products_model->getAll();
			$data['formstart'] = form_open_multipart('options/insert_record/options');
			$data['name'] = form_input(array(
				            'name' => 'name',
				            'type' => 'text',
				            'placeholder' => 'Options Name',
				            'value' => set_value('name')
	        ));
			$data['imagesource'] = base_url() . 'images/uploads/default.png';
	        $data['img'] = form_input(array(
									'name' => 'userfile',
									'type' => 'file',
									'id' => 'imgInputOv',
									'onchange' => 'readURL(this)'
			));
			$catoptions = array();
	        foreach($optionslist as $row){
	        	$catoptions[$row->categories_id] = $row->categories_name;
	        }
	        $data['cat'] = form_dropdown('cat', $catoptions);
	        $data['desc'] = form_textarea(array(
				            'name' => 'desc',
				            'type' => 'text',
				            'placeholder' => 'Description',
				            'value' => set_value('desc')
	        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/optionsform');
			$this->load->view('cms/categoriesscript');
			$this->load->view('template/close');
		}else{
			if($error != null){
				$data['imgerror'] = $error;
			}else{
				$data['imgerror'] = '';
			}
			$data['pgTitle'] = 'Add Options';
			$data['bodyclass'] = 'addOptions-page';
			$data['initialize'] = 'cmsScript';
			$optionslist = $this->products_model->getAll();
			$data['formstart'] = form_open_multipart('options/insert_record/options');
			$data['name'] = form_input(array(
				            'name' => 'name',
				            'type' => 'text',
				            'placeholder' => 'Options Name',
				            'value' => set_value('name')
	        ));
			$data['imagesource'] = base_url() . 'images/uploads/default.png';
	        $data['img'] = form_input(array(
									'name' => 'userfile',
									'type' => 'file',
									'id' => 'imgInputOv',
									'onchange' => 'readURL(this)'
			));
			$catoptions = array();
	        foreach($optionslist as $row){
	        	$catoptions[$row->categories_id] = $row->categories_name;
	        }
	        $data['cat'] = form_dropdown('cat', $catoptions);
	        $data['desc'] = form_textarea(array(
				            'name' => 'desc',
				            'type' => 'text',
				            'placeholder' => 'Description',
				            'value' => set_value('desc')
	        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/optionsform');
			$this->load->view('cms/categoriesscript');
			$this->load->view('template/close');
		}
	}

	public function edit($record = null, $error = null) {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}
		
		if($record != null){
			if($this->form_validation->run() == FALSE){
				$productsdata = $this->products_model->getOptionsEdit($record);
					$id = $productsdata->products_id;
					$title = $productsdata->products_name;
					$cat = $productsdata->products_category;
					$imgpath = $productsdata->products_image;
					$desc = $productsdata->products_desc;
				if($error){
					$data['imgerror'] = $error;
				}else{
					$data['imgerror'] = '';
				}
				$data['pgTitle'] = 'Edit Options';
				$data['bodyclass'] = 'editOptions-page';
				$data['initialize'] = 'cmsScript';
				$optionslist = $this->products_model->getAll();
				$data['formstart'] = form_open_multipart('options/update_record/options/' . $id);
				$data['name'] = form_input(array(
					            'name' => 'name',
					            'type' => 'text',
					            'placeholder' => 'Options Name',
					            'value' => $title
		        ));
		        if((empty($imgpath) === FALSE) && (stristr($imgpath, 'default') === FALSE)){
					$data['imagesource'] = base_url() . 'images/uploads/products/' . $cat . '/' . $imgpath;
				}else{
					$data['imagesource'] = base_url() . 'images/uploads/default.png';
				}
				$data['img'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
				));
		        $catoptions = array();
		        foreach($optionslist as $row){
		        	$catoptions[$row->categories_id] = $row->categories_name;
		        }
		        $data['cat'] = form_dropdown('cat', $catoptions, $cat);
		        $data['desc'] = form_textarea(array(
					            'name' => 'desc',
					            'type' => 'text',
					            'placeholder' => 'Description',
					            'value' => $desc
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/optionsform');
				$this->load->view('cms/categoriesscript');
				$this->load->view('template/close');
			}else{
				if($error){
					$data['imgerror'] = $error;
				}else{
					$data['imgerror'] = '';
				}
				$data['pgTitle'] = 'Edit Page';
				$data['bodyclass'] = 'editpage-page';
				$data['initialize'] = 'cmsScript';
				$optionslist = $this->products_model->getAll();
				$data['formstart'] = form_open('options/update_record/options' . $id);
				$data['name'] = form_input(array(
					            'name' => 'name',
					            'type' => 'text',
					            'placeholder' => 'Options Name',
					            'value' => set_value('name')
		        ));
		        $data['imagesource'] = base_url() . 'images/uploads/default.png';
				$data['image'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
				));
				$catoptions = array();
		        foreach($optionslist as $row){
		        	$catoptions[$row->categories_id] = $row->categories_name;
		        }
		        $data['cat'] = form_dropdown('cat', $catoptions);
		        $data['desc'] = form_textarea(array(
					            'name' => 'desc',
					            'type' => 'text',
					            'placeholder' => 'Description',
					            'value' => set_value('desc')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/optionsform');
				$this->load->view('cms/categoriesscript');
				$this->load->view('template/close');
			}
		}else{
			$data['pgTitle'] = 'Edit Options';
			$data['bodyclass'] = 'editOptions-page';
			$data['initialize'] = 'cmsScript';
			$data['categories'] = $this->products_model->getEditList('tbl_categories');
			$data['items'] = $this->products_model->getEditList('tbl_products');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options/editlist');

			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
		
	}

	public function insert_record() {
		$this->load->model('insert_model');
		$file_name = rand(1,50000).'_product_image';
    	$filepath = './images/uploads/products/' . $_POST['cat'] . '/';
    	$origpath = $_FILES['userfile']['name'];
		$ext = pathinfo($origpath, PATHINFO_EXTENSION);
		$upload = upload_file($file_name, $filepath);
		if($this->form_validation->run() != FALSE){
			$data = array(
				'products_name' => $_POST['name'],
				'products_category' => $_POST['cat'],
				'products_desc' => $_POST['desc'],
				'products_image' => $file_name . '.' . $ext
			);
			if($upload['status'] != false){
				$this->insert_model->options($data);
				redirect(base_url() . index_page() . 'options/add');
			}else{
				$this->add($upload['message']);
			}
		}else{
			$this->add();
			//redirect('options/add');
		}
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			if(!empty($_FILES['userfile']['name'])){
				$file_name = rand(1,50000).'_product_image';
		    	$filepath = './images/uploads/products/' . $_POST['cat'] . '/';
		    	$origpath = $_FILES['userfile']['name'];
				$ext = pathinfo($origpath, PATHINFO_EXTENSION);
				$upload = upload_file($file_name, $filepath);
				$data = array(
					'products_name' => $_POST['name'],
					'products_category' => $_POST['cat'],
					'products_desc' => $_POST['desc'],
					'products_image' => $file_name . '.' . $ext
				);
				if($upload['status'] != false){
					$this->update_model->options($record, $data);
					redirect(base_url() . index_page() . 'options/edit');
				}else{
					$this->edit($record, $upload['message']);
				}
			}else{
				$data = array(
					'products_name' => $_POST['name'],
					'products_category' => $_POST['cat'],
					'products_desc' => $_POST['desc']
				);
			}
			$this->update_model->options($record, $data);
			redirect(base_url() . index_page() . 'options/edit/' . $record);
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect(base_url() . index_page() . 'options');
	}

}