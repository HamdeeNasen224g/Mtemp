<?php 
 include 'db_con.php';
$studentID = $_GET["stdid"];

$sql = "delete from Student WHERE stdid = '$studentID'";
$conn->query($sql);
header( "location: student.php" );
        exit(0);
include 'db_close.php';
?>