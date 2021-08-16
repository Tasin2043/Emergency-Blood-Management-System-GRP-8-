<?php
class db{

    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "bloodbank";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }


    function SelectQuery($conn,$sql)
    {

        $result = $conn->query($sql);

        return $result;

    }





    function InsertQuery($conn,$sql)
    {


        if ($conn->query($sql) === TRUE) {
            echo "added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }



    function UpdateQuery($conn,$sql)
    {


        if ($conn->query($sql) === TRUE) {

            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    function CloseCon($conn)
    {
        $conn -> close();
    }
}
?>