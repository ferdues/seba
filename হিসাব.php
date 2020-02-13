<?php 
session_start();
include('functions.php');
include "header.php";
include_once('includes/num_convert.php');
?>	
<script>
 $(document).ready(function() {
var bang_numbers = {
	'০': 0,
	'১': 1,
	'২': 2,
	'৩': 3,
	'৪': 4,
	'৫': 5,
	'৬': 6,
	'৭': 7,
	'৮': 8,
	'৯': 9
		};
var eng_numbers = {
	0 : '০',
	1 : '১',
	2 : '২',
	3 : '৩',
	4 : '৪',
	5 : '৫',
	6 : '৬',
	7 : '৭',
        8 : '৮',
	9 : '৯'
		};
						
function replaceNumbers(input) {
	var output = [];
	for (var i = 0; i < input.length; ++i) {
	if (bang_numbers.hasOwnProperty(input[i])) {
	 output.push(bang_numbers[input[i]]);
	} else {
	output.push(input[i]);
	}
	}
	return output.join('');
	}
	function eng_replaceNumbers(inputx) {
	var outputx = [];
	for (var j = 0; j < inputx.length; ++j) {
	if (eng_numbers.hasOwnProperty(inputx[j])) {
	outputx.push(eng_numbers[inputx[j]]);
	} else {
	outputx.push(inputx[j]);
	   }
	  }
	return outputx.join('');
	}					
    	
    	   function compute() {
    	   
    	      var x =  $('.Savings_Balance').val();
              var a = $('#a').val();
              var b = $('#b').val();
              if (a==''){
              	a='0';
              } else if (b ==''){
              	b='0';
              } else if (x ==''){
              	x='0';
              } else if (c ==''){
              	c='0';
              }
              var c = parseInt(replaceNumbers(x)) + parseInt(replaceNumbers(a)) - parseInt(replaceNumbers(b));
              var n = c.toString();
              var cal = eng_replaceNumbers(n);

              $('#b_savings').val(cal);
              
              
            }
            $('#a, #b').keyup(compute);	
            function compute1() {
    	      var y =  $('.Investment_Balance').val();
              var j = $('#ri').val();
              var k = $('#i').val();
              var sc = $('#sc').val();
              if (y==''){
              	y='0';
              } else if (j ==''){
              	j='0';
              } else if (k ==''){
              	k='0';
              } else if (l ==''){
              	l='0';
              } else if (sc ==''){
              	sc='0';
              }
              var l = parseInt(replaceNumbers(y)) - parseInt(replaceNumbers(j)) + parseInt(replaceNumbers(k))+parseInt(replaceNumbers(sc));
              var m = l.toString();
              var cal1 = eng_replaceNumbers(m);
              $('#bi').val(cal1);
              
              
            }
            $('#i, #ri, #sc').keyup(compute1);		
    	 });
    	 
    	</script>
    	
<br/>

<h2>আদায়/বিতরন</h2>
<hr>
<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>
<div class="row">

		<form method="post" class="update_member" id="add_cal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" class="action_value_change" name="action" value="add_cal">
				<!--input type="hidden" name="action1" value="update_member"-->
				<input type="hidden" name="user_name" value="<?php echo $_SESSION['login_username']; ?>">
		<div class="col-xs-8" style="background: #f9f9f9;">		
			<div class="row">
				<div class="col-xs-3">সভ্যগন</div>
				<div class="col-xs-2">
		<input type="text" id="increaseid" class="bangla form-control margin-bottom required member_id" name="member_id" placeholder="আইডি" <?php bangla_unicode();?> >		
			        </div>
				<div class="form-group col-xs-6">
					<div class="input-group">
<input type="text" class="bangla form-control margin-bottom required member_name" name="member_name" placeholder="সভ্যগনের নাম" <?php bangla_unicode();?> readonly>
					<span class="input-group-addon">
						<a href="#" class="select-members-account"> <img src="images/search.png" height="20px" widht="20px"/></a>
					</span>
					</div>
				</div>
			</div>
					
			<div class="row">
					<div class="col-xs-3">এলাকা</div>
					<div class="col-xs-2">
		<input type="text"  class="bangla form-control margin-bottom required area_code" name="area_code" placeholder="এলাকা কোড" readonly>
					</div>
					<div class="col-xs-6">
					
					<input type="text" class="bangla form-control margin-bottom required area_name" name="area_name" placeholder="এলাকার নাম" readonly>

						</div>
						
				</div>
					
			
			<div class="row">
					<div class="col-xs-3">ঠিকানা</div>
						<div class=" col-xs-8">
	<input type="text" class="bangla form-control margin-bottom required address" name="address" placeholder="ঠিকানা" <?php bangla_unicode();?> readonly>
						</div>
					</div>
					
			<div class="row">
					<div class="col-xs-3">মোবাইল</div>
						<div class=" col-xs-8">
