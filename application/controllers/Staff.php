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
	
	public function staffattendance(){
		$data['title'] = "Staff Attendance";
		$data['breadcrumb'] = array('dashborad'=>'Dashboard');
		$data['select2'] = true;
		//$attendancelist = $this->Staff_model->attendancelist($where = array());
		$stafflist = $this->Staff_model->get_stafflist(array('status'=>'1'),'all');
		$data['stafflist'] = $stafflist;
		//$data['attendancelist'] = $attendancelist;
		$this->template->load('staff','attendancelist',$data);
	}
	
	public function staffattendancelist(){
		$staff_id = $this->input->post('staff_id');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$where = array('staff_id'=>$staff_id,'month'=>$month,'year'=>$year);
		$attendancelist = $this->Staff_model->attendancelist($where);
		
		$stattendance = '';
		$stattendance .="<table class='table data-table stripe hover nowrap' id='stattendance'>";
			$stattendance .="<thead>";
				$stattendance .="<tr class='bg-danger'>";
					$stattendance .="<th class='table-plus' id='t-border'>Sl No.</th>";
					$stattendance .="<th id='t-border'>Date</th>";
					$stattendance .="<th id='t-border'>Attendance</th>";
					$stattendance .="<th id='t-border'>Location</th>";
					$stattendance .="<th id='t-border'>Photo</th>";
				$stattendance .="</tr>";
			$stattendance .="</thead>";
			$stattendance .="<tbody>";
				if(is_array($attendancelist)){							
					foreach($attendancelist as $key=>$list){
						$i=0;			
						foreach($list as $ekey=>$value){$i++;
							$month = $list['month'];
							$year = $list['year'];
							if($ekey=='id'||$ekey =='staff_id'||$ekey=='month' ||$ekey == 'year'|| $ekey=='status'){continue;}
							$day = str_replace('d_','',$ekey);
							$days = $day.'-'.$month.'-'.$year;
							//$date = date('Y-m-d',strtotime($days));
							//if(date('m',strtotime($list[$i]['date'])) == date('m')){
							//print_r();
							//$location =  $value;
			$stattendance .="<tr>";
				$stattendance .="<td>$day</td>";
				$stattendance .="<td>$days</td>";
				$stattendance .="<td>";
						if($value=='0'){
							$stattendance .="<button class='btn-sm btn-danger'><i class='ti-close'> Absent</i></button>";
							}else{ 
							$stattendance .= "<button class='btn-sm btn-success'><i class='ti-check'> Present</i></button>";
						}
						
				$stattendance .="</td>";
				$stattendance .="<td>";
						if($value=='0'){
							 $stattendance .="No Data";
							}else{ 
								if(is_array($value) && !empty($value)){
								$stattendance .= $value['location'];
							}
						}
				$stattendance .="</td>";
				$stattendance .="<td>";
						if($value=='0'){
							 $stattendance .="No data";
							}else{ 
							if(is_array($value) && !empty($value)){
							$baseurl = base_url('/'); 
							$stattendance .="<img src='$baseurl.$value[photo]' alt='Attendance image'>";
							}
						}
				$stattendance .="</td>";
				$stattendance .="</tr>";
					}}
				}
			$stattendance .="</tbody>";
		$stattendance .="</table>";
		echo $stattendance;
		
	}
}