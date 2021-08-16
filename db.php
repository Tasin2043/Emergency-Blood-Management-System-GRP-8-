<?php
	class db{
		function OpenCon(){
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$db = "hospitalmanagement";
			$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
			 
			return $conn;
	 	}

	 	function CheckUser($conn,$table,$username){
	 		$result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."'");
		 	return $result;//row
	 	}
		
	   function CloseCon($conn){
	 		$conn -> close();
	 	}
	}
?>