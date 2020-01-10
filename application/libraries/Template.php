<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Template{
    var $ci;
	private $styles=array("link"=>array(),"file"=>array());
	private $top_script=array("link"=>array(),"file"=>array());
	private $bottom_script=array("link"=>array(),"file"=>array());
      
    function __construct() {
	   $this->ci =& get_instance();	   
	   $this->session_role = $this->ci->session->role;
    }
	
    function load($folder, $view, $data) {
		
		if(isset($data['auth_role'])){
			$roles = explode(',',$data['auth_role']);
			if(in_array($this->session_role,$roles)){
				$location=$folder.'/';
		    
				if(!empty($data['styles'])){ 
					$styles=$data['styles'];
					foreach($styles as $key=>$style){
						if(is_array($style)){
							foreach($style as $single_style){
								if(array_search($single_style,$this->styles[$key])===false)
									$this->styles[$key][]=$single_style;
							}
						}
						else{
							if(array_search($style,$this->styles[$key])===false)
								$this->styles[$key][]=$style;
						}
					}
				}
				
				if(!empty($data['top_script'])){ 
					$top_script=$data['top_script'];
					foreach($top_script as $key=>$script){
						if(is_array($script)){
							foreach($script as $single_script){
								if(array_search($single_script,$this->top_script[$key])===false)
									$this->top_script[$key][]=$single_script;
							}
						}
						else{
							if(array_search($script,$this->top_script[$key])===false)
								$this->top_script[$key][]=$script;
						}
					}
				}
				
				if(!empty($data['bottom_script'])){ 
					$bottom_script=$data['bottom_script'];
					foreach($bottom_script as $key=>$script){
						if(is_array($script)){
							foreach($script as $single_script){
								if(array_search($single_script,$this->bottom_script[$key])===false)
									$this->bottom_script[$key][]=$single_script;
							}
						}
						else{
							if(array_search($script,$this->bottom_script[$key])===false)
								$this->bottom_script[$key][]=$script;
						}
					}
				}
				if(isset($data['datatable']) && $data['datatable']===true){
					
					$this->loaddatatable();
				}
				if(isset($data['export']) && $data['export']===true){
					//$this->loaddatatableexport();
				}
				if(isset($data['select2']) && $data['select2']===true){
					$this->loadselect2();
				}
				if(isset($data['chartjs']) && $data['chartjs']===true){
					$this->loadchartjs();
				}
				if(isset($data['rangepicker']) && $data['rangepicker']===true){
					$this->loadrangepicker();
				}
				$data['styles']=$this->styles;
				$data['top_script']=$this->top_script;
				$data['bottom_script']=$this->bottom_script;
				$data['user']['photo']=file_url("assets/images/blank.png");
				$data['remember']='';
				$this->ci->load->view('includes/top_section',$data);
				$this->ci->load->view('includes/header');
				$this->ci->load->view('includes/sidebar');
				$this->ci->load->view('includes/breadcrumb');
				$this->ci->load->view($location.$view);
				$this->ci->load->view('includes/bottom_section');
			}
			else{
				//$this->ci->session->sess_destroy();
				redirect('dashboard');
			}
		}
		else{
			$location=$folder.'/';
		
			if(!empty($data['styles'])){ 
				$styles=$data['styles'];
				foreach($styles as $key=>$style){
					if(is_array($style)){
						foreach($style as $single_style){
							if(array_search($single_style,$this->styles[$key])===false)
								$this->styles[$key][]=$single_style;
						}
					}
					else{
						if(array_search($style,$this->styles[$key])===false)
							$this->styles[$key][]=$style;
					}
				}
			}
			
			if(!empty($data['top_script'])){ 
				$top_script=$data['top_script'];
				foreach($top_script as $key=>$script){
					if(is_array($script)){
						foreach($script as $single_script){
							if(array_search($single_script,$this->top_script[$key])===false)
								$this->top_script[$key][]=$single_script;
						}
					}
					else{
						if(array_search($script,$this->top_script[$key])===false)
							$this->top_script[$key][]=$script;
					}
				}
			}
			
			if(!empty($data['bottom_script'])){ 
				$bottom_script=$data['bottom_script'];
				foreach($bottom_script as $key=>$script){
					if(is_array($script)){
						foreach($script as $single_script){
							if(array_search($single_script,$this->bottom_script[$key])===false)
								$this->bottom_script[$key][]=$single_script;
						}
					}
					else{
						if(array_search($script,$this->bottom_script[$key])===false)
							$this->bottom_script[$key][]=$script;
					}
				}
			}
			if(isset($data['datatable']) && $data['datatable']===true){
				
				$this->loaddatatable();
			}
			if(isset($data['export']) && $data['export']===true){
				$this->loaddatatableexport();
			}
			if(isset($data['select2']) && $data['select2']===true){
				$this->loadselect2();
			}
			if(isset($data['chartjs']) && $data['chartjs']===true){
				$this->loadchartjs();
			}
			if(isset($data['rangepicker']) && $data['rangepicker']===true){
				$this->loadrangepicker();
			}
			$data['styles']=$this->styles;
			$data['top_script']=$this->top_script;
			$data['bottom_script']=$this->bottom_script;
			$data['user']['photo']=file_url("assets/images/blank.png");
			$data['remember']='';
			$this->ci->load->view('includes/top_section',$data);
			$this->ci->load->view('includes/header');
			$this->ci->load->view('includes/sidebar');
			$this->ci->load->view('includes/breadcrumb');
			$this->ci->load->view($location.$view);
			$this->ci->load->view('includes/bottom_section');
		}
		
	}
	
	function loaddatatable(){
		//new
		//$this->styles['link'][]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css";
		////
		$this->styles['link'][]="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css";
		//$this->styles['link'][]="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css";
		//$this->styles['link'][]="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css";
		$this->top_script['link'][]="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js";
		$this->top_script['link'][]="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js";
		//$this->top_script['link'][]="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js";
		//$this->top_script['link'][]="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js";
		//$this->top_script['link'][]="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js";
		//$this->top_script['link'][]="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js";
		//$this->top_script['link'][]="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js";
	}

	function loaddatatableexport(){		
		$this->styles['link'][]="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css";
		$this->top_script['link'][]="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js";
		$this->top_script['link'][]="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"; 
		$this->top_script['link'][]="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"; 
		$this->top_script['link'][]="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"; 
		$this->top_script['link'][]="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"; 
		
	}
	
	function loadselect2(){
		$this->styles['file'][]="includes/plugins/select2-4.0.12/select2.min.css";
		$this->bottom_script['file'][]="includes/plugins/select2-4.0.12/select2.full.min.js";
	}
	
	function loadchartjs(){
		$this->styles['file'][]="includes/plugins/chartjs/Chart.min.css";
		$this->top_script['file'][]="includes/plugins/chartjs/Chart.min.js";
	}
	
	function loadrangepicker(){
		$this->styles['file'][]="plugins/daterangepicker/daterangepicker.css";
		$this->bottom_script['link'][]="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js";
		$this->bottom_script['file'][]="plugins/daterangepicker/daterangepicker.js";
	}
}
