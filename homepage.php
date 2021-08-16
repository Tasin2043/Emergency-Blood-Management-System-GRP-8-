<?php 
    session_start();
    $userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : ""; 

?>
<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="UTF-8">

     

<?php include "../view/header.html" ?>

<body>
	<title>Homepage </title>

  <div class="topnav">   
		<a href="../controller/homepage.php"> HOME</a>
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 	
		
		<a href="../view/donorlist.html">DONOR LIST</a>
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp;&nbsp; 

		<a href="../controller/recipientlist.php">RECIPIENT LIST</a>
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp;&nbsp; 

		<a href="../controller/add-recipient.php">BLOOD REQUESTS</a>
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp;&nbsp; 

		<a href="../controller/bloodbank.php">BLOOD BANK</a>
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp;&nbsp; 
<input type="text" placeholder="Search...">
</div>
<hr>



<body>

<div class="section"> 
<form action= "../view/indexAction.php" name="mform" method="POST" onsubmit="submitForm(this); return false;">
<fieldset>
    <legend span style="color: blue;">NEWS FEED</legend>

<p span style="color:red;"> PLEASE WRITE YOUR BLOOD REQUEST DETAILS TO INFORM ALL DONORS</p>
<table border="0" bgcolor="red" align="left" cellspacing="0">

<tr>
<td><label for="name">Name <span style="color: white;">*</span>:</label></td>
<td><input type="text" name="name" id="name" placeholder="name" required  value = "" maxlength = "50"></td>
<td><span id="errorMessage" style="color:red"><?php echo $nameErr; ?></span></td>
</tr>

<tr>
<td><label for="address"> Address <span style="color: white;">*</span>:</label></td>
<td><input type="textarea" name="address" id="address" placeholder="district" required value = "" maxlength = "100"></td>
<td><span id="errorMessage" style="color:red"><?php echo $addressErr; ?></span></td>
</tr>

<tr>
<td><label for="number">Number <span style="color: white;">*</span>:</label></td>
<td><input type="number" name="number" id="number" placeholder="number" required  value = "" maxlength = "50"></td>
<td><span id="errorMessage" style="color:red"><?php echo $numberErr; ?></span></td>

</tr>

<tr>
<td><label for="blood">Blood Group <span style="color: white;">*</span>:</label></td>
<td> <select name="blood" id="blood" >
      <option placeholder="Choose one"> Choose One </option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option></td>
<td><span id=errorMessage style="color:red"><?php echo $bloodErr; ?></span></td>
</tr>

<tr>
<td><label for="remarks">Remarks <span style="color: white;">*</span>:</label></td>
<td><input type="text" name="remarks" id="remarks" placeholder="remarks" required   value = "" maxlength = "10"></td>
<td><span id="errorMessage" style="color:red"><?php echo $remarksErr; ?></span></td>
</tr>
<tr>
<td colspan="2" align="left"><a href ="./view/data.txt"><input type="submit" id="button"></a></td>
</tr>

</form>
</div>


<div class="aside"> 

<table border="1" bgcolor="silver" align="right" cellspacing="18">	

	<tr>
		<td> </td>
</tr>
</table>

	<h2 id="demo"></h2>

    <script>
        function check(val){
            
            var name = val.name.value;
            document.getElementById("errorMessage").innerHTML = "";
            if(name ===""){
                document.getElementById("errorMessage").innerHTML= "Please fill it up!";
                return false
            }
            return true;
        }

        function check(val){
            
            var address = val.address.value;
            document.getElementById("errorMessage").innerHTML = "";
            if(address ===""){
                document.getElementById("errorMessage").innerHTML= "Please fill it up!";
                return false
            }
            return true;
        }

           function check(val){
            
            var number = val.number.value;
            document.getElementById("errorMessage").innerHTML = "";
            if(number ===""){
                document.getElementById("errorMessage").innerHTML= "Please fill it up!";
                return false
            }
            return true;
        }

           function check(val){
            
            var blood = val.blood.value;
            document.getElementById("errorMessage").innerHTML = "";
            if(blood ===""){
                document.getElementById("errorMessage").innerHTML= "Please fill it up!";
                return false
            }
            return true;
        }

           function check(val){
            
            var remarks = val.remarks.value;
            document.getElementById("errorMessage").innerHTML = "";
            if(remarks ===""){
                document.getElementById("errorMessage").innerHTML= "Please fill it up!";
                return false
            }
            return true;
        }

        function submitForm(){
            var isValid = check(pForm);
            if (isValid){
                var xhttp = new XMLHttpRequest();
                xhttp.onload = function(){
                    if(this.status === 200){
                        document.getElementById("demo").innerHTML = this.responseText;
                    }
                }

                xhttp.open("POST", "../view/indexAction.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-urlencoded");
                xhttp.send("name=" + pForm.name.value);
                xhttp.send("address=" + pForm.address.value);
                xhttp.send("number=" + pForm.number.value);
                xhttp.send("blood=" + pForm.blood.value);
                xhttp.send("remarks=" + pForm.remarks.value);
               
            }
        }
    </script>




</div>

<br><br><br><br><br>
		

</fieldset>
</table>
</body>	
</div>

</body>
<?php include "../view/footer.html" ?>
</html>