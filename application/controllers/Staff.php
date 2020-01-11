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
	
	public function addstaff(){
		$config['upload_path'] = "assets/uploads/staff/";
		$config['allowed_types'] = 'jpg|jpeg|png';
		$filename = time().$_FILES["photo"]["name"];
		$config['file_name'] = $filename;
		$this->upload->initialize($config);
		$data = $this->input->post();
		unset($data['addstaff']);
		if($this->upload->do_upload('photo')){
			$image = $this->upload->data();
			$photo = "assets/uploads/staff/".$image['raw_name'].$image['file_ext'];
			$data['photo'] = $photo;
		}
		$result = $this->Staff_model->addstaff($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Staff Added Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
		redirect('staff');
	}
	
	public function stafflist(){
		$data['title'] = "Staff List";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard','staff'=>'Add Staff');
		$data['datatable'] = true;
		$stafflist = $this->Staff_model->get_stafflist(array('status'=>'1'),'all');
		$data['stafflist'] = $stafflist;
		$this->template->load('staff','stafflist',$data);
	}
	
	public function editstaff($id){
		$data['title'] = "Edit Staff";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard','staff/stafflist'=>'Staff List');
		$staff = $this->Staff_model->get_stafflist(array('md5(id)'=>$id),'single');
		$data['staff'] = $staff;
		$this->template->load('staff','edit',$data);
	}
	
	public function updatestaff(){
		$data = $this->input->post();
		unset($data['updatestaff']);
		if(isset($_FILES['photo'])){
			$config['upload_path'] = "./assets/uploads/staff/";
			$config['allowed_types'] = "jpg|jpeg|png";
			$filename = time().$_FILES["photo"]["name"];
			$config['file_name'] = $filename;
			$this->upload->initialize($config);
			if($this->upload->do_upload('photo')){
				$image = $this->upload->data();
				$photo = "assets/uploads/staff/".$image['raw_name'].$image['file_ext'];
				$data['photo'] = $photo;
			}
		}
		$result = $this->Staff_model->updatestaff($data);
		if($result === true){
			$this->session->set_flashdata('msg',"Staff Updated Successfully!");
		}
		else{
			$this->session->set_flashdata('err_msg',$result['message']);
		}
		redirect('staff/stafflist');
	}
	
	public function deletestaff(){
		$id = $this->input->post('id');
		$result = $this->Staff_model->deletestaff($id);
		if($result === true){
			$this->session->userdata('msg',"Staff Deleted Successfully!");
		}
		else{
			$this->session->userdata('err_msg',$result['messasge']);
		}
	}
}