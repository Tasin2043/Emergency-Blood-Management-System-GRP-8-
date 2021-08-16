<?php
$nameerror=$passerror=$invalid_user="";
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {

     $username=$_POST["name"];
     $password=$_POST["password"];


    $valid=true;
    if(empty($username))
    {
        $nameerror="please enter your username";
        $valid=false;
    }
     if(empty($password))
     {
         $passerror="please enter your password";
         $valid=false;
     }
     if($valid==true)
     {



         include('../model/db.php');
         $sql= "select * from users where email='$username' and password='$password'";

         $db=new db();
         $conn=$db->OpenCon();
         $data=$db->SelectQuery($conn,$sql);

         if(!empty($data)){
             $data=$data->fetch_assoc();
             // $type=$data['type'];


             if(!empty($data))
             {
                 session_start();
                 $_SESSION['email']=$data['email'];
                 $_SESSION['name']=$data['name'];
                 $_SESSION['id']=$data['id'];
                 $_SESSION['password']=$data['password'];
                 $_SESSION['gender']=$data['gender'];
                 $_SESSION['blood_group']=$data['blood_group'];
                 $_SESSION['phone_number']=$data['phone_number'];
                 $_SESSION['location']=$data['location'];
                 header('location:./receiptenthome.php');
             }
             else{
                 $invalid_user="Invalid user";
             }
         }



         $db->CloseCon($conn);




     }
 }






?>