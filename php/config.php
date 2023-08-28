<?php
  $hostname = "localhost";
  $username = "root";
  $password = "123";
  $dbname = "chatapp";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Lỗi SQL".mysqli_connect_error();
  }
?>