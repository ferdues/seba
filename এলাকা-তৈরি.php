<?php 
session_start();
include('functions.php');
include "header.php";
include_once('includes/num_convert.php');
?>	

<br/>
<h2>নতুন এলাকা</h2>

<div id="response" class="alert alert-success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<div class="message"></div>
		</div>
<div class="row">
	<div class="col-xs-12">		
		<form method="post" id="add_area"  class="update_area">
				<input type="hidden" class="action_value_area" name="action" value="add_area">
				<input type="hidden" name="user_name" value="<?php echo $_SESSION['login_username']; ?>">
			<div class="row">
				<div class="col-xs-4">এলাকা কোড</div>
				<div class="form-group col-xs-8">
				<div class="input-group">
				<input type="text" class="bangla form-control margin-bottom required area_code" name="area_code" placeholder="এলাকা কোড" readonly value="<?php echo bang_num(getAreaCode()); ?>">
								<span class="input-group-addon">
									<a href="" class="select-area"> <img src="images/search.png" height="20px" widht="20px"/></a>
								</span>
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">এলাকার নাম</div>
						<div class="col-xs-8">
							<input type="text" class="bangla form-control margin-bottom required area_name" name="area_name" placeholder="এলাকার নাম লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-4">বিবরন</div>
						<div class="col-xs-8">
							<input type="text" class="bangla form-control margin-bottom area_details" name="area_details" placeholder="বিবরন লিখুন" <?php bangla_unicode();?>>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12" align="Right">
							<input type="submit" class="btn btn-success" value="নতুন">
							<input type="submit" id="action_add_area" class="btn btn-success add_area_class" value="যোগ করুন" data-loading-text="যোগ...">
							<!--input type="submit" id="action_update_customerpayment" class="btn btn-success" value="হালনাগাদ করুন" data-loading-text="হালনাগাদ..."-->
						</div>
					</div>	
		</form>
 	</div>
 </div>
  <br/>	<br/>	
  
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
<div class="row">
	<div class="col-xs-12">
		<table id="" id="" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>এলাকা কোড</th>
					<th>এলাকার নাম</th>
					<th>বিবরন</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}
$query = "SELECT AreaCode,AreaName,AreaDetails FROM `AreaCreate` Order By AreaCode ASC limit 1000";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . bang_num($row['AreaCode'])."</td>";
		echo "<td>" . $row['AreaName']."</a></td>";
		echo "<td>" . $row['AreaDetails']."</td></tr>";
	}
}

/* close connection */
$mysqli->close();
?>
			</tbody>
		
		</table>
	</div>

</div>

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
	

<?php include "footer.php";?>	
	