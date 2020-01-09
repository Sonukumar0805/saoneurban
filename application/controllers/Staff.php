<?php defined('BASEPATH') or exit('No direct script acces allowed');

class Staff extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Add Staff";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$this->template->load('staff','add',$data);
	}
}