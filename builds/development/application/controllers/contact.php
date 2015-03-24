<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
	}
	
	public function index() {
		$this->load->helper(array('form', 'url'));//remove any of these if they are in the autoload file
		$this->load->library('form_validation');//remove any of these if they are in the autoload file

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|is_unique[tbl_messages.messages_message]');
		$this->form_validation->set_message('is_unique', 'We have already recieved a message with this content.');

		$data['pgTitle'] = 'Contact us';
		$data['sidenav'] = $this->navigation_model->getNav();
		$data['sidenavlogo'] = true;
		$this->load->view('template/head', $data);
		$this->load->view('template/sidenav');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('contact/contact');
		}
		else
		{
			$data = array(
				'messages_name' => set_value('name'),
				'messages_email' => set_value('email'),
				'messages_message' => set_value('message'),
			);
			$this->db->insert('tbl_messages',$data);
			$this->load->library('email');
			$this->email->from(set_value('email'),set_value('name'));
			$this->email->to('lucasmorrish22@gmail.com');
			$this->email->subject('Site Message');
			$this->email->message(set_value('message'));
			$this->email->send();
			$this->load->view('contact/contactSuccess');
		}
		$this->load->view('template/close');

	}

}