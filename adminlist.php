</form>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
</head>
<body>
<?php include "../view/header.html" ?>
	

<?php
    require '../model/DbConnect.php';
    require '../model/DbRead.php';
    require '../model/DbDelete.php';
   $successfulMessage = $errorMessage = "";
    $bloodgroup = empty($_GET['bloodgroup']) ? "" : $_GET['bloodgroup'];
    if (empty($_GET['search']) or empty($bloodgroup)) {
    	$adminlist = getAllUsers();
    }
    else{
    	$donor = getUser($bloodgroup );
    }

     if (!empty($_GET['uname'])and !empty($_GET['pnumber'])){
      $response = deleteUser($_GET['uname'] , $_GET['pnumber']);
      if($response) {
        $successfulMessage = "Successfully deleted an User!";
      }
      else{
        $errorMessage = "Error while deleted an user!";
      }
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

  if(count($adminlist)> 0){
    echo "<table>";
    echo "<tr>";
    echo "<th>User Name</th>";
    echo "<th>Registration As</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Address</th>";
    echo "<th>Contact Number</th>";
    echo "</tr>";
    for($i = 0; $i < count($adminlist); $i++){
    	echo "<tr>";
    	echo "<td>" . $adminlist[$i]["username"] . "</td>";
    	echo "<td>" . $adminlist[$i]["regfor"] = "admin" . "</td>";
    	echo "<td>" . $adminlist[$i]["bloodgroup"] . "</td>";
    	echo "<td>" . $adminlist[$i]["address"] . "</td>";
    	echo "<td>" . $adminlist[$i]["phonenumber"] . "</td>";
      echo "<td> <a href='" . $_SERVER['PHP_SELF'] . "?uname=" . $adminlist[$i]["username"] ."&pnumber=" . $adminlist[$i]["phonenumber"] ."'>Delete</a> </td>";
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