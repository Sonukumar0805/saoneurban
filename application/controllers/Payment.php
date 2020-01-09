<?php defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Payment Receive";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord',);
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$data['select2'] = true;
		$this->template->load('payment','add_receive',$data);
	}
}