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
	
}