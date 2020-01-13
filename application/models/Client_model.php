<?php 

class Client_model extends CI_Model{
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
	public function addclient($data){
		//$this->db->select_max('id');
		$query = $this->db->insert('su_clients',$data);
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function getclients($where = array(),$types='all'){
		$this->db->where($where);
		$query = $this->db->get('su_clients');
		if($types == 'all'){
			$array = $query->result_array();
		}
		else{
			$array = $query->row_array();
		}
		return $array;
	}
	
	
	public function addagreement($data){
		$query = $this->db->insert('su_agreements',$data);
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function agreementlist($where = array(), $types= 'all'){
		$this->db->select('t1.*,t2.name');
		$this->db->from('su_agreements as t1');
		$this->db->join('su_clients as t2','t1.client_id = t2.id');
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
	
	public function updateagreement($data){
		$id = $data['id'];
		unset($data['id']);
		$this->db->where(array('id'=>$id));
		$query = $this->db->update('su_agreements',$data);
		if($query){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
	
	public function deleteagreements($id){
		$where = array('id'=>$id);
		$data['status'] = '0';
		$this->db->where($where);
		$delete = $this->db->update('su_agreements',$data);
		if($delete){
			return true;
		}
		else{
			return $this->db->error();
		}
	}
}