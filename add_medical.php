<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO medical_history (health_id, type, description, record_date)
VALUES (
  '{$data['health_id']}',
  '{$data['type']}',
  '{$data['description']}',
  CURDATE()
)";

echo $conn->query($sql)
? json_encode(["status"=>"success"])
: json_encode(["status"=>"error"]);
?>
