<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[75]|callback_check_if_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[emailconf]|callback_check_if_email_exists');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'required');
	}	

	public function add() {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['bodyclass'] = "createadmin";
			$data['initialize'] = 'cmsScript';
			$data['header'] = "Add a New Admin";
			$data['formstart'] = form_open('admin/insert_record/admin');
			$data['fname'] = form_input(array(
				            'name' => 'fname',
				            'type' => 'text',
				            'placeholder' => 'First Name',
				            'value' => set_value('fname')
	        ));
	        $data['lname'] = form_input(array(
				            'name' => 'lname',
				            'type' => 'text',
				            'placeholder' => 'Last Name',
				            'value' => set_value('lname')
	        ));
	        $data['username'] = form_input(array(
				            'name' => 'username',
				            'type' => 'text',
				            'placeholder' => 'Username',
				            'value' => set_value('username')
	        ));
	        $data['email'] = form_input(array(
				            'name' => 'email',
				            'type' => 'text',
				            'placeholder' => 'Email',
				            'value' => set_value('email')
	        ));
	        $data['emailconf'] = form_input(array(
				            'name' => 'emailconf',
				            'type' => 'text',
				            'placeholder' => 'Email'
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/adminform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['initialize'] = 'cmsScript';
			$data['header'] = "Add a New Page";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');

			$this->load->view('template/footer');

			$this->load->view('template/scripts');
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
					$meta = $pagedata->pages_meta;
					$body = $pagedata->pages_content;
					$parent = $pagedata->pages_navprnt;
					$weight = $pagedata->pages_weight;
				$data['bodyclass'] = "addpage";
				$data['header'] = "Add a New Page";
				$data['initialize'] = 'cmsScript';
				$navparents = $this->navigation_model->getParents();
				$data['formstart'] = form_open('pages/update_record/pages/' . $id);
				$data['pagename'] = form_input(array(
					            'name' => 'pagename',
					            'type' => 'text',
					            'placeholder' => 'Page Name',
					            'value' => $title
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/pagesform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}else{
				$data['bodyclass'] = "addpage";
				$data['initialize'] = 'cmsScript';
				$data['header'] = "Add a New Page";
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
		        $data['metadesc'] = form_textarea(array(
					            'name' => 'metadesc',
					            'id' => 'metadesc',
					            'rows' => '3',
					            'placeholder' => 'Meta Description',
					            'value' => set_value('metadesc')
		        ));
		        $navoptions = array('null' => 'Orphan');
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
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/pagesform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->pages_model->getEditList('tbl_pages');
			$data['initialize'] = 'cmsScript';
			$data['header'] = "Add a New Page";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/editlist');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
		
	}

	public function check_if_username_exists($requested_username) {
		$this->load->model('admin_model');
		$username_available = $this->admin_model->check_if_username_exists($requested_username);

		if($username_available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function check_if_email_exists($requested_email) {
		$this->load->model('admin_model');
		$email_available = $this->admin_model->check_if_email_exists($requested_email);

		if($email_available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		$this->load->library('email');
		$this->load->library('encrypt');
		$this->load->helper('string');
		$pass = random_string('alnum', 8);

		if($this->form_validation->run() != FALSE){
			$this->email->from('no-reply@barkerblagrave-rds.com', 'Barker Blagrave & Associates');
			$this->email->to($_POST['email']); 
			$this->email->subject('New Administrator Signup');
			$this->email->message('This is a test email. The password is ' .  $pass);	
			$this->email->send();
			//echo $this->email->print_debugger();

			$encpass = $this->encrypt->sha1($pass);

			$this->insert_model->$function($encpass);
		}
		
		$this->add();
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
		}

		$this->edit($record);
	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		$this->edit();
	}

	
}