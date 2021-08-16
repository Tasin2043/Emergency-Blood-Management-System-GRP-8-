
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Request</title>
</head>
<body>

	 <?php require "head.html" ?>
	

	<?php 
	session_start();
	$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : "";

?>
<div class="aside"> 
<table border="0" bgcolor="silver" align="left" cellspacing="25">	

	<tr>
		<td>
<?php
		define("filepath", "user.json");
		if($userId === "Tasin") {
		
			function read() {
				$resource = fopen(filepath, "r");
				$fz = filesize(filepath);
				$fr = "";
				if($fz > 0) {
					$fr = fread($resource, $fz);
				}
				fclose($resource);
				return $fr;
			}

			$reg_request = read();
			$reg_request_array = explode("\n", $reg_request);
			echo "<table >";
			echo "<tr><th>User Name</th>";
			echo "<th>Password</th></tr>";

		for($i = 0; $i < count($reg_request_array) - 1; $i++) {
				$reg_request_array_decode = json_decode($reg_request_array[$i]);
				echo "<tr>";
				echo "<td>" . $reg_request_array_decode->username . "</td>";

				echo "<td>" . $reg_request_array_decode->password . "</td>";
				echo "</tr>";
			}
			
			echo "</table>";
		
		}
		else {
			echo "<h3 style='color:green;'>Unauthorized Access</h3>";
		}


?>
</td>
</tr>
</table>
	</div>



	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<hr>
	<p>Go <a href="homepage.php">Home</a></p>
	<p> <a href="logout.php">Logout</a></p>

</body>
</html>