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
<div id="top_nav">
    <ul>
        <li>
            <a href="../controller/logout.php">Logout</a>
        </li>
        <li>
            <a href="./profileinfo.php">welcome , <?php echo $_SESSION["name"]; ?></a>
        </li>

    </ul>
</div>


<style>
    #top_nav{
        height: 60px;
        background-color: greenyellow;
    }
    #top_nav ul{
        list-style-type: none;
    }

    #top_nav ul li{
        float: right;
        padding: 10px;
        margin-right: 20px;
        background-color: yellow;
        margin-top: 10px;
    }
    #top_nav ul li a{
        text-decoration: none;
    }

</style>

</body>
</html>