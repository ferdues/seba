<?php
include("session.php");
include('functions.php');
include_once('includes/num_convert.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>এলাকা অনুযায়ী সভ্যগনের তালিকা || <?php echo COMPANY_NAME; ?></title>
   
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
    background-color: #f7f7f7;
}
table tr:nth-child(even) {
    background-color: #fffdfa;
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
      <h1 style="text-align:center; border:1px black solid; font-size:18px;">এলাকা অনুযায়ী সভ্যগনের তালিকা</h1>
</header>

<table  id="grouping">
<thead>
	<tr>
	<th>এলাকা কোড</th>	
	<th>এলাকা</th>	
	<th>আইডি</th>	
	<th>সভ্যগনের নাম</th>	
	<th>পিতার নাম</th>	
	<th>ঠিকানা</th>	
	<th>মোবাইল</th>	
	<th>Pic</th>	
	
	</tr>
	</thead><tbody>
	<!-- http://www.jonathantneal.com/examples/invoice/ -->		
			

<?php
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}
$query = "SELECT * FROM `MemberCreate` inner join AreaCreate on MemberCreate.AreaCode=AreaCreate.AreaCode order by MemberCreate.AreaCode ASC";
$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td style='text-align:center;'>" . bang_num($row['AreaCode']) . "</td>";
		echo "<td style='text-align:center;'>" . bang_num($row['AreaName']) . "</td>";
		echo "<td style='text-align:center;'>" . bang_num($row['MemberID']) . "</td>";
		echo "<td style='text-align:left;'>" . bang_num($row['MemberName']) . "</td>";
		echo "<td style='text-align:left;'>" . bang_num($row['FathersName']) . "</td>";
		echo "<td style='text-align:left;'>" . bang_num($row['Address']) . "</td>";
		echo "<td style='text-align:center;'>" . bang_num($row['Mobile']) . "</td>";
		echo "<td style='text-align:center;'><img src='data:image/jpeg;base64,".base64_encode( $row['Picture'] )."'/></td>";
		echo "</tr>";
	}
}

/* close connection */
$mysqli->close();
?>
</tbody></table>
<style>.clear { clear:both; display:block; overflow:hidden; visibility:hidden; height:0px;}</style>
<div class="clear"></div>
<br/><br/><br/><br/>
<div style="float: left;"><?php echo $user;?></div>

<div class="clear"></div><br/><br/><hr/>
<p style="font-size:60%;text-align:center;"><strong>Developed By Creation Plus | </strong>Cell: +88 01826002496</p>

<!--</page>-->

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
   <script language="javascript" type="text/javascript">
            var tds = document.getElementById('countit').getElementsByTagName('td');
            var tdj = document.getElementById('countit').getElementsByTagName('td');
            var sum = 0;
            var sum1 = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
                
            }
            for(var j = 0; j < tdj.length; j ++) {
            if(tdj[j].className == 'count-me1') {
                    sum1 += isNaN(tdj[j].innerHTML) ? 0 : parseInt(tdj[j].innerHTML);
                }
            }
          
document.getElementById('countit').innerHTML += '<tr><td colspan="4" style="text-align:right;">মোট</td><td style="text-align:right;">' + sum + '</td><td style="text-align:right;">' + sum1 + '</td><td colspan="2"></td></tr>';

//document.getElementById('countit').innerHTML += '<br/><table class="balance"><tr><th>Debit</th><td>' + sum + '</td></tr><tr><th>Credit</th><td>' + sum1 + //'</td></tr><tr><th>Closing Balance</th><td>' + (sum-sum1) + '</td></tr></table>';
        </script> 
    <script type="text/javascript">
    $(document).ready(function () {
        $('#grouping').each(function () {
            var Column_number_to_Merge = 1;
 
            // Previous_TD holds the first instance of same td. Initially first TD=null.
            var Previous_TD = null;
            var i = 1;
            $("tbody",this).find('tr').each(function () {
                // find the correct td of the correct column
                // we are considering the table column 1, You can apply on any table column
                var Current_td = $(this).find('td:nth-child(' + Column_number_to_Merge + ')');
                 
                if (Previous_TD == null) {
                    // for first row
                    Previous_TD = Current_td;
                    i = 1;
                } 
                else if (Current_td.text() == Previous_TD.text()) {
                    // the current td is identical to the previous row td
                    // remove the current td
                    Current_td.remove();
                    // increment the rowspan attribute of the first row td instance
                    Previous_TD.attr('rowspan', i + 1);
                    i = i + 1;
                } 
                else {
                    // means new value found in current td. So initialize counter variable i
                    Previous_TD = Current_td;
                    i = 1;
                }
            });
        });
    });
</script>
    
  </body>
</html>
