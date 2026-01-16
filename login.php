<?php
include "db.php";
$data = json_decode(file_get_contents("php://input"), true);

$q = $conn->query("SELECT * FROM users WHERE phone='{$data['phone']}'");
$user = $q->fetch_assoc();

if($user && password_verify($data['password'],$user['password'])){
  echo json_encode(["status"=>"success","role"=>$user['role']]);
}else{
  echo json_encode(["status"=>"error"]);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login | TikaTrack</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    Phone:<br>
    <input type="text" name="phone"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>

<p style="color:red"><?= $error ?? "" ?></p>

<p>No account? <a href="signup.php">Sign up</a></p>

</body>
</html>
