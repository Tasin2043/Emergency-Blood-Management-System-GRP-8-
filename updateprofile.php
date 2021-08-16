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
<?php include ('../controller/updateprofile.php') ?>


<div id="change_profile">

    <form action=""  onsubmit="return validation()" method="post">

        <label for="">Name :</label>
        <input type="text" id="name" name="name" value='<?php echo $result['name']; ?>'>
        <br>
        <p id="error1"></p>
        <br>

        <input type="hidden" name="email" value="<?php echo $result['email']; ?>">
        <br>
        <br>

        <label for="">Phone number :</label>
        <input id="phone" type="number" name="phone_number" value="<?php echo $result['phone_number']; ?>" >
        <br>
        <p id="error2"></p>

        <br>

        Gender :
        <select name="gender" id="" >
            <option <?php if(  $result['gender'] == 'male') echo"selected"; ?> value="male">male</option>
            <option <?php if(  $result['gender'] == 'female') echo"selected"; ?> value="female">female</option>
        </select>
        <br>

        <br>
        <br>
        blood gorup
        <select name="blood_group" id="bllod_group" value="">
            <option <?php if(  $result['blood_group'] == 'O+') echo"selected"; ?>  value="O+">O+</option>
            <option <?php if(  $result['blood_group'] == 'O-') echo"selected"; ?> value="O-">O-</option>
            <option <?php if(  $result['blood_group'] == 'A+') echo"selected"; ?> value="A+">A+</option>
            <option <?php if(  $result['blood_group'] == 'A-') echo"selected"; ?> value="A-">A-</option>
            <option <?php if(  $result['blood_group'] == 'B+') echo"selected"; ?> value="B+">B+</option>
            <option <?php if(  $result['blood_group'] == 'B-') echo"selected"; ?> value="B-">B-</option>
            <option <?php if(  $result['blood_group'] == 'AB+') echo"selected"; ?> value="AB+">AB+</option>
            <option <?php if(  $result['blood_group'] == 'AB-') echo"selected"; ?> value="AB-">AB-</option>
        </select>
        <br>
        <br>
        Home Town
        <select name="location" id="home_town" ">
            <option <?php if(  $result['location'] == 'Dhaka') echo"selected"; ?> value="Dhaka">Dhaka</option>
            <option <?php if(  $result['location'] == 'Chittagong') echo"selected"; ?> value="Chittagong">Chittagong</option>
            <option <?php if(  $result['location'] == 'Sylhet') echo"selected"; ?> value="Sylhet">Sylhet</option>
            <option <?php if(  $result['location'] == 'Rajshahi') echo"selected"; ?> value="Rajshahi">Rajshahi</option>
            <option <?php if(  $result['location'] == 'Rangpur') echo"selected"; ?> value="Rangpur">Rangpur</option>
        </select>
        <br>
        <br>

        <button type="submit">Update profile</button>

    </form>

</div>

<style>
    #change_profile{
margin-top: 50px;
    }
    #change_profile input,select{
        float: right;
        margin-right: 20%;
    }
</style>

<script>
    function validation()
    {


        var valid=true;
        if(document.getElementById("name").value==""){
            document.getElementById("error1").innerHTML="Please enter your name";
            valid=false;
        }
        if(document.getElementById("phone").value==""){
            document.getElementById("error2").innerHTML="Please enter your phone number";
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