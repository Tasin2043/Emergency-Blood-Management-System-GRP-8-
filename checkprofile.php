<!DOCTYPE html>
<html lang="en-US">
  <head>

  <title>Check Profile</title>

    <meta charset="UTF-8">
    
  </head>

 

<?php
 include 'head.html';

$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'hospitalmanagement' ) or die(mysqli_error($db));
session_start();
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM executive  where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?> 
  <div align="center">
  <h1>Accounts Executive Profile</h1>
  
<div class="profile-input-field">
        
        <form method="post" action="#" >
    <br>
          <div class="form-group">
            <label> <b>First Name :</b></label>
            <input type="text" class="form-control" name="FirstName" style="width:15em;" placeholder="FirstName" value="<?php echo $row['FirstName']; ?>" readonly>
          </div>
      <br><br>
      <div class="form-group">
            <label><b>Last Name :</b></label>
            <input type="text" class="form-control" name="LastName" style="width:15em;" placeholder="LastName" value="<?php echo $row['LastName']; ?>" readonly>
          </div>
      <br><br>
       <div class="form-group">
            <label><b>Date of Birth :</b></label>
            <input type="date" class="form-control" name="DOB" style="width:15em;" placeholder="DOB" value="<?php echo $row['DOB']; ?>" readonly>
          </div>
      <br><br>
      <div class="form-group">
            <label><b>Gender :</b></label>
            <input type="text" class="form-control" name="Gender" style="width:15em;" placeholder="Gender" value="<?php echo $row['Gender']; ?>" readonly>
          </div>
      <br><br>
          <div class="form-group">
            <label><b>Email :</b></label>
            <input type="email" class="form-control" name="Email" style="width:15em;" placeholder="Email" required value="<?php echo $row['Email']; ?>" readonly>
          </div>
      <br><br>
      <div class="form-group">
            <label><b>username :</b></label>
            <input type="text" class="form-control" name="username" style="width:15em;" placeholder="username" value="<?php echo $row['username']; ?>" readonly>
          </div>
     
     
      <br><br><br>
       Click Here to go<b> <a href="index.php" style="color:red"> Homepage </a><b/>
        </form>
      </div>
<?php
include 'footer.html'
?>
</html> 