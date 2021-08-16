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
<?php include ('../controller/changepassword.php') ?>

<?php echo $success;  ?>

<div style="margin-top:100px">
    <form action="" onsubmit="return validation()" method="post">

        <label for="">Type new password</label>
        <input id="new_password" name="new_password" type="text">
        <br>
        <p id="error1"></p>
        <br>

        <label for="">Confirm new password</label>
        <input id="c_new_password" name='c_new_password' type="text">
        <br>
        <p id="error2"></p>
        <br>
        <?php echo $match_erro;  ?>
        <br>
        <button>Change password</button>
        <button>Reset</button>
    </form>
</div>


<script>
    function validation()
    {


        var valid=true;
      if(document.getElementById("new_password").value==""){
          document.getElementById("error1").innerHTML="Please enter your new password";
      valid=false;
      }
        if(document.getElementById("c_new_password").value==""){
            document.getElementById("error2").innerHTML="Please enter your new password";
         valid=false;
        }
        if(valid==true)
        {
            return true;
        }
        else{
            return  false;
        }
    }

</script>

</body>
</html>