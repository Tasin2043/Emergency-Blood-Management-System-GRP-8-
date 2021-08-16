<?php

function getConnection()
{
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'project_donor';

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = $conn->prepare("CREATE DATABASE project_donor");
    $ret = $sql->execute();

    // var_dump($ret);

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function initialize_mysql()
{
    $conn = getConnection();

    $sql = $conn->prepare("CREATE TABLE user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(100),
        phone VARCHAR(11),
        gender VARCHAR(10),
        religion VARCHAR(20),
        payment_method VARCHAR(20),
        blood VARCHAR(10),
        location VARCHAR(20),
        dob VARCHAR(100),
        type VARCHAR(20),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");

    $sql->execute();

    $sql = $conn->prepare("CREATE TABLE reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(30) NOT NULL,
        text VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");

    $sql->execute();

    $sql = $conn->prepare("CREATE TABLE confirmed_reqs (
        confirm_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id VARCHAR(30) NOT NULL,
        recipient_id VARCHAR(255),
        name VARCHAR(100),
        blood VARCHAR(10),
        time VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");

    $sql->execute();

    $conn->close();
}

function saveReview($text)
{
    $conn = getConnection();

    $user = getUser()['user'];

    $sql = $conn->prepare("INSERT INTO reviews (user, text) VALUES (?, ?)");
    $sql->bind_param('ss', $user, $text);
    $ret = $sql->execute();
}

function getAllReviews()
{
    $conn = getConnection();

    $user = getUser()['user'];

    $sql = $conn->prepare("SELECT * FROM reviews");
    $ret = $sql->execute();
    $res = $sql->get_result();

    if ($res) {
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    return false;
}

function getUserDB($email)
{
    $conn = getConnection();

    $sql = $conn->prepare("SELECT * FROM user WHERE email=?");
    $sql->bind_param('s', $email);
    $ret = $sql->execute();
    $res = $sql->get_result();

    if ($res->num_rows > 0) {
        return $res->fetch_assoc();
    }

    return false;
}

function saveUserDB($data)
{
    $conn = getConnection();

    $sql = $conn->prepare("SELECT * FROM user WHERE email=?");
    // echo "SQLLL => ";


    $sql->bind_param('s', $key);

    // var_dump($sql);
    $ret = $sql->execute();
    $res = $sql->get_result();
    $records = $res->fetch_all();

    if ($res->num_rows != 0)
        die('User already registered');

    // var_dump($data);

    $type = 'donor';

    $sql = $conn->prepare("INSERT INTO user (user, password, email, phone, gender, religion, payment_method, blood, location, dob, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql->bind_param(
        'sssssssssss',

        $data['user'],
        $data['password'],
        $data['email'],
        $data['phone'],
        $data['gender'],
        $data['religion'],
        $data['payment_method'],
        $data['blood'],
        $data['location'],
        $data['dob'],
        $type,
    );

    // echo "RES => ";
    // var_dump($res);

    // echo "REC => ";
    // var_dump($records);

    return $sql->execute();
}

function updateUserDB($data)
{
    $conn = getConnection();

    $id = getUser()['id'];

    $sql = $conn->prepare("UPDATE user SET user=?, password=?, email=?, phone=?, gender=?, religion=?, payment_method=?, blood=?, location=?, dob=?, type=? WHERE id=?");

    $sql->bind_param(
        'sssssssssssi',

        $data['user'],
        $data['password'],
        $data['email'],
        $data['phone'],
        $data['gender'],
        $data['religion'],
        $data['payment_method'],
        $data['blood'],
        $data['location'],
        $data['dob'],
        $data['type'],
        $id
    );

    if ($sql->execute())
        return true;

    var_dump($sql->error);

    return false;
}

function getRecipients()
{
    $conn = getConnection();

    $type = "recipient";

    $sql = $conn->prepare("SELECT * FROM user WHERE type=?");
    $sql->bind_param('s', $type);
    $ret = $sql->execute();
    $res = $sql->get_result();

    // var_dump($res->fetch_all(MYSQLI_ASSOC));

    if ($res->num_rows > 0) {
        $result = $res->fetch_all(MYSQLI_ASSOC);

        for ($i = 0; $i < count($result); $i++) {
            unset($result[$i]['password']);
        }
        return $result;
    }

    return false;
}

function saveConfirmedRecpt($data)
{
    $id = getUser()['id'];

    $conn = getConnection();
    $sql = $conn->prepare("INSERT INTO confirmed_reqs (user_id, recipient_id, name, blood, time) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param('sssss', $id, $data['by']['id'], $data['by']['user'], $data['by']['blood'], $data['on']);

    return $sql->execute();
}

function getConfrimedRecpts()
{
    $id = getUser()['id'];

    $conn = getConnection();
    $sql = $conn->prepare("SELECT * FROM confirmed_reqs where user_id=?");
    $sql->bind_param('s', $id);

    $sql->execute();

    $ret = $sql->get_result();

    if ($ret->num_rows > 0) {
        return $ret->fetch_all(MYSQLI_ASSOC);
    }

    return false;
}

function getUser()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['email'])) {
        return getUserDB($_SESSION['email']);
    }

    return false;
}

function isLoggedIn()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['email']) and $_SESSION['email'];
}

initialize_mysql();
