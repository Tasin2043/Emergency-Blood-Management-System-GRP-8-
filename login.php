<?php  
session_start();
 
if(!isset($_SESSION['username']))
{
  header("location:");  
}

?>

<?php 
   include 'head.html'; 
		$UserName = "";
		$Password = "";
		$UserNameErr = "";
		$PasswordErr = "";
	if( $_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	
		if(empty($_POST['username'])){
		$UserNameErr = "please fill up this properly"; 
				 
	}
	else{

		$UserName = $_POST['username'];
		

	}
		if(empty($_POST['password'])){
		$PasswordErr = "please fill up this properly"; 
				 
	}
	else{

		$Password = $_POST['password'];
		

	}

}
?>


<!DOCTYPE html>
<html>
<head>
	  <meta charset="UTF-8">
   
</head>
<body>
<div align="center">
<title> Login </title>

<form name="login" action="../controller/logincheck.php" onsubmit="return validate()" method="POST">
  <table>
 
  
    <tr>

      <td><h2>Login</h2></td>
    </tr>
    <tr>
      <td>Username:</td>
      <td><input name="username" type="text" class="Input" >
     <p> <?php echo $UserNameErr; ?> </p>
      </td>
<br>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input name="password" type="password" class="Input" >
     <p> <?php echo $PasswordErr; ?> </p>
      </td>
<br>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
	



  </table>
</form>
<br>
	<p id="errorMsg"></p>

	<script>
			function validate() {
				var isValid = false;

				var username = document.forms["executivelogin"]["username"].value;
				var password = document.forms["executivelogin"]["password"].value;


				if( username == "" || password == "" ) {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
					document.getElementById("errorMsg").style.color = "red";
				}
				else {
					isValid = true;
				}

				return isValid;
			}
		</script>


</body>
<br><br>
<a href="registration_form.php" style="color:red"> Click! Here For Registration</a>
</html>