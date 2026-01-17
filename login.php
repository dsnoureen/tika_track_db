<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$q = $conn->query("SELECT * FROM users WHERE phone='{$data['phone']}'");
$user = $q->fetch_assoc();

if ($user && password_verify($data['password'], $user['password'])) {

    // get health_id
    $hid = $conn->query("
        SELECT health_id FROM health_id WHERE user_id={$user['user_id']}
    ")->fetch_assoc();


    $_SESSION['user_id']   = $user['user_id'];
    $_SESSION['name']      = $user['name'];
    $_SESSION['role']      = $user['role'];
    $_SESSION['health_id'] = $hid['health_id'];

    echo json_encode(["status"=>"success"]);
} else {
    echo json_encode(["status"=>"error"]);
}
