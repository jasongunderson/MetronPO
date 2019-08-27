<?php
if(!isset($_SESSION)){
 session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Metron Purchase Order System</title>
<link rel="stylesheet" type="text/css" href="Default.css">
<script type="text/JavaScript" src="jquery-3.2.1.min.js"></script>
<script type="text/JavaScript" src="authorize.js"></script>

<?php
//check for active session
include 'session_check.php'
?>

</head>

<body>
<div class="wrapper">

	<!-- Navigation buttons -->
	<div class="topnav">
		<a href="Create.php">Create</a>
		<a class="active" href="Review.php">Review</a>
	</div>
	<div>
		<?php
		echo $_SESSION["user"]."<br>";
		echo $_SESSION["facility"]."<br>";
		echo $_SESSION["department"]."<br>";
		?>
	</div>
</div>
</body>

</html>