<?php defined('BASEPATH') or exit('No direct script access allowed');

class Expensehead extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Add Expense Head";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$data['datatable'] = true;
		$expensehead = $this->Expense_model->get_expensehead(array('status'=>'1'),'all');
		$data['expensehead'] = $expensehead;
		$this->template->load('master/expensehead','add',$data);
	}
	
	public function addexpensehead(){
		$data = $this->input->post();
		unset($data['addexpensehead']);
		$result = $this->Expense_model->addexpensehead($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Expense Head Added Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('master/expensehead');
	}
	
	public function updateexpensehead(){
		$data = $this->input->post();
		unset($data['updateexpensehead']);
		$result = $this->Expense_model->updateexpensehead($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Expensehead Updated Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('master/expensehead');
	}
	
	public function deleteexpensehead(){
		$id = $this->input->post('id');
		$result = $this->Expense_model->deleteexpensehead($id);
		if($result === true){
			$this->session->set_flashdata('msg',"Expense Head Deleted Successfully!");
		}		
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
	}
}