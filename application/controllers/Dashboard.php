<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		checklogin();
	}
	
	public function index(){
		$data['title'] = "Dashboard";
		$data['breadcrumb'] = array('1'=>'Page','2'=>'Sample Page');
		/*$this->load->view('includes/top_section');
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/breadcrumb',$data);
		$this->load->view('pages/dashboard');
		$this->load->view('includes/bottom_section');*/
		$this->template->load('pages','dashboard',$data);
	}
}