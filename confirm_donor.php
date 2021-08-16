<!DOCTYPE html>
<?php
require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$user = getUser();
unset($user['password']);

if (isset($_GET['who'])) {
    $recipients = getRecipients();
    $email = $_GET['who'];

    $req = [];
    foreach ($recipients as $key => $value) {
        if ($value['email'] === $email) {
            $req['on'] = date("Y/m/d");
            $req['by'] = $user;
            $recipients = saveConfirmedRecpt($req);
        }
    }
}

$reqDonors = getConfrimedRecpts();
?>

<head>
    <title>Confirmed Recipients in Need of <?php $user['blood'] ?></title>
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

        table {
            border: 1px solid #ececec;
            word-wrap: break-word;
            table-layout: fixed;
            width: 100%
        }

        table td {
            border-bottom: 1px solid #fcfcfc;
            padding: 1rem !important;
        }
    </style>
</head>

<body>
    <?php include 'navigation.php' ?>

    <form action="" method="POST">
        <h2>Confirmed Recipients in Need of <?php $user['blood'] ?></h2><br>

        <?php if ($reqDonors) : ?>
            <table>
                <tr>
                    <?php foreach ($reqDonors[array_key_first($reqDonors)] as $label => $value) : ?>
                        <th><?php echo ucwords($label) ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($reqDonors as $key => $data) : ?>
                    <tr>
                        <?php foreach ($data as $label => $value) : if ($label == 'by') continue; ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php
                endforeach; ?>
            </table>

        <?php else : ?>
            <p>No Confirmed Recipients found.</p>

        <?php endif; ?>
    </form>

</body>

</html>