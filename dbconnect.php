<?php
$servername = "localhost";
$username="root";
$password="";
$db='project1';
$conn =new mysqli($servername,$username,$password,$db);
if($conn->connect_error) {
	die("connection failed: " .$conn->connect_error);
}
else
	//echo "connected";
?>
