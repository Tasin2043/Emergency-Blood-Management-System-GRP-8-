
<?php 

$query=mysqli_query($db,"SELECT * FROM USERS where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);

 ?>

