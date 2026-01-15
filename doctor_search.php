<?php
include "db.php";
$q = $_GET['q'];

$r = $conn->query("
SELECT u.name,u.phone,h.health_id
FROM users u JOIN health_id h
ON u.user_id=h.user_id
WHERE u.name LIKE '%$q%' OR u.phone LIKE '%$q%'
");

echo json_encode($r->fetch_all(MYSQLI_ASSOC));
?>
