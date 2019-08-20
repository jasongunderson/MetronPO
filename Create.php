<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Metron Purchase Order System</title>
<link rel="stylesheet" type="text/css" href="10.1.25.23/default.css">

<?php
//uncomment when login is working
include 'session_check.php'
?>

</head>

<body>
<div class="wrapper">

	<!-- Navigation buttons -->
	<div class="topnav">
		<a class="active" href "Create.php">Create</a>
		<a href="Review.php">Review</a>
		<!-- <a href="Logout.php">Logout</a> -->
	</div>
	
	<!-- Main Purchase Order Form -->
	<div class="createform">
		<h1>Create Purchase Order</h1>
		<form action="/action_page.php" method="post">
			Facility:<br>
			<select name="facility">
				<option value="Belding">Belding</option>
				<option value="Big Rapids">Big Rapids</option>
				<option value="Cedar Springs">Cedar Springs</option>
				<option value="Corporate">Corporate</option>
				<option value="Forest Hills">Forest Hills</option>
				<option value="Greenville">Greenville</option>
				<option value="HealthBridge">HealthBridge</option>
				<option value="Lamont">Lamont</option>
			</select><br>
			Vendor name:<br>
			<input type="text" name="vendor" required><br>
			Item description:<br>
			<input type="text" name="item" required><br>
			Total Cost:<br>
			<input type="number" name="quantity" min="0" step="0.01" required><br>
			Quantity:<br>
			<input type="number" name="quantity" min="0" required><br>
			Reason for request:<br>
			<textarea rows="4" cols="45" required></textarea><br>
			Date needed:<br>
			<input type="date" name="date2" style="width:10em" required><br>
			<input type="submit" value="Submit" style="width:10em">
		</form>
	</div>
</div>
</body>

</html>