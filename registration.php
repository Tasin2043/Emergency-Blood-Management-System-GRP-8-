<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Registration Form</title>
</head>
<body>

    <?php include "../view/header.html" ?>

   
    <?php 
     require '../model/DbConnect.php';
	 require '../model/DbInsert.php';
	$successfulMessage = $errorMessage = "";
	$firstnameErr = $lastnameErr = $genderErr = $dobErr = $phonenumberErr = $addressErr = $bloodgroupErr = $regforErr = $usernameErr = $passwordErr = "";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $bloodgroup = $_POST['bloodgroup'];
        $regfor = $_POST['regfor'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$isValid = true;


		if(empty($firstname)) {
			$firstnameErr = "Please fill it up!";
			$isValid = false;
		}
		if(empty($lastname)) {
			$lastnameErr = "Please fill it up!";
			$isValid = false;
		}


		if(empty($dob)) {
			$dobErr = "Please fill it up!";
			$isValid = false;
		}
		
		if(empty($phonenumber)) {
			$phonenumberErr = "Give your personal number please!";
			$isValid = false;
		}
		
		if(empty($address)) {
			$addressErr = "Please give Your District Only!";
			$isValid = false;
		}
		
		if(empty($bloodgroup)) {
			$bloodgroupErr = "Select your Blood Group!";
			$isValid = false;
		}

		if(empty($regfor)) {
			$regforErr = "Select!";
			$isValid = false;
		}

		if(empty($username)) {
			$usernameErr = "Empty!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Empty!";
			$isValid = false;
		}


		if($isValid) {
			$firstname = test_input($firstname);
			$lastname = test_input($lastname);
			$gender = test_input($gender);
		    $dob = test_input($dob);
		    $phonenumber = test_input($phonenumber);
            $address = test_input($address);
            $bloodgroup = test_input($bloodgroup);
            $regfor = test_input($regfor);
			$username = test_input($username);
			$password = test_input($password);
			$response = register($firstname,$lastname,$gender,$dob,$phonenumber,$address,$bloodgroup,$regfor,$username,$password);

			if($response) {
					$successfulMessage = "Registration Successful!";
				}
			else {
				$errorMessage = "You have to fill the form properly!";
		   }
          }
		}
	
	function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
	}
?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name = "registrationForm" onsubmit= "return isValid()">
		<table border="3" bgcolor="white" align="center">
<tr> <td>
		<fieldset>

			<legend> <span style="color: red;"> Registration Form:</legend>

			<label for="firstname">First Name <span style="color: red;">*</span>:</label>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
			<input type="text" name="firstname" id="firstname" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
			<span style="color:red" id= "firstnameErr"><?php echo $firstnameErr; ?></span> <br><br>

			<label for="lastname">Last Name <span style="color: red;">*</span>:</label>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
			<input type="text" name="lastname" id="lastname" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
			<span style="color:red" id= "lastnameErr"><?php echo $lastnameErr; ?></span> <br><br>


<label for="gender"> Gender <span style="color: red;">*</span>:</label> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
 <input  type= "radio" name="gender" id="gender" value="male"> 
 <label for="male">Male</label> 
 <input type="radio" name="gender" id="gender" value="female"> 
 <label for="female">Female</label> 
 <input type="radio" name="gender" id="gender" value="other"> 
 <label for="other">Other</label>
 <span style="color: red;" id= "genderErr"><?php echo $genderErr; ?></span> 



 <br><br>



            <label for="dob"> Date of birth<span style="color: red;">*</span>:</label>&nbsp; &nbsp;&nbsp;&nbsp;
            <input type="date" id="dob" name="dob" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
            <span style="color:red" id= "dobErr"><?php echo $dobErr; ?></span> <br><br>


            <label for="phonenumber">Phone Number<span style="color: red;">*</span>:</label>&nbsp; 
            <input type="tel" id="phonenumber" name="phonenumber" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
            <span style="color:red" id= "phonenumberErr"><?php echo $phonenumberErr; ?></span><br><br>



            <label for="address">Address <span style="color: red;">*</span>:</label>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; 
            <input type="textarea" id="address" name="address" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
            <span style="color:red" id= "addressErr"><?php echo $addressErr; ?></span> <br><br>



            <label for="bloodgroup">Blood Group <span style="color: red;">*</span>: </label>&nbsp; &nbsp;
  <select name="bloodgroup" id="bloodgroup" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
      <option value=""></option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
  
            <span style="color:red" id= "bloodgroupErr"><?php echo $bloodgroupErr; ?></span> </select> <br><br>

      <label for="regfor">Registration As <span style="color: red;">*</span>: </label>
      <select name="regfor" id="regfor" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
      <option value=""></option>
      <option value="admin.php">Admin</option>
      <option value="homepage.php">Donor </option>
      <option value="homepage.php">Recipient</option>
      <option value="homepage.php">Hospital Exicutive</option>
      <span style="color:red" id= "regforErr"><?php echo $regforErr; ?></span> </select> 

