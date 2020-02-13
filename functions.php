<?php

include_once("includes/config.php");
function bangla_unicode(){
echo 'onkeydown="return KeyBoardDown(event);" onkeypress="return KeyBoardPress(event);"';
}
//Number Conversion

// get invoice list
function getInvoices() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
    $query = "SELECT * 
		FROM invoices i
		JOIN Customers c
		ON c.CustomerID = i.CustomerID
		
		ORDER BY i.invoice";
//WHERE i.invoice = c.invoice
	// mysqli select query
	$results = $mysqli->query($query);

	// mysqli select query
	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table" cellspacing="0"><thead><tr>

				<th><h4>Invoice</h4></th>
				<th><h4>Customer</h4></th>
				<th><h4>Issue Date</h4></th>
				<th><h4>Due Date</h4></th>
				<th><h4>Type</h4></th>
				<th><h4>Status</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

			print '
				<tr>
					<td>'.$row["invoice"].'</td>
					<td>'.$row["CustomerName"].'</td>
				    <td>'.$row["invoice_date"].'</td>
				    <td>'.$row["invoice_due_date"].'</td>
				    <td>'.$row["invoice_type"].'</td>
				';

				if($row['status'] == "open"){
					print '<td><span class="label label-info">'.$row['status'].'</span></td>';
				} elseif ($row['status'] == "paid"){
					print '<td><span class="label label-success">'.$row['status'].'</span></td>';
				}

			print '
				    <td><a href="invoice-edit.php?id='.$row["invoice"].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a href="#" data-invoice-id="'.$row['invoice'].'" data-email="'.$row['email'].'" data-invoice-type="'.$row['invoice_type'].'" data-custom-email="'.$row['custom_email'].'" class="btn btn-success btn-xs email-invoice"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> <a href="/invoices/'.$row["invoice"].'.pdf" class="btn btn-info btn-xs" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a> <a data-invoice-id="'.$row['invoice'].'" class="btn btn-danger btn-xs delete-invoice"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
			';

		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no invoices to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();

}

// Initial invoice number
function getInvoiceId() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	$query = "SELECT invoice FROM invoices ORDER BY invoice DESC LIMIT 1";

	if ($result = $mysqli->query($query)) {

		$row_cnt = $result->num_rows;

	    $row = mysqli_fetch_assoc($result);

	    //var_dump($row);

	    if($row_cnt == 0){
			echo INVOICE_INITIAL_VALUE;
		} else {
			echo $row['invoice'] + 1; 
		}

	    // Frees the memory associated with a result
		$result->free();

		// close connection 
		$mysqli->close();
	}
	
}

// Initial AreaCode
function getAreaCode() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	$query = "SELECT AreaCode FROM AreaCreate ORDER BY AreaCode DESC LIMIT 1";

	if ($result = $mysqli->query($query)) {

		$row_cnt = $result->num_rows;

	    $row = mysqli_fetch_assoc($result);

	    //var_dump($row);

	    if($row_cnt == 0){
			return AREA_INITIAL_VALUE;
		} else {
			return $row['AreaCode'] + 1; 
		}

	    // Frees the memory associated with a result
		$result->free();

		// close connection 
		$mysqli->close();
	}
	
}

// Initial MemberID
function getMemberID() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	$query = "SELECT MemberID FROM MemberCreate ORDER BY MemberID DESC LIMIT 1";

	if ($result = $mysqli->query($query)) {

		$row_cnt = $result->num_rows;

	    $row = mysqli_fetch_assoc($result);

	    //var_dump($row);

	    if($row_cnt == 0){
			return MEMBER_INITIAL_VALUE;
		} else {
			return $row['MemberID'] + 1; 
		}

	    // Frees the memory associated with a result
		$result->free();

		// close connection 
		$mysqli->close();
	}
	
}

//Item ID

