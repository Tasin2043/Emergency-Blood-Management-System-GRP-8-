<?php 


function register($firstname,$lastname,$gender,$dob,$phonenumber,$address,$bloodgroup,$regfor,$username,$password) {
$conn = connect();
$sql = $conn->prepare("INSERT INTO USERS (firstname,lastname,gender,dob,phonenumber,address,bloodgroup,regfor,username,password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssssssss",$firstname,$lastname,$gender,$dob,$phonenumber,$address,$bloodgroup,$regfor,$username,$password);
return $sql->execute();
  }

?>



