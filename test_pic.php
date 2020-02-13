<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="js/bootstrap.datetime.js"></script>
	<script src="js/bootstrap.password.js"></script>

	<script src="js/layout.js"></script>
	<script src="js/common.js"></script>
	<script src='localize/local_bn.js' type='text/javascript'></script>
        <script src='localize/local_en.js' type='text/javascript'></script>
        <script src='js/jquery_bangla_date_picker.js' type='text/javascript'></script>

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.datetimepicker.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
	<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel='stylesheet' href="css/jquery-ui.css"/>

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
<img id="output" src="images/no_pic.png" height="175px" width="150px" border="2" >
<form method="post" class="update_member" id="add_member" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input type="file" accept="image/*" name="s_image" onchange="loadFile(event1)">
<input type="submit"  class="btn btn-success xcf" value="যোগ করুন" data-loading-text="যোগ করুন...">
</form>