<?php  

session_start();
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : ""; 

 
if(!isset($_SESSION['username']))
{

    header('location:login.php');
}

?>

<html>
<head>
 <title></title>
</head>
<style >
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  padding: 0px;
  font-size: 18px;
}
</style>
<body>
  <header>


</header>
  <div style=" background: tomato">
  
<div class="sticky">
 <b> <h1 style="background: grey " align="center">Welcome To Hospital Accounts Executive ,<?php echo $userName; ?></h1><b/>
</div>
  <h2>Homepage</h2>
  
  <ul>


<li><a href="checkprofile.php">Check profile</a><br><br>
<li><a href="Update_Profile.php">Update Profile </a><br><br>
<li><a href="../controller/Change_Password.php">Change Password </a><br><br>
<li><a href="../controller/Update personal schedule.php">Update personal schedule </a><br><br>
<li><a href="ExecutiveDetails.php">Search Executive List</a><br><br>
<li><a href="RecipientsDetails.php">Check Recipients Details</a><br><br>
<li><a href="logout.php">Logout</a><br><br>

 </ul>

</div>
</table><br>

<br><br>

</body>
<?php
include 'footer.html'
?>


</html>