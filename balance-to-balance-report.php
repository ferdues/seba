<?php
include("session.php");
include('functions.php');
include_once('includes/num_convert.php');
$memberid= $_GET['member_id'];
$membername=$_GET['member_name'];
$m_id=eng_num($memberid);
//$s_date=$_GET['sdate'];
//$e_date=$_GET['edate'];
//$sdate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$s_date);
//$edate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$e_date);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>আদায়/বিতরন হিসাব || <?php echo COMPANY_NAME; ?></title>
   
<!--link rel="stylesheet" href="css/report.css"-->

  <style>

 body {
	background-color: #FFFFFF;
	width: 800px;
	margin-left:auto ;
	margin-right:auto;
 }
 p,h1,h2 {
    margin: 0;
    padding:0;
}
table{
	width:100%;
	border-collapse: collapse;
	}
table, th , td  {
    border: 1px solid grey;
    border-collapse: collapse;
    padding: 3px;
    
}

table tr:nth-child(odd) {
    background-color: #f1f1f1;
}
table tr:nth-child(even) {
    background-color: #FBF5EF;
}
</style>
   
        <script src="js/prefixfree.min.js"></script>
    
  </head>

  <body>

    <!--<page size="A4">-->
<header>
<h2 style="text-align:center;"><?php echo COMPANY_NAME; ?></h2> 
     <p style="text-align:center; font-size:90%;"><?php echo COMPANY_ADDRESS_1 .', '.COMPANY_ADDRESS_2; ?></p>
     <p style="text-align:center; font-size:85%;">মোবাইল : <?php echo COMPANY_ADDRESS_3;?></p>
     <!--p style="text-align:center; font-size:75%;">Email: <?php echo COMPANY_EMAIL;?></p-->
      <h1 style="text-align:center; border:1px black solid; font-size:18px;">আদায়/বিতরন</h1>
</header>

<table class="meta1" id="countit">
	<tr>
	<th>এলাকা</th>
	<th>তারিখ</th>	
	<th>সঞ্চয় আদায়</th>	
	<th>বিনিয়োগ আদায়</th>	
	<th>মোট আদায়</th>	
	</tr>
	<!-- http://www.jonathantneal.com/examples/invoice/ -->		
			

<?php
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}
$query = "SELECT AreaCreate.AreaCode,AreaCreate.AreaName,Accounts.T_Date,SUM(Accounts.RealizationSavings) as Savings, SUM(Accounts.InvenstmentRecovery) as Investments, SUM(RealizationSavings)+SUM(InvenstmentRecovery) as Total FROM `Accounts` INNER JOIN MemberCreate ON MemberCreate.MemberID=Accounts.MemberID INNER JOIN AreaCreate ON MemberCreate.AreaCode=AreaCreate.AreaCode GROUP By T_Date,AreaCreate.AreaCode";
//Where MemberID=" . $mysqli->real_escape_string($m_id)
$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {


	while ($row = mysqli_fetch_assoc($result)) {
	if ($row['Savings']=='0'){
	$rs='-';
	}else{
	$rs=bang_num($row['Savings']);
	}
	if ($row['Investments']=='0'){
	$sb='-';
	}else{
	$sb=bang_num($row['Investments']);
	}
	if ($row['Total']=='0'){
	$sw='-';
	}else{
	$sw=bang_num($row['Total']);
	}
	
	
		echo "<tr><td style='text-align:left;'>" . $row['AreaName'] ."</td>";
		echo "<td style='text-align:center;'>" . bang_num($row['T_Date'])."</td>";
		echo "<td style='text-align:right;' class='count-me'>" . $rs ."</td>";
		echo "<td style='text-align:right;' class='count-me1'>" . $sb."</td>";
		echo "<td style='text-align:right;' class='count-me2'>" . $sw . "</td>";
		
		
		echo "</tr>";
	}
}

/* close connection */
$mysqli->close();
?>
</table>
<style>.clear { clear:both; display:block; overflow:hidden; visibility:hidden; height:0px;}</style>
<div class="clear"></div>
<br/><br/><br/><br/>
<div style="float: left;"><?php echo $user;?></div>

<div class="clear"></div><br/><br/><hr/>
<p style="font-size:60%;text-align:center;"><strong>Developed By Creation Plus | </strong>Cell: +88 01826002496</p>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script language="javascript" type="text/javascript">
    
   
   
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

   


   
   
   
            var tds = document.getElementById('countit').getElementsByTagName('td');
            var tdj = document.getElementById('countit').getElementsByTagName('td');
            var tdp = document.getElementById('countit').getElementsByTagName('td');
            var sum = 0;
            var sum1 = 0;
            var sum2 = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(replaceNumbers(tds[i].innerHTML)) ? 0 : parseInt(replaceNumbers(tds[i].innerHTML));
                }
                
            }
            for(var j = 0; j < tdj.length; j ++) {
            if(tdj[j].className == 'count-me1') {
            	var tdjj=tdj[j].innerHTML;
                    sum1 += isNaN(replaceNumbers(tdjj)) ? 0 : parseInt(replaceNumbers(tdjj));
                }
            }
  	    for(var p = 0; p < tdp.length; p ++) {
            if(tdp[p].className == 'count-me2') {
            	var tdjp=tdp[p].innerHTML;
            	var tx = replaceNumbers(tdjp);
                    sum2 += isNaN(tx) ? 0 : parseInt(tx);
                }
            }
            var nx=sum.toString();
            var nx1=sum1.toString();
            var nx2=sum2.toString();
            var sum_tx= eng_replaceNumbers(nx);
            var sum_tx1= eng_replaceNumbers(nx1);
            var sum_tx2= eng_replaceNumbers(nx2);
           
          
document.getElementById('countit').innerHTML += '<tr><td colspan="2" style="text-align:right;">মোট</td><td style="text-align:right;">' + sum_tx + '</td><td style="text-align:right;">' + sum_tx1 + '</td><td colspan="2" style="text-align:right;">' + sum_tx2 + '</td></tr>';


        </script> 
    
    
  </body>
</html>
