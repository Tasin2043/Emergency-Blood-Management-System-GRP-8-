<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Update Profile</title>
   <meta charset="UTF-8">
    
 
  </head>

  <?php
include 'head.html';
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'hospitalmanagement' ) or die(mysqli_error($db));
  session_start();
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM executive where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  <div align="center">
  <h1>Update Profile</h1>
  
<div class="profile-input-field">
<br>
        <h4>** Please fill out the fields that you want to make the changes **</h4>
        <form method="post" action="#" >
    <br>
          <div class="form-group">
            <label><b>First Name :</b></label>
            <input type="text" class="form-control" name="FirstName" style="width:20em;" placeholder="FirstName" value="<?php echo $row['FirstName']; ?>">
          </div>
      <br><br>
      <div class="form-group">
            <label><b>Last Name :</b></label>
            <input type="text" class="form-control" name="LastName" style="width:20em;" placeholder="LastName" value="<?php echo $row['LastName']; ?>">
          </div>
      <br><br>
       <div class="form-group">
            <label><b>Date of Birth :</b></label>
            <input type="date" class="form-control" name="DOB" style="width:20em;" placeholder="DOB" value="<?php echo $row['DOB']; ?>">
          </div>
          <br><br>
      <div class="form-group">
            <label><b>Gender :</b></label>
            <input type="Gender" class="form-control" name="Gender" style="width:20em;" placeholder="Gender" value="<?php echo $row['Gender']; ?>" readonly>
          </div>
      <br><br>
          <div class="form-group">
            <label><b>Email :</b></label>
            <input type="email" class="form-control" name="Email" style="width:20em;" placeholder="Email" required value="<?php echo $row['Email']; ?>">
          </div> 
      <br><br>
      <div class="form-group">
            <label><b>username :</b></label>
            <input type="username" class="form-control" name="username" style="width:20em;" placeholder="username" value="<?php echo $row['username']; ?>" readonly>
          </div>
     
      <br><br>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:10em;"><br><br>
          </div>
      <br><br>
      
     Click Here to go<b> <a href="index.php" style="color:red"> Homepage </a><b/>
        </form>
      </div>
      </html>
    
      <?php
    
      if(isset($_POST['submit'])){
        $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
        $DOB = $_POST['DOB'];
        $Gender = $_POST['Gender'];
        $Email = $_POST['Email'];
  
        
    
      $query = "UPDATE executive SET FirstName = '$FirstName',
                      LastName = '$LastName', DOB = '$DOB', Gender = '$Gender',  Email = '$Email' WHERE username = '$username'";
            
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    ?>
                     <script type="text/javascript">
           
            alert("Update Successfull.");
            window.location = "index.php";
        </script>

        <?php
             }  
        include 'footer.html'            
?>