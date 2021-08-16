 
<!DOCTYPE html>
<html>
<head>
	<title>Add Recipient</title>
	  <meta charset="UTF-8">
    
    
</head>

 <?php include "../view/header.html" ?>

<body>

	<h2 align="center">Add Recipient</h2>
<div class="col ml-5">

<form name="AddRecipient"  onsubmit="return validate()" method="POST">

	<label for = "firstname"> First name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="firstname" id="firstname">
<br>

<br>

<label for = "lastname"> Last name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="lastname" id="lastname">
<br>
<br>

<label for = "dateofbirth"> Date of birth :&nbsp;&nbsp;&nbsp;</label>
<input type="date" name="dateofbirth" id="dateofbirth">
<br>
<br>

<label for = "gender"> Gender :&nbsp;&nbsp;&nbsp;</label>
<input type="radio" name="gender" id="male" value="male">
<label for = "male"> Male </label>
<input type="radio" name="gender" id="female" value="female">
<label for = "female"> Female </label>
<br>
<br>

<label for="bloodgroup">Blood group :&nbsp;&nbsp;&nbsp;</label>
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
  </select> <br><br>


<label for = "username">User Name :&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="username" id="username">
<br>
<br>

<label for = "password"> Password :&nbsp;&nbsp;&nbsp;</label>
<input type="password" name="password" id="password">
<br>
<br>


<br><br>

  <label for="needblood"> Need Blood :&nbsp;&nbsp;&nbsp;</label>
  <select name="needblood" id="needblood" >

      <option value=""></option>
      <option value="emergency">Emergency</option>
      <option value="not emergency">Not Emergency</option>
  </select>
  
  
  
<br><br>

  <label for="dblood">Date for Blood :&nbsp;&nbsp;&nbsp;</label>
  <input type="date" name="dblood" id="dblood">
<br>
<br>
      



<input type="submit" value="Submit" style="height:30px; width:150px">
</form>


<br>


	
        
</div>

 <?php include "../view/footer.html" ?>
</body>


</html>
