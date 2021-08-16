<?php 

function changePassword($username, $password) {
$conn = connect();
$sql = $conn->prepare("UPDATE USERS Set password = ? WHERE username = ?");
$sql->bind_param("ss", $password,  $username);
return $sql->execute();
}

function uprofile($username,$firstname,$lastname,$dob,$phonenumber,$address,$bloodgroup) {
$conn = connect();
$sql = $conn->prepare("UPDATE USERS Set firstname = ?, lastname =? , dob=? , phonenumber =? ,address = ?, bloodgroup =? WHERE username = ?");
$sql->bind_param("sssssss", $firstname,$lastname,$dob,$phonenumber,$address,$bloodgroup, $username);
return $sql->execute();
}

 
?>