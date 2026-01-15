<?php
include "db.php";
$d = json_decode(file_get_contents("php://input"), true);

$conn->query("
INSERT INTO vaccines (disease_name,vaccine_name,total_doses,age)
VALUES ('{$d['disease']}','{$d['name']}',{$d['doses']},'{$d['age']}')
");

echo json_encode(["status"=>"success"]);
?>
