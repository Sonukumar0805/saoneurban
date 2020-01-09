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
                            <label class="col-sm-2 col-form-label"> Clients <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <select name="client_id" id="client_id" class="select2 form-control ">
                                	<option value="">Select Clients</option>
                                	<?php
										if(is_array($clients)){ 
											foreach($clients as $client){
									?>
                                    <option value="<?php echo $client['id']?>"><?php echo $client['name']?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label"> Mobile </label>
                            <div class="col-sm-4">
                                <input type="text" id="mobile" maxlength="10" class="form-control" placeholder="Enter Mobile" readonly style="cursor:not-allowed;">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-4">
                                <input type="text" id="email" class="form-control" placeholder="Email" readonly style="cursor:not-allowed;">
                            </div>
                            <label class="col-sm-2 col-form-label">Registration No.</label>
                            <div class="col-sm-4">
                                <input type="text" id="registration" class="form-control" placeholder="Registration No." readonly style="cursor:not-allowed;">                            	
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-4">
                                <input type="text" id="c_website" class="form-control" placeholder="Website" readonly style="cursor:not-allowed;">
                            </div>
                            <label class="col-sm-2 col-form-label">State</label>
                            <div class="col-sm-4">
                                <input type="text" id="state" class="form-control" placeholder="State" readonly style="cursor:not-allowed;">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                                <textarea rows="3" cols="5" id="address" class="form-control" placeholder="Address" readonly style="cursor:not-allowed;"></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Dues</label>
                            <div class="col-sm-4">
                                <input type="text" id="dues" class="form-control" placeholder="Dues" readonly style="cursor:not-allowed;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Payment Mode <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <select name="payment_mode" id="payment_mode" class="form-control ">
                                	<option value="">Select Clients</option>
                                	<option value="Cash">Cash</option>
                                    <option value="NIFT">NIFT</option>
                                    <option value="RTGS">RTGS</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Pay Amount</label>
                            <div class="col-sm-4">
                                <input type="text" name="" id="amount" class="form-control" placeholder="Pay Amount">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <input type="submit" name="addpayment" value="Add Payment" class="btn btn-sn bg-primary">
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