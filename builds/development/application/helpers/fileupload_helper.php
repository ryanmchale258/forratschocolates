<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function upload_file($file_name, $filepath){
	$config['file_name'] = $file_name;
	$config['upload_path'] = $filepath;
	$config['allowed_types'] = 'gif|jpg|jpeg|png';
	$ci = &get_instance();
	$ci->load->library('upload', $config);
	if($ci->upload->do_upload()){
		$returndata = array('status' => true, 'message' => $ci->upload->data());
		return $returndata;
	}else{
		$returndata = array('status' => false, 'message' => $ci->upload->display_errors());
		return $returndata;
	}
}
