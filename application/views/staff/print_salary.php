<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" moznomarginboxes mozdisallowselectionprint>  
<head>
<meta charset="utf-8">
<title>Salary Slip</title>
<style type="text/css" media="print">
			@page {
					margin:0 10px;
					/*size:8.27in 11.69in ;
					/*height:3508 px;
					width:2480 px;
					/*size: auto;   auto is the initial value */
					/*margin:0;   this affects the margin in the printer settings 
			  		-webkit-print-color-adjust:exact;*/
			}
			@media print{
				table {page-break-inside: avoid;}
				#buttons{
						display:none;
				}
				#invoice{
					margin-top:20px;
  				}
			}
		</style>
        <script src="<?php echo file_url('includes/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script> 
</head>
<body>
<div id="invoice" style="width:1000px;">
	 <center>
        <!--<img src="<?php //echo file_url('assets/images/logo-1.jpg') ;?>" alt="Mota Florona"><br>-->
        <h4>Salary Slip</h4>
        <font size="+3" style="letter-spacing:2px"> Saone Urban Security Service Pvt Ltd <br /></font>
        <font size="+1">
        <b>Address :</b> 1st Floor, Taj Medico, Bariatu, Near Alam Hospital, Ranchi - 834009, Jharkhand <br/>
        <b>Ph </b>: +91-7070 994345, +91-7061 443023<br />
        <font size="+1">
        <b>Email :</b> suss.rnc@gmail.com        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      <b>Website :</b> wwww.saonesecurity.in </font><br />
        <font size="+1">
        <b>GSTIN :</b> 20ABBCS1484R1Z2           <br>       <b>PAN :</b> ABBCS1484R <br />
        </font><br />
    </center>
    
    <?php /*echo "<pre>" ; //print_r($products);
		print_r($staffs);
		print_r($salary);
		print_r($advance);*/
	?>
    <hr style="border:1px solid #000000;" />
	<table  align="center" width="95%">
    	<tr>
        	<th align="left" width="18%">Employee Id</th>
            <td align="left" width="34%"><?php echo $staffs['emp_id'] ;?></td>
            <td align="left" width="13%"></td>
            <th align="left" width="18%">Date Of Joining</th>
            <td align="left" width="17%"><?php echo $staffs['doj'] ;?></td>           
        </tr>
        <tr>
            <th align="left">Father's Name</th>
            <td align="left"><?php echo $staffs['father'] ;?></td>
            <td align="left"></td>
            <th align="left">Designation</th>
            <td align="left"><?php echo $staffs['designation'] ;?></td>
        </tr>
        <tr>
            <th align="left">Name</th>
            <td align="left"><?php echo $staffs['name']; ?></td>
            <td align="left"></td>
            <th align="left">Phone</th>
            <td align="left"><?php echo $staffs['mobile']; ?></td>
        </tr>
        <tr>
            <th align="left">Address</th>
            <td align="left" colspan="2" style="font-size:15px; padding-right:10px;"><?php echo $staffs['address']; ?></td>
            <th align="left">Basic Salary</th>
            <td align="left"><?php echo $staffs['basic_salary']; ?></td>
        </tr>
    </table>
    <table align="center" width="95%" height="500" border="1" cellpadding="0" cellspacing="0" id="table" >
        <tr height="20">
            <th align="center" width="50%" colspan="4">Salary Description</th>
            <th align="center" colspan="2">Deduction</th>
            <th align="center" >Amount</th>
            <!--<th align="center" >Payable Leave</th>
            <th align="center" >Deductible Leave</th>
            <th align="center" >Total<br/>Amount</th>
            <th align="center" >PF<br/>Amount</th>
            <th align="center" >ESI<br/>Amount</th>
            <th align="center" >HRA<br/>Amount</th>-->
            <!--<th align="center" >Taxable<br/>Amount</th> -->
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Name</th>
            <td align="center" colspan="1"><?php echo $staffs['name'] ;?></td>
            <td align="center" colspan="2">Professional TAX</td>
            <td></td>
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Month</th>
            <td align="center" colspan="1"><?php echo $salary['month'] ;?></td>
            <td align="center" colspan="2">Income TAX</td>
            <td></td>
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Year</th>
            <td align="center" colspan="1"><?php echo $salary['year'] ;?></td>
            <td align="center" colspan="2">leave Deduction</td>
            <td align="center"><?php echo $salary['deduction'] ;?></td>
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Working Days</th>
            <td align="center" ><?php echo $salary['working_days'] ;?></td>
            <td align="center" colspan="2">Advance</td>
            <?php $adv = $advance['all_total'] ;
				$sal = $salary['paid_salary'] + $adv;
				$all_total = $salary['all_total'] + $adv;
			?>
            <td align="center"><?php echo abs($adv) ;?></td>
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Holidays</th>
            <td align="center" ><?php echo $salary['holidays'] ;?></td>
            <td align="center" colspan="2"></td>
            <td></td>
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Payable Leave</th>
            <td align="center" ><?php echo $salary['paid_leave'] ;?></td>
            <td align="center" colspan="2"></td>
            <td></td>
        </tr>
        <tr height="20">
        	<th align="center" colspan="3">Deductible Leave</td>
            <td align="center" ><?php echo $salary['total_leave'] ;?></td>
            <td align="center" colspan="2"></td>
            <td></td>
        </tr>               
            <!--<th align="center" ><?php echo $salary['total_salary'] ;?></th>
            <td align="center" ><?php echo $salary['pf'] ;?></td>
            <td align="center" ><?php echo $salary['esi'] ;?></td>
            <th align="center" ><?php echo $salary['hra'] ;?></th>
            <td align="center" ><?php //echo $product['taxable_amount'] ;?></td>-->
        <!--<tr>
            <td></td><td></td><td></td><td></td><td></td><td></td>
            <td></td>
            <?php  //if($checkigst['gst']!=0){ echo "<td></td><td></td>";if($checkigst['ivalue']==0){ echo "<td></td><td></td>";}}?>
        </tr>-->
        <tr height="10">
            <td align="center" colspan="4"><font size="+2">Salary Amount </font></td> 
            <td align="right" colspan="3"><font size="+2" style="margin-right:20px;"><?php echo "Rs. ". round($sal) ;?></font></td>
        </tr>
        <tr height="10">
            <td align="center" colspan="4"><font size="+2">PF Amount</font></td> 
            <td align="right" colspan="3"><font size="+2" style="margin-right:20px;"><?php echo "Rs. ". $salary['pf']?></font></td>
        </tr>
        <tr height="10">
            <td align="center" colspan="4"><font size="+2">ESI Amount</font></td> 
            <td align="right" colspan="3"><font size="+2" style="margin-right:20px;"><?php echo "Rs. ". $salary['esi']?></font></td>
        </tr>
        <tr height="10">
            <td align="center" colspan="4"><font size="+2">Hounse Rent Allowence</font></td> 
            <td align="right" colspan="3"><font size="+2" style="margin-right:20px;"><?php echo "Rs. ". $salary['hra']?></font></td>
        </tr>
       	<tr height="10">
            <td align="center" colspan="4"><font size="+2">Total Salary After Deduction </font></td> 
            <td align="right" colspan="3"><font size="+2" style="margin-right:20px;"><?php echo "Rs. ". $all_total ;?></font></td>
        </tr>
        <tr height="10">
            <th style="text-align:center;" colspan="7"><font size="+2">Total Salary Amount in Words</font></th>
        </tr>
        <tr height="10">
            <td colspan="7" align="center">
                <font size="+2"><?php echo $this->amount->to_words($all_total)." Only";?></font> 
            </td>
       	</tr>
     </table> 
     <table align="center" width="95%">
           <tr>
                <td rowspan="3">
                </td>
                <td align="center" valign="top"></td>
            </tr>
            <tr height="10">
                <td align="center" style="height:50px; border:1px solid #000000; width:200px; border-radius:3px; color:#000000;"> <!--<img height="100" width="200" src="<?php //echo file_url("$invoice[photo]");?>" alt="Customer Signature">--></td>
            </tr>
            <tr height="10">
                <td align="center">Signature</td>
            </tr>
            <tr height="10">
            	<td align="center"></td>
                <td align="center">Thank You!</td>
            </tr>
        </table>
        <div id="buttons">
            <center>
            	<?php //$pre = base_url('invoice/print_invoice');?>
                <button type="button" id='print' class="btn btn-danger" onclick="window.print();" 
                    style="background-color:#F70004; height:30px; width:70px; border-radius:5px; color:#FFFFFF; font-size:16px;" >Print</button>
                    <a href='<?php echo base_url("staffsalary");?>'  class="btn btn-default" style="text-decoration:none; background-color:#F70004; height:30px; width:50px; border:2px solid #A4A1A1; border-radius:4px; padding:4px 15px 4px 15px;color:#FFFFFF; font-size:16px;"> Close </a>
           </center>
        </div>  
	</div>
    <script>
    	$(document).ready(function(e) {
            $('#print').click();
        });		
    </script>
</body>
</html>