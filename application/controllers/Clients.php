<?php defined('BASEPATH') or exit('No direct script access allowed');

class Clients extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Add Clients";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','clients/clientlist'=>'Clinets List');
		$this->template->load('clients','add',$data);
	}
	
	public function addclient(){
		$data = $this->input->post();
		unset($data['addclient']);
		$result = $this->Client_model->addclient($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Client added Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('clients');
	}
	
	public function clientlist(){
		$data['title'] = "Clients List";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','clients'=>'Add Clinets');
		$data['datatable'] = true;
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$this->template->load('clients','view',$data);
	}
	
}