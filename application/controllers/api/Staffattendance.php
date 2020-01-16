<?php defined('BASEPATH') or exit('No direct script access allowed');

//include Rest Controller library
require APPPATH .'/libraries/REST_Controller.php';


class Staffattendance extends REST_Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function add_staffattendance_post($token = NULL){
		$token = $this->input->post('token');
		if($token === NULL){
			$token = $this->input->post('token');
		}
		$user = $this->Account_model->verify_token($token);
		if($token === NULL || $token =="" || empty($user) || !is_array($user)){
			$this->response([
				'status' =>false,
				'message' => "user not logged in"], REST_Controller::HTTP_BAD_REQUEST);
		}
		if($this->post('date')!== NULL){
			$date =str_replace('/','-',$this->post('date'));
			$data['date'] = date('Y-m-d H:i:s',strtotime($date));
		}
		else{
			$data['date'] = date('Y-m-d H:i:s');
		}
		if($this->post('photo')!=NULL && $this->post('location')!=NULL){
			$upload_path = "./assets/images/staffattendance/";
			$photo ='';
			if($this->post('photo')){
				$photodata = base64_decode($this->post('photo'));
				$photo = $upload_path."photo_".date('d_m_y_h_i_s').".jpg";
				write_file($photo, $photodata);
			}
			$data['staff_id'] = $user['id'];
			$data['photo'] = $photo;
			$data['location'] = $this->post('location');
		  	$result = $this->Staff_model->add_staffattendance($data);
		  	if($result === true){
				 $this->response([
				 	'status'=>true,
					'message'=>"Attendance Added Successfully!"],REST_Controller::HTTP_OK);
			}			 
			else{
				$tis->response([
					'status'=>false,
					'message'=>$result],REST_Controller::HTTP_OK);
			}
		}
		else{
			$this->response([
				'status'=>true,
				'message'=>"Please Provide Complete Information!"],REST_Controller::HTTP_OK);	
		}		
	}
}