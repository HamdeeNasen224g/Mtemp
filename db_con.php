<?php 
$servername = "127.0.0.1:3325";
$username = "root";
$password = "";
$dbname = "mtemp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>
