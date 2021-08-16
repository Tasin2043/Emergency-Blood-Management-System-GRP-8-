<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Admin Panel</title>

<?php include "../view/header.html" ?>
<br>
<div class="middlenav"> 
<table border="3" bgcolor="silver" align="center">
<tr> <td
  style="
    padding-top: 50px;
    padding-bottom: 50px;
    padding-right: 100px;
    padding-left: 180px;
    height: 350px;
    width: 1000px;

  ">
 <input type="button" name="button" value="ADMIN" onclick="homeFunction()" <?php include "../view/css/admin.css"?> />
 <script>
  function homeFunction() {
    window.location.href="../controller/adminlist.php";
  }

   </script>

		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 	
		
		<input type="button"  name="button" value= DONOR onClick="donorFunction()" <?php include "../view/css/admin.css"?>/>
 <script>


  function donorFunction() {
    window.location.href="../controller/donor.php";
  }
 </script> 

		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp;&nbsp; 

<input type="button"  name="button" value= RECIPIENT onClick="recipientFunction()"<?php include "../view/css/admin.css"?>/>
 <script>
  function recipientFunction() {
    window.location.href="../controller/recipient.php";
  }
 </script> 

		&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		&nbsp; &nbsp; &nbsp;&nbsp; 

	<input type="button"  name="button" value= EXICUTIVE onClick="exicutiveFunction()"<?php include "../view/css/admin.css"?>/>
 <script>
  function exicutiveFunction() {
    window.location.href="../controller/executive.php";
  }
 </script>

</table>
</tr> </td>

</div>
</head>
<body>
<?php include "../view/footer.html" ?>