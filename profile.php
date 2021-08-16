<!DOCTYPE html>
<?php
require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$userData = getUser();
unset($userData['password']);
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
        
        h1 {
            color: maroon;
        }
        
    </style>
</head>

<body>
    <?php include 'navigation.php' ?>

    <form action="" method="POST">
        <h1>Donor Profile Information</h1><br>

        <?php foreach ($userData as $key => $value) : ?>
            <label><?php echo ucwords($key); ?></label><br>
            <input type="text" value="<?php echo $value; ?>" readonly><br>
        <?php endforeach; ?>
    </form>

</body>

</html>