<?php
include "db.php";

$result = $conn->query("
  SELECT vaccine_name, total_doses
  FROM vaccines
  ORDER BY vaccine_name
");

echo json_encode($result->fetch_all(MYSQLI_ASSOC));
