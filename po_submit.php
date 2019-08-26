<?php

	$connString = "mysql:host=10.1.25.23;dbname=metronpo";
	$username="administrator";
	$password="30Met@2007";
	$pdo= new PDO($connString,$username,$password);
	$sql = "INSERT INTO requests(rid,uid,facility,department,vendor,quantity,cost,date_submit) VALUES('7','Jason Gunderson','Corporate','IT','Microsoft','4','150','2019-08-26');";
	$statement = $pdo->prepare($sql);
            
	$statement->execute();
	$pdo = null;
				
	?>