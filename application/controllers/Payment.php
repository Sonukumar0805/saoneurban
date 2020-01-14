<?php defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Payment Receive";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','payment/paymentlist'=>'Payment List');
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$data['select2'] = true;
		$this->template->load('payment','add_receive',$data);
	}
	
	public function addpayment(){
		$data = $this->input->post();
		unset($data['addpayment']);
		$result = $this->Payment_model->addpayment($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Payment Added Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);			
		}
		redirect('payment');
	}
	
	public function paymentlist(){
		$data['title'] = "Payment List";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','payment'=>'Payment Receive');	
		$data['datatable'] = true;
		$paymentlist = $this->Payment_model->get_paymentlist(array('status'=>'1'),'all');	
		$data['paymentlist'] = $paymentlist;
		$this->template->load('payment','view',$data);
	}
	
	public function editpayment($id){
		$data['title'] = "Payment Receive";
		$data['select2'] = true;
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','payment/paymentlist'=>'Payment List');
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$paymentlist = $this->Payment_model->get_paymentlist(array('md5(id)'=>$id,'status'=>'1'),'single');	
		$data['paymentlist'] = $paymentlist;
		$this->template->load('payment','edit',$data);
	}
	
	public function updatepayment(){
		$data = $this->input->post();
		unset($data['updatepayment']);
		$result = $this->Payment_model->updatepayment($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Payment Updated Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('payment/paymentlist');
	}
	
	public function deletepayment(){
		$id = $this->input->post('id');
		$result = $this->Payment_model->deletepayment($id);
		if($result === true){
			$this->session->set_flashdata('msg',"Payment Deleted Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
	}
	
	public function singleclient(){
		$client_id = $this->input->post('client_id'); 
		$client = $this->Client_model->getclients(array('id'=>$client_id,'status'=>'1'),'single');		
		$val = json_encode($client);
		echo $val;
	}
}