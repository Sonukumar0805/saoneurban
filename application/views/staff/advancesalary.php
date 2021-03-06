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
                  <form action="<?php echo base_url('staffsalary/add_advance');?>" method="POST">
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
                                        echo form_dropdown('staff_id',$staff,'',array('id'=>'staff_id','class'=>'form-control select2','required'=>'true')); 
                                    ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-12 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="hidden" id="emp_id" name="emp_id">
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
                        <label class="col-sm-4 text-danger">Advance Salary </label>
                    </div> 
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                         <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $date = date('Y-m-d');
                                    $data = array('type'=>'date','name'=> 'date' ,'id'=> 'date', 'class'=>'form-control', 'required'=> 'true','value'=> $date );
                                    echo form_input($data); 
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Advance Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php
                                    $data = array('name' => 'advance','id'=> 'advance', 'placeholder'=>'Advance Amount', 'class'=>'form-control', 'required' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                         </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description<span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('name' => 'description', 'id'=> 'description', 'placeholder'=>'Description', 'class'=>'form-control', 'rows'=>'3','required' => 'true');
                                    echo form_textarea($data);
                                ?>
                            </div>
                            <label class="col-sm-12 col-md-2 col-form-label">Basic Salary</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('id'=> 'basic_salary', 'placeholder'=>'Basic Salary', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Designation</label>
                            <div class="col-sm-12 col-md-4 mb-10">
                                <?php 
                                    $data = array('id'=> 'designation', 'placeholder'=>'Designation', 'class'=>'form-control','readonly' => 'true');
                                    echo form_input($data); 
                                ?>
                            </div>
                        </div>
                      </div>
                    <div class="col-md-1"></div>
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
$(document).ready(function(e){
	$('#staff_id').select2();
    $('body').on('change','#staff_id',function(e){
        var staff_id = $('#staff_id').val();
		$.ajax({
			url:"<?php echo base_url('staffsalary/getsinglestaff')?>",
			method:"POST",
			data:{staff_id:staff_id},
			success:function(data){
				console.log(data);
				var data = JSON.parse(data);
				var id = data.id;
				var baseurl = "<?php echo base_url('/')?>";
				var pic = baseurl+data.photo;
				$('#id').val(data.id);
				$('#name').val(data.name);
				$('#emp_id').val(data.emp_id);
				$('#father').val(data.father);
				$('#dob').val(data.dob);
				$('#gender').val(data.gender);
				$('#photo').attr('src',pic);
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