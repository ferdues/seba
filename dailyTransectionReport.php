<?php
include("session.php");
include('functions.php');
include_once('includes/num_convert.php');
//$memberid= $_GET['member_id'];
//$membername=$_GET['member_name'];
//$m_id=eng_num($memberid);
$s_date=$_GET['sdate'];
$e_date=$_GET['edate'];
$sdate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$s_date);
$edate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$e_date);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>দৈনিক/মাসিক আদায়/বিতরন হিসাব || <?php echo COMPANY_NAME; ?></title>
   
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
    background-color: #FFFFFF;
}
</style>
    
  </head>

  <body>

    <!--<page size="A4">-->
<header>
<h2 style="text-align:center;"><?php echo COMPANY_NAME; ?></h2> 
     <p style="text-align:center; font-size:90%;"><?php echo COMPANY_ADDRESS_1 .', '.COMPANY_ADDRESS_2; ?></p>
     <p style="text-align:center; font-size:85%;">মোবাইল : <?php echo COMPANY_ADDRESS_3;?></p>
     <!--p style="text-align:center; font-size:75%;">Email: <?php echo COMPANY_EMAIL;?></p-->
      <h1 style="text-align:center; border:1px black solid; font-size:18px;">দৈনিক/মাসিক আদায়/বিতরন হিসাব</h1>
</header>

<?php
if ($s_date==$e_date) {
    echo '<p style="text-align:center; font-size:80%;"> দৈনিক আদায়/বিতরন হিসাব ' .  bang_num(preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$1-$2-$3",$s_date));
} else {
     echo '<p style="text-align:center; font-size:80%;"> মাসিক আদায়/বিতরন হিসাব ' . bang_num(preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$1-$2-$3",$s_date)) . ' হতে ' . bang_num(preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$1-$2-$3",$e_date)) . '</p>';
}
?>
<table class="meta1" id="countit">
	<tr>
	<th>আইডি</th>	
	<th>সভ্যগনের নাম</th>	
	<th>সঞ্চয় আদায়</th>	
	<th>সঞ্চয় উত্তোলন</th>
	<th>অন্যান্য আদায়</th>	
	<th>সঞ্চয় ব্যালেন্স</th>
	<th>সার্ভিস চার্জ</th>		
	<th>বিনিয়োগ আদায়</th>	
	<th>বিনিয়োগ বিতরন</th>
	<th>মোট বিনিয়োগ</th>
	<th>মোট আদায়</th>
	</tr>
			
<?php
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}
$query = "SELECT * FROM `Accounts` inner join  MemberCreate on Accounts.MemberID=MemberCreate.MemberID Where (Accounts.T_Date Between '". $sdate ."' and '". $edate ."') order by Accounts.Id ASC";

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
		
		echo "<tr style='text-align:center;'><td>" . bang_num($row['MemberID'])."</td>";
		echo "<td style='text-align:left;'>" . bang_num($row['MemberName']) ."</td>";
		echo "<td style='text-align:right;' class='count-me'>" . $rs ."</td>";
		echo "<td style='text-align:right;' class='count-me1'>" . $sw . "</td>";
		echo "<td style='text-align:right;'class='count-me2'>" . $ow . "</td>";
		echo "<td style='text-align:right;' >" . $sb ."</td>";
		echo "<td style='text-align:right;' class='count-me3'>" . $oi . "</td>";
		
		echo "<td style='text-align:right;' class='count-me6'>" . $ir . "</td>";
		
		echo "<td style='text-align:right;' class='count-me7'>" . $in . "</td>";
		echo "<td style='text-align:right;' class='count-me4'>" . bang_num($row['SavingsWithdrawal']+$row['Investment']) . "</td>";
		
		echo "<td style='text-align:right;' class='count-me5'>" . bang_num($row['RealizationSavings']+$row['Others_Withdrawal']+$row['InvenstmentRecovery']) . "</td>";
		
		
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
            var sum3 = 0;
            var sum4 = 0;
            var sum5 = 0;
            var sum6 = 0;
            var sum7 = 0;
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
            if(tdp[pa].className == 'count-me3') {
            	var tdja=tdp[pa].innerHTML;
            	var tx1 = replaceNumbers(tdja);
                    sum3 += isNaN(tx1) ? 0 : parseInt(tx1);
                }
            }
            for(var pb = 0; pb < tdp.length; pb ++) {
            if(tdp[pb].className == 'count-me4') {
            	var tdjb=tdp[pb].innerHTML;
            	var tx2 = replaceNumbers(tdjb);
                    sum4 += isNaN(tx2) ? 0 : parseInt(tx2);
                }
            }
            for(var pc = 0; pc < tdp.length; pc ++) {
            if(tdp[pc].className == 'count-me5') {
            	var tdjc=tdp[pc].innerHTML;
            	var tx3 = replaceNumbers(tdjc);
                    sum5 += isNaN(tx3) ? 0 : parseInt(tx3);
                }
            }
            for(var pd = 0; pd < tdp.length; pd ++) {
            if(tdp[pd].className == 'count-me6') {
            	var tdjd=tdp[pd].innerHTML;
            	var tx6 = replaceNumbers(tdjd);
                    sum6 += isNaN(tx6) ? 0 : parseInt(tx6);
                }
            }
            for(var pe = 0; pe < tdp.length; pe ++) {
            if(tdp[pe].className == 'count-me7') {
            	var tdje=tdp[pe].innerHTML;
            	var tx7 = replaceNumbers(tdje);
                    sum7 += isNaN(tx7) ? 0 : parseInt(tx7);
                }
            }
            var nx=sum.toString();
            var nx1=sum1.toString();
            var nx2=sum2.toString();
            var nx3=sum3.toString();
            var nx4=sum4.toString();
            var nx5=sum5.toString();
            var nx6=sum6.toString();
            var nx7=sum7.toString();
            var sum_tx= eng_replaceNumbers(nx);
            var sum_tx1= eng_replaceNumbers(nx1);
            var sum_tx2= eng_replaceNumbers(nx2);
            var sum_tx3= eng_replaceNumbers(nx3);
            var sum_tx4= eng_replaceNumbers(nx4);
            var sum_tx5= eng_replaceNumbers(nx5);
            var sum_tx6= eng_replaceNumbers(nx6);
            var sum_tx7= eng_replaceNumbers(nx7);
            var nx2x=sum-sum1;
            var nx2x_=nx2x.toString();
            var nx2x_n=eng_replaceNumbers(nx2x_);
            var nx2x1=sum4-sum3+sum5;
            var nx2x_1=nx2x1.toString();
            var nx2x_n1=eng_replaceNumbers(nx2x_1);
            
            
            
           
          
document.getElementById('countit').innerHTML += '<tr><td style="text-align:right;">মোট</td><td></td><td style="text-align:right;">' + sum_tx + '</td>		<td style="text-align:right;">' + sum_tx1 + '</td><td style="text-align:right;">'+ sum_tx2 +'</td><td style="text-align:right;"></td><td style="text-align:right;">'+ sum_tx3 +'</td><td style="text-align:right;">'+ sum_tx6 +'</td><td style="text-align:right;">'+ sum_tx7 +'</td><td style="text-align:right;"><strong>' + sum_tx4 + '</strong></td><td style="text-align:right;"><strong>' + sum_tx5 + '</strong></td></tr>';


        </script>
    

    
    
  </body>
</html>
