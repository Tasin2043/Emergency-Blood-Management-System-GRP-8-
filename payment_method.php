<!DOCTYPE html>
<?php
require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$userData = getUser();
unset($userData['password']);

if (isset($_POST['update-payment'])) {
    $pm = $_POST['payment_method'];

    $u = getUser();

    $u['payment_method'] = $pm;

    updateUserDB($u);
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
        <h2>Set Payment Method</h2><br>
        <label>Select Gateway</label><br>
        <select name="payment_method">
            <option value="BKash">BKash</option>
            <option value="Nagad">Nagad</option>
            <option value="Rocket">Rocket</option>
            <option value="Visa">Visa</option>
            <option value="Master Card">Master Card</option>
        </select>

        <input type="submit" name="update-payment" value="Submit" />
    </form>

</body>

</html>