</fieldset>
<br>
<fieldset>
    <legend> <span style="color: blue;"> Account Information:</legend>
			<label for="username">User Name <span style="color: red;">*</span>:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="username" id="username" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
			<span style="color:red" id= "usernameErr"><?php echo $usernameErr; ?></span> <br><br>


			<label for="password">Password <span style="color: red;">*</span>:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="password" name="password" id="password" style="
    border-left-width: 1px;
    padding-left: 1px;
    width: 165px;
">
			<span style="color:red" id= "passwordErr"><?php echo $passwordErr; ?></span>
</fieldset>
			<br>

		&nbsp;&nbsp;&nbsp;
		<input type="submit" name="submit" value="Register" style="
		color: red;
    padding-top: 3px;
    padding-bottom: 3px;
    border-right-width: 3px;
    border-left-width: 3px;
    width: 77.99432px;
    height: 29.97728px;
    border-top-width: 5px;
    border-bottom-width: 5px;
">
	
	</form>

<p style ="color:green"><?php echo $successfulMessage; ?></p>
<p style ="color:red"><?php echo $errorMessage; ?></p>

<script>

    function isvalid() {
        var flag = true;
        var firstnameErr = document.getElementById("firstnameErr");
        var lastnameErr = document.getElementById("lastnameErr");
        var genderErr = document.getElementById("genderErr");
        var dobErr = document.getElementById("dobErr");
        var phonenumberErr = document.getElementById("phonenumberErr");
        var addressErr = document.getElementById("addressErr");
        var bloodgroupErr = document.getElementById("bloodgroupErr");
        var regforErr = document.getElementById("regforErr");
        var usernameErr = document.getElementById("usernameErr");
        var passwordErr = document.getElementById("passwordErr");

        var firstname = document.forms["registrationForm"]["firstname"].value;
        var lastname = document.forms["registrationForm"]["lastname"].value;
        var gender = document.forms["registrationForm"]["gender"].value;
        var dob = document.forms["registrationForm"]["dob"].value;
        var phonenumber = document.forms["registrationForm"]["phonenumber"].value;
        var address = document.forms["registrationForm"]["address"].value;
        var bloodgroup = document.forms["registrationForm"]["bloodgroup"].value;
        var regfor = document.forms["registrationForm"]["regfor"].value;
        var username = document.forms["registrationForm"]["username"].value;
        var password = document.forms["registrationForm"]["password"].value;
        
         firstnameErr.innerHTML= "";
         lastnameErr.innerHTML = "";
         genderErr.innerHTML = "";
         dobErr.innerHTML= "";
         phonenumberErr.innerHTML = "";
         addressErr.innerHTML = "";
         bloodgroupErr.innerHTML= "";
         regforErr.innerHTML = "";
         usernameErr.innerHTML = "";
         passwordErr.innerHTML= "";
         
        if (firstname === "") {
            flag = false;
            firstnameErr.innerHTML =" Empty";
        }

        if (lastname === "") {
            flag = false;
            lastnameErr.innerHTML ="Empty!";
        }

         if (gender === "") {
            flag = false;
            genderErr.innerHTML ="Empty";
        }

        if (dob === "") {
            flag = false;
            dobErr.innerHTML ="Empty";
        }

        if (phonenumber === "") {
            flag = false;
            phonenumberErr.innerHTML ="Empty";
        }

        if (address === "") {
            flag = false;
            addressErr.innerHTML ="Empty";
        }

        if (bloodgroup === "") {
            flag = false;
            bloodgroupErr.innerHTML ="Empty";
        }

        if (regfor === "") {
            flag = false;
            regforErr.innerHTML ="Empty";
        }

        if (username === "") {
            flag = false;
            usernameErr.innerHTML ="Empty";
        }

        if (password === "") {
            flag = false;
            passwordErr.innerHTML ="Empty";
        }      

    return flag;
}

</script>

<hr>
	<p>Back to <a href="../controller/login.php">Login</a></p>
</td></tr>
</table>
</body>
</html>