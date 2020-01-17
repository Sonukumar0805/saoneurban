<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="row">
                        <div class="pull-right col-md-3 ">
                            <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                        </div>
                    	<div class="form-group col-md-3 ">
                            <label class="text-danger"> SELECT Staff </label>
                            <select name="staff_id" id="staff_id" class="form-control select2">
                                <option value="">Select Staff </option>
                                <?php 
									if(is_array($stafflist)){
										foreach($stafflist as $list){
									?>
                                    <option value="<?php echo $list['id'] ;?>"><?php echo $list['name'] ;?></option>
							  	<?php
                                    }
                                 }
								 $date = date('Y-m-d');
								 $month = date('F',strtotime($date));
								 $year = date('Y',strtotime($date));
							 	?>
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
                  </div>
                </div>
                <div class="card-block">
                	<div class="row">
                    	<div class="col-md-12 table-responsive">
                    		<table class="table data-table stripe hover nowrap" id="stattendance">
                                <thead>
                                    <tr class="bg-danger">
                                        <th class="table-plus" id="t-border">Sl No.</th>
                                        <th id="t-border">Date</th>
                                        <th id="t-border">Attendance</th>
                                        <th id="t-border">Location</th>
                                        <th id="t-border">Photo</th>
                                    </tr>
                                </thead>
                                <!--<tbody>
                                    <?php
                                    /*if(is_array($attendancelist)){								
                                        foreach($attendancelist as $key=>$list){
											$i=0;			
											foreach($list as $ekey=>$value){$i++;
												$month = $list['month'];
												$year = $list['year'];
												if($ekey=='id'||$ekey =='staff_id'||$ekey=='month' ||$ekey == 'year'|| $ekey=='status'){continue;}
												$day = str_replace('d_','',$ekey);
												$days = $day.'-'.$month.'-'.$year;*/
												//$date = date('Y-m-d',strtotime($days));
                                            	//if(date('m',strtotime($list[$i]['date'])) == date('m')){
                                    ?>
                                    <tr>
                                        <td><?php // echo $day; ?></td>
                                        <td><?php //echo $days; ?></td>
                                        <td>
											<?php //if($value=='0'){
												/*echo "<button class='btn-sm btn-danger'><i class='ti-close'> Absent</i></button>";
												}else{ 
												echo "<button class='btn-sm btn-success'><i class='ti-check'> Present</i></button>";
											}*/
											?>
                                        </td>
                                        <td>
											<?php //if($value=='0'){
												/*echo "No Data";
												}else{ 
													echo $value['location'];
											}*/
											?>
                                        </td>
                                        <td>
											<?php //if($value=='0'){
												/*echo "No data";
												}else{ 
												$baseurl = base_url('/'); 
												echo "<img src='$baseurl.$value[photo]' alt='Attendance image'>";
											}*/
											?>
                                        </td>
                                    </tr>
                                    <?php
                                       // }}
									//}
                                    ?>
                                </tbody>-->
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
	$('.select2').select2();
       	$('body').on('change','#staff_id',function(){
			var staff_id = $(this).val();
			var year = $('#year').val();
			var month = $('#month').val();
			//alert(month);alert(year);alert(staff_id);
			$.ajax({
				url:"<?php echo base_url('staff/staffattendancelist/')?>",//+student_id,
				method:"POST",
				data:{year:year,month:month,staff_id:staff_id},
				success:function(data){
					$('#stattendance').html(data);
				}
			});
		});
    });
</script>