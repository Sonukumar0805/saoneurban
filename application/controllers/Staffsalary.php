<?php defined('BASEPATH') or exit('no direct script access allowed');

class Staffsalary extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Monthly Salary";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$this->template->load('staff','monthlysalry',$data);
	}
	
	public function advancesalary(){
		$data['title'] = "Advance Salary";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$this->template->load('staff','advanceysalry',$data);		
	}
}