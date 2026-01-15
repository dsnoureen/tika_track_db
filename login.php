<?php
include "db.php";
$data = json_decode(file_get_contents("php://input"), true);

$q = $conn->query("SELECT * FROM users WHERE phone='{$data['phone']}'");
$user = $q->fetch_assoc();

if($user && password_verify($data['password'],$user['password'])){
  echo json_encode(["status"=>"success","role"=>$user['role']]);
}else{
  echo json_encode(["status"=>"error"]);
}
?>
