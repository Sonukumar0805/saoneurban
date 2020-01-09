<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('setredirecturl')) {
  		function setredirecturl() {
    		$CI = get_instance();
			$current_url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$CI->session->set_userdata('redirecturl',$current_url);
			$data=$CI->input->post();
			$CI->session->set_userdata('submission',$data);
		}  
	}
	if(!function_exists('getsubmission')) {
  		function getsubmission() {
    		$CI = get_instance();
			if($CI->session->userdata('submission')!==NULL){
				$data = $CI->session->userdata('submission');
				$_POST=$data;
				$CI->session->unset_userdata('submission');
			}
		}  
	}
	if(!function_exists('checklogin')) {
  		function checklogin() {
    		$CI = get_instance();
			if($CI->session->userdata('user')===NULL){
				setredirecturl();
				redirect('/');
			}
			else{
				//getsubmission();
			}
		}  
	}
	if(!function_exists('loginredirect')){
  		function loginredirect($url='dashboard'){
    		$CI = get_instance();
			if($CI->session->userdata('user')!==NULL){
				if($CI->session->userdata('redirecturl')!=NULL) {
					$redirecturl=$CI->session->userdata('redirecturl');
					$CI->session->unset_userdata('redirecturl');
					redirect($redirecturl);
				}
				else{
					redirect($url);
				}
			}
		}  
	}
?>
