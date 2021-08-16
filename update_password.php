<!DOCTYPE html>
<?php
require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$userData = getUser();
unset($userData['password']);

if (isset($_POST['update-password'])) {
    $keys = ['password', 'confirm_password'];

    $res = [];

    // Validate and store data to $res;
    foreach ($keys as $key => $value) {
        if (!isset($_POST[$value]) or empty($_POST[$value])) {
            echo $value . " can't be empty. <br/><br/>";
        }
        $res[$value] = $_POST[$value];
    }

    if ($res['password'] === $res['confirm_password']) {
        unset($res['confirm_password']);
    }

    if (isset($res['confirm_password'])) {
        echo "Password Mismatched";
    } else if (updateUserDB(array_replace($userData, $res))) {
        echo "Password Changed Successfully<br/><br/>";
    } else
        echo "------ Something went wrong ------ <br/><br/>";
}

?>

<head>
    <title>Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        ul {
            list-style-type: none;
            background-color: maroon;
            height: 100vh;
            width: 150px;
            padding: 40px 40px;
            float: left;
        }

        li {
            padding: 15px 0;
        }

        ul>li>a {
            text-decoration: none;
            color: white;
        }

        form {
            float: right;
            width: 75%;
            margin: 60px 0;

        }

        input {
            margin: 5px 0;

        }

        h2 {
            color: maroon;
        }
    </style>
</head>

<body>
    <?php include 'navigation.php' ?>

    <form method="POST">
        <h2>Change Password</h2><br>

        <label>Password</label><br>
        <input type="password" name="password" placeholder="password" value=""><br>
        <label>Confirm Password</label><br>
        <input type="password" name="confirm_password" placeholder="password" value=""><br>

        <input type="submit" name="update-password" value="Submit" />
    </form>

</body>

</html>