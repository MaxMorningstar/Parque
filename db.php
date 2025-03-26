<?php
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "parque_acuatico";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
