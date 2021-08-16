<?php 

function connect(){  
$conn = new mysqli("localhost", "bld", "20433402", "bld");

if ($conn->connect_errno){
	die("Database connection failed ..." . $conn->connect_error);
}
return $conn;
}
?>