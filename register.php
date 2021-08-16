<!DOCTYPE html>

<?php

if (isset($_POST['user'])) {

    require_once('model/dbQuery.php');

    $keys = ['user', 'password', 'email', 'phone', 'gender', 'dob', 'religion', 'blood', 'location'];

    $res = [];

    // Validate and store data to $res;
    foreach ($keys as $key => $value) {
        if (!isset($_POST[$value]) or empty($_POST[$value])) {
            echo $value . " can't be empty. <br/><br/>";
        }

        $res[$value] = $_POST[$value];
    }

    if (getUserDB($res['email']))
        echo "Email already exists";

    else if (saveUserDB($res)) {
        echo "Registered Successfully!";
        header("Location: index.php");
        return;
    } else
        echo "Something went wrong!";
}


?>

<head>
    <title>Register</title>
    <style>
        h1 {
            text-align: center;
            color: maroon;
        }

        form {
            text-align: left;
            width: 90%;
            margin: 0 auto;
        }

        legend {
            margin: 0 auto;
            color: maroon;
        }

        input {
            margin: 5px 0;

        }

        p {
            text-align: center;
        }

        button {
            background-color: maroon;
            color: white;
            padding: 5px 10px;
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <h1>Emergency Blood Management System</h1>



    <form action="" method="POST">
        <fieldset>
            <legend>Donor Registration</legend><br>

            <label>Name</label><br>
            <input type="text" name="user" required><br>

            <label>E-mail</label><br>
            <input type="email" name="email" onkeyup="checkEmail()" value="" required><br>
            <div id="error"></div>

            <label>Password</label><br>
            <input type="password" name="password" required><br>

            <label>Phone</label><br>
            <input type="tel" name="phone" required><br>


            <label>Location</label><br>
            <input type="text" name="location" required><br><br>

            <label>Gender</label><br>
            <input type="radio" name="gender" value="male" required>
            <label for="male">Male</label><br>
            <input type="radio" name="gender" value="female" required>
            <label for="female">Female</label><br><br>

            <label>Date of Birth</label><br>
            <input type="date" name="dob" required><br><br>

            <label for="religion">Religion</label><br>
            <select name="religion" required>
                <option value="Islam">Islam</option>
                <option value="Hinduism">Hinduism</option>
                <option value="Christianity">Christianity</option>
                <option value="Buddhism">Buddhism</option>
            </select>
            <br><br>

            <label for="blood">Blood Group</label><br>
            <select name="blood">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select><br><br>



            <button type="submit" value="Register">Register</button><br>
        </fieldset>
        <p>Already Registered? <a href="index.php">Login</a></p>

    </form>
    <br>

    <script>
        function checkEmail() {
            fetch('check_email.php', {
                method: 'POST',
                body: JSON.stringify({
                    "email": document.getElementsByName('email')[0].value
                })
            }).then(response => response.json()).then(r => {
                if (r && r['msg']) {
                    document.getElementById('error').innerHTML = "<span style='color:red;'>" + r['msg'] + "</span>";
                } else
                    document.getElementById('error').innerHTML = "";
            })
        }
    </script>
</body>

</html>