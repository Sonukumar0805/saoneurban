<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            	<div class="card-header">
                	<div class="pull-left">
                        <a href="<?php echo base_url("expenses/expenselist"); ?>" class="btn btn-sm btn-primary"><i class="ti-view-list-alt"></i> Expenses List</a>
                    </div>
                	<div class="pull-right">
                        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-sm btn-primary"><i class="ti-arrow-left"></i> BACK</a>
                    </div>
                </div>
                <div class="card-block">
                    <form action="<?php echo base_url('expenses/addexpenses');?>" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Date <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="date" name="date" id="date" value="<?php echo date('Y-m-d');?>" class="form-control" required>
                            </div>
                            <label class="col-sm-2 col-form-label"> Name <span class="text-danger">*</span> </label>
                            <div class="col-sm-4">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                            </div> 
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bill No.</label>
                            <div class="col-sm-4">
                                <input type="text" name="bill_no" id="bill_no" class="form-control" placeholder="Enter Bill No.">
                            </div>
                            <label class="col-sm-2 col-form-label"> Expense Head </label>
                            <div class="col-sm-4">
                                <select name="expensehead_id" id="expensehead_id" class="form-control">
                                	<option value="">Select Expense Head</option>
                                	<?php 
										if(is_array($expensehead)){
											foreach($expensehead as $list){
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
                            <label class="col-sm-2 col-form-label">Particulars</label>
                            <div class="col-sm-4">
                                <input type="text" name="particular" id="particular" class="form-control" placeholder="Enter Particulars">
                            </div>
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-4">
                                <textarea rows="3" cols="5" name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                    	</div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-4">
                                <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input type="submit" name="addexpense" value="Add Expense" class="btn btn-sn bg-primary">
                            </div>
                        </div>
                  	 </form>
                   </div>
                </div>
            </div>
        </div>
      </div>
