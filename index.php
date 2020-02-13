
	<script src="js/layout.js"></script>
	<script src="js/common.js"></script>
<?php

include('header-login.php');
include('functions.php');

?>

<div class="row vertical-offset-100">
	<div id="response" class="alert alert-success" style="display:none;">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<div class="message"></div>
	</div>

	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
		  	<div class="panel-heading">
		  		<h1 class="text-center">
					<!--<img src="<?php echo COMPANY_LOGO; ?>" class="img-responsive">-->
					<?php echo COMPANY_NAME; ?>
				</h1>
		    	<h3 class="panel-title text-center">লগইন করুন</h3>
		 	</div>
		  	<div class="panel-body">
		    	<form accept-charset="UTF-8" role="form" method="post" id="login_form">
		    		<input type="hidden" name="action" value="login">
	                <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control required" name="username" id="username" type="text" placeholder="ব্যবহারকারীর নাম" autofocus <?php bangla_unicode();?>>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control required" name="password" type="password" placeholder="পাসওয়ার্ড">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> আমাকে মনে রাখুন
			    	    	</label>
			    	    	<!--a href="forgot.php" class="float-right">Forgot password?</a-->
			    	    </div>
			    		<button type="button" id="btn-login" class="btn btn-lg btn-success btn-block">লগইন</button><br>
			    	</fieldset>
		      	</form>
		    </div>
		</div>
	</div>
</div>

<?php
	include('footer.php');
?>