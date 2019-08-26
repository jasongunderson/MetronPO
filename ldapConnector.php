<?php

if(!isset($_SESSION)){
 session_start();
}

try{
if(isset($_POST["userID"]) && isset($_POST["passwd"])){
	//Replace everything after including "@" with nothing
	$userID=preg_replace("(@.*$)", "", $_POST["userID"]);
	//Remove any non alphabetic characters
	$userID=preg_replace("/[^a-z]/i", "", $userID);
	//link connection to DC
	$link=ldap_connect('10.1.1.32');
	ldap_set_option($link, LDAP_OPT_PROTOCOL_VERSION, 3);
	//adds domain after striping input
	$userID=$userID."@metronihs.com";
	$userPass=$_POST["passwd"];

	if(!$ldapbind=ldap_bind($link,$userID,$userPass)){
		echo "could not bind to server<br>";
		session_destroy();
	}
	else{
		echo "success<br>";
		echo $userID."<br>";
		// filter objects by User Principal Name = userID
		$filter="(userprincipalname=".$userID.")";
		// do an ldap search of entire metron domain for userID
		$results=ldap_search($link, "dc=metronihs,dc=com", $filter) or exit("unable to search");
		//get all objects that match criteria in a multi dimensional array
		$entries=ldap_get_entries($link, $results);
		// Get the users First and Last name from entries array above
		$user=$entries[0]["displayname"][0];
		// Find user location in Domain tree 
		$OU=$entries[0]["distinguishedname"][0];
		// Remove "OU=" from domain tree locations
		preg_match_all("/(OU=[a-zA-Z\s]+)/",$OU,$match);
		$department=preg_replace("/(OU=)/", "", $match[0][0]);
		$facility=preg_replace("/(OU=)/", "", $match[0][1]);
		$_SESSION["user"] = $user;
		$_SESSION["facility"] = $facility;
		$_SESSION["department"] = $department;
		// Uncomment below for pretty print of return array
		// print("<pre>".print_r($entries,true)."</pre>");
		header('Location: Create.php');
		}// End of else for successful bind
	}// end of user id and password is set check
}// end of try
catch (exception $e) {
	echo $e;
}
?>
