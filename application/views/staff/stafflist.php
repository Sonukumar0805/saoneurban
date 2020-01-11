<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-left">
                        <a href="<?php echo base_url("staff"); ?>" class="btn btn-sm btn-primary"><i class="ti-plus"></i> Add Staff</a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('staff'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                	<table class="table data-table stripe hover nowrap table-responsive">
                        <thead>
                            <tr class="bg-danger">
                                <th class="table-plus" id="t-border">Sl No.</th>
                                <th id="t-border">Name</th>
                                <th id="t-border">Mobile</th>
                                <th id="t-border">DOb</th>
                                <th id="t-border">Employee ID</th>
                                <th id="t-border">Gender</th>
                                <th id="t-border">DOJ</th>
                                <th id="t-border">Aadhar</th>
                                <th id="t-border">Basic Salary</th>
                                <th id="t-border">Designation</th>
                                <th id="t-border">Address</th>
                                <th id="t-border">Photo</th>
                                <th id="t-border" class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(is_array($stafflist)){$i=0;
                                foreach($stafflist as $list){$i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list['name']; ?></td>
                                <td><?php echo $list['mobile']; ?></td>
                                <td><?php echo $list['dob']; ?></td>
                                <td><?php echo $list['email']; ?></td>
                                <td><?php echo $list['emp_id']; ?></td>
                                <td><?php echo $list['gender']; ?></td>
                                <td><?php echo $list['doj'];?> </td> 
                                <td><?php echo $list['aadhar']; ?></td>
                                <td><?php echo $list['basic_salary']; ?></td>
                                <td><?php echo $list['address']; ?></td>
                                <td><img src="<?php echo base_url('/').$list['photo']?>" alt="Staff Image" id="target" height="120" width="100"></td>
                                <td>
                                    <a href="<?php echo base_url('staff/editstaff/'.md5($list['id'])); ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="button" class="btn btn-sm bg-danger delete" value="<?php echo $list['id']?>"><i class="ti-trash"></i> Delete</button>
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
		
		$('body').on('click','.delete',function(){
			var dlt = $(this).attr('value');
			var prompt = confirm("Are you sure you want to delete? Your imporatant data may be loss.");
			if(prompt){
				$.ajax({
					url:"<?php echo base_url('staff/deletestaff')?>",
					method:"POST",
					data:{id:dlt},
					success:function(data){
						location.reload();
					}
				});
			}
			else{
				return false;
			}
		});
		
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