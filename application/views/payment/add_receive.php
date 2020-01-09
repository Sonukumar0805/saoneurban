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
                        	<label class="col-sm-4 text-danger">Client Details</label>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Clients <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <select name="client_id" id="client_id" class="form-control select2">
                                	<option value="">Select Clients</option>
                                	<?php
										if(is_array($clients)){ 
											foreach($clients as $client){
									?>
                                    <option value="<?php echo $client['id']?>"><?php echo $client['name']?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label"> Mobile <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="mobile" id="mobile" maxlength="10" class="form-control" placeholder="Enter Mobile" required>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Aadhar</label>
                            <div class="col-sm-4">
                                <input type="text" name="aadhar" id="aadhar" class="form-control" placeholder="Enter Aadhar">
                            </div>
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-4">
                                <select name="gender" id="gender" class="form-control">
                                	<option value="">Select Gender</option>
                                	<option value="Male">Male</option>
                                	<option value="Female">Female</option>
                                	<option value="Others">Others</option>
                                </select>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">District</label>
                            <div class="col-sm-4">
                                <input type="text" name="district" id="district" class="form-control" placeholder="Enter District">
                            </div>
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-4">
                                <input type="text" name="state" id="state" class="form-control" placeholder="Enter State">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                                <textarea rows="3" cols="5" name="address" id="address" class="form-control" placeholder="Address"></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Pincode</label>
                            <div class="col-sm-4">
                                <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <input type="submit" name="addclient" value="Add Client" class="btn btn-sn bg-c-lite-green">
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
		$('.select2').select2();
	});
</script>