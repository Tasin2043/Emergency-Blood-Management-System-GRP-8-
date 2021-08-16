<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['email'] = false;

header('location: index.php');
