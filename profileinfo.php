<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include ('../controller/checkloginstatus.php') ?>

<?php include ('./top_nav.php') ?>
<?php include ('./leftnav.php') ?>
<?php include ('../controller/profileinfo.php') ?>

 <div>
     <h6>Name  : <?php echo $result["name"];?></h6>
     <h6>Email  : <?php echo $result["email"];?></h6>
     <h6>Gender  : <?php echo $result["gender"];?></h6>

     <h6>Blood group  : <?php echo $result["blood_group"];?></h6>

     <h6>City  : <?php echo $result["location"];?></h6>
     <h6>Phone number  : <?php echo $result["phone_number"];?></h6>


 </div>

</body>
</html>