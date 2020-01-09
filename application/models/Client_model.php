<?php 

class Client_model extends CI_Model{
	
	public function addclient($data){
		$this->db->select_max('id');
		/*$query = $this->db->get('su_clients');
		$max = $query->row_array();
		$max_id = $max['id'];
		$emid = $max_id+1;
		$data['emp_id'] = "suss00".$emid;*/
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
}