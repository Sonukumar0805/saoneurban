<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-right">
                        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table data-table stripe hover nowrap table-bordered">
                        <thead>
                            <tr id="table-color" class="bg-success">
                                <th class="table-plus" id="t-border">Sl No</th>
                                <th id="t-border">Name</th>
                                <th id="t-border">Staff Id</th>
                                <th id="t-border">Mobile</th>
                                <th id="t-border">Address</th>
                                <th id="t-border">Designation</th>
                                <th id="t-border">Basic Salary</th>
                                <th id="t-border" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(is_array($stafflist)){$i=0;
                                foreach($stafflist as $staff){
                            ?>
                            <tr>
                                <td class="table-plus" id="t-border"><?php echo ++$i; ?></td>
                                <td id="t-border"><?php echo $staff['name']; ?></td>
                                <td id="t-border"><?php echo $staff['emp_id']; ?></td>
                                <td id="t-border"><?php echo $staff['mobile']; ?></td>
                                <td id="t-border"><?php echo $staff['address'].', '.$staff['district'].', '.$staff['state']; ?></td>
                                <td id="t-border"><?php echo $staff['designation']; ?></td>
                                <td id="t-border"><?php echo $staff['basic_salary']; ?></td>
                                <td id="t-border">
                                    <!--<a href="<?php //echo base_url('staff/editstaff/'.$staff['id']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="" value="<?php //echo $staff['id'] ;?>" style="color:#ffffff !important;" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i> Delete</a>-->
                                    <a href="<?php echo base_url('staffsalary/salaryledger/'.$staff['id']); ?> "style="color:#ffffff !important;" class="btn btn-sm btn-primary"><i class="ti-eye"></i> Salary Ledger</a>
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