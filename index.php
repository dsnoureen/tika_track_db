<?php
include "connection.php";
include "functions.php";
requireLogin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>TikaTrack Dashboard</title>
</head>
<body>

<h2>Welcome to TikaTrack</h2>

<p>
    Logged in as: <b><?= $_SESSION['name'] ?></b><br>
    Role: <b><?= $_SESSION['role'] ?></b><br>
    Health ID: <b><?= $_SESSION['health_id'] ?></b>
</p>

<hr>

<ul>
    <li><a href="signup.php">Register New User</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
