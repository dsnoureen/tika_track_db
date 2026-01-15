<?php
include "db.php";
$res = $conn->query("SELECT vaccine_name, age FROM vaccines");
echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>
