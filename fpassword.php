<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Change Password </title>
</head>
<body>

     <?php include "../view/header.html" ?>

<?php 
    require '../model/DbConnect.php';
    require '../model/DbUpdate.php';
    session_start();   

    $username = $_SESSION['username'];
    $password = "";
    $isValid = true;
    $usernameErr = $passwordErr = "";
    $successfulMessage = $errorMessage = "";

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $password = $_POST['password'];

        if(empty($username)) {
            $usernameErr = "Please fill it up!";
            $isValid = false;
        }
        if(empty($password)) {
            $passwordErr = "Please fill it up!";
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
                $useranme = test_input($username);
                $password = test_input($password);
                $response = changePassword($username, $password);
                if($response) {
                   $successfulMessage = "Password Changed Successfully!";
                }
                else {
                 $errorMessage ="Error while changing password!";
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




<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name = "changePassword" onsubmit= "return isValid()">


<table border="0" bgcolor="white" align="center" cellspacing="70">
<tr><td>
<h2> <span style="color: red;"> Change Your Password</h2>
                <br> 

<label for="username">User Name:</label> &nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" name="username" id="username" value ="<?php echo $username;?>" disabled>
            <span style="color:red" id="usernameErr"><?php echo $usernameErr; ?></span>

<br><br>
<label for="password">New Password:</label>&nbsp;
            <input type="password" name="password" id="password">
            <span style="color:red" id="passwordErr"><?php echo $passwordErr; ?></span> 
            <br><br>

<p style ="color:green"><?php echo $successfulMessage; ?></p>
<p style ="color:red"><?php echo $errorMessage; ?></p>

<input type="submit" name="submit" value="Change Password">
</form>
<br> <br>
 <br>

<hr>
<p align="center"> Click here for <a href="login.php">Login</a></p> 

<script>

    function isvalid() {
        var flag = true;
        var usernameErr = document.getElementById("usernameErr");
        var passwordErr = document.getElementById("passwordErr");
        var username = document.forms["changePassword"]["username"].value;
        var password = document.forms["changePassword"]["password"].value;
        
        
         usernameErr.innerHTML= "";
         passwordErr.innerHTML = "";
        
      
        
        if (username === "") {
            flag = false;
            usernameErr.innerHTML =" Please fill it up!";
        }

        if (password === "") {
            flag = false;
            passwordErr.innerHTML ="Please fill it up!";
        }

        

    return flag;
}

</script>

</td></tr>
</table>
</body>
</html>