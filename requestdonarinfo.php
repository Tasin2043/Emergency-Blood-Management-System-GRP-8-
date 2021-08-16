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
<?php include ('../controller/checkloginstatus.php') ?>

<?php include ('./top_nav.php') ?>
<?php include ('./leftnav.php') ?>
<?php include ('../controller/requestdonarinfo.php'); ?>

<div  id="donar_table">

    
    <br><br>
    <table border="1px">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Location</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>gender</th>
            <th>Requested by</th>
            <th>Request phone</th>
        </tr>
        <?php  while($row = $result->fetch_assoc()) {  ?>
            <tr>

                <td><?php echo $row['id'];  ?></td>
                <td><?php echo $row['name'];  ?></td>
                <td><?php echo $row['blood_group'];  ?></td>
                <td><?php echo $row['location'];  ?></td>
                <td><?php echo $row['phone_number'];  ?></td>
                <td><?php echo $row['email'];  ?></td>
                <td><?php echo $row['gender'];  ?></td>
                <td><?php echo $row['requested_by'];  ?></td>
                <td><?php echo $row['requested_user_phone'];  ?></td>

            </tr>
        <?php  }   ?>
    </table>
</div>


<style>

    #donar_table{

        margin-top:100px;
        margin-left:80px;
    }

</style>

</body>
</html>