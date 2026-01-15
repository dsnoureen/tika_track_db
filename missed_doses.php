<?php
include "db.php";
$r = $conn->query("
SELECT v.vaccine_name,
(v.total_doses - COUNT(r2.record_id)) AS pending
FROM vaccines v
LEFT JOIN vaccination_records r2
ON v.vaccine_id=r2.vaccine_id
GROUP BY v.vaccine_id
");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
?>

