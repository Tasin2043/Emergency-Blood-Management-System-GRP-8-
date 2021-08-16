<?php




$hostname = 'localhost';
$hostuser = 'root';
$hostpass = '';
$dbname = 'hospitalmanagement';

 $con = mysqli_connect($hostname, $hostuser, $hostpass, $dbname);
  if($con->connect_errno){
    echo "Database Connection Failed!...";
    echo "<br>";
    echo $conn1->connect_error;
  }



   


$query = "SELECT * FROM `executive`;";
$res = mysqli_query($con, $query);


?>
<?php
include 'head.html';

?>


<!doctype html>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  

    <title>View Executive list</title>
  </head>
  <body>

 <h2 align=center>Executive list</h2>
<h3>Search Executive By Username</h3>
<input type="text" name="" id="name" onkeyup="ajax()" />
<input type="button" name="" value="click" onclick="ajax()">

 

<div id="result"></div>

<div class="Executive">
    <h2 align=center></h2>
    <table border="1" cellspacing="5" cellpadding="5" width="100%" id="executiveTable">
        <thead>
            <tr>
                <th>FirstName</th>
                <th>Lastname</th>
                <th>DOB</th/>
                <th>Gender</th>
                <th>Email</th>
                <th>username</th>
                <th>password</th>
                 
            </tr>
        </thead>
        <tbody>
        <?php
            
            while($row = mysqli_fetch_assoc($res)){
        ?>
            <tr>
                <td><label><?php echo $row['FirstName']; ?></label></td>
                <td><label><?php echo $row['LastName']; ?></label></td>
                <td><label><?php echo $row['DOB']; ?></label></td>
                <td><label><?php echo $row['Gender']; ?></label></td>
                <td><label><?php echo $row['Email']; ?></label></td>
                <td><label><?php echo $row['username']; ?></label></td>
                <td><label><?php echo $row['password']; ?></label></td>
                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="script2.js"></script>

</body>
Click Here to go<b> <a href="index.php" style="color:red"> Homepage </a><b/>
<?php
include 'footer.html'
?>
</html>