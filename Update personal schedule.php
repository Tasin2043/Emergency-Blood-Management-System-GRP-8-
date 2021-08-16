<?php //session_start(); 


?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Personal Schedule</title>
  <meta charset="UTF-8">
    
  <form name="Update Personal Schedule<" onsubmit="return validate()" method="POST">
</head>

<?php
include '../view/head.html';

?>

<body>

  <div align="center">
  <h2>Update Personal Schedule</h2>
  <?php


    $Name= "";
    $Date= "";
    $Day = "";
    $StartTime = "";
    $EndTime = "";
    $HospitalName = "";
    

  
    $NameErr= "";
    $DateErr = "";
    $DayErr = "";
    $StartTimeErr = "";
    $EndTimeErr = "";
    $HospitalNameErr = "";
    
   



if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST['Name'])){
     $NameErr = "please fill up this properly"; 
  }
  else{

    $Name = $_POST['Name'];

  }
    if(empty($_POST['Date'])){
     $DateErr = "please fill up this properly"; 
   }
   else{

    $Date = $_POST['Date'];

   }
   if(empty($_POST['Day'])){
     $DayErr = "please fill up this properly"; 
   }
   else{

    $Day = $_POST['Day'];

   }
  if(empty($_POST['StartTime'])){
    $StartTimeErr = "please fill up this properly"; 
  }
  else{

    $StartTime = $_POST['StartTime'];

  }

  if(empty($_POST['EndTime'])){
    $EndTimeErr = "please fill up this properly"; 
  }
  else{

    $EndTime = $_POST['EndTime'];

  }
if(empty($_POST['HospitalName'])){
    $HospitalNameErr = "please fill up this properly"; 
  }
  else{

    $HospitalName = $_POST['HospitalName'];
   } 

}

?>




<form name="Update Personal Schedule" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> "onsubmit="return validate()"  method="POST">

<label for = "Name"> Enter your Name </label>
<input type="Name" name="Name" id="Name">
<p style='color:red'> <?php echo $NameErr; ?> </p>

<br>

<label for = "Date">Enter your Date </label>
<input type="Date" name="Date" id="Date">
<p style='color:red'> <?php echo $DateErr; ?> </p>
<br>
<label for="Day">Select Day:</label>
  <select name="Day" id="Day">
<option value=""> </option>
      <option value="Saturday">Saturday</option>
      <option value="Sunday">Sunday</option>
      <option value="Monday">Monday</option>
      <option value="Tuesday">Tuesday</option>
      <option value="Wednesday">Wednesday</option>
      <option value="Thursday">Thursday</option>
      
</select>
<p style='color:red'> <?php echo $DayErr; ?> </p>
<br>


<label for = "StartTime"> Enter StartTime </label>
<input type="Time" name="StartTime" id="StartTime">
<p style='color:red'> <?php echo $StartTimeErr; ?> </p>
<br>

<label for = "EndTime"> Enter EndTime </label>
<input type="time" name="EndTime" id="EndTime">
<p style='color:red'> <?php echo $EndTimeErr; ?> </p>

<br>

<label for = "HospitalName"> Enter HospitalName </label>
<input type="HospitalName" name="HospitalName" id="HospitalName">
<p style='color:red'> <?php echo $HospitalNameErr; ?> </p>


<br>
<br>
<!-- <input type="submit" value="Submit"id="submitForm"> -->
<input type="submit" name="submit" class="btn 
btn-primary" style="width:10em;"><br><br>
</form>
<br>
  <!--<p id="errorMsg"></p>-->

  <script>
      function validate() {
        var isValid = false;

        var Name = document.forms["Update Personal Schedule"]["Name"].value;
        var Date = document.forms["Update Personal Schedule"]["Date"].value;
        var Day = document.forms["Update Personal Schedule"]["Day"].value;
        var StartTime = document.forms["Update Personal Schedule"]["StartTime"].value;
         var EndTime = document.forms["Update Personal Schedule"]["EndTime"].value;
          var HospitalName = document.forms["Update Personal Schedule"]["HospitalName"].value;


        if( Name == "" || Dates == ""  || Day == ""  || StartTime == "" || EndTime == "" || HospitalName == "" ) {
          document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
          document.getElementById("errorMsg").style.color = "red";
        }
        else {
          isValid = true;
        }

        return isValid;
      }
    </script>


<br>

<?php




  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospitalmanagement";

  $con = mysqli_connect($hostname, $username, $password, $dbname);
  if($con->connect_errno){
    echo "Database Connection Failed!...";
    echo "<br>";
    echo $conn1->connect_error;
  }

  else {
    echo "Database Connection Successful!";

  

    $sql = "INSERT INTO personal_schedule ( Name, Date, Day, StartTime , EndTime ,HospitalName) VALUES ('$Name', '$Date', '$Day', '$StartTime', '$EndTime', '$HospitalName')";
    if($con->query($sql)) {
      echo "Data Insert Successful!";
    }
    else {
      echo "Failed to Insert Data.";
      echo "<br>";
      echo $con->error;
    }
  }
  
  ?> 
</body>
 Click Here to go<b> <a href="../view/index.php" style="color:red"> Homepage </a><b/>
<?php
include '../view/footer.html'
?>
</html>