<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-left">
                        <a href="<?php echo base_url("staff/stafflist"); ?>" class="btn btn-sm btn-primary"><i class="ti-view-list-alt"></i> Staff List</a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('staff/stafflist'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="<?php echo base_url('staff/updatestaff');?>" method="POST" enctype="multipart/form-data">
                    	<div class="form-group row"> 
                        	<label class="col-sm-4 text-danger">Staff Details</label>
                        </div>
                        <div class="row form-group">
                                <div class="col-md-1"></div>
                                <div class="col-sm-12 col-md-6">
                                	<div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-8">
                                            <?php 
                                                $data = array('name' => 'name', 'id'=> 'name','value'=>$staff['name'],'placeholder'=>'Name', 'class'=>'form-control', 'required'=>'true');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Father's Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-8">
                                            <?php 
                                                $data = array('name' => 'father', 'id'=> 'father','value'=>$staff['father'], 'placeholder'=>'Father\'s Name', 'class'=>'form-control', 'required'=>'true');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Photo</label>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-12 col-md-8">
                                            <?php 
												$data = array('type' => 'date', 'name'=> 'dob','value'=>$staff['dob'], 'id'=>'dob', 'class'=>'form-control');
												echo form_input($data); 
											?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Gender <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-8">	
                                            <?php
												$gender=array(""=>"Select Gender","Male"=>"Male","Female"=>"Female");
												echo form_dropdown('gender',$gender,$staff['gender'],array("class"=>"form-control","required"=>"true"));
											?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">                                    
                                    <div class="col-sm-12 col-md-4">
                                        <div style="width:150px; height:180px; border:1px solid #CCCCCC;">
                                            <img src="<?php echo base_url('/').$staff['photo']?>" alt="" id="target" height="180" width="150">
                                        </div>
                                        <?php 
                                            $data = array('type'=>'file', 'name' => 'photo', 'id'=> 'photo');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                 </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">Mobile</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'mobile','id'=> 'mobile','value' => $staff['mobile'],'placeholder'=>'Mobile','class'=>'form-control','maxlength'=>'10');
                                        echo form_input($data); 
                                    ?>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">Email</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('type' => 'email', 'name'=> 'email', 'id'=>'email', 'value' =>$staff['email'], 'placeholder'=>'Email', 'class'=>'form-control');
                                        echo form_input($data); 
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">Address</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'address', 'id'=> 'address', 'value'=>$staff['address'],'placeholder'=>'Address', 'class'=>'form-control', 'rows'=>'3');
                                        echo form_textarea($data); 
                                    ?>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">Town</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'town', 'id'=> 'town', 'value'=>$staff['town'], 'placeholder'=>'Town', 'class'=>'form-control');
                                        echo form_input($data); 
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">District</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'district', 'id'=> 'district', 'value'=> $staff['district'],'placeholder'=>'District', 'class'=>'form-control');
                                        echo form_input($data); 
                                    ?>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">State</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'state', 'id'=> 'state', 'value'=> $staff['state'], 'placeholder'=>'State', 'class'=>'form-control');
                                        echo form_input($data); 
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">UID</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'aadhar', 'id'=> 'aadhar','value' => $staff['aadhar'], 'placeholder'=>'Aadhar/UID', 'class'=>'form-control');
                                        echo form_input($data); 
                                    ?>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">Bank A/c No.</label>
                                <div class="col-sm-12 col-md-4">
                                    <?php 
                                        $data = array('name' => 'bank_ac', 'id'=> 'bank_ac', 'value' => $staff['bank_ac'], 'placeholder'=>'Bank a/c No.', 'class'=>'form-control');
                                        echo form_input($data); 
                                    ?>
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
                                                $data = array('type'=>'date', 'name' => 'doj', 'id'=> 'doj','value'=> $staff['doj'], 'class'=>'form-control', 'required'=> 'true');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Designation <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
												$designation=array(""=>"Select Designation","Guard"=>"Guard","Office Boy"=>"Office Boy","Manager"=>"Manager");
												echo form_dropdown('designation',$designation,$staff['designation'],array('id'=> 'designation',"class"=>"form-control","required"=>"true"));
                                            ?>
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Basic Salary <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'basic_salary', 'id'=>'basic_salary','value'=> $staff['basic_salary'], 'placeholder'=>'Salary', 'class'=>'form-control', 'required'=> 'true');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Per Day Salary</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'per_day_salary', 'id'=> 'per_day_salary','value'=> $staff['per_day_salary'], 'placeholder'=>'Per Day Salary', 'class'=>'form-control','readonly'=>'true');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">PF</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'pf', 'id'=> 'pf', 'placeholder'=>'PF','value'=> $staff['pf'], 'class'=>'form-control');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">HRA</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'hra', 'id'=> 'hra','value'=> $staff['hra'], 'placeholder'=>'House Rent Allowance', 'class'=>'form-control');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">ESI</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'esi', 'id'=> 'esi','value'=> $staff['pf'], 'placeholder'=>'ESI', 'class'=>'form-control');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Company PF No.</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'company_pf_no', 'id'=> 'company_pf_no','value'=> $staff['company_pf_no'], 'placeholder'=>'Company PF No.', 'class'=>'form-control');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">PF Account No.</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'pf_ac_no', 'id'=> 'pf_ac_no','value'=> $staff['pf_ac_no'], 'placeholder'=>'PF Account No.', 'class'=>'form-control');
                                                echo form_input($data); 
                                            ?>
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Income TAX No.</label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <?php 
                                                $data = array('name' => 'income_tax_no', 'id'=> 'income_tax_no','value'=> $staff['income_tax_no'], 'placeholder'=>'Income TAX No.', 'class'=>'form-control');
                                                echo form_input($data); 
												 echo form_hidden('id', $staff['id']);
                                            ?>
                                        </div>
                                      </div>
                                  </div>
                                <div class="col-md-1"></div>
                              </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <input type="submit" name="updatestaff" value="Update Staff" class="btn btn-md bg-primary">
                                </div>
                                <div class="col-sm-3">
                                    <a href="<?php echo base_url('staff/stafflist/'); ?>" class="btn btn-sm bg-danger"> Cancel </a>
                                </div>
                            </div>
                  	 </form>
                   </div>
                </div>
            </div>
        </div>
      </div>
<script>
	$(document).ready(function(e) {
		$('#basic_salary').keyup(function(e) {
			var basicsalary = $('#basic_salary').val();
			var days = '30';
			var perdaysalary = Number(basicsalary)/Number(days);
			//alert(perdaysalary);
			$('#per_day_salary').val(perdaysalary);
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