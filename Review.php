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
		echo "before running pdo conection\n";
		$connString = "mysql:host=localhost;dbname=metronpo";
        $username="metronpo";
        $password="N0tTh3P@ssword";

        $value=$_SESSION["facility"];
        $pdo= new PDO($connString,$username,$password);
        $sql = "SELECT uid,facility,cost,date_submit FROM requests WHERE facility = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $value);
        $statement->execute();
                
        $pdo = null;

        if($statement->rowCount() == 0)
        {
          echo "No Results Found\n";
        }
        else{
        	echo "results found \n";
		echo "<form role=\"form\" class=\"requests_form_class\" action=\"\" id=\"request_form_id\">";
            echo "<table id=\"requests_table_id\" class=\"requests_table_class\">\n";
            echo "<th class=\"tableheader\">Name</th><th class=\"tableheader\">Facility</th><th class=\"tableheader\">Cost</th><th class=\"tableheader\">Date</th>\n";
          $result =  $statement;
             foreach($result as $row){
              echo "<tr class=\"tablerow\"><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>\n";
              
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