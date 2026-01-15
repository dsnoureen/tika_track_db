<?php
include "db.php";
$r = $conn->query("
SELECT vaccine_name FROM vaccines
WHERE vaccine_id NOT IN
(SELECT vaccine_id FROM vaccination_records)
");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
?>
