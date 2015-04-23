<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->helper('form');
		$this->load->helper('fileupload_helper');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Slide Title', 'trim|required');
		$this->form_validation->set_rules('text', 'Slide Text', 'trim|required');
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
			$data['pgTitle'] = 'Add Front Page Slide';
			$data['bodyclass'] = 'addslide-page';
			$data['initialize'] = 'cmsScript';
			$data['formstart'] = form_open_multipart('slides/insert_record/slides');
			$data['title'] = form_input(array(
				            'name' => 'title',
				            'type' => 'text',
				            'placeholder' => 'Slide Title',
				            'value' => set_value('title')
	        ));
			$data['imagesource'] = base_url() . 'images/uploads/default.png';
	        $data['img'] = form_input(array(
									'name' => 'userfile',
									'type' => 'file',
									'id' => 'imgInputOv',
									'onchange' => 'readURL(this)'
			));
	        $data['text'] = form_textarea(array(
				            'name' => 'text',
				            'placeholder' => 'Slide Text',
				            'value' => set_value('text')
	        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/sliderform');
			$this->load->view('cms/categoriesscript');
			$this->load->view('template/close');
		}else{
			if($error){
				$data['imgerror'] = $error;
			}else{
				$data['imgerror'] = '';
			}
			$data['pgTitle'] = 'Add Front Page Slide';
			$data['bodyclass'] = 'addslide-page';
			$data['initialize'] = 'cmsScript';
			$data['formstart'] = form_open_multipart('slides/insert_record/slides');
			$data['title'] = form_input(array(
				            'name' => 'title',
				            'type' => 'text',
				            'placeholder' => 'Slide Title',
				            'value' => set_value('title')
	        ));
			$data['imagesource'] = base_url() . 'images/uploads/default.png';
	        $data['img'] = form_input(array(
									'name' => 'userfile',
									'type' => 'file',
									'id' => 'imgInputOv',
									'onchange' => 'readURL(this)'
			));
	        $data['text'] = form_textarea(array(
				            'name' => 'text',
				            'placeholder' => 'Slide Text',
				            'value' => set_value('text')
	        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/sliderform');
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
				if($error){
					$data['imgerror'] = $error;
				}else{
					$data['imgerror'] = '';
				}
				$slidedata = $this->slider_model->getToEdit($record);
					$id = $slidedata->slide_id;
					$title = $slidedata->slide_title;
					$imgpath = $slidedata->slide_img;
					$text = $slidedata->slide_text;
				$data['pgTitle'] = 'Edit Front Page Slide';
				$data['bodyclass'] = 'editslide-page';
				$data['initialize'] = 'cmsScript';
				
				$data['formstart'] = form_open_multipart('slides/update_record/slides/' . $id);
				$data['title'] = form_input(array(
					            'name' => 'title',
					            'type' => 'text',
					            'placeholder' => 'Slide Title',
					            'value' => $title
		        ));
		        if((empty($imgpath) === FALSE) && (stristr($imgpath, 'default') === FALSE)){
					$data['imagesource'] = base_url() . 'images/uploads/slider/' . $imgpath;
				}else{
					$data['imagesource'] = base_url() . 'images/uploads/default.png';
				}
				$data['img'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
				));
		        $data['text'] = form_textarea(array(
					            'name' => 'text',
					            'placeholder' => 'Slide Text',
					            'value' => $text
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/sliderform');
				$this->load->view('cms/categoriesscript');
				$this->load->view('template/close');
			}else{
				if($error){
					$data['imgerror'] = $error;
				}else{
					$data['imgerror'] = '';
				}
				$data['pgTitle'] = 'Edit Slide';
				$data['bodyclass'] = 'editpage-page';
				$data['initialize'] = 'cmsScript';

				$data['formstart'] = form_open('slides/update_record/slides' . $id);
				$data['title'] = form_input(array(
					            'name' => 'title',
					            'type' => 'text',
					            'placeholder' => 'Slide Title',
					            'value' => set_value('title')
		        ));
		        $data['imagesource'] = base_url() . 'images/uploads/default.png';
				$data['image'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
				));
		        $data['text'] = form_textarea(array(
					            'name' => 'text',
					            'placeholder' => 'Slide Text',
					            'value' => set_value('text')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/sliderform');
				$this->load->view('cms/categoriesscript');
				$this->load->view('template/close');
			}
		}else{
			$data['pgTitle'] = 'Edit Front Page Slide';
			$data['bodyclass'] = 'editslide-page';
			$data['initialize'] = 'cmsScript';
			$data['items'] = $this->slider_model->getAll();
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/slider/editlist');

			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
		
	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		$file_name = rand(1,50000).'_slider_image';
    	$filepath = './images/uploads/slider/';
    	$origpath = $_FILES['userfile']['name'];
		$ext = pathinfo($origpath, PATHINFO_EXTENSION);
		$upload = upload_file($file_name, $filepath);
		if($this->form_validation->run() != FALSE){
			$data = array(
				'slide_title' => $_POST['title'],
				'slide_text' => $_POST['text'],
				'slide_img' => $file_name . '.' . $ext
			);
			if($upload['status'] != false){
				$this->insert_model->slides($data);
				redirect(base_url() . index_page() . 'slides/add');
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
				$file_name = rand(1,50000).'_slider_image';
		    	$filepath = './images/uploads/slider/';
		    	$origpath = $_FILES['userfile']['name'];
				$ext = pathinfo($origpath, PATHINFO_EXTENSION);
				$upload = upload_file($file_name, $filepath);
				$data = array(
					'slide_title' => $_POST['title'],
					'slide_text' => $_POST['text'],
					'slide_img' => $file_name . '.' . $ext
				);
				if($upload['status'] != false){
					$this->update_model->slides($record, $data);
					redirect(base_url() . index_page() . 'slides/edit');
				}else{
					$this->edit($record, $upload['message']);
				}
			}else{
				$data = array(
					'slide_title' => $_POST['title'],
					'slide_text' => $_POST['text']
				);
			}
			$this->update_model->slides($record, $data);
			redirect(base_url() . index_page() . 'slides/edit/' . $record);
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect(base_url() . index_page() . 'slides');
	}

}