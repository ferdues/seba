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
<h4>সভ্যগন অনুযায়ী হিসাব</h4>
<hr>	
<div class="row">
	<div class="col-xs-12">		
		<form method="get" action="member-account-Report.php"  target="_blank">
				
				<input type="hidden" name="users" value="<?php echo $_SESSION['login_username']; ?>">
			<!--div class="row">
						<div class="col-xs-4">  
						<div class="input-group date" id="invoice_date">
							<input type="text" class="form-control required" name="sdate" placeholder="Payment date" data-date-format="DD/MM/YYYY" value="<?php echo date('d/m/Y');?>"/>
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					            </div>
					        <div class="form-group col-xs-4">
					            <div class="input-group date" id="invoice_date">
							<input type="text" class="form-control required" name="edate" placeholder="Payment date" data-date-format="DD/MM/YYYY" value="<?php echo date('d/m/Y');?>"/>
					                <span class="input-group-addon">
					                    <span class="glyphicon glyphicon-calendar"></span>
					                </span>
					            </div>
					        </div>
					</div>					
		<div class="row"-->
			<div class="col-xs-4">
				<div class="input-group">
					<input type="text" class="form-control margin-bottom required member_id" name="member_id" placeholder="সভ্যগনের আাইডি" readonly>
					<span class="input-group-addon">
					<a href="" class="select-members-account"> <img src="images/search.png" height="18px" widht="15px"/></a>
					</span>
				</div>
			</div>
				<div class="form-group col-xs-8">
					<input type="text" class="form-control margin-bottom member_name" name="member_name" placeholder="সভ্যগনের নাম" readonly>
					
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

<div id="insert_member_account" class="modal fade">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">সভ্যগন সিলেক্ট করুন</h4>
		      </div>
		      <div class="modal-body">
		      
				<?php popMemberListAccounts(); ?>
		      </div>
		      <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn">বাতিল</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<hr/>
<?php
	include('footer.php');
?>