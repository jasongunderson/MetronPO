<?php
 include 'session_check.php'


//verify inputs

//if all good, connect to database
$connString = "mysql:host=localhost;dbname=metronpo";
$username="metronpo";
$password="N0tTh3P@ssword";
$value=$_SESSION["facility"];
    try{
        $pdo= new PDO($connString,$username,$password);					//Create a pdo connection object
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT MAX(rid) FROM requests";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $result =  $statement;
        foreach($result as $row){
        	$rid=$row[0]+1;
        }
        echo ($rid."\n");
        // echo ($_SESSION["user"]."\n");
        // echo ($_SESSION["facility"]."\n");
        // echo ($_SESSION["department"]."\n");
        echo ("after Session variables\n");



        // $sql = "INSERT INTO requests(rid,uid,facility,department,vendor,description,quantity,reason,cost,date_submit,date_needed) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        // $statement = $pdo->prepare($sql);
        // $statement->bindValue(1, $value); 

        // $statement->execute();
        // $pdo = null;

        // $result =  $statement;
        // foreach($result as $row){

        // }
    }
    catch(PDOException $e){
    	echo "Connection failed: ".$e->getMessage();
    }
        
        if($statement->rowCount() == 0)
        {
          echo "No Results Found\n";
        }
        else{

        } //end else
//return to create page

?>