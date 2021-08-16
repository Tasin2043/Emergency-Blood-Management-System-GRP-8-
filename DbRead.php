<?php 

function login($username, $password , $regfor) {
$conn = connect();
$sql = $conn->prepare("SELECT * FROM USERS Where username = ? and password = ? and regfor = ?");
$sql->bind_param("sss", $username, $password, $regfor);
$sql->execute();
$res = $sql->get_result();

return $res->num_rows === 1;
 }

 function getAllUsers(){
$conn = connect();
$sql = $conn->prepare("SELECT id, username,regfor, bloodgroup, address, phonenumber FROM USERS");
$sql->execute();
$res = $sql->get_result();
return $res->fetch_all(MYSQLI_ASSOC);  
 }

 function getUser($bloodgroup){
$conn = connect();
$sql = $conn->prepare("SELECT * FROM USERS WHERE bloodgroup = ?"); 
$sql->bind_param("s",$bloodgroup);
$sql->execute();
$res = $sql->get_result();
return $res->fetch_all(MYSQLI_ASSOC);  
 }

?>