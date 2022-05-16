<?php
$servername = "localhost";
$username = "mydog_main";
$password = "62@h92lyL";
$dbname = "mydog_main"; 

date_default_timezone_set("Asia/Bangkok");

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8mb4");



 ?>
 

 