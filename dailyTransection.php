<?php
include('header.php');
include('functions.php');
include_once('includes/num_convert.php');
?>

<hr>	
<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>
<h4>দৈনিক/মাসিক আদায়/বিতরন হিসাব</h4>
<hr>	

<div class="row">
	<div class="col-xs-12">		
		<form method="get" action="dailyTransectionReport.php"  target="_blank">
				
				<input type="hidden" name="users" value="<?php echo $_SESSION['login_username']; ?>">
			
	<div class="col-xs-4">  
						<div class="input-group date" id="invoice_date">
							<input type="text" class="form-control required" name="sdate" placeholder="Start Date" data-date-format="DD/MM/YYYY" value="<?php echo date('d/m/Y');?>"/>
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					            </div>
					        <div class="form-group col-xs-4">
					            <div class="input-group date" id="invoice_date">
							<input type="text" class="form-control required" name="edate" placeholder="End Date" data-date-format="DD/MM/YYYY" value="<?php echo date('d/m/Y');?>"/>
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
					</div>				
					
					<div class="row">
						<div class="col-xs-8" align="Right">
						<input type="submit" class="btn btn-success" value="রিপোর্ট দেখুন">
						</div>
					</div>	
					
		</form>
 	</div>
 </div>


		<hr/>
<?php
	include('footer.php');
?>