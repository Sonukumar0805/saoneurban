<?php defined('BASEPATH') or exit('no direct script access allowed');

class Staffsalary extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Monthly Salary";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$data['select2'] = true;
		$staffs = $this->Staff_model->get_stafflist(array('status'=>'1'),'all');
		$options = array(''=>'Select Staff');
		if(is_array($staffs)){
			foreach($staffs as $staff){
				
			}
		}
		$this->template->load('staff','monthlysalary',$data);
	}
	
	public function advancesalary(){
		$data['title'] = "Advance Salary";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$data['select2'] = true;
		$this->template->load('staff','advancesalary',$data);		
	}
}