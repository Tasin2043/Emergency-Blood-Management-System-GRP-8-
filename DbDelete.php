<?php 

function deleteUser($username, $phonenumber) {
$conn = connect();
$sql = $conn->prepare("DELETE FROM USERS WHERE username = ? and phonenumber = ?");
$sql->bind_param("ss",$username, $phonenumber );
return $sql->execute();

 }