<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table  id="txtHint" style="align:center;border:1px; width:100%; border: 1px solid black;border-collapse:collapse;">

    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Blood Group</th>
        <th>Location</th>
        <th>Phone number</th>
        <th>Email</th>
        <th>gender</th>
        <th>Request</th>
    </tr>



    <?php
    $id=$tablename="";
    include '../model/db.php';


    $id = $_GET['id'];
    $tablename=$_GET['tablename'];




    $connect=new db();
    $conobj=$connect->OpenCon();
    if (!$conobj) {
        die('Could not connect: ' . mysqli_error($con));
    }


    $sql="SELECT * FROM $tablename WHERE id = '$id' or location like '%$id%' or name like '%$id%'";
    $result=$connect->SelectQuery($conobj,$sql);

    ?>




     <?php  while($row = $result->fetch_assoc()) {  ?>
    <tr>

        <td><?php echo $row['id'];  ?></td>
        <td><?php echo $row['name'];  ?></td>
        <td><?php echo $row['blood_group'];  ?></td>
        <td><?php echo $row['location'];  ?></td>
        <td><?php echo $row['phone_number'];  ?></td>
        <td><?php echo $row['email'];  ?></td>
        <td><?php echo $row['gender'];  ?></td>
        <td><a href="../controller/createrequest.php?id=<?php echo $row['id'];  ?>">Request</a></td>

    </tr>
    <?php  }   ?>

   </table>
<?php
    $connect->CloseCon($conobj);
    ?>

</body>
</html>