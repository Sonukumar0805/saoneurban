<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="row">
						<?php  
							 $date = date('Y-m-d');
							 $month = date('F',strtotime($date));
							 $year = date('Y',strtotime($date));
						?>
                        <div class="form-group col-md-3">
                            <label class="text-danger"> SELECT MONTH </label>
                            <select name="month" id="month" class="form-control">
                                <option value="">Select month </option>
                                <option value="January"<?php if($month == 'January'){echo "selected" ;}?>> January </option>
                                <option value="February"<?php if($month == 'February'){echo "selected" ;}?>> February </option>
                                <option value="March"<?php if($month == 'March'){echo "selected" ;}?>> March </option>
                                <option value="April"<?php if($month == 'April'){echo "selected" ;}?>> April </option>
                                <option value="May"<?php if($month == 'May'){echo "selected" ;}?>> May </option>
                                <option value="June"<?php if($month == 'June'){echo "selected" ;}?>> June </option>
                                <option value="July"<?php if($month == 'July'){echo "selected" ;}?>> July </option>
                                <option value="August"<?php if($month == 'August'){echo "selected" ;}?>> August </option>
                                <option value="September"<?php if($month == 'September'){echo "selected" ;}?>> September </option>
                                <option value="October"<?php if($month == 'October'){echo "selected" ;}?>> October </option>
                                <option value="November"<?php if($month == 'November'){echo "selected" ;}?>> November </option>
                                <option value="December"<?php if($month == 'December'){echo "selected" ;}?>> December </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label class="text-danger"> SELECT YEAR </label>
                            <select name="year" id="year" class="form-control">
                                <option value="">Select Year </option>
                                <option value="2019"<?php if($year == '2019'){echo "selected" ;}?>> 2019 </option>
                                <option value="2020"<?php if($year == '2020'){echo "selected" ;}?>> 2020 </option>
                                <option value="2021"<?php if($year == '2021'){echo "selected" ;}?>> 2021 </option>
                                <option value="2022"<?php if($year == '2022'){echo "selected" ;}?>> 2022 </option>
                                <option value="2023"<?php if($year == '2023'){echo "selected" ;}?>> 2023 </option>
                            </select>
                        </div>
                        <div class="pull-left col-md-5 ">
                        </div>
                        <div class="pull-right col-md-1 ">
                            <a href="<?php echo base_url('expenses'); ?>" class="btn btn-sm bg-primary"><i class="ti-arrow-left"></i> BACK</a>
                        </div>
                </div> 
                <div class="card-block">
                	<div class="row">
                    	<div class="col-md-12 table-responsive" id='monthlyexpense'>
                    		<table class='table data-table stripe hover nowrap table-bordered'  style='width:100%' >
                                <thead> 
                                    <tr class='bg-success'>
                                        <th class='table-plus' id='t-border'>Sl. NO.</th>
                                        <th id='t-border'>Date</th>
                                        <th id='t-border'>Name</th>
                                        <th id='t-border'>Bill No.</th>
                                        <th id='t-border'>Expense Head</th>
                                        <th id='t-border'>Particulars</th>
                                        <th id='t-border'>Description</th>
                                        <th id='t-border'>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       if(is_array($expenses)){$i = 0;$amount=0.00;
                                            foreach($expenses as $list){
                                    ?>
                                    <tr>
                                        <td id='t-border'><?php echo ++$i; ?></td>
                                        <td class="table-plus" id='t-border'><?php echo $list['name']; ?></td>
                                        <td id='t-border'><?php echo $list['date']; ?></td>
                                        <td id='t-border'><?php echo $list['bill_no']; ?></td>
                                        <td id='t-border'><?php echo $list['expensehead']; ?></td>
                                        <td id='t-border'><?php echo $list['particular']; ?></td>
                                        <td id='t-border'><?php echo $list['description']; ?></td>
                                        <td id='t-border'><?php $amount+=$list['amount']; echo $list['amount']; ?></td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                	<tr class='bg-primary text-center'>
                                    	<td colspan='8'>
                                        	<?php echo 'Total Monthly Expense in : '.$this->amount->toDecimal($amount);?>
                                            
                                        </td>
                                    </tr>
                                </tfoot>
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
		createdatable();
		$('body').on('change','#month',function(){
			var month = $(this).val();
			var year = $('#year').val();
			$.ajax({
				url:"<?php echo base_url('reports/monthlyexpenses/')?>",
				method:"POST",
				data:{year:year,month:month},
				success:function(data){
					$('#monthlyexpense').html(data);
					createdatable();
				}
			});
		});
		
	});
	
	function createdatable(){
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
	}
</script>
