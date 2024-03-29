<?php
//check for active session
include 'session_check.php'
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Metron Purchase Order System</title>
<link rel="stylesheet" type="text/css" href="Default.css">
<script type="text/JavaScript" src="jquery-3.2.1.min.js"></script>
<script type="text/JavaScript" src="authorize.js"></script>
</head>

<body>
<div class="wrapper">

	<!-- Navigation buttons -->
	<div class="topnav">
		<a href="Create.php">Create</a>
		<a class="active" href="Review.php">Review</a>
		<a href="logout.php">Logout</a>
	</div>
	<div>
		<?php

		$connString = "mysql:host=localhost;dbname=metronpo";
        $username="metronpo";
        $password="N0tTh3P@ssword";
        $value=$_SESSION["facility"];
    try{
        $pdo= new PDO($connString,$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($_SESSION["facility"]=="Corporate"){
            $sql = "SELECT uid,facility,department,vendor,description,cost,quantity,date_submit,date_needed,admin,coo,cfo FROM requests";
            $statement = $pdo->prepare($sql);
        }
        else{
            $sql = "SELECT uid,facility,department,vendor,description,cost,quantity,date_submit,date_needed,admin,coo,cfo FROM requests WHERE facility = ?";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $value);
        }   

        $statement->execute();
        $pdo = null;
    }
    catch(PDOException $e){
    	echo "Connection failed: ".$e->getMessage();
    }
        
        if($statement->rowCount() == 0)
        {
          echo "No Results Found\n";
        }
        else{
		echo "<form role=\"form\" class=\"requests_form_class\" action=\"\" id=\"request_form_id\">";
            echo "<table id=\"requests_table_id\" class=\"requests_table_class\">\n";
            echo "<th class=\"tableheader\">Name</th><th class=\"tableheader\">Facility</th><th class=\"tableheader\">Department</th><th class=\"tableheader\">Vendor</th><th class=\"tableheader\">Discription</th><th class=\"tableheader\">Cost</th><th class=\"tableheader\">Quantity</th><th class=\"tableheader\">Date Submit</th><th class=\"tableheader\">Date Needed</th><th class=\"tableheader\">Admin Auth</th><th class=\"tableheader\">COO Auth</th><th class=\"tableheader\">CFO Auth</th>\n";
          $result =  $statement;
             foreach($result as $row){
                // If cost is under $500 and admin has signed off then highlight
		     if(!is_null($row[9])){
				     $style="style=\"background-color: #4dff4d\"";
				
             	}
                // If cost is under $5,000 and COO has signed off then highlight
             	elseif ($row[5]<5000) {
             		if(!is_null($row[10])){
             			$style="style=\"background-color: #4dff4d\"";
                    }
                 }
             	elseif (!is_null($row[11])) {
             		$style="style=\"background-color: #4dff4d\"";
             	}
             	else{
             		$style="";
             	}
              echo "<tr ".$style." class=\"tablerow\"><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>>".$row[9]."<</td><td>".$row[10]."</td><td>".$row[11]."</td></tr>\n";
              
             }
             echo "</table>";
             echo "</form>";
        } //end else
             ?>
	</div>
<!-- 	<div>
		<?php
		// echo $_SESSION["user"]."<br>";
		// echo $_SESSION["facility"]."<br>";
		// echo $_SESSION["department"]."<br>";
		?>
	</div> -->
</div>
</body>

</html>
