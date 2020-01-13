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
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','clients'=>'Add Clients');
		$data['datatable'] = true;
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$this->template->load('clients','view',$data);
	}
	
	public function editclient($id){
		$data['title'] = "Edit Clients";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','clients/clientlist'=>'Edit Clients');
		$data['datatable'] = true;
		$client = $this->Client_model->getclients(array('md5(id)'=>$id,'status' =>'1'),'single');
		$data['client'] = $client;
		$this->template->load('clients','edit',$data);
	}
	
	public function agreements(){
		$data['title'] = "Client Agreements";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$this->template->load('clients','agreements',$data);
	}
	
	public function addagreement(){
		$data = $this->input->post();
		unset($data['addagreement']);
		$result=$this->Client_model->addagreement($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Agreement added Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('clients/agreements');
	}
	
	public function agreementlist(){
		$data['title'] = "Agreeement List";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','clients/agreements'=>'Add Agreements');
		$data['datatable'] = true;
		$agreements = $this->Client_model->agreementlist(array('t1.status' =>'1'),'all');
		$data['agreements'] = $agreements;
		$this->template->load('clients','agreementlist',$data);		
	}
	
	public function editagreements($id){
		$data['title'] = "Edit Agreements";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','clients/agreementlist'=>'Agreements List');
		$agreement = $this->Client_model->agreementlist(array('md5(t1.id)'=>$id,'t1.status' =>'1'),'single');
		$clients = $this->Client_model->getclients(array('status' =>'1'),'all');
		$data['clients'] = $clients;
		$data['agreement'] = $agreement;
		$this->template->load('clients','editagreements',$data);
	}
	
	public function updateagreement(){
		$data = $this->input->post();  
		unset($data['updateagreement']); 
		$result=$this->Client_model->updateagreement($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Agreement Updqated Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('clients/agreementlist');
	}
	
	public function deleteagreements(){
		$id = $this->input->post('id');
		$result = $this->Client_model->deleteagreements($id);
		if($result === true){
			$this->session->set_flashdata('msg',"Agreement Deleted Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
	}
	
}