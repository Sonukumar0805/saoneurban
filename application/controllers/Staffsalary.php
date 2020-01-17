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
	
	public function print_monthly($id = NULL, $staff_id = NULL){
		if($id === NULL || $staff_id === NULL){redirect('staffsalary/salaryledger/'.$id);}
		$data['staffs'] = $this->Staff_model->get_stafflist(array('id'=>$staff_id),'single');
		$salary = $this->Staff_model->getsalary_details(array('id' => $id,'staff_id'=>$staff_id),'single');
		$month = $salary['month'];
		$year = $salary['year'];
		$type = 'Advance';
		$data['salary'] = $salary;
		$data['advance'] = $this->Staff_model->totaladvance(array('staff_id'=>$staff_id,'month'=>$month,'year'=>$year,'type'=>$type,),'single');
		$this->load->view('staff/print_salary',$data);
	}
	
	public function getsinglestaff(){
		$staff_id = $this->input->post('staff_id');
		$staffs = $this->Staff_model->get_stafflist(array('id'=>$staff_id,'status'=>'1'),'single');	
		$staff = json_encode($staffs);	
		echo $staff;
	}
	
	public function stafflist(){
		$data['title'] = "Staff List";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard','staff'=>'Add Staff');
		$data['datatable'] = true;
		$stafflist = $this->Staff_model->get_stafflist(array('status'=>'1'),'all');
		$data['stafflist'] = $stafflist;
		$this->template->load('staff','salarystafflist',$data);
	}
	
	
	public function salaryledger($id = NULL){
		$data['title'] = "Staff Salary Ledger";
		$data['datatable'] = true;
		$data['breadcrumb'] = array('dashboard' => 'Dashborad', 'staff/stafflist' => 'Stafflist');
		$salaries = $this->Staff_model->getsalary_details(array('staff_id'=>$id,'type'=>'Salary'),'single');
		if(empty($salaries)){
			$this->session->set_flashdata('err_msg',"No data Found!");
			redirect('staff/stafflist');
		}
		$salary = array();
		if(is_array($salaries)){
			foreach($salaries as $sal){
				$month = $sal['month'];
				$year = $sal['year'];
				$advance = $this->Staff_model->totaladvance(array('staff_id'=>$id,'month'=>$month,'year'=>$year,'type'=> 'Advance'),'single');
				$sal['advance'] = $advance['all_total'];
				$salary[] = array('id'=>$sal['id'],'date'=>$sal['date'],'staff_id'=>$sal['staff_id'],'emp_id'=>$sal['emp_id'],'month'=>$month,'year'=>$year,
					'working_days'=>$sal['working_days'],'holidays'=>$sal['holidays'],'paid_leave'=>$sal['paid_leave'],'total_leave'=>$sal['total_leave'],
					'basic_salary'=>$sal['basic_salary'],'pf'=>$sal['pf'],'hra'=>$sal['hra'],'esi'=>$sal['esi'],'wdays_amount'=>$sal['wdays_amount'],
					'leave_amount'=>$sal['leave_amount'],'paid_salary'=>$sal['paid_salary'],'deduction'=>$sal['deduction'],'total_salary'=>$sal['total_salary'],
					'type'=>$sal['type'],'all_total'=>$sal['all_total'],'status'=>$sal['status'],'advance'=>$advance['all_total']
				);
			}
		}
		$data['salary'] = $salary;
		$this->template->load('staff','salaryledger',$data);
	}
}