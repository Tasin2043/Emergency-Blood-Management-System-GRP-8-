<?php

	$name = $_REQUEST['name'];

	$conn = mysqli_connect('localhost', 'root', '', 'hospitalmanagement');
	$sql = "select * from recipients where `username` like '%{$name}%'";
	$result = mysqli_query($conn, $sql);

	$response = "<table border=1>
					<tr>
						<td>FirstName</td>
						<td>Lastname</td>
						<td>DOB</td>
						<td>Gender</td>
						<td>Email</td>
						 <td>username</td>
						 <td>BloodGroup</td>
						 <td>disease</td>
					</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$response .= "	<tr>
							 <td>{$row['FirstName']}</td>
							  <td>{$row['LastName']}</td>
							   <td>{$row['DOB']}</td>
							<td>{$row['Gender']}</td>
							 <td>{$row['Email']}</td>
							 <td>{$row['username']}</td>
							 <td>{$row['BloodGroup']}</td>
							 <td>{$row['Disease']}</td>
						</tr>";
	}

	$response .= "</table>";

	echo $response;
?>
