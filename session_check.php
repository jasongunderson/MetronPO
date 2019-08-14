<?php

// *** Check Session Cookie*****************
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// ** If not logged in reirect to login page
if(!isset($_SESSION["userID"])){
  header("Location: http://10.1.25.23/metronpo.html");

  
}




?>







