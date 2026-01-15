<?php
include "db.php";
$r = $conn->query("
SELECT description FROM medical_history m
WHERE EXISTS (
 SELECT 1 FROM vaccines v
 WHERE m.description LIKE CONCAT('%',v.vaccine_name,'%')
)
");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
?>
