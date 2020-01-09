<?php defined('BASEPATH') or exit('No direct script access allowed');

class Expenses extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Add Expenses";
		$data['breadcrumb'] = array('dashboard'=>'Dashbaord',);
		$this->template->load('expenses','add',$data);
	}
}