<?php
include "db.php";
$d = json_decode(file_get_contents("php://input"), true);

$conn->query("
INSERT INTO vaccination_records
(health_id,vaccine_id,dose_number,vaccination_date)
VALUES ('{$d['health_id']}',{$d['vaccine_id']},{$d['dose']},CURDATE())
");

echo json_encode(["status"=>"success"]);
?>
