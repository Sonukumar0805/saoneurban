<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                    <div class="pull-left">
                        <a href="<?php echo base_url("clients/agreements"); ?>" class="btn btn-sm bg-primary"><i class="ti-plus"></i> Add Agreements</a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('clients/agreements'); ?>" class="btn btn-sm bg-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table data-table stripe table-bordered table-responsive" width="100%">
                            <thead> 
                                <tr class="bg-success">
                                    <th class="table-plus" id="t-border">Sl. NO.</th>
                                    <th id="t-border">Date</th>
                                    <th id="t-border">Client name</th>
                                    <th id="t-border">Man Power</th>
                                    <th id="t-border">No. of Person</th>
                                    <th id="t-border">Perday Rate</th>
                                    <th id="t-border">Monthly Rate</th>
                                    <th id="t-border" class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
                                    if(is_array($agreements)){$i = 0;
                                        foreach($agreements as $list){
                                ?>
                                <tr>
                                    <td id="t-border"><?php echo ++$i; ?></td>
                                    <td class="table-plus" id="t-border"><?php echo $list['date']; ?></td>
                                    <td id="t-border"><?php echo $list['name']; ?></td>
                                    <td id="t-border"><?php echo $list['man_power']; ?></td>
                                    <td id="t-border"><?php echo $list['person_no']; ?></td>
                                    <td id="t-border"><?php echo $list['perday_rate']; ?></td>
                                    <td id="t-border"><?php echo $list['monthly_rate']; ?></td>
                                    <td id="t-border">
                                        <a href="<?php echo base_url('clients/editagreements/'.md5($list['id']));?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
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
		//$.fn.dataTable.FixedHeader('.data-table');
		
		$('body').on('click','.delete',function(){
			var dlt = $(this).attr('value');
			var prompt = confirm("Are you sure you want to delete? Your imporatant data may be loss.");
			if(prompt){
				$.ajax({
					url:"<?php echo base_url('clients/deleteagreements')?>",
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
		
	});
</script>
