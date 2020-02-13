<?php 
session_start();
include('functions.php');
include "header.php";
include_once('includes/num_convert.php');
?>	
<script type='text/javascript'>
    $(function () {
        $.bdatepicker.setDefaults(bn);
        $('#date1').bdatepicker();
    });
</script>
<br/>
<h2>নতুন সভ্যগন</h2>
<div id="response" class="alert alert-success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<div class="message"></div>
		</div>


<div class="row">
	
		<form method="post" class="update_member" id="add_member"  enctype="multipart/form-data">
				<input type="hidden" class="action_value_change" name="action" value="add_member">
				<!--input type="hidden" name="action1" value="update_member"-->
				<input type="hidden" name="user_name" value="<?php echo $_SESSION['login_username']; ?>">
		<div class="col-xs-8">		
			<div class="row">
		
				<div class="col-xs-4">সভ্যগনের আইডি</div>
					<div class="form-group col-xs-8">
					<div class="input-group">
				<input type="text" id="increaseid" class="bangla form-control margin-bottom required member_id" name="member_id" placeholder="সভ্যগনের আইডি" readonly value="<?php echo bang_num(getMemberID());?>">
									<span class="input-group-addon">
										<a href="#" class="select-members"> <img src="images/search.png" height="20px" widht="20px"/></a>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col-xs-4">সভ্যগনের নাম</div>
							<div class="col-xs-8">
								<input type="text" class="bangla form-control margin-bottom required member_name" name="member_name" placeholder="সভ্যগনের নাম লিখুন" <?php bangla_unicode();?>>
							</div>
							
						</div>
						<div class="row">
						<div class="col-xs-4">পিতার নাম</div>
							<div class="col-xs-8">
							 	<input type="text" class="bangla form-control margin-bottom fathers_name required" name="fathers_name" placeholder="পিতার নাম লিখুন"  <?php bangla_unicode();?>>
							</div>
						</div>
						<div class="row">
						<div class="col-xs-4">বয়স</div>
							<div class="col-xs-8">
							 	<input type="text" class="bangla form-control margin-bottom required age" name="age" placeholder="বয়স লিখুন" <?php bangla_unicode();?>>
							</div>
						</div>
						<div class="row">
						<div class="col-xs-4">ঠিকানা</div>
							<div class="col-xs-8">
							 	<input type="text" class="bangla form-control margin-bottom required address" name="address" placeholder="ঠিকানা লিখুন" <?php bangla_unicode();?>>
							</div>
						</div>
						<div class="row">
						<div class="col-xs-4">এলাকা</div>
						<div class="col-xs-2">
							 	<input type="text"  class="bangla form-control margin-bottom required area_code" name="area_code" placeholder="এলাকা কোড" readonly>
							</div>
						<div class="form-group col-xs-6">
						
						<div class="input-group">
						<input type="text" class="bangla form-control margin-bottom required area_name" name="area_name" placeholder="এলাকা বাছুন" readonly>
										<span class="input-group-addon">
											<a href="#" class="select-area"> <img src="images/search.png" height="20px" widht="20px"/></a>
										</span>
								</div>
							</div>
						
						</div>
				

			
			</div>
			<div class="col-xs-4">		
			<div class="row">
				<div class="col-xs-2">	
					
					<img id="output" src="images/no_pic.png" height="175px" width="150px" border="2" >
					<input type="file" accept="image/*" name="m_image" onchange="loadFile(event)">
				
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2">	
					
					<img id="output" src="images/sig.png" height="50px" width="150px" border="2">
					<input type="file" accept="image/*" name="s_image" onchange="loadFile(event1)">
				</div>
			</div>
			</div>
		</div>
			

			
			<div class="col-xs-8">		
			<div class="row">
			
					
					
					
					<div class="row">
					<div class="col-xs-4">জাতীয়তা</div>
						<div class="col-xs-8">
						 	<input type="text"  class="bangla form-control margin-bottom required nationality" name="nationality" placeholder="জাতীয়তা লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">পেশা</div>
						<div class="col-xs-8">
						 	<input type="text"  class="bangla form-control margin-bottom required occuption" name="occuption" placeholder="পেশা লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">মোবাইল নাম্বার</div>
						<div class="col-xs-8">
						 	<input type="text"  class="bangla form-control margin-bottom required member_mobile" name="member_mobile" placeholder="মোবাইল নাম্বার লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">সভ্য হইবার তারিখ</div>
						<div class="col-xs-8">
						 	<input type="text" id='date1'  class="bangla form-control margin-bottom required member_date" name="member_date" placeholder="সভ্য হইবার তারিখ লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">মনোনীত ব্যক্তির নাম</div>
						<div class="col-xs-8">
						 	<input type="text"  class="bangla form-control margin-bottom required nominated_member" name="nominated_member" placeholder="মনোনীত ব্যক্তির নাম লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">মনোনীত ব্যক্তির সহিত সম্পর্ক</div>
						<div class="col-xs-8">
						 	<input type="text"  class="bangla form-control margin-bottom required nominated_member_relation" name="nominated_member_relation" placeholder="মনোনীত ব্যক্তির সহিত সম্পর্ক লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">মনোনীত ব্যক্তির ঠিকানা</div>
						<div class="col-xs-8">
				<input type="text"  class="bangla form-control margin-bottom required nominated_member_address" name="nominated_member_address" placeholder="মনোনীত ব্যক্তির ঠিকানা লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">মনোনীত ব্যক্তির মোবাইল নাম্বার</div>
						<div class="col-xs-8">
			<input type="text"  class="bangla form-control margin-bottom required nominated_member_mobile" name="nominated_member_mobile" placeholder="মনোনীত ব্যক্তির মোবাইল নাম্বার লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12" align="Right">
							<input type="submit" class="btn btn-success" value="নতুন">
							<input type="submit" id="action_add_member" class="btn btn-success xcf" value="যোগ করুন" data-loading-text="যোগ করুন...">
							<!--input type="submit" id="action_update_customerpayment" class="btn btn-success" value="হালনাগাদ করুন" data-loading-text="হালনাগাদ করুন..."-->
						</div>
					</div>	
			</div>
		</form>
 	
 </div>
  <br/>	<br/>	


