<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chatapp";
  $secretKey = "6LdMPOAeAAAAAN2NJVMZtEiWRKJWrWey4SSEwm_q";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
