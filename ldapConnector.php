<?php

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
		echo "could not bind<br>";
		session_destroy();
		echo "<form action=\"http://10.1.25.23/ldap/metronpo.php\" method=\"get\"><br>";
		echo "<button type=\"submit\">Home</button>";
	}
	else{
		echo "success<br>";
		echo $userID."<br>";
		//Print cleaned up user name
		echo "<form action=\"http://10.1.25.23/ldap/metronpo.php\" method=\"get\"><br>";
		//Button return to home page
		echo "<button type=\"submit\">Home</button><br><br>";
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
		header('Location: create.php');
		}// End of else for successful bind
	}// end of user id and password is set check
}// end of try
catch (exception $e) {
	echo $e;
}
?>
