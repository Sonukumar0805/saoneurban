<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('upload_file')) {
  		function upload_file($name,$upload_path,$allowed_types,$file_name,$max_size=3000) {
    		// Getting CI class instance.
    		$CI = get_instance();
			if(!$CI->load->is_loaded('upload')){
				$CI->load->library('upload');
			} 
			$file_name=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file_name)));
    		$config['upload_path']   = $upload_path; 
			$config['allowed_types'] = $allowed_types; 
			$config['file_name'] = $file_name;
			$config['max_size']      = $max_size;  
			$CI->upload->initialize($config);
			$result='';
			if(is_uploaded_file($_FILES[$name]['tmp_name'])){
				if ( ! $CI->upload->do_upload($name)) {
					$error = $CI->upload->display_errors(); 
					$file=false;
				}
				else { 
					$filedata = $CI->upload->data(); 
					$file=$filedata['raw_name'].$filedata['file_ext'];
					$src=$upload_path."$file";
					$result=substr($src,1);
				}
			}
			return $result;
		}  
	}
?>
