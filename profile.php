<!DOCTYPE html>
<html lang="en-US">
  <head>

  <title>My Profile</title>

    <meta charset="UTF-8">
    
  </head>

  <?php include "../view/header.html" ?>

<?php
   require '../model/DbPConnect.php';
session_start();
$username=$_SESSION['username'];
 require '../model/DbPRead.php';
  ?> 

    <table border="2" bgcolor="white" align="center" cellspacing="70">
<tr><td>
  <div align="center">.
  <h1>My Profile</h1>
  
  .
<div class="profile-input-field">
        
        <form method="post" action="#" >
    <br>
          <div class="form-group">
            <label> <b>First Name :</b></label> &nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" class="form-control" name="firstname"  value="<?php echo $row['firstname']; ?>" disabled>
          </div>
      <br>
      <div class="form-group">
            <label><b>Last Name :</b></label>&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" disabled>
          </div>
      <br>
       
      <div class="form-group">
            <label><b>Gender :</b></label> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" disabled>
          </div>
      
      <br>

      <div class="form-group">
            <label><b>Date of Birth :</b></label> &nbsp; &nbsp;&nbsp; &nbsp;
            <input type="date" class="form-control" name="dob"value="<?php echo $row['dob']; ?>" disabled>
          </div>
      <br>

         <div class="form-group">
            <label><b>Contact Number :</b></label>
            <input type="tel" class="form-control" name="phonenumber" value="<?php echo $row['phonenumber']; ?>" disabled>
          </div>
      
      <br>

         <div class="form-group">
            <label><b>Address :</b></label> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" disabled>
          </div>

           <br>

          <div class="form-group">
            <label><b>Blood Group :</b></label>&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" class="form-control" name="bloodgroup" value="<?php echo $row['bloodgroup']; ?>" disabled>
          </div>
     
      
      <br>
      <div class="form-group">
            <label><b>User Name :</b></label>&nbsp;&nbsp; &nbsp; &nbsp;
            <input type="text" class="form-control" name="username"  value="<?php echo $row['username']; ?>" disabled>
          </div>
     <hr>

<input type="button" name="button" value="UPDATE PROFILE" onclick="uprofileFunction()" <?php include "../view/css/profile.css"?>/>
 <script>

  function uprofileFunction() {
    window.location.href="../controller/uprofile.php";
  }
 </script>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <input type="button" name="button" value="CHANGE PASSWORD" onclick="fpasswordFunction()" <?php include "../view/css/profile.css"?>/>

 <script>
  function fpasswordFunction() {
    window.location.href="../controller/fpassword.php";
  }

   </script>

      <br><br><br>
     
        </form>
      </div>

        </table>
</tr></td>
<?php include '../view/footer.html'?>
</html> 