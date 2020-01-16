<?php 

class Staff_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->db->db_debug = false;
	}
	
	public function addstaff($data){
		$this->db->select_max('id');
		$query = $this->db->get('su_staff');
		$max = $query->row_array();
		$maxid = $max['id']+1;
		$data['emp_id'] = "SUSS-00".$maxid;
		$mobile = $data['mobile'];
		$query2 = $this->db->get_where('su_staff',array('mobile'=>$mobile));
		if($query2->num_rows() == 0){
			$insert = $this->db->insert('su_staff',$data);
			$staffid = $this->db->insert_id();
			$staff = array();
			if($insert){
				 $staff['staff_id'] = $staffid;
				 $staff['name'] = $data['name'];
				 $staff['emp_id'] = $data['emp_id'];
				 $staff['mobile'] = $data['mobile'];
				 $staff['email'] = $data['email'];
				 $salt = random_string('alnum',8);
				 $staff['salt'] = $salt;
				 $password = $data['emp_id'];
				 $encpassword = md5($password.SITE_SALT.$salt);
				 $staff['password'] = $password;
				 $staff['encpassword'] = $encpassword;
				 $staff['role'] = '2';
				 $staff['created_on'] = date('Y-m-d H:i:s');
				 
				 $stafflogin = $this->db->insert('su_stafflogin',$staff);
				 if($stafflogin){
					return true;
				 }
				else{
					return $this->db->error();
				}
			}
			else{
				return $this->db->error();
			}
		}
		else{
			return $result['message'] = "Staff Already Added!";
		}
	}
	
	public function get_stafflist($where = array(), $types='all'){
		$this->db->where($where);
		$query = $this->db->get('su_staff');
		if($types == 'all'){
			$array = $query->result_array();
		}
		else{
			$array = $query->row_array();
		}
		return $array;
	}
	
	public function updatestaff($data){
		$id = $data['id'];
		unset($data['id']);
		$where = array('id' => $id);
		$this->db->where($where);
		$query = $this->db->update('su_staff',$data);
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function deletestaff($id){
		$where = array('id'=>$id);
		$data['status'] = '0';
		$this->db->where($where);
		$query = $this->db->update('su_staff',$data); 
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function add_advancesalary($data){
		$advance = $data['advance'];
		$data['all_total'] = -$advance;
		$description = $data['description'];
		$date = $data['date'];
		$month = date('F',strtotime($date));
		$year = date('Y',strtotime($date));
		$data['month'] = $month;
		$data['year'] = $year;
		$data['type'] = 'Advance';
		$name = $data['name'];
		unset($data['advance'],$data['description'],$data['name']);
		$insert = $this->db->insert('su_staffsalary',$data);
		if($insert){
			/*$ex['date'] = $date;
			$ex['month'] = date('m',strtotime($date));
			$ex['year'] = date('Y',strtotime($date));
			$ex['expensehead_id'] = '2';
			$ex['ac_holder'] = $name;
			$ex['particular'] = $description;
			$ex['type'] = 'Cash';
			$ex['sal_type'] = 'Advance';
			$ex['amount'] = $advance;
			$expense = $this->db->insert('sk_expense',$ex);*/
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function add_monthlysalary($data){
		$data['type'] = 'Salary';
		$date = date('Y-m-d');
		$data['date'] = $date;	
		$where = array('month' => $data['month'],'staff_id'=>$data['staff_id'],'type'=>$data['type']);
		$query = $this->db->get_where('su_staffsalary',$where);
		if($query->num_rows() == 0){
			$name = $data['name'];
			unset($data['name']);
			$insert = $this->db->insert('su_staffsalary',$data);
			$salary_id = $this->db->insert_id();
			/*if(isset($insert)){
			$month = date('m',strtotime($data['month']));
			$ex['date'] = $date;
			$ex['month'] = $month;
			$ex['year'] = $data['year'];
			$ex['salary_id'] = $salary_id;
			$ex['expensehead_id'] = '1';
			$ex['ac_holder'] = $name;
			$ex['particular'] = 'Salary given by admin';
			$ex['amount'] = $data['all_total'];
			$ex['type'] = 'Cash';
			$ex['sal_type'] = $data['type'];
			$expense = $this->db->insert('sk_expense',$ex);*/
			if($insert){
				return $array['salary_id'] = $salary_id;
			}
			else{
				 $this->db->error();
			}
		}
		else{
			return "Salary Already given to this staff for this month!";
		}
	}
	
	public function getsalary_details($where = array(),$types = 'all'){
		$this->db->order_by('id','DESC');	
		$this->db->where($where);
		$query = $this->db->get('su_staffsalary');
		if($types == 'all'){
			$array = $query->result_array();
		}
		else{
			$array = $query->row_array();
		}
		return $array;
	}
	
	public function totaladvance($where = array(),$types = 'all'){
		$this->db->select_sum('all_total');
		$query = $this->db->get_where('su_staffsalary',$where);
		if($types == 'all'){
			$array = $query->result_array();
		}
		else{
			$array = $query->row_array();
		}
		return $array;	
	}
}