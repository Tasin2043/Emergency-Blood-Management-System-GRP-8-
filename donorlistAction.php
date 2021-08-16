
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DONOR LIST</title>
</head>
<body>

	<?php include "../view/header.html" ?>	

<?php
    require '../model/DbConnect.php';
    require '../model/DbRead.php';

    $bloodgroup = empty($_GET['bloodgroup']) ? "" : $_GET['bloodgroup'];
    if (empty($bloodgroup)) {
    	$donorlistAction = getAllUsers();
    }
    else{
    	$donorlistAction = getUser($bloodgroup );
    }

  if(count($donorlistAction)> 0){
    echo "<table>";
    echo "<tr>";
    echo "<th>User Name</th>";
    echo "<th>Registration As</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Address</th>";
    echo "<th>Contact Number</th>";
    echo "</tr>";
    for($i = 0; $i < count($donorlistAction); $i++){
    	echo "<tr>";
    	echo "<td>" . $donorlistAction[$i]["username"] . "</td>";
    	echo "<td>" . $donorlistAction [$i]["regfor"] ="Donor" . "</td>";
    	echo "<td>" . $donorlistAction[$i]["bloodgroup"] . "</td>";
    	echo "<td>" . $donorlistAction[$i]["address"] . "</td>";
    	echo "<td>" . $donorlistAction[$i]["phonenumber"] . "</td>";
    	echo "</tr>";
    }
    echo"</table>";
}

?>




</body>
</html>
<br>	
<?php include "../view/footer.html" ?>
</body>
</html>