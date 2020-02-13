<?php 
print '	<!-- JS -->

	<script src="js/jquery.dataTables.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="js/bootstrap.datetime.js"></script>
	<script src="js/bootstrap.password.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/layout.js"></script>
	<script src="js/common.js"></script>
	<script src="localize/local_bn.js" type="text/javascript"></script>
        <script src="localize/local_en.js" type="text/javascript"></script>
        <script src="js/jquery_bangla_date_picker.js" type="text/javascript"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.datetimepicker.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
	<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/jquery-ui.css"/>
';
include_once("includes/config.php");
include_once('includes/num_convert.php');
function bangla_unicode(){
echo 'onkeydown="return KeyBoardDown(event);" onkeypress="return KeyBoardPress(event);"';
}
// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT 
					e.MemberID,
					e.MemberName,
					e.Address,
					e.Mobile,
					e.AreaCode,
					s.AreaName,
					CONCAT(e.MemberID,'-',e.AreaCode) as Unique_Code
					
		FROM `MemberCreate` e 
		inner join 
		`AreaCreate` s on e.AreaCode=s.AreaCode Order By e.MemberID ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		print '
		<div id="insert_member_account" class="modal fade">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">সভ্যগন সিলেক্ট করুন</h4>
		      </div>
		      <div class="modal-body">
		      
				<!--?php popMemberListAccounts(); ?-->
		     
		
		
		<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>সভ্যগনের আইডি</h4></th>
				<th><h4>সভ্যগনের নাম</h4></th>
				<th><h4>এলাকার নাম</h4></th>
				<th><h4>কর্ম</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {
		$date=$row['MemberDate'];
		$member_date= preg_replace('/(\d+)\D+(\d+)\D+(\d+)/','$3-$2-$1',$date);
		    print '
			    <tr>
				    <td>'.bang_num($row["Unique_Code"]).'</td>
				    <td>'.$row["MemberName"].'</td>
				    <td>'.$row["AreaName"].'</td>
				    <td><a id="selected" class="btn btn-primary btn-xs member-select-account" data-member-name="'.$row['MemberName'].'"  data-member-id="'.bang_num($row['MemberID']).'"  data-member-address="'.$row['Address'].'" data-member-mobile="'.bang_num($row['Mobile']).'" data-member-areaname="'.$row['AreaName'].'" data-member-areacode="'.bang_num($row['AreaCode']).'">সিলেক্ট</a></td>
			    </tr>
		    ';
		}

		print '</tbody></table>';

	} else {

		echo "<p>প্রদর্শনের জন্য কোন সদস্য নেই.</p>";

	}
echo ' </div>
		      <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn">বাতিল</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->';
	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
?>