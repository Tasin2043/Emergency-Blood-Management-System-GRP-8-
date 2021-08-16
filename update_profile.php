<!DOCTYPE html>
<?php
require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$userData = getUser();

if (isset($_POST['update-profile'])) {
    $keys = ['user', 'email', 'phone', 'gender', 'dob', 'religion', 'blood', 'location', 'type'];

    $res = [];

    // Validate and store data to $res;
    foreach ($keys as $key => $value) {
        if (!isset($_POST[$value]) or empty($_POST[$value])) {
            echo $value . " can't be empty. <br/><br/>";
        }

        $res[$value] = $_POST[$value];
    }

    if (getUserDB($res['email']) and $userData['email'] !== $res['email'])
        echo "Email already exists";

    else if (updateUserDB(array_replace($userData, $res))) {
        echo "Profile Updated Successfully! Refresh the page to see changes.<br/><br/>";
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
        <h2>Update Information</h2><br>

        <?php foreach ($userData as $key => $value) :
            if ($key == 'password') continue;
        ?>
            <label><?php echo ucwords($key); ?></label><br>
            <input type="text" name="<?php echo $key ?>" value="<?php echo $value; ?>"><br>
        <?php endforeach; ?>

        <input type="submit" name="update-profile" value="Submit" />
    </form>

</body>

</html>