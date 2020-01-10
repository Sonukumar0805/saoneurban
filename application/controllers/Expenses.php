<?php defined('BASEPATH') or exit('No direct script access allowed');

class Expenses extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Add Expenses";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','expenses/expenselist'=>'Expence List');
		$expensehead = $this->Expense_model->get_expensehead(array('status'=>'1'),'all');
		$data['expensehead'] = $expensehead;
		$this->template->load('expenses','add',$data);
	}
	
	public function addexpenses(){
		$data = $this->input->post();
		unset($data['addexpense']);
		$result = $this->Expense_model->addexpenses($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Expense Added Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);			
		}
		redirect('expenses');
	}
	
	public function expenselist(){
		$data['title'] = "Expence List";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard','expenses'=>' Add Expences');
		$data['datatable'] = true;
		$expenses = $this->Expense_model->getexpense(array('t1.status'=>'1'),'all');
		$data['expenses'] = $expenses;
		$this->template->load('expenses','view',$data);
	}
	
	public function editexpenses($id){
		$data['title'] = "Edit Expenses";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord','expenses/expenselist'=>'Expence List');
		$expense = $this->Expense_model->getexpense(array('t1.id'=>$id,'t1.status'=>'1'),'single');
		$expensehead = $this->Expense_model->get_expensehead(array('status'=>'1'),'all');
		$data['expensehead'] = $expensehead;
		$data['expense'] = $expense;
		$this->template->load('expenses','edit',$data);
	}
	
	public function updateexpense(){
		$data = $this->input->post();
		$amt = $data['amount'];
		$amount = str_replace(',','',$amt);
		$data['amount'] = $amount;
		unset($data['updateexpense']);
		$result = $this->Expense_model->updateexpense($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Expense Updated Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		redirect('expenses/expenselist');
	}
	public function deleteexpense(){
		$id = $this->input->post('id');
		$result = $this->Expense_model->deleteexpense($id);
		if($result === true){
			$this->session->set_flashdata('msg',"Expense Deleted Successfully.");
		}
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
	}
}