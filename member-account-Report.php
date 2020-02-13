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
    <title>সভ্যগন অনুযায়ী হিসাব || <?php echo COMPANY_NAME; ?></title>
   
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
      <h1 style="text-align:center; border:1px black solid; font-size:18px;">সভ্যগন অনুযায়ী হিসাব</h1>
</header>
<p style="text-align:center; font-size:80%;">সভ্যগনের আইডি : <?php echo $memberid;?></p>
<p style="text-align:center; font-size:80%;">সভ্যগনের নাম : <?php echo $membername;?></p>
<!--?php
if ($s_date==$e_date) {
    echo '<p style="text-align:center; font-size:80%;"> Daily User Wise Collection Report on ' .  preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$1-$2-$3",$s_date);
} else {
     echo '<p style="text-align:center; font-size:80%;"> Monthly User Wise Collection Report on ' . preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$1-$2-$3",$s_date) . ' to ' . preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$1-$2-$3",$e_date) . '</p>';
}
?-->
<table class="meta1" id="countit">
	<tr>
	<!--th>আইডি</th-->	
	<th>তারিখ</th>	
	<th>সঞ্চয় আদায়</th>	
	<th>সঞ্চয় উত্তোলন</th>	
	<th>সঞ্চয় ব্যালেন্স</th>	
	<th>অন্যান্য আদায়</th>	
	<th>বিনিয়োগ আদায়</th>	
	<th>বিনিয়োগ বিতরন</th>	
	<th>বিনিয়োগ ব্যালেন্স</th>
	<th>সার্ভিস চার্জ</th>	
	</tr>
	<!-- http://www.jonathantneal.com/examples/invoice/ -->		
			

<?php
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}
$query = "SELECT * FROM `Accounts`  Where MemberID='" . $mysqli->real_escape_string($m_id) . "' order by Id ASC";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {


	while ($row = mysqli_fetch_assoc($result)) {
	if ($row['RealizationSavings']=='0'){
	$rs='-';
	}else{
	$rs=bang_num($row['RealizationSavings']);
	}
	if ($row['SavingsBalance']=='0'){
	$sb='-';
	}else{
	$sb=bang_num($row['SavingsBalance']);
	}
	if ($row['SavingsWithdrawal']=='0'){
	$sw='-';
	}else{
	$sw=bang_num($row['SavingsWithdrawal']);
	}
	if ($row['Others_Withdrawal']=='0'){
	$ow='-';
	}else{
	$ow=bang_num($row['Others_Withdrawal']);
	}
	if ($row['InvenstmentRecovery']=='0'){
	$ir='-';
	}else{
	$ir=bang_num($row['InvenstmentRecovery']);
	}
	if ($row['InvestmentBalance']=='0'){
	$ib='-';
	}else{
	$ib=bang_num($row['InvestmentBalance']);
	}
	if ($row['Investment']=='0'){
	$in='-';
	}else{
	$in=bang_num($row['Investment']);
	}
	if ($row['OthersInvestment']=='0'){
	$oi='-';
	}else{
	$oi=bang_num($row['OthersInvestment']);
	}
	
	
		echo "<!--tr style='text-align:center;'><td><a href='x.php?getID=". $row['Id']. "' target='_blank'>" . bang_num($row['Id'])."</a></td-->";
		echo "<td style='text-align:center;'>" . bang_num($row['T_Date']) ."</td>";
		echo "<td style='text-align:right;' class='count-me'>" . $rs ."</td>";
		
		echo "<td style='text-align:right;' class='count-me1'>" . $sw . "</td>";
		echo "<td style='text-align:right;' >" . $sb."</td>";
		echo "<td style='text-align:right;'class='count-me2'>" . $ow . "</td>";
		echo "<td style='text-align:right;' class='count-me3'>" . $ir . "</td>";
		
		echo "<td style='text-align:right;' class='count-me4'>" . $in . "</td>";
		echo "<td style='text-align:right;' >" . $ib. "</td>";
		echo "<td style='text-align:right;' class='count-me5'>" . $oi . "</td>";
		
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
	    var tda = document.getElementById('countit').getElementsByTagName('td');
	    var tdb = document.getElementById('countit').getElementsByTagName('td');
	    var tdc = document.getElementById('countit').getElementsByTagName('td');
            var sum = 0;
            var sum1 = 0;
            var sum2 = 0;
            var sum3 = 0;
            var sum4 = 0;
            var sum5 = 0;
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
            for(var pa = 0; pa < tdp.length; pa ++) {
            if(tda[pa].className == 'count-me3') {
            	var tdja=tdp[pa].innerHTML;
            	var tx1 = replaceNumbers(tdja);
                    sum3 += isNaN(tx1) ? 0 : parseInt(tx1);
                }
            }
            for(var pb = 0; pb < tdp.length; pb ++) {
            if(tdb[pb].className == 'count-me4') {
            	var tdjb=tdp[pb].innerHTML;
            	var tx2 = replaceNumbers(tdjb);
                    sum4 += isNaN(tx2) ? 0 : parseInt(tx2);
                }
            }
            for(var pc = 0; pc < tdp.length; pc ++) {
            if(tdc[pc].className == 'count-me5') {
            	var tdjc=tdp[pc].innerHTML;
            	var tx3 = replaceNumbers(tdjc);
                    sum5 += isNaN(tx3) ? 0 : parseInt(tx3);
                }
            }
            var nx=sum.toString();
            var nx1=sum1.toString();
            var nx2=sum2.toString();
            var nx3=sum3.toString();
            var nx4=sum4.toString();
            var nx5=sum5.toString();
            var sum_tx= eng_replaceNumbers(nx);
            var sum_tx1= eng_replaceNumbers(nx1);
            var sum_tx2= eng_replaceNumbers(nx2);
            var sum_tx3= eng_replaceNumbers(nx3);
            var sum_tx4= eng_replaceNumbers(nx4);
            var sum_tx5= eng_replaceNumbers(nx5);
            var nx2x=sum-sum1;
            var nx2x_=nx2x.toString();
            var nx2x_n=eng_replaceNumbers(nx2x_);
            var nx2x1=sum4-sum3+sum5;
            var nx2x_1=nx2x1.toString();
            var nx2x_n1=eng_replaceNumbers(nx2x_1);
            
            
            
           
          
document.getElementById('countit').innerHTML += '<tr><td style="text-align:right;">মোট</td><td style="text-align:right;">' + sum_tx + '</td><td style="text-align:right;">' + sum_tx1 + '</td><td style="text-align:right;">' + nx2x_n + '</td> <td style="text-align:right;">' + sum_tx2 + '</td><td style="text-align:right;">' + sum_tx3 + '</td><td style="text-align:right;">' + sum_tx4 + '</td><td style="text-align:right;">' + nx2x_n1 + '</td><td style="text-align:right;">' + sum_tx5 + '</td></tr>';


        </script>
    

    
    
  </body>
</html>
