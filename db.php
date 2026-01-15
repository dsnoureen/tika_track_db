<?php
$conn = new mysqli("localhost", "root", "", "TikaTrack");
if ($conn->connect_error) {
    die("Database connection failed");
}
?>
