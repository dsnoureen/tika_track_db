<?php
include "db.php";
include "functions.php";
requireLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>TikaTrack Dashboard</title>
</head>
<body>
    <div class="container">
        <header style="display: flex; justify-content: space-between; align-items: center;">
            <h1>TikaTrack Dashboard</h1>
            <a href="logout.php" style="color: red; text-decoration: none;">Logout</a>
        </header>

        <div class="card" style="border-left-color: #10b981; margin-bottom: 30px;">
            <h3>Digital Health ID: <span style="color: #2563eb;"><?= $_SESSION['health_id'] ?></span></h3>
            <p><strong>Name:</strong> <?= $_SESSION['name'] ?> | <strong>Role:</strong> <?= $_SESSION['role'] ?></p>
        </div>

        <div class="grid">
            <div class="card" onclick="load('taken_vaccine.php')">
                <h3> Vaccination History</h3>
                <p>View all completed doses</p>
            </div>
            <div class="card" onclick="load('missed_doses.php')" style="border-left-color: #ef4444;">
                <h3> Missed Doses</h3>
                <p>Check overdue vaccinations</p>
            </div>
            <div class="card" onclick="load('age_eligible.php')" style="border-left-color: #f59e0b;">
                <h3> Upcoming Schedule</h3>
                <p>Based on your age</p>
            </div>
            <div class="card" onclick="location.href='medical_form.php'">
                <h3> Medical Records</h3>
                <p>Allergies & Growth tracking</p>
            </div>
        </div>

        <div id="data-display" style="margin-top: 30px;">
            <table id="output-table">
                <thead>
                    <tr>
                        <th>Detail</th>
                        <th>Status/Value</th>
                    </tr>
                </thead>
                <tbody id="output">
                    </tbody>
            </table>
        </div>
    </div>

    <script src="dashboard.js"></script>
</body>
</html>