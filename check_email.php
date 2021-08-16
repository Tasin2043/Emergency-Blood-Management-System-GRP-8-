<?php

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['email']) and !empty($data['email'])) {
    require_once('model/dbQuery.php');

    if (getUserDB($data['email'])) {
        echo json_encode(array(
            "msg" => "Email already exists"
        ));

        return;
    }

    echo '""';
}
