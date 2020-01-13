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
                    <form action="<?php echo base_url('clients/updateclient');?>" method="POST">
                    	<div class="form-group row"> 
                        	<label class="col-sm-4 text-danger">Client Details</label>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="name" id="name" value="<?php echo $client['name'];?>" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <label class="col-sm-2 col-form-label"> Mobile <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="mobile" id="mobile" value="<?php echo $client['mobile'];?>" maxlength="10" class="form-control" placeholder="Enter Mobile" required>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Aadhar</label>
                            <div class="col-sm-4">
                                <input type="text" name="aadhar" id="aadhar" value="<?php echo $client['aadhar'];?>" class="form-control" placeholder="Enter Aadhar">
                            </div>
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-4">
                                <select name="gender" id="gender" class="form-control">
                                	<option value="">Select Gender</option>
                                	<option value="Male"<?php if($client['gender']== "Male"){echo "selected";}?>>Male</option>
                                	<option value="Female"<?php if($client['gender']== "Female"){echo "selected";}?>>Female</option>
                                	<option value="Others"<?php if($client['gender']== "Others"){echo "selected";}?>>Others</option>
                                </select>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">District</label>
                            <div class="col-sm-4">
                                <input type="text" name="district" id="district" value="<?php echo $client['district'];?>" class="form-control" placeholder="Enter District">
                            </div>
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-4">
                                <input type="text" name="state" id="state" value="<?php echo $client['state'];?>" class="form-control" placeholder="Enter State">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                                <textarea rows="3" cols="5" name="address" id="address" class="form-control" placeholder="Address"><?php echo $client['address'];?></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Pincode</label>
                            <div class="col-sm-4">
                                <input type="text" name="pincode" id="pincode" value="<?php echo $client['pincode'];?>" class="form-control" placeholder="Enter Pincode">
                            </div>
                        </div>
                        <div class="form-group row"> 
                        	<label class="col-sm-4 text-danger">Company Details</label>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Company Name <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="company_name" id="company_name" value="<?php echo $client['company_name'];?>" class="form-control" placeholder="Enter Company Name" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Mobile <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="company_mobile" id="company_mobile" value="<?php echo $client['company_mobile'];?>" maxlength="10" class="form-control" placeholder="Enter Company Mobile" required>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="email" name="email" id="email" value="<?php echo $client['email'];?>" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Website <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="c_website" id="c_website" value="<?php echo $client['c_website'];?>" class="form-control" placeholder="Enter Company Website" required>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <textarea rows="3" cols="5" name="company_address" id="company_address" class="form-control" placeholder="Company Address" required><?php echo $client['company_address'];?></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Registration No.</label>
                            <div class="col-sm-4">
                                <input type="text" name="registration_no" id="registration_no" value="<?php echo $client['registration_no'];?>" class="form-control" placeholder="Enter Registration No.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                            	<input type="hidden" name="id" id="id" value="<?php echo $client['id'];?>">
                                <input type="submit" name="updateclient" value="Update Client" class="btn btn-sn bg-primary">
                            </div>
                            <div class="col-sm-3">
                                <a href="<?php echo base_url('clients/clientlist'); ?>" class="btn btn-sm bg-danger"> Cancel</a>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
  </div>
