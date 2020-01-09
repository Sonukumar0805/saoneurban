<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                    <div class="pull-left">
                        <a href="<?php echo base_url("clients/clientlist"); ?>" class="btn btn-sm btn-primary"><i class="ti-view-list-alt"></i> Clients List</a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('clients/clientlist'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="<?php echo base_url('clients/addclient');?>" method="POST">
                    	<div class="form-group row"> 
                        	<label class="col-sm-4 text-danger">Client Details</label>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
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
                        	<label class="col-sm-4 text-danger">Company Details</label>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Company Name <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Mobile <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="company_mobile" id="company_mobile" maxlength="10" class="form-control" placeholder="Enter Mobile" required>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                            </div>
                            <label class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-4">
                                <input type="text" name="c_website" id="c_website" class="form-control" placeholder="Enter Company Website">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                                <textarea rows="3" cols="5" name="company_address" id="company_address" class="form-control" placeholder="Company Address"></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Registration No.</label>
                            <div class="col-sm-4">
                                <input type="text" name="registration_no" id="registration_no" class="form-control" placeholder="Enter Registration No.">
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
