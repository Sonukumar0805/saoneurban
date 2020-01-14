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
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="<?php echo base_url('master/expensehead/addexpensehead');?>" method="POST" id="myform">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"> Expense Head <span class="text-danger">*</span> </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Expense Head" required>
                                    </div> 
                                </div>
                                <input type="text" id="id" class="form-control hidden">
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="submit" name="addexpensehead" id="submit-btn" value="Add Expense Head" class="btn btn-sm bg-primary">
                                    </div>
                                    <div class="col-sm-4">
                                    	<button type="button" class="btn bg-danger btn-sm cancel-edit hidden"> Cancel </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       <div class="col-sm-6 table-responsive">
                            <table class="table data-table stripe hover nowrap table-bordered">
                                <thead> 
                                    <tr class="bg-success">
                                        <th >Sl. NO.</th>
                                        <th > Expense Head </th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(is_array($expensehead)){$i = 0;
                                            foreach($expensehead as $list){
                                    ?>
                                    <tr>
                                        <td ><?php echo ++$i; ?></td>
                                        <td ><?php echo $list['name']; ?></td>
                                        <td >
                                            <button type="button" class="btn btn-sm bg-warning edit-btn" value="<?php echo $list['id']?>"> <i class="ti-pencil"></i> Edit</button>
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
		//new $.fn.dataTable.FixedHeader('.data-table');
		
		$('body').on('click','.edit-btn',function(){
			$('.cancel-edit').removeClass('hidden');
			$('#name').val($(this).closest('tr').children().eq(1).text()).focus();
			$('#id').val($(this).val());
			$('#id').attr('name','id');
			$('#myform').attr('action','<?php echo base_url('master/expensehead/updateexpensehead');?>');
			$('#submit-btn').attr('name','updateexpensehead');
			$('#submit-btn').attr('value','Update Expensehead');
		});
		
		$('body').on('click','.cancel-edit',function(){
			$(this).addClass('hidden');
			$('#name').val('');
			$('#id').val('');
			$('#id').removeAttr('name');
			$('#myform').attr('action','<?php echo base_url('master/expensehead/addexpensehead') ;?>');
			$('#submit-btn').attr('name','addexpensehead');
			$('#submit-btn').attr('value','Update Expensehead');
		});
		
		$('body').on('click','.delete',function(){
			var dlt = $(this).attr('value');
			var prompt = confirm("Are you sure you want to delete? Your imporatant data may be loss.");
			if(prompt){
				$.ajax({
					url:"<?php echo base_url('master/expensehead/deleteexpensehead')?>",
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