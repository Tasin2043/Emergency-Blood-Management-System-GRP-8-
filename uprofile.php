<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Update Profile </title>
</head>
<body>

     <?php include "../view/header.html" ?>

<?php 
    require '../model/DbConnect.php';
    require '../model/DbUpdate.php';
    session_start();   

    $username = $_SESSION['username'];
    $firstname =  $lastname =  $dob = $phonenumber =  $address = $bloodgroup = "";
    $successfulMessage = $errorMessage ="";
    $isValid = true;
    $usernameErr = $firstnameErr =  $lastnameErr =  $dobErr = $phonenumberErr =  $addressErr = $bloodgroupErr = "";
    $successfulMessage = $errorMessage = "";

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $bloodgroup = $_POST['bloodgroup'];

        if(empty($username)) {
            $usernameErr = "Please fill it up!";
            $isValid = false;
        }
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
            $phonenumberErr = "Please fill it up!";
            $isValid = false;
        }

         if(empty($address)) {
            $addressErr = "Please fill it up!";
            $isValid = false;
        }
         if(empty($bloodgroup)) {
            $bloodgroupErr = "Please fill it up!";
            $isValid = false;
        }

        if($isValid) {
            if(strlen($username) > 10) {
                $usernameErr = "Username max size 10!";
                $isValid = false;
                }
            if(strlen($firstname) > 10) {
                $firstnameErr = "Password max size 10!";
                $isValid = false;
                }
            if(strlen($lastname) > 10) {
                $lastnameErr = "Username max size 10!";
                $isValid = false;
                }
            if(strlen($phonenumber) > 15) {
                $phonenumberErr = "Password max size 15!";
                $isValid = false;
                }
            if(strlen($address) > 30) {
                $addressErr = "Username max size 30!";
                $isValid = false;
                }

            if($isValid) {
                $username = test_input($username);
                $firstname = test_input($firstname);
                $lastname = test_input($lastname);
                $dob = test_input($dob);
                $phonenumber = test_input($phonenumber);
                $address = test_input($address);
                $bloodgroup = test_input($bloodgroup);
                $response = uprofile($username,$firstname,$lastname,$dob,$phonenumber,$address,$bloodgroup);
                if($response) {
                   $successfulMessage = "Profile update Successful!";
                }
                else {
                 $errorMessage ="Error while updating profile!";
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


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name = "uProfile" onsubmit= "return isValid(")>


<table border="2" bgcolor="white" align="center" cellspacing="70">
<tr><td>
<h2> <span style="color: red;"> Update Your Profile</h2>
                <br> 

            <label for="username">User Name:</label> &nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" name="username" id="username" value ="<?php echo $username;?>" disabled>
            <span style="color:red" id="usernameErr"><?php echo $usernameErr; ?></span>

            <br><br>
            <label for="firstname">First Name:</label>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" name="firstname" id="firstname">
            <span style="color:red" id="firstnameErr"><?php echo $firstnameErr; ?></span> 
            <br><br>

            <label for="lastname">Last Name:</label>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" name="lastname" id="lastname">
            <span style="color:red" id="lastnameErr"><?php echo $lastnameErr; ?></span>  

            <br><br>

            <label for="dob">Date of Birth:</label>&nbsp;&nbsp;&nbsp; &nbsp; 
            <input type="date" name="dob" id="dob">
            <span style="color:red" id="dobErr"><?php echo $dobErr; ?></span> 
            <br><br>

            <label for="phonenumber">Contact Number:</label>&nbsp;
            <input type="tel" name="phonenumber" id="phonenumber">
            <span style="color:red" id="phonenumberErr"><?php echo $phonenumberErr; ?></span> 
            <br><br>

            <label for="address">Address:</label>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="textarea" name="address" id="address">
            <span style="color:red" id="addressErr"><?php echo $addressErr; ?></span> 
            <br><br>

             <label for="bloodgroup">Blood Group: </label>&nbsp; &nbsp;
  <select name="bloodgroup" id="bloodgroup">
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
            <br><br>
<input type="submit" name="submit" value="Update Profile">

<p style ="color:green"><?php echo $successfulMessage; ?></p>
<p style ="color:red"><?php echo $errorMessage; ?></p>


</form>
<br> <br>
 <br>

<hr>
<p align="center"> Click here for <a href="login.php">Login</a></p> 

<script>

    function isvalid() {
        var flag = true;
        var usernameErr = document.getElementById("usernameErr");
        var firstnameErr = document.getElementById("firstnameErr");
           var lastnameErr = document.getElementById("lastnameErr");
        var dobErr = document.getElementById("dobErr");
           var phonenumberErr = document.getElementById("phonenumberErr");
        var addressErr = document.getElementById("addressErr");
           var bloodgroupErr = document.getElementById("usernameErr");

        var username = document.forms["uProfile"]["username"].value;
        var firstname = document.forms["uProfile"]["firstname"].value;
         var lastname = document.forms["uProfile"]["lastname"].value;
        var dob = document.forms["uProfile"]["dob"].value;
         var phonenumber = document.forms["uProfile"]["phonenumber"].value;
        var address = document.forms["uProfile"]["address"].value;
         var bloodgroup = document.forms["uProfile"]["bloodgroup"].value;
        
        
         usernameErr.innerHTML= "";
         firstnameErr.innerHTML = "";
         lastnameErr.innerHTML= "";
         dobErr.innerHTML = "";
         phonenumberErr.innerHTML= "";
         addressErr.innerHTML = "";
         bloodgroupErr.innerHTML= "";
        
      
        
        if (username === "") {
            flag = false;
            usernameErr.innerHTML =" Please fill it up!";
        }

        if (firstname === "") {
            flag = false;
            firstnameErr.innerHTML ="Please fill it up!";
        }
         if (lastname === "") {
            flag = false;
            lastnameErr.innerHTML =" Please fill it up!";
        }

        if (dob === "") {
            flag = false;
            dobErr.innerHTML ="Please fill it up!";
        }
         if (phonenumber === "") {
            flag = false;
            phonenumberErr.innerHTML =" Please fill it up!";
        }

        if (address === "") {
            flag = false;
            addressErr.innerHTML ="Please fill it up!";
        }
         if (bloodgroup === "") {
            flag = false;
            bloodgroupErr.innerHTML =" Please fill it up!";
        }
        

    return flag;
}

</script>

</td></tr>
</table>
</body>
</html>