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
<?php


 include ('../controller/logincheck.php');
?>

<div id="top-login-nav">
<ul>
    <li>
        <a href="./login.php">Login</a>
    </li>
    <li>
        <a href="./registration.php">Registration</a>
    </li>
</ul>
</div>
<div id="login-body">
    Welcome To bloodBank
    <br><br><br>

    <form action="" method="post">

        <label for="">User Name</label>
        <input type="text" name="name">
        <br>
        <?php echo $nameerror; ?>
        <br>
        <label for="">Password</label>
        <input type="text" name="password">
        <br>
        <?php echo $passerror; ?>
        <br>
        <a href="./registration.php">not registerd?</a>
        <br>
        <?php  echo $invalid_user; ?>
        <br>
        <button type="submit">Login</button>
        <button type="reset">reset</button>
    </form>
</div>

</body>
</html>


<style>

    *{
        margin: 0px;
        box-sizing: border-box;
        text-align: center;
    }
    #top-login-nav{
        background-color: rgb(150,100,100);
        height:70px;
        margin-bottom: 100px;
    }

    #top-login-nav ul li{
        list-style-type: none;
        margin:10px;
        padding: 5px;
        float: right;
        background: aqua;

    }
    #top-login-nav ul li a{

        text-decoration: none;
    }
    #login-body{

    }
</style>