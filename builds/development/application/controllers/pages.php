<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->model('navigation_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pagename', 'Page Title', 'trim|required');
		$this->form_validation->set_rules('slug', 'Slug', 'trim');
		$this->form_validation->set_rules('metadesc', 'Meta Description', 'trim|required');
		$this->form_validation->set_rules('content', 'Page Content', 'trim|required');
	}

	public function index(){
		$this->edit();
	}

	public function display_page($slug) {	
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$data['pgdata'] = $this->pages_model->getPage($slug)->row();
		$data['pgTitle'] = $data['pgdata']->pages_title;
		$data['initialize'] = 'navScript';		
		$data['bodyclass'] = 'page';
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');
		$this->load->view('template/content');

		$this->load->view('template/close');
	}

	public function add() {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['pgTitle'] = 'Add Page';
			$data['bodyclass'] = 'addpage-page';
			$data['initialize'] = 'cmsScript';
			$navparents = $this->navigation_model->getParents();
			$data['formstart'] = form_open('pages/insert_record/pages');
			$data['pagename'] = form_input(array(
				            'name' => 'pagename',
				            'type' => 'text',
				            'placeholder' => 'Page Name',
				            'value' => set_value('pagename')
	        ));
	        $data['slug'] = form_input(array(
				            'name' => 'slug',
				            'type' => 'text',
				            'placeholder' => 'URL Segment',
				            'value' => set_value('slug')
	        ));
	        $data['icon'] = form_input(array(
				            'name' => 'icon',
				            'type' => 'text',
				            'readonly' => true,
				            'value' => set_value('icon')
	        ));
	        $data['hiddenicon'] = form_hidden('icontext');
	        $data['metadesc'] = form_textarea(array(
				            'name' => 'metadesc',
				            'id' => 'metadesc',
				            'rows' => '3',
				            'placeholder' => 'Meta Description',
				            'value' => set_value('metadesc')
	        ));
	        $navoptions = array(
	        			'null' => 'Orphan',
	        			'toplevel' => 'Top Level Page'
	        );
	        foreach($navparents as $row){
	        	$navoptions[$row->pages_slug] = $row->pages_title;
	        }
	        $data['parent'] = form_dropdown('parent', $navoptions);
	        $options = array(
							'0'  => '0',
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6'
	        );
	        $data['weight'] = form_dropdown('weight', $options);
	        $data['body'] = form_textarea(array(
				            'name' => 'content',
				            'class' => 'richtext',
				            'value' => set_value('content')
	        ));
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/pagesform');

			$this->load->view('cms/tinymce-init');
			$this->load->view('template/close');
		}else{
			$data['pgTitle'] = 'Add Page';
			$data['bodyclass'] = 'addpage-page';
			$data['initialize'] = 'cmsScript';
			$data['success'] = true;
			$data['items'] = $this->pages_model->getEditList('tbl_pages');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/editlist');

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
				$pagedata = $this->pages_model->getToEdit($record);
					$id = $pagedata->pages_id;
					$title = $pagedata->pages_title;
					$slug = $pagedata->pages_slug;
					$icon = $pagedata->pages_icon;
					$meta = $pagedata->pages_meta;
					$body = $pagedata->pages_content;
					$parent = $pagedata->pages_navprnt;
					$weight = $pagedata->pages_weight;
				$data['pgTitle'] = 'Edit Page';
				$data['bodyclass'] = 'editpage-page';
				$data['initialize'] = 'cmsScript';
				$navparents = $this->navigation_model->getParents();
				$data['formstart'] = form_open('pages/update_record/pages/' . $id);
				$data['pagename'] = form_input(array(
					            'name' => 'pagename',
					            'type' => 'text',
					            'placeholder' => 'Page Name',
					            'value' => $title
		        ));
		        $data['slug'] = form_input(array(
					            'name' => 'slug',
					            'type' => 'text',
					            'placeholder' => 'URL Segment',
					            'value' => $slug
		        ));
		        $data['icon'] = form_input(array(
					            'name' => 'icon',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => $icon
		        ));
		        $data['hiddenicon'] = form_hidden('icontext', $icon);
		        $data['metadesc'] = form_textarea(array(
					            'name' => 'metadesc',
					            'id' => 'metadesc',
					            'rows' => '3',
					            'placeholder' => 'Meta Description',
					            'value' => $meta
		        ));
		        $navoptions = array(
		        			'null' => 'Orphan',
		        			'toplevel' => 'Top Level Page'
		        );
		        foreach($navparents as $row){
		        	$navoptions[$row->pages_slug] = $row->pages_title;
		        }
		        $data['parent'] = form_dropdown('parent', $navoptions, $parent);
		        $options = array(
								'0'  => '0',
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6'
	            );
	            $data['weight'] = form_dropdown('weight', $options, $weight);
		        $data['body'] = form_textarea(array(
					            'name' => 'content',
					            'class' => 'richtext',
					            'value' => $body
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/pagesform');

				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}else{
				$data['pgTitle'] = 'Edit Page';
				$data['bodyclass'] = 'editpage-page';
				$data['initialize'] = 'cmsScript';
				$navparents = $this->navigation_model->getParents();
				$data['formstart'] = form_open('pages/update_record/pages' . $id);
				$data['pagename'] = form_input(array(
					            'name' => 'pagename',
					            'type' => 'text',
					            'placeholder' => 'Page Name',
					            'value' => set_value('pagename')
		        ));
		        $data['slug'] = form_input(array(
					            'name' => 'slug',
					            'type' => 'text',
					            'placeholder' => 'URL Segment',
					            'value' => set_value('slug')
		        ));
		        $data['icon'] = form_input(array(
					            'name' => 'icon',
					            'type' => 'text',
					            'readonly' => true,
					            'value' => set_value('icon')
		        ));
		        $data['hiddenicon'] = form_hidden('icontext');
		        $data['metadesc'] = form_textarea(array(
					            'name' => 'metadesc',
					            'id' => 'metadesc',
					            'rows' => '3',
					            'placeholder' => 'Meta Description',
					            'value' => set_value('metadesc')
		        ));
		        $navoptions = array(
		        			'null' => 'Orphan',
		        			'toplevel' => 'Top Level Page'
		        );
		        foreach($navparents as $row){
		        	$navoptions[$row->pages_slug] = $row->pages_title;
		        }
		        $data['parent'] = form_dropdown('parent', $navoptions, $parent);
		        $options = array(
								'0'  => '0',
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6'
	            );
	            $data['weight'] = form_dropdown('weight', $options, $weight);
		        $data['body'] = form_textarea(array(
					            'name' => 'content',
					            'class' => 'richtext',
					            'value' => set_value('content')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('template/head', $data);
				$this->load->view('cms/logoandmenu');
				$this->load->view('cms/pagesform');

				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}
		}else{
			$data['pgTitle'] = 'Edit Page';
			$data['bodyclass'] = 'editpage-page';
			$data['initialize'] = 'cmsScript';
			$data['items'] = $this->pages_model->getEditList('tbl_pages');
			$this->load->view('template/head', $data);
			$this->load->view('cms/logoandmenu');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/editlist');

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
		redirect(base_url() . index_page() . 'pages/add');
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect(base_url() . index_page() . 'pages');
		}else{
			//$this->edit($record);
			redirect(base_url() . index_page() . 'pages/' . $record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect(base_url() . index_page() . 'pages');
	}

}