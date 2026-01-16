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

<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $q = $conn->query("SELECT * FROM users WHERE phone='$phone'");
    $user = $q->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {

        $hid = $conn->query("
            SELECT health_id FROM health_id WHERE user_id={$user['user_id']}
        ")->fetch_assoc();

        $_SESSION['user_id']  = $user['user_id'];
        $_SESSION['name']     = $user['name'];
        $_SESSION['role']     = $user['role'];
        $_SESSION['health_id']= $hid['health_id'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid phone or password";
    }
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
