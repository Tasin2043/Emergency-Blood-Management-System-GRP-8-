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
<?php include ('../controller/donarinformation.php'); ?>

<div  id="donar_table">


        <input type="text" id="search-text" placeholder="search by name/id/location">
        <button onclick="search()">Search</button>
    <form action="">
        <input type="submit" value="Refresh">
    </form>

    <br><br>
    <table id="donar-info" border="1px">
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
</div>


<style>

    #donar_table{

        margin-top:100px;
        margin-left:80px;
    }

</style>
<script>
    function search() {
        var id=document.getElementById("search-text").value;
        ///console.log(str);
        if (id == "") {


            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("donar-info").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET","../controller/search.php?id="+id+"&tablename="+'donar_information',true);
            xmlhttp.send();
        }
    }
</script>

</body>
</html>