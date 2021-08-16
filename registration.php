<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="text-align: center">
<?php include ('../controller/registration.php');?>
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

<div>
    Registration to BloodBank
    <form action="" method="post" onsubmit="return validateRegisterForm()">

        <input type="text" id="name"  name="name" placeholder="name"> <h6 id="name_error"></h6>
        <br>
        <br>
        <input type="text" id="email" name="email" placeholder="email"> <h6 id="email_error"></h6>
        <br>
        <br>
        <input type="password" id="password" name="password"  placeholder="password" > <h6 id="pass_error"></h6>
        <br>
        <br>
        <input type="password" id="cpassword"  placeholder="Confirm password" ><h6 id="cpass_error"></h6>
        <br>
        <br>
        <input type="number" id="phone_number" name="phone_number"  placeholder="Phone number" > <h6 id="phone_error"></h6>
        <br>
        <br>
        Gender :
        <select name="gender" id="">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <br>

        <br>

        blood gorup
        <select name="blood_group" id="blood_group">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
        <br>
        <br>
        Home Town
        <select name="location" id="location">
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Rangpur">Rangpur</option>
        </select>
        <br>
        <br>
        <button type="submit">Register</button>
        <button>Reset</button>


    </form>
</div>


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
</style>

<script>

    function validateRegisterForm()
    {
        var valid=true;
        if(document.getElementById("name").value=="")
        {
            document.getElementById("name_error").innerText="please enter your name";
            valid=false;
        }
        if(document.getElementById("email").value=="")
        {
            document.getElementById("email_error").innerText="please enter your email";
            valid=false;
        }
        if(document.getElementById("password").value=="")
        {
            document.getElementById("pass_error").innerText="please enter your password";
            valid=false;
        }
        if(document.getElementById("password").value!=document.getElementById("cpassword").value)
        {
            document.getElementById("cpass_error").innerText="Password must be match";
            valid=false;
        }
        if(document.getElementById("cpassword").value=="")
        {
            document.getElementById("cpass_error").innerText="please confirm password";
            valid=false;
        }
        if(document.getElementById("phone_number").value=="")
        {
            document.getElementById("phone_error").innerText="please enter your phone number";
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