function getItemId() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	$query = "SELECT ItemID FROM Items ORDER BY ItemID DESC LIMIT 1";

	if ($result = $mysqli->query($query)) {

		$row_cnt = $result->num_rows;

	    $row = mysqli_fetch_assoc($result);

	    //var_dump($row);

	    if($row_cnt == 0){
			echo INVOICE_INITIAL_VALUE;
		} else {
			echo $row['ItemID'] + 1; 
		}
	    // Frees the memory associated with a result
		$result->free();

		// close connection 
		$mysqli->close();
	}
	
}
//Pop Member List
function popMemberList() {

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
					e.Picture,
					CONCAT(e.MemberID,'-',e.AreaCode) as Unique_Code
		FROM `MemberCreate` e 
		inner join 
		`AreaCreate` s on e.AreaCode=s.AreaCode Order By e.MemberID ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>সভ্যগনের আইডি</h4></th>
				<th><h4>সভ্যগনের নাম</h4></th>
				<th><h4>এলাকার নাম</h4></th>
				<th><h4>মোবাইল</h4></th>
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
				    <td>'.bang_num($row["Mobile"]).'</td>
				    <td><a id="selected" class="btn btn-primary btn-xs member-select" data-member-name="'.$row['MemberName'].'"  data-member-id="'.bang_num($row['MemberID']).'" data-member-fathersname="'.$row['FathersName'].'" data-member-address="'.$row['Address'].'" data-member-age="'.bang_num($row['Age']).'" data-member-mobile="'.bang_num($row['Mobile']).'" data-member-nationality="'.$row['Nationality'].'" data-member-occuption="'.$row['Occuption'].'" data-member-date="'.bang_num($member_date).'" data-member-nominated="'.$row['PersonNominated'].'" data-member-nominatedaddress="'.$row['NominatedAddress'].'" data-member-nominatedmobile="'.bang_num($row['NominatedMobile']).'" data-member-nominatedrelation="'.$row['NominatedRelation'].'" data-member-areaname="'.$row['AreaName'].'" data-member-areacode="'.bang_num($row['AreaCode']).'">সিলেক্ট</a></td>
			    </tr>
		    ';
		}

		print '</tbody></table>';

	} else {

		echo "<p>প্রদর্শনের জন্য কোন সদস্য নেই.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();


}


//Pop Member List For Accounts
function popMemberListAccounts() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = " select a.`ID`,a.MemberID,a.MemberName,a.Address,a.Mobile,a.AreaCode,c.AreaName,b.SavingsBalance,b.InvestmentBalance from MemberCreate a left join (SELECT MemberID,sum(RealizationSavings)-Sum(SavingsWithdrawal) as SavingsBalance, sum(Investment)-Sum(InvenstmentRecovery)+sum(OthersInvestment) as InvestmentBalance from Accounts GROUP BY MemberID) b on a.MemberID=b.MemberID INNER join AreaCreate c on a.AreaCode=c.AreaCode Order BY a.ID ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>সভ্যগনের আইডি</h4></th>
				<th><h4>সভ্যগনের নাম</h4></th>
				<th><h4>এলাকার নাম</h4></th>
				<th><h4>মোবাইল</h4></th>
				<th><h4>কর্ম</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {
		$date=$row['MemberDate'];
		$member_date= preg_replace('/(\d+)\D+(\d+)\D+(\d+)/','$3-$2-$1',$date);
		    print '
			    <tr>
				    <td>'.bang_num($row["MemberID"]).'</td>
				    <td>'.$row["MemberName"].'</td>
				    <td>'.$row["AreaName"].'</td>
				    <td>'.bang_num($row["Mobile"]).'</td>
				    <td><a id="selected" class="btn btn-primary btn-xs member-select-account" data-member-name="'.$row['MemberName'].'"  data-member-id="'.bang_num($row['MemberID']).'"  data-member-address="'.$row['Address'].'" data-member-mobile="'.bang_num($row['Mobile']).'" data-member-areaname="'.$row['AreaName'].'" data-member-areacode="'.bang_num($row['AreaCode']).'" data-member-investment="'.bang_num($row['InvestmentBalance']).'" data-member-savings="'.bang_num($row['SavingsBalance']).'">সিলেক্ট</a></td>
			    </tr>
		    ';
		}

		print '</tbody></table>';

	} else {

		echo "<p>প্রদর্শনের জন্য কোন সদস্য নেই.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();


}

//Pop Member List
function popAreaList() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM AreaCreate ORDER BY AreaCode ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		print '	<table class="display" id="" cellspacing="0" width="100%"><thead><tr>

				<th><h4>এলাকা কোড</h4></th>
				<th><h4>এলাকার নাম</h4></th>
				<th><h4>বিবরন</h4></th>
				<th><h4>কর্ম</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
				    <td>'.bang_num($row["AreaCode"]).'</td>
				    <td>'.$row["AreaName"].'</td>
				    <td>'.$row["AreaDetails"].'</td>
				    <td><a id="selected" class="btn btn-primary btn-xs area-select" data-area-code="'.bang_num($row['AreaCode']).'"  data-area-name="'.$row['AreaName'].'" data-area-details="'.$row['AreaDetails'].'" data-memeber-area="'.$row['AreaCode'].'">সিলেক্ট</a></td>
			    </tr>
		    ';
		}

		print '</tbody></table>';

	} else {

		echo "<p>প্রদর্শনের জন্য কোন সদস্য নেই.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();


}

