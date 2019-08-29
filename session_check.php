<?php
session_start();

// ** If not logged in reirect to login page
if(!isset($_SESSION["user"])){
  header("Location: metronpo.php");

  
}




?>







