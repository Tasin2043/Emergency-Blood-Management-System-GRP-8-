<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
</head>

<body>

	<header>
<?php include "../view/header.html" ?>
		</header>
</head>

<?php 
    require '../model/DbConnect.php';
	require '../model/DbRead.php';
	$username = $password = $regfor = "";
	$isValid = true;
	$usernameErr = $passwordErr = $regfor = "";
	$successfulMessage = $errorMessage = "";


	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$regfor = $_POST['regfor'];

		if(empty($username)) {
			$usernameErr = "Please fill it up!";
			$isValid = false;
		}
		if(empty($password)) {
			$passwordErr = "Please fill it up!";
			$isValid = false;
		}

		if(empty($regfor)) {
			$regforErr = "Please fill it up!";
			$isValid = false;
		}
		if($isValid) {
			if(strlen($username) > 10) {
				$usernameErr = "Username max size 10!";
				$isValid = false;
				}
			if(strlen($password) > 10) {
				$passwordErr = "Password max size 10!";
				$isValid = false;
				}

			if($isValid) {
				$username = test_input($username);
				$password = test_input($password);
				$regfor = test_input($regfor);
				$response = login($username, $password, $regfor);
                    
                    if ($response){
						session_start();
					$_SESSION['username'] = $username;
                    header("Location: ".$_POST['regfor']);
                     }

				else {
				 $errorMessage ="Wrong User or Password!";
				}
			 }
		  }
	  }
	

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name = "loginForm" onsubmit= "return isValid()">
		
<table border="0" bgcolor="white" align="center" cellspacing="70">
<tr> <td>
	
	<p style ="color:green"><?php echo $successfulMessage; ?></p>
			<h2> <span style="color: red;"> Log into Your Account </h2>
				<br><br>
			<label for="username">User Name:</label> 
			<input type="text" name="username" id="username">
			<span style="color:red" id="usernameErr"><?php echo $usernameErr; ?></span><br><br>

			<label for="password">Password:</label>&nbsp;
			<input type="password" name="password" id="password">
			<span style="color:red" id="passwordErr"><?php echo $passwordErr; ?></span> 
			<br><br>

			<label for="regfor">Login As <span style="color: red;"></span>: </label>
      <select name="regfor" id="regfor">
      <option value=""></option>
      <option value= "admin.php">Admin</option>
      <option value="homepage.php">Donor </option>
      <option value="homepage.php">Recipient</option>
      <option value="homepage.php">Hospital Exicutive</option>
      <span style="color:red" id= "regforErr"><?php echo $regforErr; ?></span> </select> 
      <p style ="color:red"><?php echo $errorMessage; ?></p>

			<input type="checkbox" name="rememberme" id="rememberme">
			<label for="rememberme"><span style="color: red;">Remember Me</label><br><br>

			<input type="submit" name="submit" value="Login"> 

          
	</form>


	<br>

	<script>

    function isvalid() {
        var flag = true;
        var usernameErr = document.getElementById("usernameErr");
        var passwordErr = document.getElementById("passwordErr");
        var regforErr = document.getElementById("regforErr");
        var username = document.forms["loginForm"]["username"].value;
        var password = document.forms["loginForm"]["password"].value;
        var regfor = document.forms["loginForm"]["regfor"].value;
        
        
         usernameErr.innerHTML= "";
         passwordErr.innerHTML = "";
         regforErr.innerHTML = "";
      
        
        if (username === "") {
            flag = false;
            usernameErr.innerHTML =" Please fill it up!";
        }

        if (password === "") {
            flag = false;
            passwordErr.innerHTML ="Please fill it up!";
        }
        if (regfor === "") {
            flag = false;
            regforErr.innerHTML ="Please fill it up!";
        }

        

    return flag;
}

</script>

<footer>

<hr>

	<p>New user? <a href="../controller/registration.php">Click here</a> for registration.</p>
		</td> </tr>
		</table>
	</footer>
</body>
</html>