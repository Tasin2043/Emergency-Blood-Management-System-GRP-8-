<?php 
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>

    <meta charset="UTF-8">
    
    

<?php
include 'head.html';

?>

<body>
        <div style="position:fixed;
   right:10px;
   top:60px;
   background:skyblue " >Back To<a href="login.php"> Login </a>
</div>
	<h2 style="color: black" align="left ">Registration form for Accounts Executive</h2>
<div class="col ml-5">

	





<form name="Registration_Form" action="../controller/registration_check.php" onsubmit="return validate()" method="POST">
	<label for = "fname"> First name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="fname" id="fname">

<br>
<br>

<label for = "lname"> Last name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="lname" id="lname">
<br>
<br>

<label for = "dob"> Date of birth :&nbsp;&nbsp;&nbsp;</label>
<input type="date" name="dob" id="dob">
<br>
<br>

<label for = "gender"> Gender :&nbsp;&nbsp;&nbsp;</label>
<input type="radio" name="gender" id="male" value="male">
<label for = "male"> Male </label>
<input type="radio" name="gender" id="female" value="female">
<label for = "female"> Female </label>
<br>
<br>

<label for = "email"> Email :&nbsp;&nbsp;&nbsp;</label>
<input type="email" name="email" id="email">
<br>
<br>



<label for = "username">User Name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="username" id="username">
<br>
<br>

<label for = "password"> Password :&nbsp;&nbsp;&nbsp;</label>
<input type="password" name="password" id="password">






<br>
<br>
<input type="submit" value="Submit" style="height:30px; width:150px">
</form>


<br>
	<p id="errorMsg"></p>

	<script>
			function validate() {
				var isValid = false;
				var fname = document.forms["AddNurse"]["fname"].value;
				var lname = document.forms["AddNurse"]["lname"].value;
				var dob = document.forms["AddNurse"]["dob"].value;
				var gender = document.forms["AddNurse"]["gender"].value;
				var email = document.forms["AddNurse"]["email"].value;
				var username = document.forms["AddNurse"]["username"].value;
				var password = document.forms["AddNurse"]["password"].value;


				if(fname == "" || lname == "" || dob == "" || gender == "" || email == "" || username == "" || password == "" ) {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up all the field correctly!!!</b>";
					document.getElementById("errorMsg").style.color = "red";
				}
				else {
					isValid = true;
				}

				return isValid;
			}
		</script>

</div>
</body>


</html>