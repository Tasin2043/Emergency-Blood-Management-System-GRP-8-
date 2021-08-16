</form>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Recipient List</title>
</head>
<body>

	  <?php include "../view/header.html" ?>
<hr>
	

<?php
    require '../model/DbConnect.php';
    require '../model/DbRead.php';
   $successfulMessage = $errorMessage = "";
    $bloodgroup = empty($_GET['bloodgroup']) ? "" : $_GET['bloodgroup'];
    if (empty($_GET['search']) or empty($bloodgroup)) {
    	$recipientlist = getAllUsers();
    }
    else{
    	$recipientlist = getUser($bloodgroup );
    }

?>


<table border="0" bgcolor="white" align="center" cellspacing="80">
<tr><td>
  
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <br>
		<input type="text" name="bloodgroup" value="<?php echo  $bloodgroup; ?>">
		<input type="submit" name="search" value="Search">
<br><br>
</form> 


<?php

  if(count($recipientlist)> 0){
    echo "<table>";
    echo "<tr>";
    echo "<th>User Name</th>";
    echo "<th>Registration As</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Address</th>";
    echo "<th>Contact Number</th>";
    echo "</tr>";
    for($i = 0; $i < count($recipientlist); $i++){
    	echo "<tr>";
    	echo "<td>" . $recipientlist[$i]["username"] . "</td>";
    	echo "<td>" . $recipientlist[$i]["regfor"] = "recipient" . "</td>";
    	echo "<td>" . $recipientlist[$i]["bloodgroup"] . "</td>";
    	echo "<td>" . $recipientlist[$i]["address"] . "</td>";
    	echo "<td>" . $recipientlist[$i]["phonenumber"] . "</td>";
    	echo "</tr>";
    }
    echo"</table>";
}
else{
	echo"<h3> No Records Found! </h3>";
}
?>


</td></tr>
</table>
<br><br><br><br><br>
<span style ="color: green;"><?php echo $successfulMessage; ?></span>
<span style ="color: red;"><?php echo $errorMessage; ?></span>


</body>
</html>
<br>	
<?php include "../view/footer.html" ?>
</body>
</html>