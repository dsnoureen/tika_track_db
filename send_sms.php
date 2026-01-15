<?php
include "db.php";
$conn->query("
INSERT INTO sms_logs (health_id,message,sent_date)
VALUES ('{$_POST['health_id']}','{$_POST['msg']}',CURDATE())
");
echo "SMS Logged";
?>
