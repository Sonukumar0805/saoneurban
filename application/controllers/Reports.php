<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	public function index(){}
	
	public function expenselist(){
		$data['title'] = "Expence List";
		$data['breadcrumb'] = array('dashboard'=>'Dashboard');
		$data['datatable'] = true;
		$date = date('Y-m-d');
		$month = date('m',strtotime($date));
		$year = date('Y',strtotime($date));
		$expenses = $this->Expense_model->getexpense(array('t1.month'=>$month,'t1.year'=>$year,'t1.status'=>'1'),'all');
		$data['expenses'] = $expenses;
		$this->template->load('reports','expenselist',$data);
	}
	
	public function monthlyexpenses(){
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$m = date('m',strtotime($month));
		$expenses = $this->Expense_model->getexpense(array('t1.month'=>$m,'t1.year'=>$year,'t1.status'=>'1'),'all');
		//echo PRE;
		//print_r($expenses);die;
		$expense = '';
		$expense .="<table class='table data-table stripe hover nowrap table-bordered' id='monthlyexpense' style='width:100%' >";
			$expense .="<thead>"; 
				$expense .="<tr class='bg-success'>";
					$expense .="<th class='table-plus' id='t-border'>Sl. NO.</th>";
					$expense .="<th id='t-border'>Date</th>";
					$expense .="<th id='t-border'>Name</th>";
					$expense .="<th id='t-border'>Bill No.</th>";
					$expense .="<th id='t-border'>Expense Head</th>";
					$expense .="<th id='t-border'>Particulars</th>";
					$expense .="<th id='t-border'>Description</th>";
					$expense .="<th id='t-border'>Amount</th>";
				$expense .="</tr>";
			$expense .="</thead>";
			$expense .="<tbody>";
				   if(is_array($expenses)){
					   	$i = 0;$amount=0.00;$amt=0;
						foreach($expenses as $list){$i++;
							$amount+=$list['amount'];
							$amt = 'Total Monthly Expense of '.$month.'-'.$year.' is : '.$this->amount->toDecimal($amount).' Rs. ';
				$expense .="<tr>";
					$expense .="<td id='t-border'> $i </td>";
					$expense .="<td class='table-plus' id='t-border'> $list[name] </td>";
					$expense .="<td id='t-border'> $list[date] </td>";
					$expense .="<td id='t-border'> $list[bill_no] </td>";
					$expense .="<td id='t-border'> $list[expensehead] </td>";
					$expense .="<td id='t-border'> $list[particular] </td>";
					$expense .="<td id='t-border'> $list[description] </td>";
					$expense .="<td id='t-border'> $list[amount] </td>";
				$expense .="</tr>";
						}
					}
			$expense .="</tbody>";
			$expense .="<tfoot>";
				$expense .="<tr class='bg-primary text-center'>";
					$expense .="<td colspan='8'>$amt</td>";
				$expense .="</tr>";
			$expense .="</tfoot>";
		$expense .="</table>";
		echo $expense;
	}
}