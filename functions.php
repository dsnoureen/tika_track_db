<?php
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit;
    }
}

function esc($conn, $str) {
    return $conn->real_escape_string(trim($str));
}
?>
