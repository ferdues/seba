<?php
	//check login
	date_default_timezone_set('Asia/Dhaka');
	include("session.php");
	include_once("includes/config.php");
	if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}

// the query
$query = "SELECT * FROM users WHERE username = '" . $mysqli->real_escape_string($_SESSION['login_username']) . "'";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['name']; // name
		$username = $row['username']; // username
		$email = $row['email']; // email address
		$phone = $row['phone']; // phone number
		$usertype= $row['User_Type']; 
	}
}

/* close connection */
$mysqli->close();

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>অনলাইন ট্যালি সফটওয়্যার</title>
	<!-- JS -->
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="js/bootstrap.datetime.js"></script>
	<script src="js/bootstrap.password.js"></script>
	<script src="js/scripts.js"></script>
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

	<style>
		body { 
			padding-top: 30px; 
		}
		
		body, h1, h2, h3, h4, h5, h6{
			font-family: SolaimanLipi,Arial,Vrinda,FallbackBengaliFont,Helvetica,sans-serif;
		}
		.bangla{
			font-family:vrinda,solaimanLipi;
			font-size:16px;
		}
	</style>
	<!--@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);-->

</head>

<body>


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display <a class="navbar-brand" href="#">Brand</a>-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">টগল নেভিগেশন</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="color:green;"><strong><?php echo COMPANY_NAME; ?></strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
        <li><a href="ড্যাসবোর্ড.php">ড্যাসবোর্ড</a></li>
        <?php 
         if ($usertype=='admin'){
        echo'<li><a href="সভ্য-তৈরি.php" role="button" aria-haspopup="true" aria-expanded="true">সভ্যগণ</a></li>
        <li><a href="হিসাব.php" role="button" aria-haspopup="true" aria-expanded="true">আদায়/বিতরন</a></li>
        <li>
          <a href="এলাকা-তৈরি.php" role="button" aria-haspopup="true" aria-expanded="true">এলাকা</a>
        </li>
              
           
        <!--li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ব্যবহারকারী<span class="caret"></span></a>
          <ul class="dropdown-menu">
                 
			<li><a href="user-add.php">নতুন ব্যবহারকারী</a></li>	    
			<li><a href="user-list.php">ব্যবহারকারীর তালিকা</a></li>
		</ul>
        </li-->
      </ul>

      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">রিপোর্ট<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li><a href="member-account.php">সভ্যগণের হিসাব</a></li>
           <li><a href="balance-to-balance-report.php" target="_blank">আদায়/বিতরন</a></li>
           <li><a href="dailyTransection.php" target="_blank">দৈনিক/মাসিক আদায়/বিতরন</a></li>
            <li><a href="member-list.php" target="_blank">সভ্যগণের তালিকা</a></li>
            <li><a href="area-wise-member-list.php" target="_blank">এলাকা অনুযায়ী সভ্যগণের তালিকা</a></li>
            <li><a href="area-list.php" target="_blank">এলাকার তালিকা</a></li>
            
            
          </ul>
        </li>';
        }else{
        echo'<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
          <ul class="dropdown-menu">
                <li><a href="invoice-create.php">Create Invoice</a></li>	
          </ul>
        </li>
            
           <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
          	 <li><a href="customer-payment.php">Customer Payment</a></li> 
          	 <li><a href="supplier-payment.php">Supplier Payment</a></li> 	
		</ul>
        </li>
      
      </ul>

      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="stock.php">Stock Report</a></li>
            <li><a href="StockChart.php">Stock Chart Report</a></li>
          </ul>
        </li>';
        }
        ?>
     
 
        <li><a>ব্যবহারকারী: <?php echo $_SESSION['login_username']; ?></a></li>
        <li><a  href="logout.php"> লগআউট</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


	<div class="container">
	
	









