<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db_name = "rosette_db";

$connection = mysqli_connect($localhost, $username, $password, $db_name);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
