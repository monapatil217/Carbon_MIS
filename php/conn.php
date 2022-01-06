<?php
$db_name = "dpr_new";
$mysqli_username = "root";
$mysqli_password = "Root@123";
$server_name = "localhost";
$conn = mysqli_connect($server_name, $mysqli_username, $mysqli_password, $db_name);
if ($conn) {
	mysqli_select_db($conn, $db_name);
} else {
	echo "<script>alert('Please check the connection!');</script>";
}
