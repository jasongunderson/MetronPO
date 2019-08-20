<?php
session_start();

$link = ldap_connect('metronihs.com'); // Your domain or domain server

if(! $link) {
    // Could not connect to server - handle error appropriately
	echo "failed link";
	
}

ldap_set_option($link, LDAP_OPT_PROTOCOL_VERSION, 3); // Recommended for AD

// Now try to authenticate with credentials provided by user
if (! ldap_bind($link, $_POST["uname"]."@metronihs.com", $_POST["psw"])) {
    // Invalid credentials! Handle error appropriately
	session_destroy();
	echo "invalid credentials!";
}

else {
	//echo "Hello" . htmlspecialchars($_POST["uname"]) . '!';
	  header("Location: create.php");

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">


</head>
<body>
Something Went Wrong!
</body>
</html>