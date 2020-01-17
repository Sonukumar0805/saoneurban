<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-right">
                        <a href="<?php echo base_url('staffsalary/stafflist'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table data-table stripe hover nowrap table-bordered">
                        <thead>
                            <tr id="table-color" class="bg-success">
                                <th class="table-plus" id="t-border">Sl No</th>
                                <th id="t-border">Moth & Year</th>
                                <th id="t-border">Basic Salary</th>
                                <th id="t-border">working Days</th> 
                                <th id="t-border">Holidays</th>
                                <th id="t-border">Payable Leave</th>
                                <th id="t-border">Deductible Leave</th>
                                <th id="t-border">HRA</th>
                                <th id="t-border">PF</th>
                                <th id="t-border">ESI</th>
                                <th id="t-border">Total PF</th>
                                <th id="t-border">Advance</th>
                                <th id="t-border">Total Salary</th>
                                <th id="t-border" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(is_array($salary)){$i=0;$pf= 0;
                                foreach($salary as $list){
                                    $pf += $list['pf'];	
                                    $adv = $list['advance'];
                                    $total = $list['all_total']+$adv;	
                            ?>
                            <tr>
                                <td class="table-plus" id="t-border"><?php echo ++$i; ?></td>
                                <td id="t-border"><?php echo $list['month'].'-'.$list['year']; ?></td>
                                <td id="t-border"><?php echo " Rs. " .$list['basic_salary'];?></td>
                                <td id="t-border"><?php echo $list['working_days'] ;?></td>
                                <td id="t-border"><?php echo $list['holidays'] ;?></td>
                                <td id="t-border"><?php echo $list['paid_leave'] ;?></td>
                                <td id="t-border"><?php echo $list['total_leave'] ;?></td>
                                <td id="t-border"><?php echo $list['hra'] ;?></td>
                                <td id="t-border"><?php echo $list['pf'];?></td>
                                <td id="t-border"><?php echo $list['esi'] ;?></td>
                                <td id="t-border"><?php echo $pf;?></td>
                                <td id="t-border"><?php echo abs($adv) ;?></td>
                                <td id="t-border"><?php echo " Rs. ".$total;?></td>
                                <td id="t-border">
                                    <a href='<?php echo base_url("staffsalary/print_monthly/$list[id]/$list[staff_id]/"); ?>' class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Print</a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
<script>
	$(document).ready(function(e) {
		var table=$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});
		new $.fn.dataTable.FixedHeader( table );
	});
</script>