<?php
include "db.php";
$r = $conn->query("
SELECT v.vaccine_name, r.dose_number
FROM vaccination_records r
JOIN vaccines v ON r.vaccine_id=v.vaccine_id
");
echo json_encode($r->fetch_all(MYSQLI_ASSOC));
?>
