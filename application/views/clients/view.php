<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                    <div class="pull-left">
                        <a href="<?php echo base_url("clients"); ?>" class="btn btn-sm bg-primary"><i class="ti-plus"></i> Add Clients</a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('clients'); ?>" class="btn btn-sm bg-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                	<div class="row">
                    	<div class="col-md-12 table-responsive">
                    		<table class="table data-table stripe table-bordered" width="100%">
                                <thead> 
                                    <tr class="bg-success">
                                        <th class="table-plus" id="t-border">Sl. NO.</th>
                                        <th id="t-border">Name</th>
                                        <th id="t-border">Mobile</th>
                                        <th id="t-border">Gender</th>
                                        <th id="t-border">Company Name</th>
                                        <th id="t-border">Email</th>
                                        <th id="t-border">Website</th>
                                        <th id="t-border">Registration No.</th>
                                        <th id="t-border">Address</th>
                                        <th id="t-border" class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(is_array($clients)){$i = 0;
                                            foreach($clients as $client){
                                    ?>
                                    <tr>
                                        <td id="t-border"><?php echo ++$i; ?></td>
                                        <td class="table-plus" id="t-border"><?php echo $client['name']; ?></td>
                                        <td id="t-border"><?php echo $client['mobile']; ?></td>
                                        <td id="t-border"><?php echo $client['gender']; ?></td>
                                        <td id="t-border"><?php echo $client['company_name']; ?></td>
                                        <td id="t-border"><?php echo $client['email']; ?></td>
                                        <td id="t-border"><?php echo $client['c_website']; ?></td>
                                        <td id="t-border"><?php echo $client['registration_no']; ?></td>
                                        <td id="t-border"><?php echo $client['address'].' '.$client['district'].' '.$client['state']; ?></td>
                                       <td id="t-border">
                                            <a href="<?php echo base_url('clients/editclient/'.md5($client['id']));?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                            <button type="button" class="btn btn-sm bg-danger delete" value="<?php echo $client['id']?>"><i class="ti-trash"></i> Delete</button>
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
    </div>
  </div>
  <script>
	$(document).ready(function(e) {
		
		$('body').on('click','.delete',function(){
			var dlt = $(this).attr('value');
			var prompt = confirm("Are you sure you want to delete? Your imporatant data may be loss.");
			if(prompt){
				$.ajax({
					url:"<?php echo base_url('clients/deleteclient')?>",
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
		$.fn.dataTable.FixedHeader('.data-table');
		
		
	});
</script>