<div class="row">
	<div class="col-xs-12">
		<table id="" id="" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>সভ্যগনের আইডি</th>
					<th>সভ্যগনের নাম</th>
					<th>সভ্য হইবার তারিখ</th>
					<th>মোবাইল নাম্বার</th>
					<th>এলাকা কোড</th>
					<th>এলাকার নাম</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}
$query = "SELECT 
					e.MemberID,
					e.MemberName,
					e.FathersName,
					e.Age,
					e.Address,
					e.Mobile,
					e.Nationality,
					e.Occuption,
					e.PersonNominated,
					e.NominatedAddress,
					e.NominatedMobile,
					e.NominatedRelation,
					e.MemberDate,
					e.AreaCode,
					s.AreaName,
					CONCAT(e.MemberID,'-',e.AreaCode) as Unique_Code
		FROM `MemberCreate` e 
		inner join 
		`AreaCreate` s on e.AreaCode=s.AreaCode Order By e.MemberID ASC limit 1000";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$date=$row['MemberDate'];
		$member_date= preg_replace('/(\d+)\D+(\d+)\D+(\d+)/','$3-$2-$1',$date);
		echo "<tr><td><a href='member-report.php?memberId=".$row['MemberID']."'>" . bang_num($row['Unique_Code'])."</a></td>";
		echo "<td>" . $row['MemberName']."</td>";
		echo "<td>" . bang_num($member_date)."</td>";
		echo "<td>" . bang_num($row['Mobile'])."</td>";
		echo "<td>" . bang_num($row['AreaCode'])."</td>";
		echo "<td>" . $row['AreaName']."</td></tr>";
	}
}

/* close connection */
$mysqli->close();
?>
			</tbody>
		
		</table>
	</div>

</div>
 
 <div id="insert_member" class="modal fade">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">সভ্যগন সিলেক্ট করুন</h4>
		      </div>
		      <div class="modal-body">
				<?php popMemberList(); ?>
		      </div>
		      <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn">বাতিল</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
	<script>	
$(document).ready(function() {
    $('table.display').DataTable(
    {"language": {
			           "lengthMenu": 'প্রদর্শন <select>'+
			             '<option value="10">১০</option>'+
			             '<option value="20">২০</option>'+
			             '<option value="30">৩০</option>'+
			             '<option value="50">৫০</option>'+
			             '<option value="100">১০০</option>'+
			             '<option value="-1">সব</option>'+
			             '</select> নথি',
			             "info": "দেখানো পৃষ্ঠায় _PAGES_ এর মধ্যে _PAGE_",
			             "paginate": {
				             "previous": "আগে",
				              "next": "পরে",
				          }
			         }
			       });
    
});      
	</script>	
<div id="insert_area" class="modal fade">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">এলাকা সিলেক্ট করুন</h4>
		      </div>
		      <div class="modal-body">
				<?php popAreaList(); ?>
		      </div>
		      <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn">বাতিল</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
 
<?php include "footer.php";?>	
	