<?php

session_start();
if(!is_null($_SESSION["user"])){
	echo $_SESSION["user"]."<br>";
	echo $_SESSION["facility"]."<br>";
	echo $_SESSION["department"]."<br>"; 
}

if(!is_null($_POST["profile"])) {
	
	echo "Profile Updated";

	$OPTIONS = array
		(
		array("Lonnie Collins", "Belding Facility", "Maintenance"),
		array("Nurse Lady", "Belding Facility", "Nursing"),
		array("Nurse Lady2", "Belding Facility", "Nursing"),
		array("Nurse Lady3", "Belding Facility", "Nursing")
		);
	
	$_SESSION["user"] = $OPTIONS[$_POST["profile"]][0];
	$_SESSION["facility"] = $OPTIONS[$_POST["profile"]][1];
	$_SESSION["department"] = $OPTIONS[$_POST["profile"]][2];
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Test User Options</title>
</head>

<body>

	<form action="test_login.php" method="post">
		Options:
		<select name="profile">
				<option value="0">Lonnie</option>
				<option value="1">Nurse Lady</option>
				<option value="2">Nurse Lady2</option>
				<option value="3">Nurse Lady3</option>
		</select></br>
		<input type="submit" value="Submit" style="width:10em">
		</select><br>
	</form>

</body>
</html>