<?php


	$name = $_REQUEST['name'];

	$conn = mysqli_connect('localhost', 'root', '', 'hospitalmanagement');
	$sql = "select * from executive where `username` like '%{$name}%'";
	$result = mysqli_query($conn, $sql);

	$response = "<table border=1>
					<tr>
						<td>FirstName</td>
						<td>Lastname</td>
						<td>DOB</td>
						<td>Gender</td>
						<td>Email</td>
						 <td>username</td>
						 
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= "	<tr>
							 <td>{$row['FirstName']}</td>
							  <td>{$row['LastName']}</td>
							   <td>{$row['DOB']}</td>
							<td>{$row['Gender']}</td>
							 <td>{$row['Email']}</td>
							 <td>{$row['username']}</td>
							 
						</tr>";
	}

	$response .= "</table>";

	echo $response;
?>