// populate product dropdown for invoice creation
function popProductsList() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM products ORDER BY product_name ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		echo '<select class="form-control item-select">';
		while($row = $results->fetch_assoc()) {

		    print '<option value="'.$row['product_price'].'">'.$row["product_name"].' - '.$row["product_desc"].'</option>';
		}
		echo '</select>';

	} else {

		echo "<p>There are no products, please add a product.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();

}

function popCustomerList_() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM Customers ORDER BY CustomerName ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		echo '<select class="form-control select_customers_">';
		while($row = $results->fetch_assoc()) {

		    print '<option value="'.$row['CustomerID'].'">'.$row["CustomerName"].' [ '.$row["ShopName"].' ]</option>';
		}
		echo '</select>';

	} else {

		echo "<p>There are no products, please add a product.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();

}

// populate product dropdown for invoice creation
function popItemsList() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM Items ORDER BY ItemName ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>Item ID</h4></th>
				<th><h4>Item name</h4></th>
				<th><h4>Item Type</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
				    <td>'.$row["ItemID"].'</td>
				    <td>'.$row["ItemName"].'</td>
				    <td>'.$row["ItemType"].'</td>
				    <td><a href="#" id="selected" class="btn btn-primary btn-xs items-select" data-item-name="'.$row['ItemName'].'"  data-item-id="'.$row['ItemID'].'" data-item-mrp="'.$row['Mrp'].'" data-item-type="'.$row['ItemType'].'">Select</a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no customers to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();

}


function popCustomerList() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM Customers ORDER BY CustomerID ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>Cus. ID</h4></th>
				<th><h4>Cus. name</h4></th>
				<th><h4>Phone</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
				    <td>'.$row["CustomerID"].'</td>
				    <td>'.$row["CustomerName"].'</td>
				    <td>'.$row["Mobile"].'</td>
				    <td><a href="#" id="selected" class="btn btn-primary btn-xs customer-select" data-customer-name="'.$row['CustomerName'].'"  data-customer-id="'.$row['CustomerID'].'" data-customer-mobile="'.$row['Mobie'].'" data-customer-Phone="'.$row['ItemType'].'">Select</a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no customers to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();

}










// get products list
function getItems() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM Items ORDER BY ItemName ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>Item ID</h4></th>
				<th><h4>Item Name</h4></th>
				<th><h4>Item Type</h4></th>
				<th><h4>Item Unit</h4></th>
				<th><h4>Price</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
					<td>'.$row["ItemID"].'</td>
					<td>'.$row["ItemName"].'</td>
					<td>'.$row["ItemType"].'</td>
				    <td>'.$row["unit"].'</td>
				    <td>'.$row["Mrp"].'</td>
				    <td><a href="product-edit.php?id='.$row["ItemID"].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-product-id="'.$row['ItemID'].'" class="btn btn-danger btn-xs delete-product"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no Items to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}
function getProducts() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM products ORDER BY product_name ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>Product</h4></th>
				<th><h4>Description</h4></th>
				<th><h4>Price</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
					<td>'.$row["product_name"].'</td>
				    <td>'.$row["product_desc"].'</td>
				    <td>'.$row["product_price"].'</td>
				    <td><a href="product-edit.php?id='.$row["product_id"].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-product-id="'.$row['product_id'].'" class="btn btn-danger btn-xs delete-product"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no products to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}


// get user list
function getUsers() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM users ORDER BY username ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>

				<th><h4>Name</h4></th>
				<th><h4>Username</h4></th>
				<th><h4>Email</h4></th>
				<th><h4>Phone</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
			    	<td>'.$row['name'].'</td>
					<td>'.$row["username"].'</td>
				    <td>'.$row["email"].'</td>
				    <td>'.$row["phone"].'</td>
				    <td><a href="user-edit.php?id='.$row["id"].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-user-id="'.$row['id'].'" class="btn btn-danger btn-xs delete-user"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no users to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}

// get user list
function getCustomers() {

	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
	$query = "SELECT * FROM store_customers ORDER BY name ASC";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {

		print '<table class="table table-striped table-bordered" id="data-table"><thead><tr>
				<th><h4>Name</h4></th>
				<th><h4>Email</h4></th>
				<th><h4>Phone</h4></th>
				<th><h4>Action</h4></th>

			  </tr></thead><tbody>';

		while($row = $results->fetch_assoc()) {

		    print '
			    <tr>
				    <td>'.$row["name"].'</td>
				    <td>'.$row["email"].'</td>
				    <td>'.$row["phone"].'</td>
				    <td><a href="customer-edit.php?id='.$row["id"].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-customer-id="'.$row['id'].'" class="btn btn-danger btn-xs delete-customer"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		print '</tr></tbody></table>';

	} else {

		echo "<p>There are no customers to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}

?>