<input type="text" class="bangla form-control margin-bottom required member_mobile" name="mobile" placeholder="মোবাইল" <?php bangla_unicode();?> readonly>
						</div>
					</div>
			
			
			</div>
			
			<div class="col-xs-4">	
				<img id="output" src="images/no_pic.png" height="125px" width="110px" border="2">
			</div>
		
			<div class="col-xs-4">	
				
				<img id="output" src="images/sig.png" height="40px" width="110px" border="2">
			</div>
			
		
			<div class="col-xs-12" >		
			
				<div class="col-xs-6" style="background: #ededed;">	
				
				<div class="row">
						<div class="col-xs-4">সঞ্চয় আদায়</div>
							<div class=" col-xs-8">
							 	<input type="text" class="bangla form-control margin-bottom required r_savings" id="a" name="realization_savings" placeholder="সঞ্চয় আদায়" <?php bangla_unicode();?> value="0" tabindex="1">
							</div>
						</div>
				
				
				
				
				<div class="row">
						<div class="col-xs-4">সঞ্চয় ব্যালেন্স</div>
							<div class=" col-xs-8">
					<input type="hidden" class="Savings_Balance x_sav" value="0">
					<input type="text" class="bangla form-control margin-bottom required b_savings_" id="b_savings" name="Savings_Balance" placeholder="সঞ্চয় ব্যালেন্স" <?php bangla_unicode();?> value="0" readonly>
							</div>
						</div>
				<div class="row">
						<div class="col-xs-4">সঞ্চয় উত্তোলন</div>
							<div class=" col-xs-8">
							 	<input type="text" class="bangla form-control margin-bottom required w_savings" id="b" name="Savings_Withdrawal" placeholder="সঞ্চয় উত্তোলন" <?php bangla_unicode();?> value="0">
							</div>
						</div>
				
				
				
				<div class="row">
						<div class="col-xs-4">অন্যান্য আদায়</div>
							<div class=" col-xs-8">
				<input type="text" class="bangla form-control margin-bottom required others_withdrawal" name="Others_withdrawal" placeholder="অন্যান্য আদায়" <?php bangla_unicode();?> value="0">
							</div>
						</div>
			
				</div>		
				<div class="col-xs-6" style="background: #fcfaf0;">	
				
				<div class="row">
						<div class="col-xs-4">বিনিয়োগ আদায়</div>
							<div class=" col-xs-8">
						<input type="text" class="bangla form-control margin-bottom required r_investment" id="ri" name="invenstment_recovery" placeholder="বিনিয়োগ আদায়" <?php bangla_unicode();?> value="0" tabindex="2">
							</div>
						</div>	
				<div class="row">
						<div class="col-xs-4">বিনিয়োগ ব্যালেন্স</div>
							<div class=" col-xs-8">
							<input type="hidden" class="Investment_Balance x-inv" value="0">
							 	<input type="text" class="bangla form-control margin-bottom required b_investment"  id="bi" name="b_investment" placeholder="বিনিয়োগ ব্যালেন্স" <?php bangla_unicode();?> value="0" readonly>
							</div>
						</div>
				<div class="row">
						<div class="col-xs-4">বিনিয়োগ বিতরন</div>
							<div class=" col-xs-8">
<input type="text" class="bangla form-control margin-bottom required investment" name="investment" id="i" placeholder="বিনিয়োগ বিতরন" <?php bangla_unicode();?> value="0">
							</div>
						</div>
				
				
				
				<div class="row">
						<div class="col-xs-4">সার্ভিস চার্জ</div>
							<div class=" col-xs-8">
<input type="text" class="bangla form-control margin-bottom required others_investment" name="others_investment" id="sc" placeholder="সার্ভিস চার্জ" <?php bangla_unicode();?> value="0">
							</div>
						</div>
			
				</div>				
			
			
					
					
					
					<div class="row">
						<div class="col-xs-12" align="Right">
							<input type="submit" class="btn btn-success" value="নতুন">
							<input type="submit" id="action_add_cal" class="btn btn-success xcf1" value="যোগ করুন" data-loading-text="যোগ করুন..." tabindex="3">
							<!--input type="submit" id="action_update_customerpayment" class="btn btn-success" value="হালনাগাদ করুন" data-loading-text="হালনাগাদ করুন..."-->
						</div>
					</div>	
			</div>
		</form>
		
 	
 </div>
  <br/>	<br/>	
  <!--script type="text/javascript">
    $(document).ready(function(){
      refresh_table();
    });
    function refresh_table(){
        $('.get_').load('memeber_data.php', function(){
           setTimeout(refresh_table, 51000);
        });
    }
   
    
</script-->

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
		
		
	
		
<?php include "footer.php";?>