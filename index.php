<!DOCTYPE html>

<?php

require_once('model/dbQuery.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isLoggedIn()) {
    header('location: profile.php');
}
?>

<?php

if (isset($_POST['email'])) {
    $Pass = $_POST['password'];
    $Email = $_POST['email'];

    $loginData = getUserDB($Email);

    if ($loginData) {
        if (trim($loginData['password']) ===  trim($Pass)) {

            $_SESSION['email'] = $Email;

            header("Location: profile.php");
        } else {
            echo " <p style='color:red; text-align: center;'>Wrong Username Password</p>";
        }
    } else {
        echo "The email is not registered yet";
    }
}


?>


<head>
    <title>Login</title>
    <style>
        h1 {
            text-align: center;
            color: maroon;
        }

        form {
            text-align: left;
            width: 90%;
            margin: 0 auto;
        }

        legend {
            margin: 0 auto;
            color: maroon;
        }

        input {
            margin: 5px 0;

        }

        p {
            text-align: center;
        }

        button {
            background-color: maroon;
            color: white;
            padding: 5px 10px;
            margin: 15px 0;
        }
    </style>
</head>

<body>
    <h1>Emergency Blood Management System</h1>

    <form action="" method="POST">
        <fieldset>
            <legend>Donor Login</legend><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" required><br>

            <label for="pass">Password</label><br>
            <input type="password" name="password" required><br>

            <button type="submit" value="Login">Login</button><br>
        </fieldset>
        <p>New User? <a href="register.php">Register here</a></p>
    </form>
    <br>

</body>

</html>