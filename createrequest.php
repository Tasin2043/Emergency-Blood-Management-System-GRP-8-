<?php
session_start();
    $id=$_GET["id"];
include '../model/db.php';
$connect=new db();
$conobj=$connect->OpenCon();
$sql="select * from donar_information where id=$id";
$sql1="select * from users where email='$_SESSION[email]'";

$donar=$connect->SelectQuery($conobj,$sql);
$user=$connect->SelectQuery($conobj,$sql1);
$donar=$donar->fetch_assoc();
$user=$user->fetch_assoc();
$name=$donar['name'];
$blood_group=$donar['blood_group'];
$location=$donar['location'];
$phone_number=$donar['phone_number'];
$email=$donar['email'];
$gender=$donar['gender'];
$req_by=$user['name'];
$req_phone=$user['phone_number'];




$sql="INSERT INTO  donar_request
  VALUES (' ','$name','$blood_group','$location', '$phone_number','$$email','$gender','$req_by','$req_phone')";


$connect->InsertQuery($conobj,$sql);


$connect->CloseCon($conobj);
header('location:../view/requestdonarinfo.php');




?>