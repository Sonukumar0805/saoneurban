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
				$options[$staff['id']] = $staff['name'];
			}
		}
		
		$data['staff'] = $options;
		$this->template->load('staff','monthlysalary',$data);
	}
	
	public function advancesalary(){
		$data['title'] = "Advance Salary";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$data['select2'] = true;
		$staffs = $this->Staff_model->get_stafflist(array('status'=>'1'),'all');
		$options = array(''=>'Select Staff');
		if(is_array($staffs)){
			foreach($staffs as $staff){
				$options[$staff['id']] = $staff['name'];
			}
		}
		$data['staff'] = $options;
		$this->template->load('staff','advancesalary',$data);		
	}
	
	public function add_advance(){
		$data = $this->input->post();
		unset($data['addsalary'],$data['gender']);
		$result = $this->Staff_model->add_advancesalary($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Advance Added Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
		redirect('staffsalary/advancesalary');
	}
	
	public function add_monthlysalary(){
		$data = $this->input->post();
		unset($data['addsalary'],$data['gender']);
		$month = $data['month'];
		$year = $data['year'];
		$result = $this->Staff_model->add_monthlysalary($data);
		$salary_id = $result;
		$staff_id = $data['staff_id'];
		if(!empty($result)){
			$this->session->set_flashdata('msg',"Monthly Salary Added");
		}
		else{
			$this->session->set_flashdata('err_msg',$result);
		}
		$this->session->set_userdata('salary_id',$salary_id);
		$this->session->set_userdata('staff_id',$staff_id);
		$this->session->set_userdata('month',$month);
		$this->session->set_userdata('year',$year);
		redirect('staffsalary/print_salary');
	}
	
	public function print_salary(){  
		$staff_id = $this->session->staff_id;
		$month = $this->session->month;
		$year = $this->session->year;
		$salary_id = $this->session->salary_id;
		$data['staffs'] = $this->Staff_model->get_stafflist(array('id'=>$staff_id),'single');
		$data['salary'] = $this->Staff_model->getsalary_details(array('id' => $salary_id,'staff_id'=>$staff_id),'single');
		$type = 'Advance';
		$data['advance'] = $this->Staff_model->totaladvance(array('staff_id'=>$staff_id,'month'=>$month,'year'=>$year,'type'=>$type,),'single');
		/*echo "<pre>";
		print_r($data['staffs']); 
		print_r($data['salary']);
		print_r($data['advance']);die;*/
		$this->load->view('staff/print_salary',$data);
	}
	
	public function getsinglestaff(){
		$staff_id = $this->input->post('staff_id');
		$staffs = $this->Staff_model->get_stafflist(array('id'=>$staff_id,'status'=>'1'),'single');	
		$staff = json_encode($staffs);	
		echo $staff;
	}
}