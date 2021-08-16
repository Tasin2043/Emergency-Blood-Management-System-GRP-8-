<!DOCTYPE html>
<?php
require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$reqDonors = getRecipients();
$user = getUser();
unset($user['password']);
?>

<head>
    <title>Requests</title>
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
        <h2>Receipients in Need</h2><br>

        <?php if ($reqDonors) : ?>
            <table>
                <tr>
                    <?php foreach ($reqDonors[0] as $label => $value) : ?>
                        <th><?php echo ucwords($label) ?></th>
                    <?php endforeach; ?>

                    <th>Confirm?</th>
                </tr>
                <?php foreach ($reqDonors as $key => $data) : ?>
                    <tr>
                        <?php foreach ($data as $label => $value) :
                        ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                        <td><a href="/confirm_donor.php?who=<?php echo $data['email'] ?>">Confirm</a></td>
                    </tr>
                <?php
                endforeach; ?>
            </table>

        <?php else : ?>
            <p>No Request from Receipients found.</p>

        <?php endif; ?>
    </form>

</body>

</html>