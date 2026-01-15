<?php
include "db.php";
$data = json_decode(file_get_contents("php://input"), true);

$name = $conn->real_escape_string($data['name']);
$nid = $conn->real_escape_string($data['nid']);
$phone = $conn->real_escape_string($data['phone']);
$role = $data['role'];
$pass = password_hash($data['password'], PASSWORD_DEFAULT);

$conn->query("INSERT INTO users (name,nid_birth,phone,password,role)
VALUES ('$name','$nid','$phone','$pass','$role')");

$user_id = $conn->insert_id;
$health_id = "TT".str_pad($user_id,6,"0",STR_PAD_LEFT);

$conn->query("INSERT INTO health_id VALUES ('$health_id',$user_id)");

echo json_encode(["status"=>"success","health_id"=>$health_id]);
?>
