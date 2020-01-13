<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller{
	function __construct(){
		parent::__construct();
	}
	public function login_post(){
		$data['mobile'] = $this->input->post('mobile');
		$data['password'] = $this->input->post('password');
		if(!empty($data['mobile']) && !empty($data['password'])){
			$result = $this->Account_model->api_login($data);
			if($result['verify'] === true){
				$this->response(['status'=>true,'user'=>$result['data']], REST_Controller::HTTP_OK);
			}
			else{
				$this->response([
					'status'=>false,
					'message'=>'Wrong username or Password'],REST_Controller::HTTP_OK);
			}
		}
		else{
			$this->response([
				'status'=>false,
				'message'=>'please provide Both Username and Password!'], REST_Controller::HTTP_OK);
		}
	}
	
	
}