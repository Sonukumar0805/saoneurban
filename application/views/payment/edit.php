<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-left">
                        <a href="<?php echo base_url('payment/paymentlist'); ?>" class="btn btn-sm btn-primary"><i class="ti-view-list-alt"></i> Payment List </a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="<?php echo base_url('payment/updatepayment');?>" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Clients <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <select name="client_id" id="client_id" class="select2 form-control ">
                                	<option value="">Select Clients</option>
                                	<?php
										if(is_array($clients)){ 
											foreach($clients as $client){
									?>
                                    <option value="<?php echo $client['id']?>"<?php if($paymentlist['client_id'] == $client['id']){echo "selected";}?>><?php echo $client['name']?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label"> Mobile </label>
                            <div class="col-sm-4">
                                <input type="text" name="mobile" id="mobile" maxlength="10" class="form-control" placeholder="Enter Mobile" readonly style="cursor:not-allowed;">
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" readonly style="cursor:not-allowed;">
                            </div>
                            <label class="col-sm-2 col-form-label">Registration No.</label>
                            <div class="col-sm-4">
                                <input type="text" id="registration_no" class="form-control" placeholder="Registration No." readonly style="cursor:not-allowed;">                            	
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
                                <textarea rows="3" cols="5" id="company_address" class="form-control" placeholder="Company Address" readonly style="cursor:not-allowed;"></textarea>
                            </div>
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-4">
                                <input type="date" name="date" id="date" value="<?php echo $paymentlist['date'];?>" class="form-control" placeholder="Date" required>
                            </div>
                            <!--
                            <label class="col-sm-2 col-form-label">Dues</label>
                            <div class="col-sm-4">
                                <input type="text" id="dues" class="form-control" placeholder="Dues" readonly style="cursor:not-allowed;">
                            </div>-->
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Payment Mode <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <select name="payment_mode" id="payment_mode" class="form-control ">
                                	<option value="">Select Payment Mode </option>
                                	<option value="Cash"<?php if($paymentlist['payment_mode'] == 'Cash'){echo "selected" ;}?>>Cash</option>
                                    <option value="NIFT"<?php if($paymentlist['payment_mode'] == 'NIFT'){echo "selected" ;}?>>NIFT</option>
                                    <option value="RTGS"<?php if($paymentlist['payment_mode'] == 'RTGS'){echo "selected" ;}?>>RTGS</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Pay Amount</label>
                            <div class="col-sm-4">
                            	<input type="hidden" name="name" id="name">
                                <input type="text" name="amount" id="amount" value="<?php echo intval($paymentlist['amount']) ;?>" class="form-control" placeholder="Pay Amount">
                            </div> 
                    	</div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                            	<input type="hidden" id="cl_id" value="<?php echo $paymentlist['client_id'] ;?>">
                            	<input type="hidden" name="id" id="id" value="<?php echo $paymentlist['id'] ;?>">
                                <input type="submit" name="updatepayment" value="Update Payment" class="btn btn-sn bg-primary">
                            </div>
                            <div class="col-sm-3">
                                <a href="<?php echo base_url('payment/paymentlist'); ?>" class="btn btn-sm bg-danger"> Cancel</a>
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
		var client_id = $('#cl_id').val();
			$.ajax({
				method:"POST",
				url:"<?php echo base_url('payment/singleclient')?>",
				data:{client_id:client_id},
				success:function(data){
					//console.log(data);
					var value = JSON.parse(data);					
					$('#mobile').val(value.mobile);
					$('#email').val(value.email);
					$('#registration_no').val(value.registration_no);
					$('#c_website').val(value.c_website);
					$('#state').val(value.state);
					$('#company_address').val(value.company_address);
					$('#name').val(value.name);
				}
			});
		$('body').on('change','#client_id',function(){
			var client_id = $(this).val();
			$.ajax({
				method:"POST",
				url:"<?php echo base_url('payment/singleclient')?>",
				data:{client_id:client_id},
				success:function(data){
					//console.log(data);
					var value = JSON.parse(data);					
					$('#mobile').val(value.mobile);
					$('#email').val(value.email);
					$('#registration_no').val(value.registration_no);
					$('#c_website').val(value.c_website);
					$('#state').val(value.state);
					$('#company_address').val(value.company_address);
					$('#name').val(value.name);
				}
			});
		});
	});
</script>