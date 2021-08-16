<!DOCTYPE html>
<?php

require_once('model/dbQuery.php');

if (!isLoggedIn())
    header('location : index.php');

$user = getUser();
unset($user['password']);

if (isset($_POST['new_review'])) {
    // User submitted a new review, check and save
    $text = htmlspecialchars($_POST['review']); // Raw Text to HTML Format

    saveReview($text);
}

$all_reviews = getAllReviews(); // Get All Reviews

?>

<head>
    <title>Reviews</title>
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

        .review {
            margin: 1rem 0rem;
        }

        textarea {
            padding: 5px;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <?php include 'navigation.php' ?>

    <form action="" method="POST">
        <h2>Reviews</h2><br>

        <?php foreach ($all_reviews as $key => $review) : ?>
            <div class="review">
                <small><b><?php echo $review['user'] ?></b></small> <br />
                <p><?php echo $review['text'] ?></p>
            </div>

        <?php endforeach; ?>


        <label>What's your thought <?php echo $user['user'] ?> ? </label><br>
        <textarea name="review" cols="50" rows="5" type="text"></textarea> <br>
        <input type="submit" name="new_review" value="Submit" />
    </form>

</body>

</html>