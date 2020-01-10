<?php

class Expense_model extends CI_Model{
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
	public function addexpensehead($data){
		$name = $data['name'];
		$query = $this->db->get_where('su_expensehead',array('name'=>$name));
		if($query->num_rows() == 0){
			$insert = $this->db->insert('su_expensehead',$data);
			if($insert){
				return true;
			}
			else{
				return $this->db->error();
			}
		}
		else{
			return "Expense Head Already Added!";
		}
	}
	
	public function get_expensehead($where = array(), $types = 'all'){
		$this->db->where($where);
		$query = $this->db->get('su_expensehead');
		if($types == 'all'){
			$array = $query->result_array(); 
		}
		else{
			$array = $query->row_array();
		}
		return $array;
	}	
	
	public function updateexpensehead($data){
		$id = $data['id'];
		unset($data['id']);
		$this->db->where(array('id'=>$id));
		$query = $this->db->update('su_expensehead',$data);
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function deleteexpensehead($id){
		$where = array('id'=>$id);
		$data['status'] = '0';
		$this->db->where($where);
		$delete = $this->db->update('su_expensehead',$data);
		if($delete){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function addexpenses($data){
		$date = $data['date'];
		$month = date('m',strtotime($date));
		$year = date('Y',strtotime($date));
		$data['month'] = $month;
		$data['year'] = $year;
		$query = $this->db->insert('su_expense',$data);
		if($query === true){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function getexpense($where = array(), $types = 'all'){
		$this->db->select('t1.*,t2.name as expensehead');
		$this->db->from('su_expense as t1');
		$this->db->join('su_expensehead as t2','t1.expensehead_id = t2.id');
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		if($types == 'all'){
			$array = $query->result_array();
		} 
		else{
			$array = $query->row_array();
		}
		return $array;
	}
	
	public function updateexpense($data){
		$id = $data['id'];
		unset($data['id']);
		$where = array('id'=>$id);
		$update = $this->db->update('su_expense',$data,$where);
		if($update === true){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function deleteexpense($id){
		$where = array('id'=>$id);
		$data['status'] = '0';
		$query = $this->db->update('su_expense',$data,$where);
		if($query === true){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
}