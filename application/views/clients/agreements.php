<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-left">
                        <a href="<?php echo base_url('clients/agreementlist'); ?>" class="btn btn-sm btn-primary"><i class="ti-view-list-alt"></i> Agreement List </a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="<?php echo base_url('clients/addagreement');?>" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Date <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="date" name="date" id="date" value="<?php echo date('Y-m-d')?>" class="form-control" required>
                            </div>
                            <label class="col-sm-2 col-form-label"> Client <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <select name="client_id" id="client_id" class="form-control" required>
                                	<option value="">Select Client </option>
                                	<?php 
										if(is_array($clients)){
											foreach($clients as $list){
									?>
                                    <option value="<?php echo $list['id'];?>"><?php echo $list['name'] ;?></option>
                                    <?php 
											}
										}
									?>
                                </select>
                            </div> 
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Man Power <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <select name="man_power" id="man_power" class="form-control" required>
                                	<option value="">Select Man Power</option>
                                    <option value="Guard"> Guard </option>
                                    <option value="Office Boy"> Office Boy </option>
                                    <option value="Manager">Manager</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label"> No. of Person <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="person_no" id="person_no" class="form-control" placeholder="No. of Person " required>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perday Rate <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="perday_rate" id="perday_rate" class="form-control" placeholder="Enter Perday Rate" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Monthly Rate <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input name="monthly_rate" id="monthly_rate" class="form-control" placeholder="Enter Monthly Rate" required>
                            </div>
                    	</div>
                        <!--<div class="form-group row">
                            <label class="col-sm-2 col-form-label">Overtime Rate</label>
                            <div class="col-sm-4">
                                <input type="text" name="ot_rate" id="ot_rate" class="form-control" placeholder="Enter Overtime Rate">
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <input type="submit" name="addagreement" value="Add Agreement" class="btn btn-sn bg-primary">
                            </div>
                        </div>
                  	 </form>
                   </div>
                </div>
            </div>
        </div>
      </div>
