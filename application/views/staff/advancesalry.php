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
                  <form action="<?php //echo base_url('clients/addclient');?>" method="POST">
                  	<div class="form-group row"> 
                        <label class="col-sm-4 text-danger">Staff Details</label>
                    </div> 
                  	<div class="row form-group">
                        <div class="col-md-1"></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row form-group">
                                <label class="col-sm-12 col-md-2 col-form-label">Staff ID <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-8">
                                    <?php 
                                        $data = array('name' => 'emp_id','id'=> 'emp_id', 'placeholder'=>'Staff Id', 'class'=>'form-control', 'required'=>'true');
                                        echo form_input($data); 
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-12 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="hidden" id="id" name="staff_id">
                                    <?php 
                                        $data = array('id'=> 'name','placeholder'=>'Name', 'class'=>'form-control', 'required'=>'true','readonly' => 'true');
                                        echo form_input($data); 
                                    ?>
                                </div>
                                <label class="col-sm-12 col-md-2 col-form-label">Photo</label>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-12 col-md-2 col-form-label">Father's Name <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-8">
                                    <?php 
                                        $data = array('id'=> 'father','placeholder'=>'Father\'s Name', 'class'=>'form-control', 'required'=>'true', 'readonly' => 'true');
                                        echo form_input($data); 
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-12 col-md-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-12 col-md-8">
                                    <?php 
                                        $data = array('type' => 'date', 'id'=>'dob', 'class'=>'form-control','readonly' => 'true');
                                        echo form_input($data); 
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-12 col-md-2 col-form-label">Gender <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-8">
                                    <?php
                                        $gender=array(""=>"Select Gender","Male"=>"Male","Female"=>"Female");
                                        echo form_dropdown('gender',$gender,'',array("class"=>"form-control","required"=>"true",'readonly' => 'true','id'=>'gender'));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">                                    
                            <div class="col-sm-12 col-md-4">
                                <div style="width:150px; height:180px; border:1px solid #CCCCCC;">
                                    <img src="" alt="" id="photo" height="180" width="150">
                                </div>
                                <?php 
                                   // $data = array('type'=>'file', 'name' => 'photo', 'id'=> 'photo','readonly' => 'true');
                                   // echo form_input($data); 
                                ?>
                            </div>
                         </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-4 text-danger">Salary Details</label>
                    </div> 
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                         <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Date of Joining <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('type'=>'date', 'id'=> 'doj', 'class'=>'form-control', 'required'=> 'true','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Designation <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('id'=> 'designation', 'placeholder'=>'Designation', 'class'=>'form-control', 'required' => 'true','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                         </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Basic Salary <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name'=>'basic_salary','id'=> 'basic_salary', 'placeholder'=>'Basic Salary', 'class'=>'form-control', 'required'=> 'true','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Per Day Salary</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('id'=> 'per_day_salary', 'placeholder'=>'Per Day Salary', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">PF</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name'=>'pf','id'=> 'pf', 'placeholder'=>'PF', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">HRA</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name'=>'hra','id'=> 'hra', 'placeholder'=>'House Rent Allowance', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">ESI</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name'=>'esi','id'=> 'esi', 'placeholder'=>'ESI', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Company PF No.</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array( 'id'=> 'company_pf_no', 'placeholder'=>'Company PF No.', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                       </div>
                      </div>
                    <div class="col-md-1"></div>
                  </div>
                  <div class="form-group row"> 
                        <label class="col-sm-4 text-danger">Pay Salary </label>
                    </div> 
                  <div class="row">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="form-group row">
                     	 	<label class="col-sm-12 col-md-2 col-form-label">Month & Year <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-2 mb-10">
                                <?php 
                                    $data = array(''=>'Select Month','January'=>'January','February'=>'February','March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','November'=>'November','December'=>'December');
                                    echo form_dropdown('month',$data,'',array('id'=>'month','class'=>'form-control', 'required'=> 'true')); 
                                ?>
                            </div>
                             <div class="col-sm-12 col-md-2 mb-10">
                                <?php 
                                    $data = array(''=>'Select Year','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023','2024','2024','2025'=>'2025');
                                    echo form_dropdown('year',$data,'',array('id'=> 'year', 'class'=>'form-control', 'required'=> 'true')); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Working Days <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name' => 'working_days', 'id'=> 'working_days', 'placeholder'=>'Working Days', 'class'=>'form-control', 'required' => 'true');
                                    echo form_input($data); 
                                ?>     
                            </div>
                       </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Holidays <span class="text-danger">*</span></label>
                             <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name' => 'holidays', 'id'=> 'holidays', 'placeholder'=>'Holidays', 'class'=>'form-control', 'required' => 'true');
                                    echo form_input($data); 
                                ?>     
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label"> Paid Leave <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name' => 'paid_leave', 'id'=> 'paid_leave', 'placeholder'=>'Paid Leave', 'class'=>'form-control', 'required'=> 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label"> Deducted Leave <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name' => 'total_leave', 'id'=> 'total_leave', 'placeholder'=>'Deducted Leave', 'class'=>'form-control', 'required'=> 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Total Salary</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name' =>'total_salary', 'id'=> 'total_salary', 'placeholder'=>'Total Salary', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                       	</div>
                        <input type="hidden" name="all_total" id="all_total">
                        <input type="hidden" name="wdays_amount" id="wdays_amount">
                        <input type="hidden" name="leave_amount" id="leave_amount">
                        <input type="hidden" name="paid_salary" id="paid_salary">
                        <input type="hidden" name="deduction" id="deduction">
                     </div>
                   </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <input type="submit" name="addsalary" value="Add Salary" class="btn btn-sn bg-primary">
                        </div>
                    </div>
                 </form>
               </div>
            </div>
        </div>
    </div>
  </div>
<script>
<script>
$(document).ready(function(e){
    $('#emp_id').keyup(function(e){
        var emp_id = $('#emp_id').val();
		//alert(emp_id);
		$.ajax({
			url:"<?php //echo base_url('staff_salary/getstaff')?>",
			method:"POST",
			data:{emp_id:emp_id},
			success:function(data){
				//alert(data);
				var data = JSON.parse(data);
				var id = data.id;
				$('#id').val(data.id);
				$('#name').val(data.name);
				$('#father').val(data.father);
				$('#dob').val(data.dob);
				$('#gender').val(data.gender);
				$('#photo').attr('src',data.photo);
				$('#designation').val(data.designation);
				$('#basic_salary').val(data.basic_salary);
			}
		});
    });
	
	$('#advance').keyup(function(e) {
		//var basic_salary = $('#basic_salary').val();
		var advance = $('#advance').val();
        var basic_salary = $('#basic_salary').val();
		
		if(Number(advance) > Number(basic_salary)){
			alert("Advance can't be more than Basic Salary");
			$('#advance').val('');
		}
    });
	
});

	function showImage(src,target) {
		var fr=new FileReader();
		// when image is loaded, set the src of the image where you want to display it
		fr.onload = function(e) { target.src = this.result; };
		src.addEventListener("change",function() {
			// fill fr with image data    
			fr.readAsDataURL(src.files[0]);
		});
	}
	var src = document.getElementById("photo");
	var target = document.getElementById("target");
	showImage(src,target);
</script>