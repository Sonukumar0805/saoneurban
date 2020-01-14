<?php 

class Payment_model extends CI_Model{
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
	
	public function addpayment($data){
		$query = $this->db->insert('su_payments',$data);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function get_paymentlist($where = array(),$types='all'){
		$this->db->where($where);
		$query = $this->db->get('su_payments');
		if($types == 'all'){
			$array = $query->result_array(); 
		}
		else{
			$array = $query->row_array();
		}
		return $array;
	}
	
	public function updatepayment($data){
		$id = $data['id'];
		unset($data['id']);
		$this->db->where(array('id'=>$id));
		$query = $this->db->update('su_payments',$data);
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function deletepayment($id){
		$where = array('id'=>$id);
		$data['status'] = '0';
		$this->db->where($where);
		$delete = $this->db->update('su_payments',$data);
		if($delete){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
}